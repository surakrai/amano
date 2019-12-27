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
          'key' => $prefix . 'greetings_tab',
          'label' => __( 'Greetings', THEME_SLUG ),
          'name' => $prefix . 'greetings_tab',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array(
          'key' => $prefix . 'greetings_content',
          'label' => '',
          'name' => $prefix . 'greetings_content',
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
          'key' => $prefix.'greetings_feature',
          'label' => __( 'Feature', THEME_SLUG ),
          'name' => $prefix.'greetings_feature',
          'type' => 'repeater',
          'required' => 0,
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => __( 'Add', THEME_SLUG ),
          'sub_fields' => array (
            array (
              'key' => $prefix . 'greetings_feature_image',
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
              'key' => $prefix . 'greetings_feature_title',
              'label' => __( 'Title', THEME_SLUG ),
              'name' => 'title',
              'type' => 'text',
            )
          ),
        ),
        array(
          'key' => $prefix . 'management_philosophy_tab',
          'label' => __( 'Management Philosophy', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_tab',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array(
          'key' => $prefix . 'management_philosophy_content',
          'label' => '',
          'name' => $prefix . 'management_philosophy_content',
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
          'key' => $prefix . 'management_philosophy_item_1_section_title',
          'label' => __( 'Generation and Development', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_1_section_title',
          'type' => 'title',
        ),
        array (
          'key' => $prefix . 'management_philosophy_item_1_image',
          'label' => __('Image', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_1_image',
          'type' => 'image',
          'return_format' => 'id',
          'preview_size' => 'thumbnail',
          'library' => 'all',
          'mime_types' => '',
          'instructions' => '400px X 400px ',
          'wrapper' => array('width' => 20)
        ),
        array(
          'key' => $prefix . 'management_philosophy_item_1_title',
          'label' => __( 'Title', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_1_title',
          'type' => 'text',
          'wrapper' => array('width' => 30)
        ),
        array(
          'key' => $prefix . 'management_philosophy_item_1_description',
          'label' => __( 'Description', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_1_description',
          'type' => 'textarea',
          'wrapper' => array('width' => 50)
        ),
        
        array(
          'key' => $prefix . 'management_philosophy_item_2_section_title',
          'label' => __( 'Coexistence and co-prosperity', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_2_section_title',
          'type' => 'title',
        ),
        array (
          'key' => $prefix . 'management_philosophy_item_2_image',
          'label' => __('Image', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_2_image',
          'type' => 'image',
          'return_format' => 'id',
          'preview_size' => 'thumbnail',
          'library' => 'all',
          'mime_types' => '',
          'instructions' => '400px X 400px ',
          'wrapper' => array('width' => 20)
        ),
        array(
          'key' => $prefix . 'management_philosophy_item_2_title',
          'label' => __( 'Title', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_2_title',
          'type' => 'text',
          'wrapper' => array('width' => 30)
        ),
        array(
          'key' => $prefix . 'management_philosophy_item_2_description',
          'label' => __( 'Description', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_2_description',
          'type' => 'textarea',
          'wrapper' => array('width' => 50)
        ),

        array(
          'key' => $prefix . 'management_philosophy_item_3_section_title',
          'label' => __( 'A vibrant and Dynamic company', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_3_section_title',
          'type' => 'title',
        ),
        array (
          'key' => $prefix . 'management_philosophy_item_3_image',
          'label' => __('Image', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_3_image',
          'type' => 'image',
          'return_format' => 'id',
          'preview_size' => 'thumbnail',
          'library' => 'all',
          'mime_types' => '',
          'instructions' => '400px X 400px ',
          'wrapper' => array('width' => 20)
        ),
        array(
          'key' => $prefix . 'management_philosophy_item_3_title',
          'label' => __( 'Title', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_3_title',
          'type' => 'text',
          'wrapper' => array('width' => 30)
        ),
        array(
          'key' => $prefix . 'management_philosophy_item_3_description',
          'label' => __( 'Description', THEME_SLUG ),
          'name' => $prefix . 'management_philosophy_item_3_description',
          'type' => 'textarea',
          'wrapper' => array('width' => 50)
        ),

        array(
          'key' => $prefix . 'global_network_tab',
          'label' => __( 'Global Network', THEME_SLUG ),
          'name' => $prefix . 'global_network_tab',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array(
          'key' => $prefix . 'global_network_content',
          'label' => '',
          'name' => $prefix . 'global_network_content',
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
          'key' => $prefix . 'global_network_map',
          'label' => __('Map', THEME_SLUG ),
          'name' => $prefix . 'global_network_map',
          'type' => 'image',
          'return_format' => 'id',
          'preview_size' => 'thumbnail',
          'library' => 'all',
          'mime_types' => '',
        ),
        array (
          'key' => $prefix.'global_network_country',
          'label' => __( 'Country', THEME_SLUG ),
          'name' => $prefix.'global_network_country',
          'type' => 'repeater',
          'required' => 0,
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => __( 'Add', THEME_SLUG ),
          'sub_fields' => array (
            array (
              'key' => $prefix . 'country_flag',
              'label' => __('Flag', THEME_SLUG ),
              'name' => 'flag',
              'type' => 'image',
              'instructions' => '',
              'return_format' => 'id',
              'preview_size' => 'medium',
              'library' => 'all',
              'mime_types' => '',
            ),
            array(
              'key' => $prefix . 'country_name',
              'label' => __( 'Name', THEME_SLUG ),
              'name' => 'name',
              'type' => 'text',
            )
          ),
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
