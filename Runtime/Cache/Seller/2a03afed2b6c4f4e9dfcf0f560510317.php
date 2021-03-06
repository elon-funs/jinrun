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
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">附件设置</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				<div class="layui-form-item">
					<label class="layui-form-label">远程附件</label>
					<div class="layui-input-block attclass">
						<label class='radio-inline'>
							<input type='radio' name='parameter[attachment_type]' value='0' <?php if( empty($data) || $data['attachment_type'] ==0){ ?>checked <?php } ?> title="关闭" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[attachment_type]' value='1' <?php if(!empty($data) && $data['attachment_type'] ==1){ ?>checked <?php } ?> title="七牛云存储" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[attachment_type]' value='2' <?php if(!empty($data) && $data['attachment_type'] ==2){ ?>checked <?php } ?> title="阿里云OSS" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[attachment_type]' value='3' <?php if(!empty($data) && $data['attachment_type'] ==3){ ?>checked <?php } ?> title="腾讯云" /> 
						</label>
					</div>
				</div>
				<div class="row qiniu_row" style="<?php if(!empty($data) && $data['attachment_type'] ==1){ ?> <?php }else{ ?> display:none;<?php } ?>">
					<div class="layui-form-item qiniu_class">
						<label class="layui-form-label"></label>
						<div class="layui-input-block">
							<div class="summary_box">
								
								<div class="summary_lg">
									启用七牛云存储后，请把/Uploads目录（包括此目录）下的子文件及子目录上传至七牛云存储 ：
									<p><a href="https://portal.qiniu.com/signin" target="_blank">七牛云存储</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="layui-form-item qiniu_class">
						<label class="layui-form-label">Accesskey</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[qiniu_accesskey]" class="form-control" value="<?php echo ($data['qiniu_accesskey']); ?>" />
							<span class='help-block'>用于签名的公钥</span>
						</div>
					</div>
					<div class="layui-form-item qiniu_class">
						<label class="layui-form-label">Secretkey</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[qiniu_secretkey]" class="form-control" value="<?php echo ($data['qiniu_secretkey']); ?>" />
							<span class='help-block'>用于签名的私钥</span>
						</div>
					</div>
					<div class="layui-form-item qiniu_class">
						<label class="layui-form-label">Bucket</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[qiniu_bucket]" class="form-control" value="<?php echo ($data['qiniu_bucket']); ?>" />
							<span class='help-block'>请保证bucket为可公共读取的</span>
						</div>
					</div>
					<div class="layui-form-item qiniu_class">
						<label class="layui-form-label">Url</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[qiniu_url]" class="form-control" value="<?php echo ($data['qiniu_url']); ?>" />
							<span class='help-block'>七牛支持用户自定义访问域名。注：url开头加http://或https://结尾加 ‘/’例：http://abc.com/</span>
						</div>
					</div>
				</div>
				
				<div class="row alioss_row" style="<?php if(!empty($data) && $data['attachment_type'] ==2){ ?> <?php }else{ ?> display:none;<?php } ?>">
					<div class="layui-form-item">
						<label class="layui-form-label"></label>
						<div class="layui-input-block">
							<div class="summary_box">
								
								<div class="summary_lg">
									<p>启用阿里oss后，请把/Uploads目录（包括此目录）下的子文件及子目录上传至阿里云oss, 相关工具：</p>
									<p><a href="http://bbs.aliyun.com/read/247023.html?spm=5176.383663.9.29.faitxp" target="_blank">官方推荐工具</a></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">Access Key ID</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[alioss_key]" class="form-control" value="<?php echo ($data['alioss_key']); ?>" />
							<span class='help-block'>Access Key ID是您访问阿里云API的密钥，具有该账户完全的权限，请您妥善保管。</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">Access Key Secret</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[alioss_secret]" class="form-control" value="<?php echo ($data['alioss_secret']); ?>" />
							<span class='help-block'>Access Key Secret是您访问阿里云API的密钥，具有该账户完全的权限，请您妥善保管。(填写完Access Key ID 和 Access Key Secret 后请选择bucket)</span>
						</div>
					</div>
					<div class="layui-form-item qiniu_class">
						<label class="layui-form-label">Bucket</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[alioss_bucket]" class="form-control" value="<?php echo ($data['alioss_bucket']); ?>" />
							<span class='help-block'>请保证bucket为可公共读取的</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">内网上传</label>
						<div class="layui-input-block">
							<label class='radio-inline'>
								<input type='radio' name='parameter[alioss_internal]' value='1' <?php if(!empty($data) && $data['alioss_internal'] ==1){ ?>checked <?php } ?> title="是" /> 
							</label>
							<label class='radio-inline'>
								<input type='radio' name='parameter[alioss_internal]' value='0' <?php if( empty($data) || $data['alioss_internal'] ==0){ ?>checked <?php } ?> title="否" /> 
							</label>
							<span class='help-block'>
								如果此站点使用的是阿里云ecs服务器，并且服务器与bucket在同一地区（如：同在华北一区），您可以选择通过内网上传的方式上传附件，以加快上传速度、节省带宽。
							</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">自定义URL</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[alioss_url]" class="form-control" value="<?php echo ($data['alioss_url']); ?>" />
							<span class='help-block'>
								阿里云oss支持用户自定义访问域名，如果自定义了URL则用自定义的URL，如果未自定义，则用系统生成出来的URL。
								注：自定义url开头加http://或https://结尾加 ‘/’例：http://abc.com/
							</span>
						</div>
					</div>
				</div>
				
				
				<div class="row txyun_row" style="<?php if(!empty($data) && $data['attachment_type'] ==3){ ?> <?php }else{ ?> display:none;<?php } ?>">
					
					<div class="layui-form-item">
						<label class="layui-form-label"></label>
						<div class="layui-input-block">
							<div class="summary_box">
								<div class="summary_lg">
									<p>启用腾讯云存储后，请把/Uploads目录（包括此目录）下的子文件及子目录上传至腾讯云存储, 相关工具：</p>
									<p><a href="https://console.qcloud.com/cos/bucket" target="_blank">官方推荐工具</a></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">APPID</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[tx_appid]" class="form-control" value="<?php echo ($data['tx_appid']); ?>" />
							<span class='help-block'>APPID 是您项目的唯一ID</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">SecretID</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[tx_secretid]" class="form-control" value="<?php echo ($data['tx_secretid']); ?>" />
							<span class='help-block'>SecretID 是您项目的安全密钥，具有该账户完全的权限，请妥善保管</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">SecretKEY</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[tx_secretkey]" class="form-control" value="<?php echo ($data['tx_secretkey']); ?>" />
							<span class='help-block'>SecretKEY 是您项目的安全密钥，具有该账户完全的权限，请妥善保管</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">Bucket</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[tx_bucket]" class="form-control" value="<?php echo ($data['tx_bucket']); ?>" />
							<span class='help-block'>请保证bucket为可公共读取的</span>
						</div>
					</div>
					
					<?php  $tx_area_list = array( 'ap-beijing-1' => '北京一区（已售罄）', 'ap-beijing' => '北京', 'ap-shanghai' => '上海（华东）', 'ap-guangzhou' => '广州（华南）', 'ap-chengdu' => '成都（西南）', 'ap-chongqing' => '重庆', 'ap-shenzhen-fsi' => '深圳金融', 'ap-shanghai-fsi' => '上海金融', 'ap-beijing-fsi' => '北京金融', 'ap-hongkong' => '中国香港', 'ap-singapore' => '新加坡', 'ap-mumbai' => '孟买', 'ap-seoul' => '首尔', 'ap-bangkok' => '曼谷', 'ap-tokyo' => '东京', 'na-siliconvalley' => '硅谷', 'na-ashburn' => '弗吉尼亚', 'na-toronto' => '多伦多', 'eu-frankfurt' => '法兰克福', 'eu-moscow' => '莫斯科', ); ?>	
					<div class="layui-form-item">
						<label class="layui-form-label">地区</label>
						<div class="layui-input-block">
							<select name="parameter[tx_area]">
								<?php foreach($tx_area_list as $key => $val){ ?>
								<option value="<?php echo ($key); ?>" <?php if( !empty($data['tx_area']) && $data['tx_area'] == $key ){ ?> selected<?php } ?> ><?php echo ($val); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">Url</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[tx_url]" class="form-control" value="<?php echo ($data['tx_url']); ?>" />
							<span class='help-block'>腾讯云支持用户自定义访问域名。注：url开头加http://或https://结尾加 ‘/’例：http://abc.com/</span>
						</div>
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
 
  
   //表单赋值
    colorpicker.render({
      elem: '#minicolors'
      ,color: '<?php echo ($data['nav_bg_color']); ?>'
      ,done: function(color){
        $('#test-colorpicker-form-input').val(color);
      }
    });

    colorpicker.render({
      elem: '#minicolors2'
      ,color: '<?php echo ($data['index_top_font_color']); ?>'
      ,done: function(color){
        $('#test-colorpicker-form-input2').val(color);
      }
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
	 $('.attclass input[type=radio]').click(function(){
		var s_r = $(this).val();
		
		if(s_r == 0)
		{
			$('.qiniu_row').hide();
			$('.alioss_row').hide();
			$('.txyun_row').hide();
			
		}else if(s_r == 1){
			
			$('.qiniu_row').show();
			$('.alioss_row').hide();
			$('.txyun_row').hide();
			
		}else if(s_r == 2){
			$('.qiniu_row').hide();
			$('.alioss_row').show();
			$('.txyun_row').hide();
		}else if( s_r == 3 )
		{
			$('.txyun_row').show();
			$('.qiniu_row').hide();
			$('.alioss_row').hide();
		}
		
	 })
</script> 
</body>