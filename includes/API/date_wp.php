<?php

function p23_wp_display_date_response(){
  $namespace = 'alo';
  $route = 'date_wp';
  $args = array(
    'methods' => 'GET', 
    'callback' => 'p23_wp_display_date_response_callback'
  );

  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_wp_display_date_response');

function p23_wp_display_date_response_callback($res){
  if (!p23_date_validation($res['start_date'], $res['end_date'])) return p23_error_response(1, http_response_code());

  $resp = p23_get_smoobu_from_date($res['start_date'], $res['end_date']);
  if (empty($resp)) return p23_error_response(2, http_response_code());

  $wp_apartments = p23_get_wp_apartments();
  if (empty($wp_apartments)) return p23_error_response(3, http_response_code());

  $resp = p23_smoobu_wp_compare_arrays($resp, $wp_apartments);
  if (empty($resp)) return p23_error_response(4, http_response_code());
 
  $resp = p23_set_multiple_smoobu_ids_to_wp_post_ids($resp, false);
  if (empty($resp)) return p23_error_response(5, http_response_code());

  return p23_validated_response($resp, http_response_code());
}