<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Modern_Renegades
 */

?>

<footer id="colophon" class="site-footer">

	<div class="footer-container">

		<?php
		$facebook  = get_field('facebook_url', 'option');
		$instagram = get_field('instagram_url', 'option');

		if (!empty($facebook) || !empty($instagram)) :
		?>
			<div class="footer-socials">
				<ul>
					<?php if (!empty($facebook)) : ?>
						<li>
							<a href="<?php echo $facebook ?>" target="_blank">
								<img src="<?php echo get_template_directory_uri(); ?>/inc/images/icon-facebook.svg" alt="Facebook Icon" />
							</a>
						</li>
					<?php endif; ?>
					<?php if (!empty($instagram)) : ?>
						<li>
							<a href="<?php echo $instagram ?>" target="_blank">
								<img src="<?php echo get_template_directory_uri(); ?>/inc/images/icon-instagram.svg" alt="Instagram Icon" />
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		<?php else : ?>
			<hr>
		<?php endif; ?>

	</div><!-- .footer-container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
