<?php

function generate_servicios($title, $image)
{
  // Validitions
  if (!is_singular('alojamiento')) return;
  if (empty($title)) return;
  if (empty($image)) return;

  ob_start();
?>
  <div class="elementor-element elementor-element-6b074b28 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="6b074b28" data-element_type="widget" data-widget_type="image-box.default">
    <div class="elementor-widget-container">
      <style>
        /*! elementor - v3.7.4 - 31-08-2022 */
        .elementor-widget-image-box .elementor-image-box-content {
          width: 100%
        }

        @media (min-width:768px) {

          .elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper,
          .elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex
          }

          .elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
            text-align: right;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: reverse;
            -ms-flex-direction: row-reverse;
            flex-direction: row-reverse
          }

          .elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper {
            text-align: left;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row
          }

          .elementor-widget-image-box.elementor-position-top .elementor-image-box-img {
            margin: auto
          }

          .elementor-widget-image-box.elementor-vertical-align-top .elementor-image-box-wrapper {
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start
          }

          .elementor-widget-image-box.elementor-vertical-align-middle .elementor-image-box-wrapper {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center
          }

          .elementor-widget-image-box.elementor-vertical-align-bottom .elementor-image-box-wrapper {
            -webkit-box-align: end;
            -ms-flex-align: end;
            align-items: flex-end
          }
        }

        @media (max-width:767px) {
          .elementor-widget-image-box .elementor-image-box-img {
            margin-left: auto !important;
            margin-right: auto !important;
            margin-bottom: 15px
          }
        }

        .elementor-widget-image-box .elementor-image-box-img {
          display: inline-block
        }

        .elementor-widget-image-box .elementor-image-box-title a {
          color: inherit
        }

        .elementor-widget-image-box .elementor-image-box-wrapper {
          text-align: center
        }

        .elementor-widget-image-box .elementor-image-box-description {
          margin: 0
        }
        .alo_icon_image{
          width: 30px;
          height: auto;
        }

        .alo_servicio_warp {
          display: flex;
          align-items: center !important;
        }
        div.alo_servicio_warp > figure.elementor-image-box-img {
          margin-right: 15px !important;
        }
        .alo_servicio_title {
          color: #7A7A7A !important;

          font-size: 15px !important;
          font-weight: 400 !important;
        }
      </style>
      <div class="elementor-image-box-wrapper alo_servicio_warp">
        <figure class="elementor-image-box-img"><img width="512" height="512" src="<?php echo $image; ?>" class="alo_icon_image attachment-full size-full" alt="" loading="lazy"></figure>
        <div class="elementor-image-box-content">
          <h3 class="elementor-image-box-title alo_servicio_title"><?php echo $title; ?></h3>
        </div>
      </div>
    </div>
  </div>

<?php
  $p23_output = ob_get_clean();
  return $p23_output;
}


function generate_wrapper_servicios(){
  $html_enclose = array();
  ob_start();

  ?>
    <style>
        .alo_servicio_grid {
          display: grid;
          grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
        }
  </style>
    <div
      class="alo_servicio_grid elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-18b2479a"
      data-id="18b2479a"
      data-element_type="column"
    >
  <?php

  $html_enclose[0] =   ob_get_clean();
  
  ob_start();
  ?>
    </div>
  <?php 
  $html_enclose[1] =   ob_get_clean();

  return $html_enclose;
}