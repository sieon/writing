<?php
/**
 * @package lean
 */

define("THEME_URI", get_template_directory_uri() );
define("THEME_DIR", get_template_directory() );


require THEME_DIR . '/inc/setup.php';
require THEME_DIR . '/inc/enqueue.php';// 加载 js 和 css

/**
 *   边栏与小工具
 */
require THEME_DIR . '/inc/widget.php'; // 注册小工具
load_template( THEME_DIR . '/inc/widgets/tagcloud.php' );
load_template( THEME_DIR . '/inc/widgets/posts-plus.php' );
/**
 *   支持 Bootstrap
 */
require THEME_DIR . '/inc/bootstrap-wp-navwalker.php'; //支持bs4 navbar
require THEME_DIR . '/inc/bootstrap.php'; //给日历添加样式

/**
 *   功能与其他
 */
require THEME_DIR . '/inc/extras.php'; //Custom functions that act independently of the theme templates.
require THEME_DIR . '/inc/custom-comments.php'; //评论

/**
 *   模板标签
 */
require THEME_DIR . '/inc/template-tags.php'; //模板常用标签
require THEME_DIR . '/inc/pagination.php';// 支持 Bs4 翻页
require THEME_DIR . '/inc/related-posts.php';// 相关文章
require THEME_DIR . '/inc/get-avatar.php'; //头像

// Helper library for the theme customizer.
require THEME_DIR . '/inc/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require THEME_DIR . '/inc/customizer-options.php';
require THEME_DIR . '/inc/styles.php';
