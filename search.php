<?php get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title">Keyword : <?php echo get_query_var('s') ?></h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content container product-archive">
    <?php get_template_part( 'templates/archive', 'product' ); ?>
  </main>
<?php get_footer(); ?>