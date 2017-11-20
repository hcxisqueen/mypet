<?php 
      require './common/admin.common.php';
     //根据链接地址获取到修改项的cate_id
    $new = $db->getOneData('news', '*', 'news_id=' . $_GET['news_id']);
    $picture  =$db->getOneData('user','user_picture, user_nick','user_id='.$new['user_id']);  
    // $commentlist = $db->getDatas('comment','*');
    $sql = 'SELECT c.*, u.user_nick, u.user_picture
            FROM comment AS c 
            LEFT JOIN user AS u ON c.comment_person_id = u.user_id 
            WHERE c.news_id= '. $new['news_id'];
            // echo $sql;
    $result = $db->dblink->query($sql);
    $commentlist = $result->fetch_all(MYSQLI_ASSOC);
 ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="css/amazeui.min.css">
    <title>内容页</title>
</head>
<body style="background:#ececec">
<div class="pet_mian" >
    <div class="pet_head">
  <header data-am-widget="header"
          class="am-header am-header-default pet_head_block">
      <div class="am-header-left am-header-nav ">
          <a href="./index.php" class="iconfont pet_head_jt_ico">&#xe601;</a>
      </div>
  
      <h1 class="am-header-title pet_article_user">
      <span class="pet_article_user_ico"><img src="<?=$picture['user_picture'] ? $picture['user_picture']:'img/a1.png';?>" alt="" class=""></span>
      <span class="pet_article_user_name"><?=$picture['user_nick'];?></span>
      </h1>
  
      <div class="am-header-right am-header-nav">
          <a href="javascript:;" class="iconfont pet_head_gd_ico">&#xe600;</a>
      </div>
  </header>
</div>



    <div class="pet_more_list"><div class="pet_more_list_block">
    <div class="iconfont pet_more_close">×</div>
    <div class="pet_more_list_block">
        <div class="pet_more_list_block_name">
            <div class="pet_more_list_block_name_title">阅读 Read</div>
            <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_xinxianshi pet_more_list_block_line_ico">&#xe601;</i>
                <div class="pet_more_list_block_line_font">新鲜事</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_zhangzhishi pet_more_list_block_line_ico">&#xe606;</i>
                <div class="pet_more_list_block_line_font">涨知识</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_kantuya pet_more_list_block_line_ico">&#xe607;</i>
                <div class="pet_more_list_block_line_font">看涂鸦</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_mengzhuanti pet_more_list_block_line_ico">&#xe603;</i>
                <div class="pet_more_list_block_line_font">萌专题</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_bk pet_more_list_block_line_ico">&#xe611;</i>
                <div class="pet_more_list_block_line_font">百科</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_wd pet_more_list_block_line_ico">&#xe60c;</i>
                <div class="pet_more_list_block_line_font">问答</div>
            </a>
 <div class="pet_more_list_block_name_title pet_more_list_block_line_height">服务 Service</div>
            <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_xinxianshi pet_more_list_block_line_ico">&#xe600;</i>
                <div class="pet_more_list_block_line_font">美容</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_zhangzhishi pet_more_list_block_line_ico">&#xe602;</i>
                <div class="pet_more_list_block_line_font">医院</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_kantuya pet_more_list_block_line_ico">&#xe604;</i>
                <div class="pet_more_list_block_line_font">店铺</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_sy pet_more_list_block_line_ico">&#xe610;</i>
                <div class="pet_more_list_block_line_font">摄影</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_xx pet_more_list_block_line_ico">&#xe612;</i>
                <div class="pet_more_list_block_line_font">学校</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_sz pet_more_list_block_line_ico">&#xe60f;</i>
                <div class="pet_more_list_block_line_font">水族</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_ms pet_more_list_block_line_ico">&#xe60e;</i>
                <div class="pet_more_list_block_line_font">猫舍</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_qs pet_more_list_block_line_ico">&#xe60b;</i>
                <div class="pet_more_list_block_line_font">犬舍</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_qt pet_more_list_block_line_ico">&#xe60d;</i>
                <div class="pet_more_list_block_line_font">其它</div>
            </a>
        </div>
    </div>

    </div></div>



