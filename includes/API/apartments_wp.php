<?php

function p23_wp_display_apartments(){
  $namespace = 'alo';
  $route = 'aparments_wp';
  $args = array(
    'methods' => 'GET', 
    'callback' => 'p23_wp_display_apartments_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_wp_display_apartments');

function p23_wp_display_apartments_callback(){
  $resp = p23_get_wp_apartments(false);
  if(empty($resp)) return p23_error_response(3, http_response_code());

  return p23_validated_response($resp, http_response_code());
}