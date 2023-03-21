<?php

  function p23_create_init_booking($arrivalDate, $depatureDate, $appartemntId, $adults, $price){

    $curl = curl_init('https://login.smoobu.com/api/reservations');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Api-Key:wIoa-r~N3VzVjAiP7t_hCh.Tr2D3R4Ib',
      'cache-control:no-cache',
      'Content-Type:application/json'
    ));

    $json_data = json_encode(array(
      'firstName' => '15min Booked on the web',
      'lastName' => '15min Booked on the web',
      'email' => 'info@sunhousescanarias.com',
      'arrivalDate' => $arrivalDate,
      'departureDate' => $depatureDate,
      "apartmentId" => $appartemntId,
      "adults" => $adults,
      "price" => $price,
      "deposit" => 0,	
      "depositStatus" => 0,
      "notice" => "Cleaning charge added to the price."
    ));
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    $response = json_decode($response);
    curl_close($curl);
    return $response;
  }