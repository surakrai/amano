<?php

class Amano_Service {

  protected static $instance = null;

  public static function get_instance() {

    if ( !self::$instance ) {
      self::$instance = new Amano_Service();
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

    $prefix = '_service_';

    acf_add_local_field_group(array(
      'key' => $prefix . 'setting',
      'title' => __( 'Setting', THEME_SLUG ),
      'fields' => array(
        array(
          'key' => $prefix . 'tab_transfer_service',
          'label' => __( 'Transfer Service', THEME_SLUG ),
          'name' => $prefix . 'tab_transfer_service',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array (
          'key' => $prefix . 'transfer_service_title',
          'label' => __('Title', THEME_SLUG ),
          'name' => $prefix . 'transfer_service_title',
          'type' => 'text',
        ),
        array (
          'key' => $prefix.'transfer_service',
          'label' => '',
          'name' => $prefix.'transfer_service',
          'type' => 'repeater',
          'required' => 0,
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => __( 'Add', THEME_SLUG ),
          'sub_fields' => array (
            array (
              'key' => $prefix . 'transfer_service_name',
              'label' => __('Name', THEME_SLUG ),
              'name' => 'name',
              'type' => 'text',
            ),
            array (
              'key' => $prefix . 'transfer_service_icon',
              'label' => __('Icon', THEME_SLUG ),
              'name' => 'icon',
              'type' => 'text',
              'wrapper' => array('class' => 'amano-icon'),
            ),
          ),
        ),
        array(
          'key' => $prefix . 'tab_tour_excursions',
          'label' => __( 'Tour Excursions', THEME_SLUG ),
          'name' => $prefix . 'tab_tour_excursions',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array (
          'key' => $prefix . 'tour_excursions_title',
          'label' => __('Title', THEME_SLUG ),
          'name' => $prefix . 'tour_excursions_title',
          'type' => 'text',
        ),
        array (
          'key' => $prefix.'tour_excursions',
          'label' => '',
          'name' => $prefix.'tour_excursions',
          'type' => 'repeater',
          'required' => 0,
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => __( 'Add', THEME_SLUG ),
          'sub_fields' => array (
            array (
              'key' => $prefix . 'tour_excursions_name',
              'label' => __('Name', THEME_SLUG ),
              'name' => 'name',
              'type' => 'text',
            ),
            array (
              'key' => $prefix . 'tour_excursions_icon',
              'label' => __('Icon', THEME_SLUG ),
              'name' => 'icon',
              'type' => 'text',
              'wrapper' => array('class' => 'amano-icon'),
            ),
          ),
        ),
        array(
          'key' => $prefix . 'tab_printing_scanning',
          'label' => __( 'Printing - Scanning', THEME_SLUG ),
          'name' => $prefix . 'tab_printing_scanning',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array (
          'key' => $prefix . 'printing_scanning_title',
          'label' => __('Title', THEME_SLUG ),
          'name' => $prefix . 'printing_scanning_title',
          'type' => 'text',
        ),
        array (
          'key' => $prefix.'printing_scanning',
          'label' => '',
          'name' => $prefix.'printing_scanning',
          'type' => 'repeater',
          'required' => 0,
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => __( 'Add', THEME_SLUG ),
          'sub_fields' => array (
            array (
              'key' => $prefix . 'printing_scanning_name',
              'label' => __('Name', THEME_SLUG ),
              'name' => 'name',
              'type' => 'text',
            ),
            array (
              'key' => $prefix . 'printing_scanning_icon',
              'label' => __('Icon', THEME_SLUG ),
              'name' => 'icon',
              'type' => 'text',
              'wrapper' => array('class' => 'amano-icon'),
            ),
          ),
        ),
        array(
          'key' => $prefix . 'tab_agro_tourism',
          'label' => __( 'Agro-Tourism (Seasonal)', THEME_SLUG ),
          'name' => $prefix . 'tab_agro_tourism',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array (
          'key' => $prefix . 'agro_tourism_title',
          'label' => __('Title', THEME_SLUG ),
          'name' => $prefix . 'agro_tourism_title',
          'type' => 'text',
        ),
        array (
          'key' => $prefix.'agro_tourism',
          'label' => '',
          'name' => $prefix.'agro_tourism',
          'type' => 'repeater',
          'required' => 0,
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => __( 'Add', THEME_SLUG ),
          'sub_fields' => array (
            array (
              'key' => $prefix . 'agro_tourism_name',
              'label' => __('Name', THEME_SLUG ),
              'name' => 'name',
              'type' => 'text',
            ),
            array (
              'key' => $prefix . 'agro_tourism_icon',
              'label' => __('Icon', THEME_SLUG ),
              'name' => 'icon',
              'type' => 'text',
              'wrapper' => array('class' => 'amano-icon'),
            ),
          ),
        ),
        array(
          'key' => $prefix . 'tab_mobile_services',
          'label' => __( 'Mobile Services', THEME_SLUG ),
          'name' => $prefix . 'tab_mobile_services',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array (
          'key' => $prefix . 'mobile_services_title',
          'label' => __('Title', THEME_SLUG ),
          'name' => $prefix . 'mobile_services_title',
          'type' => 'text',
        ),
        array (
          'key' => $prefix.'mobile_services',
          'label' => '',
          'name' => $prefix.'mobile_services',
          'type' => 'repeater',
          'required' => 0,
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => __( 'Add', THEME_SLUG ),
          'sub_fields' => array (
            array (
              'key' => $prefix . 'mobile_services_name',
              'label' => __('Name', THEME_SLUG ),
              'name' => 'name',
              'type' => 'text',
            ),
            array (
              'key' => $prefix . 'mobile_services_icon',
              'label' => __('Icon', THEME_SLUG ),
              'name' => 'icon',
              'type' => 'text',
              'wrapper' => array('class' => 'amano-icon'),
            ),
          ),
        ),
        array(
          'key' => $prefix . 'tab_other_services',
          'label' => __( 'Other Services', THEME_SLUG ),
          'name' => $prefix . 'tab_other_services',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array (
          'key' => $prefix . 'other_services_title',
          'label' => __('Title', THEME_SLUG ),
          'name' => $prefix . 'other_services_title',
          'type' => 'text',
        ),
        array (
          'key' => $prefix.'other_services',
          'label' => '',
          'name' => $prefix.'other_services',
          'type' => 'repeater',
          'required' => 0,
          'min' => 0,
          'max' => 0,
          'layout' => 'table',
          'button_label' => __( 'Add', THEME_SLUG ),
          'sub_fields' => array (
            array (
              'key' => $prefix . 'other_services_name',
              'label' => __('Name', THEME_SLUG ),
              'name' => 'name',
              'type' => 'text',
            ),
            array (
              'key' => $prefix . 'other_services_icon',
              'label' => __('Icon', THEME_SLUG ),
              'name' => 'icon',
              'type' => 'text',
              'wrapper' => array('class' => 'amano-icon'),
            ),
          ),
        ),
       
        array(
          'key' => $prefix . 'tab_content',
          'label' => __( 'Content', THEME_SLUG ),
          'name' => $prefix . 'tab_content',
          'type' => 'tab',
          'placement' => 'top',
          'endpoint' => 0,
        ),
        array(
          'key' => $prefix . 'content',
          'label' => __( 'Content', THEME_SLUG ),
          'name' => $prefix . 'content',
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
      ),
      'location' => array(
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'template-service.php',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => array(
        // 0 => 'the_content',
        // 1 => 'page_attributes',
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

Amano_Service::get_instance();
