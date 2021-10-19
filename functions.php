<?php

/*-----------------------------------------------------------------------------------*/
/*  Define Theme Vars
/*-----------------------------------------------------------------------------------*/

define('THEME_DIR', trailingslashit(get_template_directory()));
define('THEME_URI', trailingslashit(get_template_directory_uri()));
define('THEME_NAME', 'Amano');
define('THEME_SLUG', 'amano');
define('THEME_VERSION', '1.2.3');
define('SRC_URI', THEME_URI . 'src');
define('STATIC_URI', THEME_URI . 'static');
define('INC_DIR', THEME_DIR . 'inc');
define('IMG_URI', STATIC_URI . '/images/');

require INC_DIR . '/helpers.php';
require INC_DIR . '/lib/class-ds-wp-breadcrumb.php';
require INC_DIR . '/class/class-email.php';
require INC_DIR . '/class/class-menu.php';
require INC_DIR . '/class/class-home.php';
require INC_DIR . '/class/class-product.php';
require INC_DIR . '/class/class-blog.php';
require INC_DIR . '/class/class-news.php';
require INC_DIR . '/class/class-about.php';
require INC_DIR . '/class/class-contact.php';
require INC_DIR . '/class/class-gallery.php';
require INC_DIR . '/class/class-seo.php';

add_action('wp_enqueue_scripts', 'amano_enqueue_scripts', 100);

function amano_enqueue_scripts() {
	
	wp_deregister_script('jquery');
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	
	$manifest = json_decode(file_get_contents('build/assets.json', true));
	$front     = $manifest->front;
	
	// wp_enqueue_style(THEME_SLUG . '-icon', 'https://fonts.googleapis.com/icon?family=Material+Icons',  false, null);	
	wp_enqueue_style(THEME_SLUG . '-css', THEME_URI . 'build/' . $front->css, array(), THEME_VERSION, 'all');		
	wp_enqueue_script(THEME_SLUG . '-js', THEME_URI . 'build/' . $front->js, array(), THEME_VERSION, true);

  wp_localize_script(THEME_SLUG . '-js', 'AMANO', array(
		'ajaxurl'      => admin_url( 'admin-ajax.php' ),
		'api_endpoint' => get_rest_url(),
		'producturl'   => get_post_type_archive_link('product'),
		'device'       => ''
	));
	
}

function amano_admin_enqueue_scripts(){

	$manifest = json_decode(file_get_contents('build/assets.json', true));
	$admin     = $manifest->admin;

	wp_enqueue_style(THEME_SLUG . '-admin-css', THEME_URI . 'build/' . $admin->css,  false, THEME_VERSION);
	//wp_enqueue_script(THEME_SLUG . '-admin-js', THEME_URI . 'build/' . $admin->js, array(), THEME_VERSION, true);
	
}

add_action( 'admin_enqueue_scripts', 'amano_admin_enqueue_scripts' );


add_action( 'after_setup_theme', 'amano_setup', 20 );

if ( ! function_exists( 'amano_setup' ) ) :

	function amano_setup() {

    load_theme_textdomain( THEME_SLUG, THEME_DIR . '/languages' );
	  
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'feed_links', 2);
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
		remove_action('wp_head', 'wp_oembed_add_discovery_links');
		remove_action('wp_head', 'wp_oembed_add_host_js');
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('rest_api_init', 'wp_oembed_register_route');
		remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
		remove_filter('oembed_dataparse', 'show_admin_bar', 10);		
		add_filter('show_admin_bar', '__return_false');
		
		//add_theme_support( 'automatic-feed-links' );

		add_theme_support('title-tag');

		// add_theme_support( 'wp-block-styles' );
		// add_theme_support( 'responsive-embeds' );

    // add_theme_support('post-formats', array( 'video', 'gallery' ));

		add_theme_support('post-thumbnails');

		add_image_size('about-feature', 300, 300, true);
		add_image_size('our-project', 534, 352, true);
		add_image_size('thumb-gallery', 300, 240, true);
		add_image_size('thumb-product', 400, 300, true);
		add_image_size('thumb-news', 350, 255, true);		

		add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

	  register_nav_menus(array(
			'primary_navigation'         => __('Primary Navigation', THEME_SLUG),
			'primary_navigation_mobile'  => __('Primary Navigation Mobile', THEME_SLUG),			
	    'footer_navigation'          => __('Footer Navigation', THEME_SLUG),
		));
		
	}
endif;


add_action( 'wp_before_admin_bar_render', 'amano_remove_admin_bar_links', 9999 );

