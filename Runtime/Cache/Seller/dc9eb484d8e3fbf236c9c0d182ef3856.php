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
            <div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">
			
			<?php if( !empty($item['id']) ){ ?>编辑<?php }else{ ?>添加<?php } ?>角色 <small><?php if(!empty($item['id'])){ ?>修改【<?php echo ($item['rolename']); ?>】<?php } ?></small>
			
			</span></div>
            <div class="layui-card-body" style="padding:15px;">
                <form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
                    
					
					<input type="hidden" name="id" value="<?php echo ($item['id']); ?>" />
					<div class="layui-form-item">
						<label class="layui-form-label must">角色</label>
						<div class="layui-input-block">
							<input type="text" name="rolename" class="form-control" value="<?php echo ($item['rolename']); ?>" data-rule-required="true" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">状态</label>
						<div class="layui-input-block">
							<label class='radio-inline'>
								<input type='radio' name='status' value=1' <?php if($item['status']==1){ ?>checked<?php } ?> title="启用" /> 
							</label>
							<label class='radio-inline'> 
								<input type='radio' name='status' value=0' <?php if($item['status']==0){ ?>checked<?php } ?> title="禁用" /> 
							</label>
							<span class="help-block">如果禁用，则当前角色的操作员全部会禁止使用</span>
						</div>
					</div>
				   <!-- perm begin -->
				   <div class="layui-form-item">

						 <label class="layui-form-label">可用权限</label>

									<div class="layui-input-block">
										<div id="accordion" class="panel-group">
										<div class='panel panel-default' >
										<?php $i = 0; ?>
										<?php foreach($perms['parent'] as $key => $value){ ?>
											<div class='panel-heading' style='background:#f8f8f8' >
												<a class="btn btn-link btn-sm pull-right" data-toggle="collapse"  data-parent="#accordion" href="#collapse<?php echo ($key); ?>"><i class='fa fa-angle-down'></i> 展开</a>
												<label class='checkbox-inline'>

														 <input type='checkbox' lay-ignore  id="perm_<?php echo ($key); ?>" name='perms[]' value='<?php echo ($key); ?>' class='perm-all' data-group='<?php echo ($key); ?>'
																<?php if(in_array($key,$role_perms) || in_array($key,$user_perms)){ ?> checked<?php } ?>
																<?php if(in_array($key,$role_perms) && $action=='perm.user'){ ?> disabled<?php } ?>
																/ title=""> <?php echo ($value['text']); ?>

												</label>
											</div>
											<div id="collapse<?php echo ($key); ?>" class="panel-collapse <?php if($i == 0){ ?>in<?php }else{ ?>collapse<?php } ?>">
											<div class='panel-body perm-group'>
												
												<?php if( count($perms['parent'][$key]) >=1 ){ ?>
												<span>
												<?php foreach($perms['parent'][$key] as $ke => $val){ ?>
												
												
												<?php if($ke != 'text'){ ?>
													 <label class='checkbox-inline'>
														 <input type='checkbox' lay-ignore   name='perms[]'  value='<?php echo ($key); ?>.<?php echo ($ke); ?>' class='perm-item'
																data-group='<?php echo ($key); ?>' data-parent='text'
																<?php if(in_array($key.".".$ke,$role_perms) || in_array($key.".".$ke,$user_perms)){ ?> checked<?php } ?>
														 <?php if(in_array($key.".".$ke,$role_perms) && $action=='perm.user'){ ?> disabled<?php } ?> title=""/>  <?php echo str_replace("-log", "", $val); ?>
													 </label>
												<?php }else{ ?>	 
													 <label class='checkbox-inline'>
														 <input type='checkbox' lay-ignore   name='perms[]'  value='<?php echo ($key); ?>' class='perm-all-item'
																data-group='<?php echo ($key); ?>' data-parent='text'
																<?php if(in_array($key,$role_perms) || in_array($key,$user_perms)){ ?> checked<?php } ?>
														 <?php if(in_array($key,$role_perms) && $action=='perm.user'){ ?> disabled<?php } ?> title=""/><?php echo str_replace("-log", "", $val); ?>  
													 </label>
												<?php } ?>
												</span>
												<br>
												<?php } ?>
												<?php } ?>
												
												<?php foreach($perms['son'][$key] as $ke => $val){ ?>
												
												<?php if( count($val) >=1 ){ ?>
												<span>
													
													<?php foreach($val as $k => $v){ ?>
													
													<?php if($k != 'text'){ ?>
														 <label class='checkbox-inline'>
															 <input type='checkbox' lay-ignore   name='perms[]'  value='<?php echo ($key); ?>.<?php echo ($ke); ?>.<?php echo ($k); ?>' class='perm-item'
																	data-group='<?php echo ($key); ?>' data-parent='<?php echo ($ke); ?>' data-son="<?php echo ($k); ?>"
																	<?php if( in_array($key.".".$ke.".".$k,$role_perms) || in_array($key.".".$ke.".".$k,$user_perms) ){ ?> checked<?php } ?>
															 <?php if(in_array($key.".".$ke.".".$k,$role_perms) && $action=='perm.user'){ ?> disabled<?php } ?> title=""/><?php echo str_replace("-log", "", $v); ?>  
														 </label>
													<?php }else{ ?>
														 <label class='checkbox-inline'>
															 <input type='checkbox' lay-ignore   name='perms[]'  value='<?php echo ($key); ?>.<?php echo ($ke); ?>' class='perm-all-item'
																	data-group='<?php echo ($key); ?>' data-parent='<?php echo ($ke); ?>' data-son="<?php echo ($k); ?>"
																	<?php if( in_array($key.".".$ke,$role_perms) || in_array($key.".".$ke,$user_perms) ){ ?> checked<?php } ?>
															 <?php if(in_array($key.".".$ke,$role_perms) && $action=='perm.user'){ ?> disabled<?php } ?> title=""/> <?php echo str_replace("-log", "", $v); ?> 
														 </label>
													<?php } ?>
													<?php } ?>
													</span>
												<br>
												<?php } ?>
												<?php } ?>

												
												<?php foreach($perms['grandson'][$key] as $ke => $val){ ?>
												
												<?php foreach($val as $k => $v){ ?>
											
												<?php if( count($v) >1 ){ ?>
												 <span>
												 <?php foreach($v as $kk => $vv){ ?>
												
												<?php if($kk != 'text'){ ?>
														 <label class='checkbox-inline'>
															 <input type='checkbox' lay-ignore   name='perms[]'  value='<?php echo ($key); ?>.<?php echo ($ke); ?>.<?php echo ($k); ?>.<?php echo ($kk); ?>' class='perm-item'
																	data-group='<?php echo ($key); ?>' data-parent='<?php echo ($ke); ?>' data-son="<?php echo ($k); ?>" data-grandson="<?php echo ($kk); ?>"
																	<?php if(in_array($key.".".$ke.".".$k.".".$kk,$role_perms) || in_array($key.".".$ke.".".$k.".".$kk,$user_perms)){ ?> checked<?php } ?>
															 <?php if(in_array($key.".".$ke.".".$k.".".$kk,$role_perms) && $action =='perm.user'){ ?> disabled<?php } ?> title=""/><?php echo str_replace("-log", "", $vv); ?>  
														 </label>
												<?php }else{ ?>
														 <label class='checkbox-inline'>
															 <input type='checkbox' lay-ignore   name='perms[]'  value='<?php echo ($key); ?>.<?php echo ($ke); ?>.<?php echo ($k); ?>' class='perm-all-item'
																	data-group='<?php echo ($key); ?>' data-parent='<?php echo ($ke); ?>' data-son="<?php echo ($k); ?>" data-grandson="<?php echo ($kk); ?>"
																	<?php if( in_array($key.".".$ke.".".$k,$role_perms) || in_array($key.".".$ke.".".$k,$user_perms) ){ ?> checked<?php } ?>
															 <?php if(in_array($key.".".$ke.".".$k,$role_perms) && $action=='perm.user'){ ?> disabled<?php } ?> title=""/><?php echo str_replace("-log", "", $vv); ?>  
														 </label>
												<?php } ?>
												<?php } ?>
												 </span>
												<br>
												<?php } ?>
												<?php } ?>
												<?php } ?>
											</div>
									 </div>
										   <?php $i++; ?>
										<?php } ?>
										</div>
									</div>
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

        form.verify({
          title: [
            /^[\S]{1,}$/,'标题不能为空'
          ] 
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
	<script language="javascript">
		$(function () {
			$('.perm-all').click(function () {
				var checked = $(this).get(0).checked;
				var group = $(this).data('group');
				$(".perm-item[data-group='" + group + "'],.perm-all-item[data-group='" + group + "']").each(function () {
					$(this).get(0).checked = checked;
				})
			})
			$('.perm-all-item').click(function () {
				var checked = $(this).get(0).checked;
				var group = $(this).data('group');
				var parent = $(this).data('parent');
				var son = $(this).data('son');
				var grandson = $(this).data('grandson');
				$(this).parents("span").find(".perm-item").each(function () {
					$(this).get(0).checked = checked;
				});
				group_check(this);

			});
			$('.perm-item').click(function () {
				var group = $(this).data('group');
				var parent = $(this).data('parent');
				var son = $(this).data('son');
				var grandson = $(this).data('grandson');
				var check = false;
				$(this).closest('span').find(".perm-item").each(function () {
					if ($(this).get(0).checked) {
						check = true;
						return false;
					}
				});
				var allitem = $(this).parents("span").find(".perm-all-item");
				if (allitem.length == 1) {
					allitem.get(0).checked = check;
				}
				group_check(this);

			});

			$(".panel-body").find("span").each(function (index, item) {
				if ($(this).find("label").length != 1) {
					$($(this).find("label").get(0)).wrap("<div class='col-sm-2' style='white-space:nowrap;'></div>");
					$($(this).find("label").not($(this).find("label").get(0))).wrapAll("<div class='col-sm-10'></div>");
				}
				else {
					$($(this).find("label").get(0)).wrap("<div class='col-sm-12'></div>");
				}
			});

		});

		function group_check(obj) {
			var check = false;
			$(obj).parents('.perm-group').find(":checkbox").each(function (index, item) {
				if (item.checked) {
					check = true;
				}
			});
			var group = $(obj).eq(0).data('group');
			$(".perm-all[data-group=" + group + "]").get(0).checked = check;
		}
	</script>

</body>
</html>