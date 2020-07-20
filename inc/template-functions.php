<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Modern_Renegades
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function modern_renegades_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'modern_renegades_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function modern_renegades_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'modern_renegades_pingback_header' );

/**
 * Add our SVG icons file just after the opening body tag
 */
function modern_renegades_add_icons() {
	get_template_part( 'template-parts/svg', 'icons');
}
add_action( 'wp_body_open', 'modern_renegades_add_icons' );

/**
 * Comments callback function
 */
function modern_renegades_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(''); ?>>
			<article id="comment-<?php comment_ID(); ?>" class="comment-body">
				<section class="comment-content">
					<?php comment_text() ?>
					<?php edit_comment_link( __('Edit', 'modern_renegades'),'  ','' ) ?>
				</section>
				<footer class="comment-meta">
					<p>
						<em>
							<?php printf( __('%s', 'modern_renegades'), get_comment_author_link() ) ?><br />
							<time datetime="<?php echo comment_time('Y-m-j'); ?>">
								<?php comment_time( __(' F jS, Y - g:ia', 'modern_renegades') ); ?>
							</time>
						</em>
					</p>


				</footer>
				<?php //comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</article>
	<?php
}

/**
 * Comment form default fields
 */
function modern_renegades_comment_fields( $fields ) {
	$commenter = wp_get_current_commenter();

	$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	$fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">' . __('Save my info in this browser for the next time I comment.', 'modern_renegades'). '</label></p>';

	unset( $fields['url'] );
	return $fields;
}
add_filter( 'comment_form_default_fields', 'modern_renegades_comment_fields' );