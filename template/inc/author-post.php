			<span class="post-misc-author">
				<i class="mi-icon mi-icon-user7"></i>
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="cel-underline">
					<span><?php the_author(); ?></span>
				</a>
			</span>