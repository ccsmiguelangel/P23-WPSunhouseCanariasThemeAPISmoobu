
<?php

function get_alo_description() {

global $post;
$meta_description = get_post_meta($post->ID, '_alojamiento_subtitle', true);

if ( !is_singular('alojamiento') ) {
  return;
}
if( empty($meta_description) ){
  return '<p>No poseemos información alguna de este alojamiento.</p>';
}

return $meta_description;
}
add_shortcode('alo_description', 'get_alo_description');
