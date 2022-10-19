<?php

function get_alo_smoobu_shortcode() {

global $post;
$meta_description = get_post_meta($post->ID, '_alojamiento_smoobu_calendar', true);

if ( !is_singular('alojamiento') ) {
  return;
}
if( empty($meta_description) ){
  return '<p>No poseemos información acerca de la disponibilidad.</p>';
}

return do_shortcode($meta_description);

}

add_shortcode('alo_smoobu_shortcode', 'get_alo_smoobu_shortcode');
