<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo C('SITE_NAME'); ?>-后台管理中心</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link href="./Themes/Admin/Public/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="./Themes/Admin/Public/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="./Themes/Admin/Public/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->
		
		<link type="image/x-icon" href="<?php echo resize(C('SITE_ICON'),16,16); ?>" rel="icon">
		<link type="image/x-icon" href="<?php echo resize(C('SITE_ICON'),16,16); ?>" rel="bookmark">
		
		<link rel="stylesheet" href="./Themes/Admin/Public/css/ace.min.css" />
		<link rel="stylesheet" href="./Themes/Admin/Public/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="./Themes/Admin/Public/css/ace-skins.min.css" />
		
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="./Themes/Admin/Public/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="./Themes/Admin/Public/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="./Themes/Admin/Public/js/html5shiv.js"></script>
		<script src="./Themes/Admin/Public/js/respond.min.js"></script>
		<![endif]-->
		
		
			<style>
				.search-row {margin-bottom: 10px;}
			</style>
				
		
	</head>

	<body class="navbar-fixed">
		<div class="navbar navbar-default navbar-fixed-top" id="navbar">
			
			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="<?php echo U('Index/index');?>" class="navbar-brand">
						<small>
							<!--
							<i class="icon-leaf"></i>
							-->
							<?php echo C('SITE_NAME'); ?> 后台管理
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="black">
							<a target="_blank" class="btn btn-primary" href="http://mp.weixin.qq.com/s?__biz=MzI1MTA3NzA3NA==&mid=100000010&idx=1&sn=99efda89f086b2d70ed06b7fb59d3526&chksm=69f9c9b75e8e40a1ed0ac03c3901adef00d1667dc05a4bde5798a3e2e31c5fc4853c874db592&scene=18#wechat_redirect">常见帮助</a>
						</li>
						<li class="light-blue">
							<a target="_blank" class="btn btn-primary" href="/?front=1">pc宣传站</a>
						</li>
						<li class="light-blue">
							<a href="<?php echo U('Public/clear');?>" class="btn btn-primary">清空缓存</a>
						</li>
						<li class="light-blue">
							<a href="<?php echo U('Public/logout');?>" class="btn btn-primary">退出系统</a>
						</li>
						<li class="light-blue">
							<a  href="#" >
								<?php echo session('user_auth.username'); ?>
							</a>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar sidebar-fixed" id="sidebar">					
			
					<?php W('Menu/menu_show');?>
					

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')
					}catch(e){}
					
					</script>
				</div>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#"><?php echo ($breadcrumb1); ?></a>
							</li>
							<li class="active"><?php echo ($breadcrumb2); ?></li>
							
						</ul><!-- .breadcrumb -->

						
					</div>

					<div class="page-content">
						
							
<div class="page-header">
		<h1>
			商家管理
			<small>
				<i class="icon-double-angle-right"></i>
				<?php echo ($crumbs); ?>
			</small>
		</h1>
	</div>
<div class="row">
	<div class="col-xs-12">	
		<form class="form-horizontal"  id="validation-form" method="post" action='<?php echo U("SellerManage/add");?>'>
			
			<div class="form-group required">
                <label class="col-sm-2 control-label" for="input-image">
                <span title="" data-toggle="tooltip" data-original-title="上传800x800的图片">LOGO：</span>
                </label>
                
                <div class="col-sm-10" id="thumb">
                  <a href="#" data-toggle="image" class="img-thumbnail">
                  	<img osctype="image" src="/Common/image/no_image_100x100.jpg" />
				  </a>
                  <input osctype="image_input" type="hidden" name="s_logo" value="" id="input-s_logo" />
            	</div>
            
            </div> 		
			<div class="form-group required">
				<label class="col-sm-2 control-label">用户名：</label>
				<div class="col-sm-10">
					<input  class="form-control" type="text" placeholder="用户名" name="s_uname"  value="" />
				</div>
			</div>	
			
			<div class="form-group required">
				<label class="col-sm-2 control-label">密码：</label>
				<div class="col-sm-10">
					<input  class="form-control" type="text" placeholder="密码" name="s_passwd"  value="888888" />
				</div>
			</div>
								
			<div class="form-group required">
				<label class="col-sm-2 control-label">店铺名称：</label>
				<div class="col-sm-10">
					<input  class="form-control" type="text" placeholder="店铺名称" name="s_true_name"  value="" />
				</div>
			</div>
			
			<div class="form-group required">
				<label class="col-sm-2 control-label">手机号码：</label>
				<div class="col-sm-10">
					<input  class="form-control" type="text" placeholder="手机号码" name="s_telephone"  value="" />
				</div>
			</div>
			
			<div class="form-group required">
				<label class="col-sm-2 control-label">客服电话：</label>
				<div class="col-sm-10">
					<input  class="form-control" type="text" placeholder="客服电话" name="s_mobile"  value="" />
				</div>
			</div>
			<div class="form-group required">
				<label class="col-sm-2 control-label">客服qq：</label>
				<div class="col-sm-6">
					<input  class="form-control" type="text" placeholder="客服qq" name="s_qq"  value="" />
				</div>
				<span class="help-inline col-sm-4">
					<span class="middle">请使用该QQ登录一次<a href="http://shang.qq.com" target="_blank">shang.qq.com</a></span>
				</span>
			</div>
			<div class="form-group required">
				<label class="col-sm-2 control-label">微信客服：</label>
				<div class="col-sm-10">
					<input  class="form-control" type="text" placeholder="微信客服" name="s_weixin"  value="" />
				</div>
			</div>
			<div class="form-group required">
				<label class="col-sm-2 control-label">支付宝：</label>
				<div class="col-sm-10">
					<input  class="form-control" type="text" placeholder="支付宝" name="s_alipay"  value="" />
				</div>
			</div>
			<div class="form-group required">
				<label class="col-sm-2 control-label">银行卡名称：</label>
				<div class="col-sm-10">
					<input  class="form-control" type="text" placeholder="银行卡名称" name="s_cardname"  value="" />
				</div>
			</div>
			<div class="form-group required">
				<label class="col-sm-2 control-label">银行卡账号：</label>
				<div class="col-sm-10">
					<input  class="form-control" type="text" placeholder="银行卡账号" name="s_cardnumber"  value="" />
				</div>
			</div>
			<div class="form-group required">
				<label class="col-sm-2 control-label">收款名称：</label>
				<div class="col-sm-10">
					<input  class="form-control" type="text" placeholder="收款名称" name="s_cardrealname"  value="" />
				</div>
			</div>
			 
			<div class="form-group">
				<label class="col-sm-1 control-label no-padding-left"> </label>	
				<div class="col-sm-11">
					<input name="send" type="submit" value="提交" class="btn btn-primary" />
				</div>
			</div>
		</form>
	</div>
