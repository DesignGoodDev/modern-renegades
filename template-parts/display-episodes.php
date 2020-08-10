<?php
/**
 * Template part for displaying related posts
 * Uses Display Posts Shortcode plugin
 * @link https://wordpress.org/plugins/display-posts-shortcode/
 *
 */

if ( ! function_exists( 'be_display_posts_shortcode' ) )
  return;
?>

<hr class="alignwide">
<div class="alignwide py">
  <h3 class="text-center">Recent Episodes</h3>
  <?php echo do_shortcode( '[display-posts post_type="episode" exclude_current="true" image_size="post-thumbnail" posts_per_page="3" wrapper="div"]' ); ?>
</div>