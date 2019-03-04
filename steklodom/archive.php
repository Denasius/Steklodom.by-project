<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
					<li class="last_breadcrumbs_element"><span><?php ucfirst(single_cat_title()); ?></span></li>
				</ul>
			</div>
		</div>
	</div>
<!-- end breadcrumbs -->
<?php if ( have_posts() ) : ?>
	<!-- start content wrapper -->
		<section class="news-page ex-progects container">
			<div class="row">
				<div class="col-xs-12">
					<p class="heading"><?php single_cat_title(); ?></p>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="news-card">
							<p class="news-heading"><?php the_title(); ?></p>
							<div class="flex-parent">
								<div class="img-col">
									<?php
										if ( has_post_thumbnail() ) {
											$img_post_url = get_the_post_thumbnail_url();
										}else{
											$img_post_url = 'https://picsum.photos/398/420';
										}
									?>
									<img src="<?= $img_post_url; ?>" alt="<?php the_title(); ?>">
								</div>
								<div class="txt-col">
									<div class="progects-short-txt">
										<?php if (get_the_content()) {
											echo the_content();
										}else{
											echo 'Контент временно отсутствует.';
										} ?>
									</div>
									<template class="full-txt">
										<?php if (get_the_content()) {
											echo the_content();
										}else{
											echo 'Контент временно отсутствует.';
										} ?>
									</template>
										<!-- Отключаю на ссылках атрибуты data-toggle="modal" и data-target="#news-modal" чтобы отменить выпадающее окно -->
									<a href="<?php the_permalink(); ?>" class="default-btn" >Посмотреть подробнее</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>

			<?php the_posts_pagination(array(
				'end_size' 	=> 1,
				'mid_size'	=> 1,
				'type'		=> 'list',
				'prev_text' => __( '', 'steklodom' ),
				'next_text' => __( '', 'steklodom' ),
			)); ?>

		<!--.End Pagination/-->
		</section>
	<!-- end content wrapper -->
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<!-- PROJECTS POPUP -->
	<div id="news-modal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">

		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal"></button>
		        	<div class="img-wrapper">
		        		<img src="" alt="image">
		        	</div>
		        	<p class="news-popup-heading">&nbsp;</p>
					<div class="news-popup-full-txt">&nbsp;</div>
		      	</div>
		    </div>

	  	</div>
	</div>
<?php get_footer();?>
