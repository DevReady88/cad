
<div class="footer-grid-3 footer-grid-holder">
	<div class="footer-widget-1">
		<?php if ( is_active_sidebar( 'fsidebar-1' ) ) : dynamic_sidebar( 'fsidebar-1' ); endif; ?>

	</div>
	<div class="footer-widget-2">
		<h3 class="widgettitle">Карта сайта</h3>
		<div class="footer-site-map">
			<?php if ( is_active_sidebar( 'fsidebar-2' ) ) : dynamic_sidebar( 'fsidebar-2' ); endif; ?>	
			<?php if ( is_active_sidebar( 'fsidebar-3' ) ) : dynamic_sidebar( 'fsidebar-3' ); endif; ?>
		</div>
	</div>
	<div class="footer-widget-3">
		<h3 class="widgettitle">Контакты</h3>
		<div class="_scheme">
			<a href="/sites/center/contact-us/">Схема проезда</a>
			<div class="social-footer">
				<a class="vk" href="#"></a>
				<a class="fb" href="#"></a>
			</div>
		</div>
		<?php if ( is_active_sidebar( 'fsidebar-4' ) ) : dynamic_sidebar( 'fsidebar-4' ); endif; ?>
	</div>
</div>