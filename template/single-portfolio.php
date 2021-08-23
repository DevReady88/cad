<?php get_header(); ?>

<?php 
	$mediaconsult_display_sidebar = get_post_meta( $post->ID, 'mediaconsult_display_sidebar', true );

	$mediaconsult_section_tone_value = mediaconsult_section_tone(); 
	$mediaconsult_port_related = get_post_meta( $post->ID, '_mc_port_related', true );

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

					<?php if( $mediaconsult_port_related == '1' ) {

						get_template_part( 'inc/portfolio-related' );

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

						the_content(); ?>

						<?php if( $mediaconsult_port_related == '1' ) {

							get_template_part( 'inc/portfolio-related' );

						} ?>

						<?php comments_template(); ?>

					<?php endwhile;
				endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	<?php } ?>

	
</main><!-- end of .celestial-main -->

<?php get_footer(); ?>