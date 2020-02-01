<?php
/**
 * Template Name: About US
 */
get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content main-content--about">
    <div class="about container">
      <div class="container">
        <div class="about__description">
          <?php the_field('_about_greetings_content'); ?>
        </div>
        <div class="about__feature row">
          <?php if( have_rows('_about_greetings_feature') ): ?>
            <?php while( have_rows('_about_greetings_feature') ): the_row(); ?>
              <div class="about__feature-item col-xl-2 col-md-4  col-6">
                <?php echo wp_get_attachment_image(get_sub_field('image'), 'about-feature'); ?>
                <p class="about__feature-description"><?php the_sub_field('description'); ?></p>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="business-area">
			<div class="video-player">
				<iframe
					id="video-player__iframe"
					class="video-player__iframe"
					src="https://www.youtube.com/embed/VAe16A_NSFE?autoplay=0&rel=0&modestbranding=1" 
					frameborder="0"
					allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
					allowfullscreen="true"
				>
				</iframe>
				<a href="#" class="video-player__play">
					<i class="video-player__icon-play"></i>
					<div class="video-player__body">
						<H3>AMANO THAI INTERNATIONAL</h3>
						<span>PLAY VIDEO</span>
					</div>
				</a>
			</div>
    </div>

    <div id="management-philosophy" class="management-philosophy">
      <div class="container">
        <div class="management-philosophy__content">
          <?php the_field('_about_management_philosophy_content'); ?>
        </div>
        <div class="row no-gutters">
          <div class="col-xl-4">
            <div class="management-philosophy-item row no-gutters">
              <div class="management-philosophy-item__image col-xl-12 col-md-6 col-12">
                <?php echo wp_get_attachment_image(get_field('_about_management_philosophy_item_1_image'), 'full'); ?>
              </div>
              <div class="management-philosophy-item__description col-xl-12 col-md-6 col-12">
                <h4><?php the_field('_about_management_philosophy_item_1_title') ?></h4>
                <?php echo wpautop(get_field('_about_management_philosophy_item_1_description')); ?>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="management-philosophy-item row no-gutters">
              <div class="management-philosophy-item__image order-md-last col-xl-12 col-md-6 col-12">
                <?php echo wp_get_attachment_image(get_field('_about_management_philosophy_item_2_image'), 'full') ?>
              </div>
              <div class="management-philosophy-item__description order-md-first col-xl-12 col-md-6 col-12">
                <h4 class="d-xl-none"><?php the_field('_about_management_philosophy_item_2_title') ?></h4>
                <?php echo wpautop(get_field('_about_management_philosophy_item_2_description')); ?>
                <h4 class="d-none d-xl-block"><?php the_field('_about_management_philosophy_item_2_title') ?></h4>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="management-philosophy-item row no-gutters">
              <div class="management-philosophy-item__image col-xl-12 col-md-6 col-12">
                <?php echo wp_get_attachment_image(get_field('_about_management_philosophy_item_3_image'), 'full') ?>
              </div>
              <div class="management-philosophy-item__description col-xl-12 col-md-6 col-12">
                <h4><?php the_field('_about_management_philosophy_item_3_title') ?></h4>
                <?php echo wpautop(get_field('_about_management_philosophy_item_3_description')); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="global-network" id="global-network">
      <div class="global-network-inner">
        <div class="container">
          <div class="global-network__content">
            <?php the_field('_about_global_network_content'); ?>
          </div>
          <div class="global-network__map">
            <?php echo wp_get_attachment_image(get_field('_about_global_network_map'), 'full') ?>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="global-network__country row">
          <?php if( have_rows('_about_global_network_country') ): ?>
            <?php while( have_rows('_about_global_network_country') ): the_row(); ?>
              <div class="col-xl-2 col-lg-3 col-sm-4 col-6 global-network__country-item">
                <?php echo wp_get_attachment_image(get_sub_field('flag'), 'full'); ?>
                <h4><?php the_sub_field('name'); ?></h4>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </main>
<?php get_footer(); ?>