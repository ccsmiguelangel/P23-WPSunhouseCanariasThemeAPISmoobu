function sendOrderDataToAPI(event) {

  // const deposit = document.getElementById('order_total').value;
  const shopData = JSON.parse(localStorage.shopData);
  const thankyouData = alo_thankyou_data.payload;

  const payload = {
    "reservationId": shopData.booking_id,
    "guestName": thankyouData.guestName,
    "guestEmail": thankyouData.guestEmail,
    "guestPhone": thankyouData.guestPhone,
    "deposit": thankyouData.deposit,
    "language": 'es'
  };
console.log(payload);
  fetch(alo_thankyou_data.apiUrl, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(payload)
  }).then(response => {
    if (response.ok) {
      // Redirect to thank you page
      console.log(response)
      localStorage.removeItem('cartflows_checkout_form');
      localStorage.removeItem('shopData');
    } else {
      console.error('Error sending data to API');
    }
  }).catch(error => {
    console.error('Error sending data to API:', error);
  });
}

sendOrderDataToAPI();
// }
