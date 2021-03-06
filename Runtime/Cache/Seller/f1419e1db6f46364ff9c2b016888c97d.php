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
	.img-40 {
		width: 40px;
		height: 40px;
	}
	.daterangepicker select.ampmselect, .daterangepicker select.hourselect, .daterangepicker select.minuteselect{
		width:auto!important;
	}
</style>
</head>
<body layadmin-themealias="default">

<table id="demo" lay-filter="test"></table>


<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">团长列表</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="get" class="form-horizontal form-search layui-form" role="form">
				<input type="hidden" name="c" value="communityhead" />
				<input type="hidden" name="a" value="index" />
				
				<input type="hidden" name="type" value="<?php echo ($type); ?>" />
				
				<div class="layui-form-item">
				  <div class="layui-inline">
				  
					
					<div class="layui-input-inline" >
						<select name='comsiss_state' class='layui-input layui-unselect' style="width:80px;"  >
							<option value=''>状态</option>
							<option value='0' <?php if( $comsiss_state=='0'){ ?>selected<?php } ?>>未审核</option>
							<option value='1' <?php if( $comsiss_state=='1'){ ?>selected<?php } ?>>已审核</option>
							<option value='2' <?php if( $comsiss_state=='2'){ ?>selected<?php } ?>>拒绝通过</option>
						</select>
					</div>
					<div class="layui-input-inline" >
						<input type="text" class="layui-input"  name="keyword" value="<?php echo ($keyword); ?>" placeholder="会员昵称/团长姓名/手机号/小区名称"/>
				
					</div>
					<div class="layui-input-inline">
						<select name="level_id" class="layui-input layui-unselect">
							<option value="">团长等级</option>
							<?php foreach( $community_head_level as $level ){ ?>
							<option value="<?php echo ($level['id']); ?>" <?php if( $level_id == $level['id']){ ?>selected<?php } ?>><?php echo ($level['levelname']); ?></option>
							<?php } ?>
						</select>
					</div>
					
					<div class="layui-input-inline">
						<select name="group_id" class="layui-input layui-unselect">
							<option value="">团长分组</option>
							
							<?php foreach($group_list as $group){ ?>
							<option value="<?php echo ($group['id']); ?>" <?php if( $group_id == $group['id'] ){ ?>selected<?php } ?>><?php echo ($group['groupname']); ?></option>
							<?php } ?>
						</select>
					</div>
					
					<div class="layui-input-inline">
						<button class="layui-btn layui-btn-sm" type="submit"> 搜索</button>
						<button type="submit" name="export" value="1" class="btn btn-success ">导出</button>
					</div>
				  </div>
				</div>
			</form>
			<form action="" class="layui-form" lay-filter="example" method="post" >
       
	   
				
				
				<div class="row">
					<div class="col-md-12">
					
						<div class="page-table-header">
							<input type='checkbox' name="checkall" lay-skin="primary" lay-filter="checkboxall"  />
							<span class="pull-right"> 
								<a href="<?php echo U('communityhead/addhead', array('ok' => 1));?>" class="layui-btn layui-btn-sm"><i class="fa fa-plus"></i> 添加团长</a>
							</span>
							<div class="btn-group">
								<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch' data-href="<?php echo U('communityhead/agent_check',array('state'=>1));?>"  data-confirm='确认要审核通过?'>
									 审核通过
								</button>
								<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch'  data-href="<?php echo U('communityhead/agent_check',array('state'=>2));?>" data-confirm='确认要拒绝通过?'>
									 拒绝通过
								</button>
								<button class="btn btn-default btn-sm " type="button" data-toggle="batch-group" data-href="<?php echo U('communityhead/changelevel', array('toggle' => 'group'));?>" > <i class="icow icow-fenzuqunfa"></i>修改分组</button>
								<a class="btn btn-default btn-sm btn-op" data-toggle="batch-level" > 修改等级</a>
							</div>
						</div>
						<table class="table table-responsive" lay-even lay-skin="line" lay-size="lg">
							<thead>
							 <tr>
								<th style="width:25px;"></th>
								<th style="width:60px;">ID</th>
								<th style="min-width:50px;">小区名称</th>
								<th style="width: 200px;">团长</th>
								<th style="width: 100px;">上级团长<BR/>直推下级数量</th>
								<?php if($open_danhead_model == 1){ ?>
								<th style="">默认团长</th>
								<?php } ?>
								<th style="">商品数量</th>
								<th style='width:150px;'>佣金情况</th>
								<th style='width:100px;'>提货地址</th>
								<th style="">申请时间</br>审核时间</th>
								<th style='width:100px;'>是否休息</th>
								<th style='width:100px;'>状态</th>
								<th style="width: 300px;text-align: center;">操作</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach( $list as $row ){ ?>
							<tr>
								<td style="position: relative; ">
									<input type='checkbox' name="item_checkbox" class="checkone" lay-skin="primary" value="<?php echo ($row['id']); ?>"/>
								</td>
								<td>
									<?php echo ($row['id']); ?>
								</td>
								<td> 
								<?php echo ($row['community_name']); ?>
								
								</td>
								<td style="overflow: visible">
									<div style="display: flex">
									   <img class="img-40" src="<?php echo ($row['avatar']); ?>" style='border-radius:50%;border:1px solid #efefef;' />
									   <span style="display: flex;flex-direction: column;justify-content: center;align-items: flex-start;padding-left: 5px">
										   <span class="nickname">
											   姓名：<?php echo ($row['head_name']); ?>
											   <br/>
											   昵称：<?php echo ($row['username']); ?>
											   <br/>当前团员数量： <span class="text-primary"><?php echo ($row['member_count']); ?></span>
											   
											   <br/>
												<span class="text-warning">等级：<?php echo ($level_id_to_name[$row['level_id']]); ?></span>
												
												<br/>
												<?php if(empty($row['groupname'])){ ?><span class="text-warning">默认分组<?php }else{ echo ($row['groupname']); ?></span><?php } ?>
										   </span>
										   
									   </span>
									</div>
								</td>
								<td> 
								
								<?php if( !empty($row['agent_name']) ){ ?>
								   	<?php echo ($row['agent_name']); ?>
								<?php }else{ ?>
							   		暂无上级
								<?php } ?>
								<br/>
								直推团长：<?php echo ($row['agent_count']); ?>
								<br/>
								电话：<?php echo ($row['head_mobile']); ?>
								</td>
								<?php if($open_danhead_model == 1){ ?>
								<td> 
									<input type="checkbox" name="" lay-filter="defaultsitch" data-href="<?php echo U('communityhead/default_check',array('id'=>$row['id']));?>" <?php if( $row['is_default']==1 ){ ?>checked<?php } ?> lay-skin="switch" lay-text="是|否">
								</td>
								<?php } ?>
								<td> 
								<?php echo ($row['goods_count']); ?>
								</td>
								<td>
									 待确认：<span class="text-warning"><?php echo ($row['commission_info']['pre_total_money']); ?></span><br/>
									 可提现：<span class="text-warning"><?php echo empty($row['commission_info']['money']) ? 0: $row['commission_info']['money']; ?></span><br/>
									 已打款：<span class="text-warning"><?php echo empty($row['commission_info']['getmoney']) ?0:$row['commission_info']['getmoney']; ?></span><br/>
									 提现中：<span class="text-warning"><?php echo empty($row['commission_info']['dongmoney']) ? 0:$row['commission_info']['dongmoney']; ?></span><br/>
									 总收入：<span class="text-danger"><?php echo empty($row['commission_info']['commission_total']) ? 0:$row['commission_info']['commission_total']; ?></span><br/>
								</td>
								
								<td style="white-space:normal;">
									<?php echo ($row['province_name']); echo ($row['city_name']); echo ($row['area_name']); echo ($row['country_name']); echo ($row['address']); ?>
								</td>
								<td><?php echo date("Y-m-d",$row['addtime']);?><br/><?php echo date("H:i:s",$row['addtime']);?>
								<br/>
								<?php if( !empty($row['apptime'])){ ?>
									<?php echo date("Y-m-d",$row['apptime']);?><br/><?php echo date("H:i:s",$row['apptime']);?>
								<?php } ?>
								</td>

								<td>
									<input type="checkbox" name="" lay-filter="restwsitch" data-href="<?php echo U('communityhead/rest_check',array('id'=>$row['id']));?>" <?php if( $row['rest']==1){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="是|否">
								
								</td>
								<td>
									<?php if( $row[state] ==2){ ?>
										已拒绝
									<?php  }else{ ?>
									<input type="checkbox" name="" lay-filter="statewsitch" data-href="<?php echo U('communityhead/agent_check',array('id'=>$row['id']));?>" <?php if( $row['state']==1){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="已审核|未审核">
								
									<?php } ?>
								</td>
								
								<td style="overflow:visible;text-align: center;">
									<div class="btn-group">
										
										
										<a class="layui-btn layui-btn-xs" href="<?php echo U('communityhead/addhead',array('id' => $row['id'] , 'ok' => 1));;?>" title="">
											<i class="layui-icon layui-icon-edit"></i>编辑
										</a>
										
										<?php if( ($row['state'] == 0 || $row['state'] == 2) && $row['head_goods_count'] == 0 && $row['head_order_count'] == 0 ){ ?>	
										
											 <a class='layui-btn layui-btn-xs deldom' href="javascript:;" data-href="<?php echo U('communityhead/deletehead',array('id' => $row['id']) );?>" data-confirm='确认要删除吗?'>
											  <i class="layui-icon">&#xe640;</i>删除
											</a>
										
										<?php } ?>
										
										<a class="layui-btn layui-btn-xs" href="<?php echo U('communityhead/distributionorder',array('headid' => $row['id']));;?>"  target='_blank'>
											推广订单
										</a>
										<a class="layui-btn layui-btn-xs" href="<?php echo U('communityhead/communityorder',array('head_id' => $row['id']));;?>"  target='_blank'>
											收益明细
										</a>
										<a class="layui-btn layui-btn-xs" href="<?php echo U('communityhead/goodslist',array('head_id' => $row['id'] , 'ok' => 1));;?>"  target='_blank'>
											查看在售商品
										</a>
										<a class="layui-btn layui-btn-xs" href="<?php echo U('communityhead/lookcommunitymember',array('id' => $row['id'] , 'ok' => 1));;?>">
											 查看核销人员
										</a>
										
										<input type="checkbox" name="" lay-filter="enablewsitch" data-href="<?php echo U('communityhead/enable_check',array('id'=>$row['id']));?>" <?php if( $row['enable']==1){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="已启用|已禁用">
								
									</div>
								</td>
							</tr>
						<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<td colspan="5">
									<div class="page-table-header">
										<input type="checkbox" name="checkall" lay-skin="primary" lay-filter="checkboxall">
										<div class="btn-group">
											<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch' data-href="<?php echo U('communityhead/agent_check',array('state'=>1));?>"  data-confirm='确认要审核通过?'>
												 审核通过
											</button>
											<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch'  data-href="<?php echo U('communityhead/agent_check',array('state'=>2));?>" data-confirm='确认要拒绝通过?'>
												 拒绝通过
											</button>
											<button class="btn btn-default btn-sm " type="button" data-toggle="batch-group" data-href="<?php echo U('communityhead/changelevel', array('toggle' => 'group'));?>" > <i class="icow icow-fenzuqunfa"></i>修改分组</button>
								
											<a class="btn btn-default btn-sm btn-op btn-operation" data-toggle="batch-level" disabled="disabled"><i class="icow icow-cengjiguanli"></i> 修改等级</a>
										</div>
									</div>
								</td>
								<td colspan="8" style="text-align: right">
									<?php echo ($pager); ?>
								</td>
							</tr>
							</tfoot>
						</table>
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

layui.use(['jquery', 'layer','form'], function(){ 
  $ = layui.$;
  var form = layui.form;
  
  
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
	
	
	form.on('switch(defaultsitch)', function(data){
	  
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
			data:{value:rest},
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


<div id="modal-change"  class="modal fade form-horizontal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><?php if( !empty($group['id'])){ ?>编辑<?php  }else{ ?>添加<?php } ?>标签组</h4>
            </div>
            <div class="modal-body">

                <div class="form-group batch-level" style="display: none;">
                    <label class="col-sm-2 control-label must">团长等级</label>
                    <div class="col-sm-9 col-xs-12">
                        <select name="batch-level" class="form-control">
                            <?php foreach( $community_head_level as $level ){ ?>
                                <option value="<?php echo ($level['id']); ?>"><?php echo ($level['levelname']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>		
                <div class="form-group batch-group" style="display: none;">
                    <label class="col-sm-2 control-label must">团长分组</label>
                    <div class="col-sm-9 col-xs-12">
                        <select name="batch-group[]" class="form-control select2" placeholder="会员会被加入指定的分组中"  style="position:absolute;">
							<option value="0">默认分组</option>
                            <?php foreach( $group_list as $group ){ ?>
                                <option value="<?php echo ($group['id']); ?>"><?php echo ($group['groupname']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" id="modal-change-btn">提交</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
            </div>
        </div>
    </div>
</div>
<script language="javascript">
    
    $("[data-toggle='batch-group'], [data-toggle='batch-level']").click(function () {
        var toggle = $(this).data('toggle');
        $("#modal-change .modal-title").text(toggle=='batch-group'?"批量修改分组":"批量修改会员等级");
        $("#modal-change").find("."+toggle).show().siblings().hide();
        $("#modal-change-btn").attr('data-toggle', toggle=='batch-group'?'group':'level');
        $("#modal-change").modal();
    });
    $("#modal-change-btn").click(function () {
        var _this = $(this);
        if(_this.attr('stop')){
            return;
        }
        var toggle = $(this).data('toggle');
        var ids = [];
        $(".checkone").each(function () {
            var checked = $(this).is(":checked");
            var id = $(this).val();
            if(checked && id){
                ids.push(id);
            }
        });
        if(ids.length<1){
            alert("请选择要批量操作的团长");
            return;
        }
        var option = $("#modal-change .batch-"+toggle+" option:selected");
        level = '';
        if (toggle=='group'){
            for(i=0;i<option.length;i++){
                if (level == ''){
                    level += $(option[i]).val();
                }else{
                    level += ','+$(option[i]).val();
                }
            }
        }else{
            var level = option.val();
        }

        var levelname = option.text();
		if(  confirm("确定要将选中团长移动到 "+levelname+" 吗？") )
		{
			 _this.attr('stop', 1).text("操作中...");
			 
			 $.ajax({
				url:"<?php echo U('communityhead/changelevel');?>",
				type:"post",
				dataType:'json',
				data:{
					level: level,
					ids: ids,
					toggle: toggle
					},
				success:function(ret){
					$("#modal-change").modal('hide');
					if(ret.status==1){
						alert("操作成功");
						setTimeout(function () {
							location.reload();
						},1000);
					}else{
						alert(ret.result.message);
					}
					
					
				}	
			 })
		}
       
    });
</script>
</body>