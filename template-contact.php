<?php
/**
 * Template Name: Contact US
 */
get_header(); ?>
  <div class="page-header">
    <div class="container">
      <?php the_breadcrumbs(); ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
  </div><!-- .page-header -->
  <?php if ( have_posts() ) : ?>
    <div class="main-content container contact">

      <div class="row">

        <div class="col-md-5">
          <div class="contact-address">
            <h3>Amano Thai International Co., Ltd.</h3>
            <p>Room No. 3A, 3 rd Fl., Chai-Ho Wong Wai <br> Wit Building 889 Moo 5, Srinakarin Road, <br> T. Samroong-Nua,  A. Muang, <br> Samutprakarn 10270</p>
            <ul>
              <li><a href="tel:02-7458812-3">Tel. (66) 02-7458812-3</a></li>
              <li>Fax. (66) 02-7458814</li>
              <li><a href="mailto:mail@amanothai.co.th<">E-mail: mail@amanothai.co.th</a></li>
              <li><a href="https://www.amanothai.co.th">www.amanothai.co.th</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-7">
          <h3>Let’s Talk</h3>
          <form class="contact-form">
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

            <div class="contact-form__response"></div>

            <button class="submit-contact button"><span><?php pll_e('Submit') ?></span><div class="rippleJS"></div></button>
          </form>
        </div>

      </div>

      <div class="row contact-map">
        <div class="col-md-5">
          <img src="<?php echo content_url('uploads/2019/12/amano_map.jpg') ?>">
        </div>
        <div class="col-md-7">
          <div id="contact-map" class="google-map"></div>
        </div>
      </div>
    </div>
  <?php endif ?>
<?php get_footer(); ?>