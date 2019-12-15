<?php get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content container">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post();  ?>
        <div class="the-content">
          <?php //the_content(); ?>
        </div>
      <?php endwhile; ?>
    <?php endif ?>
  </main>
<?php get_footer(); ?>