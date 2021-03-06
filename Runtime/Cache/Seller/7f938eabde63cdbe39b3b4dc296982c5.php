<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php $shoname_name = D('Home/Front')->get_config_by_name('shoname'); ?>
  <title><?php echo $shoname; ?></title>
  <link rel="shortcut icon" href="" />
        
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
 
<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  

<link href="./resource/css/bootstrap.min.css?v=201903260001" rel="stylesheet">
<link href="./resource/css/common.css?v=201903260001" rel="stylesheet">
<script type="text/javascript">
            window.sysinfo = {
            <?php if (!empty($_W['uniacid']) ){ ?>'uniacid': '<?php echo ($_W['uniacid']); ?>',<?php } ?>
			
            <?php if( !empty($_W['acid']) ){ ?>'acid': '<?php echo ($_W['acid']); ?>',<?php } ?>
			
            <?php if (!empty($_W['openid']) ) { ?>'openid': '<?php echo ($_W['openid']); ?>',<?php } ?>
			
            <?php if( !empty($_W['uid']) ) { ?>'uid': '<?php echo ($_W['uid']); ?>',<?php } ?>
			
            'isfounder': <?php if (!empty($_W['isfounder']) ) { ?>1<?php  }else{ ?>0<?php } ?>,
			
            'siteroot': '<?php echo ($_W['siteroot']); ?>',
                    'siteurl': '<?php echo ($_W['siteurl']); ?>',
                    'attachurl': '<?php echo ($_W['attachurl']); ?>',
                    'attachurl_local': '<?php echo ($_W['attachurl_local']); ?>',
                    'attachurl_remote': '<?php echo ($_W['attachurl_remote']); ?>',
                    'module' : {'url' : '<?php if( defined('MODULE_URL') ) { ?>{MODULE_URL}<?php } ?>', 'name' : '<?php if (defined('IN_MODULE') ) { ?>{IN_MODULE}<?php } ?>'},
            'cookie' : {'pre': ''},
            'account' : <?php echo json_encode($_W['account']);?>,
            };
        </script>
		
