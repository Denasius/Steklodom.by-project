<?php
if ( has_post_format( 'aside' )) {
  get_template_part('archive');
  exit;
}
?>

<?php get_header(); ?>
<?php $taxonomy = get_queried_object()->taxonomy; $term_id = get_queried_object()->term_id; $parent_id = get_queried_object()->parent ;?>
<!-- start breadcrumbs -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="breadcrumbs">
					<li><a href="<?= get_home_url(); ?>">Главная</a></li>
					<?php if ( $parent_id ) : ?>
						<li class="category_breadcrumbs"><a href="<?= get_category_link($parent_id); ?>"><?= str_replace('/', '', get_category_parents($parent_id)); ?></a></li>
					<?php endif; ?>
					<li class="last_breadcrumbs_element"><span><?php ucwords((single_cat_title())); ?></span></li>

				</ul>
			</div>
		</div>
	</div>
<!-- end breadcrumbs -->
<!-- start content wrapper -->
	<section class="catalog-page container">
		<div class="row">
			<div class="col-xs-12">
				<p class="heading"><?php single_cat_title(); ?></p>
				<div class="flex-parent">
					<?php if (category_description()) : ?>
						<p>
							<?php echo category_description(); ?>
						</p>
					<?php endif; ?>
					<?php if (get_field('order', $taxonomy . '_' . $term_id)) : ?>
						<?php foreach ( get_field('order', $taxonomy . '_' . $term_id) as $button ) : ?>
							<a href="<?= get_page_link(309); ?>" class="default-btn" data-order="button_order_popup"><?= $button['text_button'] ?></a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<?php get_sidebar(); ?>
			<main class="col-sm-8 col-lg-9">
				<!-- -->
				
				<?php 
					// получим ID текущей категории
					$current_cat_id = get_queried_object()->term_id; 
					$categories = get_categories(array(
						'parent'     => $current_cat_id,
						'orderby'      => 'name',
						'order'        => 'ASC',
						'hide_empty'   => 0,
						'hierarchical' => 1,
						//'number'       => 0, // сколько выводить?
						// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
					));	?>
					<?php if ( $categories ) : ?>
						<div class="row">
							<div class="col-xs-12 catalog-products">
								<?php foreach ( $categories as $cat ) : ?>
									<?php// print_r($cat); ?>
									<a href="<?= get_category_link( $cat->term_id ); ?>" class="catalog-card" id="<?= $cat->term_id ?>">

										<span class="img-wrapper">
											<?php if (get_field('image_subcategories', $cat->taxonomy . '_' . $cat->term_id)) : ?>
												<img src="<?= get_field('image_subcategories', $cat->taxonomy . '_' . $cat->term_id); ?>" alt="<?= $cat->name; ?>">
											<?php endif; ?>
										</span>
										<span class="link-wrapper"><b><?= $cat->name; ?></b></span>
									</a>
								<?php endforeach; ?>
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
					<?php elseif ( have_posts() ) : ?>
						<div class="row">
							<div class="col-xs-12 catalog-products">
							<?php while ( have_posts() ) : the_post(); ?>
							
								<a href="<?php the_permalink(); ?>" class="catalog-card" id="<?= $post->ID ?>"
									data-v-code="<?php
										if ( get_field('unique_id') ) {
											the_field('unique_id');
										}else{
											echo $post->ID;
										}
									?>"
									data-v-room="<?php if (get_field('room')) {
										the_field('room');
									}else{
										the_title();
									} ?>"
									data-v-purp="<?php if ( get_field('assignment') ) {
										the_field('assignment');
									}else{
										the_title();
									} ?>"
									data-v-color="<?php if ( get_field('color') ) {
										the_field('color');
									}else{
										the_title();
									} ?>"
									data-v-mnfct="<?php if ( get_field('manufacture') ) {
										the_field('manufacture');
									}else{
										the_title();
									} ?>">
									
									<span class="img-wrapper">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail('category-preview'); ?>
									<?php endif; ?>
									</span>
									<span class="link-wrapper"><b><?php the_title(); ?></b></span>
									
								</a>
								
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
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
					<?php endif; ?>
				<?php if (get_field('blocks', $taxonomy . '_' . $term_id)) : ?>
					<?php foreach ( get_field('blocks', $taxonomy . '_' . $term_id) as $blocks ) : ?>
						<?php if ( $blocks['acf_fc_layout'] == 'block_5' ) : ?>
							<div class="row">						
								<div class="col-xs-12">
									<p class="catalog-subheading"><?= $blocks['title'] ?></p>
									<div class="cards-wrapper">
										<?php foreach ( $blocks['elements'] as $block ) : ?>
											
												<a href="#" class="catalog-card">
													<span class="img-wrapper">
														<img src="<?= $block['image']; ?>" alt="<?= $block['name']; ?>">
													</span>
													<span class="link-wrapper"><b><?= $block['name']; ?></b></span>
												</a>
											
										<?php endforeach; ?>
									</div>
									
									<p class="text-row">
										<?= $blocks['description']; ?>
									</p>
								</div>
							</div>
						<?php endif; ?>

						<?php if ( $blocks['acf_fc_layout'] == 'block_3' ) : ?>
							<div class="row">
								<div class="col-xs-12">
									<p class="catalog-subheading"><?= $blocks['title'] ?></p>
								</div>
							</div>
							<div class="row kinds-wrapper">
								<?php foreach ( $blocks['elements'] as $block ) : ?>
									<div class="col-xs-6 col-lg-4 pr-7">
										<a href="javascript:void(0);" class="catalog-card">
											<span class="img-wrapper">
												<img src="<?= $block['image']; ?>" alt="<?= $block['name']; ?>">
											</span>
											<span class="link-wrapper"><b><?= $block['name']; ?></b></span>
										</a>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<p class="text-row">
										<?= $blocks['description']; ?>
									</p>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			
			</main>
		</div>
	</section>
<!-- end content wrapper -->


<?php get_footer(); ?>