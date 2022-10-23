<?php

function p23_smoobu_display_price_comparated()
{
  $namespace = 'alo';
  $route = 'price_wp';
  $args = array(
    'methods' => 'GET',
    'callback' => 'p23_smoobu_display_price_comparated_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_smoobu_display_price_comparated');

function p23_smoobu_display_price_comparated_callback($res)
{
  if (!p23_date_validation($res['start_date'], $res['end_date'])) return p23_error_response(1, http_response_code());
  if (!p23_price_validation($res['price'])) return p23_error_response(9, http_response_code());

  $resp = p23_get_smoobu_from_price($res['start_date'], $res['end_date'], $res['price']);
  if ($resp['err']) return p23_error_response($resp['errNum'], http_response_code());

  $wp_apartments = p23_get_wp_apartments();
  if (empty($wp_apartments)) return p23_error_response(3, http_response_code());

  $resp = p23_smoobu_wp_compare_arrays($resp, $wp_apartments);
  if (empty($resp)) return p23_error_response(4, http_response_code());

  $resp = p23_set_multiple_smoobu_ids_to_wp_post_ids($resp);
  if (empty($resp)) return p23_error_response(5, http_response_code());

  return p23_validated_response($resp, http_response_code());
}
