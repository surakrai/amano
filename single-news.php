<?php get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content container">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post();  ?>
        <div class="single-news__content">
          <div class="single-news__image">
            <?php the_post_thumbnail('large') ?>
          </div>
          <span class="single-news__date"><?php echo get_the_date(); ?></span>
          <h2 class="single-news__title"><?php the_title() ?></h2>
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
    <?php endif ?>
  </main>
<?php get_footer(); ?>