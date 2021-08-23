				<div class="cel-wrapper main-menu-wrapper <?php echo mediaconsult_menu_type(); ?>">

					<nav class="header-nav" id="standard-menu">

						<?php wp_nav_menu(
							array(
								'menu' 					=> 'mediaconsult-main-menu',
								'theme_location' 		=> 'mediaconsult-main-menu',
								'menu_class' 			=> 'sf-menu',
								'container'				=> false,
								'fallback_cb'     		=> 'wp_page_menu'
							)
						); ?>

					</nav>

					<a href="#standard-menu" class="main-menu-control <?php if ( get_theme_mod( 'mobile_logo' ) ) { echo "mobile-logo-nav"; } ?>">
						<?php if ( get_theme_mod( 'mediaconsult_mobile_menu_text' ) ) { ?>
							<span><?php echo esc_html( get_theme_mod( 'mediaconsult_mobile_menu_text' ) ); ?></span>
						<?php } ?>
					</a>

				</div>

				<div class="cel-wrapper"><div class="thick-line-separator"></div></div>