<?php get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title"><?php single_cat_title(); ?></h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content container timetable-archive">
    <?php get_template_part( 'templates/archive', 'tours' ); ?>
  </main>
<?php get_footer(); ?>