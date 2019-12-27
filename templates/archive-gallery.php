<div class="row">
  <div class="col-md-3">
    <div class="sidebar">
      <div class="widget">
        <h3 class="widget__title"><?php pll_e('Amano’s Reference'); ?></h3>
        <div class="widget__content">
          <?php
            $args = array(
              'post_type'        => array('gallery'),
              'posts_per_page'   => -1,
              'post_status'      => 'publish',
            );
            $the_query = new WP_Query($args);
            if( is_singular() ) {
              $current_id = get_the_ID();
            }else {
              $current_id = 0;
            }
          ?>
          <?php if ( $the_query->have_posts() ) : ?>
            <ul>
              <li class="<?php if(0 === $current_id ) echo 'current-cat' ?>"><a href="<?php echo get_post_type_archive_link('gallery'); ?>"><?php pll_e('All') ?></a></li>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <li class="<?php if(get_the_ID() === $current_id ) echo 'current-cat' ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
            </ul>
            <?php wp_reset_query(); ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 gallery-col">
    <?php $gallery_ids = array();
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
        $gallery_ids[] = get_the_ID();
      endwhile;
    endif ?>

    <div class="row amano-row gallery-row">
      <?php
        $args = array(
          'post_type'        => 'attachment',
          'posts_per_page'   => 12,
          'post_status'      => 'inherit',
          'post__in'         => Amano_Gallery::get_instance()->get_gallery($gallery_ids),
          'orderby'          => 'post__in'
        );
        $the_query = new WP_Query( $args );
      ?>
      <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <a class="gallery__item amano-col col-md-4 glightbox" 
            href="<?php echo wp_get_attachment_image_url(get_the_ID(), 'large') ?>"
            data-glightbox="description: <?php echo get_the_content(); ?>; descPosition: bottom"
          >
            <?php echo wp_get_attachment_image(get_the_ID(), 'thumb-gallery') ?>
          </a>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
      <?php endif ?>
    </div>
    <?php if($the_query->max_num_pages > 1) : ?>
    <form action="" name="galleryinfo">
      <input type="hidden" name="page" value="1">
      <input type="hidden" name="posts" value="<?php echo implode(',', $gallery_ids); ?>">
      <p class="text-center pt-4"><button type="submit" class="button"><span><?php pll_e('Load More') ?></span><div class="rippleJS"></div></button></p>
    </form>
    <?php endif; ?>
  </div>
</div>