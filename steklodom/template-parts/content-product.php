<div class="product-wrapper">
	<div class="left-col">
		<?php if (has_post_thumbnail()) the_post_thumbnail(); ?>
	</div>
	<div class="right-col">
		<p class="order-heading"><?php the_title(); ?></p>
		<small>Есть вопросы по продукту?<br>Наши специалисты Вам помогут!</small>
		<div class="phones">
			<?php $vowels = array(" ", "-", "(", ")"); ?>
			<?php if ( get_option('phones_company') ) : ?>
				<a href="tel:<?= str_replace($vowels, "", get_option('phones_company'));?>"><?= get_option('phones_company');?></a><br>
			<?php endif; ?>
			<?php if ( get_option('phones_company_2') ) : ?>
				<a href="tel:<?= str_replace($vowels, "", get_option('phones_company_2'));?>"><?= get_option('phones_company');?></a><br>
			<?php endif; ?>
			<?php if ( get_option('phones_company_3') ) : ?>
				<a href="tel:<?= str_replace($vowels, "", get_option('phones_company_3'));?>"><?= get_option('phones_company');?></a>
			<?php endif; ?>
		</div>
		<div class="order-info">
			<div class="flex-parent v-code">
				<b>Артикул</b>
				<u><?php if (get_field('unique_id')) the_field('unique_id'); ?></u>
			</div>
			<div class="flex-parent v-room">
				<b>Комната</b>
				<u><?php if (get_field('room')) the_field('room'); ?></u>
				
			</div>
			<div class="flex-parent v-purp">
				<b>Назначение</b>
				<u><?php if (get_field('assignment')) the_field('assignment'); ?></u>
			
			</div>
			<div class="flex-parent v-color">
				<b>Цвет</b>
				<u><?php if (get_field('color')) the_field('color'); ?></u>
				
			</div>
			<div class="flex-parent v-mnfct">
				<b>Производитель</b>
				<u><?php if (get_field('manufacture')) the_field('manufacture'); ?></u>
				
			</div>
		</div>
		<form method="post" action="<?php echo admin_url('admin-ajax.php?action=order_from_category') ?>" class="form_order steklodom_order_category">
			<input type="text" name="name" class="name" placeholder="Имя" required>
			<input type="text" name="email" class="email" placeholder="Email">
			<input type="tel" name="phone" class="phone" placeholder="Телефон" required>
			<!-- поля заполняются соответствующими данными ( см. js/scripts.js #134-140 ) -->
			<input type="hidden" name="v_order_title" value="<?= the_title() ?>">
			<input type="hidden" name="v_code" value="<?php if (get_field('unique_id')) the_field('unique_id'); ?>">
			<input type="hidden" name="v_room" value="<?php if (get_field('room')) the_field('room'); ?>">
			<input type="hidden" name="v_purp" value="<?php if (get_field('assignment')) the_field('assignment'); ?>">
			<input type="hidden" name="v_color" value="<?php if (get_field('color')) the_field('color'); ?>">
			<input type="hidden" name="v_mnfct" value="<?php if (get_field('manufacture')) the_field('manufacture'); ?>">
			<?php wp_nonce_field('steclodom_name_unique_category', 'id_steklodom_action_category'); ?>

			<button class="default-btn category_button_order">Заказать</button><img style="max-width: 64px; margin: 0 auto;" src="<?= get_template_directory_uri() ?>/assets/img/icons/2.gif" alt="Загрузка" class="gif_preloader">
		</form>
	</div>
</div>