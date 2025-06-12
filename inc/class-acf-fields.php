<?php
class ProjectACF {
    public function register() {
        if (!function_exists('acf_add_local_field_group')) {
            return; // ACF inactive
        }

        acf_add_local_field_group([
            'key' => 'group_project_details',
            'title' => 'Dodatkowe informacje o projekcie',
            'fields' => [
                [
                    'key' => 'field_powierzchnia',
                    'label' => 'Powierzchnia (m²)',
                    'name' => 'powierzchnia',
                    'type' => 'number',
                    'required' => 0,
                    'show_in_rest' => 1,
                ],
                [
                    'key' => 'field_rok_realizacji',
                    'label' => 'Rok realizacji',
                    'name' => 'rok_realizacji',
                    'type' => 'number',
                    'required' => 0,
                    'show_in_rest' => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'project',
                    ],
                ],
            ],
        ]);
    }
}
