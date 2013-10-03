<?php 
/*
Version:0.1
Author:woodbind
Author Url:http://woodbind.vicp.net
页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<!--BEGIN #bottom -->
<div id="bottom">

	<!--BEGIN #footer -->
	<div id="footer">
		
		<!-- #footer-inner.clearfix -->
		<div id="footer-inner" class="clearfix">
		
			<!--BEGIN #footer-menu -->
			<div id="footer-menu" class="clearfix">
				<div class="menu-footer-menu-container">
					<ul id="menu-footer-menu" class="menu">
<li id="menu-item-1333" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1333"><a href="http://demo2.designerthemes.com/construct/showcase/">Showcase</a></li>
<li id="menu-item-1328" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1328"><a href="http://demo2.designerthemes.com/construct/content-styling/">Styling</a></li>
<li id="menu-item-1329" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1329"><a href="http://demo2.designerthemes.com/construct/features/archives/">Archives</a></li>
<li id="menu-item-1330" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1330"><a href="http://demo2.designerthemes.com/construct/features/contact-us/">Contact</a></li>
<li id="menu-item-1332" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1332"><a href="http://demo2.designerthemes.com/construct/features/sitemap/">Sitemap</a></li>
<li id="menu-item-1336" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1336"><a href="http://demo2.designerthemes.com/construct/features/post-editor-extras/">Extras</a></li>
<li id="menu-item-1384" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1384"><a href="http://designerthemes.com/credits/">Photo Credits</a></li>
</ul></div>			<!--END #footer-menu -->
			</div>
			
			<!--BEGIN #footer-widgets -->
			<div id="footer-widgets" class="clearfix">
		
						    	<div id="footer-1" class="widget-area footer-widget">
		    		<div id="nav_menu-2" class="widget widget_nav_menu widget-widget_nav_menu">
		    			<div class="widget-inside cf">
		    				<h3 class="widget-title">链接</h3><div class="menu-footer-menu-container">
<ul id="menu-footer-menu-1" class="menu">
<?php bottom_link() ?>
</ul></div></div></div>		    	</div><!-- #footer-1 .widget-area .footer-widget -->
		    			
						    	<div id="footer-2" class="widget-area footer-widget">
		    		<div id="tag_cloud-2" class="widget widget_tag_cloud widget-widget_tag_cloud"><div class="widget-inside cf">
		    			<h3 class="widget-title">标签云</h3>
		    			<div class="tagcloud">
<?php bottom_tag() ?>
</div></div></div>		    	</div><!-- #footer-2 .widget-area .footer-widget -->
		    			
						    	<div id="footer-3" class="widget-area footer-widget">
		    		<div id="dt_search-4" class="widget DT_Search widget-DT_Search">
		    			<div class="widget-inside cf"><h3 class="widget-title">搜索</h3>
		    				<form method="get" class="search-form" id="searchform-" action="<?php echo BLOG_URL; ?>index.php">
		    					<div><input class="field" type="text" name="s" id="s-" value="输入内容 + 回车" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
		    						 <input class="submit" name="searchsubmit" type="submit" value="Submit" />
		    						 </div></form>
		    						 <!-- end #searchform-" -->
		    						 </div></div>	
		    					</div><!-- #footer-3 .widget-area .footer-widget -->
		    			
		    </div>
		    <!--BEGIN #footer-widgets -->
	
			<!--BEGIN #credits -->
			<div id="credits">
				<p><?php if($footer_info!="") : ?><?php echo $footer_info; ?><?php else : ?>&copy; 2012-2013 <a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a> All Rights Reserved<?php endif; ?><?php echo $icp; ?></a>
					Powered by <a href="http://www.emlog.net" title="emlog <?php echo Option::EMLOG_VERSION;?>">emlog</a> </p>
			<!--END #credits -->
			</div>
		
		</div>
		<!-- /#footer-inner.clearfix -->

	<!--END #footer -->
	</div>

<!--END #bottom -->
</div>

<script> // for contact form
	var ajaxurl='http://demo2.designerthemes.com/construct/wp-admin/admin-ajax.php';
</script>

<script>
(function($){
$.fn.mobileMenu = function(options) {
	
	var defaults = {
			defaultText: 'Navigate to...',
			className: 'select-menu',
			subMenuClass: 'sub-menu',
			subMenuDash: '–'
		},
		settings = $.extend( defaults, options ),
		el = $(this);
	
	this.each(function(){
		// ad class to submenu list
		el.find('ul').addClass(settings.subMenuClass);

		// Create base menu
		$('<select />',{
			'class' : settings.className
		}).insertAfter( el );

		// Create default option
		$('<option />', {
			"value"		: '#',
			"text"		: settings.defaultText
		}).appendTo( '.' + settings.className );

		// Create select option from menu
		el.find('a').each(function(){
			var $this = $(this),
				optText	= ' ' + $this.text(),
				optSub = $this.parents( '.' + settings.subMenuClass ),
				len = optSub.length,
				dash;
			
			// if menu has sub menu
			if( $this.parents('ul').hasClass( settings.subMenuClass ) ) {
				dash = Array( len+1 ).join( settings.subMenuDash );
				optText = dash + optText;
			}

			// Now build menu and append it
			$('<option />', {
				"value"	: this.href,
				"html"	: optText,
				"selected" : (this.href == window.location.href)
			}).appendTo( '.' + settings.className );

		}); // End el.find('a').each

		// Change event on select element
		$('.' + settings.className).change(function(){
			var locations = $(this).val();
			if( locations !== '#' ) {
				window.location.href = $(this).val();
			};
		});

	}); // End this.each

	return this;

};
})(jQuery);

jQuery(document).ready(function($) {
	var width = $(window).width();
	if(width < 680) {
		$('#primary-menu .menu').mobileMenu();
		$('#primary-menu .menu').hide();
		$('#primary-menu').css({'float':'none','left':'auto'});
	}
});

</script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery.custom.js?ver=1.0'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery.form.min.js?ver=3.40.0-2013.08.13'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"<?php echo TEMPLATE_URL; ?>images\/ajax-loader.gif","sending":"Sending ..."};
/* ]]> */
</script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/contact-scripts.js?ver=3.5.2'></script>

</body>

</html>