<?php

function p23_get_metabox_guest_data_from_ids($values, $guests, $meta = '_alojamiento_max_people'){
  $errRes = []; 
  $res = [];
  if(empty($values) || empty($meta) || empty($guests) ) {
    $errRes = array(
      'errNum' => 7,
      'err' => true 
    );
    
    return $errRes;
  };
  $guests = intval($guests);
  foreach($values as $key => $postID) {
    $maxPeople = p23_get_metabox_data_from_id($postID, $meta);

    $maxPeople = intval($maxPeople);

    if(!($guests <= $maxPeople)) continue;

    $x[] = array_push($res, $postID);
  }
  if(empty($res)){
    $errRes = array(
      'errNum' => 8,
      'err' => true 
    );
    return $errRes;
  }
  return $res;
}