<?php get_header(); ?>

<?php $mediaconsult_section_tone_value = mediaconsult_section_tone(); ?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" role="main">

	<div class="content-<?php echo esc_attr( mediaconsult_sidebar_position() ); ?>-grid">

		<div class="inner-content">

			<?php if ( have_posts() ) : 
				while( have_posts() ) : the_post(); ?>


					<article id="post-<?php the_ID(); ?>" <?php post_class( 'default-post-block default-post-block-single' ); ?> itemscope itemtype="http://schema.org/Article">

						<?php get_template_part( 'inc/blog/default/standard' ); ?>						

					</article>

				
					<?php if( 'false' !== get_theme_mod( 'share_post_icons', 'true' ) ) { ?>

						<?php if ( in_array( 'mc-shortcodes/mc-shortcodes.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
							<div class="post-icons-bottom">

								<?php if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

									echo do_shortcode('[post_share elementor="true"]');
								
								} else {
									
									echo do_shortcode('[post_share]');

								} ?>

							</div>
						<?php } ?>
						
					<?php } ?>				
										
					<?php if( 'false' !== get_theme_mod( 'about_author', 'true' ) ) {

						get_template_part( 'inc/author-meta' );

					} ?>	

					<div class="clearboth"></div>
					
					<div class="cel-post-navigation-grid cel-post-navigation-margins">
						<div class="prev-posts"><?php next_post_link( '<i class="icon icon-Arrow-Left"></i>%link' ); ?></div>
						<div class="next-posts"><?php previous_post_link( '%link <i class="icon icon-Arrow-Right"></i>' ); ?></div>
					</div>
				
					<?php /*comments_template();*/ ?>
					

				<?php endwhile;
			endif; ?>

		</div>
	
		<?php get_sidebar(); ?>

	</div>

</main><!-- end of .celestial-main -->

<?php get_footer(); ?>