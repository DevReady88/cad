<?php get_header(); ?>

<?php 

	$mediaconsult_section_tone_value = mediaconsult_section_tone(); 

?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" role="main">

	<div class="content-<?php echo esc_attr( mediaconsult_sidebar_position() ); ?>-grid">

		<div class="inner-content">

			
			<?php get_template_part( 'page-title-section' ); ?>

			
			<?php if ( have_posts() ) : 
				while( have_posts() ) : the_post(); ?>


					<article id="post-<?php the_ID(); ?>" <?php post_class( 'default-post-block' ); ?> itemscope itemtype="http://schema.org/Article">

						<?php 
							get_template_part( 'inc/blog/default/standard' );

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mediaconsult' ),
								'after'  => '</div>',
							) ); 
						?>						

					</article>


				<?php endwhile;
			endif; ?>

               
			<div class="pagination-blog">

			<?php if( get_theme_mod( 'blog_pagination_type' ) == 'numbered' ) { ?>

				<?php echo mediaconsult_pagination(); ?>

			<?php } else { ?>

				<div class="classic-pagination">
					<?php next_posts_link(esc_html__( '&larr; Older Entries', 'mediaconsult' ) ) ?>
					<?php previous_posts_link( esc_html__( 'Newer Entries &rarr;', 'mediaconsult' ) ) ?>
				</div>

			<?php } ?>  

			</div>     
				
		</div>

		<?php get_sidebar(); ?>

	</div>

</main><!-- end of .celestial-main -->

<?php get_footer(); ?>