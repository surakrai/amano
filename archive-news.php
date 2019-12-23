<?php get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content container">
    <?php if ( have_posts() ) : ?>
      <div class="row">
        <?php while ( have_posts() ) : the_post();  ?>
          <div class="col-sm-4 news-col">
            <figure class="news-item">
              <a class="news-thumbnail" href="<?php the_permalink() ?>">
                <?php
                  if( has_post_thumbnail() ) :
                    the_post_thumbnail('thumb-news' );
                  else :
                    echo '<img src="https://via.placeholder.com/150.jpg/f8f8f8/f8f8f8">';
                  endif
                ?>
                <span class="news-date"><?php echo get_the_date(); ?></span>
              </a>
              <figcaption class="news-caption">
                <h4 class="news-title">
                  <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </h4>
              </figcaption>
            </figure>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif ?>
  </main>
<?php get_footer(); ?>