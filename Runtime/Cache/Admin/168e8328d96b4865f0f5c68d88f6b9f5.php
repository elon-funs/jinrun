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
			<?php echo ($breadcrumb2); ?>
			<small>
				<i class="icon-double-angle-right"></i>
				基本信息
			</small>
		</h1>
	</div>
<div class="row">
	<div class="col-xs-12">	
		<form class="form-horizontal"  id="form" method="post" action="<?php echo U('Settings/save');?>">	
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab-general" data-toggle="tab">基本信息</a></li>  
				<li><a href="#tab-fenxiao" data-toggle="tab">分销参数配置</a></li>
				<li><a href="#tab-weixinkefu" data-toggle="tab">微信客服消息配置</a></li>
				<li><a href="#tab-goods" data-toggle="tab">商品参数配置</a></li>
				<li><a href="#tab-images" data-toggle="tab">图片参数配置</a></li>
				<li><a href="#tab-sms" data-toggle="tab">短信参数配置</a></li>
				<li><a href="#tab-kefu" data-toggle="tab">客服配置</a></li>						
			</ul>
			<div class="tab-content">
          	<!-- 常规 START -->
	          	<div class="tab-pane active" id="tab-general">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left">网站LOGO </label>
						<div class="col-sm-10">
							<div class="col-sm-10" id="thumb">
								  <a href="#" data-toggle="image" class="img-thumbnail">
									<img osctype="image" <?php if($site['SITE_ICON']['value']): ?>src="/<?php echo resize($site['SITE_ICON']['value'],100,100); ?>" 
										<?php else: ?> 
										src="/Common/image/no_image_40x40.jpg"<?php endif; ?>  />
										</a>
								  <input osctype="image_input" type="hidden" name="SITE_ICON" value="<?php echo ((isset($site["SITE_ICON"]["value"]) && ($site["SITE_ICON"]["value"] !== ""))?($site["SITE_ICON"]["value"]):''); ?>" id="input-image" />
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> * 网站标题 </label>
					<div class="col-sm-10">
						<div class="clearfix">
							<input name="SITE_TITLE" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SITE_TITLE"]["value"]) && ($site["SITE_TITLE"]["value"] !== ""))?($site["SITE_TITLE"]["value"]):''); ?>" type="text">
						</div>
					</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> * 网站名称 </label>
					<div class="col-sm-10">
						<div class="clearfix">
							<input name="SITE_NAME" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SITE_NAME"]["value"]) && ($site["SITE_NAME"]["value"] !== ""))?($site["SITE_NAME"]["value"]):''); ?>" type="text">
						</div>
					</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> * 网站描述 </label>
					<div class="col-sm-10">
						<div class="clearfix">
							<textarea name="SITE_DESCRIPTION" id="input-meta-description2" class="form-control" rows="5" ><?php echo ((isset($site["SITE_DESCRIPTION"]["value"]) && ($site["SITE_DESCRIPTION"]["value"] !== ""))?($site["SITE_DESCRIPTION"]["value"]):''); ?></textarea>
						</div>
					</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> * 微信APPID </label>
					<div class="col-sm-10">
						<div class="clearfix">
							<input name="APPID" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["APPID"]["value"]) && ($site["APPID"]["value"] !== ""))?($site["APPID"]["value"]):''); ?>" type="text">
						</div>
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> * 微信APPSECRET </label>
					<div class="col-sm-10">
						<div class="clearfix">
							<input name="APPSECRET" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["APPSECRET"]["value"]) && ($site["APPSECRET"]["value"] !== ""))?($site["APPSECRET"]["value"]):''); ?>" type="text">
						</div>
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> * 微信商户号 </label>
					<div class="col-sm-10">
						<div class="clearfix">
							<input name="MCHID" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["MCHID"]["value"]) && ($site["MCHID"]["value"] !== ""))?($site["MCHID"]["value"]):''); ?>" type="text">
						</div>
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 网址 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="SITE_URL" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SITE_URL"]["value"]) && ($site["SITE_URL"]["value"] !== ""))?($site["SITE_URL"]["value"]):''); ?>" type="text">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 公众号关注地址 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="SHORT_URL" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SHORT_URL"]["value"]) && ($site["SHORT_URL"]["value"] !== ""))?($site["SHORT_URL"]["value"]):''); ?>" type="text">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 系统版本 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="VERSION" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["VERSION"]["value"]) && ($site["VERSION"]["value"] !== ""))?($site["VERSION"]["value"]):''); ?>" type="text">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 联系电话 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="site_tel" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["site_tel"]["value"]) && ($site["site_tel"]["value"] !== ""))?($site["site_tel"]["value"]):''); ?>" type="text">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 工作时间 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="site_woketime" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["site_woketime"]["value"]) && ($site["site_woketime"]["value"] !== ""))?($site["site_woketime"]["value"]):''); ?>" type="text">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> QQ群 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="site_qqun" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["site_qqun"]["value"]) && ($site["site_qqun"]["value"] !== ""))?($site["site_qqun"]["value"]):''); ?>" type="text">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> copyright </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="copyright" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["copyright"]["value"]) && ($site["copyright"]["value"] !== ""))?($site["copyright"]["value"]):''); ?>" type="text">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> ICP备案号 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="SITE_ICP" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["SITE_ICP"]["value"]) && ($site["SITE_ICP"]["value"] !== ""))?($site["SITE_ICP"]["value"]):''); ?>" type="text">
							</div>
						</div>
					</div>
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 开启海淘</label>
						<div class="col-sm-10">
							<div class="clearfix">					
									<label class="radio-inline"><input <?php if($site['openhaitao']['value']==1){echo ' checked="checked"';} ?> type="radio" value="1" name="openhaitao">开启</label>	
									<label class="radio-inline"><input <?php if($site['openhaitao']['value']==0){echo ' checked="checked"';} ?> type="radio" value="0" name="openhaitao">关闭</label>				
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 站点状态</label>
						<div class="col-sm-10">
							<div class="clearfix">					
									<label class="radio-inline"><input <?php if($site['WEB_SITE_CLOSE']['value']==1){echo ' checked="checked"';} ?> type="radio" value="1" name="WEB_SITE_CLOSE">开启</label>	
									<label class="radio-inline"><input <?php if($site['WEB_SITE_CLOSE']['value']==0){echo ' checked="checked"';} ?> type="radio" value="0" name="WEB_SITE_CLOSE">关闭</label>				
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab-pane" id="tab-weixinkefu">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 免费送券标题 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="lottery_msg_title" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["lottery_msg_title"]["value"]) && ($site["lottery_msg_title"]["value"] !== ""))?($site["lottery_msg_title"]["value"]):''); ?>" type="text">
								
								<span class="help-inline ">
									<span class="middle red">插入标签："{uname}"可以获得会员名称，例如：{uname}恭喜您获得免单券一张 </span>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 免费送券描述 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="lottery_msg_desc" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["lottery_msg_desc"]["value"]) && ($site["lottery_msg_desc"]["value"] !== ""))?($site["lottery_msg_desc"]["value"]):''); ?>" type="text">
							</div>
						</div>
					</div>
					
					
					
				</div>
				<div class="tab-pane" id="tab-fenxiao">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 开启分销</label>
						<div class="col-sm-10">
							<div class="clearfix">					
									<label class="radio-inline"><input <?php if($site['opencommiss']['value']==1){echo ' checked="checked"';} ?> type="radio" value="1" name="opencommiss">开启</label>	
									<label class="radio-inline"><input <?php if($site['opencommiss']['value']==0){echo ' checked="checked"';} ?> type="radio" value="0" name="opencommiss">关闭</label>				
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 二维码X坐标 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="user_qrcode_x" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["user_qrcode_x"]["value"]) && ($site["user_qrcode_x"]["value"] !== ""))?($site["user_qrcode_x"]["value"]):''); ?>" type="text">
								<span class="help-inline ">
									<span class="middle red">背景图中放置的二维码位置，距离左上角的X坐标</span>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 二维码Y坐标 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="user_qrcode_y" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["user_qrcode_y"]["value"]) && ($site["user_qrcode_y"]["value"] !== ""))?($site["user_qrcode_y"]["value"]):''); ?>" type="text">
								<span class="help-inline ">
									<span class="middle red">背景图中放置的二维码位置，距离左上角的Y坐标</span>
								</span>
							</div>
						</div>
					</div>
					   
					<div class="form-group" id="goods-image-row7">
						<label class="col-sm-2 control-label no-padding-left">团长二维码背景 </label>
						<div class="col-sm-10" id="image-row7">
						  <a href="#" data-toggle="image" class="img-thumbnail" type="goods" id="thumb-image7" num="7">
							<img osctype="goods_image7" <?php if($site['user_qrcode_image']['value']): ?>src="/<?php echo resize($site['user_qrcode_image']['value'],100,100); ?>" 
								<?php else: ?> 
								src="/Common/image/no_image_40x40.jpg"<?php endif; ?>  />
								</a>
								<input osctype="goods_image_input7" type="hidden" name="user_qrcode_image" value="<?php echo ((isset($site["user_qrcode_image"]["value"]) && ($site["user_qrcode_image"]["value"] !== ""))?($site["user_qrcode_image"]["value"]):''); ?>" id="input-image7" />
							<span class="help-inline ">
								<span class="middle red"><b class="blue"><a href="javascript:;" id="clear_user_qrcode">清空会员二维码</a></b>超级团长二维码，用于分享邀请会员</span>
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 佣金满多少可提现 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="commiss_money_limit" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["commiss_money_limit"]["value"]) && ($site["commiss_money_limit"]["value"] !== ""))?($site["commiss_money_limit"]["value"]):''); ?>" type="text">
								<span class="help-inline ">
									<span class="middle red">团长佣金满多少可提现,0表示不限制</span>
								</span>
							</div>
						</div>
					</div>
					
				</div>
				<div class="tab-pane" id="tab-goods">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 减库存方式</label>
						<div class="col-sm-10">
							<div class="clearfix">					
								<label class="radio-inline"><input <?php if($site['kucun_method']['value']==0){echo ' checked="checked"';} ?> type="radio" value="0" name="kucun_method">拍下立减</label>	
								<label class="radio-inline"><input <?php if($site['kucun_method']['value']==1){echo ' checked="checked"';} ?> type="radio" value="1" name="kucun_method">支付完减</label>				
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 首页搜索关键词 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="index_searchkeywords" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["index_searchkeywords"]["value"]) && ($site["index_searchkeywords"]["value"] !== ""))?($site["index_searchkeywords"]["value"]):''); ?>" type="text">
							</div>
							<p style="color:red;line-height:30px;">多个关键词用逗号隔开，如：连衣裙,小白鞋</p>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 活动商品商家报名限制 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="subject_baom" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["subject_baom"]["value"]) && ($site["subject_baom"]["value"] !== ""))?($site["subject_baom"]["value"]):'0'); ?>" type="text">
							</div>
							<p style="color:red;line-height:30px;">每个活动商品，商家能报名的最大数量，"0"表示不限制</p>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 抽奖商品回收时间 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="expr_day" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["expr_day"]["value"]) && ($site["expr_day"]["value"] !== ""))?($site["expr_day"]["value"]):'0'); ?>" type="text">
							</div>
							<p style="color:red;line-height:30px;">单位：天</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 是否需要审核</label>
						<div class="col-sm-10">
							<div class="clearfix">					
								<label class="radio-inline"><input <?php if($site['shenhegoods']['value']==1){echo ' checked="checked"';} ?> type="radio" value="1" name="shenhegoods">开启</label>	
								<label class="radio-inline"><input <?php if($site['shenhegoods']['value']==0){echo ' checked="checked"';} ?> type="radio" value="0" name="shenhegoods">关闭</label>				
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 显示评论</label>
						<div class="col-sm-10">
							<div class="clearfix">					
									<label class="radio-inline"><input <?php if($site['OPEN_COMMENT']['value']==1){echo ' checked="checked"';} ?> type="radio" value="1" name="OPEN_COMMENT">显示</label>	
									<label class="radio-inline"><input <?php if($site['OPEN_COMMENT']['value']==0){echo ' checked="checked"';} ?> type="radio" value="0" name="OPEN_COMMENT">不显示</label>				
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 自提是否自动收货</label>
						<div class="col-sm-10">
							<div class="clearfix">					
								<label class="radio-inline"><input <?php if($site['ziti_shouhuo']['value']==1){echo ' checked="checked"';} ?> type="radio" value="1" name="ziti_shouhuo">是</label>	
								<label class="radio-inline"><input <?php if($site['ziti_shouhuo']['value']==0){echo ' checked="checked"';} ?> type="radio" value="0" name="ziti_shouhuo">否</label>				
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 退款订单自动退款时间 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="autoshenrefundday" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["autoshenrefundday"]["value"]) && ($site["autoshenrefundday"]["value"] !== ""))?($site["autoshenrefundday"]["value"]):'5'); ?>" type="text">
							</div>
							<p style="color:red;line-height:30px;">用户申请退款，卖家多少天没处理，自动转入退款流程</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 自动收货时间 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="autogetday" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["autogetday"]["value"]) && ($site["autogetday"]["value"] !== ""))?($site["autogetday"]["value"]):'0'); ?>" type="text">
							</div>
							<p style="color:red;line-height:30px;">自动收货时长（商家发货后）</p>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="tab-images">
					
					<div class="form-group" id="goods-image-row2">
						<label class="col-sm-2 control-label no-padding-left">平台登录图片 </label>
						<div class="col-sm-10" id="image-row2">
						  <a href="#" data-toggle="image" class="img-thumbnail" type="goods" id="thumb-image2" num="2">
							<img osctype="goods_image2" <?php if($site['admin_backimage']['value']): ?>src="/<?php echo resize($site['admin_backimage']['value'],100,100); ?>" 
								<?php else: ?> 
								src="/Common/image/no_image_40x40.jpg"<?php endif; ?>  />
								</a>
						  <input osctype="goods_image_input2" type="hidden" name="admin_backimage" value="<?php echo ((isset($site["admin_backimage"]["value"]) && ($site["admin_backimage"]["value"] !== ""))?($site["admin_backimage"]["value"]):''); ?>" id="input-image2" />
							<span class="help-inline ">
								<span class="middle red">平台登录页面，封面图（400*300），（XXX|管理后台）这个也是图片。手动FTP替换地址：Common/image/pdd_small.png</span>
							</span>
						</div>
					</div>
					<div class="form-group" id="goods-image-row3">
						<label class="col-sm-2 control-label no-padding-left">商家登录图片 </label>
						<div class="col-sm-10" id="image-row3">
						  <a href="#" data-toggle="image" class="img-thumbnail" type="goods" id="thumb-image3" num="3">
							<img osctype="goods_image3" <?php if($site['seller_backimage']['value']): ?>src="/<?php echo resize($site['seller_backimage']['value'],100,100); ?>" 
								<?php else: ?> 
								src="/Common/image/no_image_40x40.jpg"<?php endif; ?>  />
								</a>
						  <input osctype="goods_image_input3" type="hidden" name="seller_backimage" value="<?php echo ((isset($site["seller_backimage"]["value"]) && ($site["seller_backimage"]["value"] !== ""))?($site["seller_backimage"]["value"]):''); ?>" id="input-image3" />
							<span class="help-inline ">
								<span class="middle red">商家后台登录页面，封面图（400*300），（XXX|管理后台）这个也是图片。手动FTP替换地址：Common/image/pdd_small2.png</span>
							</span>
						</div>
					</div>
					<div class="form-group" id="goods-image-row6">
						<label class="col-sm-2 control-label no-padding-left">XXX|管理后台图片 </label>
						<div class="col-sm-10" id="image-row6">
						  <a href="#" data-toggle="image" class="img-thumbnail" type="goods" id="thumb-image6" num="6">
							<img osctype="goods_image6" <?php if($site['admin_xxximage']['value']): ?>src="/<?php echo resize($site['admin_xxximage']['value'],100,100); ?>" 
								<?php else: ?> 
								src="/Common/image/no_image_40x40.jpg"<?php endif; ?>  />
								</a>
						  <input osctype="goods_image_input6" type="hidden" name="admin_xxximage" value="<?php echo ((isset($site["admin_xxximage"]["value"]) && ($site["admin_xxximage"]["value"] !== ""))?($site["admin_xxximage"]["value"]):''); ?>" id="input-image6" />
							<span class="help-inline ">
								<span class="middle red">尺寸207*32。</span>
							</span>
						</div>
					</div>
					
					<div class="form-group" id="goods-image-row4">
						<label class="col-sm-2 control-label no-padding-left">首页延迟加载图片 </label>
						<div class="col-sm-10" id="image-row4">
						  <a href="#" data-toggle="image" class="img-thumbnail" type="goods" id="thumb-image4" num="4">
							<img osctype="goods_image4" <?php if($site['index_ly_image']['value']): ?>src="/<?php echo resize($site['index_ly_image']['value'],100,100); ?>" 
								<?php else: ?> 
								src="/Common/image/no_image_40x40.jpg"<?php endif; ?>  />
								</a>
						  	<input osctype="goods_image_input4" type="hidden" name="index_ly_image" value="<?php echo ((isset($site["index_ly_image"]["value"]) && ($site["index_ly_image"]["value"] !== ""))?($site["index_ly_image"]["value"]):''); ?>" id="input-image4" />
							
							<span class="help-inline ">
								<span class="middle red">根据您上传的首页横图大小制作，图案居中</span>
							</span>
						</div>
					</div>
					<div class="form-group" id="goods-image-row5">
						<label class="col-sm-2 control-label no-padding-left">列表页延迟加载图片 </label>
						<div class="col-sm-10" id="image-row5">
						  <a href="#" data-toggle="image" class="img-thumbnail" type="goods" id="thumb-image5" num="5">
							<img osctype="goods_image5" <?php if($site['fan_ly_image']['value']): ?>src="/<?php echo resize($site['fan_ly_image']['value'],100,100); ?>" 
								<?php else: ?> 
								src="/Common/image/no_image_40x40.jpg"<?php endif; ?>  />
								</a>
						  <input osctype="goods_image_input5" type="hidden" name="fan_ly_image" value="<?php echo ((isset($site["fan_ly_image"]["value"]) && ($site["fan_ly_image"]["value"] !== ""))?($site["fan_ly_image"]["value"]):''); ?>" id="input-image5" />
							<span class="help-inline ">
								<span class="middle red">根据您上传的商品方形图大小制作，图案居中（分类页，主题页等正方形延迟加载图片）</span>
							</span>
						</div>
					</div>
					
					<div class="form-group" id="goods-image-row8">
						<label class="col-sm-2 control-label no-padding-left">商品水印图片 </label>
						<div class="col-sm-10" id="image-row8">
						  <a href="#" data-toggle="image" class="img-thumbnail" type="goods" id="thumb-image8" num="8">
							<img osctype="goods_image8" <?php if($site['WATER_BG']['value']): ?>src="/<?php echo resize($site['WATER_BG']['value'],100,100); ?>" 
								<?php else: ?> 
								src="/Common/image/no_image_40x40.jpg"<?php endif; ?>  />
								</a>
						  <input osctype="goods_image_input8" type="hidden" name="WATER_BG" value="<?php echo ((isset($site["WATER_BG"]["value"]) && ($site["WATER_BG"]["value"] !== ""))?($site["WATER_BG"]["value"]):''); ?>" id="input-image8" />
							<span class="help-inline ">
								<span class="middle red">水印图片放置在商品分享图的右下角</span>
							</span>
						</div>
					</div>
					
					<div class="form-group" id="goods-image-row9">
						<label class="col-sm-2 control-label no-padding-left">微信公众号二维码 </label>
						<div class="col-sm-10" id="image-row9">
						  <a href="#" data-toggle="image" class="img-thumbnail" type="goods" id="thumb-image9" num="9">
							<img osctype="goods_image9" <?php if($site['weixin_group']['value']): ?>src="/<?php echo resize($site['weixin_group']['value'],100,100); ?>" 
								<?php else: ?> 
								src="/Common/image/no_image_40x40.jpg"<?php endif; ?>  />
								</a>
						  <input osctype="goods_image_input9" type="hidden" name="weixin_group" value="<?php echo ((isset($site["weixin_group"]["value"]) && ($site["weixin_group"]["value"] !== ""))?($site["weixin_group"]["value"]):''); ?>" id="input-image9" />
							<span class="help-inline ">
								<span class="middle red"></span>
							</span>
						</div>
					</div>
					
					
				</div>
				
				<div class="tab-pane" id="tab-sms">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left">商家审核成功短信通知 </label>
						<div class="col-sm-10">
							<div class="clearfix">					
								<label class="radio-inline"><input <?php if($site['open_sms']['value']==1){echo ' checked="checked"';} ?> type="radio" value="1" name="open_sms">开启</label>	
								<label class="radio-inline"><input <?php if($site['open_sms']['value']==0){echo ' checked="checked"';} ?> type="radio" value="0" name="open_sms">关闭</label>				
							</div>
							<p style="color:red;line-height:30px;">短信接口申请地址&nbsp;&nbsp;<a href="http://www.kingtto.cn/" target="_blank">http://www.kingtto.cn/</a></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 短信账户名 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="sms_username" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["sms_username"]["value"]) && ($site["sms_username"]["value"] !== ""))?($site["sms_username"]["value"]):''); ?>" type="text">
							</div>
							<p style="color:red;line-height:30px;"></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 短信密码 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="sms_password" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["sms_password"]["value"]) && ($site["sms_password"]["value"] !== ""))?($site["sms_password"]["value"]):''); ?>" type="text">
							</div>
							<p style="color:red;line-height:30px;"></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 短信平台会员ID </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="sms_userid" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["sms_userid"]["value"]) && ($site["sms_userid"]["value"] !== ""))?($site["sms_userid"]["value"]):''); ?>" type="text">
							</div>
							<p style="color:red;line-height:30px;"></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 短信模板 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="sms_template" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["sms_template"]["value"]) && ($site["sms_template"]["value"] !== ""))?($site["sms_template"]["value"]):''); ?>" type="text">
							</div>
							<p style="color:red;line-height:30px;"></p>
						</div>
					</div>
					
					
				</div>
				
				<div class="tab-pane" id="tab-kefu">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 客服选择</label>
						<div class="col-sm-10">
							<div class="clearfix">					
									<label class="radio-inline"><input <?php if($site['open_duokefu']['value']==1){echo ' checked="checked"';} ?> type="radio" value="1" name="open_duokefu">网页在线客服</label>	
									<label class="radio-inline"><input <?php if($site['open_duokefu']['value']==0){echo ' checked="checked"';} ?> type="radio" value="0" name="open_duokefu">QQ客服</label>				
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-left"> 网页客服接待人数 </label>
						<div class="col-sm-10">
							<div class="clearfix">
								<input name="kefu_person_need" class="col-xs-10 col-sm-10 form-control"  value="<?php echo ((isset($site["kefu_person_need"]["value"]) && ($site["kefu_person_need"]["value"] !== ""))?($site["kefu_person_need"]["value"]):'0'); ?>" type="text">
							</div>
							<p style="color:red;line-height:30px;">单个卖家客服可接待几个用户</p>
						</div>
					</div>
				</div>
			</div>	
			
			
			
		</form>
		<div class="form-group">
			<label class="col-sm-1 control-label no-padding-left"> </label>	
			<div class="col-sm-11">
				<button form="form" type="submit"   class="btn btn-sm btn-primary">提交</button>		
			</div>
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
		
		
<script src="/Common/fileupload/jquery.ui.widget.js"></script>
<script src="/Common/fileupload/jquery.fileupload.js"></script>
<script>	
$(function(){	
	
	// tooltips on hover button-upload
	$('[data-toggle=\'tooltip\']').tooltip({container: 'body', html: true});

	// Makes tooltips work on ajax generated content
	$(document).ajaxStop(function() {
		$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
	});	
	
	$('#clear_user_qrcode').click(function(){
		$.ajax({
			url:'<?php echo U("settings/clearuserqrcode");?>',
			type:'post',
			dataType:'json',
			success:function(ret){
				if(ret.code ==1)
				{
					alert('清空成功');
					return false;
				}
			}
		})
	})
	
	$(document).delegate('a[data-toggle=\'image\']', 'click', function(e) {
		e.preventDefault();
		
		var index=$(this).attr('num');
		var type=$(this).attr('type');
		//alert(index);
		
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
					return '<button type="button" n="'+index+'" t="'+type+'"  class="btn btn-primary button-image"><i class="icon-edit"></i></button> ';
				}
			});
		}
		

		
		$(element).popover('toggle');	
		
		//商品图片
		$('#thumb-image').on('click', function() {
			
			//alert('333');
			
			$('#modal-image').remove();
			
			$('#form-upload').remove();
			
			$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input osctype="btn_upload_image" type="file" name="file" /></form>');
	
			$('#form-upload input[name=\'file\']').trigger('click');
			
			$(element).popover('hide');
			
			$('[osctype="btn_upload_image"]').fileupload({
				
	        	dataType: 'json',
	            url: "<?php echo U('Image/upload_image',array('dir'=>'shop'));?>",
	            add: function(e, data) {
	                $parent = $('#thumb');
	                $input = $parent.find('[osctype="image_input"]');
	                $img = $parent.find('[osctype="image"]');
	                data.formData = {old_goods_image:$input.val()};
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

			
		$('.button-image').on('click', function() {
			$('#modal-image').remove();
			
			$('#form-upload').remove();
			
			var i=$(this).attr('n');
			var type=$(this).attr('t');
						
			$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input osctype="btn_upload_image" type="file" name="file" /></form>');
	
			$('#form-upload input[name=\'file\']').trigger('click');
			
			$(element).popover('hide');
			
			$('[osctype="btn_upload_image"]').fileupload({
				
	        	dataType: 'json',
	            url: "<?php echo U('Image/upload_image/dir');?>"+'/'+type,
	            add: function(e, data) {
	                $parent = $('#image-row'+i);
	                $input = $parent.find('[osctype="'+type+'_image_input'+i+'"]');
	                $img = $parent.find('[osctype="'+type+'_image'+i+'"]');
	                var old_name='old_'+type+'_image';
	                data.formData = {old_name:$input.val()};
	                $img.attr('src', "./Themes/Admin/Public/img/loading.gif");
	                data.submit();
	            },
	            done: function (e,data) {
					
	            	var image=data.result;	            	
	            	
	                $parent = $('#'+type+'-image-row'+i);
	                $input = $parent.find('[osctype="'+type+'_image_input'+i+'"]');
	                $img = $parent.find('[osctype="'+type+'_image'+i+'"]');
	                if(image) {
	                   // $img.prev('i').hide();
	                    $img.attr('src', '/'+image.image_thumb);
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
	
	
});
	
</script>
		
	</body>
</html>