<?php
/**
 * Template Name: About US
 */
get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content main-content-about about container">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post();  ?>

        <div class="about-item --overview row">
          <div class="col-sm-2">
            <h3 class="about-title"><?php the_field('_about_overview_title'); ?></h3>
          </div>
          <div class="col-sm-10">
            <div class="about-content">
              <?php echo wpautop(get_field('_about_overview_content')); ?>
            </div>
          </div>
        </div>

        <div class="about-item --service row">
          <div class="col-sm-2">
            <h3 class="about-title"><?php the_field('_about_service_title'); ?></h3>
          </div>
          <div class="col-sm-10">
            <div class="about-content">
              <?php echo wpautop(get_field('_about_service_content')); ?>
            </div>
          </div>
        </div>

        <div class="about-item --why">
          <h3 class="about-title"><?php the_field('_about_why_title'); ?></h3>
          <div class="about-content">
            <?php echo wpautop(get_field('_about_why_content')); ?>
          </div>
        </div>

      <?php endwhile; ?>
    <?php endif ?>
  </main>
<?php get_footer(); ?>