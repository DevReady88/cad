<?php


	
	/**
	 * Footer options.
	 */
	$wp_customize->add_section( 'footer_options', array(
		'title'    => esc_html__( 'Footer Options', 'mediaconsult' ),
		'priority' => 129,
	) );
	
	
	// Footer Sidebars
	$wp_customize->add_setting( 'footer_sidebars', array(
		'default'           => 'true',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'footer_sidebars', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Display Footer Sidebars ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'True', 'mediaconsult' ),
			'false'   			=> esc_html__( 'False', 'mediaconsult' ),
		),
		'section'  			=> 'footer_options',
	) );
	

	
	
	// Footer Columns
	$wp_customize->add_setting( 'footer_columns', array(
		'default'           => '4',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_footer_columns',
	) );
	
	$wp_customize->add_control( 'footer_columns', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Choose the number of footer sidebars columns:', 'mediaconsult' ),
		'choices'  			=> array(
			'1'  			=> esc_html__( '1 sidebar', 'mediaconsult' ),
			'2'   			=> esc_html__( '2 sidebars', 'mediaconsult' ),
			'3'  			=> esc_html__( '3 sidebars', 'mediaconsult' ),
			'4'   			=> esc_html__( '4 sidebars', 'mediaconsult' ),
			'5'   			=> esc_html__( '5 sidebars', 'mediaconsult' ),
		),
		'section'  			=> 'footer_options',
	) );	
	
    $wp_customize->selective_refresh->add_partial( 'footer_columns', array(
        'selector'            => '.footer-sidebars-wrapper',
        'container_inclusive' => true,
        'render_callback'     => 'mediaconsult_footer_columns_output',
        'fallback_refresh'    => false,
    ) );
	
	
	
	
	// Footer Copyright Text
	$wp_customize->add_setting( 'footer_copyright_text', array(
		'default'           => 'Copyright Media Consult',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'footer_copyright_text', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Footer Copyright Text', 'mediaconsult' ),
		'section'  			=> 'footer_options',
	) );
		
		
	
	// Show footer scrollup
	$wp_customize->add_setting( 'footer_scrollup', array(
		'default'           => 'true',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'footer_scrollup', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Display Footer Scroll To Top Button ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'True', 'mediaconsult' ),
			'false'   			=> esc_html__( 'False', 'mediaconsult' ),
		),
		'section'  			=> 'footer_options',
	) );
	
	
	

	// Reverse Footer Bottom Contents
	$wp_customize->add_setting( 'fbottom_reverse', array(
		'default'           => 'false',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'fbottom_reverse', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'How do you wish to display information in the bottom of your footer ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'Copyright information in the left and footer menu in the right.', 'mediaconsult' ),
			'false'   			=> esc_html__( 'Footer menu in the left and copyright information in the right.', 'mediaconsult' ),
		),
		'section'  			=> 'footer_options',
	) );
    $wp_customize->selective_refresh->add_partial( 'fbottom_reverse', array(
        'selector'            => '.footer-bottom-wrapper',
        'container_inclusive' => true,
        'render_callback'     => 'mediaconsult_fbottom_output',
        'fallback_refresh'    => false,
    ) );	
	
	
	
	
	// Reverse Footer Bottom Contents
	$wp_customize->add_setting( 'fbottom_content_option', array(
		'default'           => 'false',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'fbottom_content_option', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Do you wish to replace the footer menu with social media profiles ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'Yes', 'mediaconsult' ),
			'false'   			=> esc_html__( 'No', 'mediaconsult' ),
		),
		'section'  			=> 'footer_options',
	) );
    $wp_customize->selective_refresh->add_partial( 'fbottom_content_option', array(
        'selector'            => '.footer-bottom-wrapper',
        'container_inclusive' => true,
        'render_callback'     => 'mediaconsult_fbottom_output',
        'fallback_refresh'    => false,
    ) );


?>