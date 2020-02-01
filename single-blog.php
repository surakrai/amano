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
    <div class="related-product">
    <?php
      $cats = wp_get_post_terms( get_the_ID(), 'product_cat', array( 'fields' => 'all' ) );
      $args = array(
        'post_type'       => 'blog',
        'post_status'     => 'publish',
        'posts_per_page'  => 4,
      );
      $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ) { ?>
      <h3><span><?php pll_e('Latest Articles'); ?></span></h3>
      <div class="row">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="col-sm-4 col-6 news-col">
            <figure class="news-item">
              <a class="news-item__thumbnail" href="<?php the_permalink() ?>">
                <?php
                  if( has_post_thumbnail() ) :
                    the_post_thumbnail('thumb-news' );
                  else :
                    echo '<img src="https://via.placeholder.com/150.jpg/f8f8f8/f8f8f8">';
                  endif
                ?>
                <span class="news-item__date"><?php echo get_the_date(); ?></span>
              </a>
              <figcaption class="news-item__caption">
                <h4 class="news-item__title">
                  <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </h4>
              </figcaption>
            </figure>
          </div>
        <?php endwhile; ?>
      </div>
    <?php }
      wp_reset_query();
    ?>
    </div>
  </main>
<?php get_footer(); ?>