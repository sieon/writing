<?php
/**
 * @package lean
 */

function customizer_library_lean_options() {

	// Theme defaults
	$navbar_bg_color = '#007bff';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Nav
	$section = 'Navbar Color';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Navbar Color', 'lean' ),
		'priority' => '32',
		'description' => __( '', 'lean' )
	);

	$navbar_styles_choices = array(
		'navbar-light'=> 'Navbar Light',
		'navbar-dark' => 'Navbar Dark',
	);

	$options['navbar-styles'] = array(
		'id' => 'navbar-styles',
		'label'   => __( 'Navbar Styles', 'lean' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $navbar_styles_choices,
		'default' => 'navbar-light'
	);

	$navbar_bg_color_choices = array(
		'bg-primary'=> 'Primary',
		'bg-secondary' => 'Secondary',
		'bg-success' => 'Success',
		'bg-danger' => 'Danger',
		'bg-warning' => 'Warning',
		'bg-info' => 'Info',
		'bg-light' => 'Light',
		'bg-dark' => 'Dark',
		'bg-white' => 'White',
	);

	//
	$options['navbar-bg-color'] = array(
		'id' => 'navbar-bg-color',
		'label'   => __( 'Navbar Background Color', 'lean' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $navbar_bg_color_choices,
		'default' => 'bg-primary'
	);

	// More Examples
	$section = '文章';

	$sections[] = array(
		'id' => $section,
		'title' => __( '文章', 'lean' ),
		'priority' => '90'
	);

	$two_radio_choices = array(
		'yes'=> '是',
		'no' => '否'
	);

	$options['posts_list_excerpt'] = array(
		'id' => 'posts_list_excerpt',
		'label'   => __( '列表是否摘要', 'lean' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $two_radio_choices,
		'default' => 'yes'
	);

	$options['excerpt_length'] = array(
		'id' => 'excerpt_length',
		'label'   => __( '自动摘要字数限制', 'lean' ),
		'section' => $section,
		'type'    => 'text',
	);

	$options['placeholder'] = array(
		'id' => 'placeholder',
		'label'   => __( '文章默认特色图像', 'lean' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);

	$options['related_posts'] = array(
		'id' => 'related_posts',
		'label'   => __( '是否显示相关文章', 'lean' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $two_radio_choices,
		'default' => 'yes'
	);

	$post_tags_radio_choices = array(
		'top'=> '文章顶部',
		'bottom' => '文章底部'
	);

	$options['post-nav'] = array(
		'id' => 'post-nav',
		'label'   => __( '是否显示上一篇／下一篇', 'lean' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $two_radio_choices,
		'default' => 'yes'
	);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_lean_options' );
