<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyPet</title>
<link rel="stylesheet" href="<?php echo base_url()?>css/cat.css"> 
<?php  
	$this->load->view('libs');
?>
<script src="<?php echo base_url()?>js/cat.js"></script> 
	<script type="text/javascript" src="<?php echo base_url()?>public/plug/ue/ueditor.config.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>public/plug/ue/ueditor.all.js"></script>
</head>
<body>
<?php  
	$this->load->view('head');
?>

<div id="catchatdiv">
<div id="catchatdivtitle" class="flex_center">化猫街<span id="catchatdivclose" class="canclick">x</span></div>
<div id="catchatdivcontent"></div>
<div id="catchatdivinputdiv">
<div id="catchatdivinput" contenteditable="true" autofocus="autofocus"></div>
<div id="catchatdivinputsubdiv" class="flex_center"><button id="catchatdivinputsub">发送</button></div>

</div>

</div>

<div class="container-fluid" id="body">

<div class="row" id="cattitle">
<div class="col-md-5 flex_center col-sm-2"><div id="cattitle_chat" class="canclick">和街上的人交谈</div></div>
<div class="col-md-7 flex_center col-sm-7" id="cattitle_adm">其实这里是用来打广告的！！为了钱！！</div>
</div>



<div class="pad15">
<div class="row" id="catcontent">
<div class="col-md-3 col-sm-3" id="catcontentleft">
<div class="notetype flex_center canclick currentnotetype" id="notetype1" type="9">全部</div>


<div class="notetype flex_center canclick" id="notetype2" type="0">普通</div>


<div class="notetype flex_center canclick" id="notetype3" type="1">提问</div>


<div class="notetype flex_center canclick" id="notetype4" type="2">交易</div>

<div class="flex_center"><button id="createnote">发帖</button></div>
<div><img src="<?php echo base_url()?>/images/cattitle.jpg" alt=""></div>
</div>
<!-- 帖子 -->
<div class="col-md-9 col-sm-9" id="catcontentright">
<?php 
   foreach ($allcatsnote as $catnote){
            //echo "<p>".$singer['name']."的介绍是</p>";
            switch ($catnote['note_type']) {
            	case '0':
            		$type="普通";
            		break;
            	case '1':
            	$type="提问";
            		break;
            		case '2':
            	$type="交易";
            		break;
            	default:
            		# code...
            		break;
            }
$title=$catnote['note_title'];
$time=$catnote['note_time'];
$likes=$catnote['note_likes'];
$comment=$catnote['note_comment'];
$nick_name=$catnote['nick_name'];
$content=$catnote['note_content'];
$likesimg= base_url()."images/likes.png";
$commentimg=base_url()."images/comment.png";
            echo "<div class='canclick onenotediv col-md-12 col-sm-12 list'><div class='onenotetype'>来自类别：$type</div><div class='onenotenickname'>$nick_name</div><div class='onenotetitle'>$title</div>
<div class='onenotecontent'>$content</div>
            <div class='onenotetime'>$time</div>
<div><img src='$likesimg' class='onenoteicon'><span class='onenotelikes'>$likes</span><img src='$commentimg' class='onenoteicon'><span class='onenotecomment'>$comment</span></div></div>
            ";
        }
 ?>
</div>

<!-- 动态获取的 -->







</div>
</div>





</div>

<!-- 编辑模块start -->
<div id="container" style="display:none; z-index: 3000">
	<!-- 发布按钮 -->
	
	<div class="col-md-4 flex_center loginBox" id="loginModal" style="background:gray;">
		<div class="pet_content pet_content_list">
		    <div class="pet_grzx">
		        <div class="pet_grzx_nr">
					<div class="widget-body">
				        <!-- BEGIN FORM-->
				        <form action="#" class="form-horizontal" id="addcontentform">			        	
							<!-- 发布内容的标题 -->
				            <div class="control-group">
				                <label class="control-label">标题</label>
				                <div class="controls">
				                    <input placeholder="请在这里输入标题" style="width: 100%;height: 30px" type="text" id="note_title" name="note_title"/>
				                    <span class="help-inline"></span>
				                </div>
				            </div>

				            <!-- 这里是编辑内容的地方 -->

				            <div class="control-group">
				                <label class="control-label">详情</label>
				                <div class="controls">
				                    <textarea id="note_content11" name="note_content" class="span10 ">
				                    	
				                    </textarea>
				                    <span class="help-inline"></span>
				                </div>
				            </div>
				            <div class="control-group" style="display: inline-block;">
				                <label class="control-label"></label>
				                <div class="controls">
				                <button type="button" id="j_upload_img_btn">上传图片</button>
				                <ul id="upload_img_wrap"></ul>
				                    <!-- 传图片地址值用的 -->
				                <input type="hidden" id="note_url" name="note_url" value="">

				                <span class="help-inline"></span>

				                <!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
				                <textarea id="uploadEditor" style="display: none;"></textarea>

				                </div>
				            </div> 
				            <div style="display: inline-block;width:60px;height:50px">
								<select name="note_type" id="note_type">

									<option value="0" selected>普通</option>
									<option value="1">提问</option>
									<option value="2">交易</option>

								</select>	
				            </div>                          
				            <div class="form-actions">
				                <button type="button" class="btn btn-success" id="addcontent">发布</button>
				            </div>
				        </form>
				        <!-- END FORM-->
				    </div>
				</div>
		 	</div>
		</div>
	</div>
</div>		


<!-- 编辑模块end -->






<div id="backtohome" class="canclick"><span id="back">回到入口</span><span><</span></div>
<script>
var homeurl="<?php echo site_url('Home')?>";
var getnoteurl="<?php echo site_url('GetCatNote')?>";
var baseurl="<?php echo base_url()?>";
var ajaxUrl="<?php echo site_url('PublishController')?>"
var isLogin="<?php echo site_url('IsLogin')?>"
var detailList="<?php echo site_url('DetailListController')?>"
</script>
</body>
</html>