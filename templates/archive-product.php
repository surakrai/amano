<div class="row">
  <div class="col-lg-3">
    <div class="sidebar">
      <div class="widget widget--product-category">
        <h3 class="widget__title">Product Categories</h3>
        <div class="widget__content">
          <?php $args = array(
            'taxonomy'          => 'product_cat',
            'depth'             => 0,
            'hierarchical'      => 1,
            'selected'          => is_tax() ? get_queried_object()->slug : 0,
            'show_option_all'   => __('All Products' , THEME_SLUG),
            'class'             => 'd-lg-none category-select',
            'show_count'        => false,
            'hide_empty'        => false,
            'title_li'          => false,
            'orderby'           => 'name',
            'order'             => 'DESC',
            'value_field'       => 'slug'
          ); ?>
          <?php wp_dropdown_categories($args); ?>
          <ul class="d-none d-lg-block">
            <?php wp_list_categories($args); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-9 product">
    <div class="row product-row">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div class="col-md-4 col-6 product-col">
            <div class="product-item">
              <a href="<?php the_permalink() ?>" class="product-item__thumbnail">
                <?php
                  if( has_post_thumbnail() ) : echo get_the_post_thumbnail( get_the_ID(), 'thumb-product' );
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
      <?php else: ?>
      <?php endif ?>
    </div>
    <?php the_pagination(); ?>
  </div>
</div>