<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package steklodom
 */

get_header();

?>
<!-- Главный слайдер -->
<?php if ( is_front_page() ) : ?>
<?php $query_slider = new WP_Query(array(
	'category_name' 	=> get_theme_mod('steklodom_home_category'),
	'posts_per_page' 	=> 10
)); ?>


<?php if ( $query_slider->have_posts() ) : ?>
<?php $cat = $query_slider->get_queried_object();?>
<section class="home-slider" style="background-image: url(<?= get_field('main_slider_bg', $cat) ?>)">
	<button class="slide-left"></button>
	<button class="slide-right"></button>
	<div class="container">
		<div class="row">			
			<div class="col-xs-12">
				<div class="owl-carousel">
				<?php while ( $query_slider->have_posts() ) : $query_slider->the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'slider' ) ?>					
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- Дополнительный слайдер -->
<?php $query_additional_slider = new WP_Query(array(
	'category_name' 	=> get_theme_mod('steklodom_additional_slider'),
	'posts_per_page' 	=> 10
)); ?>
<?php if ( $query_additional_slider->have_posts() ) : ?>
<section class="catalog-slider container">
	<div class="row">
		<div class="col-xs-12">
			<div class="owl-carousel">
			<?php while ( $query_additional_slider->have_posts() ) : $query_additional_slider->the_post() ?>
				<?php get_template_part( 'template-parts/content', 'additional-slider' ); ?>				
			<?php endwhile; ?>
			
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<!-- Каталог -->
<?php if ( get_field('blocks') ) : ?>
	<section class="home-catalog container">
		<div class="row">
			<div class="col-xs-12">
				<p class="heading">Каталог</p>
				<div class="cards-wrapper">
				<?php foreach ( get_field('blocks') as $block ) : ?>
					<?php if ($block['acf_fc_layout'] == 'features_block') : ?>
						<div class="card">
							<div class="img-col">
								<img src="<?= $block['image']; ?>" alt="<?= $block['title']; ?>">
							</div>
							<div class="txt-col">
								<p><?= $block['title']; ?></p>
								<a href="<?= $block['link']; ?>">Перейти в каталог ></a>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<!-- Наши проекты -->
<?php $query_projects = new WP_Query(array(
	'category_name' 	=> get_theme_mod('steklodom_projects'),
	'posts_per_page' 	=> 10
)); ?>
<?php $cat = $query_projects->get_queried_object()->term_id;?>
<?php if ( $query_projects->have_posts() ) : ?>
<section class="projects-slider">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<p class="heading w">Наши проекты</p>
				<div class="owl-carousel">
				<?php while ( $query_projects->have_posts() ) : $query_projects->the_post(); ?>
					<div class="item">
						<?php
							if ( has_post_thumbnail() ) {
								$img_post_url = get_the_post_thumbnail_url();
							}else{
								$img_post_url = 'https://picsum.photos/348/350';
							}
						?>
						<a href="<?php the_permalink(); ?>">
							<img src="<?= $img_post_url ?>" alt="<?php the_title(); ?>">
						</a>
					</div>
				<?php endwhile; ?>
				
				</div>
				<div class="text-center">
					<a href="<?= get_term_link($cat); ?>">Перейти к проектам ></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<!-- Сквозные блоки -->
<?php $blocks = get_field('blocks_contents');

if ( $blocks != '' ) : ?>
	<?php foreach ( $blocks as $one ) : ?>
		<?php if ($one['acf_fc_layout'] == 'our_clients' && $one['select_our_clients'] == 1) : ?>
			<?php get_template_part( 'template-parts/content', 'clients' ) ?>
		<?php elseif ( $one['acf_fc_layout'] == 'our_rewards' && $one['select_our_rewards'] == 1 ) : ?>
			<?php get_template_part( 'template-parts/content', 'rewards' ) ?>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>

<?php endif; ?> <!-- end if front page  -->
<?php get_footer(); ?>