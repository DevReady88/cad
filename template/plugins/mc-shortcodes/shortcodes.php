<?php
/**
 * Register all shortcodes
 *
 * @package   Mediaconsult Shortcodes
 * @author    Celestial Themes
 * @copyright Copyright (c) 2018, celestialthemes.com
 * @link      http://www.celestialthemes.com
 * @since     1.0.0
 */

// Widget Support =========================================================================== >
add_filter( 'widget_text', 'do_shortcode' );



// "Fix" Shortcodes =========================================================================== >
if( !function_exists( 'mediaconsult_fix_shortcodes' ) ) {
	
	function mediaconsult_fix_shortcodes( $content ){   
		$array = array (
			'<p>['    => '[', 
			']</p>'   => ']', 
			']<br />' => ']'
		);
		$content = strtr( $content, $array );
		return $content;
	}
	add_filter( 'the_content', 'mediaconsult_fix_shortcodes' );

}



// Clear Floats =========================================================================== >	
if( !function_exists( 'mediaconsult_clearboth' ) ) {
	
	function mediaconsult_clearboth() {
	   return '<div class="clearboth"></div>';
	}
	add_shortcode( 'clearboth', 'mediaconsult_clearboth' );

}



// Spacer =========================================================================== >	
if( !function_exists( 'mediaconsult_spacer' ) ) {
	function mediaconsult_spacer( $atts ) {
		extract( shortcode_atts( array(
			'size'	=> '20px',
			'class'	=> '',
		  ),
		  $atts ) );
		  
	 	return '<div class="cel-spacer clearboth ' .  esc_attr( $class ) . '" style="height: ' . $size . '"></div>';
	 
	}
	add_shortcode( 'spacer', 'mediaconsult_spacer' );
}



// Line Separator =========================================================================== >	
if( !function_exists( 'mediaconsult_line_separator' ) ) {
	function mediaconsult_line_separator( $atts ) {
		extract( shortcode_atts( array(
			'size'	=> '',
			'class'	=> '',
		  ),
		  $atts ) );
		
		
		
		/* size */
		if ( $size == 'thick' ) {
			
			$mediaconsult_size = 'thick';
			
		} else {
			
			$mediaconsult_size = 'thin';
			
		}
		
		
		  
	 	return '<div class="' .  esc_attr( $mediaconsult_size ) . '-line-separator"></div>';
	 
	}
	add_shortcode( 'line_separator', 'mediaconsult_line_separator' );
}



// Columns Wrapper =========================================================================== >	
if( !function_exists( 'mediaconsult_columns_wrapper' ) ) {
	function mediaconsult_columns_wrapper( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'columns'		=> '3',
			'class'			=> '',
		  ),
		  $atts ) );
		  
	 	return '<div class="content-'. esc_attr( $columns ) .'col-grid ' .  esc_attr( $class ) . '">' . do_shortcode( $content ) . '</div>';
	 
	}
	add_shortcode( 'columns_wrapper', 'mediaconsult_columns_wrapper' );
}



// Columns Item =========================================================================== >	
if( !function_exists( 'mediaconsult_column_item' ) ) {
	function mediaconsult_column_item( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'			=> '',
		  ),
		  $atts ) );
		  
		return '<div class="cgrid-item ' .  esc_attr( $class ) . '">' . do_shortcode( $content ) . '</div>';
	 
	}
	add_shortcode( 'column_item', 'mediaconsult_column_item' );
}



// Centered Column =========================================================================== >	
if( !function_exists( 'mediaconsult_centered_wrapper' ) ) {
	function mediaconsult_centered_wrapper( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'			=> '',
		  ),
		  $atts ) );
		  
	 	return '<div class="center-aligned-grid ' .  esc_attr( $class ) . '"><div class="centered-block centered-text">' . do_shortcode( $content ) . '</div></div>';
	 
	}
	add_shortcode( 'centered_wrapper', 'mediaconsult_centered_wrapper' );
}



// One Third Wrapper =========================================================================== >	
if( !function_exists( 'mediaconsult_onethird_wrapper' ) ) {
	function mediaconsult_onethird_wrapper( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'align'			=> '',
			'class'			=> '',
		  ),
		  $atts ) );
		
		
		
		if ( $align ) {
			
			if ( $align == 'right' ) {
				$mediaconsult_align = 'right';
			} else {
				$mediaconsult_align = 'left';
			}
			
		} else { 
			
			$mediaconsult_align = 'left'; 
			
		}
		
		
	 	return '<div class="onethird-' . esc_attr( $mediaconsult_align ) . '-grid ' .  esc_attr( $class ) . '">' . do_shortcode( $content ) . '</div>';
	 
	}
	add_shortcode( 'onethird_wrapper', 'mediaconsult_onethird_wrapper' );
}



// One Sidebar Content Wrapper =========================================================================== >	
if( !function_exists( 'mediaconsult_sidebar_content_wrapper' ) ) {
	function mediaconsult_sidebar_content_wrapper( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'align'			=> '',
			'class'			=> '',
		  ),
		  $atts ) );
		
		
		
		if ( $align ) {
			
			if ( $align == 'left' ) {
				$mediaconsult_align = 'left';
			} else {
				$mediaconsult_align = 'right';
			}
			
		} else { 
			
			$mediaconsult_align = 'right'; 
			
		}
		
		
	 	return '<div class="sidebar-' . esc_attr( $mediaconsult_align ) . '-grid ' .  esc_attr( $class ) . '">' . do_shortcode( $content ) . '</div>';
	 
	}
	add_shortcode( 'sidebar_content_wrapper', 'mediaconsult_sidebar_content_wrapper' );
}



// Decoration =========================================================================== >	
if( !function_exists( 'mediaconsult_line_decoration' ) ) {
	function mediaconsult_line_decoration( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'class'	         		=> '',
			'align'	         		=> '',
			'background_color'	 	=> ''
		), $atts));
		
		
		if ( $background_color ) {

			$mediaconsult_background_color = ' style="background-color: ' . esc_html( $background_color ) . '; "';
			
		} else {
			
			$mediaconsult_background_color = '';
			
		}
		
		
		if( $align == 'left' ) {
			
			$align_class = "cel-left";
			
		} elseif ( $align == 'right' ) {
			
			$align_class = "cel-right";
			
		} else {
			
			$align_class = "cel-center";
			
		}
		
		return '<div class="cel-decoration ' . esc_attr( $align_class ) . ' ' .  esc_attr( $class ) . '"><span class="cel-title-separator" ' . $mediaconsult_background_color . '></span></div>';
		
	}
	add_shortcode( 'line_decoration', 'mediaconsult_line_decoration' );
}	




// Line Divider =========================================================================== >	
if( !function_exists( 'mediaconsult_divider' ) ) {
	function mediaconsult_divider() {
	   return '<div class="cel-divider"></div>';
	}
	add_shortcode( 'divider', 'mediaconsult_divider' );
}



// Dropcap 1 =========================================================================== >	
if( !function_exists( 'mediaconsult_dropcap' ) ) {
	function mediaconsult_dropcap( $atts, $content = null ) {
	   return '<span class="dropcap">' . do_shortcode($content) . '</span>';
	}
	add_shortcode( 'dropcap', 'mediaconsult_dropcap' );
}



// Dropcap 2 =========================================================================== >	
if( !function_exists( 'mediaconsult_dropcap2' ) ) {
	function mediaconsult_dropcap2( $atts, $content = null ) {
	   return '<span class="dropcap2">' . do_shortcode($content) . '</span>';
	}
	add_shortcode( 'dropcap2', 'mediaconsult_dropcap2' );
}



// Custom List =========================================================================== >	
if( !function_exists( 'mediaconsult_custom_list' ) ) {
	function mediaconsult_custom_list( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'class'       			=> '',
			'indent'      			=> '',
			'horizontal_border'     => ''
		), $atts));	
		
		
		/* indent */
		if ( $indent ) { 
			$style = ' style="margin-left: ' . $indent . ';"'; 
		} else { 
			$style = ''; 
		}
		
		/* horizontal border */
		if ( $horizontal_border == 'true' ) { 
			$hborder = 'cl-hborder';
		} else {
			$hborder = '';
		}
		
		
		$output = '';
		$output .= '<ul class="custom-list ' .  esc_attr( $hborder ) . ' ' .  esc_attr( $class ) . '" ' . $style . '>' . do_shortcode( $content ) . '</ul><br />';
		
		return $output;
		
	}
	add_shortcode( 'custom_list', 'mediaconsult_custom_list' );
}



// Custom List Item =========================================================================== >	
if( !function_exists( 'mediaconsult_clist_item' ) ) {
	function mediaconsult_clist_item( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'icon'      		=> '',
			'icon_color'		=> '',
			'icon_background'	=> ''
		), $atts));			
		
		
		$mediaconsult_icon_style = '';
		$mediaconsult_icon_color_skin = '';
		
		
		if( $icon_color && !$icon_background ) { /*icon color but no background */
			
			if( $icon_color == 'skin' ) {
				
				$mediaconsult_icon_color_skin = ' skin-color';
				
			} else {
				
				$mediaconsult_icon_style = ' style="color:' . $icon_color . '"';
				
			}
			
		} elseif( !$icon_color && $icon_background ) { /*icon background but no color */
		
			$mediaconsult_icon_style = ' style="background-color:' . $icon_background . '"';
			
		} elseif( $icon_color && $icon_background ) { /* both icon color and background */
			
			if( $icon_color == 'skin' ) {
				
				$mediaconsult_icon_color_skin = ' skin-color';
				$mediaconsult_icon_style = ' style="background-color:' . $icon_background . '"';
				
			} else {
				
				$mediaconsult_icon_style = ' style="color:' . $icon_color . '; background-color:' . $icon_background . '"';
				
			}			
			
		}
		
		
		
		if( $icon ) {
			
			if( $mediaconsult_icon_style || $mediaconsult_icon_color_skin ) {
				
				return '<li><i class="' . $icon . $mediaconsult_icon_color_skin . '" ' . $mediaconsult_icon_style . '></i><p>' . do_shortcode( $content ) . '</p></li>';
				
			} else {
				
				return '<li><i class="' . $icon . '"></i><p>' . do_shortcode( $content ) . '</p></li>';
								
			}
			
		} else {
			
			return '<li class="clist-noicon">' . do_shortcode( $content ) . '</li>';
			
		}
		
	}
	add_shortcode( 'clist_item', 'mediaconsult_clist_item' );
}



// Button =========================================================================== >	
if( !function_exists( 'mediaconsult_button' ) ) {
	function mediaconsult_button( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'class'      		=> '',
			'url'      			=> '',
			'color'	   			=> '',
			'title'	   			=> '',
			'target'   			=> '',
			'type'   			=> '',
			'icon'   			=> '',
			'align'				=> ''
		), $atts));	
		
		$mediaconsult_title = '';
		$mediaconsult_target = '';
		$mediaconsult_icon = '';
		
		
		if( !$color ) { $color = 'skin'; }
		
		if( $title ) { $mediaconsult_title = 'title="'. esc_attr( $title ) . '"'; }
		
		if( $target == 'blank' ) { $mediaconsult_target = ' target="_blank"'; }
		
		if( $icon ) { $mediaconsult_icon = '<i class="' . $icon . '"></i>'; }
		
		
		if( $align == 'left' ) {
			
			$align_class = "cel-left";
			
		} elseif ( $align == 'right' ) {
			
			$align_class = "cel-right";
			
		} elseif ( $align == 'center' ) {
			
			$align_class = "cel-center";
			
		} else {
			
			$align_class = "";
			
		}
		
		
		
		$output = '';
		
		$output .= '<div class="' . esc_attr( $align_class ) . '">';
		
			if( $type == 'border' ) {
				$output .= '<a href="' . esc_url( $url ) . '" class="celestial-button celestial-button-border celestial-button-' . esc_attr ( $color ) . ' ' .  esc_attr( $class ) . ' " ' . esc_attr( $mediaconsult_title ) . esc_attr( $mediaconsult_target ) . '>' . esc_html( $mediaconsult_icon ) . do_shortcode( $content ) . '</a>';
			} else {
				$output .= '<a href="' . esc_url( $url ) . '" class="celestial-button celestial-button-fill celestial-button-' . esc_attr ( $color ) . ' ' .  esc_attr( $class ) . ' " ' . esc_attr( $mediaconsult_title ) . esc_attr( $mediaconsult_target ) . '>' . esc_html( $mediaconsult_icon ) . do_shortcode( $content ) . '</a>';			
			}
		
		$output .= '</div>';
		
		
		return $output;
				
	}
	add_shortcode( 'button', 'mediaconsult_button' );
}	




// Message Box =========================================================================== >	
if( !function_exists( 'mediaconsult_messagebox' ) ) {
	function mediaconsult_messagebox( $atts, $content = null ) {
		
		extract( shortcode_atts( array(
			'class'      	  => '',
			'type'      	  => '',
			'color'      	  => '',
			'background'      => '',
			'border' 	      => ''				
		), $atts));
		
		
		
		$output = '';
		
		if( !$type ) {
			
			$mediaconsult_type = 'alert-primary';
			
		} else {
			
			if( $type == 'custom' ) {
				
				$output .= '<div class="messagebox ' .  esc_attr( $class ) . '" style="' . $mediaconsult_background . $mediaconsult_color . $mediaconsult_border . '">' . do_shortcode( $content ) . '</div>';
				
			} else {
				
				$mediaconsult_type = $type;	
				
				$output .= '<div class="alert ' .  esc_attr( $mediaconsult_type ) . ' ' .  esc_attr( $class ) . '" role="alert">' . do_shortcode( $content ) . '</div>';
			}
			
	
		}
		
		return $output;
		
	}
	add_shortcode( 'messagebox', 'mediaconsult_messagebox' );
}





