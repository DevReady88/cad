<?php

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


	/* get category */
	$mediaconsult_slider_posts_category = get_post_meta( $post->ID, '_mediaconsult_slider_posts_category', true );


	/* query arguments */
	$mediaconsult_args_slider = array(
			"cat" => $mediaconsult_slider_posts_category,
			"paged" => $paged,
			"posts_per_page" => 4,
			'post_status' => 'publish'
			);

	global $more;
	
?>

<div class="cel-homepage-slider-wrapper cel-slider cel-post-slider-wrapper section-dark" data-skin="dark">

	<div class="cel-slider-parent section-dark" data-skin="dark">
			
							
		<?php $mediaconsult_query = new WP_Query( $mediaconsult_args_slider );

		if ( $mediaconsult_query -> have_posts() ) {

			while ( $mediaconsult_query -> have_posts() ) {

				$mediaconsult_query -> the_post(); ?>
				
				<div class="cel-slider-wrapper cel-homepage-slider">

					<?php if( has_post_thumbnail() ) { ?>

						<div class="cel-slider-featured-image">

							<?php the_post_thumbnail( 'mediaconsult_default_slider-nocrop' ); ?>

						</div>                

					<?php }	?>
				

					<div class="cel-posts-slider-content block-click">

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'slider-block' ); ?> itemscope itemtype="http://schema.org/Article">
							
							<span class="slider-post-date">
								<?php echo esc_html( get_the_date() ); ?>
							</span>
							
							<?php if ( strlen(get_the_title()) > 38 ) { $mediaconsult_short_title = substr( get_the_title(), 0, 38 ) . '...'; } else { $mediaconsult_short_title = get_the_title(); } ?>
											
							<h1 class="slider-post-title">
								<a href="<?php echo esc_url( get_permalink() ); ?>">
									<?php echo esc_html( $mediaconsult_short_title ); ?>
								</a>
							</h1>
							
							<div class="slider-post-excerpt"><?php echo mediaconsult_excerpt( '20' ); ?></div>

						</article>

					</div>
				
				</div><!-- end of .cel-slider-wrapper -->
			

			<?php } ?>

		<?php } else { ?>

		<div class="cel-slider-wrapper cel-homepage-slider-empty">
		
			<div class="cel-wrapper">
			
			<?php esc_html_e( 'The slider doesn\'t contain any posts.', 'mediaconsult' ); ?>
					  
			</div>					  
		
		</div><!-- end of .cel-slider-wrapper -->
				
		<?php } ?>
		
		<?php wp_reset_postdata(); ?>
		
	</div>

</div>

<div class="clearboth"></div>