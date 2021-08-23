<?php get_header(); ?>

<?php 
	$mediaconsult_display_sidebar = get_post_meta( $post->ID, 'mediaconsult_display_sidebar', true );

	$mediaconsult_section_tone_value = mediaconsult_section_tone();
?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" role="main">
	
	<?php if( $mediaconsult_display_sidebar == 'false' ) { ?>


		<?php if ( have_posts() ) :
			while( have_posts() ) : the_post(); ?>


				<div class="page-content page-content-fullwidth">

					<?php the_content(); ?>

					<?php if ( in_array( 'mc-shortcodes/mc-shortcodes.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

						if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

							echo do_shortcode('[post_share elementor="true"]');
						
						} else {
							
							echo do_shortcode('[post_share]');

						}

					} ?>

					<?php comments_template(); ?>

				</div>


			<?php endwhile;
		endif; ?>


	<?php } else { ?>


		<div class="content-<?php echo esc_attr( mediaconsult_sidebar_position() ); ?>-grid">

			<div class="inner-content">

				<?php if ( have_posts() ) : 
					while( have_posts() ) : the_post();
				  		
				  
						/* ressource download link */
						$mediaconsult_ressource_download_link = get_post_meta( $post->ID, '_mc_ressource_download_link', true );

						/* ressource size */
						$mediaconsult_ressource_size = get_post_meta( $post->ID, '_mc_ressource_size', true );

						/* ressource format */
						$mediaconsult_ressource_format = get_post_meta( $post->ID, '_mc_ressource_format', true );				  
				  		
				  		?>
				  		
				  		
				  		<div class="cel-ressource-detail-wrapper">
				  		
							<?php if( has_post_thumbnail() ) { ?>

								<div class="onethird-left-grid">

									<div class="cgrid-item">
										<?php the_post_thumbnail(); ?>
									</div>

									<div class="cgrid-item">

										<span class="small-secondary ressource-date crd-date">
											<i class="mi-icon mi-icon-calendar2"></i><?php echo esc_html( get_the_date() ); ?>
										</span>
										
										<?php if ( $mediaconsult_ressource_format ) { ?>

											<span class="small-secondary ressource-format crd-format">
												<i class="mi-icon mi-icon-file-text"></i><?php echo esc_html( $mediaconsult_ressource_format ); ?>
											</span>

										<?php } ?>															
										<div class="clearboth"></div>


										<h1 class="crd-title skin-color"><?php the_title(); ?></h1>


										<div class="crd-share">
											<?php if ( in_array( 'mc-shortcodes/mc-shortcodes.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

												if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

													echo do_shortcode('[post_share elementor="true"]');
												
												} else {
													
													echo do_shortcode('[post_share]');

												}

											} ?>
										</div>									
										<div class="clearboth"></div>
																			
																				
										<?php if ( $mediaconsult_ressource_download_link ) { ?>

											<a href="<?php esc_url( $mediaconsult_ressource_download_link ); ?>" class="celestial-button celestial-button-border cel-ressource-download">

												<?php esc_html_e( 'Download', 'mediaconsult' ); ?>

												<?php if ( $mediaconsult_ressource_size ) { ?>
													<span>(<?php echo esc_html( $mediaconsult_ressource_size ); ?>)</span>
												<?php } ?>

											</a>

										<?php } ?>

									</div>

								</div>

							<?php }	else { ?>

								<span class="small-secondary ressource-date crd-date">
									<i class="mi-icon mi-icon-calendar2"></i><?php echo esc_html( get_the_date() ); ?>
								</span>

								<?php if ( $mediaconsult_ressource_format ) { ?>

									<span class="small-secondary ressource-format crd-format">
										<i class="mi-icon mi-icon-file-text"></i><?php echo esc_html( $mediaconsult_ressource_format ); ?>
									</span>

								<?php } ?>															
								<div class="clearboth"></div>


								<h1 class="crd-title skin-color"><?php the_title(); ?></h1>


								<div class="crd-share">
									<?php if ( in_array( 'mc-shortcodes/mc-shortcodes.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

										if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

											echo do_shortcode('[post_share elementor="true"]');
										
										} else {
											
											echo do_shortcode('[post_share]');

										}

									} ?>
								</div>									
								<div class="clearboth"></div>


								<?php if ( $mediaconsult_ressource_download_link ) { ?>

									<a href="<?php esc_url( $mediaconsult_ressource_download_link ); ?>" class="celestial-button celestial-button-border cel-ressource-download">

										<?php esc_html_e( 'Download', 'mediaconsult' ); ?>

										<?php if ( $mediaconsult_ressource_size ) { ?>
											<span>(<?php echo esc_html( $mediaconsult_ressource_size ); ?>)</span>
										<?php } ?>

									</a>

								<?php } ?>

							<?php } ?>						  						  		

							<div class="cel-ressource-single-content">
							
								<?php the_content(); ?>
								
							</div>
							
							<?php comments_template(); ?>
						
						
						</div>
						
					<?php endwhile;
				endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	<?php } ?>

	
</main><!-- end of .celestial-main -->

<?php get_footer(); ?>