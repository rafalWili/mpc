<?php
class AdminNotices {
    private $min_php = '8.0';
    private $min_wp  = '6.0';

    public function check_dependencies() {
        add_action('admin_notices', [$this, 'show_notices']);
    }

    public function show_notices() {
        
        // check PHP version        
        if (version_compare(PHP_VERSION, $this->min_php, '<')) {
            echo '<div class="notice notice-error"><p>';
            echo 'Motyw wymaga PHP w wersji ' . $this->min_php . ' lub wyższej. Obecna wersja to: <strong>' . PHP_VERSION . '</strong>.';
            echo '</p></div>';
        }

        // check WordPress
        global $wp_version;
        if (version_compare($wp_version, $this->min_wp, '<')) {
            echo '<div class="notice notice-error"><p>';
            echo 'Motyw wymaga WordPressa w wersji ' . $this->min_wp . ' lub wyższej. Obecna wersja to: <strong>' . $wp_version . '</strong>.';
            echo '</p></div>';
        }

        if (!post_type_exists('project')) {
            echo '<div class="notice notice-error"><p>Custom Post Type "Projekty" nie jest zarejestrowany.</p></div>';
        }
        if (!function_exists('acf_add_local_field_group')) {
            echo '<div class="notice notice-warning"><p>Wtyczka ACF nie jest aktywna. Pola dodatkowe nie będą działać.</p></div>';
        }
    }
}
