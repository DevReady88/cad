<?php 

	get_header();

	$mediaconsult_section_tone_value = mediaconsult_section_tone();
?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" role="main">

	<div class="page-content page-content-fullwidth">
						
		<div class="pnf-image-wrapper">
		
			<?php if ( get_theme_mod('pnf_image' ) ) { ?>

				<img src="<?php echo esc_url( get_theme_mod('pnf_image' ) ); ?>" alt="<?php echo esc_attr( '404 - Page Not Found', 'mediaconsult' ); ?>" class="pnf-image" />	

			<?php } else { ?>

				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/page_not_found.png' ); ?>" alt="<?php echo esc_attr( '404 - Page Not Found', 'mediaconsult' ); ?>" class="pnf-image" />	

			<?php } ?>
			
		</div>
		
		
		<h3 class="pnf-title cel-center skin-color"><?php esc_html_e( 'Oops! We couldn\'t find that web page.', 'mediaconsult' ); ?></h3>
		
		<div class="cel-center">
			<a href="<?php echo esc_url( home_url('/') ); ?>" class="celestial-button celestial-button-fill celestial-button-skin"><?php esc_html_e( 'Return Home', 'mediaconsult' ); ?></a>
		</div>
		
	</div>
	
</main><!-- end of .celestial-main -->

<?php get_footer(); ?>