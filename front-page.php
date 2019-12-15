<?php get_header(); ?>
<div id="fullpage">
  <div class="section welcome">
		<div class="container">
			<h1><small>Perfect technique, principle of Amano Thailand</small> World’s Innovative Technology Creator</h1>
		</div>
		<div class="fullpage-navigation">
			<div class="container">
				<ul class="d-flex justify-content-between">
					<li><a class="fullpage-navigation-item" data-anchor="about-company" href="#">About Company</a></li>
					<li><a class="fullpage-navigation-item" data-anchor="business-area" href="#">Business Area</a></li>
					<li><a class="fullpage-navigation-item" data-anchor="product-details" href="#">Product Details</a></li>
					<li><a class="fullpage-navigation-item" data-anchor="our-project" href="#">Our Project</a></li>
					<li><a class="fullpage-navigation-item" data-anchor="our-news" href="#">Our News</a></li>
					<li><a class="fullpage-navigation-item" data-anchor="contact" href="#">Contact</a></li>
				</ul>
			</div>
		</div>
    <a href="#" class="click-to-scroll disible-select">
      <div class="icon-scroll"></div>
    </a>
	</div>

	<div class="section about-company">
		<div class="container">
			<div class="about-company-description">
				<?php the_field('_home_about_content'); ?>
			</div>
			<div class="about-company-feature row no-gutters">
        <?php if( have_rows('_home_about_feature') ): ?>
          <?php while( have_rows('_home_about_feature') ): the_row(); ?>
            <div class="about-company-feature-item col-md-3">
							<?php echo wp_get_attachment_image(get_sub_field('image'), 'about-feature'); ?>
							<h4><?php the_sub_field('title'); ?></h4>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
			</div>
		</div>
	</div>

	<div class="section business-area">
	  <div id="business-parallax">
			<div class="business-area-video" data-depth="1.4">
				<a href="#" id="D1xMPjmgyAA">
					<i class="business-area-video-play"></i>
					<div class="business-area-video-body">
						<h3>AMANO THAILAND</h3>
						<span>PLAY VIDEO</span>
					</div>
				</a>
			</div>
		</div>
	</div>

	<div class="section product-details">
		<?php if( have_rows('_home_product') ): ?>
			<?php while( have_rows('_home_product') ): the_row(); ?>
				<div class="product-details-item">
					<?php echo wp_get_attachment_image(get_sub_field('image'), 'full'); ?>
					<div class="product-details-content">
						<h4><?php the_sub_field('title'); ?></h4>
						<a href="">Learn more</a>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="section our-project">
		<div class="container">
			<h3 class="text-center">Amano Thailand <strong>Project</strong></h3>

			<?php if( $images = get_field('_home_project') ): ?>
				<div class="swiper-container swiper-our-project">
					<div class="swiper-wrapper">
						<?php foreach ($images as $image): ?>
							<div class="swiper-slide"><?php echo wp_get_attachment_image($image['ID'], 'our-project') ?></div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>

	<div class="section our-news">
		<div class="container">
			<h3 class="text-center">Our <strong>News</strong> </h3>
			<?php
				$args = array(
					'post_type'        => array('news'),
					// 'meta_key'         => 'post_recommend',
					// 'meta_value'       => 1,
					'posts_per_page'   => 3,
					'post_status'      => 'publish',
				);
				$the_query = new WP_Query( $args );
			?>
			<?php if ( $the_query->have_posts() ) : ?>
				<div class="row">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
				<?php wp_reset_query(); ?>
			<?php endif ?>
			<p class=text-center><a href="<?php echo get_post_type_archive_link('news'); ?>" class="our-news__see-more">see more</a></p>
		</div>
	</div>
  <footer class="section site-footer">
		<?php get_template_part('templates/section', 'footer'); ?>
	</footer>
</div>
<?php get_footer(); ?>