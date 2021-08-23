<div class="footer-bottom-grid <?php echo mediaconsult_reverse_fbottom(); ?>">

	<div class="fbottom-left">
		
		<?php if ( 'true' === get_theme_mod( 'fbottom_content_option', 'false' ) ) {
		
			echo mediaconsult_social_media_profiles();
		
		} else { ?>
		
		<nav>

			<?php wp_nav_menu(
				array(
					'menu' 					=> 'mediaconsult-footer-menu',
					'theme_location' 		=> 'mediaconsult-footer-menu',
					'menu_class' 			=> 'footer-menu-list',
					'depth'					=> 1,
					'fallback_cb' 			=> false
				)


			); ?>

		</nav>	
		
		<?php } ?>		

	</div>

	<div class="fbottom-right">

		<?php if( get_theme_mod( 'footer_copyright_text' ) ) { ?>

			<div class="impressum">

				<?php echo wp_kses( get_theme_mod( 'footer_copyright_text' ),
					array(
						'a' => array(
							'href' => array(),
							'title' => array()
						),
						'strong' => array(),
						'em' => array(),
						'br' => array(),
						'span' => array(),
					)
				); ?>							

			</div>

		<?php } ?>

	</div>

</div>