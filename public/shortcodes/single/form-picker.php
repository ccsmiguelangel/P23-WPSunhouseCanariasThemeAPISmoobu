<?php


function p23_form_picker_single()
{

  $post_id = get_the_ID();
  $meta_description = get_post_meta($post_id, '_alojamiento_woo_id', true);
  // $product_url = apply_filters( 'woocommerce_product_permalink', get_permalink( $meta_description ) );
  $product_url = wc_get_checkout_url(). '?add-to-cart=' . $meta_description;
  ob_start();
?>

<!--max night range-->

<form id="nd_booking_single_cpt_1_calendar" action="<?php echo $product_url; ?>">
  <div
    id="nd_booking_search_main_bg"
    class="nd_booking_section nd_booking_bg_greydark nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_box_sizing_border_box"
  >
    <!--check in/out-->
    <div
      id="nd_booking_search_cpt_1_form_checkin"
      class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_bottom_0 nd_booking_box_sizing_border_box"
    >
      <div
        id="nd_booking_open_calendar_from"
        class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center nd_booking_cursor_pointer"
      >
        <div
          class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center"
        >
          <h6
            class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12"
          >
            ENTRADA
          </h6>
          <div class="nd_booking_section nd_booking_height_15"></div>
          <div class="nd_booking_display_inline_flex">
            <div class="nd_booking_float_left nd_booking_text_align_right">
              <h1
                id="nd_booking_date_number_from_front"
                class="nd_booking_font_size_50 nd_booking_color_yellow_important"
              >-</h1>
            </div>
            <div
              class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10"
            >
              <h6
                id="nd_booking_date_month_from_front"
                class="nd_booking_color_yellow_important nd_booking_margin_top_7 nd_booking_font_size_12"
              >
              </h6>
              <div class="nd_booking_section nd_booking_height_5"></div>
              <img
                alt=""
                width="12"
                src="<?php echo get_stylesheet_directory_uri().'/public/icons/icon-down-arrow-white.svg';?>"
              />
            </div>
          </div>
        </div>
      </div>

      <input
        type="hidden"
        id="nd_booking_date_month_from"
        class="nd_booking_section nd_booking_margin_top_20"
        value="Oct"
      />
      <input
        type="hidden"
        id="nd_booking_date_number_from"
        class="nd_booking_section nd_booking_margin_top_20"
      />
      <input
        placeholder="Check In"
        class="nd_booking_section nd_booking_margin_top_30 nd_booking_margin_0_responsive nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important"
        type="text"
        name="nd_booking_archive_form_date_range_from"
        id="nd_booking_archive_form_date_range_from"
        value=""
      />
    </div>
    <div
      id="nd_booking_search_cpt_1_form_checkout"
      class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_bottom_0 nd_booking_box_sizing_border_box"
    >
      <div
        id="nd_booking_open_calendar_to"
        class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center nd_booking_cursor_pointer"
      >
        <div
          class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center"
        >
          <h6
            class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12"
          >
            SALIDA
          </h6>
          <div class="nd_booking_section nd_booking_height_15"></div>
          <div class="nd_booking_display_inline_flex">
            <div class="nd_booking_float_left nd_booking_text_align_right">
              <h1
                id="nd_booking_date_number_to_front"
                class="nd_booking_font_size_50 nd_booking_color_yellow_important"
              >-</h1>
            </div>
            <div
              class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10"
            >
              <h6
                id="nd_booking_date_month_to_front"
                class="nd_booking_color_yellow_important nd_booking_margin_top_7 nd_booking_font_size_12"
              >
              </h6>
              <div class="nd_booking_section nd_booking_height_5"></div>
              <img
                alt=""
                width="12"
                src="<?php echo get_stylesheet_directory_uri().'/public/icons/icon-down-arrow-white.svg';?>"
              />
            </div>
          </div>
        </div>
      </div>

      <input
        type="hidden"
        id="nd_booking_date_month_to"
        class="nd_booking_section nd_booking_margin_top_20"
        value="Oct"
      />
      <input
        type="hidden"
        id="nd_booking_date_number_to"
        class="nd_booking_section nd_booking_margin_top_20"
      />
      <input
        placeholder="Check Out"
        class="nd_booking_section nd_booking_margin_top_30 nd_booking_margin_0_responsive nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important"
        type="text"
        name="nd_booking_archive_form_date_range_to"
        id="nd_booking_archive_form_date_range_to"
        value=""
      />
    </div>

    <!--check in/out-->

    <!--guests-->
    <div
      id="nd_booking_search_cpt_1_form_guests"
      class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_top_0 nd_booking_box_sizing_border_box"
    >
      <div
        id="nd_booking_search_guests_bg"
        class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center"
      >
        <div
          class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center"
        >
          <h6
            class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12"
          >
            HUÉSPEDES
          </h6>
          <div class="nd_booking_section nd_booking_height_15"></div>
          <div class="nd_booking_display_inline_flex">
            <div class="nd_booking_float_left nd_booking_text_align_right">
              <h1
                class="nd_booking_font_size_50 nd_booking_color_yellow_important nd_booking_guests_number"
              >
                1
              </h1>
            </div>
            <div
              class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10"
            >
              <div class="nd_booking_section nd_booking_height_7"></div>
              <div class="nd_booking_section">
                <img
                  class="nd_booking_float_right nd_booking_guests_increase nd_booking_cursor_pointer"
                  style="transform: rotate(180deg)"
                  alt=""
                  width="12"
                  src="<?php echo get_stylesheet_directory_uri().'/public/icons/icon-down-arrow-white.svg';?>"
                />
              </div>
              <div class="nd_booking_section nd_booking_height_10"></div>
              <div class="nd_booking_section">
                <img
                  class="nd_booking_float_right nd_booking_guests_decrease nd_booking_cursor_pointer"
                  alt=""
                  width="12"
                  src="<?php echo get_stylesheet_directory_uri().'/public/icons/icon-down-arrow-white.svg';?>"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <label
        class="nd_booking_display_none"
        for="nd_booking_archive_form_guests"
        >Huéspedes :</label
      >
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
      <input
        placeholder="Guests"
        class="nd_booking_section nd_booking_display_none"
        type="number"
        name="nd_booking_archive_form_guests"
        id="nd_booking_archive_form_guests"
        min="1"
        value="1"
      />
    </div>
    
    <!--guests-->

    <!--night info-->
    <div
      id="nd_booking_search_cpt_1_form_nights"
      class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_top_0 nd_booking_box_sizing_border_box"
    >
      <div
        id="nd_booking_search_nights_bg"
        class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center"
      >
        <div
          class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center"
        >
          <h6
            class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12"
          >
            NOCHES
          </h6>
          <div class="nd_booking_section nd_booking_height_15"></div>
          <div class="nd_booking_display_inline_flex">
            <div class="nd_booking_float_left nd_booking_text_align_right">
              <h1
                class="nd_booking_font_size_50 nd_booking_color_yellow_important nd_booking_nights_number"
              >
                1
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--night info-->
    <div id="nd_booking_single_cpt_1_calendar_btn" class="nd_booking_width_100_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_all_iphone nd_booking_padding_top_0 nd_booking_box_sizing_border_box">
      <div class="nd_booking_section nd_booking_height_15 nd_booking_display_none_all_iphone"></div>
      <input id="nd_booking_submit" style="display: none;" class="nd_options_color_white nd_booking_width_100_percentage nd_booking_padding_15_30_important nd_options_second_font_important nd_booking_border_radius_0_important nd_booking_bg_yellow nd_booking_cursor_pointer nd_booking_display_inline_block nd_booking_font_size_11 nd_booking_font_weight_bold nd_booking_letter_spacing_2" type="submit" value="RESERVAR">
    </div>
  </div>
  <div id="p23_message"></div>
  <div id="p23_loader" style="width:100%; display: none; justify-content: center;">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>  
  </div>
</form>
<?php
  $output = ob_get_clean();
  return $output;
}
add_shortcode('form-picker-single', 'p23_form_picker_single');