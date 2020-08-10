<?php
/**
 * Template part for displaying social share links for posts
 */
?>
<?php
  $apple  = get_field( 'apple_podcasts_url', 'option' );
  $stitcher = get_field( 'stitcher_url', 'option' );
  $spotify = get_field( 'spotify_url', 'option' );

  if ( !empty( $apple ) || !empty( $stitcher ) || !empty( $spotify ) ):
?>
<div class="share-links__wrap subscribe-links__wrap">

  <h4 class="h2">Subscribe for Weekly Motivation</h4>

  <div class="share-links">
    <?php if ( !empty( $apple ) ): ?>
    <a
      class="hover-opacity"
      href="https://podcasts.apple.com/us/podcast/modern-renegades/id1462331025"
      title="Listen on Apple Podcasts"
      target="_blank"
      rel="noopener noreferrer">
      <img src="<?php echo get_template_directory_uri(); ?>/inc/images/icon-podcasts-apple.svg" alt="Apple Podcasts Icon" />
    </a>
    <?php endif; ?>

    <?php if ( !empty( $stitcher ) ): ?>
    <a
      class="hover-opacity"
      href="https://www.stitcher.com/podcast/anchor-podcasts/dressing-room-confessions"
      title="Listen on Stitcher"
      target="_blank"
      rel="noopener noreferrer">
      <img src="<?php echo get_template_directory_uri(); ?>/inc/images/icon-podcasts-stitcher.svg" alt="Stitcher Icon" />
    </a>
    <?php endif; ?>

    <?php if ( !empty( $spotify ) ): ?>
    <a
      class="hover-opacity"
      href="https://open.spotify.com/show/3N6unUJPNYOSMH2sx7r9XY?si=6RZyBIqNRbmzsudyv_AcQQ"
      title="Listen on Spotify"
      target="_blank"
      rel="noopener noreferrer">
      <img src="<?php echo get_template_directory_uri(); ?>/inc/images/icon-podcasts-spotify.svg" alt="Spotify Icon" />
    </a>
    <?php endif; ?>

  </div>

</div>
<?php endif; ?>