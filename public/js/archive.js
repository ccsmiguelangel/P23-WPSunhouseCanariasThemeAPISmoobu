

jQuery(document).ready(function () {
  jQuery(function ($) {

    function parseURLParams(url) {
      var queryStart = url.indexOf("?") + 1,
          queryEnd   = url.indexOf("#") + 1 || url.length + 1,
          query = url.slice(queryStart, queryEnd - 1),
          pairs = query.replace(/\+/g, " ").split("&"),
          parms = {}, i, n, v, nv;
  
      if (query === url || query === "") return;
  
      for (i = 0; i < pairs.length; i++) {
          nv = pairs[i].split("=", 2);
          n = decodeURIComponent(nv[0]);
          v = decodeURIComponent(nv[1]);
  
          if (!parms.hasOwnProperty(n)) parms[n] = [];
          parms[n].push(nv.length === 2 ? v : null);
      }
      return parms;
    }
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
    function isValidDate(textDate) {
      let date = new Date(textDate);
      return !isNaN(date);
    }

    function similar_rooms(res, consult_data = []) {

      let start_date = consult_data.start_date.replace(/-/g, '/');
      let end_date = consult_data.end_date.replace(/-/g, '/');
      if(!isValidDate(start_date)) start_date = false; 
      if(!isValidDate(end_date)) end_date = false;
      (start_date) ? start_date = p23_changeDateFormat(start_date, 'MM/dd/yyyy'): '';
      (end_date) ? end_date =  p23_changeDateFormat(end_date, 'MM/dd/yyyy'): '';

      let get_data = '?';
      (start_date) ? get_data += `nd_booking_archive_form_date_range_from=${start_date}` : get_data += `nd_booking_archive_form_date_range_from=`;
      (end_date) ? get_data += `&nd_booking_archive_form_date_range_to=${end_date}` : get_data += `&nd_booking_archive_form_date_range_to`;
      (!isNaN(consult_data.guests)) ? get_data += `&nd_booking_archive_form_guests=${consult_data.guests}` : get_data += `&nd_booking_archive_form_guests=`;
      (!isNaN(consult_data.price)) ? get_data += `&nd_booking_archive_form_price=${consult_data.price}` : get_data += `&nd_booking_archive_form_price=`;

      let html = `
        <div class="alocard">
          <div class="alocard__container">
            <div class="alocard__image-row">
              <div class="alocard__image">
                <a href="${res.url}?nd_booking_archive_form_date_range_from=${start_date}&nd_booking_archive_form_date_range_to=${end_date}&nd_booking_archive_form_guests=${consult_data.guests}">
                  <img class="alocard__image-content" width="700" height="524" src="${
                    res.image_url
                  }" alt="" loading="lazy" srcset="${res.image_url}" sizes="(max-width: 700px) 100vw, 700px" />
                </a>
              </div>
            </div>

            <div class="alocard__content-row">
              <div class="alocard__title">
                <h2 class="alocard__title-content">${res.title}</h2>
              </div>

              <div class="alocard__subtitle">
                <i aria-hidden="true" class="far fa-user-circle"></i>
                <h3 class="alocard__subtitle-content">${res.zone}</h3>
              </div>

              <div class="alocard__people">
                <span class="alocard__people-icon"></span>
                <h3 class="alocard__people-content">${
                  res.guest > 1
                    ? res.guest + " Huéspedes"
                    : res.guest + "Huésped"
                }</h3>
              </div>

              <div class="alocard__descripcion">
                <p class="alocard__description-content">
                    ${res.description}
                </p>
              </div>

              <div class="alocard__action">
                <a class="alocard__btn" href="${res.url}${get_data}">SABER MÁS</a>
              </div>
            </div>
          </div>
        </div>
      `;
      return html;
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
      var nd_booking_archive_form_services = [];
      jQuery.each(
        jQuery("[name='nd_booking_service_id[]']:checked"),
        function () {
          nd_booking_archive_form_services.push(jQuery(this).val());
        }
      );

      var nd_booking_archive_form_additional_services = [];
      jQuery.each(
        jQuery("[name='nd_booking_archive_form_zones[]']:checked"),
        function () {
          nd_booking_archive_form_additional_services.push(jQuery(this).val());
        }
      );

      var nd_booking_archive_form_branch_stars = jQuery(
        "#nd_booking_archive_form_branch_stars"
      ).val();

      let number_from_front = document.querySelector('#nd_booking_date_number_from_front').textContent;
      let date_range_form; 
      let date_range_to;  
      let nights = parseInt(document.querySelector('.nd_booking_nights_number').outerText);
      let realTotalPrice = nd_booking_archive_form_max_price_for_day * nights;
      (number_from_front === '-')? date_range_form = '-' : date_range_form =  p23_changeDateFormat(nd_booking_archive_form_date_range_from,"yyyy-MM-dd");
      (number_from_front === '-')? date_range_to = '-' : date_range_to =   p23_changeDateFormat(nd_booking_archive_form_date_range_to,"yyyy-MM-dd");
      let consult_data = {
        start_date: date_range_form,
        end_date: date_range_to,
        guests: nd_booking_archive_form_guests,
        price: realTotalPrice,
        services: nd_booking_archive_form_services,
        zones: nd_booking_archive_form_additional_services,
      }; //jQuery.param()
      console.log(consult_data);
      jQuery.ajax({
        type: 'GET',
        url: `${alo_localize_script.rest_url}/consult_all/`,
        data: consult_data,
        success: function nd_booking_sorting_result(nd_booking_sorting_result) {
          console.log(nd_booking_sorting_result);
          document.querySelectorAll('.alocard__list').forEach((item) => {
            item.innerHTML= '';
          });
              let similar_rooms_html = "";
            !(nd_booking_sorting_result.data === "")
              ? nd_booking_sorting_result.data.forEach(
                  (item) => (similar_rooms_html += similar_rooms(item, consult_data))
                )
              : "";
              
              front = `<div class="alocard__list elementor-column elementor-col-100 elementor-top-column nd_booking_archive_search_masonry_container" data-id="4fa7db83" data-element_type="column">${similar_rooms_html}</div>`;
              error =
              '<div class="alocard__list elementor-column elementor-col-100 elementor-top-column nd_booking_archive_search_masonry_container" data-id="4fa7db83" data-element_type="column"><div class="nd_booking_section"><h6 class="nd_booking_float_left">No hay alojamientos disponibles para las fechas seleccionadas.</h6></div></div>';
              !(nd_booking_sorting_result.data === "")
              ? jQuery("#alo_content").append(front)
              : jQuery("#alo_content").append(error);
              jQuery('#p23_loader').css('display', 'none');
          },
          beforeSend: function(){
            jQuery('#p23_loader').css('display', 'flex');
            document.querySelectorAll('.alocard__list').forEach((item) => {
              item.innerHTML= '';
            })        
          }
        });
    }
    // END function
    let actualUrl = (window.location.href)? window.location.href: document.URL; 
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
    let paramsActualUrl = parseURLParams(actualUrl);
    let slide_range= document.getElementById('slider_range');
    if(paramsActualUrl){
      slide_range.style.display = 'block';
      let day = new Date(paramsActualUrl.nd_booking_archive_form_date_range_from[0]);
      let end_date_value = new Date(paramsActualUrl.nd_booking_archive_form_date_range_to[0]);
      
      let nights = end_date_value.getTime() - day.getTime();
      nights = new Date(nights).getDate();

      $(".nd_booking_nights_number").text(nights);

      document.querySelector("#nd_booking_date_number_from_front").innerHTML = ((day.getDate())+1 >= 10)? day.getDate(): '0' + day.getDate();
      document.querySelector("#nd_booking_date_number_to_front").innerHTML = ((end_date_value.getDate()) + 1 >= 10)? end_date_value.getDate(): '0' + end_date_value.getDate() ;
      

      document.querySelector("#nd_booking_date_month_from_front").innerHTML = mounthNamesShort[day.getMonth()];
      document.querySelector("#nd_booking_date_month_to_front").innerHTML = mounthNamesShort[end_date_value.getMonth()];

      document.querySelector("#nd_booking_archive_form_date_range_from").value = paramsActualUrl.nd_booking_archive_form_date_range_from[0];
      document.querySelector("#nd_booking_archive_form_date_range_to").value = paramsActualUrl.nd_booking_archive_form_date_range_to[0];

      if (paramsActualUrl.nd_booking_archive_form_guests[0]){
        document.querySelector(".nd_booking_guests_number").innerHTML= paramsActualUrl.nd_booking_archive_form_guests[0];
        document.querySelector("#nd_booking_archive_form_guests").value = paramsActualUrl.nd_booking_archive_form_guests[0];
      }


      setTimeout(() => {
        document.querySelector("#nd_booking_archive_form_date_range_from").value = paramsActualUrl.nd_booking_archive_form_date_range_from[0];
        document.querySelector("#nd_booking_archive_form_date_range_to").value = paramsActualUrl.nd_booking_archive_form_date_range_to[0];
        nd_booking_get_nights();
        nd_booking_sorting(1);
      }, 1000)
    }

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
      nextText: ">>",
      prevText: "<<",
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
        slide_range.style.display = 'block';

        nd_booking_get_nights();
        nd_booking_sorting(1);
      },
    });

    $("#nd_booking_archive_form_date_range_to").datepicker({
      defaultDate: "+5d",
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
      nextText: ">>",
      prevText: "<<",
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
        slide_range.style.display = 'block';

        nd_booking_get_nights();
        nd_booking_sorting(1);
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
      nd_booking_sorting(1);
    });

    $(".nd_booking_guests_decrease").click(function () {
      var value = $(".nd_booking_guests_number").text();

      if (value > 1) {
        value--;
        $(".nd_booking_guests_number").text(value);
        $("#nd_booking_archive_form_guests").val(value);
        nd_booking_sorting(1);
      }
    });
    
    // div
    $("#nd_booking_slider_range").slider({
      range: "min",
      value: 700,
      min: 1,
      max: 700,
      slide: function (event, ui) {
        $("#nd_booking_archive_form_max_price_for_day").val("" + ui.value);
      },
      change: function (event, ui) {
        nd_booking_sorting(1);
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

        nd_booking_sorting(1);
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

        nd_booking_sorting(1);
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
