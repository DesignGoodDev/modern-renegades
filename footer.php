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
				$facebook  = get_field( 'facebook_url', 'option' );
				$instagram = get_field( 'instagram_url', 'option' );

				if ( !empty( $facebook ) || !empty( $instagram ) ):
			?>
			<div class="footer-socials">
				<ul>
					<?php if ( !empty( $facebook ) ): ?>
					<li>
						<a href="<?php echo $facebook ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/inc/images/icon-facebook.svg" alt="Facebook Icon" />
						</a>
					</li>
					<?php endif; ?>
					<?php if ( !empty( $instagram ) ): ?>
					<li>
						<a href="<?php echo $instagram ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/inc/images/icon-instagram.svg" alt="Instagram Icon" />
						</a>
					</li>
					<?php endif; ?>
				</ul>
			</div>
			<?php else: ?>
			<hr>
			<?php endif; ?>

			<div class="footer-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<svg alt="<?php bloginfo( 'name' ); ?> Logo" width="137" height="81">
						<use xlink:href="#mr-logo-footer"></use>
					</svg>
				</a>
			</div>
			<div class="site-info">
				<a href="<?php echo esc_url( home_url() ); ?>/privacy-policy" title="Privacy Policy">Privacy Policy</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">&copy;<?php echo date('Y'); ?>, <?php bloginfo('name'); ?></a>
				<a href="https://designgood.com" target="_blank" rel="noopener noreferrer" class="dg-credit">
					<span>Brand &amp; Website Created by</span>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/images/logo-designgood.svg" alt="DesignGood Logo">
				</a>
			</div><!-- .site-info -->
		</div><!-- .footer-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
