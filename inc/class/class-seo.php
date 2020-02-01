<?php

class Amano_Social {

  protected static $instance = null;

  public static function get_instance() {

    if ( !self::$instance ) {
      self::$instance = new Amano_Social();
    }
    return self::$instance;

  }

	public function __construct() {

		$this->hooks();

	}

	public function hooks() {

    // add_action('wp_enqueue_scripts', array( $this, 'scripts'));
    add_action('wp_head', array($this, 'opengraph'), 1000);
    add_action('mimo_social_share', array( $this, 'social_share'));
	}

  public function scripts() {

    wp_enqueue_script( THEME_SLUG . '-seo', JS_URI . '/seo.js', array(), THEME_VERSION, true );

  }

  public function social_share() {

    global $post;
    $bookmarks_class = '';

    $facebook = 'http://www.facebook.com/sharer.php?u='. urlencode( get_the_permalink( $post->ID ) );
    $line     = 'https://social-plugins.line.me/lineit/share?url='. urlencode( get_the_permalink( $post->ID ) );
    $twitter  = 'https://twitter.com/share?url='.urlencode( get_the_permalink( $post->ID ) ).'&text='.urlencode( $post->post_title ); ?>
    <ul class="share-post">
      <li class="label"><?php _e( 'Share', THEME_SLUG ) ?> :</li>
      <li class="facebook"><a href="<?php echo $facebook ?>" target="_blank"><i class="flaticon-facebook"></i></a></li>
      <li class="line"><a href="<?php echo $line ?>" target="_blank"><i class="flaticon-line-logo-1"></i></a></li>
      <li class="twitter"><a href="<?php echo $twitter ?>" target="_blank"><i class="flaticon-twitter"></i></a></li>
    </ul>
  <?php }

  public function opengraph() {

    global $post;

    if( is_single() || is_page() ) {

      if ( $image = get_post_meta( $post->ID, 'seo_image', true ) ) {

          $img_src = wp_get_attachment_image_src( $image, 'large');
          $img_src = $img_src[0];

        }elseif( has_post_thumbnail($post->ID) ) {

          $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'large');
          $img_src = $img_src[0];

        } else {

          $img_src = content_url( 'uploads/2020/01/bulk-handling-system.jpg' );

        }
        if ( $excerpt = get_post_meta( $post->ID, 'seo_description', true ) ) {

          $excerpt = str_replace("", "'", $excerpt);

        }elseif( $excerpt = get_the_excerpt( $post->ID ) ) {

          $excerpt = strip_tags( $excerpt );
          $excerpt = str_replace("", "'", $excerpt);

        } else {

          $excerpt = get_bloginfo('description');

        }

        if ( is_front_page() ) {
            $title = get_bloginfo('blogname');
        }else{
            $title = get_the_title();
        } ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id="></script>
<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', '');</script>
<meta property="og:locale" content="<?php echo trim(get_locale()) ?>"/>
<meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
<meta property="og:title" content="<?php echo $title;; ?>"/>
<meta property="og:url" content="<?php the_permalink(); ?>"/>
<meta property="og:type" content="article"/>
<meta property="og:description" content="<?php echo $excerpt; ?>"/>
<meta property="og:image" content="<?php echo $img_src ?>"/>
<meta property="article:publisher" content="https://www.facebook.com/AmanoThaiInternational/"/>
<meta property="fb:app_id" content=""/>
<meta property="fb:admins" content=""/>
<!-- Google+ / Schema.org -->
<meta itemprop="name" content="<?php echo $title;; ?>"/>
<meta itemprop="description" content="<?php echo $excerpt; ?>"/>
<meta itemprop="image" content="<?php echo $img_src ?>"/>
<!-- Twitter Cards -->
<meta name="twitter:title" content="<?php echo $title;; ?>"/>
<meta name="twitter:url" content="<?php the_permalink(); ?>"/>
<meta name="twitter:description" content="<?php echo $excerpt; ?>"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:site" content=""/>
<!-- SEO -->
<link rel="canonical" href="<?php esc_url(home_url( '/' )) ?>"/>
<meta name="description" content="<?php echo $excerpt; ?>"/>
<meta name="twitter:image" content="<?php echo $img_src ?>"/>
<meta name="author" content="Amano Thai"/>
<meta name="publisher" content="Amano Thai"/>
  <!-- Misc. tags -->
  <?php } else {
          return;
    }
  }
}

Amano_Social::get_instance();