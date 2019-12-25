<?php

class Amano_Contact {

  protected static $instance = null;

  public static function get_instance() {

    if ( !self::$instance ) {
      self::$instance = new Amano_Contact();
    }
    return self::$instance;

  }

	public function __construct() {

		$this->hooks();

	}

	public function hooks() {

    add_action( 'wp_enqueue_scripts', array($this, 'scripts'), 100 );
    add_filter( 'script_loader_tag', array($this, 'regal_tag'), 10, 3 );

		add_action( 'init', array($this, 'register_post_type'));
    // add_action( 'acf/init', array( $this, 'fields' ) );

    add_action( 'wp_ajax_contact', array($this, 'create') );
    add_action( 'wp_ajax_nopriv_contact', array( $this, 'create'));

    add_filter( 'manage_contact_posts_columns', array( $this, 'columns' ) );
    add_action( 'manage_contact_posts_custom_column', array( $this, 'columns_display' ), 10, 2  );
	}


  public function scripts() {
    global $post;

    if( is_page_template('template-contact.php') ) {
      wp_enqueue_script(
        THEME_SLUG . '-google-map',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyC9Y183VzljYHM2a1paTUMih4O-FVklb74&language=th&region=th-TH',
        array(),
        THEME_VERSION,
        true
      );
    }
  }

	public function register_post_type(){
		$labels = array(
			'name' => __('Contact', THEME_SLUG),
			'menu_name' => __('Contact', THEME_SLUG),
			'all_items' => __('All Contact', THEME_SLUG),
			'singular_name' => __('Contact', THEME_SLUG),
			'add_new' => __('Add Contact', THEME_SLUG),
			'add_new_item' => __('Add Contact', THEME_SLUG),
			'edit_item' => __('Edit Contact', THEME_SLUG),
			'new_item' => __('Add Contact', THEME_SLUG),
			'view_item' => __('View Contact', THEME_SLUG),
			'search_items' => __('Search Contact', THEME_SLUG),
			'not_found' => __('No Contact found.', THEME_SLUG),
			'not_found_in_trash' => __('No Contact found.', THEME_SLUG),
			'parent_item_colon' => ''
		);

		$args = array(
			'labels' => $labels,
			'public' => false,
			'publicly_queryable' => false,
			'show_ui' => true,
			'query_var' => false,
      'capability_type' => 'post',
      'capabilities' => array(
        'create_posts' => 'do_not_allow',
      ),
			'hierarchical' => false,
			'menu_position' => 58,
			'menu_icon' => 'dashicons-email',
			'supports'  => array( 'title' )
		);

		register_post_type( 'contact', $args );

	}

	public function fields() {

		$prefix = 'contact_';

    $choice = array();

    acf_add_local_field_group(array(
      'key' => $prefix . 'setting',
      'title' => __( 'Contact Detail', THEME_SLUG ),
      'fields' => array (
        array (
          'key' => $prefix.'cover',
          'label' => __( 'Cover', THEME_SLUG ),
          'name' => '_thumbnail_id',
          'type' => 'image',
          'return_format' => 'id',
          'preview_size' => 'thumbnail',
          'library' => 'all',
          'mime_types' => '',
        ),

      ),
      'style' => 'seamless',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'location' => array (
        array (
          array (
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'contact',
          ),
        ),
      ),
    ));

	}

  public function create() {

    check_ajax_referer( 'contact_nonce', 'security_nonce' );

    $output = $emai_message = $headers = '';
    $return = array();
    $errors = false;

    $name  = sanitize_text_field( $_POST["name"] );
    $phone  = sanitize_text_field( $_POST["phone"] );
    $email = sanitize_email( $_POST["email"] );
    $subject  = sanitize_text_field( $_POST["subject"] );
    $message  = esc_textarea( $_POST["message"] );

    $email_subject = 'ต้องการให้ทีมงานติดต่อกลับ #'. $post_id;

    $to = get_option('contact_email');


    if (!$name) {
      $return['name'] = "กรุณากรอก ชื่อ-สกุล";
      $errors = true;
    }

    if (!$phone) {
      $return['phone'] = "กรุณากรอก เบอร์โทร";
      $errors = true;
    }

    if (!is_email($email)) {
      $return['email'] = "กรุณากรอก อีเมล์";
      $errors = true;
    }

    if ($errors == false) {

      $email_class = new Amano_Email();

      ob_start(); ?>

      <?php echo $email_class->header($email_subject) ?>

      <?php
        echo "
          ชื่อ : " . $name . "<br/>
          เบอร์โทร : " . $phone . "<br/>
          อีเมล : " . $email . "<br/>
          หัวข้อ : " . $subject . "<br/>
          รายละเอียด : " . $message . "<br/><br/>
          อีเมล์นี้ถูกส่งจากหน้าติดต่อ kohpayamferry.com";;
      ?>

      <?php echo $email_class->footer() ?>

      <?php $emai_message = ob_get_contents();

      ob_end_clean();

      wp_mail( $to, $email_subject, $emai_message, '', '' );

      $post_id = wp_insert_post( array(
        'post_type'         => 'contact',
        'post_title'        => $name,
        'post_status'       => 'publish',
        'post_author'       => '1',
      ) );

      update_post_meta( $post_id, 'contact_phone', $phone );
      update_post_meta( $post_id, 'contact_email', $email );
      update_post_meta( $post_id, 'contact_subject', $subject );
      update_post_meta( $post_id, 'contact_message', $message );

      $return['msg'] = 'ส่งข้อมูลเรียบร้อย';
      $return['msg_description'] = 'ทีมงานจะรีบติดกลับค่ะ';

    }else{
      $return['msg'] = 'ผิดพลาด';
    }

    $return['errors'] = $errors;

    wp_send_json($return);
  }

  public function columns( $columns ) {


    unset( $columns['date'] );

    $columns['title'] = __( 'Name', THEME_SLUG );
    $columns['phone'] = __( 'Phone', THEME_SLUG );
    $columns['email'] = __( 'Email', THEME_SLUG );
    $columns['subject'] = __( 'Subject', THEME_SLUG );
    $columns['message'] = __( 'Message', THEME_SLUG );
    $columns['date'] = __( 'Date');

    return $columns;

  }

  public function columns_display( $column, $post_id ) {

    switch ( $column ) {

      case 'phone' :
        echo get_post_meta( $post_id, 'contact_phone', true );
      break;

      case 'email' :
        echo get_post_meta( $post_id, 'contact_email', true );
      break;

      case 'subject' :
        echo get_post_meta( $post_id, 'contact_subject', true );
      break;

      case 'message' :
        echo get_post_meta( $post_id, 'contact_message', true );
      break;

    }

  }

  function regal_tag( $tag, $handle, $src ) {

    if ($handle !== 'amano-google-map') 
      return $tag;

    return '<script src="' . $src . '" async defer></script>';
  }

}

Amano_Contact::get_instance();
