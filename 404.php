<?php 
switch ($_SERVER['REQUEST_URI']) {
  case '/all-product':
      wp_redirect(get_post_type_archive_link('product'));
      exit;
    break;

  case '/about-us':
      wp_redirect(get_permalink(get_page_by_path('about-company')));
      exit;
    break;
    
  case '/type/Mist--Oil-Mist-Collector/page/1':
      wp_redirect(get_post_type_archive_link('product'));
      exit;
    break;
    
  case '/product/Industrial-Vacuum-Cleaner/57-V-7SDR':
      wp_redirect(get_post_type_archive_link('product'));
      exit;
    break;

  case '/industries-and-application/1-Why-using-dust-collector-systems':
      wp_redirect(get_post_type_archive_link('product'));
      exit;
    break;
  case '/type/Mist--Oil-Mist-Collector/8-Mj-series/page/1':
      wp_redirect('https://amanothai.co.th/product/category/environmental-systems/mist-collectors/');
      exit;
    break;    

  case '/type/Anti-Explosion-Dust-Collector/page/1':
      wp_redirect('https://amanothai.co.th/product/category/environmental-systems/large-scale-dust-collection-systems/');
      exit;
    break;
    
  default:
    # code...
    break;
}
get_header(); ?>
  <section class="page-header">
    <div class="container">
      <?php the_breadcrumbs() ?>
      <h1 class="page-title">404</h1>
    </div>
  </section><!-- .page-header -->
  <main class="main-content container">
  </main>
<?php get_footer(); ?>