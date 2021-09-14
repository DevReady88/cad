<?php
/* Template name: Docs */
/**
 * The default template for displaying docs
 */

get_header(); 

$mediaconsult_section_tone_value = mediaconsult_section_tone();

$mediaconsult_display_page_title = get_post_meta( $post->ID, '_mediaconsult_display_page_title', true );

$mediaconsult_display_sidebar = get_post_meta( $post->ID, '_mediaconsult_display_sidebar', true );

?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" role="main">

	<div class="content-<?php echo esc_attr( mediaconsult_sidebar_position() ); ?>-grid">

				<div class="inner-content">
		
				

							<div class="page-content">
							
								<?php if( $mediaconsult_display_page_title != 'no' ) {

									get_template_part( 'page-title-section' );

								} ?>
								
								
								<?php

							?>

							<?php wp_nav_menu( [
									'theme_location'  => '',
									'menu'            => '26',
									'container'       => 'div',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'menu',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => '',
								] ); ?>

							</div>



				</div>

				<?php get_sidebar(); ?>

		</div>


</main>

<?php get_footer(); ?>