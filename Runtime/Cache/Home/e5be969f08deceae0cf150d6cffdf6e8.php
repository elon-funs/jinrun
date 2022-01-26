<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8">
	<meta name="description" content="<?php echo ((isset($meta_description) && ($meta_description !== ""))?($meta_description):''); ?>">
	<meta name="keywords" content="<?php echo ((isset($meta_keywords) && ($meta_keywords !== ""))?($meta_keywords):''); ?>">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="telephone=no" name="format-detection">
	<meta content="email=no" name="format-detection">
	<meta content="black" name="apple-mobile-web-app-status-bar-style">
	<title><?php echo ((isset($title) && ($title !== ""))?($title):''); echo C('SITE_TITLE'); ?></title>
	<script>!function(e){function t(){e.rem=m.getBoundingClientRect().width/16,m.style.fontSize=e.rem+"px"}var i,n=e.navigator.appVersion.match(/iphone/gi)?e.devicePixelRatio:1,a=1/n,m=document.documentElement,r=document.createElement("meta");if(e.dpr=n,e.addEventListener("resize",function(){clearTimeout(i),i=setTimeout(t,300)},!1),e.addEventListener("pageshow",function(e){e.persisted&&(clearTimeout(i),i=setTimeout(t,300))},!1),m.setAttribute("data-dpr",n),r.setAttribute("name","viewport"),r.setAttribute("content","initial-scale="+a+", maximum-scale="+a+", minimum-scale="+a+", user-scalable=no"),m.firstElementChild)m.firstElementChild.appendChild(r);else{var d=document.createElement("div");d.appendChild(r),document.write(d.innerHTML)}t()}(window)</script>
	
	<script src="/Common/js/jquery/jquery-2.0.3.min.js"></script>
	<link rel="stylesheet" href="/Common/css/style.css">
	
 <link href="/Themes/Home/default/Public/css/login.css" rel="stylesheet" type="text/css">	

</head>
<body>



<section id="content-container" class="container">
<div class="container">
	<div class="row">

	
		<?php if(isset($error)) { ?>		
			<div class="alert alert-danger" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <div id="fail"><?php echo $error; ?></div>
			</div>		
		<?php } ?>
		<div id="content" class="col-md-24 col-sm-24 col-xs-24">
			<h1>用户登录</h1>
			<p>没有账号？<a href="<?php echo U('/register');?>">立即注册</a></p>
			<form class="register" method="post" action="<?php echo U('/login');?>">
				<div class="left">
					
					<div class="content">
						<table class="form">
				        <tr>
				          <td>用户名 / E-mail<span class="required"> *</span></td>
						</tr>
						
						<tr>
				          <td><input class="form-control" type="text" name="uname" value="<?php echo ($uname); ?>" />
				            
				            </td>
				        </tr>
					
				        <tr>
							<td>密码<span class="required"> *</span></td>
						</tr>
						<tr>
				          <td><input class="form-control" type="password" name="pwd" value="<?php echo ($pwd); ?>" />
				           </td>
				        </tr>
				      
				        <tr>
							<td>验证码<span class="required"> *</span></td>
						</tr>
						<tr>
				          <td><input class="form-control" type="text" name="code" />
				            
				            </td>
				        </tr>
				        <tr>
							<td><img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('Public/verify');?>"></td>
						</tr>
						<tr>
							<td><a href="<?php echo U('/forgot');?>">忘记密码?</a></td>
						</tr>
				        
						</table>
						    <div class="buttons">
						      <div class="left">
						        <input type="submit" value="提交" class="btn btn-primary btn-continue" />
						      </div>
						    </div>
					</div>
					
				</div>				
			</form>
		</div>
		
	</div>	
</div>	
</section>
<style>
	.verifyimg{cursor:pointer;}
</style>
<script>
	//刷新验证码
	var verifyimg = $(".verifyimg").attr("src");
    $(".reloadverify").click(function(){
        if( verifyimg.indexOf('?')>0){
            $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
        }else{
            $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
        }
    });	
</script>
<?php W('Share/common_share');?>