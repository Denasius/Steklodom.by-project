<div class="product-wrapper <?php if ( has_post_format( 'aside' ) ) echo 'product-aside-post' ?>">
	<div class="left-col">
		<?php
			if ( has_post_thumbnail() ) {
				$img_post_url = the_post_thumbnail();
			}else{
				$img_post_url = '<img src="https://picsum.photos/449/452" alt="{the_title()}">';
			}
		?>
		<?php echo $img_post_url; ?>
	</div>

	<div class="right-col right-description">
		<p class="order-heading"><?php the_title(); ?></p>
		<div class="product-description-text">
			<?php the_content(); ?>
		</div>
		</div>
	
	</div>
</div>