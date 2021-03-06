<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>登录 - 商家管理系统</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="./Themes/Seller/Public/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="./Themes/Seller/Public/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="./Themes/Seller/Public/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- ace styles -->

		<link rel="stylesheet" href="./Themes/Seller/Public/css/ace.min.css" />
		<link rel="stylesheet" href="./Themes/Seller/Public/css/ace-rtl.min.css" />
		<link type="image/x-icon" href="/Common/image/ypci.jpg" rel="icon">
  		<link type="image/x-icon" href="/Common/image/ypci.jpg" rel="bookmark">
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="./Themes/Seller/Public/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="./Themes/Seller/Public/js/html5shiv.js"></script>
		<script src="./Themes/Seller/Public/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<style>
		.btn-group-vertical>.btn-group:after, .btn-group-vertical>.btn-group:before, .btn-toolbar:after, .btn-toolbar:before, .clearfix:after, .clearfix:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .form-horizontal .form-group:after, .form-horizontal .form-group:before, .modal-footer:after, .modal-footer:before, .modal-header:after, .modal-header:before, .nav:after, .nav:before, .navbar-collapse:after, .navbar-collapse:before, .navbar-header:after, .navbar-header:before, .navbar:after, .navbar:before, .pager:after, .pager:before, .panel-body:after, .panel-body:before, .row:after, .row:before {
		    content: " ";
		    display: table;
		}
		.panel {
		    margin-bottom: 20px;
		    background-color: #fff;
		    border: 1px solid transparent;
		    border-radius: 4px;
		    box-shadow: 0 1px 1px rgba(0,0,0,.05);
		}
		.panel-default {
		    border-color: #ddd;
		}
		.panel {
		    margin-top: 20px;
		    border: 1px solid #e2e2e2;
		    background: #fff;
		}
		.panel-body {
		    padding: 15px;
		}
		.page-header {
		    padding-bottom: 9px;
		    margin: 40px 0 20px;
		    border-bottom: 1px solid #eee;
		}
		.nav_logo {
		    background: url(/Common/image/pdd_small.png) no-repeat;
		}
		.nav_logo, .nav_logo_p {
		    display: inline-block;
		    width: 250px;
		    height: 32px;
		    margin-bottom: -5px;
		    font: 0/0 a;
		}
		.form-group {
		    margin-bottom: 15px;
		}
		.form-horizontal .form-group {
		    margin-left: -15px;
		    margin-right: -15px;
		}
		.input-group {
		    position: relative;
		    display: table;
		    border-collapse: separate;
		}
		.input-group-addon, .input-group-btn, .input-group .form-control {
		    display: table-cell;
		}
		.input-group-addon, .input-group-btn {
		    width: 1%;
		    white-space: nowrap;
		    vertical-align: middle;
		}
		.input-group-btn {
		    font-size: 0;
		    white-space: nowrap;
		}
		.input-group-btn, .input-group-btn>.btn {
		    position: relative;
		}
		.form-control, output {
		    display: block;
		    font-size: 14px;
		    line-height: 1.42857143;
		    color: #555;
		}
		.form-control {
		    width: 100%;
		    height: 34px;
		    padding: 6px 12px;
		    background-color: #fff;
		    background-image: none;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		}	
		.input-group .form-control {
		    position: relative;
		    z-index: 2;
		    float: left;
		    width: 100%;
		    margin-bottom: 0;
		}
		.btn {
		    display: inline-block;
		    margin-bottom: 0;
		    font-weight: 400;
		    text-align: center;
		    vertical-align: middle;
		    touch-action: manipulation;
		    cursor: pointer;
		    background-image: none;
		    border: 1px solid transparent;
		    white-space: nowrap;
		    padding: 6px 12px;
		    font-size: 14px;
		    line-height: 1.42857143;
		    border-radius: 4px;
		    -webkit-user-select: none;
		    -moz-user-select: none;
		    -ms-user-select: none;
		    user-select: none;
		}
		.btn-default {
		    color: #333;
		    background-color: #fff !important;
		    border-color: #ccc;
		}
		.input-group-btn, .input-group-btn>.btn {
		    position: relative;
		}
		.input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group {
		    margin-right: -1px;
		}
		.glyphicon {
			color: #333;
		    position: relative;
		    top: 1px;
		    display: inline-block;
		    font-family: Glyphicons Halflings;
		    font-style: normal;
		    font-weight: 400;
		    line-height: 1;
		    -webkit-font-smoothing: antialiased;
		    -moz-osx-font-smoothing: grayscale;
		}
		.glyphicon-user:before {
		    content: "\E008";
		}
		.glyphicon-lock:before {
		    content: "\E033";
		}
		.btn-block {
		    display: block;
		    width: 100%;
		}
		.btn.disabled, .btn[disabled], fieldset[disabled] .btn {
		    cursor: not-allowed;
		    opacity: .65;
		    filter: alpha(opacity=65);
		    box-shadow: none;
		}
		.has-success .form-control:focus {
		    border-color: #2b542c;
		    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #67b168;
		}	
		.input-group .form-control:focus {
		    z-index: 3;
		}
		

		.nav_logo {
			background: url(/Common/image/pdd_small2.png) no-repeat;
		}
	</style>
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content" style="margin:150px auto;">
				<div class="container">
					<div class="row">
						
							<!-- panel begin -->
							<div class="col-md-offset-1 col-md-10 row panel panel-default" style="padding:20px 40px 80px;">
								<div class="panel-body" data-reactid=".0.0.0.0.0.1:$0">
									<div class="col-md-6" data-reactid=".0.0.0.0.0.1:$0.0">
										<?php if(!empty($seller_backimage)){ ?>
										
										<img src="Uploads/image/<?php echo $seller_backimage; ?>" data-reactid=".0.0.0.0.0.1:$0.0.0">
										<?php }else { ?>
										<img width="400" src="/Common/image/pdd.png" data-reactid=".0.0.0.0.0.1:$0.0.0">
										<?php } ?>
									</div>
									
									<form action="<?php echo U('login');?>" method="post" class="form-horizontal col-md-6" data-reactid=".0.0.0.0.0.1:$0.1">
										<div style="text-align:center;" class="page-header" data-reactid=".0.0.0.0.0.1:$0.1.0">
											<h1 data-reactid=".0.0.0.0.0.1:$0.1.0.0">
												<?php if(!empty($admin_xxximage)){ ?>
												<a href="#Login" style="background:url(Uploads/image/<?php echo $admin_xxximage; ?>) no-repeat 0 0;" class="nav_logo" data-reactid=".0.0.0.0.0.1:$0.1.0.0.0"></a>
												<?php }else { ?>
												<a href="#Login" class="nav_logo" data-reactid=".0.0.0.0.0.1:$0.1.0.0.0"></a>
												<?php } ?>
											</h1>
										</div>
										<div data-reactid=".0.0.0.0.0.1:$0.1.1"></div>
										<div style="margin:0px 60px;" data-reactid=".0.0.0.0.0.1:$0.1.2">
											<div class="form-group" data-reactid=".0.0.0.0.0.1:$0.1.2.0">
												<div class="input-group" data-reactid=".0.0.0.0.0.1:$0.1.2.0.1:$input-group">
													<span class="input-group-btn" data-reactid=".0.0.0.0.0.1:$0.1.2.0.1:$input-group.1">
														<button type="button" class="btn btn-default" data-reactid=".0.0.0.0.0.1:$0.1.2.0.1:$input-group.1.0">
															<span class="glyphicon glyphicon-user" data-reactid=".0.0.0.0.0.1:$0.1.2.0.1:$input-group.1.0.0"></span>
														</button>
													</span>
													<input type="text" placeholder="请输入用户名或手机号" class="form-control" name="username" >
												</div>
											</div>
											<div class="form-group" data-reactid=".0.0.0.0.0.1:$0.1.2.1">
												<div class="input-group" data-reactid=".0.0.0.0.0.1:$0.1.2.1.1:$input-group">
													<span class="input-group-btn" data-reactid=".0.0.0.0.0.1:$0.1.2.1.1:$input-group.1">
														<button type="button" class="btn btn-default" data-reactid=".0.0.0.0.0.1:$0.1.2.1.1:$input-group.1.0">
															<span class="glyphicon glyphicon-lock" data-reactid=".0.0.0.0.0.1:$0.1.2.1.1:$input-group.1.0.0"></span>
														</button>
													</span>
													<input placeholder="密码" type="password" class="form-control" name="password" >
												</div>
											</div>
											<div data-reactid=".0.0.0.0.0.1:$0.1.2.2">
												<button  type="submit" class="btn-block btn" data-reactid=".0.0.0.0.0.1:$0.1.2.2.0">登录</button>
												<br/>
												<div class="check-tips" style="color:red;"></div>
											</div>
										</div>
									</form>
								</div>
								
							</div>
							<!-- panel end -->
							
						
					</div><!-- /.row -->
				</div>
			</div>
		</div><!-- /.main-container -->
		<div style="text-align:center; color:#ffffff;"><?php echo ($technical_support); ?></div>
		<div style="text-align:center; padding-bottom: 50px; color:#ffffff;">备案号：<a href="//beian.miit.gov.cn/" target="_blank" style="color:#ffffff;"><?php echo ($record_number); ?></a> </div> 

		<!-- basic scripts -->


		<script src="/Common/js/jquery/jquery-2.0.3.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			function show_box(id) {
			 jQuery('.widget-box.visible').removeClass('visible');
			 jQuery('#'+id).addClass('visible');
			}
		</script>
		<script type="text/javascript">
    	
    	//表单提交


    	$("form").submit(function(){
    		var self = $(this);
    		$.post(self.attr("action"), self.serialize(), success, "json");
    		return false;

    		function success(data){
    			if(data.status){
    				window.location.href = data.url;
    			} else {
    				self.find(".check-tips").text(data.info);
    				$('.check-tips').fadeIn();
    				setTimeout("$('.check-tips').fadeOut()",3000)
    				
    			}
    		}
    	});

	
    </script>
	</body>
</html>