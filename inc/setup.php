<?php

/**
 * 内容宽度
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'lean_setup' ) ) :
/**
 *
 */
function lean_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on start, use a find and replace
	 * to change 'start' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'lean', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	the_post_thumbnail('thumbnail');       // Thumbnail (default 150px x 150px max)
	the_post_thumbnail('medium');          // Medium resolution (default 300px x 300px max)
	the_post_thumbnail('large');           // Large resolution (default 640px x 640px max)
	the_post_thumbnail('full');            // Original image resolution (unmodified)


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( '主导航', 'lean' ),
		'footer-nav' => esc_html__( '底部菜单', 'lean' ),
		'links' => esc_html__( '友情链接', 'lean' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );


  add_theme_support( 'post-formats', array(
		'image', 'aside', 'status', 'link', 'quote', 'gallery'
  ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lean_custom_background_args', array(
		'default-color' => '#f5f5f5',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo', array(
    //'height'      => 30,
    //'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    //'header-text' => array( 'site-title', 'site-description' ),
	) );
}
endif; // lean_setup
add_action( 'after_setup_theme', 'lean_setup' );

/**
 * WordPress 首页排除某些文章形式（Post Formats）
 */
function exclude_post_formats_from_homepage( $query ) {
	if( $query->is_main_query() && $query->is_home() ) { //判断首页主查询
		$tax_query = array(array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array(
				//请根据需要保留要排除的文章形式
				'post-format-aside',
				//'post-format-audio',
				//'post-format-chat',
				//'post-format-gallery',
				//'post-format-image',
				'post-format-link',
				//'post-format-quote',
				'post-format-status',
				//'post-format-video'
				),
				'operator' => 'NOT IN',
			)
		);
		$query->set( 'tax_query', $tax_query );
	}
}
add_action( 'pre_get_posts', 'exclude_post_formats_from_homepage' );
