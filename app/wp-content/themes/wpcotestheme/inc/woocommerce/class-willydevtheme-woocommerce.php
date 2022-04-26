<?php
/**
 * wpcotestheme WooCommerce Class
 *
 * @package  wpcotestheme
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPCotesTheme_WooCommerce' ) ) :

	/**
	 * The wpcotestheme WooCommerce Integration class
	 */
	class WPCotesTheme_WooCommerce {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_filter( 'body_class', array( $this, 'woocommerce_body_class' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'woocommerce_scripts' ), 20 );
			add_filter( 'woocommerce_output_related_products_args', array( $this, 'related_products_args' ) );
			add_filter( 'woocommerce_product_thumbnails_columns', array( $this, 'thumbnail_columns' ) );
			
			// Instead of loading Core CSS files, we only register the font families.
			add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
			add_filter( 'wp_enqueue_scripts', array( $this, 'add_core_fonts' ), 130 );
			// add_filter( 'woocommerce_breadcrumb_defaults', array( $this, 'change_breadcrumb_delimiter' ) );
		}

		/**
		 * Sets up theme defaults and registers support for various WooCommerce features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 *
		 * @since 2.4.0
		 * @return void
		 */
		public function setup() {
			add_theme_support(
				'woocommerce',
				apply_filters(
					'wpcotestheme_woocommerce_args',
					array(
						'single_image_width'    => 416,
						'thumbnail_image_width' => 324,
						'product_grid'          => array(
							'default_columns' => 3,
							'default_rows'    => 4,
							'min_columns'     => 1,
							'max_columns'     => 6,
							'min_rows'        => 1,
						),
					)
				)
			);

			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );

			/**
			 * Add 'wpcotestheme_woocommerce_setup' action.
			 *
			 * @since  2.4.0
			 */
			do_action( 'wpcotestheme_woocommerce_setup' );
		}

		/**
		 * Add CSS in <head> to register WooCommerce Core fonts.
		 *
		 * @since 3.4.0
		 * @return void
		 */
		public function add_core_fonts() {
			$fonts_url = plugins_url( '/woocommerce/assets/fonts/' );
			wp_add_inline_style(
				'wpcotestheme-woocommerce-style',
				'@font-face {
				font-family: star;
				src: url(' . $fonts_url . 'star.eot);
				src:
					url(' . $fonts_url . 'star.eot?#iefix) format("embedded-opentype"),
					url(' . $fonts_url . 'star.woff) format("woff"),
					url(' . $fonts_url . 'star.ttf) format("truetype"),
					url(' . $fonts_url . 'star.svg#star) format("svg");
				font-weight: 400;
				font-style: normal;
			}
			@font-face {
				font-family: WooCommerce;
				src: url(' . $fonts_url . 'WooCommerce.eot);
				src:
					url(' . $fonts_url . 'WooCommerce.eot?#iefix) format("embedded-opentype"),
					url(' . $fonts_url . 'WooCommerce.woff) format("woff"),
					url(' . $fonts_url . 'WooCommerce.ttf) format("truetype"),
					url(' . $fonts_url . 'WooCommerce.svg#WooCommerce) format("svg");
				font-weight: 400;
				font-style: normal;
			}'
			);
		}

		/**
		 * Add WooCommerce specific classes to the body tag
		 *
		 * @param  array $classes css classes applied to the body tag.
		 * @return array $classes modified to include 'woocommerce-active' class
		 */
		public function woocommerce_body_class( $classes ) {
			$classes[] = 'woocommerce-active';

			// Remove `no-wc-breadcrumb` body class.
			// $key = array_search( 'no-wc-breadcrumb', $classes, true );

			// if ( false !== $key ) {
			// 	unset( $classes[ $key ] );
			// }

			return $classes;
		}

		/**
		 * WooCommerce specific scripts & stylesheets
		 *
		 * @since 1.0.0
		 */
		public function woocommerce_scripts() {
			global $wpcotestheme_version;

			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_style( 'wpcotestheme-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce/woocommerce.css', array( 'wpcotestheme-style', 'wpcotestheme-icons' ), $wpcotestheme_version );
			wp_style_add_data( 'wpcotestheme-woocommerce-style', 'rtl', 'replace' );

			wp_register_script( 'wpcotestheme-header-cart', get_template_directory_uri() . '/assets/js/woocommerce/header-cart' . $suffix . '.js', array(), $wpcotestheme_version, true );
			wp_enqueue_script( 'wpcotestheme-header-cart' );

			wp_enqueue_script( 'wpcotestheme-handheld-footer-bar', get_template_directory_uri() . '/assets/js/woocommerce/footer' . $suffix . '.js', array(), $wpcotestheme_version, true );

			if ( ! class_exists( 'WPCotesTheme_Sticky_Add_to_Cart' ) && is_product() ) {
				wp_register_script( 'wpcotestheme-sticky-add-to-cart', get_template_directory_uri() . '/assets/js/woocommerce/sticky-add-to-cart' . $suffix . '.js', array(), $wpcotestheme_version, true );
			}
		}

		/**
		 * Related Products Args
		 *
		 * @param  array $args related products args.
		 * @since 1.0.0
		 * @return  array $args related products args
		 */
		public function related_products_args( $args ) {
			$args = apply_filters(
				'wpcotestheme_related_products_args',
				array(
					'posts_per_page' => 3,
					'columns'        => 3,
				)
			);

			return $args;
		}

		/**
		 * Product gallery thumbnail columns
		 *
		 * @return integer number of columns
		 * @since  1.0.0
		 */
		public function thumbnail_columns() {
			$columns = 4;

			if ( ! is_active_sidebar( 'sidebar' ) ) {
				$columns = 5;
			}

			return intval( apply_filters( 'wpcotestheme_product_thumbnail_columns', $columns ) );
		}

		/**
		 * Remove the breadcrumb delimiter
		 *
		 * @param  array $defaults The breadcrumb defaults.
		 * @return array           The breadcrumb defaults.
		 * @since 2.2.0
		 */
		// public function change_breadcrumb_delimiter( $defaults ) {
		// 	$defaults['delimiter']   = '<span class="breadcrumb-separator"> / </span>';
		// 	$defaults['wrap_before'] = '<div class="wpcotestheme-breadcrumb"><div class="col-full"><nav class="woocommerce-breadcrumb" aria-label="' . esc_attr__( 'breadcrumbs', 'wpcotestheme' ) . '">';
		// 	$defaults['wrap_after']  = '</nav></div></div>';
		// 	return $defaults;
		// }

		/**
		 * Add "Includes" meta to parent cart items.
		 * Displayed only on handheld/mobile screens.
		 *
		 * @since  2.3.4
		 *
		 * @param  array $group_mode_data Group mode data.
		 * @return array
		 */
		// public function bundles_group_mode_options_data( $group_mode_data ) {
		// 	$group_mode_data['parent']['features'][] = 'parent_cart_item_meta';

		// 	return $group_mode_data;
		// }
	}

endif;

return new wpcotestheme_WooCommerce();
