						<div class="clearboth"></div>
						<div class="cel-author-meta-wrapper">

							<div class="am-avatar">

								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'display_name' ) ); ?>">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
								</a>

							</div>

							<div class="am-content">
								
								<h5 class="am-name"><?php esc_html_e( 'By ', 'mediaconsult' ); ?>
								
									<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'display_name' ) ); ?>"><?php the_author(); ?></a>
								
								</h5>
								
								<?php the_author_meta( 'description' ); ?>

							</div>						

						</div>
						

					
				