<?php get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content container product">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post();
        $thumb = '';
        $brochure = get_field('_product_brochure');
        $images = get_field('_product_gallery') ?: [];
        $video = get_field('_product_video');
        $video_cover = wp_get_attachment_image_url(get_field('_product_video_cover'), 'full');        
        array_unshift($images, array('url' => get_the_post_thumbnail_url( get_the_ID(), 'full')));

        if (!$video_cover) $video_cover = 'https://img.youtube.com/vi/' . getYouTubeVideoId($video) . '/maxresdefault.jpg';
        
      ?>
        <div class="row">
          <div class="col-lg-5">
            <div class="product__gallery">
              <?php if(count($images) > 1 || $video) : ?>
              <div class="swiper-container swiper-product-gallery">
                <div class="swiper-wrapper">
                <?php if($video) : ?>
                  <div class="swiper-slide">
                    <a class="product__gallery-item product__gallery-item--video glightbox" href="<?php echo $video; ?>">
                      <div class="video-player__icon-play"></div>
                      <img src="<?php echo $video_cover; ?>">
                    </a>
                  </div>
                <?php $thumb .= '<a href="#" class="video"><img src="'. $video_cover .'"></a>'; ?>
                <?php endif; ?>
                <?php foreach ($images as $key => $image) : ?>
                  <div class="swiper-slide">
                    <a class="product__gallery-item glightbox" href="<?php echo $image['url'] ?>">
                      <img src="<?php echo $image['url'] ?>">
                    </a>
                  </div>
                  <?php $thumb .= '<a href="#"><img src="'. $image['url'] .'"></a>'; ?>
                <?php endforeach; ?>
                </div>
              </div>
              <div class="product__gallery--thumb d-flex justify-content-end">
                <?php echo $thumb; ?>
              </div>
              <?php else : ?>
                <a class="product__gallery-item glightbox" href="<?php the_post_thumbnail_url('full') ?>"><?php the_post_thumbnail('full') ?></a>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-6 offset-lg-1">
            <h2 class="product__title"><?php the_title(); ?></h2>
            <div class="product__model"><?php the_field('_product_model'); ?></div>
            <div class="product__description"><?php the_content(); ?></div>
            
            <div class="product__content accordion">

              <?php if( have_rows('_product_content') ): ?>
                <?php $i = 0; ?>
                <?php while( have_rows('_product_content') ): the_row(); ?>
                  <div class="accordion__item">
                    <button class="accordion__toggle<?php if( $i === 0 ) echo ' is-active'; ?>"><?php the_sub_field('title') ?><div class="rippleJS"></div></button>
                    <div class="accordion__content"<?php if( $i === 0 ) echo ' style="max-height:none"'; ?>>
                      <div class="accordion__body">
                        <?php the_sub_field('description') ?>
                      </div>
                    </div>
                  </div>
                  <?php $i++; ?>
                <?php endwhile; ?>
              <?php endif; ?>

            </div>
            <div id="question-form" style="display: none;">
              <form class="contact-form">
                <h4><?php pll_e('Have a question'); ?></h4>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group contact-firstname">
                      <label for="contact-firstname"><?php pll_e('First Name') ?> : </label>
                      <input type="text" name="firstname" class="form-control" id="contact-firstname">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group contact-lastname">
                      <label for="contact-email"><?php pll_e('Last name') ?> : </label>
                      <input type="text" name="lastname" class="form-control" id="contact-lastname">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group contact-email">
                      <label for="contact-email"><?php pll_e('Email') ?> : </label>
                      <input type="email" name="email" class="form-control" id="contact-email">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group contact-phone">
                      <label for="contact-phone"><?php pll_e('Phone') ?> : </label>
                      <input type="tel" name="phone" class="form-control" id="contact-phone">
                    </div>
                  </div>
                </div>

                <div class="form-group textarea">
                  <label for="contact-message"><?php pll_e('Message') ?> : </label>
                  <textarea name="message" class="form-control" id="contact-message" rows="4"></textarea>
                </div>
                <input type="hidden" name="subject" value="<?php echo get_the_title() . ' (' . get_field('_product_model') ?> )">

                <div class="contact-form__response"></div>

                <p class="text-right">
                  <button class="gtrigger-close button button--secondary">Close<div class="rippleJS"></div></button>
                  <button class="submit-contact button"><span><?php pll_e('Submit') ?></span><div class="rippleJS"></div></button>
                </p>
              </form>
            </div>
            <div class="product__footer d-block d-xl-flex d-lg-block d-md-flex justify-content-between align-items-center">
              <a class="product__question button mr-1" href="#question-form" data-glightbox="width: 500; height: auto;">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iNTEyIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgd2lkdGg9IjUxMiIgY2xhc3M9IiI+PGc+PHBhdGggZD0ibTUxMiAzNDYuNWMwLTYzLjUzNTE1Ni0zNi40NDkyMTktMTIwLjIzODI4MS05MS4wMzkwNjItMTQ3LjgyMDMxMi0xLjY5NTMxMyAxMjEuODIwMzEyLTEwMC40NjA5MzggMjIwLjU4NTkzNy0yMjIuMjgxMjUgMjIyLjI4MTI1IDI3LjU4MjAzMSA1NC41ODk4NDMgODQuMjg1MTU2IDkxLjAzOTA2MiAxNDcuODIwMzEyIDkxLjAzOTA2MiAyOS43ODkwNjIgMCA1OC43NTc4MTItNy45MzM1OTQgODQuMjEwOTM4LTIzLjAwNzgxMmw4MC41NjY0MDYgMjIuMjg1MTU2LTIyLjI4NTE1Ni04MC41NjY0MDZjMTUuMDc0MjE4LTI1LjQ1MzEyNiAyMy4wMDc4MTItNTQuNDIxODc2IDIzLjAwNzgxMi04NC4yMTA5Mzh6bTAgMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPjxwYXRoIGQ9Im0zOTEgMTk1LjVjMC0xMDcuODAwNzgxLTg3LjY5OTIxOS0xOTUuNS0xOTUuNS0xOTUuNXMtMTk1LjUgODcuNjk5MjE5LTE5NS41IDE5NS41YzAgMzUuMTMyODEyIDkuMzUxNTYyIDY5LjMzOTg0NCAyNy4xMDkzNzUgOTkuMzcxMDk0bC0yNi4zOTA2MjUgOTUuNDA2MjUgOTUuNDEwMTU2LTI2LjM4NjcxOWMzMC4wMzEyNSAxNy43NTc4MTMgNjQuMjM4MjgyIDI3LjEwOTM3NSA5OS4zNzEwOTQgMjcuMTA5Mzc1IDEwNy44MDA3ODEgMCAxOTUuNS04Ny42OTkyMTkgMTk1LjUtMTk1LjV6bS0yMjUuNS00NS41aC0zMGMwLTMzLjA4NTkzOCAyNi45MTQwNjItNjAgNjAtNjBzNjAgMjYuOTE0MDYyIDYwIDYwYzAgMTYuNzkyOTY5LTcuMTA5Mzc1IDMyLjkzMzU5NC0xOS41MTE3MTkgNDQuMjc3MzQ0bC0yNS40ODgyODEgMjMuMzI4MTI1djIzLjM5NDUzMWgtMzB2LTM2LjYwNTQ2OWwzNS4yMzQzNzUtMzIuMjVjNi4yOTY4NzUtNS43NjE3MTkgOS43NjU2MjUtMTMuNjI1IDkuNzY1NjI1LTIyLjE0NDUzMSAwLTE2LjU0Mjk2OS0xMy40NTcwMzEtMzAtMzAtMzBzLTMwIDEzLjQ1NzAzMS0zMCAzMHptMTUgMTIxaDMwdjMwaC0zMHptMCAwIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+PC9nPiA8L3N2Zz4=" />
                <?php pll_e('Have a question'); ?>
                <div class="rippleJS"></div>
              </a>
              <?php if( $brochure ) : ?>
              <a class="product__brochure button ml-1" href="<?php echo $brochure['url']; ?>" target="_blank">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiBjbGFzcz0iIj48Zz48Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zODIuNTYsMjMzLjM3NkMzNzkuOTY4LDIyNy42NDgsMzc0LjI3MiwyMjQsMzY4LDIyNGgtNjRWMTZjMC04LjgzMi03LjE2OC0xNi0xNi0xNmgtNjRjLTguODMyLDAtMTYsNy4xNjgtMTYsMTZ2MjA4aC02NCAgICBjLTYuMjcyLDAtMTEuOTY4LDMuNjgtMTQuNTYsOS4zNzZjLTIuNjI0LDUuNzI4LTEuNiwxMi40MTYsMi41MjgsMTcuMTUybDExMiwxMjhjMy4wNCwzLjQ4OCw3LjQyNCw1LjQ3MiwxMi4wMzIsNS40NzIgICAgYzQuNjA4LDAsOC45OTItMi4wMTYsMTIuMDMyLTUuNDcybDExMi0xMjhDMzg0LjE5MiwyNDUuODI0LDM4NS4xNTIsMjM5LjEwNCwzODIuNTYsMjMzLjM3NnoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiIHN0eWxlPSJmaWxsOiNGRkZGRkYiPjwvcGF0aD4KCTwvZz4KPC9nPjxnPgoJPGc+CgkJPHBhdGggZD0iTTQzMiwzNTJ2OTZIODB2LTk2SDE2djEyOGMwLDE3LjY5NiwxNC4zMzYsMzIsMzIsMzJoNDE2YzE3LjY5NiwwLDMyLTE0LjMwNCwzMi0zMlYzNTJINDMyeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiI+PC9wYXRoPgoJPC9nPgo8L2c+PC9nPiA8L3N2Zz4=" />
                <?php pll_e('Download PDF'); ?>
                <div class="rippleJS"></div>
              </a>
              <?php endif; ?>
              <?php
                $facebook = 'http://www.facebook.com/sharer.php?u='. urlencode( get_the_permalink( $post->ID ) );
                $line     = 'https://social-plugins.line.me/lineit/share?url='. urlencode( get_the_permalink( $post->ID ) );
                $twitter  = 'https://twitter.com/share?url='.urlencode( get_the_permalink( $post->ID ) ).'&text='.urlencode( $post->post_title );
              ?>
              <ul class="social flex-fill">
                <li class="social__item social__item--label">Share :</li>
                <li class="social__item">
                  <a href="<?php echo $facebook ?>" target="_blank">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDExMi4xOTYgMTEyLjE5NiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTEyLjE5NiAxMTIuMTk2OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPGc+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiMzQjU5OTg7IiBjeD0iNTYuMDk4IiBjeT0iNTYuMDk4IiByPSI1Ni4wOTgiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNNzAuMjAxLDU4LjI5NGgtMTAuMDF2MzYuNjcySDQ1LjAyNVY1OC4yOTRoLTcuMjEzVjQ1LjQwNmg3LjIxM3YtOC4zNCAgIGMwLTUuOTY0LDIuODMzLTE1LjMwMywxNS4zMDEtMTUuMzAzTDcxLjU2LDIxLjgxdjEyLjUxaC04LjE1MWMtMS4zMzcsMC0zLjIxNywwLjY2OC0zLjIxNywzLjUxM3Y3LjU4NWgxMS4zMzRMNzAuMjAxLDU4LjI5NHoiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
                  </a>   
                </li>
                <li class="social__item">
                  <a href="<?php echo $twitter ?>" target="_blank">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MTAuMTU1IDQxMC4xNTUiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQxMC4xNTUgNDEwLjE1NTsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM3NkE5RUE7IiBkPSJNNDAzLjYzMiw3NC4xOGMtOS4xMTMsNC4wNDEtMTguNTczLDcuMjI5LTI4LjI4LDkuNTM3YzEwLjY5Ni0xMC4xNjQsMTguNzM4LTIyLjg3NywyMy4yNzUtMzcuMDY3ICBsMCwwYzEuMjk1LTQuMDUxLTMuMTA1LTcuNTU0LTYuNzYzLTUuMzg1bDAsMGMtMTMuNTA0LDguMDEtMjguMDUsMTQuMDE5LTQzLjIzNSwxNy44NjJjLTAuODgxLDAuMjIzLTEuNzksMC4zMzYtMi43MDIsMC4zMzYgIGMtMi43NjYsMC01LjQ1NS0xLjAyNy03LjU3LTIuODkxYy0xNi4xNTYtMTQuMjM5LTM2LjkzNS0yMi4wODEtNTguNTA4LTIyLjA4MWMtOS4zMzUsMC0xOC43NiwxLjQ1NS0yOC4wMTQsNC4zMjUgIGMtMjguNjcyLDguODkzLTUwLjc5NSwzMi41NDQtNTcuNzM2LDYxLjcyNGMtMi42MDQsMTAuOTQ1LTMuMzA5LDIxLjktMi4wOTcsMzIuNTZjMC4xMzksMS4yMjUtMC40NCwyLjA4LTAuNzk3LDIuNDgxICBjLTAuNjI3LDAuNzAzLTEuNTE2LDEuMTA2LTIuNDM5LDEuMTA2Yy0wLjEwMywwLTAuMjA5LTAuMDA1LTAuMzE0LTAuMDE1Yy02Mi43NjItNS44MzEtMTE5LjM1OC0zNi4wNjgtMTU5LjM2My04NS4xNGwwLDAgIGMtMi4wNC0yLjUwMy01Ljk1Mi0yLjE5Ni03LjU3OCwwLjU5M2wwLDBDMTMuNjc3LDY1LjU2NSw5LjUzNyw4MC45MzcsOS41MzcsOTYuNTc5YzAsMjMuOTcyLDkuNjMxLDQ2LjU2MywyNi4zNiw2My4wMzIgIGMtNy4wMzUtMS42NjgtMTMuODQ0LTQuMjk1LTIwLjE2OS03LjgwOGwwLDBjLTMuMDYtMS43LTYuODI1LDAuNDg1LTYuODY4LDMuOTg1bDAsMGMtMC40MzgsMzUuNjEyLDIwLjQxMiw2Ny4zLDUxLjY0Niw4MS41NjkgIGMtMC42MjksMC4wMTUtMS4yNTgsMC4wMjItMS44ODgsMC4wMjJjLTQuOTUxLDAtOS45NjQtMC40NzgtMTQuODk4LTEuNDIxbDAsMGMtMy40NDYtMC42NTgtNi4zNDEsMi42MTEtNS4yNzEsNS45NTJsMCwwICBjMTAuMTM4LDMxLjY1MSwzNy4zOSw1NC45ODEsNzAuMDAyLDYwLjI3OGMtMjcuMDY2LDE4LjE2OS01OC41ODUsMjcuNzUzLTkxLjM5LDI3Ljc1M2wtMTAuMjI3LTAuMDA2ICBjLTMuMTUxLDAtNS44MTYsMi4wNTQtNi42MTksNS4xMDZjLTAuNzkxLDMuMDA2LDAuNjY2LDYuMTc3LDMuMzUzLDcuNzRjMzYuOTY2LDIxLjUxMyw3OS4xMzEsMzIuODgzLDEyMS45NTUsMzIuODgzICBjMzcuNDg1LDAsNzIuNTQ5LTcuNDM5LDEwNC4yMTktMjIuMTA5YzI5LjAzMy0xMy40NDksNTQuNjg5LTMyLjY3NCw3Ni4yNTUtNTcuMTQxYzIwLjA5LTIyLjc5MiwzNS44LTQ5LjEwMyw0Ni42OTItNzguMjAxICBjMTAuMzgzLTI3LjczNywxNS44NzEtNTcuMzMzLDE1Ljg3MS04NS41ODl2LTEuMzQ2Yy0wLjAwMS00LjUzNywyLjA1MS04LjgwNiw1LjYzMS0xMS43MTJjMTMuNTg1LTExLjAzLDI1LjQxNS0yNC4wMTQsMzUuMTYtMzguNTkxICBsMCwwQzQxMS45MjQsNzcuMTI2LDQwNy44NjYsNzIuMzAyLDQwMy42MzIsNzQuMThMNDAzLjYzMiw3NC4xOHoiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
                  </a>   
                </li>
                <li class="social__item">
                  <a href="<?php echo $line ?>" target="_blank">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyNCAyNCIgaGVpZ2h0PSI1MTJweCIgdmlld0JveD0iMCAwIDI0IDI0IiB3aWR0aD0iNTEycHgiPjxwYXRoIGQ9Im0xMiAuNWMtNi42MTUgMC0xMiA0LjM5OC0xMiA5LjgwMyAwIDQuODQxIDQuMjcgOC44OTcgMTAuMDM1IDkuNjY4LjM5MS4wODMuOTIzLjI2IDEuMDU4LjU5NC4xMi4zMDMuMDc5Ljc3MS4wMzggMS4wODdsLS4xNjQgMS4wMjZjLS4wNDUuMzAzLS4yNCAxLjE5MyAxLjA0OS42NDkgMS4yOTEtLjU0MiA2LjkxNi00LjEwNCA5LjQzNi03LjAxOSAxLjcyNC0xLjkgMi41NDgtMy44NDcgMi41NDgtNi4wMDUgMC01LjQwNS01LjM4NS05LjgwMy0xMi05LjgwM3ptLTQuNjk3IDEzLjAxN2gtMi4zODZjLS4zNDUgMC0uNjMtLjI4Ny0uNjMtLjYzM3YtNC44MDFjMC0uMzQ3LjI4NS0uNjM0LjYzLS42MzQuMzQ4IDAgLjYzLjI4Ny42My42MzR2NC4xNjdoMS43NTZjLjM0OCAwIC42MjkuMjg1LjYyOS42MzQgMCAuMzQ2LS4yODIuNjMzLS42MjkuNjMzem0yLjQ2Ni0uNjMzYzAgLjM0Ni0uMjgyLjYzMy0uNjMxLjYzMy0uMzQ1IDAtLjYyNy0uMjg3LS42MjctLjYzM3YtNC44MDFjMC0uMzQ3LjI4Mi0uNjM0LjYzLS42MzQuMzQ2IDAgLjYyOC4yODcuNjI4LjYzNHptNS43NDEgMGMwIC4yNzItLjE3NC41MTMtLjQzMi42LS4wNjQuMDIxLS4xMzMuMDMxLS4xOTkuMDMxLS4yMTEgMC0uMzkxLS4wOTEtLjUxLS4yNTJsLTIuNDQzLTMuMzM4djIuOTU4YzAgLjM0Ni0uMjc5LjYzMy0uNjMxLjYzMy0uMzQ2IDAtLjYyNi0uMjg3LS42MjYtLjYzM3YtNC44YzAtLjI3Mi4xNzMtLjUxMy40My0uNTk5LjA2LS4wMjMuMTM2LS4wMzMuMTk0LS4wMzMuMTk1IDAgLjM3NS4xMDUuNDk1LjI1NmwyLjQ2MiAzLjM1MXYtMi45NzVjMC0uMzQ3LjI4Mi0uNjM0LjYzLS42MzQuMzQ1IDAgLjYzLjI4Ny42My42MzR6bTMuODU1LTMuMDM1Yy4zNDkgMCAuNjMuMjg3LjYzLjYzNSAwIC4zNDctLjI4MS42MzQtLjYzLjYzNGgtMS43NTV2MS4xMzJoMS43NTVjLjM0OSAwIC42My4yODUuNjMuNjM0IDAgLjM0Ni0uMjgxLjYzMy0uNjMuNjMzaC0yLjM4NmMtLjM0NSAwLS42MjctLjI4Ny0uNjI3LS42MzN2LTQuODAxYzAtLjM0Ny4yODItLjYzNC42My0uNjM0aDIuMzg2Yy4zNDYgMCAuNjI3LjI4Ny42MjcuNjM0IDAgLjM1MS0uMjgxLjYzNC0uNjMuNjM0aC0xLjc1NXYxLjEzMnoiIGZpbGw9IiM0Y2FmNTAiLz48L3N2Zz4K" />
                  </a>   
                </li>                          
              </ul>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif ?>

    <div class="related-product">
    <?php
      $cats = wp_get_post_terms( get_the_ID(), 'product_cat', array( 'fields' => 'all' ) );
      $args = array(
        'post_type'       => 'product',
        'post_status'     => 'publish',
        'posts_per_page'  => 4,
        'post__not_in'    => array(get_the_ID()),
        'orderby'         => 'rand',
        'tax_query'       => array(
          array(
            'taxonomy' => 'product_cat',
            'field'    => 'id',
            'terms'    => array($cats[0]->term_id)
          )
        )
      );
      $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ) { ?>
      <h3><span><?php pll_e('Related Product'); ?></span></h3>
      <div class="row amano-row">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="col-lg-3 col-6 amano-col">
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
      </div>
    <?php }
      wp_reset_query();
    ?>
    </div>
  </main>
<?php get_footer(); ?>