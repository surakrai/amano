<div class="row">
  <div class="col-md-3">
    <div class="sidebar">
      <div class="widget widget--product-category">
        <h3 class="widget__title">Product Categories</h3>
        <div class="widget__content">
          <ul>
            <?php wp_list_categories(array(
              'taxonomy'          => 'product_cat',
              'show_option_all'   => __('All Products' , THEME_SLUG),
              'show_count'        => false,
              'hide_empty'        => false,
              'title_li'          => false,
              'orderby'           => 'ID',
              'order'             => 'ASC',
            )); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 product">
    <div class="row amano-row">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div class="col-md-4 amano-col">
            <div class="product-item">
              <a href="<?php the_permalink() ?>" class="product-item__thumbnail">
                <?php
                  if( has_post_thumbnail() ) : echo get_the_post_thumbnail( get_the_ID(), 'medium' );
                  else : echo "<img src='https://via.placeholder.com/600x600/e8e8e8/e8e8e8'>";
                  endif;
                ?>
              </a>
              <h4 class="product-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <div class="product-item__model"><?php the_field('_product_model'); ?></div>
              <a class="product-item__view-detail" href="<?php the_permalink() ?>"><?php pll_e('View Detail') ?></a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif ?>
    </div>
    <?php the_pagination(); ?>
  </div>
</div>