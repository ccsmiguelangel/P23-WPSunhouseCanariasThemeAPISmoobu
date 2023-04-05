<?php

add_action('woocommerce_before_calculate_totals', 'add_checkout_product', 1, 1);
function add_checkout_product($cart)
{
  if (!is_checkout()) return;
  if (!defined('DOING_AJAX')) return;
  // if (!isset($_GET['add-to-cart']) || !isset($_GET['price'])) return;

  // Remove all products from the cart except the current product
  $cart_items = $cart->get_cart();
  $cart_item = reset($cart_items);
  $cart_item['data']->set_price($cart_item['price']);
  $cart->add_fee('Limpieza del alojamiento', $cart_item['cleaning_charge']);
}


// Get data on checkout
add_filter('woocommerce_add_cart_item_data', 'my_custom_add_to_cart', 10, 2);
function my_custom_add_to_cart($cart_item_data, $product_id)
{
  $price = isset($_GET['price']) ? floatval($_GET['price']) : 0;
  $booking_id = isset($_GET['booking_id']) ? intval($_GET['booking_id']) : 0;
  $cleaning_charge = isset($_GET['cleaning_charge']) ? floatval($_GET['cleaning_charge']) : 0;

  if ($price) $cart_item_data['price'] = $price;
  if ($product_id) $cart_item_data['product_id'] = $product_id;
  if ($booking_id) $cart_item_data['booking_id'] = $booking_id;
  if ($cleaning_charge) $cart_item_data['cleaning_charge'] =  $cleaning_charge;

  return $cart_item_data;
}

// Last product added only
add_action('woocommerce_add_to_cart', 'keep_last_cart_item');
function keep_last_cart_item($cart_item_key)
{

  // Get cart
  $cart = WC()->cart;

  // Get cart items count
  $cart_items_count = count($cart->get_cart());

  // Remove all cart items except the last one
  if ($cart_items_count > 1) {
    foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
      if ($cart_item_key !== end(array_keys($cart->get_cart()))) {
        $cart->remove_cart_item($cart_item_key);
      }
    }
  }
}



add_action( 'woocommerce_payment_complete', 'enviar_informacion_a_api_despues_de_pago_aprobado' );

function enviar_informacion_a_api_despues_de_pago_aprobado( $order_id ) {
  if (!is_checkout()) return;

  // Obtener información del pedido
  $order = wc_get_order( $order_id );

  // Obtener los datos del cliente
  $reservationID = $_GET['booking_id'];
  $guestName = $order->get_billing_first_name(). ' '. $order->get_billing_last_name();
  $guestEmail = $order->get_billing_email();
  $guestPhone = $order->get_billing_phone();
  $address = $order->get_billing_address_1(). " ". $order->get_billing_address_2(). " ". $order->get_billing_city(). " ".$order->get_billing_state(). " ". $order->get_billing_postcode();
  $lang = "es";

  // Obtener el precio total del pedido
  $deposit = $order->get_total();
  $payload = array( 
    "reservationID" => $reservationID, 
    "guestName" => $guestName, 
    "guestEmail" => $guestEmail, 
    "guestPhone" => $guestPhone,
    "deposit" => $deposit,
    "language" => $lang,
  );

  $apiUrl = rest_url('alo')."/update_booking/?"."reservationID=".$payload['reservationID']."&guestName=".$payload['guestName']."&guestEmail=".$payload['guestEmail']."&guestPhone=".$payload['guestPhone']."&deposit=".$payload['deposit']."&language=".$payload['language'];

  $response = wp_remote_post( $apiUrl, array(
    'method' => 'GET',
  ) );

  // Verificar si la llamada fue exitosa
  if ( is_wp_error( $response ) ) {
      error_log( 'Error al enviar información a la API: ' . $response->get_error_message() );
  } else {
      // Loguear la respuesta de la API
      error_log( 'Respuesta de la API: ' . wp_remote_retrieve_body( $response ) );
  }

}
