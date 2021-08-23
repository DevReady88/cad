<?php


/*-----------------------------------------------------------------------------------*/
/*	Configure Excerpt String
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_excerpt' ) ) {
	
	function mediaconsult_excerpt( $mediaconsult_limit ) {
	  
	  $mediaconsult_excerpt = explode( ' ', get_the_excerpt(), $mediaconsult_limit );
	  
	  if ( count( $mediaconsult_excerpt ) >= $mediaconsult_limit ) {
		  
		array_pop( $mediaconsult_excerpt );
		
		$mediaconsult_excerpt = implode( " ", $mediaconsult_excerpt ).'...';
		
	  } else {
		  
		$mediaconsult_excerpt = implode( " ", $mediaconsult_excerpt );
		
	  }
	  	
	  $mediaconsult_excerpt = preg_replace( '`\[[^\]]*\]`','',$mediaconsult_excerpt );
	  
	  return $mediaconsult_excerpt;
	}
	
}



/*-----------------------------------------------------------------------------------*/
/* Add helper body classes on specific page types */
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_body_classes' ) ) {
	
	function mediaconsult_body_classes( $classes ) {
		
		
		if ( 'minimal' === get_theme_mod( 'sidebar_appearance', 'classic' ) ) {
			$classes[] = 'minimal-sidebar';
		} else {
			$classes[] = 'classic-sidebar';
		}
		
		// Add class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Add class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Add class if we're viewing the Customizer for easier styling of theme options.
		if ( is_customize_preview() ) {
			$classes[] = 'mediaconsult-customizer';
		}

		// Add class on front page.
		if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
			$classes[] = 'mediaconsult-front-page';
		}

		// Add a class if there is a custom header.
		if ( has_header_image() ) {
			$classes[] = 'has-header-image';
		}
		
		
		// Add class if sidebar is used.
		if ( is_active_sidebar( 'main-sidebar' ) && !is_page() ) {
			
			if( get_post_meta( get_the_ID(), 'mediaconsult_display_sidebar', true ) == 'false' ) {
				
				$classes[] = 'no-sidebar';
				
			} else {
				
				$classes[] = 'has-sidebar';
				
			}
			
		} else {
			
			if( basename( get_page_template () ) === 'page.php' ) {
			
				$classes[] = 'has-sidebar';
			
			} elseif( is_page_template( 'template-blog.php' ) ) {
			
				$classes[] = 'has-sidebar';
				
			} elseif( is_page_template( 'template-homepage.php' ) ) {
			
				if( get_post_meta( get_the_ID(), 'mediaconsult_display_sidebar', true ) == 'false' ) {

					$classes[] = 'no-sidebar';

				} else {

					$classes[] = 'has-sidebar';

				}
				
			} else {
			
				$classes[] = 'no-sidebar';
			
			}
			
		}
		

		return $classes;
	}
	add_filter( 'body_class', 'mediaconsult_body_classes' );
	
}



