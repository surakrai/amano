<?php

class Amano_Gallery {

  protected static $instance = null;

  public static function get_instance() {

    if ( !self::$instance ) {
      self::$instance = new Amano_Gallery();
    }
    return self::$instance;

  }

	public function __construct() {

		$this->hooks();

	}

	public function hooks() {

    add_action('init', array($this, 'register_post_type'), 9);
    add_action('acf/init', array($this, 'fields'));
    add_action('rest_api_init', array( $this , 'rest_api_init'));

  }
  
	public function register_post_type(){
		$labels = array(
			'name' => __('Gallery', THEME_SLUG),
			'menu_name' => __('Gallery', THEME_SLUG),
			'all_items' => __('All Gallery', THEME_SLUG),
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
			'menu_icon' => 'dashicons-camera-alt',
			'supports'  => array('title')
		);

		register_post_type( 'gallery', $args );
  }
  
  public function fields() {

    $prefix = '_gallery_';

    acf_add_local_field_group(array(
      'key' => $prefix . 'setting',
      'title' => __( 'Gallery', THEME_SLUG ),
      'fields' => array(
        array (
          'key' => $prefix . 'items',
          'label' => '',
          'name' => $prefix . 'items',
          'type' => 'gallery',
          'insert' => 'append',
          'library' => 'all',
          'mime_types' => '',
          'return_format' => 'ID'
          // 'instructions' => '600px X 600px',
        )
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'gallery',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'active' => true,
      'description' => '',
    ));
  }

  public function rest_api_init() {

    register_rest_route('amano', '/gallery', array(
      'methods'  => 'POST',
      'callback' => array($this, 'api'),
      'args'     => array('cat', 'page')
    ));

  }

  public function get_gallery($ids) {

    if (!$ids) return false;

    $gallery_ids = array();

    foreach ($ids as $id) {
      $gallery_ids = array_merge($gallery_ids, get_field('_gallery_items', $id));
    }

    return $gallery_ids;

  }

  public function api($data) {

    $cat   = $data['cat'];
    $page  = $data['page'];
    $posts = explode(',', $data['posts']);    
    $html  = '';

    $page += 1;

    $args = array(
      'post_type'        => 'attachment',
      'posts_per_page'   => 12,
      'paged'            => $page,
      'post_status'      => 'inherit',
      'post__in'         => Amano_Gallery::get_instance()->get_gallery($posts),
      'orderby'          => 'post__in'
    );
    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) : 
      while ( $the_query->have_posts() ) : $the_query->the_post();

        $html .= '<a class="gallery__item amano-col col-md-4 col-6 glightbox" href="'. wp_get_attachment_image_url(get_the_ID(), 'large') .'" data-glightbox="description: '. get_the_content() .'; descPosition: bottom">';
        $html .= wp_get_attachment_image(get_the_ID(), 'thumb-gallery');
        $html .= '</a>';
        
      endwhile;
      wp_reset_query();
    endif;

    return array(
      'page'     => $page,
      'content'  => $html,
      'success'  => $the_query->max_num_pages <= $page ? true : false
    );

  }
}

Amano_Gallery::get_instance();