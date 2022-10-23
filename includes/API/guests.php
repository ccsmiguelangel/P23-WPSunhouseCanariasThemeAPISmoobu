<?php

//NOTE: SMOOBU DONT SAVE MAX/MIN GUESTS DATA, THIS DATA IS SAVED IN WP

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
  if (!p23_date_validation($res['start_date'], $res['end_date'])) return p23_error_response(1, http_response_code());

  $resp = p23_get_smoobu_from_date($res['start_date'], $res['end_date']);
  if (empty($resp)) return p23_error_response(2, http_response_code());

  $resp = p23_get_smoobu_form_guests($res['start_date'], $res['end_date']);

  return p23_validated_response($resp, http_response_code());
}