/*-----------------------------------------------------------------------------------*/
/* Section Tone
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_section_tone' ) ) {
	
	function mediaconsult_section_tone() {

		
		if ( 'dark' === get_theme_mod( 'header_tone', 'light' ) ) {
			$header_tone = 'dark';
		} else {
			$header_tone = 'light';
		}
		
		
		if ( 'dark' === get_theme_mod( 'content_tone', 'light' ) ) {
			$content_tone = 'dark';
		} else {
			$content_tone = 'light';
		}		

		
		if ( 'dark' === get_theme_mod( 'footer_tone', 'light' ) ) {
			$footer_tone = 'dark';
		} else {
			$footer_tone = 'light';
		}
		
		return array( $header_tone, $content_tone, $footer_tone );
		
	}

	
}



/*-----------------------------------------------------------------------------------*/
/* Sidebar Position
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_sidebar_position' ) ) {
	
	function mediaconsult_sidebar_position() {
		
		global $post;
		
		$mediaconsult_post_layout = get_post_meta( $post->ID, '_mediaconsult_post_layout', true );
		
		
		if ( $mediaconsult_post_layout == '3_columns_no_sidebar' ) {
			
			$content_position = 'full';
			
		} else {
			
			if ( is_tax( 'ressources_category' ) ) {
				
				if ( 'left' === get_theme_mod( 'ressources_categories_sidebar_position', 'right' ) ) {
					$content_position = 'right';
				} else {
					$content_position = 'left';
				}				
				
			} else {
			
				if( get_post_meta( $post->ID, '_mediaconsult_sidebar_position', true ) && !is_search() ) {

					if ( 'left' === get_post_meta( $post->ID, '_mediaconsult_sidebar_position', true ) ) {
						$content_position = 'right';
					} else {
						$content_position = 'left';
					}

				} else {

					if ( 'left' === get_theme_mod( 'sidebar_position', 'right' ) ) {
						$content_position = 'right';
					} else {
						$content_position = 'left';
					}	

				}
				
			}
			
		}
		
		
		return $content_position;
	}

	
}



/*-----------------------------------------------------------------------------------*/
/* Blog Posts Wrapper Output */
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_posts_wrapper_output' ) ) {
	function mediaconsult_posts_wrapper_output( $area ) {
		
		global $wp_query;
		$postid = $wp_query->post->ID;
		
		$post_layout = get_post_meta( $postid, '_mediaconsult_post_layout', true );
		$ressource_layout = get_post_meta( $postid, '_mediaconsult_ressource_layout', true );
		
		
		$area_output = '';
		
		if ( 'template-ressources.php' == get_post_meta( $postid, '_wp_page_template', true ) || is_tax( 'ressources_category' ) ) {
			
			if ( $ressource_layout == 'fullwidth' ) {
				
				return;
				
			} else {
				
				if ( $area == 'top' ) {

					$area_output .= '<div class="inner-content">';

				}

				if ( $area == 'bottom' ) {

					$area_output .= '</div>';

					ob_start();
					dynamic_sidebar( 'main-sidebar' );
					$area_output .= '<aside class="sidebar">' . ob_get_contents() . '</aside>';
					ob_end_clean();

				}
			}				
			
		}
		
		if ( 'template-blog.php' == get_post_meta( $postid, '_wp_page_template', true ) ) {
			
			if ( $post_layout == '3_columns_no_sidebar' ) {
				
				return;
				
			} else {
				
				if ( $area == 'top' ) {

					$area_output .= '<div class="inner-content">';

				}

				if ( $area == 'bottom' ) {

					$area_output .= '</div>';

					ob_start();
					dynamic_sidebar( 'main-sidebar' );
					$area_output .= '<aside class="sidebar">' . ob_get_contents() . '</aside>';
					ob_end_clean();

				}
			}	
			
		}
		
		
		return $area_output;
	}
}



/*-----------------------------------------------------------------------------------*/
/* Blog Posts Wrapper Output */
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_posts_columns_wrapper_output' ) ) {
	function mediaconsult_posts_columns_wrapper_output( $area, $columns ) {
		
		global $wp_query;
		$postid = $wp_query->post->ID;
		
		$mediaconsult_post_layout = get_post_meta( $postid, '_mediaconsult_post_layout', true );
		

		$area_output = '';
		
		
		if ( ( $mediaconsult_post_layout == 'default' ) || ( $mediaconsult_post_layout == 'list_small' ) ) {
		
			return;
		
		} else {
		
			if ( $mediaconsult_post_layout == '3_columns_no_sidebar' ) {

				if ( $columns == '3' ) {
				
					if ( $area == 'top' ) {
							
						$area_output .= '<div class="content-' . esc_attr( $columns ) . 'col-grid">';
						
					}

				}

				if ( $area == 'bottom' ) {

					$area_output .= '</div>';

				}
			
			}
			
		}

		
		return $area_output;
	}
}



/*-----------------------------------------------------------------------------------*/
/* Force tag cloud to use 13px font size */
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_tag_cloud_filter' ) ) {
	function mediaconsult_tag_cloud_filter( $args = array() ) {
		
	   $args['smallest'] = 13;
		
	   $args['largest'] = 13;
		
	   $args['unit'] = 'px';
		
	   return $args;
	}
	
	add_filter( 'widget_tag_cloud_args', 'mediaconsult_tag_cloud_filter', 90 );
}


