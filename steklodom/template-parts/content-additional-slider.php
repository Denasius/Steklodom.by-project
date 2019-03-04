<div class="owl-carousel">	
	<?php foreach ( get_field('second_slider') as $second_slider ) : ?>		
		<div class="item">
			<div class="flex-parent">						
				<div class="left-image" style="background:url(<?= $second_slider['image_left']; ?>);">
					<p><?= $second_slider['text']; ?></p>
					<a href="<?= $second_slider['link_catalog']; ?>">Перейти в каталог ></a>
				</div>
				<div class="right-image">
					<img src="<?= $second_slider['image_right']; ?>" alt="<?= $second_slider['text']; ?>">
				</div>
			</div>
		</div>	
	<?php endforeach; ?>	
</div>