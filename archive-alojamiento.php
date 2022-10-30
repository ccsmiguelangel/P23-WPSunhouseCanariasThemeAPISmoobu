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
get_header(); 
?>
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
          <div class="alocard__list elementor-column elementor-col-100 elementor-top-column nd_booking_archive_search_masonry_container" data-id="4fa7db83" data-element_type="column">
            <?php
            echo do_shortcode('[show_alojamientos]');
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>