function amano_remove_admin_bar_links() {

	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('about');
	$wp_admin_bar->remove_menu('wporg');
	$wp_admin_bar->remove_menu('documentation');
	$wp_admin_bar->remove_menu('support-forums');
	$wp_admin_bar->remove_menu('feedback');
	$wp_admin_bar->remove_menu('new-post');
	$wp_admin_bar->remove_menu('new_draft');	
	if( get_current_user_id() != 1 ){
		$wp_admin_bar->remove_menu('autoptimize');
		$wp_admin_bar->remove_menu('wpfc-toolbar-parent');
	}

}

add_action( 'admin_menu', 'amano_remove_menus_admin', 999 );

function amano_remove_menus_admin(){

  remove_menu_page( 'edit-links.php' );
  remove_menu_page( 'edit.php' );
  remove_menu_page( 'edit-comments.php' );

  if( get_current_user_id() != 1 ){
		remove_menu_page( 'edit.php?post_type=acf-field-group' );
		remove_menu_page( 'mlang' );		
  }

}

add_filter('body_class', 'add_slug_to_body_class');

function add_slug_to_body_class($classes) {
	global $post;
	if (is_home()) {
		$key = array_search('blog', $classes);
		if ($key > -1) {
			unset($classes[$key]);
		}
	} elseif (is_page()) {
		$classes[] = sanitize_html_class($post->post_name);
	} elseif (is_singular()) {
		$classes[] = sanitize_html_class($post->post_name);

		if ( is_singular('product') ) {
			$classes[] = sanitize_html_class('product');
		}

		if ( is_singular('gallery') ) {
			$classes[] = sanitize_html_class('gallery');
		}

	} elseif(is_post_type_archive()) {

		$post_type = get_post_type_object(get_post_type());

		if($post_type->name === 'gallery') $classes[] = sanitize_html_class($post_type->name);
		if($post_type->name === 'product') $classes[] = sanitize_html_class('archive-' . $post_type->name);

	} elseif(is_tax()) {
		$taxonomy = explode('_', get_queried_object()->taxonomy);
		$classes[] = sanitize_html_class('archive-' . $taxonomy[0]);
	}
	
	return $classes;
}


function amano_styles_inline() {
	// $custom_css   = '.welcome{background-image: url('. content_url('uploads/2019/12/intro-bg.jpg') .')}';
	$custom_css  .= '.business-area{background-image: url('. content_url('uploads/2019/12/business_bg.jpg') .')}';
	$custom_css  .= '.our-project{background-image: url('. content_url('uploads/2019/12/project.jpg') .')}';
	$custom_css  .= '.our-news{background-image: url('. content_url('uploads/2019/12/new_bg.jpg') .')}';
	$custom_css  .= '.page-header, .site-header.is-sticky.up{background-image: url('. content_url('uploads/2019/12/header-bg.jpg') .')}';	
	$custom_css .= '.site-navigation .menu-main > li{opacity:0}';

  wp_add_inline_style(THEME_SLUG . '-css', minify_css($custom_css));

}
add_action( 'wp_enqueue_scripts', 'amano_styles_inline', 100 );

function get_short_excerpt( $text, $length ){

  $new_text =  mb_substr( $text,0,$length );
  if( mb_strlen($text) > $length ){
    $new_text .= '...';
  }

  return $new_text;
  
}

// add_action('wp_head', 'amano_add_favicon');
// add_action('login_head', 'amano_add_favicon');
// add_action('admin_head', 'amano_add_favicon');

function amano_add_favicon() {
	echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . content_url('uploads/2019/12/favicon114.png') . '">' . PHP_EOL;
	echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . content_url('uploads/2019/12/favicon114.png') . '">' . PHP_EOL;
	echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . content_url('uploads/2019/12/favicon72.png') . '">' . PHP_EOL;
	echo '<link rel="apple-touch-icon-precomposed" href="' . content_url('uploads/2019/12/favicon57.png') . '">' . PHP_EOL;
	echo '<link rel="shortcut icon" href="' . content_url('uploads/2019/12/favicon.png') . '">' . PHP_EOL;
}

add_filter( 'jpeg_quality', 'amano_regenerate_thumbnail_quality');
function amano_regenerate_thumbnail_quality() {
	return 100;
}

add_action( 'login_footer', 'amano_login_logo' );

function amano_login_logo() { ?>

  <style type="text/css">
    body.login div#login h1 a {
      width: 100%;
      height: 38px;
      padding: 0px;
      margin: 0px;
      background-image: url(<?php echo content_url('uploads/2020/01/logo-color_@2x.png'); ?>);
      background-size: 50%;
    }
  </style>

