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
						
							
<div class="col-xs-12"> 
    	<div class="panel panel-info">
			<div class="panel-heading">筛选</div>
			<form name="order_search"  method="get" >
			    <div class="panel-body"> 
			      <div class="col-xs-12 search-row">
						<div class="col-sm-3">
							<span class="form-label">所属商家：</span> 
							<select name="seller_id" class="combox select_width">
								<option value="0">-全部-</option>
								<?php foreach($seller_list as $seller){ ?>
								<option value="<?php echo $seller['s_id']; ?>"  <?php if(isset($post_data['seller_id']) && $post_data['seller_id'] == $seller['s_id']){ ?> selected <?php }?>><?php echo $seller['s_true_name']; ?></option>
								<?php } ?>
							</select> 
						 </div>
			       		<div class="col-sm-3">
			        		<span class="form-label">开始时间：</span>
			        		<input type="text" name="begin_time" value="<?php if(!empty($post_data['begin_time'])){ echo $post_data['begin_time']; } ?>" id="begin_time" class="datetimepicker data_input">
			        	</div> 
				       	<div class="col-sm-3">
				       			<span class="form-label">结束时间：</span>
				        		<input type="text" name="end_time" value="<?php  if(!empty($post_data['end_time'])){ echo $post_data['end_time']; } ?>" id="end_time" class="datetimepicker data_input">
				        </div> 
						<div class="col-sm-3"> 
							 <input type="hidden" name="c" value="Balance" />
							 <button type="submit" name="subtype"  value="search" class="btn btn-white btn-search"> <i class="icon-search"></i> 检 索 </button>
						</div>
			      </div>
			  </div>
			</form>
		</div>
</div>
<div class="row">
	<div class="col-xs-12">	
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>											
						<th>ID</th>
						<th>卖家</th>
						<th>可提现金额</th>			
						<th>结算日期</th> 
						<th>总金额</th>	
						<th>结算金额</th>			
						<th>扣除金额</th>			
						<th>结算状态</th>
						<th>收款银行</th>
						<th>收款账号</th>
						<th>操作</th>				
					</tr>
				</thead>
				<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>						
							<td><?php echo ($data["bid"]); ?></td>
							<td>
								<?php echo $data['seller']['s_true_name']; ?>
							</td>
							<td>
								<?php echo $seller_money_arr[$data['seller_id']]['money']; ?> 元
							</td>
							<td>
								<?php echo date('Y-m-d H:i:s',$data['balance_time']); ?>
							</td>
							<td><?php echo $data['money']+$data['redusmoney']; ?>元</td>
							<td><?php echo ($data["money"]); ?>元</td>
							<td><?php echo ($data["redusmoney"]); ?>元</td>
							<td>
								<?php if($data['state'] == 0){ ?>
									<span class="blue">商家未确认</span>
								<?php }else if($data['state'] == 1){ ?>
									<span class="red">商家已确认，平台准备审核</span>
								<?php }else if($data['state'] == 2){ ?>
								<span class="green">平台已确认，资金转入余额</span>
								<?php } ?>
							</td>
							
							<td>
								<?php echo $data['seller']['s_cardname']; ?>
							</td>
							<td>
								<?php echo $data['seller']['s_cardnumber']; ?>
							</td>
							<td>
								<?php if($data['state'] == 1){ ?>
								<a class="delete btn btn-xs btn-danger" href='<?php echo U("Balance/suremoney",array("bid"=>$data["bid"]));?>' >
									<i class="icon-edit bigger-120">确认无误</i>
								</a>
								<?php } ?>
								
								<a  class="btn btn-xs btn-info" href='<?php echo U("Balance/orderlook",array("bid"=>$data["bid"]));?>'>
									<i class="icon-edit bigger-120">查看结算详情</i>
								</a> 
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
		
		
<script src="/Common/js/moment/moment.js"></script>
<script src="/Common/js/moment/locale/zh-cn.js"></script> 

<script src="/Common/js/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
<link rel="stylesheet" href="/Common/js/bootstrap-timepicker/css/bootstrap-timepicker.css" />

<script>	

$(function(){
		$('#begin_time').datetimepicker({
		 format: 'YYYY/MM/DD H:mm:ss',//use this option to display seconds
		 icons: {
			time: 'btn btn-lg icon-time',
			date: 'btn btn-lg icon-calendar',
			up: 'fa icon-chevron-up',
			down: 'fa icon-chevron-down',
			previous: 'fa icon-chevron-left',
			next: 'fa icon-chevron-right',
			today: 'fa icon-arrows ',
			clear: 'fa icon-trash',
			close: 'fa icon-times'
		 }
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
		$('#end_time').datetimepicker({
			 format: 'YYYY/MM/DD H:mm:ss',//use this option to display seconds
			 icons: {
				time: 'btn btn-lg icon-time',
				date: 'btn btn-lg icon-calendar',
				up: 'fa icon-chevron-up',
				down: 'fa icon-chevron-down',
				previous: 'fa icon-chevron-left',
				next: 'fa icon-chevron-right',
				today: 'fa icon-arrows ',
				clear: 'fa icon-trash',
				close: 'fa icon-times'
			 }
			}).next().on(ace.click_event, function(){
				$(this).prev().focus();
			});
})
</script>
		
	</body>
</html>