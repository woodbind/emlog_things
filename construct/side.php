<?php 
/*
 * 侧边栏
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="sidebar">
 
        <div id="global-sidebar" class="widget-area">
    	<div id="dt_search-3" class="widget DT_Search widget-DT_Search">
    		<div class="widget-inside cf"><h3 class="widget-title">搜索</h3>
    			<form method="get" class="search-form" id="searchform-" action="<?php echo BLOG_URL; ?>index.php">
    			<div><input class="field" type="text" name="s" id="s-" value="输入要搜索的内容..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" /> <input class="submit" name="searchsubmit" type="submit" value="Submit" />
    		</div></form>
    		<!-- end #searchform-" --></div></div>
    		

<?php 
$widgets = !empty($options_cache['widgets1']) ? unserialize($options_cache['widgets1']) : array();
doAction('diff_side');
foreach ($widgets as $val)
{?>
	    		<div id="categories-2" class="widget widget_categories widget-widget_categories">
    			<div class="widget-inside cf">
<?php 
	$widget_title = @unserialize($options_cache['widget_title']);
	$custom_widget = @unserialize($options_cache['custom_widget']);
	if(strpos($val, 'custom_wg_') === 0)
	{
		$callback = 'widget_custom_text';
		if(function_exists($callback))
		{
			call_user_func($callback, htmlspecialchars($custom_widget[$val]['title']), $custom_widget[$val]['content']);
		}
	}else{
		$callback = 'widget_'.$val;
		if(function_exists($callback))
		{
			preg_match("/^.*\s\((.*)\)/", $widget_title[$val], $matchs);
			$wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title[$val];
			call_user_func($callback, htmlspecialchars($wgTitle));
		}
	}
?>	</div></div>
<?php }
?>

    		
    		
   </div><!-- #global-sidebar .widget-area -->
        
        <div id="blog-sidebar" class="widget-area">
    	    </div><!-- #blog-sidebar .widget-area -->
        
    
</div><!-- #sidebar -->
