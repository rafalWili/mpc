<?php

class ProjectAdminColumns {
    private $current_taxonomy_sort = '';

    public function __construct() {
        add_filter('manage_project_posts_columns', [$this, 'add_columns']);
        add_action('manage_project_posts_custom_column', [$this, 'fill_columns'], 10, 2);
        
        add_filter('manage_edit-project_sortable_columns', [$this, 'add_sortable_columns']);
        add_action('pre_get_posts', [$this, 'handle_sorting']);
    }

    public function add_columns($columns) {
        $new_columns = [];

        foreach ($columns as $key => $label) {
            $new_columns[$key] = $label;
            if ($key === 'title') {
                $new_columns['building_type'] = __('Typ budynku', 'mpc-architect-theme');
                $new_columns['project_status'] = __('Status projektu', 'mpc-architect-theme');
                $new_columns['year'] = __('Rok realizacji', 'mpc-architect-theme');
            }
        }

        return $new_columns;
    }

    public function fill_columns($column, $post_id) {
        if ($column === 'building_type') {
            $terms = get_the_terms($post_id, 'building_type');
            echo $this->render_terms($terms);
        }

        if ($column === 'project_status') {
            $terms = get_the_terms($post_id, 'project_status');
            echo $this->render_terms($terms);
        }

        if ($column === 'year') {
            $year = get_field('rok_realizacji', $post_id); 
            echo esc_html($year ? $year : '—');
        }
    }

    public function add_sortable_columns($columns) {
        $columns['building_type'] = 'building_type';
        $columns['project_status'] = 'project_status';
        $columns['year'] = 'year';
        return $columns;
    }

    public function handle_sorting($query) {
        if (!is_admin() || !$query->is_main_query() || $query->get('post_type') !== 'project') {
            return;
        }

        $orderby = $query->get('orderby');

        if ($orderby === 'year') {
            $query->set('meta_key', 'rok_realizacji');
            $query->set('orderby', 'meta_value_num');
        }
        elseif (in_array($orderby, ['building_type', 'project_status'])) {
            $this->current_taxonomy_sort = $orderby;
            add_filter('posts_clauses', [$this, 'handle_taxonomy_sorting'], 10, 2);
        }
    }

    public function handle_taxonomy_sorting($clauses, $query) {
        global $wpdb;

        $taxonomy = $this->current_taxonomy_sort;
        $order = strtoupper($query->get('order')) === 'ASC' ? 'ASC' : 'DESC';

        $clauses['join'] .= "
            LEFT JOIN {$wpdb->term_relationships} AS tr ON {$wpdb->posts}.ID = tr.object_id
            LEFT JOIN {$wpdb->term_taxonomy} AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
            LEFT JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
        ";

        $clauses['where'] .= $wpdb->prepare(" AND tt.taxonomy = %s", $taxonomy);
        $clauses['groupby'] = "{$wpdb->posts}.ID";
        $clauses['orderby'] = "GROUP_CONCAT(t.name ORDER BY t.name ASC) $order";

        remove_filter('posts_clauses', [$this, 'handle_taxonomy_sorting']);
        return $clauses;
    }

    private function render_terms($terms) {
        if (!empty($terms) && !is_wp_error($terms)) {
            return esc_html(join(', ', wp_list_pluck($terms, 'name')));
        }
        return '—';
    }
}