// Intro =========================================================================== >	
if( !function_exists( 'mediaconsult_intro' ) ) {
	function mediaconsult_intro( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'class'	         => '',
			'align'	         => '',
			'textcolor'		 => ''
		), $atts));
		

		$mediaconsult_textcolor = '';
		
		if( $align == 'center' ) {
			
			$align_class = "cel-center";
			
		} elseif ( $align == 'right' ) {
			
			$align_class = "cel-right";
			
		} else {
			
			$align_class = "cel-left";
			
		}
		
		
		if( $textcolor ) {
			
			$mediaconsult_textcolor = 'style = "color:' . $textcolor . ';"';
			
		}
		
		$output = '<div class="intro-text ' . esc_attr( $align_class ) . ' ' .  esc_attr( $class ) . '" ' . $mediaconsult_textcolor . '>' . do_shortcode( $content ) . '</div><div class="clearboth"></div>';
		
		return $output;
		
	}
	add_shortcode( 'intro', 'mediaconsult_intro' );
}	




// Page Title =========================================================================== >	
if( !function_exists( 'mediaconsult_page_title' ) ) {
	function mediaconsult_page_title( $atts, $content = null ) {
		
		extract( shortcode_atts( array(
			'class'      	    	=> '',
			'border_left'			=> '',
			'border_right'			=> '',
			'border_top'			=> '',
			'border_bottom'			=> '',
			'border_color'			=> '',
			'background'			=> '',
			'background_image'		=> '',
			'text_color'			=> '',
			'padding'				=> '',
			'margin'				=> ''
		), $atts));
		
		
		$mediaconsult_border_left = '';
		$mediaconsult_border_right = '';
		$mediaconsult_border_top = '';
		$mediaconsult_border_bottom = '';
		
		$mediaconsult_background = '';
		
		$mediaconsult_border_color = '';
		$mediaconsult_border_color_attr = '';	
		
		$mediaconsult_padding = '';
		$mediaconsult_margin = '';
		
		
		if ( $border_left == 'true' ) {
			$mediaconsult_border_left = 'ptw-border-left';
		}
		
		if ( $border_right == 'true' ) {
			$mediaconsult_border_right = 'ptw-border-right';
		}
		
		if ( $border_top == 'true' ) {
			$mediaconsult_border_top = 'ptw-border-top';
		}
		
		if ( $border_bottom == 'true' ) {
			$mediaconsult_border_bottom = 'ptw-border-bottom';
		}		
		
		if ( $background == 'true' ) {
			$mediaconsult_background = 'ptw-background';
		}
		
		if ( $padding ) {
			$mediaconsult_padding = 'padding: ' . $padding . ';';
		}		
		
		if ( $margin ) {
			$mediaconsult_margin = 'margin: ' . $margin . ';';
		}
		
		
		if ( $border_color ) {
			
			if ( $border_color == 'skin' ) {
			
				$mediaconsult_border_color_attr = 'ptw-border-skin';
				
			} else {
				
				$mediaconsult_border_color = ' border-color: ' . $border_color . ';';
				
			}
			
		}
		

		return '<div class="page-title-wrapper ' .  esc_attr( $mediaconsult_border_left ) . ' ' .  esc_attr( $mediaconsult_border_right ) . ' ' .  esc_attr( $mediaconsult_border_top ) . ' ' .  esc_attr( $mediaconsult_border_bottom ) . ' ' .  esc_attr( $mediaconsult_background ) . ' ' .  esc_attr( $mediaconsult_border_color_attr ) . ' ' .  esc_attr( $class ) . '" style="' . $mediaconsult_border_color . ' ' . $mediaconsult_padding . ' ' . $mediaconsult_margin . '">' . do_shortcode( $content ) . '</div>';
		
	}
	add_shortcode( 'page_title', 'mediaconsult_page_title' );
}




// Tagline =========================================================================== >	
if( !function_exists( 'mediaconsult_tagline' ) ) {
	function mediaconsult_tagline( $atts, $content = null ) {
		
		extract( shortcode_atts( array(
			'class'      	  => '',
			'color'      	  => '',
			'background'      => '',
			'padding'	      => '',
			'align'	          => ''
		), $atts));
		
		
		$mediaconsult_background = '';
		$mediaconsult_color = '';
				
		if( $background ) {
			$mediaconsult_background = 'background:' . $background . ';';
		}
		if( $color ) {
			$mediaconsult_color = 'color:' . $color . ';';
		}	

		if( $align == 'center' ) {
			
			$align_class = "cel-center";
			
		} elseif ( $align == 'right' ) {
			
			$align_class = "cel-right";
			
		} else {
			
			$align_class = "cel-left";
			
		}
		if ( !$padding ) {
			$mediaconsult_padding = '';
		}
		elseif( $padding == 'none' ) {
			$mediaconsult_padding = 'padding: 0;';
		} else {
			$mediaconsult_padding = 'padding: ' . $padding . ';';
		}
		
		
		
		return '<div class="cel-tagline-wrapper small-secondary ' . $align_class . '"><div class="cel-tagline ' .  esc_attr( $class ) . '" style="' . $mediaconsult_background . $mediaconsult_color . $mediaconsult_padding . '">' . do_shortcode($content) . '</div></div>';
		
	}
	add_shortcode( 'tagline', 'mediaconsult_tagline' );
}




// Tagline Icon =========================================================================== >	
if( !function_exists( 'mediaconsult_tagline_icon' ) ) {
	function mediaconsult_tagline_icon( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'						=> '',
			'tagline'					=> '',
			'tagline_color'      	  	=> '',
			'tagline_background'      	=> '',			
			'icon'						=> '',
			'icon_type'					=> ''
		  ),
		  $atts ) );
		
		
		$mediaconsult_background = '';
		$mediaconsult_color = '';
				
		if( $tagline_background ) {
			$mediaconsult_background = 'background:' . $tagline_background . ';';
		}
		if( $tagline_color ) {
			$mediaconsult_color = 'color:' . $tagline_color . ';';
		}	
		
		
		
		$output = '';
		
		
		$output .= '<div class="cel-tagline-icon ' .  esc_attr( $class ) . '">';
		
			if( $icon ) {
				if( $icon_type == 'icon' ) {
					$output .= '<i class="ti-icon ' . esc_attr( $icon ) . '"></i>';
				} else {
					$output .= '<img src="' . esc_url( $icon ) . '" class="ti-icon" alt="' . esc_attr( $tagline ) . '" />';
				}
			}
			
			$output .= '<div class="ti-tagline-wrapper">';

				if( $tagline ) {
					$output .= '<div class="small-secondary" style="' . $mediaconsult_background . $mediaconsult_color . '">' . esc_html( $tagline ) . '</div>';
				}
		
			$output .= '</div>';
		
		$output .= '</div>';
		
		
		
		return $output;
	 
	}
	add_shortcode( 'tagline_icon', 'mediaconsult_tagline_icon' );
}




// Service Block =========================================================================== >	
if( !function_exists( 'mediaconsult_service_block' ) ) {
	function mediaconsult_service_block( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'					=> '',
			'align'					=> 'center',
			'icon'					=> '',
			'icon_type'				=> '',
			'icon_color'			=> '',
			'tagline'				=> '',
			'title'					=> '',
			'url'					=> '',
			'clickable'				=> '',
			'layout'				=> '',
			'disk'					=> '',
			'disk_background'		=> ''
		  ),
		  $atts ) );
		  
		
		/* alignment */
		if( $align == 'left' ) {
			
			$align_class = "cel-left";
			
		} elseif ( $align == 'right' ) {
			
			$align_class = "cel-right";
			
		} else {
			
			$align_class = "cel-center";
			
		}

		/* icon color */
		if ( $icon_color ) {
			
			$mediaconsult_icon_color = 'color: ' . $icon_color . '; ';
			
		} else {
			
			$mediaconsult_icon_color = '';
			
		}
		
		/* layout */
		if ( $layout = 'alt' ) {
			
			$mediaconsult_service_layout_alt = 'service-block-alt';
			
		} else {
			
			$mediaconsult_service_layout_alt = '';
			
		}		

		/* layout */
		if ( $disk_background ) {
			
			$mediaconsult_disk_background = ' style="background-color: ' . esc_attr ( $disk_background ) . '; "';
			
		} else {
			
			$mediaconsult_disk_background = '';
			
		}	
		
		/* clickable */
		if ( $clickable == 'true' ) {
			
			$mediaconsult_block_click = 'block-click';
			
		} else {
			
			$mediaconsult_block_click = '';
			
		}
		
		
		
		
		$output = '';
		
		$output .= '<div class="service-block ' . esc_attr( $align_class ) . ' ' .  esc_attr( $class ) . ' ' .  esc_attr( $mediaconsult_service_layout_alt ) . ' ' . esc_attr( $mediaconsult_block_click ) . '">';
		
			if( $icon ) {
				if( $icon_type == 'icon' ) {
					$output .= '<i class="sb-icon ' . esc_attr( $icon ) . '" style="' . $mediaconsult_icon_color . '"></i>';
				} else {
					$output .= '<img src="' . esc_url( $icon ) . '" class="sb-icon" alt="' . esc_attr( $title ) . '" />';
				}
			}
			
			$output .= '<div class="sb-content-wrapper">';
		
				if ( $disk == 'true' ) {
					$output .= '<div class="sb-disk" ' . $mediaconsult_disk_background . '></div>';
				}
		
				if( $title ) {
					if ( $url ) {
						$output .= '<h4 class="sb-title"><a href="' . $url . '" class="cel-underline"><span>' . esc_html( $title ) . '</span></a></h4>';
					} else {
						$output .= '<h4 class="sb-title">' . esc_html( $title ) . '</h4>';
					}
				}
		
				if( $tagline ) {
					$output .= '<div class="sb-tagline small-secondary">' . esc_html( $tagline ) . '</div>';
				}
		
				$output .= '<div class="sb-content">' . do_shortcode( $content ) . '</div>';
		
			$output .= '</div>';
		
		$output .= '</div>';
		
		return $output;
	 
	}
	add_shortcode( 'service_block', 'mediaconsult_service_block' );
}




// Service Title =========================================================================== >	
if( !function_exists( 'mediaconsult_service_title' ) ) {
	function mediaconsult_service_title( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'			=> '',
			'tagline'		=> '',
			'icon'			=> '',
			'icon_type'		=> '',
			'title'			=> ''
		  ),
		  $atts ) );
		
		
		
		$output = '';
		
		
		$output .= '<div class="cel-service-title ' .  esc_attr( $class ) . '">';
		
			if( $icon ) {
				if( $icon_type == 'icon' ) {
					$output .= '<i class="st-icon ' . esc_attr( $icon ) . '"></i>';
				} else {
					$output .= '<img src="' . esc_url( $icon ) . '" class="st-icon" alt="' . esc_attr( $title ) . '" />';
				}
			}
			
			$output .= '<div class="st-content-wrapper">';
			
				if( $title ) {
					$output .= '<h3 class="st-title">' . esc_html( $title ) . '</h3>';
				}
				if( $tagline ) {
					$output .= '<div class="st-tagline small-secondary">' . esc_html( $tagline ) . '</div>';
				}
		
			$output .= '</div>';
		
		$output .= '</div>';
		
		
		
		return $output;
	 
	}
	add_shortcode( 'service_title', 'mediaconsult_service_title' );
}
		
		
		
	

// Service Highlight =========================================================================== >	
if( !function_exists( 'mediaconsult_service_highlight' ) ) {
	function mediaconsult_service_highlight( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'			=> '',
			'title'			=> '',
			'icon'			=> '',
			'icon_type'		=> '',
			'background'	=> ''
		  ),
		  $atts ) );
		
		
		$mediaconsult_background = '';
		
		if ( $background ) {
			$mediaconsult_background = ' style="background-color: ' . esc_attr( $background ) . '; "';
		}
		
		
		$output = '';
		
		
		$output .= '<div class="cel-service-highlight ' .  esc_attr( $class ) . '">';
			
		
			$output .= '<div class="serh-title-wrapper" ' . $mediaconsult_background . '>';
		
				if( $icon ) {
					if( $icon_type == 'icon' ) {
						$output .= '<i class="serh-icon ' . esc_attr( $icon ) . '"></i>';
					} else {
						$output .= '<img src="' . esc_url( $icon ) . '" class="serh-icon" alt="' . esc_attr( $title ) . '" />';
					}
				}
				if( $title ) {
					$output .= '<h4 class="serh-title">' . esc_html( $title ) . '</h4>';
				}
			
			$output .= '</div>';
		
		
			$output .= '<div class="serh-content">' . do_shortcode( $content ) . '</div>';
		
		$output .= '</div>';
		
		
		return $output;
	 
	}
	add_shortcode( 'service_highlight', 'mediaconsult_service_highlight' );
}





