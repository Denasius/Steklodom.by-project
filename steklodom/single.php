<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package steklodom
 */

get_header(); ?>

<!-- start breadcrumbs -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="breadcrumbs">
					<li><a href="<?= get_home_url(); ?>">Главная</a></li>
					<?php if ( get_the_category() ) : ?>
						<?php foreach ( get_the_category() as $cat ) : ?>
							<li class="single_breadcrumbs"><a href="<?= get_category_link($cat->term_id); ?>"><?= ucfirst($cat->cat_name); ?></a></li>
						<?php endforeach; ?>
					<?php endif; ?>
					<li class="last_breadcrumbs_element"><span><?php ucfirst(the_title()); ?></span></li>
				</ul>
			</div>
		</div>
	</div>
<!-- end breadcrumbs -->

<div class="container product-page">
	<div class="row">
		<main class="col-sm-12 col-lg-12">
			<!-- -->
			<?php if ( have_posts() ) : ?>
				<div class="row">
					<div class="col-xs-12 catalog-products-order">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							if ( has_post_format( 'aside' )) {
							  	get_template_part('template-parts/content', 'aside-product');
							 
							}else{
								get_template_part('template-parts/content', 'product');
							}
						?>
					<?php endwhile; ?>
					</div>
				</div>
			<?php else : ?>
				<h3>В данной категории товаров пока нет.</h3>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			
		</main>
	</div>
</div>

<?php get_footer();?>