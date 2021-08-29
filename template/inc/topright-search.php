<div class="topright-section-search-wrapper <?php echo mediaconsult_wpml_topright_section(); ?>">

	<div class="header-inner-grid">

		<div class="header-text-presentation-outer">
		<?php if ( get_theme_mod( 'header_top_presentation' ) ) { ?>

			<div class="header-text-presentation intro-text">

				<?php echo do_shortcode( get_theme_mod( 'header_top_presentation' ) ); ?>

			</div>

		<?php } ?>
		</div>

		<?php if ( get_theme_mod( 'header_top_search' ) == 'true' ) { ?>

			<div class="header-top-search"><?php get_search_form(); ?></div>

		<?php } ?>
		

	</div>
	
</div>