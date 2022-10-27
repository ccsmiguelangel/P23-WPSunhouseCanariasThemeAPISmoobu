<?php

function p23_get_wp_services_or_zones($arg, $only_terms_id = true)
{

  $args_zonas = array(
    'taxonomy' => $arg
  );
  $taxonomies = get_terms($args_zonas);
  if (!$taxonomies) return false;
  $res = array();
  foreach ($taxonomies as $taxonomy) {
    
   if(!$only_terms_id) {
    $x[] = array_push($res, array(['name'] => $taxonomy->name,['id'] => $taxonomy->term_id));
  } else {
    $x[] = array_push($res, $taxonomy->term_id);
  }

  }
  return $res;
}
