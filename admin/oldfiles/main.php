<?php
/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function food_build_meta_box( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'food_meta_box_nonce' );

	// retrieve the _food_cholesterol current value
	$current_cholesterol = get_post_meta( $post->ID, '_food_cholesterol', true );

	// retrieve the _food_carbohydrates current value
	$current_carbohydrates = get_post_meta( $post->ID, '_food_carbohydrates', true );

	$vitamins = array( 'Vitamin A', 'Thiamin (B1)', 'Riboflavin (B2)', 'Niacin (B3)', 'Pantothenic Acid (B5)', 'Vitamin B6', 'Vitamin B12', 'Vitamin C', 'Vitamin D', 'Vitamin E', 'Vitamin K' );
	
	// stores _food_vitamins array 
	$current_vitamins = ( get_post_meta( $post->ID, '_food_vitamins', true ) ) ? get_post_meta( $post->ID, '_food_vitamins', true ) : array();

	?>
	<div class='inside'>

		<h3><?php _e( 'Cholesterol', 'food_example_plugin' ); ?></h3>
		<p>
			<input type="radio" name="cholesterol" value="0" <?php checked( $current_cholesterol, '0' ); ?> /> Yes<br />
			<input type="radio" name="cholesterol" value="1" <?php checked( $current_cholesterol, '1' ); ?> /> No
		</p>

		<h3><?php _e( 'Carbohydrates', 'food_example_plugin' ); ?></h3>
		<p>
			<input type="text" name="carbohydrates" value="<?php echo $current_carbohydrates; ?>" /> 
		</p>

		<h3><?php _e( 'Vitamins', 'food_example_plugin' ); ?></h3>
		<p>
		<?php
			foreach ( $vitamins as $vitamin ) {
				?>
				<input type="checkbox" name="vitamins[]" value="<?php echo $vitamin; ?>" <?php checked( ( in_array( $vitamin, $current_vitamins ) ) ? $vitamin : '', $vitamin ); ?> /><?php echo $vitamin; ?> <br />
				<?php
			}
		?>
		</p>
	</div>
	<?php
}