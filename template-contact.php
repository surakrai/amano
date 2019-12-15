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
    <div class="main-content contact">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="contact-address">
              <h3>Amano Thai International Co., Ltd.</h3>
            </div>
          </div>
          <div class="col-md-7">
            <h3>Let’s Talk</h3>
            <form class="contact-form">
              <div class="form-group">
                <label for="contact-name"><?php _e( 'name', THEME_SLUG ) ?> : </label>
                <input type="text" name="name" class="form-control" id="contact-name">
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="contact-phone"><?php _e( 'Phone', THEME_SLUG ) ?> : </label>
                    <input type="tel" name="phone" class="form-control" id="contact-phone">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="contact-email"><?php _e( 'Email', THEME_SLUG ) ?> : </label>
                    <input type="email" name="email" class="form-control" id="contact-email">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="contact-subject"><?php _e( 'Subject', THEME_SLUG ) ?> : </label>
                <input type="text" name="subject" class="form-control" id="contact-subject">
              </div>

              <div class="d-flex justify-content-between align-items-end">
                <div class="form-group textarea">
                  <label for="contact-message"><?php _e( 'Message', THEME_SLUG ) ?> : </label>
                  <textarea name="message" class="form-control" id="contact-message" rows="4"></textarea>
                </div>
                <div><button class="mimo-button submit-contact"><span><?php _e( 'Send', THEME_SLUG ) ?></button></div>
              </div>
              <?php wp_nonce_field( 'contact_nonce', 'security_nonce' ); ?>
              <input type="hidden" name="action" value="contact">
              
            </form>
          </div>
        </div>

        <div id="contact-map" class="contact-map"></div>
      </div>
    </div>
  <?php endif ?>
<?php get_footer(); ?>