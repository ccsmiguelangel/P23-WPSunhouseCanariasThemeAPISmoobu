<?php

function get_alo_zone(){
  global $post;

  $meta_description = get_the_terms($post->ID, 'zonas');

  
  if ( !is_singular('alojamiento') ) {
    return;
  }
  if( empty($meta_description) ){
    return;
  }
  return $meta_description[0]->name;

}
add_shortcode('alo_zone', 'get_alo_zone');
