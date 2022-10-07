<?php

function show_alo_post(){
  
  $alojamiento = get_posts([
    'post_type' => 'alojamiento',
    'post_status' => 'publish',
    'numberposts' => -1,
    'order'    => 'ASC'
  ]);

  var_dump($alojamiento);
}

add_shortcode('alo_all_post', 'show_alo_post');