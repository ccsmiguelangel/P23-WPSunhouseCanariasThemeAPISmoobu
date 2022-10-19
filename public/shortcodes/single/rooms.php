<?php

@require_once get_stylesheet_directory().'/public/similar-rooms.php';

function get_alo_similar_rooms() {

global $post;
$meta_description = get_post_meta($post->ID, '_alojamiento_similar_rooms', true);

if ( !is_singular('alojamiento') ) {
  return;
}
if( empty($meta_description) ){
  echo "<p>No existen alojamientos similares<p>.";
  return;
}

$iValidator = 0;
$lenValidator = count($meta_description);
ob_start();
?>

<section class="elementor-section elementor-top-section elementor-element elementor-element-3631fa40 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3631fa40" data-element_type="section">
  <div class="elementor-container elementor-column-gap-default">
    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2c759388" data-id="2c759388" data-element_type="column">
      <div class="elementor-widget-wrap elementor-element-populated">
        <section class="elementor-section elementor-top-section elementor-element elementor-element-2791049 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2791049" data-element_type="section">
          <div class="elementor-container elementor-column-gap-default">
            <div class="alocard__list elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4fa7db83" data-id="4fa7db83" data-element_type="column">
    
      <?php
foreach($meta_description as $id) {
  
  // Validations
  $lastItem =($iValidator === ($lenValidator - 1));
  $isSameIdAndNotMore = ($iValidator === 0) && $lastItem && $post->ID === intval($id); 
  if ($isSameIdAndNotMore) {
    echo "<h4>No existen alojamientos similares.<h4>";
    return;
  }
  if(!($post->ID === intval($id))) $iValidator++; 
  if($iValidator > 3) break; // No more three alojamientos
  if($post->ID === intval($id)) continue; // post id diferent to similar rooms


  $data = get_post($id);
  $termData = get_the_terms($id, 'zonas');
  
  $image = get_the_post_thumbnail_url($id, 'full');
  $title = $data->post_title;
  $zona = $termData[0]->name;
  $url = get_permalink($id);
  $description = get_post_meta($id, '_alojamiento_subtitle', true);
  $max_people = get_post_meta($id, '_alojamiento_max_people', true);
  $srcset_image = wp_get_attachment_image_srcset(get_post_thumbnail_id($id));

  echo generate_similar_room(
    $image, 
    $title, 
    $zona, 
    $url, 
    $description, 
    $max_people, 
    $srcset_image
  );
}
?>
    </div>
  </div>
</section>
    </div>
  </div>
</section>
<?php
$p23_output = ob_get_clean();
return $p23_output;

}

add_shortcode('alo_similar_rooms', 'get_alo_similar_rooms');
