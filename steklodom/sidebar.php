<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package steklodom
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside class="col-sm-4 col-lg-3">
	
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	
</aside>
