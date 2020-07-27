<?php

$id = '';

if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

echo '<div id="' . $id . '" class="alt-text-img alignwide">';

if( have_rows( 'content' ) ): while( have_rows( 'content' ) ): the_row();

  $image            = get_sub_field( 'image' );
  $show_decoration  = get_sub_field( 'show_decoration' );
  $content          = get_sub_field( 'content' );

  echo '<div class="alt-text-img__row">';
  ?>
    <div class="alt-text-img--image <?php echo ( $show_decoration == 1 ) ? 'has-decoration' : '' ?>">
    <?php
      if( !empty( $image ) )
        echo wp_get_attachment_image( $image['ID'], 'full', null, array( 'class' => 'image--cover' ) );

        if( $show_decoration == 1)
          echo '<span class="image__oval--bottom"></span>';
    ?>
    </div><!-- .alt-text-img--image -->

    <div class="alt-text-img--content">
      <?php
        if( !empty( $content ) )
          echo $content;
        ?>
    </div><!-- .alt-text-img--content -->
  </div><!-- .alt-text-img__row -->

<?php
endwhile; endif;

echo '</div> <!-- .alt-text-img -->';