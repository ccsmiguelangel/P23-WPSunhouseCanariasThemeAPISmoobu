<?php

function add_theme_caps() {
  $admin = get_role('administrator');

  $admin_add_caps = array(
    'edit_alojamiento',
    'edit_alojamientos',
    'edit_other_alojamientos',
    'publish_alojamientos',
    'read_alojamiento',
    'read_private_alojamientos',
    'delete_alojamiento',
    'edit_alojamiento_terms',
    'delete_alojamiento_terms',
    'manage_alojamiento',
    'assign_alojamiento',
  );

  foreach ($admin_add_caps as $cap){
    $admin->add_cap($cap); 
  }

}

add_action( 'admin_init', 'add_theme_caps');

