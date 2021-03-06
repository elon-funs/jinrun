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
	.daterangepicker select.ampmselect, .daterangepicker select.hourselect, .daterangepicker select.minuteselect{
		width:auto!important;
	}
	.we7-modal-dialog .modal-footer, .modal-dialog .modal-footer{padding:0px;}
	.modal-footer{padding:0px;}
</style>
</head>
<body layadmin-themealias="default">

<table id="demo" lay-filter="test"></table>


<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">商品列表</span></div>
		
		<div class="layui-tab layui-tab-brief" >
		  <ul class="layui-tab-title">
				
				<li  <?php if(empty($type) || $type=='all'){ ?>class="layui-this"<?php } ?>><a href="<?php echo U('goods/index');?>">全部商品（<?php echo ($all_count); ?>）</a></li>
                <li  <?php if($type=='saleon'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('goods/index',array('type'=>'saleon'));?>">出售中（<?php echo ($onsale_count); ?>）</a></li>
                <li <?php if($type=='stock_notice'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('goods/index',array('type'=>'stock_notice'));?>">库存预警（<?php echo ($stock_notice_count); ?>）</a></li>
                <li <?php if($type=='getdown'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('goods/index',array('type'=>'getdown'));?>">已下架（<?php echo ($getdown_count); ?>）</a></li>
                
				<li  <?php if($type=='wait_shen'){ ?> class="layui-this"<?php } ?> ><a href="<?php echo U('goods/index',array('type'=>'wait_shen'));?>">待审核（<?php echo ($waishen_count); ?>）</a></li>
                <li <?php if($type=='refuse'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('goods/index',array('type'=>'refuse'));?>">已拒绝（<?php echo ($unsuccshen_count); ?>）</a></li>
                
				<?php if($is_open_shenhe == 1){ ?>
				<li <?php if($type=='warehouse'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('goods/index',array('type'=>'warehouse'));?>">仓库（<?php echo ($warehouse_count); ?>）</a></li>
               <?php } ?>
			    <li <?php if($type=='recycle'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('goods/index',array('type'=>'recycle'));?>">回收站（<?php echo ($recycle_count); ?>）</a></li>
				
		  </ul>
		</div>
		
		<div class="layui-card-body" style="padding:15px;">
			<form action="" id="searchform" method="get" class="form-horizontal form-search layui-form" role="form">
				<input type="hidden" name="c" value="goods" />
				<input type="hidden" name="a" value="index" />
				<input type="hidden" name="type" value="<?php echo ($type); ?>" />
				
				<input type="hidden" name="sortfield" id="sortfield" value="<?php echo ($sortfield); ?>" />
				<input type="hidden" name="sortby" id="sortby" value="<?php echo ($sortby); ?>" />
				<div class="layui-form-item">
				  <div class="layui-inline">
					<div class="layui-input-inline" >
						<input type="text" class="layui-input"  name="keyword" value="<?php echo ($keyword); ?>" placeholder="输入商品编码或者名称"/>
				
					</div>
					<div class="layui-input-inline" >
						<select name='searchtime'  class='layui-input layui-unselect'   style="width:100px;padding:0 5px;">
							<option value=''>不按时间</option>
							<option value='create' <?php if($searchtime=='create'){ ?>selected<?php } ?>>团购时间</option>
						</select>
					</div>
					<div class="layui-input-inline" style="width:280px;">
						<?php echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d H:i', $endtime)),true);;?>
					</div>
					<div class="layui-input-inline" >
						<select name="cate" class='layui-input layui-unselect' style="width:200px;" >
							<option value="" <?php if( empty($cate) ){ ?>selected<?php } ?> >商品分类</option>
							<?php foreach($category as $c){ ?>
							<option value="<?php echo ($c['id']); ?>" <?php if( $cate==$c['id'] ){ ?>selected<?php } ?> ><?php echo ($c['name']); ?></option>
							<?php } ?>
						</select>
					</div>
					
					<div class="layui-input-inline">
						<button class="layui-btn layui-btn-sm" type="submit"> 搜索</button>
						<button type="submit" name="export" value="1" class="layui-btn layui-btn-sm ">导出</button>

					</div>
				  </div>
				</div>
			</form>
			<form action="" class="layui-form" lay-filter="example" method="post" >
       
				<div class="row">
					<div class="col-md-12">
					
						<div class="page-table-header">
							
							<span class="pull-right"> 
								<a href="<?php echo U('goods/addgoods', array('ok' =>1));?>" class="layui-btn layui-btn-sm"><i class="fa fa-plus"></i> 添加商品</a>
								<button type="button" class="layui-btn layui-btn-sm exceledit" style="display:none;">excel导入编辑</button>
							</span>
							<input type="checkbox" name="checkall" lay-skin="primary" lay-filter="checkboxall">
							<div class="btn-group">
								<?php if($is_index){ ?>
								<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch'  data-href="<?php echo U('goods/change',array('type'=>'is_index_show', 'value' => 1));?>">
									<i class='icow icow-xiajia3'></i> 首页推荐
								</button>
								<?php } ?>
								
								<?php if($is_updown){ ?>
								<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch' data-href="<?php echo U('goods/change',array('type'=>'grounding','value'=>1));?>">
									<i class='icow icow-shangjia2'></i> 上架
								</button>
								<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch'  data-href="<?php echo U('goods/change',array('type'=>'grounding','value'=>0));?>">
									<i class='icow icow-xiajia3'></i> 下架
								</button>
								<?php } ?>
								
								<?php if($is_open_fullreduction == 1 && $is_fullreduce ){ ?>
								<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch' data-href="<?php echo U('goods/change_cm',array('type'=>'is_take_fullreduction','value'=>1));?>">
									<i class='icow icow-shangjia2'></i> 参加满减
								</button>
								<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch'  data-href="<?php echo U('goods/change_cm',array('type'=>'is_take_fullreduction','value'=>0));?>">
									<i class='icow icow-xiajia3'></i> 不参加满减
								</button>
								<?php } ?>
								<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch-group'  id="batchcatesbut" >商品分类</button>
								
								<?php if( defined('ROLE') && ROLE == 'agenter'){ ?>
										<?php if($is_distributionsale){ ?>
											<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch-group'  id="batch_head" >分配售卖团长</button>
											<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch-group'  id="batch_head_group" >分配售卖团长分组</button>
										<?php  }else{ ?>
										
										<?php } ?>
								<?php  }else{ ?>
										<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch-group'  id="batch_head" >分配售卖团长</button>
										<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch-group'  id="batch_head_group" >分配售卖团长分组</button>
								<?php } ?>
								
								<button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-group'  id="batchtime" >设置活动时间</button>
								
								<?php if($is_index){ ?>
								<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch'  data-href="<?php echo U('goods/change',array('type'=>'is_index_show', 'value' => 0));?>">
									<i class='icow icow-xiajia3'></i> 取消首页推荐
								</button>
								<?php } ?>
											
								<?php if($type!='recycle'){ ?>
								<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除吗，删除后商品将进入回收站?" data-href="<?php echo U('goods/change',array('type'=>'grounding','value'=>3));?>">
									<i class='icow icow-shanchu1'></i> 删除
								</button>
								<?php } ?>
								<?php if($type=='recycle'){ ?>
								<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要彻底删除吗?" data-href="<?php echo U('goods/delete');?>"><i class='icow icow-shanchu1'></i> 彻底删除</button>
								<?php } ?>
							</div>
						</div>
						<table class="table table-responsive" lay-even lay-skin="line" lay-size="lg">
						
							<thead>
								<tr>
									<th style="width:25px;">
										<input type='checkbox' name="checkall" lay-skin="primary" lay-filter="checkboxall"  />
									</th>
									<th style="width:80px;text-align:center;">ID</th>
									<th style="">&nbsp;</th>
									<th style="width:200px;">商品名称</th>
									<th style="">活动时间</th>
									<th style="width: 120px;">价格</th>
									<th style="width: 80px;">总销量</th>
									<th style="width: 120px;">
										<a href="<?php echo U('goods/index', array('sortby' =>$sortby,'sortfield' => 'total','keyword'=>$keyword,'cate' =>$cate,'searchtime'=>$searchtime,'sort_starttime'=>$starttime,'sort_endtime'=>$endtime, 'type' =>$type, ) );?>" >
										<span>库存</span>
										<span class="layui-table-sort layui-inline" lay-sort="<?php echo ($sortfield == 'total' ? $sortby :''); ?>">
											<i class="layui-edge layui-table-sort-asc" title="升序"></i>
											<i class="layui-edge layui-table-sort-desc" title="降序"></i>
										</span>
										</a>
									</th>
									<th style="width: 120px;"> 
										<a href="<?php echo U('goods/index', array('sortby' =>$sortby,'sortfield' => 'day_salescount','keyword'=>$keyword,'cate' =>$cate,'searchtime'=>$searchtime,'sort_starttime'=>$starttime,'sort_endtime'=>$endtime, 'type' =>$type, ) );?>" >
										<span>今日销量</span>
										<span class="layui-table-sort layui-inline" lay-sort="<?php echo ($sortfield == 'day_salescount' ? $sortby :''); ?>" >
											<i class="layui-edge layui-table-sort-asc" title="升序"></i>
											<i class="layui-edge layui-table-sort-desc" title="降序"></i>
										</span>
										</a>
									</th>
									<?php if($is_open_fullreduction == 1 && $is_fullreduce){ ?>
									<th  style="width:120px;" >是否满减</th>
									<?php } ?>
									
									<?php if($is_updown == 1 && $is_fullreduce){ ?>
									<th  style="width:180px;" >是否上架<?php if($is_open_shenhe==1){ ?><br/>是否审核<?php } ?></th>
									<?php }else{ ?>
									<th  style="width:10px;" ></th>
									<?php } ?>
									
								<?php if( defined('ROLE') && ROLE == 'agenter'){ ?>
								
								<?php  }else{ ?>									
								
									<?php if($is_top){ ?>
										<?php if($index_sort_method == 1){ ?>
										<th>首页排序</th>
										<?php }else{ ?>
										<th>置顶</th>
										<?php } ?>
									<?php } ?>
								<?php } ?>
								
									<?php if($is_index){ ?>
										<th>首页推荐</th>
										<?php } ?>
									<th style="">操作</th>
								</tr>
							</tr>
							</thead>
							<tbody>
							
							<?php foreach($list as $item){ ?>
							<tr>
							<td>
								<input type='checkbox' name="item_checkbox" class="checkone" lay-skin="primary" value="<?php echo ($item['id']); ?>"/>
							</td>
							<td style="text-align:center;">
								<?php echo ($item['id']); ?>
							</td>
							<td>
								<a href="<?php echo U('goods/edit', array('id' => $item['id'],'goodsfrom'=>$goodsfrom,'page'=>$page));?>">
									<img src="<?php echo ($item['thumb']); ?>" style="width:72px;height:72px;padding:1px;border:1px solid #efefef;margin: 7px 0"  />
								</a>
							</td>
							<td class='full' >
								<span>
									<span style="display: block;width: 100%;">
										
									
										<?php if( $item['is_only_hexiao'] == 1 ){ ?>
										<span class="text-danger">[核销]</span>
										<?php } ?>
										
										<?php if( $item['is_only_distribution'] == 1 ){ ?>
										<span class="line-text">[同城配送]</span>
										<?php } ?>
										
										
										<?php if( $item['is_seckill'] == 1 ){ ?>
										<span class="text-danger">[整点秒杀]</span>
										<?php } ?>
										
										<?php if($item['is_new_buy'] == 1){ ?>
										<span class="line-text">[新人专享]</a>
										<?php } ?>
										
										<?php if($item['is_only_express'] == 1){ ?>
										<span class="line-text">[仅快递]</a>
										<?php } ?>
										
										<?php if($item['is_spike_buy'] == 1){ ?>
										<span class="text-danger">[限时秒杀]</a>
										<?php } ?>
										
										<?php if($item['supply_id'] <=0){ ?><span class="text">[自营<?php if( !empty($item['supply_name']) ){ echo ($item['supply_name']); } ?>]</span><?php }else if( !empty($item['supply_name']) ){ ?><span class="text">[<?php echo ($item['supply_name']); ?>]</span><?php } ?>
										<a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php echo U('goods/change',array('type'=>'goodsname','id'=>$item['id']));?>" >
							
										<span class="text-danger"><?php echo ($item['goodsname']); ?></span>
										</a>
										
										
										
										<?php if( !empty($item['cate']) ){ ?>
											<?php foreach($item['cate'] as $g_cate){ ?>
											<span class="text-danger">[<?php echo isset($category[$g_cate['cate_id']]) ? $category[$g_cate['cate_id']]['name']: '无分类';?>]</span>
											<?php } ?>
										<?php  }else{ ?>
										<span class="text-danger">[无分类]</span>
										<?php } ?>
										
										<br/>
										<?php if( $item['is_all_sale'] == 1 ){ ?>
										<span class="text-green">[所有团长<?php echo ($item['head_count']); ?>]</span>
										<?php }else if( $item['head_count'] >0 ){ ?>
										<span class="text-green">[部分团长<?php echo ($item['head_count']); ?>]</span>
										<?php }else if( $item['head_count'] == 0 ){ ?>
										<span class="text-green">[无团长0]</span>
										<?php } ?>
										
										
										
										
										
									</span>
								</span>
							</td>
							<td>
								<?php echo date("Y-m-d H:i:s",$item['begin_time']);?>
								   <br/>
								<?php echo date("Y-m-d H:i:s",$item['end_time']);?>
								<br/>
								
								<?php if($item['grounding']==1){ ?>
									<?php if($item['end_time'] <= time()){ ?>
									<span class="text-danger">活动已结束</span>
									<?php } ?>
									<?php if( $item['begin_time'] <= time() && $item['end_time'] > time() ){ ?>
									<span class="text-danger">正在进行中</span>
									<?php } ?>
								
									<?php if( $item['begin_time'] > time() ){ ?>
									<span class="text-danger">活动未开始</span>
									<?php } ?>
								<?php  }else{ ?>
									
									<?php if( $item['end_time'] <= time() ){ ?>
									<span class="text-danger">活动已结束</span>
									<?php } ?>
									<?php if( $item['begin_time'] <= time() && $item['end_time'] > time() ){ ?>
									<span class="text-danger">未上架</span>
									<?php } ?>
								
									<?php if( $item['begin_time'] > time() ){ ?>
									<span class="text-danger">活动未开始</span>
									<?php } ?>
								<?php } ?>
								
							</td>
							<td >&yen;
								
								<?php if( $item['hasoption']==1 ){ ?>
									<?php echo ($item['price_arr']['price']); ?> <?php if( isset($item['price_arr']['max_danprice']) ){ ?>~&yen;<?php echo ($item['price_arr']['max_danprice']); } ?>
								<?php  }else{ ?>
									<a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php echo U('goods/change',array('type'=>'price','id'=>$item['id']));?>" >
										
									<?php echo ($item['price']); ?>
									</a>
							   <?php } ?>
							</td>
							<td><?php echo ($item['seller_count']); ?></td>
							<td>
								
								<?php if( $item['hasoption']==1 ){ ?>
									<?php echo ($item['total']); ?>
								<?php  }else{ ?>
									<a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php echo U('goods/change',array('type'=>'total','id'=>$item['id']));?>" >
							
										<span class="text-danger"><?php echo ($item['total']); ?></span>
									</a>
							   <?php } ?>
							   <?php if($open_redis_server == 1){ ?>
							   <br/>
							   redis库存<?php echo ($item['redis_total']); ?>
							   <a href="<?php echo U('goods/show_logs', array('goods_id' => $item['id'] ));?>" target="_blank"></a>
							   <?php } ?>
							</td>
							
							
							
							
							<td><?php echo ($item['day_salescount']); ?></td>
							
							<?php if($is_open_fullreduction == 1 && $is_fullreduce){ ?>
								<td >
									<?php if($item['supply_type'] == 1){ ?>
									供应商不参与平台满减
									<?php }else{ ?>
									<input type="checkbox" name="" lay-filter="cmwsitch" data-href="<?php echo U('goods/change_cm',array('type'=>'is_take_fullreduction','id'=>$item['id']));?>" <?php if($item['is_take_fullreduction']==1){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="参加|不参加">
									<?php } ?>
								</td>
							<?php } ?>
								
							<td>
								<?php if( $item['grounding']==4 || $item['grounding']==5){ ?>
								
									<?php if( defined('ROLE') && ROLE == 'agenter' && $is_open_shenhe == 1){ ?>
										<?php if($item['grounding']==4){ ?>等待审核<?php  }else{ ?>拒绝审核<?php } ?>
									<?php  }else{ ?>
										
										
										<?php if($item['grounding']==4){ ?> 
										
										<input type="checkbox" name="" lay-filter="engroundingsitch" data-href="<?php echo U('goods/change',array('type'=>'grounding','id'=>$item['id']));?>" <?php if( $item['grounding']==4 ){ }else{ } ?> lay-skin="switch" lay-text="审核通过|审核通过">
										<input type="checkbox" name="" lay-filter="unengroundingsitch" data-href="<?php echo U('goods/change',array('type'=>'grounding','id'=>$item['id']));?>" <?php if( $item['grounding']==4 ){ }else{ } ?> lay-skin="switch" lay-text="拒绝审核|拒绝审核">
									
										<?php } ?>
										
										<?php if($item['grounding']==5){ ?> 
											<input type="checkbox" name="" lay-filter="engroundingsitch" data-href="<?php echo U('goods/change',array('type'=>'grounding','id'=>$item['id']));?>" <?php if( $item['grounding']==4 ){ }else{ } ?> lay-skin="switch" lay-text="审核通过|审核通过">
											<br/>&nbsp;拒绝审核
										<?php } ?>
										
									<?php } ?>
								<?php  }else{ ?>
									<?php if( defined('ROLE') && ROLE == 'agenter' && $is_open_shenhe == 1 && $is_updown){ ?>
										<?php if($item['grounding']==1){ ?>上架<?php  }else{ ?>下架<?php } ?>
									<?php  }else{ ?>
									
										<?php if($is_updown == 1 ){ ?>
										<input type="checkbox" name="" lay-filter="undowngroundingsitch" data-href="<?php echo U('goods/change',array('type'=>'grounding','id'=>$item['id']));?>" <?php if( $item['grounding']==1 ){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="上架|下架">
									
										<?php } ?>
										
									<?php } ?>
								<?php } ?>
							</td>
							
						<?php if( defined('ROLE') && ROLE == 'agenter'){ ?>
						
						<?php  }else{ ?>						
						
							<?php if($is_top){ ?>
								
								<?php if($index_sort_method == 1){ ?>
								<td style="text-align:center;">
									<a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php echo U('goods/change',array('type'=>'index_sort','id'=>$item['id']));?>" >
										<span class="text-danger"><?php echo ($item['index_sort']); ?></span>
									</a>
								</td>	
								<?php }else{ ?>
								<td >
								
								<input type="checkbox" name="" lay-filter="istop_showsitch" data-href="<?php echo U('goods/settop',array('type'=>'istop','id'=>$item['id']));?>" <?php if($item['istop']==1){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="置顶|未置顶">
									
								</td>
								<?php } ?>
							<?php } ?>
						<?php } ?>
							
							<?php if($is_index){ ?>
							<td >
								<input type="checkbox" name="" lay-filter="is_index_showsitch" data-href="<?php echo U('goods/change',array('type'=>'is_index_show','id'=>$item['id']));?>" <?php if( $item['is_index_show']==1 ){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="首页推荐|未推荐">
									
							</td>
							<?php } ?>
							
								<td  style="overflow:visible;position:relative">
									
									<a  class='layui-btn layui-btn-xs' href="<?php echo U('goods/edit', array('id' => $item['id'],'ok'=>1,'page'=>$page));?>"  >
										<i class="layui-icon layui-icon-edit"></i>编辑
									</a>
									
									<?php if($type!='recycle'){ ?>
									<a  class='layui-btn layui-btn-xs deldom' href="javascript:;" data-href="<?php echo U('goods/change',array('id' => $item['id'],'type'=>'grounding','value'=>3));?>" data-confirm='确认要删除吗，删除后商品将进入回收站?'>
										<i class="layui-icon">&#xe640;</i>删除
									</a>
									<?php } ?>	


									<?php if($type=='recycle'){ ?>
									<a  class='layui-btn layui-btn-xs deldom' href="javascript:;" data-href="<?php echo U('goods/delete', array('id' => $item['id']));?>" data-confirm='确认要彻底删除吗?'>
										<i class="layui-icon">&#xe640;</i>彻底删除
									</a>
									<?php } ?>									
											
									
								</td>
							</tr>
							<?php } ?>
							</tbody>
							<tfoot>
							<tr>
								<td colspan="7">
									<div class="page-table-header">
										<input type="checkbox" name="checkall" lay-skin="primary" lay-filter="checkboxall">
										<div class="btn-group">
											<?php if($is_index){ ?>
											<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch'  data-href="<?php echo U('goods/change',array('type'=>'is_index_show', 'value' => 1));?>">
												<i class='icow icow-xiajia3'></i> 首页推荐
											</button>
											<?php } ?>
											
											
											<?php if($is_updown){ ?>
											<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch' data-href="<?php echo U('goods/change',array('type'=>'grounding','value'=>1));?>">
												<i class='icow icow-shangjia2'></i> 上架
											</button>
											<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch'  data-href="<?php echo U('goods/change',array('type'=>'grounding','value'=>0));?>">
												<i class='icow icow-xiajia3'></i> 下架
											</button>
											<?php } ?>
											
											<?php if($is_open_fullreduction == 1 && $is_fullreduce ){ ?>
											<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch' data-href="<?php echo U('goods/change_cm',array('type'=>'is_take_fullreduction','value'=>1));?>">
												<i class='icow icow-shangjia2'></i> 参加满减
											</button>
											<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch'  data-href="<?php echo U('goods/change_cm',array('type'=>'is_take_fullreduction','value'=>0));?>">
												<i class='icow icow-xiajia3'></i> 不参加满减
											</button>
											<?php } ?>
											<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch-group'  id="batchcatesbut2" >商品分类</button>
											
											<?php if( defined('ROLE') && ROLE == 'agenter'){ ?>
												<?php if($is_distributionsale){ ?>
													<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch-group'  id="batch_head" >分配售卖团长</button>
													<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch-group'  id="batch_head_group" >分配售卖团长分组</button>
												<?php  }else{ ?>
												
												<?php } ?>
											<?php  }else{ ?>
													<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch-group'  id="batch_head" >分配售卖团长</button>
													<button class="btn btn-default btn-sm  btn-operation"  type="button" data-toggle='batch-group'  id="batch_head_group" >分配售卖团长分组</button>
											<?php } ?>
											
											<button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-group'  id="batchtime" >设置活动时间</button>
											
											<?php if($is_index){ ?>
											<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch'  data-href="<?php echo U('goods/change',array('type'=>'is_index_show', 'value' => 0));?>">
												<i class='icow icow-xiajia3'></i> 取消首页推荐
											</button>
											<?php } ?>
											
											<?php if($type!='recycle'){ ?>
											<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除吗，删除后商品将进入回收站?" data-href="<?php echo U('goods/change',array('type'=>'grounding','value'=>3));?>">
												<i class='icow icow-shanchu1'></i> 删除
											</button>
											<?php } ?>
											
											<?php if($type=='recycle'){ ?>
											<button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要彻底删除吗?" data-href="<?php echo U('goods/delete');?>"><i class='icow icow-shanchu1'></i> 彻底删除</button>
											<?php } ?>
										</div>
									</div>
								</td>
								<td colspan="6" style="text-align: right">
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


<div id="batchcates_html" style="display:none;">
	<div class="layui-card">
	  <div class="layui-card-body">
			<div class="modal-body" >
                <div class="layui-form-item">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-block">
                        <label class="radio-inline"><input type="radio"  name="iscover" value="0" <?php if($iscover ==0){ ?> checked="checked"<?php } ?> /> 保留原有分类</label>
                        <label class="radio-inline"><input type="radio"  name="iscover" value="1" <?php if($iscover ==1){ ?> checked="checked"<?php } ?> /> 覆盖原有分类</label>
					</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">商品分类</label>
                    <div class="layui-input-block">
						<select id="cates2" lay-verify="cates_sel" name='cates' class="form-control " style='' >
							
							<?php foreach($category as $c){ ?>
							<option value="<?php echo ($c['id']); ?>" <?php if(is_array($cates) && in_array($c['id'],$cates)){ ?>selected<?php } ?> ><?php echo ($c['name']); ?></option>
							<?php } ?>
						</select>
                    </div>
                </div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="btn btn-primary modal-fenlei">确认</button>
						<button class="btn btn-default cancle" >取消</button>
					</div>
				</div>
            </div>
	  </div>
	</div>
</div>


<div id="batchcates_headgroup_html" style="display:none;">
	<div class="layui-card">
	  <div class="layui-card-body">
			<div class="modal-body" >
                
                <div class="layui-form-item">
                    <label class="layui-form-label">团长分组</label>
                    <div class="layui-input-block">
						<select id="group_heads" lay-verify="group_heads" name='group_heads' class="form-control " style='' >
							
							<?php foreach($group_list as $c){ ?>
							<option value="<?php echo ($c['id']); ?>" <?php if(is_array($cates) && in_array($c['id'],$cates)){ ?>selected<?php } ?> ><?php echo ($c['groupname']); ?></option>
							<?php } ?>
						</select>
                    </div>
                </div>
				<div class="layui-form-item">
                    <label class="layui-form-label">仅这个团长可售</label>
                    <div class="layui-input-block">
						<label><input type="checkbox" class="is_cancle_old2" id="is_cancle_old2" name="is_cancle_old2" style="vertical-align: text-bottom;">
						<div class="btn-group" style="color:#666;">
							备注：会取消以往所有分配
						</div>
						</label>
                    </div>
                </div>
				
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="btn btn-primary modal-group-head">确认</button>
						<button class="btn btn-default cancle" >取消</button>
					</div>
				</div>
            </div>
	  </div>
	</div>
</div>


<div id="batchheads" style="z-index: 999;display: none;position: fixed;top: 0;left: 0;right: 0;bottom: 0;background: rgba(0,0,0,0.5)" class="form-horizontal form-validate batchcates"  enctype="multipart/form-data">
    <div class="modal-dialog" style="position: absolute;margin-top: -300px">
        <div class="modal-content">
            <div class="modal-header" style="padding:5px;">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">选取团长</h4>
            </div>
            <div class="modal-body" style="height:600px">
            	<div class="form-group">
            	<label class="col-sm-2 control-label">社区位置</label>
                    <div class="col-sm-10 col-xs-12">
                        <p>
			                <select id="sel-provance" name="province_id" onChange="selectCity();" class="select form-control" style="width:130px;display:inline;">
			                    <option value="" selected="true">省/直辖市</option>
			                </select>
			                <select id="sel-city" name="city_id" onChange="selectcounty(0)" class="select form-control" style="width:135px;display:inline;">
			                    <option value="" selected="true">请选择</option>
			                </select>
			                <select id="sel-area" name="area_id" onChange="selectstreet(0)" class="select form-control" style="width:130px;display:inline;">
			                    <option value="" selected="true">请选择</option>
			                </select>
			                 <select id="sel-street" name="country_id" class="select form-control" style="width:130px;display:inline;">
			                    <option value="" selected="true">请选择</option>
			                </select>
			            </p>
                    </div>
                </div>
            	<div class="form-group">
                    <label class="col-sm-2 control-label">团长名称</label>
                    <div class="col-sm-10 col-xs-12">
                        <div class="input-group">
	                        <input type="text" class="form-control" name="keyword" id="supply_id_input" placeholder="团长名称/团长手机号/社区地址">
			            	<span class="input-group-btn">
			            		<button type="button" class="btn btn-default" onclick="search_heads()">搜索</button>
			            	</span>
		            	</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-1 control-label">
                    
                    </div>
                    <div class="col-sm-10 col-xs-12">
                       	<div class="page-table-header">
		                    <input type="checkbox" class="check_heads_all">
		                    <div class="btn-group">
		                    	全选/反选
		                    </div>
							
							<br/>
							<label><input type="checkbox" class="is_cancle_old" id="is_cancle_old" style="vertical-align: text-bottom;">
							<div class="btn-group" style="color:#666;">
		                    	同时取消以前所有分配
		                    </div>
							</label>
							
		                </div>
                    </div>
                </div>
                
                <div class="row">
                	<label class="col-sm-1 control-label"></label>
                	<div class="col-sm-11 col-xs-12">
	                	<div class="content" style="padding-top:5px;" data-name="supply_id">
	                		<div style="max-height:410px;overflow:auto;" id="batchheads_content">
							
							</div>
							<div class="" id="batchheads_page">
								
							</div>
						</div>
					</div>	
                </div>
            	
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary model_heads">确认</button>
                <button class="btn btn-default" >取消</button>
            </div>
        </div>
    </div>
</div>


<div id="excel_goods_edit" style="display:none;">
	<form action="<?php echo U('goods/excel_goodslist_edit');?>" method="post"  enctype="multipart/form-data" >
		<div class="layui-card">
			<div class="layui-card-body">
				<div class="modal-body" >
					<div class="layui-form-item">
						<label class="layui-form-label">excel文件</label>
						<div class="layui-input-block">
							<input type="file" name="excel">
						</div>
					</div>

				</div>
			</div>
		</div>
	</form>
</div>

<div id="batch_time" style="z-index: 8;display: none;position: fixed;top: 0;left: 0;right: 0;bottom: 0;background: rgba(0,0,0,0.5)" class="form-horizontal form-validate batchtime"  enctype="multipart/form-data">
    <div class="modal-dialog" style="position: absolute;margin-top: -190px">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">设置活动时间</h4>
            </div>
            <div class="modal-body" style="height:270px">
                <div class="form-group">
                    <label class="col-sm-2 control-label">活动时间</label>
                    <div class="col-sm-8 col-xs-12">
                        <span class="input-group-btn">
                            <?php echo tpl_form_field_daterange('setsametime', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d H:i', $endtime)),true);;?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary modal-time">确认</button>
                <button class="btn btn-default cancle" >取消</button>
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

	$('.exceledit').click(function(){
		//页面层
		layer.open({
			type: 1,
			title:'excel导入编辑商品',
			area: ['520px', '240px'], //宽高
			content: $('#excel_goods_edit'),
			btn:['提交','取消'],
			btn1:function(){
				$('#excel_goods_edit').find('form').submit();
			}
		});
	})
  
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
			return false;
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
								layer.msg(info.result.message,{time: 1000,
									end:function(){
										location.href = info.result.url;
									}
								});
								
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
							layer.msg(info.result.message,{time: 1000,
									end:function(){
										location.href = info.result.url;
									}
								});
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

	
	  
	form.on('switch(cmwsitch)', function(data){
		  
		  var s_url = $(this).attr('data-href')
		  
		  var is_take_fullreduction = 1;
		  if(data.elem.checked)
		  {
			is_take_fullreduction = 1;
		  }else{
			is_take_fullreduction = 0;
		  }
		  
		  $.ajax({
				url:s_url,
				type:'post',
				dataType:'json',
				data:{value:is_take_fullreduction},
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

		form.on('switch(groundingsitch)', function(data){
		  
		  var s_url = $(this).attr('data-href')
		  
		  var grounding = 1;
		  if(data.elem.checked)
		  {
			grounding = 1;
		  }else{
			grounding = 0;
		  }
		  
		  $.ajax({
				url:s_url,
				type:'post',
				dataType:'json',
				data:{value:grounding},
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


			
		
	form.on('switch(unengroundingsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var grounding = 1;
	  if(data.elem.checked)
	  {
		grounding = 5;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{value:grounding},
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
	
	form.on('switch(engroundingsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var grounding = 1;
	  if(data.elem.checked)
	  {
		grounding = 1;
	  }else{
		grounding = 5;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{value:grounding},
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


	form.on('switch(undowngroundingsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var grounding = 1;
	  if(data.elem.checked)
	  {
		grounding = 1;
	  }else{
		grounding = 0;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{value:grounding},
			success:function(info){
			
				if(info.status == 0)
				{
					layer.msg(info.result.message,{time: 1000,
						end:function(){
							location.href = info.result.url;
						}
					}); 
					
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

  
form.on('switch(is_index_showsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var is_index_show = 1;
	  if(data.elem.checked)
	  {
		is_index_show = 1;
	  }else{
		is_index_show = 0;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{value:is_index_show},
			success:function(info){
			
				if(info.status == 0)
				{
					layer.msg(info.result.message,{time: 1000,
						end:function(){
							location.href = info.result.url;
						}
					}); 
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

   

	form.on('switch(istop_showsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var istop = 1;
	  if(data.elem.checked)
	  {
		istop = 1;
	  }else{
		istop = 0;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{value:istop},
			success:function(info){
			
				if(info.status == 0)
				{
					layer.msg(info.result.message,{time: 1000,
						end:function(){
							location.href = info.result.url;
						}
					}); 
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
					layer.msg(info.result.message,{time: 1000,
						end:function(){
							location.href = info.result.url;
						}
					}); 
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
<script type="text/javascript" src="/static/js/dist/area/cascade.js"></script>
<script>
var heads_page = 1;

	$("body").delegate("#batchheads_page .pagination a","click",function(){
		heads_page = $(this).attr('page');
		search_heads_do();
	})
	function search_heads()
    {
		heads_page = 1;
		search_heads_do();
	}
    function search_heads_do()
    {
        var province_name = $('#sel-provance').val();
        var city_name = $('#sel-city').val();
        var area_name = $('#sel-area').val();
        var country_name = $('#sel-street').val();
        var keyword = $('#supply_id_input').val();
        
    	$.post("<?php echo U('communityhead/query_head');?>",{page:heads_page,'province_name':province_name,'city_name': city_name,'area_name':area_name,'country_name':country_name,'keyword':keyword}, 
    	    function (ret) {
	            if (ret.status == 1) {
	                $('#batchheads_content').html(ret.html);
					$('#batchheads_page').html(ret.page_html);
	                return
	            } else {
	                layer.msg('修改失败');
	            }
	        }, 'json');
    }
    //显示批量分类
     $('#batchcatesbut').click(function () {
      //  var index = layer.load(1);
		var index = layer.open({
		  type: 1,
		  area: '500px',
		  title: '选取分类'
		  ,content: $('#batchcates_html').html(),
		  yes: function(index, layero){
			//do something
			layer.close(index); //如果设定了yes回调，需进行手工关闭
		  }
		}); 
    })
	
	 $('#batch_head_group').click(function () {
      //  var index = layer.load(1);
		var index = layer.open({
		  type: 1,
		  area: '500px',
		  title: '选取团长分组'
		  ,content: $('#batchcates_headgroup_html').html(),
		  yes: function(index, layero){
			//do something
			layer.close(index); //如果设定了yes回调，需进行手工关闭
		  }
		}); 
    })
	
	$('#batch_head_group2').click(function () {
      //  var index = layer.load(1);
		var index = layer.open({
		  type: 1,
		  area: '500px',
		  title: '选取团长分组'
		  ,content: $('#batchcates_headgroup_html').html(),
		  yes: function(index, layero){
			//do something
			layer.close(index); //如果设定了yes回调，需进行手工关闭
		  }
		}); 
    })
	
   
    $('.check_heads_all').click(function(){
    	//head_id
    	if($(this).is(':checked')){
    		$('.head_id').prop('checked',true);
    	}else{
    		$('.head_id').prop('checked',false);
    	}
    })
    $('#batch_head,#batch_head2').click(function(){
    	
    	cascdeInit("1","1","","","","");
    	search_heads_do();
		
		
		var offs_lf = ( $(window).width() -720 )/2;
		var offs_ht = ( $(window).height() -690 )/2;
		
		
		$('#batchheads .modal-dialog').css('top',offs_ht+'px');
		$('#batchheads .modal-dialog').css('margin-top','0px');
		
		$('#batchheads .modal-dialog').css('left',offs_lf+'px');
		$('#batchheads .modal-dialog').css('margin-left','0px');
		
    	$('#batchheads').show();
    })
    
    
    
    $('#batchcatesbut2').click(function () {
        var index = layer.open({
		  type: 1,
		  area: '500px',
		  title: '选取分类'
		  ,content: $('#batchcates_html').html(),
		  yes: function(index, layero){
			//do something
			layer.close(index); //如果设定了yes回调，需进行手工关闭
		  }
		}); 
    })

    //关闭批量分类
    $('.modal-header .close').click(function () {
        $('#batchcates').hide();
        $('#batchheads').hide();
        $('#batch_time').hide();
    })

    // 取消批量分类
    $('.modal-footer .btn.btn-default').click(function () {
    	$('#batchcates').hide();
        $('#batchheads').hide();
        $('#batch_time').hide();
    })
    $('.model_heads').click(function(){
		var head_id_arr = [];
		$('.head_id').each(function(){
			if($(this).is(':checked')) {
				head_id_arr.push( $(this).val() )
			}
		})
		
		//modal-group-head  
		var is_clear_old = 0;
		
		if( $('#is_cancle_old').is(':checked') )
		{
			is_clear_old = 1;
		}
		
		
		if(head_id_arr.length > 0)
		{
			var selected_checkboxs = $('.table-responsive tbody tr td:first-child [type="checkbox"]:checked');
	        var goodsids = selected_checkboxs.map(function () {
	            return $(this).val()
	        }).get();
	        
			$.post("<?php echo U('goods/ajax_batchheads');?>",{'goodsids':goodsids,'head_id_arr': head_id_arr,'is_clear_old':is_clear_old}, function (ret) {
	            if (ret.status == 1) {
	                $('#batchheads').hide();
	               layer.msg('分配成功', {
					  time: 1000
					}, function(){
					  window.location.reload();
					}); 
					
	                return
	            } else {
	                layer.msg('修改失败');
	            }
	        }, 'json');
		}else{
			layer.msg('请选择团长');
		}
    })
	//确认
	var cates2 = 0;
	$("body").delegate("#cates2","click",function(){
	
		cates2 =  $(this).val() ;
	})
	
	var group_heads2 = 'default';
	$("body").delegate("#group_heads","click",function(){
		group_heads2 =  $(this).val() ;
	})
   

   $("body").delegate(".cancle","click",function(){
		layer.closeAll();
	})
   
	
   
	$("body").delegate(".modal-group-head","click",function(){
	
		var group_heads=$('#group_heads').val();
		if(group_heads2 != 'default')
		{
			group_heads = group_heads2;
		}
		
        var selected_checkboxs = $('.table-responsive tbody tr td:first-child [type="checkbox"]:checked');
        var goodsids = selected_checkboxs.map(function () {
            return $(this).val()
        }).get();
		
		if(goodsids.length <=0 )
		{
			layer.msg('请先选择商品');
			return false;
		}
		
		
		var is_clear_old = 0;
		
		$('.is_cancle_old2').each(function(){
			if( $(this).is(':checked') )
			{
				is_clear_old = 1;
			}
		})
		
		console.log(is_clear_old);
		
		
		
		
        var iscover=$('input[name="iscover"]:checked').val();
        $.post("<?php echo U('goods/ajax_batchcates_headgroup');?>",{'goodsids':goodsids,'groupid': group_heads,'is_clear_old' : is_clear_old }, function (ret) {
            if (ret.status == 1) {
               
				layer.msg('分配成功', {
				  time: 1000
				}, function(){
				  window.location.reload();
				});   
       
                return
            } else {
                layer.msg('分配失败');
            }
        }, 'json');
    })
	
	$('.layui-table-sort').click(function(){
		$(this).attr('lay-sort','asc');
	})
	
	$("body").delegate(".modal-fenlei","click",function(){
	
		var cates=$('#cates2').val();
		if(cates2 != 0)
		{
			cates = cates2;
		}
		
		
        var selected_checkboxs = $('.table-responsive tbody tr td:first-child [type="checkbox"]:checked');
        var goodsids = selected_checkboxs.map(function () {
            return $(this).val()
        }).get();
		//id="cates"
        var iscover=$('input[name="iscover"]:checked').val();
        $.post("<?php echo U('goods/ajax_batchcates');?>",{'goodsids':goodsids,'cates': cates,'iscover':iscover}, function (ret) {
            if (ret.status == 1) {
                $('#batchcates').hide();
				
				layer.msg('修改成功', {
				  time: 1000
				}, function(){
				  window.location.reload();
				});   
       
                return
            } else {
                layer.msg('修改失败');
            }
        }, 'json');
    })
	//----

    //显示时间设置
    $('#batchtime,#batchtime2').click(function () {
        
		var offs_lf = ( $(window).width() -720 )/2;
		var offs_ht = ( $(window).height() -290 )/2;
		
		$('#batch_time .modal-dialog').css('top',offs_ht+'px');
		$('#batch_time .modal-dialog').css('margin-top','0px');
		
		$('#batch_time .modal-dialog').css('left',offs_lf+'px');
		$('#batch_time .modal-dialog').css('margin-left','0px');
		
        $('#batch_time').show();
    })

    $('.modal-time').click(function () {
        var selected_checkboxs = $('.table-responsive tbody tr td:first-child [type="checkbox"]:checked');
        var goodsids = selected_checkboxs.map(function () {
            return $(this).val()
        }).get();

        var begin_time=$('#batch_time input[name="setsametime[start]"]').val();
        var end_time=$('#batch_time input[name="setsametime[end]"]').val();
        $.post("<?php echo U('goods/ajax_batchtime');?>",{'goodsids':goodsids,'begin_time': begin_time,'end_time':end_time}, function (ret) {
            if (ret.status == 1) {
                $('#batch_time').hide();
                layer.msg('设置成功');
                window.location.reload();
                return
            } else {
                layer.msg('设置失败');
            }
        }, 'json');
    })
	
	$(document).on("click", '[data-toggle="ajaxEdit"]', function(e) {
		var obj = $(this),
			url = obj.data('href') || obj.attr('href'),
			data = obj.data('set') || {},
			html = $.trim(obj.text()),
			required = obj.data('required') || true,
			edit = obj.data('edit') || 'input';
		var oldval = $.trim($(this).text());
		e.preventDefault();
		submit = function() {
			e.preventDefault();
			var val = $.trim(input.val());
			if (required) {
				if (val == '') {
					 layer.msg(tip.lang.empty);
					return
				}
			}
			if (val == html) {
				input.remove(), obj.html(val).show();
				return
			}
			if (url) {
				$.post(url, {
					value: val
				}, function(ret) {
					ret = eval("(" + ret + ")");
					if (ret.status == 1) {
						obj.html(val).show()
					} else {
						 layer.msg(ret.result.message, ret.result.url)
					}
					input.remove()
				}).fail(function() {
					input.remove(),  layer.msg(tip.lang.exception)
				})
			} else {
				input.remove();
				obj.html(val).show()
			}
			obj.trigger('valueChange', [val, oldval])
		}, obj.hide().html('<i class="fa fa-spinner fa-spin"></i>');
		var input = $('<input type="text" class="form-control input-sm" style="width: 80%;display: inline;" />');
		if (edit == 'textarea') {
			input = $('<textarea type="text" class="form-control" style="resize:none" rows=3 ></textarea>')
		}
		obj.after(input);
		input.val(html).select().blur(function() {
			submit(input)
		}).keypress(function(e) {
			if (e.which == 13) {
				submit(input)
			}
		})
	})
</script>
</body>