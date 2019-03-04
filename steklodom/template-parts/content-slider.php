<div class="row">			
	<div class="col-xs-12">
		<div class="owl-carousel">
		<?php foreach ( get_field('slider') as $slider ) : ?>
			<div class="item">
				<div class="wrapper">
					<p class="slide-heading"><?php
						$text_title = explode(" ", $slider['title'], 2);
						echo $text_title[0];?><br><?php
						echo $text_title[1];
					?></p>
					<?php $short_description = explode(".", $slider['short_description']); ?>
					<p class="middle-text"><?php if ($short_description[0]) echo $short_description[0] . '<br />'; ?><?php if ($short_description[1]) echo $short_description[1] . '<br />'; ?><?php if ($short_description[3]) echo $short_description[3] . '<br />'; ?></p>
					<?= $slider['canditional']; ?>
					<a href="<?= $slider['link']; ?>" class="default-btn">Подробнее</a>
				</div>
			</div>					
		<?php endforeach; ?>
		</div>
	</div>
</div>