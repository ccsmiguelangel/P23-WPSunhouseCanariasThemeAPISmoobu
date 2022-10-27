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

function p23_test_callback($res){
  $resp = p23_get_wp_services_or_zones('zonas');


  return $resp;
}