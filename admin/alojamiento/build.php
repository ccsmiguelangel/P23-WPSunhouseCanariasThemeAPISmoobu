<?php
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
		alo_simple_box('Subtítulo', 'sub_title', $current_subtitle, 'text');
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
		alo_simple_box('Shortcode de Slider', 'slide_shortcode', $current_slide_shortcode, 'text');
		?>
	</div>
	<?php
}
// # 4
function alojamiento_build_meta_box_4( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'alojamiento_meta_box_nonce_4' );
	// retrieve the _alojamiento_similar_rooms current value
	$current_similar_rooms = get_post_meta( $post->ID, '_alojamiento_similar_rooms', true );
	?>
	<div class='inside'>
		<?php 
		// alo_simple_box('Alojamientos Similares', 'similar_rooms', $current_similar_rooms, 'text');
		$args = array(
			'post_type'   => 'alojamiento',
			'post_parent' => 0,
		);
		
		$article_posts = new WP_Query($args);

		echo "<ul>";
		if($article_posts->have_posts()) : 
			while($article_posts->have_posts()) : 
				$article_posts->the_post(); 
				$post_id = get_the_ID();
				$post_link = get_permalink($post_id);
				$post_title = get_the_title();
				// $featured_img_url = get_the_post_thumbnail_url($post_id);
			
				?>
				<li><label><input id="alo[<?php echo $post_id; ?>]" type="checkbox" name="alo[<?php echo $post_id; ?>]" value="<?php echo $post_id; ?>" ?><a href="<?php echo $post_link; ?>"><?php echo $post_title; ?></a><label/></li>
				<?php
			?>
				<?php 
				endwhile; 
			?>
		<?php 
		else:  
		?>
		Oops, there are no posts.
		<?php  
		endif;
		?>    
		<?php echo "</ul>";?>
	</div>

		<?php
		wp_reset_postdata();
}
// # 5
function alojamiento_build_meta_box_5( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'alojamiento_meta_box_nonce_5' );
	// retrieve the _alojamiento_smoobu_id current value
	$current_smoobu_id = get_post_meta( $post->ID, '_alojamiento_smoobu_id', true );
	?>
	<div class='inside'>
		<?php 
		alo_simple_box('ID de Alojamiento en Smoobu
		', 'smoobu_id', $current_smoobu_id, 'number');
		?>
	</div>
	<?php
}
// END 1 - 5