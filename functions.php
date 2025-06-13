<?php
require_once __DIR__ . '/inc/libs/class-tgm-plugin-activation.php';
require_once __DIR__ . '/inc/class-plugin-dependencies.php';
require_once __DIR__ . '/inc/class-post-type.php';
require_once __DIR__ . '/inc/class-taxonomies.php';
require_once __DIR__ . '/inc/class-acf-fields.php';
require_once __DIR__ . '/inc/class-admin-notices.php';
require_once __DIR__ . '/inc/class-theme-assets.php';
require_once __DIR__ . '/inc/class-theme-init.php';

// run the theme initialization
new ThemeInit();

// Filter to modify the query for the project post type archive
add_action('pre_get_posts', function ($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('project')) {
        $query->set('posts_per_page', 3);
    }
});

// Add custom classes to pagination links
add_filter('next_posts_link_attributes', function() {
    return 'class="page-link"';
});
add_filter('previous_posts_link_attributes', function() {
    return 'class="page-link"';
});