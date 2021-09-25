<?php

! defined( 'ABSPATH' ) and exit;



define( 'CEL_DIR', trailingslashit( get_template_directory() ) );
define( 'CEL_URI', trailingslashit( get_template_directory_uri() ) );
define( 'CEL_THEME_VERSION', '5.0.1' );




/*----------------------------------
	load theme css
-------------------------------------*/
function mediaconsult_load_styles() {
	if(!is_admin()){

		
		/* bootstrap */
		wp_enqueue_style( 'bootstrap', CEL_URI . 'assets/css/bootstrap.min.css', array(), CEL_THEME_VERSION );
		
		/* fontAwesome font library */
		wp_register_style( 'font-awesome', CEL_URI . 'assets/css/font-awesome.css', array(), '', 'all' );
		wp_enqueue_style( 'font-awesome' );
		
		/* iconMoon font library */
		wp_register_style( 'icon-moon', CEL_URI . 'assets/css/icon-moon.css', array(), '', 'all' );
		wp_enqueue_style( 'icon-moon' );		
		
		/* iconMind font library */
		wp_register_style( 'icon-mind', CEL_URI . 'assets/css/icons-mind.css', array(), '', 'all' );
		wp_enqueue_style( 'icon-mind' );	
		
		/* mmenu */
		wp_register_style( 'mmenu', CEL_URI . 'assets/css/mmenu.all.css', array(), '', 'all' );
		wp_enqueue_style( 'mmenu' );		
		
		/* select2 */
		wp_register_style( 'select2', CEL_URI . 'assets/css/select2.min.css', array(), '', 'all' );
		wp_enqueue_style( 'select2' );
		
		/* magnific popup */
		wp_register_style( 'magnific-popup-css', CEL_URI . 'assets/css/magnific-popup.css', array(), '', 'all' );
		wp_enqueue_style( 'magnific-popup-css' );
		
		/* theme main css file( style.css ) */
		wp_enqueue_style( 'mediaconsult-stylesheet', get_bloginfo( 'stylesheet_url' ), array(), CEL_THEME_VERSION );

			

		if ( 'light_orange' === get_theme_mod( 'colorscheme', 'dark_blue' ) || is_customize_preview() ) {
			wp_enqueue_style( 'mediaconsult-colors-light-orange', get_theme_file_uri( '/assets/css/skins/colors-light-orange.css' ), array( 'mediaconsult-stylesheet' ), '1.0' );
		}
		elseif ( 'dark_blue' === get_theme_mod( 'colorscheme', 'light_orange' ) || is_customize_preview() ) {
			wp_enqueue_style( 'mediaconsult-colors-dark-blue', get_theme_file_uri( '/assets/css/skins/colors-dark-blue.css' ), array( 'mediaconsult-stylesheet' ), '1.0' );
		} else {
			wp_enqueue_style( 'mediaconsult-colors-light-orange', get_theme_file_uri( '/assets/css/skins/colors-light-orange.css' ), array( 'mediaconsult-stylesheet' ), '1.0' );
		}
		

		
		if ( !is_customize_preview() ) {

			require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) ); 

			if ( 'dark_blue' === get_theme_mod( 'colorscheme', 'light_orange' ) ) {

				wp_add_inline_style( 'mediaconsult-colors-dark-blue', mediaconsult_custom_colors_css() );

			} else {
				
				wp_add_inline_style( 'mediaconsult-colors-light-orange', mediaconsult_custom_colors_css() );

			}
			
		}
		
		
	}

}
add_action( 'wp_enqueue_scripts', 'mediaconsult_load_styles' );




