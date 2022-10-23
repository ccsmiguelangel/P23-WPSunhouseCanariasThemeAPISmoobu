<?php



function p23_get_smoobu_all($res) {
  if (!p23_date_validation($res['start_date'], $res['end_date'])) return p23_error_response(1, http_response_code());
  if(!p23_guest_validation($res['guests'])) return p23_error_response(6, http_response_code());
  if (!p23_price_validation($res['price'])) return p23_error_response(9, http_response_code());

  $resp = p23_get_smoobu_from_date($res['start_date'], $res['end_date']);
  if (empty($resp)) return p23_error_response(2, http_response_code());

  // $smoobuArray = [];

  // if(empty($start_date) || empty($end_date)) return $errRes;

  // if(empty($guests) && empty($obtained_price)) $smoobuArray = p23_get_smoobu_from_date($start_date, $end_date);

  // if(!empty($guests) && empty($obtained_price)) $smoobuArray = p23_get_smoobu_form_guests($start_date, $end_date, $guests);
  
  // if(empty($guests) && !empty($obtained_price)) $smoobuArray = p23_get_smoobu_from_price($start_date, $end_date, $guests);

  // if(!empty($guests) && !empty($obtained_price)) $smoobuArray = ;
}
