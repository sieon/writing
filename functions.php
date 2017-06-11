<?php
/**
 * @package lean
 */

define("THEME_URI", get_template_directory_uri() );
define("THEME_DIR", get_template_directory() );


require 'inc/setup.php';
require 'inc/enqueue.php';// 加载 js 和 css

/**
 *   边栏与小工具
 */
require 'inc/widget.php'; // 注册小工具
//load_template( THEME_DIR . '/inc/widgets/posts-plus.php' );//高级文章列表
//load_template( get_template_directory() . '/inc/widgets/posts-sidebar.php' );
//load_template( get_template_directory() . '/inc/widgets/most-comments-posts.php' );//热评文章
//load_template( get_template_directory() . '/inc/widgets/tabs.php' ); // posts、comments、标签云的tab面板
//load_template( get_template_directory() . '/inc/widgets/recent-comments.php' );
load_template( get_template_directory() . '/inc/widgets/tagcloud.php' );

/**
 *   支持 Bootstrap
 */
require 'inc/bootstrap-wp-navwalker.php'; //支持bs4 navbar
require 'inc/bootstrap.php'; //给日历添加样式

/**
 *   功能与其他
 */
require get_template_directory() . '/inc/nav-header.php'; // 不知道其作用
require get_template_directory() . '/inc/extras.php'; //Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/custom-comments.php'; //评论
//require get_template_directory() . '/inc/lazyload.php'; //图片懒加载

/**
 *   模板标签
 */
require get_template_directory() . '/inc/template-tags.php'; //模板常用标签
require get_template_directory() . '/inc/pagination.php';// 支持 Bs4 翻页
require get_template_directory() . '/inc/post-views.php';// 文章阅读量
require get_template_directory() . '/inc/related-posts.php';// 相关文章
require get_template_directory() . '/inc/get-avatar.php'; //头像

/**
 *   内容类型与分类
 */
//require get_template_directory() . '/inc/post-type-slides.php';// 注册内容类型 以支持 CAROUSEL AND 首页栏目
//require get_template_directory() . '/inc/post-type-product.php';// 相关文章
//require get_template_directory() . '/inc/taxonomy.php';// 相关文章
