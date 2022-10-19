<?php


function get_alo_service(){
  global $post;

  $terms = wp_get_post_terms( $post->ID, 'servicios' ); 

  if(empty($terms)){
    return '<p>No poseemos información de los servicios del alojamiento.</p>';
  } 

  $iValidator = 0;
  ob_start();

  ?>
  
  <?php
  $html_wrapper = generate_wrapper_servicios();

  ?>

    <section
      class="elementor-section elementor-inner-section elementor-element elementor-element-52bcf46c elementor-section-boxed elementor-section-height-default elementor-section-height-default"
      data-id="52bcf46c"
      data-element_type="section"
    >
      <div class="elementor-container elementor-column-gap-default">
  <?php

  foreach($terms as $term){
    
    $term_image = has_term_meta($term->term_id);
    $image_id = intval($term_image[0]['meta_value']);
    $image = wp_get_attachment_image_url($image_id, 'thumbnail');
    $title = $term->name;
    
    $item = generate_servicios($title, $image);
    
    if(empty($item)) continue;
    if($iValidator >= 15) break;
    $iValidator++;
    

    
    $isDivided5 = ((($iValidator - 1) % 5) === 0 || ($iValidator === 0) );

    $isDivided5Close = (($iValidator) % 5) === 0 && ($iValidator != 0);

  
    echo ($isDivided5)? $html_wrapper[0] : '';
    
      echo generate_servicios($title, $image);
    
    echo ($isDivided5Close)? $html_wrapper[1] : '';

    ?>
  
    <?php
  }

  ?>
    </div>
      </section>
  <?php

  
  ?>
  
  <?php
  $p23_output = ob_get_clean();
  return $p23_output;
}
add_shortcode('alo_service', 'get_alo_service');
