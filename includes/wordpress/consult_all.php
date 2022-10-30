<?php


// get_the_title

function p23_alo_data($postID){
  $title = get_the_title($postID);
  $guests = get_post_meta($postID, '_alojamiento_max_people', true);
  $description = get_post_meta($postID, '_alojamiento_subtitle', true);
  $zone = get_the_terms($postID, 'zonas');
  $zone = $zone[0]->name;

  $res = array(
    'ID' => $postID,
    'title' => $title,
    'guest' => $guests,
    'zone' => $zone,
    'description' => $description,
  );
  return $res;
  // return p23_validated_response($res, http_response_code());
}

function p23_display_multiple_alo_data($postIDs){
  $res = [];
  
  foreach($postIDs as $postID){
    $x[] = array_push($res, p23_alo_data($postID));
  }

  return p23_validated_response($res, http_response_code());
}