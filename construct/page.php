<?php 
/*
 * Template Name:BYMT for Emlog
 * Version:1.0
 * Author:麦田一根葱
 * Author Url:http://www.yuxiaoxi.com
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content_wrap">
	<div id="content">
	  <div class="excerpt">
	    <div class="context">
		<h2><?php echo $log_title; ?></h2>
		<?php echo $log_content; ?>
		</div>
	  </div>
	  <div class="comments">
		<?php blog_comments($comments); ?>
		<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	  </div>
	</div>
<?php include View::getView('side'); ?>
</div>
<?php include View::getView('footer'); ?>