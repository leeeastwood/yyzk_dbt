<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Box HTML Code</title>

<link href="<?php echo base_url('images/login-box.css');?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div style="padding: 100px 0 0 250px;">
<div id="login-box">

<H2>哈尔滨企业信用担保中心</H2>
<H2>担保通用户系统</H2>

<br />
<H10><?php echo validation_errors(); ?></H10>
<?php echo form_open('verifylogin'); ?>
<div id="login-box-name" style="margin-top:20px;">用户名:</div>
<div id="login-box-field" style="margin-top:20px;">
<input name="username" class="form-login" id="username" value="" size="30" maxlength="2048" />
</div>
<div id="login-box-name">密码:</div>
<div id="login-box-field"><input name="password" type="password" class="form-login" id="password" value="" size="30" maxlength="2048" /></div>

<br />
<span class="login-box-options">
<a href="#" style="margin-left:30px;">忘记密码?</a>
</span>
<br />
<br />

<INPUT type="image" height=42 width=103 src="<?php echo base_url('images/login-btn.png');?>" style="margin-left:90px;" align=absMiddle border=0 name=RedImg onclick="this.form.submit()"> 
<span class="login-box-options2">
<a href="<?php echo base_url('index.php/register/index/add');?>" style="margin-left:30px;">用户注册</a>
</span>
<a href="<?php echo base_url('index.php/adminLogin');?>" style="margin-left:30px;">管理</a>

</form>

</div>

</div>

</body>
</html>