/*----------------------------------
	load javascript files in theme's footer / header where needed
-------------------------------------*/
function mediaconsult_load_scripts() {
	if(!is_admin()){
		
			
		/* include bootstrap */
		wp_enqueue_script( 'bootstrap', CEL_URI .'/assets/js/bootstrap.min.js', array( 'jquery' ), false, true );
		
		/* include fitvids */
		wp_enqueue_script( 'fitvids-js', CEL_URI .'/assets/js/fitvids.js', array( 'jquery' ), false, true );
		
		/* include superfish menu */
		wp_enqueue_script( 'sf-menu', CEL_URI .'/assets/js/superfish.min.js', array( 'jquery' ), false, true );
		
		/* include mobile menu */
		wp_enqueue_script( 'mmenu-all', CEL_URI .'/assets/js/jquery.mmenu.all.js', array( 'jquery' ), false, true );
		
		/* include easing */
		wp_enqueue_script( 'easing', CEL_URI . '/assets/js/easing.js', array( 'jquery' ), '1.0', true );
		
		/* include select2 js */
		wp_enqueue_script( 'select2', CEL_URI .'/assets/js/select2.min.js', array( 'jquery' ), false, true );
		
		

		/* include slick js when mediaconsult_display_slider post meta is set to true */
		if( is_page() ) {
			
			global $wp_query;

			$mediaconsult_display_slider = get_post_meta( $wp_query->post->ID, '_mediaconsult_display_slider', true );
		   
			if( $mediaconsult_display_slider == 'yes' ) {

				wp_enqueue_script( 'slick', CEL_URI . '/assets/js/slick.min.js', array( 'jquery' ), false, true );
			}
		}
		
		
		
		/* include scrollup if the option is enabled */
		if ( 'false' !== get_theme_mod( 'footer_scrollup', 'true' ) ) {
		
			wp_enqueue_script( 'scrollup-js', CEL_URI .'/assets/js/scrollup.min.js', array( 'jquery' ), false, true );			
		
		}
		
		
		/* include the custom js scripts */
		wp_enqueue_script( 'mediaconsult_main-js', CEL_URI .'/assets/js/main.js', array( 'jquery' ), false, true );			


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			
			wp_enqueue_script( 'comment-reply' );	
		
		}
		
		
	} /* end of is not admin */
	
}

add_action( 'wp_enqueue_scripts', 'mediaconsult_load_scripts', 100 );




/*----------------------------------
	load admin css
-------------------------------------*/
function mediaconsult_admin_style() {
	//wp_enqueue_style( $this->alias . '-moon-icons',	get_stylesheet_directory_uri() . '/css/moon-icons.css', array() );
	//wp_enqueue_style( $this->alias . '-admin-css', get_stylesheet_directory_uri() . '/css/admin-style.css', false, '1.0.0' );

	
	wp_register_style( 'admin-css', CEL_URI . 'assets/css/admin.css', array(), '', 'all' );
	wp_enqueue_style( 'admin-css' );
}

add_action( 'admin_enqueue_scripts', 'mediaconsult_admin_style' );


