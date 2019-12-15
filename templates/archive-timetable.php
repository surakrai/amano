<div class="row">
  <div class="col-md-4">
    <ul class="timetable-type">
      <?php wp_list_categories( array(
        'taxonomy'          => 'timetable_type',
        'show_option_all'   => __( 'All' , THEME_SLUG ),
        'show_count'        => false,
        'hide_empty'        => false,
        'title_li'          => false,
        'order_by'          => 'name',
        'order'             => 'ASC',
      ) ); ?>
    </ul>
  </div>
  <div class="col-md-8">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
          $from        = wp_get_post_terms(get_the_ID(), 'timetable_from');
          $to          = wp_get_post_terms(get_the_ID(), 'timetable_to');
          $price_adult = get_field('timetable_price_adult', get_the_ID());
          $price_child = get_field('timetable_price_child', get_the_ID());
        ?>

        <div class="timetable-item">
          <h4 class="timetable-title">
            <?php echo $from[0]->name; ?> <i class="flaticon-next-1"></i> <?php echo $to[0]->name; ?> <small>(<?php the_title(); ?>)</small>
          </h4>

          <?php if(get_the_content()) : ?>
            <div class="timetable-description"><?php the_content(); ?></div>
          <?php endif; ?>

          <div class="d-flex justify-content-between align-items-center">
            <div class="timetable-price d-flex">
              <span class="label">Price :</span>
              <?php if($price_adult) : ?><span class="adult"><strong>Adult :</strong> ฿<?php echo number_format(max(0, $price_adult)) ?></span><?php endif; ?>
              <?php if($price_child) : ?><span class="child"><strong>Child :</strong> ฿<?php echo number_format(max(0, $price_child)) ?></span><?php endif; ?>
            </div>

            <button class="timetable-btn" type="button" data-toggle="collapse" data-target="#time-<?php the_ID(); ?>" aria-expanded="false" aria-controls="ime-<?php the_ID(); ?>">
              <i class="flaticon-time-and-date"></i> Time
            </button>
          </div>



          <div class="timetable-time">
            <div class="collapse" id="time-<?php the_ID(); ?>">
              <?php if( have_rows('timetable_time') ): ?>
                <div class="timetable-time-inner">
                  <?php while( have_rows('timetable_time') ): the_row(); ?>
                    <?php
                      $start    = get_sub_field('start');
                      $end      = get_sub_field('end');
                      $detail   = get_sub_field('detail');
                    ?>
                    <div class="timetable-time-item d-flex justify-content-between align-items-center">
                      <div class="d-flex">
                        <div class="timetable-time-duration"><?php echo $start; ?> - <?php echo $end; ?></div>
                        <div class="timetable-time-detail"><?php echo $detail; ?></div>
                      </div>
                      <a href="#" class="timetable-time-btn"> Book now </a>
                    </div>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif ?>
    <?php the_pagination(); ?>
  </div>
</div>