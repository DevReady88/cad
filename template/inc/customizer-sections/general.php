<?php


	/**
	 * Theme options.
	 */
	$wp_customize->add_section( 'theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'mediaconsult' ),
		'priority' => 128,
	) );

	

	// mobile logo
	$wp_customize->add_setting( 'mobile_logo', array(
		'default'           => '',
		'sanitize_callback' => 'mediaconsult_image_sanitize',
	) );
	
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'mobile_logo', array(
		   'label'      => esc_html__( 'Mobile Logo( 72px x 72px recommended )', 'mediaconsult' ),
		   'section'    => 'theme_options',
	   )
    ) );
	
	
	
	
	// Sidebar Position
	$wp_customize->add_setting( 'sidebar_position', array(
		'default'           => 'right',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sidebar_position_sanitize',
	) );
	
	$wp_customize->add_control( 'sidebar_position', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Sidebar Position', 'mediaconsult' ),
		'choices'  			=> array(
			'left'  			=> esc_html__( 'Left', 'mediaconsult' ),
			'right'   			=> esc_html__( 'Right', 'mediaconsult' ),
		),
		'section'  			=> 'theme_options',
	) );
	
	


	// Sidebar Appearance
	$wp_customize->add_setting( 'sidebar_appearance', array(
		'default'           => 'classic',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sidebar_appearance_sanitize',
	) );
	
	$wp_customize->add_control( 'sidebar_appearance', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Sidebar Appearance', 'mediaconsult' ),
		'choices'  			=> array(
			'classic'  			=> esc_html__( 'Classic', 'mediaconsult' ),
			'minimal'   		=> esc_html__( 'Minimal', 'mediaconsult' ),
		),
		'section'  			=> 'theme_options',
	) );



	
	// Google Maps API Key
	$wp_customize->add_setting( 'gmaps_api_key', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'gmaps_api_key', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Google Maps API Key', 'mediaconsult' ),
		'section'  			=> 'theme_options',
	) );
	
	
	
	
	// Search Results Pagination Type
	$wp_customize->add_setting( 'search_pagination_type', array(
		'default'           => 'classic',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_pagination_type_sanitize',
	) );
	
	$wp_customize->add_control( 'search_pagination_type', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Search Results Page Pagination Type', 'mediaconsult' ),
		'choices'  			=> array(
			'classic'  			=> esc_html__( 'Classic', 'mediaconsult' ),
			'numbered' 	  		=> esc_html__( 'Numbered', 'mediaconsult' ),
		),
		'section'  			=> 'theme_options',
	) );



	// Page Not Found Image
	$wp_customize->add_setting( 'pnf_image', array(
		'default'           => '',
		'sanitize_callback' => 'mediaconsult_image_sanitize',
	) );
	
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'pnf_image', array(
		   'label'      => esc_html__( 'Page Not Found Image', 'mediaconsult' ),
		   'section'    => 'theme_options',
	   )
    ) );



	// Theme Loader
	$wp_customize->add_setting( 'theme_loader', array(
		'default'           => 'off',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_theme_loader_sanitize',
	) );
	
	$wp_customize->add_control( 'theme_loader', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Theme Page Loader', 'mediaconsult' ),
		'choices'  			=> array(
			'on'  				=> esc_html__( 'On', 'mediaconsult' ),
			'off'   			=> esc_html__( 'Off', 'mediaconsult' ),
		),
		'section'  			=> 'theme_options',
	) );
	


	// Enable / Disable Query Strings
	$wp_customize->add_setting( 'mediaconsult_remove_query_string', array(
		'default'           => 'false',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'mediaconsult_remove_query_string', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Remove Query Strings ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'True', 'mediaconsult' ),
			'false'   			=> esc_html__( 'False', 'mediaconsult' ),
		),
		'section'  			=> 'theme_options',
	) );
?>