// Card =========================================================================== >	
if( !function_exists( 'mediaconsult_card_block' ) ) {
	function mediaconsult_card_block( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'				=> '',
			'title'				=> '',
			'heading'			=> '',
			'url'				=> '',
			'clickable'			=> '',
			'image'				=> '',
			'text_align'		=> ''
		  ),
		  $atts ) );
		
		
		/* text align */
		$mediaconsult_align = '';
		
		if( $text_align == 'left' ) {
			
			$mediaconsult_align = 'cel-left';
			
		} elseif( $text_align == 'right' ) {
			
			$mediaconsult_align = 'cel-right';
			
		}
		
		/* is entire block clickable */
		if ( $clickable == 'true' ) {
			
			$mediaconsult_block_click = 'block-click';
			
		} else {
			
			$mediaconsult_block_click = '';
			
		}
		
		
		$output = '';
		
		$output .= '<div class="card cel-card ' .  esc_attr( $class ) . ' ' . esc_attr( $mediaconsult_block_click ) . '">';
		
			if( $image ) {
				
				$output .= '<div class="card-img-wrapper"><img src="' . esc_url( $image ) . '" class="card-img-top" alt="' . esc_attr( $title ) . '" /></div>';

			}
			
			$output .= '<div class="card-body ' . esc_attr( $mediaconsult_align ) . '">';
			
				if( $title ) {
					
					if ( $url ) {
					
						switch ( $heading ) {
							case 1:
								$output .= '<h1 class="card-title"><a href="' . $url . '" class="cel-underline"><span>' . esc_html( $title ) . '</span></a></h1>';
								break;
							case 2:
								$output .= '<h2 class="card-title"><a href="' . $url . '" class="cel-underline"><span>' . esc_html( $title ) . '</span></a></h2>';
								break;
							case 3:
								$output .= '<h3 class="card-title"><a href="' . $url . '" class="cel-underline"><span>' . esc_html( $title ) . '</span></a></h3>';
								break;
							case 4:
								$output .= '<h4 class="card-title"><a href="' . $url . '" class="cel-underline"><span>' . esc_html( $title ) . '</span></a></h4>';
								break;
							case 5:
								$output .= '<h5 class="card-title"><a href="' . $url . '" class="cel-underline"><span>' . esc_html( $title ) . '</span></a></h5>';
								break;
							case 6:
								$output .= '<h6 class="card-title"><a href="' . $url . '" class="cel-underline"><span>' . esc_html( $title ) . '</span></a></h6>';
								break;
							default:
								$output .= '<h4 class="card-title"><a href="' . $url . '" class="cel-underline"><span>' . esc_html( $title ) . '</span></a></h4>';
								break;
						}
						
					} else {
						
						switch ( $heading ) {
							case 1:
								$output .= '<h1 class="card-title">' . esc_html( $title ) . '</h1>';
								break;
							case 2:
								$output .= '<h2 class="card-title">' . esc_html( $title ) . '</h2>';
								break;
							case 3:
								$output .= '<h3 class="card-title">' . esc_html( $title ) . '</h3>';
								break;
							case 4:
								$output .= '<h4 class="card-title">' . esc_html( $title ) . '</h4>';
								break;
							case 5:
								$output .= '<h5 class="card-title">' . esc_html( $title ) . '</h5>';
								break;
							case 6:
								$output .= '<h6 class="card-title">' . esc_html( $title ) . '</h6>';
								break;					
							default:
								$output .= '<h4 class="card-title">' . esc_html( $title ) . '</h4>';
								break;
						}						
						
					}

				}
		

    			$output .= '<div class="card-text">' . do_shortcode( $content ) . '</div>';
		
		
			$output .= '</div>';
		
		$output .= '</div>';
		
		
		
		return $output;
	 
	}
	add_shortcode( 'card_block', 'mediaconsult_card_block' );
}





// Section Title =========================================================================== >	
if( !function_exists( 'mediaconsult_title_bar' ) ) {
	function mediaconsult_title_bar( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'class'      	  => '',
			'title'			  => '',
			'heading'         => '',
			'icon'			  => '',
			'icon_rotate'	  => ''
		), $atts));
		
		
		if ( $icon_rotate ) {
			$mediaconsult_icon_rotate = ' style="transform: rotate(' . esc_attr( $icon_rotate ) . 'deg)"';
		} else {
			$mediaconsult_icon_rotate = '';
		}
		
		
		
		$output = '';
		
		$output .= '<div class="cel-title-bar">';
			
		if ( $icon ) {
			
			$output .= '<i class="ctb-icon '. esc_attr( $icon ) . '" '.  $mediaconsult_icon_rotate  . '></i>';
			
		}
			
		switch ( $heading ) {
			case 1:
				$output .= '<h1 class="skin-color">' . esc_html( $title ) . '</h1>';
				break;
			case 2:
				$output .= '<h2 class="skin-color">' . esc_html( $title ) . '</h2>';
				break;
			case 3:
				$output .= '<h3 class="skin-color">' . esc_html( $title ) . '</h3>';
				break;
			case 4:
				$output .= '<h4 class="skin-color">' . esc_html( $title ) . '</h4>';
				break;
			case 5:
				$output .= '<h5 class="skin-color">' . esc_html( $title ) . '</h5>';
				break;
			case 6:
				$output .= '<h6 class="skin-color">' . esc_html( $title ) . '</h6>';
				break;					
			default:
				$output .= '<h2 class="skin-color">' . esc_html( $title ) . '</h2>';
				break;
		} 

		$output .= '</div>';
		
		return $output;
		
	}
	add_shortcode( 'title_bar', 'mediaconsult_title_bar' );
}



// Company Highlights =========================================================================== >	
if( !function_exists( 'mediaconsult_company_highlights' ) ) {
	function mediaconsult_company_highlights( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'class'      	  => '',
			'columns'      	  => '3',
			'button_text'     => '',
			'button_url'   	  => '',
			'message' 	      => '',
			'color'			  => ''


		), $atts));
		
		if( !$color ) { $color = 'skin'; }
		
		$output = '';		
		
		$output .= '<div class="ch-wrapper ' . esc_html( $class ) . '">';
		
			$output .= '<div class="ch-grid-' . esc_html( $columns ) . ' centered-text">';
		
			$output .= do_shortcode( $content );
			
			$output .= '</div>';
			
			$output .= '<div class="ch-call-to-action ch-call-to-action-grid">';
				
				$output .= '<div class="ch-cta-grid-item">';
		
				$output .= '<p>' . esc_html( $message ) . '</p>';
				
				$output .= '</div>';
		
				if( $button_text ) {
					
					$output .= '<div class="ch-cta-grid-item">';
					
					$output .= '<a href="' . esc_url( $button_url ) . '" class="celestial-button celestial-button-fill celestial-button-' . $color . '">' . $button_text . '</a>';
					
					$output .= '</div>';
					 
				}
		
			$output .= '</div>';
		
		$output .= '</div>';		
		
		return $output;
		
	}
	add_shortcode( 'company_highlights', 'mediaconsult_company_highlights' );
}		
		


// Company Highlights =========================================================================== >	
if( !function_exists( 'mediaconsult_company_highlights_section' ) ) {
	function mediaconsult_company_highlights_section( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'number'      	  => '',
			'desc'     => ''
		), $atts));
		
		
		$output = '';
		
		
		$output .= '<div class="ch-section">';
			
			$output .= '<h3 class="chs-number">' . esc_html( $number ) . '</h3>';
			$output .= '<h5 class="chs-desc">' . esc_html( $desc ) . '</h5>';
		
		$output .= '</div>';
		
		
		return $output;
		
	}
	add_shortcode( 'company_highlights_section', 'mediaconsult_company_highlights_section' );
}



// Call To Action =========================================================================== >	
if( !function_exists( 'mediaconsult_cta' ) ) {
	function mediaconsult_cta( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'background_image'           => '',
			'background_color'		     => '',
			'icon'					     => '',
			'url'					     => '',
			'button_text'	     	     => '',
			'button_color'	     	     => '',
			'title'						 => ''
		), $atts));
		

		
		if( $icon && $button_text ) {
		
			$mediaconsult_cta_grid = '3';
		
		} elseif( $icon && !$button_text ) {
		
			$mediaconsult_cta_grid = 'icon-2';
			
		} elseif( !$icon && $button_text ) {
		
			$mediaconsult_cta_grid = '2';
			
		} else {
			
			$mediaconsult_cta_grid = '1';
		}
		
		
		if( !$button_color ) { $button_color = 'skin'; }
		
		if( $background_color ) { 
			
			$mediaconsult_background_color = 'background-color:'. $background_color;
			
		}
		
		$output = '';
		

		$output .= '<div class="cta-section cta-grid-' . esc_html( $mediaconsult_cta_grid ) . '" style="' . $mediaconsult_background_color . '">';
			
			if( $background_image ) { 

				$output .= '<img src="' . esc_url( $background_image ) . '" alt="' . esc_attr( $title ) . '" class="cta-image" />';

			}
		
			if( $icon ) {
				
				$output .= '<div class="cta-grid-item">';
				
					$output .= '<i class="cta-icon ' . esc_attr( $icon ) . '"></i>';
				
				$output .= '</div>';
				
			}
		
			if( $title ) {
				
				$output .= '<div class="cta-grid-item cta-grid-content">';
				
					$output .= '<h2 class="cta-title">' . esc_html__( $title ) . '</h2>';
				
				$output .= '</div>';
				
			} else {
				
				$output .= '<div class="cta-grid-item">';
				
					$output .= '<h2 class="cta-title">' . esc_html__( 'Insert Your Own Call To Action Title', 'mediaconsult' ) . '</h2>';
				
				$output .= '</div>';
				
			}
		
			if( $button_text ) {
				
				$output .= '<div class="cta-grid-item">';
				
					$output .= '<a class="celestial-button celestial-button-fill celestial-button-' . $button_color . '" url="' . esc_url( $url ) . '">' . esc_html( $button_text ) . '</a>';
				
				$output .= '</div>';
				
			}		
		
		$output .= '</div>';
		
		
		return $output;
		
	}
	add_shortcode( 'cta', 'mediaconsult_cta' );
}




// Document Info =========================================================================== >	
if( !function_exists( 'mediaconsult_document_info' ) ) {
	function mediaconsult_document_info( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'icon'           => '',
			'desc'		     => '',
			'title'		     => '',
			'title_size'     => '',
			'single'	     => '',
			'url'		     => '#'
		), $atts));
		
		
		$mediaconsult_block_click = '';
		$mediaconsult_title_size = '';
		$mediaconsult_single = '';
		
		if( !$icon ) { $icon = 'mi-icon mi-icon-download2'; }
		
		if( $url ) {
			$mediaconsult_block_click = 'block-click';
		}
		
		if( $title_size == 'small' ) {
			$mediaconsult_title_size = 'di-small-title';
		}	
		
		if( $single == 'true' ) {
			$mediaconsult_single = 'di-single';
		}		
		
		
		$output = '';		
		
		
		$output .= '<div class="document-info ' . esc_attr( $mediaconsult_block_click ) . ' ' . esc_attr( $mediaconsult_single ) . '">';		
		
			$output .= '<div class="di-icon">';
		
				$output .= '<i class="' . esc_attr ( $icon ) . '"></i>';
		
			$output .= '</div>';
		
			$output .= '<div class="di-content">';
				
				$output .= '<h4 class="di-title ' . esc_attr( $mediaconsult_title_size ) . '"><a href="' . esc_url( $url ) . '">' . esc_html( $title ) . '</a></h4>';
		
				if( $desc ) {

					$output .= '<p class="di-desc">' . esc_html ( $desc ) . '</p>';

				}
		
			$output .= '</div>';
		

		
		$output .= '</div>';
		
		
		return $output;
		
	}
	add_shortcode( 'document_info', 'mediaconsult_document_info' );
}





