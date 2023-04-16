<?php
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























// add_action('init', 'alojamiento_to_woocommerce');

// function alojamiento_to_woocommerce() {
//     // Registrar el custom post type de "alojamiento"
//     register_post_type('alojamiento', [
//         'labels' => [
//             'name' => __('Alojamientos'),
//             'singular_name' => __('Alojamiento')
//         ],
//         'public' => true,
//         'has_archive' => true,
//         'supports' => ['title', 'editor', 'thumbnail']
//     ]);

//     // Acciones para crear y eliminar alojamientos
//     add_action('save_post_alojamiento', 'crear_producto_woocommerce');
//     add_action('delete_post', 'eliminar_producto_woocommerce');
// }

// function crear_producto_woocommerce($post_id) {
//     // Verificar que el post type sea "alojamiento"
//     if (get_post_type($post_id) !== 'alojamiento') {
//         return;
//     }

//     // Verificar si ya existe un producto de WooCommerce asociado al alojamiento
//     $alojamiento_woo_id = get_post_meta($post_id, '_alojamiento_woo_id', true);
//     if ($alojamiento_woo_id) {
//         return;
//     }

//     // Crear el producto de WooCommerce
//     $producto = new WC_Product();
//     $producto->set_name(get_the_title($post_id));
//     $producto->set_status('publish');
//     $producto->set_regular_price(0);
//     $producto_id = $producto->save();

//     // Guardar el ID del producto en el metabox del alojamiento
//     update_post_meta($post_id, '_alojamiento_woo_id', $producto_id);
// }

// function eliminar_producto_woocommerce($post_id) {
//     // Verificar que el post type sea "alojamiento"
//     if (get_post_type($post_id) !== 'alojamiento') {
//         return;
//     }

//     // Verificar si existe un producto de WooCommerce asociado al alojamiento
//     $alojamiento_woo_id = get_post_meta($post_id, '_alojamiento_woo_id', true);
//     if (!$alojamiento_woo_id) {
//         return;
//     }

//     // Eliminar el producto de WooCommerce
//     $producto = wc_get_product($alojamiento_woo_id);
//     if ($producto) {
//         $producto->delete(true);
//     }

//     // Eliminar el meta del ID del producto
//     delete_post_meta($post_id, '_alojamiento_woo_id');
// }