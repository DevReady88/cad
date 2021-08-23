/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function( $ ) {


	// Collect information from customize-controls.js about which panels are opening.
	wp.customize.bind( 'preview-ready', function() {

		// Initially hide the theme option placeholders on load
		$( '.panel-placeholder' ).hide();

		wp.customize.preview.bind( 'section-highlight', function( data ) {

			// When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
			if ( true === data.expanded ) {
				$( 'body' ).addClass( 'highlight-front-sections' );
				$( '.panel-placeholder' ).slideDown( 200, function() {
					$.scrollTo( $( '#panel1' ), {
						duration: 600,
						offset: { 'top': -70 } // Account for sticky menu.
					});
				});

			// If we've left the panel, hide the placeholders and scroll back to the top.
			} else {
				$( 'body' ).removeClass( 'highlight-front-sections' );
				// Don't change scroll when leaving - it's likely to have unintended consequences.
				$( '.panel-placeholder' ).slideUp( 200 );
			}
		});
	});
	
	
	
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		});
	});
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		});
	});


	// Footer Text
	wp.customize( 'footer_copyright_text', function( value ) {
		value.bind( function( to ) {
			$( '.impressum' ).text( to );
		});
	});


	
	// Sidebar Position
	wp.customize( 'sidebar_position', function( value ) {
		value.bind( function( to ) {
			if ( 'left' === to ) {
				$( '.celestial-main > div' ).addClass( 'content-right-grid' ).removeClass( 'content-left-grid' );
			} else {
				$( '.celestial-main > div' ).removeClass( 'content-right-grid' ).addClass( 'content-left-grid' );
			}
		} );
	} );
	
	
	// Sidebar Appearance
	wp.customize( 'sidebar_appearance', function( value ) {
		value.bind( function( to ) {
			if ( 'minimal' === to ) {
				$( 'body' ).addClass( 'minimal-sidebar' ).removeClass( 'classic-sidebar' );
			} else {
				$( 'body' ).removeClass( 'minimal-sidebar' ).addClass( 'classic-sidebar' );
			}
		} );
	} );
	
	
	// Footer Sidebars
	wp.customize( 'footer_sidebars', function( value ) {
		value.bind( function( to ) {
			if ( 'true' === to ) {
				$( '.footer-grid-holder' ).css( 'display', 'grid' );
			} else {
				$( '.footer-grid-holder' ).css( 'display', 'none' );
			}
		} );
	} );
	
	
	
	// Scroll up
	wp.customize( 'footer_scrollup', function( value ) {
		value.bind( function( to ) {
			if ( 'true' === to ) {
				$( '#scrollUp' ).css( 'display', 'block' );
			} else {
				$( '#scrollUp' ).css( 'display', 'none' );
			}
		} );
	} );	
	
	
	
	// Show Author Name
	wp.customize( 'show_author_post_detail', function( value ) {
		value.bind( function( to ) {
			if ( 'true' === to ) {
				$( '.post-misc-author-wrapper' ).css( 'display', 'block' );
			} else {
				$( '.post-misc-author-wrapper' ).css( 'display', 'none' );
			}
		} );
	} );
	
	
	
	// Share Icons Top
	wp.customize( 'share_post_icons_top', function( value ) {
		value.bind( function( to ) {
			if ( 'true' === to ) {
				$( '.post-icons-top' ).css( 'display', 'block' );
			} else {
				$( '.post-icons-top' ).css( 'display', 'none' );
			}
		} );
	} );
	
	
	
	// Share Icons Bottom
	wp.customize( 'share_post_icons', function( value ) {
		value.bind( function( to ) {
			if ( 'true' === to ) {
				$( '.post-icons-bottom' ).css( 'display', 'block' );
			} else {
				$( '.post-icons-bottom' ).css( 'display', 'none' );
			}
		} );
	} );	
	
	
	
	// Colors
	$.each( [ 'body_background', 'body_background_option', 'primary_text', 'primary_text_option', 'primary_skin', 'primary_skin_option', 'colorscheme' ], function( index, settingId ) {
		wp.customize( settingId, function( setting ) {
			setting.bind(function() {
				
				
				var colorscheme = wp.customize( 'colorscheme' )(),
				body_background = wp.customize( 'body_background' )(),
				body_background_option = wp.customize( 'body_background_option' )(),
				primary_text = wp.customize( 'primary_text' )(),
				primary_text_option = wp.customize( 'primary_text_option' )(),
				primary_skin = wp.customize( 'primary_skin' )(),
				primary_skin_option = wp.customize( 'primary_skin_option' )();				
				
				
				/* body background */
				var body_background_light_orange = 'body.mc-light-orange, .mc-light-orange ul.nav-tabs > li a.active:after, .mc-light-orange input[type="text"], .mc-light-orange input[type="email"], .mc-light-orange input[type="url"], .mc-light-orange input[type="password"], .mc-light-orange input[type="search"], .mc-light-orange input[type="number"], .mc-light-orange input[type="tel"], .mc-light-orange input[type="range"], .mc-light-orange input[type="date"], .mc-light-orange input[type="month"], .mc-light-orange input[type="week"], .mc-light-orange input[type="time"], .mc-light-orange input[type="datetime"], .mc-light-orange input[type="datetime-local"], .mc-light-orange input[type="color"], .mc-light-orange textarea, .mc-light-orange select, .mc-light-orange fieldset, .mc-light-orange .select2-results__options li.select2-results__option.select2-results__option--highlighted, .mc-light-orange .select2-results__options li.select2-results__option.select2-results__option--highlighted:hover, .mc-light-orange .select2-results__options li.select2-results__option[aria-selected="true"], .mc-light-orange .sf-menu .sub-menu, .mc-light-orange .cel-ressources-share-content, .mc-light-orange .celestial-body-cover';
				
				var body_background_dark_blue = 'body.mc-dark-blue, .mc-dark-blue ul.nav-tabs > li a.active:after, .mc-dark-blue input[type="text"], .mc-dark-blue input[type="email"], .mc-dark-blue input[type="url"], .mc-dark-blue input[type="password"], .mc-dark-blue input[type="search"], .mc-dark-blue input[type="number"], .mc-dark-blue input[type="tel"], .mc-dark-blue input[type="range"], .mc-dark-blue input[type="date"], .mc-dark-blue input[type="month"], .mc-dark-blue input[type="week"], .mc-dark-blue input[type="time"], .mc-dark-blue input[type="datetime"], .mc-dark-blue input[type="datetime-local"], .mc-dark-blue input[type="color"], .mc-dark-blue textarea, .mc-dark-blue select, .mc-dark-blue fieldset, .mc-dark-blue .select2-results__options li.select2-results__option.select2-results__option--highlighted, .mc-dark-blue .select2-results__options li.select2-results__option.select2-results__option--highlighted:hover, .mc-dark-blue .select2-results__options li.select2-results__option[aria-selected="true"], .mc-dark-blue .sf-menu .sub-menu, .mc-dark-blue .cel-ressources-share-content, .mc-dark-blue .celestial-body-cover';				
				
				
				
				/* skin text color */
				var primary_skin_color_light_orange = '.mc-light-orange a, .mc-light-orange a:hover, .mc-light-orange blockquote:before, .mc-light-orange .skin-color, .mc-light-orange .cel-slide-box a.skin-color, .mc-light-orange .celestial-button-white, .mc-light-orange .select2-results__options li.select2-results__option.select2-results__option--highlighted:hover, .mc-light-orange .select2-results__options li.select2-results__option.select2-results__option--highlighted, .mc-light-orange .celestial-button-border.celestial-button-skin, .mc-light-orange .main-menu-control:hover, .mc-light-orange .mm-close:before, .mc-light-orange .sf-menu li a:hover, .mc-light-orange .cel-post-title a, .mc-light-orange .cel-post-title a:hover, .mc-light-orange .single .cel-post-title, .mc-light-orange .cel-post-navigation-grid .prev-posts a:hover, .mc-light-orange .cel-post-navigation-grid .next-posts a:hover, .mc-light-orange .tags-wrapper a:hover, .mc-light-orange h3.comment-reply-title, .mc-light-orange .comments-title, .mc-light-orange .widget h3.widgettitle, .mc-light-orange .widget_archive ul li a:hover, .mc-light-orange .widget_categories ul li a:hover, .mc-light-orange .widget_meta ul li a:hover, .mc-light-orange .widget_pages ul li a:hover, .mc-light-orange .widget_nav_menu ul li a:hover, .mc-light-orange .widget_recent_entries ul li a:hover, .mc-light-orange .mediaconsult_widget_posts_categories ul li a:hover, .mc-light-orange .widget_recent_comments ul li a:hover, .mc-light-orange .widget_recent_comments .comment-author-link a:hover, .mc-light-orange .widget_nav_menu ul li a:hover, .mc-light-orange .widget_nav_menu ul li.current_page_item > a, .mc-light-orange .tagcloud a:hover, .mc-light-orange .recentposts-title:hover, .mc-light-orange .page-numbers li .current, .mc-light-orange .page-numbers li a:hover, .mc-light-orange .sb-icon, .mc-light-orange .st-title, .mc-light-orange .tm-email a:hover, .mc-light-orange .nav-tabs .nav-item.show .nav-link, .mc-light-orange .nav-tabs .nav-link.active, .mc-light-orange .nav-tabs.nav-justified a.active, .mc-light-orange .nav-tabs.nav-justified a.active:hover, .mc-light-orange .nav-tabs.nav-justified a.active:focus, .mc-light-orange .cel-toggle-title a[aria-expanded="true"], .mc-light-orange .cel-toggle-title a:before, .mc-light-orange .slick-prev, .mc-light-orange .slick-next, .mc-light-orange .port-filter-section ul li a:hover, .mc-light-orange .port-filter-section ul li a.pfilter-selected, .mc-light-orange .mc-portfolio-title a:hover, .mc-light-orange .mc-port-category a:hover, .mc-light-orange .related-portfolio-title, .mc-light-orange .wp-block-latest-posts li a:hover, .mc-light-orange .wp-block-categories li a:hover, .mc-light-orange .wp-block-archives li a:hover, .mc-light-orange .slider-post-date, .mc-light-orange .header-top-search .search-submit:before, .mc-light-orange .small-listing-permalink:hover, .mc-light-orange h5.cel-slick-nav-title, .mc-light-orange h5.cel-slick-nav-title:hover, .mc-light-orange .cel-slick-nav-more a, .mc-light-orange .cel-slick-nav-more a:hover, .mc-light-orange .cel-ressources-minimal-block h4, .mc-light-orange .cel-ressources-minimal-block h4 a, .mc-light-orange .cel-ressources-minimal-block h4 a:hover, .mc-light-orange .cel-ressources-minimal-block h4 .rmb-download-icon:hover, .mc-light-orange .cel-ressources-minimal-block h4 .rmb-download-format:hover, .mc-light-orange .recentposts-list.text_only .recentposts-content:hover h6 a.recentposts-title, .mc-light-orange .elementor-widget-wp-widget-archives ul li a:hover, .mc-light-orange .elementor-widget-wp-widget-categories ul li a:hover, .mc-light-orange .elementor-widget-wp-widget-meta ul li a:hover, .mc-light-orange .elementor-widget-wp-widget-pages ul li a:hover, .mc-light-orange .elementor-widget-wp-widget-recent-comments ul li a:hover, .mc-light-orange .elementor-widget-wp-widget-recent-posts ul li a:hover, .mc-light-orange .elementor-widget-wp-widget-nav_menu ul li a:hover, .mc-light-orange .elementor-widget-wp-widget-mediaconsult_posts_categ ul li a:hover, .mc-light-orange .cel-modern-menu-alt .sf-menu li .sub-menu li a:hover, 	.mc-light-orange .cel-slick-inner-nav h5.cel-slick-nav-title, .mc-light-orange .cel-slick-inner-nav h5.cel-slick-nav-title:hover, .mc-light-orange .cel-history-title, .mc-light-orange .cel-ressources-grid .ressource-share:hover, .mc-light-orange .cel-ressources-grid .ressource-share i:hover, .mc-light-orange .elementor-widget .elementor-widget-container>h5';
				
				var primary_skin_color_dark_blue = '.mc-dark-blue a, .mc-dark-blue a:hover, .mc-dark-blue blockquote:before, .mc-dark-blue .skin-color, .mc-dark-blue .cel-slide-box a.skin-color, .mc-dark-blue .celestial-button-white, .mc-dark-blue .select2-results__options li.select2-results__option.select2-results__option--highlighted:hover, .mc-dark-blue .select2-results__options li.select2-results__option.select2-results__option--highlighted, .mc-dark-blue .celestial-button-border.celestial-button-skin, .mc-dark-blue .main-menu-control:hover, .mc-dark-blue .mm-close:before, .mc-dark-blue .sf-menu li a:hover, .mc-dark-blue .cel-post-title a, .mc-dark-blue .cel-post-title a:hover, .mc-dark-blue .single .cel-post-title, .mc-dark-blue .cel-post-navigation-grid .prev-posts a:hover, .mc-dark-blue .cel-post-navigation-grid .next-posts a:hover, .mc-dark-blue .tags-wrapper a:hover, .mc-dark-blue h3.comment-reply-title, .mc-dark-blue .comments-title, .mc-dark-blue .widget h3.widgettitle, .mc-dark-blue .widget_archive ul li a:hover, .mc-dark-blue .widget_categories ul li a:hover, .mc-dark-blue .widget_meta ul li a:hover, .mc-dark-blue .widget_pages ul li a:hover, .mc-dark-blue .widget_nav_menu ul li a:hover, .mc-dark-blue .widget_recent_entries ul li a:hover, .mc-dark-blue .mediaconsult_widget_posts_categories ul li a:hover, .mc-dark-blue .widget_recent_comments ul li a:hover, .mc-dark-blue .widget_recent_comments .comment-author-link a:hover, .mc-dark-blue .widget_nav_menu ul li a:hover, .mc-dark-blue .widget_nav_menu ul li.current_page_item > a, .mc-dark-blue .tagcloud a:hover, .mc-dark-blue .recentposts-title:hover, .mc-dark-blue .page-numbers li .current, .mc-dark-blue .page-numbers li a:hover, .mc-dark-blue .sb-icon, .mc-dark-blue .st-title, .mc-dark-blue .tm-email a:hover, .mc-dark-blue .nav-tabs .nav-item.show .nav-link, .mc-dark-blue .nav-tabs .nav-link.active, .mc-dark-blue .nav-tabs.nav-justified a.active, .mc-dark-blue .nav-tabs.nav-justified a.active:hover, .mc-dark-blue .nav-tabs.nav-justified a.active:focus, .mc-dark-blue .cel-toggle-title a[aria-expanded="true"], .mc-dark-blue .cel-toggle-title a:before, .mc-dark-blue .slick-prev, .mc-dark-blue .slick-next, .mc-dark-blue .port-filter-section ul li a:hover, .mc-dark-blue .port-filter-section ul li a.pfilter-selected, .mc-dark-blue .mc-portfolio-title a:hover, .mc-dark-blue .mc-port-category a:hover, .mc-dark-blue .related-portfolio-title, .mc-dark-blue .wp-block-latest-posts li a:hover, .mc-dark-blue .wp-block-categories li a:hover, .mc-dark-blue .wp-block-archives li a:hover, .mc-dark-blue .slider-post-date, .mc-dark-blue .header-top-search .search-submit:before, .mc-dark-blue .small-listing-permalink:hover, .mc-dark-blue h5.cel-slick-nav-title, .mc-dark-blue h5.cel-slick-nav-title:hover, .mc-dark-blue .cel-slick-nav-more a, .mc-dark-blue .cel-slick-nav-more a:hover .mc-dark-blue .cel-ressources-minimal-block h4, .mc-dark-blue .cel-ressources-minimal-block h4 a, .mc-dark-blue .cel-ressources-minimal-block h4 a:hover, .mc-dark-blue .cel-ressources-minimal-block h4 .rmb-download-icon:hover, .mc-dark-blue .cel-ressources-minimal-block h4 .rmb-download-format:hover, .mc-dark-blue .recentposts-list.text_only .recentposts-content:hover h6 a.recentposts-title, .mc-dark-blue .elementor-widget-wp-widget-archives ul li a:hover, .mc-dark-blue .elementor-widget-wp-widget-categories ul li a:hover, .mc-dark-blue .elementor-widget-wp-widget-meta ul li a:hover, .mc-dark-blue .elementor-widget-wp-widget-pages ul li a:hover, .mc-dark-blue .elementor-widget-wp-widget-recent-comments ul li a:hover, .mc-dark-blue .elementor-widget-wp-widget-recent-posts ul li a:hover, .mc-dark-blue .elementor-widget-wp-widget-nav_menu ul li a:hover, .mc-dark-blue .elementor-widget-wp-widget-mediaconsult_posts_categ ul li a:hover,  .mc-dark-blue .cel-modern-menu-alt .sf-menu li .sub-menu li a:hover, .mc-dark-blue .cel-slick-inner-nav h5.cel-slick-nav-title, .mc-dark-blue .cel-slick-inner-nav h5.cel-slick-nav-title:hover, .mc-dark-blue .cel-history-title, .mc-dark-blue .cel-ressources-grid .ressource-share:hover, .mc-dark-blue .cel-ressources-grid .ressource-share i:hover, .mc-dark-blue .elementor-widget .elementor-widget-container>h5';
				
				
				/* skin background color */
				var primary_skin_background_light_orange = '.mc-light-orange .skin-background, .mc-light-orange .btn-primary, .mc-light-orange .more-link:hover, .mc-light-orange input[type="submit"]:hover, .mc-light-orange .mailchimp-submit:hover, .mc-light-orange button:hover, .mc-light-orange .form-submit .submit:hover, .mc-light-orange .celestial-button-fill.celestial-button-skin, .mc-light-orange .cel-modern-menu .sf-menu > li > a:hover:after, .mc-light-orange .cel-modern-menu .sf-menu > li.sfHover a:after, .mc-light-orange .cel-modern-menu-alt .header-nav, .mc-light-orange .footer-menu-list li a:after, .mc-light-orange .comment-reply-link:hover, .mc-light-orange .classic-pagination a:after, .mc-light-orange #scrollUp:hover, .mc-light-orange .imgp-icon, .mc-light-orange .nav-pills .nav-link.active, .mc-light-orange .nav-pills .show > .nav-link, .mc-light-orange ul.nav-tabs li a.active:before, .mc-light-orange ul.nav-tabs li a:hover:before, .mc-light-orange .slick-prev:hover, .mc-light-orange .slick-next:hover, .mc-light-orange .cel-posts-slider-content, .mc-light-orange.minimal-sidebar .sidebar .widget_categories ul li.current-cat, .mc-light-orange.minimal-sidebar .sidebar .widget_pages ul li.current_page_item, .mc-light-orange.minimal-sidebar .sidebar .widget_nav_menu ul li.current-menu-item, .mc-light-orange.minimal-sidebar .mediaconsult_widget_posts_categories ul li.current-cat, .mc-light-orange .cel-ressources-grid .cel-ressources-category a, .mc-light-orange .cel-ressources-grid .cel-ressources-share-content .cel-ressources-share-close:hover, .mc-light-orange .document-info, .mc-light-orange .elementor-widget-wp-widget-categories ul li.current-cat, .mc-light-orange .elementor-widget-wp-widget-pages ul li.current_page_item, .mc-light-orange .elementor-widget-wp-widget-nav_menu ul li.current-menu-item, .mc-light-orange .post-cols-date a:hover, .mc-light-orange .cel-slick-inner-nav h5.cel-slick-nav-title.is-active, .mc-light-orange .cps-open-close, .mc-light-orange .cel-page-share-wrapper .cps-open-close, .mc-light-orange .sb-disk';

				var primary_skin_background_dark_blue = '.mc-dark-blue .skin-background, .mc-dark-blue .btn-primary, .mc-dark-blue .more-link:hover, .mc-dark-blue input[type="submit"]:hover, .mc-dark-blue .mailchimp-submit:hover, .mc-dark-blue button:hover, .mc-dark-blue .form-submit .submit:hover, .mc-dark-blue .celestial-button-fill.celestial-button-skin, .mc-dark-blue .cel-modern-menu .sf-menu > li > a:hover:after, .mc-dark-blue .cel-modern-menu .sf-menu > li.sfHover a:after, .mc-dark-blue .cel-modern-menu-alt .header-nav, .mc-dark-blue .footer-menu-list li a:after, .mc-dark-blue .comment-reply-link:hover, .mc-dark-blue .classic-pagination a:after, .mc-dark-blue #scrollUp:hover, .mc-dark-blue .imgp-icon, .mc-dark-blue .nav-pills .nav-link.active, .mc-dark-blue .nav-pills .show > .nav-link, .mc-dark-blue ul.nav-tabs li a.active:before, .mc-dark-blue ul.nav-tabs li a:hover:before, .mc-dark-blue .slick-prev:hover, .mc-dark-blue .slick-next:hover, .mc-dark-blue .cel-posts-slider-content, .mc-dark-blue.minimal-sidebar .sidebar .widget_categories ul li.current-cat, .mc-dark-blue.minimal-sidebar .sidebar .widget_pages ul li.current_page_item, .mc-dark-blue.minimal-sidebar .mediaconsult_widget_posts_categories ul li.current-cat, .mc-dark-blue.minimal-sidebar .sidebar .widget_nav_menu ul li.current-menu-item, .mc-dark-blue .cel-ressources-grid .cel-ressources-category a, .mc-dark-blue .cel-ressources-grid .cel-ressources-share-content .cel-ressources-share-close:hover, .mc-dark-blue .document-info, .mc-dark-blue .elementor-widget-wp-widget-categories ul li.current-cat, .mc-dark-blue .elementor-widget-wp-widget-pages ul li.current_page_item, .mc-dark-blue .elementor-widget-wp-widget-nav_menu ul li.current-menu-item, .mc-dark-blue .post-cols-date a:hover, .mc-dark-blue .cel-slick-inner-nav h5.cel-slick-nav-title.is-active, .mc-dark-blue .cps-open-close, .mc-dark-blue .cel-page-share-wrapper .cps-open-close, .mc-dark-blue .sb-disk';
				
				
				/* body text color */
				var primary_text_color_light_orange = 'body.mc-light-orange, .mc-light-orange input[type="text"], .mc-light-orange input[type="email"], .mc-light-orange input[type="url"], .mc-light-orange input[type="password"], .mc-light-orange input[type="search"], .mc-light-orange input[type="number"], .mc-light-orange input[type="tel"], .mc-light-orange input[type="range"], .mc-light-orange input[type="date"], .mc-light-orange input[type="month"], .mc-light-orange input[type="week"], .mc-light-orange input[type="time"], .mc-light-orange input[type="datetime"], .mc-light-orange input[type="datetime-local"], .mc-light-orange input[type="color"], .mc-light-orange textarea, .mc-light-orange select, .mc-light-orange fieldset, .mc-light-orange .wp-block-latest-posts li a, .mc-light-orange .wp-block-categories li a, .mc-light-orange .wp-block-archives li a, .mc-light-orange .main-menu-control, .mc-light-orange .header-nav.mm-menu, .mc-light-orange .header-nav.mm-menu a, .mc-light-orange .header-nav.mm-menu a:hover, .mc-light-orange .header-nav.mm-menu .mm-title, .mc-light-orange .header-nav.mm-menu .mm-title:hover, .mc-light-orange .header-nav.mm-menu .mm-listview .mm-next:after, .mc-light-orange .mm-menu .mm-btn:hover:after, .mc-light-orange .mm-menu .mm-btn:hover:before, .mc-light-orange .sf-menu li a, .mc-light-orange .sf-menu li li, .mc-light-orange .sf-menu li li a, .mc-light-orange .tm-email a, .mc-light-orange .tm-email a, .mc-light-orange ul.nav-tabs > li > a, .mc-light-orange ul.nav-tabs > li > a:hover, .mc-light-orange .cel-toggle-title a, .mc-light-orange .post-misc a:hover, .mc-light-orange .cel-post-navigation-grid .prev-posts a, .mc-light-orange .cel-post-navigation-grid .next-posts a, .mc-light-orange .tags-wrapper a, .mc-light-orange .comment-metadata a:hover, .mc-light-orange .widget_archive ul li a, .mc-light-orange .widget_categories ul li a, .mc-light-orange .widget_meta ul li a, .mc-light-orange .widget_nav_menu ul li a, .mc-light-orange .widget_pages ul li a, .mc-light-orange .widget_recent_comments ul li a, .mc-light-orange .widget_recent_entries ul li a, .mc-light-orange .widget_rss ul li a, .mc-light-orange .mediaconsult_widget_posts_categories ul li a, .mc-light-orange .widget_recent_comments ul li a, .mc-light-orange .widget_recent_comments .comment-author-link a, .mc-light-orange .tagcloud a, .mc-light-orange .recentposts-title, .mc-light-orange .recentposts-list.text_only .recentposts-content:hover .recentposts-title, .mc-light-orange .cel-ressources-grid h2 a, .mc-light-orange .cel-ressources-grid h2';
				
				var primary_text_color_dark_blue = 'body.mc-dark-blue, .mc-dark-blue input[type="text"], .mc-dark-blue input[type="email"], .mc-dark-blue input[type="url"], .mc-dark-blue input[type="password"], .mc-dark-blue input[type="search"], .mc-dark-blue input[type="number"], .mc-dark-blue input[type="tel"], .mc-dark-blue input[type="range"], .mc-dark-blue input[type="date"], .mc-dark-blue input[type="month"], .mc-dark-blue input[type="week"], .mc-dark-blue input[type="time"], .mc-dark-blue input[type="datetime"], .mc-dark-blue input[type="datetime-local"], .mc-dark-blue input[type="color"], .mc-dark-blue textarea, .mc-dark-blue select, .mc-dark-blue fieldset, .mc-dark-blue .wp-block-latest-posts li a, .mc-dark-blue .wp-block-categories li a, .mc-dark-blue .wp-block-archives li a, .mc-dark-blue .main-menu-control, .mc-dark-blue .header-nav.mm-menu, .mc-dark-blue .header-nav.mm-menu a, .mc-dark-blue .header-nav.mm-menu a:hover, .mc-dark-blue .header-nav.mm-menu .mm-title, .mc-dark-blue .header-nav.mm-menu .mm-title:hover, .mc-dark-blue .header-nav.mm-menu .mm-listview .mm-next:after, .mc-dark-blue .mm-menu .mm-btn:hover:after, .mc-dark-blue .mm-menu .mm-btn:hover:before, .mc-dark-blue .sf-menu li a, .mc-dark-blue .sf-menu li li, .mc-dark-blue .sf-menu li li a, .mc-dark-blue .tm-email a, .mc-dark-blue .tm-email a, .mc-dark-blue ul.nav-tabs > li > a, .mc-dark-blue ul.nav-tabs > li > a:hover, .mc-dark-blue .cel-toggle-title a, .mc-dark-blue .post-misc a:hover, .mc-dark-blue .cel-post-navigation-grid .prev-posts a, .mc-dark-blue .cel-post-navigation-grid .next-posts a, .mc-dark-blue .tags-wrapper a, .mc-dark-blue .comment-metadata a:hover, .mc-dark-blue .widget_archive ul li a, .mc-dark-blue .widget_categories ul li a, .mc-dark-blue .widget_meta ul li a, .mc-dark-blue .widget_nav_menu ul li a, .mc-dark-blue .widget_pages ul li a, .mc-dark-blue .widget_recent_comments ul li a, .mc-dark-blue .widget_recent_entries ul li a, .mc-dark-blue .widget_rss ul li a, .mc-dark-blue .mediaconsult_widget_posts_categories ul li a, .mc-dark-blue .widget_recent_comments ul li a, .mc-dark-blue .widget_recent_comments .comment-author-link a, .mc-dark-blue .tagcloud a, .mc-dark-blue .recentposts-title, .mc-dark-blue .recentposts-list.text_only .recentposts-content:hover .recentposts-title, .mc-dark-blue .cel-ressources-grid h2 a, .mc-dark-blue .cel-ressources-grid h2';
				
				
				
				
				var light_color_overwrite_light_orange = '.mc-light-orange .media-wrapper .media-icon a, .mc-light-orange input[type="submit"], .mc-light-orange button, .mc-light-orange .more-link, .mc-light-orange .form-submit .submit, .mc-light-orange .mailchimp-submit, .mc-light-orange #scrollUp';
				
				var light_color_overwrite_dark_blue = '.mc-dark-blue .media-wrapper .media-icon a, .mc-dark-blue input[type="submit"], .mc-dark-blue button, .mc-dark-blue .more-link, .mc-dark-blue .form-submit .submit, .mc-dark-blue .mailchimp-submit, .mc-dark-blue #scrollUp';
				
				
				
				var secondary_color_overwrite_light_orange = '.mc-light-orange .post-misc a';
				
				var secondary_color_overwrite_dark_blue = '.mc-dark-blue .post-misc a';
				
				

				
				/* 1. BODY BACKGROUND COLOR */
				if ( 'enabled' === body_background_option ) {
					
					if( 'light_orange' === colorscheme ) {
						
						$( body_background_light_orange ).css( 'background-color', body_background );
						
						
						/* exceptions */
						$( light_color_overwrite_light_orange ).css( 'color', '#ffffff' );
						
						$( secondary_color_overwrite_light_orange ).css( 'color', '#909396' );						
					}

					if( 'dark_blue' === colorscheme ) {
						
						$( body_background_dark_blue ).css( 'background-color', body_background );
						
						
						/* exceptions */
						$( light_color_overwrite_dark_blue ).css( 'color', '#f2f7fa' );
						
						$( secondary_color_overwrite_dark_blue ).css( 'color', '#676f77' );						
					}
					
				} else {
						
					$( body_background_light_orange ).css( 'background-color', '#ffffff' );
					
					$( body_background_dark_blue ).css( 'background-color', '#15161e' );
					
				}
				
				
				
				
				/* 2. BODY TEXT COLOR */
				if ( 'enabled' === primary_text_option ) {
					
					
					if( 'light_orange' === colorscheme ) {
						$( '#custom-theme-colors' ).append( primary_text_color_light_orange + '{color:' + primary_text + '}' );
					}
					if( 'dark_blue' === colorscheme ) {
						$( '#custom-theme-colors' ).append( primary_text_color_dark_blue + '{color:' + primary_text + '}' );
					}
					

				} else {
					
					if( 'light_orange' === colorscheme ) {
						$( '#custom-theme-colors' ).append( primary_text_color_light_orange + '{color:#65696e}' );
					}
					if( 'dark_blue' === colorscheme ) {
						$( '#custom-theme-colors' ).append( primary_text_color_dark_blue + '{color:#9fa9b2}' );
					}

				}
				
				
				
				
				/* 3. SKIN OPTION */
				if ( 'enabled' === primary_skin_option ) {
				
					
					
					if( 'light_orange' === colorscheme ) {
						
						
						/* text color, background color, normal, hover state & pseudo-classes */
						$( '#custom-theme-colors' ).append( primary_skin_color_light_orange + '{color:' + primary_skin + '}' + primary_skin_background_light_orange + '{background-color:' + primary_skin + '}' );
												
						
						
						/* particularities */
						$( '.mc-light-orange .bg-primary' ).css( 'background-color', primary_skin + ' !important;' );				
						
						$( '.mc-light-orange .btn-primary, .mc-light-orange .celestial-button-border.celestial-button-skin, .mc-light-orange .ptw-border-skin, .mc-light-orange .cel-ressources-grid .cel-ressources-share-content .cel-ressources-share-close:hover, .mc-light-orange .cel-ressources-grid .cel-ressource-download:hover, .mc-light-orange .cel-ressource-detail-wrapper .cel-ressource-download:hover, .mc-light-orange .cel-slick-inner-nav h5.cel-slick-nav-title.is-active' ).css( 'border-color', primary_skin );
						
						$( '.mc-light-orange .cel-underline span, .mc-light-orange .cel-sitemap-list.cel-sitemap-list-pages li a span' ).css( 'background-image', 'linear-gradient(transparent calc(100% - 2px), ' + primary_skin + ' 2px )' );
						
						$( '.mc-light-orange .cel-loader-animation' ).css( 'border-top-color', primary_skin );
						
						
						/* exceptions */
						$( light_color_overwrite_light_orange ).css( 'color', '#ffffff' );
						
						$( secondary_color_overwrite_light_orange ).css( 'color', '#909396' );
						
						
					}
					
					
					
					if( 'dark_blue' === colorscheme ) {
						
						
						/* text color, background color, normal, hover state & pseudo-classes */
						$( '#custom-theme-colors' ).append( primary_skin_color_dark_blue + '{color:' + primary_skin + '}' + primary_skin_background_dark_blue + '{background-color:' + primary_skin + '}' );						
						
						
						
						/* particularities */						
						$( '.mc-dark-blue .bg-primary' ).css( 'background-color', primary_skin + ' !important;' );				
						
						$( '.mc-dark-blue .btn-primary, .mc-dark-blue .celestial-button-border.celestial-button-skin, .mc-dark-blue .ptw-border-skin, .mc-dark-blue .cel-ressources-grid .cel-ressources-share-content .cel-ressources-share-close:hover, .mc-dark-blue .cel-ressources-grid .cel-ressource-download:hover, .mc-dark-blue .cel-ressource-detail-wrapper .cel-ressource-download:hover, .mc-dark-blue .cel-slick-inner-nav h5.cel-slick-nav-title.is-active' ).css( 'border-color', primary_skin );
						
						$( '.mc-dark-blue .cel-underline span, .mc-dark-blue .cel-sitemap-list.cel-sitemap-list-pages li a span' ).css( 'background-image', 'linear-gradient(transparent calc(100% - 2px), ' + primary_skin + ' 2px )' );
						
						$( '.mc-dark-blue .cel-loader-animation' ).css( 'border-top-color', primary_skin );
						
						
						/* exceptions */
						$( light_color_overwrite_dark_blue ).css( 'color', '#f2f7fa' );
						
						$( secondary_color_overwrite_dark_blue ).css( 'color', '#676f77' );
						
						
					}					
				
					
				} else {

					
					/* LIGHT ORANGE DEFAULTS */
					if( 'light_orange' === colorscheme ) {
						
						/* text color, background color, normal, hover state & pseudo-classes */
						$( '#custom-theme-colors' ).html( primary_skin_color_light_orange + '{color: #f87b27}' + primary_skin_background_light_orange + '{background-color: #f87b27}' );



						/* particularities */							
						$( '.mc-light-orange .bg-primary' ).css( 'background-color', '#f87b27 !important;' );				

						$( '.mc-light-orange .btn-primary, .mc-light-orange .celestial-button-border.celestial-button-skin, .mc-light-orange .ptw-border-skin, .mc-light-orange .cel-ressources-grid .cel-ressources-share-content .cel-ressources-share-close:hover, .mc-light-orange .cel-ressources-grid .cel-ressource-download:hover, .mc-light-orange .cel-slick-inner-nav h5.cel-slick-nav-title.is-active' ).css( 'border-color', '#f87b27' );

						$( '.mc-light-orange .cel-underline span, .mc-light-orange .cel-sitemap-list.cel-sitemap-list-pages li a span' ).css( 'background-image', 'linear-gradient(transparent calc(100% - 2px), #f87b27 2px )' );

						$( '.mc-light-orange .cel-loader-animation' ).css( 'border-top-color', '#f87b27' );
						

						/* exceptions */
						$( light_color_overwrite_light_orange ).css( 'color', '#ffffff' );

						$( secondary_color_overwrite_light_orange ).css( 'color', '#909396' );
					
					}

					
					/* DARK BLUE DEFAULTS */
					if( 'dark_blue' === colorscheme ) {
					
						/* text color, background color, normal, hover state & pseudo-classes */
						$( '#custom-theme-colors' ).html( primary_skin_color_dark_blue + '{color: #3194d9}' + primary_skin_background_dark_blue + '{background-color: #3194d9}' );

						
						
						/* particularities */
						$( '.mc-dark-blue .bg-primary' ).css( 'background-color', '#3194d9 !important;' );			

						$( '.mc-dark-blue .btn-primary, .mc-dark-blue .celestial-button-border.celestial-button-skin, .mc-dark-blue .ptw-border-skin, .mc-dark-blue .cel-ressources-grid .cel-ressources-share-content .cel-ressources-share-close:hover, .mc-dark-blue .cel-ressources-grid .cel-ressource-download:hover, .mc-dark-blue .cel-slick-inner-nav h5.cel-slick-nav-title.is-active' ).css( 'border-color', '#3194d9' );

						$( '.mc-dark-blue .cel-underline span, .mc-dark-blue .cel-sitemap-list.cel-sitemap-list-pages li a span' ).css( 'background-image', 'linear-gradient(transparent calc(100% - 2px), #3194d9 2px )' );	

						$( '.mc-dark-blue .cel-loader-animation' ).css( 'border-top-color', '#3194d9' );
						
						
						/* exceptions */
						$( light_color_overwrite_dark_blue ).css( 'color', '#f2f7fa' );

						$( secondary_color_overwrite_dark_blue ).css( 'color', '#676f77' );
						
					}
					
					
					
					/* BODY TEXT COLOR if the custom skin color is disabled */
					if ( 'enabled' === primary_text_option ) {


						if( 'light_orange' === colorscheme ) {
							$( '#custom-theme-colors' ).append( primary_text_color_light_orange + '{color:' + primary_text + '}' );
						}
						if( 'dark_blue' === colorscheme ) {
							$( '#custom-theme-colors' ).append( primary_text_color_dark_blue + '{color:' + primary_text + '}' );
						}


					} else {

						if( 'light_orange' === colorscheme ) {
							$( '#custom-theme-colors' ).append( primary_text_color_light_orange + '{color:#65696e}' );
						}
						if( 'dark_blue' === colorscheme ) {
							$( '#custom-theme-colors' ).append( primary_text_color_dark_blue + '{color:#9fa9b2}' );
						}

					}					
					
					

				}
				

				

				
			} );
		} );
	} );
	
	
	

} )( jQuery );
