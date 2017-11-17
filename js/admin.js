$(document).ready(function() {
    //登录切换到注册
    $('#userregit_btn').click(function() {
        $('#reg').css('display', 'block');
        $('.form').css('display', 'none');
    });

    //用户注册
    $('#addcate').click(function() {
        if (!$('#user_name').val()) {
            $('#user_name').next('span').html('账号必填！');
            return;
        } else {
            $('#user_name').next('span').html('');
        }
        if (!$('#nick_name').val()) {
            $('#nick_name').next('span').html('昵称必填！');
            return;
        } else {
            $('#nick_name').next('span').html('');
        }
        if (!$("#password").val()) {
            $('#password').next('span').html('密码必填！');
            return;
        } else {
            $('#password').next('span').html('');
        }

        if (!$("#resure").val()) {
            $('#resure').next('span').html('确认密码必填！');
            return;

        } else if ($("#resure").val() != $("#password").val()) {
            $('#resure').next('span').html('两次输入的不是同一个密码！');
            return;
        } else {
            $('#resure').next('span').html('');
        }
        console.log(5);


        //提交数据
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: { user_name: $('#user_name').val(), nick_name: $('#nick_name').val(), password: $('#password').val() },
            //对整个表单的数据进行序列化

            success: function(data) {
                console.log(1);
                alert('注册成功！');
                window.location.reload();
            }
        });
    });

    //用户登录

    $('#userlogin_btn').click(function() {

        /* body... */
        //账号必填
        var $user_name = $("#loginname").val();

        var $password = $("#user_passwd").val();


        //如果账号为空，提示他必填
        if (!$user_name) {
            $('#loginname').next('span').html('账号必填！');
            return;
        }
        if (!$password) {
            $('#user_passwd').next('span').html('密码必填！');
            return;
        }
        console.log(8);

        //进入数据处理阶段：AJAX
        $.ajax({

            url: url1, //请求的地址，相当于是form表单里面的action
            type: 'POST', //数据提交方式，相当于是form表单里面的method
            dataType: 'json', //接收的数据类型，不能被其他任何类型的数据污染//remember:$remember,
            data: { user_name: $user_name, password: $password }, //提交的数据，相当于是表单里面的input,键名相当于是input标签的name属性里面的值
            success: function(data) {

                console.log(data);
                //无效的账号
                if (data.res == 'no_exit_admin_name') {
                    $('#user_name').next('span').html('请输入正确账号！');
                } else if (data.res == 'invail_admin_passwd') {
                    $('#user_passwd').next('span').html('请输入正确的密码！');
                } else if (data.res == 'ok') {

                    //window.location.reload();
                    location.href = homeurl;

                } else {
                    alert('操作失败');

                }

            }
        });

    });
});
