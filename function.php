<?php

// Custom page template for the private page
function custom_page_template( $page_template ) {
    if ( is_page( 'private-page' ) ) {
        $page_template = dirname( __FILE__ ) . '/private-page-template.php';
    } elseif ( is_page( 'contact-page' ) ) {
        $page_template = dirname( __FILE__ ) . '/contact-page-template.php';
    }
    return $page_template;
}
add_filter( 'page_template', 'custom_page_template' );

// Contact form submission
function simple_website_form() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'email' => $email,
                'message' => $message
            ),
            array(
                '%s',
                '%s',
                '%s'
            )
        );
    }
}
add_shortcode('contact_form', 'simple_website_form');

?>
