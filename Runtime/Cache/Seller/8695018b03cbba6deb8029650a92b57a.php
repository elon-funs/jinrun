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
		<!--头部区域begin-->
		<div class="layui-header">
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layadmin-flexible" lay-unselect="">
                    <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩" id="href_flexible">
                        <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect="">
                    <a href="javascript:;" layadmin-event="refresh" title="刷新">
                        <i class="layui-icon layui-icon-refresh-3"></i>
                    </a>
                </li>
				<span class="layui-nav-bar" style="left: 30px; top: 48px; width: 0px; opacity: 0;"></span>
			</ul>
			<?php  $version_info = M('lionfish_comshop_config')->where( array('name' => 'site_version') )->find(); $version = $version_info['value']; ?>
			<ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
				<li id="neworder" style="display:none;" class="layui-nav-item layui-hide-xs" lay-unselect >
					<a href="<?php echo U('order/index');?>" >
					  <span  style="margin: -4px -15px 0;"></span>
					  新订单<span id="notice"><?php echo ($order_count); ?></span>条
					</a>
				</li>
				 <li class="layui-nav-item layui-hide-xs" lay-unselect >
					<a href="<?php echo U('index/index', array('is_new' => 2) );?>" >
					  <span class="layui-badge-dot" style="margin: -4px -15px 0;"></span>
					  切换旧版后台
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
				<li class="layui-nav-item layui-hide-xs" lay-unselect style="display:none;">
					<a href="javascript:;" layadmin-event="fullscreen">
					  <i class="layui-icon layui-icon-screen-full"></i>
					</a>
				</li>
				<li class="layui-nav-item layui-hide-xs lay-logins" lay-unselect>
					<a href="javascript:;">
						
						<?php  if (defined('ROLE') && ROLE == 'agenter' ) { $agent_auth = session('agent_auth'); echo $agent_auth['shopname']; }else{ echo D('Home/Front')->get_config_by_name('shoname'); } ?>
						
					</a>
				  </li>
				  <li class="layui-nav-item layui-hide-xs" lay-unselect>
					<a href="<?php echo U('Public/logout');?>">退出</a>
				  </li>
				  
				  <li class="layui-nav-item layui-hide-xs" lay-unselect style="display:none;">
					<a href="javascript:;" layadmin-event="about"><i class="layui-icon layui-icon-more-vertical"></i></a>
				  </li>
				  <span class="layui-nav-bar" style="left: 28px; top: 48px; width: 0px; opacity: 0;"></span>
			</ul>
        </div>
		<!--头部区域end-->
		<!--左侧导航区域begin--->
		<div class="layui-side layui-side-menu">
            <div class="layui-side-scroll">
                <!-- logo -->
                <div class="index-inner-container">
					<?php $shoplogo = D('Home/Front')->get_config_by_name('shoplogo'); ?>
                    <div class="layui-logo">
						<span>
							<?php if( empty($shoplogo) ){ ?>
								<img class="layui-circle" src="/static/images/default-pic.jpg" height="46px" width="46px">
							<?php }else{ ?>
								<img class="layui-circle" src="<?php echo tomedia($shoplogo);?>" height="46px" width="46px">
							<?php } ?>
						</span> 
					</div>
                    <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
						<span class="layui-nav-bar" style="height: 0px; top: 0px; opacity: 0;"></span>
						<?php $sysmenus = D('Seller/menu')->getMenu(true); ?>
						<?php  $i =0; foreach($sysmenus['menu'] as $key => $menu){ ?>
						<li class="layui-nav-item <?php if($i ==0){ ?>layui-nav-itemed<?php } ?>" pinyin="<?php echo $key; ?>">
							<a href="javascript:;" <?php if( empty($menu['route']) ){ ?>lay-href="<?php echo U($menu['route']);?>"<?php } ?> lay-tips="<?php echo ($menu['text']); ?>" lay-direction="2">
								 <i class=" snailfishicon snailfishicon-<?php echo ($menu['icon']); ?>"></i>
								<cite><?php echo ($menu['text']); ?></cite>
							</a>
						</li>
						<?php $i++; } ?>
						
						
					</ul>
                </div>
            </div>
        </div>
		<!--左侧导航区域end--->
		<!--内容体begin-->
		<div class="layui-body" id="LAY_app_body">
			<div class="layadmin-tabsbody-item layui-show sub-nav-show">
				<!--二级菜单begin-->
				<div class="sub-nav">
					<?php $i =0; foreach($sysmenus['menu'] as $key => $menu){ ?>
					
						<?php if( empty($menu['items']) ){ ?>
							<div class="nav-new wb-subnav"></div>	
						<?php }else{ ?>
							<div class="nav-new wb-subnav <?php if($i ==0){ ?> layui-this<?php } ?>">
								<div class="subnav-scene">
									<?php echo ($menu['subtitle']); ?>
								</div>
								<?php foreach($menu['items'] as $sub_menu){ ?>
								
								<?php if( !empty($sub_menu['items']) ){ ?>
								<div class="menu-header <?php if( $menu['route'] != 'config/index' ){ ?>active<?php } ?>">
									<?php if( $menu['route'] == 'config/index' ){ ?>
									<div class="menu-icon fa fa-caret-right layui-icon ">&#xe623;</div>
									<?php }else{ ?>
									<div class="menu-icon fa fa-caret-right layui-icon ">&#xe625;</div>
									<?php } ?>
									<?php echo ($sub_menu['title']); ?>
								</div>
								<?php }else{ ?>
								<ul style="display:block;">
									<li <?php if($i == 0){ ?>class="active"<?php } ?> data-class="active">
										<a href="javascript:;" lay-href="<?php echo U($sub_menu['route']);?>" style="cursor: pointer;"><?php echo ($sub_menu['title']); ?></a>
									</li>
								</ul>
								<?php } ?>
								
								<?php if( !empty($sub_menu['items']) ){ ?>
								<ul style="<?php if( $menu['route'] == 'config/index' ){ ?>display: none;<?php }else{ ?>display: block;<?php } ?>">
									<?php foreach($sub_menu['items'] as $third_sub_menu){ ?>
									<li class="" data-class="active">
										<a lay-href="<?php echo U($third_sub_menu['route']);?>" style="cursor: pointer;"><?php echo ($third_sub_menu['title']); ?></a>
									</li>
									<?php } ?>
								</ul>
								<?php } ?>
								
								<?php } ?>
							</div>
							
							
						<?php } ?>
						
						<?php $i++; } ?>
						
					
					
					
				</div>
				<!--二级菜单end-->
				<div class="new-iframe">
					<iframe src="<?php echo U('index/analys', array('ok' => 1)); ?>" frameborder="0" class="layadmin-iframe"></iframe>
				</div>
				
		
			</div>
		</div>
		<!--内容体end-->
	</div>
