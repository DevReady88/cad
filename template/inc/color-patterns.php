<?php
/**
 * Media Consult: Color Patterns
 *
 * @package WordPress
 * @subpackage Media Consult
 * @since 4.1.2
 */


/**
 * Generate the CSS for the current custom color scheme.
 *
 */



function mediaconsult_custom_colors_css() {

	
	$body_background_option = get_theme_mod( 'body_background_option', 'disabled' );
	$body_background = get_theme_mod( 'body_background', '#ffffff' );
	
	$primary_skin_option = get_theme_mod( 'primary_skin_option', 'disabled' );
	$primary_skin = get_theme_mod( 'primary_skin', '#f87b27' );

	$primary_text_option = get_theme_mod( 'primary_text_option', 'disabled' );
	$primary_text = get_theme_mod( 'primary_text', '#65696e' );
	

	
		
	$css = '';
	
	
	
	if( $body_background_option == 'enabled' ) {

		$css .= '
		body,
		ul.nav-tabs > li a.active:after,
		input[type="text"],
		input[type="email"],
		input[type="url"],
		input[type="password"],
		input[type="search"],
		input[type="number"],
		input[type="tel"],
		input[type="range"],
		input[type="date"],
		input[type="month"],
		input[type="week"],
		input[type="time"],
		input[type="datetime"],
		input[type="datetime-local"],
		input[type="color"],
		textarea,
		select,
		fieldset,
		.select2-results__options li.select2-results__option.select2-results__option--highlighted,
		.select2-results__options li.select2-results__option.select2-results__option--highlighted:hover,
		.select2-results__options li.select2-results__option[aria-selected="true"],
		.sf-menu .sub-menu,
		.cel-ressources-share-content,
		.celestial-body-cover {
			background-color: ' . $body_background . ';
		}
		
		';

	}
	
	
	
	if( $primary_text_option == 'enabled' ) {

		$css .= '
		body,
		input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea, select, fieldset,
		.wp-block-latest-posts li a, .wp-block-categories li a, .wp-block-archives li a,
		.main-menu-control,
		.header-nav.mm-menu,
		.header-nav.mm-menu a,
		.header-nav.mm-menu a:hover,
		.header-nav.mm-menu .mm-title,
		.header-nav.mm-menu .mm-title:hover,
		.header-nav.mm-menu .mm-listview .mm-next:after,
		.mm-menu .mm-btn:hover:after, .mm-menu .mm-btn:hover:before,
		.sf-menu li a,
		.sf-menu li li,
		.sf-menu li li a,
		.tm-email a,
		.tm-email a,
		ul.nav-tabs > li > a,
		ul.nav-tabs > li > a:hover,
		.cel-toggle-title a,
		.post-misc a:hover,
		.cel-post-navigation-grid .prev-posts a, .cel-post-navigation-grid .next-posts a,
		.tags-wrapper a,
		.comment-metadata a:hover,
		.widget_archive ul li a, .widget_categories ul li a, .widget_meta ul li a, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_recent_comments ul li a, .widget_recent_entries ul li a, .widget_rss ul li a, .mediaconsult_widget_posts_categories ul li a,
		.widget_recent_comments ul li a,
		.widget_recent_comments .comment-author-link a,
		.tagcloud a,
		.recentposts-title,
		.recentposts-list.text_only .recentposts-content:hover .recentposts-title,
		.cel-ressources-grid h2 a,
		.cel-ressources-grid h2 {
			color: ' . $primary_text . ';
		}
		::-moz-selection,
		::selection {
			background: ' . $primary_text . ';
		}		
		.cel-modern-menu-alt .sf-menu > li > a:hover:after,
		.cel-modern-menu-alt .sf-menu > li.sfHover > a:after {
			background-color: ' . $primary_text . ';
		}
		';

	}
	
	

	if( $primary_skin_option == 'enabled' ) {

		$css .= '
		a, 
		a:hover,
		blockquote:before,
		.skin-color,
		.cel-slide-box a.skin-color,
		.celestial-button-white,
		.select2-results__options li.select2-results__option.select2-results__option--highlighted:hover,
		.select2-results__options li.select2-results__option.select2-results__option--highlighted,
		.celestial-button-border.celestial-button-skin,
		.main-menu-control:hover,
		.mm-close:before,
		.sf-menu li a:hover,
		.cel-post-title a,
		.cel-post-title a:hover,
		.single .cel-post-title,
		.cel-post-navigation-grid .prev-posts a:hover,
		.cel-post-navigation-grid .next-posts a:hover,
		.tags-wrapper a:hover,
		h3.comment-reply-title,
		.comments-title,
		.widget h3.widgettitle,
		.widget_archive ul li a:hover,
		.widget_categories ul li a:hover,
		.widget_meta ul li a:hover,
		.widget_pages ul li a:hover,
		.widget_nav_menu ul li a:hover,
		.widget_recent_entries ul li a:hover,
		.mediaconsult_widget_posts_categories ul li a:hover,
		.widget_recent_comments ul li a:hover,
		.widget_recent_comments .comment-author-link a:hover,
		.widget_nav_menu ul li a:hover,
		.widget_nav_menu ul li.current_page_item > a,
		.elementor-widget-wp-widget-archives ul li a:hover,
		.elementor-widget-wp-widget-categories ul li a:hover,
		.elementor-widget-wp-widget-meta ul li a:hover,
		.elementor-widget-wp-widget-pages ul li a:hover,
		.elementor-widget-wp-widget-recent-comments ul li a:hover,
		.elementor-widget-wp-widget-recent-posts ul li a:hover,
		.elementor-widget-wp-widget-nav_menu ul li a:hover,
		.elementor-widget-wp-widget-mediaconsult_posts_categ ul li a:hover,
		.tagcloud a:hover,
		.recentposts-title:hover,
		.page-numbers li .current,
		.page-numbers li a:hover,
		.sb-icon,
		.st-title,
		.tm-email a:hover,
		.nav-tabs .nav-item.show .nav-link,
		.nav-tabs .nav-link.active,
		.nav-tabs.nav-justified a.active,
		.nav-tabs.nav-justified a.active:hover,
		.nav-tabs.nav-justified a.active:focus,
		.cel-toggle-title a[aria-expanded="true"],
		.cel-toggle-title a:before,
		.slick-prev,
		.slick-next,
		.port-filter-section ul li a:hover,
		.port-filter-section ul li a.pfilter-selected,
		.mc-portfolio-title a:hover,
		.mc-port-category a:hover,
		.related-portfolio-title,
		.wp-block-latest-posts li a:hover,
		.wp-block-categories li a:hover,
		.wp-block-archives li a:hover,
		.slider-post-date,
		.header-top-search .search-submit:before,
		.small-listing-permalink:hover,
		h5.cel-slick-nav-title,
		h5.cel-slick-nav-title:hover,
		.cel-slick-nav-more a,
		.cel-slick-nav-more a:hover,
		.cel-ressources-minimal-block h4,
		.cel-ressources-minimal-block h4 a,
		.cel-ressources-minimal-block h4 a:hover,
		.cel-ressources-minimal-block h4 .rmb-download-icon:hover,
		.cel-ressources-minimal-block h4 .rmb-download-format:hover,
		.recentposts-list.text_only .recentposts-content:hover h6 a.recentposts-title,
		.cel-modern-menu-alt .sf-menu li .sub-menu li a:hover,
		.cel-slick-inner-nav h5.cel-slick-nav-title,
		.cel-slick-inner-nav h5.cel-slick-nav-title:hover,
		.cel-history-title,
		.cel-ressources-grid .ressource-share:hover,
		.cel-ressources-grid .ressource-share i:hover,
		.elementor-widget .elementor-widget-container>h5,
		.minimal-sidebar .footer-sidebars-wrapper .widget_archive ul li.current-cat a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_archive ul li.current-menu-item a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_archive ul li.current_page_item a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_categories ul li.current-cat a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_categories ul li.current-menu-item a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_categories ul li.current_page_item a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_meta ul li.current-cat a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_meta ul li.current-menu-item a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_meta ul li.current_page_item a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_nav_menu ul li.current-cat a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_nav_menu ul li.current-menu-item a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_nav_menu ul li.current_page_item a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_pages ul li.current-cat a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_pages ul li.current-menu-item a,
		.minimal-sidebar .footer-sidebars-wrapper .widget_pages ul li.current_page_item a,
		.minimal-sidebar .footer-sidebars-wrapper .mediaconsult_widget_posts_categories ul li.current-cat a,
		.minimal-sidebar .footer-sidebars-wrapper .mediaconsult_widget_posts_categories ul li.current-menu-item a,
		.minimal-sidebar .footer-sidebars-wrapper .mediaconsult_widget_posts_categories ul li.current_page_item a {
			color: ' . $primary_skin . ';
		}
		.skin-background,
		.btn-primary,
		.more-link:hover,
		input[type="submit"]:hover,
		.mailchimp-submit:hover,
		button:hover,
		.form-submit .submit:hover,
		.celestial-button-fill.celestial-button-skin,
		.cel-modern-menu .sf-menu > li > a:hover:after,
		.cel-modern-menu .sf-menu > li.sfHover a:after,
		.cel-modern-menu-alt .header-nav,
		.footer-menu-list li a:after,
		.comment-reply-link:hover,
		.classic-pagination a:after,
		#scrollUp:hover,
		.imgp-icon,
		.nav-pills .nav-link.active, 
		.nav-pills .show > .nav-link,
		ul.nav-tabs li a.active:before,
		ul.nav-tabs li a:hover:before,
		.slick-prev:hover,
		.slick-next:hover,
		.more-link:hover,
		.cel-posts-slider-content,
		.minimal-sidebar .sidebar .widget_categories ul li.current-cat,
		.minimal-sidebar .sidebar .widget_pages ul li.current_page_item,
		.minimal-sidebar .sidebar .widget_nav_menu ul li.current-menu-item,
		.minimal-sidebar .mediaconsult_widget_posts_categories ul li.current-cat,
		.elementor-widget-wp-widget-categories ul li.current-cat,
		.elementor-widget-wp-widget-pages ul li.current_page_item,
		.elementor-widget-wp-widget-nav_menu ul li.current-menu-item,		
		.cel-ressources-grid .cel-ressources-category a,
		.cel-ressources-grid .cel-ressources-share-content .cel-ressources-share-close:hover,
		.document-info,
		.post-cols-date a:hover,
		.cel-slick-inner-nav h5.cel-slick-nav-title.is-active,
		.cps-open-close,
		.cel-page-share-wrapper .cps-open-close,
		.sb-disk {
			background-color: ' . $primary_skin . ';
		}
		.bg-primary {
			background-color: ' . $primary_skin . ' !important;
		}		
		.btn-primary,
		.celestial-button-border.celestial-button-skin,
		.ptw-border-skin,
		.cel-ressources-grid .cel-ressources-share-content .cel-ressources-share-close:hover,
		.cel-ressources-grid .cel-ressource-download:hover,
		.cel-ressource-detail-wrapper .cel-ressource-download:hover,
		.cel-slick-inner-nav h5.cel-slick-nav-title.is-active {
			border-color: ' . $primary_skin . ';
		}
		.cel-underline span,
		.cel-sitemap-list.cel-sitemap-list-pages li a span {
			background-image: linear-gradient(transparent calc(100% - 2px), ' . $primary_skin . ' 2px);
		}
		.cel-loader-animation {
			border-top-color: ' . $primary_skin . ';
		}
		';

	}
	
	
	
	
	/**
	 * Filters Media Consult custom colors CSS.
	 *
	 */
	return apply_filters( 'mediaconsult_custom_colors_css', 
						 $css, 
						 $body_background_option,						 
						 $body_background,
						 $primary_skin_option, 
						 $primary_skin,
						 $primary_text_option,						 
						 $primary_text						 
						 
						);
	
}



?>