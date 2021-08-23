<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mediaconsult
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php comments_number( esc_html__( 'No Comments', 'mediaconsult' ), esc_html__( 'One Comment', 'mediaconsult' ), esc_html__( '% Comments', 'mediaconsult' ) ); ?>
		</h3>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 60,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => esc_html__( 'Reply', 'mediaconsult' ),
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'mediaconsult' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'mediaconsult' ) . '</span>',
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mediaconsult' ); ?></p>
	<?php
	endif;

	$mediaconsult_defaults = array( 'fields' => apply_filters( 'mediaconsult_comment_form_default_fields', array(
	
		'author'        => 		'<p class="comment-form-author">
									<input id="author" type="text" required="required" size="30" name="author" placeholder="' . esc_html__( 'Name *', 'mediaconsult' ) . '">
								</p>',
					
		'email'         => 		'<p class="comment-form-email">
									<input id="email" type="text" required="required" size="30" name="email" placeholder="' . esc_html__( 'Email *', 'mediaconsult' ) . '">
								</p>',
					
		'url'           => 		'<p class="comment-form-url">
									<input id="url" type="text" size="30" value="" name="url" placeholder="' . esc_html__( 'Website', 'mediaconsult' ) . '">
								</p>' ) ),
					
		'comment_field' => 		'<p class="comment-form-comment">
									<textarea id="comment" required="required" rows="8" cols="45" name="comment" placeholder="' . esc_html__('Comment *', 'mediaconsult') . '"></textarea>
								</p>',
							
		'must_log_in'  	=>		'<p class="must-log-in">
									' . sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a comment.', 'mediaconsult' ), wp_login_url( apply_filters( 'mediaconsult_the_permalink', get_permalink( ) ) ) ) . '
								</p>',
		
		'logged_in_as'  =>   	'<p class="logged-in-as">
									' . sprintf( wp_kses( __('You are logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'mediaconsult' ), 
										array(
											'a' => array ( 
												'href' => array(), 
												'title' => array() 
												)
											) 
									), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'mediaconsult_the_permalink', get_permalink( ) ) ) , 'mediaconsult' ) . '	
								</p>',
							
		'comment_notes_before' => 	'<p class="comment-notes">
										' . esc_html__( 'Your email address will not be published.', 'mediaconsult' ) . ( $req ? 
										
										esc_html__( ' Required fields are marked *', 'mediaconsult' ) : '' ) . '
										
									</p>',
								
		'comment_notes_after'  => 	'<p class="form-allowed-tags">' . sprintf( wp_kses(__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'mediaconsult' ), array( 'abbr' => array( 'title' => array() ) )), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_form' 			   => 	'commentform',
		'id_submit' 		   => 	'submit',
		'title_reply_before'   =>   '<h3 id="reply-title" class="comment-reply-title">',
 		'title_reply_after'    =>   '</h3><div class="sidebar-line"></div>',
		'title_reply' 		   => 	esc_html__( 'Join The Discussion', 'mediaconsult' ),
		'title_reply_to' 	   => 	esc_html__( 'Leave a reply to %s', 'mediaconsult' ),
		'cancel_reply_link'    => 	esc_html__( 'Cancel Reply', 'mediaconsult' ),
		'label_submit' 		   => 	esc_html__( 'Post Comment', 'mediaconsult' ),
	); 
	
	comment_form( $mediaconsult_defaults );

	?>

</div><!-- #comments -->
