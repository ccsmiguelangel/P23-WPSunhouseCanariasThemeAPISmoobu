<?php

function p23_get_metabox_guest_data_from_ids($values, $guests, $meta = '_alojamiento_max_people'){
  if(empty($values) || empty($meta) || empty($guests) ) return p23_into_error_response(7);
  $res = [];
  $guests = intval($guests);
  
  foreach($values as $postID) {
    $maxPeople = p23_get_metabox_data_from_id($postID, $meta);
    $maxPeople = intval($maxPeople);

    if(!($guests <= $maxPeople)) continue;
    $x[] = array_push($res, $postID);
  }
  if(empty($res)) return p23_into_error_response(8);

  return $res;
}