$(function() {

    $("#backtohome").hover(function() {
        $(this).animate({
            left: '0'

        });
    }, function() {
        $(this).animate({
            left: '-90px'

        });
    })

    $("#backtohome").click(function() {
        location.href = homeurl;
    })


    //点击聊天弹出框
    $("#cattitle_chat").click(function() {
            $("#catchatdiv").css("display", "flex")
        })
        //点击关闭按钮关闭聊天框
    $("#catchatdivclose").click(function() {
        $("#catchatdiv").css("display", "none")
    })


    //拖拽start--------------------

    var $dialog = $("#catchatdiv");


    //自动居中对话框
    function autoCenter(el) {
        var bodyW = $(window).width();
        var bodyH = $(window).height();
        var elW = el.width();
        var elH = el.height();
        $dialog.css({ "left": (bodyW - elW) / 2 + 'px', "top": (bodyH - elH) / 2 + 'px' });
    };



    //禁止选中对话框内容
    if (document.attachEvent) { //ie的事件监听，拖拽div时禁止选中内容，firefox与chrome已在css中设置过-moz-user-select: none; -webkit-user-select: none;
        $dialog.attachEvent('onselectstart', function() {
            return false;
        });
    }
    //声明需要用到的变量
    var mx = 0,
        my = 0; //鼠标x、y轴坐标（相对于left，top）
    var dx = 0,
        dy = 0; //对话框坐标（同上）
    var isDraging = false; //不可拖动

    //鼠标按下
    $("#catchatdivtitle").mousedown(function(e) {
        e = e || window.event;
        mx = e.pageX; //点击时鼠标X坐标
        my = e.pageY; //点击时鼠标Y坐标
        dx = $dialog.offset().left;
        dy = $dialog.offset().top;
        isDraging = true; //标记对话框可拖动     
        e.preventDefault();
    });

    //鼠标移动更新窗口位置
    $(document).mousemove(function(e) {
        var e = e || window.event;
        var x = e.pageX; //移动时鼠标X坐标
        var y = e.pageY; //移动时鼠标Y坐标
        if (isDraging) { //判断对话框能否拖动
            var moveX = dx + x - mx; //移动后对话框新的left值
            var moveY = dy + y - my; //移动后对话框新的top值
            //设置拖动范围
            var pageW = $(window).width();
            var pageH = $(window).height();
            var dialogW = $dialog.width();
            var dialogH = $dialog.height();
            var maxX = pageW - dialogW; //X轴可拖动最大值
            var maxY = pageH - dialogH; //Y轴可拖动最大值
            moveX = Math.min(Math.max(0, moveX), maxX); //X轴可拖动范围
            moveY = Math.min(Math.max(0, moveY), maxY); //Y轴可拖动范围
            //重新设置对话框的left、top
            $dialog.css({ "left": moveX + 'px', "top": moveY + 'px' });
        };
    });

    //鼠标离开
    $("#catchatdivtitle").mouseup(function() {
        isDraging = false;
    });



    //窗口大小改变时，对话框始终居中
    window.onresize = function() {
        autoCenter($dialog);
    };



    //拖拽end--------------------


    //懒加载start---

    var type = 0; //默认类型为全部
    var start = 0;
    var alreadynomore = false;
    $(document).scroll(function() {

        var viewHeight = $(window).height(); //可见高度  
        var contentHeight = $(this).height(); //内容高度  
        var scrollHeight = $(this).scrollTop(); //滚动高度  
        if (contentHeight - viewHeight <= scrollHeight) {
            $.ajax({
                url: getnoteurl,
                type: 'POST',
                dataType: 'json',
                data: { start: start, note_type: type },

                success: function(data) {
                    start = start + 5;
                    if (data.length <= 0) {
                        if (alreadynomore == false) {
                            $("#catcontentright").append("<div class='flex_center onenotediv col-md-12 col-sm-12'>这里没有更多消息了,您可以发帖让内容更丰富</div>")
                            alreadynomore = true;
                        }
                        return;
                    }
                    for (onedate in data) {


                        var notetype = data[onedate].note_type;
                        switch (notetype) {
                            case '0':
                                notetype = "普通";
                                break;
                            case '1':
                                notetype = "提问";
                                break;
                            case '2':
                                notetype = "交易";
                                break;
                            default:

                                break;
                        }

                        var title = data[onedate].note_title;
                        var time = data[onedate].note_time;
                        var likes = data[onedate].note_likes;
                        var comment = data[onedate].note_comment;
                        var nick_name = data[onedate].nick_name;
                        var content = data[onedate].note_content;
                        var likesimg = baseurl + "images/likes.png";
                        var commentimg = baseurl + "images/comment.png";

                        $("#catcontentright").append("<div class='canclick onenotediv col-md-12 col-sm-12'><div class='onenotetype'>来自类别：" + notetype + "</div><div class='onenotenickname'>" + nick_name + "</div><div class='onenotetitle'>" + title + "</div><div class='onenotecontent'>" + content + "</div><div class='onenotetime'>" + time + "</div><div><img src='" + likesimg + "' class='onenoteicon'><span class='onenotelikes'>" + likes + "</span><img src='" + commentimg + "' class='onenoteicon'><span class='onenotecomment'>" + comment + "</span></div></div>")

                    }
                },
                error: function(err) {
                    alert(err);
                }
            });







        }


    });
    //懒加载end---

    $("#cattitle_chat").hover(function() {
        $(this).css('background', 'rgba(254,236,110,0.5)')
        $(this).css('color', 'white')
    }, function() {
        $(this).css('background', 'rgba(200, 200, 200, 0.8)')
        $(this).css('color', 'black')
    })

    //类型选择框的一系列事件start-----
    //默认为全部
    $('#notetype1').attr('current', 'current');
    $('.notetype').hover(function() {
        if (this.current != "current") {
            $(this).css('background', '#FE6C6C');
        }
    }, function() {
        if (this.current != "current") {
            $(this).css('background', 'white');
        }
    })

    $('.notetype').click(function() {
            start = 5;
            alreadynomore = false;
            if (this.current != "current") {
                $('.notetype').attr('current', '');
                $(this).attr('current', 'current');
                $('.notetype').removeClass('currentnotetype');
                $(this).addClass('currentnotetype');
                type = $(this).attr('type');
                console.log(type);
                $.ajax({
                    url: getnoteurl,
                    type: 'POST',
                    dataType: 'json',
                    data: { note_type: type, start: 0 },

                    success: function(data) {
                        $('#catcontentright').html('');

                        /*   start = start + 5;
                           if (data.length <= 0) {
                               if (alreadynomore == false) {
                                   $("#catcontentright").append("<div class='flex_center onenotediv col-md-12 col-sm-12'>这里没有更多消息了,您可以发帖让内容更丰富</div>")
                                   alreadynomore = true;
                               }
                               return;
                           }*/

                        for (onedate in data) {
                            var notetype = data[onedate].note_type;
                            switch (notetype) {
                                case '0':
                                    notetype = "普通";
                                    break;
                                case '1':
                                    notetype = "提问";
                                    break;
                                case '2':
                                    notetype = "交易";
                                    break;
                                default:

                                    break;
                            }

                            var title = data[onedate].note_title;
                            var time = data[onedate].note_time;
                            var likes = data[onedate].note_likes;
                            var comment = data[onedate].note_comment;
                            var nick_name = data[onedate].nick_name;
                            var content = data[onedate].note_content;
                            var likesimg = baseurl + "images/likes.png";
                            var commentimg = baseurl + "images/comment.png";

                            $("#catcontentright").append("<div class='canclick onenotediv col-md-12 col-sm-12'><div class='onenotetype'>来自类别：" + notetype + "</div><div class='onenotenickname'>" + nick_name + "</div><div class='onenotetitle'>" + title + "</div><div class='onenotecontent'>" + content + "</div><div class='onenotetime'>" + time + "</div><div><img src='" + likesimg + "' class='onenoteicon'><span class='onenotelikes'>" + likes + "</span><img src='" + commentimg + "' class='onenoteicon'><span class='onenotecomment'>" + comment + "</span></div></div>")

                        }
                    },
                    error: function(err) {
                        alert(err);
                    }
                });


            }
        })
        //类型选择框的一系列事件end-----



    //发表帖子start
    $("#createnote").click(function() {
        $.ajax({
            url: isLogin,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.res == 'ok') {
                    $("#container").show();
                } else {
                    alert("为营造良好的环境，请先登陆后发帖");
                }
            },
            error: function(err) {
                console.log(err);
            }
        });



    });

    /*点击发布按钮隐藏*/
    $("#addcontent").click(function() {

        //ajax请求
        //请求的数据
        var data = $("#addcontentform").serialize();
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(data) {
                alert("发布成功");
                $("#container").hide();
            },
            error: function(err) {
                alert("操作失败");
            }
        });
    });


    //引入百度编辑器js代码
    var ue = UE.getEditor('note_content11'); //news_content_text是需要加载编辑器的id
    var uploadEditor = UE.getEditor("uploadEditor", {
        isShow: false,
        focus: false,
        enableAutoSave: false,
        autoSyncData: false,
        autoFloatEnabled: false,
        wordCount: false,
        sourceEditor: null,
        scaleEnabled: true,
        toolbars: [
            ["insertimage", "attachment"]
        ]
    });
    uploadEditor.ready(function() {
        uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
    });

    //自定义按钮绑定触发多图上传和上传附件对话框事件
    document.getElementById('j_upload_img_btn').onclick = function() {
        var dialog = uploadEditor.getDialog("insertimage");
        dialog.title = '多图上传';
        dialog.render();
        dialog.open();
    };

    //多图上传动作
    function _beforeInsertImage(t, result) {
        var imageHtml = '';
        var note_url = '';
        for (var i in result) {
            imageHtml = '<li><img src="' + result[i].src + '" alt="' + result[i].alt + '" height="150"></li>';
            note_url = result[i].src;
        }
        document.getElementById('upload_img_wrap').innerHTML = imageHtml;
        //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
        //具体怎么设置看项目需求，我这里只是举个例子
        document.getElementById('note_url').value = note_url;
    }
    //发表帖子end



    //详情页start
    $(".list").click(function(){
        window.location.href = detailList;
    });
    //详情页end
})
