<?php

  function p23_create_init_booking($arrivalDate, $depatureDate, $appartemntId, $adults){
    $fistName = 'webrecerved';
    $lastName = 'webrecerved';
    $email = 'webrecerved';
    $phone = 'webrecerved';

    $curl = curl_init('https://login.smoobu.com/api/reservations');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Api-Key:wIoa-r~N3VzVjAiP7t_hCh.Tr2D3R4Ib',
      'cache-control:no-cache',
      'Content-Type:application/json'
    ));

    $json_data = json_encode(array(
      'arrivalDate' => $arrivalDate,
      'departureDate' => $depatureDate,
      // "channelId" => 63,
      "apartmentId" => $appartemntId,
      "firstName" => $fistName,
      "lastName" => $lastName,
      "email" => $email,
      "phone" => $phone,
      "adults" => $adults,
      "depositStatus" => 0,
    ));
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    $response = json_decode($response);
    curl_close($curl);
    return $response;
  }