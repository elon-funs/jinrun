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
		<div class="layui-card-header layui-elem-quote">当前位置：
			<span class="line-text">批量发货</span>
		</div>
		
		
		<div class="layui-tab layui-tab-brief" >
		  <ul class="layui-tab-title">
				<li  <?php if( empty($type) || $type=='normal'){ ?>class="layui-this"<?php } ?>><a href="<?php echo U('order/ordersendall', array('type' => 'normal','ok' => 1));?>">批量发货到团长</a></li>
                <li  <?php if( $type=='mult'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('order/ordersendall', array('type' => 'mult','ok' => 1));?>">快递导入方式</a></li>
				<li  <?php if( $type=='mult_send_tuanz'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('order/ordersendall', array('type' => 'mult_send_tuanz','ok' => 1));?>">订单批量团长签收</a></li>
				<li  <?php if( $type=='mult_member_receive_order'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('order/ordersendall', array('type' => 'mult_member_receive_order','ok' => 1));?>">订单批量确认收货</a></li>
				
		  </ul>
		</div>
	  
		
		<div class="layui-card-body" style="padding:15px;">
			
			<div class="summary_box">
        
				<?php if( empty($type) || $type=='normal'){ ?>
				<div class="summary_title">
					<span class=" title_inner">批量发货到团长</span>
				</div>
				<div class="summary_lg">
					功能介绍: 使用excel快速导入进行订单发货
					<p>如重复导入数据将以最新导入数据为准，请谨慎使用</p>
					<p>数据导入订单状态自动修改为配送中</p>
					<p>一次导入的数据不要太多,大量数据请分批导入,建议在服务器负载低的时候进行</p>
					使用方法:
					<p>1. 下载Excel模板文件并录入信息</p>
					<p>2. 上传Excel导入</p>
					格式要求：  Excel第一列必须为订单编号
				</div>
				<?php } ?>
				
				<?php if( $type=='mult_send_tuanz'){ ?>
				<div class="summary_title">
					<span class=" title_inner">订单批量团长签收</span>
				</div>
				<div class="summary_lg">
					功能介绍: 使用excel快速导入配送中订单进行团长批量签收
					<p>如重复导入数据将以最新导入数据为准，请谨慎使用</p>
					<p>数据导入订单状态自动修改为已送达团长</p>
					<p>一次导入的数据不要太多,大量数据请分批导入,建议在服务器负载低的时候进行</p>
					使用方法:
					<p>1. 下载Excel模板文件并录入信息</p>
					<p>2. 上传Excel导入</p>
					格式要求：  Excel第一列必须为订单编号
				</div>
				<?php } ?>
				
				<?php if( $type=='mult_member_receive_order'){ ?>
				<div class="summary_title">
					<span class=" title_inner">订单批量确认收货</span>
				</div>
				<div class="summary_lg">
					功能介绍: 使用excel快速导入 <span class="text-primary">待收货的订单</span>进行批量用户确认收货
					<p>如重复导入数据将以最新导入数据为准，请谨慎使用</p>
					<p>数据导入订单状态自动修改为确认收货，并进行<span class="text-primary">团长佣金结算</span></p>
					<p>一次导入的数据不要太多,大量数据请分批导入,建议在服务器负载低的时候进行</p>
					使用方法:
					<p>1. 下载Excel模板文件并录入信息</p>
					<p>2. 上传Excel导入</p>
					格式要求：  Excel第一列必须为订单编号
				</div>
				<?php } ?>
				
				
				<?php if( $type=='mult'){ ?>
				<div class="summary_title">
					<span class=" title_inner">批量快递发货到会员</span>
				</div>
				<div class="summary_lg" >
					功能介绍: 使用excel快速导入进行订单发货
					<p>如重复导入数据将以最新导入数据为准，请谨慎使用</p>
					<p>数据导入订单状态自动修改为已发货</p>
					<p>一次导入的数据不要太多,大量数据请分批导入,建议在服务器负载低的时候进行</p>
					使用方法:
					<p>1. 下载Excel模板文件并录入信息</p>
					<p>2. 选择快递公司</p>
					<p>3. 上传Excel导入</p>
					格式要求：  Excel第一列必须为订单编号，第二列必须为快递单号
				</div>
				<?php } ?>
			</div>
	
			<form action="" id="importform" class="layui-form" lay-filter="example" method="post" enctype="multipart/form-data">
				
				<input type="hidden" name="type" value="<?php echo ($type); ?>"/>
				<div class='layui-row'>
					<?php if( !empty($type) && $type=='mult'){ ?>
					<div class="layui-row" >
						<label class="layui-col-lg control-label">快递公司</label>
						<div class="layui-col-sm-5 goodsname"  style="padding-right:0;" >
							<select class="form-control" name="express" id="express">
								<option value="" data-name="">其他快递</option>

								<?php foreach( $express_list as $value ){ ?>
								<option value="<?php echo ($value['id']); ?>" data-name="<?php echo ($value['name']); ?>"><?php echo ($value['name']); ?></option>
								<?php } ?>

							</select>
							<input type='hidden' name='expresscom' id='expresscom' value=""/>
						</div>
					</div>
					<?php } ?>

					<div class="layui-row">
						<label class="layui-col-lg control-label">EXCEL</label>

						<div class="layui-col-sm-5 goodsname"  style="padding-right:0;" >
							<input type="file" name="excelfile" class="form-control" />
							<span class="help-block">如果遇到数据重复则将进行数据更新</span>
						</div>
					</div>

				</div>
				<div class='layui-row'>
					<div class="layui-col-sm-12">
						<?php if( empty($type) || $type=='normal' || $type=='mult_send_tuanz' || $type=='mult_member_receive_order'){ ?>
						<div class="modal-footer" style="text-align: left">
							<button type="submit" class="btn btn-primary" name="cancelsend" value="yes">确认导入</button>
							<a class="btn btn-primary" href="<?php echo U('order/batchsend_import', array('type' => 'normal'));?>" >
								<i class="fa fa-download" title=""></i> 下载Excel模板文件
							</a>
						</div>
						<?php } ?>
						<?php if( $type=='mult'){ ?>
						<div class="modal-footer" style="text-align: left">
							<button type="submit" class="btn btn-primary" name="cancelsend" value="yes">确认导入</button>
							<a class="btn btn-primary" href="<?php echo U('order/batchsend_import', array('type' => 'mult'));?>" >
								<i class="fa fa-download" title=""></i> 下载Excel模板文件
							</a>
							
						</div>
						<?php } ?>
					</div>
				</div>
			</form>
		</div>
		
		
		
		<div class="layui-card-body" style="padding:15px;">
			
			<?php if(empty($_GPC['type']) || $_GPC['type']=='normal'){ ?>
				<div class='layui-row'>
					<div class="layui-col-sm-12">
						<a class='btn btn-default btn-sm btn-op ' data-sec="1" data-confirm='此操作将对所有配送方式为“到点自提”，“团长配送”的待发货订单发货，进入下一环节待团长签收（待确认送达团长）?' data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('delivery/onekey_tosendallorder', array('sec' => 1) );?>" >
							<i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="此操作将对所有配送方式为“到点自提”，“团长配送”的待发货订单发货，进入下一环节待团长签收（待确认送达团长） " ></i>
							一键发货到团长
						</a>
					</div>
				</div>	
				
			<?php } ?>
			
			<?php if(!empty($_GPC['type']) && $_GPC['type']=='mult_send_tuanz'){ ?>
				<div class='layui-row'>
					<div class="layui-col-sm-12">
						<a class='btn btn-default btn-sm btn-op ' data-sec="1" data-confirm='对所有待团长签收（待确认送达团长）进行签收，进入下一环节待用户确认收货（待团长核销）' data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('delivery/onekey_opsend_tuanz_over', array('sec' => 1) );?>" >
							<i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="对所有待团长签收（待确认送达团长）进行签收，进入下一环节待用户确认收货（待团长核销）" ></i>
							一键团长签收
						</a>
					</div>
				</div>	
				
			<?php } ?>
			
			<?php if(!empty($_GPC['type']) && $_GPC['type']=='mult_member_receive_order'){ ?>
				<div class='layui-row'>
					<div class="layui-col-sm-12">
						<a class='btn btn-default btn-sm btn-op ' data-sec="1" data-confirm='对所有的配送方式的订单进行确认收货（团长核销/快递的收货）' data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('delivery/onekey_opreceive', array('sec' => 1) );?>" >
							<i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="对所有的配送方式的订单进行确认收货（团长核销/快递的收货）" ></i>
							一键确认收货
						</a>
					</div>
				</div>	
				
			<?php } ?>
			
			
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

layui.use(['jquery', 'layer','form'], function(){ 
  $ = layui.$;
  var form = layui.form;
  
  
	$("[data-toggle='ajaxModal']").click(function () {
        var s_url = $(this).attr('data-href');
		ajax_url = s_url;
		
	    layer.confirm($(this).attr('data-confirm'), function(index){
			$.post(ajax_url, {}, function(shtml){
             layer.open({
                type: 1,
                area: '930px',
                content: shtml //注意，如果str是object，那么需要字符拼接。
              });
            });
	   })
	   	
    });
	
	
	
	$('.deldom').click(function(){
		var s_url = $(this).attr('data-href');
		layer.confirm($(this).attr('data-confirm'), function(index){
					 $.ajax({
						url:s_url,
						type:'post',
						dataType:'json',
						success:function(info){
						
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
					})
				}); 
	})
	
	$('.btn-operation').click(function(){
		var ids_arr = [];
		var obj = $(this);
		var s_toggle = $(this).attr('data-toggle');
		var s_url = $(this).attr('data-href');
		
		
		$("input[name=item_checkbox]").each(function() {
			
			if( $(this).prop('checked') )
			{
				ids_arr.push( $(this).val() );
			}
		})
		if(ids_arr.length < 1)
		{
			layer.msg('请选择要操作的内容');
		}else{
			var can_sub = true;
			if( s_toggle == 'batch-remove' )
			{
				can_sub = false;
				
				layer.confirm($(obj).attr('data-confirm'), function(index){
					 $.ajax({
						url:s_url,
						type:'post',
						dataType:'json',
						data:{ids:ids_arr},
						success:function(info){
						
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
					})
				}); 
			}else{
				$.ajax({
					url:s_url,
					type:'post',
					dataType:'json',
					data:{ids:ids_arr},
					success:function(info){
					
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
				})
			}
		}
	})

	form.on('switch(restwsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var rest = 1;
	  if(data.elem.checked)
	  {
		rest = 1;
	  }else{
		rest = 0;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{rest:rest},
			success:function(info){
			
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
		})
	}); 
	form.on('switch(enablewsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var enable = 1;
	  if(data.elem.checked)
	  {
		enable = 1;
	  }else{
		enable = 0;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{enable:enable},
			success:function(info){
			
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
		})
	}); 
	
	form.on('switch(statewsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var state = 1;
	  if(data.elem.checked)
	  {
		state = 1;
	  }else{
		state = 0;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{state:state},
			success:function(info){
			
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
		})
	});  
	form.on('checkbox(checkboxall)', function(data){
	  
	  if(data.elem.checked)
	  {
		$("input[name=item_checkbox]").each(function() {
			$(this).prop("checked", true);
		});
		$("input[name=checkall]").each(function() {
			$(this).prop("checked", true);
		});
		
	  }else{
		$("input[name=item_checkbox]").each(function() {
			$(this).prop("checked", false);
		});
		$("input[name=checkall]").each(function() {
			$(this).prop("checked", false);
		});
	  }
	  
	  form.render('checkbox');
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

<script language='javascript'>
    $(function(){

        $('#importform').submit(function(){
            if(!$(":input[name=excelfile]").val()){
                layer.msg("您还未选择Excel文件哦~");
                return false;
            }
        })

        $("#express").change(function () {
            var obj = $(this);
            var sel = obj.find("option:selected").attr("data-name");
            $("#expresscom").val(sel);
        });

    })

</script>
</body>