// Team Member =========================================================================== >	
if( !function_exists( 'mediaconsult_team_member' ) ) {
	function mediaconsult_team_member( $atts, $content = null ) {
		
		extract( shortcode_atts( array(
			'class'           	=> '',
			'layout'          	=> '',
			'image'		     	=> '',
			'name'		     	=> '',
			'phone'				=> '',
			'email'				=> '',
			'biography_text'    => '',
			'position'		    => '',
			'facebook'		    => '',
			'linkedin'		    => '',
			'twitter'		    => '',
			'instagram'		    => '',
			'google_plus'	    => '',
			'email_icon'	    => ''
		), $atts ) );
		
		
		$id = "team_member_" . uniqid();
		
		
		if ( $biography_text ) {
			wp_enqueue_script( 'magnific-popup-call-js' );
		}
		
		
		$social_media_profiles = '';
			
		if( $facebook || $linkedin || $twitter || $instagram || $google_plus || $email_icon ) {
			
			if ( is_plugin_active('elementor/elementor.php') ) {
				
				$social_media_profiles .= '<ul class="tm-social-media media-wrapper media-wrapper-elementor">';
			
				if( $facebook ) {
					$social_media_profiles .= '<li class="media-icon cel-media-facebook"><a href="' . esc_url( $facebook ) . '"><i class="fa fa-facebook-f"></i><span>' . esc_html__( 'Facebook' ) . '</span></a></li>';
				}
				if( $linkedin ) {
					$social_media_profiles .= '<li class="media-icon cel-media-linkedin"><a href="' . esc_url( $linkedin ) . '"><i class="fa fa-linkedin"></i><span>' . esc_html__( 'Linkedin' ) . '</span></a></li>';
				}
				if( $twitter ) {
					$social_media_profiles .= '<li class="media-icon cel-media-twitter"><a href="' . esc_url( $twitter ) . '"><i class="fa fa-twitter"></i><span>' . esc_html__( 'Twitter' ) . '</span></a></li>';
				}
				if( $instagram ) {
					$social_media_profiles .= '<li class="media-icon cel-media-instagram"><a href="' . esc_url( $instagram ) . '"><i class="fa fa-instagram"></i><span>' . esc_html__( 'Instagram' ) . '</span></a></li>';
				}
				if( $google_plus ) {
					$social_media_profiles .= '<li class="media-icon cel-media-googleplus cm-googleplus-elementor"><a href="' . esc_url( $google_plus ) . '"><i class="fa fa-google-plus"></i><span>' . esc_html__( 'Google Plus' ) . '</span></a></li>';
				}
				if( $email_icon ) {
					$social_media_profiles .= '<li class="media-icon cel-media-email"><a href="mailto:' . esc_attr( $email_icon ) . '"><i class="fa fa-envelope"></i><span>' . esc_html__( 'Email' ) . '</span></a></li>';
				}	
				
				$social_media_profiles .= '</ul>';
				
			} else {
				
				$social_media_profiles .= '<ul class="tm-social-media media-wrapper">';
				
				if( $facebook ) {
					$social_media_profiles .= '<li class="media-icon cel-media-facebook"><a href="' . esc_url( $facebook ) . '"><i class="fab fa-facebook-f"></i><span>' . esc_html__( 'Facebook' ) . '</span></a></li>';
				}
				if( $linkedin ) {
					$social_media_profiles .= '<li class="media-icon cel-media-linkedin"><a href="' . esc_url( $linkedin ) . '"><i class="fab fa-linkedin-in"></i><span>' . esc_html__( 'Linkedin' ) . '</span></a></li>';
				}
				if( $twitter ) {
					$social_media_profiles .= '<li class="media-icon cel-media-twitter"><a href="' . esc_url( $twitter ) . '"><i class="fab fa-twitter"></i><span>' . esc_html__( 'Twitter' ) . '</span></a></li>';
				}
				if( $instagram ) {
					$social_media_profiles .= '<li class="media-icon cel-media-instagram"><a href="' . esc_url( $instagram ) . '"><i class="fab fa-instagram"></i><span>' . esc_html__( 'Instagram' ) . '</span></a></li>';
				}
				if( $google_plus ) {
					$social_media_profiles .= '<li class="media-icon cel-media-googleplus"><a href="' . esc_url( $google_plus ) . '"><i class="fab fa-google-plus-g"></i><span>' . esc_html__( 'Google Plus' ) . '</span></a></li>';
				}
				if( $email_icon ) {
					$social_media_profiles .= '<li class="media-icon cel-media-email"><a href="mailto:' . esc_attr( $email_icon ) . '"><i class="fas fa-envelope"></i><span>' . esc_html__( 'Email' ) . '</span></a></li>';
				}
				
				$social_media_profiles .= '</ul>';
				
			}
			
			
		} 
		
		
		
		
		$output = '';

			
		$output .= '<div class="team-member team-member-grid">';

			$output .= '<div class="tm-image-content">';

			if( $image ) {

				$output .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $name ) . '" class="tm-image" />';

			}

			$output .= '</div>';

			$output .= '<div class="tm-content">';

				if( $name ) {
					$output .= '<h4 class="tm-name skin-color">' . esc_html__( $name ) . '</h4>';
				}
				if( $position ) {
					$output .= '<div class="tm-position small-secondary">' . esc_html__( $position ) . '</div>';
				}
				if( $phone ) {
					$output .= '<div class="tm-phone">' . esc_html__( $phone ) . '</div>';
				}
				if( $email ) {
					$output .= '<div class="tm-email"><a href="mailto:' . esc_attr( $email ) . '">' . esc_html__( $email ) . '</a></div>';
				}		
				if ( $biography_text ) {
					$output .= '<a href="#' . $id . '" class="tm-biography-text magnific-popup-animation small-secondary"><i class="mi-icon mi-icon-profile"></i>' . esc_html__( $biography_text ) . '</a>';
				}
				
				$output .= $social_media_profiles;
				
		
				/* start lightbox content */
				if ( $biography_text ) {
					
					$output .= '<div id="' . $id . '" class="team-detail-wrapper zoom-anim-dialog mfp-hide">';
					
						$output .= '<div class="team-grid-detail">';
					
							$output .= '<div class="tm-image-content-detail">';

							if( $image ) {

								$output .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $name ) . '" class="tm-image" />';

							}
					
							$output .= $social_media_profiles;
					
							$output .= '</div>';	
					
							$output .= '<div class="tm-content-detail">';
					
								if( $name ) {
									$output .= '<h3 class="skin-color">' . esc_html__( $name ) . '</h3>';
								}
								if( $position ) {
									$output .= '<div class="tm-position small-secondary">' . esc_html__( $position ) . '</div>';
								}	
					
								$output .= do_shortcode( $content );
					
								if( $phone ) {
									$output .= '<div class="tm-phone">' . esc_html__( $phone ) . '</div>';
								}
								if( $email ) {
									$output .= '<div class="tm-email"><a href="mailto:' . esc_attr( $email ) . '">' . esc_html__( $email ) . '</a></div>';
								}	
					
							$output .= '</div>';
					
					
						$output .= '</div>';
					
					$output .= '</div>';
				}
				/* end lightbox content */
	

			$output .= '</div>';

		$output .= '</div>';

		$output .= '<div class="clearboth"></div>';

		
		
		
		
		return $output;
		
	}
	add_shortcode( 'team_member', 'mediaconsult_team_member' );
}




// Icon Text Block =========================================================================== >	
if( !function_exists( 'mediaconsult_testimonial' ) ) {
	function mediaconsult_testimonial( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'class'     		        => '',
			'type'		 	            => '',
			'name'       				=> '',
			'position'					=> '',
			'image'				        => '',
			'align'						=> ''
		), $atts));
		
		
		
		
		$mediaconsult_align = '';
		
		if( $align == 'left' ) {
			
			$mediaconsult_align = 'cel-left';
			
		} elseif($align == 'right') {
			
			$mediaconsult_align = 'cel-right';
			
		}
		
		
		
		$output = '';

		
		$output .= '<div class="testimonial-block ' .  esc_attr( $class ) . '">';


			$output .= '<blockquote>' . do_shortcode( $content ) . '</blockquote>';

			if( $image ) {

				$output .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $name ) . '" class="testimonial-image" />';

			}

			if( $name ) {

				$output .= '<h6 class="testimonial-name skin-color">' . $name . '</h6>';

			}

			if( $position ) {

				$output .= '<div class="testimonial-position small-secondary">' . $position . '</div>';

			}


		$output .= '</div>';
		
		
		
		
		return $output;
		
	}
	add_shortcode( 'testimonial', 'mediaconsult_testimonial' );
}


		

// Media Wrapper =========================================================================== >	
if( !function_exists( 'mediaconsult_media_wrapper' ) ) {
	function mediaconsult_media_wrapper( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'class'           => ''
		), $atts));
		
		
		$output = '';		
		
		$output .= '<ul class="media-wrapper ' .  esc_attr( $class ) . '">';

			$output .= do_shortcode( $content );
		
		$output .= '</ul>';
		
		return $output;
		
	}
	add_shortcode( 'media_wrapper', 'mediaconsult_media_wrapper' );
}




// Social Media Icon =========================================================================== >	
if( !function_exists( 'mediaconsult_media_icon' ) ) {
	function mediaconsult_media_icon( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'class'           => '',
			'icon' 	          => '',
			'url' 	          => ''
		), $atts));
		
		
		$output = '';		
		
		$output .= '<li class="media-icon ' .  esc_attr( $class ) . '"><a href="' . esc_url( $url ) . '"><i class="' . esc_attr( $icon ) . '"></i></a></li>';
		
		return $output;
		
	}
	add_shortcode( 'media_icon', 'mediaconsult_media_icon' );
}




// Icon Text Block =========================================================================== >	
if( !function_exists( 'mediaconsult_icon_text_block' ) ) {
	function mediaconsult_icon_text_block( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'class'     		        => '',
			'icon'		 	            => '',
			'icon_size'       			=> '',
			'icon_top_margin'			=> '',
			'content_left_margin'       => ''
		), $atts));
		
		
		/* icon size */
		if( !$icon_size ) {
			$mediaconsult_icon_size = '16px'; 
		} else {
			$mediaconsult_icon_size = $icon_size;
		}
		
		/* icon top margin */
		if( !$content_left_margin ) {
			$mediaconsult_icon_top_margin = '0px';
		} else {
			$mediaconsult_icon_top_margin = $icon_top_margin;
		}
		
		/* content left margin */
		if( !$content_left_margin ) {
			$mediaconsult_content_left_margin = '34px';
		} else {
			$mediaconsult_content_left_margin = $content_left_margin;
		}
		
		
		$output = '';
		
		
		$output .= '<div class="itb-wrapper ' .  esc_attr( $class ) . '">';
		
		
			if( $icon ) {

				$output .= '<i class="itb-icon ' . esc_attr( $icon ) . '" style="font-size: ' . $mediaconsult_icon_size . '; top: ' . $mediaconsult_icon_top_margin . ';"></i>';

			}
		
			$output .= '<div class="itb-content" style="margin-left: ' . $mediaconsult_content_left_margin . ';">' . do_shortcode( $content ) . '</div>';
		
		$output .= '</div>';
		
		return $output;
		
	}
	add_shortcode( 'icon_text_block', 'mediaconsult_icon_text_block' );
}




// Lightbox =========================================================================== >	
if( !function_exists( 'mediaconsult_lightbox' ) ) {
	function mediaconsult_lightbox( $atts  ) {		
		extract( shortcode_atts( array(
			'title' 			=> '',
			'url' 				=> '',
			'thumbnail' 		=> '',
			'align'				=> '',
			'width'				=> '',
			'type'				=> ''
		), $atts ) );
		
		
		wp_enqueue_script( 'magnific-popup-call-js' );
		
		
		
		$mediaconsult_align = '';
		
		if( $align == 'left' ) {
			
			$mediaconsult_align = 'cel-left';
			
		} elseif($align == 'right') {
			
			$mediaconsult_align = 'cel-right';
			
		}

		
		$mediaconsult_width = '';
		
		if( $width ) {
			
			$mediaconsult_width = ' style="width:' . $width . '"';
			
		}
		
		
		if( $type == 'gallery' ) {
			
			$mediaconsult_type = 'magnific-popup';
			
		} elseif( $type == 'video' ) {
			
			$mediaconsult_type = 'magnific-popup-video';
			
		} else {
			
			$mediaconsult_type = 'magnific-popup-single';
			
		}
		
		
		
		$output  = '';
		
		$output .= '<div class="lightbox-wrapper imgp-wrapper ' . $mediaconsult_align . '" ' . $mediaconsult_width . '>';
		
			$output .= '<a href="' . esc_url( $url ) . '" class="' . $mediaconsult_type . '">';
				
				$output .= '<span class="imgp-icon"><i class="mi-icon mi-icon-plus3"></i></span>';
			
				$output .= '<img src="' . esc_url( $thumbnail ) . '" alt="' . esc_attr( $title ) . '" />';
		
			$output .= '</a>';
		
		$output .= '</div>';
		
		
		return $output;

	}
	add_shortcode( 'lightbox', 'mediaconsult_lightbox' );
}


		
		
// Google Map =========================================================================== >	
if( !function_exists( 'mediaconsult_google_map' ) ) {
	function mediaconsult_google_map( $atts, $content = null ) {
		
		extract( shortcode_atts( array(
		  'class'                 => '',
		  'zoom'                  => 16,
		  'latitude'              => '51.516684',
		  'longitude'             => '-0.027637',
		  'marker_image'          => '',
		  'mapinfo'               => esc_html__( 'map location description', 'mediaconsult' ),
		  'height'                => '380',
		  'dragging_mobile'       => 'true',
		  'dragging_desktop'      => 'true',
		  'map_skin'              => 'light',
		  'api_key'               => '',
		  'css'                   => ''
		  ), $atts ) );


		$id = "map_" . uniqid();

		/* map height */
		$mediaconsult_height = '';

		if( $height ) {
			$mediaconsult_height = ' style="height:' . $height . ';"'; 
		}


		/* market image */
		if( !$marker_image ) {
			
			$marker_image = get_template_directory_uri() . '/assets/images/map-marker.png';
			
		}   


		/* map dragging */
		$dragging = '';


		if( wp_is_mobile() ) {
			
			$dragging = $dragging_mobile;
			
		} else {
			
			$dragging = $dragging_desktop;
			
		}

		
		/* google maps API key */
		$mediaconsult_gmap_key = get_theme_mod( 'gmaps_api_key' );
		
		wp_enqueue_script( 'google-maps-api', '//maps.googleapis.com/maps/api/js?key="' . $mediaconsult_gmap_key . '"', array( 'jquery' ), null, false );		
		
		

		$googlemap_data = array(
			'gm_latitude'       => $latitude, 
			'gm_longitude'      => $longitude, 
			'gm_mapinfo'        => $mapinfo,
			'gm_marker_image'   => $marker_image,
			'gm_zoom'           => $zoom,
			'gm_dragging'       => $dragging,
			'gm_id'             => $id,
			'gm_map_skin'       => $map_skin
		);
		wp_localize_script( 'googlemap_api_call', 'googlemap_data', $googlemap_data );
		wp_enqueue_script( 'googlemap_api_call' );

		
		
		if( $mediaconsult_gmap_key || $api_key ) {
			
			return '<div class="google-map-wrapper ' .  esc_attr( $class ) . '" ' . $mediaconsult_height . '><div id="' . esc_attr( $id ) . '"></div></div>';
			
		} else {
			
			return '<div class="google-map-wrapper ' .  esc_attr( $class ) . '">' . esc_html_e( 'You can\'t generate a map without the Google Maps API key. ', 'mediaconsult' ) . '</div>';
			
		}
		
		
	}
	
	add_shortcode( 'google_map', 'mediaconsult_google_map' );
}



