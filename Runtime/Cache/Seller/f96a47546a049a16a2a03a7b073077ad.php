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
        'module': {'url' : '<?php if( defined('MODULE_URL') ) { ?>{MODULE_URL}<?php } ?>', 'name' : '<?php if (defined('IN_MODULE') ) { ?>{IN_MODULE}<?php } ?>'},
        'cookie': {'pre': ''},
        'account': <?php echo json_encode($_W['account']);?>,
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
	
	.div-inline{ 
		display:inline-block; 
		text-align:center;
		height:130px;
		width:168px;
		margin-right: .5%;
		padding: 35px 0;
		border-radius:15px;
		} 
	.div-inline2{ 
		display:inline-block; 
		text-align:center;
		height:45px;
		width:10%;
		padding: 5px 0;
	} 
	.b{
		margin-left: 20px;
		display: block;
		text-align: left;
		font-weight: lighter;
		font-size: 30px;
		color: #fff;
	}
	.span{
		font-size: 14px;
		color: #fff;
		margin-left: 20px;
		display: block;
		text-align: left;
		margin-top: 12px;
	}
	.list-tb-div table{
		margin-bottom: 1px;
	}
</style>
</head>
<body layadmin-themealias="default">


<table id="demo" lay-filter="test"></table>


<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">营业数据
	</div>
		<div class="layui-tab layui-tab-brief" >
		  <ul class="layui-tab-title">
				<li  <?php if( empty($tabid) || $tabid=='0' ){ ?>class="layui-this"<?php } ?>><a href="<?php echo U($cur_controller, array('reports_index' => 0));?>">本周</a></li>
				<li  <?php if( $tabid=='1' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('reports_index' => 1));?>">上周</a></li>
				<li  <?php if( $tabid=='2' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('reports_index' => 2));?>">本月</a></li>
				<li  <?php if( $tabid=='3' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('reports_index' => 3));?>">上月</a></li>
				<li style="float: right;margin-right: 100px;">
					<a href="<?php echo U($cur_controller, array('reports_index' => $_GPC['reports_index'],'reports_index' => $_GPC['reports_index'], 'is_export' => 1 ));?>" target="_blank" class="layui-btn layui-btn-sm layui-btn-primary"><i class="layui-icon-about layui-icon"></i>导出</a>
				</li>
		  </ul>
		
		</div>
		
		<div class="layui-card-body" style="padding:15px;padding-bottom:0px;">
		
			
			<div>
				<div class="div-inline" style="background: rgb(246, 191, 0);" >
					<b class="b"><?php echo ($zongdanshu); ?></b>
					<span class="span">订单笔数</span>
				</div> 
				
				<div class="div-inline" style="background: rgb(171,130,255);">
					<?php if( empty($quxiaoshu)){ ?> <b class="b">0</b> <?php }else{ ?><b class="b"><?php echo ($quxiaoshu); ?></b><?php } ?>
					<span class="span">取消笔数</span>
				</div> 
				<div class="div-inline" style="background: rgb(243, 85, 14);">
					<?php	 $zongxiadan = sprintf("%.2f",$zongxiadan); ?>
					<b class="b"><?php echo ($zongxiadan); ?></b>
					<span class="span">下单金额</span>
				</div> 
				
				
				<div class="div-inline" style="background: rgb(81, 194, 132);">
					<?php if( empty($wait_refund_count)){ ?> <b class="b">0</b> <?php }else{ ?><b class="b"><?php echo ($wait_refund_count); ?></b><?php } ?>
					<span class="span">申请退款笔数</span>
				</div> 
				<div class="div-inline" style="background: rgb(80, 164, 254);">
					<?php	 $wait_refund_money = sprintf("%.2f",$wait_refund_money); ?>
					<?php if( empty($wait_refund_money)){ ?> <b class="b">0</b> <?php }else{ ?><b class="b"><?php echo ($wait_refund_money); ?></b><?php } ?>
					<span class="span">申请退款金额</span>
				</div>
				
				<div class="div-inline" style="background: rgb(81, 194, 132);">
					<?php if( empty($has_refund_count)){ ?> <b class="b">0</b> <?php }else{ ?><b class="b"><?php echo ($has_refund_count); ?></b><?php } ?>
					<span class="span">已退款笔数</span>
				</div> 
				<div class="div-inline" style="background: rgb(80, 164, 254);">
					<?php	 $has_refund_money = sprintf("%.2f",$has_refund_money); ?>
					<?php if( empty($has_refund_money)){ ?> <b class="b">0</b> <?php }else{ ?><b class="b"><?php echo ($has_refund_money); ?></b><?php } ?>
					<span class="span">已退款金额</span>
				</div>
				
				<div class="div-inline" style="background: rgb(208, 109, 106);">
					<?php	 $quxiao = sprintf("%.2f",$quxiao); ?>
					<b class="b"><?php echo ($quxiao); ?></b>
					<span class="span">取消金额</span>
				</div> 
				
				<div class="div-inline" style="background: rgb(81, 193, 194);">
					<?php	 $xaioji = sprintf("%.2f",$xaioji); ?>
					<?php if( empty($xaioji)){ ?> <b class="b">0</b> <?php }else{ ?><b class="b"><?php echo ($xaioji); ?></b><?php } ?>
					<span class="span">小计金额</span>
				</div>
			</div>
			<br/>
			
			<form action="" class="layui-form" lay-filter="example" method="post" >
       
				
				<div class="row">
					<div class="list-div list-tb-div">
						<table cellpadding="0" cellspacing="0" border="0" style="background-color:#fff;">
                           
                             <tr>
                               <th class="div-inline2" style="font-size:15px;font-weight:bold;">下单日期</th>
							   <th class="div-inline2" style="font-size:15px;font-weight:bold;">订单数</th>
							   <th class="div-inline2" style="font-size:15px;font-weight:bold;">下单金额</th>
							   
							   
							   <th class="div-inline2" style="font-size:15px;font-weight:bold;">等待退款笔数</th>
							   <th class="div-inline2" style="font-size:15px;font-weight:bold;">等待退款金额</th>
							   <th class="div-inline2" style="font-size:15px;font-weight:bold;">已退款笔数</th>
							   <th class="div-inline2" style="font-size:15px;font-weight:bold;">已退款金额</th>
							   <th class="div-inline2" style="font-size:15px;font-weight:bold;">取消笔数</th>
							   <th class="div-inline2" style="font-size:15px;font-weight:bold;">取消金额</th>
							   <th class="div-inline2" style="font-size:15px;font-weight:bold;">小计</th>
                             <tr>
                            
                        </table>
						
						<table cellpadding="0" cellspacing="0" border="0" style="background-color:#fff;">
							
							<?php foreach($list2 as $k => $w){ ?>	
								<tr>
									<th width="15%" class="div-inline2"><?php echo ($w["date"]); ?></th>

									<th width="15%" class="div-inline2"><?php echo ($w["count"]); ?></th>
	
									<?php	 $order_amount = $w['total']+$w['shipping_fare']-$w['voucher_credit']-$w['fullreduction_money']-$w['score_for_money']; $order_amount = sprintf("%.2f",$order_amount); ?>	
									<th width="15%" class="div-inline2"><?php echo ($order_amount); ?></th>

									<th  class="div-inline2"><?php echo ($w["daywait_refund_count"]); ?></th>
									<?php	 $w["daywait_refund_money"] = sprintf("%.2f",$w["daywait_refund_money"]); ?>
									<th  class="div-inline2"><?php echo ($w["daywait_refund_money"]); ?></th>
									
									<th  class="div-inline2"><?php echo ($w["dayhas_refund_count"]); ?></th>
									<?php	 $w["dayhas_refund_money"] = sprintf("%.2f",$w["dayhas_refund_money"]); ?>
									<th  class="div-inline2"><?php echo ($w["dayhas_refund_money"]); ?></th>
									
									<th width="15%" class="div-inline2"><?php echo ($w["dayqu"]); ?></th>
									
									<?php	 $w["dayquxiao"] = sprintf("%.2f",$w["dayquxiao"]); ?>
									
									<th width="15%" class="div-inline2"><?php echo ($w["dayquxiao"]); ?></th>

									<?php	 $order_ji = $order_amount - $w["daytuikuan"]-$w["dayquxiao"]; $order_ji = sprintf("%.2f",$order_ji); ?>	
									<th width="15%" class="div-inline2"><?php echo ($order_ji); ?></th>
								</tr>
							<?php } ?>
                            
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
						$('#ajaxModal').removeClass('in');
						$('.modal-backdrop').removeClass('in');
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
				},function(){
					console.log(232323);
					$('#ajaxModal').removeClass('in');
					$('.modal-backdrop').removeClass('in');
				}); 
		return	false;
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
<script>
var ajax_url = "";
$(function(){

	$("[data-toggle='ajaxModal']").click(function () {
        var s_url = $(this).attr('data-href');
		ajax_url = s_url;
		console.log(23);
       $.ajax({
				url:s_url,
				type:"get",
				success:function(shtml){
					$('#ajaxModal').html(shtml);
					$("#ajaxModal").modal();
				}	
		})
    });
	$(document).delegate(".modal-footer .btn-primary","click",function(){
		var s_data = $('#ajaxModal form').serialize();
		$.ajax({
			url:ajax_url,
			type:'post',
			dataType:'json',
			data:s_data,
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
		return false;
	})
	
	
})
</script>
<div id="ajaxModal" class="modal fade" style="display: none;">

</div>

<script>
    //没有选中时间段不能导出
    $(function () {
        $('.btn-submit').click(function () {
            var e = $(this).data('export');
            if(e==1 ){
                if($('#keyword').val() !='' ){
                    $('#export').val(1);
                    $('#search').submit();
                }else if($('#searchtime').val()!=''){
                    $('#export').val(1);
                    $('#search').submit();
                }else{
                   $('#export').val(1);
                    $('#search').submit();
                    return;
                }
            }else{
                $('#export').val(0);
                $('#search').submit();
            }
        })
    })
</script>
</body>