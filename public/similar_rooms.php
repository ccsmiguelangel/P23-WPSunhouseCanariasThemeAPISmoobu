<?php

function generate_similar_room(
  $image,
  $title,
  $zona,
  $url,
  $description,
  $max_people,
  $srcset_image
) {
  // Validations
  if (!is_singular('alojamiento')) {
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
      .alocard {
        width: 33.333%;
      }
    }

    /* Father */
    .alocard {
      display: grid;
    }

    .alocard__container {
      display: grid;

      margin: 0 1rem 0 1rem;
      border-style: solid;
      border-width: 1px;
      border-color: #4a4d337d;
    }



    .alocard__content-row {
      display: grid;

      padding: 0 1rem 1rem 1rem;
    }

    /* grandson content */
    .alocard__title-content,
    .alocard__subtitle-content,
    .alocard__people-content,
    .alocard__descripcion-content {
      color: #54595f;
      font-weight: 400;
    }

    /* title */
    .alocard__title {
      grid-area: 1 / 1 / 2 / 13;
    }

    .alocard__title-content {
      font-size: 20px;
      margin: 10px 0 0 0;
      padding: 0;
    }

    /* subtitle */
    .alocard__subtitle {
      grid-area: 2 / 1 / 3 / 13;
    }

    .alocard__subtitle-content {
      display: inline;
      font-size: 12px;
      margin: 0;
      padding: 0;
    }

    .alocard__people {
      grid-area: 3 / 1 / 4 / 13;
    }

    .alocard__people-content {
      font-size: 15px;
      margin: 0 0 0.5rem 0;
      padding: 0;
    }

    .alocard__descripcion {
      grid-area: 4 / 1 / 5 / 13;
    }

    .alocard__description-content {
      font-size: 13px;
      margin: 0 0 1rem 0;
      padding: 0;
    }

    .alocard__action {
      grid-area: 5 / 1 / 6 / 13;
    }

    .alocard__btn {
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
    .alocard__image-content {
      height: auto;
      max-width: 100%;
      box-shadow: none;
    }
  </style>
  <div class="alocard">
    <div class="alocard__container">
      <div class="alocard__image-row">
        <div class="alocard__image">
          <a href="<?php $url; ?>">
            <img class="alocard__image-content" width="700" height="524" src="<?php echo $image; ?>" alt="" loading="lazy" srcset="
                  <?php echo $srcset_image; ?>" sizes="(max-width: 700px) 100vw, 700px" />
          </a>
        </div>
      </div>

      <div class="alocard__content-row">
        <div class="alocard__title">
          <h2 class="alocard__title-content"><?php echo $title; ?></h2>
        </div>

        <div class="alocard__subtitle">
          <i aria-hidden="true" class="far fa-user-circle"></i>
          <h3 class="alocard__subtitle-content"><?php echo $zona; ?></h3>
        </div>

        <div class="alocard__people">
          <span class="alocard__people-icon"></span>
          <h3 class="alocard__people-content"><?php echo ($max_people > 1) ? $max_people . ' Huéspedes' : $max_people . 'Huésped'; ?></h3>
        </div>

        <div class="alocard__descripcion">
          <p class="alocard__description-content">
            <?php echo $description; ?>
          </p>
        </div>

        <div class="alocard__action">
          <a class="alocard__btn" href="<?php echo $url; ?>">SABER MÁS</a>
        </div>
      </div>
    </div>
  </div>
<?php
  $p23_output = ob_get_clean();
  return $p23_output;
}
