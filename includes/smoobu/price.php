<?php

function p23_get_smoobu_from_price($start_date, $end_date, $obtained_price) {
  if(empty($start_date) || empty($end_date) || empty($obtained_price)) return false;

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
  $response = curl_exec($curl);
  $response = json_decode($response);
  curl_close($curl);

  $allow_prices_aparments = array();
  foreach($response->prices as $key => $value){
    if(!($value->price <= $obtained_price)) continue;
    $x[] = array_push(
      $allow_prices_aparments, 
      array(
        'id' => intval($key),
        'price' => intval($value->price),
      )
    );
  }
  return $allow_prices_aparments;
}
