<?php if ( get_field('certificates_title', 'option') ) : ?>
	<p class="heading"><?php the_field('certificates_title', 'option') ?></p>
<?php endif; ?>
<?php if ( get_field('image_c', 'option') ) : ?>
	<div class="owl-carousel certificate">
		<?php foreach ( get_field('image_c', 'option') as $image ) : ?>
			<?php if ( $image['img'] ) : ?>
				<div class="item">
					<span data-src="<?= $image['img'] ?>" data-toggle="modal" data-target="#certificate-modal">
						<img src="<?= $image['img'] ?>" alt="image">
					</span>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
<!-- CERTIFICATES POPUP -->
	<div id="certificate-modal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">

		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal"></button>
		        	<div class="img-wrapper">
		        		<img src="" alt="image">
		        	</div>
		      	</div>
		    </div>
	  	</div>
	</div>