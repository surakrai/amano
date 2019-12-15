<?php
/**
 * Template Name: Service
 */
get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content main-content-service service">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post();  ?>

        <div class="service-intro container">
          <?php the_content(); ?>
        </div>

        <div class="service-wrapper">
          <div class="container">
            <div class="service-item">
              <h3 class="service-title"><?php the_field('_service_transfer_service_title'); ?></h3>
              <?php if( have_rows('_service_transfer_service') ): ?>
              <ul class="service-name row">
                <?php while( have_rows('_service_transfer_service') ): the_row(); ?>
                <li class="col-sm-4">
                  <i class="<?php the_sub_field('icon') ?>"></i> <span><?php the_sub_field('name') ?></span>
                </li>
                <?php endwhile; ?>
              </ul>
              <?php endif; ?>
            </div>
            <div class="service-item">
              <h3 class="service-title"><?php the_field('_service_tour_excursions_title'); ?></h3>
              <?php if( have_rows('_service_tour_excursions') ): ?>
              <ul class="service-name row">
                <?php while( have_rows('_service_tour_excursions') ): the_row(); ?>
                <li class="col-sm-4">
                  <i class="<?php the_sub_field('icon') ?>"></i> <span><?php the_sub_field('name') ?></span>
                </li>
                <?php endwhile; ?>
              </ul>
              <?php endif; ?>
            </div>
            <div class="service-item">
              <h3 class="service-title"><?php the_field('_service_printing_scanning_title'); ?></h3>
              <?php if( have_rows('_service_printing_scanning') ): ?>
              <ul class="service-name row">
                <?php while( have_rows('_service_printing_scanning') ): the_row(); ?>
                <li class="col-sm-4">
                  <i class="<?php the_sub_field('icon') ?>"></i> <span><?php the_sub_field('name') ?></span>
                </li>
                <?php endwhile; ?>
              </ul>
              <?php endif; ?>
            </div>

            <div class="row">
              <div class="col-sm-4">
                <div class="service-item">
                  <h3 class="service-title"><?php the_field('_service_agro_tourism_title'); ?></h3>
                  <?php if( have_rows('_service_agro_tourism') ): ?>
                  <ul class="service-name">
                    <?php while( have_rows('_service_agro_tourism') ): the_row(); ?>
                    <li>
                      <i class="<?php the_sub_field('icon') ?>"></i> <span><?php the_sub_field('name') ?></span>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="service-item">
                  <h3 class="service-title"><?php the_field('_service_mobile_services_title'); ?></h3>
                  <?php if( have_rows('_service_mobile_services') ): ?>
                  <ul class="service-name">
                    <?php while( have_rows('_service_mobile_services') ): the_row(); ?>
                    <li>
                      <i class="<?php the_sub_field('icon') ?>"></i> <span><?php the_sub_field('name') ?></span>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="service-item">
                  <h3 class="service-title"><?php the_field('_service_other_services_title'); ?></h3>
                  <?php if( have_rows('_service_other_services') ): ?>
                  <ul class="service-name">
                    <?php while( have_rows('_service_other_services') ): the_row(); ?>
                    <li>
                      <i class="<?php the_sub_field('icon') ?>"></i> <span><?php the_sub_field('name') ?></span>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php endif; ?>
                </div>
              </div>
            </div> 
          </div>
        </div>

        <div class="service-content container">
          <?php echo wpautop(get_field('_service_content')); ?>
        </div>

      <?php endwhile; ?>
    <?php endif ?>
  </main>
<?php get_footer(); ?>