/**
 * ------------------------------------------------------------------------------------------------
 * Disable emoji styles
 * ------------------------------------------------------------------------------------------------
 */

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
/**
 * ------------------------------------------------------------------------------------------------
  * Allow SVG logo
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'mediaconsult_upload_mimes' ) ) {
	add_filter( 'upload_mimes', 'mediaconsult_upload_mimes', 100, 1 );
	function mediaconsult_upload_mimes( $mimes ) {
		
		$mimes['svg'] = 'image/svg+xml';
		$mimes['svgz'] = 'image/svg+xml';
		
		$mimes['woff'] = 'font/woff';
		$mimes['woff2'] = 'font/woff2';
		$mimes['ttf'] = 'font/ttf';
		$mimes['eot'] = 'font/eot';
		$mimes['svg'] = 'font/svg';
		$mimes['woff'] = 'application/x-font-woff';
		$mimes['woff2'] = 'application/x-font-woff2';
		$mimes['ttf'] = 'application/x-font-ttf';
		$mimes['ttf'] = 'font/sfnt';
		$mimes['eot'] = 'application/vnd.ms-fontobject';
		return $mimes;
	}
}




/*----------------------------------
	Add functionalities on theme setup
-------------------------------------*/
if ( !function_exists( 'mediaconsult_theme_setup' ) ) {

	function mediaconsult_theme_setup() {
		
		
		// Add localization
		load_theme_textdomain( 'mediaconsult', CEL_DIR . '/languages' );
		

		// Register navigation menu(s)	
		register_nav_menus( array(
			'mediaconsult-main-menu' => esc_html__( 'Main Menu', 'mediaconsult' ),
			'mediaconsult-footer-menu' => esc_html__( 'Footer Menu', 'mediaconsult' )
		) );
		

		// Set the default content width
		if ( !isset( $content_width ) ) {
			$content_width = 1400;
		}
		
		
		add_filter( 'query_vars', 'mediaconsult_query_vars_filter' );
		

		// Enable shortcodes inside WordPress excerpts
		add_filter( 'the_excerpt', 'do_shortcode' );


		// Enable html5 search form
		add_theme_support( 'html5', array(
			'search-form', 
			'comment-form', 
			'comment-list', 
			'gallery', 
			'caption'
		) );
		
		
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
		
		
		// Enable plugins and themes to manage the document title		
		add_theme_support( 'title-tag' );
		
		
		// Enable Gutenberg Alignments
		add_theme_support( 'align-wide' );
		
			
		// Enable custom logo
		add_theme_support( 'custom-logo' );
		
		// Enable editor styling	
		add_editor_style( 'assets/css/custom-editor-style.css' );

		
		// Enable woosidebars functionality for custom posts
		add_post_type_support( 'portfolio', 'woosidebars' );
		add_post_type_support( 'ressources', 'woosidebars' );


		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );
	
		add_image_size( 'mediaconsult_60x60-crop', 60, 60, true ); // Admin Thumbnails
		
		add_image_size( 'mediaconsult_default_slider-nocrop', '', '', false ); // Default Slider Thumbnails
		
		add_image_size( 'mediaconsult_122x122-crop', 122, 122, true ); // Small Post Listing Thgumbnails
		
			
		// Add sidebars function to the 'widgets_init' action hook.
		add_action( 'widgets_init', 'mediaconsult_register_sidebars' );


	} // end of function mediaconsult_theme_setup();

}

add_action( 'after_setup_theme', 'mediaconsult_theme_setup' );




/*----------------------------------
	Register dynamic sidebars
-------------------------------------*/
function mediaconsult_register_sidebars() {
	
	/* default sidebar that gets replaced by the custom sidebars created by end user */
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'mediaconsult' ),
		'id'        	 => 'main-sidebar',		
		'description'    => esc_html__( 'Main sidebar that appears on the left or right of the theme body content.', 'mediaconsult' ),
		'before_widget'  => '<div id="%1$s" class="widget %2$s">', 
		'after_widget'   => '</div>', 
		'before_title'   => '<h3 class="widgettitle">', 
		'after_title'    => '</h3>', 
	));
	
	/* footer widgets */
	register_sidebar( array(
		'name' 			 => esc_html__( 'Footer Sidebar 1', 'mediaconsult' ),
		'id'        	 => 'fsidebar-1',		
		'description'    => esc_html__( 'First footer sidebar(from left to right) that appears in the footer section of the site.', 'mediaconsult' ),
		'before_widget'  => '<div id="%1$s" class="widget %2$s">', 
		'after_widget'   => '</div>', 
		'before_title'   => '<h3 class="widgettitle">', 
		'after_title'    => '</h3>', 
	));
	
	register_sidebar( array(
		'name' 			 => esc_html__( 'Footer Sidebar 2', 'mediaconsult' ),
		'id'        	 => 'fsidebar-2',			
		'description'    => esc_html__( 'Second footer sidebar(from left to right) that appears in the footer section of the site.', 'mediaconsult' ),		
		'before_widget'  => '<div id="%1$s" class="widget %2$s">', 
		'after_widget'   => '</div>', 
		'before_title'   => '<h3 class="widgettitle">', 
		'after_title'    => '</h3>', 
	));
	
	register_sidebar( array(
		'name' 			 => esc_html__( 'Footer Sidebar 3', 'mediaconsult' ),
		'id'        	 => 'fsidebar-3',			
		'description'    => esc_html__( 'Third footer sidebar(from left to right) that appears in the footer section of the site.', 'mediaconsult' ),		
		'before_widget'  => '<div id="%1$s" class="widget %2$s">', 
		'after_widget'   => '</div>', 
		'before_title'   => '<h3 class="widgettitle">', 
		'after_title'    => '</h3>', 
	));
	
	register_sidebar( array(
		'name' 			 => esc_html__( 'Footer Sidebar 4', 'mediaconsult' ),
		'id'        	 => 'fsidebar-4',
		'description'    => esc_html__( 'Fourth footer sidebar(from left to right) that appears in the footer section of the site.', 'mediaconsult' ),		
		'before_widget'  => '<div id="%1$s" class="widget %2$s">', 
		'after_widget'   => '</div>', 
		'before_title'   => '<h3 class="widgettitle">', 
		'after_title'    => '</h3>', 
	));	
	
	register_sidebar( array(
		'name' 			 => esc_html__( 'Footer Sidebar 5', 'mediaconsult' ),
		'id'        	 => 'fsidebar-5',
		'description'    => esc_html__( 'Fifth footer sidebar(from left to right) that appears in the footer section of the site.', 'mediaconsult' ),		
		'before_widget'  => '<div id="%1$s" class="widget %2$s">', 
		'after_widget'   => '</div>', 
		'before_title'   => '<h3 class="widgettitle">', 
		'after_title'    => '</h3>', 
	));		
}




