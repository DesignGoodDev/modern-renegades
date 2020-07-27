<?php
/**
 * Register Options Page
 */
function modern_renegades_register_options_page() {

  if ( function_exists( 'acf_add_options_page' ) ) {

    acf_add_options_page( array(
      'title'      => __( 'Custom Site Options', 'modern_renegades' ),
      'capability' => 'manage_options',
      'position'   => '2.2',
    ) );

  }

}
add_action('init', 'modern_renegades_register_options_page');

/**
 * Register Blocks
 * @link https://www.billerickson.net/building-gutenberg-block-acf/#register-block
 *
 * Dashicons: https://developer.wordpress.org/resource/dashicons/
 * ACF Settings: https://www.advancedcustomfields.com/resources/acf_register_block/
 */
function modern_renegades_register_blocks() {

  if ( ! function_exists('acf_register_block_type') )
    return;

  acf_register_block_type( array(
    'name'            => 'half-half',
    'title'           => __('Half and Half', 'modern_renegades'),
    'render_template' => 'template-parts/block-half-half.php',
    'category'        => 'layout',
    'icon'            => 'layout',
    'mode'            => 'auto',
    'keywords'        => array( 'custom', 'layout', 'split'),
    'post_types'      => array( 'page' ),
    'align'           => 'full',
    'supports'        => array( 'anchor' => true ),
  ));

  acf_register_block_type( array(
    'name'            => 'half-half-carousel',
    'title'           => __('Half and Half - Quote Carousel', 'modern_renegades'),
    'render_template' => 'template-parts/block-half-half-carousel.php',
    'enqueue_assets'  => function() {
      wp_enqueue_style('block-half-half-carousel', 'https://unpkg.com/swiper/swiper-bundle.min.css');
      wp_enqueue_script('block-half-half-carousel', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), '', true);
      wp_enqueue_script('block-half-half-carousel-init', get_template_directory_uri() . '/template-parts/block-half-half-carousel.js', array(), '', true);
    },
    'category'        => 'layout',
    'icon'            => 'layout',
    'mode'            => 'auto',
    'keywords'        => array( 'layout', 'slideshow', 'carousel'),
    'post_types'      => array( 'page' ),
    'align'           => 'full',
    'supports'        => array( 'anchor' => true ),
  ));

}
add_action('acf/init', 'modern_renegades_register_blocks');