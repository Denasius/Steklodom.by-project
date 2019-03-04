<?php
/*
Template Name: Страница с услугами
*/
?>

<?php get_header(); ?>

<!-- start breadcrumbs -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="breadcrumbs">
					<li><a href="<?= get_home_url(); ?>">Главная</a></li>
					<li><span><?php the_title(); ?></span></li>
				</ul>
			</div>
		</div>
	</div>
<!-- end breadcrumbs -->

	<!-- start content wrapper -->
		<section class="news-page ex-services container">
			<div class="row">
				<div class="col-xs-12">
					<p class="heading"><?php the_title(); ?></p>
					<?php if ( get_field('info_serv') ) : ?>
						<?php foreach ( get_field('info_serv') as $service ) : ?>
							<?php if ( $service['acf_fc_layout'] == 'services' ) : ?>
								<div class="news-card">
									<p class="news-heading"><?= $service['title']; ?></p>
									<div class="flex-parent">
										<div class="img-col">
											<img src="<?= $service['image_serv']; ?>" alt="<?= $service['title']; ?>">
										</div>
										<div class="txt-col">
											<div class="short-txt">
												<?= $service['description']; ?>
											</div>
											<template class="full-txt">
												<?= $service['description']; ?>
											</template>

											<a href="javascript:void(0);" class="default-btn" data-toggle="modal" data-target="#news-modal">Подробнее</a>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<!-- end content wrapper -->

	<!-- Сквозные блоки -->
<?php $blocks = get_field('blocks_contents');

if ( $blocks != '' ) : ?>
	<?php foreach ( $blocks as $one ) : ?>
		<?php if ($one['acf_fc_layout'] == 'our_clients' && $one['select_our_clients'] == 1) : ?>
			<?php get_template_part( 'template-parts/content', 'clients' ) ?>
		<?php elseif ( $one['acf_fc_layout'] == 'our_rewards' && $one['select_our_rewards'] == 1 ) : ?>
			<?php get_template_part( 'template-parts/content', 'rewards' ) ?>
		<?php elseif ( $one['acf_fc_layout'] == 'info_block' && $one['select_info'] == 1 ) : ?>
			<?php get_template_part( 'template-parts/content', 'info' ) ?>
		<?php elseif ( $one['acf_fc_layout'] == 'our_certificates' && $one['select_certificates'] == 1 ) : ?>
			<?php get_template_part( 'template-parts/content', 'certificates' ) ?>
		<?php endif; ?>

	<?php endforeach; ?>
<?php endif; ?>

	<!-- SERVICES POPUP -->
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

<?php get_footer(); ?>
