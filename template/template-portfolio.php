<?php 
/*
Template Name: Portfolio
*/

	get_header();

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$mediaconsult_section_tone_value = mediaconsult_section_tone();

	$mediaconsult_display_page_title = get_post_meta( $post->ID, '_mediaconsult_display_page_title', true );


	/* get the portfolio category assigned via custom meta box */
	$mediaconsult_port_categ = get_post_meta( $post->ID, '_mediaconsult_port_cat', true );

		

	/* get the portfolio category assigned via custom meta box */
	$mediaconsult_display_port_categ = get_post_meta( $post->ID, '_mediaconsult_display_port_cat', true );


	/* get the portfolio columns setting assigned via custom meta box */
	$mediaconsult_port_columns = get_post_meta( $post->ID, '_mediaconsult_port_columns', true );

	if( ( $mediaconsult_port_columns != '2' ) && ( $mediaconsult_port_columns != '3' ) ) {
		
		$mediaconsult_port_columns = '3';
		
	}


	/* posts per page */
	if( $mediaconsult_port_columns == '2' ) {
		
		$mediaconsult_posts_no = get_theme_mod( 'mediaconsult_port2col_posts_no' ) >= -1 ? get_theme_mod( 'mediaconsult_port2col_posts_no' ) : 6;
		
	} else {
		
		$mediaconsult_posts_no = get_theme_mod( 'mediaconsult_port3col_posts_no' ) >= -1 ? get_theme_mod( 'mediaconsult_port3col_posts_no' ) : 6;
		
	}


	/* query arguments */
	$mediaconsult_args_port = array(
		"post_type" => "portfolio",
		"portfolio_category" => $mediaconsult_port_categ,
		"paged" => $paged,
		"posts_per_page" => $mediaconsult_posts_no,
		'post_status' => 'publish'
		);

?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1]) ; ?>" role="main">
			
	<div class="page-content page-content-fullwidth">
			
		<?php if( $mediaconsult_display_page_title != 'no' ) {

			get_template_part( 'page-title-section' );

		} ?>


		<?php if( function_exists( 'mediaconsult_custom_post_portfolio' ) ) {


		if ( 'false' !== get_theme_mod( 'display_portfolio_filter', 'true' ) ) {

			get_template_part( 'inc/portfolio-filter' );

		} ?>


		<div class="content-<?php echo esc_attr( $mediaconsult_port_columns ); ?>col-grid">


			<?php $mediaconsult_query = new WP_Query( $mediaconsult_args_port );

			if ( $mediaconsult_query -> have_posts() ) {

				while ( $mediaconsult_query -> have_posts() ) {

					$mediaconsult_query -> the_post();

					?>


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
									<a href="<?php echo esc_url( get_permalink() ); ?>" class="cel-underline">
										<?php echo mediaconsult_shorthen_title( get_the_title(), '46' ); ?>
									</a>
								</h2>

								<?php if ( $mediaconsult_display_port_categ != 'no' ) { ?>

									<div class="mc-port-category small-secondary"><?php echo mediaconsult_custom_taxonomies_terms_links(', '); ?></div>

								<?php } ?>
							</div>

						</article>

					</div>


				<?php } ?>

			</div>


			<?php } else {

				esc_html_e( 'The portfolio doesn\'t contain any posts.', 'mediaconsult' );

			} ?>


			<?php if( get_theme_mod( 'portfolio_pagination_type' ) == 'numbered' ) { ?>

				<div class="portfolio-pagination"><?php echo mediaconsult_pagination( $mediaconsult_query ); ?></div>

			<?php } else { ?>

				<div class="classic-pagination portfolio-pagination">
					<?php next_posts_link(esc_html__( '&larr; Older Entries', 'mediaconsult' ), $mediaconsult_query -> max_num_pages ) ?>
					<?php previous_posts_link( esc_html__( 'Newer Entries &rarr;', 'mediaconsult' ) ) ?>
				</div>

			<?php } ?>


		<?php } else { ?>

			<p class="cel-no-custom-post">
				<?php esc_html_e( 'Before using the portfolio template please enable the MC Custom Posts Plugin that comes with the theme.', 'mediaconsult' ); ?>
			</p>

		<?php } ?>

	</div><!-- end of .page-content-fullwidth -->
	
</main><!-- end of .celestial-main -->

<?php get_footer(); ?>