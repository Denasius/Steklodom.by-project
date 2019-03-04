<section class="customers-slider container">
		<div class="row">
			<div class="col-xs-12">
			<?php if ( get_field('title_our_clients', 'option') ) : ?>
				<p class="heading"><?php the_field('title_our_clients', 'option') ?></p>
			<?php endif; ?>
			<?php if ( get_field('clients', 'option') ) : ?>
				<div class="owl-carousel">
				<?php foreach ( get_field('clients', 'option') as $image ) : ?>
					
					<div class="item">
						<a href="#">
							<img src="<?= $image['image']; ?>" alt="image">
						</a>
					</div>
				<?php endforeach; ?>
				</div>
			<?php endif; ?>
			</div>
		</div>
	</section>