<?php

// Validations
  // Smoobu
@require get_stylesheet_directory().'/includes/API/validations.php';
@require get_stylesheet_directory().'/includes/API/responses.php';
@require get_stylesheet_directory().'/includes/compare.php';
@require get_stylesheet_directory().'/includes/smoobu/create_booking.php';
// TEST
@require get_stylesheet_directory().'/includes/wordpress/smoobu_id_to_post_id.php';
@require get_stylesheet_directory().'/includes/wordpress/services_zones.php';
@require get_stylesheet_directory().'/includes/wordpress/taxonomies.php';
@require get_stylesheet_directory().'/includes/API/test.php';

// Get Apartments (apartments.php)
@require get_stylesheet_directory().'/includes/smoobu/apartments.php';
@require get_stylesheet_directory().'/includes/API/apartments.php';

// Date Consult
@require get_stylesheet_directory().'/includes/smoobu/date.php';
@require get_stylesheet_directory().'/includes/API/date.php';

// Comparated WordPress with Smoobu
@require get_stylesheet_directory().'/includes/wordpress/apartments.php';
@require get_stylesheet_directory().'/includes/API/apartments_wp.php';
@require get_stylesheet_directory().'/includes/API/date_wp.php';


// Guests Consult
@require get_stylesheet_directory().'/includes/smoobu/guests.php';
@require get_stylesheet_directory().'/includes/API/guests.php';

// Comparated Wordpress with Smoobu Guests
@require get_stylesheet_directory().'/includes/wordpress/metabox.php';
@require get_stylesheet_directory().'/includes/wordpress/guests.php';
@require get_stylesheet_directory().'/includes/API/guests_wp.php';

// Price Consult
@require get_stylesheet_directory().'/includes/smoobu/price.php';
@require get_stylesheet_directory().'/includes/API/price.php';

// Comparated Wordpress with Smoobu Price
@require get_stylesheet_directory().'/includes/API/price_wp.php';

@require get_stylesheet_directory().'/includes/API/services_zones.php';

// Compare all instruments
@require get_stylesheet_directory().'/includes/wordpress/consult_all.php';
@require get_stylesheet_directory().'/includes/API/consult_all.php';

@require get_stylesheet_directory().'/includes/API/single_responses.php';
@require get_stylesheet_directory().'/includes/API/single_wp.php';


@require get_stylesheet_directory().'/includes/API/create_booking.php';