</div>
<style>
.layui-side-menu .layui-nav .layui-nav-item > a{
	padding-top: 4px;
    padding-bottom: 4px;
}
.layui-layout-admin .layui-side{width: 120px;}
.layui-side-menu .layui-side-scroll {width: 120px;}
.index-inner-container {
    position: absolute;
    left: 0;
    top: 0;
    right: -17px;
    bottom: 0;
    overflow-x: hidden;
    overflow-y: scroll;
}
.layui-layout-admin .layui-logo {
    position: fixed;
    left: 0;
    top: 0;
    z-index: 1002;
    width: 120px;
    height: 65px;
    padding: 0 15px;
    box-sizing: border-box;
    overflow: hidden;
    font-weight: 300;
    background-repeat: no-repeat;
    background-position: center center;
}
.layui-side-menu .layui-nav {
    width: 120px;
    margin-top: 65px;
    background: 0 0;
}
.snailfishicon{
    position: absolute;
    top: 32%;
    left: 20px;
    font-size: 16px;
}
.layadmin-pagetabs, .layui-layout-admin .layui-body, .layui-layout-admin .layui-footer, .layui-layout-admin .layui-layout-left {
    left: 120px;
}
.new-iframe {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    overflow-x: auto;
    overflow-y: hidden;
}
.sub-nav-show .new-iframe {
    left: 126px;
}
.sub-nav {
    width: 115px;
    background-color: #fff;
    position: absolute;
    z-index: 998;
    left: 0;
    top: 0;
    bottom: 0;
    overflow-y: auto;
    display: none;
    box-shadow: 2px 0 2px rgba(0,0,0,.05);
}
.sub-nav-show .sub-nav {
    display: block;
}
.nav-new {
    display: none;
}
.sub-nav-show .sub-nav .nav-new.layui-this {
    display: block;
}
.one-nav {
    border-bottom: 1px solid #e3e2e5;
    padding: 12px 0;
}
.one-nav:last-child {
    border-bottom: 0;
}
.one-nav .dt {
    font-weight: 700;
}
.one-nav a {
    color: #595959;
    line-height: 32px;
    display: block;
    cursor: pointer;
}
.dd p {
    margin: 0 -10px 5px;
}
.dd p a {
    padding: 0 10px;
    font-size: 13px;
}
.dd p.layui-this a, .dd p a:hover {
    background-color: #E9EAF0;
    border-radius: 3px;
}
.layui-layout-admin .layui-body {
    position: fixed;
    top: 60px;
}
.layui-layout-admin .layui-body {
    top: 50px;
}	

