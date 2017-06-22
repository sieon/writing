<?php
/**
 * @package lean
 */

function customizer_library_lean_options() {

	// Theme defaults
	$primary_color = '#5bc08c';
	$secondary_color = '#666';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Logo
	$section = 'logo';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Image Example', 'lean' ),
		'priority' => '30',
		'description' => __( 'Example section description.', 'lean' )
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'lean' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);

	// File Upload
	$section = 'upload';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'File Upload Example', 'lean' ),
		'priority' => '30',
		'description' => __( 'Example section description.', 'lean' )
	);

	$options['upload'] = array(
		'id' => 'upload',
		'label'   => __( 'upload', 'lean' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
	);

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Colors', 'lean' ),
		'priority' => '80'
	);

	$options['primary-color'] = array(
		'id' => 'primary-color',
		'label'   => __( 'Primary Color', 'lean' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => __( 'Secondary Color', 'lean' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);

	$options['border'] = array(
		'id' => 'border',
		'label'   => __( 'Border Color', 'lean' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	// More Examples
	$section = 'examples';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'More Examples', 'lean' ),
		'priority' => '90'
	);

	$options['example-text'] = array(
		'id' => 'example-text',
		'label'   => __( 'Example Text Input', 'lean' ),
		'section' => $section,
		'type'    => 'text',
	);

	$options['example-url'] = array(
		'id' => 'example-url',
		'label'   => __( 'Example URL Input', 'lean' ),
		'section' => $section,
		'type'    => 'url',
	);

	$options['example-checkbox'] = array(
		'id' => 'example-checkbox',
		'label'   => __( 'Example Checkbox', 'lean' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	$choices = array(
		'choice-1' => 'Choice One',
		'choice-2' => 'Choice Two',
		'choice-3' => 'Choice Three'
	);

	$options['example-select'] = array(
		'id' => 'example-select',
		'label'   => __( 'Example Select', 'lean' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'choice-1'
	);

	$options['example-radio'] = array(
		'id' => 'example-radio',
		'label'   => __( 'Example Radio', 'lean' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $choices,
		'default' => 'choice-1'
	);

	$options['example-textarea'] = array(
		'id' => 'example-textarea',
		'label'   => __( 'Example Textarea', 'lean' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => __( 'Example textarea text.', 'lean'),
	);

	$options['example-range'] = array(
		'id' => 'example-range',
		'label'   => __( 'Example Range Input', 'lean' ),
		'section' => $section,
		'type'    => 'range',
		'input_attrs' => array(
	        'min'   => 0,
	        'max'   => 10,
	        'step'  => 1,
	        'style' => 'color: #0a0',
		)
	);

	// Panel Example
	$panel = 'panel';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Panel Examples', 'lean' ),
		'priority' => '100'
	);

	$section = 'panel-section';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Panel Section', 'lean' ),
		'priority' => '10',
		'panel' => $panel
	);

	$options['example-panel-text'] = array(
		'id' => 'example-panel-text',
		'label'   => __( 'Example Text Input', 'lean' ),
		'section' => $section,
		'type'    => 'text',
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
