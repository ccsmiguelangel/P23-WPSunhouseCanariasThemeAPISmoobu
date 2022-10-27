<?php 

function p23_get_taxonomies_from_post_id($postID, $taxonomy, $only_term_id = true, $leave_post_id = false){
  $terms = wp_get_post_terms($postID, $taxonomy);
  $resp = [];
  

  foreach($terms as $term){
    if($only_term_id) {
      $x = array_push($resp, $term->term_id); 
    } else{
      $x = array_push($resp,array(
        'name' => $term->name,
        'term_id' => $term->term_id
      ));
    }
  } 
  if($leave_post_id){
    $resp = array(
      "post_id" => $postID,
      "services" => $resp
    );
  } 

  return $resp;
}

function p23_get_post_from_term_id($taxonomy, $term_id){
  $resp = get_posts(array(
    'post_type' => 'alojamiento',
    'fields' => 'ids',
    'numberposts' => -1,
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'term_id', 
        'terms' => $term_id, /// Where term_id of Term 1 is "1".
      )
    )
  ));

  return $resp;
}