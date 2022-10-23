<?php

function p23_validate_smoobu_from_price($res, $obtained_price, $only_smoobu_ids = true){
  if(empty($res) || empty($obtained_price) || !isset($only_smoobu_ids)) return p23_into_error_response(10);
  
  $resp = array();
  foreach($res->prices as $key => $value){
    if(!($obtained_price <= $value->price)) continue;

    if($only_smoobu_ids){
      $x[] = array_push($resp, intval($key));
    } else{
      $x[] = array_push($resp, array(
          'id' => intval($key),
          'price' => intval($value->price),
        )
      );
    }
  }
  if(empty($resp))return p23_into_error_response(11);
  return $resp;
}

function p23_get_smoobu_from_price($start_date, $end_date, $obtained_price) {
  $obtained_price = intval($obtained_price);
  $curl = curl_init('https://login.smoobu.com/booking/checkApartmentAvailability');
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Api-Key:wIoa-r~N3VzVjAiP7t_hCh.Tr2D3R4Ib',
    'cache-control:no-cache',
    'Content-Type:application/json'
  ));
  $json_data = json_encode(array(
    'arrivalDate' => $start_date,
    'departureDate' => $end_date,
    'apartments' => [],
    'customerId' => 264141
  ));
  curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $resp = curl_exec($curl);
  $resp = json_decode($resp);
  curl_close($curl);
  
  $resp = p23_validate_smoobu_from_price($resp, $obtained_price);
  return $resp;
}
