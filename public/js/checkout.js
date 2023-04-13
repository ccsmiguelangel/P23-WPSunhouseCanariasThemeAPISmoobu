let homeUrl = location.protocol + "//" + location.hostname + location.pathname + "/" + "alojamientos" ;
//  alo_localize_script data validation

if(!alo_localize_script.product_id) window.location.href = homeUrl;
if(!alo_localize_script.booking_id) window.location.href = homeUrl;
if(!alo_localize_script.price) window.location.href = homeUrl;
if(!alo_localize_script.cleaning_charge) window.location.href = homeUrl;

let updateSmoobu = `${alo_localize_script.rest_url}/update_booking/`
let cancelSmoobu = `${alo_localize_script.rest_url}/cancel_resevation/?reservationId=${alo_localize_script.booking_id}`  

function fetchToCancelSmoobu(){
  fetch(cancelSmoobu)
  .then(response => {
    // manejar la respuesta de la API aquí
    // por ejemplo, procesar los datos JSON devueltos por la API
    return response.json();
  })
  .then(data => {
    // hacer algo con los datos procesados aquí
    // por ejemplo, mostrarlos en la página
    console.log(data);

    // redirigir al usuario a la página de inicio
    window.location.href = `${alo_localize_script.book_url}`;
  })
  .catch(error => {
    // manejar cualquier error que se produzca aquí
    console.error(error);
  });
}


// BEGTIMER

  // Obtener la hora actual
let startTime = Date.now();

  // Verificar si la hora actual ya ha sido almacenada en localStorage
let storedTime = localStorage.getItem("startTime");
if (storedTime) {
    // Si la hora ya ha sido almacenada, utilizarla como hora de inicio
  startTime = parseInt(storedTime);
} else {
    // Si la hora no ha sido almacenada, almacenarla en localStorage
  localStorage.setItem("startTime", startTime);
}

  // Función que se ejecuta después de 15 minutos
function onFinish() {
  console.log("Han culminado el tiempo de reserva!");
    // Eliminar la hora almacenada en localStorage cuando el tiempo ha transcurrido
  localStorage.removeItem("startTime");
  // fetchToCancelSmoobu();
}

  // Establecer el temporizador
let duration = 60000; // 15 minutos = 900000 milisegundos
localStorage.setItem('shopData', JSON.stringify(alo_localize_script));
setTimeout(onFinish, duration);

  // Función que actualiza el temporizador cada segundo
function updateTimer() {
  let elapsedTime = Date.now() - startTime;
  let remainingTime = duration - elapsedTime;
  // console.log("Tiempo restante: " + (remainingTime / 1000) + " segundos");
}

  // Establecer el temporizador para que se actualice cada segundo
setInterval(updateTimer, 1000);

// ENDTIMER

// BEG SEND DATA SMOOBU
// jQuery(document).ready(function($) {
//   $('#checkout').submit(function(event) {
//     // Evitar que el formulario se envíe y recargue la página
//     event.preventDefault();

//     // Obtener los datos del formulario y convertirlos en un objeto JSON
//     var formData = {};
//     $('#checkout').serializeArray().forEach(function(item) {
//       formData[item.name] = item.value;
//     });

//     // Realizar una llamada Fetch hacia tu API con los datos del formulario en el cuerpo
//     fetch('https://tu-api.com/update_booking/', {
//       method: 'POST',
//       headers: {
//         'Content-Type': 'application/json'
//       },
//       body: JSON.stringify(formData)
//     })
//     .then(function(response) {
//       // Verificar la respuesta de la API y redirigir al usuario a la página de agradecimiento
//       if (response.ok) {
//         window.location.href = 'https://tu-sitio.com/gracias';
//       } else {
//         console.log('Error al enviar datos al API');
//       }
//     })
//     .catch(function(error) {
//       console.log('Error al enviar datos al API: ' + error);
//     });
//   });
// });

// END SEND DATA SMOOBU
