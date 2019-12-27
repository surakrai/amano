<?php get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title"><?php pll_e('Amano’s Reference'); ?><small><?php the_title(); ?></small></h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content container product-archive">
    <?php get_template_part( 'templates/archive', 'gallery' ); ?>
  </main>
<?php get_footer(); ?>