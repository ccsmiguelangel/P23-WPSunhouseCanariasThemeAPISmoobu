<?php


function p23_smoobu_display_price_response(){
  $namespace = 'alo'; //wp.com/wp-json/alo
  $route = 'price'; //wp.com/wp-json/alo/avaliable
  $args = array(
    'methods' => 'GET', 
    'callback' => 'p23_smoobu_display_price_response_callback'
  );

  register_rest_route($namespace, $route, $args);

}
add_action('rest_api_init', 'p23_smoobu_display_price_response');

function p23_smoobu_display_price_response_callback($res){
  if (!p23_date_validation($res['start_date'], $res['end_date'])) return p23_error_response(1, http_response_code());
  if (!p23_price_validation($res['price'])) return p23_error_response(9, http_response_code());

  $resp = p23_get_smoobu_from_price($res['start_date'], $res['end_date'], $res['price']);
  if ($resp['err']) return p23_error_response($resp['errNum'], http_response_code());

  return p23_validated_response($resp, http_response_code());
}