<?php 
	get_header();

	$mediaconsult_section_tone_value = mediaconsult_section_tone();

	global $wp_query;

?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" role="main">
	
	<div class="content-<?php echo esc_attr( mediaconsult_sidebar_position() ); ?>-grid">

		<div class="inner-content">

			<div class="sr-number">

				<?php $mediaconsult_allsearch = new WP_Query( "s=$s&showposts=0" ); ?>
				<h5>
					<?php echo '<span class="sresult-number">' . $mediaconsult_allsearch -> found_posts . '</span>';  

					esc_html_e( ' Results for ', 'mediaconsult' ); 
					echo '"';
					the_search_query(); 
					echo '"'; 
					?>

				</h5>

			</div>

			<div class="sr-form">

				<h3><?php esc_html_e( 'Refine Your Search', 'mediaconsult' ); ?></h3>
				
				<?php get_search_form(); ?>

			</div>
			

			<?php

			if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article class="search-block">

					<h4>
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
					</h4>


					<?php 

					if ( "" !=  mediaconsult_excerpt('24') ) { ?>

						<p><?php echo esc_html( mediaconsult_excerpt( '24' ) ); ?></p>

					<?php } ?>

				</article>

			<?php endwhile; endif; ?>


			<div class="pagination-search">

				<?php if( get_theme_mod( 'search_pagination_type' ) == 'numbered' ) { ?>

					<?php echo mediaconsult_pagination( $wp_query ); ?>

				<?php } else { ?>

					<div class="classic-pagination">
						<?php next_posts_link(esc_html__( '&larr; Older Entries', 'mediaconsult' ), $wp_query -> max_num_pages ) ?>
						<?php previous_posts_link( esc_html__( 'Newer Entries &rarr;', 'mediaconsult' ) ) ?>
					</div>

				<?php } ?>

			</div>      

		</div>

		<?php get_sidebar(); ?>

	</div>

</main><!-- end of .celestial-main -->

<?php get_footer(); ?>