</div>

						
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
				
				
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		
		<script src="/Common/js/jquery/jquery-2.0.3.min.js"></script>
		<script src="/Common/js/jquery/jquery-migrate-1.2.1.min.js"></script>
			
		<!-- <![endif]-->

		<!--[if IE]>
		<script src="/Common/js/jquery/jquery-1.10.2.min.js"></script>
		<script src="/Common/js/jquery/jquery-migrate-1.2.1.min.js"></script>
		<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='./Themes/Admin/Public/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="./Themes/Admin/Public/js/bootstrap.min.js"></script>
		<script src="./Themes/Admin/Public/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="./Themes/Admin/Public/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="./Themes/Admin/Public/js/ace-elements.min.js"></script>
		<script src="./Themes/Admin/Public/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script src="/Common/js/oscshop_common.js"></script>
		
		
<script src="/Common/fileupload/jquery.ui.widget.js"></script>
<script src="/Common/fileupload/jquery.fileupload.js"></script>
<script>
$(function(){
	
	$(document).delegate('a[data-toggle=\'image\']', 'click', function(e) {
		e.preventDefault();
		
		var index=$(this).attr('num');
				
		var element = this;
		
		if(index==undefined){
			$(element).popover({
				html: true,
				placement: 'right',
				trigger: 'manual',
				content: function() {
					return '<button type="button" id="thumb-image"  class="btn btn-primary"><i class="icon-edit"></i></button> <button type="button" id="button-clear" class="btn btn-danger"><i class="icon-trash"></i></button>';
				}
			});
		}else{
			$(element).popover({
				html: true,
				placement: 'right',
				trigger: 'manual',
				content: function() {
					return '<button type="button" n="'+index+'"  class="btn btn-primary button-image"><i class="icon-edit"></i></button> <button type="button" id="button-clear" class="btn btn-danger"><i class="icon-trash"></i></button>';
				}
			});
		}
		

		
		$(element).popover('toggle');	
		
		$('#thumb-image').on('click', function() {		
			
			$('#modal-image').remove();
			
			$('#form-upload').remove();
			
			$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input osctype="btn_upload_image" type="file" name="file" /></form>');
	
			$('#form-upload input[name=\'file\']').trigger('click');
			
			$(element).popover('hide');
			
			$('[osctype="btn_upload_image"]').fileupload({
				
	        	dataType: 'json',
	            url: "<?php echo U('Image/upload_image',array('dir'=>'seller'));?>",
	            add: function(e, data) {
	                $parent = $('#thumb');
	                $input = $parent.find('[osctype="image_input"]');
	                $img = $parent.find('[osctype="image"]');
	                data.formData = {old_blog_images:$input.val()};
	                $img.attr('src', "./Themes/Admin/Public/img/loading.gif");
	                data.submit();
	            },
	            done: function (e,data) {
					
	            	var image=data.result;
	            	
	            	
	                $parent = $('#thumb');
	                $input = $parent.find('[osctype="image_input"]');
	                $img = $parent.find('[osctype="image"]');
	                if(image) {
	                   // $img.prev('i').hide();
	                    $img.attr('src', ''+image.image_thumb);
	                    $img.show();
	                    $input.val(image.image);
	                } else {
	                    alert('上传失败');
	                }
	            }
   		 });
		});

		
	
		$('#button-clear').on('click', function() {
			$(element).find('img').attr('src', $(element).find('img').attr('data-placeholder'));
			
			$(element).parent().find('input').attr('value', '');
	
			$(element).popover('hide');
		});
	});
})
</script>

		
	</body>
</html>