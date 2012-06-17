<!DOCTYPE html>
<html lang="en">
<head>
<title>业务系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://localhost/wordpress/danbotong/images/home-view-style.css" rel="stylesheet" type="text/css" />
<?php 
if ($css_files != null) {
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; } ?>
<?php 
if ($js_files != null) {
foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; } ?>
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
  <div class="left">
    <div class="left_menutop"></div>
    <div class="left_menu_area">
      <div align="right">
          <a href="<?php echo base_url('index.php/homeBasic');?>" class="left_menu">业务首页</a><br />
          <a href="<?php echo base_url('index.php/homeConsult');?>" class="left_menu">担保咨询</a><br />
          <a href="#" class="left_menu">担保申请</a><br />
          <a href="#" class="left_menu">协助调查</a><br />
          <a href="#" class="left_menu">企业基本信息</a><br />
          <a href="#" class="left_menu">密码设置</a>
          <a href="<?php echo base_url('index.php/homeBasic/logout');?>" class="left_menu">安全退出</a>
      </div>
    </div>
   </div>
  