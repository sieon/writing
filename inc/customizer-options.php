<?php
/**
 * @package lean
 */

function customizer_library_lean_options() {

	// Theme defaults
	$primary_color = '#007bff';
	$secondary_color = '#868e96';
  $success_color = '#28a745';
  $info_color = '#17a2b8';
  $warning_color = '#ffc107';
  $danger_color = '#dc3545';
  $light_color = '#f8f9fa';
  $dark_color = '#343a40';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Logo
	$section = '全局';

	$sections[] = array(
		'id' => $section,
		'title' => __( '全局', 'lean' ),
		'priority' => '30',
		'description' => __( '', 'lean' )
	);

	// $options['logo'] = array(
	// 	'id' => 'logo',
	// 	'label'   => __( 'Logo', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'image',
	// 	'default' => ''
	// );

	$style_clolors_choices = array(
		'navbar-light'=> '浅色导航',
		'navbar-dark' => '暗色导航',
	);

	$options['style-colors'] = array(
		'id' => 'style-colors',
		'label'   => __( '导航颜色', 'lean' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $style_clolors_choices,
		'default' => 'navbar-light'
	);

	// $options['author_bg'] = array(
	// 	'id' => 'author_bg',
	// 	'label'   => __( '作者头部图片', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'image',
	// 	'default' => ''
	// );
	//
	// // File Upload
	// $section = 'upload';
	//
	// $sections[] = array(
	// 	'id' => $section,
	// 	'title' => __( 'File Upload Example', 'lean' ),
	// 	'priority' => '30',
	// 	'description' => __( 'Example section description.', 'lean' )
	// );
	//
	// $options['upload'] = array(
	// 	'id' => 'upload',
	// 	'label'   => __( 'upload', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'upload',
	// 	'default' => '',
	// );

	// Colors
	// $section = 'colors';
	//
	// $sections[] = array(
	// 	'id' => $section,
	// 	'title' => __( 'Colors', 'lean' ),
	// 	'priority' => '80'
	// );
	//
	$options['primary-color'] = array(
		'id' => 'primary-color',
		'label'   => __( 'Primary Color', 'lean' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);
	//
	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => __( 'Secondary Color', 'lean' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);
	//
	$options['border'] = array(
		'id' => 'border',
		'label'   => __( 'Border Color', 'lean' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	// More Examples
	// $section = '主题配色';
	//
	// $sections[] = array(
	// 	'id' => $section,
	// 	'title' => __( '主题配色', 'lean' ),
	// 	'priority' => '90'
	// );

	// $options['example-text'] = array(
	// 	'id' => 'example-text',
	// 	'label'   => __( 'Example Text Input', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'text',
	// );
	//
	// $options['example-url'] = array(
	// 	'id' => 'example-url',
	// 	'label'   => __( 'Example URL Input', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'url',
	// );
	//
	// $options['example-checkbox'] = array(
	// 	'id' => 'example-checkbox',
	// 	'label'   => __( 'Example Checkbox', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'checkbox',
	// 	'default' => 0,
	// );
	//


	// $navbar_bg_choices = array(
	// 	'bg-white'=> '白',
	// 	'bg-faded' => '浅灰',
	// 	'bg-primary' => '蓝',
	// 	'bg-info' => '浅蓝',
	// 	'bg-success' => '绿',
	// 	'bg-warning' => '橙',
	// 	'bg-danger' => '红',
	// 	'bg-inverse' => '黑'
	// );
	//
	// $options['navbar-bg'] = array(
	// 	'id' => 'navbar-bg',
	// 	'label'   => __( '导航背景色', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'select',
	// 	'choices' => $navbar_bg_choices,
	// 	'default' => 'bg-white'
	// );
	//
	// $navbar_inverse_choices = array(
	// 	'navbar-light'=> '浅色导航',
	// 	'navbar-inverse' => '反色导航（除白和浅灰外这里必选反色导航。）'
	// );
	//
	// $options['navbar-inverse'] = array(
	// 	'id' => 'navbar-inverse',
	// 	'label'   => __( '反色导航', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'radio',
	// 	'choices' => $navbar_inverse_choices,
	// 	'default' => 'navbar-light'
	// );

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

	// $options['post-author'] = array(
	// 	'id' => 'post-author',
	// 	'label'   => __( 'Meta是否显示作者', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'select',
	// 	'choices' => $two_radio_choices,
	// 	'default' => 'yes'
	// );

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

	$options['post-tags'] = array(
		'id' => 'post-tags',
		'label'   => __( '标签位置', 'lean' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $post_tags_radio_choices,
		'default' => 'bottom'
	);

	$options['post-nav'] = array(
		'id' => 'post-nav',
		'label'   => __( '是否显示上一篇／下一篇', 'lean' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $two_radio_choices,
		'default' => 'yes'
	);

	//
	// $options['example-textarea'] = array(
	// 	'id' => 'example-textarea',
	// 	'label'   => __( 'Example Textarea', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'textarea',
	// 	'default' => __( 'Example textarea text.', 'lean'),
	// );
	//
	// $options['example-range'] = array(
	// 	'id' => 'example-range',
	// 	'label'   => __( 'Example Range Input', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'range',
	// 	'input_attrs' => array(
	//         'min'   => 0,
	//         'max'   => 10,
	//         'step'  => 1,
	//         'style' => 'color: #0a0',
	// 	)
	// );

	// // Panel Example
	// $panel = 'panel';
	//
	// $panels[] = array(
	// 	'id' => $panel,
	// 	'title' => __( 'Panel Examples', 'lean' ),
	// 	'priority' => '100'
	// );
	//
	// $section = 'panel-section';
	//
	// $sections[] = array(
	// 	'id' => $section,
	// 	'title' => __( 'Panel Section', 'lean' ),
	// 	'priority' => '10',
	// 	'panel' => $panel
	// );
	//
	// $options['example-panel-text'] = array(
	// 	'id' => 'example-panel-text',
	// 	'label'   => __( 'Example Text Input', 'lean' ),
	// 	'section' => $section,
	// 	'type'    => 'text',
	// );

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_lean_options' );
