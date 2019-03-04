jQuery(document).ready(function(){
	jQuery(function($){
    	jQuery('input[type="tel"]').mask("+375 (99) 999-99-99");
  	});

    jQuery('.home-slider .owl-carousel').owlCarousel({
        items:1,
        loop:true,
        margin:15,
        nav:true,
        navText: ["",""],
    });
    jQuery('.home-slider button.slide-left').on('click', function(){
        jQuery('.home-slider .owl-carousel .owl-prev').click();
    });
    jQuery('.home-slider button.slide-right').on('click', function(){
        jQuery('.home-slider .owl-carousel .owl-next').click();
    });

    jQuery('.catalog-slider .owl-carousel').owlCarousel({
        items:1,
        loop:true,
        margin:15,
        nav:true,
        autoplay: true,
        navText: ["",""],
    });

    jQuery('.projects-slider .owl-carousel').owlCarousel({
        items:1,
        loop:true,
        margin:60,
        nav:true,
        navText: ["",""],
        responsive:{
            0:{
                items:1
            },
            767:{
                items:2,
                autoplay: true
            },
            991:{
                items:3
            }
        }
    });

    jQuery('.customers-slider .owl-carousel').owlCarousel({
        items:5,
        loop:true,
        margin:50,
        nav:true,
        navText: ["",""],
        responsive:{
            0:{
                items:1
            },
            767:{
                items:3
            },
            991:{
                items:4,
                autoplay: true
            },
            1199:{
                items:5
            }
        }
    });

    jQuery('.awards-slider .owl-carousel').owlCarousel({
        items:4,
        loop:true,
        margin:140,
        nav:true,
        navText: ["",""],
        responsive:{
            0:{
                items:1
            },
            767:{
                items:3,
                autoplay: true
            },
            991:{
                items:4
            }
        }
    });

   jQuery('header').prepend('<div class="overlay"></div>');
    jQuery('.xs-dy-menu').on('click', function(){
        jQuery('.primary-menu .drop-down-menu, .overlay').addClass('active');
    });
    jQuery('.xs-st-menu').on('click', function(){
        jQuery('.right-column ul.pages-menu, .overlay').addClass('active');
    });
    jQuery('.overlay').on('click', function(){
        jQuery('.overlay,.primary-menu .drop-down-menu,.right-column ul.pages-menu').removeClass('active');
    });

    
    jQuery('.catalog-page aside .catalog .catalog-heading').on('click', function(){
        jQuery('.catalog-page aside .catalog>ul').toggleClass('active');
    });
    
    jQuery('.catalog-page main .catalog-products .catalog-card').on('click', function(){
        vPosition = jQuery(this);

        let
            vImg   = jQuery(this).children('.img-wrapper').children('img').attr('src'),
            vTitle = jQuery(this).children('.link-wrapper').children('b').text(),
            vCode  = jQuery(this).attr('data-v-code'),
            vRoom  = jQuery(this).attr('data-v-room'),
            vPurp  = jQuery(this).attr('data-v-purp'),
            vColor = jQuery(this).attr('data-v-color'),
            vMnfct = jQuery(this).attr('data-v-mnfct'),
            qty = jQuery('.catalog-page main .catalog-products').children().length;

        jQuery('#order-modal .left-col img').attr('src', vImg);
        jQuery('#order-modal .order-heading').text( vTitle);
        jQuery('#order-modal .v-code u').text(vCode);
        jQuery('#order-modal .v-room u').text(vRoom);
        jQuery('#order-modal .v-purp u').text(vPurp);
        jQuery('#order-modal .v-color u').text(vColor);
        jQuery('#order-modal .v-mnfct u').text(vMnfct);

        jQuery('#order-modal input[name="v_order_title"]').val(vTitle);
        jQuery('#order-modal input[name="v_img_src"]').val(vImg);
        jQuery('#order-modal input[name="v_code"]').val(vCode);
        jQuery('#order-modal input[name="v_room"]').val(vRoom);
        jQuery('#order-modal input[name="v_purp"]').val(vPurp);
        jQuery('#order-modal input[name="v_color"]').val(vColor);
        jQuery('#order-modal input[name="v_mnfct"]').val(vMnfct);

        if( vPosition.index() == (qty - qty) ) {
            jQuery('#order-modal .prev-product').addClass('hidden');
        }else{
            jQuery('#order-modal .prev-product').removeClass('hidden');
        }
        if( (vPosition.index() + 1) == qty ) {
            jQuery('#order-modal .next-product').addClass('hidden');
        }else{
            jQuery('#order-modal .next-product').removeClass('hidden');
        }

    });
    jQuery('#order-modal .prev-product').on('click', function(){
        let 
            qty = jQuery('.catalog-page main .catalog-products').children().length,
            n = vPosition.index() + 1;

        if ( ((qty - qty) + 2) == n) {
            jQuery('#order-modal .prev-product').addClass('hidden');
        }

        jQuery('#order-modal .next-product').removeClass('hidden');
        jQuery('#order-modal .close').click();
        setTimeout(function(){
            vPosition.prev('.catalog-card').click();
        }, 500);
    });
    jQuery('#order-modal .next-product').on('click', function(){
        let 
            qty = jQuery('.catalog-page main .catalog-products').children().length,
            n = vPosition.index() + 1;

        if (n == qty - 1) {
            jQuery('#order-modal .next-product').addClass('hidden');
        }
        jQuery('#order-modal .prev-product').removeClass('hidden');
        jQuery('#order-modal .close').click();
        setTimeout(function(){
            vPosition.next('.catalog-card').click();
        }, 500);
    });

    jQuery(".short-txt").text(function(i, text) {
        if (text.length >= 285) {
            text = text.substring(0, 285);
            var lastIndex = text.lastIndexOf(" ");       
            text = text.substring(0, lastIndex) + '...'; 
        }  

        $(this).text(text);
    });
    jQuery('.news-card .default-btn').on('click', function(){
        let
            newsImage = jQuery(this).parent('.txt-col').siblings('.img-col').children('img').attr('src'),
            newsTitle = jQuery(this).parents('.flex-parent').siblings('.news-heading').text(),
            newsText  = jQuery(this).siblings('.full-txt').html();

        jQuery('#news-modal .img-wrapper img').attr('src', newsImage);
        jQuery('#news-modal .news-popup-heading').text(newsTitle);
        jQuery('#news-modal .news-popup-full-txt').html(newsText);

    });

    jQuery('.certificate.owl-carousel').owlCarousel({
        items:4,
        loop:true,
        margin:30,
        nav:true,
        navText: ["",""],
        responsive:{
            0:{
                items:1
            },
            767:{
                items:3,
                autoplay: true
            },
            991:{
                items:4
            }
        }
    });

    jQuery('.about-page .certificate.owl-carousel .item span').on('click', function(){
        let imageSrc = jQuery(this).attr('data-src');
        jQuery('#certificate-modal .img-wrapper img').attr('src', imageSrc);
    });

    jQuery(".progects-short-txt").text(function(i, text) {
        if (text.length >= 430) {
            text = text.substring(0, 430);
            var lastIndex = text.lastIndexOf(" ");       
            text = text.substring(0, lastIndex) + '...'; 
        }  

        $(this).text(text);
    });


    $('form.steklodom_order_category').on('submit', function (e) {
        e.preventDefault();
        var form = $(this),
            action = form.attr('action');
        // Формирую переменные для отправки на сервер
        var formData = {
                wpUniqueKey: form.find('#id_steklodom_action_category').val(),
                contactName: form.find('[name="name"]').val(),
                contactEmail: form.find('[name="email"]').val(),
                contactPhone: form.find('[name="phone"]').val(),
                uniqueAttrProduct: form.find('[name="v_code"]').val(),
                productTitle: form.find('[name="v_order_title"]').val()
            }

        return $.ajax({
            type: 'POST',
            url: action,
            data: formData,
            beforeSend: function () {
                $('.category_button_order').hide();
                $('.gif_preloader').show();
            },
            error: function (request, errorStatus, errorThrown) {
                console.log(request);
                console.log(errorStatus);
                console.log(errorThrown);
                $('.category_button_order').show();
                $('.gif_preloader').hide();
                $('.steklodom_order_category').html('<p class="error-answer">Что то пошло не так. Приносим свои извенения. Попробуйте оформить заказ позже.</p>');
            },
            success: function (res) {
                
                $('.steklodom_order_category').html('<p class="success-answer">Спасибо за заявку. В ближайшее время с Вами свяжутся для уточнения деталей!</p>');
            }
        });
    });

    $('form#steklodom_order_page').on('submit', function (e) {
         e.preventDefault();
        var form = $(this),
            action = form.attr('action');
        // Формирую переменные для отправки на сервер
        var formData = {
                wpUniqueKey: form.find('#id_steklodom_action_order_page').val(),
                contactName: form.find('[name="name"]').val(),
                contactEmail: form.find('[name="email"]').val(),
                contactPhone: form.find('[name="phone"]').val(),
                contactMessage: form.find('[name="text"]').val(),
                productTitle: form.find('select').val()
            }

        return $.ajax({
            type: 'POST',
            url: action,
            data: formData,
            beforeSend: function () {
                $('.order_page_button_order').hide();
                $('#gif_preloader_order_page').show();
            },
            error: function (request, errorStatus, errorThrown) {
                console.log(request);
                console.log(errorStatus);
                console.log(errorThrown);
                $('.order_page_button_order').show();
                $('#gif_preloader_order_page').hide();
                $("#steklodom_order_page").trigger("reset");
                $('.error-message').css({"display":"block"});
            },
            success: function (res) {
                $('.order_page_button_order').show();
                $('#gif_preloader_order_page').hide();
                $("#steklodom_order_page").trigger("reset");
                $('html, body').stop().animate({scrollTop: 0}, 'slow');
                $('.success-message').css({"display":"block"});
            }
        });
    });

    $('.footer_contact_page').on('submit', function ( e ) {
        e.preventDefault();
        var form = $(this),
            action = form.attr('action');

        var formData = {
            wpUniqueKey: form.find('#id_steklodom_action_footer').val(),
            contactName: form.find('[name="name"]').val(),
            contactEmail: form.find('[name="email"]').val(),
            contactSubject: form.find('[name="subject"]').val(),
            contactMessage: form.find('[name="text"]').val()
        }

         return $.ajax({
            type: 'POST',
            url: action,
            data: formData,
            beforeSend: function () {
                $('.button_send_mail_footer').hide();
                $('#gif_preloader_footer').show();
            },
            error: function (request, errorStatus, errorThrown) {
                console.log(request);
                console.log(errorStatus);
                console.log(errorThrown);
                $('#gif_preloader_footer').hide();
                $(".footer_contact_page").trigger("reset");
                $('.error-message_footer').css({"display":"block"});
            },
            success: function () {
                $('#gif_preloader_footer').hide();
                $(".footer_contact_page").trigger("reset");
                $('.success-message_footer').css({"display":"block"});
            }
        });
    });
});



