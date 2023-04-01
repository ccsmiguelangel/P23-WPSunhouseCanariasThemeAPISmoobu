<?php
// Add styles
@require_once get_stylesheet_directory().'/config.php';

// Add alojamiento config to admin
@require_once get_stylesheet_directory().'/admin/features.php';

// Add shortcodes
@require_once get_stylesheet_directory().'/shortcodes.php';

// Add API
@require_once get_stylesheet_directory().'/includes/API/queries.php';

// Public Queues
@require_once get_stylesheet_directory().'/public/queues.php';

// Public woocommerce
@require_once get_stylesheet_directory().'/woocommerce.php';