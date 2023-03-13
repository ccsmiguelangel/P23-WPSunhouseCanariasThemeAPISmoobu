<?php

function p23_consult_single_data_to_show()
{
  $namespace = 'alo';
  $route = 'single';
  $args = array(
    'methods' => 'GET',
    'callback' => 'p23_consult_single_data_to_show_callback'
  );
  register_rest_route($namespace, $route, $args);
}
add_action('rest_api_init', 'p23_consult_single_data_to_show');

function p23_consult_single_data_to_show_callback($res){

  // if(!p23_date_validation($res['x|start_date'], $res['end_date'])) return p23_single_error_response(1, http_response_code());
  // if(!p23_guest_validation($res['guests'])) return p23_single_error_response(6, http_response_code());
  // if (!p23_price_validation($res['price'])) return p23_error_response(9, http_response_code());

  // $resp = p23_get_smoobu_from_price($res['start_date'], $res['end_date'], $res['price'], false);
  // if (empty($resp)) return p23_single_error_response(2, http_response_code());

  // $search_ids = [];
  // foreach($resp as $value){
  //   $search_ids = array_push($value->id); 
  // }

  // $wp_apartments = p23_get_wp_apartments();
  // if (empty($wp_apartments)) return p23_single_error_response(3, http_response_code());

  // $search_ids = p23_smoobu_wp_compare_arrays($search_ids, $wp_apartments);
  // if (empty($search_ids)) return p23_single_error_response(4, http_response_code());

  // $search_ids = p23  _set_multiple_smoobu_ids_to_wp_post_ids($search_ids);

  // $search_ids = p23_smoobu_wp_compare_arrays($search_ids, array($res['post_id']));    
  // if (empty($search_ids)) return p23_single_error_response(2, http_response_code());

  if(!p23_date_validation($res['start_date'], $res['end_date'])) return p23_single_error_response(1, http_response_code());
  if(!p23_guest_validation($res['guests'])) return p23_single_error_response(6, http_response_code());


  // $resp = p23_get_smoobu_from_date($res['start_date'], $res['end_date']);
  $search_ids = p23_get_smoobu_from_price($res['start_date'], $res['end_date'], $res['price'], false);
  $resp = array_column($search_ids, 'id');
  // return $resp;

  // $price = $resp['price'];
  if (empty($resp)) return p23_single_error_response(2, http_response_code());
 
  $wp_apartments = p23_get_wp_apartments();
  // return $wp_apartments;
  if (empty($wp_apartments)) return p23_single_error_response(3, http_response_code());

  $resp = p23_smoobu_wp_compare_arrays($resp, $wp_apartments);
  // return $resp;
  if (empty($resp)) return p23_single_error_response(4, http_response_code());
  $resp = p23_set_multiple_smoobu_ids_to_wp_post_ids($resp);
  // return $resp;
  if (empty($resp)) return p23_single_error_response(5, http_response_code());

  $resp = p23_smoobu_wp_compare_arrays($resp, array($res['post_id']));
  // return $resp;
  if (empty($resp)) return p23_single_error_response(2, http_response_code());

  $resp = p23_get_metabox_guest_data_from_ids($resp, intval($res['guests']));
  // return $resp;
  if ($resp['err']) return p23_single_error_response($resp['errNum'], http_response_code());

  $price = 0;
  $smoobu_id = get_post_meta($res['post_id'], '_alojamiento_smoobu_id', true);
  $product_id = get_post_meta($res['post_id'], '_alojamiento_woo_id', true); 
  $cleaning_charge = intval(get_post_meta($res['post_id'], '_alojamiento_cleaning_charge', true)); 
  foreach($search_ids as $val){
    if ($val['id'] == $smoobu_id){
      $price = $val['price'];
      break ;
    }
  }
  if ($price <= 0) return p23_single_error_response(10, http_response_code());
  if (empty($smoobu_id)) return p23_single_error_response(16, http_response_code());
  if (empty($product_id)) return p23_single_error_response(16, http_response_code());
  if (empty($cleaning_charge)) return p23_single_error_response(16, http_response_code());
  
  $totalPrice = $cleaning_charge + $price;

  $lastResp = (object) array(
    "wp_id" => $resp[0],
    "smoobu_id" => $smoobu_id,
    "woo_id" => $product_id,
    "price" => $price,
    "clening_charge" => $cleaning_charge, 
    "total" => $totalPrice
  );
  return p23_single_validated_response($lastResp, http_response_code());
}
