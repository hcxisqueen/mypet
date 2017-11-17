$(function() {

    //鼠标悬浮上选项
    $('.dongtai').hover(function() {
        $(this).css('position', 'relative');
        $(this).css('color', '#c02020');
        $(this).animate({
            right: '20px'

        });
    }, function() {
        $(this).css('color', 'black');
        $(this).animate({
            right: '0'

        });

    })

    //页面跳转
    $($('.dongtai')[0]).click(function() {

        window.location.href = caturl;
    })


})
