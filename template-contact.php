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
                <div class="form-group">
                  <label for="contact-firstname"><?php _e( 'First Name', THEME_SLUG ) ?> : </label>
                  <input type="text" name="firstname" class="form-control" id="contact-firstname">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="contact-email"><?php _e( 'Last name', THEME_SLUG ) ?> : </label>
                  <input type="text" name="lastname" class="form-control" id="contact-lastname">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="contact-email"><?php _e( 'Email', THEME_SLUG ) ?> : </label>
                  <input type="email" name="email" class="form-control" id="contact-email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="contact-phone"><?php _e( 'Phone', THEME_SLUG ) ?> : </label>
                  <input type="tel" name="phone" class="form-control" id="contact-phone">
                </div>
              </div>
            </div>

            <div class="form-group textarea">
              <label for="contact-message"><?php _e( 'Message', THEME_SLUG ) ?> : </label>
              <textarea name="message" class="form-control" id="contact-message" rows="4"></textarea>
            </div>

            <button class="submit-contact"><span><?php _e( 'Submit', THEME_SLUG ) ?></button>
            <?php wp_nonce_field( 'contact_nonce', 'security_nonce' ); ?>
            <input type="hidden" name="action" value="contact">
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