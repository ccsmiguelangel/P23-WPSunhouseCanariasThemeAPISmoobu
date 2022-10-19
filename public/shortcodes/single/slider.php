<?php

function get_alo_slider() {

global $post;
$meta_description = get_post_meta($post->ID, '_alojamiento_slide_shortcode', true);

if ( !is_singular('alojamiento') ) {
  return;
}
if( empty($meta_description) ){
  return;
}

return do_shortcode($meta_description);

}

add_shortcode('alo_slider', 'get_alo_slider');
