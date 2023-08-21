<?php

// Підключення стилів і скриптів
add_action('wp_enqueue_scripts', 'slid_add_scripts');
function slid_add_scripts() {

    wp_enqueue_style('style-all', get_template_directory_uri() . '/assets/styles/styles.css' );
    wp_enqueue_style('about-style', get_template_directory_uri() . '/assets/styles/about-author.css' );
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/styles/main-page.css' );
    wp_enqueue_style('error-style', get_template_directory_uri() . '/assets/styles/error.css' );
    wp_enqueue_style('pop-up-style', get_template_directory_uri() . '/assets/styles/pop-up.css' );
    wp_enqueue_style('author-style', get_template_directory_uri() . '/styles/about-author.css' );
    wp_enqueue_style('reset-style', get_template_directory_uri() . '/assets/styles/reset.css' );


    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-1.7.1.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-new', get_template_directory_uri() . '/js/jquery-1.7.1.min.js');


    wp_enqueue_script('burger', get_template_directory_uri() . '/assets/js/burger-menu.js');
    wp_enqueue_script('script-js', get_template_directory_uri() . '/js/script.js');
    wp_enqueue_script('slider-js', get_template_directory_uri() . '/js/lightslider.js');
    wp_enqueue_script('masked-input', get_template_directory_uri() . '/js/jquery.maskedinput.min.js');
    wp_enqueue_script('pop-up-js', get_template_directory_uri() . '/js/pop-up.js');



    if(is_front_page()){
        wp_enqueue_style('contacts-style', get_template_directory_uri() . '/assets/styles/contacs.css');
        wp_enqueue_script('contacts-script', get_template_directory_uri() . '/js/contacts.js');
        wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main-page.js');
    }
    elseif (is_single()) {
        wp_enqueue_style('excerpt-style', get_template_directory_uri() . '/assets/styles/excerpt.css');
    } elseif (is_page_template('page-offer.php')) {
        wp_enqueue_style('offer-style', get_template_directory_uri() . '/assets/styles/offer-contract.css');
    } elseif (is_page_template('page-digital-format.php')) {
        wp_enqueue_style('digital-style', get_template_directory_uri() . '/styles/digital-book-format.css');
        wp_enqueue_script('digital-js', get_template_directory_uri() . '/js/digital-book-format.js');
    } elseif (is_page_template('page-delivery-payment.php')) {
        wp_enqueue_style('delivery-style', get_template_directory_uri() . '/assets/styles/delivery-payment.css' );
    }

}

function create_stores_post_type() {
    $labels = array(
        'name'               => 'Store',
        'singular_name'      => 'Store',
        'menu_name'          => 'Store',
        'name_admin_bar'     => 'Store',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Store',
        'new_item'           => 'New Store',
        'edit_item'          => 'Edit Store',
        'view_item'          => 'View Store',
        'all_items'          => 'All Store',
        'search_items'       => 'Search Store',
        'parent_item_colon'  => 'Parent Store:',
        'not_found'          => 'No Stores found.',
        'not_found_in_trash' => 'No Stores found in Trash.'
    );

    $args = array(
        'labels'              => $labels,
        'show_in_rest'		  => true,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'store' ),
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-star-filled',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ,  'excerpt'),
        'taxonomies' => array('location'),
    );

    register_post_type( 'store', $args );
}

add_action( 'init', 'create_stores_post_type' );

function wptp_register_taxonomy() {
    register_taxonomy( 'location', 'store',
        array(
            'labels' => array(
                'name'              => 'location',
                'singular_name'     => 'location',
                'search_items'      => 'Search location',
                'all_items'         => 'All locations',
                'edit_item'         => 'Edit location',
                'update_item'       => 'Update location',
                'add_new_item'      => 'Add New location',
                'new_item_name'     => 'New location Name',
                'menu_name'         => 'Location',
            ),
            'hierarchical' => true,
            'show_in_rest' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'show_admin_column' => true
        )
    );
}
add_action( 'init', 'wptp_register_taxonomy' );

function my_custom_gutenberg_block() {
    if (function_exists('acf_register_block_type')) {
        // Register block main-top
        acf_register_block_type(array(
            'name' => 'main-page',
            'title' => 'Main Page',
            'description' => '',
            'render_template' => 'template-parts/blocks/main-page.php',
            'category' => 'common',
            'icon' => 'dashicons-admin-page',
            'keywords' => array('main-page'),
            'mode' => 'edit',
        ));

        acf_register_block_type(array(
            'name' => 'trailer',
            'title' => 'Trailer',
            'description' => '',
            'render_template' => 'template-parts/blocks/trailer.php',
            'category' => 'common',
            'icon' => 'dashicons-admin-page',
            'keywords' => array('trailer'),
            'mode' => 'edit',
        ));

        acf_register_block_type(array(
            'name' => 'book',
            'title' => 'Book',
            'description' => '',
            'render_template' => 'template-parts/blocks/book.php',
            'category' => 'common',
            'icon' => 'dashicons-admin-page',
            'keywords' => array('book'),
            'mode' => 'edit',
        ));

        acf_register_block_type(array(
            'name' => 'reviews',
            'title' => 'Reviews',
            'description' => '',
            'render_template' => 'template-parts/blocks/reviews.php',
            'category' => 'common',
            'icon' => 'dashicons-admin-page',
            'keywords' => array('reviews'),
            'mode' => 'edit',
        ));

        acf_register_block_type(array(
            'name' => 'excerpts',
            'title' => 'Excerpts',
            'description' => '',
            'render_template' => 'template-parts/blocks/excerpts.php',
            'category' => 'common',
            'icon' => 'dashicons-admin-page',
            'keywords' => array('excerpts'),
            'mode' => 'edit',
        ));

        acf_register_block_type(array(
            'name' => 'content-wrapper',
            'title' => 'Content Wrapper',
            'description' => '',
            'render_template' => 'template-parts/blocks/content-wrapper.php',
            'category' => 'common',
            'icon' => 'dashicons-admin-page',
            'keywords' => array('content-wrapper'),
            'mode' => 'edit',
        ));

        acf_register_block_type(array(
            'name' => 'contacts',
            'title' => 'Contacts',
            'description' => '',
            'render_template' => 'template-parts/blocks/contacts.php',
            'category' => 'common',
            'icon' => 'dashicons-admin-page',
            'keywords' => array('contacts'),
            'mode' => 'edit',
        ));
    }

}

add_action('acf/init', 'my_custom_gutenberg_block');

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}

function formatPhoneNumber($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);

    if (strlen($phone) < 10) {
        return $phone; // Повертаємо без змін
    }

    $formatted_phone = '+38 (' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . '-' . substr($phone, 6, 2) . '-' . substr($phone, 8);

    return $formatted_phone;
}


function custom_allow_svg_mime_type($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'custom_allow_svg_mime_type');


function theme_register_menus() {
    register_nav_menus( array(
        'menu-footer'   => 'Footer menu'
    ) );
}
add_action( 'after_setup_theme', 'theme_register_menus' );
