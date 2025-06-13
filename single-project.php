<?php get_header(); ?>

<div class="container my-4 my-lg-5">
  <?php if (have_posts()) : while (have_posts()) : the_post();
    $completion_year = get_field('rok_realizacji');
    $powierzchnia = get_field('powierzchnia')
  ?>
    <article <?php post_class('card shadow-sm border-0 overflow-hidden'); ?>>
      <div class="row g-0">
        <?php if (has_post_thumbnail()) : ?>
          <div class="col-md-5">
            <div class="ratio ratio-16x9">
              <img src="<?php the_post_thumbnail_url('large'); ?>" 
                   class="img-fluid object-fit-cover" 
                   alt="<?php the_title_attribute(); ?>">
            </div>
          </div>
        <?php endif; ?>
        
        <div class="col-md-<?php echo has_post_thumbnail() ? '7' : '12'; ?>">
          <div class="card-body p-4 p-lg-5">
            <h1 class="card-title mb-3 display-5 fw-bold"><?php the_title(); ?></h1>

            <div class="d-flex flex-wrap gap-2 gap-md-3 mb-4 pb-2 border-bottom"></div>

            <div class="mb-5 content-wrapper">
              <?php the_content(); ?>
            </div>

            <!-- Project Details Section -->
            <div class="bg-light-subtle rounded-2 mb-4">
              <h5 class="text-uppercase fw-semibold text-muted fs-6 mb-3">Szczegóły projektu</h5>
              <div class="row row-cols-1 row-cols-md-2 g-3">
                <?php if ($powierzchnia) : ?>
                  <div class="col">
                    <div class="d-flex align-items-center">
                      <div class="bg-primary-subtle text-primary p-2 rounded-2 me-3">
                        <i class="bi bi-arrows-fullscreen fs-5"></i>
                      </div>
                      <div>
                        <div class="text-muted small">Powierzchnia</div>
                        <div class="fw-medium"><?php echo number_format((float)$powierzchnia, 0, ',', ' '); ?> m²</div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                
                <?php if ($completion_year) : ?>
                  <div class="col">
                    <div class="d-flex align-items-center">
                      <div class="bg-primary-subtle text-primary p-2 rounded-2 me-3">
                        <i class="bi bi-calendar-check fs-5"></i>
                      </div>
                      <div>
                        <div class="text-muted small">Rok realizacji</div>
                        <div class="fw-medium"><?php echo esc_html($completion_year); ?></div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                
                <?php
                // Building Type Details
                $building_types = get_the_terms(get_the_ID(), 'building_type');
                if ($building_types && !is_wp_error($building_types)) : 
                  foreach ($building_types as $type) : ?>
                    <div class="col">
                      <div class="d-flex align-items-center">
                        <div class="bg-primary-subtle text-primary p-2 rounded-2 me-3">
                          <i class="bi bi-building fs-5"></i>
                        </div>
                        <div>
                          <div class="text-muted small">Typ budynku</div>
                          <div class="fw-medium"><?php echo esc_html($type->name); ?></div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach;
                endif; ?>
                
                <?php
                // Project Status Details
                $statuses = get_the_terms(get_the_ID(), 'project_status');
                if ($statuses && !is_wp_error($statuses)) : 
                  foreach ($statuses as $status) : ?>
                    <div class="col">
                      <div class="d-flex align-items-center">
                        <div class="bg-primary-subtle text-primary p-2 rounded-2 me-3"></div>
                        <div>
                          <div class="text-muted small">Status projektu</div>
                          <div class="fw-medium"><?php echo esc_html($status->name); ?></div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach;
                endif; ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </article>
  <?php endwhile; else : ?>
    <p class="alert alert-info"><?php esc_html_e('Brak projektów do wyświetlenia.', 'textdomain'); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>