<?php

function p23_cancel_reservation($reservationId) {

  $url = 'https://login.smoobu.com/api/reservations/' . $reservationId;
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Api-Key:wIoa-r~N3VzVjAiP7t_hCh.Tr2D3R4Ib',
    'cache-control:no-cache',
  ));


  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  $response = json_decode($response);
  curl_close($curl);
  return $response;
}