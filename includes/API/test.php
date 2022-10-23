<?php

function p23_test(){
  $namespace = 'alo';
  $route = 'test';
  $args = array(
    'methods' => 'GET', 
    'callback' => 'p23_test_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_test');

function p23_test_callback(){
  $smoobu_id = 1069525;
  $elem = p23_set_smoobu_id_to_wp_post_id($smoobu_id, false);
  $res = (object)array(
    'code' => http_response_code(),
    'data' => $elem,
  );

  return $res;
}