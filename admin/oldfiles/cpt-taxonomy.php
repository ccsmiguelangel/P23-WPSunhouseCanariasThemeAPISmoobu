<?php 
require('cpt-image-taxonomy.php');

// https://www.wpbeginner.com/wp-tutorials/create-custom-taxonomies-wordpress/#:~:text=A%20WordPress%20taxonomy%20is%20a,to%20organize%20your%20blog%20posts.
//hook into the init action and call create_zona_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_zona_nonhierarchical_taxonomy', 0 );
 
function create_zona_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Zonas', 'Zonas' ),
    'singular_name' => _x( 'Zona', 'Zonas' ),
    'search_items' =>  __( 'Buscar Zonas' ),
    'popular_items' => __( 'Zonas Populares' ),
    'all_items' => __( 'Todas las Zonas' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Zona' ), 
    'update_item' => __( 'Actualizar Zona' ),
    'add_new_item' => __( 'Agregar Nueva Zona' ),
    'new_item_name' => __( 'Nombre de Nueva Zona' ),
    'separate_items_with_commas' => __( 'Separar Zonas con Coma' ),
    'add_or_remove_items' => __( 'Agregar o Eliminar Zonas' ),
    'choose_from_most_used' => __( 'Elegir Zona más Usada' ),
    'menu_name' => __( 'Zonas' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('zonas','zonas',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'zona' ),
  ));
}



add_action( 'init', 'create_Servicio_nonhierarchical_taxonomy', 0 );
 
function create_Servicio_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Servicios', 'Servicios' ),
    'singular_name' => _x( 'Servicio', 'Servicios' ),
    'search_items' =>  __( 'Buscar Servicios' ),
    'popular_items' => __( 'Servicios Populares' ),
    'all_items' => __( 'Todas las Servicios' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Servicio' ), 
    'update_item' => __( 'Actualizar Servicio' ),
    'add_new_item' => __( 'Agregar Nueva Servicio' ),
    'new_item_name' => __( 'Nombre de Nueva Servicio' ),
    'separate_items_with_commas' => __( 'Separar Servicios con Coma' ),
    'add_or_remove_items' => __( 'Agregar o Eliminar Servicios' ),
    'choose_from_most_used' => __( 'Elegir Servicio más Usada' ),
    'menu_name' => __( 'Servicios' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('servicios','servicios',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'servicio' ),
  ));
}