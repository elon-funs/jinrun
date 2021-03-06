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
  
<script src="/layuiadmin/lib/extend/echarts.min.js"></script>
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
		text-align:left;
		height:94px;
		width:260px;
		margin-top: 15px;
		margin-left: 15px;
		margin-right: 35px;
		padding: 20px 0;
	    box-sizing:border-box;
	    border-width:1px;
		border-style:solid;
		border-color:rgba(121, 121, 121, 1);
		border-radius:0px;
		box-shadow:none;
		} 
	.div-inline2{ 
		display:inline-block;  
		text-align:center;
		height:25px;
		width:370px;
		
		} 

	.span{
		margin-left: 20px;
	 }
		
	.b{
		margin-left: 20px;
		display: block;
		text-align: left;
		font-weight: lighter;
		font-size: 27px;
		color: #128ff2;
	}

	.div-chart{
		display:inline-block; 
		margin-top: 15px;
		margin-left: 15px;
		margin-right: 35px;
		left:0px;
		top:0px;
		width:1515px;
		height:413px;
		border-width:1px;
		border-style:solid;
		background:inherit;
		background-color:rgba(255, 255, 255, 1);
		box-sizing:border-box;
		border-color:rgba(121, 121, 121, 1);
		border-radius:0px;
	
	}
	
    
	.div-box{
		display:inline-block; 
		margin-top: 15px;
		margin-left: 15px;
		margin-right: 35px;
		left:0px;
		top:0px;
		width:730px;
		height:517px;
		background:inherit;
		background-color:rgba(255, 255, 255, 1);
		box-sizing:border-box;
		border-color:rgba(121, 121, 121, 1);
		border-radius:0px;
	}
	
	.div-upper{
		width:730px;
		height:30px;
		border-width:1px;
		border-style:solid;
		
	}
	.div-lower{
	
		width:730px;
		height:487px;
		border-width:1px;
		border-style:solid;
		border-style:none solid solid solid; 
	
	}
	
	.div-table1{
		display:inline-block; 
		text-align:center;
		height:20px;
	}
	
	.div-table2{
		font-weight: normal;
		display:inline-block; 
		text-align:center;
		height:46px;
	}
		
	.layadmin-backlog .layadmin-backlog-body {
		display: block;
		padding: 10px 15px;
		background-color: #f8f8f8;
		color: #999;
		border-radius: 2px;
		transition: all .3s;
		-webkit-transition: all .3s;
	}
	.layadmin-backlog-body h3 {
		padding-bottom: 12px;
		font-size: 14px;
		padding-top: 10px;
		color: #000;;
	}
	.layadmin-backlog-body p cite {
		font-style: normal;
		font-size: 30px;
		font-weight: 300;
		color: #009688;
	}
	.layui-carousel{background-color:#fff;}
	.h12{height:12px;clear:both;}
	.layui-col-xs25{width:20%;float:left;}
	
	.row-panel {
		margin-bottom: 24px;
		margin-top:10px;
	}
	.mypanel {
		position: relative;
		background-color: #fff;
		padding: 0 20px;
		box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.05);
	}
	.mypanel-heading {
		font-size: 15px;
		font-weight: 600;
		border-bottom: 1px solid #f0f0f0;
		height: 48px;
		line-height: 48px;
		width:100%;
	}
	.ht15{color:#000;font-weight:bold;font-size:15px;}
	.chat-box {
		width: 100%;
		height: 192px;
	}
	.mypanel-body{
		width:100%;
		margin-top:10px;
		height: 413px;
	}
	.hs th{color:#000;}
</style>
</head>
<body layadmin-themealias="default">



<table id="demo" lay-filter="test"></table>


<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">营业数据
		</div>
		
		<div class="layui-card-body" style="padding:15px;">
		
			<div class="layui-row  layui-carousel layadmin-backlog">
				<ul class=" layui-col-space12 layui-col-md12 layui-this">
					  <li class="layui-col-xs25">
                        <a href="javascript:;" class="layadmin-backlog-body">
                          <h3>下单金额（元）</h3>
                          <p><cite><?php echo ($sum_money); ?></cite></p>
                        </a>
                      </li>
                      
					  <li class="layui-col-xs25">
                        <a href="javascript:;" class="layadmin-backlog-body">
                          <h3>下单会员数</h3>
                          <p><cite><?php echo ($sum_member); ?></cite></p>
                        </a>
                      </li>
                      <li class="layui-col-xs25">
                        <a href="javascript:;" class="layadmin-backlog-body">
                          <h3>下单量</h3>
                          <p><cite><?php echo ($sum_order); ?></cite></p>
                        </a>
                      </li>
                      <li class="layui-col-xs25">
                        <a href="javascript:;"  class="layadmin-backlog-body">
                          <h3>下单商品数</h3>
                          <p><cite><?php echo ($sum_goods); ?></cite></p>
                        </a>
                      </li>
					  
                 </ul>
				 <div class="h12"></div>
				 <ul class=" layui-col-space12 layui-col-md12 layui-this">
					  <li class="layui-col-xs25">
                        <a href="javascript:;"  class="layadmin-backlog-body">
                          <h3>平均价格</h3>
                          <p><cite><?php echo ($ave_money); ?></cite></p>
                        </a>
                      </li>
					  <li class="layui-col-xs25">
                        <a href="javascript:;" class="layadmin-backlog-body">
                          <h3>新增会员</h3>
                          <p><cite><?php echo ($add_member); ?></cite></p>
                        </a>
                      </li>
					  <li class="layui-col-xs25">
                        <a href="javascript:;" class="layadmin-backlog-body">
                          <h3>会员数量</h3>
                          <p><cite><?php echo ($member_num); ?></cite></p>
                        </a>
                      </li>
					  <li class="layui-col-xs25">
                        <a href="javascript:;"  class="layadmin-backlog-body">
                          <h3>新增商品</h3>
                          <p><cite><?php echo ($add_goods); ?></cite></p>
                        </a>
                      </li>
                 </ul>
			</div>
			
			<div class="layui-row  layui-carousel layadmin-backlog">
				<?php
 $today_sales = json_encode($today_sales); $yesterday_sales = json_encode($yesterday_sales); ?>
				<div class="row-panel">
					<div class="mypanel-heading">今日交易走势（下单金额）</div>
					<div class="mypanel-body">
						<div class="chat-box" id="main"  style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;width:100%;height: 413px;">
						
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="layui-row  layui-carousel layadmin-backlog">	
				<div class="layui-col-sm5 ">
					<div class="layui-card-header ht15">7日内商品销量top10</div>
					<table class="layui-table layuiadmin-page-table hs" lay-skin="line">
                      <thead>
                        <tr>
						  <th style="color:#000;">名次</th>
                          <th style="color:#000;">商品ID</th>
                          <th style="color:#000;">商品名称</th>
                          <th style="color:#000;">销量</th>
                        </tr> 
                      </thead>
                      <tbody>
					
						<?php  $i=1; foreach($goods_statistic as $k => $g){ ?>	
						<?php  if( $i > 10 ) break; ?>
						<tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo ($g["goods_id"]); ?></td>
                          <td><?php echo ($g["name"]); ?></td>
                          <td><?php echo ($g["quantity"]); ?></td>
                        </tr>
						<?php $i++; } ?>
                      </tbody>
                    </table>
				</div>
			</div>
			
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
<script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        var option = {
		backgroundColor: '#fff',
            title: {
                text: ''
            },
            tooltip: {
			 trigger: 'axis'
			},
            legend: {
                data: ['昨天', '今天']
            },
			toolbox: {
				show : true,
				feature : {
					mark : {show: true},
					dataView : {show: true, readOnly: false},
					magicType : {show: true, type: ['line', 'bar']},
					restore : {show: true},
					saveAsImage : {show: true}
				}
			},
				
			calculable: true,
			
            xAxis: {
				type : 'category',
				boundaryGap : false,
                data: ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24"]
            },
            yAxis: {},
            series: [{
                name: '昨天',
                type: 'line',
                data: <?php echo $yesterday_sales; ?>
            },{
                name: '今天',
                type: 'line',
                data: <?php echo $today_sales; ?>
            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>

</body>
</html>