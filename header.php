<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Modern_Renegades
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'modern-renegades' ); ?></a>

	<header id="masthead" class="site-header">
		<style>
			.site-logo {
				width: 72px;
				height: 29px;
			}
			#mr-logo {
				fill: url(#gradient);
			}
			stop {
				transition: 250ms ease-in-out;
			}
			.site-logo:hover stop:first-child {
				stop-color: #D5B1A9;
			}
			.site-logo:hover stop:last-child {
				stop-color: #2A1048;
			}

		</style>
		<div class="site-branding">
			<?php
			//the_custom_logo();
			if ( is_front_page() || is_home() ) :
				?>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<svg class="site-logo" alt="<?php bloginfo( 'name' ); ?> Logo">
							<defs>
								<linearGradient id="gradient" gradientUnits="userSpaceOnUse" x1="0%" y1="0%" x2="0%" y2="100%">
									<stop stop-color="#BB8472" offset="0"/>
									<stop stop-color="#BB8472" offset="1"/>
								</linearGradient>
							</defs>
							<use xlink:href="#mr-logo"></use>
						</svg>
					</a>
				</h1>
				<?php
			else :
				?>
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<svg class="site-logo" alt="<?php bloginfo( 'name' ); ?> Logo">
							<defs>
								<linearGradient id="gradient" gradientUnits="userSpaceOnUse" x1="0%" y1="0%" x2="0%" y2="100%">
									<stop stop-color="#BB8472" offset="0"/>
									<stop stop-color="#BB8472" offset="1"/>
								</linearGradient>
							</defs>
							<use xlink:href="#mr-logo"></use>
						</svg>
					</a>
				</p>
				<?php
			endif;
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-label="Toggle <?php esc_html_e( 'Primary Menu', 'modern-renegades' ); ?>" aria-expanded="false">

				<svg class="icon-toggle closed">
					<use xlink:href="#menu-toggle-closed"></use>
				</svg>

				<svg class="icon-toggle opened" style="opacity:0">
					<use xlink:href="#menu-toggle-opened"></use>
				</svg>

			</button>
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'menu-1',
					'menu_id'         => 'primary-menu',
					'container_class' => 'primary-menu-container',
				)
			);
			?>
		</nav><!-- #site-navigation -->

		<a class="back-to-top" href="#page">
			<img src="<?php echo get_template_directory_uri(); ?>/inc/images/back-to-top-stars.svg" alt="stars decoration">
			<div><?php echo esc_html_e( 'Back to Top', 'modern-renegades') ?></div>
		</a>
	</header><!-- #masthead -->
