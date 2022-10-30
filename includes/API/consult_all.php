<?php

function p23_consult_all_apartments_data_to_show()
{
  $namespace = 'alo';
  $route = 'consult_all';
  $args = array(
    'methods' => 'GET',
    'callback' => 'p23_consult_all_apartments_data_to_show_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_consult_all_apartments_data_to_show');


function p23_consult_all_apartments_data($res){
  if(!p23_date_validation($res['start_date'], $res['end_date'])) return p23_error_response(1, http_response_code());
  if(!p23_guest_validation($res['guests'])) return p23_error_response(6, http_response_code());
  if(!p23_price_validation($res['price'])) return p23_error_response(9, http_response_code());
//  Block consult if service or zone is empty
  // if(!p23_service_zone_validation($res['services'])) return p23_error_response(12, http_response_code());
  // if(!p23_service_zone_validation($res['zones'])) return p23_error_response(13, http_response_code());
 

  
  // filter form price data
  $resp = p23_get_smoobu_from_price($res['start_date'], $res['end_date'], $res['price']);
  if ($resp['err']) return p23_error_response($resp['errNum'], http_response_code());

  // get all apartments in wp
  $wp_apartments = p23_get_wp_apartments();
  if (empty($wp_apartments)) return p23_error_response(3, http_response_code());
  
  // Compare ids 
  $resp = p23_smoobu_wp_compare_arrays($resp, $wp_apartments);
  if (empty($resp)) return p23_error_response(4, http_response_code());
 
  // change smoobu ids to post ids
  $resp = p23_set_multiple_smoobu_ids_to_wp_post_ids($resp);
  if (empty($resp)) return p23_error_response(5, http_response_code());

  // filter from guest data
  $resp = p23_get_metabox_guest_data_from_ids($resp, intval($res['guests']));
  if ($resp['err']) return p23_error_response($resp['errNum'], http_response_code());


  
  if(!empty($res['services'])){
    // Get all service
    $allServices = p23_get_wp_services_or_zones('servicios');

    // Get post per services
    $serviceIds = p23_smoobu_wp_compare_arrays(array_map('intval',$res['services']), $allServices);
    if (empty($serviceIds)) return p23_error_response(12, http_response_code());
    $allPostPerService = p23_get_post_from_term_id('servicios', $serviceIds);
    if (empty($allPostPerService)) return p23_error_response(14, http_response_code());
    
    $resp = p23_smoobu_wp_compare_arrays($resp, $allPostPerService);
  }

  if(!empty($res['zones'])){
    // Get all zones
    $allZones = p23_get_wp_services_or_zones('zonas');

    // Get post per zones
    $zoneIds = p23_get_post_from_term_id(array_map('intval',$res['zones']), $allZones);
    if (empty($zoneIds)) return p23_error_response(13, http_response_code());
    $allPostPerZones = p23_get_post_from_term_id('servicios', $zoneIds);
    if (empty($allPostPerZones)) return p23_error_response(15, http_response_code());

    $resp = p23_smoobu_wp_compare_arrays($resp, $allPostPerZones);
  }

  return $resp;
  // return p23_validated_response($resp, http_response_code());
}

function p23_consult_all_apartments_data_to_show_callback($res){
  $IDs = p23_consult_all_apartments_data($res);

  $resp = p23_display_multiple_alo_data($IDs);

  
  return $resp;
}