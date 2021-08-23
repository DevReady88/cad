<?php


	/**
	 * Blog options.
	 */
	$wp_customize->add_section( 'blog_options', array(
		'title'    => esc_html__( 'Blog', 'mediaconsult' ),
		'priority' => 126,
	) );	
	
	
	
	// Blog Pagination Type
	$wp_customize->add_setting( 'blog_pagination_type', array(
		'default'           => 'classic',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_pagination_type_sanitize',
	) );
	
	$wp_customize->add_control( 'blog_pagination_type', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Blog Pagination Type', 'mediaconsult' ),
		'choices'  			=> array(
		'classic'  			=> esc_html__( 'Classic', 'mediaconsult' ),
		'numbered' 	  		=> esc_html__( 'Numbered', 'mediaconsult' ),
		),
		'section'  			=> 'blog_options',
	) );
	
	
	
	// Blog Default Posts Per Page Number
	$wp_customize->add_setting( 'mediaconsult_blogdefault_posts_no', array(
		'default'           => 6,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_number_absint',
	) );

	$wp_customize->add_control( 'mediaconsult_blogdefault_posts_no', array(
		'type' 				=> 'number',
		'label' 			=> esc_html__( 'Posts per page for default blog layout', 'mediaconsult' ),
		'section' 			=> 'blog_options',
	) );
	
	

	// Blog Default Posts Per Page Number
	$wp_customize->add_setting( 'mediaconsult_3col_posts_no', array(
		'default'           => 9,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_number_absint',
	) );

	$wp_customize->add_control( 'mediaconsult_3col_posts_no', array(
		'type' 				=> 'number',
		'label' 			=> esc_html__( 'Posts per page for 3 columns with no sidebar layout', 'mediaconsult' ),
		'section' 			=> 'blog_options',
	) );




	$wp_customize->add_setting( 'share_post_icons_top', array(
		'default'           => 'false',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'share_post_icons_top', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Display post sharing icons at the top of the post detail ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'True', 'mediaconsult' ),
			'false'   			=> esc_html__( 'False', 'mediaconsult' ),
		),
		'section'  			=> 'blog_options',
	) );



	$wp_customize->add_setting( 'share_post_icons', array(
		'default'           => 'true',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'share_post_icons', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Display post sharing icons at the end of the post detail ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'True', 'mediaconsult' ),
			'false'   			=> esc_html__( 'False', 'mediaconsult' ),
		),
		'section'  			=> 'blog_options',
	) );



	$wp_customize->add_setting( 'show_author_post_detail', array(
		'default'           => 'true',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'show_author_post_detail', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Display author name at the top of the post detail ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'True', 'mediaconsult' ),
			'false'   			=> esc_html__( 'False', 'mediaconsult' ),
		),
		'section'  			=> 'blog_options',
	) );



	$wp_customize->add_setting( 'about_author', array(
		'default'           => 'true',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_true_false',
	) );
	
	$wp_customize->add_control( 'about_author', array(
		'type'    			=> 'radio',
		'label'    			=> esc_html__( 'Display about the author information at the end of the post ?', 'mediaconsult' ),
		'choices'  			=> array(
			'true'  			=> esc_html__( 'True', 'mediaconsult' ),
			'false'   			=> esc_html__( 'False', 'mediaconsult' ),
		),
		'section'  			=> 'blog_options',
	) );


?>