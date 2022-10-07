<?php

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
  $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
  $theme = wp_get_theme();
  wp_enqueue_style(
    $parenthandle,
    get_template_directory_uri() . '/style.css',
    array(),  // if the parent theme code has a dependency, copy it to here
    $theme->parent()->get('Version')
  );
  wp_enqueue_style(
    'child-style',
    get_stylesheet_uri(),
    array($parenthandle),
    $theme->get('Version') // this only works if you have Version in the style header
  );
}



// function set_default_editor( $type ) {
//   global $post_type;
//   if('alojamiento' == $post_type) 
//   return 'html';
//   return $type;
// }
// add_filter('wp_default_editor', 'set_default_editor');

if (is_post_type_archive('alojamiento')) {
  function f_force_ssl() {
    if (!is_ssl()) {
      wp_redirect('https://' . $_SERVER['HTTP_HOST'] .
      $_SERVER['REQUEST_URI'], 301);
      exit();
    }
  }
  add_action('template_redirect', 'f_force_ssl');
}


function allow_unfiltered_html_multisite( $caps, $cap, $user_id ) { 
  if ( 'unfiltered_html' === $cap && user_can( $user_id, 'editor' ) ) {
      $caps = array( 'unfiltered_html' );
  }

  return $caps;
}

add_filter( 'map_meta_cap', 'allow_unfiltered_html_multisite', 10, 3 );

function add_cap_custom_role() {
  $role = get_role( 'editor' );
  $role->add_cap( 'unfiltered_html' );
}
add_action( 'init', 'add_cap_custom_role' );
