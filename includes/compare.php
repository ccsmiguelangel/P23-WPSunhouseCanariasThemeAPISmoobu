<?php

function p23_smoobu_wp_compare_arrays($a, $b)
{
  // if(!(is_array($a)) || !(is_array($b))) return 'Some value is not array';
  if(!(is_array($a)) || !(is_array($b))) return false;

  $res = array_intersect($a, $b);
  // $res = (object) $res;

  return $res;
}
