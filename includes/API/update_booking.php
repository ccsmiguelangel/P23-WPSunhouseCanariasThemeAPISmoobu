<?php

function p23_update_booking_init()
{
  $namespace = 'alo';
  $route = 'update_booking';
  $args = array(
    'methods' => 'POST',
    'callback' => 'p23_update_booking_init_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_update_booking_init');

function p23_update_booking_init_callback($res){
  // $resp = p23_update_booking(
  $resp = p23_update_init_booking( 
    $res['reservationId'], 
    $res['guestName'], 
    $res['guestEmail'], 
    $res['guestPhone'],
    $res['deposit'],
    $res['language'],
  );

  return $resp;
// return $res['reservationId'];
}
