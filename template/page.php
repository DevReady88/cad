<?php 

	get_header();

	$mediaconsult_section_tone_value = mediaconsult_section_tone();

	$mediaconsult_display_page_title = get_post_meta( $post->ID, '_mediaconsult_display_page_title', true );

	$mediaconsult_display_sidebar = get_post_meta( $post->ID, '_mediaconsult_display_sidebar', true );

?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" role="main">
	
	
		<?php if( $mediaconsult_display_sidebar == 'yes' ) { ?>


			<div class="content-<?php echo esc_attr( mediaconsult_sidebar_position() ); ?>-grid">

				<div class="inner-content">
		
					<?php if ( have_posts() ) : 
						while( have_posts() ) : the_post(); ?>


							<div class="page-content">
							
								<?php if( $mediaconsult_display_page_title != 'no' ) {

									get_template_part( 'page-title-section' );

								} ?>
								
								
								<?php

								the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mediaconsult' ),
									'after'  => '</div>',
								) ); 							

								comments_template(); ?>

							</div>


						<?php endwhile;
					endif; ?>

				</div>

				<?php get_sidebar(); ?>

			</div>
			
			
		<?php } else { ?>
		

											
			<?php if ( have_posts() ) : 
				while( have_posts() ) : the_post(); ?>


					<div class="page-content page-content-fullwidth">
						
		
						<?php if( $mediaconsult_display_page_title != 'no' ) {

							get_template_part( 'page-title-section' );

						} ?>
					
					
						<?php 
					  	
					  	the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mediaconsult' ),
							'after'  => '</div>',
						) ); 							

						comments_template(); ?>

					</div>


				<?php endwhile;
			endif; ?>
			

		<?php } ?>

		<?php

			if( is_front_page() ){ ?>

				<div></div>

			<?}

		?>
	

</main><!-- end of .celestial-main -->

<?php get_footer(); ?>