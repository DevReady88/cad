<?php get_header(); ?>

<?php 
	
	$mediaconsult_section_tone_value = mediaconsult_section_tone();

	$mediaconsult_portfolio_categories_listing = get_theme_mod( 'portfolio_categories_listing', '3' );
	
?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1]) ; ?>" role="main">
	
	<div class="page-content page-content-fullwidth">


		<?php get_template_part( 'page-title-section' ); ?>


		<?php if ( 'false' !== get_theme_mod( 'display_portfolio_filter', 'true' ) ) {

			get_template_part( 'inc/portfolio-filter' ); 

		} ?>



		<div class="content-<?php echo esc_html( $mediaconsult_portfolio_categories_listing ); ?>col-grid">


			<?php if ( have_posts() ) : 
				while( have_posts() ) : the_post(); ?>


					<div class="cgrid-item">

						<article class="mc-portfolio-block" itemscope itemtype="http://schema.org/Article">

							<?php if ( 'popup' !== get_theme_mod( 'image_behavior', 'post_detail' ) ) { ?>

								<a href="<?php echo esc_url( get_permalink() ); ?>" class="mc-portfolio-img-url"><?php the_post_thumbnail(); ?></a>

							<?php } else { ?>

								<a href="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ); ?>" class="mc-portfolio-img-url magnific-popup-port">
									<?php the_post_thumbnail(); ?>
								</a>

							<?php } ?>

							<div class="mc-portfolio-info">
								<h2 class="mc-portfolio-title">
									<a href="<?php echo esc_url( get_permalink() ); ?>">
										<?php echo mediaconsult_shorthen_title( get_the_title(), '46' ); ?>
									</a>
								</h2>

								<div class="mc-port-category small-secondary"><?php echo mediaconsult_custom_taxonomies_terms_links(', '); ?></div>
							</div>

						</article>

					</div>


				<?php endwhile;
			endif; ?>


		</div><!-- end of .content-3col-grid -->							


	</div><!-- end of .page-content-fullwidth -->

</main><!-- end of .celestial-main -->

<?php get_footer(); ?>