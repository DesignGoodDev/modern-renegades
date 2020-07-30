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
  <h3 class="text-center">Recent Posts</h3>
  <?php echo do_shortcode( '[display-posts category="journal" exclude_current="true" image_size="post-thumbnail" posts_per_page="3" wrapper="div"]' ); ?>
</div>