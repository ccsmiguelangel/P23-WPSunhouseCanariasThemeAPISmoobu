<?php
function p23_update_init_booking(
  $reservationId,
  $guestName,
  $guestEmail,
  $guestPhone,
  $deposit,
  $language = 'es'
) {

  $url = 'https://login.smoobu.com/api/reservations/' . $reservationId;
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Api-Key:wIoa-r~N3VzVjAiP7t_hCh.Tr2D3R4Ib',
    'cache-control:no-cache',
    'Content-Type:application/json'
  ));

  $json_data = json_encode(array(
    "guestName" => $guestName,
    "guestEmail" => $guestEmail,
    "guestPhone" => $guestPhone,
    "deposit" => $deposit,
    "language" => $language,
  ));

  curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  $response = json_decode($response);
  curl_close($curl);
  return $response;
}
