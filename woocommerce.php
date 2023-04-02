<?php

function add_checkout_product($cart)
{
  if (!is_checkout()) return;
  if (!defined('DOING_AJAX')) return;
  // if (!isset($_GET['add-to-cart']) || !isset($_GET['price'])) return;

  // Remove all products from the cart except the current product
  $cart_items = $cart->get_cart();
  $cart_item = reset($cart_items);
  $cart_item['data']->set_price($cart_item['price']);
}
add_action('woocommerce_before_calculate_totals', 'add_checkout_product', 1, 1);

// Permite datos pasados al checkout
add_filter('woocommerce_add_cart_item_data', 'my_custom_add_to_cart', 10, 2);


function my_custom_add_to_cart($cart_item_data, $product_id)
{
  // Obtiene los datos personalizados desde la URL
  $price = isset($_GET['price']) ? floatval($_GET['price']) : 123;

  // Si los datos personalizados existen, agrega una clave personalizada al carrito de compras
  if ($price) {
    $cart_item_data['price'] = $price;
  }

  // Si los datos personalizados existen, agrega una clave personalizada al carrito de compras
  if ($product_id) {
    $cart_item_data['product_id'] = $product_id;
  }
  $booking_id = isset($_GET['booking_id']) ? intval($_GET['booking_id']) : 123;
  // Si los datos personalizados existen, agrega una clave personalizada al carrito de compras
  if ($product_id) {
    $cart_item_data['booking_id'] = $booking_id;
  }

  return $cart_item_data;
}

// Last product added only
add_action('woocommerce_add_to_cart', 'keep_last_cart_item');
function keep_last_cart_item($cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data)
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
