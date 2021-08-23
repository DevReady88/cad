<?php 
/*
Template Name: Ressources
*/

	get_header();
	

	/* get layout type */
	$mediaconsult_post_layout = get_post_meta( $post->ID, '_mediaconsult_post_layout', true );

	
	/* display or hide the page title */
	$mediaconsult_display_page_title = get_post_meta( $post->ID, '_mediaconsult_display_page_title', true );

	
	/* display or hide the post filters */
	$mediaconsult_display_post_filters = get_post_meta( $post->ID, '_mediaconsult_display_post_filters', true );
	
	
	/* layout type */
	$mediaconsult_ressource_layout = get_post_meta( $post->ID, '_mediaconsult_ressource_layout', true );



	global $more;

?>

<?php $mediaconsult_section_tone_value = mediaconsult_section_tone(); ?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1]) ; ?>" role="main">

	<?php if ( 'no' != $mediaconsult_display_post_filters  ) { ?>
	
		<div class="page-content page-content-fullwidth">

			<?php get_template_part( 'inc/ressources-top-filters' ); ?>

		</div>

	<?php }	?>
						
	
	<div class="content-<?php echo esc_attr( mediaconsult_sidebar_position() ); ?>-grid">

		<?php echo mediaconsult_posts_wrapper_output( 'top' ); ?>
		
			
		<?php if( $mediaconsult_display_page_title != 'no' && $mediaconsult_display_post_filters == 'no' ) {

			get_template_part( 'page-title-section' );

		} ?>

		
		<?php if( function_exists( 'mediaconsult_custom_post_ressources' ) ) { ?>
			
			<ul class="cel-ressources-ul <?php if ( $mediaconsult_ressource_layout == 'minimal' ) { echo "crl-lines"; }?>">
			
			<?php $mediaconsult_query = new WP_Query( mediaconsult_ressources_query() );

			if ( $mediaconsult_query -> have_posts() ) {

				while ( $mediaconsult_query -> have_posts() ) {

				$mediaconsult_query -> the_post();
				
				/* ressource download link */
				$mediaconsult_ressource_download_link = get_post_meta( $post->ID, '_mc_ressource_download_link', true );
				
				/* ressource size */
				$mediaconsult_ressource_size = get_post_meta( $post->ID, '_mc_ressource_size', true );
					
				/* ressource format */
				$mediaconsult_ressource_format = get_post_meta( $post->ID, '_mc_ressource_format', true );
				
				/* has post detail: 1 true / 2 false */
				$mediaconsult_ressource_post_detail = get_post_meta( $post->ID, '_mc_ressource_post_detail', true );
				
				?>
				

				<li>
				
				<?php if ( $mediaconsult_ressource_layout == 'minimal' ) { ?>
				
					<article class="cel-ressources-minimal-block" itemscope itemtype="http://schema.org/Article">
						
						
						<?php if ( $mediaconsult_ressource_post_detail == '1' ) { ?>
						
						<h4>
							<a href="<?php echo esc_url( get_permalink() ); ?>" class="cel-underline">
								<span><?php the_title(); ?></span>
							</a>
							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<span class="rmb-download-icon"><i class="fa fa-angle-right"></i></span>
							</a>
						</h4>
						
						<?php } else { ?>
						
						<h4>
							<a href="<?php echo esc_url( $mediaconsult_ressource_download_link ); ?>" class="cel-underline">
								<span><?php the_title(); ?></span>
							</a>
							<a href="<?php echo esc_url( $mediaconsult_ressource_download_link ); ?>">
								<span class="rmb-download-format"><?php echo esc_html( $mediaconsult_ressource_format ); ?></span>
							</a>
						</h4>
											
						<?php } ?>
						
					</article>
				
				<?php } else { ?>
				
					<?php $featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' ); ?>
					
					
					<article class="cel-ressources-grid <?php if ( !$featured_image_url ) { echo "cel-ressources-no-grid"; } ?>" itemscope itemtype="http://schema.org/Article">	

						<div class="cel-ressources-img">

						<?php if ( $mediaconsult_ressource_post_detail == '1' ) { ?>

							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<span class="res-image" style="background-image: url('<?php echo esc_url( $featured_image_url[0] ); ?>');"></span>
							</a>

						<?php } else { ?>

							<span class="res-image" style="background-image: url('<?php echo esc_url( $featured_image_url[0] ); ?>');"></span>

						<?php } ?>

						</div>


						<div class="cel-ressources-info">

							<div class="cel-ressources-category"><?php echo mediaconsult_custom_taxonomies_terms_links(', '); ?></div>

							<h2 class="cel-ressources-title">

								<?php if ( $mediaconsult_ressource_post_detail == '1' ) { ?>

								<a href="<?php echo esc_url( get_permalink() ); ?>" class="cel-underline">
									<span><?php the_title(); ?></span>
								</a>

								<?php } else {

									the_title();

								} ?>

							</h2>

							<div class="cel-ressources-meta">

								<?php if ( in_array( 'mc-shortcodes/mc-shortcodes.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>

									<span class="ressource-share">
										<i class="mi-icon mi-icon-share3"></i>
									</span>

									<div class="cel-ressources-share-content">
										
										<?php if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

											echo do_shortcode('[post_share_minimal elementor="true"]');
										
										} else {
											
											echo do_shortcode('[post_share_minimal]');

										} ?>

										<span class="cel-ressources-share-close"><i class="mi-icon mi-icon-cross3"></i></span>
										
									</div>
								
								<?php } ?>


								<?php if ( $mediaconsult_ressource_download_link ) { ?>
								
									<a href="<?php esc_url( $mediaconsult_ressource_download_link ); ?>" class="celestial-button celestial-button-border cel-ressource-download">

										<?php esc_html_e( 'Download', 'mediaconsult' ); ?>

										<?php if ( $mediaconsult_ressource_size ) { ?>
											<span>(<?php echo esc_html( $mediaconsult_ressource_size ); ?>)</span>
										<?php } ?>

									</a>
									
								<?php } else { ?>
									
									<a href="<?php echo esc_url( get_permalink() ); ?>" class="celestial-button celestial-button-border cel-ressource-download">

										<?php esc_html_e( 'Learn More', 'mediaconsult' ); ?>

									</a>									
									
								<?php } ?>

								<span class="small-secondary ressource-date">
									<i class="mi-icon mi-icon-calendar2"></i><?php echo esc_html( get_the_date() ); ?>
								</span>
								
								<?php if ( $mediaconsult_ressource_format ) { ?>
								
								<span class="small-secondary ressource-format">
									<i class="mi-icon mi-icon-file-text"></i><?php echo esc_html( $mediaconsult_ressource_format ); ?>
								</span>
								
								<?php } ?>
							</div>

						</div>

					</article>
					
					</li>
					
				<?php }
				
				} ?>

				</ul>
				
			<?php } else {

				esc_html_e( 'The ressources library doesn\'t contain any posts.', 'mediaconsult' );

			} ?>


			<?php if( get_theme_mod( 'ressources_pagination_type' ) == 'numbered' ) { ?>

				<div class="portfolio-pagination"><?php echo mediaconsult_pagination( $mediaconsult_query ); ?></div>

			<?php } else { ?>

				<div class="classic-pagination portfolio-pagination">
					<?php next_posts_link(esc_html__( '&larr; Older Entries', 'mediaconsult' ), $mediaconsult_query -> max_num_pages ) ?>
					<?php previous_posts_link( esc_html__( 'Newer Entries &rarr;', 'mediaconsult' ) ) ?>
				</div>

			<?php } ?>


		<?php } else { ?>

			<p class="cel-no-custom-post">
				<?php esc_html_e( 'Before using the portfolio 3 columns template please enable the MC Custom Posts Plugin that comes with the theme.', 'mediaconsult' ); ?>
			</p>

		<?php } ?>
		
		
		<?php echo mediaconsult_posts_wrapper_output( 'bottom' ); ?>
		
		
	</div><!-- end of .content-left / right -grid -->
	
</main><!-- end of .celestial-main -->

<?php get_footer(); ?>