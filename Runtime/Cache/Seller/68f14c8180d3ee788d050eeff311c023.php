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
<style>
.layui-table > caption + thead > tr:first-child > td, .layui-table > caption + thead > tr:first-child > th, .layui-table > colgroup + thead > tr:first-child > td, .layui-table> colgroup + thead > tr:first-child > th, .layui-table > thead:first-child > tr:first-child > td, .layui-table > thead:first-child > tr:first-child > th {
    color: #000;
}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
    color: #000;
}
</style>
</head>
<body layadmin-themealias="default">


<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">小程序路径</span></div>
		<div class="layui-card-body" style="padding:15px;">
			
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				<table class="table table-responsive layui-table" lay-even lay-skin="line" lay-size="lg">
					<thead>
						<tr>
							<th >页面</th>
							<th >路径(*用具体内容替换)</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>商城首页</td>
							<td>/lionfish_comshop/pages/index/index</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>分类</td>
							<td>/lionfish_comshop/pages/type/index</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>购物车</td>
							<td>/lionfish_comshop/pages/order/shopCart</td>
							<td>&nbsp;</td>
						</tr>
						
						<tr>
							<td>个人中心</td>
							<td>/lionfish_comshop/pages/user/me</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>我的订单</td>
							<td>/lionfish_comshop/pages/order/index</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>商品详情</td>
							<td>/lionfish_comshop/pages/goods/goodsDetail?id=*</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>团长申请页</td>
							<td>/lionfish_comshop/moduleA/groupCenter/apply</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>供应商申请页</td>
							<td>/lionfish_comshop/pages/supply/recruit</td>
							<td>&nbsp;</td>
						</tr>
						
						<tr>
							<td>供应商列表页</td>
							<td>/lionfish_comshop/pages/supply/index</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>某供应商详情页</td>
							<td>/lionfish_comshop/pages/supply/home?id=*</td>
							<td>&nbsp;</td>
						</tr>
						
						<tr>
							<td>余额充值</td>
							<td>/lionfish_comshop/pages/user/charge</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>积分签到/积分兑换/积分商城</td>
							<td>/lionfish_comshop/moduleA/score/signin</td>
							<td>&nbsp;</td>
						</tr>
						
						<tr>
							<td>我的优惠券</td>
							<td>/lionfish_comshop/pages/user/coupon</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>会员卡</td>
							<td>/lionfish_comshop/moduleA/vip/upgrade</td>
							<td>&nbsp;</td>
						</tr>
						
						<tr>
							<td>拼团首页</td>
							<td>/lionfish_comshop/moduleA/pin/index</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>我的拼团</td>
							<td>/lionfish_comshop/moduleA/pin/me</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>拼团商品详情</td>
							<td>/lionfish_comshop/moduleA/pin/goodsDetail?id=*</td>
							<td>&nbsp;</td>
						</tr>
						
						<tr>
							<td>付费会员首页</td>
							<td>/lionfish_comshop/moduleA/vip/upgrade</td>
							<td>&nbsp;</td>
						</tr>

						<tr>
							<td>菜谱</td>
							<td>/lionfish_comshop/moduleA/menu/index</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>菜谱详情</td>
							<td>/lionfish_comshop/moduleA/menu/details?id=*</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>视频商品列表</td>
							<td>/lionfish_comshop/moduleA/video/index</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>视频商品详情</td>
							<td>/lionfish_comshop/moduleA/video/detail?id=*</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>分销申请</td>
							<td>/lionfish_comshop/distributionCenter/pages/recruit</td>
							<td>&nbsp;</td>
						</tr>
						
						<tr>
							<td>分销中心</td>
							<td>/lionfish_comshop/distributionCenter/pages/me</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>分销中心-我的粉丝</td>
							<td>/lionfish_comshop/distributionCenter/pages/fans</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>分销中心-推广明细</td>
							<td>/lionfish_comshop/distributionCenter/pages/goodsDetails</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>分销中心-分销提现</td>
							<td>/lionfish_comshop/distributionCenter/pages/excharge</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>分销中心-我的二维码</td>
							<td>/lionfish_comshop/distributionCenter/pages/share</td>
							<td>&nbsp;</td>
						</tr>
						

						<tr>
							<td>团长中心</td>
							<td>/lionfish_comshop/moduleA/groupCenter/index</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>团长中心-我的团单</td>
							<td>/lionfish_comshop/moduleA/groupCenter/groupList</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>团长中心-社区用户</td>
							<td>/lionfish_comshop/moduleA/groupCenter/communityMembers</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>团长中心-结算记录</td>
							<td>/lionfish_comshop/moduleA/groupCenter/distributionList</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>团长中心-我的钱包</td>
							<td>/lionfish_comshop/moduleA/groupCenter/wallet</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>团长中心-提现申请</td>
							<td>/lionfish_comshop/moduleA/groupCenter/editInfo</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>团长中心-核销管理</td>
							<td>/lionfish_comshop/moduleA/groupCenter/communityMembers</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>团长中心-团长分销</td>
							<td>/lionfish_comshop/moduleA/groupCenter/gruopInfo</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>接龙首页</td>
							<td>/lionfish_comshop/moduleA/solitaire/index</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>接龙详情</td>
							<td>/lionfish_comshop/moduleA/solitaire/details?id=*</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>个人中心--我的接龙</td>
							<td>/lionfish_comshop/moduleA/solitaire/me</td>
							<td>&nbsp;</td>
						</tr>

						<tr>
							<td>附近社区</td>
							<td>/lionfish_comshop/pages/position/community</td>
							<td>&nbsp;</td>
						</tr>
						
						<tr>
							<td>常见帮助</td>
							<td>/lionfish_comshop/pages/user/protocol</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>关于我们</td>
							<td>/lionfish_comshop/pages/user/articleProtocol</td>
							<td>&nbsp;</td>
						</tr>

						<tr>
							<td>直播列表</td>
							<td>/lionfish_comshop/moduleB/live/index</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>直播间</td>
							<td>/lionfish_comshop/moduleB/__plugin__/wx2b03c6e691cd7370/pages/live-player-plugin?room_id=*</td>
							<td>&nbsp;</td>
						</tr>

					</tbody>
				</table>
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

	var index_top_font_color = '<?php echo ($data["index_top_font_color"]); ?>';
    colorpicker.render({
      elem: '#minicolors2'
      ,color: index_top_font_color ? index_top_font_color : '#FFFFFF'
      ,done: function(color){
        $('#test-colorpicker-form-input2').val(color);
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