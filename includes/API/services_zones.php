<?php


function p23_smoobu_display_services()
{
  $namespace = 'alo';
  $route = 'services_wp';
  $args = array(
    'methods' => 'GET',
    'callback' => 'p23_smoobu_display_services_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_smoobu_display_services');


function p23_smoobu_display_services_callback($res) {
  if(!p23_date_validation($res['start_date'], $res['end_date'])) return p23_error_response(1, http_response_code());
  if(!p23_guest_validation($res['guests'])) return p23_error_response(6, http_response_code());
  if(!p23_price_validation($res['price'])) return p23_error_response(9, http_response_code());
  if(!p23_service_zone_validation($res['services'])) return p23_error_response(12, http_response_code());
 
  $resp = p23_get_smoobu_from_date($res['start_date'], $res['end_date']);
  if (empty($resp)) return p23_error_response(2, http_response_code());

  $wp_apartments = p23_get_wp_apartments();
  if (empty($wp_apartments)) return p23_error_response(3, http_response_code());

  $resp = p23_smoobu_wp_compare_arrays($resp, $wp_apartments);
  if (empty($resp)) return p23_error_response(4, http_response_code());
 
  $resp = p23_set_multiple_smoobu_ids_to_wp_post_ids($resp);
  if (empty($resp)) return p23_error_response(5, http_response_code());

  $resp = p23_get_metabox_guest_data_from_ids($resp, intval($res['guests']));
  if ($resp['err']) return p23_error_response($resp['errNum'], http_response_code());


  $resp = p23_get_smoobu_from_price($res['start_date'], $res['end_date'], $res['price']);
  if ($resp['err']) return p23_error_response($resp['errNum'], http_response_code());

  $resp = p23_smoobu_wp_compare_arrays($resp, $wp_apartments);
  if (empty($resp)) return p23_error_response(4, http_response_code());

  $resp = p23_set_multiple_smoobu_ids_to_wp_post_ids($resp);
  if (empty($resp)) return p23_error_response(5, http_response_code());

  $allServices = p23_get_wp_services_or_zones('servicios');

  $resp = p23_smoobu_wp_compare_arrays(array_map('intval',$res['services']), $allServices);

  $resp = p23_get_post_from_term_id('servicios', $resp);

  return p23_validated_response($resp, http_response_code());
}



function p23_smoobu_display_zones()
{
  $namespace = 'alo';
  $route = 'zones_wp';
  $args = array(
    'methods' => 'GET',
    'callback' => 'p23_smoobu_display_zones_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_smoobu_display_zones');


function p23_smoobu_display_zones_callback($res) {
  if(!p23_date_validation($res['start_date'], $res['end_date'])) return p23_error_response(1, http_response_code());
  if(!p23_guest_validation($res['guests'])) return p23_error_response(6, http_response_code());
  if(!p23_price_validation($res['price'])) return p23_error_response(9, http_response_code());
  if(!p23_service_zone_validation($res['zones'])) return p23_error_response(13, http_response_code());
 
  $resp = p23_get_smoobu_from_date($res['start_date'], $res['end_date']);
  if (empty($resp)) return p23_error_response(2, http_response_code());

  $wp_apartments = p23_get_wp_apartments();
  if (empty($wp_apartments)) return p23_error_response(3, http_response_code());

  $resp = p23_smoobu_wp_compare_arrays($resp, $wp_apartments);
  if (empty($resp)) return p23_error_response(4, http_response_code());
 
  $resp = p23_set_multiple_smoobu_ids_to_wp_post_ids($resp);
  if (empty($resp)) return p23_error_response(5, http_response_code());

  $resp = p23_get_metabox_guest_data_from_ids($resp, intval($res['guests']));
  if ($resp['err']) return p23_error_response($resp['errNum'], http_response_code());


  $resp = p23_get_smoobu_from_price($res['start_date'], $res['end_date'], $res['price']);
  if ($resp['err']) return p23_error_response($resp['errNum'], http_response_code());

  $resp = p23_smoobu_wp_compare_arrays($resp, $wp_apartments);
  if (empty($resp)) return p23_error_response(4, http_response_code());

  $resp = p23_set_multiple_smoobu_ids_to_wp_post_ids($resp);
  if (empty($resp)) return p23_error_response(5, http_response_code());

  $allZones = p23_get_wp_services_or_zones('zonas');

  $resp = p23_smoobu_wp_compare_arrays(array_map('intval',$res['zones']), $allZones);

  $resp = p23_get_post_from_term_id('zonas', $resp);

  return p23_validated_response($resp, http_response_code());
}
