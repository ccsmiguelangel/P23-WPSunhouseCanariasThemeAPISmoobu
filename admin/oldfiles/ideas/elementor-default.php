<?php

/**
 * Make Elementor the default editor, not the WordPress Editor (Gutenberg or Classic)
 * Clicking the page title will take you to the Elementor editor directly
 * Even non-Elementor-edited pages will become Elementor-edited pages now
 * You can revert by clicking the "Back to WordPress Editor" button
 *
 * Author:  Joe Fletcher, https://fletcherdigital.com
 * URL:	    https://gist.github.com/heyfletch/7c59d1c0c9c56cbad51ef80290d86df7
 * Credit:  mjakic https://wordpress.stackexchange.com/questions/178416/how-to-change-the-title-url-on-the-edit-post-screen
 * Credit:  Aurovrata Venet https://developer.wordpress.org/reference/hooks/post_row_actions/
*/

/** Replace hyperlink in post titles on Page, Post, or Template lists with Elementor's editor link */
add_filter('get_edit_post_link', 'fd_make_elementor_default_edit_link', 10, 3 );
function fd_make_elementor_default_edit_link($link, $post_id, $context) {

	// Only relevant in the admin, checks for function that is occasionally missing
	if ( is_admin() && function_exists('get_current_screen') ) {

		// Get current screen parameters
		$screen = get_current_screen();

		//check if $screen is object otherwise we may be on an admin page where get_current_screen isn't defined
		if( !is_object($screen) )
			return;

		// Post Types to Edit with Elementor
		$post_types_for_elementor = array(
			'page',
			'post',
			'elementor_library',
		);

		// When we are on a specified post type screen
		if ( in_array( $screen->post_type, $post_types_for_elementor ) && $context == 'display' ) {

			// Build the Elementor editor link
			$elementor_editor_link = admin_url( 'post.php?post=' . $post_id . '&action=elementor' );

			return $elementor_editor_link;
		} else {
			return $link;
		}
	}
}

/** Add back the default Edit link action in Page and Post list rows */
add_filter( 'page_row_actions', 'fd_add_back_default_edit_link', 10, 2 );
add_filter( 'post_row_actions', 'fd_add_back_default_edit_link', 10, 2 );
function fd_add_back_default_edit_link( $actions, $post ) {

	// Build the Elementor edit URL
	$elementor_edit_url = admin_url( 'post.php?post=' . $post->ID . '&action=edit' );

	// Rewrite the normal Edit link
	$actions['edit'] =
		sprintf( '<a href="%1$s">%2$s</a>',
			esc_url( $elementor_edit_url ),
			esc_html( __( 'Default WordPress Editor', 'elementor' ) )
		);

   return $actions;
}


/** (optional) Remove redundant "Edit with Elementor" link added by Elementor itself */
add_filter( 'page_row_actions', 'fd_remove_default_edit_with_elementor', 99, 2 );
add_filter( 'post_row_actions', 'fd_remove_default_edit_with_elementor', 99, 2 );
function fd_remove_default_edit_with_elementor( $actions, $post ) {

  // Rewrite the normal Edit link
  unset( $actions['edit_with_elementor'] );

  return $actions;
}