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
      case 1: $msg = 'Fecha Invalida.'; break;
      case 2: $msg = 'Tu búsqueda no coincide con las fechas disponibles, verifica el calendario de disponibilidad.'; break;
      case 3: $msg = 'No poseemos información en la web, consulte con el team de soporte.'; break;
      case 4: $msg = 'No poseemos información en la web, consulte con el team de soporte.'; break;
      case 5: $msg = 'No poseemos información en la web, consulte con el team de soporte.'; break;
      case 6: $msg = 'La información proporcionada en número de huéspedes es errada, consulte con el team de soporte.'; break;
      case 7: $msg = 'La información proporcionada en número de huéspedes es errada, consulte con el team de soporte.'; break;
      case 8: $msg = "Tu búsqueda posee un máximo de huéspedes, verifica el número en la descripción."; break;
      case 9: $msg = "Precio inválido, consulte con el team de soporte"; break;
      case 10:$msg = "Precio inválido, consulte con el team de soporte."; break;
      case 11:$msg = "Sin resultados encontrados, consulte con el team de soporte."; break;
      case 12:$msg = "Servicios inválidos, consulte con el team de soporte."; break;
      case 13:$msg = "Zonas inválidas, consulte con el team de soporte."; break;
      case 14:$msg = "Servicios inválidos, consulte con el team de soporte."; break;
      case 15:$msg = "Zonas inválidas, consulte con el team de soporte."; break;
      case 16:$msg = "Sin resultados encontrados, consulte con el team de soporte."; break;
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
    'data' => '',
    'message' => $msg
  );

  return $res;
}

function p23_single_validated_response($data, $response_code){
  
  if(empty($data) || empty($response_code)) return false;

  $res = (object) array(
    'code' => $response_code,
    'data' => $data,
    'message' => 'Día disponible.'
  );

  return $res;
}

function p23_single_into_error_response($errNum){
  if(empty($errNum)) return false;

  $resp = array('errNum' => $errNum,'err' => true);
  return $resp;
}