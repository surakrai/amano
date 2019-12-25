<!DOCTYPE html>
<html <?php language_attributes(); ?> class="">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<meta name="theme-color" id="theme-color" content="#0c74d7">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="wrapper">
			<header class="site-header">
				<div class="container-fluid d-flex">
					<a href="<?php echo esc_url(home_url( '/' )); ?>" class="site-branding">
						<img class="white" src="<?php echo content_url('uploads/2019/12/logo.png') ?>" data-rjs="<?php echo content_url('uploads/2019/12/logo_@2x.png'); ?>">
						<img class="color" src="<?php echo content_url('uploads/2019/12/logo-color.png') ?>" data-rjs="<?php echo content_url('uploads/2019/12/logo-color_@2x.png'); ?>">
					</a>
					<div class="language-switcher"><?php echo languages_switcher(); ?></div>
					<div class="hamburger-menu">
						<div class="hamburger">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
						<span>MENU</span>
						<div class="rippleJS"></div>
					</div>
				</div>
				<div class="site-navigation">
					<div class="container">
						<?php
							wp_nav_menu (
								array(
									'menu_class'         => 'menu-main d-flex justify-content-between',
									'container'          => 'ul',
									'theme_location'     => 'primary_navigation',
									'walker'             => new Amano_Walker_Nav_Menu
							));
						?>
					</div>
					<div class="site-navigation-bg">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
			</header>