<?php if( is_single() ) { ?>

	
	<?php if( 'false' !== get_theme_mod( 'show_author_post_detail', 'true' ) ) { ?>
	
		<div class="post-misc-author-wrapper">
			<?php get_template_part( 'inc/author-post' ); ?>
		</div>
		
	<?php } ?>

		
	<h1 id="post-<?php the_ID(); ?>" <?php post_class( 'cel-post-title cel-post-title-single' ); ?>><?php the_title(); ?></h1>


	<div class="post-misc post-misc-single small-secondary">

		<span class="post-misc-date">
			<?php echo esc_html( get_the_date() ); ?>
		</span>
		
		<span class="post-misc-dot">&#8226;</span>
		
		<?php if( has_category() ) { ?>
			  <span class="post-misc-category"><?php the_category(', '); ?></span>
		<?php } ?>
		
		<span class="post-misc-dot">&#8226;</span>
		
		<span class="post-misc-comments">
			<?php comments_popup_link( esc_html__( 'no comments', 'mediaconsult' ), esc_html__( '1 comment', 'mediaconsult' ), esc_html__( '% comments', 'mediaconsult' ), 'comments-link', esc_html__( 'disabled comments', 'mediaconsult' )); ?>
		</span>

	</div>
	
	

	<?php if( 'false' !== get_theme_mod( 'share_post_icons_top', 'true' ) ) { ?>
	
		<?php if ( in_array( 'mc-shortcodes/mc-shortcodes.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
			<div class="post-icons-top">
				<?php if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

					echo do_shortcode('[post_share elementor="true"]');
				
				} else {
					
					echo do_shortcode('[post_share]');

				} ?>
			</div>
		<?php } ?>

	<?php } ?>
			
				
							
	<?php if( has_post_thumbnail() ) { ?>

		<div class="blogpost-img">
        
			<?php the_post_thumbnail(); ?>

		</div>                
		<div class="clearboth"></div>
		
	<?php }	?>
		
		
		
	<div class="entry-content entry-content-single"><?php the_content(); ?></div>
	
	<?php if( has_tag() ) { ?>

		<div class="tags-wrapper">
		
			<?php the_tags('', ''); ?>
			
		</div>

	<?php } ?>


<?php } else { ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'default-post-block' ); ?>>
	
		<h2 id="post-<?php the_ID(); ?>" <?php post_class( 'cel-post-title' ); ?>>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="cel-underline"><span><?php the_title(); ?></span></a>
		</h2>

		<div class="post-misc small-secondary">

			<span class="post-misc-date">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a>
			</span>

			<span class="post-misc-dot">&#8226;</span>

			<?php if( has_category() ) { ?>
				  <span class="post-misc-category"><?php the_category(', '); ?></span>
			<?php } ?>

			<span class="post-misc-dot">&#8226;</span>		

			<span class="post-misc-comments">
				<?php comments_popup_link( esc_html__( 'no comments', 'mediaconsult' ), esc_html__( '1 comment', 'mediaconsult' ), esc_html__( '% comments', 'mediaconsult' ), 'comments-link', esc_html__( 'disabled comments', 'mediaconsult' )); ?>
			</span>

		</div>


		<?php if( has_post_thumbnail() ) { ?>

			<div class="blogpost-img imgp-wrapper">
				<a href="<?php echo esc_url( get_permalink() ); ?>">

					<span class="imgp-icon"><i class="mi-icon mi-icon-arrow-right2"></i></span>
					<?php the_post_thumbnail(); ?>
				</a>
			</div>                

			<div class="clearboth"></div>
		<?php }	?>

		<div class="entry-content"><?php the_content( esc_html__( 'Read More', 'mediaconsult' ) ); ?></div>
	
	</div>
	
<?php } ?>