<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package steklodom
 */

?>

<section class="map-form">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 map">

				<div class="form-wrapper">
					<p class="contact-heading">Контакты</p>
					<p class="sub-heading">Остались вопросы?</p>
					<form class="footer_contact_page" action="<?php echo admin_url('admin-ajax.php?action=contact_from_footer') ?>">
						<div class="form-group f1">
							<input type="text" name="name" placeholder="Представьтесь, пожалуйста" required>
						</div>
						<div class="form-group f2">
							<input type="email" name="email" placeholder="Электронная почта" required>
						</div>
						<div class="form-group f3">
							<input type="text" name="subject" placeholder="Тема" required>
						</div>
						<div class="form-group f4">
							<textarea placeholder="Сообщение" name="text" required></textarea>
						</div>
						<?php wp_nonce_field('steclodom_name_unique_footer', 'id_steklodom_action_footer');?>
						<button class="default-btn button_send_mail_footer">Отправить</button>
						<img style="max-width: 64px; margin: 0 auto;" src="<?= get_template_directory_uri() ?>/assets/img/icons/2.gif" alt="Загрузка" id="gif_preloader_footer">
						<p class="error-message_footer">Что то пошло не так. Приносим свои извенения. Попробуйте оформить заказ позже.</p>
						<p class="success-message_footer">Спасибо за заявку. В ближайшее время с Вами свяжутся для уточнения деталей!</p>
					</form>
					<p class="addr-heading">Где нас искать?</p>
					<p class="addr">
						<?php if ( get_option('display_address') ) : ?>
							<?php $address = explode(":", get_option('display_address')); ?>
							<?= $address[0] ?><br>
							<?= $address[1] ?>
						<?php endif; ?>
					</p>
				</div>

				<div id="map"></div>

			</div>
		</div>
	</div>
</section>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="footer-menu">
					<div class="logo">
						<?php the_custom_logo(); ?>
						<p>"<?php if (get_bloginfo('description')) echo get_bloginfo('description') ; ?>"<br><?php if (get_option('additional_description')) echo get_option('additional_description'); ?></p>
					</div>
					<div class="list-wrapper">
						<p class="list-heading">Контакты</p>
						<?php $vowels = array(" ", "-", "(", ")"); ?>
						<ul>
							<?php if ( get_option('phones_company') ) : ?>
								<li><a href="tel:<?= str_replace($vowels, "", get_option('phones_company'));?>"><?= get_option('phones_company');?></a></li>
							<?php endif; ?>

							<?php if ( get_option('phones_company_2') ) : ?>
								<li><a href="tel:<?= str_replace($vowels, "", get_option('phones_company_2'));?>"><?= get_option('phones_company_2');?></a></li>
							<?php endif; ?>

							<?php if ( get_option('phones_company_3') ) : ?>
								<li><a href="tel:<?= str_replace($vowels, "", get_option('phones_company_3'));?>"><?= get_option('phones_company_3');?></a></li>
							<?php endif; ?>

							<?php if ( get_option('working_time') ) : ?>
								<li><?= get_option('working_time');?></li>
							<?php endif; ?>

							<?php if ( get_option('day_off') ) : ?>
								<li><?= get_option('day_off');?></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="list-wrapper">
						<p class="list-heading">Меню</p>
						<?php
							wp_nav_menu( array(
								'theme_location'  	=> 'menu-footer',
								'menu_class'		=> ''
							));
						?>
					</div>
					<div class="list-wrapper">
						<p class="list-heading">Каталог</p>
						<?php
							wp_nav_menu( array(
								'theme_location'  	=> 'menu-footer-catalog',
								'menu_class'		=> ''
							));
						?>
					</div>
					
						<div class="payments-wrapper">

							<div>
								<?php dynamic_sidebar('payments_methods_icons') ?>
							</div>
						</div>
				
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<p>Copyright &copy; 2010-<?= date('Y'); ?> <?= get_bloginfo('description'); ?> - All rights reserved</p>
	</div>
</footer>

<?php wp_footer(); ?>

<script type="text/javascript">
	ymaps.ready(unit);
    function unit(){ 
        var myMapContact = new ymaps.Map("map", {
            center:[53.93643013524141,27.453879177185055],
            zoom:16,
            controls: ['smallMapDefaultSet'],
        }); 
        jQuery(window).resize(function () {
            if (jQuery(window).width() < 992) {
                myMapContact.setCenter([53.93618957063989,27.4623335]);
            }
        });
        if (jQuery(window).width() < 992) {
            myMapContact.setCenter([53.93618957063989,27.4623335]);
        }
        myMapContact.controls
            .remove('searchControl')
            .remove('typeSelector')
            .remove('fullscreenControl')
            .remove('rulerControl')
            .remove('trafficControl')
            .remove('zoomControl')
            .remove('geolocationControl');

        var myPinContact = new ymaps.GeoObjectCollection({}, {
            iconLayout: 'default#image',
            iconImageHref: '<?= get_template_directory_uri(); ?>/assets/img/icons/pin.png',
            iconImageSize: [53, 75],
            iconImageOffset: [-30, -90]
        });		
		var myPlc1 = new ymaps.Placemark([53.93618957063989,27.4623335], {
           	hintContent: 'Офис на Ржавецкой:<br> Республика Беларусь,<br> г. Минск, ул. Ржавецкая, д.3, пом. 159',
            balloonContent: 'Офис на Ржавецкой:<br> Республика Беларусь,<br> г. Минск, ул. Ржавецкая, д.3, пом. 159',
        }); 
		
        myPinContact.add(myPlc1);
        myMapContact.geoObjects.add(myPinContact);
    }
</script>
</body>
</html>
