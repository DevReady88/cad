		
		
		<div class="page-title-wrapper filters-page-title-wrapper ptw-border-left ptw-background">
			
			<?php 

				$mediaconsult_page_title = get_post_meta( $post->ID, '_mediaconsult_page_title', true );
			
				global $wp;

				if (isset ($_GET['ressources_order']) ) {
					$ressources_order = $_GET['ressources_order'];
				} else {
					$ressources_order = 'DESC';
				}

				if ( isset( $_GET['ressources_category'] ) ) {
					$ressources_category = $_GET['ressources_category'];
				} else {
					$ressources_category = ' ';
				}


				$current_url = add_query_arg( array( 

					'ressources_order' => $ressources_order,
					'ressources_category' => $ressources_category

				), $wp->request );



				if ( '' != get_option( 'permalink_structure' ) ) {

					$mediaconsult_page_id_output = '';

					$current_initial_url = home_url( add_query_arg( array(), $wp->request ) );

				} else {

					$mediaconsult_page_id_output = '<input type="hidden" name="page_id" value="' . esc_attr( get_queried_object_id() ) . '">';

					$current_initial_url = home_url( add_query_arg( array(), rtrim( $wp->request, "/" ) . "/?page_id=" . get_queried_object_id() ) );
				}

			?>
			
			
			<div class="filter-post-title">
			
				<?php 
				
				$filter_form_margin_class = '';
				
				if( $mediaconsult_page_title ) {

					echo do_shortcode( $mediaconsult_page_title );
					
					$filter_form_margin_class = 'filter_form_margin_class';
						
				} else { ?>

					<h1><?php echo the_title(); ?></h1>

				<?php } ?>
				
			</div>
			
			
			<form action="" method="GET" class="filter-post-form <?php echo esc_attr( $filter_form_margin_class ); ?>">

				<?php echo wp_kses( $mediaconsult_page_id_output,
					array(
						'input' => array(
							'type' => array(),
							'name' => array(),
							'value' => array()
						),
					)
				); ?>

				
				<div class="cel-input-group">
					<select name="ressources_order" id="ressources_order">
						<option value="DESC" <?php selected( $ressources_order, 'DESC' ); ?>><?php esc_html_e( 'Latest By Date', 'mediaconsult' ); ?></option>
						<option value="ASC" <?php selected( $ressources_order, 'ASC' ); ?>><?php esc_html_e( 'Oldest By Date', 'mediaconsult' ); ?></option>
					</select>
				</div>
				
				<div class="cel-input-group">

					<?php echo mediaconsult_taxonomies_dropdown( 'ressources', 'ressources_category', 'ressources_category', esc_html__( 'Ressource Type', 'mediaconsult' ), $ressources_category, '' ); ?>

				</div>
				
				<div class="cel-input-group">
					<input type="submit" class="post-filter-submit celestial-button-fill celestial-button-skin" value="<?php esc_html_e( 'Filter', 'mediaconsult' ); ?>">

					<a href="<?php echo esc_url( $current_initial_url ); ?>" class="post-filter-reset celestial-button celestial-button-fill celestial-button-skin"><?php esc_html_e( 'Reset', 'mediaconsult' ); ?></a>
				</div>
			</form>
			

		
		</div>