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
    tbody tr td{
        position: relative;
    }
    tbody tr  .icow-weibiaoti--{
        visibility: hidden;
        display: inline-block;
        color: #fff;
        height:18px;
        width:18px;
        background: #e0e0e0;
        text-align: center;
        line-height: 18px;
        vertical-align: middle;
    }
    tbody tr:hover .icow-weibiaoti--{
        visibility: visible;
    }
    tbody tr  .icow-weibiaoti--.hidden{
        visibility: hidden !important;
    }
    .full .icow-weibiaoti--{
        margin-left:10px;
    }
    .full>span{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        vertical-align: middle;
        align-items: center;
    }
    tbody tr .label{
        margin: 5px 0;
    }
    .goods_attribute a{
        cursor: pointer;
    }
    .newgoodsflag{
        width: 22px;height: 16px;
        background-color: #ff0000;
        color: #fff;
        text-align: center;
        position: absolute;
        bottom: 70px;
        left: 57px;
        font-size: 12px;
    }
	.a{cursor: pointer;}
</style>
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">视频设置（首页搜索框上方）</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				<div class="layui-form-item" >
					<label class="layui-form-label">封面图</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[index_video_poster]', $data['index_video_poster']);?>
					</div>
				</div>
				<div class="layui-form-item" >
					<label class="layui-form-label">视频</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_video('parameter[index_video_url]',$data['index_video_url'] );;?>
						<span class='layui-form-mid'>视频尺寸与封面图同等。</span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">状态</label>
					<div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='parameter[index_video_enabled]' title="隐藏" value=0 <?php if( $data['index_video_enabled']==0 || empty($data) ){ ?>checked<?php } ?> /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[index_video_enabled]' title="显示" value=1 <?php if( $data['index_video_enabled']==1 && !empty($data) ){ ?>checked<?php } ?> /> 
						</label>
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
 
    var index_notice_font_color = '<?php echo ($data["index_notice_font_color"]); ?>';
    colorpicker.render({
      elem: '#minicolors4'
      ,color: index_notice_font_color ? index_notice_font_color : '#ff5344'
      ,done: function(color){
        $('#test-colorpicker-form-input4').val(color);
      }
    });

    var index_notice_background_color = '<?php echo ($data["index_notice_background_color"]); ?>';
    colorpicker.render({
      elem: '#minicolors5'
      ,color: index_notice_background_color ? index_notice_background_color : '#fff9f4'
      ,done: function(color){
        $('#test-colorpicker-form-input5').val(color);
      }
    });
  
  	//监听提交
  	form.on('submit(formDemo)', function(data){

  		var thumb = $("input[name='parameter[index_video_poster]'").val();
  		var videoUrl = $("input[name='parameter[index_video_url]']").val();

		if(thumb=='') {
			layer.msg('封面图必须上传', {icon: 5});
			return false;
		}

		if(videoUrl=='') {
			layer.msg('视频必须上传', {icon: 5});
			return false;
		}
	
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