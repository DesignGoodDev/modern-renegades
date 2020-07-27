<?php
$image = get_field('image');
$show_decoration = get_field('show_decoration');
$content = get_field('content');

echo '<div class="half-half">';

  echo '<div class="half-half--image">';
    if( !empty( $image ) )
      echo wp_get_attachment_image( $image['ID'], 'full', null, array( 'class' => 'image--cover' ) );

      if( $show_decoration == 1)
        echo '<span class="image__oval"></span>';

  echo '</div>';

  echo '<div class="half-half--content has-plum-background-color has-cream-color has-background-color has-color">';

    if( !empty( $content ) )
      echo $content;

  echo '</div>';

echo '</div>';