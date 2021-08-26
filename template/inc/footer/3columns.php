
<div class="footer-grid-3 footer-grid-holder">
	<div class="footer-widget-1">
		<?php if ( is_active_sidebar( 'fsidebar-1' ) ) : dynamic_sidebar( 'fsidebar-1' ); endif; ?>

	</div>
	<div class="footer-widget-2">
		<?php if ( is_active_sidebar( 'fsidebar-2' ) ) : dynamic_sidebar( 'fsidebar-2' ); endif; ?>	
		<?php if ( is_active_sidebar( 'fsidebar-3' ) ) : dynamic_sidebar( 'fsidebar-3' ); endif; ?>
	</div>
	<div class="footer-widget-3">
		<?php if ( is_active_sidebar( 'fsidebar-4' ) ) : dynamic_sidebar( 'fsidebar-4' ); endif; ?>
	</div>
</div>