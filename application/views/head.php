

<link rel="stylesheet" href="<?php echo base_url()?>css/head.css">
	<div class="container-fluid setbackground col-md-12">
	<div class="row" id="headdiv">
<div class="col-md-6"><img src="<?php echo base_url()?>images/title.png" alt=""></div>
<?php 
$nick_name=$this->session->userdata('nick_name');


if(!$nick_name){
	echo "<div class='col-md-6' id='userhomediv'><span id='loginbtn' class='canclick'>登陆 / 注册</span></div>";
}else{
	$userhomeimg=base_url()."images/user_home.png";
	echo "<div class='col-md-6 canclick' id='userhomediv'><div id='userhome_show' class='flex_center'><img src='$userhomeimg' id='user_homeicon'><span id='user_homename'>$nick_name</span><div id='userhome_hidden'><div class='flex_center userhomehiddenone'>个人中心</div><div class='flex_center userhomehiddenone' id='logout'>退出登陆</div></div></div></div>";
}


 ?>

	</div>




	</div>
	<script>

var loginurl="<?php echo site_url('IndexControler')?>";
   $('#loginbtn').click(function() {
        window.location.href = loginurl;
    })

   $('#userhomediv').hover(function(){
   		$('#userhome_hidden').css('display','block');
   },function(){
$('#userhome_hidden').css('display','none');
   })

   $('.userhomehiddenone').hover(function(){
   	$(this).css('background','#F00F24');
   	$(this).css('color','white');
   },function(){
   		$(this).css('background','white');
   			$(this).css('color','black');
   })

   //退出登陆
  var logouturl="<?php echo site_url('Logout')?>";

 $("#logout").click(function(){
   		  $.ajax({
                    url: logouturl,
                    type: 'POST',
                    dataType: 'json',
                  

                    success: function(data) {

                    },
                    erorr:function(erorr){
                	
                    }
                });
   		  location.reload();
   		
   })
	</script>
