<?php 
	/*
	Template Name: Blog Default
	*/

	get_header();

	/* get layout type */
	$mediaconsult_post_layout = get_post_meta( $post->ID, '_mediaconsult_post_layout', true );

	
	/* display or hide the page title */
	$mediaconsult_display_page_title = get_post_meta( $post->ID, '_mediaconsult_display_page_title', true );

	
	/* display or hide the post filters */
	$mediaconsult_display_post_filters = get_post_meta( $post->ID, '_mediaconsult_display_post_filters', true );


	global $more;


?>

<?php $mediaconsult_section_tone_value = mediaconsult_section_tone(); ?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" role="main">
	
	
	<?php if ( 'no' != $mediaconsult_display_post_filters  ) { ?>
	
		<div class="page-content page-content-fullwidth">

			<?php get_template_part( 'inc/post-top-filters' ); ?>

		</div>

	<?php }	?>
	


	<div class="content-<?php echo esc_attr( mediaconsult_sidebar_position() ); ?>-grid">

		<?php echo mediaconsult_posts_wrapper_output( 'top' ); ?>
		
			
			<?php if( $mediaconsult_display_page_title != 'no' && $mediaconsult_display_post_filters == 'no' ) {

				get_template_part( 'page-title-section' );

			} ?>
			
			<?php echo mediaconsult_posts_columns_wrapper_output( 'top', '3' ); ?>
			
			
				<?php $mediaconsult_query = new WP_Query( mediaconsult_posts_query() );

				if ( $mediaconsult_query -> have_posts() ) {

					while ( $mediaconsult_query -> have_posts() ) {

						$mediaconsult_query -> the_post(); ?>




						<article itemscope itemtype="http://schema.org/Article">

							<?php

								if ( $mediaconsult_post_layout == '3_columns_no_sidebar' ) {
									
									get_template_part( 'inc/blog/3columns/standard' );
									
								} elseif ( $mediaconsult_post_layout == 'list_small' ) {
									
									get_template_part( 'inc/blog/listingsmall/standard' );
									
								} else {
									
									get_template_part( 'inc/blog/default/standard' );
									
								}


								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mediaconsult' ),
									'after'  => '</div>',
								) );
							?>						

						</article>



					<?php } ?>

				<?php } else {

					esc_html_e( 'The blog doesn\'t contain any posts.', 'mediaconsult' );

				} ?>

			
			<?php echo mediaconsult_posts_columns_wrapper_output( 'bottom', '3' ); ?>
			
			
			<div class="pagination-blog">

			<?php if( get_theme_mod( 'blog_pagination_type' ) == 'numbered' ) { ?>

				<?php echo mediaconsult_pagination( $mediaconsult_query ); ?>

			<?php } else { ?>

				<div class="classic-pagination">
					<?php next_posts_link( esc_html__( '&larr; Older Entries', 'mediaconsult' ), $mediaconsult_query -> max_num_pages ) ?>
					<?php previous_posts_link( esc_html__( 'Newer Entries &rarr;', 'mediaconsult' ) ) ?>
				</div>

			<?php } ?>  

			</div>


		<?php echo mediaconsult_posts_wrapper_output( 'bottom' ); ?>
		

	</div>
	

</main><!-- end of .celestial-main -->

<?php get_footer(); ?>