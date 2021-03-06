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
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">会员设置</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
		
			
			 <div class="layui-form-item" >
				<label class="layui-form-label">手机号授权</label>
				<div class="layui-input-block">
					<label class="radio-inline"><input type="radio"  name="data[is_show_auth_mobile]" <?php if( !isset($data['is_show_auth_mobile']) || $data['is_show_auth_mobile'] ==0 ){ ?> checked <?php } ?> value="0" title="否" /></label>
					<label  class="radio-inline"><input type="radio"  name="data[is_show_auth_mobile]" <?php if( isset($data['is_show_auth_mobile']) && $data['is_show_auth_mobile'] ==1 ){ ?> checked <?php } ?> value="1" title="是" /></label>
				</div>
			</div>
			
			<div class="layui-form-item" >
				<label class="layui-form-label">显示会员等级</label>
				<div class="layui-input-block">
					<label class="radio-inline"><input type="radio"  name="data[is_show_member_level]"  <?php if( !isset($data['is_show_member_level']) || $data['is_show_member_level'] ==0 ){ ?> checked <?php } ?> value="0" title="隐藏" /></label>
					<label  class="radio-inline"><input type="radio"  name="data[is_show_member_level]" <?php if( isset($data['is_show_member_level']) && $data['is_show_member_level'] ==1 ){ ?> checked <?php } ?> value="1" title="显示" /></label>
				</div>
			</div>
			
			<div class="layui-form-item">
				<label class="layui-form-label">会员是否需要审核</label>
				<div class="layui-input-block">
					<label class='radio-inline'>
						<input type='radio' name='data[is_user_shenhe]' value='0' <?php if(!empty($data) && $data['is_user_shenhe'] ==0){ ?>checked <?php } ?> title="不需要" /> 
					</label>
					<label class='radio-inline'>
						<input type='radio' name='data[is_user_shenhe]' value='1' <?php if(empty($data) || $data['is_user_shenhe'] ==1){ ?>checked <?php } ?> title="需要" /> 
					</label>
				</div>
			</div>
			
			<div class="layui-form-item">
				<label class="layui-form-label">是否收集表单信息</label>
				<div class="layui-input-block">
					<label class='radio-inline'>
						<input type='radio' name='data[is_get_formdata]' value='0' <?php if(!empty($data) && $data['is_get_formdata'] ==0){ ?>checked <?php } ?> title="不需要" /> 
					</label>
					<label class='radio-inline'>
						<input type='radio' name='data[is_get_formdata]' value='1' <?php if(empty($data) || $data['is_get_formdata'] ==1){ ?>checked <?php } ?> title="需要" /> 
					</label>
				</div>
			</div>
			
			<div class="layui-form-item">
				<label class="layui-form-label">普通等级可以下单</label>
				<div class="layui-input-block">
					<label class='radio-inline'>
						<input type='radio' name='data[puis_not_buy]' value='0' <?php if(!empty($data) && $data['puis_not_buy'] ==0){ ?>checked <?php } ?> title="可以" /> 
					</label>
					<label class='radio-inline'>
						<input type='radio' name='data[puis_not_buy]' value='1' <?php if(empty($data) || $data['puis_not_buy'] ==1){ ?>checked <?php } ?> title="不可以" /> 
					</label>
				</div>
			</div>
			
			
		
				<div class="layui-form-item">
					<label class="layui-form-label"> </label>
					<div class="layui-input-block">
						<input type="submit" value="提交" lay-submit lay-filter="formDemo" class="btn btn-primary"  />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
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

var cur_open_div;

layui.use(['jquery', 'layer','form'], function(){ 
  $ = layui.$;
  var form = layui.form;
  
	form.on('radio(linktype)', function(data){
		if (data.value == 2) {
			$('#typeGroup').show();
		} else {
			$('#typeGroup').hide();
		}
	});  

	
	$('#chose_link').click(function(){
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('util.selecturl', array('ok' => 1));?>", {}, function(shtml){
		 layer.open({
			type: 1,
			area: '930px',
			content: shtml //注意，如果str是object，那么需要字符拼接。
		  });
		});
	})
		
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