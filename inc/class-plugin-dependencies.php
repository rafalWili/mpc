<?php
class PluginDependencies {
    public function __construct() {
        add_action('tgmpa_register', [$this, 'register_required_plugins']);
    }

    public function register_required_plugins() {
        $plugins = [
            [
                'name'     => 'Advanced Custom Fields',
                'slug'     => 'advanced-custom-fields',
                'required' => true,
            ],
        ];

        $config = [
            'id'           => 'child_theme_project',
            'menu'         => 'tgmpa-install-plugins',
            'has_notices'  => true,
            'dismissable'  => false,
            'is_automatic' => true,
        ];

        tgmpa($plugins, $config);
    }
}
