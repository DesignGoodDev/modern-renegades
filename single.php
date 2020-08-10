<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Modern_Renegades
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			if ( 'post' === get_post_type() ) :
				get_template_part( 'template-parts/share-links' );
			elseif ( 'episode' === get_post_type() ) :
				get_template_part( 'template-parts/subscribe-links' );
			endif;

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			if ( 'post' === get_post_type() ) :
				get_template_part( 'template-parts/display-posts' );
			elseif ( 'episode' === get_post_type() ) :
				get_template_part( 'template-parts/display-episodes' );
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
