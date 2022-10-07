<?php
/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function food_save_meta_box_data( $post_id ){
	// verify taxonomies meta box nonce
	if ( !isset( $_POST['food_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['food_meta_box_nonce'], basename( __FILE__ ) ) ){
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
	if ( isset( $_REQUEST['cholesterol'] ) ) {
		update_post_meta( $post_id, '_food_cholesterol', sanitize_text_field( $_POST['cholesterol'] ) );
	}
	
	// store custom fields values
	// carbohydrates string
	if ( isset( $_REQUEST['carbohydrates'] ) ) {
		update_post_meta( $post_id, '_food_carbohydrates', sanitize_text_field( $_POST['carbohydrates'] ) );
	}
	
	// store custom fields values
	if( isset( $_POST['vitamins'] ) ){
		$vitamins = (array) $_POST['vitamins'];

		// sinitize array
		$vitamins = array_map( 'sanitize_text_field', $vitamins );

		// save data
		update_post_meta( $post_id, '_food_vitamins', $vitamins );
	}else{
		// delete data
		delete_post_meta( $post_id, '_food_vitamins' );
	}
}
add_action( 'save_post_food', 'food_save_meta_box_data' );