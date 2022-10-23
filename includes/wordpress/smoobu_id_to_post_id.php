<?php


function p23_set_smoobu_id_to_wp_post_id($smoobu_id, $only_post_id = true){

  if(empty($smoobu_id) || !isset($only_post_id)) return false;

  $all = p23_get_wp_apartments(false);
  $res = 0;

  foreach($all as $elem){
    $wp_data = intval($elem['smoobuID']);
    $smoobu_data = intval($smoobu_id);
    if(!($wp_data === $smoobu_data)) continue;
    
    if ($only_post_id){
      $res = $elem['wpID'];
    } else {
      $res = array (
        'smoobu'  =>  $smoobu_data,
        'wp'  =>  $elem['wpID'],
      );
    }
    break;

  }

  return $res;
}

function p23_set_multiple_smoobu_ids_to_wp_post_ids($array_smoobu_ids, $only_post_id = true){

  if(empty($array_smoobu_ids) || !isset($only_post_id)) return false;

  $res = [];

  foreach($array_smoobu_ids as $smoobu_id){
    $post_id = p23_set_smoobu_id_to_wp_post_id($smoobu_id); 
    if(empty($post_id)) continue;

    if($only_post_id){
      $x[] = array_push($res, $post_id);
    } else {
      $x[] = array_push($res, array(
        'wpID' => $post_id,
        'smoobuID' => $smoobu_id
      ));
    } 
  }

  return $res;

}