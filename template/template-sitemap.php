<?php 
	/*
	Template Name: Sitemap
	*/

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
								
								
								<?php the_content(); ?>
								
							</div>
							
							
						<?php endwhile;
					endif; ?>							
							
							
					<div class="cel-sitemap-pages">

						<?php							

						$mediaconsult_pages_args = array(
							'depth'        => 0,
							'show_date'    => '',
							'date_format'  => get_option( 'date_format' ),
							'child_of'     => 0,
							'exclude'      => '',
							'include'      => '',
							'title_li'     => '',
							'echo'         => 1,
							'authors'      => '',
							'sort_column'  => 'menu_order, post_title',
							'link_before'  => '<span>',
							'link_after'   => '</span>',
							'walker'       => '',
							'post_type'    => 'page',
							'post_status'  => 'publish'
						);

						?>
						
						<h4 class="cel-sitemap-title"><?php esc_html_e( 'Pages', 'mediaconsult' ); ?></h4>
						
						<ul class="cel-sitemap-list cel-sitemap-list-pages">
							<?php echo wp_list_pages( $mediaconsult_pages_args ); ?>
						</ul>
						
					</div>
								
								
								
					<?php if( function_exists( 'mediaconsult_custom_post_ressources' ) ) { ?>

						<?php 
										
						$mediaconsult_ressources_args = array( 'post_type' => 'ressources' );
										
						$mediaconsult_ressources_query = new WP_Query( $mediaconsult_ressources_args ); 
								
						?>


						<?php if ( $mediaconsult_ressources_query -> have_posts() ) { ?>

							<div class="cel-sitemap-pages">
							
								<h4 class="cel-sitemap-title"><?php esc_html_e( 'Ressources', 'mediaconsult' ); ?></h4>
								
								<ul class="cel-sitemap-list">
									
									<?php while ( $mediaconsult_ressources_query -> have_posts() ) {

									$mediaconsult_ressources_query -> the_post(); ?>
									
									<li>
										<a href="<?php echo esc_url( get_permalink() ); ?>" class="cel-underline">
											<span><?php the_title(); ?></span>
										</a>										
									</li>
									
									<?php } ?>
									
								</ul>

							</div>

						<?php } ?>


					<?php } ?>
					
					
					
					<?php if( function_exists( 'mediaconsult_custom_post_portfolio' ) ) { ?>

						<?php 
										
						$mediaconsult_portfolio_args = array( 'post_type' => 'portfolio' );
										
						$mediaconsult_portfolio_query = new WP_Query( $mediaconsult_portfolio_args ); 
								
						?>


						<?php if ( $mediaconsult_portfolio_query -> have_posts() ) { ?>

							<div class="cel-sitemap-pages">
							
								<h4 class="cel-sitemap-title"><?php esc_html_e( 'Portfolio', 'mediaconsult' ); ?></h4>
								
								<ul class="cel-sitemap-list">
									
									<?php while ( $mediaconsult_portfolio_query -> have_posts() ) {

									$mediaconsult_portfolio_query -> the_post(); ?>
									
									<li>
										<a href="<?php echo esc_url( get_permalink() ); ?>" class="cel-underline">
											<span><?php the_title(); ?></span>
										</a>										
									</li>
									
									<?php } ?>
									
								</ul>

							</div>

						<?php } ?>


					<?php } ?>
					
					
				</div><!-- end of .inner-content -->

				<?php get_sidebar(); ?>

			</div>
			
			
		<?php } else { ?><!-- case with no sidebar -->
		

											
			<?php if ( have_posts() ) : 
				while( have_posts() ) : the_post(); ?>


					<div class="page-content page-content-fullwidth">
						
		
						<?php if( $mediaconsult_display_page_title != 'no' ) {

							get_template_part( 'page-title-section' );

						} ?>
					
					
						<?php the_content(); ?>

					</div>


				<?php endwhile;
			endif; ?>
			

			<div class="cel-sitemap-pages">

				<?php							

				$mediaconsult_pages_args = array(
					'depth'        => 0,
					'show_date'    => '',
					'date_format'  => get_option( 'date_format' ),
					'child_of'     => 0,
					'exclude'      => '',
					'include'      => '',
					'title_li'     => '',
					'echo'         => 1,
					'authors'      => '',
					'sort_column'  => 'menu_order, post_title',
					'link_before'  => '<span>',
					'link_after'   => '</span>',
					'walker'       => '',
					'post_type'    => 'page',
					'post_status'  => 'publish'
				);

				?>

				<h4 class="cel-sitemap-title"><?php esc_html_e( 'Pages', 'mediaconsult' ); ?></h4>

				<ul class="cel-sitemap-list cel-sitemap-list-pages">
					<?php echo wp_list_pages( $mediaconsult_pages_args ); ?>
				</ul>

			</div>



			<?php if( function_exists( 'mediaconsult_custom_post_ressources' ) ) { ?>

				<?php 

				$mediaconsult_ressources_args = array( 'post_type' => 'ressources' );

				$mediaconsult_ressources_query = new WP_Query( $mediaconsult_ressources_args ); 

				?>


				<?php if ( $mediaconsult_ressources_query -> have_posts() ) { ?>

					<div class="cel-sitemap-pages">

						<h4 class="cel-sitemap-title"><?php esc_html_e( 'Ressources', 'mediaconsult' ); ?></h4>

						<ul class="cel-sitemap-list">

							<?php while ( $mediaconsult_ressources_query -> have_posts() ) {

							$mediaconsult_ressources_query -> the_post(); ?>

							<li>
								<a href="<?php echo esc_url( get_permalink() ); ?>" class="cel-underline">
									<span><?php the_title(); ?></span>
								</a>										
							</li>

							<?php } ?>

						</ul>

					</div>

				<?php } ?>


			<?php } ?>



			<?php if( function_exists( 'mediaconsult_custom_post_portfolio' ) ) { ?>

				<?php 

				$mediaconsult_portfolio_args = array( 'post_type' => 'portfolio' );

				$mediaconsult_portfolio_query = new WP_Query( $mediaconsult_portfolio_args ); 

				?>


				<?php if ( $mediaconsult_portfolio_query -> have_posts() ) { ?>

					<div class="cel-sitemap-pages">

						<h4 class="cel-sitemap-title"><?php esc_html_e( 'Portfolio', 'mediaconsult' ); ?></h4>

						<ul class="cel-sitemap-list">

							<?php while ( $mediaconsult_portfolio_query -> have_posts() ) {

							$mediaconsult_portfolio_query -> the_post(); ?>

							<li>
								<a href="<?php echo esc_url( get_permalink() ); ?>" class="cel-underline">
									<span><?php the_title(); ?></span>
								</a>										
							</li>

							<?php } ?>

						</ul>

					</div>

				<?php } ?>


			<?php } ?>

		<?php } ?>
	

</main><!-- end of .celestial-main -->

<?php get_footer(); ?>