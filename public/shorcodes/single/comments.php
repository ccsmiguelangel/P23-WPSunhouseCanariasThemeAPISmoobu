<?php

function get_alo_comments_shortcode() {

  global $post;
  $meta_description = get_post_meta($post->ID, '_alojamiento_comments_shortcode', true);

  if ( !is_singular('alojamiento') ) {
    return;
  }
  if( empty($meta_description) ){
    return '<p>Todavía no hay valoraciones.</p>';
  }

  return do_shortcode($meta_description);

}

add_shortcode('alo_comments_shortcode', 'get_alo_comments_shortcode');