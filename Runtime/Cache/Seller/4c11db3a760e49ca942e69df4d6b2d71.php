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
  <style type="text/css">
      .layui-btn-sm { line-height: 34px;height: 34px; }
      .layui-btn-group .layui-btn:first-child {border-radius: 0;}
      .text-green { color: #15d2b9 !important; }
	  .daterangepicker select.ampmselect, .daterangepicker select.hourselect, .daterangepicker select.minuteselect {
			width: auto!important;
	  }
  </style>
</head>
<body layadmin-themealias="default">


<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">团长统计</span></div>
		<div class="layui-tab layui-tab-brief" >
		  <ul class="layui-tab-title">
				<li  <?php if( empty($_GPC['type']) || $_GPC['type']=='0' ){ ?>class="layui-this"<?php } ?><a href="<?php echo U('reports/communitystatics', array('type' => 0));?>">团长销售额统计</a></li>
				<li  <?php if( $_GPC['type']=='2' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('reports/communitystatics_commiss', array('type' => 2));?>">团长佣金金额统计</a></li>
				<li  <?php if( $_GPC['type']=='3' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('reports/communitystatics_order', array('type' => 3));?>">团长订单统计</a></li>
		  </ul>
		</div>
        <div class="layui-card-body" style="padding:15px;">
        <div class="page-content">
            <form action="" method="get" class="form-horizontal form-search layui-form" role="form" id="search">
        		<input type="hidden" name="c" value="reports" />
                <input type="hidden" name="a" value="communitystatics" />
               
                <input type="hidden" name="type" value="<?php echo ($_GPC['type']); ?>" />
			   
                <div class="page-toolbar">
                    <div class="layui-form-item">
    					<span class="layui-input-inline">
    						<select name='searchtime' class='form-control' style="width:100px;padding:0 5px;"  id="searchtime">
    							<option value=''>不按时间</option>
    							<option value='create_time' <?php if($_GPC['searchtime']=='create_time'){ ?>selected<?php } ?>>下单时间</option>
    						</select>
    					</span>
    					<span class="layui-input-inline" style="width: 285px;">
    						<?php echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d H:i', $endtime)),true);;?>
    					</span>
                        <div class="layui-input-inline">
                            <input type="hidden" name="export" id="export" value="0">
                        </div>
                        <div class="layui-input-inline" style="width: 400px;margin-right: 0px;">
				            <input type="text" class="layui-input" name='keyword' id="keyword" value="<?php echo ($_GPC['keyword']); ?>" placeholder="请输入团长昵称/团长姓名/社区昵称">
                        </div>
                        <div class="layui-btn-group">
                            <button class="layui-btn btn-submit layui-btn-sm" data-export="0" type="submit"> 搜索</button>
    						<button data-export="1" type="submit" class="layui-btn layui-btn-sm btn-submit layui-btn-primary">导出</button>
                        </div>
                    </div>
                </div>
            </form>
	
            <form action="" method="post" class="layui-form" role="form">
                <div class="row">
                    <div class="col-md-12">
                        <table class="layui-table" lay-skin="line" lay-size="lg">
                            <thead>
                                <tr>
            						<th style="width:25px;">
                                        <input type='checkbox' name="checkall" lay-skin="primary" lay-filter="checkboxall" />
                                    </th>
            						<th style="width:50px;text-align:center;">ID</th>
            						<th style="width: 100px;">团长昵称</th>
            						<th style="width: 180px;">姓名/手机号</th>
            						<th style="width: 200px;">小区信息</th>
            						<th style="width: 100px;">团长等级</th>
            						<th style="">下单会员数</th>
            						<th style="width: 100px;">下单数量</th>
            						<th style="">销售额(元)</th>
            						<th >退款量</th>
            						<th >退款额(元)</th>
            						<th style="">净销售额(元)</th>
            						<th style="text-align:right;">操作</th>
            					</tr>
                            </thead>
                            <tbody>
                               
								<?php foreach($data as $item){ ?>
                                <tr>
                					<td style="width:25px;">
                						<input type='checkbox' value="<?php echo ($item['head_id']); ?>" name="item_checkbox" lay-skin="primary" />
                					</td>
                					<td style="width:100px;text-align:center;">
                						<?php echo ($item['head_id']); ?>
                					</td>
                					<td>
                						<?php echo ($item['username']); ?>
                					</td>
                					<td>
										<?php echo ($item['head_name']); ?><br/>
										<?php echo ($item['head_mobile']); ?>
                					</td>
                					<td>
                						<?php echo ($item['community_name']); ?>
                					</td>
                					<td>
                						<?php echo ($item['head_levelname']); ?>
                					</td>
                					<td>
                						<?php echo ($item['buy_mb_count']); ?>
                					</td>
                					
                					<td>
                						<?php echo ($item['buy_order_count']); ?>
                					</td>
                					<td>
                						<?php echo ($item['sum_order_paymoney']); ?>
                					</td>
                					<td >
                						<?php echo ($item['refund_order_count']); ?>
                					</td>
                					<td >
                						<?php echo ($item['refund_order_money']); ?>
                					</td>
                					<td>
                						<?php echo ($item['real_sale_money']); ?>
                					</td>
            					
                					<td  style="overflow:visible;position:relative;text-align:right;">
                						
										<?php if( isset($_GPC['searchtime']) && $_GPC['searchtime'] == 'create_time' ){ ?>
										<a class="layui-btn layui-btn-primary layui-btn-xs" href="<?php echo U('order/index',array('searchfield'=>'head_name','keyword' => $item['head_name'],'ok'=>1,'time[end]' => date('Y-m-d H:i', $endtime),'time[start]'=>date('Y-m-d H:i', $starttime),'searchtime' => 'create'));;?>">
                							<span data-toggle="tooltip" data-placement="top" title="" data-original-title="查看订单明细">
                								查看订单明细
                							</span>
                						</a>	
										<?php }else{ ?>
										<a class="layui-btn layui-btn-primary layui-btn-xs" href="<?php echo U('order/index',array('searchfield'=>'head_name','keyword' => $item['head_name'],'ok'=>1));;?>">
                							<span data-toggle="tooltip" data-placement="top" title="" data-original-title="查看订单明细">
                								查看订单明细
                							</span>
                						</a>
										<?php } ?>
                						
                						
                					</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" style="padding-left: 0;">
            							<!-- <div class="page-table-header">
            								<input type="checkbox">
            							</div> -->
                                    </td>
                                    <td colspan="7" style="text-align: right">
                                        <?php echo ($pager); ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
					
                    </div>
					
                </div>
                
            </form>
			<div class="row">
						<blockquote class="layui-elem-quote layui-text">
							#下单会员数<br/>

							- 下单会员数  为此团长下面的下单的会员数量统计<br/>

							#下单数量<br/>

							- 下单数量为   此团长下面会员一共下单的数量<br/>

							#销售额<br/>

							- 销售额为      下单数量所有的金额总和。<br/>

							#净销售额<br/>

							- 净销售额为    销售额  -   退款额  =  净销售额<br/>

						</blockquote>
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
  
    form.on('switch(statewsitch)', function(data){
      
      var s_url = $(this).attr('data-href')
      
      var s_value = 1;
      if(data.elem.checked)
      {
        s_value = 1;
      }else{
        s_value = 0;
      }
      
      $.ajax({
            url:s_url,
            type:'post',
            dataType:'json',
            data:{state:s_value},
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
	$(function () {
        $('.btn-submit').click(function () {
            var e = $(this).data('export');
            if(e>0 ){
                if($('#keyword').val() !='' ){
                    $('#export').val(e);
                    $('#search').submit();
                }else if($('#searchtime').val()!=''){
                    $('#export').val(e);
                    $('#search').submit();
                }else{
                    $('#export').val(e);
                    $('#search').submit();
                }
            }else{
                $('#export').val(0);
                $('#search').submit();
            }
        })
    })
</script>
</body>
</html>