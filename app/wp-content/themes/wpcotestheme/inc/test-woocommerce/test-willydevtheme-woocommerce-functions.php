<?php
/**
 * Functions helper woocommerce support theme
 */

/**
 * function conditional product archive woocomemrce
 */
function wpcotestheme_is_product_archive() {
	if ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) {
		return true;
	} else {
		return false;
	}
}
