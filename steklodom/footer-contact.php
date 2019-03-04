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