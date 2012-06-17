<!DOCTYPE html>
<html lang="en">
<head>
<title>业务系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://localhost/wordpress/danbotong/images/home-view-style.css" rel="stylesheet" type="text/css" />

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
          <a href="#" class="left_menu">业务首页</a><br />
          <a href="#" class="left_menu">担保咨询</a><br />
          <a href="#" class="left_menu">担保申请</a><br />
          <a href="#" class="left_menu">协助调查</a><br />
          <a href="#" class="left_menu">企业基本信息</a><br />
          <a href="#" class="left_menu">密码设置</a>
      </div>
    </div>
   </div>
  
   <div class="midarea">
    <div>
		<?php echo $output; ?>
        <br/>
                <a href="<?php echo base_url('index.php/homeConsult');?>">返回</a>
    </div>
  </div>
  
  
  
 <div id="fotter">
  <div class="fotter_copyrights">
    <div align="center"></div>
  </div>
</div> 
  
  
   
</div>
    







</div>

</body>
</html>