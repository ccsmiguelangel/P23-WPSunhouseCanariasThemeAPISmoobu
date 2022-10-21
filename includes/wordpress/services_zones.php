<?php

function p23_get_wp_services_zones($arg)
{

  $args_zonas = array(
    'taxonomy' => $arg
  );
  $taxonomies = get_terms($args_zonas);
  if (!$taxonomies) return false;
  $res = array();
  foreach ($taxonomies as $taxonomy) {
    $x[] = array_push($res, $taxonomy->name);
  }
  return $res;
}
