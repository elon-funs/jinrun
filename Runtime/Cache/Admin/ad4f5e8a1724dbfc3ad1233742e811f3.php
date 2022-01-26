<?php if (!defined('THINK_PATH')) exit();?><ul class="nav nav-list">
<?php if(is_array($admin_menu)): $i = 0; $__LIST__ = $admin_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
	<?php if(empty($v['url'])) { ?>
		<a href="#" class="dropdown-toggle">
			<i class="<?php echo ($v["icon"]); ?>"></i>
			<span class="menu-text"><?php echo ($v["title"]); ?></span>
			<b class="arrow icon-angle-down"></b>
		</a>
	<?php }else { ?>
		<a href="/admin.php?s=/<?php echo ($v["url"]); ?>" class="dropdown-toggle">
			<i class="<?php echo ($v["icon"]); ?>"></i>
			<span class="menu-text"><?php echo ($v["title"]); ?></span>
		</a>
	<?php }?>
	
	<?php if(isset($v['children'])){ ?>
		<ul class="submenu">
			<?php if(is_array($v['children'])): foreach($v['children'] as $key=>$vo): if(isset($vo['children'])){ ?>
				<li>	
				 <a href="#" class="dropdown-toggle">		
				 	<i class="icon-double-angle-right"></i>			
					<span class="menu-text"><?php echo ($vo["title"]); ?></span>
					<b class="arrow icon-angle-down"></b>
				</a>
				<ul class="submenu">
				 <?php foreach ($vo['children'] as $k2 => $v2){ ?>
					<li>
						<a href="/admin.php?s=/<?php echo ($v2["url"]); ?>">
							<i class="icon-double-angle-right"></i>
							<span class="url-title"><?php echo ($v2["title"]); ?></span>
						</a>
					</li>
				 <?php } ?>
				 </ul>
				 
				</li>
				
				 
			<?php }else{ ?>
				<li>
				<a href="/admin.php?s=/<?php echo ($vo["url"]); ?>">
					<i class="icon-double-angle-right"></i>
					<span class="url-title"><?php echo ($vo["title"]); ?></span>
				</a>
				</li>
			<?php } endforeach; endif; ?>
			
		</ul>
	<?php } ?>
</li><?php endforeach; endif; else: echo "" ;endif; ?>	
<li>
	<a href="#" class="dropdown-toggle">
		<span class="menu-text" style="font-family:'微软雅黑';">&nbsp;&nbsp;Copyright&nbsp;&nbsp;&nbsp;©&nbsp;&nbsp;&nbsp;金润</span>
	</a>
</li>
</ul>