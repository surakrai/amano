<?php

class Amano_Home {

  protected static $instance = null;

  public static function get_instance() {

    if ( !self::$instance ) {
      self::$instance = new Amano_Home();
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

    $prefix = '_home_';

    acf_add_local_field_group(array(
      'key' => $prefix . 'setting',
      'title' => __( 'Setting', THEME_SLUG ),
      'fields' => array(
        array(
          'key' => $prefix . 'intro_tab',
          'label' => __( 'Intro', THEME_SLUG ),
          'name' => $prefix . 'intro_tab',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array(
          'key' => $prefix . 'about_tab',
          'label' => __( 'About Company', THEME_SLUG ),
          'name' => $prefix . 'about_tab',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array(
          'key' => $prefix.'about_content',
          'label' => __( 'Content', THEME_SLUG ),
          'name' => $prefix.'about_content',
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
        array (
          'key' => $prefix.'about_feature',
          'label' => __( 'Feature', THEME_SLUG ),
          'name' => $prefix.'about_feature',
          'type' => 'repeater',
          'required' => 0,
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => __( 'Add', THEME_SLUG ),
          'sub_fields' => array (
            array (
              'key' => $prefix . 'about_feature_image',
              'label' => __('Image', THEME_SLUG ),
              'name' => 'image',
              'type' => 'image',
              'instructions' => '',
              'return_format' => 'id',
              'preview_size' => 'medium',
              'library' => 'all',
              'mime_types' => '',
            ),
            array(
              'key' => $prefix . 'about_feature_title',
              'label' => __( 'Title', THEME_SLUG ),
              'name' => 'title',
              'type' => 'text',
            )
          ),
        ),
        array(
          'key' => $prefix . 'business_tab',
          'label' => __( 'Business Area', THEME_SLUG ),
          'name' => $prefix . 'business_tab',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array(
          'key' => $prefix . 'product_tab',
          'label' => __( 'Product Details', THEME_SLUG ),
          'name' => $prefix . 'product_tab',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array (
          'key' => $prefix.'product',
          'label' => __( 'Product', THEME_SLUG ),
          'name' => $prefix.'product',
          'type' => 'repeater',
          'required' => 0,
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => __( 'Add', THEME_SLUG ),
          'sub_fields' => array (
            array (
              'key' => $prefix . 'product_image',
              'label' => __('Image', THEME_SLUG ),
              'name' => 'image',
              'type' => 'image',
              'instructions' => '',
              'return_format' => 'id',
              'preview_size' => 'medium',
              'library' => 'all',
              'mime_types' => '',
            ),
            array(
              'key' => $prefix . 'product_title',
              'label' => __( 'Title', THEME_SLUG ),
              'name' => 'title',
              'type' => 'text',
            ),
            array(
              'key' => $prefix . 'cat',
              'label' => __( 'Product Category', THEME_SLUG ),
              'name' => 'category',
              'type' => 'taxonomy',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'taxonomy' => 'product_cat',
              'field_type' => 'select',
              'allow_null' => 0,
              'add_term' => 1,
              'save_terms' => 1,
              'load_terms' => 1,
              'return_format' => 'id',
              'multiple' => 0,
            ),
          ),
        ),
        array(
          'key' => $prefix . 'project_tab',
          'label' => __( 'Our Project', THEME_SLUG ),
          'name' => $prefix . 'project_tab',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array (
          'key' => $prefix . 'project',
          'label' => __('Logo', THEME_SLUG ),
          'name' => $prefix . 'project',
          'type' => 'gallery',
          'insert' => 'append',
          'library' => 'all',
          'mime_types' => '',
          'instructions' => '534px X 352px',
        )
      ),
      'location' => array(
        array(
          array(
            'param' => 'page_type',
            'operator' => '==',
            'value' => 'front_page',
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

Amano_Home::get_instance();
