<?php
/**
 * sumaweb template for displaying the header
 *
 * @package WordPress
 * @subpackage sumaweb
 * @since sumaweb 1.0
 */
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="ie ie-no-support" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>         <html class="ie ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( ); ?></title>
		<meta name="viewport" content="width=device-width" />
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>



	<body <?php body_class('loading'); ?> >

		<div id="app_preloader">
			<div class="icon"></div>
		</div>


		<div id="app_content" class="main_container">


			<!--=========================================
			HEADER
			 =========================================-->
			<header>

				<!-- Main Menu -->
				<div class="wrapper">

					<!-- Mobile Menu Icon -->
					<a class="mobile_icon">Menu</a>

					<!-- Logo -->
					<div class="logo">
						<a href="<?php bloginfo('url'); ?>">
							<img src="<?php echo bloginfo('template_directory'); ?>/images/logo-suma.svg" alt="Logo Suma+" />
						</a>
					</div>
					
				 
					<!-- Buttons -->
					<nav id="main_menu">

						<?php

						$nav_menu = wp_nav_menu(
							array(
								'container' => '',
								'items_wrap' => '<ul class="%2$s">%3$s</ul>',
								'theme_location' => 'main-menu',
								'fallback_cb' => '__return_false',
							)
						); ?>


						<!-- Search Box -->
						<div class="search" >
							<a href="#" class="icon">Search</a>
							
							<form action="*">
								<fieldset>
									<input type="text" name="search_txt" value="">
								</fieldset>
							</form>
							
						</div>
						<!-- /Search Box -->
					</nav>    
				</div>
		
			</header>
			<!-- /HEADER -->