// Tab Title Wrapper  =========================================================================== >	
if( !function_exists( 'mediaconsult_tabs_body' ) ) {
function mediaconsult_tabs_body( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'class'      	=> '',
			'type'      	=> ''
		), $atts));
	
	
		if( $type == 'below' ) {
			
			return '<div class="celestial-tabs tabs-grid tabs-below">' . do_shortcode( $content ) . '</div>';
			
		} elseif( $type == 'left' ) {
			
			return '<div class="celestial-tabs tabs-grid tabs-left">' . do_shortcode( $content ) . '</div>';
		
		} elseif( $type == 'right' ) {
			
			return '<div class="celestial-tabs tabs-grid tabs-right">' . do_shortcode( $content ) . '</div>';
			
		} else {
			
			return '<div class="celestial-tabs tabs-grid tabs-top">' . do_shortcode( $content ) . '</div>';
			
		}
	
	
	}
	add_shortcode( 'tabs_body', 'mediaconsult_tabs_body' );
}




// Tab Title Wrapper  =========================================================================== >	
if( !function_exists( 'mediaconsult_tab_title_wrapper' ) ) {
function mediaconsult_tab_title_wrapper( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'class'      		=> '',
			'section_id'        => ''
		), $atts));	
		
			
		return '<div class="tabs-nav-parent"><ul class="nav nav-tabs ' . esc_attr( $class ) . '" id="' . $section_id . '" role="tablist">' . do_shortcode( $content ) . '</ul></div>';

	
	}
	add_shortcode( 'tab_title_wrapper', 'mediaconsult_tab_title_wrapper' );
}


// Tabb Title Section =========================================================================== >	
if( !function_exists( 'mediaconsult_tab_title' ) ) {
	function mediaconsult_tab_title( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'active' 		=> 'false',
			'title' 		=> '',
			'icon' 			=> '',
			'id' 			=> '',					
		), $atts ) );

		

		$output = '';
		
		if( $active == 'true' ) {	
			
			if( $icon ) {
				$output .= '<li class="nav-item"><a class="nav-link active" id="' . esc_attr( $id ) . '-tab" data-toggle="tab" href="#' . esc_attr( $id ) . '" role="tab" aria-controls="' . esc_attr( $id ) . '" aria-selected="false"><i class="' . esc_attr( $icon ) . '"></i>' . esc_html( $title ) . '</a></li>';
			} else {
				$output .= '<li class="nav-item"><a class="nav-link active" id="' . esc_attr( $id ) . '-tab" data-toggle="tab" href="#' . esc_attr( $id ) . '" role="tab" aria-controls="' . esc_attr( $id ) . '" aria-selected="false">' . esc_html( $title ) . '</a></li>';				
			}
			
		} else {
			
			if( $icon ) {
				$output .= '<li class="nav-item"><a class="nav-link" id="' . esc_attr( $id ) . '-tab" data-toggle="tab" href="#' . esc_attr( $id ) . '" role="tab" aria-controls="' . esc_attr( $id ) . '" aria-selected="false"><i class="' . esc_attr( $icon ) . '"></i>' . esc_html( $title ) . '</a></li>';
			} else {
				$output .= '<li class="nav-item"><a class="nav-link" id="' . esc_attr( $id ) . '-tab" data-toggle="tab" href="#' . esc_attr( $id ) . '" role="tab" aria-controls="' . esc_attr( $id ) . '" aria-selected="false">' . esc_html( $title ) . '</a></li>';
			}
			
		}
		
	   return $output;
	}

	add_shortcode( 'tab_title', 'mediaconsult_tab_title' );
}


// Tab Content Wrapper =========================================================================== >	
if( !function_exists( 'mediaconsult_tab_content_wrapper' ) ) {
function mediaconsult_tab_content_wrapper( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'section_id'      => ''
		), $atts) );
		
			
		return '<div class="tab-content" id="' . esc_attr( $section_id ) . '">' . do_shortcode( $content ) . '</div>';	
		
	}
	
	add_shortcode( 'tab_content_wrapper', 'mediaconsult_tab_content_wrapper' );
}



/* tab title section shortcode */
if( !function_exists( 'mediaconsult_tab_content' ) ) {
	function mediaconsult_tab_content( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'class' 		=> '',
			'active' 		=> 'false',
			'id' 			=> ''				
		), $atts ) );

		

		$output = '';
		
		if( $active == 'true' ) {
			
			$output .= '<div class="tab-pane fade show active ' .  esc_attr( $class ) . '" id="' . $id . '">' . do_shortcode( $content ) . '</div>';
			
		} else {
			
			$output .= '<div class="tab-pane fade" id="' . esc_attr( $id ) . '">' . do_shortcode( $content ) . '</div>';
			
		}
		
	   return $output;
	   
	}
	add_shortcode( 'tab_content', 'mediaconsult_tab_content' );
}




// Toggle Content =========================================================================== >
if( !function_exists( 'mediaconsult_toggle_content' ) ) {
	function mediaconsult_toggle_content( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'class' 		=> '',
			'title' 		=> '',
			'active' 		=> 'false'	
		), $atts ) );

		
		$id = "toggle_" . uniqid();
		
		
		$output = '';
		
		if( $active == 'true' ) {
			
			$output .= '<div class="celestial-toggle-block ' .  esc_attr( $class ) . '">';
			
				$output .= '<h6 class="cel-toggle-title"><a data-toggle="collapse" href="#' . $id . '" aria-expanded="true" aria-controls="' . $id . '">' . esc_html( $title ) . '</a></h6>';
			
				$output .= '<div class="cel-toggle-content collapse show" id="' . $id . '"><div class="cel-toggle-inner-content">' . do_shortcode( $content ) . '</div></div>';
			
			$output .= '</div>';
			
		} else {
			
			$output .= '<div class="celestial-toggle-block ' .  esc_attr( $class ) . '">';
			
				$output .= '<h6 class="cel-toggle-title"><a class="collapsed" data-toggle="collapse" href="#' . $id . '" aria-expanded="false" aria-controls="' . $id . '">' . esc_html( $title ) . '</a></h6>';
			
				$output .= '<div class="cel-toggle-content collapse" id="' . $id . '"><div class="cel-toggle-inner-content">' . do_shortcode( $content ) . '</div></div>';
			
			$output .= '</div>';
			
		}
		
	   return $output;
	   
	}
	add_shortcode( 'toggle_content', 'mediaconsult_toggle_content' );
}




// Accordion Wrapper =========================================================================== >
if( !function_exists( 'mediaconsult_accordion_wrapper' ) ) {
	function mediaconsult_accordion_wrapper( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'class' 		=> '',
			'accordion_id' 	=> ''
		), $atts ) );

		
	   return '<div class="celestial-accordion-wrapper ' .  esc_attr( $class ) . '" id="' . esc_attr( $accordion_id ) . '">' . do_shortcode( $content ) . '</div>';
	   
	}
	add_shortcode( 'accordion_wrapper', 'mediaconsult_accordion_wrapper' );
}




// Accordion Block =========================================================================== >
if( !function_exists( 'mediaconsult_accordion_block' ) ) {
	function mediaconsult_accordion_block( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'title' 		=> '',
			'accordion_id' 	=> '',
			'active' 		=> 'false'
		), $atts ) );

		
		$id = "accordion_" . uniqid();
		
		$id_collapse = "accordion_collapse_" . uniqid();
		
		
	   	$output = '';
		
		if( $active == 'true' ) {
			
			$output .= '<div class="card">';
			
				$output .= '<div class="card-header" id="' . esc_attr( $id ) . '">';
			
					$output .= '<h6 class="cel-accordion-title">';
						
						$output .= '<a data-toggle="collapse" data-target="#' . esc_attr( $id_collapse ) . '" aria-expanded="true" aria-controls="' . esc_attr( $id_collapse ) . '">' . esc_html( $title ) . '</a>';
			
					$output .= '</h6>';
			
				$output .= '</div>';
			

				$output .= '<div id="' . esc_attr( $id_collapse ) . '" class="cel-accordion-content collapse show" aria-labelledby="' . esc_attr( $id ) . '" data-parent="#' . esc_attr( $accordion_id ) . '">';
			
					$output .= '<div class="card-body">' . do_shortcode( $content ) . '</div>';
			
				$output .= '</div>';
			
			$output .= '</div>';			
			
		} else {
			
			$output .= '<div class="card">';
			
				$output .= '<div class="card-header" id="' . esc_attr( $id ) . '">';
			
					$output .= '<h6 class="cel-accordion-title">';
						
						$output .= '<a data-toggle="collapse" data-target="#' . esc_attr( $id_collapse ) . '" aria-expanded="false" aria-controls="' . esc_attr( $id_collapse ) . '" class="collapsed">' . esc_html( $title ) . '</a>';
			
					$output .= '</h6>';
			
				$output .= '</div>';
			

				$output .= '<div id="' . esc_attr( $id_collapse ) . '" class="cel-accordion-content collapse" aria-labelledby="' . esc_attr( $id ) . '" data-parent="#' . esc_attr( $accordion_id ) . '">';
			
					$output .= '<div class="card-body">' . do_shortcode( $content ) . '</div>';
			
				$output .= '</div>';
			
			$output .= '</div>';				
			
		}
		
	   return $output;		
	   
	}
	add_shortcode( 'accordion_block', 'mediaconsult_accordion_block' );
}




// Slide Box =========================================================================== >	
if( !function_exists( 'mediaconsult_slide_box' ) ) {
	function mediaconsult_slide_box( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'margin' 			=> '',
			'background_color'	=> '',
			'text_color'		=> '',
			'padding'			=> '',
			'width'				=> '',
			'height'			=> '',
			'align'				=> ''
		), $atts ) );

		
		$mediaconsult_margin = '';
		$mediaconsult_padding = '';
		$mediaconsult_text_color = '';
		$mediaconsult_background_color = '';
		$mediaconsult_width = '';
		$mediaconsult_height = '';
			
		
		
		if( $margin ) {
			$mediaconsult_margin = 'margin: ' . $margin . ';';
		}
		
		if( $padding ) {
			$mediaconsult_padding = 'padding: ' . $padding . ';';
		}
		
		if( $text_color ) {
			$mediaconsult_text_color = 'color: ' . $text_color . ';';
		}
		
		if( $background_color ) {
			$mediaconsult_background_color = 'background-color: ' . $background_color . ';';
		}		
		
		if( $width ) {
			$mediaconsult_width = 'width: ' . $width . ';';
		}			
		
		if( $height ) {
			$mediaconsult_height = 'height: ' . $height . ';';
		}	
		
		if( $align == 'right' ) {
			
			$mediaconsult_align = 'float: right;';
			
		} else {
			
			$mediaconsult_align = 'float: left;';
			
		}
		
		
		
		$output = '';
		
		$output .= '<div class="cel-slide-box" style="' . $mediaconsult_align . ' ' . $mediaconsult_padding . ' ' . $mediaconsult_margin . ' ' . $mediaconsult_text_color . ' ' . $mediaconsult_background_color . ' ' . $mediaconsult_height . ' ' . $mediaconsult_width . ' ">';
		
			 $output .= do_shortcode( $content );
		
		$output .= '</div>';
		
		
		
		
	   return $output;		
	   
	}
	add_shortcode( 'slide_box', 'mediaconsult_slide_box' );
}