/*-----------------------------------------------------------------------------------*/
/* Gets tag id by name */
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_get_tag_id_by_slug' ) ) {
	function mediaconsult_get_tag_id_by_slug( $tag_cloud_filter_tag_name ) {
		
		global $wpdb;
		
		$tag_ID = $wpdb -> get_var( $wpdb -> prepare( "SELECT * FROM ". $wpdb->terms ." WHERE `slug` = %s", $tag_cloud_filter_tag_name )  );
		
		return $tag_ID;
		
	}
}


/*-----------------------------------------------------------------------------------*/
/* Get Current Post Categories
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_post_categories' ) ) {
	
	function mediaconsult_post_categories() {
		
		global $post;

		$category_array = wp_get_post_categories( $post->ID );

		$category_list = array();

		foreach ( $category_array as $categories ) {
			
			$category_id = get_cat_ID( get_cat_name( $categories ) );
			
			$category_link = get_category_link( $category_id );
			
			$category_list[] = '<a href="' . esc_url( $category_link ) . '">' . get_cat_name( $categories ) . '</a>';
		}

		$output = implode( ', ', $category_list );

		$list_categories = $output;

		return $output;
		
	}
	
}




/*-----------------------------------------------------------------------------------*/
/* Get Blog Posts Query
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_posts_query' ) ) {
	
	function mediaconsult_posts_query() {
		
		global $post;
		
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		
		
		/* get layout type */
		$mediaconsult_post_layout = get_post_meta( $post->ID, '_mediaconsult_post_layout', true );
		
		
		/* get posts per page */
		if ( $mediaconsult_post_layout == '3_columns_no_sidebar' ) {
			
			$mediaconsult_posts_no = get_theme_mod( 'mediaconsult_3col_posts_no' ) >= -1 ? get_theme_mod( 'mediaconsult_3col_posts_no' ) : 9;
			
		} else {
			
			$mediaconsult_posts_no = get_theme_mod( 'mediaconsult_blogdefault_posts_no' ) >= -1 ? get_theme_mod( 'mediaconsult_blogdefault_posts_no' ) : 6;
			
		}
		
		
		/* get category */
		$mediaconsult_blog_cat = get_post_meta( $post->ID, '_mediaconsult_blog_cat', true );

		$mediaconsult_blog_cat_id = mediaconsult_get_tag_id_by_slug( $mediaconsult_blog_cat );
		
		
		/* get posts order and category */
		$mediaconsult_posts_order_value = get_query_var( 'posts_order' );
		
		$mediaconsult_posts_category_value = get_query_var( 'posts_category' );	

		$mediaconsult_posts_category_value_id = mediaconsult_get_tag_id_by_slug( $mediaconsult_posts_category_value );
		
		
		if ( $mediaconsult_posts_category_value_id ) {
			
			$mediaconsult_posts_category_final = $mediaconsult_posts_category_value_id;
			
		} else {
			
			$mediaconsult_posts_category_final = $mediaconsult_blog_cat_id;
			
		}
		
		
		/* query arguments */
		$mediaconsult_args_blog = array(
			"cat" => $mediaconsult_posts_category_final,	
			"paged" => $paged,
			"posts_per_page" => $mediaconsult_posts_no,
			"orderby" => "date",
			"order" => $mediaconsult_posts_order_value,
			'post_status' => 'publish'
		);		
		
		
		return $mediaconsult_args_blog;
		
	}
	
}




/*-----------------------------------------------------------------------------------*/
/* Get Ressources Posts Query
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_ressources_query' ) ) {
	
	function mediaconsult_ressources_query() {
		
		global $post;
		
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		
		
		/* get layout type */
		$ressources_layout = get_post_meta( $post->ID, '_mediaconsult_ressources_layout', true );
		
		
		/* get posts per page */
		if ( $ressources_layout == 'minimal' ) {
			
			$posts_no = get_theme_mod( 'mediaconsult_minimal_ressources_posts_no' ) >= -1 ? get_theme_mod( 'mediaconsult_ressources_posts_no' ) : 12;
			
		} else {
			
			$posts_no = get_theme_mod( 'mediaconsult_default_ressources_posts_no' ) >= -1 ? get_theme_mod( 'mediaconsult_default_ressources_posts_no' ) : 6;
			
		}
		
		
		/* get category */
		$ressources_categ = get_post_meta( $post->ID, '_mediaconsult_ressources_cat', true );

		
		/* get ressources order and category */
		$ressources_order_value = get_query_var( 'ressources_order' );
		
		$ressources_category_value = get_query_var( 'ressources_category' );	



		if ( $ressources_category_value ) {
			
			$ressources_category_final = $ressources_category_value;
			
		} else {
			
			$ressources_category_final = $ressources_categ;
			
		}
		
		
		/* query arguments */
		$args_ressources = array(
			"post_type" => "ressources",
			"ressources_category" => $ressources_category_final,
			"paged" => $paged,
			"posts_per_page" => $posts_no,
			"orderby" => "date",
			"order" => $ressources_order_value,
			'post_status' => 'publish'
		);
		
			
		return $args_ressources;
		
	}
	
}




