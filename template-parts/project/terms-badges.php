<?php
$project_id = $project_id ?? get_the_ID();

$building_types = get_the_terms($project_id, 'building_type');
$statuses = get_the_terms($project_id, 'project_status');

$terms = [];

if (!empty($building_types)) {
    foreach ($building_types as $term) {
        $term->badge_class = 'bg-primary'; 
        $terms[] = $term;
    }
}

if (!empty($statuses)) {
    foreach ($statuses as $term) {
        $term->badge_class = 'bg-success'; 
        $terms[] = $term;
    }
}
?>

<?php if (!empty($terms)) : ?>
    <div class="d-flex flex-wrap gap-1">
        <?php foreach ($terms as $term) : ?>
            <span class="badge <?= esc_attr($term->badge_class) ?>">
                <?= esc_html($term->name) ?>
            </span>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
