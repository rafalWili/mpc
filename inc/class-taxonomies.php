<?php
class ProjectTaxonomies {
    public function register() {
        // build Type  - none hierarchical
        register_taxonomy('building_type', 'project', [
            'label' => __('Typ budynku', 'mpc-architect-theme'),
            'public' => true,
            'hierarchical' => false,
            'show_in_rest' => true,
            'rewrite' => ['slug' => 'typ-budynku'],
            'labels' => [
                'add_new_item' => __('Dodaj nowy typ budynku', 'mpc-architect-theme'),
                'edit_item' => __('Edytuj typ budynku', 'mpc-architect-theme'),
                'new_item' => __('Nowy typ budynku', 'mpc-architect-theme'),
                'view_item' => __('Zobacz typ budynku', 'mpc-architect-theme'),
                'search_items' => __('Szukaj typów budynków', 'mpc-architect-theme'),
                'not_found' => __('Nie znaleziono typów budynków', 'mpc-architect-theme'),
                'not_found_in_trash' => __('Nie znaleziono typów budynków w koszu', 'mpc-architect-theme'),
            ],
        ]);

        // project Status - none hierarchical
        register_taxonomy('project_status', 'project', [
            'label' => __('Status projektu', 'mpc-architect-theme'),
            'public' => true,
            'hierarchical' => false,
            'show_in_rest' => true,
            'rewrite' => ['slug' => 'status-projektu'],
            'labels' => [
                'add_new_item' => __('Dodaj nowy status projektu', 'mpc-architect-theme'),
                'edit_item' => __('Edytuj status projektu', 'mpc-architect-theme'),
                'new_item' => __('Nowy status projektu', 'mpc-architect-theme'),
                'view_item' => __('Zobacz status projektu', 'mpc-architect-theme'),
                'search_items' => __('Szukaj statusów projektów', 'mpc-architect-theme'),
                'not_found' => __('Nie znaleziono statusów projektów', 'mpc-architect-theme'),
                'not_found_in_trash' => __('Nie znaleziono statusów projektów w koszu', 'mpc-architect-theme'),
            ],

        ]);
    }
}