/*-----------------------------------------------------------------------------------*/
/* Get Current Post Comments Number
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_post_comments' ) ) {
	
	function mediaconsult_post_comments() {
		
		global $post;
		
		
		$num_comments = get_comments_number(); // get_comments_number returns only a numeric value

		if ( comments_open() ) {
			
			if ( $num_comments == 0 ) {
				
				$comments = esc_html__( 'No Comments', 'mediaconsult' );
				
			} elseif ( $num_comments > 1 ) {
				
				$comments = $num_comments . esc_html__(' Comments', 'mediaconsult' );
				
			} else {
				
				$comments = esc_html__( '1 Comment', 'mediaconsult' );
			}
			
			$output = '<a href="' . get_comments_link() .'">' . $comments. '</a>';
			
		} else {
			
			$output =  esc_html__( 'Comments are off for this post.', 'mediaconsult' );
			
		}
		
		return $output;		
		
		
	}
	
}



/*-----------------------------------------------------------------------------------*/
/* Custom Gravatar
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_custom_gravatar' ) ) {
	
	function mediaconsult_custom_gravatar ( $avatar_defaults ) {
		
			$myavatar = get_template_directory_uri() . '/assets/images/gravatar.png';

			$avatar_defaults[$myavatar] = esc_html__( 'Custom Gravatar', 'mediaconsult' );
			
			return $avatar_defaults;
		
	}
	
	add_filter( 'avatar_defaults', 'mediaconsult_custom_gravatar' );
}



/*-----------------------------------------------------------------------------------*/
/* Get taxonomies terms links
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_custom_taxonomies_terms_links' ) ) {
	function mediaconsult_custom_taxonomies_terms_links( $separator ) {
		global $post;
		
		// get post by post id
		$post = get_post( $post->ID );
		
		// get post type by post
		$post_type = $post -> post_type;
		
		// get post type taxonomies
		$mediaconsult_taxonomies = get_object_taxonomies( $post_type );
		
		$output = '';
		
		foreach ( $mediaconsult_taxonomies as $mediaconsult_taxonomy ) {     
			
			$terms = get_the_terms( $post->ID, $mediaconsult_taxonomy );
			
			if ( !empty( $terms ) ) {
				
				foreach ( $terms as $term ) {
					
					if ( $term === end( $terms )) {

						$output .= '<a href="' . get_term_link( $term -> slug, $mediaconsult_taxonomy ) . '">' . $term -> name . '</a>';

					} else {

					   $output .= '<a href="' . get_term_link( $term -> slug, $mediaconsult_taxonomy ) . '">' . $term -> name . '</a>' . $separator;

					}
					
				}
				
			}
		}
		return $output;
	}
}




if ( !function_exists( 'mediaconsult_taxonomies_dropdown' ) ) {
	function mediaconsult_taxonomies_dropdown( $post_type, $post_type_taxonomy, $label, $option_name, $current_taxonomy, $select_class ) {

		// get post type taxonomies
		$mediaconsult_taxonomies = get_object_taxonomies( $post_type );
		
		$output = '';
			
		$output .= '<select name="' . $label . '" id="' . $label . '" class="' . $select_class . '">';
		
		
			$output .= '<option value="">' . esc_html( $option_name ) . '</option>';
		
		
			foreach ( $mediaconsult_taxonomies as $mediaconsult_taxonomy ) {     
				
				$terms = get_terms ( $post_type_taxonomy );
				
				if ( !empty( $terms ) ) {

					foreach ( $terms as $term ) {
						
						if( $current_taxonomy == $term -> slug ) {	
							
							$output .= '<option value="' . $term -> slug . '" selected="selected">' . $term -> name . '</option>\n';
						
						} else {
							
							$output .= '<option value="' . $term -> slug . '" ' . selected( $current_taxonomy, $term -> slug ) . '>' . $term -> name . '</option>\n';
							
						}

					}

				}
			}
		
		$output .= '</select>';
		
		
		return $output;
	}
}




					


/*-----------------------------------------------------------------------------------*/
/* Get taxonomies terms links
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_shorthen_title' ) ) {
	function mediaconsult_shorthen_title( $title, $number ) {
		global $post;
		
		// get post by post id
		$post = get_post( $post->ID );
		
		
		if ( strlen( $title ) > $number ) { 
			
			$mediaconsult_short_title = esc_html( substr( $title, 0, $number ) . '...' );
			
		} else {
			
			$mediaconsult_short_title = esc_html( $title );
			
		} 		

		return $mediaconsult_short_title;

	}
}



/*-----------------------------------------------------------------------------------*/
/* This code filters the Categories archive widget to include the post count inside the link
/*-----------------------------------------------------------------------------------*/
if ( !function_exists('mediaconsult_cat_count_span') ) {
	function mediaconsult_cat_count_span($mediaconsult_links) {
		$mediaconsult_links = str_replace( '</a> (', ' (', $mediaconsult_links );
		$mediaconsult_links = str_replace( ')', ')</a>', $mediaconsult_links );
		return $mediaconsult_links;
	}
	add_filter( 'wp_list_categories', 'mediaconsult_cat_count_span' );
}



