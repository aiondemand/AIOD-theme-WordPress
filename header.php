<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ai4europe
 */

if(get_page_template_slug() == 'templates/template-home.php'){
	define('HOME', true);
}else{
	define('WHITE', true);
}

$logo_white = (get_field('main_logo_option', 'option')['url'] ? get_field('main_logo_option', 'option')['url'] : get_template_directory_uri() . '/assets/img/logo-white.svg');
$logo_color = (get_field('second_logo_option', 'option')['url'] ? get_field('second_logo_option', 'option')['url'] : get_template_directory_uri() . '/assets/img/logo-color.svg');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

	<!-- Website icons -->
	<?php $favicon = (get_field('favicon_option', 'option')['url'] ? get_field('favicon_option', 'option')['url'] : get_template_directory_uri() . '/assets/img/favicon_ai4europe.svg'); ?>
    <link href="<?php echo $favicon; ?>" rel="icon" sizes="192x192">
    <link href="<?php echo $favicon; ?>" rel="apple-touch-icon" sizes="180x180">

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
    <!-- endinject -->

	<!-- Retirar quando for live, QUESTIONAR -->
	<script src="https://unpkg.com/@free-side/audioworklet-polyfill/dist/audioworklet-polyfill.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.0/p5.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.0/addons/p5.sound.min.js"></script>

	<link rel="dns-prefetch" href="https://www.google-analytics.com">
	<link rel="dns-prefetch" href="https://fonts.googleapis.com/">

	<?php if(get_field('codigo_gtm', 'option')){ ?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php echo get_field('codigo_gtm', 'option'); ?>');</script>
		<!-- End Google Tag Manager -->
	<?php } ?>
	

</head>

<body class="<?= defined( 'HOME' ) ? 'home body--home' : ''; ?> <?= defined( 'DARK' ) ? 'body--dark' : ''; ?> <?= defined( 'WHITE' ) ? 'body--white' : ''; ?>">

	<?php if(get_field('codigo_gtm', 'option')){ ?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_field('codigo_gtm', 'option'); ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
	<?php } ?>

	<header class="main-header">
		<div class="header <?= defined( 'HOME' ) ? 'header--home' : ''; ?> <?= defined( 'DARK' ) ? 'header--dark' : ''; ?> <?= defined( 'WHITE' ) ? 'header--white' : ''; ?>">

			<div class="container-fluid">
				<div class="row">

					<!-- Logo -->
					<div class="col-6 col-md-3">
						<a href="<?php echo get_home_url(); ?>" title="homepage" class="header__logo header--home__logo">
							<img src="<?php echo $logo_white; ?>" alt="logo-white">
						</a>
						<a href="<?php echo get_home_url(); ?>" title="homepage" class="header__logo header--dark__logo">
							<img src="<?php echo $logo_white; ?>" alt="logo-white">
						</a>
						<a href="<?php echo get_home_url(); ?>" title="homepage" class="header__logo header--white__logo">
							<img src="<?php echo $logo_color; ?>" alt="logo-color">
						</a>
					</div>
					<!-- Logo ends -->
					
					<!-- Mobile Menu Trigger -->
					<div class="col-6 col-md-9 text-right d-lg-none">
						<div class="mobile-menu-trigger">
							<div class="d-md-none mobile-menu-trigger__divIcon">
								<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/lines.svg" alt="lines"></span>
							</div>
							<span>menu</span>
						</div>
					</div>
					<!-- Mobile Menu Trigger ends -->

					<?php $menu_principal = wp_get_menu_array(5); ?>
					
					<div class="menu-global-wrapper col-12 col-lg-9">
						<!-- Main menu -->
						<div class="header__menu">
							<nav>
								<ul class="d-block d-lg-flex justify-content-lg-end">
									<?php foreach($menu_principal as $key => $item){ ?>
										<?php if($item['children']){?>
											<li class="header__menu__li">
												<!-- add class "header__menu__active" on currently menu of the page -->
												<a href="javascript:void(0)" title="<?php echo $item['title']; ?>" class="header__menu has-submenu menu-item"><?php echo $item['title']; ?></a>
												<!-- add class "header__menu__submenu--open" on currently menu of the page -->
												<ul class="header__menu__submenu">
													<!-- add class "submenu__active" on currently page -->
													<?php foreach($item['children'] as $submenu){ ?>
														<li><a href="<?php echo $submenu['url']; ?>" title="<?php echo $submenu['title']; ?>"><?php echo $submenu['title']; ?></a></li>
													<?php } ?>
												</ul>
											</li>
										<?php }else{ ?>
											<li>
												<a href="<?php echo $item['url']; ?>" title="Results" class="menu-item"><?php echo $item['title']; ?></a>
											</li>
										<?php } ?>

									<?php } ?>
									
									<li>
										<span class="menu-item menu-item-search">
											<?php /*
											<button type="button" class="search-trigger-button" data-toggle="modal" data-target="#searchModal">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-search.svg" alt="search">
											</button> */ ?>
										</span>
									</li>
								</ul>
							</nav>
						</div>
						<!-- Main menu ends -->

						<div class="header__social">
							<?php if(get_field('facebook', 'option')){ ?>
								<a href="<?php echo get_field('facebook', 'option'); ?>" title="facebook" class="icon-facebook" target="_blank"></a>
							<?php } ?>
							<?php if(get_field('linkedin', 'option')){ ?>
								<a href="<?php echo get_field('linkedin', 'option'); ?>" title="linkedin" class ="icon-linkedin" target="_blank"></a>
							<?php } ?>
							<?php if(get_field('twitter', 'option')){ ?>
								<a href="<?php echo get_field('twitter', 'option'); ?>" title="twitter" class="icon-twitter" target="_blank"></a>
							<?php } ?>
							<?php if(get_field('youtube', 'option')){ ?>
								<a href="<?php echo get_field('youtube', 'option'); ?>" title="youtube" class="icon-youtube" target="_blank"></a>
							<?php } ?>
						</div>
					</div>
					
				</div>
			</div>
		</div>
  	</header>


    <!-- SVG for buttons  -->
    <div class="d-none">
		<svg id="btn-line" viewBox="0 0 198 65" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect x="0.5" y="0.5" width="197" height="64" />
		</svg>
		<svg id="btn-line-cookies" viewBox="0 0 300 65" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect width="100%" height="64" stroke="#FFED00"  stroke-width="1" />
		</svg>
		<svg id="btn-line-contact" viewBox="0 0 300 65" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect width="100%" height="64" stroke-width="1" />
		</svg>
		<svg id="btn-line-lg" viewBox="0 0 400 65" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect width="100%" height="64" stroke="#133293" stroke-width="1" />
		</svg>
		<svg id="btn-line1" viewBox="0 0 200 65" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect x="0.5" y="0.5" width="198" height="64" stroke="#ffffff" />
		</svg>
		<svg id="btn-line1-lg" viewBox="0 0 400 65" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect width="100%" height="64" stroke="#ffffff" stroke-width="1" />
		</svg>
  	</div>

