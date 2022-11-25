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
  
  wp_localize_script('p23_single_js', 'alo_localize_script', array(
    "rest_url" => rest_url('alo'),
    "post_id" =>  get_the_ID()
  ));
}
add_action("wp_enqueue_scripts","p23_script_single_alojamiento_queue");
