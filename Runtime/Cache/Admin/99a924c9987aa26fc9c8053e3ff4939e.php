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
		<a href="<?php echo U('SellerManage/addexpress');?>" class="btn btn-primary">新增</a>

	</div>	
	
<div class="row">
	<div class="col-xs-12">
		<div class="alert alert-block alert-success">
			请<a href="http://pinduoduo.liofis.com/ExpressCode.xls" target="_blank">点击下载快递简码</a>填写对应快递的简码，否则查询将失败<br>
		</div>
	</div>
	<div class="col-xs-12 search-row">
		<div class="panel-body">
			<ul class="nav nav-tabs">
				<li <?php if($type == 0){ ?>class="active" <?php } ?>><a href="<?php echo U('SellerManage/express');?>">全部快递</a></li>
				<li <?php if($type == 1){ ?>class="active" <?php } ?>><a href="<?php echo U('SellerManage/config');?>">快递参数配置</a></li> 
			</ul>
		</div>
	</div>
	<div class="col-xs-12">	
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>											
						<th>快递名称</th>
						<th>快递简码</th>
						<th>添加时间</th>  
						<th>操作</th>				
					</tr>
				</thead>
				<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
							
							<td><?php echo ($data["express_name"]); ?></td>
							<td><?php echo ($data["jianma"]); ?></td>
							<td><?php echo date('Y-m-d H:i:s', $data['addtime']); ?></td>
							<td>
								<a  class="btn btn-xs btn-info" href='<?php echo U("SellerManage/editexpress",array("id"=>$data["id"]));?>'>
									<i class="icon-edit bigger-120"></i>
								</a> 
								<a class="delete btn btn-xs btn-danger" href='<?php echo U("SellerManage/delexpress",array("id"=>$data["id"]));?>' >
									<i class="icon-trash bigger-120"></i>
								</a>
							</td>
						</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>	
						
						<tr>
							<td colspan="5" class="page"><?php echo ($page); ?></td>
						</tr>
				</tbody>
				
			</table>
		</div>
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
		
		
								
				
	</body>
</html>