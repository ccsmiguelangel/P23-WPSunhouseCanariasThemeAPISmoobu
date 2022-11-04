<?php


function p23_form_picker()
{
  ob_start();
?>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>

  <style>
    /* -----------------START STRUCTURE ----------------- */
    .nd_booking_section {
      float: left;
      width: 100%;
    }

    .nd_booking_container {
      width: 1200px;
      margin: auto;
      padding: 0px;
    }

    .nd_booking_clearfix:after {
      content: "";
      display: block;
      height: 0;
      clear: both;
      visibility: hidden;
    }


    /* -----------------START CLASS ----------------- */

    .nd_booking_width_100_percentage {
      width: 100%;
    }

    .nd_booking_width_75_percentage {
      width: 75%;
    }

    .nd_booking_width_70_percentage {
      width: 70%;
    }

    .nd_booking_width_66_percentage {
      width: 66.66%;
    }

    .nd_booking_width_65_percentage {
      width: 65%;
    }

    .nd_booking_width_60_percentage {
      width: 60%;
    }

    .nd_booking_width_50_percentage {
      width: 50%;
    }

    .nd_booking_width_45_percentage {
      width: 45%;
    }

    .nd_booking_width_40_percentage {
      width: 40%;
    }

    .nd_booking_width_35_percentage {
      width: 35%;
    }

    .nd_booking_width_33_percentage {
      width: 33.33%;
    }

    .nd_booking_width_30_percentage {
      width: 30%;
    }

    .nd_booking_width_25_percentage {
      width: 25%;
    }

    .nd_booking_width_20_percentage {
      width: 20%;
    }

    .nd_booking_width_15_percentage {
      width: 15%;
    }

    .nd_booking_width_10_percentage {
      width: 10%;
    }

    .nd_booking_width_650 {
      width: 650px;
    }

    .nd_booking_width_160 {
      width: 160px;
    }

    .nd_booking_width_60 {
      width: 60px;
    }

    .nd_booking_width_50 {
      width: 50px;
    }

    .nd_booking_width_40 {
      width: 40px;
    }

    .nd_booking_width_30 {
      width: 30px;
    }

    .nd_booking_width_25 {
      width: 25px;
    }

    .nd_booking_width_20 {
      width: 20px;
    }

    .nd_booking_width_18 {
      width: 18px;
    }

    .nd_booking_width_initial {
      width: initial;
    }


    .nd_booking_height_250 {
      height: 250px;
    }

    .nd_booking_height_200 {
      height: 200px;
    }

    .nd_booking_height_130 {
      height: 130px;
    }

    .nd_booking_height_110 {
      height: 110px;
    }

    .nd_booking_height_100 {
      height: 100px;
    }

    .nd_booking_height_80 {
      height: 80px;
    }

    .nd_booking_height_60 {
      height: 60px;
    }

    .nd_booking_height_50 {
      height: 50px;
    }

    .nd_booking_height_45 {
      height: 45px;
    }

    .nd_booking_height_40 {
      height: 40px;
    }

    .nd_booking_height_30 {
      height: 30px;
    }

    .nd_booking_height_25 {
      height: 25px;
    }

    .nd_booking_height_20 {
      height: 20px;
    }

    .nd_booking_height_15 {
      height: 15px;
    }

    .nd_booking_height_18 {
      height: 18px;
    }

    .nd_booking_height_10 {
      height: 10px;
    }

    .nd_booking_height_7 {
      height: 7px;
    }

    .nd_booking_height_5 {
      height: 5px;
    }

    .nd_booking_height_3 {
      height: 3px;
    }

    .nd_booking_height_1 {
      height: 1px;
    }

    .nd_booking_height_2 {
      height: 2px;
    }

    .nd_booking_height_0 {
      height: 0px;
    }

    .nd_booking_height_0_important {
      height: 0px !important;
    }

    .nd_booking_height_100_percentage {
      height: 100%;
    }

    .nd_booking_min_height_100 {
      min-height: 100px;
    }

    .nd_booking_float_left {
      float: left;
    }

    .nd_booking_float_right {
      float: right;
    }

    .nd_booking_float_none {
      float: none;
    }

    .nd_booking_padding_0 {
      padding: 0px;
    }

    .nd_booking_padding_0_important {
      padding: 0px !important;
    }

    .nd_booking_padding_5 {
      padding: 5px;
    }

    .nd_booking_padding_7 {
      padding: 7px;
    }

    .nd_booking_padding_8 {
      padding: 8px;
    }

    .nd_booking_padding_10 {
      padding: 10px;
    }

    .nd_booking_padding_15 {
      padding: 15px;
    }

    .nd_booking_padding_20 {
      padding: 20px;
    }

    .nd_booking_padding_30 {
      padding: 30px;
    }

    .nd_booking_padding_40 {
      padding: 40px;
    }

    .nd_booking_padding_50 {
      padding: 50px;
    }

    .nd_booking_padding_10_0 {
      padding: 10px 0px;
    }

    .nd_booking_padding_10_20 {
      padding: 10px 20px;
    }

    .nd_booking_padding_10_15 {
      padding: 10px 15px;
    }

    .nd_booking_padding_10_20_important {
      padding: 10px 20px !important;
    }

    .nd_booking_padding_10_25 {
      padding: 10px 25px;
    }

    .nd_booking_padding_20_10 {
      padding: 20px 10px;
    }

    .nd_booking_padding_20_15 {
      padding: 20px 15px;
    }

    .nd_booking_padding_20_25 {
      padding: 20px 25px;
    }

    .nd_booking_padding_20_30 {
      padding: 20px 30px;
    }

    .nd_booking_padding_20_0 {
      padding: 20px 0px;
    }

    .nd_booking_padding_15_0 {
      padding: 15px 0px;
    }

    .nd_booking_padding_18_0 {
      padding: 18px 0px;
    }

    .nd_booking_padding_15_20 {
      padding: 15px 20px;
    }

    .nd_booking_padding_15_25 {
      padding: 15px 25px;
    }

    .nd_booking_padding_15_30 {
      padding: 15px 30px;
    }

    .nd_booking_padding_15_35 {
      padding: 15px 35px;
    }

    .nd_booking_padding_15_35_important {
      padding: 15px 35px !important;
    }

    .nd_booking_padding_15_30_important {
      padding: 15px 30px !important;
    }

    .nd_booking_padding_15_25_important {
      padding: 15px 25px !important;
    }

    .nd_booking_padding_5_0 {
      padding: 5px 0px;
    }

    .nd_booking_padding_40_20 {
      padding: 40px 20px;
    }

    .nd_booking_padding_40_0 {
      padding: 40px 0px;
    }

    .nd_booking_padding_5_10 {
      padding: 5px 10px;
    }

    .nd_booking_padding_3_5 {
      padding: 3px 5px;
    }

    .nd_booking_padding_5_20 {
      padding: 5px 20px;
    }

    .nd_booking_padding_0_5 {
      padding: 0px 5px;
    }

    .nd_booking_padding_0_10 {
      padding: 0px 10px;
    }

    .nd_booking_padding_0_15 {
      padding: 0px 15px;
    }

    .nd_booking_padding_0_20 {
      padding: 0px 20px;
    }

    .nd_booking_padding_0_30 {
      padding: 0px 30px;
    }

    .nd_booking_padding_0_50 {
      padding: 0px 50px;
    }

    .nd_booking_padding_bottom_0 {
      padding-bottom: 0px;
    }

    .nd_booking_padding_bottom_5 {
      padding-bottom: 5px;
    }

    .nd_booking_padding_bottom_15 {
      padding-bottom: 15px;
    }

    .nd_booking_padding_bottom_20 {
      padding-bottom: 20px;
    }

    .nd_booking_padding_left_20 {
      padding-left: 20px;
    }

    .nd_booking_padding_left_10 {
      padding-left: 10px;
    }

    .nd_booking_padding_left_15 {
      padding-left: 15px;
    }

    .nd_booking_padding_left_40 {
      padding-left: 40px;
    }

    .nd_booking_padding_left_50 {
      padding-left: 50px;
    }

    .nd_booking_padding_left_120 {
      padding-left: 120px;
    }

    .nd_booking_padding_right_15 {
      padding-right: 15px;
    }

    .nd_booking_padding_right_10 {
      padding-right: 10px;
    }

    .nd_booking_padding_right_20 {
      padding-right: 20px;
    }

    .nd_booking_padding_top_5 {
      padding-top: 5px;
    }

    .nd_booking_padding_top_12 {
      padding-top: 12px;
    }

    .nd_booking_padding_top_0 {
      padding-top: 0px;
    }


    .nd_booking_margin_auto {
      margin: auto;
    }

    .nd_booking_margin_0 {
      margin: 0px;
    }

    .nd_booking_margin_0_important {
      margin: 0px !important;
    }

    .nd_booking_margin_0_10 {
      margin: 0px 10px;
    }

    .nd_booking_margin_0_20 {
      margin: 0px 20px;
    }

    .nd_booking_margin_5 {
      margin: 5px;
    }

    .nd_booking_margin_top_1 {
      margin-top: 1px;
    }

    .nd_booking_margin_top_5 {
      margin-top: 5px;
    }

    .nd_booking_margin_top_7 {
      margin-top: 7px;
    }

    .nd_booking_margin_top_8 {
      margin-top: 8px;
    }

    .nd_booking_margin_top_10 {
      margin-top: 10px;
    }

    .nd_booking_margin_top_10_negative {
      margin-top: -10px;
    }

    .nd_booking_margin_top_20 {
      margin-top: 20px;
    }

    .nd_booking_margin_top_30 {
      margin-top: 30px;
    }

    .nd_booking_margin_bottom_20 {
      margin-bottom: 20px;
    }

    .nd_booking_margin_bottom_40 {
      margin-bottom: 40px;
    }

    .nd_booking_margin_right_40 {
      margin-right: 40px;
    }

    .nd_booking_margin_right_30 {
      margin-right: 30px;
    }

    .nd_booking_margin_right_10 {
      margin-right: 10px;
    }

    .nd_booking_margin_right_15 {
      margin-right: 15px;
    }

    .nd_booking_margin_right_5 {
      margin-right: 5px;
    }

    .nd_booking_margin_right_20 {
      margin-right: 20px;
    }

    .nd_booking_margin_left_20 {
      margin-left: 20px;
    }

    .nd_booking_margin_left_10 {
      margin-left: 10px;
    }

    .nd_booking_margin_left_5 {
      margin-left: 5px;
    }

    .nd_booking_margin_left_40 {
      margin-left: 40px;
    }

    .nd_booking_color_white {
      color: #fff;
    }

    .nd_booking_color_white_important {
      color: #fff !important;
    }

    .nd_booking_font_size_70 {
      font-size: 70px;
      line-height: 70px;
    }

    .nd_booking_font_size_60 {
      font-size: 60px;
      line-height: 60px;
    }

    .nd_booking_font_size_55 {
      font-size: 55px;
      line-height: 55px;
    }

    .nd_booking_font_size_50 {
      font-size: 50px;
      line-height: 50px;
    }

    .nd_booking_font_size_40 {
      font-size: 40px;
      line-height: 45px;
    }

    .nd_booking_font_size_35 {
      font-size: 35px;
      line-height: 35px;
    }

    .nd_booking_font_size_20 {
      font-size: 20px;
      line-height: 20px;
    }

    .nd_booking_font_size_16 {
      font-size: 16px;
      line-height: 16px;
    }

    .nd_booking_font_size_15 {
      font-size: 15px;
      line-height: 15px;
    }

    .nd_booking_font_size_14 {
      font-size: 14px;
      line-height: 14px;
    }

    .nd_booking_font_size_13 {
      font-size: 13px;
      line-height: 13px;
    }

    .nd_booking_font_size_12 {
      font-size: 12px;
      line-height: 12px;
    }

    .nd_booking_font_size_11 {
      font-size: 11px;
      line-height: 11px;
    }

    .nd_booking_font_size_10 {
      font-size: 10px;
      line-height: 10px;
    }

    .nd_booking_letter_spacing_2 {
      letter-spacing: 2px;
    }

    .nd_booking_font_weight_bold {
      font-weight: bold;
    }

    .nd_booking_font_weight_bolder {
      font-weight: bolder;
    }

    .nd_booking_font_weight_lighter {
      font-weight: lighter;
    }

    .nd_booking_white_space_normal {
      white-space: normal;
    }

    .nd_booking_line_height_18 {
      line-height: 18px;
    }

    .nd_booking_line_height_16 {
      line-height: 16px;
    }

    .nd_booking_line_height_20 {
      line-height: 20px;
    }

    .nd_booking_line_height_50 {
      line-height: 50px;
    }

    .nd_booking_line_height_40 {
      line-height: 40px;
    }

    .nd_booking_line_height_30 {
      line-height: 30px;
    }

    .nd_booking_line_height_25 {
      line-height: 25px;
    }

    .nd_booking_line_height_9 {
      line-height: 9px;
    }

    .nd_booking_line_height_0 {
      line-height: 0px;
    }

    .nd_booking_background_size_cover {
      background-size: cover;
    }

    .nd_booking_background_size_25 {
      background-size: 25px;
    }

    .nd_booking_background_size_18 {
      background-size: 18px;
    }

    .nd_booking_background_position_center_bottom {
      background-position: center bottom;
    }

    .nd_booking_background_position_center_top {
      background-position: center top;
    }

    .nd_booking_background_position_center {
      background-position: center;
    }

    .nd_booking_background_repeat_no_repeat {
      background-repeat: no-repeat;
    }

    .nd_booking_background_transparent_important {
      background: transparent !important;
    }

    .nd_booking_bg_black {
      background-color: #000;
    }

    .nd_booking_bg_black_important {
      background-color: #000 !important;
    }

    .nd_booking_bg_white {
      background-color: #fff;
    }

    .nd_booking_bg_white_alpha_85 {
      background-color: rgba(255, 255, 255, 0.85);
    }

    .nd_booking_bg_white_alpha_10 {
      background-color: rgba(255, 255, 255, 0.10);
    }

    .nd_booking_bg_grey_3 {
      background-color: #e4e4e4;
    }

    .nd_booking_bg_yellow {
      background-color: #FFDA44;
    }

    .nd_booking_bg_greydark {
      background-color: #1c1c1c;
    }

    .nd_booking_bg_greydark_2 {
      background-color: #151515;
    }

    .nd_booking_bg_greydark_2_important {
      background-color: #151515 !important;
    }

    .nd_booking_background_color_transparent {
      background-color: transparent;
    }

    .nd_booking_background_color_transparent_important {
      background-color: transparent !important;
    }

    .nd_booking_bg_greydark_alpha_2 {
      background-color: rgba(101, 100, 96, 0.2);
    }

    .nd_booking_bg_greydark_alpha_3 {
      background-color: rgba(101, 100, 96, 0.3);
    }

    .nd_booking_bg_greydark_alpha_4 {
      background-color: rgba(101, 100, 96, 0.4);
    }

    .nd_booking_bg_greydark_alpha_5 {
      background-color: rgba(101, 100, 96, 0.5);
    }

    .nd_booking_bg_greydark_alpha_6 {
      background-color: rgba(101, 100, 96, 0.6);
    }

    .nd_booking_bg_greydark_alpha_8 {
      background-color: rgba(101, 100, 96, 0.8);
    }

    .nd_booking_bg_greydark_alpha_9 {
      background-color: rgba(101, 100, 96, 0.9);
    }

    .nd_booking_bg_greydark_alpha_gradient {
      background: -moz-linear-gradient(top, rgba(101, 100, 96, 0) 0%, rgba(101, 100, 96, 0.1) 60%, rgba(101, 100, 96, 0.65) 100%);
      background: -webkit-linear-gradient(top, rgba(101, 100, 96, 0) 0%, rgba(101, 100, 96, 0.1) 60%, rgba(101, 100, 96, 0.65) 100%);
      background: linear-gradient(to bottom, rgba(101, 100, 96, 0) 0%, rgba(101, 100, 96, 0.1) 60%, rgba(101, 100, 96, 0.65) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00656460', endColorstr='#a6656460', GradientType=0);
    }

    .nd_booking_bg_greydark_alpha_gradient_2 {
      background: -moz-linear-gradient(top, rgba(101, 100, 96, 0.8) 0%, rgba(101, 100, 96, 0) 35%, rgba(101, 100, 96, 0) 45%, rgba(101, 100, 96, 0.8) 100%);
      background: -webkit-linear-gradient(top, rgba(101, 100, 96, 0.8) 0%, rgba(101, 100, 96, 0) 35%, rgba(101, 100, 96, 0) 45%, rgba(101, 100, 96, 0.8) 100%);
      background: linear-gradient(to bottom, rgba(101, 100, 96, 0.8) 0%, rgba(101, 100, 96, 0) 35%, rgba(101, 100, 96, 0) 45%, rgba(101, 100, 96, 0.8) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#99656460', endColorstr='#99656460', GradientType=0);
    }

    .nd_booking_bg_greydark_alpha_gradient_3 {
      background: -moz-linear-gradient(to bottom, rgba(28, 28, 28, 0) 60%, rgba(28, 28, 28, 0.5) 100%);
      background: -webkit-linear-gradient(to bottom, rgba(28, 28, 28, 0) 60%, rgba(28, 28, 28, 0.5) 100%);
      background: linear-gradient(to bottom, rgba(28, 28, 28, 0) 60%, rgba(28, 28, 28, 0.5) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00656460', endColorstr='#a6656460', GradientType=0);
    }

    .nd_booking_bg_greydark_alpha_gradient_3_2 {
      background: -moz-linear-gradient(top, rgba(101, 100, 96, 0) 0%, rgba(101, 100, 96, 1) 100%);
      background: -webkit-linear-gradient(top, rgba(101, 100, 96, 0) 0%, rgba(101, 100, 96, 1) 100%);
      background: linear-gradient(to bottom, rgba(101, 100, 96, 0) 0%, rgba(101, 100, 96, 1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00656460', endColorstr='#a6656460', GradientType=0);
    }

    .nd_booking_bg_greydark_alpha_gradient_4 {
      background: -moz-linear-gradient(top, rgba(101, 100, 96, 0.65) 0%, rgba(101, 100, 96, 0.1) 60%, rgba(101, 100, 96, 0) 100%);
      background: -webkit-linear-gradient(top, rgba(101, 100, 96, 0.65) 0%, rgba(101, 100, 96, 0.1) 60%, rgba(101, 100, 96, 0) 100%);
      background: linear-gradient(to bottom, rgba(101, 100, 96, 0.65) 0%, rgba(101, 100, 96, 0.1) 60%, rgba(101, 100, 96, 0) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00656460', endColorstr='#a6656460', GradientType=0);
    }

    .nd_booking_bg_greydark_alpha_gradient_5 {
      background: -moz-linear-gradient(top, rgba(101, 100, 96, 0) 0%, rgba(101, 100, 96, 0.2) 60%, rgba(28, 28, 28, 1) 100%);
      background: -webkit-linear-gradient(top, rgba(101, 100, 96, 0) 0%, rgba(101, 100, 96, 0.2) 60%, rgba(28, 28, 28, 1) 100%);
      background: linear-gradient(to bottom, rgba(101, 100, 96, 0) 0%, rgba(101, 100, 96, 0.2) 60%, rgba(28, 28, 28, 1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00656460', endColorstr='#a6656460', GradientType=0);
    }

    .nd_booking_bg_greydark_alpha_gradient_6 {
      background: -moz-linear-gradient(to bottom, rgba(28, 28, 28, 0) 0%, rgba(28, 28, 28, 1) 100%);
      background: -webkit-linear-gradient(to bottom, rgba(28, 28, 28, 0) 0%, rgba(28, 28, 28, 1) 100%);
      background: linear-gradient(to bottom, rgba(28, 28, 28, 0) 0%, rgba(28, 28, 28, 1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00656460', endColorstr='#a6656460', GradientType=0);
    }

    .nd_booking_text_decoration_none {
      text-decoration: none;
    }

    .nd_booking_text_decoration_underline {
      text-decoration: underline;
    }

    .nd_booking_word_wrap_break_word {
      -ms-word-wrap: break-word;
      word-wrap: break-word;
    }

    .nd_booking_text_align_center {
      text-align: center;
    }

    .nd_booking_text_align_right {
      text-align: right;
    }

    .nd_booking_text_align_left {
      text-align: left;
    }

    .nd_booking_border_radius_top_3 {
      border-radius: 3px 3px 0px 0px;
    }

    .nd_booking_border_radius_3 {
      border-radius: 3px;
    }

    .nd_booking_border_radius_30 {
      border-radius: 30px;
    }

    .nd_booking_border_radius_3_important {
      border-radius: 3px !important;
    }

    .nd_booking_border_radius_100_percentage {
      border-radius: 100%;
    }

    .nd_booking_border_radius_0 {
      border-radius: 0px;
    }

    .nd_booking_border_radius_0_important {
      border-radius: 0px !important;
    }

    .nd_booking_border_width_0 {
      border-width: 0px;
    }

    .nd_booking_border_width_0_important {
      border-width: 0px !important;
    }

    .nd_booking_border_1_solid_white {
      border: 1px solid #fff;
    }

    .nd_booking_border_2_solid_white_important {
      border: 2px solid #fff !important;
    }

    .nd_booking_border_right_2_solid_grey {
      border-right: 2px solid #f9f9f9;
    }

    .nd_booking_display_none {
      display: none;
    }

    .nd_booking_display_none_important {
      display: none !important;
    }

    .nd_booking_display_inline_block {
      display: inline-block;
    }

    .nd_booking_display_inline_flex {
      display: inline-flex;
    }

    .nd_booking_display_table {
      display: table;
    }

    .nd_booking_display_table_cell {
      display: table-cell;
    }

    .nd_booking_vertical_align_middle {
      vertical-align: middle;
    }

    .nd_booking_vertical_align_bottom {
      vertical-align: bottom;
    }

    .nd_booking_vertical_align_top {
      vertical-align: top;
    }

    .nd_booking_position_fixed {
      position: fixed;
    }

    .nd_booking_position_relative {
      position: relative;
    }

    .nd_booking_position_absolute {
      position: absolute;
    }

    .nd_booking_left_0 {
      left: 0px;
    }

    .nd_booking_left_20 {
      left: 20px;
    }

    .nd_booking_left_35 {
      left: 35px;
    }

    .nd_booking_left_40 {
      left: 40px;
    }

    .nd_booking_left_305_negative {
      left: -305px;
    }

    .nd_booking_top_0 {
      top: 0px;
    }

    .nd_booking_top_2 {
      top: 2px;
    }

    .nd_booking_top_10 {
      top: 10px;
    }

    .nd_booking_top_20 {
      top: 20px;
    }

    .nd_booking_top_25 {
      top: 25px;
    }

    .nd_booking_top_16 {
      top: 16px;
    }

    .nd_booking_top_35 {
      top: 35px;
    }

    .nd_booking_top_50 {
      top: 50px;
    }

    .nd_booking_bottom_20 {
      bottom: 20px;
    }

    .nd_booking_bottom_30 {
      bottom: 30px;
    }

    .nd_booking_bottom_40 {
      bottom: 40px;
    }

    .nd_booking_bottom_50 {
      bottom: 50px;
    }

    .nd_booking_bottom_60 {
      bottom: 60px;
    }

    .nd_booking_bottom_70 {
      bottom: 70px;
    }

    .nd_booking_bottom_0 {
      bottom: 0px;
    }

    .nd_booking_right_30 {
      right: 30px;
    }

    .nd_booking_right_20 {
      right: 20px;
    }

    .nd_booking_right_15 {
      right: 15px;
    }

    .nd_booking_right_10 {
      right: 10px;
    }

    .nd_booking_right_53 {
      right: 53px;
    }

    .nd_booking_right_15_important {
      right: 15px !important;
    }

    .nd_booking_right_0 {
      right: 0px;
    }

    .nd_booking_bottom_35_negative {
      bottom: -35px;
    }

    .nd_booking_z_index_9 {
      z-index: 9;
    }

    .nd_booking_z_index_99 {
      z-index: 99;
    }

    .nd_booking_z_index_999 {
      z-index: 999;
    }

    .nd_booking_box_sizing_border_box {
      box-sizing: border-box;
    }

    .nd_booking_text_transform_uppercase {
      text-transform: uppercase;
    }

    .nd_booking_text_transform_capitalize {
      text-transform: capitalize;
    }

    .nd_booking_list_style_none {
      list-style: none;
    }

    .nd_booking_outline_0 {
      outline: 0;
    }

    /* #e34f1e */
    .nd_booking_overflow_hidden {
      overflow: hidden;
    }

    .nd_booking_overflow_visible {
      overflow: visible;
    }

    .nd_booking_overflow_visible_important {
      overflow: visible !important;
    }

    .nd_booking_overflow_x_auto {
      overflow-x: auto;
    }

    .nd_booking_cursor_pointer {
      cursor: pointer;
    }

    .nd_booking_cursor_text {
      cursor: text;
    }

    .nd_booking_cursor_progress {
      cursor: progress;
    }

    .nd_booking_cursor_no_drop {
      cursor: no-drop;
    }

    .nd_booking_cursor_not_allowed {
      cursor: not-allowed;
    }

    .nd_booking_opacity_0 {
      opacity: 0;
    }

    .nd_booking_opacity_06 {
      opacity: 0.6;
    }

    .nd_booking_opacity_04 {
      opacity: 0.4;
    }

    .nd_booking_opacity_03 {
      opacity: 0.3;
    }

    .nd_booking_opacity_02 {
      opacity: 0.2;
    }

    .nd_booking_opacity_5 {
      opacity: 5;
    }




    /* -----------------START CLASS color ----------------- */

    .nd_booking_border_3_solid_white {
      border: 3px solid #fff;
    }

    .nd_booking_border_1_solid_grey {
      border: 1px solid #f1f1f1;
    }

    .nd_booking_border_right_1_solid_grey {
      border-right: 1px solid #f1f1f1;
    }

    .nd_booking_bg_grey {
      background-color: #f9f9f9;
    }

    .nd_booking_border_top_1_solid_grey {
      border-top: 1px solid #f1f1f1;
    }

    .nd_booking_border_top_2_solid_grey {
      border-top: 2px solid #f9f9f9;
    }

    .nd_booking_border_bottom_1_solid_grey {
      border-bottom: 1px solid #f1f1f1;
    }

    .nd_booking_border_bottom_1_solid_greydark {
      border-bottom: 1px solid #575757;
    }

    .nd_booking_single_cause_tags_container p a {
      border: 1px solid #f1f1f1;
      padding: 5px;
      margin: 5px 10px;
      border-radius: 3px;
      font-size: 13px;
    }

    .nd_booking_border_bottom_2_solid_grey {
      border-bottom: 2px solid #f1f1f1;
    }

    .nd_booking_border_bottom_2_solid_white {
      border-bottom: 2px solid #ffffff;
    }

    .nd_booking_color_grey {
      color: #a3a3a3;
    }

    .nd_booking_color_yellow {
      color: #c19b76;
    }

    .nd_booking_color_yellow_important {
      color: #c19b76 !important;
    }

    /* -----------------START SHORTCODES ----------------- */
    /*login shortcodes*/
    #nd_booking_shortcode_account_login_form label {
      float: left;
      width: 100%;
      margin-top: 20px;
    }

    #nd_booking_shortcode_account_login_form input[type="text"],
    #nd_booking_shortcode_account_login_form input[type="password"],
    #nd_booking_shortcode_account_login_form input[type="submit"] {
      float: left;
      width: 100%;
    }

    #nd_booking_shortcode_account_login_form input[type="submit"] {
      margin-top: 20px;
    }

    /*single cause form*/
    .nd_booking_single_cause_form_validation_errors {
      color: #fff;
      font-size: 10px;
      line-height: 10px;
      padding: 5px 5px;
      position: absolute;
      right: 0;
      bottom: 0;
    }

    .nd_booking_single_cause_form_donation_value.nd_booking_fixed_value_donation_selected {
      color: #fff !important;
    }


    /* -----------------JQUERY UI----------------- */
    .ui-helper-hidden-accessible {
      display: none;
    }

    /*tooltip*/
    .ui-tooltip.nd_booking_tooltip_jquery_content {
      z-index: 99;
      border-radius: 0px;
      padding: 8px;
      position: absolute;
      color: #fff;
      margin: 0px;
      font-size: 11px;
      line-height: 11px;
      outline: 0;
      -webkit-appearance: none;
      border: 0;
      letter-spacing: 2px;
      font-weight: lighter;
      text-transform: uppercase;
    }


    /* ----------------- THEME COMPATIBILITY----------------- */
    #nd_booking_single_cause_form_donation_paypal_submit:hover {
      background-repeat: no-repeat;
      background-size: 57px;
      background-position: right 20px top -10px;
    }

    /*Twenty Seventeen*/
    body.single-causes .single-featured-image-header {
      display: none;
    }


    /*  RESPONSIVE ------------------------------------------------------- */

    /* ipad land*/
    @media only screen and (min-width: 960px) and (max-width: 1199px) {
      .nd_booking_container {
        width: 960px;
      }
    }

    /* ipad port*/
    @media only screen and (min-width: 768px) and (max-width: 959px) {
      .nd_booking_container {
        width: 748px;
      }
    }

    /* iphone land*/
    @media only screen and (min-width: 480px) and (max-width: 767px) {
      body {
        -webkit-text-size-adjust: none;
      }

      .nd_booking_container {
        width: 460px;
      }
    }

    /* iphone port*/
    @media only screen and (min-width: 320px) and (max-width: 479px) {
      body {
        -webkit-text-size-adjust: none;
      }

      .nd_booking_container {
        width: 300px;
      }

      .nd_booking_margin_top_20_iphone_port {
        margin-top: 20px;
      }

      .nd_booking_display_none_iphone_port {
        display: none;
      }

      .nd_booking_display_block_iphone_port {
        display: block;
      }

      .nd_booking_display_margin_top_10_iphone_port {
        margin-top: 10px;
      }


      /*custom*/
      #nd_booking_single_cause_tab_list li {
        width: 100%;
        margin: 0px;
      }
    }

    /* all responsive*/
    @media only screen and (min-width: 320px) and (max-width: 1199px) {

      .nd_booking_display_none_responsive {
        display: none;
      }

      .nd_booking_display_block_responsive {
        display: block;
      }

      .nd_booking_cursor_move_responsive {
        cursor: move;
      }

      .nd_booking_width_100_percentage_responsive {
        width: 100%;
      }

      .nd_booking_width_20_responsive {
        width: 20px;
      }

      .nd_booking_width_300_responsive {
        width: 300px;
      }

      .nd_booking_text_align_left_responsive {
        text-align: left;
      }

      .nd_booking_text_align_center_responsive {
        text-align: center;
      }

      .nd_booking_float_left_responsive {
        float: left;
      }

      .nd_booking_margin_bottom_20_responsive {
        margin-bottom: 20px;
      }

      .nd_booking_margin_top_40_responsive {
        margin-top: 40px;
      }

      .nd_booking_margin_top_50_responsive {
        margin-top: 50px;
      }

      .nd_booking_margin_0_10_responsive {
        margin: 0px 10px;
      }

      .nd_booking_margin_0_responsive {
        margin: 0px;
      }

      .nd_booking_left_130_negative_responsive {
        left: -130px;
      }

      .nd_booking_padding_top_0_responsive {
        padding-top: 0px;
      }

      .nd_booking_padding_bottom_0_responsive {
        padding-bottom: 0px;
      }

      .nd_booking_padding_bottom_20_responsive {
        padding-bottom: 20px;
      }

      .nd_booking_padding_bottom_20_important_responsive {
        padding-bottom: 20px !important;
      }

      .nd_booking_padding_20_responsive {
        padding: 20px;
      }

      .nd_booking_padding_0_responsive {
        padding: 0px;
      }

      .nd_booking_font_size_30_responsive {
        font-size: 30px;
      }

      .nd_booking_font_size_17_responsive {
        font-size: 17px;
      }

      .nd_booking_font_size_13_responsive {
        font-size: 13px;
      }

    }

    /* all iphone*/
    @media only screen and (min-width: 320px) and (max-width: 767px) {
      .nd_booking_width_50_all_iphone {
        width: 50px;
      }

      .nd_booking_width_100_percentage_all_iphone {
        width: 100%;
      }

      .nd_booking_width_initial_all_iphone {
        width: initial;
      }

      .nd_booking_float_left_all_iphone {
        float: left;
      }

      .nd_booking_float_initial_all_iphone {
        float: initial;
      }

      .nd_booking_display_none_all_iphone {
        display: none;
      }

      .nd_booking_display_block_all_iphone {
        display: block;
      }

      .nd_booking_display_inline_block_all_iphone {
        display: inline-block;
      }

      .nd_booking_padding_left_0_all_iphone {
        padding-left: 0px;
      }

      .nd_booking_padding_0_all_iphone {
        padding: 0px;
      }

      .nd_booking_padding_15_all_iphone {
        padding: 15px;
      }

      .nd_booking_padding_30_15_all_iphone {
        padding: 30px 15px;
      }

      .nd_booking_width_50_percentage_all_iphone {
        width: 50%;
      }

      .nd_booking_font_size_40_all_iphone {
        font-size: 40px;
      }

      .nd_booking_line_height_40_all_iphone {
        line-height: 40px;
      }

      .nd_booking_line_height_25_all_iphone {
        line-height: 25px;
      }

      .nd_booking_font_size_30_all_iphone {
        font-size: 30px;
      }

      .nd_booking_margin_0_all_iphone {
        margin: 0px;
      }

      .nd_booking_margin_top_20_all_iphone {
        margin-top: 20px;
      }

      .nd_booking_margin_top_40_all_iphone {
        margin-top: 40px;
      }

      .nd_booking_margin_bottom_20_all_iphone {
        margin-bottom: 20px;
      }

      .nd_booking_margin_left_0_all_iphone {
        margin-left: 0px;
      }

      .nd_booking_text_align_center_all_iphone {
        text-align: center;
      }

      .nd_booking_box_sizing_border_box_all_iphone {
        box-sizing: border-box;
      }

      .nd_booking_border_0_all_iphone {
        border-width: 0px;
      }

    }








    /*TOP HEADER*/
    #nd_options_navigation_2_top_header .nd_options_grid_6:last-child {
      padding: 0px 15px;
    }

    #nd_options_navigation_2_top_header .nd_options_grid_6:first-child {
      padding: 0px 15px;
    }

    /*IMAGE ADJUSTMENT*/
    @media only screen and (min-width: 1200px) and (max-width: 3000px) {
      #nd_booking_single_cpt_1_image img {
        height: 401px;
      }
    }


    /*HEADER BTN*/
    .contact_btn {
      background-color: #e34f1e !important;
    }

    .contact_btn a {
      color: #fff !important;
    }

    /*responsive*/
    .nd_options_navigation_2_sidebar .contact_btn a {
      color: #fff !important;
      font-size: 24px !important;
      font-weight: lighter;
    }

    .nd_options_navigation_2_sidebar .contact_btn {
      background-color: initial !important;
    }

    /*NAVIGATION*/
    .nd_options_navigation_2 div>ul>li:after {
      content: "";
    }

    /*HEADER*/
    #nd_options_navigation_2_container>.nd_options_section {
      background: -moz-linear-gradient(top,
          rgba(114, 116, 117, 1) 0%,
          rgba(114, 116, 117, 0.2) 100%) !important;
      background: -webkit-linear-gradient(top,
          rgba(114, 116, 117, 1) 0%,
          rgba(114, 116, 117, 0.2) 100%) !important;
      background: linear-gradient(to bottom,
          rgba(114, 116, 117, 1) 0%,
          rgba(114, 116, 117, 0) 100%) !important;
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#99727475', endColorstr='#00727475', GradientType=0);
    }

    /*------------------------------*/

    /*TOP HEADER*/
    #nd_options_navigation_4_top_header {
      background-size: cover;
      background-position: center;
    }

    /*HEADER BTN*/
    .contact_btn {
      background-color: #e34f1e;
      border-radius: 2px;
      line-height: 0px;
    }

    .contact_btn a {
      color: #fff !important;
      font-size: 11px !important;
      padding: 5px 10px;
      letter-spacing: 2px;
      display: inline-block;
    }

    /*responsive*/
    .nd_options_navigation_4_sidebar .contact_btn a {
      color: #fff !important;
      font-size: 24px !important;
    }

    .nd_options_navigation_4_sidebar .contact_btn {
      background-color: initial;
    }

    /*SLIDE*/
    #nd_options_navigation_4_container>div {
      border-bottom: 1px solid #fff !important;
    }

    /*FOOTER 5*/
    #nd_options_footer_5 input[type="submit"] {
      border-radius: 0px 2px 2px 0px;
      line-height: 13px;
    }

    #nd_options_footer_5 input[type="email"] {
      border-radius: 2px 0px 0px 2px;
      line-height: 21px;
      letter-spacing: 2px;
    }

    #nd_options_footer_5 .footer_5_contacts p a {
      margin-top: 8px;
      display: inline-block;
      letter-spacing: 2px;
    }

    /*GENERAL CLASS*/
    .nd_options_disable_lateral_border {
      border-right-width: 0px !important;
      border-left-width: 0px !important;
    }

    .nd_options_only_border_bottom {
      border-top-width: 0px !important;
      border-right-width: 0px !important;
      border-left-width: 0px !important;
      border-radius: 0px !important;
    }

    /*IFRAME BORDER*/
    .wpb_gmaps_widget .wpb_wrapper {
      padding: 0px;
    }

    /*TOP HEADER*/
    #nd_options_navigation_4_top_header a {
      letter-spacing: 2px !important;
    }

    /*NAVIGATION*/
    .nd_options_navigation_4 div li a {
      font-size: 14px;
      letter-spacing: 2px;
    }

    /*SEARCH COMPONENT*/
    .nd_booking_search_component_l1 h1 {
      font-weight: 300;
    }

    /*FOCUS NUMBER COMPONENT*/
    .nd_options_focusnumber_component_l3 h1 {
      font-weight: 300;
    }

    /*POST GRID COMPONENT LAYOUT 8*/
    .nd_options_postgrid_posts_layout_8 h3 a {
      font-size: 25px;
    }

    .nd_options_postgrid_posts_layout_8 .nd_options_postgrid_posts_description {
      margin-top: 20px;
    }

    .nd_options_postgrid_posts_layout_8 .nd_options_postgrid_posts_button {
      font-size: 11px;
    }

    .nd_options_postgrid_posts_layout_8 .nd_options_display_table p {
      text-transform: uppercase;
      font-size: 11px;
      letter-spacing: 2px;
    }

    /*LABELS DEMO*/
    .nd_options_navigation_4 .menu li.nd_options_new_label>a:after {
      border-radius: 3px;
    }

    .nd_options_navigation_4 .menu li.nd_options_hot_label>a:after {
      border-radius: 3px;
    }

    .nd_options_navigation_4 .menu li.nd_options_best_label>a:after {
      border-radius: 3px;
    }

    /*post grid l4*/
    .nd_options_postgrid_posts_layout_4 h3 {
      font-size: 25px;
      color: #525252 !important;
    }

    .nd_options_postgrid_posts_layout_4 h5 {
      font-size: 11px;
      text-transform: uppercase;
      margin-top: 20px;
    }

    .nd_options_postgrid_posts_layout_4 a {
      font-size: 11px;
      padding: 10px 20px;
      letter-spacing: 4px;
      border-color: #7e7e7e;
      margin-top: 20px;
      border-left-width: 0px;
      border-right-width: 0px;
    }

    .nd_options_postgrid_posts_layout_4 .nd_options_bg_grey_3 {
      display: none;
    }

    .nd_options_postgrid_posts_layout_4 .nd_options_postgrid_posts_layout_4_divider {
      display: block;
    }

    .nd_options_postgrid_posts_layout_4 .nd_options_height_20 {
      height: 10px;
    }

    /*ROOMS COMPONENT*/
    .nd_booking_rooms_component_l3 p.nd_booking_padding_3_5 {
      border-radius: 3px;
    }

    .nd_booking_rooms_component_l2 a.nd_booking_padding_15_30_important {
      font-weight: lighter !important;
      letter-spacing: 2px;
      border-radius: 2px !important;
    }

    /*TEAM COMPONENT L5*/
    .nd_options_team_component_l5 h3 {
      font-size: 20px;
      margin-bottom: 5px;
    }

    .nd_options_team_component_l5 h6 {
      font-size: 13px;
    }

    .nd_options_team_component_l5 h6 strong {
      font-weight: lighter;
    }

    /*COUNTER COMPONENT L1*/
    .nd_options_counter_component_l1 {
      font-weight: 300 !important;
    }

    /*SEARCH COMPONENT HOME*/
    .nd_booking_search_component_l2 {
      border-width: 0px;
    }

    .nd_booking_search_component_l2 .nd_booking_font_size_12 {
      font-size: 13px;
      letter-spacing: 2px;
    }

    .nd_booking_search_component_l2 form .nd_booking_bg_greydark {
      background: none;
    }

    .nd_booking_search_component_l2 form input[type="submit"] {
      font-size: 11px;
      line-height: 11px;
      border-radius: 2px;
    }

    /*ROOMS COMPONENT HOME l5*/
    .nd_booking_rooms_component_l5 p.nd_booking_font_size_12 {
      font-size: 11px;
      text-transform: uppercase;
    }

    .nd_booking_rooms_component_l5 a.nd_booking_font_size_12 {
      font-size: 13px;
      border-radius: 2px !important;
    }

    /*TEAM COMPONENT l4*/
    .nd_options_price_team_l4 h2 strong {
      font-weight: lighter;
    }

    .nd_options_price_team_l4 a {
      font-weight: lighter;
      letter-spacing: 2px;
      border-left-width: 0px;
      border-right-width: 0px;
      border-radius: 0px;
    }

    /*LIST COMPONENT l1*/
    .nd_options_list_component_l1 h4 strong {
      font-weight: 300;
    }

    .nd_options_list_component_l1 .nd_options_padding_5_10 {
      border-radius: 3px;
    }

    /*ROOMS COMPONENT HOME l5*/
    .nd_booking_rooms_component_l4 a {
      border-radius: 2px;
      letter-spacing: 2px;
    }

    /*CALENDAR PICKERT SEARCH*/
    .nicdark_body .ui-datepicker .ui-datepicker-prev span,
    .nicdark_body .ui-datepicker .ui-datepicker-next span {
      color: #fff !important;
    }

    .nicdark_body .ui-datepicker th {
      color: #fff;
    }

    .nicdark_body .ui-datepicker td span,
    .ui-datepicker td a {
      color: #fff;
    }


    .nicdark_body #ui-datepicker-div {
      border: 1px solid #0000001a;
    }

    /*PRICE COMPONENT HOME L4*/
    .nd_options_price_component_l4 {
      border-radius: 2px;
    }

    .nd_options_price_component_l4 .nd_options_price_component_l4_top {
      border-radius: 2px 2px 0px 0px;
    }

    .nd_options_price_component_l4_bottom a {
      border-radius: 2px;
      padding: 10px 20px;
      letter-spacing: 2px;
    }

    .nd_options_price_component_l4_top h5 {
      font-size: 14px;
    }

    .nd_options_price_component_l4_top h4 {
      font-size: 11px;
    }

    .nd_options_price_component_l4_top .nd_options_height_10 {
      height: 20px;
    }

    .nd_options_price_component_l4_top_light {
      border-bottom: 1px solid #f1f1f1;
    }

    .nd_options_price_component_l4_middle {
      padding-top: 20px;
    }

    .nd_options_price_component_l4_bottom {
      padding-top: 20px;
    }

    /*SIDEBAR L5*/
    .nd_options_post_template_l5 .nd_options_sidebar h3 {
      font-weight: 300 !important;
    }

    .nd_options_post_template_l5 .widget_calendar table {
      background: none !important;
      border: 1px solid #f1f1f1 !important;
    }

    .nd_options_post_template_l5 .widget_calendar table td {
      color: #7e7e7e !important;
      font-weight: 300;
    }

    .nd_options_post_template_l5 .widget_calendar table caption {
      background: none !important;
      color: #525252 !important;
      border: 1px solid #f1f1f1 !important;
      border-bottom-width: 0px !important;
      font-weight: 300 !important;
    }

    .nd_options_post_template_l5 .nd_options_sidebar .widget.widget_calendar table th {
      font-weight: 400;
    }

    .nd_options_post_template_l5 .widget_search input[type="submit"] {
      font-weight: 300 !important;
      border-radius: 2px;
      letter-spacing: 3px !important;
    }

    /*COMMENTS L5 LAYOUT*/
    .nd_options_comments_template_l5 h3 strong,
    .nd_options_comments_template_l5 h3 {
      font-weight: 300 !important;
    }

    .nd_options_comments_template_l5 cite {
      font-weight: 400 !important;
    }

    .nd_options_comments_template_l5 .reply a {
      border-radius: 2px !important;
      padding: 5px 10px !important;
    }

    .nd_options_comments_template_l5 input[type="submit"] {
      font-weight: 400 !important;
      border-radius: 2px !important;
    }

    /*WOO L8*/
    #nd_options_woocommerce_header_img_layout_8 h1,
    #nd_options_woocommerce_archives_header_img_layout_8 h1 {
      font-size: 55px;
      margin-bottom: 90px;
    }

    #nd_options_woocommerce_header_img_layout_8 #nd_options_woo_single_header_image_space_top {
      height: 90px;
    }

    #nd_options_woocommerce_archives_header_img_layout_8 #nd_options_woo_archive_header_image_space_top {
      height: 90px;
    }

    /*single*/
    .nd_options_woo_template_single_layout-8 h1.product_title {
      font-weight: 300 !important;
    }

    .nd_options_woo_template_single_layout-8 .product_meta span {
      font-weight: 300;
    }

    .woocommerce.woocommerce-page .nd_options_woo_template_single_layout-8 .product .woocommerce-tabs ul li a {
      font-weight: 300 !important;
    }

    .nd_options_woo_template_single_layout-8 h2 {
      font-weight: 300 !important;
    }

    .nd_options_woo_template_single_layout-8 .price span.amount {
      font-weight: 300;
    }

    .nd_options_woo_template_single_layout-8 .related.products .add_to_cart_button {
      border-color: #7e7e7e !important;
      border-right-width: 0px !important;
      border-left-width: 0px !important;
      letter-spacing: 3px;
      font-size: 11px !important;
      font-weight: 300 !important;
      border-radius: 0px !important;
      margin-top: 20px !important;
    }

    /*archive*/
    .nd_options_woo_template_archive_layout-8 .products .add_to_cart_button {
      border-color: #7e7e7e !important;
      border-right-width: 0px !important;
      border-left-width: 0px !important;
      letter-spacing: 3px;
      font-size: 11px !important;
      font-weight: 300 !important;
      border-radius: 0px !important;
      margin-top: 20px !important;
    }

    .nd_options_woo_template_archive_layout-8 .price span.amount {
      font-weight: 300;
    }

    .nd_options_woo_template_archive_layout-8 .product h2 {
      font-weight: 300 !important;
    }

    .nd_options_woo_template_archive_layout-8 .product {
      text-align: center;
    }

    .woocommerce-checkout #payment ul.payment_methods p {
      color: #fff;
    }

    .woocommerce-checkout #payment .place-order p {
      color: #fff;
    }

    .woocommerce-checkout #payment .place-order a {
      color: #fff;
      text-decoration: underline;
    }

    /*SEARCH ROOMS*/
    #nd_booking_search_cpt_1_content .nd_booking_masonry_item form input[type="submit"] {
      border: 1px solid #7e7e7e !important;
      font-weight: 400;
      color: #7e7e7e !important;
      border-right-width: 0px !important;
      border-left-width: 0px !important;
      letter-spacing: 3px;
    }

    /*ROOMS POSTGRID SIMILAR ROOMS*/
    .nd_booking_rooms_component_similar a.nd_booking_padding_15_30_important {
      border: 1px solid #7e7e7e !important;
      font-weight: 400;
      color: #7e7e7e !important;
      border-right-width: 0px !important;
      border-left-width: 0px !important;
      letter-spacing: 3px;
    }

    /*SINGLE ROOM PAGE*/
    #nd_booking_single_cpt_1_similar_rooms .nd_booking_display_inline_block.nd_booking_height_1.nd_booking_width_30.nd_booking_bg_greydark {
      display: none;
    }

    #nd_booking_week_price table td p {
      color: #fff;
    }

    #nd_booking_week_price div p {
      color: #fff;
    }

    #nd_booking_week_price table tr.nd_options_color_white {
      text-decoration: underline;
    }

    .nd_options_color_white {
      color: #fff;
    }

    /*SIDEBAR L5*/
    .nd_booking_sidebar h3 {
      font-weight: 300 !important;
    }

    .nd_booking_sidebar input[type="submit"] {
      font-weight: 300 !important;
      border-radius: 2px;
      letter-spacing: 3px !important;
    }

    /*BOOKING STEPS*/
    #nd_booking_book_main_bg h6 {
      color: #fff !important;
    }

    #nd_booking_book_main_bg h1 {
      color: #fff !important;
    }

    #nd_booking_checkout_main_bg h6,
    #nd_booking_checkout_main_bg h1 {
      color: #fff !important;
    }

    #nd_booking_thankyou_bg_main h6,
    #nd_booking_thankyou_bg_main h1 {
      color: #fff !important;
    }

    #nd_booking_order_bg_main h6,
    #nd_booking_order_bg_main h1 {
      color: #fff !important;
    }

    #nd_booking_book_main_bg .nd_options_color_grey,
    #nd_booking_checkout_main_bg .nd_options_color_grey,
    #nd_booking_thankyou_bg_main .nd_options_color_grey,
    #nd_booking_order_bg_main .nd_options_color_grey {
      color: #fff;
    }

    .nd_booking_bg_yellow.nd_booking_padding_15_35_important {
      font-weight: 400;
      letter-spacing: 4px;
      border-radius: 2px;
    }

    .nd_booking_account_shortcode_left_section .nd_booking_bg_greydark h5 {
      color: #fff;
    }

    /*SINGLE BRANCH*/
    #nd_booking_single_cpt_4_all_rooms a.nd_booking_padding_15_30_important {
      border: 1px solid #7e7e7e !important;
      font-weight: 400;
      color: #7e7e7e !important;
      border-right-width: 0px !important;
      border-left-width: 0px !important;
      letter-spacing: 3px;
    }

    /*SINGLE ROOM CAL*/
    #nd_booking_single_cpt_1_calendar h1,
    #nd_booking_single_cpt_1_calendar h6 {
      color: #fff !important;
    }

    #nd_booking_single_cpt_1_calendar input[type="submit"] {
      background-color: initial;
      border-top: 1px solid #fff;
      border-bottom: 1px solid #fff;
    }

    /*SEARCH BOX ON ARCHIVE*/
    #nd_booking_search_cpt_1_form_sidebar #nd_booking_search_main_bg h1,
    #nd_booking_search_cpt_1_form_sidebar #nd_booking_search_main_bg h6 {
      color: #fff !important;
    }

    /*WOO POST GRID*/
    .nd_options_postgrid_woo_component_l4 .nd_options_bg_greydark_alpha_gradient_6 {
      background: -moz-linear-gradient(top,
          rgba(45, 45, 45, 0.15) 0%,
          rgba(45, 45, 45, 0.2) 80%,
          rgba(45, 45, 45, 0.5) 100%);
      background: -webkit-linear-gradient(top,
          rgba(45, 45, 45, 0.15) 0%,
          rgba(45, 45, 45, 0.2) 80%,
          rgba(45, 45, 45, 0.5) 100%);
      background: linear-gradient(to bottom,
          rgba(45, 45, 45, 0) 0%,
          rgba(45, 45, 45, 0.2) 80%,
          rgba(45, 45, 45, 0.5) 100%);
    }

    /* datepicker
----------------------------------*/
    .ui-datepicker {
      width: 300px;
      padding: 0px;
      display: none;
    }

    .ui-datepicker .ui-datepicker-header {
      position: relative;
      padding: 15px 10px;
    }

    .ui-datepicker .ui-datepicker-prev,
    .ui-datepicker .ui-datepicker-next {
      position: absolute;
      background-color: #000;
    }

    .ui-datepicker .ui-datepicker-prev {
      left: 15px;
      top: 25px;
    }

    .ui-datepicker .ui-datepicker-next {
      right: 58px;
      top: 25px;
    }

    .ui-datepicker .ui-datepicker-prev span,
    .ui-datepicker .ui-datepicker-next span {
      display: block;
      position: absolute;
      left: 0%;
      margin-left: 0px;
      top: 50%;
      margin-top: -7px;
      color: #878787;
      padding: 2px 5px;
      font-size: 10px;
      text-transform: uppercase;
      cursor: pointer;
      font-weight: lighter;
      letter-spacing: 2px;
      line-height: 10px;
    }

    .ui-datepicker .ui-datepicker-title {
      margin: 0px;
      line-height: 20px;
      text-align: center;
      font-size: 14px;
      color: #fff;
      font-weight: lighter;
    }

    .ui-datepicker .ui-datepicker-title select {
      font-size: 1em;
      margin: 1px 0;
    }

    .ui-datepicker select.ui-datepicker-month,
    .ui-datepicker select.ui-datepicker-year {
      width: 45%;
      height: auto;
    }

    .ui-datepicker table {
      width: 100%;
      font-size: .9em;
      border-collapse: collapse;
      margin: 0 0 .4em;
    }

    .ui-datepicker th {
      padding: 0px;
      text-align: center;
      font-weight: lighter;
      border: 0;
      font-size: 10px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .ui-datepicker td {
      border: 0;
      padding: 5px;
    }

    .ui-datepicker td span,
    .ui-datepicker td a {
      color: #fff;
      display: block;
      padding: 0px;
      text-align: center;
      text-decoration: none;
      font-weight: lighter;
      font-size: 12px;
    }

    .ui-datepicker .ui-datepicker-buttonpane {
      background-image: none;
      margin: .7em 0 0 0;
      padding: 0 .2em;
      border-left: 0;
      border-right: 0;
      border-bottom: 0;
    }

    .ui-datepicker .ui-datepicker-buttonpane button {
      float: right;
      margin: .5em .2em .4em;
      cursor: pointer;
      padding: .2em .6em .3em .6em;
      width: auto;
      overflow: visible;
    }

    .ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
      float: left;
    }

    /* with multiple calendars */
    .ui-datepicker.ui-datepicker-multi {
      width: auto;
      background-color: #fff;
      border: 1px solid #eee;
    }

    .ui-datepicker-multi .ui-datepicker-group {
      float: left;
    }

    .ui-datepicker-multi .ui-datepicker-group table {
      width: 95%;
      margin: 0 auto .4em;
    }

    .ui-datepicker-multi-2 .ui-datepicker-group {
      width: 50%;
    }

    .ui-datepicker-multi-3 .ui-datepicker-group {
      width: 33.3%;
    }

    .ui-datepicker-multi-4 .ui-datepicker-group {
      width: 25%;
    }

    .ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header,
    .ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header {
      border-left-width: 0;
    }

    .ui-datepicker-multi .ui-datepicker-buttonpane {
      clear: left;
    }

    .ui-datepicker-row-break {
      clear: both;
      width: 100%;
      font-size: 0;
    }

    /* RTL support */
    .ui-datepicker-rtl {
      direction: rtl;
    }

    .ui-datepicker-rtl .ui-datepicker-prev {
      right: 2px;
      left: auto;
    }

    .ui-datepicker-rtl .ui-datepicker-next {
      left: 2px;
      right: auto;
    }

    .ui-datepicker-rtl .ui-datepicker-prev:hover {
      right: 1px;
      left: auto;
    }

    .ui-datepicker-rtl .ui-datepicker-next:hover {
      left: 1px;
      right: auto;
    }

    .ui-datepicker-rtl .ui-datepicker-buttonpane {
      clear: right;
    }

    .ui-datepicker-rtl .ui-datepicker-buttonpane button {
      float: left;
    }

    .ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current,
    .ui-datepicker-rtl .ui-datepicker-group {
      float: right;
    }

    .ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header,
    .ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header {
      border-right-width: 0;
      border-left-width: 1px;
    }

    /* custom */
    .ui-datepicker-today a {
      color: #fff !important;
    }

    .ui-datepicker a {
      color: #fff;
    }

    .ui-datepicker-unselectable.ui-state-disabled {
      opacity: 0.3;
    }

    /*color_dark_1*/
    .nd_booking_bg_greydark,
    #nd_booking_slider_range .ui-slider-range,
    #nd_booking_slider_range .ui-slider-handle,
    .ui-tooltip.nd_booking_tooltip_jquery_content,
    .ui-datepicker,
    .ui-datepicker .ui-datepicker-prev span,
    .ui-datepicker .ui-datepicker-next span {
      background-color: #585f77;
      color: #fff;
    }

    #nd_booking_search_filter_options li p {
      border-bottom: 2px solid #fff;
    }

    #nd_booking_checkout_payment_tab_list li.ui-state-active {
      border-bottom: 1px solid #fff;
      background-color: #e34f1e;
    }

    .nd_booking_border_1_solid_greydark_important {
      border: 1px solid #585f77 !important;
    }

    .nicdark_body .ui-datepicker .ui-datepicker-prev span,
    .nicdark_body .ui-datepicker .ui-datepicker-next span {
      color: #fff !important;
    }

    /*color_dark_2*/
    .nd_booking_bg_greydark_2,
    .ui-datepicker .ui-datepicker-header {
      background-color: #585f77;
    }

    .nd_booking_bg_greydark_2_important {
      background-color: #585f77 !important;
    }

    /*color_1*/
    .nd_booking_bg_yellow,
    .nd_booking_btn_pagination_active,
    .ui-datepicker-today a {
      background-color: #e34f1e;
    }

    .nd_booking_color_yellow_important {
      color: #e34f1e !important;
    }

    /*color_2*/
    .nd_booking_bg_red {
      background-color: #e34f1e;
    }
  </style>

  <div class="wpb_wrapper">
    <div class="nd_booking_search_component_l2 nd_booking_border_1_solid_grey nd_booking_section search-l2-home1">
      <!--start header-->
      <div style="background-color: #e34f1e" class="nd_booking_section nd_booking_text_align_center nd_booking_padding_20 nd_booking_box_sizing_border_box">
        <h2 class="nd_options_color_white" style="color: #fff; margin-bottom: 0;">Buscar Habitaciones</h2>
         
        <p class="nd_options_color_white nd_booking_font_size_12 nd_booking_letter_spacing_2" style="margin-bottom: 0px;">
          INICIAR RESERVA
        </p>
      </div>
      <!--end header-->

      <!--START FORM-->
      <form style="padding-top: 35px" class="nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_section nd_booking_bg_white" action="<?php echo get_post_type_archive_link('alojamiento'); ?>" method="get">
        <div class="nd_booking_width_100_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_box_sizing_border_box">
          <!--check in/out-->
          <div class="nd_booking_width_50_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_box_sizing_border_box">
            <div id="nd_booking_open_calendar_from" class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center nd_booking_cursor_pointer">
              <div class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center">
                <h5 class="nd_options_color_grey nd_options_second_font  nd_booking_font_size_12">
                  ENTRADA
                </h5>
                
                <div class="nd_booking_section nd_booking_height_1 nd_options_border_bottom_1_solid_grey"></div>
                
                <div class="nd_booking_display_inline_flex">
                  <div class="nd_booking_float_left nd_booking_text_align_right">
                    <h1 id="nd_booking_date_number_from_front" class="nd_booking_font_size_50 nd_options_color_greydark">
                    </h1>
                  </div>
                  <div class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10">
                    <h6 id="nd_booking_date_month_from_front" class="nd_options_color_grey nd_booking_margin_top_7 nd_booking_font_size_12">
                    </h6>
                    
                    <img alt="" width="12" src="<?php echo get_stylesheet_directory_uri().'/public/icons/icon-down-arrow-grey.svg';?>" />
                  </div>
                </div>
                
                <div class="nd_booking_section nd_booking_height_1 nd_options_border_bottom_1_solid_grey nd_booking_display_none_all_iphone"></div>
                <div class="nd_booking_section nd_booking_height_30 nd_booking_display_none_all_iphone"></div>
              </div>
            </div>

            <input type="hidden" id="nd_booking_date_month_from" class="nd_booking_section nd_booking_margin_top_20" value="Sep" />
            <input type="hidden" id="nd_booking_date_number_from" class="nd_booking_section nd_booking_margin_top_20" />
            <input placeholder="Check In" class="nd_booking_section nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important" type="text" name="nd_booking_archive_form_date_range_from" id="nd_booking_archive_form_date_range_from" value="" />
          </div>
          <div class="nd_booking_width_50_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_box_sizing_border_box">
            <div id="nd_booking_open_calendar_to" class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center nd_booking_cursor_pointer">
              <div class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center">
                <h5 class="nd_options_color_grey nd_options_second_font  nd_booking_font_size_12">
                  SALIDA
                </h5>
                
                <div class="nd_booking_section nd_booking_height_1 nd_options_border_bottom_1_solid_grey"></div>
                
                <div class="nd_booking_display_inline_flex">
                  <div class="nd_booking_float_left nd_booking_text_align_right">
                    <h1 id="nd_booking_date_number_to_front" class="nd_booking_font_size_50 nd_options_color_greydark">
                    </h1>
                  </div>
                  <div class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10">
                    <h6 id="nd_booking_date_month_to_front" class="nd_options_color_grey nd_booking_margin_top_7 nd_booking_font_size_12">
                    </h6>
                    
                    <img alt="" width="12" src="<?php echo get_stylesheet_directory_uri().'/public/icons/icon-down-arrow-grey.svg';?>" />
                  </div>
                </div>
                
                <div class="nd_booking_section nd_booking_height_1 nd_options_border_bottom_1_solid_grey"></div>
                
              </div>
            </div>

            <input type="hidden" id="nd_booking_date_month_to" class="nd_booking_section nd_booking_margin_top_20" value="Sep" />
            <input type="hidden" id="nd_booking_date_number_to" class="nd_booking_section nd_booking_margin_top_20" />
            <input placeholder="Check Out" class="nd_booking_section nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important" type="text" name="nd_booking_archive_form_date_range_to" id="nd_booking_archive_form_date_range_to" value="" />
          </div>

          <script type="text/javascript">
            //<![CDATA[
            let date = new Date();
            let today = date.getDate();
            let mounthNames = [
              "Enero",
              "Febrero",
              "Marzo",
              "Abril",
              "Mayo",
              "Junio",
              "Julio",
              "Agosto",
              "Septiembre",
              "Octubre",
              "Noviembre",
              "Diciembre",
            ];
            let mounthNamesShort = [
              "Ene",
              "Feb",
              "Mar",
              "Abr",
              "May",
              "Jun",
              "Jul",
              "Ago",
              "Sep",
              "Oct",
              "Nov",
              "Dic",
            ];
            let currentMonthNameShort = mounthNamesShort[date.getMonth()];
            let nextMonthNameShort = mounthNamesShort[date.getMonth()+1];
            lastDayOfMonth = new Date(date.getFullYear(), date.getMonth()+1, 0).getDate();
            

            isLastDayOfMonth = today === lastDayOfMonth;

            document.querySelector('#nd_booking_date_number_from_front').innerHTML = today;
            document.querySelector('#nd_booking_date_number_to_front').innerHTML = (!isLastDayOfMonth)? today + 5 : 1;

            document.querySelector('#nd_booking_date_month_from_front').innerHTML = currentMonthNameShort;
            document.querySelector('#nd_booking_date_month_to_front').innerHTML = (!isLastDayOfMonth )? currentMonthNameShort : nextMonthNameShort;

            jQuery(document).ready(function() {
              jQuery(function($) {

                $("#nd_booking_archive_form_date_range_from").datepicker({
                  defaultDate: "+5d",
                  minDate: 0,
                  altField: "#nd_booking_date_month_from",
                  altFormat: "M",
                  firstDay: 0,
                  dateFormat: "mm/dd/yy",
                  monthNames: mounthNames,
                  monthNamesShort: mounthNamesShort,
                  dayNamesMin: ["LUN", "MAR", "MIE", "JUE", "VIE", "SAB", "DOM"],
                  nextText: "SIG",
                  prevText: "ANT",
                  changeMonth: false,
                  numberOfMonths: 1,
                  onClose: function() {
                    var minDate = $(this).datepicker("getDate");
                    var newMin = new Date(minDate.setDate(minDate.getDate() + 5));
                    $("#nd_booking_archive_form_date_range_to").datepicker(
                      "option",
                      "minDate",
                      newMin
                    );

                    var nd_booking_input_date_from = $(
                      "#nd_booking_archive_form_date_range_from"
                    ).val();
                    var nd_booking_date_number_from =
                      nd_booking_input_date_from.substring(3, 5);
                    $("#nd_booking_date_number_from").val(
                      nd_booking_date_number_from
                    );
                    var nd_booking_input_date_to = $(
                      "#nd_booking_archive_form_date_range_to"
                    ).val();
                    var nd_booking_date_number_to =
                      nd_booking_input_date_to.substring(3, 5);
                    $("#nd_booking_date_number_to").val(
                      nd_booking_date_number_to
                    );

                    $("#nd_booking_date_number_from_front").text(
                      nd_booking_date_number_from
                    );
                    var nd_booking_date_month_from = $(
                      "#nd_booking_date_month_from"
                    ).val();
                    $("#nd_booking_date_month_from_front").text(
                      nd_booking_date_month_from
                    );

                    $("#nd_booking_date_number_to_front").text(
                      nd_booking_date_number_to
                    );
                    var nd_booking_date_month_to = $(
                      "#nd_booking_date_month_to"
                    ).val();
                    $("#nd_booking_date_month_to_front").text(
                      nd_booking_date_month_to
                    );
                  },
                });

                $("#nd_booking_archive_form_date_range_to").datepicker({
                  defaultDate: "+1w",
                  altField: "#nd_booking_date_month_to",
                  altFormat: "M",
                  minDate: "+5d",
                  monthNames: mounthNames,
                  monthNamesShort: mounthNamesShort,
                  dayNamesMin: ["SU", "MO", "TU", "WE", "TH", "FR", "SA"],
                  nextText: "SIG",
                  prevText: "ANT",
                  changeMonth: false,
                  firstDay: 0,
                  dateFormat: "mm/dd/yy",
                  numberOfMonths: 1,
                  onClose: function() {
                    var nd_booking_input_date_from = $(
                      "#nd_booking_archive_form_date_range_from"
                    ).val();
                    var nd_booking_date_number_from =
                      nd_booking_input_date_from.substring(3, 5);
                    $("#nd_booking_date_number_from").val(
                      nd_booking_date_number_from
                    );
                    var nd_booking_input_date_to = $(
                      "#nd_booking_archive_form_date_range_to"
                    ).val();
                    var nd_booking_date_number_to =
                      nd_booking_input_date_to.substring(3, 5);
                    $("#nd_booking_date_number_to").val(
                      nd_booking_date_number_to
                    );

                    $("#nd_booking_date_number_from_front").text(
                      nd_booking_date_number_from
                    );
                    var nd_booking_date_month_from = $(
                      "#nd_booking_date_month_from"
                    ).val();
                    $("#nd_booking_date_month_from_front").text(
                      nd_booking_date_month_from
                    );

                    $("#nd_booking_date_number_to_front").text(
                      nd_booking_date_number_to
                    );
                    var nd_booking_date_month_to = $(
                      "#nd_booking_date_month_to"
                    ).val();
                    $("#nd_booking_date_month_to_front").text(
                      nd_booking_date_month_to
                    );
                  },
                });

                $("#nd_booking_archive_form_date_range_from").datepicker(
                  "setDate",
                  "+0"
                );
                $("#nd_booking_archive_form_date_range_to").datepicker(
                  "setDate",
                  "+1"
                );

                function nd_booking_get_nights() {
                  var nd_booking_archive_form_date_range_from = $(
                    "#nd_booking_archive_form_date_range_from"
                  ).val();
                  var nd_booking_archive_form_date_range_to = $(
                    "#nd_booking_archive_form_date_range_to"
                  ).val();
                  var nd_booking_start = new Date(
                    nd_booking_archive_form_date_range_from
                  );
                  var nd_booking_end = new Date(
                    nd_booking_archive_form_date_range_to
                  );
                  var nd_booking_nights_number =
                    (nd_booking_end - nd_booking_start) / 1000 / 60 / 60 / 24;
                  $(".nd_booking_nights_number").text(nd_booking_nights_number);
                }

                $("#nd_booking_open_calendar_from").click(function() {
                  $("#nd_booking_archive_form_date_range_from").datepicker(
                    "show"
                  );
                });
                $("#nd_booking_open_calendar_to").click(function() {
                  $("#nd_booking_archive_form_date_range_to").datepicker("show");
                });
              });
            });
            //]]&gt;
          </script>
          <!--check in/out-->

          <!--guests-->
          <div class="nd_booking_width_100_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_box_sizing_border_box">
            <div class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center">
              <div class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_text_align_center">
                <div class="nd_booking_section nd_booking_position_relative">
                  <img class="nd_booking_position_absolute nd_booking_left_0 nd_booking_top_0 nd_booking_guests_decrease nd_booking_cursor_pointer" alt="" width="20" src="<?php echo get_stylesheet_directory_uri().'/public/icons/icon-decrease-grey.svg';?>" />
                  <h3 class="nd_booking_color_greydark">
                    <span class="nd_booking_guests_number">1</span>
                    <span class="nd_booking_guests_number_word">Huésped</span>
                  </h3>
                  <img class="nd_booking_position_absolute nd_booking_right_0 nd_booking_top_0 nd_booking_guests_increase nd_booking_cursor_pointer" alt="" width="20" src="<?php echo get_stylesheet_directory_uri().'/public/icons/icon-increase-grey.svg';  ?>" />
                </div>
              </div>
            </div>
            <label class="nd_booking_display_none" for="nd_booking_archive_form_guests">Guests :</label>
            <input placeholder="Guests" class="nd_booking_section nd_booking_display_none" type="number" name="nd_booking_archive_form_guests" id="nd_booking_archive_form_guests" min="1" value="" />
          </div>
          <script type="text/javascript">
            //<![CDATA[
            jQuery(document).ready(function() {
              jQuery(function($) {
                $(".nd_booking_guests_increase").click(function() {
                  var value = $(".nd_booking_guests_number").text();
                  value++;
                  $(".nd_booking_guests_number").text(value);
                  $("#nd_booking_archive_form_guests").val(value);

                  if (value > 1) {
                    $(".nd_booking_guests_number_word").text("Huéspedes");
                  }
                });

                $(".nd_booking_guests_decrease").click(function() {
                  var value = $(".nd_booking_guests_number").text();

                  if (value > 1) {
                    value--;
                    $(".nd_booking_guests_number").text(value);
                    $("#nd_booking_archive_form_guests").val(value);
                  }

                  if (value == 1) {
                    $(".nd_booking_guests_number_word").text("Huésped");
                  }
                });
              });
            });
            //]]&gt;
          </script>
          <!--guests-->
        </div>

        

        <div class="nd_booking_width_100_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_text_align_center nd_booking_bg_greydark">
          <input style="background-color: #e34f1e" class="nd_options_color_white nd_options_second_font_important nd_booking_width_100_percentage nd_booking_font_weight_lighter  nd_booking_font_size_12 nd_booking_line_height_18 nd_booking_white_space_normal" type="submit" value="CONSULTAR DISPONIBILIDAD" />
        </div>
      </form>
      <!--END FORM-->
    </div>
  </div>
<?php
  $output = ob_get_clean();
  return $output;
}
add_shortcode('form-picker', 'p23_form_picker');
