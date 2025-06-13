<form method="get" action="<?php echo get_post_type_archive_link('project'); ?>" class="row g-3 mb-5">
    <?php
    $filters = [
        [
            'label' => 'Typ budynku',
            'taxonomy' => 'building_type',
            'name' => 'building_type',
        ],
        [
            'label' => 'Status projektu',
            'taxonomy' => 'project_status',
            'name' => 'project_status',
        ]
    ];

    foreach ($filters as $filter) :
        $terms = get_terms(['taxonomy' => $filter['taxonomy']]);
    ?>
        <div class="col-md-4">
            <label for="<?= $filter['name'] ?>" class="form-label"><?= $filter['label'] ?></label>
            <select name="<?= $filter['name'] ?>" id="<?= $filter['name'] ?>" class="form-select">
                <option value="">Wszystkie</option>
                <?php foreach ($terms as $term) :
                    $selected = selected($_GET[$filter['name']] ?? '', $term->slug, false); ?>
                    <option value="<?= $term->slug ?>" <?= $selected ?>><?= $term->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php endforeach; ?>

    <div class="col-md-4 d-flex align-items-end">
        <div class="d-flex gap-2 w-100">
            <button type="submit" class="btn btn-dark w-100">Filtruj</button>
            <a href="<?php echo get_post_type_archive_link('project'); ?>" class="btn btn-outline-dark w-100">Wyczyść</a>
        </div>
    </div>
</form>