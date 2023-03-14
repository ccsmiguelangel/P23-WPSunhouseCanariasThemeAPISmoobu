<?php

function p23_cancel_reservation_api()
{
  $namespace = 'alo';
  $route = 'cancel_resevation';
  $args = array(
    'methods' => 'GET',
    'callback' => 'p23_cancel_resevation_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_cancel_reservation_api');

function p23_cancel_resevation_callback($res){
  $resp = p23_cancel_reservation($res['reservationId']);
  return $resp;
}