.wb-subnav .subnav-scene {
    overflow: hidden;
    height: 78px;
    line-height: 78px;
    padding-left: 20px;
}
.menu-header {
    line-height: 50px;
    height: 50px;
    /* border-top: 1px solid #f4f4f4; */
    cursor: pointer;
    padding-left: 5px;
}
.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.menu-icon {
    width: 20px;
    height: 50px;
    float: left;
    text-align: center;
    font-size: 8px;
    color: #666;
    line-height: 50px;
}
.fa-caret-down:before {
    content: "\f0d7";
}

:after, :before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.wb-subnav ul {
    display: none;
    overflow: hidden;
}
.wb-subnav ul li {
    height: 50px;
    line-height: 50px;
    font-size: 12px;
	cursor:pointer;
}
.wb-subnav ul li.active, .wb-subnav ul li:hover {
    background: #edf6ff;
}
.wb-subnav ul a {
    padding-left: 25px;
    height: 100%;
    width: 100%;
}
.wb-subnav ul li a {
    color: #7c838a;
}
.wb-subnav ul li.active a {
    color: #009688;
}
.layadmin-side-shrink .layui-side {
    left: 0;
    width: 60px;
}

</style>  

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

var par_index = 0;

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
	
	$('.layui-side-scroll .layui-nav-item a').click(function(){
		var url = $(this).attr('lay-href');
		
		if( url == undefined )
		{
			var s_index = $(this).parent().index()-1;
			par_index = s_index;
			
			$('.wb-subnav').eq(s_index).addClass('layui-this').siblings().removeClass('layui-this');
			
			var s_u =  $('.wb-subnav').eq(s_index).children('ul:first');
			
			if( !$(s_u).children('li:first').hasClass('active')  )
			{
				$(s_u).children('li:first').addClass('active');
			}
			
			var s_a = $(s_u).children('li:first').children('a:first');
			
			var s_url = $(s_a).attr('lay-href');
			
			$('.layadmin-iframe').attr('src', s_url);
			
		}else{
			var s_index = $(this).parent().parent().index()-1;
			par_index = s_index+1;
			
			console.log(12);
		}
	})
	
	$('.wb-subnav li a').click(function(event){
		var s_url = $(this).attr('lay-href');
		
		$('.layadmin-iframe').attr('src', s_url);
		
	})
	$('#update_urlevent').click(function(event){
		var s_url = $(this).attr('lay-href');
		
		$('.layadmin-iframe').attr('src', s_url);
		
	})
	$('.wb-subnav li').click(function(event){
		$('.wb-subnav li').removeClass('active')
		$(this).addClass('active');
		
		$('.layui-side-scroll .layui-nav-item').eq(par_index).addClass('layui-this').siblings().removeClass('layui-this');
		
		var s_url = $(this).children('a').attr('lay-href');
		
		$('.layadmin-iframe').attr('src', s_url);
		
		event.stopPropagation();
	})
	
	
	$('.menu-header').click(function(){
		if( $(this).hasClass('active') )
		{
			//关闭 向右
			$(this).children('.layui-icon').html('&#xe623;');
			$(this).next().hide();
			$(this).removeClass('active');
		}else{
			//开启  向下
			$(this).children('.layui-icon').html('&#xe625;');
			$(this).next().show();
			$(this).addClass('active');
		}
	})
	
})
</script>


</body>
</html>