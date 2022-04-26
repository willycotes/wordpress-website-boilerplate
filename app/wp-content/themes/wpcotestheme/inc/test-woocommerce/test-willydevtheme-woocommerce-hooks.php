<?php
/**
 * Hooks wpcotestheme and woocommerce
 */

remove_action( 'wpcotestheme_main_top', 'wpcotestheme_breadcrumb', 10 );
remove_action( 'wpcotestheme_archive_main_top', 'wpcotestheme_breadcrumb', 10 );
remove_action( 'wpcotestheme_homepage_main_top', 'wpcotestheme_breadcrumb', 10 );
remove_action( 'wpcotestheme_single_post_loop_before', 'wpcotestheme_breadcrumb', 10 );
remove_action( 'wpcotestheme_page_loop_before', 'wpcotestheme_breadcrumb', 10 );
add_action( 'wpcotestheme_main_top', 'wpcotestheme_woocommerce_breadcrumb', 10 );
add_action( 'wpcotestheme_archive_main_top', 'wpcotestheme_woocommerce_breadcrumb', 10 );
add_action( 'wpcotestheme_homepage_main_top', 'wpcotestheme_woocommerce_breadcrumb', 10 );
add_action( 'wpcotestheme_single_post_loop_before', 'wpcotestheme_woocommerce_breadcrumb', 10 );
add_action( 'wpcotestheme_page_loop_before', 'wpcotestheme_woocommerce_breadcrumb', 10 );