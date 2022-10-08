<?php
/**
 * Register taxonomies
 */
// BEGIN Simplify Functions
function alo_taxonomy_label($plural, $singular){
	
	// Labels part for the GUI
				
		$labels = array(
			'name' => __( $plural, 'alojamiento_plugin' ),
			'singular_name' => __( $singular, 'alojamiento_plugin' ),
			'search_items' =>  __( 'Buscar '.$plural, 'alojamiento_plugin' ),
			'popular_items' => __( $plural.' Populares', 'alojamiento_plugin' ),
			'all_items' => __( 'Tod@s l@s '.$plural, 'alojamiento_plugin' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Editar '.$singular, 'alojamiento_plugin' ), 
			'update_item' => __( 'Actualizar '.$singular, 'alojamiento_plugin' ),
			'add_new_item' => __( 'Agregar '.$singular, 'alojamiento_plugin' ),
			'new_item_name' => __( 'Nuev@ '.$singular, 'alojamiento_plugin' ),
			'separate_items_with_commas' => __( 'Separar '.$singular.' con Coma', 'alojamiento_plugin' ),
			'add_or_remove_items' => __( 'Agregar o Eliminar '.$singular, 'alojamiento_plugin' ),
			'choose_from_most_used' => __( 'Elegir '.$singular.' más Usad@', 'alojamiento_plugin' ),
			'menu_name' => __( $plural, 'alojamiento_plugin' ),
		); 
		return $labels;
}
function alo_taxonomy_args($lower_case, $labels, $hierarchical = false){
	$args = array(
		'hierarchical' => $hierarchical,
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 
			'slug' => $lower_case, // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	);
	return $args;
}

function alo_taxonomy_register($plural,$singular, $lower_case, $hierarchical = false){
	$label = alo_taxonomy_label($plural, $singular);
	$args = alo_taxonomy_args($lower_case, $label, $hierarchical );
	return register_taxonomy($lower_case, $lower_case, $args);
}
// END Simplify Functions


function alojamiento_register_taxonomies(){

	alo_taxonomy_register('Zonas', 'Zona', 'zonas');
	alo_taxonomy_register('Servicios', 'Servicio', 'servicios');

}
add_action( 'init', 'alojamiento_register_taxonomies',0 );
