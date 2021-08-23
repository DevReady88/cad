<?php
/**
 * Media Consult Customizer
 *
 * @package WordPress
 * @subpackage Mediaconsult
 * @since 4.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mediaconsult_customize_register( $wp_customize ) {
	
	
	foreach ( glob( CEL_DIR . '/inc/customizer-sections/*.php' ) as $file ) {
		if ( file_exists( $file ) ) {
			require_once $file;
		}
	}
	

}
add_action( 'customize_register', 'mediaconsult_customize_register' );





/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function mediaconsult_sanitize_colorscheme( $input ) {
	$valid = array( 'light_orange', 'dark_blue' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light_orange';
}




/**
 * Sanitize the enabled / disabled setting.
 *
 * @param string $input enabled / disabled.
 */
function mediaconsult_sanitize_enabled_disabled( $input ) {
	$valid = array( 'enabled', 'disabled' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'disabled';
}



/**
 * Sanitize the light / dark setting.
 *
 * @param string $input light / dark.
 */
function mediaconsult_sanitize_light_dark( $input ) {
	$valid = array( 'light', 'dark' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
}



/**
 * Sanitize the light / dark setting.
 *
 * @param string $input light / dark.
 */
function mediaconsult_sanitize_content_light_dark( $input ) {
	$valid = array( 'light', 'dark' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
}



/**
 * Sanitize the sidebar position setting
 *
 * @param string $input Sidebar position.
 */
function mediaconsult_sidebar_position_sanitize( $input ) {
	$valid = array( 'left', 'right' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'right';
}



/**
 * Sanitize the sidebar appearance setting
 *
 * @param string $input Sidebar appearance.
 */
function mediaconsult_sidebar_appearance_sanitize( $input ) {
	$valid = array( 'classic', 'minimal' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'classic';
}



/**
 * Sanitize the footer sidebars display setting
 *
 * @param string $input Footer sidebars display.
 */
function mediaconsult_sanitize_true_false( $input ) {
	$valid = array( 'true', 'false' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'true';
}




/**
 * Sanitize the portfolio image behavior type setting
 *
 * @param string $input Portfolio image behavior type
 */
function mediaconsult_sanitize_portfolio_image_behavior( $input ) {
	$valid = array( 'post_detail', 'popup' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'post_detail';
}	




/**
 * Sanitize the pagination type setting
 *
 * @param string $input pagination type
 */
function mediaconsult_pagination_type_sanitize( $input ) {
	$valid = array( 'classic', 'numbered' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'classic';
}	
	
	

/**
 * Sanitize the footer columns setting
 *
 * @param string $input Footer sidebar columns.
 */
function mediaconsult_footer_columns( $input ) {
	$valid = array( '1', '2', '3', '4', '5' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return '4';
}


function mediaconsult_sanitize_portfolio_categories_listing( $input ) {
	$valid = array( '2', '3' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return '3';
}



function mediaconsult_sanitize_ressources_categories_listing( $input ) {
	$valid = array( 'default', 'minimal' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'default';
}



/* Output the correct footer sidebar columns via selective refresh */
function mediaconsult_footer_columns_output() {

	$mediaconsult_footer_cols = get_theme_mod( 'footer_columns' );

	ob_start();
	
	$output = '';
	
	switch ( $mediaconsult_footer_cols ) {
		case 1:
			get_template_part('inc/footer/1columns');
			break;
		case 2:
			get_template_part('inc/footer/2columns');
			break;
		case 3:
			get_template_part('inc/footer/3columns');
			break;
		case 4:
			get_template_part('inc/footer/4columns');
			break;
		case 5:
			get_template_part('inc/footer/5columns');
			break;			
		default:
			get_template_part('inc/footer/4columns');
			break;
	}
	
	$output = ob_get_clean();
	
	return '<div class="footer-sidebars-wrapper">' . $output . '</div>';

}



/* Output the correct header topbar via selective refresh */
function mediaconsult_header_topright_content_output() {

	ob_start();
	
	$output = '';
	
	if ( get_theme_mod( 'header_topright_content' ) == 'true_email_phone' ) {

		get_template_part( 'inc/topright' );
		
	}
	if ( get_theme_mod( 'header_topright_content' ) == 'true_search' ) {

		get_template_part( 'inc/topright-search' );
		
	}
	
	$output = ob_get_clean();
	
	return '<div class="header-topright-wrapper">' . $output . '</div>';

}



/* Output the correct portfolio filter contents via selective refresh */
function mediaconsult_portfolio_filter_output() {

	ob_start();
	
	$output = '';
	
	get_template_part( 'inc/portfolio-filter' );

	$output = ob_get_clean();
	
	return '<div class="portfolio-filter-wrapper">' . $output . '</div>';

}



/* Output the footer bottom contents via selective refresh */
function mediaconsult_fbottom_output() {

	ob_start();
	
	$output = '';
	
	get_template_part( 'inc/footer-bottom' );

	$output = ob_get_clean();
	
	return '<div class="footer-bottom-wrapper">' . $output . '</div>';

}

	
	
	
function mediaconsult_css_skin_refresh() {
	if(!is_admin()){
	
		if ( is_customize_preview() ) {
			
			$mediaconsult_css_skin = get_theme_mod( 'colorscheme' );
			

			switch ( $mediaconsult_css_skin ) {
				case "light_orange":
					wp_enqueue_style( 'mediaconsult-colors-light-orange', get_theme_file_uri( '/assets/css/skins/colors-light-orange.css' ), array( 'mediaconsult-stylesheet' ), '1.0' );
					break;
				case "dark_blue":
					wp_enqueue_style( 'mediaconsult-colors-dark-blue', get_theme_file_uri( '/assets/css/skins/colors-dark-blue.css' ), array( 'mediaconsult-stylesheet' ), '1.0' );
					break;
			}

		}
	}
}
add_action( 'wp_enqueue_scripts', 'mediaconsult_css_skin_refresh' );




/* Output the header menu contents via selective refresh */
function mediaconsult_header_menu_type_output() {

	ob_start();
	
	$output = '';
	
	get_template_part( 'inc/header-menu' );

	$output = ob_get_clean();
	
	return '<div class="header-menu-type-wrapper">' . $output . '</div>';

}

	

/* Sanitize The Menu Type */
function mediaconsult_sanitize_menu_type( $input ) {
	$valid = array( 'classic', 'modern', 'modern2' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'classic';
}



/* Sanitize The Menu Alignment */
function mediaconsult_sanitize_menu_alignment( $input ) {
	$valid = array( 'left', 'right' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'right';
}


/* Sanitize Header Top Right Content */
function mediaconsult_sanitize_header_topright_content( $input ) {
	$valid = array( 'true_email_phone', 'true_search', 'false' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'true_search';
}



/* Sanitize Theme Page Loader */
function mediaconsult_theme_loader_sanitize( $input ) {
	$valid = array( 'on', 'off' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'off';
}

	
	
	
	
function mediaconsult_sanitize_text_field( $input ) {
	if ( $input ) {
		return $input;
	} else {
		return '';
	}
}



function mediaconsult_sanitize_number_absint( $number, $setting ) {
  // Ensure $number is an absolute integer (whole number, zero or greater).
  $number = absint( $number );

  // If the input is an absolute integer, return it; otherwise, return the default
  return ( $number ? $number : $setting->default );
}



function mediaconsult_image_sanitize( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}




/**
 * Render the site title for the selective refresh partial.
 *
 * @since Mediaconsult 4.0
 * @see mediaconsult_customize_register()
 *
 * @return void
 */
function mediaconsult_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Twenty Seventeen 1.0
 * @see mediaconsult_customize_register()
 *
 * @return void
 */
function mediaconsult_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function mediaconsult_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function mediaconsult_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function mediaconsult_customize_preview_js() {
	wp_enqueue_script( 'mediaconsult-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'mediaconsult_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function mediaconsult_panels_js() {
	wp_enqueue_script( 'mediaconsult-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'mediaconsult_panels_js' );
