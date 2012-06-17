<!DOCTYPE html>
<html lang="en">
<head>
<title>用户注册</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://localhost/wordpress/danbotong/images/home-view-style.css" rel="stylesheet" type="text/css" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
</head>
<body>
<div id="container">

<div id="topheader">
   <div class="logo"></div>
</div>

<div id="body_area">
  
   <div class="midarea">
    <div>
        返回登录界面，请点击：<a href="<?php echo base_url('index.php/login');?>">登录</a>
		<?php echo $output; ?>
    </div>
  </div>
  
  
  
 <div id="fotter">
  <div class="fotter_copyrights">
    <div align="center">哈尔滨企业信用担保中心版权所有. All Rights Reserved</div>
  </div>
</div> 
  
  
   
</div>
    







</div>

</body>
</html>