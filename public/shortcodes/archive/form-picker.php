<?php


function p23_form_picker_alo()
{
  ob_start();
?>

  <form id="nd_booking_search_cpt_1_form_sidebar">
    <div id="nd_booking_search_main_bg" class="nd_booking_section nd_booking_bg_greydark nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_box_sizing_border_box">
      <!--check in/out-->
      <div id="nd_booking_search_cpt_1_form_checkin" class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_bottom_0 nd_booking_box_sizing_border_box">
        <div id="nd_booking_open_calendar_from" class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center nd_booking_cursor_pointer">
          <div class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center">
            <h6 class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
              ENTRADA
            </h6>
            <div class="nd_booking_section nd_booking_height_15"></div>
            <div class="nd_booking_display_inline_flex">
              <div class="nd_booking_float_left nd_booking_text_align_right">
                <h1 id="nd_booking_date_number_from_front" class="nd_booking_font_size_50 nd_booking_color_yellow_important">-</h1>
              </div>
              <div class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10">
                <h6 id="nd_booking_date_month_from_front" class="nd_booking_color_yellow_important nd_booking_margin_top_7 nd_booking_font_size_12">
                  
                </h6>
                <div class="nd_booking_section nd_booking_height_5"></div>
                <img alt="" width="12" src="<?php echo get_stylesheet_directory_uri() . '/public/icons/icon-down-arrow-white.svg'; ?>" />
              </div>
            </div>
          </div>
        </div>

        <input type="hidden" id="nd_booking_date_month_from" class="nd_booking_section nd_booking_margin_top_20" value="Oct" />
        <input type="hidden" id="nd_booking_date_number_from" class="nd_booking_section nd_booking_margin_top_20" />
        <input placeholder="Check In" class="nd_booking_section nd_booking_margin_top_30 nd_booking_margin_0_responsive nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important" type="text" name="nd_booking_archive_form_date_range_from" id="nd_booking_archive_form_date_range_from" value="" />
      </div>
      <div id="nd_booking_search_cpt_1_form_checkout" class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_bottom_0 nd_booking_box_sizing_border_box">
        <div id="nd_booking_open_calendar_to" class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center nd_booking_cursor_pointer">
          <div class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center">
            <h6 class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
              SALIDA
            </h6>
            <div class="nd_booking_section nd_booking_height_15"></div>
            <div class="nd_booking_display_inline_flex">
              <div class="nd_booking_float_left nd_booking_text_align_right">
                <h1 id="nd_booking_date_number_to_front" class="nd_booking_font_size_50 nd_booking_color_yellow_important">-</h1>
              </div>
              <div class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10">
                <h6 id="nd_booking_date_month_to_front" class="nd_booking_color_yellow_important nd_booking_margin_top_7 nd_booking_font_size_12">
                  
                </h6>
                <div class="nd_booking_section nd_booking_height_5"></div>
                <img alt="" width="12" src="<?php echo get_stylesheet_directory_uri() . '/public/icons/icon-down-arrow-white.svg'; ?>" />
              </div>
            </div>
          </div>
        </div>

        <input type="hidden" id="nd_booking_date_month_to" class="nd_booking_section nd_booking_margin_top_20" value="Oct" />
        <input type="hidden" id="nd_booking_date_number_to" class="nd_booking_section nd_booking_margin_top_20" />
        <input placeholder="Check Out" class="nd_booking_section nd_booking_margin_top_30 nd_booking_margin_0_responsive nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important" type="text" name="nd_booking_archive_form_date_range_to" id="nd_booking_archive_form_date_range_to" value="" />
      </div>



      <!--guests-->
      <div id="nd_booking_search_cpt_1_form_guests" class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_top_0 nd_booking_box_sizing_border_box">
        <div id="nd_booking_search_guests_bg" class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center">
          <div class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center">
            <h6 class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
              HUÉSPEDES
            </h6>
            <div class="nd_booking_section nd_booking_height_15"></div>
            <div class="nd_booking_display_inline_flex">
              <div class="nd_booking_float_left nd_booking_text_align_right">
                <h1 class="nd_booking_font_size_50 nd_booking_color_yellow_important nd_booking_guests_number">
                  1
                </h1>
              </div>
              <div class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10">
                <div class="nd_booking_section nd_booking_height_7"></div>
                <div class="nd_booking_section">
                  <img class="nd_booking_float_right nd_booking_guests_increase nd_booking_cursor_pointer" style="transform: rotate(180deg)" alt="" width="12" src="<?php echo get_stylesheet_directory_uri() . '/public/icons/icon-down-arrow-white.svg'; ?>" />
                </div>
                <div class="nd_booking_section nd_booking_height_10"></div>
                <div class="nd_booking_section">
                  <img class="nd_booking_float_right nd_booking_guests_decrease nd_booking_cursor_pointer" alt="" width="12" src="<?php echo get_stylesheet_directory_uri() . '/public/icons/icon-down-arrow-white.svg'; ?>" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <label class="nd_booking_display_none" for="nd_booking_archive_form_guests">Huéspedes :</label>
        <!-- <input
        placeholder="Guests"
        onchange="nd_booking_sorting(1)"
        class="nd_booking_section nd_booking_display_none"
        type="number"
        name="nd_booking_archive_form_guests"
        id="nd_booking_archive_form_guests"
        min="1"
        value="1"
      /> -->
        <input placeholder="Guests" class="nd_booking_section nd_booking_display_none" type="number" name="nd_booking_archive_form_guests" id="nd_booking_archive_form_guests" min="1" value="1" />
      </div>
      <!--guests-->

      <!--night info-->
      <div id="nd_booking_search_cpt_1_form_nights" class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_top_0 nd_booking_box_sizing_border_box">
        <div id="nd_booking_search_nights_bg" class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center">
          <div class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center">
            <h6 class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
              NOCHES
            </h6>
            <div class="nd_booking_section nd_booking_height_15"></div>
            <div class="nd_booking_display_inline_flex">
              <div class="nd_booking_float_left nd_booking_text_align_right">
                <h1 class="nd_booking_font_size_50 nd_booking_color_yellow_important nd_booking_nights_number">
                  5
                </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--night info-->
    </div>
    <div class="nd_booking_section">
      <h3 style="text-align: center;">Reserva mínima 5 noches</h3>
    </div>
    <!--max night range-->
    <div id="nd_booking_search_cpt_1_form_night_range" class="nd_booking_width_100_percentage nd_booking_float_left nd_booking_padding_0_15 nd_booking_box_sizing_border_box">
      <div class="nd_booking_section nd_booking_height_20"></div>
      <div class="nd_booking_section nd_booking_height_2 nd_booking_bg_grey"></div>

      <div class="nd_booking_section nd_booking_position_relative nd_booking_padding_30 nd_booking_padding_30_15_all_iphone nd_booking_box_sizing_border_box">
        <div class="nd_booking_section">
          <h3 class="nd_booking_float_left">Precio Por Noche :</h3>
          <span class="nd_booking_float_right nd_options_first_font nd_options_color_greydark nd_booking_line_height_25 nd_booking_font_size_20">€</span>
          <input class="nd_booking_float_right nd_options_first_font nd_booking_margin_right_5 nd_booking_border_width_0_important" type="text" id="nd_booking_archive_form_max_price_for_day" name="nd_booking_archive_form_max_price_for_day" readonly="" />
        </div>

        <div class="nd_booking_section">
          <div id="nd_booking_slider_range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 42.7754%"></span>
          </div>
        </div>
      </div>

      <div class="nd_booking_section nd_booking_height_5"></div>
      <div class="nd_booking_section nd_booking_height_2 nd_booking_bg_grey"></div>
    </div>
    <!--max night range-->
    <!--normal service-->
    <div id="nd_booking_search_cpt_1_form_normal_services" class="nd_booking_width_100_percentage nd_booking_float_left nd_booking_padding_0_15 nd_booking_box_sizing_border_box">
      <div class="nd_booking_section nd_booking_position_relative nd_booking_padding_30 nd_booking_padding_30_15_all_iphone nd_booking_box_sizing_border_box">
        <h3>Servicios :</h3>
        <img style="display: block" class="nd_booking_toogle_services_open_content nd_booking_position_absolute nd_booking_right_30 nd_booking_top_35 nd_booking_cursor_pointer" alt="" width="20" src="<?php echo get_stylesheet_directory_uri() . '/public/icons/icon-down-arrow-grey.svg'; ?>" style="display: none" />
        <img style="transform: rotate(180deg)" class="nd_booking_toogle_services_close_content nd_booking_display_none nd_booking_position_absolute nd_booking_right_30 nd_booking_top_35 nd_booking_cursor_pointer" alt="" width="20" src="<?php echo get_stylesheet_directory_uri() . '/public/icons/icon-down-arrow-grey.svg'; ?>" />
      </div>

      <div class="nd_booking_toogle_services_content nd_booking_padding_0_30 nd_booking_section nd_booking_display_none nd_booking_margin_top_10_negative nd_booking_box_sizing_border_box" style="display: none">

        <?php
        $args_services = array(
          'taxonomy' => 'servicios'
        );
        $taxonomies_servicios = get_terms($args_services);
        if ($taxonomies_servicios) {
          foreach ($taxonomies_servicios as $taxonomy) {
            echo '
        <p
        class="nd_booking_service_or_zone nd_booking_width_50_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_margin_0"
        >
          <input
            class="nd_booking_checkbox_service nd_booking_width_25 nd_booking_margin_0 nd_booking_padding_0 nd_booking_margin_top_8"
            name="nd_booking_service_id[]"
            type="checkbox"
            value="' . $taxonomy->term_id . '"
          />
          ' . $taxonomy->name . '
        </p>
        ';
          }
        }
        ?>
        <div class="nd_booking_section nd_booking_height_30"></div>
      </div>
      <div class="nd_booking_section nd_booking_height_2 nd_booking_bg_grey"></div>
      <input type="hidden" id="nd_booking_archive_form_services" name="nd_booking_archive_form_services[]" value="" />


    </div>
    <!--normal service-->
    <!--additional service-->
    <div id="nd_booking_search_cpt_1_form_extra_services" class="  nd_booking_width_100_percentage nd_booking_float_left nd_booking_padding_0_15 nd_booking_box_sizing_border_box">

      <div class="nd_booking_section nd_booking_position_relative nd_booking_padding_30 nd_booking_padding_30_15_all_iphone nd_booking_box_sizing_border_box">
        <h3>Zonas :</h3>
        <img class="nd_booking_toogle_additional_services_open_content nd_booking_position_absolute nd_booking_right_30 nd_booking_top_35 nd_booking_cursor_pointer" alt="" width="20" src="<?php echo get_stylesheet_directory_uri() . '/public/icons/icon-down-arrow-grey.svg'; ?>">
        <img style="transform: rotate(180deg);" class="nd_booking_toogle_additional_services_close_content nd_booking_display_none nd_booking_position_absolute nd_booking_right_30 nd_booking_top_35 nd_booking_cursor_pointer" alt="" width="20" src="<?php echo get_stylesheet_directory_uri() . '/public/icons/icon-down-arrow-grey.svg'; ?>">
      </div>

      <div class="nd_booking_toogle_additional_services_content nd_booking_padding_0_30 nd_booking_section nd_booking_display_none nd_booking_margin_top_10_negative nd_booking_box_sizing_border_box">
        <?php
        $args_zonas = array(
          'taxonomy' => 'zonas'
        );
        $taxonomies_zonas = get_terms($args_zonas);
        if ($taxonomies_zonas) {
          foreach ($taxonomies_zonas as $taxonomy) {
            echo '
                  <p class="nd_booking_service_or_zone nd_booking_width_50_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_margin_0">
                  <input 
                  name="nd_booking_archive_form_zones[]"
                  class="nd_booking_checkbox_additional_service nd_booking_width_25 nd_booking_margin_0 nd_booking_padding_0 nd_booking_margin_top_8" name="nd_booking_additional_service_id_' . $taxonomy->term_id . '" 
                  type="checkbox" 
                  value="' . $taxonomy->term_id . '">
                    ' . $taxonomy->name . '
                  </p>
                  ';
          }
        }
        ?>
        <div class="nd_booking_section nd_booking_height_30"></div>
      </div>
      <div class="nd_booking_section nd_booking_height_2 nd_booking_bg_grey"></div>
      <input type="hidden" id="nd_booking_archive_form_additional_services" name="nd_booking_archive_form_additional_services" value="">

    </div>
    <!--additional service-->
  </form>
<?php
  $output = ob_get_clean();
  return $output;
}
add_shortcode('form-picker-alo', 'p23_form_picker_alo');
