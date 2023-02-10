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
    ?>

  <form action="" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>
    
    <input type="submit" name="submit" value="Submit">
  </form>
  <?php
}
add_shortcode('contact_form', 'simple_website_form');
?>