<?php
// JS & CSS Archive Alojamientos
function p23_script_archive_alojamiento_queue(){
  if(!is_post_type_archive('alojamiento')) return;
  
  wp_register_style('p23_archive_css', get_stylesheet_directory_uri().'/public/css/archive.css');
  wp_enqueue_style('p23_archive_css');

  wp_register_style('font_awesome_archive', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css');
  wp_enqueue_style('font_awesome_archive');

  wp_register_script('jQuery_ui_archive', 'https://code.jquery.com/ui/1.13.2/jquery-ui.js');

  wp_register_script('p23_archive_js', get_stylesheet_directory_uri().'/public/js/archive.js', array('jquery', 'jQuery_ui_archive'), '6.0.3', true);
  wp_enqueue_script('p23_archive_js');

  wp_localize_script('p23_archive_js', 'alo_localize_script', array(
    "rest_url" => rest_url('alo')
  ));
}
add_action("wp_enqueue_scripts","p23_script_archive_alojamiento_queue");


function p23_script_single_alojamiento_queue(){
  if (!is_singular('alojamiento')) return;

  wp_register_style('p23_single_css', get_stylesheet_directory_uri().'/public/css/single.css');
  wp_enqueue_style('p23_single_css');
  
  wp_enqueue_style('font_awesome_archive');

  wp_register_style('font_awesome_archive', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css');
  wp_enqueue_style('font_awesome_archive');

  wp_register_script('jQuery_ui_archive', 'https://code.jquery.com/ui/1.13.2/jquery-ui.js');

  wp_register_script('p23_single_js', get_stylesheet_directory_uri().'/public/js/single.js', array('jquery', 'jQuery_ui_archive'), '6.0.3', true);
  wp_enqueue_script('p23_single_js');
  

  $woo_id = get_post_meta(get_the_ID(), '_alojamiento_woo_id', true);
  $checkout_url = wc_get_checkout_url() . '?add-to-cart=' . $woo_id;

  wp_localize_script('p23_single_js', 'alo_localize_script', array(
    "rest_url" => rest_url('alo'),
    "post_id" =>  get_the_ID(),
    "woo_url" => $checkout_url,
  ));
}
add_action("wp_enqueue_scripts","p23_script_single_alojamiento_queue");

function p23_script_checkout(){
  // Validations
  if (!is_checkout()) return;
  if (!isset($_GET['booking_id'])) {
    header("Location: ". get_post_type_archive_link('alojamiento'));
    exit();
  };
  if (!isset($_GET['add-to-cart'])) {
    header("Location: ". get_post_type_archive_link('alojamiento'));
    exit();
  };
  if (!isset($_GET['cleaning_charge'])) {
    header("Location: ". get_post_type_archive_link('alojamiento'));
    exit();
  }
  if (!isset($_GET['price'])) {
    header("Location: ". get_post_type_archive_link('alojamiento'));
    exit();
  };



  wp_register_script('p23_checkout_js', get_stylesheet_directory_uri().'/public/js/checkout.js');
  wp_enqueue_script('p23_checkout_js');

  wp_localize_script('p23_checkout_js', 'alo_localize_script', array(
    "booking_id" => intval($_GET['booking_id']),
    "product_id" => intval($_GET['add-to-cart']),
    "rest_url" => rest_url('alo'),
    "book_url" => get_post_type_archive_link('alojamiento'),
    "price" => floatval($_GET['price']),
    "cleaning_charge" => floatval($_GET['cleaning_charge']),
    "total" => (floatval($_GET['cleaning_charge']) + floatval($_GET['price'])),
  ));
}
add_action("wp_enqueue_scripts","p23_script_checkout");

// NOT WOEK
// add_action( 'woocommerce_before_checkout_form', 'cartflows_update_price_from_url' );
// add_action( 'init', 'cartflows_update_price_from_url' );
// function cartflows_update_price_from_url() {
//   $price = $_GET['price'];
//   update_option( 'cartflows_gateway_price', $price );
// }