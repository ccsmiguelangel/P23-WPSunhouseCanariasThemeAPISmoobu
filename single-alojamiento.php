<?php get_header(); ?>


<?php if (have_posts()) { ?>
  <?php while (have_posts()) {
    the_post(); ?>
    <?php the_content(); ?>

    <?php
// require __DIR__ . '/vendor/autoload.php';

// use Automattic\WooCommerce\Client;
// use Automattic\WooCommerce\HttpClient\HttpClientException;


//     $woocommerce = new Client(
//         'http://localhost/.Business/test', // Your store URL
//         'ck_0d3cf19090e6a626b914b5106412ffb97a78b2ff', // Your consumer key
//         'cs_ff5465559fab4489dbf9747a90fe38c555438461', // Your consumer secret
//         [
//             'wp_api' => true, // Enable the WP REST API integration
//             'version' => 'wc/v3' // WooCommerce WP REST API version
//         ]
//     );
    
    
//     print_r($woocommerce->get('products/tags/34', ['_jsonp' => 'tagDetails'])); 
    
    ?>



  <?php } ?>
<?php } ?>

<?php get_footer(); ?>