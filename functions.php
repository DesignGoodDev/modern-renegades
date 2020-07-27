<?php
/**
 * Modern Renegades functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Modern_Renegades
 */

/**
 * Theme Version
 */
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

// WP Cleanup
include_once( get_template_directory() . '/inc/customizer.php');

// Theme Functionality
include_once( get_template_directory() . '/inc/template-functions.php');
include_once( get_template_directory() . '/inc/template-tags.php');
include_once( get_template_directory() . '/inc/widgets.php');
// include_once( get_template_directory() . '/inc/custom-header.php');

// Plugin Utilities
include_once( get_template_directory() . '/inc/acf.php');
if ( defined( 'JETPACK__VERSION' ) ) {
	include_once( get_template_directory() . '/inc/jetpack.php' );
}

/**
 * Theme Content Width
 */
function modern_renegades_content_width() {
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'modern_renegades_content_width', 780 );
}
add_action( 'after_setup_theme', 'modern_renegades_content_width', 0 );

/**
 * Global Enqueues
 */
function modern_renegades_global_enqueues() {

	// Styles
	wp_enqueue_style( 'modern-renegades-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'modern-renegades-style', 'rtl', 'replace' );

	// Scripts
	wp_enqueue_script( 'modern-renegades-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'modern_renegades_global_enqueues' );

/**
 * Block Editor Enqueues
 */
function modern_renegades_block_editor_enqueues() {

	// wp_enqueue_style( 'modern-renegades-block-editor-styles', get_template_directory_uri() . '/editor-styles.css' , array(), filemtime( get_template_directory() . '/editor-styles.css' ), 'all' );

	wp_enqueue_script( 'modern-renegades-block-editor-scripts', get_template_directory_uri() . '/js/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_template_directory() . '/js/editor.js' ), true);

}
add_action( 'enqueue_block_editor_assets', 'modern_renegades_block_editor_enqueues', 1, 1 );

/**
 * Theme Setup
 */
if ( ! function_exists( 'modern_renegades_setup' ) ) :

	function modern_renegades_setup() {

		// Enable translation of theme
		load_theme_textdomain( 'modern-renegades', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				// 'style',
				// 'script',
			)
		);

		// Register Menu(s)
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'modern-renegades' ),
			)
		);

		// Media
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 536, 418, false);

		// Enable Custom Editor Styles
		add_theme_support( 'editor-styles' );
		add_editor_style( 'editor-styles.css' );

		// Disable Custom Font Sizes
		add_theme_support('disable-custom-font-sizes');

		// Enable Specific Custom Font Sizes
		// TODO: remove line height option
		// TODO: only display this for paragraphs, not headings
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name'      => __( 'Large', 'modern-renegades' ),
				'shortName' => __( 'L', 'modern-renegades' ),
				'size'      => 23,
				'slug'      => 'large'
			),
		) );

		// Disable Custom Colors
		add_theme_support('disable-custom-colors');

		// Add Specific Custom Color Palette
		add_theme_support('editor-color-palette', array(
			array(
				'name'	=> 'Cream',
				'slug'	=> 'cream',
				'color'	=> '#F3EEED',
			),
			array(
				'name'	=> 'Almond',
				'slug'	=> 'almond',
				'color'	=> '#ECE1DF',
			),
			array(
				'name'	=> 'Rose',
				'slug'	=> 'rose',
				'color'	=> '#D5B1A9',
			),
			array(
				'name'	=> 'Adobe',
				'slug'	=> 'adobe',
				'color'	=> '#BB8472',
			),
			array(
				'name'	=> 'Plum',
				'slug'	=> 'plum',
				'color'	=> '#2A1048',
			),
			array(
				'name'	=> 'Text Gray',
				'slug'	=> 'textgray',
				'color'	=> '#3B3835',
			),
			array(
				'name'	=> 'White',
				'slug'	=> 'white',
				'color'	=> '#FFFFFF',
			),
		));

	}
endif;
add_action( 'after_setup_theme', 'modern_renegades_setup' );

/**
 * Get the colors formatted for use with Iris, Automattic's color picker
 *
 * @link https://elod.in/adding-wordpress-color-palettes-into-the-acf-color-picker/
 */
function modern_renegades_output_the_colors() {

	// get the colors
		$color_palette = current( (array) get_theme_support( 'editor-color-palette' ) );

	// bail if there aren't any colors found
	if ( !$color_palette )
		return;

	// output begins
	ob_start();

	// output the names in a string
	echo '[';
		foreach ( $color_palette as $color ) {
			echo "'" . $color['color'] . "', ";
		}
	echo ']';

	return ob_get_clean();

}

/**
 * Add the colors into Iris
 *
 * @link https://elod.in/adding-wordpress-color-palettes-into-the-acf-color-picker/
 */

function modern_renegades_register_acf_color_palette() {

	$color_palette = modern_renegades_output_the_colors();

	if ( !$color_palette )
		return;
	?>

	<script type="text/javascript">
		(function( $ ) {
			acf.add_filter( 'color_picker_args', function( args, $field ){

				// add the hexadecimal codes here for the colors you want to appear as swatches
				args.palettes = <?php echo $color_palette; ?>

				// return colors
				return args;

			});
		})(jQuery);
	</script>

	<?php

}
add_action( 'acf/input/admin_footer', 'modern_renegades_register_acf_color_palette' );