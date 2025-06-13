<?php
class ThemeAssets {
    protected string $version;

    public function __construct() {
        $this->version = wp_get_theme()->get('Version');
        add_action('wp_enqueue_scripts', [$this, 'enqueueFront']);
    }

    public function enqueueFront(): void {
        $stylePath = get_stylesheet_directory() . '/assets/css/custom.min.css';


        wp_enqueue_style(
            'theme-style',
            get_stylesheet_directory_uri() . '/assets/css/custom.min.css',
            [],
            file_exists($stylePath) ? filemtime($stylePath) : $this->version
        );

        // wp_enqueue_script(
        //     'theme-script',
        //     get_template_directory_uri() . '/assets/js/main.js',
        //     [],
        //     $this->version,
        //     true
        // );
    }
}
