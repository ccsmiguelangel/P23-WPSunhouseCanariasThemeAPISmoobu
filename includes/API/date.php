<?php

function p23_smoobu_display_date_response(){

  $namespace = 'alo'; //wp.com/wp-json/alo
  $route = 'date'; //wp.com/wp-json/alo/avaliable
  $args = array(
    'methods' => 'GET', 
    'callback' => 'p23_smoobu_display_date_response_callback'
  );

  register_rest_route($namespace, $route, $args);

}
add_action('rest_api_init', 'p23_smoobu_display_date_response');

function p23_smoobu_display_date_response_callback($res){
  
  $errRes = (object)array(
    'code' => http_response_code(),
    'message' => "We don't have apartments response, you used a date incorrect or you dont send start_date or end_date"
  );

  $Date = date("Y-m-d");
  if(empty($res['start_date']) || empty($res['end_date'])) return $errRes;
  
  if(!($Date < $res['start_date']) || !($Date < $res['end_date'])) return $errRes;
  if(date("Y-m-d", strtotime($Date. ' + 3 days')) > $res['end_date']) return $errRes;


  
  
  $apartments = p23_get_smoobu_from_date($res['start_date'], $res['end_date'] );
  if (empty($apartments)) return $errRes;

  $dateArray = (object)array(
    'code' => http_response_code(),
    'data' => $apartments,
  );
  return $dateArray;
  // return $res['start_date'];
}