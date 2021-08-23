<?php $mediaconsult_section_tone_value = mediaconsult_section_tone(); ?>
			
		<footer class="section-<?php echo esc_attr( $mediaconsult_section_tone_value[2] ); ?> main-footer" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[2] ); ?>">
			
			<div class="cel-wrapper footer-separator">
				<div class="thick-line-separator"></div>
			</div>
				
			<!-- we use this class for selective refresh -->
			<div class="footer-sidebars-wrapper">
				
			<?php if( 'false' !== get_theme_mod( 'footer_sidebars', 'true' ) ) {

				$mediaconsult_footer_cols = get_theme_mod( 'footer_columns' );

				switch ( $mediaconsult_footer_cols ) {
					case 1:
						get_template_part( 'inc/footer/1columns' );
						break;
					case 2:
						get_template_part( 'inc/footer/2columns' );
						break;
					case 3:
						get_template_part( 'inc/footer/3columns' );
						break;
					case 4:
						get_template_part( 'inc/footer/4columns' );
						break;
					case 5:
						get_template_part( 'inc/footer/5columns' );
						break;
					default:
						get_template_part( 'inc/footer/4columns' );
						break;
				}           	

			} ?>

			</div>
			
			
			<div class="footer-bottom-wrapper">
				
				<?php get_template_part( 'inc/footer-bottom' ); ?>
				
			</div>
			
			
		</footer>
		
		
		<?php wp_footer(); ?>
	</body>
</html>