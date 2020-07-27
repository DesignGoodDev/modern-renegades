<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Modern_Renegades
 */

if ( ! function_exists( 'modern_renegades_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function modern_renegades_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'modern-renegades' ),
			// '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' .
			$time_string
			// . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'modern_renegades_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function modern_renegades_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'modern-renegades' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'modern_renegades_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function modern_renegades_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'modern-renegades' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'modern-renegades' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'modern-renegades' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'modern-renegades' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'modern-renegades' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'modern-renegades' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'modern_renegades_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function modern_renegades_post_thumbnail() {
		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( is_singular() ) :

			if ( ! has_post_thumbnail() ) {
				return;
			}

			?>

			<div class="post-thumbnail">
				<div class="thumb-wrap">
					<?php the_post_thumbnail(); ?>
				</div>
			</div><!-- .post-thumbnail -->

		<?php else :

			if ( ! has_post_thumbnail() ) :
			?>
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<div class="placeholder">
						<div>
							<svg><use xlink:href="#mr-logo-moth"></use></svg>
						</div>
					</div>
				</a>
			<?php return; endif; ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<div class="thumb-wrap">
					<?php
						the_post_thumbnail(
							'post-thumbnail',
							array(
								'alt' => the_title_attribute(
									array(
										'echo' => false,
									)
								),
							)
						);
					?>
				</div>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

/**
 * Filter the_excerpt() to add a read more link
 *
 * If in "DRC Show Notes" Category, use "Listen" instead of "Read Post"
 *
 */
function modern_renegades_excerpt_more() {
	global $post;
	$post_id = $post->ID;
	if ( in_category( 'drc-show-notes' ) )
		return '...<br><a class="read-more" href="' . get_permalink( $post_id ) . '" title="'. __('Read', 'modern_renegades') . get_the_title( $post_id ).'">'. __('Listen', 'modern_renegades') .'</a>';
	else
		return '...<br><a class="read-more" href="' . get_permalink( $post_id ) . '" title="'. __('Read', 'modern_renegades') . get_the_title( $post_id ).'">'. __('Read Post', 'modern_renegades') .'</a>';
}
add_filter( 'excerpt_more', 'modern_renegades_excerpt_more');

/**
 * Filter the maximum number of words in a post excerpt
 */
function modern_renegades_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'modern_renegades_excerpt_length', 999 );

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

// Limit Search Results
function searchfilter($query) {
	if ($query->is_search && !is_admin() ) {
		$query->set('post_type',array('post', 'page'));
	}
return $query;
}
add_filter('pre_get_posts','searchfilter');