<?php


function p23_get_smoobu_guests($start_date, $end_date, $guests) {
  if(empty($start_date) || empty($end_date)) return false;
  if(($guests > 15) || ($guests < 1)) return false;
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
    'customerId' => 264141,
    // 'guests' => $guests
  ));
  curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  $response = json_decode($response);
  curl_close($curl);
  $ids = $response;
  return $ids;
}