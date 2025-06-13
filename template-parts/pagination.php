<?php
global $wp_query;

$pagination = paginate_links([
    'prev_text' => '&laquo;',
    'next_text' => '&raquo;',
    'type'      => 'array',
    'current'   => max(1, get_query_var('paged')),
    'total'     => $wp_query->max_num_pages,
]);

if ($pagination) : ?>
    <nav aria-label="Paginacja" class="mt-5">
        <ul class="pagination justify-content-center">
            <?php foreach ($pagination as $page) : ?>
                <li class="page-item <?= strpos($page, 'current') !== false ? 'active' : '' ?>">
                    <?= str_replace('page-numbers', 'page-link', $page); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
<?php endif; ?>
