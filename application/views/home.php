<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyPet</title>
<link rel="stylesheet" href="<?php echo base_url()?>css/home.css">
<?php  
	$this->load->view('libs');
?>
<script src="<?php echo base_url()?>js/home.js"></script>
</head>
<body>
<?php  
	$this->load->view('head');
?>

<div class="container-fluid">
<div class="row" id="home_content">
<div class="col-md-7 col-sm-7" class="flex_center">
<img src="<?php echo base_url()?>images/timg.jpg" alt="" id="homeimg">

</div>
<div class="col-md-5 col-sm-5" id="homelist">
<ul>
<li id="listtitle">欢迎，请选择您要前往的区域</li>
<li class="canclick dongtai">化猫街</li>
<li class="canclick dongtai">灵狗屋</li>
<li class="canclick dongtai">仓鼠营</li>
<li class="canclick dongtai">大广场</li>
</ul>

<script>
 var caturl = "<?php echo site_url('Cat')?>";
</script>
</div>
	</div>
</div>
</body>
</html>