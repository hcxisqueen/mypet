<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户登录界面</title>
	<link rel="stylesheet" href="<?php echo base_url()?>css/userlogin.css">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>	
        var url="<?php echo site_url('UserController')?>";
   
        var url1="<?php echo site_url('loginController')?>";
  	var homeurl="<?php echo site_url('Home')?>"
	</script>
</head>
<body>
<div id="userlogin_div">
	<!--注册-->
	<div id="reg" >
		<div id="div1"> <h1 class="form-title" text-align="center" style="color:white">用户注册</h1>  <hr />   </div>

		<!-- BEGIN FORM-->
		<form action="#"  id="addcateform" >
			<div>
				<div>
					<label class="control-label" style="font-size:19px;padding-top:40px;color:white;margin-left:85px;">账号：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" id="user_name" name="user_name" class="span6 " />
					<span class="help-inline" style="font-size:16px;padding-top:40px;color:white;margin-left:40px;">必填</span>
				</div>
			</div>
			<div>
				<div class="controls">
					<label class="control-label" style="font-size:19px;padding-top:40px;color:white;margin-left:85px;">昵称：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" id="nick_name" name="nick_name" class="span6 " />
					<span class="help-inline" style="font-size:16px;padding-top:40px;color:white;margin-left:40px;">必填</span>
				</div>
			</div>
			<div>
				<div class="controls">
					<label class="control-label" style="font-size:19px;padding-top:40px;color:white;margin-left:85px;">密码：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="password" id="password" name="password" class="span6 " />
					<span class="help-inline" style="font-size:16px;padding-top:40px;color:white;margin-left:40px;">必填</span>
				</div>
			</div>
			<div>
				<div>
					<label class="control-label" style="font-size:19px;padding-top:40px;color:white;margin-left:85px;">确认密码：</label>
					<input type="password" id="resure" name="resure" class="span6 " />
					<span class="help-inline" style="font-size:16px;padding-top:40px;color:white;margin-left:40px;">必填</span>
				</div>
			</div>


			<div style="padding-top:40px;">
				<button type="button" class="btn btn-success" id="addcate"  style="margin-left:180px;">注册</button>
				<button type="reset" class="btn" style="margin-left:10px;">重置</button>

			</div>

		</form>
	</div>
	<!-- END SAMPLE FORM PORTLET-->
	<!--登录-->
	<div class="form row" >
		<form class="form-horizontal col-sm-offset-3 col-md-offset-3" id="login_form" action="personal_center.php">
			<div id="div1"> <h1 class="form-title" text-align="center">登陆</h1>  <hr />   </div>

			<div class="col-sm-9 col-md-9">
				<div class="form-group">
					<input class="form-control required" type="text" placeholder="账号" name="user_name" id="loginname" autofocus="autofocus" maxlength="20"/>
					<span class="fa fa-user fa-lg"></span>
				</div>
				<div class="form-group">
					<input class="form-control required" type="password" placeholder="密码" name="password" id="user_passwd" maxlength="8"/>
					<span class="fa fa-lock fa-lg"></span>

				</div>
			<!-- 	<div class="form-group3">
				<input type="text"  class="input2" name="coder" id="coder" value="" placeholder="验证码" >
				<img src="coder.php" alt="验证码" title="验证码" id="coderimg">
				
			</div> -->
				<br>
				<br>

				<div class="form-group">
					<button class="btn btn-default pull-right" type="button" id="userlogin_btn" value="Login "> 登陆 </button>
					<div class="form-group">
						<button class="btn btn-default pull-right" type="button" id="userregit_btn" value="Login "> 注册 </button>
					</div>
				</div>
		</form>
	</div>



</div>
<script src="<?php echo base_url()?>js/admin.js"></script>
</body>
</html>