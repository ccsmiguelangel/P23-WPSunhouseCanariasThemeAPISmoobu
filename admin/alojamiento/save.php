<?php
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
	if ( ! current_user_can( 'edit_post', $post_id ) ){
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
	if ( ! current_user_can( 'edit_post', $post_id ) ){
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
	if ( ! current_user_can( 'edit_post', $post_id ) ){
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
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['similar_rooms'] ) ) {
		update_post_meta( $post_id, '_alojamiento_similar_rooms', sanitize_text_field( $_POST['similar_rooms'] ) );
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
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	// store custom fields values
	// cholesterol string
	if ( isset( $_REQUEST['smoobu_id'] ) ) {
		update_post_meta( $post_id, '_alojamiento_smoobu_id', sanitize_text_field( $_POST['smoobu_id'] ) );
	}
}
add_action( 'save_post_alojamiento', 'alojamiento_save_meta_box_data_5' );
// END 1 - 5