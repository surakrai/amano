<?php

class Amano_About {

  protected static $instance = null;

  public static function get_instance() {

    if ( !self::$instance ) {
      self::$instance = new Amano_About();
    }
    return self::$instance;

  }

	public function __construct() {

		$this->hooks();

	}

	public function hooks() {

    add_action( 'acf/init', array( $this, 'fields' ) );

	}

  public function fields() {

    $prefix = '_about_';

    acf_add_local_field_group(array(
      'key' => $prefix . 'setting',
      'title' => __( 'Setting', THEME_SLUG ),
      'fields' => array(
        array(
          'key' => $prefix . 'tab_overview',
          'label' => __( 'Overview', THEME_SLUG ),
          'name' => $prefix . 'tab_overview',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array(
          'key' => $prefix . 'overview_title',
          'label' => __( 'Title', THEME_SLUG ),
          'name' => $prefix . 'overview_title',
          'type' => 'text',
        ),
        array(
          'key' => $prefix . 'overview_content',
          'label' => __( 'Content', THEME_SLUG ),
          'name' => $prefix . 'overview_content',
          'type' => 'wysiwyg',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'default_value' => '',
          'tabs' => 'visual',
          'toolbar' => 'full',
          'media_upload' => 0,
          'delay' => 0,
        ),
        array(
          'key' => $prefix . 'tab_service',
          'label' => __( 'Service', THEME_SLUG ),
          'name' => $prefix . 'tab_service',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array(
          'key' => $prefix . 'service_title',
          'label' => __( 'Title', THEME_SLUG ),
          'name' => $prefix . 'service_title',
          'type' => 'text',
        ),
        array(
          'key' => $prefix . 'service_content',
          'label' => __( 'Content', THEME_SLUG ),
          'name' => $prefix . 'service_content',
          'type' => 'wysiwyg',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'default_value' => '',
          'tabs' => 'visual',
          'toolbar' => 'full',
          'media_upload' => 0,
          'delay' => 0,
        ),
        array(
          'key' => $prefix . 'tab_why',
          'label' => __( 'Why book with us?', THEME_SLUG ),
          'name' => $prefix . 'tab_why',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array(
          'key' => $prefix . 'why_title',
          'label' => __( 'Title', THEME_SLUG ),
          'name' => $prefix . 'why_title',
          'type' => 'text',
        ),
        array(
          'key' => $prefix . 'why_content',
          'label' => __( 'Content', THEME_SLUG ),
          'name' => $prefix . 'why_content',
          'type' => 'wysiwyg',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'default_value' => '',
          'tabs' => 'visual',
          'toolbar' => 'full',
          'media_upload' => 1,
          'delay' => 0,
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'template-about.php',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => array(
        0 => 'the_content',
        1 => 'page_attributes',
        2 => 'featured_image',
      ),
      'active' => true,
      'description' => '',
    ));
  }

  public function save( $post_id ) {

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
      return;

    if ( wp_is_post_revision( $post_id ) )
      return;

    if ( 'page' != get_post_type( $post_id ) && $post_id === 8 )

      return;

  }

}

Amano_About::get_instance();
