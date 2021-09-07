<?php if ( get_theme_mod( 'header_topright_content_phone' ) || get_theme_mod( 'header_topright_content_email' ) ) { ?>

	<div class="fdfsdf topright-section-wrapper <?php echo mediaconsult_wpml_topright_section(); ?>">
		
		<div class="topright-section">
		
			<?php if ( get_theme_mod( 'header_topright_content_email' ) ) { ?>

			<div class="tr-email">
				<i class="mi-icon mi-icon-envelop"></i>
				<span>
					<a href="mailto:<?php echo esc_html( get_theme_mod( 'header_topright_content_email' ) ); ?>"><?php echo esc_html( get_theme_mod( 'header_topright_content_email' ) ); ?></a>
				</span>
			</div>

			<?php } ?>


			<?php if ( get_theme_mod( 'header_topright_content_phone' ) ) { ?>

			<div class="tr-phone">
				<i class="mi-icon mi-icon-phone2"></i><span><?php echo esc_html( get_theme_mod( 'header_topright_content_phone' ) ); ?></span>
			</div>

			<?php } ?>
			
		</div><!-- end of .topright-section -->

		<?php 
		
		if ( 'true' === get_theme_mod( 'header_topright_sm', 'false' ) ) {
		
			echo mediaconsult_social_media_profiles();
		
		} ?>

	</div><!-- end of .topright-section-wrapper -->

<?php } ?>