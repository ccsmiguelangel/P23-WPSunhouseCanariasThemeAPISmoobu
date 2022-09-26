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
		'add_new' => 'Añadir Alojamiento',
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
    'rewrite' => array( 
			'slug' => 'alojamiento',
			'with_front' => true // notice here
		 ), // site url
    'capability_type' => 'alojamiento', // Display Permissions (Editor)
    'hierarchical' => false, // Gerarquía (Electrodomesticos > Heladeras)
    'menu_position' => 2, // Admin menu
		'has_archive' => true,
		'map_meta_cap' => true,
		'menu_icon' => 'dashicons-admin-multisite',		
		'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'custom'  ),
		'taxonomies' => array( 'zonas', 'servicios' ),
    'show_in_rest' => true, //Generate in api rest
		'map_meta_cap' => true,
		'capabilities'      => array(
			'edit_post' => 'edit_alojamiento',
			'edit_posts' => 'edit_alojamientos',
			'edit_others_posts' => 'edit_other_alojamientos',
			'publish_posts' => 'publish_alojamientos',
			'read_post' => 'read_alojamiento',
			'read_private_posts' => 'read_private_alojamientos',
			'delete_post' => 'delete_alojamiento',
			'manage_terms'  => 'manage_alojamiento',
			'edit_terms'    => 'edit_alojamiento_terms',
			'delete_terms'  => 'delete_alojamiento_terms',
			'assign_terms'  => 'assign_alojamiento_terms'
		)
  );
	register_post_type( 'alojamiento', $args );
}
add_action( 'init', 'alojamiento_setup' );

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
	
	// $label_zone = alo_taxonomy_label('Zonas', 'Zona', 'zonas');
	// $arg_zone = alo_taxonomy_args('zonas', $label_zone);
	// register_taxonomy('zonas', 'zonas', $arg_zone);

	// $label_service = alo_taxonomy_label('Servicios', 'Servicio', 'servicios');
	// $arg_service = alo_taxonomy_args('servicios', $label_service);
	// register_taxonomy('servicios', 'servicios', $arg_service);

	alo_taxonomy_register('Zonas', 'Zona', 'zonas');
	alo_taxonomy_register('Servicios', 'Servicio', 'servicios');
	
}
add_action( 'init', 'alojamiento_register_taxonomies',0 );

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
	add_meta_box( 'alojamiento_meta_box_6', __( 'Comentarios', 'alojamiento_plugin' ), 'alojamiento_build_meta_box_6', 'alojamiento', 'side', 'low' );
}
add_action( 'add_meta_boxes_alojamiento', 'alojamiento_add_meta_boxes' );

/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function alo_simple_box($title, $title_under, $post_meta, $type){
?>
	<h3><?php _e( $title, 'alojamiento_plugin' ); ?></h3>
	<p>
		<input type="<?php echo $type;?>" name="<?php echo $title_under;?>" value="<?php echo $post_meta; ?>"  /><br />
	</p>
<?php
}
function alo_large_box($title, $title_under, $post_meta, $type){
?>
	<h3><?php _e( $title, 'alojamiento_plugin' ); ?></h3>
	<p>
		<textarea type="<?php echo $type;?>" name="<?php echo $title_under;?>"><?php echo $post_meta; ?></textarea><br />
	</p>
<?php
}


// BEGIN 1 - 5
// # 1
function alojamiento_build_meta_box( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'alojamiento_meta_box_nonce' );
	// retrieve the _alojamiento_max_people current value
	$current_max_people = get_post_meta( $post->ID, '_alojamiento_max_people', true );
	$current_room_size = get_post_meta( $post->ID, '_alojamiento_room_size', true );
	$current_subtitle = get_post_meta( $post->ID, '_alojamiento_subtitle', true );
	$current_price = get_post_meta( $post->ID, '_alojamiento_price', true );
	$current_min_booking_days = get_post_meta( $post->ID, '_alojamiento_min_booking_days', true );
	$current_cleaning_charge = get_post_meta( $post->ID, '_alojamiento_cleaning_charge', true );
	
