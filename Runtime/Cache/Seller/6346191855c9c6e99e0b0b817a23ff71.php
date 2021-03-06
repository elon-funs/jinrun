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
    <style type="text/css">.layui-form-switch{margin-top:0!important;margin-right: 10px;}</style>
</head>
<body layadmin-themealias="default">
    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">直播间管理</span></div>

            <div class="layui-row" style="margin: 0 15px">
                <div class="layui-card">
                  <div class="layui-card-header">小程序直播运营操作说明：</div>
                  <div class="layui-card-body">
                    <p>1、登录微信小程序后台，在左侧功能栏“直播”<a href="https://mp.weixin.qq.com/" class="text-primary" target="_blank">点击创建直播间</a>。</p>
                    <p>2、在小程序后台成功创建直播间后，点击列表中的”同步直播间“按钮。同步直播间后直播列表页面中会显示。</p>
                    <p style="color:red;">3、切勿重复点击”同步直播间“按钮。小程序每天有请求次数限制。</p>
                  </div>
                </div>
            </div>

            <div class="layui-card-body" style="padding:15px;">
                <form action="" method="get" class="form-horizontal form-search layui-form" role="form">
                    <input type="hidden" name="c" value="wxlive" />
                    <input type="hidden" name="a" value="index" />
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                              <input type="text" class="layui-input" name='keywords' value="<?php echo ($keyword); ?>" placeholder="请输入关键词">  
                            </div>
                            <div class="layui-input-inline">
                                <button class="layui-btn layui-btn-sm"  type="submit"> 搜索</button>
                            </div>
                        </div>
                        <span class="pull-right">
                            <a href="javascript:;" class="btn btn-success" style="margin-right: 10px;" id="refresh" data-href="<?php echo U('wxlive/sync');?>">
                                <i class="fa fa-refresh"></i> 同步直播间
                            </a>
                            <a href="https://mp.weixin.qq.com/" class="btn btn-primary" target="_blank"><i class="fa fa-plus"></i> 添加新直播间</a>
                        </span>
                    </div>
                </form>
                <form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(count($list)>0){ ?>
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th style="width: 120px;">直播间ID</th>
                                        <th>直播标题</th>
                                        <th style="width: 150px;">主播昵称</th>
                                        <th style="width: 100px;">直播间封面</th>
                                        <th style="width: 100px;">分享封面</th>
                                        <th style="width: 100px;">开播时间</th>
                                        <th style="width: 100px;">结束直播</th>
                                        <th style="width: 150px;">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( $list as $item ){ ?>
                                    <tr>
                                        <td><?php echo ($item['roomid']); ?></td>
                                        <td><?php echo ($item['name']); ?></td>
                                        <td><?php echo ($item['anchor_name']); ?></td>
                                        <td>
                                            <img src="<?php echo tomedia($item['cover_img']);?>" style="width:40px;height:40px;padding:1px;border:1px solid #ccc;"/>
                                        </td>
                                        <td>
                                            <img src="<?php echo tomedia($item['share_img']);?>" style="width:40px;height:40px;padding:1px;border:1px solid #ccc;"/>
                                        </td>
                                        <td><?php echo date('Y-m-d H:i:s', $item['start_time']);?></td>
                                        <td><?php echo date('Y-m-d H:i:s', $item['end_time']);?></td>
                                        <td style="text-align:left;">
                                            <input type="checkbox" name="" lay-filter="statewsitch" data-href="<?php echo U('wxlive/change',array('type'=>'is_show','id'=>$item['id']));?>" <?php if( $item['is_show']==1){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="显示|隐藏">

                                            <a class="btn btn-danger btn-xs" href="<?php echo U('wxlive/replay', array('id'=>$item['id'],'roomid'=>$item['roomid']));?>">
                                                <i class="fa fa-video-camera"></i> 回放
                                            </a>
                                            <!-- <a class="btn btn-op btn-operation js-clip" data-href="/lionfish_comshop/moduleB/__plugin__/wx2b03c6e691cd7370/pages/live-player-plugin?room_id=<?php echo ($item['roomid']); ?>">
                                                <span data-toggle="tooltip" data-placement="top"  data-original-title="复制直播间地址">
                                                   复制直播间地址
                                                </span>
                                            </a> -->
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan='8'>
                                            <div class='pagers' style='float:right;'>
                                                <?php echo ($pager); ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <?php  }else{ ?>
                            <div class='panel panel-default'>
                                <div class='panel-body' style='text-align: center;padding:30px;'>
                                    暂时没有任何直播间!
                                </div>
                            </div>
                            <?php } ?>
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
    
    $("#refresh").click(function(){
      var s_url = $(this).data('href');
      var loading = layer.load(0, { shade: false });
        $.ajax({
            url:s_url,
            type:'post',
            dataType:'json',
            data: '',
            success:function(info){
                layer.close(loading);
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
                            location.href = go_url;
                        }
                    }); 
                }
            }
        })
    });

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
            data:{value:s_value},
            success: function(info){
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



</script>
</body>
</html>