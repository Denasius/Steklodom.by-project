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
<html>
<head style="margin-top: -32px;">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/bootstrap-3.3.7.min.css">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/screen.css">
	<title><?php bloginfo( 'name' ); ?></title>
</head>