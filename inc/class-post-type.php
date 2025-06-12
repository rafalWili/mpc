<?php
class ProjectPostType {
    public function register() {
        $labels = [
            'name' => __('Projekty', 'mpc-architect-theme'),
            'singular_name' => __('Projekt', 'mpc-architect-theme'),
            'add_new' => __('Dodaj nowy', 'mpc-architect-theme'),
            'add_new_item' => __('Dodaj nowy projekt', 'mpc-architect-theme'),
            'edit_item' => __('Edytuj projekt', 'mpc-architect-theme'),
            'new_item' => __('Nowy projekt', 'mpc-architect-theme'),
            'view_item' => __('Zobacz projekt', 'mpc-architect-theme'),
            'search_items' => __('Szukaj projektów', 'mpc-architect-theme'),    
            'not_found' => __('Nie znaleziono projektów', 'mpc-architect-theme'),
            'not_found_in_trash' => __('Nie znaleziono projektów w koszu', 'mpc-architect-theme'),
            'all_items' => __('Wszystkie projekty', 'mpc-architect-theme'),
            'menu_name' => __('Projekty', 'mpc-architect-theme'),
            'name_admin_bar' => __('Projekt', 'mpc-architect-theme'),
            ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'has_archive'        => true,
            'supports'           => ['title', 'editor', 'thumbnail'],
            'show_in_rest'       => true,
            'rewrite'            => ['slug' => 'projekty'],
            'menu_icon' => 'dashicons-portfolio', 

        ];

        register_post_type('project', $args);
    }
}
