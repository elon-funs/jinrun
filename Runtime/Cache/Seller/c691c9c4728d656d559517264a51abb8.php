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
		<div class="layui-card-header layui-elem-quote">
			当前位置：<span class="line-text">订单详情</span>
		</div>
		
		<div class="layui-card-body" style="padding:15px;">
		
			<ul class="layui-timeline">
			  <?php foreach($history_list as $history){ ?>
			  <li class="layui-timeline-item">
				<i class="layui-icon layui-timeline-axis"></i>
				<div class="layui-timeline-content layui-text">
				  <h3 class="layui-timeline-title">
					<?php echo date("Y-m-d H:i:s", $history['date_added']); ?>&nbsp;<span class="layui-badge <?php if($history['order_status_id'] != 1){ ?>layui-bg-green<?php }else{ ?> layui-badge<?php } ?>"><?php echo $history['order_status_name']; ?></span>
				  </h3>
				  <p>
					<?php echo $history['comment']; ?>
				  </p>
				</div>
			  </li>
			  <?php } ?>
			</ul> 	
			<form action="" class="layui-form" lay-filter="example" method="post" >
				<input type="hidden" name="id" value="<?php echo ($item['order_id']); ?>" />
				<input type="hidden" name="dispatchid" value="<?php echo ($express_info['id']); ?>" />
				<!---订单详情begin--->
				
				<div class="layui-row order-container">
					<div class="order-container-left" style="border-right: 1px solid #efefef">
						<div class="layui-row">
							<div class="layui-col-md-12">
								<ul class="">
									<li class="text"><span class="layui-col-sm">订单编号：</span><?php echo ($item['order_num_alias']); ?></li>
									<?php if( !empty($coupon)){ ?>
									<li class="text">
										<span class="layui-col-sm">优惠券：</span>
										<span class="text-default"><?php echo ($coupon['voucher_title']); ?> &nbsp;&nbsp;</span>
									</li>
									<?php } ?>
									
									<li class="text">
										<span class="layui-col-sm">付款方式：</span>
										<span class="text-default">
											<?php if( $item['payment_code'] == ''){ ?>未付款<?php } ?>
											<?php if( $item['payment_code'] == 'yuer'){ ?>余额支付<?php } ?>
											<?php if( $item['payment_code'] == 'admin'){ ?>后台付款<?php } ?>
											<?php if( $item['payment_code'] == 'weixin'){ ?>微信支付<?php } ?>
										</span>
									</li>
									<li class="text">
										<span class="layui-col-sm">买　　家：</span>
										<span class="text-default">
											<?php  if (defined('ROLE') && ROLE == 'agenter' ) { ?>
											 <?php echo ($member['username']); ?>
											<?php }else{ ?>
											 <a href="<?php echo U('user/detail',array('id'=>$member['member_id']));?>" target='_blank' class="text-primary"><?php echo ($member['username']); ?></a> 
											
											<?php if( !empty($member['content']) ){ ?>
											 <font class="text-danger">(<?php echo ($member['content']); ?>)</font>
											<?php } ?>
											
											<?php } ?>
											&nbsp;&nbsp;
										</span>
									</li>
									
									<li class="text">
										<span class="layui-col-sm">配送方式：</span>
										<span class="text-default">
											<?php if( $item['delivery'] == 'pickup'){ ?>
												自提
											<?php }elseif( $item['delivery'] == 'express' ){ ?>
												快递<?php if( !empty($express_info['name'])){ ?>(<?php echo ($express_info['name']); ?> <?php if( !empty($item['shipping_no'])){ ?>快递单号：<?php echo ($item['shipping_no']); } ?>)<?php } ?> 
												<a class="text-primary" data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('order/express', array('order_id' => $item['order_id']));?>" >查看物流</a>
											<?php }elseif( $item['delivery'] == 'tuanz_send' ){ ?>
												团长配送
											<?php  }else{ ?>
												其他
											<?php } ?>
										</span>
									</li>
									<li class="text">
										<span class="layui-col-sm">收 货 人：</span>
										<span class="text-default">
											<?php echo ($item['shipping_name']); ?> <?php echo ($item['shipping_tel']); ?> 
										</span>
									</li>
									<?php if($is_can_look_headinfo){ ?>
									<?php if( $item['type'] != 'integral' && ( $item['type'] != 'pintuan' || $item['head_id'] > 0 ) ){ ?>
									<li class="text">
										<span class="layui-col-sm">团　　长：</span>
										<span class="text-default">
											<?php echo ($item['ziti_name']); ?> <?php echo ($item['ziti_mobile']); ?>
										</span>
									</li>
									<?php } ?>
									
									<?php if( $item['delivery'] == 'tuanz_send'){ ?>
									<li class="text">
										<span class="layui-col-sm">送货地址：</span>
										<span class="text-default">
											<?php echo ($item['tuan_send_address']); ?>
										</span>
									</li>
									<?php } ?>
									
									<?php }else{ ?>
									
									<li class="text">
										<span class="layui-col-sm">团　　长：</span>
										<span class="text-default">
											<?php echo ($item['ziti_name']); ?>
										</span>
									</li>
									
									<?php } ?>
									
									
									<?php if( $item['delivery'] == 'pickup'){ ?>
									<li class="text">
										<span class="layui-col-sm">取货地址：</span>
										<span class="text-default">
											<?php echo ($item['shipping_address']); ?>
										</span>
									</li>
									<?php } ?>
									
									
									<?php if( !empty($item['address_id'])){ ?>
									<li class="text">
										<span class="layui-col-sm">收货详细地址：</span>
										<span class="text-default">
											<?php echo ($province_info['name']); echo ($city_info['name']); echo ($area_info['name']); ?>  <?php if( $item['delivery'] == 'tuanz_send'){ echo ($item['tuan_send_address']); }else{ ?> <?php echo ($item['shipping_address']); } ?>, <?php echo ($item['shipping_name']); ?>, <?php echo ($item['shipping_tel']); ?> 
											<a class='text-primary op js-clip' data-url="<?php echo ($province_info['name']); echo ($city_info['name']); echo ($area_info['name']); if( $item['delivery'] == 'tuanz_send'){ echo ($item['tuan_send_address']); }else{ ?> <?php echo ($item['shipping_address']); } ?>, <?php echo ($item['shipping_name']); ?>, <?php echo ($item['shipping_tel']); ?>">复制</a>
										</span>
									</li>

									<?php } ?>

									<?php if( !empty($item['comment'])){ ?>
									<li class="text"><span class="col-sm">买家备注：</span><span class="text-default"><?php echo ($item['comment']); ?></span></li>
									<?php } ?>
								</ul>
							</div>
							
							<?php if( !empty($item['address_id'])){ ?>
							<div class="layui-col-md-12 ops">
								<a class="btn btn-primary" style="margin-left: 10px" data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('order/opchangeaddress', array('id' => $item['order_id']));?>">修改订单收货信息</a>
							</div>
							<?php } ?>
							
						</div>

					</div>
					<div class=" order-container-static">
						<div class=" status">
							<span class="text"> 订单状态：</span>
							<?php if( $item['order_status_id'] == 1){ ?>
							<span class="text-warning font18">待发货</span> 
							<?php } ?>
							<?php if( $item['order_status_id'] == 3){ ?>
							<span class="text-warning font18">待付款</span> 
							<?php } ?>
							<?php if( $item['order_status_id'] == 4){ ?>
							<span class="text-warning font18">待收货</span>
							<?php } ?>
							<?php if( $item['order_status_id'] == 6){ ?>
							<span class="text-warning font18">已签收</span>
							<?php } ?>
							
							<?php if( $item['order_status_id'] == 7){ ?>
							<span class="text-warning font18">已退款</span>
							<?php } ?>
							<?php if( $item['order_status_id'] == 14){ ?>
							<span class="text-warning font18">配送中</span>
							<?php } ?>
							<?php if( $item['order_status_id'] == 11){ ?>
							<span class="text-success font18">交易完成</span>
							<?php } ?>
						
							<?php if( $item['order_status_id'] == 5){ ?>
							<span class="text-default font18">已关闭</span>
							<?php } ?>
							
							<i>
								<?php if( $item['order_status_id'] == 3){ ?>
								   （ 等待买家付款）
								<?php } ?>
								
								<?php if( $item['order_status_id'] == 1 ){ ?>（买家已经付款，请商家尽快发货）<?php } ?>
								
								<?php if( $item['order_status_id'] == 4){ ?>（商家已发货，等待买家收货并交易完成）<?php } ?>
								<?php if( $item['order_status_id'] == 14){ ?>（商家已发货，正在配送给团长途中）<?php } ?>
								
								<?php if( $item['order_status_id'] == 12){ ?>
										（  <span class="label label-default">已维权</span> <?php if( !empty($refund['refundtime'])){ ?>维权时间: <?php echo date('Y-m-d H:i:s',$refund['refundtime']); } ?>）
									
								<?php } ?>
							</i>
						</div>
						
						<?php if( $item['type'] == 'pintuan' ){ ?>
						<div>
							<td>
								<a lay-href="<?php echo U('group/pintuan_detail', array('pin_id' => $pin_id));?>" target="_blank" class="btn btn-success btn-sm">查看拼团详情</a>
							</td>
						</div>
						<?php } ?>
						
						<?php if( !empty($item['transaction_id'])){ ?>
						<div>
							<ul>
								<li class="text">交易单号：<span class="text-default"><?php echo ($item['transaction_id']); ?></span></li>
							</ul>
						</div>
						<?php } ?>

						<?php if( !empty($item['expresssn']) && $item['delivery']=='express' && !empty($item['shipping_method'])){ ?>
						<div>
							<ul>
								<li class="text">快递公司：<span class="text-default"><?php if( empty($express_info['name'])){ ?>其他快递<?php  }else{ echo ($express_info['name']); } ?></span></li>
								<li class="text">快递单号：<span class="text-default"><?php echo ($item['shipping_no']); ?></span>&nbsp;<a class="text-primary op" data-toggle="ajaxModal" href="<?php echo U('util/express', array('id' => $item['id'],'express'=>$item['express'],'expresssn'=>$item['expresssn']));?>">查看物流</a></li>
								<li class="text">发货时间：<span class="text-default"><?php echo date('Y-m-d H:i:s',$item['express_time']);?></span></li>
							</ul>
						</div>
						<?php } ?>
						
						<?php if( $item['delivery']=='pickup' ){ ?>
						<div>
							<ul>
								<?php if( !empty($item['express_time'])){ ?>
							   <li class="text">发货时间：<span class="text-default"><?php echo date('Y-m-d H:i:s',$item['express_time']);?></span></li>
							   <?php } ?>
							   <?php if( !empty($item['express_tuanz_time'])){ ?>
							   <li class="text">团长接货时间：<span class="text-default"><?php echo date('Y-m-d H:i:s',$item['express_tuanz_time']);?></span></li>
							   <?php } ?>
							</ul>
						</div>
						<?php } ?>
						
						
						
						<div class="ops  layui-col-md-12" style="padding: 0;">
						   
							<?php  $is_ops_show = true; if (defined('ROLE') && ROLE == 'agenter' ) { $supper_info = get_agent_logininfo(); if( $supper_info['type'] != 1) { $is_ops_show = false; } } ?>
							<?php if($is_ops_show){ ?>
							<!---操作开始-->
							<?php if( $item['order_status_id'] == 3){ ?>
							<!--未付款-->
							<?php  $is_pay_show = true; if (defined('ROLE') && ROLE == 'agenter' ) { $supper_info = json_decode(base64_decode($_GPC['__lionfish_comshop_agent']), true); $is_pay_show = false; } ?>
							<?php if($is_pay_show){ ?>
								<a class="btn btn-primary btn-xs deldom" data-toggle="ajaxPost" href="javascript:;" data-href="<?php echo U('order/oppay', array('id' => $item['order_id']));?>" data-confirm="确认此订单已付款吗？">确认付款</a>
							<?php } ?>  
							<?php }elseif( $item['order_status_id'] == 1 ){ ?>
							<!--已付款-->

								<?php if( $item['order_status_id'] == 1 && $item['delivery'] == 'express' ){ ?>
								<!--快递 发货-->
																		
								<a class="btn btn-primary btn-xs ajaxPost" data-toggle='ajaxModal' href="javascript:;" data-href="<?php echo U('order/opsend', array('id' => $item['order_id']));?>" data-confirm="确认此订单发货吗？">确认发货</a>

								<?php }elseif( $item['order_status_id'] == 1 && ($item['delivery'] == 'pickup' || $item['delivery'] == 'tuanz_send' ) ){ ?>
								  <a class="btn btn-primary btn-xs deldom" href="javascript:;"   data-confirm="确认此订单发货吗？" data-href="<?php echo U('order/opsend_tuanz', array('id' => $item['order_id']));?>">确认配送</a>
								
								
								<?php  }else{ ?>
									

								<?php } ?>

								
							<?php }elseif( $item['order_status_id'] == 14 && ($item['delivery'] == 'pickup' || $item['delivery'] == 'tuanz_send') ){ ?>
								  <a class="btn btn-primary btn-xs deldom" href="javascript:;" data-href="<?php echo U('order/opsend_tuanz_over', array('id' => $item['order_id']));?>" data-confirm="确认送达团长吗？">确认送达团长</a>

							<?php }elseif( $item['order_status_id'] == 14 && ($item['delivery'] == 'express') ){ ?>
								<a class="btn btn-primary btn-xs deldom" href="javascript:;" data-href="<?php echo U('order/opreceive', array('id' => $item['order_id']));?>" data-confirm="确认订单收货吗？">确认收货</a><br />
								
								
							<?php }elseif( $item['order_status_id'] == 4 || $item['order_status_id'] == 6 ){ ?>
							<!--已发货-->
								<?php if( $item['order_status_id'] == 4){ ?>
							<!--快递 取消发货-->
								
								
								<a class="btn btn-primary btn-xs deldom" href="javascript:;" data-href="<?php echo U('order/opreceive', array('id' => $item['order_id']));?>" data-confirm="确认订单收货吗？">确认收货</a><br />
								
								<?php if( $item['delivery'] == 'express'){ ?>
								<a class="text-primary" data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('order/opchangeexpress', array('id' => $item['order_id']));?>">修改物流</a>
								
								<?php } ?>
								
								<?php  }else{ ?>
								  
								  <a class="btn btn-primary btn-xs deldom"  href="javascript:;" data-href="<?php echo U('order/opfinish', array('id' => $item['order_id']));?>" data-confirm="确认完成订单吗？">确认完成</a>
								<?php } ?>
							<?php }elseif( $item['order_status_id'] == 3 ){ ?>

							<?php } ?>
							<!---操作结束--->
							<?php } ?>
							
							<a class="text-primary" data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('order/opremarksaler', array('id' => $item['order_id']));?>"  >
								<?php if( !empty($item['remarksaler'])){ ?>查看备注
								 <?php  }else{ ?>
								添加备注
								<?php } ?>
							</a>
						   
							
						</div>
						<?php if( $item['order_status_id'] != 3){ ?>
						<div class="order-container-footer text col-md-12" style="border: none;padding: 0">
							<?php if( $item['order_status_id'] == 1){ ?>
							友情提示：如果无法进行发货，请及时联系买家进行妥善处理;
							<?php } ?>
							<?php if( $item['order_status_id'] == 4){ ?>
							友情提示：
								请及时关注物流状态，确保买家及时收到商品;
								如果买家未收到货物或有退换货请求，请及时联系买家妥善处理
							<?php } ?>
							<?php if( $item['order_status_id']==11){ ?>
							友情提示：
							交易成功，如买家有售后申请，请与买家进行协商，妥善处理
							<?php } ?>
						</div>
						<?php } ?>
					</div>
					
				</div>
				<!---订单详情end-->
				
				<h3 style="margin:15px 0px;">商品信息</h3>
				<p style="text-aligin:right;">
					<?php if( in_array($item['order_status_id'], array(1,4,6,10,11,12,14)) && $is_can_nowrfund_order ){ ?>
					<a class='op btn btn-primary btn-xs' style="float:right;"  data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('order/oprefund_do', array('id' => $item['order_id']));?>" >
						
						<i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="整个订单立即退款" ></i>
						整个订单立即退款
					</a>
					<?php } ?>
				</p>
				<table class="layui-table ">
					<thead>
					<tr class="trorder" style="background: #fff">
						<th class="" style="width: 75px;text-align: right;padding-right: 0">
							商品标题
						</th>
						<th style="">

						</th>
						<th style="padding-left: 20px">规格、编号</th>
						<th style="text-align: left;padding-left: 20px">基数</th>
						<?php if( $item['type'] != 'integral' ){ ?>
						<th style="padding-left: 20px;width: 320px;">团长佣金&nbsp;</th>
						<?php } ?>
						<th>是否退款</th>
						<th style="text-align: center;">供应商</th>
						<th style="text-align: center;width: 140px">单价</th>
						<th style="text-align: center;width: 140px;">数量</th>
					   
						<th  style="text-align: center;width: 100px;">价格</th>
						
					</tr>
					</thead>
					<tbody>

					<?php $i =0; ?>
					<?php $member_youhui = 0; ?>
					<?php $total_refund_money = 0; ?>
					
					<?php foreach( $order_goods as $goods ){ ?>
						<?php $member_youhui += ($goods['old_total'] - $goods['total']); ?>
						<?php $total_refund_money += ($goods['has_refund_money']); ?>
						<tr class="trorder" style="background: #fff">
							<td style="text-align: right;padding-right: 0">
								<img src="<?php echo tomedia($goods['goods_images']);?>" style='width:52px;height:52px;border:1px solid #efefef; padding:1px;' >
							</td>
							<td style="min-width: 300px">
								<a target="_blank" href="<?php echo U('goods/edit', array('id' => $goods['goods_id']));?>"title="查看" style="display: block;line-height: 22px;max-width: 250px;white-space: nowrap;
				overflow: hidden;text-overflow: ellipsis;"><?php echo ($goods['name']); if($goods['is_refund_state'] == 1 ){ ?>(退款)<?php } ?></a>
								
							  
							</td>
							<td style="padding: 10px 20px">
								<p style="white-space:normal;">
								规格：<?php if( !empty($goods['option_sku'])){ ?><span class="label label-primary" data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo ($goods['option_sku']); ?>"><?php echo ($goods['option_sku']); ?></span><?php  }else{ ?>无<?php } ?>
								</p>
								<p>
									编码：<?php if( !empty($goods['model'])){ ?><span><?php echo ($goods['model']); ?></span><?php  }else{ ?>无<?php } ?>
								</p>
								
							</td>
							<td style="padding: 10px 20px">
								 &nbsp;&nbsp;商品合计<?php echo ($goods['total']); ?><br/>
								 -&nbsp;满减:<?php echo ($goods['fullreduction_money']); ?><br/>
								 -&nbsp;优惠券：<?php echo ($goods['voucher_credit']); ?><br/>
								 
								 <?php if($goods['has_refund_money']>0){ ?>
								 -&nbsp;已退款：<?php echo ($goods['has_refund_money']); ?><br/>
								 <?php } ?>
								 
								 =&nbsp;基数<?php echo ($goods['total'] -$goods['fullreduction_money']-$goods['voucher_credit']-$goods['has_refund_money']); ?>
								
							</td>
							
							<?php if( $item['type'] != 'integral' && ($item['type'] == 'normal' || $item['head_id'] > 0) ){ ?>
							<td style="padding: 10px 20px">
									<?php  foreach($goods['head_commission_order_info'] as $kkk => $vvv) { ?>
									<p style="white-space:normal;padding-bottom:8px;">
									团长：<?php echo $vvv['head_name']; ?>&nbsp;&nbsp;
									 
									<?php if($item['delivery']=='tuanz_send'){ ?>
										佣金：<?php echo round($vvv['money'] - $vvv['add_shipping_fare'],2); ?> </br>
										<?php if($vvv['level'] <= 0){ ?>
											配送收入：<?php echo $vvv['add_shipping_fare']; ?></br>
										<?php } ?>
										总佣金： <?php echo $vvv['money']; ?>	
									<?php }else{ ?>
										￥<?php echo $vvv['money']; ?>
									<?php } ?>&nbsp;
										<?php if($vvv['level'] >0){ ?>(<?php echo $vvv['level']; ?>级)<?php } ?>
										<br/>
										<?php if($vvv['fen_type'] == 0){ ?>
										分佣比例：<?php echo $vvv['bili']; ?>%
										<?php }else{ ?>
										固定团长分佣金额：<?php echo $vvv['bili']; ?>
										<?php } ?>
									 </p>
									<?php  } ?>
							</td>
							<?php } ?>
							
							<td style="text-align: center;">
								
								<?php if($item['order_status_id'] == 7){ ?>
									已退款
								<?php }else if($goods['is_refund_state'] == 1 && !empty($goods['refund_info']) ){ ?>		
									退款金额：<?php echo $goods['refund_info']['ref_money']; ?> 元,
									<?php if($goods['refund_info']['state'] == 0 ){ ?>
										<span class="layui-badge">申请中</span>
									<?php }else if($goods['refund_info']['state'] == 3){ ?>
										<span class="label label-success">退款成功</span>
									<?php }else if($goods['refund_info']['state'] == 4){ ?>
										<span class="label label-default">退款失败</span>
									<?php  } ?>
									<br/><br/>
									<a class="btn btn-primary btn-xs " href="<?php echo U('order/oprefund', array('id' => $item['order_id'], 'ref_id' => $goods['refund_info']['ref_id'] ));?>" >退款详情</a>
									
								<?php  }else if($goods['is_refund_state'] == 0 && in_array( $item['order_status_id'], array(1,4,6,10,11,12,14)) && $is_can_nowrfund_order ){ ?>
									<a class='btn op btn-primary btn-xs'  data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('order/oprefund_goods_do', array('id' => $item['order_id'], 'order_goods_id' => $goods['order_goods_id'] ));?>" >
										<i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="后台商品退款" ></i>
										后台商品退款
									</a>
								<?php } ?>
							</td>
							
							<td style="text-align: center;">
								<span><?php echo ($goods['supply_name']); ?>(<?php echo ($goods['supply_type']); ?>)</span>
							</td>
							
							
							
							<td style="text-align: center">
								
								<p><?php if($item['type'] == 'integral'){ ?> <?php }else{ ?>￥<?php } echo round($goods['price'],2); if($item['type'] == 'integral'){ ?>积分<?php }else{ ?> <?php } ?>
								<?php if( $goods['member_disc'] < 100){ ?>
								<span class="label label-primary">会员折扣：<?php echo ($goods['member_disc']); ?>%</span>
								<?php } ?>
								</p>
							</td>
							<td style="text-align: center">
								<p><?php echo ($goods['quantity']); ?>个<?php if($goods['has_refund_quantity'] > 0){ ?>(已退<?php echo ($goods['has_refund_quantity']); ?>个)<?php } ?></p>
							</td>
							<td  style="text-align: center"><?php if($item['type'] == 'integral'){ ?> <?php }else{ ?>￥<?php } echo round($goods['price']*$goods['quantity'],2);?></td>
							
						</tr>
						<?php if($item['is_commission'] == 1 && !empty($goods['member_commission_list']) ){ ?>
						 <tr class="tr-order-sn">
							<td colspan="9">
								会员佣金:
								<?php foreach($goods['member_commission_list'] as $mb_val){ ?>
								
								分销员：<?php echo $mb_val['username']; ?>（<?php echo $mb_val['level']; ?>级上线）   
								
								 佣金比例：
								 <?php if($mb_val['type'] == 1){ ?>
								 &nbsp;<?php echo $mb_val['bili']; ?>% 
								*(&nbsp;基数：<?php echo ($goods['price']); ?> 
								*&nbsp;数量：<?php echo ($goods['quantity']); ?> 
								 <?php if($goods['has_refund_money']>0){ ?>
								 -&nbsp;已退款：<?php echo ($goods['has_refund_money']); ?>
								 <?php } ?>
								 )
								<?php }else{ ?>
									固定佣金<?php echo $mb_val['bili']; ?> 
											&nbsp;*&nbsp;数量：<?php echo ($goods['quantity']); ?>
								<?php } ?>
								=&nbsp;具体佣金：<?php echo $mb_val['money']; ?>元 &nbsp;
								<?php  $str_state = ''; switch($mb_val['state']) { case 0: $str_state='待结算'; break; case 1: $str_state='已结算'; break; case 2: $str_state='订单退款'; break; } ?>(<?php echo $str_state; ?>)<br/>     
								<?php } ?>	
							</td>
						</tr>
						<?php } ?>

						<?php $i++; ?>
					<?php } ?>
					</tbody>

					<tfoot style="padding-top: 20px">
					<tr class="trorder">
						<td colspan="2" style="padding-left: 20px"> 
						</td>
						

						<td  <?php if($item['type'] == 'integral'){ ?> colspan="6"<?php }else{ ?> colspan="7"<?php } ?> style="padding-right: 60px">
							<div class="price">
								
								<p> <span class="price-inner">商品合计：</span><span style="font-weight: bold"><?php if( $item['type'] == 'integral' ){ }else{ ?>￥<?php } echo round($item['total'],2); if( $item['type'] == 'integral' ){ ?>积分<?php } ?></span></p>
							   
							   
								<?php if( $item['is_free_shipping_fare'] == 1 ){ ?>
								<p><span class="price-inner">运费：</span>￥<?php echo ($item['fare_shipping_free']); ?></p>
								<p><span class="price-inner">满<?php echo ($item['man_e_money']); ?>减运费：</span>-￥<?php echo ($item['fare_shipping_free']); ?></p>
								<?php }else{ ?>
								<p><span class="price-inner">运费：</span>￥<?php echo ($item['shipping_fare']); ?></p>
								<?php  } ?>
								
								
								<?php if( $item['voucher_id']>0 ){ ?>
								<p><span class="price-inner">优惠券优惠：</span><span class="text-danger">-￥<?php echo ($item['voucher_credit']); ?></span></p>
								<?php } ?>
								<?php if( $item['fullreduction_money']>0 ){ ?>
								<p><span class="price-inner">满减优惠：</span><span class="text-danger">-￥<?php echo ($item['fullreduction_money']); ?></span></p>
								<?php } ?>
								
							
								<?php if( $item['score_for_money']>0 ){ ?>
								<p><span class="price-inner">积分抵扣：</span><span class="text-danger">-￥<?php echo ($item['score_for_money']); ?></span></p>
								<?php } ?>
								
								
								<?php if( ($item['changedtotal'])!=0){ ?>
								<p>
									<span class="price-inner">卖家改价：</span>
									<span style='<?php if( 0<$item['changedtotal']){ ?>color:green<?php  }else{ ?>color:red<?php } ?>'><?php if( 0<$item['changedtotal']){ ?>+<?php  }else{ ?>-<?php } ?>￥{php echo number_format(abs($item['changedtotal']),2)}</span>
								</p>
								<?php } ?>

								<?php if( ($item['changedshipping_fare'])!=0){ ?>
								<p>
									<span class="price-inner">卖家改运费：</span>
									<span style='<?php if( 0<$item['changedshipping_fare']){ ?>color:green<?php  }else{ ?>color:red<?php } ?>'><?php if( 0<$item['changedshipping_fare']){ ?>+<?php  }else{ ?>-<?php } ?>￥{php echo abs($item['changedshipping_fare'])}</span>
								</p>
								<?php } ?>
								<?php  $free_tongji = $item['total']+$item['shipping_fare']-$item['voucher_credit']-$item['fullreduction_money'] - $item['score_for_money']; if($free_tongji < 0){ $free_tongji = 0; } ?>
								
								
								<?php
 if( $item['is_vipcard_buy'] == 1 && $member_youhui >0 ) { ?>
									<p><span class="price-inner">会员卡优惠：</span><span class="text-danger">-￥<?php echo ($member_youhui); ?></span></p>
								<?php
 } ?>
								<?php
 if( $item['is_level_buy'] == 1 && $member_youhui >0 ) { ?>	
									<p><span class="price-inner">会员等级折扣优惠：</span><span class="text-danger">-￥<?php echo ($member_youhui); ?></span></p>
								<?php	 } ?>
								
								
								<?php if($item['type'] == 'integral'){ ?>
								<p><span class="price-inner">实付款：</span>
									
								<span style="font-size: 14px;font-weight: bold;color: #e4393c"><?php if( $item['shipping_fare'] > 0 ){ ?>￥<?php echo round($item['shipping_fare'],2);?>+<?php } ?> <?php echo round($item['total'],2);?> 积分</span>
								
								</p>
								<?php }else{ ?>
									
									<p><span class="price-inner">实付款：</span><span style="font-size: 14px;font-weight: bold;color: #e4393c">￥<?php echo ($free_tongji); ?></span></p>
									<?php  if( $total_refund_money > 0 ){ ?>
									<p><span class="price-inner">退款：</span><span style="font-size: 14px;font-weight: bold;color: #e4393c">￥<?php echo ($total_refund_money); ?></span></p>
									<?php } ?>
								<?php } ?>
								
								
							</div>
						</td>
					</tr>
					</tfoot>
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

layui.use(['jquery', 'layer','form'], function(){ 
  $ = layui.$;
  var form = layui.form;
  
  
	
	$('.tip_headcommiss').click(function(){
		var s_str = '团长佣金结算状态： 待结算<br/>团长佣金结算金额：2.40<br/>佣金预计结算时间：2016-09-14 16:04:05  <br>结算说明：结算前商品退款会改变佣金计算情况，佣金结算后商品进行退款不改变佣金计算情况。';
		
		layer.tips( s_str ,this, {
			tips:[1,'#000'],
			time: 10000 
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
$(function(){
	var ajax_url = "";
	$("[data-toggle='ajaxModal']").click(function () {
		var s_url = $(this).attr('data-href');
		ajax_url = s_url;
		$.ajax({
			url:s_url,
			type:"get",
			success:function(shtml){
				//console.log(shtml);
				$('#ajaxModal').html(shtml);
				$('#ajaxModal').modal();
			}
		})
		
	})
	
	$(document).delegate(".modal-footer .btn-primary","click",function(){
		var s_data = $('#ajaxModal form').serialize();
		console.log(43434);
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