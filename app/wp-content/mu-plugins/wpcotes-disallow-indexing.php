<?php
/*
Plugin Name:  Disallow Indexing
Author:       Willy Cotes
Author URI:   https://willycotes.dev
Text Domain:  wpcotesframework
License:      MIT License
*/
return;
if ( ! defined('DISALLOW_INDEXING') || DISALLOW_INDEXING !== true ) {
    return;
}

add_action( 'pre_option_blog_public', '__return_zero' );

add_action( 'admin_init', function () {
    if ( ! apply_filters( 'wpcotes_disallow_indexing_admin_notice', true ) ) {
        return;
    }

    add_action( 'admin_notices', function () {
        $message = sprintf(
            __( '%1$s Search engine indexing has been discouraged because the current environment is %2$s.', 'wpcotesframework' ),
            '<strong>WPCotesFramework:</strong>',
            '<code>'.WP_ENVIRONMENT_TYPE.'</code>'
        );
        echo "<div class='notice notice-warning'><p>{$message}</p></div>";
    });
});
