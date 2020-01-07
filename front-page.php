<?php get_header(); ?>
<div class="preloader">
	<svg class="logo" version="1.1" viewBox="0 0 174 174" enable-background="new 0 0 174 174" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve">
		<path class="logo__item logo__item--1" d="m82.166945,11.669529l-82,142c78,-40 84,-52 82,-142z" fill="#0c74d7"/>
		<path class="logo__item logo__item--2" d="m4.366945,158.669529l164,-0.1c-64.2,-42.9 -95.2,-42.9 -164,0.1z" fill="#0c74d7"/>
		<path class="logo__item logo__item--3" d="m173.766945,153.269529l-82.8,-141.5c-3.8,87.6 3.6,98.7 82.8,141.5z" fill="#0c74d7"/>
	</svg>
</div>
<div class="home-fullpage">
  <div class="welcome section">
		<div class="container">
			<h1><small>Perfect technique, principle of Amano Thailand</small> <strong>World’s Innovative Technology Creator</strong></h1>
		</div>
		<div class="welcome__navigation">
			<div class="container">
				<ul class="d-none d-lg-flex justify-content-between">
					<li><a class="welcome__navigation-item" data-anchor="about-company" href="#">About Company</a></li>
					<li><a class="welcome__navigation-item" data-anchor="business-area" href="#">Business Area</a></li>
					<li><a class="welcome__navigation-item" data-anchor="product-details" href="#">Product Details</a></li>
					<li><a class="welcome__navigation-item" data-anchor="our-project" href="#">Our Project</a></li>
					<li><a class="welcome__navigation-item" data-anchor="our-news" href="#">Our News</a></li>
					<li><a class="welcome__navigation-item" data-anchor="contact" href="#">Contact</a></li>
				</ul>
			</div>
		</div>
    <a href="#" class="welcome__scroll-icon">
      <div></div>
    </a>
	</div>

	<div class="section about">
		<div class="container">
			<div class="about__description">
				<?php the_field('_home_about_content'); ?>
				<p class="text-center pt-3 d-none"><a href="#" class="button"><?php pll_e('Read More') ?></a></p>
			</div>
			<div class="about__feature swiper-container">
				<div class="swiper-wrapper">
				<?php if( have_rows('_home_about_feature') ): ?>
					<?php while( have_rows('_home_about_feature') ): the_row(); ?>
						<div class="about__feature-item swiper-slide">
							<?php echo wp_get_attachment_image(get_sub_field('image'), 'about-feature'); ?>
							<h4><?php the_sub_field('title'); ?></h4>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="section business-area">
	  <div class="video-parallax">
			<div class="video-player" data-depth="1.4">
				<a href="#" id="VAe16A_NSFE" class="video-player__play">
					<i class="video-player__icon-play"></i>
					<div class="video-player__body">
						<h3>AMANO THAILAND</h3>
						<span>PLAY VIDEO</span>
					</div>
				</a>
			</div>
		</div>
	</div>

	<div class="section product-details">
		<div class="swiper-container">
			<div class="swiper-wrapper">
			<?php if( have_rows('_home_product') ): ?>
				<?php while( have_rows('_home_product') ): the_row(); ?>
					<div class="product-details__item swiper-slide">
						<?php $link = get_term_link(get_sub_field('category'), 'product_cat'); ?>
						<a href="<?php echo $link; ?>" class="product-details__image"><?php echo wp_get_attachment_image(get_sub_field('image'), 'full'); ?></a>
						<div class="product-details__content">
							<h4><?php the_sub_field('title'); ?></h4>
							<a href="<?php echo $link; ?>">Learn more</a>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div>
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

			<p class="text-center">
				<button class="button-prev"><div class="rippleJS"></div></button>
				<button class="button-next"><div class="rippleJS"></div></button>
			</p>

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
				<div class="swiper-container swiper-our-news">
					<div class="swiper-wrapper">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="swiper-slide news-col">
							<figure class="news-item d-flex flex-column">
								<a class="news-item-thumbnail" href="<?php the_permalink() ?>">
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
