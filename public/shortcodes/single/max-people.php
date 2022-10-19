<?php

function get_alo_max_people() {

  global $post;
  $meta_description = get_post_meta($post->ID, '_alojamiento_max_people', true);

  if ( !is_singular('alojamiento') ) {
    return;
  }
  if( empty($meta_description) ){
    return;
  }

  ob_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css">
  <style>
    /* grandson content */
    .alocard__people-content {
      color: #54595f;
      font-weight: 400;
    }

    .alocard__people {
      grid-area: 3 / 1 / 4 / 13;
    }

    .alocard__people-content {
      display: inline;
      font-size: 15px;
      margin: 0 0 0.5rem 0;
      padding: 0;
    }
    /*!
 * Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */
@font-face{font-family:"Font Awesome 5 Free";font-style:normal;font-weight:400;font-display:block;src:url(../webfonts/fa-regular-400.eot);src:url(../webfonts/fa-regular-400.eot?#iefix) format("embedded-opentype"),url(../webfonts/fa-regular-400.woff2) format("woff2"),url(../webfonts/fa-regular-400.woff) format("woff"),url(../webfonts/fa-regular-400.ttf) format("truetype"),url(../webfonts/fa-regular-400.svg#fontawesome) format("svg")}.far{font-family:"Font Awesome 5 Free";font-weight:400}
  </style>
  <div class="alocard__people">
    <i aria-hidden="true" class="far fa-user-circle"></i>
    <h3 class="alocard__people-content"><?php echo (intval($meta_description) > 1) ? $meta_description . ' Huéspedes' : $meta_description . 'Huésped'; ?></h3>
  </div>
<?php
  $p23_output = ob_get_clean();
  return $p23_output;
}
add_shortcode('alo_max_people', 'get_alo_max_people');