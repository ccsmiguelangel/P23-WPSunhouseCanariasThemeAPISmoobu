<?php

/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */


if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
@require_once plugin_dir_path(__FILE__) . 'public/post-alojamiento.php';
get_header(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css">

<style>
  div.alocard__list.elementor-column.elementor-col-100.elementor-top-column {
    display: flex;
    flex-wrap: wrap;
    gap: 20px 0;
  }

  .elementor-container.elementor-column-gap-default {
    display: flex;
    margin: 40px auto;
    position: relative;

  }

  .elementor-column-gap-default>.elementor-column>.elementor-element-populated {
    padding: 10px;
  }

  .elementor-section.elementor-section-boxed>.elementor-container {
    max-width: 1140px;
  }

  @media (min-width: 768px) {
    .w-67 {
      width: 67%;
    }

    .w-32 {
      width: 32%;
    }
  }

  @media (max-width: 769px) {
    .elementor-container.elementor-column-gap-default {
      display: block;
    }

  }
</style>
<div id="content" class="site-content">
  <div class="elementor-background-slideshow swiper-container">
    <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-50 w-32">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div class="elementor-element elementor-element-e0a8321 elementor-widget elementor-widget-image" data-id="e0a8321" data-element_type="widget" data-widget_type="image.default">
            <div class="elementor-widget-container">
              <?php echo do_shortcode('[form-picker-alo]'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="elementor-column elementor-col-50 w-67 elementor-top-column elementor-element">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div class="alocard__list elementor-column elementor-col-100 elementor-top-column" data-id="4fa7db83" data-element_type="column">
            <?php
            // function get_available($start_date,$end_date){
            function get_available()
            {
              $curl = curl_init('https://login.smoobu.com/booking/checkApartmentAvailability');
              curl_setopt($curl, CURLOPT_POST, true);
              curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Api-Key:wIoa-r~N3VzVjAiP7t_hCh.Tr2D3R4Ib',
                'cache-control:no-cache',
                'Content-Type:application/json'
              ));

              $json_data = json_encode(array(
                'arrivalDate' => '2022-10-12',
                'departureDate' => '2022-10-17',
                'apartments' => [],
                'customerId' => 264141
              ));
              curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
              $response = curl_exec($curl);
              $response = json_decode($response);
              //$data = json_decode(file_get_contents('php://input'), true);
              curl_close($curl);
              $ids = $response->availableApartments;
              return $ids;
            }
            function get_alo_all_ids()
            {
              $alojamiento = get_posts([
                'post_type' => 'alojamiento',
                'post_status' => 'publish',
                'numberposts' => -1,
                'orderby' => 'rand',
              ]);
              // _alojamiento_smoobu_id
              $ids = [];
              foreach ($alojamiento as $alo) {
                $id = $alo->ID;
                
                $smoobu_ids = get_post_meta($id, '_alojamiento_smoobu_id', true);
                $new = array_push($ids, $smoobu_ids);
              }
              return $ids;
            }
            
            function get_alo_available(){
              $query = get_available();
              $all = get_alo_all_ids();
              
              $result = array_intersect($query, $all);
              return $result;
            }
            var_dump(get_available());
            echo "<br><br><br>";
            var_dump(get_alo_all_ids());
            echo "<br><br><br>";
            var_dump(get_alo_available());
            echo "<br><br><br>";

            echo show_all_alo();


            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>