// Slide Bar =========================================================================== >	
if( !function_exists( 'mediaconsult_slide_bar' ) ) {
	function mediaconsult_slide_bar( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'position'			=> '',
			'margin' 			=> '',
			'padding' 			=> '',			
			'background_color'	=> '',
			'text_color'		=> ''
		), $atts ) );
		
		
		
		$mediaconsult_margin = '';
		$mediaconsult_padding = '';
		$mediaconsult_text_color = '';
		$mediaconsult_background_color = '';
		
		
		
		if( $position == 'top' ) {
			
			$mediaconsult_position = 'sbar-top';
		
		} else {
			
			$mediaconsult_position = 'sbar-bottom';
			
		}
		
		if( $margin ) {
			$mediaconsult_margin = 'margin: ' . $margin . ';';
		}
		
		if( $padding ) {
			$mediaconsult_padding = 'padding: ' . $padding . ';';
		}
		
		if( $text_color ) {
			$mediaconsult_text_color = 'color: ' . $text_color . ';';
		}
		
		if( $background_color ) {
			$mediaconsult_background_color = 'background-color: ' . $background_color . ';';
		}	
		
		
		
		
		$output = '';
		
		$output .= '<div class="cel-slide-bar ' . $mediaconsult_position . '" style="' . $mediaconsult_padding . ' ' . $mediaconsult_margin . ' ' . $mediaconsult_text_color . ' ' . $mediaconsult_background_color . ' ">';
		
			 $output .= do_shortcode( $content );
		
		$output .= '</div>';
		
		
		
		
	   return $output;		
	   
	}
	add_shortcode( 'slide_bar', 'mediaconsult_slide_bar' );
}




// HowTo Block =========================================================================== >	
if( !function_exists( 'mediaconsult_howto_block' ) ) {
	function mediaconsult_howto_block( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'border_bottom'    		=> 'true',
			'title' 				=> '',
			'url'	 				=> '',
			'image'					=> ''
		), $atts ) );	

		
		$mediaconsult_border_bottom = '';
		
		
		if ( $border_bottom == 'true' ) {
			$mediaconsult_border_bottom = 'howto-border-bottom';
		}
		
		
		
		$output = '';
		
		$output .= '<div class="howto-block ' . esc_attr( $mediaconsult_border_bottom ) . '">';
		
			if ( $image ) {
				
				$output .= '<div class="small-listing-img"><img src="' . esc_url( $image ) . '" alt="" /></div>';
				
			}
			
			$output .= '<div class="small-listing-content">';
				
			if ( $title ) {
				
				if ( $url ) {
					$output .= '<h3><a href="' . esc_url( $url ) . '" class="cel-underline"><span>' . esc_html( $title ) . '</span></a></h3>';
				} else {
					$output .= '<h3 class="skin-color">' . esc_html( $title ) . '</h3>';
				}
				
			}
			
			$output .= do_shortcode( $content );
		
			$output .= '</div>';
		
		$output .= '</div>';
		
		return $output;
		
	}
	
	add_shortcode( 'howto_block', 'mediaconsult_howto_block' );	
}




// History Wrapper =========================================================================== >
if( !function_exists( 'mediaconsult_history_wrapper' ) ) {
	function mediaconsult_history_wrapper( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'    		=> '',
		), $atts ) );	


		$output = '';
		
		$output .= '<ul class="cel-history-wrapper ' .  esc_attr( $class ) . '">' . do_shortcode( $content ) . '</ul>';

		return $output;
		
	}
	
	add_shortcode( 'history_wrapper', 'mediaconsult_history_wrapper' );	
}





// History Block =========================================================================== >
if( !function_exists( 'mediaconsult_history_block' ) ) {
	function mediaconsult_history_block( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'    				=> '',
			'title'					=> '',
			'year'					=> '',
			'dot_background'		=> ''
		), $atts ) );	
		
		
		$mediaconsult_dot_background = '';
		
		if ( $dot_background ) {
			$mediaconsult_dot_background = '<span style="background-color: ' . esc_html( $dot_background ) . '"></span>';
		}
		
		
		$output = '';
		
		
		$output .= '<li class="cel-history-block ' .  esc_attr( $class ) . '">';
			
			if ( $year ) {
				$output .= '<div class="cel-history-year">' . esc_html( $year ) . '</div>';
			}
			
			$output .= '<div class="cel-history-content">';
				
				$output .= '<div class="cel-history-dot">' . $mediaconsult_dot_background . '</div>';
				
				if ( $title ) {
					$output .= '<h3 class="cel-history-title">' . esc_html( $title ) . '</h3>';
				}
				
				$output .= '<div class="cel-history-innercontent">' . do_shortcode( $content ) . '</div>';
		
			$output .= '</div>';
		
		$output .= '</li>';
		
		
		return $output;
		
	}
	
	add_shortcode( 'history_block', 'mediaconsult_history_block' );	
}





// Flexible Banner =========================================================================== >
if( !function_exists( 'mediaconsult_flexible_banner' ) ) {
	function mediaconsult_flexible_banner( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'    				=> '',
			'content_align'			=> '',
			'background_color'		=> '',
			'background_image'		=> ''
		), $atts ) );	
		
		
		/* background color and background image */
		if ( $background_color && !$background_image ) {
			
			$mediaconsult_bg_output = ' style="background-color: ' . esc_attr( $background_color ) . '"';
			
		} elseif ( !$background_color && $background_image ) {
			
			$mediaconsult_bg_output = ' style="background-image: url(' . esc_url( $background_image ) . ')"';
			
		} elseif ( $background_color && $background_image ) {
			
			$mediaconsult_bg_output = ' style="background-color: ' . esc_attr( $background_color ) . '; background-image: url(' . esc_url( $background_image ) . ');"';

		} else {
			
			$mediaconsult_bg_output = '';
			
		}
		
		
		/* content alignment */
		if ( $content_align == 'left' ) {
			
			$mediaconsult_content_align = 'left';
			
		} elseif ( $content_align == 'center' ) {
			
			$mediaconsult_content_align = 'center';
			
		} else {
			
			$mediaconsult_content_align = 'right';
			
		}
		
		
		
		$output = '';
		
		$output .= '<div class="fbanner-wrapper ' .  esc_attr( $class ) . '" ' . $mediaconsult_bg_output . '>';
		
			$output .= '<div class="fbanner-content fbanner-content-' . esc_attr( $mediaconsult_content_align ) . '">' . do_shortcode( $content ) . '</div>';
		
		$output .= '</div>';


		return $output;
		
	}
	
	add_shortcode( 'flexible_banner', 'mediaconsult_flexible_banner' );	
}


		

// Quote Message =========================================================================== >
if( !function_exists( 'mediaconsult_quote_message' ) ) {
	function mediaconsult_quote_message( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'    				=> '',
			'show_quote'			=> '',
			'name'					=> '',
			'position'				=> '',
			'image'					=> '',
			'name_style'			=> '',
			'align'					=> '',
			'skin_color'			=> '',
		), $atts ) );	
		
		
		
		/* display quote symbol */
		if ( $show_quote == 'true' ) {
			
			$mediaconsult_show_quote = 'true';
			
		} else {
			
			$mediaconsult_show_quote = 'false';
			
		}
		
		
		
		/* content alignment */
		if ( $align == 'center' ) {
			
			$mediaconsult_align = 'cel-center';
			
			
			
		} elseif ( $align == 'right' ) {
			
			$mediaconsult_align = 'cel-right';
			
		} else {
			
			$mediaconsult_align = 'cel-left';
			

		}
		
		
		
		/* no margin right if image is not defined */
		if ( !$image ) {
			
			$mediaconsult_align_no_margin = 'cel-quote-no-margin';
			
		} else {
			
			$mediaconsult_align_no_margin = '';
			
		}
		
		
		/* skin color */
		if ( $skin_color == 'true' ) {
			
			$mediaconsult_skin_color = 'skin-color';
			
		} else {
			
			$mediaconsult_skin_color = '';
			
		}
		
		
		
		
		$output = '';
		
		$output .= '<div class="cel-quote-wrapper ' . esc_attr( $mediaconsult_align ) . ' ' .  esc_attr( $class ) . '">';
			

		
			$output .= '<div class="cel-quote cel-quote-' . esc_attr( $mediaconsult_show_quote ) . ' ' . esc_attr( $mediaconsult_align_no_margin ) . '">';
		
				if ( $image ) {
					$output .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $name ) . '" class="cel-quote-image" />';
				}		
		
				$output .= '<blockquote class="' . esc_attr( $mediaconsult_skin_color ) . '">' . do_shortcode( $content ) . '</blockquote>';
			
				if ( $name ) {
					if ( $name_style == 'minimal' ) {
						$output .= '<cite class="cel-quote-name badge">' . esc_html( $name ) . '</cite>';
					} else {
						$output .= '<cite class="cel-quote-name">' . esc_html( $name ) . '</cite>';
					}
				}

				if ( $position ) {
					$output .= '<div class="cel-quote-position">' . esc_url( $position ) . '</div>';
				}
		
			$output .= '</div>';	
	
		
		$output .= '</div>';		
		
		return $output;
		
	}
	
	add_shortcode( 'quote_message', 'mediaconsult_quote_message' );	
}





// Page Share =========================================================================== >	
if( !function_exists( 'mediaconsult_page_share' ) ) {
	function mediaconsult_page_share( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'    				=> '',
			'share_text'			=> 'Share'
		), $atts ) );	



		$output = '';
		
		$output .= '<div class="cel-page-share-wrapper ' . esc_attr( $class ) . '">';
			$output .= '<span class="cps-label">' . esc_html( $share_text ) . '</span>';
		
			$output .= '<div class="cps-content">';
		
				$output .= '<ul class="cps-main-list">';
					
					$output .= '<li class="cps-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url( get_permalink() ) . '"><i class="fa fa-facebook"></i><span>' . esc_html__( 'Facebook', 'mediaconsult' ) . '</span></a></li>';
					$output .= '<li class="cps-twitter"><a href="https://twitter.com/home?status=' . esc_url( get_permalink() ) . '"><i class="fa fa-twitter"></i><span>' . esc_html__( 'Twitter', 'mediaconsult' ) . '</span></a></li>';
					$output .= '<li class="cps-email"><a href="mailto:?body=' . esc_url( get_permalink() ) . '"><i class="fa fa-envelope"></i><span>' . esc_html__( 'Email', 'mediaconsult' ) . '</span></a></li>';
		
				$output .= '</ul>';
		
				$output .= '<div class="cps-open-close"></div>';
		
				$output .= '<ul class="cps-secondary-list">';
					
					$output .= '<li class="cps-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=' . esc_url( get_permalink() ) . '"><i class="fa fa-linkedin"></i><span>' . esc_html__( 'Linkedin', 'mediaconsult' ) . '</span></a></li>';
					$output .= '<li class="cps-googleplus"><a href="https://plus.google.com/share?url=' . esc_url( get_permalink() ) . '"><i class="fa fa-google-plus"></i><span>' . esc_html__( 'Google Plus', 'mediaconsult' ) . '</span></a></li>';
		
				$output .= '</ul>';		
		
		
			$output .= '</div>';
		$output .= '</div>';		
		
		return $output;
		
	}
	
	add_shortcode( 'page_share', 'mediaconsult_page_share' );	
}



// Post Share Minimal(used for ressources) =========================================================================== >	
if( !function_exists( 'mediaconsult_post_share_minimal' ) ) {
	function mediaconsult_post_share_minimal( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'    			=> '',
			'elementor'			=> 'false'
		), $atts ) );	



		$output = ''; 

		if ( $elementor == 'true' ) {

			$output .= '<ul class="media-wrapper media-wrapper-elementor">';

				$output .= '<li class="media-icon cel-media-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url( get_permalink() ) . '"><i class="fa fa-facebook-f"></i></a></li>';
				$output .= '<li class="media-icon cel-media-twitter"><a href="https://twitter.com/home?status=' . esc_url( get_permalink() ) . '"><i class="fa fa-twitter"></i></a></li>';
				$output .= '<li class="media-icon cel-media-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=' . esc_url( get_permalink() ) . '"><i class="fa fa-linkedin"></i></a></li>';
				$output .= '<li class="media-icon cel-media-email"><a href="mailto:?body=' . esc_url( get_permalink() ) . '"><i class="fa fa-envelope"></i></a></li>';
			
			$output .= '</ul>';

		} else {

			$output .= '<ul class="media-wrapper">';

				$output .= '<li class="media-icon cel-media-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url( get_permalink() ) . '"><i class="fab fa-facebook-f"></i></a></li>';
				$output .= '<li class="media-icon cel-media-twitter"><a href="https://twitter.com/home?status=' . esc_url( get_permalink() ) . '"><i class="fab fa-twitter"></i></a></li>';
				$output .= '<li class="media-icon cel-media-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=' . esc_url( get_permalink() ) . '"><i class="fab fa-linkedin-in"></i></a></li>';
				$output .= '<li class="media-icon cel-media-email"><a href="mailto:?body=' . esc_url( get_permalink() ) . '"><i class="fas fa-envelope"></i></a></li>';
			
			$output .= '</ul>';

		}

		return $output;
		
	}
	
	add_shortcode( 'post_share_minimal', 'mediaconsult_post_share_minimal' );	
}




