<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php $shoname_name = D('Home/Front')->get_config_by_name('shoname'); ?>
  <title><?php echo $shoname_name; ?></title>
  <link rel="shortcut icon" href="" />
        
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
  <link href="/static/css/snailfish.css?v=2.0.0" rel="stylesheet">
  <style>
	.wb-nav .snailfishicon{
		 position: absolute;
		 left: 20px;
		top: 50%;
		margin-top: -10px;
	} 
  </style>
</head>
<body class="layui-layout-body">
  
  <div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
      <div class="layui-header">
        <!-- 头部区域 -->
        <ul class="layui-nav layui-layout-left">
          <li class="layui-nav-item layadmin-flexible" lay-unselect>
            <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
              <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
            </a>
          </li>
          <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;" layadmin-event="refresh" title="刷新">
              <i class="layui-icon layui-icon-refresh-3"></i>
            </a>
          </li>
        </ul>
		<?php  $version_info = M('lionfish_comshop_config')->where( array('name' => 'site_version') )->find(); $version = $version_info['value']; ?>
		
        <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
		
			<li id="neworder" style="display:none;" class="layui-nav-item layui-hide-xs" lay-unselect >
				<a lay-href="<?php echo U('order/index');?>" >
				  <span  style="margin: -4px -15px 0;"></span>
				  新订单<span id="notice"><?php echo ($order_count); ?></span>条
				</a>
			</li>
		
          <li class="layui-nav-item layui-hide-xs" lay-unselect >
            <a href="<?php echo U('index/index', array('is_new' => 1) );?>" >
              <span class="layui-badge-dot" style="margin: -4px -15px 0;"></span>
			  切换新版后台
            </a>
          </li>
		 
		   
          <li class="layui-nav-item layui-hide-xs" lay-unselect style="display:none;">
            <a href="javascript:;" layadmin-event="theme">
              <i class="layui-icon layui-icon-theme"></i>
            </a>
		  </li>
		  
		   <?php if (!defined('ROLE') || ROLE != 'agenter' ) {?>
          <!-- <li class="layui-nav-item layui-hide-xs" lay-unselect >
            <font  style="color:#009688;">
              当前社区团购版本<?php echo $version; ?>
            </font>
          </li> -->
		  <?php } ?>
		   
          <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;">
              <cite><?php  if (defined('ROLE') && ROLE == 'agenter' ) { $agent_auth = session('agent_auth'); echo $agent_auth['shopname']; }else{ echo D('Home/Front')->get_config_by_name('shoname'); } ?></cite>
            </a>
            <dl class="layui-nav-child" >
				<dd ><a href="<?php echo U('Public/logout');?>">退出</a></dd>
            </dl>
          </li>
          
          <li class="layui-nav-item layui-hide-xs" lay-unselect style="display:none;">
            <a href="javascript:;" layadmin-event="about"><i class="layui-icon layui-icon-more-vertical"></i></a>
          </li>
        </ul>
      </div>
      
	 
	 <?php $sysmenus = D('Seller/menu')->getMenu(true); ?>
      <!-- 侧边菜单 -->
      <div class="layui-side layui-side-menu">
        <div class="layui-side-scroll">
          <div class="layui-logo" lay-href="<?php echo U('index/analys');?>">
			<?php $shoplogo = D('Home/Front')->get_config_by_name('shoplogo'); ?>
		    <?php if( empty($shoplogo) ){ ?>
				<img class="layui-circle" src="/static/images/default-pic.jpg" height="46px" width="46px">
		  	<?php }else{ ?>
				<img class="layui-circle" src="<?php echo tomedia($shoplogo);?>" height="46px" width="46px">
		    <?php } ?>
          </div>
          <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
			<?php $i =0; foreach($sysmenus['menu'] as $key => $menu){ ?>
			<li data-name="<?php echo $key; ?>" class="wb-nav layui-nav-item <?php if($i ==0){ ?>layui-nav-itemed<?php } ?>">
              <a href="javascript:;" <?php if( !empty($menu['route']) ){ ?>lay-href="<?php echo U($menu['route']);?>"<?php } ?> d-r="<?php echo ($menu['route']); ?>" lay-tips="<?php echo ($menu['text']); ?>" lay-direction="2">
                <i class=" snailfishicon snailfishicon-<?php echo ($menu['icon']); ?>"></i>
                <cite><?php echo ($menu['text']); ?></cite>
              </a>
              
			  <?php if(!empty($menu['items'])){ ?>
			  
			  
			  <?php foreach($menu['items'] as $sub_menu){ ?>
              <dl class="layui-nav-child">
                <dd data-name="<?php echo ($sub_menu['title']); ?>" >
                  <a href="javascript:;" <?php if( !empty($sub_menu['route']) ){ ?>lay-href="<?php echo U($sub_menu['route']);?>"<?php } ?>><?php echo ($sub_menu['title']); ?></a>
				  <?php if( !empty($sub_menu['items']) ){ ?>
				   <dl class="layui-nav-child">
					<?php foreach($sub_menu['items'] as $third_sub_menu){ ?>
                    <dd data-name="list"><a lay-href="<?php echo U($third_sub_menu['route']);?>"><?php echo ($third_sub_menu['title']); ?></a></dd>
					 <?php } ?>
                  </dl>
				  <?php } ?>
                </dd>
              </dl>
			  <?php } ?>
			   <?php } ?>
            </li>
			<?php $i++; } ?>
          </ul>
        </div>
      </div>

      <!-- 页面标签 -->
      <div class="layadmin-pagetabs" id="LAY_app_tabs">
        <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-down">
          <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
            <li class="layui-nav-item" lay-unselect>
              <a href="javascript:;"></a>
              <dl class="layui-nav-child layui-anim-fadein">
                <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
          <ul class="layui-tab-title" id="LAY_app_tabsheader">
            <li lay-id="<?php echo U('index/index'); ?>" lay-attr="<?php echo U('index/index'); ?>" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
          </ul>
        </div>
      </div>
      
      
      <!-- 主体内容 -->
      <div class="layui-body" id="LAY_app_body">
        <div class="layadmin-tabsbody-item layui-show">
          <iframe src="<?php echo U('index/analys', array('ok' => 1)); ?>" frameborder="0" class="layadmin-iframe"></iframe>
        </div>
      </div>
      
      <!-- 辅助元素，一般用于移动设备下遮罩 -->
      <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
  </div>

