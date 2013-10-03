<?php
/*
Template Name:construct for Emlog
Description:wordpress移植到emlog
Version:0.1
Author:woodbind
Author Url:http://woodbind.vicp.net
ForEmlog:5.1.2
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module'); // include module.php
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="zh-CN" class="ie6 ie67"><![endif]-->
<!--[if IE 7]><html lang="zh-CN" class="ie7 ie67"><![endif]-->
<!--[if IE 8]><html lang="zh-CN" class="ie8"><![endif]-->
<!--[if gt IE 8]><!--><html lang="zh-CN"><!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset="UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="woodbind.vicp.net" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link type="text/css" href="<?php echo TEMPLATE_URL; ?>css/default.css" rel="stylesheet" />
<link type="text/css" href="<?php echo TEMPLATE_URL; ?>css/style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo TEMPLATE_URL; ?>css/custom-style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js"></script>
<link rel='stylesheet' id='layerslider_css-css'  href='<?php echo TEMPLATE_URL; ?>css/layerslider.css?ver=4.1.1' type='text/css' media='all' />
<link rel='stylesheet' id='contact-form-7-css'  href='<?php echo TEMPLATE_URL; ?>css/contact-styles.css?ver=3.5.2' type='text/css' media='all' />
<link rel='stylesheet' id='colorbox-css'  href='<?php echo TEMPLATE_URL; ?>css/colorbox.css?ver=3.6' type='text/css' media='all' />
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery.js?ver=1.10.2'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery-migrate.min.js?ver=1.2.1'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/anti-spam.js?ver=1.8'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery.easing.1.3.min.js?ver=3.6'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/superfish.js?ver=3.6'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/tabs.js?ver=3.6'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/layerslider.kreaturamedia.jquery.js?ver=4.1.1'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery-easing-1.3.js?ver=1.3.0'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquerytransit.js?ver=0.9.9'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/layerslider.transitions.js?ver=4.1.1'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery.isotope.min.js?ver=3.6'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/slides.min.jquery.js?ver=3.6'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery.colorbox.js?ver=3.6'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery.fitvids.js?ver=3.6'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery.imagesloaded.js?ver=3.6'></script>
	<style type="text/css">
		
		.DT_Twitter span a:hover,
		.commentlist .comment-meta a:hover,
		.single .post-footer a:hover,
		.widget a:hover,
		.load-more-text .load-more-plus,
		.item .post-title a:hover,
		a.read-more span.plus,
		.item a.read-more,
		.item .meta-category a:hover,
		.featured-details span.plus span,
		.featured-small .post-title span.plus span,
		a { color: #cc3333; }

		a:link { -webkit-tap-highlight-color: #cc3333; }
		::selection { background: #cc3333; }

		.groups,
		.archive-title-item,
		.overlay-video,
		.overlay-gallery,
		.overlay-image,
		.featured-details .read-more { background-color: #cc3333; }

		#comments #submit,
		.tagcloud a:hover,
		#load-more a:hover { background: #cc3333; }

	</style>

	
<!--[if lt IE 9]>
	<script src="<?php echo TEMPLATE_URL; ?>js/selectivizr.js"></script>
<![endif]-->
	
<script src="<?php echo TEMPLATE_URL; ?>js/jquery.mobileMenu.js"></script>
<?php doAction('index_head'); ?>
</head>
<body class="home blog layout-centered">
<!-- BEGIN #wrapper-->
<div id="wrapper">
	<!-- BEGIN #page-->
  <div id="page">
		<!-- BEGIN #top-bar-->
		<div id="top-bar">
		<!-- END #top-bar-->
		</div>
		<!-- BEGIN #header-->
		<div id="header">
			<!-- #header-inner -->
			<div id="header-inner" class="clearfix">
				<div id="logo">
						<h1 id="site-title"><span><a title="<?php echo $blogname; ?>" href="<?php echo BLOG_URL; ?>"><img src="<?php echo TEMPLATE_URL; ?>images/logo.png" width="280px" height="60px" alt="<?php echo $blogname; ?>" /></a></span></h1>
				<!-- END #logo -->
				</div>

				<!-- BEGIN #primary-menu -->
				<div id="primary-menu" class="clearfix">
					<div class="menu-main-menu-container"><?php blog_navi();?></div>	
				<!-- END #primary-menu -->
				</div>


			</div>
			<!-- /#header-inner -->
			
		<!-- END #header -->
		</div>
	