<div class="pet_content">
<div class="pet_content_block">
  <article data-am-widget="paragraph" class="am-paragraph am-paragraph-default pet_content_article" data-am-paragraph="{ tableScrollable: true, pureview: true }">
  <input type="hidden" name="user_nick" id="user_nick" value="<?=$_SESSION['use_nick'];?>">
  <input type="hidden" name="news_id" id="news" value="<?=$new['news_id'];?>">
  <h1 class="pet_article_title"><?=$new['news_title'];?></h1>
  <div class="pet_article_user_time">发表于：<?=$new['news_create_date'];?></div>
        <img src="<?=$new['news_picture'];?>"><p class=paragraph-default-p><?=$new['news_content_text']?></p>

  </article>
        <ul class="like_share_block">
        <li id="praise" news_id='<?=$new['news_id'];?>'><a class="link_share_button"  href="###"><i class="iconfont share_ico_link">&#xe62f;</i><span id="praise_num"><?=$new['praise_num'];?></span></a></li>
        <li id="commentli"><a class="link_share_button"  href="###"><i class="iconfont share_ico_wx"></i><span id="comment">评论</span></a></li>
        <li id="shareli"><a class="link_share_button" id="friend" href="#"><i class="iconfont share_ico_pyq">&#xe62e;</i><span id="share">分享</span></a></li>
       
      </ul>
    <div class="pet_article_dowload">
      <div class="pet_article_dowload_title">关于Amaze UI</div>
      <div class="pet_article_dowload_content"><div class="pet_article_dowload_triangle"></div>
      <div class="pet_article_dowload_ico"><img src="img/footdon.png" alt=""></div>
      <div class="pet_article_dowload_content_font">
Amaze UI 以移动优先（Mobile first）为理念，从小屏逐步扩展到大屏，最终实现所有屏幕适配，适应移动互联潮流。
      </div>
      <div class="pet_article_dowload_all">
        <a href="###" class="pet_article_dowload_Az am-icon-apple"> App store</a>
        <a href="###" class="pet_article_dowload_Pg am-icon-android"> Android</a>
      </div>
      </div>
  </div>
</div>
<!--评论-->
<div style="height:100px;display:none;" id="comment_div">
  <textarea style="width:640px; margin-top:20px;" id="comment_content" name="comment_content"></textarea>
  <button type="button" style="float:right;margin-top:10px;" id="show">发表</button>
</div>

<!--分享-->
<div style="height:100px;display:none;" id="share_div">
  <input style="width:640px; margin-top:20px;" id="share_content" name="share_content" placeholder="转发理由">
   <input type="hidden" name="user_id" id="user_id" value="<?=$_SESSION['user_id'];?>">
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
      <?php 
          foreach ($commentlist as $key => $value) {     
       ?>
       
          <div  data-tab-panel-0 class="am-tab-panel am-active">
            <div class="pet_comment_list_block">
              <div class="pet_comment_list_block_l"><img style="height:50px" src="<?=$value['user_picture'];?>" alt=""></div>
              <div class="pet_comment_list_block_r">
                <div class="pet_comment_list_block_r_info"><?=$value['user_nick'];?></div>
                <div class="pet_comment_list_block_r_text"><?=$value['comment_content'];?></div>
                <div class="pet_comment_list_block_r_bottom">
                  <div class="pet_comment_list_bottom_info_l"><?=$value['comment_time'];?></div>
                  <div class="pet_comment_list_bottom_info_r">                                
                </div>
              </div>
            </div>
                       
          </div>

       <?php 
          }
        ?>
  </div>
</div>

  </div>
    </div>
</div>
</div>
<div class="pet_article_footer_info">Copyright(c)2015 Amaze UI All Rights Reserved</div>
</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/amazeui.min.js"></script>
<script src="js/content.js"></script>
<script>
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

</script>
</body>
</html>