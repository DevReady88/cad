<?php



	/**
	 * Social Media Profiles.
	 */
	
	// Social media section
	$wp_customize->add_section( 'social_profiles', array(
		'title'    => esc_html__( 'Social Media Profiles', 'mediaconsult' ),
		'priority' => 130,
	) );	
	
	
	
	
	// Twitter profile
	$wp_customize->add_setting( 'twitter_url', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'twitter_url', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Twitter Profile Url', 'mediaconsult' ),
		'section'  			=> 'social_profiles',
	) );

	
	
	
	// Facebook profile
	$wp_customize->add_setting( 'facebook_url', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'facebook_url', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Facebook Profile Url', 'mediaconsult' ),
		'section'  			=> 'social_profiles',
	) );

	
	
	
	// Linkedin profile
	$wp_customize->add_setting( 'linkedin_url', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'linkedin_url', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Linkedin Profile Url', 'mediaconsult' ),
		'section'  			=> 'social_profiles',
	) );	
	
	
	
	
	// Google Plus profile
	$wp_customize->add_setting( 'googleplus_url', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'googleplus_url', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Google Plus Profile Url', 'mediaconsult' ),
		'section'  			=> 'social_profiles',
	) );	
	
	
	
	
	// Instagram profile
	$wp_customize->add_setting( 'instagram_url', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'instagram_url', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Instagram Profile Url', 'mediaconsult' ),
		'section'  			=> 'social_profiles',
	) );		

	
	
	
	// Youtube profile
	$wp_customize->add_setting( 'youtube_url', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'youtube_url', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Youtube Profile Url', 'mediaconsult' ),
		'section'  			=> 'social_profiles',
	) );
	
	
	
	
	// Dribbble profile
	$wp_customize->add_setting( 'dribbble_url', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'dribbble_url', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Dribbble Profile Url', 'mediaconsult' ),
		'section'  			=> 'social_profiles',
	) );
	
	
	
	
	// Behance profile
	$wp_customize->add_setting( 'behance_url', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'behance_url', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'Behance Profile Url', 'mediaconsult' ),
		'section'  			=> 'social_profiles',
	) );
	
	
	
	
	// RSS url
	$wp_customize->add_setting( 'rss_url', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mediaconsult_sanitize_text_field',
	) );	
	
	$wp_customize->add_control( 'rss_url', array(
		'type'    			=> 'text',
		'label'    			=> esc_html__( 'RSS Url', 'mediaconsult' ),
		'section'  			=> 'social_profiles',
	) );

?>