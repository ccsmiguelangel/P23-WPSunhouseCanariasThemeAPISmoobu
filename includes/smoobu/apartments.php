<?php


function p23_smoobu_get_apartmens()
{
  $curl = curl_init();
  $url = 'https://login.smoobu.com/api/apartments';
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Api-Key:wIoa-r~N3VzVjAiP7t_hCh.Tr2D3R4Ib',
    'cache-control:no-cache',
    'Content-Type:application/json'
  ));
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  $response = curl_exec($curl);
  $response = json_decode($response);
  //$data = json_decode(file_get_contents('php://input'), true);
  curl_close($curl);
  return $response;
}