/*-----------------------------------------------------------------------------------*/
/* This code filters the Archive widget to include the post count inside the link
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_archive_count_span' ) ) {
	
	function mediaconsult_archive_count_span( $mediaconsult_links ) {
		
		$mediaconsult_links = str_replace( '</a>&nbsp;(', ' (', $mediaconsult_links );
		$mediaconsult_links = str_replace( ')', ')</a>', $mediaconsult_links );
		
		return $mediaconsult_links;
	}
	
	add_filter( 'get_archives_link', 'mediaconsult_archive_count_span' );
}




/*-----------------------------------------------------------------------------------*/
/* Pagination
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_pagination' ) ) {
	function mediaconsult_pagination( $wp_query = array() ) {
		
		
		$output = '';
		

		if( $wp_query -> post_count < $wp_query -> found_posts ) {

			$big = 999999999; // we need an unlikely integer
			$links = paginate_links( array(
				'base' 			=> str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
				'format' 		=> '?paged=%#%',
				'current' 		=> max( 1, get_query_var('paged') ),
				'total' 		=> $wp_query -> max_num_pages,
				'prev_next' 	=> false,
				'type' 			=> 'list',
				'end_size'  	=> 1,
				'mid_size' 		=> 1
			) );


			$output .= '<nav class="numbered-pagination">';
			$output .= $links;
			$output .= '<span class="cel-pages">' . esc_html__( 'Page ', 'mediaconsult' ) . ( max( 1, get_query_var( 'paged' ) ) ) . ' ' . esc_html__( 'of', 'mediaconsult' ) . ' ' . ( $wp_query -> max_num_pages ) . '</span>';
			$output  .= '</nav>';

		}

		return $output;
	}

}



/*-----------------------------------------------------------------------------------*/
/* Reverse Footer Bottom Contents
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_reverse_fbottom' ) ) {
	
	function mediaconsult_reverse_fbottom() {
		
		if ( 'true' === get_theme_mod( 'fbottom_reverse', 'false' ) ) {
			
			$fbottom_reverse_class = 'fb-grid-reverse';
			
		} else {
			
			$fbottom_reverse_class = '';
			
		}
		
		return $fbottom_reverse_class;
	}
}




/*-----------------------------------------------------------------------------------*/
/* Retrieve Main Menu Type
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_menu_type' ) ) {
	
	function mediaconsult_menu_type() {
		
		$menu_classes = '';
		
		if ( 'modern' === get_theme_mod( 'header_menu_type', 'classic' ) ) {
			
			if ( 'left' === get_theme_mod( 'header_menu_alignment', 'right' ) ) {
				
				$menu_classes = 'cel-modern-menu cel-left-menu';
				
			} else {
				
				$menu_classes = 'cel-modern-menu';
				
			}
			
		} elseif ( 'modern2' === get_theme_mod( 'header_menu_type', 'classic' ) ) {
			
			
			if ( 'left' === get_theme_mod( 'header_menu_alignment', 'right' ) ) {
				
				$menu_classes = 'cel-modern-menu-alt cel-left-menu';
				
			} else {
				
				$menu_classes = 'cel-modern-menu-alt';
				
			}			
			
		} else {
			
			if ( 'left' === get_theme_mod( 'header_menu_alignment', 'right' ) ) {
				
				$menu_classes = 'cel-left-menu';
				
			} else {
				
				$menu_classes = '';
				
			}
			
		}		
		
		return $menu_classes;
	}
	
}




/*-----------------------------------------------------------------------------------*/
/* Retrieve Main Menu Type
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_social_media_profiles' ) ) {

	function mediaconsult_social_media_profiles() {
		
		
		$social_media_output = '';
		
		if ( get_theme_mod( 'twitter_url' ) || get_theme_mod( 'facebook_url' ) || get_theme_mod( 'linkedin_url' ) || get_theme_mod( 'googleplus_url' ) || get_theme_mod( 'instagram_url' ) || get_theme_mod( 'youtube_url' ) || get_theme_mod( 'dribbble_url' ) || get_theme_mod( 'behance_url' ) || get_theme_mod( 'rss_url' ) ) {

			
		$social_media_output .= '<ul class="media-wrapper">';

			if ( get_theme_mod( 'twitter_url' ) ) {
				$social_media_output .= '<li class="media-icon cel-media-twitter"><a href="' . esc_attr( get_theme_mod( 'twitter_url' ) ) . '"><i class="fab fa-twitter"></i></a></li>';
			}

			if ( get_theme_mod( 'facebook_url' ) ) {
				$social_media_output .= '<li class="media-icon cel-media-facebook"><a href="' . esc_attr( get_theme_mod( 'facebook_url' ) ) . '"><i class="fab fa-facebook-f"></i></a></li>';
			}

			if ( get_theme_mod( 'linkedin_url' ) ) {
				$social_media_output .= '<li class="media-icon cel-media-linkedin"><a href="' . esc_attr( get_theme_mod( 'linkedin_url' ) ) . '"><i class="fab fa-linkedin-in"></i></a></li>';
			}

			if ( get_theme_mod( 'googleplus_url' ) ) {
				$social_media_output .= '<li class="media-icon cel-media-googleplus"><a href="' . esc_attr( get_theme_mod( 'googleplus_url' ) ) . '"><i class="fab fa-google-plus-g"></i></a></li>';
			}		

			if ( get_theme_mod( 'instagram_url' ) ) {
				$social_media_output .= '<li class="media-icon cel-media-instagram"><a href="' . esc_attr( get_theme_mod( 'instagram_url' ) ) . '"><i class="fab fa-instagram"></i></a></li>';
			}

			if ( get_theme_mod( 'youtube_url' ) ) {
				$social_media_output .= '<li class="media-icon cel-media-youtube"><a href="' . esc_attr( get_theme_mod( 'youtube_url' ) ) . '"><i class="fab fa-youtube"></i></a></li>';
			}

			if ( get_theme_mod( 'dribbble_url' ) ) {
				$social_media_output .= '<li class="media-icon cel-media-dribbble"><a href="' . esc_attr( get_theme_mod( 'dribbble_url' ) ) . '"><i class="fab fa-dribbble"></i></a></li>';
			}

			if ( get_theme_mod( 'behance_url' ) ) {
				$social_media_output .= '<li class="media-icon cel-media-behance"><a href="' . esc_attr( get_theme_mod( 'behance_url' ) ) . '"><i class="fab fa-behance"></i></a></li>';
			}	

			if ( get_theme_mod( 'rss_url' ) ) {
				$social_media_output .= '<li class="media-icon cel-media-rss"><a href="' . esc_attr( get_theme_mod( 'rss_url' ) ) . '"><i class="fas fa-rss"></i></a></li>';
			 }
																																			
		
		$social_media_output .= '</ul>';

		} 
		
		return $social_media_output;

	}	
	
}


/*-----------------------------------------------------------------------------------*/
/* Make the date format translatable for WPML
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_translate_date_format' ) ) {
	
	function mediaconsult_translate_date_format( $format ) {
		
		if ( function_exists( 'icl_translate' ) ) {
			
			$format = icl_translate( 'Formats', $format, $format );
			
		}
		
		return $format;
		
	}
	add_filter( 'option_date_format', 'mediaconsult_translate_date_format' );
	
}



/*-----------------------------------------------------------------------------------*/
/* Add Polylang plugin filter so that portfolio and ressources translations will work with this plugin
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_pll_get_post_types' ) ) {
	
	function mediaconsult_pll_get_post_types( $types ) {
		
		return array_merge($types, array( 'portfolio' => 'portfolio', 'ressources' => 'ressources' ));
		
	}
	
	add_filter( 'pll_get_post_types', 'mediaconsult_pll_get_post_types' );
}



/*-----------------------------------------------------------------------------------*/
/* Custom WPML Language Switcher
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_lang_switcher' ) ) {
	
	function mediaconsult_lang_switcher() {
		
		if( class_exists( 'SitePress' ) ) {
			
			$languages = icl_get_languages( 'skip_missing=0&orderby=code' );
			
			if( !empty( $languages ) ) {
				
				echo '<div class="lang-wrapper"><ul>';
				
				foreach( $languages as $lang ){
					
					echo '<li>';
					
					if( $lang[ 'language_code' ] ){
						
						if( !$lang[ 'active' ] ) {
							 echo '<a href="'. esc_url( $lang[ 'url' ] ) .'">';
						}
						
						echo '<img src="' . $lang[ 'country_flag_url' ] . '" height="12" alt="' . $lang[ 'language_code' ] . '" width="18" />';
						
						if( !$lang[ 'active' ] ) { 
							echo '</a>';
						}
						
					}
					echo '</li>';
					
				}			
				

				echo '</ul></div>';
			}
		
		}/* end of SitePress / WPML class exists */
	}

}



