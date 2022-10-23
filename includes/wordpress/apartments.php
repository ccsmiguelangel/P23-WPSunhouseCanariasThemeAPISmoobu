<?php

function p23_get_wp_apartments($only_smoobu_id = true){
  $alojamiento = get_posts([
    'post_type' => 'alojamiento',
    'post_status' => 'publish',
    'numberposts' => -1,
  ]);
  $resp = [];
  foreach ($alojamiento as $alo) {
    $smoobu_ids = get_post_meta($alo->ID, '_alojamiento_smoobu_id', true);
    if($only_smoobu_id) {
      $x[] = array_push($resp, $smoobu_ids);
    } else  {
      array_push($resp, array(
        'smoobuID' => $smoobu_ids,
        'wpID' => $alo->ID
      ));
    }
  }
  return $resp;
}