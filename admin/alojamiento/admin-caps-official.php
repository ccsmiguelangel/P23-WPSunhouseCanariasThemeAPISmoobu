<?php

// function add_theme_caps() {
//   $admin = get_role('administrator');

//   $admin_add_caps = array(
//     'edit_alojamiento',
//     'edit_alojamientos',
//     'edit_other_alojamientos',
//     'publish_alojamientos',
//     'read_alojamiento',
//     'read_private_alojamientos',
//     'delete_alojamiento',
//     'edit_alojamiento_terms',
//     'delete_alojamiento_terms',
//     'manage_alojamiento',
//     'assign_alojamiento',
//   );

//   foreach ($admin_add_caps as $cap){
//     $admin->add_cap($cap); 
//   }

// }

// add_action( 'admin_init', 'add_theme_caps');

// Obtenemos el objeto de rol del editor
$editor_role = get_role('editor');

// Añadimos la capacidad de administrador al rol de editor
$editor_role->add_cap('manage_options');

add_action('admin_menu', 'remover_menu',999);
function remover_menu() {
  // Si el usuario NO tiene el rol de administrador, eliminar la pestaña de Herramientas
  if( current_user_can('editor') ) {
    remove_menu_page('options-general.php');
    remove_menu_page('tools.php');
    remove_menu_page('themes.php');
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
    remove_menu_page('elementor');
    remove_menu_page('starter-templates.php');
    remove_menu_page('profile.php');
    remove_menu_page('captcha.php');
    remove_menu_page('contact_form.php');
    remove_menu_page('sg-cachepress');
    remove_menu_page('sg-security');
    remove_menu_page('wpseo_workouts');
    remove_menu_page('update_core.php');
    remove_menu_page('post-new.php');
    remove_menu_page('edit.php?post_type=page');
    remove_menu_page('astra');
    remove_menu_page('cartflows');
    remove_menu_page('plugins.php');
    remove_menu_page('users.php');
    remove_menu_page('loco');
    remove_menu_page('wp_file_manager');
  }
}

function remover_elementos_barra_admin($wp_admin_bar) {
  if( current_user_can('editor') ) {
    ?>
    <style>
      #wp-admin-bar-root-default, #menu-posts-elementor_library, #toplevel_page_woocommerce, #toplevel_page_wc-admin-path--analytics-overview, #toplevel_page_woocommerce-marketing{
        display: none;
      }
    </style>
    <?php
  }
}
add_action('wp_before_admin_bar_render', 'remover_elementos_barra_admin');