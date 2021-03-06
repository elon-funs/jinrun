<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
.daterangepicker select.ampmselect, .daterangepicker select.hourselect, .daterangepicker select.minuteselect
{
    width: auto!important;
}
</style>
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">一键设置商品时间</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				
				<?php  if (defined('ROLE') && ROLE == 'agenter' ) { ?>
					<div class="layui-form-item">
						<label class="layui-form-label">统一商品团购时间</label>
						<div class="layui-input-block">
							<label class="radio-inline"><input type="radio" lay-filter="is_samedefault_now" name="is_samedefault_now" value="0" <?php if( !isset($data['is_samedefault_now']) || $data['is_samedefault_now'] == 0){ ?>checked="true"<?php } ?> title="默认当前" /> </label>
							<label class="radio-inline"><input type="radio" lay-filter="is_samedefault_now" name="is_samedefault_now" value="2" <?php if( isset($data['is_samedefault_now']) && $data['is_samedefault_now'] == 2){ ?>checked="true"<?php } ?> title="统一供应商团购时间" /> </label>
							<br/>
							<span class="layui-form-mid layui-word-aux" id="same_form">保持目前团购时间不变</span>
						</div>
					</div>
					<div class="layui-form-item" id="samedefault_now" <?php if( !isset($data['is_samedefault_now']) || $data['is_samedefault_now'] == 0 ){ ?> style="display:none;"<?php } ?>>
						<label class="layui-form-label">团购时间</label>
						<div class="layui-input-block">
							<?php echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $data[goods_same_starttime]),'endtime'=>date('Y-m-d H:i', $data[goods_same_endtime])),true);;?>
						</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">统一商品提货时间</label>
						<div class="layui-input-block">
							<label class="radio-inline"><input type="radio" lay-filter="is_sametihuo_time" name="is_sametihuo_time" value="0" <?php if( !isset($data['is_sametihuo_time']) || $data['is_sametihuo_time'] == 0){ ?>checked="true"<?php } ?> title="默认当前" /> </label>
							<label class="radio-inline"><input type="radio" lay-filter="is_sametihuo_time" name="is_sametihuo_time" value="2" <?php if( isset($data['is_sametihuo_time']) && $data['is_sametihuo_time'] == 2){ ?>checked="true"<?php } ?> title="供应商团购时间" /> </label>
							<br/>
							<span class="layui-form-mid layui-word-aux" id="same_tihuo">保持目前提货时间不变</span>
						</div>
					</div>
					
					<div class="layui-form-item" id="sametihuo_time" <?php if( !isset($data['is_sametihuo_time']) || $data['is_sametihuo_time'] == 0){ ?>style="display:none;"<?php } ?>>
						<label class="layui-form-label">提货时间</label>
						<div class="col-sm-10 col-xs-12" id="radPickupDateTip"> 
							
							<label class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( !isset($data['pick_up_type']) || $data['pick_up_type'] ==0 ){ ?> checked <?php } ?> value="4" title="当日达" /><span class="fake-radio"></span></label>
							<label  class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( isset($data['pick_up_type']) && $data['pick_up_type'] ==1 ){ ?> checked <?php } ?> value="1" title="次日达" /><span class="fake-radio"></span></label>
							<label  class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( isset($data['pick_up_type']) && $data['pick_up_type'] ==2 ){ ?> checked <?php } ?> value="2" title="隔日达" /><span class="fake-radio"></span></label>
							<label  class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( isset($data['pick_up_type']) && $data['pick_up_type'] ==3 ){ ?> checked <?php } ?> value="3" title="自定义" /><span class="fake-radio"></span></label>
							
							<input class="form-control " id="txtPickupDateTip" name="pick_up_modify" style="vertical-align: sub; <?php if( isset($data['pick_up_type']) && $data['pick_up_type'] ==3){ ?>display:inline-block;<?php  }else{ ?>display: none;<?php } ?>width: 120px;" type="text" value="<?php echo ($data['pick_up_modify']); ?>">
							
							<div style="clear:both;"></div>
							
						</div>
					</div>
				<?php }else{ ?>
					<div class="layui-form-item">
						<label class="layui-form-label">统一商品团购时间</label>
						<div class="layui-input-block">
							<label class="radio-inline"><input type="radio" lay-filter="is_samedefault_now" name="is_samedefault_now" value="0" <?php if( !isset($data['is_samedefault_now']) || $data['is_samedefault_now'] == 0){ ?>checked="true"<?php } ?> title="默认当前" /> </label>
							<label class="radio-inline"><input type="radio" lay-filter="is_samedefault_now" name="is_samedefault_now" value="1" <?php if( isset($data['is_samedefault_now']) && $data['is_samedefault_now'] == 1){ ?>checked="true"<?php } ?> title="统一平台团购时间" /> </label>
							<label class="radio-inline"><input type="radio" lay-filter="is_samedefault_now" name="is_samedefault_now" value="2" <?php if( isset($data['is_samedefault_now']) && $data['is_samedefault_now'] == 2){ ?>checked="true"<?php } ?> title="统一平台及供应商团购时间" /> </label>
							<br/>
							<span class="layui-form-mid layui-word-aux" id="same_form">保持目前团购时间不变</span>
						</div>
					</div>
					<div class="layui-form-item" id="samedefault_now" <?php if( !isset($data['is_samedefault_now']) || $data['is_samedefault_now'] == 0 ){ ?> style="display:none;"<?php } ?> >
						<label class="layui-form-label">团购时间</label>
						<div class="layui-input-block">
							<?php echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $data[goods_same_starttime]),'endtime'=>date('Y-m-d H:i', $data[goods_same_endtime])),true);;?>
						</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">统一商品提货时间</label>
						<div class="layui-input-block">
							<label class="radio-inline"><input type="radio" lay-filter="is_sametihuo_time" name="is_sametihuo_time" value="0" <?php if( !isset($data['is_sametihuo_time']) || $data['is_sametihuo_time'] == 0){ ?>checked="true"<?php } ?> title="默认当前" /> </label>
							<label class="radio-inline"><input type="radio" lay-filter="is_sametihuo_time" name="is_sametihuo_time" value="1" <?php if( isset($data['is_sametihuo_time']) && $data['is_sametihuo_time'] == 1){ ?>checked="true"<?php } ?> title="统一平台提货时间" /> </label>
							<label class="radio-inline"><input type="radio" lay-filter="is_sametihuo_time" name="is_sametihuo_time" value="2" <?php if( isset($data['is_sametihuo_time']) && $data['is_sametihuo_time'] == 2){ ?>checked="true"<?php } ?> title="统一平台及供应商团购时间" /> </label>
							<br/>
							<span class="layui-form-mid layui-word-aux" id="same_tihuo">保持目前提货时间不变</span>
						</div>
					</div>
					
					<div class="layui-form-item" id="sametihuo_time" <?php if( !isset($data['is_sametihuo_time']) || $data['is_sametihuo_time'] == 0){ ?>style="display:none;"<?php } ?> >
						<label class="layui-form-label">提货时间</label>
						<div class="col-sm-10 col-xs-12" id="radPickupDateTip"> 
							
							<label class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( !isset($data['pick_up_type']) || $data['pick_up_type'] ==0 ){ ?> checked <?php } ?> value="4" title="当日达" /><span class="fake-radio"></span></label>
							<label  class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( isset($data['pick_up_type']) && $data['pick_up_type'] ==1 ){ ?> checked <?php } ?> value="1" title="次日达" /><span class="fake-radio"></span></label>
							<label  class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( isset($data['pick_up_type']) && $data['pick_up_type'] ==2 ){ ?> checked <?php } ?> value="2" title="隔日达" /><span class="fake-radio"></span></label>
							<label  class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( isset($data['pick_up_type']) && $data['pick_up_type'] ==3 ){ ?> checked <?php } ?> value="3" title="自定义" /><span class="fake-radio"></span></label>
							
							<input class="form-control " id="txtPickupDateTip" name="pick_up_modify" style="vertical-align: sub; <?php if( isset($data['pick_up_type']) && $data['pick_up_type'] ==3){ ?>display:inline-block;<?php  }else{ ?>display: none;<?php } ?>width: 120px;" type="text" value="<?php echo ($data['pick_up_modify']); ?>">
							
							<div style="clear:both;"></div>
							
						</div>
					</div>
				<?php } ?>
				
				
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
  
	form.on('radio(is_samedefault_now)', function(data){
		<?php  if (defined('ROLE') && ROLE == 'agenter' ) { ?>
			if (data.value == 0) {
				$('#samedefault_now').hide();
				$('#same_form').html('保持目前团购时间不变');
			}
			else if( data.value == 2 )
			{
				$('#samedefault_now').show();
				$('#same_form').html('此操作会变更独立供应商商品的团购时间(不包含拼团)，请谨慎操作。');
			}
		
		<?php }else{ ?>
		
			if (data.value == 0) {
				$('#samedefault_now').hide();
				$('#same_form').html('保持目前团购时间不变');
				
			}else if( data.value == 1 )
			{
				$('#samedefault_now').show();
				$('#same_form').html('此操作会变更所有平台商品的团购时间(不包含拼团)，请谨慎操作。');
			}
			else if( data.value == 2 )
			{
				$('#samedefault_now').show();
				$('#same_form').html('此操作会变更平台+独立供应商商品的团购时间(不包含拼团)，请谨慎操作。');
			}
		
		<?php } ?>
		
	}); 

	form.on('radio(is_sametihuo_time)', function(data){
	
		<?php  if (defined('ROLE') && ROLE == 'agenter' ) { ?>
				if (data.value == 0) {
					$('#sametihuo_time').hide();
					$('#same_tihuo').html('保持目前提货时间不变');
				}
				else if( data.value == 2 )
				{
					$('#sametihuo_time').show();
					$('#same_tihuo').html('此操作会变更独立供应商商品的提货时间(不包含拼团)，请谨慎操作。');
				}
		<?php }else{ ?>
			if (data.value == 0) {
			
				$('#sametihuo_time').hide();
				$('#same_tihuo').html('保持目前提货时间不变');
			}else if( data.value == 1 )
			{
				$('#sametihuo_time').show();
				$('#same_tihuo').html('此操作会变更所有平台商品的提货时间(不包含拼团)，请谨慎操作。');
			}
			else if( data.value == 2 )
			{
				$('#sametihuo_time').show();
				$('#same_tihuo').html('此操作会变更平台+独立供应商商品的提货时间(不包含拼团)，请谨慎操作。');
			}
		<?php } ?>
		
		
	});	
	
	
	

	$('#radPickupDateTip input[type=radio]').click(function(){
		var s_val = $(this).val();
		if(s_val == 3)
		{
			$('#txtPickupDateTip').css('display','inline-block');
		}else{
			$('#txtPickupDateTip').css('display', 'none');
		}
	})
								 
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
	
	layer.confirm('是否确认统一修改团购时间和提货时间？', function(index){
	
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
		
	});
	
    return false;
  });
})



</script>  
</body>