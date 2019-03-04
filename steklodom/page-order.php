<?php
/*
Template Name: Страница заказа
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
	<section class="order-page container">
		<div class="row">
			<div class="col-xs-12">
				<p class="heading">Оформление заявки</p>
				<p class="error-message">Что то пошло не так. Приносим свои извенения. Попробуйте оформить заказ позже</p>
				<p class="success-message">Спасибо за заявку. В ближайшее время с Вами свяжутся для уточнения деталей!</p>
				<div class="order-wrapper">
					<form autocomplete="off" action="<?php echo admin_url('admin-ajax.php?action=order_from_order_page') ?>" id="steklodom_order_page">
						<div class="flex-parent product-wrapper">
							<label>Товар</label>
							<?php
								wp_nav_menu( array(
									'theme_location'  	=> 'menu-order-page',
									'menu_class'		=> 'product',
									'walker'			=> new Walker_Nav_Menu_Dropdown(),
									'items_wrap'     => '<div class="select-menu-order-page"><select class="form-control">%3$s</select></div>'
								));
							?>
						</div>
						
						<div class="flex-parent">
							<label for="name">Имя*</label>
							<div>
								<input type="text" id="name" name="name" required>
							</div>
						</div>
						<div class="flex-parent">
							<label for="email">E-mail</label>
							<div>
								<input type="email" id="email" name="email">
							</div>
						</div>
						<div class="flex-parent">
							<label for="tel">Телефон*</label>
							<div>
								<input type="tel" id="tel" name="phone">
							</div>
						</div>
						<div class="textarea-group">
							<label for="message">Пожелания / вопросы</label>
							<textarea id="message" name="text"></textarea>
						</div>
						<?php wp_nonce_field('steclodom_name_unique_order_page', 'id_steklodom_action_order_page');?>
						<div class="text-center">
							<button type="submit" class="default-btn order_page_button_order">Оформить заявку</button>
							<img style="max-width: 64px; margin: 0 auto;" src="<?= get_template_directory_uri() ?>/assets/img/icons/2.gif" alt="Загрузка" id="gif_preloader_order_page">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
<!-- end content wrapper -->

<?php get_footer(); ?>