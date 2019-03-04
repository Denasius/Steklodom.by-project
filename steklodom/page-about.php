<?php
/*
Template Name: О компании
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

<!-- start content wrapper -->
		<section class="about-page container">
			<div class="row">
				<div class="col-xs-12">
					<p class="heading"><?php the_title(); ?></p>

					<?php while( have_posts() ) : the_post();
                        the_content(); // выводим контент
                    endwhile; ?>
					
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
				</div>
			</div>
		</section>
	<!-- end content wrapper -->

<?php get_footer(); ?>