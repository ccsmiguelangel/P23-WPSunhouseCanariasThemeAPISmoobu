<?php

function p23_get_wp_apartments(){
  $alojamiento = get_posts([
    'post_type' => 'alojamiento',
    'post_status' => 'publish',
    'numberposts' => -1,
    // 'orderby' => 'rand',
  ]);
  // _alojamiento_smoobu_id
  $ids = [];
  foreach ($alojamiento as $alo) {
    $id = $alo->ID;
    
    $smoobu_ids = get_post_meta($id, '_alojamiento_smoobu_id', true);
    $new = array_push($ids, $smoobu_ids);
  }
  return $ids;
}