?>
	<div class='inside'>
		<?php 
		alo_simple_box('Máximo de Personas', 'max_people', $current_max_people, 'number');
		alo_simple_box('Tamaño de Habitación', 'room_size', $current_room_size, 'number');
		alo_large_box('Descripción Corta', 'sub_title', $current_subtitle, 'text');
		alo_simple_box('Precio', 'price', $current_price, 'number');
		alo_simple_box('Días Mínimos de Reserva', 'min_booking_days', $current_min_booking_days, 'number');
		alo_simple_box('Precio por Cargo de Limpieza', 'cleaning_charge', $current_cleaning_charge, 'number');
		?>
	</div>
	<?php
}
// # 2
function alojamiento_build_meta_box_2( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'alojamiento_meta_box_nonce_2' );
	// retrieve the _alojamiento_woo_id current value
	$current_woo_id = get_post_meta( $post->ID, '_alojamiento_woo_id', true );
	?>
	<div class='inside'>
		<?php 
		alo_simple_box('ID de Producto de Woocommerce', 'woo_id', $current_woo_id, 'number');
		?>
	</div>
	<?php
}
// # 3
function alojamiento_build_meta_box_3( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'alojamiento_meta_box_nonce_3' );
	// retrieve the _alojamiento_slide_shortcode current value
	$current_slide_shortcode = get_post_meta( $post->ID, '_alojamiento_slide_shortcode', true );
	?>
	<div class='inside'>
		<?php 
		alo_large_box('Shortcode de Slider', 'slide_shortcode', $current_slide_shortcode, 'text');
		?>
	</div>
	<?php
}
// # 4
function alojamiento_build_meta_box_4( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'alojamiento_meta_box_nonce_4' );
	// retrieve the _alojamiento_similar_rooms current value
	$similar_rooms = get_posts(array(
		'fields'          => 'ids', // Only get post IDs
		'posts_per_page'  => -1,
		'post_type'   => 'alojamiento',
	));
	$current_similar_rooms = ( get_post_meta( $post->ID, '_alojamiento_similar_rooms', true ) ) ? get_post_meta( $post->ID, '_alojamiento_similar_rooms', true ) : array();
	?>
	<div class='inside'>
		<?php 
		// alo_simple_box('Alojamientos Similares', 'similar_rooms', $current_similar_rooms, 'text');
		$args = array(
			'post_type'   => 'alojamiento',
		);
		$article_posts = new WP_Query($args);

		echo "<ul>";
		if($article_posts->have_posts()) : 
			foreach($similar_rooms as $p){
				$post_id = $p;
				$post_link = get_permalink($post_id);
				$post_title = get_the_title($post_id);
			// $featured_img_url = get_the_post_thumbnail_url($post_id);


		 	if($post->ID === intval($p)){
				continue;
			}
			?>
			<li><label><input id="similar_rooms[<?php echo $post_id; ?>]" type="checkbox" name="similar_rooms[<?php echo $post_id; ?>]" value="<?php echo $post_id; ?>" <?php checked( ( in_array( $post_id, $current_similar_rooms ) ) ? $post_id : '', $post_id ); ?> ?><a href="<?php echo $post_link; ?>"><?php echo $post_title; ?></a></label></li>
			<?php	} ?>
		<?php else:  ?>
			<p><?php _e( 'Oops, there are no posts.')?></p>
		<?php  
		endif;
		?>    
		<?php 
		#print_r($similar_rooms) ;  
		echo "</ul>";?>
	</div>

		<?php
		// wp_reset_postdata();
}
// # 5
function alojamiento_build_meta_box_5( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'alojamiento_meta_box_nonce_5' );
	// retrieve the _alojamiento_smoobu_id current value
	$current_smoobu_id = get_post_meta( $post->ID, '_alojamiento_smoobu_id', true );
	$current_smoobu_calendar = get_post_meta( $post->ID, '_alojamiento_smoobu_calendar', true ); 
	?>
	<div class='inside'>
		<?php 
		alo_simple_box('ID de Alojamiento en Smoobu', 'smoobu_id', $current_smoobu_id, 'number');
		alo_large_box('Shortcode de Calendario Smoobu','smoobu_calendar', $current_smoobu_calendar, 'text');
		?>
	</div>
	<?php
}
// # 6
function alojamiento_build_meta_box_6( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'alojamiento_meta_box_nonce_6' );
	// retrieve the _alojamiento_smoobu_id current value
	$current_comments_shortcode = get_post_meta( $post->ID, '_alojamiento_comments_shortcode', true );
	?>
	<div class='inside'>
		<?php 
		alo_large_box('Agregar Shortcode de Comentarios', 'comments_shortcode', $current_comments_shortcode, 'text');
		?>
	</div>
	<?php
}
// END 1 - 5

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */

 
// BEGIN 1 - 5
// # 1
function alojamiento_save_meta_box_data( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['alojamiento_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['alojamiento_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
  // Check the user's permissions.
	if ( ! current_user_can( 'edit_alojamiento', $post_id ) ){
		return;
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['max_people'] ) ) {
		update_post_meta( $post_id, '_alojamiento_max_people', sanitize_text_field( $_POST['max_people'] ) );
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['room_size'] ) ) {
		update_post_meta( $post_id, '_alojamiento_room_size', sanitize_text_field( $_POST['room_size'] ) );
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['sub_title'] ) ) {
		update_post_meta( $post_id, '_alojamiento_subtitle', sanitize_text_field( $_POST['sub_title'] ) );
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['price'] ) ) {
		update_post_meta( $post_id, '_alojamiento_price', sanitize_text_field( $_POST['price'] ) );
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['min_booking_days'] ) ) {
		update_post_meta( $post_id, '_alojamiento_min_booking_days', sanitize_text_field( $_POST['min_booking_days'] ) );
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['cleaning_charge'] ) ) {
		update_post_meta( $post_id, '_alojamiento_cleaning_charge', sanitize_text_field( $_POST['cleaning_charge'] ) );
	}
}
add_action( 'save_post_alojamiento', 'alojamiento_save_meta_box_data' );
// # 2
function alojamiento_save_meta_box_data_2( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['alojamiento_meta_box_nonce_2'] ) || !wp_verify_nonce( $_POST['alojamiento_meta_box_nonce_2'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
  // Check the user's permissions.
	if ( ! current_user_can( 'edit_alojamiento', $post_id ) ){
		return;
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['woo_id'] ) ) {
		update_post_meta( $post_id, '_alojamiento_woo_id', sanitize_text_field( $_POST['woo_id'] ) );
	}
}
add_action( 'save_post_alojamiento', 'alojamiento_save_meta_box_data_2' );
// # 3
function alojamiento_save_meta_box_data_3( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['alojamiento_meta_box_nonce_3'] ) || !wp_verify_nonce( $_POST['alojamiento_meta_box_nonce_3'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
  // Check the user's permissions.
	if ( ! current_user_can( 'edit_alojamiento', $post_id ) ){
		return;
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['slide_shortcode'] ) ) {
		update_post_meta( $post_id, '_alojamiento_slide_shortcode', sanitize_text_field( $_POST['slide_shortcode'] ) );
	}
}
add_action( 'save_post_alojamiento', 'alojamiento_save_meta_box_data_3' );
// # 4
function alojamiento_save_meta_box_data_4( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['alojamiento_meta_box_nonce_4'] ) || !wp_verify_nonce( $_POST['alojamiento_meta_box_nonce_4'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
  // Check the user's permissions.
	if ( ! current_user_can( 'edit_alojamiento', $post_id ) ){
		return;
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_POST['similar_rooms'] ) ) {
		$similar_rooms = (array) $_POST['similar_rooms'];

		$similar_rooms = array_map('sanitize_text_field', $similar_rooms);

		update_post_meta( $post_id, '_alojamiento_similar_rooms', $similar_rooms );
	} else{
		// delete data
		delete_post_meta( $post_id, '_alojamiento_similar_rooms' );
	}
}
add_action( 'save_post_alojamiento', 'alojamiento_save_meta_box_data_4' );
// # 5
function alojamiento_save_meta_box_data_5( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['alojamiento_meta_box_nonce_5'] ) || !wp_verify_nonce( $_POST['alojamiento_meta_box_nonce_5'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
  // Check the user's permissions.
	if ( ! current_user_can( 'edit_alojamiento', $post_id ) ){
		return;
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['smoobu_id'] ) ) {
		update_post_meta( $post_id, '_alojamiento_smoobu_id', sanitize_text_field( $_POST['smoobu_id'] ) );
	}
	if ( isset( $_REQUEST['smoobu_calendar'] ) ) {
		update_post_meta( $post_id, '_alojamiento_smoobu_calendar', sanitize_text_field( $_POST['smoobu_calendar'] ) );
	}
}
add_action( 'save_post_alojamiento', 'alojamiento_save_meta_box_data_5' );
// # 6
function alojamiento_save_meta_box_data_6( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['alojamiento_meta_box_nonce_6'] ) || !wp_verify_nonce( $_POST['alojamiento_meta_box_nonce_6'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
  // Check the user's permissions.
	if ( ! current_user_can( 'edit_alojamiento', $post_id ) ){
		return;
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['comments_shortcode'] ) ) {
		update_post_meta( $post_id, '_alojamiento_comments_shortcode', sanitize_text_field( $_POST['comments_shortcode'] ) );
	}
}
add_action( 'save_post_alojamiento', 'alojamiento_save_meta_box_data_6' );
// END 1 - 5