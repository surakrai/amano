<div class="row">
  <div class="col-md-3">
    <div class="sidebar">
      <div class="widget widget--product-category">
        <h3 class="widget__title">Product Categories</h3>
        <div class="widget__content">
          <ul>
            <?php wp_list_categories(array(
              'taxonomy'          => 'product_cat',
              'show_option_all'   => __('All' , THEME_SLUG),
              'show_count'        => false,
              'hide_empty'        => false,
              'title_li'          => false,
              'order_by'          => 'name',
              'order'             => 'DESC',
            )); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="row">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div class="col-md-4">
            <div class="tours-item">
              <a href="<?php the_permalink() ?>" class="tours-thumbnail">
                <?php
                  if( has_post_thumbnail() ) : echo get_the_post_thumbnail( get_the_ID(), 'thumb-attractions' );
                  else : echo "<img src='https://via.placeholder.com/360x320/09f/fff'>";
                  endif;
                ?>
              </a>
              <h4 class="tours-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
              <div class="tours-info"></div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif ?>
    </div>
    <?php the_pagination(); ?>
  </div>
</div>