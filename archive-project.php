<?php get_header(); ?>

<main class="container py-5">
    <h1 class="mb-4">Projekty</h1>

    <?php get_template_part('template-parts/project/filter-form'); ?>

    <section class="row row-cols-1 row-cols-md-3 g-4">
        <?php if (have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/project/card');
            endwhile;
        else :
            get_template_part('template-parts/project/no-results');
        endif; ?>
    </section>

    <div class="mt-5">
        <?php echo paginate_links(['prev_text' => '&laquo;', 'next_text' => '&raquo;']); ?>
    </div>
</main>

<?php get_footer(); ?>
