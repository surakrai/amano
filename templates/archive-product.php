<?php 
  $args = array(
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
  ); 
?>
<div class="row">
  <div class="col-lg-3">
    <div class="sidebar">
      <div class="widget widget--product-search">
        <h3 class="widget__title"><?php pll_e('Product Search') ?></h3>
        <div class="row">
          <div class="col-6">
            <?php wp_dropdown_categories($args); ?>
          </div>
          <div class="col-lg-12 col-6">
            <form action="">
              <input type="text" name="s" placeholder="<?php pll_e('Keyword') ?>" value="<?php echo get_search_query() ?>">
              <button type="submit">
                <svg version="1.1" fill="#E8E8E8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                <g>
                  <g>
                    <path d="M508.874,478.708L360.142,329.976c28.21-34.827,45.191-79.103,45.191-127.309c0-111.75-90.917-202.667-202.667-202.667
                      S0,90.917,0,202.667s90.917,202.667,202.667,202.667c48.206,0,92.482-16.982,127.309-45.191l148.732,148.732
                      c4.167,4.165,10.919,4.165,15.086,0l15.081-15.082C513.04,489.627,513.04,482.873,508.874,478.708z M202.667,362.667
                      c-88.229,0-160-71.771-160-160s71.771-160,160-160s160,71.771,160,160S290.896,362.667,202.667,362.667z"/>
                  </g>
                </g>
                </svg>
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="widget widget--product-category d-none d-lg-block">
        <h3 class="widget__title is-product-category"><?php pll_e('Product Categories') ?></h3>
        <div class="widget__content">
          <ul>
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