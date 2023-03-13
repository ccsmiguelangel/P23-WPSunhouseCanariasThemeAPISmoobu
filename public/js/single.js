jQuery(document).ready(function () {
  jQuery(function ($) {
    function parseURLParams(url) {
      var queryStart = url.indexOf("?") + 1,
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
    
    //START function
    
    function nd_booking_sorting(paged) {

      // var nd_booking_sorting_result_loader = jQuery(
      //   '<div id="nd_booking_sorting_result_loader" class="nd_booking_position_absolute nd_booking_top_0 nd_booking_z_index_9 nd_booking_left_0 nd_booking_bg_white  nd_booking_cursor_progress nd_booking_height_100_percentage nd_booking_width_100_percentage"></div>'
      // ).hide();
      // jQuery("#nd_booking_archive_search_masonry_container").append(
      //   nd_booking_sorting_result_loader
      // );
      // nd_booking_sorting_result_loader.fadeIn("slow");


      //variables passed on function
      var nd_booking_archive_form_date_range_from = jQuery(
        "#nd_booking_archive_form_date_range_from"
      ).val();
      var nd_booking_archive_form_date_range_to = jQuery(
        "#nd_booking_archive_form_date_range_to"
      ).val();
      var nd_booking_archive_form_guests = jQuery(
        "#nd_booking_archive_form_guests"
      ).val();

      let date_range_form = p23_changeDateFormat(nd_booking_archive_form_date_range_from,"yyyy-MM-dd");
      let date_range_to =   p23_changeDateFormat(nd_booking_archive_form_date_range_to,"yyyy-MM-dd");
      let paramsActualUrl = parseURLParams(actualUrl);

      let consult_data = {
        start_date: date_range_form,
        end_date: date_range_to,
        guests: nd_booking_archive_form_guests,
        post_id: alo_localize_script.post_id,
        price: paramsActualUrl.nd_booking_archive_form_price[0]
      }; 
      jQuery.param()
      jQuery.ajax({
        type: 'GET',
        url: `${alo_localize_script.rest_url}/single/`,
        data: consult_data,
        success: function nd_booking_sorting_result(nd_booking_sorting_result) {
          document.querySelectorAll('.alocard__list').forEach((item) => {
            item.innerHTML= '';
          });

          console.log(consult_data);
          console.log(nd_booking_sorting_result);
          
          let response = `<div class="alocard__list elementor-column elementor-col-100 elementor-top-column nd_booking_archive_search_masonry_container" data-id="4fa7db83" data-element_type="column">${nd_booking_sorting_result.message}</div>`;
          
          $('#p23_message').append(response);

          jQuery('#p23_loader').css('display', 'none');
          (nd_booking_sorting_result.data)? $('#nd_booking_submit').css('display', 'block') : $('#nd_booking_submit').css('display', 'none');
     
        },
        beforeSend: function(){
          document.querySelectorAll('.alocard__list').forEach((item) => {
            item.innerHTML= '';
          })

          jQuery('#p23_loader').css('display', 'flex');   
        }
      });
      $('#p23_message').append(consult_data)
    }
    // END function

    // break

    let button = document.querySelector('#nd_booking_submit');
    document.addEventListener('click', ()=> );


    // break
    
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
    if(paramsActualUrl){
      let day = new Date(paramsActualUrl.nd_booking_archive_form_date_range_from[0]);
      let end_date_value = new Date(paramsActualUrl.nd_booking_archive_form_date_range_to[0]);
      
      let nights = end_date_value.getTime() - day.getTime();
      nights = new Date(nights).getDate();

      $(".nd_booking_nights_number").text(nights);
      
      document.querySelector("#nd_booking_date_number_from_front").innerHTML = ((day.getDate()+1) >= 10)? day.getDate(): '0' + day.getDate();
      document.querySelector("#nd_booking_date_number_to_front").innerHTML = ((end_date_value.getDate()+1) >= 10)? end_date_value.getDate(): '0' + end_date_value.getDate();
      
      document.querySelector("#nd_booking_date_month_from_front").innerHTML = mounthNamesShort[day.getMonth()];
      document.querySelector("#nd_booking_date_month_to_front").innerHTML = mounthNamesShort[end_date_value.getMonth()];
      
      document.querySelector("#nd_booking_archive_form_guests").value = paramsActualUrl.nd_booking_archive_form_guests[0];
      document.querySelector("#nd_booking_archive_form_date_range_from").value = paramsActualUrl.nd_booking_archive_form_date_range_from[0];
      document.querySelector("#nd_booking_archive_form_date_range_to").value = paramsActualUrl.nd_booking_archive_form_date_range_to[0];

      nd_booking_get_nights();
      nd_booking_sorting(1);
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

        nd_booking_get_nights();
        nd_booking_sorting(1);
      },
    });

    $("#nd_booking_archive_form_date_range_from").datepicker("setDate", "+0");
    $("#nd_booking_archive_form_date_range_to").datepicker("setDate", "+5");

    // break
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

    // Break
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
  });
});
