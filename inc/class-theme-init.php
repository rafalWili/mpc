<?php
class ThemeInit {
    private $plugin_dependencies;
    private $post_type;
    private $taxonomies;
    private $acf;
    private $admin_notices;

    public function __construct() {

        add_filter('use_block_editor_for_post', '__return_false', 10);
        add_filter('use_widgets_block_editor', '__return_false');

        $this->plugin_dependencies = new PluginDependencies();
        $this->post_type = new ProjectPostType();
        $this->taxonomies = new ProjectTaxonomies();
        $this->acf = new ProjectACF();
        $this->admin_notices = new AdminNotices();

        add_action('init', [$this->post_type, 'register']);
        add_action('init', [$this->taxonomies, 'register']);
        add_action('acf/init', [$this->acf, 'register']);
        $this->admin_notices->check_dependencies();
    }
}