<script type="text/javascript" src="./resource/js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="./resource/js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="./resource/js/app/util.js?v=201903260001"></script>
<script type="text/javascript" src="./resource/js/app/common.min.js?v=201903260001"></script>
<script type="text/javascript" src="./resource/js/require.js?v=201903260001"></script>
<script type="text/javascript" src="./resource/js/lib/jquery.nice-select.js?v=201903260001"></script>
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
   <link href="/static/css/snailfish.css" rel="stylesheet">
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">商城设置</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				<div class="layui-form-item">
					<label class="layui-form-label">商城名称</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[shoname]" class="layui-input" value="<?php echo ($data['shoname']); ?>" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">商城LOGO</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[shoplogo]', $data['shoplogo']);?>
						<span class='layui-form-mid'>正方型图片</span>
					</div>
				</div>
				
				
				
				<div class="layui-form-item">
					<label class="layui-form-label">网址</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[shop_domain]" class="layui-input" value="<?php echo ($data['shop_domain']); ?>" />
						<span class='help-block'>示例：https://域名,未配置https 需要配置https</span>
					</div>
				</div>
		
		
				<div class="layui-form-item">
					<label class="layui-form-label">首页分享标题</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[shop_index_share_title]" class="layui-input" value="<?php echo ($data['shop_index_share_title']); ?>" />
						<span class='layui-form-mid'>未填写将默认使用商城名称作为分享标题</span>
					</div>
				</div>
				
				<div class="layui-form-item" >
					<label class="layui-form-label">首页分享图片</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[shop_index_share_image]', $data['shop_index_share_image']);?>
						<span class='layui-form-mid'>支持PNG及JPG，显示图片长宽比是 5:4。</span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">首页商品排列</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[index_list_theme_type]" value="0" title="小图" <?php if( !empty($data) && $data['index_list_theme_type'] ==0 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[index_list_theme_type]" value="1" title="大图" <?php if( empty($data) || $data['index_list_theme_type'] ==1 ){ ?>checked <?php } ?> />
						<input type="radio" name="parameter[index_list_theme_type]" value="2" title="三乘三" <?php if( empty($data) || $data['index_list_theme_type'] ==2 ){ ?>checked <?php } ?> />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">页面导航条背景颜色</label>
					<div class="layui-input-block">
						<div class="" style="margin:0px;">
							<div class="layui-input-inline" style="width: 120px;">
							  <input type="text" name="parameter[nav_bg_color]" value="<?php echo ($data['nav_bg_color']); ?>" placeholder="请选择颜色" class="layui-input" id="test-colorpicker-form-input">
							</div>
							<div class="layui-inline" style="left: -11px;">
							  <div id="minicolors"></div>
							</div>
						  </div>
						<span class='layui-form-mid'>背景颜色值，有效值为十六进制颜色。默认色值：<font color="#F75451">#F75451</font></span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">页面标题文字颜色</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[nav_font_color]" value="#ffffff" title="白色" <?php if( !empty($data) && $data['nav_font_color'] =='#ffffff' ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[nav_font_color]" value="#000000" title="黑色" <?php if( empty($data) || $data['nav_font_color'] =='#000000' ){ ?>checked <?php } ?> />
						<hr >
						<span class='layui-form-mid'>前景颜色值，包括按钮、标题、状态栏的颜色，仅支持 #ffffff 和 #000000 <br/>为避免重复请求，采用缓存机制，有效时长为十分钟，如需马上生效可删除小程序重新进入</span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">主题颜色</label>
					<div class="layui-input-block">
						<div class="" style="margin:0px;">
							<div class="layui-input-inline" style="width: 120px;">
							  <input type="text" name="parameter[skin]" value="<?php echo ($data['skin']); ?>" placeholder="请选择颜色" class="layui-input" id="skin-colorpicker-form-input">
							</div>
							<div class="layui-inline" style="left: -11px;">
							  <div id="skincolors"></div>
							</div>
						  </div>
						<span class='layui-form-mid'>全局主题颜色(页面导航条背景颜色,<a lay-href="/seller.php?s=/weprogram/tabbar" title="去设置" class="text-primary">底部菜单</a>需单独设置)，有效值为十六进制颜色。默认色值：<font color="#F75451">#F75451</font></span>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">腾讯地图AppKey</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[tx_map_key]" class="layui-input" value="<?php echo ($data['tx_map_key']); ?>" />
						<span class='layui-form-mid'><a href="https://lbs.qq.com/console/key.html" class="text-primary" target="_blank">点击申请</a>&nbsp;用于地图定位、显示社区团长位置
						
						<a href="/static/images/tx_key_demo.png" class="text-primary" title="点击查看" target="_balnk">地图申请示例</a>
						<a href="/static/images/tx_map_request_demo.png" class="text-primary" title="点击查看" target="_balnk">小程序域名设置示例</a>
						</span>
					</div>
						
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">群体名称</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[group_name]" class="layui-input" value="<?php echo ($data['group_name']); ?>" />
						<span class='layui-form-mid'>默认：社区</span>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">群主名称</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[owner_name]" class="layui-input" value="<?php echo ($data['owner_name']); ?>" />
						<span class='layui-form-mid'>默认：团长</span>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">小区团长：</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[haibao_group_name]" class="layui-input" value="<?php echo ($data['haibao_group_name']); ?>" />
						<span class='layui-form-mid'>默认：小区团长，首页海报上文字</span>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">首页顶部背景</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[index_top_img_bg_open]" value="1" title="隐藏" <?php if( !empty($data) && $data['index_top_img_bg_open'] ==1 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[index_top_img_bg_open]" value="0" title="显示" <?php if( empty($data) || $data['index_top_img_bg_open'] ==0 ){ ?>checked <?php } ?> />
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">首页分享按钮</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[index_share_switch]" value="0" title="隐藏" <?php if( !empty($data) && $data['index_share_switch'] ==0 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[index_share_switch]" value="1" title="显示" <?php if( empty($data) || $data['index_share_switch'] ==1 ){ ?>checked <?php } ?> />
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">首页抢购切换</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[index_change_cate_btn]" value="1" title="关闭" <?php if( empty($data) || $data['index_change_cate_btn'] ==1 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[index_change_cate_btn]" value="0" title="开启" <?php if( !empty($data) && $data['index_change_cate_btn'] ==0 ){ ?>checked <?php } ?> />
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">首页客服按钮</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[index_service_switch]" value="0" title="关闭" <?php if( empty($data) || $data['index_service_switch'] ==0 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[index_service_switch]" value="1" title="开启" <?php if( !empty($data) && $data['index_service_switch'] ==1 ){ ?>checked <?php } ?> />
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">其他页面客服按钮</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[user_service_switch]" value="0" title="关闭" <?php if( isset($data['user_service_switch']) && $data['user_service_switch']==0 ){ ?>checked<?php } ?> />
					  <input type="radio" name="parameter[user_service_switch]" value="1" title="开启" <?php if( !isset($data['user_service_switch']) || $data['user_service_switch']==1){ ?>checked<?php } ?> />
					  
						<br/>
					  <span class='layui-form-mid'>商品详情、个人中心、订单中心等页面联系客服按钮</span>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">首页搜索框</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[index_switch_search]" value="0" title="关闭" <?php if( empty($data) || $data['index_switch_search'] ==0 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[index_switch_search]" value="1" title="开启" <?php if( !empty($data) && $data['index_switch_search'] ==1 ){ ?>checked <?php } ?> />
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">首页页头文字颜色</label>
					<div class="layui-input-block">
						<div class="" style="margin:0px;">
							<div class="layui-input-inline" style="width: 120px;">
							  <input type="text" name="parameter[index_top_font_color]" value="<?php echo ($data['index_top_font_color']); ?>" placeholder="请选择颜色" class="layui-input" id="test-colorpicker-form-input2">
							</div>
							<div class="layui-inline" style="left: -11px;">
							  <div id="minicolors2"></div>
							</div>
						  </div>
						<span class='layui-form-mid'>默认：#ffffff</span>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">个人中心页头文字颜色</label>
					<div class="layui-input-block">
						<div class="" style="margin:0px;">
							<div class="layui-input-inline" style="width: 120px;">
							  <input type="text" name="parameter[user_top_font_color]" value="<?php echo ($data['user_top_font_color']); ?>" placeholder="请选择颜色" class="layui-input" id="test-colorpicker-form-input3">
							</div>
							<div class="layui-inline" style="left: -11px;">
							  <div id="minicolors3"></div>
							</div>
						  </div>
						<span class='layui-form-mid'>默认：#ffffff</span>
					</div>
				</div>
				
				
				<div class="layui-form-item">
					<label class="layui-form-label">首页显示“切换”二字</label>
					<div class="layui-input-block">
					  	<input type="radio" name="parameter[hide_community_change_word]" value="0" title="是" <?php if( empty($data) || $data['hide_community_change_word'] ==0 ){ ?>checked <?php } ?> />
						<input type="radio" name="parameter[hide_community_change_word]" value="1" title="否" <?php if( !empty($data) && $data['hide_community_change_word'] ==1 ){ ?>checked <?php } ?> />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">切换小区</label>
					<div class="layui-input-block">
						<input type="radio" name="parameter[hide_community_change_btn]" value="1" title="禁止" <?php if( !empty($data) && $data['hide_community_change_btn'] ==1 ){ ?>checked <?php } ?> />
					  	<input type="radio" name="parameter[hide_community_change_btn]" value="0" title="允许" <?php if( empty($data) || $data['hide_community_change_btn'] ==0 ){ ?>checked <?php } ?> />
					  	<br>
				  		<span class='layui-form-mid'>备注：选择“禁止”，用户无论点击哪个团长分享出来的链接，都是直接进入原绑定小区，无提示 。</span>
					</div>
				</div>
				
				
				<div class="layui-form-item">
					<label class="layui-form-label">首页团长信息开关</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[hide_index_top_communityinfo]" value="1" title="隐藏" <?php if( !empty($data) && $data['hide_index_top_communityinfo'] ==1 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[hide_index_top_communityinfo]" value="0" title="显示" <?php if( empty($data) || $data['hide_index_top_communityinfo'] ==0 ){ ?>checked <?php } ?> />
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">简洁模式团长与搜索</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[index_communityinfo_showtype]" value="0" title="关闭" <?php if( empty($data) || $data['index_communityinfo_showtype'] ==0 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[index_communityinfo_showtype]" value="1" title="开启" <?php if( !empty($data) && $data['index_communityinfo_showtype'] ==1 ){ ?>checked <?php } ?> />
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">首页文字“全部”</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[index_type_first_name]" class="layui-input" value="<?php echo ($data['index_type_first_name']); ?>" />
						<span class='layui-form-mid'>默认：全部</span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">一键复制开关</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[ishow_index_copy_text]" value="0" title="隐藏" <?php if(empty($data) || $data['ishow_index_copy_text'] ==0){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[ishow_index_copy_text]" value="1" title="显示" <?php if(!empty($data) && $data['ishow_index_copy_text'] ==1){ ?>checked <?php } ?> />
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">返回顶部开关</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[ishow_index_gotop]" value="0" title="隐藏" <?php if( empty($data) || $data['ishow_index_gotop'] ==0 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[ishow_index_gotop]" value="1" title="显示" <?php if( !empty($data) && $data['ishow_index_gotop'] ==1 ){ ?>checked <?php } ?> />
					  <br>
					  <span class='layui-form-mid'>首页返回顶部浮动按钮，默认：隐藏。</span>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">专题分享按钮</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[ishow_special_share_btn]" value="0" title="隐藏" <?php if( empty($data) || $data['ishow_special_share_btn'] ==0 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[ishow_special_share_btn]" value="1" title="显示" <?php if( !empty($data) && $data['ishow_special_share_btn'] ==1 ){ ?>checked <?php } ?> />
					</div>
				</div>
				
				
				<div class="layui-form-item">
					<label class="layui-form-label">退出登录按钮</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[ishow_user_loginout_btn]" value="0" title="隐藏" <?php if( empty($data) || $data['ishow_user_loginout_btn'] ==0 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[ishow_user_loginout_btn]" value="1" title="显示" <?php if( !empty($data) && $data['ishow_user_loginout_btn'] ==1 ){ ?>checked <?php } ?> />
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">提货码显示方式</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[fetch_coder_type]" value="0" title="底部" <?php if( empty($data) || $data['fetch_coder_type'] ==0 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[fetch_coder_type]" value="1" title="弹窗" <?php if( !empty($data) && $data['fetch_coder_type'] ==1 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[fetch_coder_type]" value="2" title="关闭" <?php if( !empty($data) && $data['fetch_coder_type'] ==2 ){ ?>checked <?php } ?> />
					</div>
				</div>
				
				<div class="layui-form-item">
				   <label class="layui-form-label">个人中心拼团</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[show_user_pin]" value="0" title="隐藏" <?php if( empty($data) || $data['show_user_pin'] ==0 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[show_user_pin]" value="1" title="显示" <?php if( !empty($data) && $data['show_user_pin'] ==1 ){ ?>checked <?php } ?> />
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">个人中心自提点</label>
					<div class="layui-input-block">
					  	<input type="radio" name="parameter[show_user_change_comunity]" value="0" title="隐藏" <?php if( empty($data) || $data['show_user_change_comunity'] ==0 ){ ?>checked <?php } ?> />
						<input type="radio" name="parameter[show_user_change_comunity]" value="1" title="显示" <?php if( !empty($data) && $data['show_user_change_comunity'] ==1 ){ ?>checked <?php } ?> />
					</div>
				</div>

				<div class="layui-form-item">
				   <label class="layui-form-label">个人中心团长电话保护</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[show_user_tuan_mobile]" value="0" title="开启" <?php if( empty($data) || $data['show_user_tuan_mobile'] ==0 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[show_user_tuan_mobile]" value="1" title="关闭" <?php if( !empty($data) && $data['show_user_tuan_mobile'] ==1 ){ ?>checked <?php } ?> />
					  <br />
					  <span class='layui-form-mid'>开启保护则隐藏团长手机后四位，默认：开启。</span>
					</div>
				</div>
				
				
				<div class="layui-form-item">
					<label class="layui-form-label">首页公众号关注组件</label>
					<div class="layui-input-block">
					  	<input type="radio" name="parameter[show_index_wechat_oa]" value="0" title="隐藏" <?php if( empty($data) || $data['show_index_wechat_oa'] ==0 ){ ?>checked <?php } ?> />
						<input type="radio" name="parameter[show_index_wechat_oa]" value="1" title="显示" <?php if( !empty($data) && $data['show_index_wechat_oa'] ==1 ){ ?>checked <?php } ?> />
						<br>
						<div class='layui-form-mid'>
							<p>1.使用组件前，需前往小程序后台，在“设置”->“关注公众号”中设置要展示的公众号。<strong>注：设置的公众号需与小程序主体一致。</strong></p>
							<p>2.只有从“扫小程序码”、“聊天顶部场景”、“其他小程序返回小程序”进入时才会显示。</p>
						</div>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">首页分类列表</label>
					<div class="layui-input-block">
					  <input type="radio" name="parameter[ishide_index_goodslist]" value="1" title="隐藏" <?php if( !empty($data) || $data['ishide_index_goodslist'] ==1 ){ ?>checked <?php } ?> />
					  <input type="radio" name="parameter[ishide_index_goodslist]" value="0" title="显示" <?php if( !empty($data) && $data['ishide_index_goodslist'] ==0 ){ ?>checked <?php } ?> />
					  <br>
					  <span class='layui-form-mid'>首页分类商品列表，开启隐藏则分类商品列表、切换按钮和分类导航一并隐藏，默认：显示。</span>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">充值名称自定义</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[excharge_nav_name]" class="layui-input" value="<?php echo ($data['excharge_nav_name']); ?>" />
						<span class='layui-form-mid'>充值页面顶部导航名称和个人中心余额“查看”文字</span>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">技术支持</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[technical_support]" class="layui-input" value="<?php echo ($data['technical_support']); ?>" />
						<span class='layui-form-mid'>可填写 "金润版权所有"。与备案号一起显示在网站登录界面正下方</span>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">备案号</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[record_number]" class="layui-input" value="<?php echo ($data['record_number']); ?>" />
						<span class='layui-form-mid'>点击备案号会链接到工信部官网首页（beian.miit.gov.cn）</span>
						
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label"> </label>
					<div class="layui-input-block">
						<input type="submit" value="提交" lay-submit lay-filter="formDemo" class="btn btn-primary"  />
					</div>
				</div>
			</form>
		</div>
</div>
</div>


<script src="/layuiadmin/layui/layui.js"></script>

<script>
	layui.config({
		base: '/layuiadmin/' //静态资源所在路径
	}).extend({
		index: 'lib/index' //主入口模块
	}).use('index');
</script>

<script>
//由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
var layer = layui.layer;
var $;

layui.use(['jquery', 'layer','form','colorpicker'], function(){ 
  $ = layui.$;
  var form = layui.form;
  var colorpicker = layui.colorpicker;
 
  var nav_bg_color = '<?php echo ($data["nav_bg_color"]); ?>';
   //表单赋值
    colorpicker.render({
      elem: '#minicolors'
	   ,color: nav_bg_color ? nav_bg_color : '#F75451'
      ,done: function(color){
        $('#test-colorpicker-form-input').val(color);
      }
    });

	var user_top_font_color = '<?php echo ($data["user_top_font_color"]); ?>';
    colorpicker.render({
      elem: '#minicolors3'
      ,color: user_top_font_color ? user_top_font_color : '#FFFFFF'
      ,done: function(color){
        $('#test-colorpicker-form-input3').val(color);
      }
    });

    var index_top_font_color = '<?php echo ($data["index_top_font_color"]); ?>';
    colorpicker.render({
      elem: '#minicolors2'
      ,color: index_top_font_color ? index_top_font_color : '#FFFFFF'
      ,done: function(color){
        $('#test-colorpicker-form-input2').val(color);
      }
    });

    var skin_color = '<?php echo ($data["skin"]); ?>';
    colorpicker.render({
      elem: '#skincolors'
      ,color: skin_color ? skin_color : '#F75451'
      ,done: function(color){
        $('#skin-colorpicker-form-input').val(color);
      }
    });
  
  
   
	
  //监听提交
  form.on('submit(formDemo)', function(data){
	
	 $.ajax({
		url: data.form.action,
		type: data.form.method,
		data: data.field,
		dataType:'json',
		success: function (info) {
		  
			if(info.status == 0)
			{
				layer.msg(info.result.message,{icon: 1,time: 2000});
			}else if(info.status == 1){
				var go_url = location.href;
				if( info.result.hasOwnProperty("url") )
				{
					go_url = info.result.url;
				}
				
				layer.msg('操作成功',{time: 1000,
					end:function(){
						location.href = info.result.url;
					}
				}); 
			}
		}
	});
	
    return false;
  });
})



</script>  
</body>