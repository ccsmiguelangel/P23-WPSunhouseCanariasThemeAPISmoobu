<?php

function p23_create_booking_init()
{
  $namespace = 'alo';
  $route = 'create_booking';
  $args = array(
    'methods' => 'GET',
    'callback' => 'p23_create_booking_init_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_create_booking_init');

function p23_create_booking_init_callback($res){
  $resp = p23_create_init_booking($res['arrivalDate'], $res['depatureDate'], $res['appartemntId'], $res['adults']);

  return $resp;
}
