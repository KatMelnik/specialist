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