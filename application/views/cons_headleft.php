<!DOCTYPE html>
<html lang="en">
<head>
<title>业务管理系统</title>
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
          <a href="<?php echo base_url('index.php/consBasic');?>" class="left_menu">管理首页</a><br />
          <a href="<?php echo base_url('index.php/consConsult');?>" class="left_menu">咨询管理</a><br />
          <a href="#" class="left_menu">申请管理</a><br />
          <a href="#" class="left_menu">调查管理</a><br />
          <a href="#" class="left_menu">企业信息</a><br />
          <a href="#" class="left_menu">密码设置</a>
          <a href="<?php echo base_url('index.php/consBasic/logout');?>" class="left_menu">安全退出</a>
      </div>
    </div>
   </div>
  