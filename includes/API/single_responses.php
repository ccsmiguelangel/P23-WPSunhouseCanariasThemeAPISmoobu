<?php

function p23_single_error_response($value, $response_code)
{
  if(empty($value)) return false;
  $isNum = is_numeric($value);
  $isArray = is_array($value);
  if(!$isNum && !$isArray) return false;

  $res = [];
  $msg = '';

  if($isNum){
    switch ($value) {
      case 1: $msg = 'Alojamiento no disponible.'; break;
      case 2: $msg = 'Alojamiento no disponible.'; break;
      case 3: $msg = 'Alojamiento no disponible.'; break;
      case 4: $msg = 'Alojamiento no disponible.'; break;
      case 5: $msg = 'Alojamiento no disponible.'; break;
      case 6: $msg = 'Alojamiento no disponible.'; break;
      case 7: $msg = 'Alojamiento no disponible.'; break;
      case 8: $msg = "Alojamiento no disponible."; break;
      case 9: $msg = "Alojamiento no disponible."; break;
      case 10:$msg = "Alojamiento no disponible."; break;
      case 11:$msg = "Alojamiento no disponible."; break;
      case 12:$msg = "Alojamiento no disponible."; break;
      case 13:$msg = "Alojamiento no disponible."; break;
      case 14:$msg = "Alojamiento no disponible."; break;
      case 15:$msg = "Alojamiento no disponible."; break;
      case 16:$msg = "Alojamiento no disponible."; break;
    }
  }
  if($isArray){
    $msgFlag = true;
    $position = 0;
    foreach($value as $key=>$var){
      if(!empty($var)) continue;
      $msgFlag = false;
      $position = $key;
      break;
    }
    ($msgFlag)? $msg = 'Validated Data' : $msg = 'Invalidated Data in '.$position;
  }

  $res = (object) array(
    'code' => $response_code,
    'data' => false,
    'message' => $msg
  );

  return $res;
}

function p23_single_validated_response($data, $response_code){
  
  if(empty($data) || empty($response_code)) return false;

  $res = (object) array(
    'code' => $response_code,
    'data' => $data,
    'message' => 'Alojamiento disponible.'
  );

  return $res;
}

function p23_single_into_error_response($errNum){
  if(empty($errNum)) return false;

  $resp = array('errNum' => $errNum,'err' => true);
  return $resp;
}