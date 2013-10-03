<?php 
/*
 * Template Name:BYMT for Emlog
 * Version:1.0
 * 侧边栏组件、页面模块
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php
//头像中转多说 解决被墙问题
function BYMT_getGravatar($email, $s = 40, $d = 'mm', $g = 'g') {
	$hash = md5($email);
	$avatar = "http://gravatar.duoshuo.com/avatar/$hash?s=$s&d=$d&r=$g";
	return $avatar;
}?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<h3 class="widget-title"><?php echo $title; ?></h3>
	<ul id="bloggerinfo">
	<div id="bloggerinfoimg">
	<?php if (!empty($user_cache[1]['photo']['src'])): ?>
	<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
	<?php endif;?>
	</div>
	<p><b><?php echo $name; ?></b>
	<?php echo $user_cache[1]['des']; ?></p>
	</ul>

<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
	<h3 class="widget-title"><?php echo $title; ?></h3>
	<div id="calendar">
	</div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>

<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<h3 class="widget-title"><?php echo $title; ?></h3>
	<ul id="blogtags">
	<?php foreach($tag_cache as $value): ?>
		<span style="font-size:<?php echo $value['fontsize']; ?>pt; line-height:30px;">
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"><?php echo $value['tagname']; ?></a></span>
	<?php endforeach; ?>
	</ul>

<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>

	<h3 class="widget-title"><?php echo $title; ?></h3>
	<ul>
	<?php
	foreach($sort_cache as $value):
		if ($value['pid'] != 0) continue;
	?>
	<li class="cat-item">
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
	<?php if (!empty($value['children'])): ?>
		<ul>
		<?php
		$children = $value['children'];
		foreach ($children as $key):
			$value = $sort_cache[$key];
		?>
		<li class="cat-item">
			<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
		</li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	<?php endforeach; ?>
	</ul>

<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<h3 class="widget-title"><?php echo $title; ?></h3>
	<div class="textwidget"><span class="DT_Twitter Engine_Twitter"><ul class="clearfix">
	<?php foreach($newtws_cache as $value): ?>
	<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
	<li><?php echo $value['name']; ?><?php echo subString(strip_tags($value['content']),0,50); ?><?php echo $img;?></li>
	<?php endforeach; ?>
	</ul></span>
    <?php if ($istwitter == 'y') :?>
    <div class="visit-wrap">
	<a href="<?php echo BLOG_URL . 't/'; ?>" class="follow-me">查看更多微语<span class="right-arrow"></span></a>
	<?php endif;?>
	</div></div>

<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
<h3 class="widget-title"><?php echo $title; ?></h3>
	<div class="textwidget"><span class="DT_Twitter Engine_Twitter"><ul class="clearfix">
	<?php
	foreach($com_cache as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	?>
	<li><img alt="<?php echo $value['name']; ?>" class="avatar" src="<?php echo BYMT_getGravatar($value['mail'], 16); ?>" width="16" height="16" class="avatar"/> <a href="<?php echo $url; ?>"><?php echo subString(strip_tags($value['content']),0,17); ?></a></li>
	<?php endforeach; ?>
	</ul></span></div>

<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	
	<h3 class="widget-title"><?php echo $title; ?></h3>
	<ul id="newlog">
	<?php foreach($newLogs_cache as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo subString(strip_tags($value['title']),0,18); ?></a></li>
	<?php endforeach; ?>
	</ul>

<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>

	<h3 class="widget-title"><?php echo $title; ?></h3>
	<ul id="hotlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo subString(strip_tags($value['title']),0,18); ?></a></li>
	<?php endforeach; ?>
	</ul>

<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>

	<h3 class="widget-title"><?php echo $title; ?></h3>
	<ul id="randlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo subString(strip_tags($value['title']),0,18); ?></a></li>
	<?php endforeach; ?>
	</ul>

<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>

	<h3 class="widget-title"><?php echo $title; ?></h3>
	<ul id="logsearch">
	<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
	<input name="keyword" class="search" type="text" />
	</form>
	</ul>

<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<h3 class="widget-title"><?php echo $title; ?></h3>
	<ul id="record">
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
	<?php endforeach; ?>
	</ul>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>

	<h3 class="widget-title"><?php echo $title; ?></h3>
	<ul>
	<?php echo $content; ?>
	</ul>

<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
	?>

	<h3 class="widget-title"><?php echo $title; ?></h3>
	<ul id="link">
	<?php foreach($link_cache as $value): ?>
	<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
	<?php endforeach; ?>
	</ul>

<?php }?>
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<ul id="menu-main-menu" class="menu">
	<?php
	foreach($navi_cache as $value):
		if($value['url'] == 'admin' && (ROLE == 'admin' || ROLE == 'writer')):
			?>
			<li class="menu-item"><a href="<?php echo BLOG_URL; ?>admin/write_log.php">写文章</a>
			<ul class="sub-menu">
				<li class="menu-item"><a href="<?php echo BLOG_URL . 'admin/twitter.php' ?>">写微语</a></li>
			  <li class="menu-item"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
			  <li class="menu-item"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
      </ul>
      </li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current-menu-item' : 'menu-item';
		?>
		<li class="<?php echo $current_tab;?>"><a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a></li>
	<?php endforeach; ?>
	</ul>
<?php }?>
<?php
//blog：置顶
function topflg($istop){
	$topflg = $istop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/import.gif\" title=\"置顶文章\" /> " : '';
	echo $topflg;
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == 'admin' || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
	<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>" title="查看 <?php echo $log_cache_sort[$blogid]['name']; ?> 下的全部文章"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php else: ?>
	<?php echo "未分类"; ?>
	<?php endif;?>
<?php }?>
<?php
//blog：文章标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "<a href=\"".Url::tag($value['tagurl'])."\" class=\"tag-link\">".$value['tagname'].'</a> ';
		}
	}else{
		$tag = '<a class="tag-link">木有标签</a>';
	}
	echo $tag;
}
?>
<?php
//blog：文章作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<div class="post-navigation">
	<?php if($prevLog):?>
	<div class="post-previous">
	<a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a>
	</div>
	<?php endif;?>
	<?php if($nextLog):?>
	<div class="post-next">
	<a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a>
	</div>
	<?php endif;?>
	</div>
<?php }?>
<?php
//blog：引用通告
function blog_trackback($tb, $tb_url, $allow_tb){
    if($allow_tb == 'y' && Option::get('istrackback') == 'y'):?>
	<div id="trackback_address">
	<p>引用地址: <input type="text" style="width:350px" class="input" value="<?php echo $tb_url; ?>">
	<a name="tb"></a></p>
	</div>
	<?php endif; ?>
	<?php foreach($tb as $key=>$value):?>
		<ul id="trackback">
		<li><a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['title'];?></a></li>
		<li>BLOG: <?php echo $value['blog_name'];?></li><li><?php echo $value['date'];?></li>
		</ul>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments){
    extract($comments);
    if($commentStacks): ?>
	<a name="comments"></a>
		
	<?php endif; ?>
	<ol class="commentlist">
	<?php
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>

	<li class="comment" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<div id="div-comment-<?php echo $comment['cid']; ?>" class="clearfix">
		<?php if($isGravatar == 'y'): ?>
		<img src="<?php echo BYMT_getGravatar($comment['mail'],50); ?>" class="avatar avatar-46 photo" height="46" width="46"/>
		<?php endif; ?>
			<div class="comment-meta">
			 <?php echo $comment['date']; ?>
			 <a href="#comment-<?php echo $comment['cid']; ?>" onClick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a>
			</div>

			<!--BEGIN .comment-author-->
			<div class="comment-author">
							 <?php echo $comment['poster']; ?>
			</div>

			<!--BEGIN .comment-body-->
			<div class="comment-body">
			<?php echo $comment['content']; ?>
			</div>
		</div>
		<ul class="children">
		<?php blog_comments_children($comments, $comment['children']); ?>
		</ul>
	</li>	
	<?php endforeach; ?>
	</ol>
	<div class="navigation">
		<div class="pagination"><?php if(!empty($commentPageUrl)){ echo "翻页：".$commentPageUrl; } ?></div>
	</div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<li class="comment even depth-3" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php if($isGravatar == 'y'): ?>
		<img src="<?php echo BYMT_getGravatar($comment['mail'],40); ?>" class='avatar avatar-46 photo' height='46' width='46' />
		<?php endif; ?>
		<!--BEGIN .comment-meta-->
			<div class="comment-meta">
			<?php echo $comment['date']; ?><span class="reply"><a href="#comment-<?php echo $comment['cid']; ?>" onClick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></span>
			</div>
						<!--BEGIN .comment-author-->
			<div class="comment-author">
				<?php echo $comment['poster']; ?> said…			
				<!--END .comment-author-->
			</div>
			<!--BEGIN .comment-body-->
			<div class="comment-body">
			<?php echo $comment['content']; ?>
			</div>
			<?php if($comment['level'] < 4): ?><div class="comment-reply"></div><?php endif; ?>
		<?php blog_comments_children($comments, $comment['children']);?>
	</li>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
	<div id="respond">
	<div class="comment-post" id="comment-post">
		<h3>发表评论</h3><a name="respond"></a>
			<div class="comment-meta">
			<?php if(isset($_COOKIE['postermail'])) : ?>
			<img src="<?php echo BYMT_getGravatar($_COOKIE['postermail'], 40);?>" class='avatar avatar-46 photo' height='46' width='46'/>
			<?php else :?>
			<img src="<?php echo BYMT_getGravatar($comment['mail'], 40); ?>" class='avatar avatar-46 photo' height='46' width='46'/>
			<?php endif;?>
			</div>	
		<?php if ($ckname==""): ?>
		<div class="cancel-comment-reply">看看右边的头像对不对？<a href="javascript:void(0);" onClick="cancelReply()" style="display:none;">[ 取消回复 ]</a></div>
		<?php elseif ($ckname !=""): ?>
		<div class="comment-author">欢迎回来，<?php echo $ckname; ?>！
		<?php if(ROLE != 'admin' && ROLE != 'writer'): ?><a href="javascript:toggleCommentAuthorInfo();" id="toggle-author-info">[ 更换马甲 ]</a><?php endif;?>
		<span class="cancel-reply" id="cancel-reply" style="display:none;"><a href="javascript:void(0);" onClick="cancelReply()">[ 取消回复 ]</a></span></div>
        <?php if(ROLE != 'admin' && ROLE != 'writer'): ?>
		<script type="text/javascript" charset="utf-8">
				//<![CDATA[
				var changeMsg = "[ 更换马甲 ]";
				var closeMsg = "[ 隐藏马甲 ]";
				function toggleCommentAuthorInfo() {
					jQuery('#author-info').slideToggle('slow', function(){
						if ( jQuery('#author-info').css('display') == 'none' ) {
						jQuery('#toggle-author-info').text(changeMsg);
						} else {
						jQuery('#toggle-author-info').text(closeMsg);
				}
			});
		}
				jQuery(document).ready(function(){
					jQuery('#author-info').hide();
				});
				//]]>
			</script>
        <?php endif;?>
		<?php endif;?>
		<form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
			<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
			<?php if(ROLE == 'visitor'): ?>
			<div id="author-info">
			<p>
				<label for="author">昵称:</label>
				<input type="text" id="comname" name="comname" maxlength="49" class="respondtext" value="<?php echo $ckname; ?>" size="22" tabindex="1" placeholder="nickname" required />
				<label for="email">邮箱:</label>
				<input type="email" id="commail" name="commail"  maxlength="128" class="respondtext" value="<?php echo $ckmail; ?>" size="22" tabindex="2" placeholder="name@example.com" required /><span id="Get_Gravatar"></span>
				<label for="url">网址:</label>
				<input type="text" id="comurl" name="comurl" maxlength="128" class="respondtext" value="<?php echo $ckurl; ?>" size="22" tabindex="3" placeholder="www.yuxiaoxi.com" pattern="((http|https)://|)+([\w-]+\.)+[\w-]+(/[\w- ./?%&=]*)?"/>
			</p>
			</div>
			<?php endif; ?>
			<p><textarea name="comment" rows="5" tabindex="4" placeholder="说点什么吧..." required></textarea></p>
			<p id="loading" style="display:none">正在提交中，请稍候...</p>
			<p id="error" style="color:red"></p>
			<p><?php echo $verifyCode; ?> <input class="submit" type="submit" id="submit" value="提交" tabindex="6" />
			<input class="reset" name="reset" type="reset" id="reset" tabindex="6" value="清除" /></p>
			<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
		</form>
	</div>
	</div>
	<?php endif; ?>
<?php }?>
<?php
//文章分享
function BYMT_txt_share() {
	echo '<p><strong>分享文章：</strong><a class="Ashare A_qzone">QQ空间</a><a class="Ashare A_tqq">腾讯微博</a><a class="Ashare A_sina">新浪微博</a><a class="Ashare A_wangyi">网易微博</a><a class="Ashare A_renren">人人网</a><a class="Ashare A_kaixin">开心网</a><a class="Ashare A_xiaoyou">腾讯朋友</a><a class="Ashare A_baidu">百度搜藏</a></p>';
} ?>
<?php
//404页面
function wcs_error_currentPageURL()
{
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80")
	{
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	}
	else
	{
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	}
	return $pageURL;
} ?>

<?php
//nav_bar：分类
function bottom_tag(){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags'); ?>
	<?php foreach($tag_cache as $value): ?>
	<a href="<?php echo Url::tag($value['tagurl']); ?>"  class="tag-link" title="<?php echo $value['usenum']; ?>篇文章" style="font-size: 8pt;"><?php echo $value['tagname']; ?></a>
	<?php endforeach; ?>
<?php }?>


<?php
//nav_bar：分类
function bottom_link(){
	global $CACHE;
	$link_cache = $CACHE->readCache('link'); ?>
	<?php foreach($link_cache as $value): ?>
	<li class="menu-item"><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
	<?php endforeach; ?>
<?php }?>
