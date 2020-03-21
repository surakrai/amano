<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo wp_is_mobile() ? 'mobile' : 'pc'; ?>">
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
					<a href="<?php echo esc_url(home_url('/')); ?>" class="site-branding">
						<img class="white" src="<?php echo content_url('uploads/2020/01/logo.png') ?>" data-rjs="<?php echo content_url('uploads/2020/01/logo_@2x.png'); ?>">
						<img class="color" src="<?php echo content_url('uploads/2020/01/logo-color.png') ?>" data-rjs="<?php echo content_url('uploads/2020/01/logo-color_@2x.png'); ?>">
					</a>
					<a class="amano-japanese" href="https://www.amano.co.jp/English/" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px" class=""><g><g>
							<g>
								<path d="M256,0C114.842,0,0,114.842,0,256s114.842,256,256,256s256-114.842,256-256S397.158,0,256,0z M172.767,49.548    c-15.431,21.032-26.894,45.924-35.095,70.354c-14.907-5.344-28.707-11.736-41.104-19.09    C117.975,78.827,143.872,61.24,172.767,49.548z M74.894,126.702c15.971,9.964,34.036,18.452,53.65,25.317    c-6.467,27.334-10.344,56.811-11.382,87.284H34.016C37.128,197.525,51.824,158.923,74.894,126.702z M74.893,385.297    c-23.069-32.219-37.766-70.822-40.878-112.601h83.145c1.038,30.474,4.915,59.95,11.382,87.284    C108.929,366.845,90.866,375.333,74.893,385.297z M96.569,411.187c12.397-7.354,26.197-13.746,41.104-19.09    c8.2,24.428,19.663,49.32,35.095,70.354C143.872,450.76,117.975,433.173,96.569,411.187z M239.304,475.526    c-34.478-12.654-57.72-57.982-69.619-92.899c21.841-5.198,45.296-8.391,69.619-9.4V475.526z M239.304,339.813    c-27.403,1.061-53.935,4.708-78.711,10.722c-5.624-24.321-9.038-50.587-10.029-77.84h88.74V339.813z M239.304,239.304h-88.74    c0.99-27.253,4.404-53.518,10.029-77.84c24.776,6.014,51.308,9.661,78.711,10.722V239.304z M239.304,138.773    c-24.322-1.008-47.777-4.203-69.619-9.4c11.89-34.894,35.131-80.242,69.619-92.899V138.773z M437.107,126.703    c23.069,32.219,37.766,70.822,40.878,112.601h-83.145c-1.038-30.474-4.915-59.95-11.382-87.284    C403.071,145.155,421.134,136.667,437.107,126.703z M415.431,100.813c-12.397,7.354-26.197,13.746-41.104,19.09    c-8.2-24.428-19.663-49.32-35.095-70.354C368.128,61.24,394.025,78.827,415.431,100.813z M272.696,36.474    c34.478,12.654,57.72,57.982,69.619,92.899c-21.841,5.198-45.296,8.391-69.619,9.4V36.474z M272.696,172.187    c27.403-1.061,53.935-4.708,78.711-10.722c5.624,24.321,9.038,50.587,10.029,77.84h-88.74V172.187z M272.696,272.584h88.74    c-0.99,27.253-4.404,53.63-10.029,77.951c-24.776-6.014-51.308-9.661-78.711-10.722V272.584z M272.696,475.526V373.227    c24.322,1.008,47.777,4.203,69.619,9.4C330.425,417.52,307.183,462.868,272.696,475.526z M339.233,462.452    c15.431-21.032,26.894-45.924,35.095-70.354c14.907,5.344,28.706,11.736,41.104,19.09    C394.025,433.173,368.128,450.76,339.233,462.452z M437.106,385.298c-15.971-9.964-34.036-18.452-53.65-25.317    c6.467-27.334,10.344-56.922,11.382-87.395h83.145C474.872,314.364,460.176,353.077,437.106,385.298z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
							</g>
						</g></g> </svg>
						<p><strong>AMANO</strong> global</p>
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
									'menu_class'         => 'menu-main d-none d-lg-flex justify-content-between',
									'container'          => 'ul',
									'theme_location'     => 'primary_navigation',
									'walker'             => new Amano_Walker_Nav_Menu
							));
						?>
						<?php
							wp_nav_menu (
								array(
									'menu_class'         => 'menu-main-mobile d-lg-none',
									'container'          => 'ul',
									'theme_location'     => 'primary_navigation_mobile'
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