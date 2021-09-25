<?php if( is_single() ) { ?>

	
	<?php if( 'false' !== get_theme_mod( 'show_author_post_detail', 'true' ) ) { ?>
	
		<div class="post-misc-author-wrapper">
			<?php get_template_part( 'inc/author-post' ); ?>
		</div>
		
	<?php } ?>

		
	<h1 id="post-<?php the_ID(); ?>" <?php post_class( 'cel-post-title cel-post-title-single' ); ?>><?php the_title(); ?></h1>

	
									
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
	
	<?php $mediaconsult_post_thumbnail = ' sl-no-thumbnail'; ?>
	
	<div fdfsd="sdfsdfds" id="post-<?php the_ID(); ?>" <?php post_class( 'small-listing-block small-listing-border' ); ?>>
	
		<?php if( has_post_thumbnail() ) { 
			
			$mediaconsult_post_thumbnail = ' sl-thumbnail'; ?>
			
			<div class="small-listing-img">
				<a href="#">
					<?php /*the_post_thumbnail( 'mediaconsult_122x122-crop' );*/ ?>
				</a>
			</div>

			<div class="clearboth"></div>
			
		<?php }	?>
		
		<div class="dfsdfs small-listing-content <?php echo esc_attr( $mediaconsult_post_thumbnail ); ?>">
		
			<h3 id="post-<?php the_ID(); ?>" <?php post_class( 'cel-post-title' ); ?>>
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="cel-underline"><span><?php the_title(); ?></span></a>
			</h3>

			<div class="post-misc-small-listing">
				<span class="post-cols-date">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a>
				</span>

				<span class="post-cols-author small-secondary">
					<?php get_template_part( 'inc/author-post' ); ?>
				</span>
			</div>

			<div class="small-listing-excerpt"><?php echo mediaconsult_excerpt( '22' ); ?></div>

			<a href="<?php echo esc_url( get_permalink() ); ?>" class="small-secondary small-listing-permalink">
				<i class="icon icon-Arrow-Right"></i><?php esc_html_e( 'Read More', 'mediaconsult' ); ?>
			</a>
			
		</div>
	</div>
	
<?php } ?>