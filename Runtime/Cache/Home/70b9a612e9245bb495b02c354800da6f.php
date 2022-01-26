<?php if (!defined('THINK_PATH')) exit();?><script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  wx.config({
    debug: false,
    appId: '<?php echo ($signPackage["appId"]); ?>',
    timestamp: <?php echo ($signPackage["timestamp"]); ?>,
    nonceStr: '<?php echo ($signPackage["nonceStr"]); ?>',
    signature: '<?php echo ($signPackage["signature"]); ?>',
    jsApiList: [
      'onMenuShareTimeline','onMenuShareAppMessage'
    ]
  });

  wx.ready(function () {
		wx.onMenuShareTimeline({
			title: '<?php echo ($indexsharetitle); ?>', // 分享标题
			link: '<?php echo ($url); ?>', // 分享链接
			imgUrl: '<?php echo ($share_logo); ?>', // 分享图标
			success: function () { 
				// 用户确认分享后执行的回调函数
			},
			cancel: function () { 
				// 用户取消分享后执行的回调函数
			}
		});
		
		wx.onMenuShareAppMessage({
			title: '<?php echo ($indexsharetitle); ?>', // 分享标题
			desc: '<?php echo ($indexsharesummary); ?>', // 分享描述
			link: '<?php echo ($url); ?>', // 分享链接
			imgUrl: '<?php echo ($share_logo); ?>', // 分享图标
			type: '', // 分享类型,music、video或link，不填默认为link
			dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
			success: function () { 
				// 用户确认分享后执行的回调函数
			},
			cancel: function () { 
				// 用户取消分享后执行的回调函数
			}
		});
  });
</script>