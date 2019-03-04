<?php
/*
Template Name: Страница контактов
*/
?>

<?php get_header(); ?>

<!-- start breadcrumbs -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="breadcrumbs">
					<li><a href="<?= get_home_url(); ?>">Главная</a></li>
					<li><span><?php ucfirst(the_title()); ?></span></li>
				</ul>
			</div>
		</div>
	</div>
<!-- end breadcrumbs -->

<section class="map-form contact-page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<p class="heading"><?php the_title(); ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 map">
					<div class="form-wrapper">
						<div class="txt-group">
							<?php if ( get_option('total_title_company') ) : ?>
								<p class="txt-heading"><?= get_option('total_title_company') ?></p>
							<?php endif; ?>
						</div>
						<div class="txt-group">
							<p>E-mail: <a href="mailto:<?php if (get_bloginfo('admin_email')) echo get_bloginfo('admin_email'); ?>"><?php if (get_bloginfo('admin_email')) echo get_bloginfo('admin_email'); ?></a></p>
						</div>
						<?php if ( get_option('working_time') ) : ?>
							<div class="txt-group">
								<p>
									<?php 
										$work_time = explode(":", get_option('working_time'), 2);
										echo $work_time[0] . '<br>' . $work_time[1];
									?>
								</p>
							</div>
						<?php endif; ?>
						<div class="txt-group">
							<p>
								<?php if ( get_option('display_address') ) : ?>
									<?php $address = explode(":", get_option('display_address')); ?>
									<?= $address[0] ?><br>
									<?= $address[1] ?>
								<?php endif; ?>
							</p>
						</div>
						<div class="txt-group">
							<p>
								Телефон:<br>
								<?php $vowels = array(" ", "-", "(", ")"); ?>
								<?php if ( get_option('phones_company') ) : ?>
									Velcom <a href="tel:<?= str_replace($vowels, "", get_option('phones_company'));?>"><?= get_option('phones_company');?></a><br>
								<?php endif ?>
								<?php if ( get_option('phones_company_2') ) : ?>
									MTS <a href="tel:<?= str_replace($vowels, "", get_option('phones_company_2'));?>"><?= get_option('phones_company_2');?></a><br>
								<?php endif ?>
								<?php if ( get_option('phones_company_3') ) : ?>
									Гор. <a href="tel:<?= str_replace($vowels, "", get_option('phones_company_3'));?>"><?= get_option('phones_company_3');?></a>
								<?php endif ?>
							</p>
						</div>
					</div>

					<div id="map"></div>

				</div>
			</div>
		</div>
	</section>
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

<?php get_footer('contact'); ?>