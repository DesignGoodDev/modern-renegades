<?php
$image = get_field('image');
$show_decoration = get_field('show_decoration');

echo '<div class="half-half">';

  echo '<div class="half-half--image">';
    if( !empty( $image ) )
      echo wp_get_attachment_image( $image['ID'], 'full', null, array( 'class' => 'image--cover' ) );

      if( $show_decoration == 1)
        echo '<span class="image__oval"></span>';

  echo '</div>';

  echo '<div class="half-half--content has-plum-background-color has-cream-color has-background-color has-color">';

    $count = 0;
    if( have_rows('quote') ):
      while( have_rows('quote') ):
        the_row();
        $count++;
      endwhile;
    endif;

    if( have_rows('quote') ):

      if( $count > 1):
        echo '<div class="swiper-container"><div class="swiper-wrapper">';
      endif;

      while( have_rows('quote') ):
        the_row();
        $quote = get_sub_field('quote_text');
        $author = get_sub_field('quote_author');

        if( $count > 1):
          echo '<div class="swiper-slide">';
        endif;

        echo '<blockquote><p>' . $quote . '</p>';

        if( !empty( $author ) )
          echo '<footer>' . $author . '</footer>';

        echo '</blockquote>';

        if( $count > 1):
          echo '</div>';
        endif;

      endwhile;

      if( $count > 1):
        echo '</div><div class="swiper-pagination"></div>';
      endif;

      echo '</div>';

    endif;

  echo '</div>';

echo '</div>';