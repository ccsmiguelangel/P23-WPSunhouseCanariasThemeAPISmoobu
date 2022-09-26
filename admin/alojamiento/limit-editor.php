<?php

// global $wp_roles;
// // var_dump($wp_roles);
// function add_theme_caps() {
//   // $editor = get_role('editor');
//   $admin = get_role('administrator');

  // $editor_delete_caps = array(
  //   'edit_posts',
  //   'edit_published_posts',
  //   'edit_private_posts',
  //   'publish_posts',
  //   'read_private_posts',
  //   'delete_posts',
  //   'delete_published_posts',
  //   'delete_others_posts',
  //   'delete_private_posts',
  //   'edit_pages',
  //   'edit_published_pages',
  //   'delete_private_pages',
  //   'publish_pages',
  //   'delete_pages',
  //   'edit_others_pages',
  //   'delete_published_pages',
  //   'moderate_comments',
  //   'manage_categories',
  //   'manage_links',
  //   // 'unfiltered_html',
  //   'edit_private_pages',
  //   'read_private_pages',
  // );

  // foreach ($editor_delete_caps as $cap){
  //   $editor->remove_cap($cap);
  // }

  // $editor_add_caps = array(
  //   'edit_alojamiento',
  //   'edit_alojamientos',
  //   'edit_other_alojamientos',
  //   'publish_alojamientos',
  //   'edit_alojamiento_terms',
  //   'delete_alojamiento_terms',
  //   'manage_alojamiento',
  //   'assign_alojamiento',
  //   'read_alojamiento',
  //   'read_private_alojamientos',
  //   'delete_alojamiento',
  //   'smartslider',
  //   'smartslider_config',
  //   'smartslider_delete',
  //   'smartslider_edit',
  // );
  // foreach ($editor_add_caps as $cap){
  //   $editor->add_cap($cap);
  // }

//   $admin_add_caps = array(
//     'edit_alojamiento',
//     'edit_alojamientos',
//     'edit_other_alojamientos',
//     'publish_alojamientos',
//     'read_alojamiento',
//     'read_private_alojamientos',
//     'delete_alojamiento',
//     'edit_alojamiento_terms',
//     'delete_alojamiento_terms',
//     'manage_alojamiento',
//     'assign_alojamiento',
//   );
//   foreach ($admin_add_caps as $cap){
//     $admin->add_cap($cap); 
//   }
// }

// function allow_unfiltered_html_multisite( $caps, $cap, $user_id ) { 
//   if ( 'unfiltered_html' === $cap && user_can( $user_id, 'editor' ) ) {
//       $caps = array( 'unfiltered_html' );
//   }

//   return $caps;
// }

// add_filter( 'map_meta_cap', 'allow_unfiltered_html_multisite', 10, 3 );

// add_action( 'admin_init', 'add_theme_caps');

// // function change_capabilities_of_alojamiento( $args, $post_type ){
// //   // Do not filter any other post type
// //   if ( 'alojamiento' !== $post_type ) {
// //     // Give other post_types their original arguments
// //     return $args;
// //   }

// //   // Change the capabilities of the "alojamiento" post_type
// //   $args['capabilities'] = array(
// //     'edit_post' => 'edit_alojamiento',
// //     'edit_posts' => 'edit_alojamientos',
// //     'edit_others_posts' => 'edit_other_alojamientos',
// //     'publish_posts' => 'publish_alojamientos',
// //     'read_post' => 'read_alojamiento',
// //     'read_private_posts' => 'read_private_alojamientos',
// //     'delete_post' => 'delete_alojamiento',
// //     // 'manage_terms'  => 'manage_alojamiento',
// //     // 'assign_terms'  => 'assign_alojamiento',
// //     // 'edit_terms' => 'edit_alojamiento_terms',
// //     // 'delete_terms' => 'delete_alojamiento_terms',

// //   );

// //   // Give the alojamiento post type it's arguments
// //   return $args;

// // }
// // add_filter( 'register_post_type_args', 'change_capabilities_of_alojamiento' , 10, 2 );


// function add_cap_custom_role() {
//   $role = get_role( 'editor' );
  
//   if ( !$role->capabilities[ 'manage_options' ] && ) {
//     $role->add_cap( 'manage_options' );
//     $role->add_cap( 'edit_posts' );
//   }
// }
// add_action( 'init', 'add_cap_custom_role' );
