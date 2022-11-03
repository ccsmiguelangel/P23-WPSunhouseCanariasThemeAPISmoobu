<?php
// Smoobu

function p23_date_validation($start_date, $end_date)
{

  // if (!strtotime($start_date) || !strtotime(!$end_date)) return false;

  if (empty($start_date) || empty($end_date)) return false;

  $Date = date("Y-m-d");
  if (!($Date <= $start_date) || !($Date < $end_date)) return false;
  if (($start_date > $end_date)) return false;
  if (date("Y-m-d", strtotime($Date . ' + 5 days')) > $end_date) return false;

  return true;
}


function p23_guest_validation($guests)
{
  if (empty($guests)) return false;
  if (!is_numeric($guests)) return false;
  if ($guests < 1) return false;
  return true;
}

function p23_price_validation($price){
  if (empty($price)) return false;
  if (!is_numeric($price)) return false;
  if ($price < 1) return false;
  return true;
}

function p23_service_zone_validation($id){
  if (empty($id)) return false;
  // if (!is_numeric($id)) return false;
  // if ($id < 1) return false;
  return true;
}
// WP
