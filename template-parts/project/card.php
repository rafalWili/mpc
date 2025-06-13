<div class="col">
    <div class="card h-100 shadow-sm project-card">
        <div class="project-thumb-wrapper">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium', [
                        'class' => 'img-fluid w-100 project-thumb',
                        'alt' => get_the_title(),
                        'loading' => 'lazy'
                    ]); ?>
                <?php else : ?>
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        <span class="text-muted">Brak zdjęcia</span>
                    </div>
                <?php endif; ?>
            </a>
        </div>

        <div class="card-body">
            <h5 class="card-title">
                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                    <?php the_title(); ?>
                </a>
            </h5>

            <p class="card-text mb-1">
                <strong>Powierzchnia:</strong> <?php the_field('powierzchnia'); ?> m²
            </p>

            <p class="card-text mb-2">
                <strong>Rok:</strong> <?php the_field('rok_realizacji'); ?>
            </p>

            <?php
                $project_id = get_the_ID();
                get_template_part('template-parts/project/terms-badges', null, ['project_id' => $project_id]);
            ?>
            
        </div>
    </div>
</div>
