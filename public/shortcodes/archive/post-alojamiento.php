<?php

function generate_post_alojamiento(
  $image,
  $title,
  $zona,
  $url,
  $description,
  $max_people,
  $srcset_image,
  $woo_id,
  $smoobu_id,
  $slide_shortcode
) {
  // Validations
  if (!is_singular('alojamiento')) return;
  if (empty($image)) return;
  if (empty($title)) return;
  if (empty($zona)) return;
  if (empty($url)) return;
  if (empty($description)) return;
  if (empty($max_people)) return;
  if (empty($srcset_image)) return;
  if (empty($woo_id)) return;
  if (empty($smoobu_id)) return;
  if (empty($slide_shortcode)) return;


  ob_start();
?>

  <div class="alocard--archive">
    <div class="alocard--archive__container">
      <div class="alocard--archive__image-row">
        <div class="alocard--archive__image">
          <a href="<?php $url; ?>">
            <img class="alocard--archive__image-content" width="700" height="524" src="<?php echo $image; ?>" alt="" loading="lazy" srcset="
                  <?php echo $srcset_image; ?>" sizes="(max-width: 700px) 100vw, 700px" />
          </a>
        </div>
      </div>

      <div class="alocard--archive__content-row">
        <div class="alocard--archive__title">
          <h2 class="alocard--archive__title-content"><?php echo $title; ?></h2>
        </div>

        <div class="alocard--archive__subtitle">
          <i aria-hidden="true" class="far fa-user-circle"></i>
          <h3 class="alocard--archive__subtitle-content"><?php echo $zona; ?></h3>
        </div>

        <div class="alocard--archive__people">
          <span class="alocard--archive__people-icon"></span>
          <h3 class="alocard--archive__people-content"><?php echo ($max_people > 1) ? $max_people . ' Huéspedes' : $max_people . 'Huésped'; ?></h3>
        </div>

        <div class="alocard--archive__descripcion">
          <p class="alocard--archive__description-content">
            <?php echo $description; ?>
          </p>
        </div>

        <div class="alocard--archive__action">
          <a class="alocard--archive__btn" href="<?php echo $url; ?>">SABER MÁS</a>
        </div>
      </div>
    </div>
  </div>
<?php
  $p23_output = ob_get_clean();
  return $p23_output;
}

function show_all_alo()
{
  ob_start();
?>
  <?php
  $alojamiento = get_posts([
    'post_type' => 'alojamiento',
    'post_status' => 'publish',
    'numberposts' => -1,
    // 'order'    => 'ASC'
    'orderby' => 'rand', //random
  ]);

  if (empty($alojamiento)) {
    echo "<h4>No existen alojamientos, consulte más tarde.<h4>.";
    return;
  }
  // var_dump($alojamiento[0]->ID);
  foreach ($alojamiento as $alo) {
    $id = $alo->ID;
    $data = get_post($id);
    $termData = get_the_terms($id, 'zonas');

    $image = get_the_post_thumbnail_url($id, 'full');
    $title = $data->post_title;
    $zona = $termData[0]->name;
    $url = get_permalink($id);
    $description = get_post_meta($id, '_alojamiento_subtitle', true);
    $max_people = get_post_meta($id, '_alojamiento_max_people', true);
    $srcset_image = wp_get_attachment_image_srcset(get_post_thumbnail_id($id));
    $woo_id = get_post_meta($id, '_alojamiento_woo_id', true);
    $smoobu_id = get_post_meta($id, '_alojamiento_smoobu_id', true);
    $slide_shortcode = get_post_meta($id, '_alojamiento_slide_shortcode', true);

    echo generate_post_alojamiento(
      $image,
      $title,
      $zona,
      $url,
      $description,
      $max_people,
      $srcset_image,
      $woo_id,
      $smoobu_id,
      $slide_shortcode
    );
  }
  ?>
<?php
  $p23_output = ob_get_clean();
  return $p23_output;
}

add_shortcode('show_alojamientos', 'show_all_alo');