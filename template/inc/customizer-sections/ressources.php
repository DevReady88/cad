<?php


	/**
	 * Ressources options.
	 */
	$wp_customize->add_section( 'ressources_options', array(
		'title'    => esc_html__( 'Ressources', 'mediaconsult' ),
		'priority' => 124,
	) );
	
	
	
	
	// Ressources Categories Listing
	$wp_customize->add_setting( 'ressources_categories_listing', array(
		'default'           => 'default',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_ressources_categories_listing',
	) );
	
	$wp_customize->add_control( 'ressources_categories_listing', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Choose the ressources categories listing layout', 'mediaconsult' ),
		'choices'  			=> array(
			'default'  				=> esc_html__( 'Default Listing', 'mediaconsult' ),
			'minimal'  				=> esc_html__( 'Minimal', 'mediaconsult' ),
		),
		'section'  			=> 'ressources_options',
		'description'  		=> esc_html__( 'This setting is used to determine the listing layout for ressources categories.', 'mediaconsult' ),
	) );
	
	
	


	// Ressources Categories Sidebar Position
	$wp_customize->add_setting( 'ressources_categories_sidebar_position', array(
		'default'           => 'right',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sidebar_position_sanitize',
	) );
	
	$wp_customize->add_control( 'ressources_categories_sidebar_position', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Ressources Categories Sidebar Position', 'mediaconsult' ),
		'choices'  			=> array(
			'left'  			=> esc_html__( 'Left', 'mediaconsult' ),
			'right'   			=> esc_html__( 'Right', 'mediaconsult' ),
		),
		'section'  			=> 'ressources_options',
	) );



	
	
	// Ressources Pagination Type
	$wp_customize->add_setting( 'ressources_pagination_type', array(
		'default'           => 'classic',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_pagination_type_sanitize',
	) );
	
	$wp_customize->add_control( 'ressources_pagination_type', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Ressources Pagination Type', 'mediaconsult' ),
		'choices'  			=> array(
		'classic'  			=> esc_html__( 'Classic', 'mediaconsult' ),
		'numbered' 	  		=> esc_html__( 'Numbered', 'mediaconsult' ),
		),
		'section'  			=> 'ressources_options',
	) );
	
	
	
	// Ressources Default Posts Per Page Number
	$wp_customize->add_setting( 'mediaconsult_default_ressources_posts_no', array(
		'default'           => 6,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_number_absint',
	) );

	$wp_customize->add_control( 'mediaconsult_default_ressources_posts_no', array(
		'type' 				=> 'number',
		'label' 			=> esc_html__( 'Posts per page for default ressources listing', 'mediaconsult' ),
		'section' 			=> 'ressources_options',
	) );
	
	
	
	// Ressources Minimal Posts Per Page Number
	$wp_customize->add_setting( 'mediaconsult_minimal_ressources_posts_no', array(
		'default'           =>	12,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_number_absint',
	) );

	$wp_customize->add_control( 'mediaconsult_minimal_ressources_posts_no', array(
		'type' 				=> 'number',
		'label' 			=> esc_html__( 'Posts per page for minimal ressources listing', 'mediaconsult' ),
		'section' 			=> 'ressources_options',
	) );


?>