<script src="/layuiadmin/layui/layui.js"></script>
<script src="/static/js/jquery-ui.min.js"></script>
<script>
	layui.config({
	base: '/layuiadmin/' //静态资源所在路径
	}).extend({
	index: 'lib/index' //主入口模块
	}).use('index');
	
	
</script>
<audio id="musicClick" src="/static/mp3/click.mp3" preload="auto"></audio>
<script>
//由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
var layer = layui.layer;
var $;

var cur_open_div;
var form;

layui.use(['jquery', 'layer','form'], function(){ 
  $ = layui.$;
  
	setInterval( function() {
		$.getJSON("<?php echo "index.php?s=/Cron/index"; ?>");
	},10000);
	
	setInterval(notice,10000);
	function notice() {
		$.ajax({
			 url:"<?php echo U('index/order_count');?>",
			 type:'get',
			 data:{},
			 dataType:'json',
			 success:function(ret){
			 
			  if(ret.resultCode == 200 && ret.data > 0 && ret.voice_notice == 1)
			  {
			   $('#neworder').show();
				$("#notice").html(ret.data);
				$("#musicClick")[0].play();
			  
			  }else{
				$("#neworder").hide();
				$("#notice").html(0);
			  
			  }
			 }
		})
	}
	
	<?php if( !isset($is_show_notice001) ){ ?>
		layer.msg('更新涉及团长提成方式设置，请到“团长”——”团长设置“，查看并设置是否启用“团长等级”提成比例',{time: 10000,
		});
	<?php } ?>
	
	<?php if(is_seller_login() == 1){ ?>

		setInterval( function() {
			//check_lionfish_comshop_upgrade();
		},10000);
	function check_lionfish_comshop_upgrade() {
		$.post('<?php echo U("system/upgrade_check");?>', function (ret) {
			if (ret && ret.status == '1') {
			
				var result = ret.result;
				if (result.filecount > 0 || result.database || result.upgrades) {
					$('#new_msg').show();
					$('#new_msg_tip').html('点击升级新版本：'+ result.version);
				}
			}
		}, 'json');
	   
	}
	<?php } ?>
})
</script>


</body>
</html>