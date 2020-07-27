<?php

if( have_rows( 'content' ) ): while( have_rows( 'content' ) ): the_row();

  if( get_row_layout() == 'image-text' ):
    $image            = get_sub_field( 'image_half' );
    $show_decoration  = get_sub_field( 'show_decoration' );
    $content          = get_sub_field( 'content' );
    $text_color       = get_sub_field( 'text_color' );
    $background_color = get_sub_field( 'background_color' );

    echo '<div class="half-half half-half--image-text">';

      echo '<div class="half-half--image">';
        if( !empty( $image ) )
          echo wp_get_attachment_image( $image['ID'], 'full', null, array( 'class' => 'image--cover' ) );

          if( $show_decoration == 1)
            echo '<span class="image__oval"></span>';
      ?>
      </div><!-- .half-half--image -->

      <div class="half-half--content" <?php echo ( !empty( $background_color ) ) ? ' style="background-color:' . $background_color . '"' : '' ?> >
        <?php
          if( !empty( $content ) )
            echo $content;
          ?>
      </div><!-- .half-half--content -->
    </div><!-- .half-half -->

  <?php

  elseif( get_row_layout() == 'text-text' ):
    $content_left           = get_sub_field( 'content_left' );
    $text_color_left        = get_sub_field( 'text_color_left' );
    $background_color_left  = get_sub_field( 'background_color_left' );
    $content_right          = get_sub_field( 'content_right' );
    $text_color_right       = get_sub_field( 'text_color_right' );
    $background_color_right = get_sub_field( 'background_color_right' );

    echo '<div class="half-half half-half--text-text">';
    ?>
      <div
        class="half-half--content <?php echo ( !empty( $text_color_left ) ) ? 'has-color has-text-color' : '' ?>"
        style="<?php echo ( !empty( $background_color_left ) ) ? 'background-color: ' . $background_color_left . ';' : '' ?> <?php echo ( !empty( $text_color_left ) ) ? 'color: ' . $text_color_left . ';' : '' ?>"
      >
        <?php
          if( !empty( $content_left ) )
            echo $content_left;
          ?>
      </div><!-- .half-half--content -->

      <div
        class="half-half--content <?php echo ( !empty( $text_color_right ) ) ? 'has-color has-text-color' : '' ?>"
        style="<?php echo ( !empty( $background_color_right ) ) ? 'background-color: ' . $background_color_right . ';' : '' ?> <?php echo ( !empty( $text_color_right ) ) ? 'color: ' . $text_color_right . ';' : '' ?>"
      >
        <?php
          if( !empty( $content_right ) )
            echo $content_right;
          ?>
      </div><!-- .half-half--content -->

    </div><!-- .half-half -->

  <?php
  endif;

endwhile; endif;