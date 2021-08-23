		
		
		<div class="page-title-wrapper filters-page-title-wrapper ptw-border-left ptw-background">
			
			<?php 

				$mediaconsult_page_title = get_post_meta( $post->ID, '_mediaconsult_page_title', true );
			
				global $wp;

				if (isset ($_GET['posts_order']) ) {
					$posts_order = $_GET['posts_order'];
				} else {
					$posts_order = 'DESC';
				}

				if ( isset( $_GET['posts_category'] ) ) {
					$posts_category = $_GET['posts_category'];
				} else {
					$posts_category = ' ';
				}


				$current_url = add_query_arg( array( 

					'posts_order' => $posts_order,
					'posts_category' => $posts_category

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
					<select name="posts_order" id="posts_order">
						<option value="DESC" <?php selected( $posts_order, 'DESC' ); ?>><?php esc_html_e( 'Latest By Date', 'mediaconsult' ); ?></option>
						<option value="ASC" <?php selected( $posts_order, 'ASC' ); ?>><?php esc_html_e( 'Oldest By Date', 'mediaconsult' ); ?></option>
					</select>
				</div>
				
				<div class="cel-input-group">
					<select name="posts_category" id="posts_category">

						<?php $all_categories = get_categories( 'orderby=name' );

							echo "<option value='' " . selected( $posts_category, '' ) . ">" . esc_html__( 'Category', 'mediaconsult' ) . "</option>";

							foreach( $all_categories as $category ) {

								echo "<option value='" . $category->slug . "' " . selected( $posts_category, $category->slug ) . ">" . $category->cat_name . "</option>\n";

							}
						?>

					</select>
				</div>
				
				<div class="cel-input-group">
					<input type="submit" class="post-filter-submit celestial-button-fill celestial-button-skin" value="<?php esc_html_e( 'Filter', 'mediaconsult' ); ?>">

					<a href="<?php echo esc_url( $current_initial_url ); ?>" class="post-filter-reset celestial-button celestial-button-fill celestial-button-skin"><?php esc_html_e( 'Reset', 'mediaconsult' ); ?></a>
				</div>
			</form>
			

		
		</div>