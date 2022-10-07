<?php

// function alojamiento_save_meta_box_data( $post_id ){
// 	$is_revision = wp_is_post_revision($post_id);
// 	$post = get_post($post_id);

// 	// verify meta box nonce
// 	if( ! check_admin_referer('aloja_meta_box_nonce', 'aloja_meta_box_nonce') )
// 	return;
	
// 	// return if autosave
// 	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
// 		return;
// 	}

//   // Check the user's permissions.
// 	if ( ! current_user_can( 'edit_posts', $post_id ) ){
// 		return;
// 	}

// 	if ( $post->post_type != 'alojamiento' || $is_revision )
// 	return;

// 	if( !isset($_POST['max_people']) )
// 	return;


// 	// store custom fields values
// 	// max_people string
// 	$field_value = trim($_POST['max_people']);

// 	// Do the saving and deleting
// 	if( ! empty( $field_value ) ) {
// 		update_post_meta( $post_id, '_aloja_max_people', sanitize_text_field( $_POST['max_people'] ) );
// 	}else{
// 		// delete data
// 		delete_post_meta( $post_id, '_aloja_max_people' );
// 	}
// }
// add_action( 'save_post_alojamiento', 'alojamiento_save_meta_box_data',  20, 2 );
function aloja_new_save_box($post_id, $field_name, $cpt){
	$post = get_post($post_id);
	$is_revision = wp_is_post_revision($post_id);

	// Do not save meta for a revision or on autosave
	if ( $post->post_type != $cpt || $is_revision )
			return;

	// Do not save meta if fields are not present,
	// like during a restore.
	if( !isset($_POST[$field_name]) )
			return;

	// Secure with nonce field check
	if( ! check_admin_referer('aloja_meta_box_nonce', 'aloja_meta_box_nonce') )
			return;

	// Clean up data
	$field_value = trim($_POST[$field_name]);
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );

	if ( $is_autosave || $is_revision ) {
			return;
	}
	// Do the saving and deleting
	if( ! empty( $field_value ) && array_key_exists( 'wporg_field', $_POST ))  {
			update_post_meta($post_id, '_'.$field_name, $field_value);
	} elseif( empty( $field_value ) ) {
			delete_post_meta($post_id, $field_name);

	} 
}

function alojamiento_save_meta_box_data( $post_id ) {
	if ( array_key_exists( 'max_people', $_POST ) ) {
		aloja_new_save_box($post_id, 'max_people', 'alojamiento');
	}
}
add_action( 'save_post_alojamiento', 'alojamiento_save_meta_box_data', 10, 2 );

