<?php
/**
 * Admin custom post type "alojamientos" options
 * 
 * # Main Setting
 * Max People
 * Room Size
 * Subtitle
 * Branch (Select added more options and delete options)
 * Quantity
 * Min Booking Day
 * 
 * # Price Settings
 * Woocommerce Item Integratiion
 * 
 * # Page Settings
 * Header Image
 * Image Position
 * Page Layout
 * Featured Image Replace (Slider)
 * 
 * # Package and rooms
 * Categories
 * Tags
 * 
 * # Smoobu Integration
 * ID
 * Calendar Disponibility 
*/ 

function aloja_main_box(){
  add_meta_box( 
    'main-settings', 
    __('Ajustes Principales'), 
    'aloja_main_call', 
    'alojamiento', // custom post type slug
    'side', 
    'low', 
  );
}
add_action('add_meta_boxes_alojamiento', 'aloja_main_box');


function aloja_price_box(){
  add_meta_box( 
    'price-settings', 
    __('Configuración Woocommerce'), 
    'aloja_price_call', 
    'alojamiento', // custom post type slug
    'side', 
    'low', 
  );
}
add_action('add_meta_boxes_alojamiento', 'aloja_price_box');


function aloja_page_box(){
  add_meta_box( 
    'a-page-settings', 
    __('Ajustes de Página'), 
    'aloja_page_call', 
    'alojamiento', // custom post type slug
    'side', 
    'low', 
  );
}
add_action('add_meta_boxes_alojamiento', 'aloja_page_box');


function aloja_package_box(){
  add_meta_box( 
    'package-settings', 
    __('Configuración de Categorías'), 
    'aloja_package_call', 
    'alojamiento', // custom post type slug
    'side', 
    'low', 
  );
}
add_action('add_meta_boxes_alojamiento', 'aloja_package_box');


function aloja_integration_box(){
  add_meta_box( 
    'integration-settings', 
    __('Integración Smoobu'), 
    'aloja_integration_call',
    'alojamiento', // custom post type slug 
    'side', 
    'low', 
  );
}
add_action('add_meta_boxes_alojamiento', 'aloja_integration_box');
