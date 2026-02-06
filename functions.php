<?php

function register_specialists() {
    register_post_type('specialists', [
        'labels' => ['name' => 'Specialists', 'singular_name' => 'Specialist'],
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-businessman',
    ]);
    register_taxonomy('specialist_category', 'specialists', [
        'hierarchical' => true,
        'label' => 'Specialist Categories',
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'specialist-category'],
    ]);
}
add_action('init', 'register_specialists');

function enqueue_specialists_assets() {
    wp_enqueue_style(
        'theme-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        filemtime(get_template_directory() . '/assets/css/main.css')
    );
    wp_enqueue_script(
        'specialists-ajax',
        get_template_directory_uri() . '/assets/js/ajax-filter.js',
        array('jquery'),
        null,
        true
    );

    wp_localize_script('specialists-ajax', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}

add_action('wp_enqueue_scripts', 'enqueue_specialists_assets');

function filter_specialists_handler() {
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $featured = isset($_POST['featured']) ? $_POST['featured'] : '';

    $args = array(
        'post_type' => 'specialists',
        'posts_per_page' => -1,
    );

    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'specialist_category',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        );
    }

    if ($featured === 'true') {
        $args['meta_query'] = array(
            array(
                'key'   => 'featured_specialist',
                'value' => '1',
                'compare' => '=='
            ),
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/specialist', 'card');
        endwhile;
    else:
        echo 'Specialists not found.';
    endif;

    wp_reset_postdata();
    wp_die();
}

add_action('wp_ajax_filter_specialists', 'filter_specialists_handler');
add_action('wp_ajax_nopriv_filter_specialists', 'filter_specialists_handler');