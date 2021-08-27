<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="//gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<?php if ( get_theme_mod( 'theme_loader' ) == 'on' ) { ?>
	
	<div class="celestial-body-cover">
		<div class="cel-loader-animation"></div>
	</div>
	
	<?php } ?>
	
	
	<div id="celestial-canvas">

		<?php $mediaconsult_section_tone_value = mediaconsult_section_tone(); ?>

		<header class="section-<?php echo esc_attr( $mediaconsult_section_tone_value[0] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[0] ); ?>">

			<div class="header-top-bar">
				<div class="header-top-bar-item">
					<span class="header-top-bar-search"></span>
					<div class="header-top-bar-text">
						<span>350001, г. Краснодар, ул. им. Академика Павлова, д. 122&nbsp;&#448;&nbsp;</span>
						<a href="tel:+78612397553">+7 (861) 239-75-53&nbsp;&#448;&nbsp;</a>
						<a href="mailto:cdnikk@adm.krasnodar.ru">cdnikk@adm.krasnodar.ru</a>
					</div>
				</div>
				<div class="header-top-bar-item">
					<a href="#">Печать&nbsp;&#448;&nbsp;</a>
				</div>
				<div class="header-top-bar-item">
					<a href="#">Для слабовидящих</a>
				</div>
			</div>
			<div class="header-grid">

				<div class="header-logo" itemscope itemtype="http://schema.org/Organization">

					
					<div class="default-logo-wrapper <?php if ( get_theme_mod( 'mobile_logo' ) ) { echo "mobile-logo-active"; } ?>">
					
						<?php if ( function_exists( 'the_custom_logo' ) ) {

							if ( has_custom_logo() ) {

								the_custom_logo();

							} else { ?>

								<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="logo" />							
								</a>

							<?php }
						} ?>
						
					</div>
					
					<?php if ( get_theme_mod( 'mobile_logo' ) ) { ?>
						<div class="mobile-logo-wrapper">

							<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
								<img src="<?php echo esc_url( get_theme_mod( 'mobile_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="logo" />
							</a>

						</div>			
					<?php } ?>			
				</div>


				<div class="header-topright-area">
				
					<!-- we use this class for selective refresh -->
					<div class="header-langswitcher-wrapper">
					
						<?php if ( get_theme_mod( 'wpml_lang_switcher' ) == 'true'  && class_exists( 'SitePress' ) ) {

							mediaconsult_lang_switcher();

						} ?>
							
					</div>
							
					<!-- we use this class for selective refresh -->
					<div class="header-topright-wrapper">

						<?php

						if ( get_theme_mod( 'header_topright_content' ) == 'true_email_phone' ) {

							get_template_part( 'inc/topright' );

						}
						if ( get_theme_mod( 'header_topright_content' ) == 'true_search' ) {

							get_template_part( 'inc/topright-search' );

						} 						
						?>

					</div>
						
				</div>
				
			</div>	
			
			<div class="cel-wrapper header-spacer"></div>
			
			
			<!-- we use this class for selective refresh -->
			<div class="header-menu-type-wrapper">
			
				<?php get_template_part( 'inc/header-menu' ); ?>
									
			</div>
			
			
			<?php 
			
			if (!is_404()) {
				
				
				$mediaconsult_display_slider = get_post_meta( $post->ID, '_mediaconsult_display_slider', true );

				$mediaconsult_slider_type = get_post_meta( $post->ID, '_mediaconsult_slider_type', true );


				if( $mediaconsult_display_slider == 'yes' ) {

					if ( $mediaconsult_slider_type == 'latest_blog_posts_classic' ) {

						get_template_part( 'inc/slider/header-slider-posts-classic' );

					} else {

						get_template_part( 'inc/slider/header-slider' );

					}


				}
				
				
			} ?>
			
			
		</header>