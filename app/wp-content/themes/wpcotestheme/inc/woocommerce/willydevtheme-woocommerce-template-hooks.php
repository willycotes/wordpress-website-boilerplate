<?php
/**
 * wpcotestheme WooCommerce hooks
 *
 * @package wpcotestheme
 */

/**
 * Homepage
 *
 * @see  wpcotestheme_product_categories()
 * @see  wpcotestheme_recent_products()
 * @see  wpcotestheme_featured_products()
 * @see  wpcotestheme_popular_products()
 * @see  wpcotestheme_on_sale_products()
 * @see  wpcotestheme_best_selling_products()
 */
add_action( 'wpcotestheme_shop', 'wpcotestheme_product_categories', 20 );
add_action( 'wpcotestheme_shop', 'wpcotestheme_recent_products', 30 );
add_action( 'wpcotestheme_shop', 'wpcotestheme_featured_products', 40 );
add_action( 'wpcotestheme_shop', 'wpcotestheme_popular_products', 50 );
add_action( 'wpcotestheme_shop', 'wpcotestheme_on_sale_products', 60 );
add_action( 'wpcotestheme_shop', 'wpcotestheme_best_selling_products', 70 );

/**
 * Layout
 *
 * @see  wpcotestheme_before_content()
 * @see  wpcotestheme_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  wpcotestheme_shop_messages()
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_before_main_content', 'wpcotestheme_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'wpcotestheme_after_content', 10 );
add_action( 'wpcotestheme_content_top', 'wpcotestheme_shop_messages', 15 );
add_action( 'wpcotestheme_before_content', 'woocommerce_breadcrumb', 10 );

add_action( 'woocommerce_after_shop_loop', 'wpcotestheme_sorting_wrapper', 9 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 30 );
add_action( 'woocommerce_after_shop_loop', 'wpcotestheme_sorting_wrapper_close', 31 );

add_action( 'woocommerce_before_shop_loop', 'wpcotestheme_sorting_wrapper', 9 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'wpcotestheme_woocommerce_pagination', 30 );
add_action( 'woocommerce_before_shop_loop', 'wpcotestheme_sorting_wrapper_close', 31 );

add_action( 'wpcotestheme_footer', 'wpcotestheme_handheld_footer_bar', 999 );

/**
 * Products
 *
 * @see wpcotestheme_edit_post_link()
 * @see wpcotestheme_upsell_display()
 * @see wpcotestheme_single_product_pagination()
 * @see wpcotestheme_sticky_single_add_to_cart()
 */
add_action( 'woocommerce_single_product_summary', 'wpcotestheme_edit_post_link', 60 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'wpcotestheme_upsell_display', 15 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6 );

add_action( 'woocommerce_after_single_product_summary', 'wpcotestheme_single_product_pagination', 30 );
add_action( 'wpcotestheme_after_footer', 'wpcotestheme_sticky_single_add_to_cart', 999 );

/**
 * Header
 *
 * @see wpcotestheme_product_search()
 * @see wpcotestheme_header_cart()
 */
add_action( 'wpcotestheme_header', 'wpcotestheme_product_search', 40 );
add_action( 'wpcotestheme_header', 'wpcotestheme_header_cart', 60 );

/**
 * Cart fragment
 *
 * @see wpcotestheme_cart_link_fragment()
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'wpcotestheme_cart_link_fragment' );

/**
 * Integrations
 *
 * @see wpcotestheme_woocommerce_brands_archive()
 * @see wpcotestheme_woocommerce_brands_single()
 * @see wpcotestheme_woocommerce_brands_homepage_section()
 */
if ( class_exists( 'WC_Brands' ) ) {
	add_action( 'woocommerce_archive_description', 'wpcotestheme_woocommerce_brands_archive', 5 );
	add_action( 'woocommerce_single_product_summary', 'wpcotestheme_woocommerce_brands_single', 4 );
	add_action( 'wpcotestheme_shop', 'wpcotestheme_woocommerce_brands_homepage_section', 80 );
}
