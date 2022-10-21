<?php

function p23_smoobu_display_price_comparated(){
  $namespace = 'alo';
  $route = 'precio';
  $args = array(
    'methods' => 'GET', 
    'callback' => 'p23_smoobu_display_price_comparated_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_smoobu_display_price_comparated');


function p23_smoobu_display_price_comparated_callback($res){
  
  $errRes = (object) array(
    'code' => http_response_code(),
    'message' => 'Not response from smoobu or wordpress aparment data.'
  );  
  
  if(empty($res['start_date']) || empty($res['end_date']) || empty($res['price'])) return $errRes;
  // if(empty($res['price'])) return $errRes;
  
  $Date = date("Y-m-d");
  if(!($Date < $res['start_date']) || !($Date < $res['end_date'])) return $errRes;
  if(date("Y-m-d", strtotime($Date. ' + 3 days')) > $res['end_date']) return $errRes;

  $price = intval($res['price']);
  $smoobu_price = p23_get_smoobu_from_price($res['start_date'], $res['end_date'], $price);
  

  $smoobu_prices_array = array();
  foreach($smoobu_price as $value){
    $x[] = array_push(
      $smoobu_prices_array, 
      $value['id'],
    );
  }
  $wp_price= p23_get_wp_apartments();
  // $res = var_dump($wp_apartments);


  if(empty($smoobu_price) || empty($wp_price)) $errRes;

  $response = p23_smoobu_wp_compare_arrays($smoobu_prices_array, $wp_price);
  if(empty($response)) return $errRes; //code: 200

  $response = (object) array(
    'code' => http_response_code(),
    'data' => $response
  );

  return $response;
}