<?php

function generate_post_alojamiento(
  $image,
  $title,
  $zona,
  $url,
  $description,
  $max_people,
  $srcset_image
) {
  // Validations
  if (!is_post_type_archive('alojamiento')) {
    return;
  }
  if (empty($image)) {
    return;
  }
  if (empty($title)) {
    return;
  }
  if (empty($zona)) {
    return;
  }
  if (empty($url)) {
    return;
  }
  if (empty($description)) {
    return;
  }
  if (empty($max_people)) {
    return;
  }
  if (empty($srcset_image)) {
    return;
  }



  ob_start();
?>
  <style>
    @media (min-width: 768px) {
      .alocard--archive {
        width: 33.333%;
      }
    }

    @media (max-width: 768px) {
      .alocard__list{
        display: flex;
        flex-wrap: wrap;
      }
    }

    /* Father */
    .alocard--archive {
      display: grid;
    }

    .alocard--archive__container {
      display: grid;

      margin: 0 1rem 0 1rem;
      border-style: solid;
      border-width: 1px;
      border-color: #4a4d337d;
    }



    .alocard--archive__content-row {
      display: grid;

      padding: 0 1rem 1rem 1rem;
    }

    /* grandson content */
    .alocard--archive__title-content,
    .alocard--archive__subtitle-content,
    .alocard--archive__people-content,
    .alocard--archive__descripcion-content {
      color: #54595f;
      font-weight: 400;
    }

    /* title */
    .alocard--archive__title {
      grid-area: 1 / 1 / 2 / 13;
    }

    .alocard--archive__title-content {
      font-size: 20px;
      margin: 10px 0 0 0;
      padding: 0;
    }

    /* subtitle */
    .alocard--archive__subtitle {
      grid-area: 2 / 1 / 3 / 13;
    }

    .alocard--archive__subtitle-content {
      display: inline;
      font-size: 12px;
      margin: 0;
      padding: 0;
    }

    .alocard--archive__people {
      grid-area: 3 / 1 / 4 / 13;
    }

    .alocard--archive__people-content {
      font-size: 15px;
      margin: 0 0 0.5rem 0;
      padding: 0;
    }

    .alocard--archive__descripcion {
      grid-area: 4 / 1 / 5 / 13;
    }

    .alocard--archive__description-content {
      font-size: 13px;
      margin: 0 0 1rem 0;
      padding: 0;
    }

    .alocard--archive__action {
      grid-area: 5 / 1 / 6 / 13;
    }

    .alocard--archive__btn {
      fill: #4a4d337d;
      color: #4a4d337d;
      background-color: #61ce7000;
      border-style: solid;
      border-width: 1px 0px 1px 0px;
      border-color: #4a4d337d;
      text-decoration: none;

      font-size: 13px;
      font-weight: 500;
      padding: 10px 20px;
      border-radius: 2px;
    }

    /* grandson image */
    .alocard--archive__image-content {
      height: auto;
      max-width: 100%;
      box-shadow: none;
    }
  </style>
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
    'order'    => 'ASC'
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

    echo generate_post_alojamiento(
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
<?php
  $p23_output = ob_get_clean();
  return $p23_output;
}

add_shortcode('show_alojamientos', 'show_all_alo');
