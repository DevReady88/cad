<?php

$mediaconsult_related_portfolio = get_the_terms( get_the_ID(), 'portfolio_category' );

$mediaconsult_rel_port_final = "";

if(is_object( $mediaconsult_related_portfolio ) || is_array( $mediaconsult_related_portfolio ))
{
	foreach ( $mediaconsult_related_portfolio as $mediaconsult_rel_port )
	{
		$mediaconsult_rel_port_final .= $mediaconsult_rel_port -> slug . ', ';
	}
}					 
 
global $wp_query;

$mediaconsult_postid = $wp_query -> post->ID;	

$args_port_related = array(
		"portfolio_category" => $mediaconsult_rel_port_final,
		"post__not_in" => array( $mediaconsult_postid ),
		"posts_per_page" => 3		
		);
		
?>

<div class="clearboth"></div>

<div class="related-portfolio-wrapper">

	<div class="related-portfolio-title">

		<h3><?php esc_html_e( 'You Might Also Be Interested In', 'mediaconsult' ); ?></h3>

	</div>


	<div class="content-3col-grid">

		<?php $endlessforms_query = new WP_Query( $args_port_related );

		   if ( $endlessforms_query->have_posts() ) {

			while ( $endlessforms_query->have_posts() ) {		

				$endlessforms_query->the_post();

				/* shorten title */
				if ( strlen( get_the_title() ) > 44 ) { $mediaconsult_short_title = substr( get_the_title(), 0, 44 ) . '...'; } else { $mediaconsult_short_title = get_the_title(); }	?>


				<div class="cgrid-item">

					<!-- portfolio entry -->
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
									<?php echo esc_html( $mediaconsult_short_title ); ?>
								</a>
							</h2>

							<div class="mc-port-category small-secondary"><?php echo mediaconsult_custom_taxonomies_terms_links(', '); ?></div>
						</div>

					</article>                

				</div><!-- end of .cgrid-item -->  


		<?php } ?>


	<?php } else {  

		echo '<p class="related-portfolio-noposts">' . esc_html__( 'Sorry, there are no similar entries for this post.', 'mediaconsult' ) . '</p>';  

	} ?>

	<?php wp_reset_postdata(); ?>


	</div><!-- end of .content-3col-grid -->


</div><!-- end of .related-portfolio-wrapper -->