<?php 

	get_header();

	$mediaconsult_section_tone_value = mediaconsult_section_tone();

	$mediaconsult_display_page_title = get_post_meta( $post->ID, '_mediaconsult_display_page_title', true );

	$mediaconsult_display_sidebar = get_post_meta( $post->ID, '_mediaconsult_display_sidebar', true );

?>

<main class="celestial-main section-<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" data-skin="<?php echo esc_attr( $mediaconsult_section_tone_value[1] ); ?>" role="main">
	
	
		<?php if( $mediaconsult_display_sidebar == 'yes' ) { ?>


			<div class="content-<?php echo esc_attr( mediaconsult_sidebar_position() ); ?>-grid">

				<div class="inner-content">
		
					<?php if ( have_posts() ) : 
						while( have_posts() ) : the_post(); ?>


							<div class="page-content">
							
								<?php if( $mediaconsult_display_page_title != 'no' ) {

									get_template_part( 'page-title-section' );

								} ?>
								
								
								<?php

								the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mediaconsult' ),
									'after'  => '</div>',
								) ); 							

								comments_template(); ?>

							</div>


						<?php endwhile;
					endif; ?>

				</div>

				<?php get_sidebar(); ?>

			</div>
			
			
		<?php } else { ?>
		

											
			<?php if ( have_posts() ) : 
				while( have_posts() ) : the_post(); ?>


					<div class="page-content page-content-fullwidth">
						
		
						<?php if( $mediaconsult_display_page_title != 'no' ) {

							get_template_part( 'page-title-section' );

						} ?>
					
						<?php 
					  	
					  	the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mediaconsult' ),
								'after'  => '</div>',
							) ); 							

							comments_template(); ?>

					</div>


				<?php endwhile;
			endif; ?>
			

		<?php } ?>

		<?php

			if( is_front_page() ){ ?>

				<div class="contact-prefooter-wrapper">
					
					<h3>Контактная информация</h3>

					<div class="contact-prefooter-info">
						<div class="contact-prefooter-item">
							<div class="contact-prefooter-item-content">
								<span>График работы</span>
								<div class="cpi-description">
									<p>ПН-ЧТ: 09:00 - 18:00</p>
									<p>ПТ:   09:00 - 17:00</p>
									<p>СБ и ВС: выходные</p>
								</div>
							</div>
							<div class="cpi-image"><img width="82" height="82" src="/sites/center/wp-content/themes/mediaconsult/assets/images/clock.svg" alt="Центр Архив" /></div>
						</div>
						<div class="contact-prefooter-item">
							<div class="contact-prefooter-item-content">
								<span>Адрес</span>
								<div class="cpi-description">
									<p>350001 г. Краснодар</p> 
									<p>ул. им. Академика</p> 
									<p>Павлова, д. 122</p>
								</div>
							</div>
							<div class="cpi-image"><img width="69" height="93" src="/sites/center/wp-content/themes/mediaconsult/assets/images/addr.svg" alt="Центр Архив" /></div>
						</div>
						<div class="contact-prefooter-item">
							<div class="contact-prefooter-item-content">
								<span>Контакты</span>
								<div class="cpi-description">	
									<a href="tel:88612397553">8 (861) 239-75-53</a>
									<a href="mailto:cdnikk@adm.krasnodar.ru">cdnikk@adm.krasnodar.ru</a>
								</div>
							</div>
							<div class="cpi-image"><img width="88" height="88" src="/sites/center/wp-content/themes/mediaconsult/assets/images/phone-call.svg" alt="Центр Архив" /></div>
						</div>
						<div class="contact-prefooter-item">
							<div class="contact-prefooter-item-content">
								<span>Схема проезда</span>
							</div>
							<div class="cpi-image"><img src="/sites/center/wp-content/themes/mediaconsult/assets/images/road.svg" alt="Центр Архив" /></div>
						</div>
					</div>

				</div>

			<?}

		?>
	

</main><!-- end of .celestial-main -->

<?php get_footer(); ?>