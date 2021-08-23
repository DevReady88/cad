<?php

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


	/* get category / taxonomy */
	$mediaconsult_slider_categ = get_post_meta( $post->ID, 'mediaconsult_slider_cat', true );


	/* query arguments */
	$mediaconsult_args_slider = array(
			"post_type" => "slider",
			"slider_category" => $mediaconsult_slider_categ,
			"paged" => $paged,
			"posts_per_page" => 20,
			'post_status' => 'publish'
			);

	global $more;
	
?>

<div class="cel-homepage-slider-wrapper cel-slider cel-default-slider-wrapper section-dark" data-skin="dark">

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
				

					<div class="cel-homepage-slider-content">

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'slider-block' ); ?> itemscope itemtype="http://schema.org/Article">
							
							<?php the_content(); ?>					

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