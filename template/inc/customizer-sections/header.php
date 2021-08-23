<?php


	/**
	 * Header options.
	 */
	$wp_customize->add_section( 'header_options', array(
		'title'    => esc_html__( 'Header', 'mediaconsult' ),
		'priority' => 125,
	) );
	
	
	
	// Header Top Right Content
	$wp_customize->add_setting( 'header_topright_content', array(
		'default'           => 'true_search',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_header_topright_content',
	) );
	
	$wp_customize->add_control( 'header_topright_content', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'What do you want to display in the top right of your header ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true_email_phone'  		=> esc_html__( 'Email, phone and social media profiles', 'mediaconsult' ),
			'true_search'   			=> esc_html__( 'Introductory message and search form', 'mediaconsult' ),
			'false'   					=> esc_html__( 'Nothing', 'mediaconsult' )
		),
		'section'  			=> 'header_options',
	) );

    $wp_customize->selective_refresh->add_partial( 'header_topright_content', array(
        'selector'            => '.header-topright-wrapper',
        'container_inclusive' => true,
        'render_callback'     => 'mediaconsult_header_topright_content_output',
        'fallback_refresh'    => false,
    ) );


	
	
	// Header Top Section Phone Number
	$wp_customize->add_setting( 'header_topright_content_phone', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'header_topright_content_phone', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Header Top Bar Phone Number', 'mediaconsult' ),
		'section'  			=> 'header_options',
	) );
	
	
	
	// Header Top Bar Email
	$wp_customize->add_setting( 'header_topright_content_email', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'header_topright_content_email', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Header Top Bar Email', 'mediaconsult' ),
		'section'  			=> 'header_options',
	) );
	
	
	
	// Header Top Right Social Media Icons
	$wp_customize->add_setting( 'header_topright_sm', array(
		'default'           => 'false',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'header_topright_sm', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Display Social Media Icons In The Header ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'True', 'mediaconsult' ),
			'false'   			=> esc_html__( 'False', 'mediaconsult' ),
		),
		'section'  			=> 'header_options',
	) );
	
    $wp_customize->selective_refresh->add_partial( 'header_topright_sm', array(
        'selector'            => '.header-topright-wrapper',
        'container_inclusive' => true,
        'render_callback'     => 'mediaconsult_header_topright_content_output',
        'fallback_refresh'    => false,
    ) );
	
	
	
	// Header Top Presentation Text
	$wp_customize->add_setting( 'header_top_presentation', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'header_top_presentation', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Header Top Right Presentation Text', 'mediaconsult' ),
		'section'  			=> 'header_options',
	) );



	// WPML Language Switcher
	$wp_customize->add_setting( 'header_top_search', array(
		'default'           => 'false',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'header_top_search', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Enable Header Top Right Search Form ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'True', 'mediaconsult' ),
			'false'   			=> esc_html__( 'False', 'mediaconsult' ),
		),
		'section'  			=> 'header_options',
	) );



	
	// WPML Language Switcher
	$wp_customize->add_setting( 'wpml_lang_switcher', array(
		'default'           => 'false',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'wpml_lang_switcher', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Enable Language Switcher above Logo / Menu section ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'True', 'mediaconsult' ),
			'false'   			=> esc_html__( 'False', 'mediaconsult' ),
		),
		'section'  			=> 'header_options',
	) );
	
	
	
	
	// Header Menu Type
	$wp_customize->add_setting( 'header_menu_type', array(
		'default'           => 'classic',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_menu_type',
	) );
	
	$wp_customize->add_control( 'header_menu_type', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Choose The Menu Type', 'mediaconsult' ),
		'choices'  			=> array(
			'classic'   		=> esc_html__( 'Classic', 'mediaconsult' ),
			'modern'  			=> esc_html__( 'Modern', 'mediaconsult' ),
			'modern2'   		=> esc_html__( 'Modern Alternate', 'mediaconsult' ),
		),
		'section'  			=> 'header_options',
	) );
	
    $wp_customize->selective_refresh->add_partial( 'header_menu_type', array(
        'selector'            => '.header-menu-type-wrapper',
        'container_inclusive' => true,
        'render_callback'     => 'mediaconsult_header_menu_type_output',
        'fallback_refresh'    => false,
    ) );	
	
	
	
	
	// Header Menu Alignment
	$wp_customize->add_setting( 'header_menu_alignment', array(
		'default'           => 'right',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_menu_alignment',
	) );
	
	$wp_customize->add_control( 'header_menu_alignment', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Choose The Menu Contents Alignment', 'mediaconsult' ),
		'choices'  			=> array(
			'left'   		=> esc_html__( 'Left', 'mediaconsult' ),
			'right'  			=> esc_html__( 'Right', 'mediaconsult' ),
		),
		'section'  			=> 'header_options',
	) );
	
    $wp_customize->selective_refresh->add_partial( 'header_menu_alignment', array(
        'selector'            => '.header-menu-type-wrapper',
        'container_inclusive' => true,
        'render_callback'     => 'mediaconsult_header_menu_type_output',
        'fallback_refresh'    => false,
    ) );	




	// Header Mobile Menu Text
	$wp_customize->add_setting( 'mediaconsult_mobile_menu_text', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );
	
	$wp_customize->add_control( 'mediaconsult_mobile_menu_text', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Header Mobile Menu Text. If left empty, no text will be displayed.', 'mediaconsult' ),
		'section'  			=> 'header_options',
	) );
	
    $wp_customize->selective_refresh->add_partial( 'mediaconsult_mobile_menu_text', array(
        'selector'            => '.header-menu-type-wrapper',
        'container_inclusive' => true,
        'render_callback'     => 'mediaconsult_header_menu_type_output',
        'fallback_refresh'    => false,
    ) );
?>