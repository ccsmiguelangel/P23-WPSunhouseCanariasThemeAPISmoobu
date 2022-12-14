<?php
/**
 * @package Alojamiento_plugin
 * @version 1.0
 */
/*
Plugin Name: Alojamiento example plugin
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an example plugin for WPMU DEV readers
Author: Carlo Daniele
Version: 1.0
Author URI: http://carlodaniele.it/en/
*/

/**
 * Plugin setup
 * Register alojamiento post type
 */
add_theme_support( 'post-thumbnails' ); //Add thumbnail functionability

function alojamiento_setup() {
	$labels = array(
		'name' => __( 'Alojamiento', 'alojamiento_plugin' ),
		'singular_name' => __( 'Alojamiento', 'alojamiento_plugin' ),
		'add_new_item' => __( 'Agregar Nuevo Alojamiento', 'alojamiento_plugin' ),
		'edit_item' => __( 'Editar Alojamiento', 'alojamiento_plugin' ),
		'new_item' => __( 'Nuevo Alojamiento', 'alojamiento_plugin' ),
		'not_found' => __( 'Alojamientos no encontrados', 'alojamiento_plugin' ),
		'all_items' => __( 'Todos los Alojamientos', 'alojamiento_plugin' ),
    'menu_name' => 'Alojamiento',
    'set_featured_image' => __('Agregar imagen')
  );
	$args = array(
		'labels' => $labels,
    'description' => 'Alojamientos para listar en catálogo',
		'public' => true,
    'publicly_queryable' => true, // call from code
		'show_ui' => true,
		'show_in_menu' => true,
    'query_var' => true, // Add reference values
    'rewrite' => array( 'slug' => 'alojamiento' ), // site url
    'capability_type' => 'post', // Display Permissions (Editor)
    'hierarchical' => false, // Gerarquía (Electrodomesticos > Heladeras)
    'meny_position' => 2, // Admin menu
		'has_archive' => true,
		'map_meta_cap' => true,
		'menu_icon' => 'dashicons-admin-multisite',		
		'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'custom'  ),
		'taxonomies' => array( 'Zonas', 'Servicios' ),
    'show_in_rest' => true, //Generate in api rest
		'map_meta_cap' => true,
  );
	register_post_type( 'alojamiento', $args );
}
add_action( 'init', 'alojamiento_setup' );
