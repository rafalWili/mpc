<?php
class AdminNotices {
    public function check_dependencies() {
        add_action('admin_notices', [$this, 'show_notices']);
    }

    public function show_notices() {
        if (!post_type_exists('project')) {
            echo '<div class="notice notice-error"><p>Custom Post Type "Projekty" nie jest zarejestrowany.</p></div>';
        }
        if (!function_exists('acf_add_local_field_group')) {
            echo '<div class="notice notice-warning"><p>Wtyczka ACF nie jest aktywna. Pola dodatkowe nie będą działać.</p></div>';
        }
    }
}
