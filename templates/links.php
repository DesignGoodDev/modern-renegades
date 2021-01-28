<?php
/*
Template Name: Links Page
*/

get_header('links');
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();
	?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/inc/images/logo-footer.svg" alt="Modern Renegades Logo">
				</a>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
				//the_content();
				?>

				<div class="links-list">
					<?php
					// vars
					$podcast_text = get_field('latest_podcast_episode_text');
					$blog_text = get_field('latest_blog_post_text');
					if ($podcast_text) :

						$podcastargs = array(
							'post_type' => 'episode',
							'posts_per_page' => 1,
						);

						// The Query
						$podcastquery = new WP_Query($podcastargs);

						// The Loop
						while ($podcastquery->have_posts()) {
							$podcastquery->the_post();
							echo '<a href="' . get_permalink($podcastquery->post->ID) . '" class="button button--ghost" title="' . get_the_title($podcastquery->post->ID) . '">' . $podcast_text . '</a>';
						}

						/* Restore original Post Data
						* NB: Because we are using new WP_Query we aren't stomping on the
						* original $wp_query and it does not need to be reset with
						* wp_reset_query(). We just need to set the post data back up with
						* wp_reset_postdata().
						*/
						wp_reset_postdata();

					endif;

					if ($blog_text) :

						$blogargs = array(
							'post_type' => 'post',
							'posts_per_page' => 1,
						);

						/* The 2nd Query (without global var) */
						$blogquery = new WP_Query($blogargs);

						// The 2nd Loop
						while ($blogquery->have_posts()) {
							$blogquery->the_post();
							echo '<a href="' . get_permalink($blogquery->post->ID) . '" class="button button--ghost" title="' . get_the_title($blogquery->post->ID) . '">' . $blog_text . '</a>';
						}

						// Restore original Post Data
						wp_reset_postdata();

					endif;
					?>

					<?php

					if (have_rows('additional_buttons')) :

						while (have_rows('additional_buttons')) : the_row();

							if (get_row_layout() == 'gradient_button') :
								$link = get_sub_field('link');

								echo '<a href="' . $link['url'] . '" class="button button--gradient">' . $link['title'] . '</a>';

							elseif (get_row_layout() == 'purple_button') :
								$link = get_sub_field('link');

								echo '<a href="' . $link['url'] . '" class="button">' . $link['title'] . '</a>';

							else :
								$link = get_sub_field('link');
								$text = get_sub_field('text');

								echo '<div class="link-block has-cream-color has-plum-background-color"><p>' . $text . '</p><a href="' . $link['url'] . '" class="button">' . $link['title'] . '</a></div>';
							endif;

						endwhile;

					endif;
					?>
				</div>


			</div><!-- .entry-content -->

		</article>

	<?php
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer('links');
