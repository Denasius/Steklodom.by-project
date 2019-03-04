<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package steklodom
 */

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head(); ?>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style type="text/css">
		.page-numbers li a.next{
			transition: 0s;
		    display: inline-block;
		    width: 25px;
		    height: 18px;
		    margin-left: 40px;
			background: url(<?= get_template_directory_uri(); ?>/assets/img/icons/pager-r.png) no-repeat left;
		}
		.page-numbers li a.next:hover{
			background: url(<?= get_template_directory_uri(); ?>/assets/img/icons/pager-r.png) no-repeat right;
		}
		.page-numbers li a.prev{
			transition: 0s;
		    display: inline-block;
		     margin-right: 40px;
		    width: 25px;
		    height: 18px;
		    background: url(<?= get_template_directory_uri(); ?>/assets/img/icons/pager-l.png) no-repeat right;
		}
		.page-numbers li a.prev:hover{
			background: url(<?= get_template_directory_uri(); ?>/assets/img/icons/pager-l.png) no-repeat left
		}
	</style>
</head>

<body <?php body_class(); ?>>
<header>
	<div class="primary-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="top-line">
						<?php the_custom_logo(); ?>
						
						<div class="right-column">
							<?php
								wp_nav_menu( array(
									'theme_location'  	=> 'menu-top',
									'menu_class'		=> 'pages-menu'
								));
							?>
							<div class="phones-block">
								<i></i>
								<?php $vowels = array(" ", "-", "(", ")"); ?>
								<?php if ( get_option('phones_company') ) : ?>
									<a href="tel:<?= str_replace($vowels, "", get_option('phones_company'));?>"><?= get_option('phones_company');?></a>
								<?php endif; ?>
								
								<?php if ( get_option('phones_company_2') ) : ?>
								<a href="tel:<?= str_replace($vowels, "", get_option('phones_company_2'));?>"><?= get_option('phones_company_2');?></a>
								<?php endif; ?>
								
								<?php if ( get_option('phones_company_3') ) : ?>
								<a href="tel:<?= str_replace($vowels, "", get_option('phones_company_3'));?>"><?= get_option('phones_company_3');?></a>
								<?php endif; ?>
								<?php get_search_form(); ?>
								
								<button class="xs-st-menu"></button>
								<button class="xs-dy-menu">Меню</button>
							</div>
						</div>
					</div>
					<?php
						wp_nav_menu( array(
							'theme_location'  	=> 'menu-categories',
							'menu_class'		=> 'drop-down-menu',
							'container'			=> false,
							'depth'				=> 0
						));
					?>
				</div>
			</div>
		</div>
	</div>
</header>