/*-----------------------------------------------------------------------------------*/
/* Display custom color CSS
/*-----------------------------------------------------------------------------------*/
function mediaconsult_customizer_live_colorscheme() {
	if ( ! is_customize_preview() ) {
		return;
	}

	if ( is_customize_preview() ) {

		require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
		
		?>
		
		<style type="text/css" id="custom-theme-colors">	
			<?php echo mediaconsult_custom_colors_css(); ?>
		</style>

<?php }
				
}

add_action( 'wp_head', 'mediaconsult_customizer_live_colorscheme' );





/*-----------------------------------------------------------------------------------*/
/* Add Class In Customizer Depending On Active Skin */
/*-----------------------------------------------------------------------------------*/		
function mediaconsult_css_skin_customizer( $classes ) {
	
	
	if ( ! is_customize_preview() ) {
		return;
	}
	
	
	if ( is_customize_preview() ) {
		
		if ( 'dark_blue' === get_theme_mod( 'colorscheme', 'light_orange' ) ) {

			$classes[] = 'mc-dark-blue';

		} else {

			$classes[] = 'mc-light-orange';

		}

		return $classes;

	}
	
	
}

add_filter( 'body_class', 'mediaconsult_css_skin_customizer' );




/*-----------------------------------------------------------------------------------*/
/* Define Custom Query Variables */
/*-----------------------------------------------------------------------------------*/		
function mediaconsult_query_vars_filter( $vars ) {
	$vars[] = 'posts_order';
	$vars[] .= 'posts_category';
	$vars[] .= 'ressources_order';
	$vars[] .= 'ressources_category';	
	return $vars;
}




