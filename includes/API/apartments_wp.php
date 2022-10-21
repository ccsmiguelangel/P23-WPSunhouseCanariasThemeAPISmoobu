<?php

function p23_smoobu_display_apartments_comparated(){
  $namespace = 'alo';
  $route = 'alojamientos';
  $args = array(
    'methods' => 'GET', 
    'callback' => 'p23_smoobu_display_apartments_comparated_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_smoobu_display_apartments_comparated');


function p23_smoobu_display_apartments_comparated_callback($res){

  $errRes = (object) array(
    'code' => http_response_code(),
    'message' => 'Not response from smoobu or wordpress aparment data.'
  );  
  if(empty($res['start_date']) || empty($res['end_date'])) return $errRes;
  $Date = date("Y-m-d");
  if(!($Date < $res['start_date']) || !($Date < $res['end_date'])) return $errRes;
  if(date("Y-m-d", strtotime($Date. ' + 3 days')) > $res['end_date']) return $errRes;


  $smoobu_apartments = p23_get_smoobu_from_date($res['start_date'], $res['end_date']);

  $wp_apartments= p23_get_wp_apartments();
  // $res = var_dump($wp_apartments);


  if(empty($smoobu_apartments) || empty($wp_apartments)) $errRes;

  $response = p23_smoobu_wp_compare_arrays($smoobu_apartments, $wp_apartments);
  if(empty($response)) return $errRes;
  $response = (object) array(
    'code' => http_response_code(),
    'data' => $response
  );

  return $res;
}