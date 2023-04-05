function sendOrderDataToAPI(event) {
  // const reservationID = getParameterByName('booking_id');
  // const guestName = document.getElementById('billing_first_name').value + ' ' + document.getElementById('billing_last_name').value;
  // const guestEmail = document.getElementById('billing_email').value;
  // const guestPhone = document.getElementById('billing_phone').value;
  // const address = document.getElementById('billing_address_1').value + " " + document.getElementById('billing_address_2').value + " " + document.getElementById('billing_city').value + " " + document.getElementById('billing_state').value + " " + document.getElementById('billing_postcode').value;
  // const lang = "es";
  event.preventDefault();

  // const deposit = document.getElementById('order_total').value;
  const payload = {
    "reservationID": alo_thankyou_data.reservationID,
    "guestName": alo_thankyou_data.guestName,
    "guestEmail": alo_thankyou_data.guestEmail,
    "guestPhone": alo_thankyou_data.guestPhone,
    "deposit": alo_thankyou_data.deposit,
    "language": alo_thankyou_data.lang
  };

  fetch(alo_thankyou_data.apiUrl, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(payload)
  }).then(response => {
    if (response.ok) {
      // Redirect to thank you page
      window.location.href = alo_thankyou_data.thankyouUrl;
    } else {
      console.error('Error sending data to API');
    }
  }).catch(error => {
    console.error('Error sending data to API:', error);
  });
}

// function getParameterByName(name) {
//   name = name.replace(/[\[\]]/g, '\\$&');
//   var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
//     results = regex.exec(window.location.search);
//   if (!results) return null;
//   if (!results[2]) return '';
//   return decodeURIComponent(results[2].replace(/\+/g, ' '));
// }

// const status = document.querySelector('.woocommerce-order-overview__status').textContent.trim();
// if (status === 'Processing') {
sendOrderDataToAPI();
// }
