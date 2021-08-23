<?php 
	
	if(is_tax()) {
		
		$mediaconsult_term = get_term_by( 'slug', $term, 'portfolio_category' );
		$mediaconsult_term_parent = get_term_by( 'id', $mediaconsult_term -> parent, 'portfolio_category' );
		$mediaconsult_main_portfolio_url = get_theme_mod( 'main_portfolio_url' );
		
	} else {
		
		$mediaconsult_port_categ = get_post_meta( $post->ID, '_mediaconsult_port_cat', true );
		$mediaconsult_port_categ_id = mediaconsult_get_tag_id_by_slug( $mediaconsult_port_categ );
		
	}
	
?>

<div class="portfolio-filter-wrapper small-secondary">

	<?php if( 'false' !== get_theme_mod( 'display_portfolio_filter', 'true' ) ) { ?>

	<div class="port-filter-section">

		<ul class="portfolio-filter">
		
			<?php if(is_tax()) {
				
	
				if( $mediaconsult_main_portfolio_url ) { ?>
				
				<li><a href="<?php echo esc_attr( $mediaconsult_main_portfolio_url ); ?>"><?php esc_html_e( 'All', 'mediaconsult' ); ?></a></li>
				
				<?php } else { ?>
					
				<li><a href="#"><?php esc_html_e( 'All', 'mediaconsult' ); ?></a></li>
					
				<?php }
				
				
				$mediaconsult_categories = get_categories( 'title_li=&order=asc&hide_empty=0&taxonomy=portfolio_category&child_of=' . $mediaconsult_term_parent -> term_id );

				foreach( $mediaconsult_categories as $mediaconsult_category ) {
					
					if( $mediaconsult_term -> name == $mediaconsult_category -> cat_name ) {
						
						echo '<li><a href="' . get_term_link( $mediaconsult_category  ) . '" class="pfilter-selected">' . $mediaconsult_category -> cat_name . '</a></li>';
						
					} else {
						
						echo '<li><a href="' . get_term_link( $mediaconsult_category  ) . '">' . $mediaconsult_category -> cat_name . '</a></li>';
						
					}
				} 
				
			} else { ?>
				
				<li><a href="<?php echo esc_url( get_page_link( $post->ID ) ); ?>"><?php esc_html_e( 'All', 'mediaconsult' ); ?></a></li><?php
				
				$mediaconsult_categories = get_categories( 'title_li=&order=asc&hide_empty=0&taxonomy=portfolio_category&child_of=' . $mediaconsult_port_categ_id );
					
				if ( $mediaconsult_categories ) {

					foreach( $mediaconsult_categories as $mediaconsult_category ) {

						echo '<li><a href="' . esc_attr( get_term_link( $mediaconsult_category ) ) . '">' . $mediaconsult_category -> cat_name . '</a></li>';	

					} 	
				
				}
			}
																	 
			?>
		</ul>
		

	</div>

	<?php } ?>

</div>