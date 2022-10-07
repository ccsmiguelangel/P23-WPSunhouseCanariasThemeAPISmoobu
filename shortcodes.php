<?php

@require_once plugin_dir_path(__FILE__).'public/similar_rooms.php';
@require_once plugin_dir_path(__FILE__).'public/servicios.php';

@require_once plugin_dir_path(__FILE__).'public/archive.php';


@require_once plugin_dir_path(__FILE__).'public/form-picker.php';
@require_once plugin_dir_path(__FILE__).'public/form-picker-alo.php';
@require_once plugin_dir_path(__FILE__).'public/form-picker-single.php';
// https://wordpress.stackexchange.com/questions/6731/how-do-test-if-a-post-is-a-custom-post-type
// https://developer.wordpress.org/reference/functions/is_singular/
// https://stackoverflow.com/questions/45734613/how-to-display-custom-meta-box-value-in-single-post-in-wordpress
// https://wordpress.stackexchange.com/questions/44184/how-to-get-meta-box-values-wp-tuts-tutorial

function get_alo_description() {

  global $post;
  $meta_description = get_post_meta($post->ID, '_alojamiento_subtitle', true);

  if ( !is_singular('alojamiento') ) {
    return;
  }
  if( empty($meta_description) ){
    return '<p>No poseemos información alguna de este alojamiento.</p>';
  }

  return $meta_description;
}
add_shortcode('alo_description', 'get_alo_description');



function get_alo_slider() {

  global $post;
  $meta_description = get_post_meta($post->ID, '_alojamiento_slide_shortcode', true);

  if ( !is_singular('alojamiento') ) {
    return;
  }
  if( empty($meta_description) ){
    return;
  }

  return do_shortcode($meta_description);

}

add_shortcode('alo_slider', 'get_alo_slider');




function get_alo_smoobu_shortcode() {

  global $post;
  $meta_description = get_post_meta($post->ID, '_alojamiento_smoobu_calendar', true);

  if ( !is_singular('alojamiento') ) {
    return;
  }
  if( empty($meta_description) ){
    return '<p>No poseemos información acerca de la disponibilidad.</p>';
  }

  return do_shortcode($meta_description);

}

add_shortcode('alo_smoobu_shortcode', 'get_alo_smoobu_shortcode');



function get_alo_comments_shortcode() {

  global $post;
  $meta_description = get_post_meta($post->ID, '_alojamiento_comments_shortcode', true);

  if ( !is_singular('alojamiento') ) {
    return;
  }
  if( empty($meta_description) ){
    return '<p>Todavía no hay valoraciones.</p>';
  }

  return do_shortcode($meta_description);

}

add_shortcode('alo_comments_shortcode', 'get_alo_comments_shortcode');




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




function get_alo_zone(){
  global $post;

  $meta_description = get_the_terms($post->ID, 'zonas');

  
  if ( !is_singular('alojamiento') ) {
    return;
  }
  if( empty($meta_description) ){
    return;
  }
  return $meta_description[0]->name;

}
add_shortcode('alo_zone', 'get_alo_zone');




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





function get_alo_max_people() {

  global $post;
  $meta_description = get_post_meta($post->ID, '_alojamiento_max_people', true);

  if ( !is_singular('alojamiento') ) {
    return;
  }
  if( empty($meta_description) ){
    return;
  }

  ob_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css">
  <style>
    /* grandson content */
    .alocard__people-content {
      color: #54595f;
      font-weight: 400;
    }

    .alocard__people {
      grid-area: 3 / 1 / 4 / 13;
    }

    .alocard__people-content {
      display: inline;
      font-size: 15px;
      margin: 0 0 0.5rem 0;
      padding: 0;
    }
    /*!
 * Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */
@font-face{font-family:"Font Awesome 5 Free";font-style:normal;font-weight:400;font-display:block;src:url(../webfonts/fa-regular-400.eot);src:url(../webfonts/fa-regular-400.eot?#iefix) format("embedded-opentype"),url(../webfonts/fa-regular-400.woff2) format("woff2"),url(../webfonts/fa-regular-400.woff) format("woff"),url(../webfonts/fa-regular-400.ttf) format("truetype"),url(../webfonts/fa-regular-400.svg#fontawesome) format("svg")}.far{font-family:"Font Awesome 5 Free";font-weight:400}
  </style>
  <div class="alocard__people">
    <i aria-hidden="true" class="far fa-user-circle"></i>
    <h3 class="alocard__people-content"><?php echo (intval($meta_description) > 1) ? $meta_description . ' Huéspedes' : $meta_description . 'Huésped'; ?></h3>
  </div>
<?php
  $p23_output = ob_get_clean();
  return $p23_output;
}
add_shortcode('alo_max_people', 'get_alo_max_people');