<?php get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content container product-archive">
    <?php get_template_part( 'templates/archive', 'product' ); ?>
  </main>
<?php get_footer(); ?>