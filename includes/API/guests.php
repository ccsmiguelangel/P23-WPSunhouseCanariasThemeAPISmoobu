<?php

function p23_smoobu_display_guests_response(){

  $namespace = 'alo'; //wp.com/wp-json/alo
  $route = 'guests'; //wp.com/wp-json/alo/avaliable
  $args = array(
    'methods' => 'GET', 
    'callback' => 'p23_smoobu_display_guests_response_callback'
  );

  register_rest_route($namespace, $route, $args);

}
add_action('rest_api_init', 'p23_smoobu_display_guests_response');

function p23_smoobu_display_guests_response_callback($res){
  
  $errRes = (object)array(
    'code' => http_response_code(),
    'message' => "We don't have apartments response, you used a date incorrect, you dont send start_date end_date or guests numbers"
  );

  $Date = date("Y-m-d");
  if(empty($res['start_date']) || empty($res['end_date'])) return $errRes;

  if(!($Date < $res['start_date']) || !($Date < $res['end_date'])) return $errRes;
  if(date("Y-m-d", strtotime($Date. ' + 3 days')) > $res['end_date']) return $errRes;


  // if(empty($res['guests'])) return $errRes;
  $guests = intval($res['guests']);
  
  $apartments = p23_get_smoobu_guests($res['start_date'], $res['end_date'], $guests);
  // if (empty($apartments)) return $errRes;

  $dateArray = (object)array(
    'code' => http_response_code(),
    'data' => $apartments,
  );
  return $dateArray;
  // return $res['start_date'];
}