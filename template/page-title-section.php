<?php 

if( !is_404() ) {
	
	$mediaconsult_page_title = get_post_meta( $post->ID, '_mediaconsult_page_title', true );

}
?>

<div class="cel-page-title">

		
	<?php if ( ! post_password_required() ) { ?>

		<!-- STARTING / HOME PAGE CASE --> 
		<?php if( is_front_page() ) { ?>
			
			<?php if( is_home() ) { ?>

				<h1 class="cel-section-title"><?php esc_html_e( 'Latest Posts', 'mediaconsult' ); ?></h1>

			<?php } else { ?>

				<div class="celestial-home-header">

				<?php if( $mediaconsult_page_title ) { /* we won't be escaping anything because we want the user to be able to insert any kind of content here, including shortcodes */

					echo do_shortcode( $mediaconsult_page_title );

				} else { ?>

					<h1><?php echo the_title(); ?></h1>

				<?php } ?>

				</div>

			<?php } ?>

		<!-- 404 PAGE NOT FOUND CASE --> 
		<?php } elseif( is_404() ) { ?>
			
			<div class="page-title-wrapper ptw-border-left ptw-background">
			
				<h1 class="heading-text-extra skin-color pnf-title"><?php esc_html_e( 'We Couldn\'t Find That Web Page', 'mediaconsult' ); ?></h1>
			
				<div class="icon-badge pnf-icon-badge">
					<i class="mi-icon mi-icon-warning2"></i>
					<?php esc_html_e( 'Error 404', 'mediaconsult' ); ?>
				</div>

				<div class="intro-text pnf-intro-text">
					<?php esc_html_e( 'We\'re sorry you ended up here. Sometimes a page gets moved or deleted, but hopefully we can help you find what you\'re looking for. ', 'mediaconsult' ); ?>
				</div>
				
			</div>
			
		<!-- ATTACHMENT CASE --> 
		<?php } elseif( is_attachment() ) { ?>

			<h1><?php esc_html_e( 'Attachment', 'mediaconsult' ); ?></h1>

		<!-- TAXONOMY CASE - PORTFOLIO -->                
		<?php } elseif( is_tax( 'portfolio_category' ) ) { ?>            

			<h1 class="cel-section-title"><?php esc_html_e( 'Posts Under: ', 'mediaconsult' ) . single_cat_title(); ?></h1>

		<!-- TAXONOMY CASE - RESSOURCES -->                
		<?php } elseif( is_tax( 'ressources_category' ) ) { ?>            

			<h1 class="cel-section-title"><?php esc_html_e( 'Posts Under: ', 'mediaconsult' ) . single_cat_title(); ?></h1>
			
		<!-- SINGLE - BLOG OR PORTFOLIO POST -->
		<?php } elseif( is_single() ) { ?>

			<?php if( 'portfolio' == get_post_type() ) {  /* portfolio post single post case */  ?>


				<?php if( $mediaconsult_page_title ) { /* we won't be escaping anything because we want the user to be able to insert any kind of content here, including shortcodes */

					echo do_shortcode( $mediaconsult_page_title );

				} else { ?>

					<h1 id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php echo single_post_title(); ?></h1>

				<?php } ?>


			<?php } else { /* blog post single post case */ ?>

				<?php if( $mediaconsult_page_title ) { /* we won't be escaping anything because we want the user to be able to insert any kind of content here, including shortcodes */

					echo do_shortcode( $mediaconsult_page_title );

				} else { ?>

					<h1 id="post-<?php the_ID(); ?>" <?php post_class( 'heading-text-extra' ); ?>><?php echo single_post_title(); ?></h1>

					<div class="header-post-misc">

						<span class="hpm-date"><?php echo get_the_date(); ?></span>

						<?php if( has_category() ) { ?>

							<span class="hpm-categories"><?php echo mediaconsult_post_categories(); ?></span>

						<?php } ?>

						<span class="hpm-comments"><?php echo mediaconsult_post_comments(); ?></span>

					</div> 

				<?php } ?>            

			<?php } ?>

		<!-- TAG CASE -->
		<?php } elseif( is_tag() ) { ?>           

			<h1 class="cel-section-title"><?php echo esc_html__( 'Tag: ', 'mediaconsult' ) . single_tag_title( '', false ); ?></h1>

		<!-- YEAR CASE -->        
		<?php } elseif( is_year() ) { ?>

			<h1><?php echo esc_html__( 'Posts In: ', 'mediaconsult' ) . get_the_time( 'Y' ); ?></h1>

		<!-- MONTH CASE -->        
		<?php } elseif( is_month() ) { 

			$mediaconsult_month = get_the_time( 'F' ); ?>

			<h1 class="cel-section-title"><?php echo esc_html__( 'posts in: ', 'mediaconsult' ) . $mediaconsult_month; ?></h1>

		<!-- DAY / TIME CASE -->
		<?php } elseif( is_day() || is_time() ){ 

			$mediaconsult_year = get_the_time( 'Y' );
			$mediaconsult_month_display = get_the_time( 'F' ); ?>

			<h1 class="cel-section-title"><?php echo esc_html__( 'posts in: ', 'mediaconsult' ).$mediaconsult_month_display.' '.$mediaconsult_year; ?></h1>

		<!-- AUTHOR CASE --> 
		<?php } elseif( is_author() ){ 

			global $post;
			$author_id = $post->post_author; ?>

			<h1 class="cel-section-title"><?php esc_html_e( 'Author: ', 'mediaconsult' ) . the_author_meta( 'user_login', $author_id ); ?></h1>

		<!-- CATEGORY CASE --> 
		<?php } elseif( is_category() ) { ?>

			<h1 class="cel-section-title"><?php esc_html_e( 'Posts Under: ', 'mediaconsult' ) . single_cat_title(); ?></h1>

		<!-- SEARCH PAGE CASE -->    
		<?php } elseif( is_search() ) { ?>

			<h1><?php esc_html_e( 'Search Results For: ', 'mediaconsult' ) . the_search_query(); ?></h1>

		<!-- NORMAL PAGE CASE -->
		<?php } else { ?>

			<?php if( $mediaconsult_page_title ) { /* we won't be escaping anything because we want the user to be able to insert any kind of content here, including shortcodes */

				echo do_shortcode( $mediaconsult_page_title );

			} else { ?>

				<h1><?php echo the_title(); ?></h1>

			<?php } ?>

		<?php } ?>


	<?php } else { /* end of is not password protected */ ?>

		<h1 class="cel-section-title"><?php esc_html_e( 'Password Protected Page', 'mediaconsult' ); ?></h1>

	<?php } ?>


</div><!-- end of .page-title-wrapper -->