<?php }

add_filter('login_headerurl','amano_login_logo_link');

function amano_login_logo_link() {

	return site_url();
	
}


add_action('pre_get_posts', 'amano_pre_get_posts');

function amano_pre_get_posts( $query ) {
  if ( !is_admin() && $query->is_main_query() ) {
		
		
		if ( is_post_type_archive('timetable') ) {
			$query->set('orderby', 'title');
			$query->set('order', 'ASC');
			$query->set('posts_per_page', 10);
		}

		if ( is_post_type_archive('tours') ) {
			$query->set('posts_per_page', 9);
			$query->set('order', 'ASC');
		}

	}

}



if ( ! function_exists( 'the_pagination' ) ) :

  function the_pagination() {
    global $wp_query;
    $big = 999999999;
    $output = '';
    $output .= "<div class='amano-pagination'>";
    $paginate_links = paginate_links( array(
      'base'         => str_replace( $big, '%#%', esc_url(  get_pagenum_link( $big ) ) ),
      'format'       => '?paged=%#%',
      'prev_text'    => '',
      'next_text'    => '',
      'show_all'     => true,
      'current'      => max( 1, get_query_var('paged') ),
      'total'        => $wp_query->max_num_pages
    ) );
    $output .= $paginate_links;
    $output .= "</div>";
    if ( $paginate_links ) {
      echo $output;
    }

  }

endif;


add_action('acf/init', 'meko_acf_init');

function meko_acf_init() {
  acf_update_setting('google_api_key', 'AIzaSyCHZVnludoo9-AuBLAJ2oRPk4_gu94jW3I');
}


if ( ! function_exists( 'languages_switcher' ) ) {
  
  function languages_switcher() {

    $languages = pll_the_languages(array('raw' => 1, 'hide_current' => 0));

    $output = '';
  
    if($languages) {
      foreach ($languages as $l) {
        $output .= sprintf('<a href="%s" class="%s">%s</a>', $l['url'], $l['slug'] == pll_current_language('slug') ? 'is-active' : '',  $l['slug']);
      }
    }

    return $output;
  
  }

}

function add_the_table_button( $buttons ) {

	if ( ! $pos = array_search( 'undo', $buttons ) ) {
		array_push( $buttons, 'table' );
		return $buttons;
	}

	$buttons = array_merge( array_slice( $buttons, 0, $pos ), array( 'table' ), array_slice( $buttons, $pos ) );
	return $buttons;

}
add_filter( 'mce_buttons', 'add_the_table_button' );

function add_the_table_plugin( $plugins ) {
	$plugins['table'] = 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.6/plugins/table/plugin.min.js';
	return $plugins;
}
add_filter('mce_external_plugins', 'add_the_table_plugin');

// $plugins['table'] = content_url('plugins/mce-table-buttons/tinymce47-table/plugin.min.js');


function line_notify( $message, $token ){

  $body = array(
    'message'         => $message
  );

  $response = wp_remote_post( 'https://notify-api.line.me/api/notify', array(
    'method' => 'POST',
    'headers' => array(
      'Authorization' => 'Bearer '.$token,
    ),
    'body' => $body,
  ));

  $code = wp_remote_retrieve_response_code( $response );

  if ($code=='200' ){
    return true;
  }else{
    return false;
  }
  
}


function getYouTubeVideoId($pageVideUrl) {
	$link = $pageVideUrl;
	$video_id = explode("?v=", $link);

	if (!isset($video_id[1])) {
		$video_id = explode("youtu.be/", $link);
	}

	$youtubeID = $video_id[1];

	if (empty($video_id[1])) $video_id = explode("/v/", $link);

	$video_id = explode("&", $video_id[1]);
	$youtubeVideoID = $video_id[0];

	if ($youtubeVideoID) {
		return $youtubeVideoID;
	} else {
		return false;
	}
}


/**
 * Extend WordPress search to include custom fields
 *
 * http://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
	global $wpdb;

	if ( is_search() ) {
			$join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	}

	return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
* Modify the search query with posts_where
*
* http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
*/
function cf_search_where( $where ) {
	global $pagenow, $wpdb;

	if ( is_search() ) {
			$where = preg_replace(
					"/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
					"(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
	}

	return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
* Prevent duplicates
*
* http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
*/
function cf_search_distinct( $where ) {
	global $wpdb;

	if ( is_search() ) {
			return "DISTINCT";
	}

	return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );