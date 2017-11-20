<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="<?php echo base_url()?>css/amazeui.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>css/wap.css">

    <title>内容页</title>
    <?php
    $this->load->view('libs');
    ?>
</head>
<body style="background:#ececec">

<div class="pet_mian" >
    <?php
    $this->load->view('head');
    ?>

	<div class="pet_content col-md-10">
		<div class="pet_content_block">
			<article data-am-widget="paragraph" class="am-paragraph am-paragraph-default pet_content_article" data-am-paragraph="{ tableScrollable: true, pureview: true }">
				<input type="hidden" name="user_nick" id="user_nick" value="">
				<input type="hidden" name="news_id" id="news" value="">
				<h1 class="pet_article_title">啦啦啦</h1>
				<div class="pet_article_user_time">发表于：2017/11/06</div>
				<img src="<?php echo base_url()?>images/catnote1.jpg"><p class=paragraph-default-p>都进入房间热开工日过几天热交换规划用途和亚特噢成为</p>

			</article>
			<ul class="like_share_block">
				<li id="praise" news_id='111'><a class="link_share_button"  href="###"><i class="iconfont share_ico_link">&#xe62f;</i><span id="praise_num">324324</span></a></li>
				<li id="commentli"><a class="link_share_button"  href="###"><i class="iconfont share_ico_wx"></i><span id="comment">评论</span></a></li>
				<li id="shareli"><a class="link_share_button" id="friend" href="#"><i class="iconfont share_ico_pyq">&#xe62e;</i><span id="share">分享</span></a></li>

			</ul>

		</div>
		<!--评论-->
		<div style="height:100px;display:none;" id="comment_div">
			<textarea style="width:640px; margin-top:20px;" id="comment_content" name="comment_content"></textarea>
			<button type="button" style="float:right;margin-top:10px;" id="show">发表</button>
		</div>

		<!--分享-->
		<div style="height:100px;display:none;" id="share_div">
			<input style="width:640px; margin-top:20px;" id="share_content" name="share_content" placeholder="转发理由">
			<input type="hidden" name="user_id" id="user_id" value="">
			<button type="button" style="float:right;margin-top:10px;" id="share_show">分享</button>
		</div>
		<div class="pet_comment_list">
			<div class="pet_comment_list_wap"><div class="pet_comment_list_title">精彩评论</div>

				<div data-am-widget="tabs" class="am-tabs am-tabs-default pet_comment_list_tab" >
					<ul class="am-tabs-nav am-cf pet_comment_list_title_tab">
						<li class="am-active"><a href="[data-tab-panel-0]">人气</a></li>
						<li class=""><a href="[data-tab-panel-1]">最新</a></li>
						<li class=""><a href="[data-tab-panel-2]">最早</a></li>
					</ul>
				</div>

				</div>
			</div>

		</div>
    <div class="col-md-2" id="author">

    </div>
	</div>


<div id="backtohome" class="canclick"><span id="back">回到入口</span><span><</span></div>

<script src="<?php echo base_url()?>js/amazeui.min.js"></script>
<script src="<?php echo base_url()?>js/detail.js"></script>
<script>
    var homeurl="<?php echo site_url('Home')?>";
</script>
<!--<script>
	$(function(){

		// 动态计算新闻列表文字样式
		auto_resize();
		$(window).resize(function() {
			auto_resize();
		});
		$('.am-list-thumb img').load(function(){
			auto_resize();
		});
		$('.pet_article_like li:last-child').css('border','none');
		function auto_resize(){
			$('.pet_list_one_nr').height($('.pet_list_one_img').height());
			// alert($('.pet_list_one_nr').height());
		}
		$('.pet_article_user').on('click',function(){
			if($('.pet_article_user_info_tab').hasClass('pet_article_user_info_tab_show')){
				$('.pet_article_user_info_tab').removeClass('pet_article_user_info_tab_show').addClass('pet_article_user_info_tab_cloes');
			}else{
				$('.pet_article_user_info_tab').removeClass('pet_article_user_info_tab_cloes').addClass('pet_article_user_info_tab_show');
			}
		});

		$('.pet_head_gd_ico').on('click',function(){
			$('.pet_more_list').addClass('pet_more_list_show');
		});
		$('.pet_more_close').on('click',function(){
			$('.pet_more_list').removeClass('pet_more_list_show');
		});
	});

</script>-->
</body>
</html>