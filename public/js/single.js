jQuery(document).ready(function () {
  jQuery(function ($) {
    let consult_data;
    //START function
    let response_data;
    let booking_id;
    onLoadSingleAlo();
    function paramURLUndefined(paramsUrl){
      if (!isset(paramsUrl)) return false;
      
      let response = {};

      response.nd_booking_archive_form_guests = [false];
      response.nd_booking_archive_form_date_range_from = [false];
      response.nd_booking_archive_form_date_range_to = [false];
      response.nd_booking_archive_form_guests = [1];
      response.nd_booking_archive_form_price = [false];
    }
    function isset(letiable) {
      if(typeof letiable === "undefined") return false;
      if( letiable === null ) return false;
      if( letiable === '' ) return false;
      if ( letiable === 0 ) return false;
      return true;
    }
    function isValidDate(textDate) {
      let validation = new Date(null); 
      if(isNaN(textDate) || textDate === '' || textDate === null || textDate === undefined || textDate === 0 || textDate === false || textDate === validation) return false
      return true;
    }
    
    function parseURLParams(url) {
      let queryStart = url.indexOf("?") + 1,
        queryEnd = url.indexOf("#") + 1 || url.length + 1,
        query = url.slice(queryStart, queryEnd - 1),
        pairs = query.replace(/\+/g, " ").split("&"),
        parms = {},
        i,
        n,
        v,
        nv;

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


    function nd_booking_sorting(paged) {
      let actualUrl = window.location.href;
      let paramsActualUrl = parseURLParams(actualUrl);


      //letiables passed on function
      let nd_booking_archive_form_date_range_from = jQuery(
        "#nd_booking_archive_form_date_range_from"
      ).val();
      let nd_booking_archive_form_date_range_to = jQuery(
        "#nd_booking_archive_form_date_range_to"
      ).val();
      let nd_booking_archive_form_guests = jQuery(
        "#nd_booking_archive_form_guests"
      ).val();

      let date_range_form = p23_changeDateFormat(
        nd_booking_archive_form_date_range_from,
        "yyyy-MM-dd"
      );
      let date_range_to = p23_changeDateFormat(
        nd_booking_archive_form_date_range_to,
        "yyyy-MM-dd"
      );
      let lastPrice;
      
      if(!isset(paramsActualUrl)){
        lastPrice = 5000000000000;
        paramsActualUrl = paramURLUndefined(paramsActualUrl); 
      } else {
        lastPrice = paramsActualUrl.nd_booking_archive_form_price[0];
      }
      consult_data = {
        start_date: date_range_form,
        end_date: date_range_to,
        guests: nd_booking_archive_form_guests,
        post_id: alo_localize_script.post_id,
        price: lastPrice
      };
      jQuery.param();
      jQuery.ajax({
        type: "GET",
        url: `${alo_localize_script.rest_url}/single/`,
        data: consult_data,
        success: function nd_booking_sorting_result(nd_booking_sorting_result) {
          document
            .querySelectorAll(".alocard__list")
            .forEach((item) => (item.innerHTML = ""));
          response_data = nd_booking_sorting_result;

          let response = `
          <div style="display: flex; flex-direction: column; padding: 0 5px;" class="alocard__list elementor-column elementor-col-100 elementor-top-column nd_booking_archive_search_masonry_container" data-id="4fa7db83" data-element_type="column">
            <div class="alocard__list--message"><h5 style="color: #fff; margin: 5px 0;">${nd_booking_sorting_result.message}</h5></div>          `;

          let can_book = "Alojamiento disponible.";

          if (nd_booking_sorting_result.message == can_book) {
            response =
              response +
              `
            <div class="alocard__list--table">
              <table style="width:100%">
                <tr>
                  <th>Título</th>
                  <th>Precio</th>
                </tr>
                <tr>
                  <td>Precio Alojamiento</td>
                  <td>€${nd_booking_sorting_result.data.price}</td>
                </tr>
                <tr>
                  <td>Precio por Limpieza</td>
                  <td>€${nd_booking_sorting_result.data.clening_charge}</td>
                </tr>
                <tr>
                  <td><strong>TOTAL</strong></td>
                  <td>€${nd_booking_sorting_result.data.total}</td>
                </tr>
              </table>
            </div>
          </div>
            `;
          } else {
            response = response + `</div>`;
          }

            $("#p23_message").append(response);

            jQuery("#p23_loader").css("display", "none");
            nd_booking_sorting_result.data
              ? $("#nd_booking_submit").css("display", "block")
              : $("#nd_booking_submit").css("display", "none");
          },
          beforeSend: function () {
            document
              .querySelectorAll(".alocard__list")
              .forEach((item) => (item.innerHTML = ""));

            jQuery("#p23_loader").css("display", "flex");
          },
        });
      $("#p23_message").append(consult_data);
    }
    // END function

    // break

    let booking_submit = document.querySelector("#nd_booking_submit");
    let booking_section = document.querySelector(
      "#nd_booking_single_cpt_1_calendar_btn"
    );
    booking_submit.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();

      booking_section.innerHTML = "";

      let booking_data = {
        arrivalDate: consult_data.start_date,
        depatureDate: consult_data.end_date,
        appartemntId: response_data.data.smoobu_id,
        // 'price': response_data.data.price,
        // 'cleaning_charge': response_data.data.clening_charge,
        price: response_data.data.total,
        adults: consult_data.guests,
      };
      jQuery
        .ajax({
          type: "GET",
          url: `${alo_localize_script.rest_url}/create_booking/`,
          data: booking_data,
          success: function result(res) {
            booking_id = res.id;
          },
          beforeSend: function () {
            document
              .querySelectorAll(".alocard__list")
              .forEach((item) => (item.innerHTML = ""));

            jQuery("#p23_loader").css("display", "flex");
          },
        })
        .done(() => {
          window.location.href = `${alo_localize_script.woo_url}&booking_id=${booking_id}&price=${response_data.data.price}&cleaning_charge=${response_data.data.clening_charge}`;
        });
    });

    // break
    function onLoadSingleAlo(){
      let actualUrl = window.location.href;
      let paramsActualUrl = parseURLParams(actualUrl);
      const mounthNamesShort = [
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
      if (isset(paramsActualUrl)) {
        let day = isset(paramsActualUrl.nd_booking_archive_form_date_range_from[0])
          ? new Date(paramsActualUrl.nd_booking_archive_form_date_range_from[0])
          : false;
        let end_date_value = isset(
          paramsActualUrl.nd_booking_archive_form_date_range_to[0]
        )
          ? new Date(paramsActualUrl.nd_booking_archive_form_date_range_to[0])
          : false;
        console.log(day);
        console.log(end_date_value);
        let guest = paramsActualUrl.nd_booking_archive_form_guests[0];
        let nights;
        if (isValidDate(end_date_value)) nights = end_date_value.getTime() - day.getTime();
        end_date_value ? (nights = new Date(nights).getDate()) : (nights = "-");

        $(".nd_booking_nights_number").text(nights);

        if (isValidDate(day))
          document.querySelector("#nd_booking_date_number_from_front").innerHTML =
            day.getDate() + 1 >= 10 ? day.getDate() : "0" + day.getDate();
        if (isValidDate(end_date_value))
          document.querySelector("#nd_booking_date_number_to_front").innerHTML =
            end_date_value.getDate() + 1 > 10
              ? end_date_value.getDate()
              : "0" + end_date_value.getDate();

        if (isValidDate(day))
          document.querySelector("#nd_booking_date_month_from_front").innerHTML =
            mounthNamesShort[day.getMonth()];
        if (isValidDate(end_date_value))
          document.querySelector("#nd_booking_date_month_to_front").innerHTML =
            mounthNamesShort[end_date_value.getMonth()];

        document.querySelector(".nd_booking_guests_number").innerHTML = guest;
        if (isValidDate(day))
          document.querySelector(
            "#nd_booking_archive_form_date_range_from"
          ).value = paramsActualUrl.nd_booking_archive_form_date_range_from[0];
        if (end_date_value)
          document.querySelector("#nd_booking_archive_form_date_range_to").value =
            paramsActualUrl.nd_booking_archive_form_date_range_to[0];
           

        if (isValidDate(day) && isValidDate(end_date_value)) {
          nd_booking_get_nights();
          nd_booking_sorting(1);
        } else {
          $("#nd_booking_date_number_from_front").text("-");
          $("#nd_booking_date_number_to_front").text("-");
          $(".nd_booking_nights_number").text("-");
          $('#nd_booking_date_month_from_front').text("");
        }
      } else{
        $("#nd_booking_date_number_from_front").text("-");
        $("#nd_booking_date_number_to_front").text("-");
        $(".nd_booking_nights_number").text("-");
        $('#nd_booking_date_month_from_front').text("");
      }
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
        let minDate = $(this).datepicker("getDate");
        let newMin = new Date(minDate.setDate(minDate.getDate() + 5));
        $("#nd_booking_archive_form_date_range_to").datepicker(
          "option",
          "minDate",
          newMin
        );

        let nd_booking_input_date_from = $(
          "#nd_booking_archive_form_date_range_from"
        ).val();
        let nd_booking_date_number_from = nd_booking_input_date_from.substring(
          3,
          5
        );
        $("#nd_booking_date_number_from").val(nd_booking_date_number_from);
        let nd_booking_input_date_to = $(
          "#nd_booking_archive_form_date_range_to"
        ).val();
        let nd_booking_date_number_to = nd_booking_input_date_to.substring(
          3,
          5
        );
        $("#nd_booking_date_number_to").val(nd_booking_date_number_to);

        $("#nd_booking_date_number_from_front").text(
          nd_booking_date_number_from
        );
        let nd_booking_date_month_from = $("#nd_booking_date_month_from").val();
        $("#nd_booking_date_month_from_front").text(nd_booking_date_month_from);

        $("#nd_booking_date_number_to_front").text(nd_booking_date_number_to);
        let nd_booking_date_month_to = $("#nd_booking_date_month_to").val();
        $("#nd_booking_date_month_to_front").text(nd_booking_date_month_to);

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
        let nd_booking_input_date_from = $(
          "#nd_booking_archive_form_date_range_from"
        ).val();
        let nd_booking_date_number_from = nd_booking_input_date_from.substring(
          3,
          5
        );
        $("#nd_booking_date_number_from").val(nd_booking_date_number_from);
        let nd_booking_input_date_to = $(
          "#nd_booking_archive_form_date_range_to"
        ).val();
        let nd_booking_date_number_to = nd_booking_input_date_to.substring(
          3,
          5
        );
        $("#nd_booking_date_number_to").val(nd_booking_date_number_to);

        $("#nd_booking_date_number_from_front").text(
          nd_booking_date_number_from
        );
        let nd_booking_date_month_from = $("#nd_booking_date_month_from").val();
        $("#nd_booking_date_month_from_front").text(nd_booking_date_month_from);

        $("#nd_booking_date_number_to_front").text(nd_booking_date_number_to);
        let nd_booking_date_month_to = $("#nd_booking_date_month_to").val();
        $("#nd_booking_date_month_to_front").text(nd_booking_date_month_to);

        nd_booking_get_nights();
        nd_booking_sorting(1);
      },
    });

    $("#nd_booking_archive_form_date_range_from").datepicker("setDate", "+0");
    $("#nd_booking_archive_form_date_range_to").datepicker("setDate", "+5");

    // break
    function nd_booking_get_nights() {
      let nd_booking_archive_form_date_range_from = $(
        "#nd_booking_archive_form_date_range_from"
      ).val();
      let nd_booking_archive_form_date_range_to = $(
        "#nd_booking_archive_form_date_range_to"
      ).val();
      let nd_booking_start = new Date(nd_booking_archive_form_date_range_from);
      let nd_booking_end = new Date(nd_booking_archive_form_date_range_to);
      let nd_booking_nights_number = Math.round(
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

    // Break
    $(".nd_booking_guests_increase").click(function () {
      let value = $(".nd_booking_guests_number").text();
      value++;
      $(".nd_booking_guests_number").text(value);
      $("#nd_booking_archive_form_guests").val(value);
      nd_booking_sorting(1);
    });

    $(".nd_booking_guests_decrease").click(function () {
      let value = $(".nd_booking_guests_number").text();

      if (value > 1) {
        value--;
        $(".nd_booking_guests_number").text(value);
        $("#nd_booking_archive_form_guests").val(value);
        nd_booking_sorting(1);
      }
    });
  });
});