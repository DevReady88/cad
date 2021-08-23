<?php


	/**
	 * Portfolio options.
	 */
	$wp_customize->add_section( 'portfolio_options', array(
		'title'    => esc_html__( 'Portfolio', 'mediaconsult' ),
		'priority' => 127,
	) );
	
	
	
	
	// Main Portfolio URL
	$wp_customize->add_setting( 'main_portfolio_url', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );
	
	$wp_customize->add_control( 'main_portfolio_url', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Choose your main portfolio layout URL', 'mediaconsult' ),
		'section'  			=> 'portfolio_options',
		'description'  		=> esc_html__( 'This setting is used in the portfolio filter to return to all the portfolio posts.', 'mediaconsult' ),
	) );
	
	
	
	
	// Portfolio Categories Listing
	$wp_customize->add_setting( 'portfolio_categories_listing', array(
		'default'           => '3',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_portfolio_categories_listing',
	) );
	
	$wp_customize->add_control( 'portfolio_categories_listing', array(
		'type'    			=> 'number',
		'label'    			=> esc_html__( 'Choose the portfolio categories listing layout', 'mediaconsult' ),
		'choices'  			=> array(
			'2'  				=> esc_html__( 'Template 2 Columns', 'mediaconsult' ),
			'3'  				=> esc_html__( 'Template 3 Columns', 'mediaconsult' ),
		),
		'section'  			=> 'portfolio_options',
		'description'  		=> esc_html__( 'This setting is used to determine the listing layout for portfolio categories.', 'mediaconsult' ),
	) );
	
	
	
	
	// Portfolio Filter
	$wp_customize->add_setting( 'display_portfolio_filter', array(
		'default'           => 'true',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'display_portfolio_filter', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Display Portfolio Filter ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'True', 'mediaconsult' ),
			'false'   			=> esc_html__( 'False', 'mediaconsult' ),
		),
		'section'  			=> 'portfolio_options',
	) );
	
    $wp_customize->selective_refresh->add_partial( 'display_portfolio_filter', array(
        'selector'            => '.portfolio-filter-wrapper',
        'container_inclusive' => true,
        'render_callback'     => 'mediaconsult_portfolio_filter_output',
        'fallback_refresh'    => false,
    ) );
	
	
	
	
	// Portfolio Image Behavior
	$wp_customize->add_setting( 'image_behavior', array(
		'default'           => 'post_detail',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_portfolio_image_behavior',
	) );
	
	$wp_customize->add_control( 'image_behavior', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Portfolio Image Links To: ', 'mediaconsult' ),
		'choices'  			=> array(
			'post_detail'  		=> esc_html__( 'Post Detail', 'mediaconsult' ),
			'popup'   			=> esc_html__( 'Opens Larger Image', 'mediaconsult' ),
		),
		'section'  			=> 'portfolio_options',
	) );
	
	
	
	
	// Portfolio Pagination Type
	$wp_customize->add_setting( 'portfolio_pagination_type', array(
		'default'           => 'classic',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_pagination_type_sanitize',
	) );
	
	$wp_customize->add_control( 'portfolio_pagination_type', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Portfolio Pagination Type', 'mediaconsult' ),
		'choices'  			=> array(
		'classic'  			=> esc_html__( 'Classic', 'mediaconsult' ),
		'numbered' 	  		=> esc_html__( 'Numbered', 'mediaconsult' ),
		),
		'section'  			=> 'portfolio_options',
	) );
	
	
	
	// Portfolio 2 Posts Per Page Number
	$wp_customize->add_setting( 'mediaconsult_port2col_posts_no', array(
		'default'           => 6,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_number_absint',
	) );

	$wp_customize->add_control( 'mediaconsult_port2col_posts_no', array(
		'type' 				=> 'number',
		'label' 			=> esc_html__( 'Posts per page for portfolio 2 columns', 'mediaconsult' ),
		'section' 			=> 'portfolio_options',
	) );
	
	
	
	// Portfolio 3 Posts Per Page Number
	$wp_customize->add_setting( 'mediaconsult_port3col_posts_no', array(
		'default'           => 6,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_number_absint',
	) );

	$wp_customize->add_control( 'mediaconsult_port3col_posts_no', array(
		'type' 				=> 'number',
		'label' 			=> esc_html__( 'Posts per page for portfolio 3 columns', 'mediaconsult' ),
		'section' 			=> 'portfolio_options',
	) );


?>