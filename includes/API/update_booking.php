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

function p23_update_booking_init_callback($res)
{

  $resp = p23_update_init_booking(
    $res->get_param('reservationId'),
    $res->get_param('guestName'),
    $res->get_param('guestEmail'),
    $res->get_param('guestPhone'),
    $res->get_param('deposit'),
    $res->get_param('language')
  );
  return $resp;
  // return $res['reservationId'];
}
