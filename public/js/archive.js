jQuery(document).ready(function () {
  jQuery(function ($) {
    function p23_changeDateFormat(inputDate, format) {
      //parse the input date
      let date = new Date(inputDate);

      //extract the parts of the date
      const day = date.getDate();
      const month = date.getMonth() + 1;
      const year = date.getFullYear();

      //replace the month
      format = format.replace("MM", month.toString().padStart(2, "0"));

      //replace the year
      if (format.indexOf("yyyy") > -1) {
        format = format.replace("yyyy", year.toString());
      } else if (format.indexOf("yy") > -1) {
        format = format.replace("yy", year.toString().substr(2, 2));
      }

      //replace the day
      format = format.replace("dd", day.toString().padStart(2, "0"));

      return format;
    }
    //START function
    function nd_booking_sorting(paged) {
      jQuery("body").append(
        "<div id='nd_booking_sorting_result_layer' class='nd_booking_cursor_progress nd_booking_position_fixed nd_booking_width_100_percentage nd_booking_height_100_percentage nd_booking_z_index_999'></div>"
      );

      var nd_booking_sorting_result_loader = jQuery(
        '<div id="nd_booking_sorting_result_loader" class="nd_booking_position_absolute nd_booking_top_0 nd_booking_z_index_9 nd_booking_left_0 nd_booking_bg_white  nd_booking_cursor_progress nd_booking_height_100_percentage nd_booking_width_100_percentage"></div>'
      ).hide();
      jQuery("#nd_booking_archive_search_masonry_container").append(
        nd_booking_sorting_result_loader
      );
      nd_booking_sorting_result_loader.fadeIn("slow");

      var nd_booking_search_filter_options_meta_key = jQuery(
        "#nd_booking_search_filter_options .nd_booking_search_filter_options_active"
      ).attr("data-meta-key");
      var nd_booking_search_filter_options_order = jQuery(
        "#nd_booking_search_filter_options .nd_booking_search_filter_options_active"
      ).attr("data-order");
      var nd_booking_search_filter_layout = jQuery(
        "#nd_booking_search_filter_layout .nd_booking_search_filter_layout_active"
      ).attr("data-layout");
      if (typeof nd_booking_search_filter_layout === "undefined") {
        nd_booking_search_filter_layout = 1;
      }

      //variables passed on function
      var nd_booking_paged = paged;
      if (typeof nd_booking_paged === "undefined") {
        nd_booking_paged = jQuery(".nd_booking_btn_pagination_active").text();
      }
      var nd_booking_layout = jQuery(
        "#nd_booking_btn_sorting_layout .nd_booking_btn_sorting_layout_active"
      ).attr("title");

      var nd_booking_archive_form_branches = jQuery(
        "#nd_booking_archive_form_branches"
      ).val();
      var nd_booking_archive_form_date_range_from = jQuery(
        "#nd_booking_archive_form_date_range_from"
      ).val();
      var nd_booking_archive_form_date_range_to = jQuery(
        "#nd_booking_archive_form_date_range_to"
      ).val();
      var nd_booking_archive_form_guests = jQuery(
        "#nd_booking_archive_form_guests"
      ).val();
      var nd_booking_archive_form_max_price_for_day = jQuery(
        "#nd_booking_archive_form_max_price_for_day"
      ).val();
      var nd_booking_archive_form_services = jQuery(
        "#nd_booking_archive_form_services"
      ).val();
      var nd_booking_archive_form_additional_services = jQuery(
        "#nd_booking_archive_form_additional_services"
      ).val();
      var nd_booking_archive_form_branch_stars = jQuery(
        "#nd_booking_archive_form_branch_stars"
      ).val();

      jQuery.get(
        "http://localhost/001BusinessSunhouse/wp-json/alo/date_wp/",
        {
          start_date: p23_changeDateFormat(
            nd_booking_archive_form_date_range_from,
            "yyyy-MM-dd"
          ),
          end_date: p23_changeDateFormat(
            nd_booking_archive_form_date_range_to,
            "yyyy-MM-dd"
          ),
        },
        function nd_booking_sorting_result(nd_booking_sorting_result) {
          console.log(nd_booking_sorting_result);
        }
      );
      // START post method
      // jQuery.get(

      //   //ajax
      //   nd_booking_my_vars_sorting.nd_booking_ajaxurl_sorting,
      //   {
      //     action : 'nd_booking_sorting_php',
      //     nd_booking_paged : nd_booking_paged,
      //     nd_booking_archive_form_branches : nd_booking_archive_form_branches,
      //     nd_booking_archive_form_date_range_from : nd_booking_archive_form_date_range_from,
      //     nd_booking_archive_form_date_range_to : nd_booking_archive_form_date_range_to,
      //     nd_booking_archive_form_guests : nd_booking_archive_form_guests,
      //     nd_booking_archive_form_max_price_for_day : nd_booking_archive_form_max_price_for_day,
      //     nd_booking_archive_form_services : nd_booking_archive_form_services,
      //     nd_booking_archive_form_additional_services : nd_booking_archive_form_additional_services,
      //     nd_booking_search_filter_options_meta_key : nd_booking_search_filter_options_meta_key,
      //     nd_booking_search_filter_options_order : nd_booking_search_filter_options_order,
      //     nd_booking_search_filter_layout : nd_booking_search_filter_layout,
      //     nd_booking_archive_form_branch_stars : nd_booking_archive_form_branch_stars
      //   },
      //   //end ajax

      //   //START success
      //   function( nd_booking_sorting_result ) {

      //     setTimeout(function(){

      //       jQuery( "#nd_booking_content_result" ).remove();
      //       jQuery( "#nd_booking_archive_search_masonry_container" ).append(nd_booking_sorting_result);

      //       jQuery( "#nd_booking_sorting_result_loader" ).fadeOut( "slow", function() {
      //         jQuery( "#nd_booking_sorting_result_loader" ).remove();
      //         jQuery( "#nd_booking_sorting_result_layer" ).remove();
      //       });

      //     },10);

      //   }
      //   //END

      // );
      // //END
    }
    // END function

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
      "Dec",
    ];
    let currentMonthNameShort = mounthNamesShort[date.getMonth()];
    let nextMonthNameShort = mounthNamesShort[date.getMonth() + 1];
    lastDayOfMonth = new Date(
      date.getFullYear(),
      date.getMonth() + 1,
      0
    ).getDate();

    isLastDayOfMonth = today + 4 >= lastDayOfMonth;

    document.querySelector("#nd_booking_date_number_from_front").innerHTML =
      today;
    document.querySelector("#nd_booking_date_number_to_front").innerHTML =
      !isLastDayOfMonth ? today + 5 : 1;

    document.querySelector("#nd_booking_date_month_from_front").innerHTML =
      currentMonthNameShort;
    document.querySelector("#nd_booking_date_month_to_front").innerHTML =
      !isLastDayOfMonth ? currentMonthNameShort : nextMonthNameShort;
    // div
    $("#nd_booking_archive_form_date_range_from").datepicker({
      defaultDate: "+1w",
      minDate: 0,
      altField: "#nd_booking_date_month_from",
      altFormat: "M",
      firstDay: 0,
      dateFormat: "mm/dd/yy",
      monthNames: [
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
      ],
      monthNamesShort: [
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
      ],
      dayNamesMin: ["DOM", "LUN", "MAR", "MIE", "JUE", "VIE", "SAB"],
      nextText: "SIG",
      prevText: "ANT",
      changeMonth: false,
      numberOfMonths: 1,
      onClose: function () {
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
        var nd_booking_date_number_from = nd_booking_input_date_from.substring(
          3,
          5
        );
        $("#nd_booking_date_number_from").val(nd_booking_date_number_from);
        var nd_booking_input_date_to = $(
          "#nd_booking_archive_form_date_range_to"
        ).val();
        var nd_booking_date_number_to = nd_booking_input_date_to.substring(
          3,
          5
        );
        $("#nd_booking_date_number_to").val(nd_booking_date_number_to);

        $("#nd_booking_date_number_from_front").text(
          nd_booking_date_number_from
        );
        var nd_booking_date_month_from = $("#nd_booking_date_month_from").val();
        $("#nd_booking_date_month_from_front").text(nd_booking_date_month_from);

        $("#nd_booking_date_number_to_front").text(nd_booking_date_number_to);
        var nd_booking_date_month_to = $("#nd_booking_date_month_to").val();
        $("#nd_booking_date_month_to_front").text(nd_booking_date_month_to);

        nd_booking_get_nights();
        nd_booking_sorting(1);
      },
    });

    $("#nd_booking_archive_form_date_range_to").datepicker({
      defaultDate: "+5w",
      altField: "#nd_booking_date_month_to",
      altFormat: "M",
      minDate: "+5d",
      monthNames: [
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
      ],
      monthNamesShort: [
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
      ],
      dayNamesMin: ["DOM", "LUN", "MAR", "MIE", "JUE", "VIE", "SAB"],
      nextText: "SIG",
      prevText: "ANT",
      changeMonth: false,
      firstDay: 0,
      dateFormat: "mm/dd/yy",
      numberOfMonths: 1,
      onClose: function () {
        var nd_booking_input_date_from = $(
          "#nd_booking_archive_form_date_range_from"
        ).val();
        var nd_booking_date_number_from = nd_booking_input_date_from.substring(
          3,
          5
        );
        $("#nd_booking_date_number_from").val(nd_booking_date_number_from);
        var nd_booking_input_date_to = $(
          "#nd_booking_archive_form_date_range_to"
        ).val();
        var nd_booking_date_number_to = nd_booking_input_date_to.substring(
          3,
          5
        );
        $("#nd_booking_date_number_to").val(nd_booking_date_number_to);

        $("#nd_booking_date_number_from_front").text(
          nd_booking_date_number_from
        );
        var nd_booking_date_month_from = $("#nd_booking_date_month_from").val();
        $("#nd_booking_date_month_from_front").text(nd_booking_date_month_from);

        $("#nd_booking_date_number_to_front").text(nd_booking_date_number_to);
        var nd_booking_date_month_to = $("#nd_booking_date_month_to").val();
        $("#nd_booking_date_month_to_front").text(nd_booking_date_month_to);

        nd_booking_get_nights();
        // nd_booking_sorting(1);
      },
    });

    $("#nd_booking_archive_form_date_range_from").datepicker("setDate", "+0");
    $("#nd_booking_archive_form_date_range_to").datepicker("setDate", "+5");

    function nd_booking_get_nights() {
      var nd_booking_archive_form_date_range_from = $(
        "#nd_booking_archive_form_date_range_from"
      ).val();
      var nd_booking_archive_form_date_range_to = $(
        "#nd_booking_archive_form_date_range_to"
      ).val();
      var nd_booking_start = new Date(nd_booking_archive_form_date_range_from);
      var nd_booking_end = new Date(nd_booking_archive_form_date_range_to);
      var nd_booking_nights_number = Math.round(
        (nd_booking_end - nd_booking_start) / 1000 / 60 / 60 / 24
      );
      $(".nd_booking_nights_number").text(nd_booking_nights_number);
    }

    $("#nd_booking_open_calendar_from").click(function () {
      $("#nd_booking_archive_form_date_range_from").datepicker("show");
    });
    $("#nd_booking_open_calendar_to").click(function () {
      $("#nd_booking_archive_form_date_range_to").datepicker("show");
    });
    // div
    $(".nd_booking_guests_increase").click(function () {
      var value = $(".nd_booking_guests_number").text();
      value++;
      $(".nd_booking_guests_number").text(value);
      $("#nd_booking_archive_form_guests").val(value);
      // nd_booking_sorting(1);
    });

    $(".nd_booking_guests_decrease").click(function () {
      var value = $(".nd_booking_guests_number").text();

      if (value > 1) {
        value--;
        $(".nd_booking_guests_number").text(value);
        $("#nd_booking_archive_form_guests").val(value);
        // nd_booking_sorting(1);
      }
    });
    // div
    $("#nd_booking_slider_range").slider({
      range: "min",
      value: 300,
      min: 1,
      max: 700,
      slide: function (event, ui) {
        $("#nd_booking_archive_form_max_price_for_day").val("" + ui.value);
      },
      change: function (event, ui) {
        // nd_booking_sorting(1);
      },
    });
    $("#nd_booking_archive_form_max_price_for_day").val(
      "" + $("#nd_booking_slider_range").slider("value")
    );
    // div
    $(".nd_booking_checkbox_service").change(function () {
      if ($(this).is(":checked")) {
        var nd_booking_service_value = $(this).val();
        var nd_booking_service_previous_value = $(
          "#nd_booking_archive_form_services"
        ).val();
        $("#nd_booking_archive_form_services").val(
          nd_booking_service_value + nd_booking_service_previous_value
        );

        // nd_booking_sorting(1);
      } else {
        var nd_booking_service_value = $(this).val();
        var nd_booking_service_previous_value = $(
          "#nd_booking_archive_form_services"
        ).val();
        var nd_booking_archive_form_services =
          nd_booking_service_previous_value.replace(
            nd_booking_service_value,
            ""
          );

        $("#nd_booking_archive_form_services").val(
          nd_booking_archive_form_services
        );

        // nd_booking_sorting(1);
      }
    });

    //toogle
    $(".nd_booking_toogle_services_open_content").click(function () {
      $(".nd_booking_toogle_services_content").slideToggle("slow", function () {
        $(".nd_booking_toogle_services_open_content").css("display", "none");
        $(".nd_booking_toogle_services_close_content").css("display", "block");
      });
    });
    $(".nd_booking_toogle_services_close_content").click(function () {
      $(".nd_booking_toogle_services_content").slideToggle("slow", function () {
        $(".nd_booking_toogle_services_close_content").css("display", "none");
        $(".nd_booking_toogle_services_open_content").css("display", "block");
      });
    });
    // div
    $(".nd_booking_checkbox_additional_service").change(function () {
      if ($(this).is(":checked")) {
        var nd_booking_additional_service_value = $(this).val();
        var nd_booking_additional_service_previous_value = $(
          "#nd_booking_archive_form_additional_services"
        ).val();
        $("#nd_booking_archive_form_additional_services").val(
          nd_booking_additional_service_value +
            nd_booking_additional_service_previous_value
        );

        nd_booking_sorting(1);
      } else {
        var nd_booking_additional_service_value = $(this).val();
        var nd_booking_additional_service_previous_value = $(
          "#nd_booking_archive_form_additional_services"
        ).val();
        var nd_booking_archive_form_additional_services =
          nd_booking_additional_service_previous_value.replace(
            nd_booking_additional_service_value,
            ""
          );

        $("#nd_booking_archive_form_additional_services").val(
          nd_booking_archive_form_additional_services
        );

        nd_booking_sorting(1);
      }
    });

    //toogle
    $(".nd_booking_toogle_additional_services_open_content").click(function () {
      $(".nd_booking_toogle_additional_services_content").slideToggle(
        "slow",
        function () {
          $(".nd_booking_toogle_additional_services_open_content").css(
            "display",
            "none"
          );
          $(".nd_booking_toogle_additional_services_close_content").css(
            "display",
            "block"
          );
        }
      );
    });
    $(".nd_booking_toogle_additional_services_close_content").click(
      function () {
        $(".nd_booking_toogle_additional_services_content").slideToggle(
          "slow",
          function () {
            $(".nd_booking_toogle_additional_services_close_content").css(
              "display",
              "none"
            );
            $(".nd_booking_toogle_additional_services_open_content").css(
              "display",
              "block"
            );
          }
        );
      }
    );
  });
});