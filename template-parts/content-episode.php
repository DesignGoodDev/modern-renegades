<?php
/**
 * Template part for displaying Episodes
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Modern_Renegades
 */

?>

<article id="episode-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php modern_renegades_post_thumbnail(); ?>

	<div class="entry-wrap">

		<header class="entry-header">
			<?php
      $ep_number = get_field( 'episode_number');
      if ( is_singular() ) :
        if ( ! empty( $ep_number ) ):
          echo '<h4>Ep #' . $ep_number . '</h4>';
        endif;
				the_title( '<h1 class="entry-title h2">', '</h1>' );
      else :
        if ( ! empty( $ep_number ) ):
          echo '<h4>Episode #' . $ep_number . '</h4>';
        endif;
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
      endif;
      ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
      if ( is_singular() ) :

        $libsyn_id = get_field( 'libsyn_id');
        if ( ! empty( $libsyn_id ) ):
          echo '<div class="player"><iframe style="border: none" src="//html5-player.libsyn.com/embed/episode/id/' . $libsyn_id . '/height/90/theme/custom/thumbnail/yes/direction/backward/render-playlist/no/custom-color/2a1048/" height="90" width="100%" scrolling="no" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe></div>';
        endif;

				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'modern-renegades' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			else:
				the_excerpt();
			endif;

			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
      <?php
      if ( is_singular() ) :
        echo do_shortcode( '[fusebox_transcript]' );
      endif;
      ?>
		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
