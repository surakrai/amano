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

    add_action('wp_enqueue_scripts', array($this, 'scripts'), 100 );
    add_filter('script_loader_tag', array($this, 'regal_tag'), 10, 3 );

    add_action('rest_api_init', array( $this , 'rest_api_init'));

		add_action('init', array($this, 'register_post_type'));
    add_action('acf/init', array( $this, 'setting'));
    add_action('acf/init', array( $this, 'fields'));

    add_action('wp_ajax_booking_room', array($this, 'create'));
    add_action('wp_ajax_nopriv_booking_room', array( $this, 'create'));

    add_filter('manage_booking_room_posts_columns', array( $this, 'columns'));
    add_action('manage_booking_room_posts_custom_column', array( $this, 'columns_display'), 10, 2);
	}


  public function scripts() {
    global $post;

    if( is_page_template('template-booking_room.php') ) {
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
			'name' => __('Contact', THEME_SLUG),~
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

		register_post_type( 'booking_room', $args );

	}

  public function rest_api_init() {

    register_rest_route('amano', '/booking_room', array(
      'methods'  => 'POST',
      'callback' => array($this, 'api'),
      'args'     => array('firstname', 'lastname', 'email', 'phone', 'subject', 'message')
    ));

  }
  
  public function api($data) {

    $output = $emai_message = '';
    $return = $headers = array();
    $errors = false;

    $firstname = $data['firstname'];
    $lastname  = $data['lastname'];
    $phone     = $data['phone'];
    $email     = $data['email'];
    $subject   = $data['subject'];
    $message   = $data['message'];

    if (!$firstname) {
      $return['firstname'] = pll__('Please fill in First Name');
      $errors = true;
    }

    if (!$phone) {
      $return['phone'] = pll__('Please fill in phone no.');
      $errors = true;
    }

    if (!is_email($email)) {
      $return['email'] = pll__('Please fill in email');
      $errors = true;
    }

    $name = $firstname . ' ' . $lastname;

    if ($errors == false) {

      $post_id = wp_insert_post(array(
        'post_type'         => 'booking_room',
        'post_title'        => $name,
        'post_status'       => 'publish',
        'post_author'       => '1',
      ));

      update_post_meta( $post_id, 'booking_room_phone', $phone );
      update_post_meta( $post_id, 'booking_room_email', $email );
      update_post_meta( $post_id, 'booking_room_subject', $subject );
      update_post_meta( $post_id, 'booking_room_message', $message );


      line_notify( PHP_EOL . wp_strip_all_tags( $line_message ), get_field( 'option_booking_room_line_token', 'option' ) );

    }else{
      $return['msg'] = 'ผิดพลาด';
    }

    $return['errors'] = $errors;

    wp_send_json($return);

  }

	public function fields() {

		$prefix = 'booking_room_';

    $choice = array();

    acf_add_local_field_group(array(
      'key' => $prefix . 'setting',
      'title' => __( 'Contact Detail', THEME_SLUG ),
      'fields' => array (
      ),
      'style' => 'seamless',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => array(
        0 => 'the_content',
        1 => 'page_attributes',
        2 => 'featured_image',
      ),
      'location' => array (
        array (
          array (
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'template-booking_room8555.php',
          ),
        ),
      ),
    ));

    $prefix = 'option_booking_room_';

    acf_add_local_field_group(array(
      'key' => $prefix . 'setting',
      'title' => __( 'Setting', THEME_SLUG ),
      'fields' => array (
        array (
          'key' => $prefix.'recipient',
          'label' => __( 'Email recipient', THEME_SLUG ),
          'name' => $prefix.'recipient',
          'type' => 'textarea',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
        ),
        array (
          'key' => $prefix.'line_token',
          'label' => __( 'Line token', THEME_SLUG ),
          'name' => $prefix.'line_token',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
        ),        
      ),
      'style' => 'seamless',
      'label_placement' => 'left  ',
      'instruction_placement' => 'label',
      'location' => array (
        array (
          array (
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'booking_room_setting',
          ),
        ),
      ),
    ));
  }
  
  public function setting() {
  
    // add sub page
    acf_add_options_sub_page(array(
      'page_title' 	=> __( 'Contact Settings', THEME_SLUG ),
      'menu_title' 	=> __( 'Settings', THEME_SLUG ),
      'menu_slug' 	=> 'booking_room_setting',
      'parent_slug' => 'edit.php?post_type=booking_room',
    ));
    
  }
  
  public function columns($columns) {

    unset( $columns['date'] );

    $columns['title'] = __( 'Name', THEME_SLUG );
    $columns['phone'] = __( 'Phone', THEME_SLUG );
    $columns['email'] = __( 'Email', THEME_SLUG );
    $columns['subject'] = __( 'Subject', THEME_SLUG );
    $columns['message'] = __( 'Message', THEME_SLUG );
    $columns['date'] = __( 'Date');

    return $columns;

  }

  public function columns_display($column, $post_id) {

    switch ($column) {

      case 'phone' :
        echo get_post_meta( $post_id, 'booking_room_phone', true );
      break;

      case 'email' :
        echo get_post_meta( $post_id, 'booking_room_email', true );
      break;

      case 'subject' :
        echo get_post_meta( $post_id, 'booking_room_subject', true );
      break;

      case 'message' :
        echo get_post_meta( $post_id, 'booking_room_message', true );
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
