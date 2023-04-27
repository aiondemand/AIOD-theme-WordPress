<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ai4europe
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ai4europe_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ai4europe_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ai4europe_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ai4europe_pingback_header' );


//Send Contact
add_action("wp_ajax_contact_form", "contact_form");
add_action("wp_ajax_nopriv_contact_form", "contact_form");
function contact_form(){

	unset($_POST['action']);
	foreach($_POST as $item){
		if(!$item){
			wp_send_json(['status' => 400, 'message' => 'Please, fill in all required fields.']);
		}
	}

	//Enviar E-mail
	$email_content = 'A new message from ' . get_home_url() . ' on ' . date('d-m-Y H:i:s') . '<br><br>';
	$email_content .= '<b>First Name:<b> '.$_POST['first-name'].'<br>';
	$email_content .= '<b>Last Name:<b> '.$_POST['last-name'].'<br>';
	$email_content .= '<b>Email:<b> '.$_POST['email'].'<br>';
	$email_content .= '<b>Message:<b> '.$_POST['message'].'<br>';
	
	if(wp_mail(get_field('contact_form_email', 'option'), 'AI4Europe | Contact Message', $email_content)){
		wp_send_json(['status' => 200, 'message' => 'Your contact message was sent successfully']);
	}
    
    wp_send_json(['status' => 400, 'message' => 'An error has occurred. Please try again later']);

}
