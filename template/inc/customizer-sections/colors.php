<?php



	/* ====== STARTING SKINS ====== */
	$wp_customize->add_setting( 'colorscheme', array(
		'default'           => 'light_orange',
		'sanitize_callback' => 'mediaconsult_sanitize_colorscheme',
	) );
	
	$wp_customize->add_control( 'colorscheme', array(
		'type'    => 'radio',
		'label'    => esc_html__( 'Color Scheme', 'mediaconsult' ),
		'choices'  => array(
			'light_orange'  => esc_html__( 'Light Orange', 'mediaconsult' ),
			'dark_blue'   => esc_html__( 'Dark Blue', 'mediaconsult' ),
		),
		'section'  => 'colors',
	) );


    $wp_customize->selective_refresh->add_partial( 'colorscheme', array(
        'container_inclusive' => false,
        'render_callback'     => 'mediaconsult_css_skin_refresh',
        'fallback_refresh'    => false,
    ) );




	/* ====== PRIMARY SKIN COLOR ====== */

	// Enable or disable the link color setting
	$wp_customize->add_setting( 'primary_skin_option', array(
		'default'           => 'disabled',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_enabled_disabled',
	) );
	
	// Add link color setting and control.
	$wp_customize->add_setting( 'primary_skin', array(
		'default'           => '#f87b27',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	
	$wp_customize->add_control( 'primary_skin_option', array(
		'type'    => 'radio',
		'label'    => esc_html__( 'Primary Skin Color Option', 'mediaconsult' ),
		'choices'  => array(
			'disabled'  => esc_html__( 'Disabled', 'mediaconsult' ),
			'enabled'   => esc_html__( 'Enabled', 'mediaconsult' ),
		),
		'section'  => 'colors',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_skin', array(
		'label'       => esc_html__( 'Primary Skin Color', 'mediaconsult' ),
		'section'     => 'colors',
	) ) );




	/* ====== BODY BACKGROUND ====== */

	// Enable or disable the body background color setting
	$wp_customize->add_setting( 'body_background_option', array(
		'default'           => 'disabled',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_enabled_disabled',
	) );	
	
	// Add body background color setting and control.
	$wp_customize->add_setting( 'body_background', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	
	$wp_customize->add_control( 'body_background_option', array(
		'type'    => 'radio',
		'label'    => esc_html__( 'Body Background Color Option', 'mediaconsult' ),
		'choices'  => array(
			'disabled'  => esc_html__( 'Disabled', 'mediaconsult' ),
			'enabled'   => esc_html__( 'Enabled', 'mediaconsult' ),
		),
		'section'  => 'colors',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background', array(
		'label'       => esc_html__( 'Body Background Color', 'mediaconsult' ),
		'section'     => 'colors',
	) ) );




	/* ====== TEXT COLOR ====== */

	// Enable or disable the body background color setting
	$wp_customize->add_setting( 'primary_text_option', array(
		'default'           => 'disabled',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_enabled_disabled',
	) );	
	
	// Add body background color setting and control.
	$wp_customize->add_setting( 'primary_text', array(
		'default'           => '#65696e',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	
	$wp_customize->add_control( 'primary_text_option', array(
		'type'    => 'radio',
		'label'    => esc_html__( 'Body Text Color', 'mediaconsult' ),
		'choices'  => array(
			'disabled'  => esc_html__( 'Disabled', 'mediaconsult' ),
			'enabled'   => esc_html__( 'Enabled', 'mediaconsult' ),
		),
		'section'  => 'colors',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_text', array(
		'label'       => esc_html__( 'Body Text Color', 'mediaconsult' ),
		'section'     => 'colors',
	) ) );





?>