/*-----------------------------------------------------------------------------------*/
/* TGM_Plugin_Activation required plugins. */
/*-----------------------------------------------------------------------------------*/		
function mediaconsult_register_required_plugins() {
	$plugins = array(

		array(
			'name'     				=> esc_html__( 'MC Custom Posts', 'mediaconsult' ),
			'slug'     				=> 'mc-custom-posts',
			'source'   				=> get_template_directory() . '/inc/plugins/mc-custom-posts.zip',
			'required' 				=> false,
			'version'            	=> '1.0',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		
		array(
			'name'     				=> esc_html__( 'MC Shortcodes', 'mediaconsult' ),
			'slug'     				=> 'mc-shortcodes',
			'source'   				=> get_template_directory() . '/inc/plugins/mc-shortcodes.zip',
			'required' 				=> false,
			'version'            	=> '1.0',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		
		array(
			'name'     				=> esc_html__( 'MC Custom Widgets', 'mediaconsult' ),
			'slug'     				=> 'mc-custom-widgets',
			'source'   				=> get_template_directory() . '/inc/plugins/mc-custom-widgets.zip',
			'required' 				=> false,
			'version'            	=> '1.0',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

		array(
			'name'     				=> esc_html__( 'MC Custom Metaboxes', 'mediaconsult' ),
			'slug'     				=> 'mc-custom-metaboxes',
			'source'   				=> get_template_directory() . '/inc/plugins/mc-custom-metaboxes.zip',
			'required' 				=> false,
			'version'            	=> '1.0',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

		array(
			'name'     				=> esc_html__( 'WooSidebars', 'mediaconsult' ),
			'slug'     				=> 'woosidebars',
			'source'   				=> 'https://github.com/woothemes/woosidebars/archive/master.zip',
			'required' 				=> false,
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

		array(
			'name' 		=> esc_html__( 'Easy Google Fonts', 'mediaconsult' ),
			'slug' 		=> 'easy-google-fonts',
			'required' 	=> false,
		),
		
		array(
			'name' 		=> esc_html__( 'Contact Form 7', 'mediaconsult' ),
			'slug' 		=> 'contact-form-7',
			'required' 	=> false,
		),
		
		array(
			'name' 		=> esc_html__( 'Mailchimp for WordPress', 'mediaconsult' ),
			'slug' 		=> 'mailchimp-for-wp',
			'required' 	=> false,
		),
		
		array(
			'name' 		=> esc_html__( 'Elementor', 'mediaconsult' ),
			'slug' 		=> 'elementor',
			'required' 	=> false,
		),		
		
		array(
			'name' 		=> esc_html__( 'One Click Demo Import', 'mediaconsult' ),
			'slug' 		=> 'one-click-demo-import',
			'required' 	=> false,
		)		
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'mediaconsult',         	// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',						  	// Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins',	  	// Menu slug.
		'has_notices'  => true,                    	  	// Show admin notices or not.
		'dismissable'  => true,                    	  	// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   		// Automatically activate plugins after installation or not.
		'message'      => '',                      		// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}		

add_action( 'tgmpa_register', 'mediaconsult_register_required_plugins' );




/*-----------------------------------------------------------------------------------*/
/* One Click Demo Import Function */
/*-----------------------------------------------------------------------------------*/		
function mediaconsult_ocdi_import_files() {
	return array(
		array(
		  'import_file_name'             	=> esc_html__( 'Media Consult Default', 'mediaconsult' ),
		  'local_import_file'           	=> trailingslashit( get_template_directory() ) . 'inc/ocdi/default/demo-content.xml',
		  'local_import_widget_file'     	=> trailingslashit( get_template_directory() ) . 'inc/ocdi/default/widgets.json',
		  'local_import_customizer_file' 	=> trailingslashit( get_template_directory() ) . 'inc/ocdi/default/customizer.dat',
		  'import_preview_image_url'	 	=> 'https://celestialthemes.com/images/ocdi/ocdi_mediaconult_default.png'
		),
		array(
		  'import_file_name'             	=> esc_html__( 'Media Consult Business', 'mediaconsult' ),
		  'local_import_file'           	=> trailingslashit( get_template_directory() ) . 'inc/ocdi/business/demo-content.xml',
		  'local_import_widget_file'     	=> trailingslashit( get_template_directory() ) . 'inc/ocdi/business/widgets.json',
		  'local_import_customizer_file' 	=> trailingslashit( get_template_directory() ) . 'inc/ocdi/business/customizer.dat',
		  'import_preview_image_url'	 	=> 'https://celestialthemes.com/images/ocdi/ocdi_mediaconult_business.png'
		),		
	);
}

add_filter( 'pt-ocdi/import_files', 'mediaconsult_ocdi_import_files' );




/*-----------------------------------------------------------------------------------*/
/* Additional features to allow styling of the templates. */
/*-----------------------------------------------------------------------------------*/
require get_parent_theme_file_path( '/inc/template-functions.php' );


/*-----------------------------------------------------------------------------------*/
/* Load Customizer */
/*-----------------------------------------------------------------------------------*/		
require get_parent_theme_file_path( '/inc/customizer.php' );


/*-----------------------------------------------------------------------------------*/
/* Include the TGM_Plugin_Activation class. */
/*-----------------------------------------------------------------------------------*/		
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';		



?>
