<?php
/**
 * Add meta box
 *
 * @param post $post The post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function alojamiento_add_meta_boxes( $post ){
	add_meta_box( 'alojamiento_meta_box', __( 'Ajustes', 'alojamiento_plugin' ), 'alojamiento_build_meta_box', 'alojamiento', 'side', 'low' );
	add_meta_box( 'alojamiento_meta_box_2', __( 'Woocommerce', 'alojamiento_plugin' ), 'alojamiento_build_meta_box_2', 'alojamiento', 'side', 'low' );
	add_meta_box( 'alojamiento_meta_box_3', __( 'Página', 'alojamiento_plugin' ), 'alojamiento_build_meta_box_3', 'alojamiento', 'side', 'low' );
	add_meta_box( 'alojamiento_meta_box_4', __( 'Similares', 'alojamiento_plugin' ), 'alojamiento_build_meta_box_4', 'alojamiento', 'side', 'low' );
	add_meta_box( 'alojamiento_meta_box_5', __( 'Smoobu', 'alojamiento_plugin' ), 'alojamiento_build_meta_box_5', 'alojamiento', 'side', 'low' );
}
add_action( 'add_meta_boxes_alojamiento', 'alojamiento_add_meta_boxes' );
