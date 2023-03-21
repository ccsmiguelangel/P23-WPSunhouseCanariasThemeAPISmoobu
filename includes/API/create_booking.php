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
  // Variable validations
  if(!p23_date_validation($res['arrivalDate'], $res['depatureDate'])) return p23_error_response(1, http_response_code());
  if(empty($res['appartemntId'])) return;
  if(!p23_guest_validation($res['adults'])) return p23_error_response(6, http_response_code());
  if(!p23_price_validation($res['price'])) return p23_error_response(9, http_response_code());

  $resp = p23_create_init_booking($res['arrivalDate'], $res['depatureDate'], $res['appartemntId'], $res['adults'], $res['price']);

  return $resp;
}
