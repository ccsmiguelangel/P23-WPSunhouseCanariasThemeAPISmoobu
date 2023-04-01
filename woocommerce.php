<?php

function add_checkout_product($cart)
{
  if (!is_checkout()) return;
  if (!defined('DOING_AJAX')) return;
  // if (!isset($_GET['add-to-cart']) || !isset($_GET['price'])) return;
  
 
  // Get the current product ID and price
  $product_id = intval($_GET['add-to-cart']);
  $product_price = ($_GET['price'] == 0) ? floatval($_GET['price']):1;
  error_log($_GET['price']); // imprime un mensaje en el registro de errores

  // Remove all products from the cart except the current product
  $cart_items = $cart->get_cart();
  foreach ($cart_items as $cart_item_key => $cart_item) {
    if ($cart_item['id'] != $product_id) {
      $cart->remove_cart_item($cart_item_key);
    }
    else {
      $cart_item['data']->set_price(50);
    }
  }
}
add_action('woocommerce_before_calculate_totals', 'add_checkout_product', 1, 1);