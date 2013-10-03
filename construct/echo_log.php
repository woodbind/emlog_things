<?php 
/*
 * 阅读文章页面 
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main" class="clearfix single">
			<div id="container" class="clearfix">
				<div id="breadcrumb-wrap" class="clearfix">
					<div class="breadcrumb breadcrumbs"><div class="breadcrumb-trail"><a href="http://demo2.designerthemes.com/construct" title="Construct Theme" rel="home" class="trail-begin">Home</a> <span class="sep"> </span> <a href="http://demo2.designerthemes.com/construct/category/blog/" title="Blog">Blog</a> <span class="sep"> </span> <a href="http://demo2.designerthemes.com/construct/category/blog/life/" title="Life">Life</a> <span class="sep"> </span> <span class="trail-end">Passing Time</span></div></div>			    </div>
		    	
	<!--BEGIN #content -->
    <div id="content">
		<!--BEGIN .hentry -->
		<div class="post-780 post type-post status-publish format-image hentry category-life category-photography tag-ramble tag-time" id="post-780">

			<!--BEGIN .post-meta .post-header-->
			<div class="post-meta post-header">

				<h1 class="post-title"><?php topflg($top); ?><?php echo $log_title; ?></h1>

				<span class="meta-published">发布于 <strong><?php echo gmdate('Y-n-j G:i', $date); ?></strong></span>
				<span class="meta-author">作者 <?php blog_author($author); ?></span>
				<span class="meta-author"><?php editflg($logid,$author); ?></span>
			<!--END .post-meta post-header -->
			</div>

			<!--BEGIN .featured-image -->
			<div class="featured-image image">

				
							
		<span class="overlay-icon overlay-image"><a data-gallery="group-780" class="colorbox-image" href="http://demo2.designerthemes.com/construct/files/2011/04/4457551926_738ba04c7d_o-e13045756016331.jpg"></a></span>
	
					<img src="http://demo2.designerthemes.com/construct/files/2011/04/4457551926_738ba04c7d_o-e13045756016331-620x380.jpg" width="620" height="380" alt="" />
				
			<!--END .featured-image -->
			</div>

			<!--BEGIN .post-content -->
			<div class="post-content">
				<?php echo $log_content; ?>
							<!--END .post-content -->
			</div>

			<!--BEGIN .post-meta .post-footer-->
			<div class="post-meta post-footer">

				<span class="meta-categories">分类 <?php blog_sort($logid); ?></span>
                <span class="meta-tags">&middot;&nbsp;标签: <?php blog_tag($logid); ?></span>

			<!--END .post-meta .post-footer-->
			</div>

		<!--END .hentry-->
		</div>

		<div id="comments">
	<h3 class="comments-title"><?php echo $comnum; ?> 条评论</h3>
	<?php blog_comments($comments); ?>
				
		<div class="navigation">
			<div class="alignleft"></div>
			<div class="alignright"></div>
		</div>

		<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>

	</div>


		
	</div><!-- #content -->
<?php include View::getView('side'); ?>
			<!--END #content -->
			</div>
	<!--END #main -->
		</div>



<!--END #wrapper -->
</div>
<?php include View::getView('footer'); ?>