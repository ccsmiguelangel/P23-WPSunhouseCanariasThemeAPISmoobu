<?php

require( 'cpt-taxonomy.php' );


add_theme_support( 'post-thumbnails' ); //Add thumbnail functionability

function know_add_custom_post_type() {
  

  $labels = array(
    'name' => 'Alojamiento',
    'singular_name' => 'Alojamiento',
    'all_items' => 'Todos los Alojamientos',
    'add_new' => 'Añadir Alojamiento',
    'edit_item' => __( 'Editar Alojamiento', 'alojamiento_pluin' ),
    'not_found' => __( 'Alojamientos no disponibles', 'alojamiento_plugin' ),
    'menu_name' => 'Alojamiento',
    'set_featured_image' => __('Agregar imagen')
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Alojamientos para listar en catálogo',
    'public' => true,
    'publicly_queryable' => true, // call from code
    'show_in_menu' => true, // shows section menu custom post
    'query_var' => true, // Add reference values
    'rewrite' => array( 'slug' => 'alojamiento' ), // site url
    'capability_type' => 'post', // Display Permissions (Editor)
    'has_archive' => true, // Page to list all 
    'hierarchical' => false, // Gerarquía (Electrodomesticos > Heladeras)
    'meny_position' => 2, // Admin menu
    // Add title, edit, author and thumbnail for custom post
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom' ), 
    // 'taxonomies' => array( 'category', 'post_tag', 'zonas', 'servicios' ), 
    'taxonomies' => array( 'zonas', 'servicios' ), 
    'show_in_rest' => true, //Generate in api rest
    'menu_icon' => 'dashicons-admin-multisite', // Menu icon on admin dashboard
    'show_ui' => true,
		'map_meta_cap' => true,
  );


  register_post_type('alojamiento', $args); //It's a convention to use singular param name

}

add_action("init", "know_add_custom_post_type");// register hook post type
