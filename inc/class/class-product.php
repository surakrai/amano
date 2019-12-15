<?php

class Amano_Product {

  protected static $instance = null;

  public static function get_instance() {

    if ( !self::$instance ) {
      self::$instance = new Amano_Product();
    }
    return self::$instance;

  }

	public function __construct() {

		$this->hooks();

	}

	public function hooks() {

    add_action( 'save_post', array( $this, 'save' ), 13, 2 );

    add_action( 'init', array( $this, 'register_taxonomy' ), 8 );
    add_action( 'init', array( $this, 'register_post_type' ), 9 );

    // add_action( 'acf/init', array( $this, 'fields' ) );

    add_action( 'display_post_states', array( $this, 'post_states' ), 10, 2 );

    add_filter( 'manage_product_posts_columns', array( $this, 'columns' ) );
    add_action( 'manage_product_posts_custom_column', array( $this, 'columns_display' ), 10, 2  );
	}

	public function register_post_type(){
		$labels = array(
			'name' => __('Product', THEME_SLUG),
			'menu_name' => __('Product', THEME_SLUG),
			'all_items' => __('All Post', THEME_SLUG),
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
      'has_archive' => true,
      'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-cart',
			'supports'  => array( 'title', 'editor', 'thumbnail'  )
		);

		register_post_type( 'product', $args );

    unregister_post_type('post');

	}

  public function register_taxonomy() {

    $labels = array(
      'name'                       => __( 'Category', THEME_SLUG ),
      'singular_name'              => __( 'Category', THEME_SLUG ),
      'menu_name'                  => __( 'Category', THEME_SLUG ),
      'all_items'                  => __( 'All Category', THEME_SLUG ),
      'parent_item'                => __( 'Parent Category', THEME_SLUG ),
      'parent_item_colon'          => __( 'Parent Category:', THEME_SLUG ),
      'new_item_name'              => __( 'Product Category', THEME_SLUG ),
      'add_new_item'               => __( 'Add Category', THEME_SLUG ),
      'edit_item'                  => __( 'Edit Category', THEME_SLUG ),
      'update_item'                => __( 'Update Category', THEME_SLUG ),
      'view_item'                  => __( 'View Category', THEME_SLUG ),
    );
    register_taxonomy(
      'product_cat', array( 'product' ), array(
      'publicly_queryable' => true,
      'hierarchical' => true,
      'rewrite' => array(
        'slug' => 'product/category',
        'with_front' => false,
        'hierarchical' => true,
      ),
      'has_archive' => true,
      // 'meta_box_cb' => true,
      'show_admin_column' => false,
      'labels' => $labels,
    ));

  }

	public function fields() {

		$prefix = '_product_';

    $choice = array();

    acf_add_local_field_group(array(
      'key' => $prefix . 'setting',
      'title' => __( 'Product Detail', THEME_SLUG ),
      'fields' => array (
        array (
          'key' => $prefix . 'post_recommend',
          'label' => __( 'Recommend product', THEME_SLUG ),
          'name' => 'post_recommend',
          'type' => 'true_false',
          'instructions' => '',
          'message' => '',
          'default_value' => 0,
          'ui' => 1,
        ),
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
        array (
          'key' => $prefix . 'gallery',
          'label' => __('Gallery', THEME_SLUG ),
          'name' => $prefix . 'gallery',
          'type' => 'gallery',
          'insert' => 'append',
          'library' => 'all',
          'mime_types' => '',
          // 'instructions' => '600px X 600px',
        )
      ),
      'style' => 'seamless',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'location' => array (
        array (
          array (
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'product',
          ),
        ),
      ),
    ));

	}


  public function post_states( $post_states, $post ) {

    if ( get_field('post_recommend', $post->ID == 1 ) && 'product' == get_post_type( $post->ID ) ) {
      $post_states[] = __( 'Recommend product', THEME_SLUG );
    }

    return $post_states;

  }
  public function columns( $columns ) {

    unset( $columns['title'] );
    unset( $columns['date'] );

    $columns['amano_thumbnail']       = '<span class="dashicons-format-image"></span>';
    $columns['title']                = __( 'Title' );
    $columns['author']               = __( 'Author', THEME_SLUG );
    $columns['date']                 = __( 'Date' );


    return $columns;

  }

  public function columns_display( $column, $post_id ) {

    switch ( $column ) {
      case 'amano_thumbnail' :
        if ( has_post_thumbnail($post_id ) ) {
          echo '<a href="'. get_edit_post_link( $post_id ) .'">' . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
        }else{
          echo '<img src="https://via.placeholder.com/150.jpg/f8f8f8/f8f8f8">';
        }
      break;
    }
  }

  public function save( $post_id ) {

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
      return;

    if ( wp_is_post_revision( $post_id ) )
      return;

    if ( 'product' != get_post_type( $post_id ) )

      return;
  }

}

Amano_Product::get_instance();