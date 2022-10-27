<?php

function p23_error_response($value, $response_code)
{
  if(empty($value)) return false;
  $isNum = is_numeric($value);
  $isArray = is_array($value);
  if(!$isNum && !$isArray) return false;

  $res = [];
  $msg = '';

  if($isNum){
    switch ($value) {
      case 1: $msg = 'Invalid date.'; break;
      case 2: $msg = 'No data found in smoobu api.'; break;
      case 3: $msg = 'No data found in wordpress.'; break;
      case 4: $msg = 'There are no similarities in values between wordpress and smoobu.'; break;
      case 5: $msg = 'Smoobu IDs were not found in wordpress.'; break;
      case 6: $msg = 'Invalid guest data.'; break;
      case 7: $msg = 'Invalid guest data, some entry empty values.'; break;
      case 8: $msg = "There are no similarities in guests values between wordpress query and smoobu."; break;
      case 9: $msg = "Invalid price."; break;
      case 10:$msg = "Empty price values."; break;
      case 11:$msg = "There are no similarities in price values between wordpress query and smoobu."; break;
      case 12:$msg = "Empty services values."; break;
      case 13:$msg = "Empty zones values."; break;
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

function p23_validated_response($data, $response_code){
  
  if(empty($data) || empty($response_code)) return false;

  $res = (object) array(
    'code' => $response_code,
    'data' => $data,
    'message' => 'Information provided correctly.'
  );

  return $res;
}

function p23_into_error_response($errNum){
  if(empty($errNum)) return false;

  $resp = array('errNum' => $errNum,'err' => true);
  return $resp;
}