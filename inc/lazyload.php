<?php
/**
 * 图片延迟加载
 */
add_filter ('the_content', 'lazyload');
function lazyload($content) {
	global $post;
	$loadimg_url=get_bloginfo('template_directory').'/assets/img/lazy_loading.gif';
	if(!is_page()) {
		$content=preg_replace('/<img(.+)src=[\'"]([^\'"]+)[\'"](.*)>/i',"<img\$1data-original=\"\$2\" src=\"$loadimg_url\"\$3>",$content);
	}
	return $content;
}
 ?>