// Post Share (used for default posts) =========================================================================== >	
if( !function_exists( 'mediaconsult_post_share' ) ) {
	function mediaconsult_post_share( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'    			=> '',
			'elementor'			=> 'false'
		), $atts ) );	


		$output = ''; 

		if ( $elementor == 'true' ) {

			$output .= '<div class="post-share media-wrapper-elementor">';

				$output .= '<ul class="post-share-list media-wrapper">';

					$output .= '<li><a href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url( get_permalink() ) . '" class="sm-icon-facebook"><i class="fa fa-facebook-f"></i></a></li>';

					$output .= '<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=' . esc_url( get_permalink() ) . '" class="sm-icon-linkedin"><i class="fa fa-linkedin"></i></a></li>';

					$output .= '<li><a href="https://reddit.com/submit?url=' . esc_url( get_permalink() ) . '" class="sm-icon-reddit"><i class="fa fa-reddit-alien"></i></a></li>';
					$output .= '<li><a href="https://stumbleupon.com/submit?url=' . esc_url( get_permalink() ) . '" target="_blank" class="sm-icon-stumbleupon"><i class="fa fa-stumbleupon"></i></a></li>';
					$output .= '<li><a href="https://twitter.com/home?status=' . esc_url( get_permalink() ) . '" class="sm-icon-twitter"><i class="fa fa-twitter"></i></a></li>';
					if(has_post_thumbnail() ) {
						$output .= '<li><a href="http://pinterest.com/pin/create/link/?url=' . esc_url( get_permalink() ) . '&amp;media=<?php echo esc_url ( wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ); ?>" class="sm-icon-pinterest"><i class="fa fa-pinterest-p"></i></a></li>';
					}
					$output .= '<li><a href="mailto:?body=' . esc_url( get_permalink() ) . '" class="sm-icon-email"><i class="fa fa-envelope"></i></a></li>';

				$output .= '</ul>';

			$output .= '</div>';

		} else {

			$output .= '<div class="post-share">';

				$output .= '<ul class="post-share-list media-wrapper">';

					$output .= '<li><a href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url( get_permalink() ) . '" class="sm-icon-facebook"><i class="fab fa-facebook-f"></i></a></li>';

					$output .= '<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=' . esc_url( get_permalink() ) . '" class="sm-icon-linkedin"><i class="fab fa-linkedin-in"></i></a></li>';

					$output .= '<li><a href="https://reddit.com/submit?url=' . esc_url( get_permalink() ) . '" class="sm-icon-reddit"><i class="fab fa-reddit-alien"></i></a></li>';
					$output .= '<li><a href="https://stumbleupon.com/submit?url=' . esc_url( get_permalink() ) . '" target="_blank" class="sm-icon-stumbleupon"><i class="fab fa-stumbleupon"></i></a></li>';
					$output .= '<li><a href="https://twitter.com/home?status=' . esc_url( get_permalink() ) . '" class="sm-icon-twitter"><i class="fab fa-twitter"></i></a></li>';
					if(has_post_thumbnail() ) {
						$output .= '<li><a href="http://pinterest.com/pin/create/link/?url=' . esc_url( get_permalink() ) . '&amp;media=<?php echo esc_url ( wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ); ?>" class="sm-icon-pinterest"><i class="fab fa-pinterest-p"></i></a></li>';
					}
					$output .= '<li><a href="mailto:?body=' . esc_url( get_permalink() ) . '" class="sm-icon-email"><i class="fas fa-envelope"></i></a></li>';

				$output .= '</ul>';

			$output .= '</div>';

		}

		return $output;
		
	}
	
	add_shortcode( 'post_share', 'mediaconsult_post_share' );	
}




// Widget Banner =========================================================================== >
if( !function_exists( 'mediaconsult_widget_banner' ) ) {
	function mediaconsult_widget_banner( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class'    					=> '',
			'background_color'			=> '',
			'background_image'			=> '',
			'text_color'				=> '',
			'icon'						=> '',
			'icon_type'					=> '',
			'clickable'					=> ''
		), $atts ) );	


		
		/* background color and background image */
		if ( $background_color && !$background_image ) {
			
			$mediaconsult_bg_output = ' style="background-color: ' . esc_attr( $background_color ) . '"';
			
		} elseif ( !$background_color && $background_image ) {
			
			$mediaconsult_bg_output = ' style="background-image: url(' . esc_url( $background_image ) . ')"';
			
		} elseif ( $background_color && $background_image ) {
			
			$mediaconsult_bg_output = ' style="background-color: ' . esc_attr( $background_color ) . '; background-image: url(' . esc_url( $background_image ) . ');"';

		} else {
			
			$mediaconsult_bg_output = '';
			
		}
		
		
		/* clickable */
		if ( $clickable == 'true' ) {
			
			$mediaconsult_block_click = 'block-click';
			
		} else {
			
			$mediaconsult_block_click = '';
			
		}
		
		
		
		$output = '';
		
		
		$output .= '<div class="cel-widget-banner-wrapper ' .  esc_attr( $class ) . ' ' . $mediaconsult_block_click . '" ' . $mediaconsult_bg_output . '>';
		
			$output .= '<div class="cwb-content">';
			
			
			if ( $icon ) {
				
				if ( $icon_type == 'image' ) {
					
					$output .= '<img src="' . esc_url( $icon ) . '" alt="" class="cwb-icon" />';
					
				} else {
					
					$output .= '<i class="cwb-icon ' . esc_html( $icon ) . '"></i>';
					
				}
				
				$output .= '<div class="cwb-inner-content">' . do_shortcode( $content ) . '</div>';
				
			} else {
				
				$output .= '<div class="cwb-inner-content cwb-inner-content-no-icon">' . do_shortcode( $content ) . '</div>';
				
			}
		
			$output .= '</div>';
		
		$output .= '</div>';		
		
		return $output;
		
	}
	
	add_shortcode( 'widget_banner', 'mediaconsult_widget_banner' );	
}
	



// Content Carousel =========================================================================== >	
if( !function_exists( 'mediaconsult_content_carousel' ) ) {
	function mediaconsult_content_carousel( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'visible_items'    		=> 3,
			'visible_items_ss' 		=> '',
			'visible_items_ss2' 	=> '',
			'nav_arrows'     		=> 'true',
			'nav_arrows_alt'     	=> '',
			'nav_dots'     			=> 'false',
			'nav_dots_align'    	=> '',
			'autoplay'				=> 'true',
			'loop'					=> 'true',
			'dots_position'			=> ''
		), $atts ) );	             
	
		
		$uniqid = uniqid();
		
		$token = wp_generate_password( 32, false, false );

		
		if( !$visible_items_ss ) {
			
			$visible_items_ss = $visible_items;
			
		}
		
		
		if ( $nav_dots_align == 'left' ) {
			
			$mediaconsult_dots_align = 'slick-left-dots';
			
		} elseif ( $nav_dots_align == 'right' ) {
			
			$mediaconsult_dots_align = 'slick-right-dots';
			
		} else {
			
			$mediaconsult_dots_align = 'slick-center-dots';
			
		}
	
		

		
		$slick_carousel_data = array( 
			'slick_visible_items' => $visible_items,
			'slick_visible_items_ss' => $visible_items_ss,
			'slick_visible_items_ss2' => $visible_items_ss2,
			'slick_nav_arrows' => $nav_arrows,
			'slick_nav_dots' => $nav_dots,
			'slick_autoplay' => $autoplay, 
			'slick_loop' => $loop,
			'slick_id' => $uniqid
		); 
		
		
		
		wp_localize_script( 'slick-carousel-call', 'slick_carousel_data_'.$token, $slick_carousel_data );
		
		wp_enqueue_script( 'slick-carousel-call' );		

		

		if( $dots_position == 'outside' ) {
			
			$mediaconsult_dots_position = 'slick-dots-outside';
			
		} else {

			$mediaconsult_dots_position = '';
			
		}
		
		
		
		$slick_nav_arrows_alt = '';
		
		if( $nav_arrows_alt == 'true' ) {
			
			$slick_nav_arrows_alt = 'cel-slick-arrows-alt';
			
		}
		
		
		$output = '';
		
		$output .= '<div class="celestial-carousel-parent celestial-slick-parent cc-parent-class-' . $uniqid . ' ' . $slick_nav_arrows_alt . ' ' . $mediaconsult_dots_position . ' ' . $mediaconsult_dots_align . '">';
		
			$output .= '<section class="celestial-carousel cc-class-' . $uniqid . '" id="celestial-carousel-' . $uniqid . '" data-token="' . $token . '">';

				$output .= do_shortcode( $content );

			$output .= '</section>'; /* end of .celestial-carousel */
		
		$output .= '</div>'; /* end of .celestial-carousel-parent */

		
		return $output;
		
	}
	
	add_shortcode( 'content_carousel', 'mediaconsult_content_carousel' );	
}





// Content Carousel Item =========================================================================== >
if( !function_exists( 'mediaconsult_content_carousel_item' ) ) {
	
	function mediaconsult_content_carousel_item( $atts, $content = null ) {
		return '<div class="slick-entry">' . do_shortcode( $content ) . '</div>';
	}
	add_shortcode( 'content_carousel_item', 'mediaconsult_content_carousel_item' );

}




// Latest Portfolio List =========================================================================== >	
if( !function_exists( 'mediaconsult_ressources_list' ) ) {
	function mediaconsult_ressources_list( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'qty'     				=> 3,
			'category'				=> '',
			'year'					=> '',
			'layout'				=> 'minimal'
		), $atts ) );	
		

		if ( $layout == 'minimal' ) { 
			$mediaconsult_layout_output = "crl-lines"; 
		} else {
			$mediaconsult_layout_output = ""; 
		}
		
							
		global $post;
		
		$loop = new WP_Query( array( 'post_type' => 'ressources', 'posts_per_page' => $qty, 'ressources_category' => $category, 'year' => $year ) );		
		
		
		$output = '';

		
		
		$output .= '<ul class="cel-ressources-ul ' . esc_attr( $mediaconsult_layout_output ) . '">';
			
		
			if ( $loop->have_posts() ) {

			/* start query */
			while ( $loop->have_posts() ) : $loop->the_post();
			
				
			/* ressource download link */
			$mediaconsult_ressource_download_link = get_post_meta( $post->ID, '_mc_ressource_download_link', true );

			/* ressource size */
			$mediaconsult_ressource_size = get_post_meta( $post->ID, '_mc_ressource_size', true );

			/* ressource format */
			$mediaconsult_ressource_format = get_post_meta( $post->ID, '_mc_ressource_format', true );

			/* has post detail: 1 true / 2 false */
			$mediaconsult_ressource_post_detail = get_post_meta( $post->ID, '_mc_ressource_post_detail', true );
				
			

			$output .= '<li>';

			
			if ( $layout == 'minimal' ) {
			
				
				$output .= '<article class="cel-ressources-minimal-block" itemscope itemtype="http://schema.org/Article">';

					if ( $mediaconsult_ressource_post_detail == '1' ) {

					$output .= '<h4>';
						$output .= '<a href="' . esc_url( get_permalink() ) . '" class="cel-underline">';
							$output .= '<span>' . esc_html( get_the_title() ) . '</span>';
						$output .= '</a>';
						$output .= '<a href="' . esc_url( get_permalink() ) . '">';
							$output .= '<span class="rmb-download-icon"><i class="fa fa-angle-right"></i></span>';
						$output .= '</a>';
					$output .= '</h4>';

					} else {

					$output .= '<h4>';
						$output .= '<a href="' . esc_url( $mediaconsult_ressource_download_link ) . '" class="cel-underline">';
							$output .= '<span>' . esc_html( get_the_title() ) . '</span>';
						$output .= '</a>';
						$output .= '<a href="' . esc_url( $mediaconsult_ressource_download_link ) . '">';
							$output .= '<span class="rmb-download-format">' . esc_html__( $mediaconsult_ressource_format ) . '</span>';
						$output .= '</a>';
					$output .= '</h4>';

					}

				$output .= '</article>';
				
				
			}
				
			
			$output .= '</li>';
			

			endwhile;
			/* end query */


			} else {
				$output .= '<p>' . esc_html__( 'The ressources library doesn\'t contain any posts.', 'mediaconsult' ) . '</p>';
			}

			wp_reset_postdata();
		
		
		$output .= '</ul>'; /* end of .cel-ressources-ul */
				
		return $output;
		
	}
	
	add_shortcode( 'ressources_list', 'mediaconsult_ressources_list' );	
}





// Latest Portfolio List =========================================================================== >	
if( !function_exists( 'mediaconsult_portfolio_list' ) ) {
	function mediaconsult_portfolio_list( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'qty'     				=> 3,
			'category'				=> ''
		), $atts ) );	


							
		global $post;
		
		$loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => $qty, 'portfolio_category' => $category ) );		
		
		
		$output = '';

		$output .= '<div class="innova-portfolio-list-wrapper">';
		
		
			if ( $loop->have_posts() ) {

			/* start query */
			while ( $loop->have_posts() ) : $loop->the_post();


			$output .= '<div class="innova-portfolio-list">';


			if( has_post_thumbnail() ) {


				$output .= '<div class="ipl-image-wrapper">';

					$output .= '<a href="' . esc_url( get_permalink() ) . '">';

						$output .= get_the_post_thumbnail( $post->ID, 'mediaconsult_240x116-crop' );

					$output .= '</a>';

				$output .= '</div>';

				$output .= '<div class="ipl-content">';

					$output .= '<h4><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h4>';

					$output .= '<p class="ipl-exceprt">' . mediaconsult_excerpt( '19' ) . '</p>';

				$output .= '</div>';

			} else {

				$output .= '<div class="ipl-content iplc-no-margin">';

					$output .= '<h4>' . esc_html( get_the_title() ) . '</h4>';

					$output .= '<p class="ipl-exceprt">' . mediaconsult_excerpt( '19' ) . '</p>';

				$output .= '</div>';

			}	

			$output .= '</div>'; /* end of .innova-portfolio-list */
		

			endwhile;
			/* end query */


			} else {
				$output .= '<p>' . esc_html__( 'The portfolio doesn\'t contain any posts.', 'mediaconsult' ) . '</p>';
			}

			wp_reset_postdata();
		
		
		$output .= '</div>'; /* end of .innova-portfolio-list-wrapper */
				
		return $output;
		
	}
	
	add_shortcode( 'portfolio_list', 'mediaconsult_portfolio_list' );	
}





