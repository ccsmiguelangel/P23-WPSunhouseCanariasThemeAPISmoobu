<?php

function p23_smoobu_display_apartments(){
  $namespace = 'alo';
  $route = 'apartments';
  $args = array(
    'methods' => 'GET', 
    'callback' => 'p23_smoobu_display_apartments_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_smoobu_display_apartments');

function p23_smoobu_display_apartments_callback($res){
  $apartments = p23_smoobu_get_apartmens();
  $errorRes = (object) array(
    'code' => http_response_code(),
    'message' => "Error, empty apartments"
  );

  if(empty($apartments)) return $errorRes;
  
  $res = (object)array(
    'code' => http_response_code(),
    'data' => $apartments->apartments,
  );

  return $res;
}