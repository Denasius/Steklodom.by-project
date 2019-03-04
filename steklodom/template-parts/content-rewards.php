<section class="awards-slider container">
	<div class="row">
		<div class="col-xs-12">
		<?php if ( get_field('title_our_reward', 'option') ) : ?>
			<p class="heading"><?php the_field('title_our_reward', 'option') ?></p>
		<?php endif; ?>
		<?php if ( get_field('rewards', 'option') ) : ?>
			<div class="owl-carousel">
			<?php foreach ( get_field('rewards', 'option') as $image ) : ?>
				<div class="item">
					<img src="<?= $image['image_rewards']; ?>" alt="image">
				</div>
			<?php endforeach; ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</section>