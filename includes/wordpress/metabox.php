<?php

// Get wp metabox data
// Some $meta values are "min_booking_days" "max_people" and "cleaning_charge"
function p23_get_metabox_data_from_id($postID, $meta){
  if(empty($postID) || empty($meta)) return false;
  
  // $meta_description = get_post_meta($post->ID, '_alojamiento_max_people', true);
  $res = get_post_meta($postID, $meta, true);
  $res = intval($res);

  return $res;
}
