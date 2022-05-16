<?php
/**
 * Template functions woocommerce
 */

if ( ! function_exists( 'wpcotestheme_woocommerce_breadcrumb' ) ) {
	function wpcotestheme_woocommerce_breadcrumb() {
		if ( !is_woocommerce() && !is_cart() && !is_checkout() ) {
			woocommerce_breadcrumb();
		}
	}
}