// Latest Portfolio Carousel =========================================================================== >	
if( !function_exists( 'mediaconsult_portfolio_carousel' ) ) {
	function mediaconsult_portfolio_carousel( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'qty'     				=> 10,
			'category'     			=> '',
			'visible_items'    		=> 3,
			'nav_arrows'     		=> 'true',
			'nav_dots'     			=> 'false',
			'autoplay'				=> 'true',
			'loop'					=> 'true'			
		), $atts ) );	             
	
		

		$slick_carousel_port_data = array( 
			'slick_visible_items' => $visible_items, 
			'slick_nav_arrows' => $nav_arrows, 
			'slick_nav_dots' => $nav_dots, 
			'slick_autoplay' => $autoplay, 
			'slick_loop' => $loop
		); 
		
		wp_localize_script( 'slick-carousel-call', 'slick_carousel_port_data', $slick_carousel_port_data );
		
		wp_enqueue_script( 'slick-carousel-call' );
		
							
		global $post;
		
		$mediaconsult_query = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => $qty, 'portfolio_category' => $category ) );
	
		$output = '';

		$output .= '<div class="celestial-portfolio-posts-parent celestial-slick-parent">';
		
			$output .= '<section class="celestial-portfolio-posts">';


			if ( $mediaconsult_query -> have_posts() ) {

			/* start query */
			while ( $mediaconsult_query -> have_posts() ) : $mediaconsult_query -> the_post();

					$mediaconsult_price = get_post_meta( $post->ID, 'mediaconsult_price', true );

					if ( strlen(get_the_title()) > 28 ) { $short_title = substr( get_the_title(), 0, 28 ) . '...'; } else { $short_title = get_the_title(); }


					$output .= '<div class="slick-entry">';

				
						$output .= '<article class="ic-portfolio-block" itemscope itemtype="http://schema.org/Article">';
				
							if( has_post_thumbnail() ) {

								$output .= '<a href="' . esc_url( get_permalink() ) . '" class="ic-portfolio-img-url">';

									$output .= get_the_post_thumbnail( $post->ID, 'mediaconsult_port-thumb' );													                                     
								$output .= '</a>';

							}

							$output .= '<div class="ic-portfolio-info">';

								$output .= '<h2 class="ic-portfolio-title">';

									$output .= '<a href="' . esc_url( get_permalink() ) . '">' . esc_html__( $short_title ) . '</a>';

								$output .= '</h2>';

							$output .= '</div>';
				
				
						$output .= '</article>';
				
				

					$output .= '</div>'; /* end of .slick-entry */


				endwhile;
				/* end query */


				} else {
					$output .= '<p>' . esc_html__( 'The portfolio doesn\'t contain any posts.', 'mediaconsult' ) . '</p>';
				}

				wp_reset_postdata();


			$output .= '</section>'; /* end of .celestial-portfolio-posts */
		
		$output .= '</div>'; /* end of .celestial-portfolio-posts-parent */

		return $output;
		
	}
	
	add_shortcode( 'portfolio_carousel', 'mediaconsult_portfolio_carousel' );	
}





// Latest Blog Posts Carousel =========================================================================== >	
if( !function_exists( 'mediaconsult_featured_posts_slider' ) ) {
	function mediaconsult_featured_posts_slider( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'qty'     				=> 3,
			'category'     			=> '',
			'more_url'				=> '',
			'more_text'				=> ''
		), $atts ) );	             
	
		
		wp_enqueue_script( 'slick-carousel-call' );
		
		
		global $more, $post;

		$output = '';
		
		$mediaconsult_query = new WP_Query( array( 'posts_per_page' => $qty, 'category_name' => $category, 'post_status' => 'publish' ) );
		
		
		$output .= '<div class="cel-featured-posts-wrapper">';
		
			$output .= '<div class="cel-featured-posts-grid">';


				$output .= '<div class="slider cel-slick-featured-nav">';

					$output .= '<div class="cel-slick-inner-nav">';

						if ( $mediaconsult_query -> have_posts() ) {

							/* start query */
							while ( $mediaconsult_query -> have_posts() ) : $mediaconsult_query -> the_post();


								$output .= '<h5 class="cel-slick-nav-title"><span>' . get_the_title() . '</span></h5>';


							endwhile;
							/* end query */


						} else {
							$output .= '<p>' . esc_html__( 'The blog doesn\'t contain any posts.', 'mediaconsult' ) . '</p>';
						}

						wp_reset_postdata();

					$output .= '</div>';
					
					if ( $more_url ) {
						$output .= '<h5 class="cel-slick-nav-more"><a href="' . esc_url( $more_url ) . '"><span>' . esc_html__( 'More News', 'mediaconsult' ) . '</span></a></h5>';
					}

				$output .= '</div>';



				$output .= '<div class="slider cel-slick-featured-single">';



					if ( $mediaconsult_query -> have_posts() ) {

						/* start query */
						while ( $mediaconsult_query -> have_posts() ) : $mediaconsult_query -> the_post();

							$output .= '<div class="cel-featured-post-content">';
								
						 		$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'mediaconsult_default_slider-nocrop' );
						
								
								$output .= '<a class="featured-post-image" href="' . esc_url( get_permalink() ) . '">';
									$output .= '<span class="fp-image" style="background-image: url(' . esc_url( $featured_image_url[0] ) . ');"></span>';
								$output .= '</a>';
								
						
								$output .= '<span class="featured-post-date">';
									$output .= '<a href="' . esc_url( get_permalink() ) . '">' . get_the_date() . '</a>';
								$output .= '</span>';

								$output .= '<div class="featured-post-excerpt">' . mediaconsult_excerpt( '20' ) . '</div>';
						
								$output .= '<a href="' . esc_url( get_permalink() ) . '" class="more-link celestial-button-fill celestial-button-skin">' . esc_html__( 'Read More', 'mediaconsult' ) . '</a>';
							
							$output .= '</div>';
						
						endwhile;
						/* end query */

					}

					wp_reset_postdata();


				$output .= '</div>';


			$output .= '</div>'; /* end of .cel-featured-posts-grid */
		
		
		$output .= '</div>'; /* end of .cel-featured-posts-wrapper */

		
		return $output;
		
	}
	
	add_shortcode( 'featured_posts_slider', 'mediaconsult_featured_posts_slider' );	
}


		
		

// Latest Blog Posts Minimal =========================================================================== >	
if( !function_exists( 'mediaconsult_posts_small' ) ) {
	function mediaconsult_posts_small( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'qty'     				=> 3,
			'category'     			=> ''
		), $atts ) );	             
	
		
		global $more, $post;

		
		
		$mediaconsult_query = new WP_Query( array( 'posts_per_page' => $qty, 'category_name' => $category, 'post_status' => 'publish' ) );
		
		$mediaconsult_post_thumbnail = ' sl-no-thumbnail';
		
		
		$output = '';
		
		if ( $mediaconsult_query -> have_posts() ) {

			/* start query */
			while ( $mediaconsult_query -> have_posts() ) : $mediaconsult_query -> the_post();

			$output .= '<div class="small-listing-block small-listing-border">';

				if( has_post_thumbnail() ) { 

					$mediaconsult_post_thumbnail = ' sl-thumbnail';

					$output .= '<div class="small-listing-img">';
						$output .= '<a href="'.esc_url( get_permalink() ).'">';
							$output .= get_the_post_thumbnail( $post->ID, 'mediaconsult_122x122-crop' );	
						$output .= '</a>';
					$output .= '</div>';

					$output .= '<div class="clearboth"></div>';

				}		

				$output .= '<div class="small-listing-content ' . esc_attr( $mediaconsult_post_thumbnail ) . '">';

					$output .= '<h3 class="cel-post-title">';
						$output .= '<a href="' . esc_url( get_permalink() ) . '" class="cel-underline"><span>' . get_the_title() . '</span></a>';
					$output .= '</h3>';	

					$output .= '<div class="post-misc-small-listing">';
						$output .= '<span class="post-cols-date">';
							$output .= '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_date() ) . '</a>';
						$output .= '</span>';

						$output .= '<span class="post-cols-author small-secondary">';

							

						$output .= '</span>';
					$output .= '</div>';


					$output .= '<div class="small-listing-excerpt">' . mediaconsult_excerpt( '22' ) . '</div>';

					$output .= '<a href="' . esc_url( get_permalink() ) . '" class="small-secondary small-listing-permalink">';
						$output .= '<i class="icon icon-Arrow-Right"></i>' . esc_html__( 'Подробнее', 'mediaconsult' );
					$output .= '</a>';

				$output .= '</div>'; /* end of .small-listing-content */
			
			$output .= '</div>'; /* end of .small-listing-block */
		
			endwhile;
			/* end query */


			} else {
				$output .= '<p>' . esc_html__( 'The blog doesn\'t contain any posts.', 'mediaconsult' ) . '</p>';
			}

			wp_reset_postdata();
		
		
		return $output;
		
	}
	
	add_shortcode( 'posts_small', 'mediaconsult_posts_small' );	
}





// Latest Blog Posts Carousel =========================================================================== >	
if( !function_exists( 'mediaconsult_blog_carousel' ) ) {
	function mediaconsult_blog_carousel( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'qty'     				=> 10,
			'category'     			=> '',
			'visible_items'    		=> 3,
			'nav_arrows'     		=> 'true',
			'nav_dots'     			=> 'false',
			'autoplay'				=> 'true',
			'loop'					=> 'true'			
		), $atts ) );	             
	
		

		$slick_carousel_blog_data = array( 
			'slick_visible_items' => $visible_items, 
			'slick_nav_arrows' => $nav_arrows, 
			'slick_nav_dots' => $nav_dots, 
			'slick_autoplay' => $autoplay, 
			'slick_loop' => $loop
		); 
		
		wp_localize_script( 'slick-carousel-call', 'slick_carousel_blog_data', $slick_carousel_blog_data );
		
		wp_enqueue_script( 'slick-carousel-call' );
		
		
		
		global $more, $post;

		$output = '';
		
		$mediaconsult_query = new WP_Query( array( 'posts_per_page' => $qty, 'category_name' => $category, 'post_status' => 'publish' ) );
	

		$output .= '<div class="celestial-blog-posts-parent celestial-slick-parent">';
		
			$output .= '<section class="celestial-blog-posts">';


			if ( $mediaconsult_query -> have_posts() ) {

			/* start query */
			while ( $mediaconsult_query -> have_posts() ) : $mediaconsult_query -> the_post();

					$mediaconsult_price = get_post_meta( $post->ID, 'mediaconsult_price', true );

					if (strlen(get_the_title()) > 28) { $short_title = substr(get_the_title(), 0, 28) . '...'; } else { $short_title = get_the_title(); }


					$output .= '<div class="slick-entry">';

				
						$output .= '<article class="default-post-block" itemscope itemtype="http://schema.org/Article">';
				
							if( has_post_thumbnail() ) {

								$output .= '<div class="blogpost-img imgp-wrapper">';
								
									$output .= '<a href="' . esc_url( get_permalink() ) . '">';

										$output .= '<span class="imgp-icon"><i class="mi-icon mi-icon-arrow-right2"></i></span>';

										$output .= get_the_post_thumbnail( $post->ID, 'mediaconsult_674x314-crop' );													                                     
									$output .= '</a>';
								
								$output .= '</div>';
								
								$output .= '<div class="clearboth"></div>';
							}

				
				
							$output .= '<h3 class="cel-post-title">';
								$output .= '<a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a>';
							$output .= '</h3>';
						
				
							$output .= '<div class="post-misc">';

								$output .= '<span class="post-misc-date">';
									$output .= '<a href="' . esc_url( get_permalink() ) . '">'. get_the_date() .'</a>';
								$output .= '</span>';

							$output .= '</div>';
													
							$output .= '<div class="clearboth"></div>';
				
							$output .= '<div class="post-exceprt-wrapper">' . mediaconsult_excerpt('14') . '</div>';

							$output .= '<a href="' . esc_url(get_permalink()) . '" class="more-link">' . esc_html__( 'Read More', 'mediaconsult' ) . '</a>';							
				
				
						$output .= '</article>';
				
				

					$output .= '</div>'; /* end of .slick-entry */


				endwhile;
				/* end query */


				} else {
					$output .= '<p>' . esc_html__( 'The blog doesn\'t contain any posts.', 'mediaconsult' ) . '</p>';
				}

				wp_reset_postdata();


			$output .= '</section>'; /* end of .celestial-blog-posts */
		
		$output .= '</div>'; /* end of .celestial-blog-posts-parent */

		return $output;
		
	}
	
	add_shortcode( 'blog_carousel', 'mediaconsult_blog_carousel' );	
}



?>