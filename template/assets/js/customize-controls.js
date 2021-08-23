/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function() {
	wp.customize.bind( 'ready', function() {

		// Only show the color hue control when there's a custom color scheme.
		wp.customize( 'colorscheme', function( setting ) {
			wp.customize.control( 'colorscheme_hue', function( control ) {
				var visibility = function() {
					if ( 'custom' === setting.get() ) {
						control.container.slideDown( 180 );
					} else {
						control.container.slideUp( 180 );
					}
				};

				visibility();
				setting.bind( visibility );
			});
		});

		
		// Only show the body background color hue control when the setting is set to enabled
		wp.customize( 'body_background_option', function( setting ) {
			wp.customize.control( 'body_background', function( control ) {
				var visibility = function() {
					if ( 'enabled' === setting.get() ) {
						control.container.slideDown( 180 );
					} else {
						control.container.slideUp( 180 );
					}
				};

				visibility();
				setting.bind( visibility );
			});
		});					
		
		
		// Only show the main text color hue control when the setting is set to enabled
		wp.customize( 'primary_skin_option', function( setting ) {
			wp.customize.control( 'primary_skin', function( control ) {
				var visibility = function() {
					if ( 'enabled' === setting.get() ) {
						control.container.slideDown( 180 );
					} else {
						control.container.slideUp( 180 );
					}
				};

				visibility();
				setting.bind( visibility );
			});
		});
		

		// Only show the text color hue control when the setting is set to enabled
		wp.customize( 'primary_text_option', function( setting ) {
			wp.customize.control( 'primary_text', function( control ) {
				var visibility = function() {
					if ( 'enabled' === setting.get() ) {
						control.container.slideDown( 180 );
					} else {
						control.container.slideUp( 180 );
					}
				};

				visibility();
				setting.bind( visibility );
			});
		});
		
		
		// Only show the text color hue control when the setting is set to enabled
		wp.customize( 'header_topright_content', function( setting ) {
			wp.customize.control( 'header_topright_content_phone', function( control ) {
				var visibility = function() {
					if ( 'true_email_phone' === setting.get() ) {
						control.container.slideDown( 180 );
					} else {
						control.container.slideUp( 180 );
					}
				};

				visibility();
				setting.bind( visibility );
			});
			wp.customize.control( 'header_topright_content_email', function( control ) {
				var visibility = function() {
					if ( 'true_email_phone' === setting.get() ) {
						control.container.slideDown( 180 );
					} else {
						control.container.slideUp( 180 );
					}
				};

				visibility();
				setting.bind( visibility );
			});
			wp.customize.control( 'header_topright_sm', function( control ) {
				var visibility = function() {
					if ( 'true_email_phone' === setting.get() ) {
						control.container.slideDown( 180 );
					} else {
						control.container.slideUp( 180 );
					}
				};

				visibility();
				setting.bind( visibility );
			});			
		});
		
		

		// Only show the text color hue control when the setting is set to enabled
		wp.customize( 'header_topright_content', function( setting ) {
			wp.customize.control( 'header_top_presentation', function( control ) {
				var visibility = function() {
					if ( 'true_search' === setting.get() ) {
						control.container.slideDown( 180 );
					} else {
						control.container.slideUp( 180 );
					}
				};

				visibility();
				setting.bind( visibility );
			});
			wp.customize.control( 'header_top_search', function( control ) {
				var visibility = function() {
					if ( 'true_search' === setting.get() ) {
						control.container.slideDown( 180 );
					} else {
						control.container.slideUp( 180 );
					}
				};

				visibility();
				setting.bind( visibility );
			});		
		});
		
		
		
		
		// Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
		wp.customize.section( 'theme_options', function( section ) {
			section.expanded.bind( function( isExpanding ) {

				// Value of isExpanding will = true if you're entering the section, false if you're leaving it.
				wp.customize.previewer.send( 'section-highlight', { expanded: isExpanding });
			} );
		} );
	});
})( jQuery );
