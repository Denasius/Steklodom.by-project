<?php
/**
* Обработчик форм
*/
// Форма со страницы категорий
add_action('wp_ajax_order_from_category', 'order_from_category');
add_action('wp_ajax_nopriv_order_from_category', 'order_from_category');

// Форма со страницы заказа
add_action('wp_ajax_order_from_order_page', 'order_from_order_page');
add_action('wp_ajax_nopriv_order_from_order_page', 'order_from_order_page');

// Форма футер
add_action('wp_ajax_contact_from_footer', 'contact_from_footer');
add_action('wp_ajax_nopriv_contact_from_footer', 'contact_from_footer');

function order_from_category()
{
	if ( isset($_POST['wpUniqueKey']) ) {
		$contactName = !empty($_POST['contactName']) ? htmlspecialchars( $_POST['contactName'] ) : '';
		$contactEmail = !empty($_POST['contactEmail']) ? htmlspecialchars($_POST['contactEmail']) : '';
		$contactPhone = !empty($_POST['contactPhone']) ? htmlspecialchars($_POST['contactPhone']) : '';
		$uniqueAttrProduct = $_POST['uniqueAttrProduct'];
		$productTitle = htmlspecialchars($_POST['productTitle']);
		
		$to = get_bloginfo('admin_email');
	    $subject = 'Письмо с заявкой с сайта ' . get_bloginfo('name');
	    $message = "Заказчик {$contactName} оставил заявку. \nEmail - {$contactEmail} \nТелефон - {$contactPhone} \nТовар - {$productTitle} \nАтрибут товара - {$uniqueAttrProduct}";

	    // удалить фильтры, которые могут изменять заголовок $headers
	    remove_all_filters( 'wp_mail_from' );
	    remove_all_filters( 'wp_mail_from_name' );

	    wp_mail( $to, $subject, $message );
	    wp_die();
	}
}

function order_from_order_page()
{
	if ( isset($_POST['wpUniqueKey']) ) {
		$contactName = !empty($_POST['contactName']) ? htmlspecialchars( $_POST['contactName'] ) : '';
		$contactEmail = !empty($_POST['contactEmail']) ? htmlspecialchars($_POST['contactEmail']) : '';
		$contactPhone = !empty($_POST['contactPhone']) ? htmlspecialchars($_POST['contactPhone']) : '';
		$contactMessage = !empty($_POST['contactMessage']) ? htmlspecialchars($_POST['contactMessage']) : '';
		$productTitle = htmlspecialchars($_POST['productTitle']);
		
		$to = get_bloginfo('admin_email');
	    $subject = 'Письмо с заявкой с сайта ' . get_bloginfo('name');
	    $message = "Заказчик {$contactName} оставил заявку. \nEmail - {$contactEmail} \nТелефон - {$contactPhone} \nТовар - {$productTitle} \nСообщение - {$contactMessage}";

	    // удалить фильтры, которые могут изменять заголовок $headers
	    remove_all_filters( 'wp_mail_from' );
	    remove_all_filters( 'wp_mail_from_name' );

	    wp_mail( $to, $subject, $message );
	    wp_die();
	}
}

function contact_from_footer()
{
	if ( isset($_POST['wpUniqueKey']) ) {
		$contactName = !empty($_POST['contactName']) ? htmlspecialchars( $_POST['contactName'] ) : '';
		$contactEmail = !empty($_POST['contactEmail']) ? htmlspecialchars($_POST['contactEmail']) : '';
		$contactSubject = !empty($_POST['contactSubject']) ? htmlspecialchars($_POST['contactSubject']) : '';
		$contactMessage = !empty($_POST['contactMessage']) ? htmlspecialchars($_POST['contactMessage']) : '';
		
		
		$to = get_bloginfo('admin_email');
	    $subject = 'Письмо с заявкой с сайта ' . get_bloginfo('name');
	    $message = "Заказчик {$contactName} оставил сообщение. \nEmail - {$contactEmail} \nТема - {$contactSubject} \nСообщение - {$contactMessage}";

	    // удалить фильтры, которые могут изменять заголовок $headers
	    remove_all_filters( 'wp_mail_from' );
	    remove_all_filters( 'wp_mail_from_name' );

	    wp_mail( $to, $subject, $message );
	    wp_die();
	}
}