/*-----------------------------------------------------------------------------------*/
/* WPML Top Right Class
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'mediaconsult_wpml_topright_section' ) ) {
	
	function mediaconsult_wpml_topright_section() {
		
		if( class_exists( 'SitePress' ) ) {
			
			$topright_section_class = '';

			if ( get_theme_mod( 'wpml_lang_switcher' ) == 'true' ) {

				$topright_section_class = 'topright-section-wpml';

			}
			
			return $topright_section_class;
		
		}/* end of SitePress / WPML class exists */
	}

}



/*-----------------------------------------------------------------------------------*/
/* Remove Emoji
/*-----------------------------------------------------------------------------------*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );



/*-----------------------------------------------------------------------------------*/
/* Optimize Script Files
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'mediaconsult_optimize_scripts' ) ) {
	function mediaconsult_optimize_scripts() {
		global $wp_scripts;
		if ( ! is_a( $wp_scripts, 'WP_Scripts' ) ) {
			return;
		}
		foreach ( $wp_scripts->registered as $handle => $script ) {
			$wp_scripts->registered[ $handle ]->ver = null;
		}
	}
}



/*-----------------------------------------------------------------------------------*/
/* Optimize Style Files
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'mediaconsult_optimize_styles' ) ) {
	function mediaconsult_optimize_styles() {
		global $wp_styles;
		if ( ! is_a( $wp_styles, 'WP_Styles' ) ) {
			return;
		}
		foreach ( $wp_styles->registered as $handle => $style ) {
			if ( $handle !== 'thim-rtl' ) {
				$wp_styles->registered[ $handle ]->ver = null;
			}
		}
	}
}



/*-----------------------------------------------------------------------------------*/
/* Remove Query Strings From CSS & JS Files
/*-----------------------------------------------------------------------------------*/
$theme_remove_string = get_theme_mod( 'mediaconsult_remove_query_string', false );
if ( $theme_remove_string ) {
	add_action( 'wp_print_scripts', 'mediaconsult_optimize_scripts', 999 );
	add_action( 'wp_print_footer_scripts', 'mediaconsult_optimize_scripts', 999 );
	add_action( 'admin_print_styles', 'mediaconsult_optimize_styles', 999 );
	add_action( 'wp_print_styles', 'mediaconsult_optimize_styles', 999 );
}


?>