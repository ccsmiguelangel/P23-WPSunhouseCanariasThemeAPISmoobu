<?php
/**
 * Admin custom post type "alojamientos" options
 * 
 * # Main Setting
 * Max People
 * Room Size
 * Subtitle
 * Branch (Select added more options and delete options)
 * Quantity
 * Min Booking Day
 * 
 * # Price Settings
 * Woocommerce Item Integratiion
 * 
 * # Page Settings
 * Header Image
 * Image Position
 * Page Layout
 * Featured Image Replace (Slider)
 * 
 * # Package and rooms
 * Categories
 * Tags
 * 
 * # Smoobu Integration
 * ID
 * Calendar Disponibility
 * 
 * Colocar 10 por máximo de consulta 
 * Editor solo ver smart slider, medios, alojamientos
 * 
*/ 
function aloja_admin_work_array($title, $title_under, $post_meta, $type, $array_values = array()){
  ?>
  <h3><?php _e( $title, 'aloja_plugin' ); ?></h3>
  <p>
  <?php
  if($type === 'option') {?> 
    <select name="<?php echo $title_under;?>">
     <?php
      $id=0;
      foreach ( $array_values as $array_value ) {
        $id=$id+1;
        ?>
          <option name="<?php echo $title_under.'['.$id.']';?>" value="<?php echo $array_value; ?>" <?php checked( ( in_array( $array_value, $post_meta ) ) ? $array_value : '', $array_value ); ?> /><?php echo $array_value; ?></option><br />  
        <?php
      }
     ?> 
    </select>
  <?php
  } else {
    $id=0;
    foreach ( $array_values as $array_value ) {
      $id=$id+1;
      ?>
    ?>
    <input type="<?php echo $type; ?>" name="<?php echo $title_under.'['.$id.']';?>" value="<?php echo $array_value; ?>" <?php checked( ( in_array( $array_value, $post_meta ) ) ? $array_value : '', $array_value ); ?> /><?php echo $array_value; ?> <br />
    
  <?php }?>
  </p>
  <?php
  }
}

function aloja_admin_work($title, $title_under, $post_meta, $type){
  ?>
  <h3><?php _e( $title, 'aloja_plugin' ); ?></h3>
  <p>
    <input type="<?php echo $type;?>" name="<?php echo $title_under;?>" value="<?php echo $post_meta; ?>"  /><br />
  </p>

  <?php
}

function aloja_admin_html_esc($title, $title_under, $post_meta, $type,$array_flag, $array_values = array()){
  if($array_flag === true){
    aloja_admin_work_array($title, $title_under, $post_meta, $type, $array_values);
  } else {
    aloja_admin_work($title, $title_under, $post_meta, $type);
  }
}

function post_meta($db_under, $post){
  return get_post_meta( $post->ID, $db_under, true );
}
function aloja_main_call( $post ){

	// make sure the form xrequest comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'aloja_meta_box_nonce' );

	// retrieve the _food_cholesterol current value
	$max_people = post_meta('_aloja_max_people', $post);

	// retrieve the _food_carbohydrates current value
	// $room_size = post_meta('_aloja_room_size', $post);

  
	// retrieve the _food_carbohydrates current value
	// $room_size = post_meta( '_aloja_room_size', $post );

  // $subtitle = post_meta( '_aloja_subtitle',$post->ID );

  // $quantity = post_meta( '_aloja_quantity', $post );

  // $min_booking_day = post_meta( '_aloja_min_booking_day', $post );

  // $cleaning_charge = post_meta('_cleaning_charge', $post);

	?>
	<div class='inside'>
    <?php 
      aloja_admin_html_esc('Máximo de Personas', 'max_people', $max_people, 'number', false, array());
      // aloja_admin_html_esc('Tamaño de Habitación', 'room_size', $room_size, 'text', false, array());
      // aloja_admin_html_esc('Subtítulo', 'subtitle', $subtitle, 'text', false, array());
      // aloja_admin_html_esc('Precio', 'quantity', $quantity, 'number', false, array());
      // aloja_admin_html_esc('Días mínimos de reserva', 'min_booking_day', $min_booking_day, 'number', false, array());
      // aloja_admin_html_esc('Precio por cargo de limpieza', 'cleaning_charge', $cleaning_charge, 'number', false, array());
    ?>
    
	</div>
	<?php
}

function aloja_price_call( $post ){
  	// make sure the form request comes from WordPress
	// wp_nonce_field( basename( __FILE__ ), 'price_meta_box_nonce' );

  // $woo_integration = post_meta('_aloja_woo_integration', $post);
	?>
	<div class='inside'>
    <?php 
      // aloja_admin_html_esc('ID de Producto de Woocommerce', 'woo_integration', $woo_integration, 'text', false, array());
    ?>
	</div>
	<?php
}

function aloja_page_call($post){
  	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'page_meta_box_nonce' );
  // * Image Position
  // * Page Layout
  // * Featured Image Replace (Slider)

  // $image_position = post_meta('_aloja_image_position', $post);
  // $page_layout = post_meta('_aloja_page_layout', $post);
  // $slider_shortcode = post_meta('_aloja_slider', $post);
  ?>
	<div class='inside'>
    <?php 
      // aloja_admin_html_esc('Posición de Imagen', 'header_image', $image_position, 'text', false, array());
      // aloja_admin_html_esc('Layout', 'header_image', $page_layout, 'text', false, array());
      // aloja_admin_html_esc('Slider Shortcode', 'header_image', $slider_shortcode, 'text', false, array());
      ?>
	</div>
  <?php
}

function aloja_package_call($post){
  	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'package_meta_box_nonce' );
  // * # Package and rooms
  // * Similar Rooms
  
}

function aloja_integration_call($post){
  	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'integration_meta_box_nonce' );
  // * # Smoobu Integration
  // * ID
  // * Calendar Disponibility

  $smoobu_id = post_meta('_aloja_smoobu_id', $post);

	?>
	<div class='inside'>
    <?php 
      // aloja_admin_html_esc('ID de Alojamiento en Smoobu', 'smoobu_id', $smoobu_id, 'text', false, array());
    ?>
	</div>
<?php
}