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
	
</div>		
	
<table class="table table-striped table-bordered table-hover search-form">
	<thead>
		<th><input name="name" type="text" placeholder="输入用户名" value="<?php echo I('name');?>" /></th>
		<th><input name="tel" type="text" placeholder="输入手机号码" value="<?php echo I('tel');?>" /></th>
		<th>
			<a class="btn btn-primary" href="javascript:;" id="search" url="<?php echo U('Member/index');?>">查询</a>
			
			<button type="submit" name="subtype" id="export" url="<?php echo U('Member/export');?>" class="btn btn-white btn-exp"> <i class="icon-cloud-upload"></i> 导 出 </button> 
			
		</th>
	</thead>
</table>	
	
<div class="row">
	<div class="col-xs-12">	
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>											
						<th>用户名</th>
						<th>手机号码</th>  
						<th>是否分销</th>
						<th>上级</th>
						<th>创建时间</th>
						<th>最后登录</th>
						<th>状态</th>
						<th>操作</th>				
					</tr>
				</thead>
				<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><tr>							
							<td><?php echo ($m["uname"]); ?></td>
							<td><?php echo ($m["telephone"]); ?></td>
							<td>
								<?php if($m['comsiss_flag'] == 1){ ?>
								<span class="red">分销商</span>
								<?php  }else{ ?>
								普通会员
								<?php } ?>
							</td>
							<td>
								<?php if($m['share_id'] == 0){ ?>
									平台推荐
								<?php }else { ?>
									<?php $member_info = M('member')->field('name')->where( array('member_id' => $m['share_id']) )->find(); ?>
									<span class="blue"><?php echo $member_info['name']; ?></span>
								<?php } ?>
							</td>
							
							<td><?php echo empty($m['create_time'])?'无':date('Y-m-d H:i:s',$m['create_time']); ?></td>
							
							<td><?php echo empty($m['last_login_time'])?'无':date('Y-m-d H:i:s',$m['last_login_time']); ?></td>
							<td>
								<?php
 switch($m['status']){ case '1': echo '<span class="green bold">启用</span>'; break; case '0': echo '<span class="red bold">禁用</span>'; break; } ?>
							</td>
							<td>
								<a  class="btn btn-xs btn-info" href='<?php echo U("Member/info",array("id"=>$m["member_id"]));?>'>
									<i class="icon-eye-open bigger-120"></i>查看详情
								</a> 
								<?php if($m['comsiss_flag'] == 0){ ?>
								<a class="delete btn btn-xs btn-danger" href='<?php echo U("Member/fencommiss",array("id"=>$m["member_id"]));?>' >
									升级为分销商
								</a>
								<?php } ?>
							</td>
						</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>	
						
						<tr>
							<td colspan="20" class="page"><?php echo ($page); ?></td>
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
		
		
<script>
$(function(){
	$("#export").click(function(){
		 var url = $(this).attr('url');
        var query = $('.search-form').find('input,select').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g, '');
        query = query.replace(/^&/g, '');
        if (url.indexOf('?') > 0) {
            url += '&' + query;
        } else {
            url += '?' + query;
        }
        window.open(url);
	})
	
	$("#search").click(function () {
        var url = $(this).attr('url');
        var query = $('.search-form').find('input,select').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g, '');
        query = query.replace(/^&/g, '');
        if (url.indexOf('?') > 0) {
            url += '&' + query;
        } else {
            url += '?' + query;
        }
        window.location.href = url;
    });
	
	
});		
</script>
		
	</body>
</html>