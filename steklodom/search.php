<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package steklodom
 */

get_header();
?>
			<!-- start breadcrumbs -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="breadcrumbs">
					<li><a href="<?= get_home_url(); ?>">Главная</a></li>
					<li><span><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Результаты поиска по запросу: %s', 'steklodom' ), '<span style="font-weight: bold; ">' . get_search_query() . '</span>' );
					?></span></li>
				</ul>
			</div>
		</div>
	</div>
<!-- end breadcrumbs -->
					
<div class="container product-page" <?php if (!have_posts()) echo 'style="text-align: center; margin-bottom: 20px;"';  ?>>
	<div class="row">
		<main class="col-sm-8 col-lg-12">
			<!-- -->
			<?php if ( have_posts() ) { ?>
				<div class="row">
					<div class="col-xs-12 catalog-products">
					<?php while ( have_posts() ) : the_post() ?>
						<?php get_template_part('template-parts/content', 'search'); ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					</div>
				</div>
			<?php }else{ ?>
				<h3 style="text-align: center;">По запросу <span><?php echo get_search_query(); ?></span> ничего не найдено.</h3>
				<a style="font-family: Roboto; font-size: 16px; margin-bottom: 20px;" href="/">вернуться на главную</a>
			<?php } ?>
			
			
		</main>
		<?php the_posts_pagination(array(
			'end_size' 	=> 1,
			'mid_size'	=> 1,
			'type'		=> 'list',
			'prev_text' => __( '', 'steklodom' ),
			'next_text' => __( '', 'steklodom' ),
		)); ?>

	<!--.End Pagination/-->
	</div>
</div>

<?php get_footer();?>