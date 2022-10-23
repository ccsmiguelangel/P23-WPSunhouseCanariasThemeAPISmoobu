<?php



function p23_get_smoobu_all($start_date, $end_date, $guests = false, $obtained_price = false) {
  
  $errRes = (object) array(
    'code' => http_response_code(),
    'message' => "Error, empty parameters"
  );

  $smoobuArray = [];

  if(empty($start_date) || empty($end_date)) return $errRes;

  if(empty($guests) && empty($obtained_price)) $smoobuArray = p23_get_smoobu_from_date($start_date, $end_date);

  if(!empty($guests) && empty($obtained_price)) $smoobuArray = p23_get_smoobu_form_guests($start_date, $end_date, $guests);
  
  if(empty($guests) && !empty($obtained_price)) $smoobuArray = p23_get_smoobu_from_price($start_date, $end_date, $guests);

  // if(!empty($guests) && !empty($obtained_price)) $smoobuArray = ;
}
