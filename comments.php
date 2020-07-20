<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Modern_Renegades
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
	if ( have_comments() ) :
		?>
		<hr>
		<h2 class="comments-title h4 text-center">
			<?php
			$modern_renegades_comment_count = get_comments_number();
			if ( '1' === $modern_renegades_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One comment', 'modern-renegades' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s comment', '%1$s comments', $modern_renegades_comment_count, 'comments title', 'modern-renegades' ) ),
					number_format_i18n( $modern_renegades_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'callback'   => 'modern_renegades_comments',
					'type'       => 'comment',
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'modern-renegades' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form(
		array(
			'title_reply_before'	=> '<h3 id="reply-title" class="comment-reply-title h4 text-center">',
			'title_reply' 				=> __( 'Leave a Comment', 'modern_renegades'),
			'title_reply_after' 	=> '</h3>',
		)
	);
	?>

</div><!-- #comments -->
