<div class="container">
  <div class="row">
    <div class="col-md-3">
      <a href="<?php echo esc_url(home_url( '/' )); ?>" class="footer-branding">
        <img src="<?php echo content_url('uploads/2020/01/logo.png') ?>" data-rjs="<?php echo content_url('uploads/2020/01/logo_@2x.png') ?>">
      </a>
    </div>
    <div class="col-md-4">
      <h3>Amano Thai International Co., Ltd.</h3>
      <p>Room No. 3A, 3 rd Fl., Chai-Ho Wong Wai Wit Building 889 Moo 5, Srinakarin Road, <br> T. Samroong-Nua, A. Muang, <br> Samutprakarn 10270</p>
    </div>
    <div class="col-md-5">
      <h3>Site Map</h3>
      <?php
        wp_nav_menu (
          array(
            'menu_class'         => 'footer-nenu',
            'container'          => 'ul',
            'theme_location'     => 'footer_navigation'
          )
        );
      ?>
    </div>
  </div>
</div>