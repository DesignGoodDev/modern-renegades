<?php
/**
 * Template part for displaying social share links for posts
 */
?>

<div class="share-links__wrap">

  <h4>Share this post:</h4>

  <div class="share-links">
    <a
      class="hover-opacity"
      href="https://www.facebook.com/sharer/sharer.php?u='<?php echo esc_url( get_permalink() ); ?>'"
      title="Share on Facebook"
      target="_blank"
      rel="noopener noreferrer">
      <img src="<?php echo get_template_directory_uri(); ?>/inc/images/icon-facebook.svg" alt="Facebook Icon" />
    </a>

    <a
      class="hover-opacity"
      href="https://twitter.com/intent/tweet?url='<?php echo esc_url( get_permalink() ); ?>'&text='<?php echo get_the_title(); ?>'"
      title="Tweet this"
      target="_blank"
      rel="noopener noreferrer">
      <img src="<?php echo get_template_directory_uri(); ?>/inc/images/icon-twitter.svg" alt="Twitter Icon" />
    </a>

    <a
      class="hover-opacity"
      title="Share on LinkedIn"
      target="_blank"
      rel="noopener noreferrer"
      href="https://www.linkedin.com/shareArticle?url='<?php echo esc_url( get_permalink() ); ?>'&title='<?php echo get_the_title(); ?>'">
      <img src="<?php echo get_template_directory_uri(); ?>/inc/images/icon-linkedin.svg" alt="LinkedIn Icon" />
    </a>

    <a
      class="hover-opacity"
      href="mailto:?subject=&body=:%20"
      title="Email"
      rel="noopener noreferrer"
      onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' + encodeURIComponent(document.URL)); return false;">
      <img src="<?php echo get_template_directory_uri(); ?>/inc/images/icon-email.svg" alt="Email Icon" />
    </a>

  </div>

</div>