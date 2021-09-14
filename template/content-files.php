<?php
/* Template name: Docs Files */
/**
 * The default template for displaying docs files
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

							<div class="docs-wrapper">
								<div class="doc-item">
									<a href="#">Изменения в Устав 28_08_2019 Изменения в Устав 28_08_2019</a>
								</div>
								<div class="doc-item">
									<a href="#">Устав ГКУ Центр документации</a>
								</div>
								<div class="doc-item">
									<a href="#">от 6 декабря 2005 г. N 958-КЗ</a>
								</div>
								<div class="doc-item">
									<a href="#">от 22 октября 2004 г. N 125-ФЗ</a>
								</div>
							</div>

							</div>



				</div>

				<?php get_sidebar(); ?>

		</div>


</main>

<?php get_footer(); ?>