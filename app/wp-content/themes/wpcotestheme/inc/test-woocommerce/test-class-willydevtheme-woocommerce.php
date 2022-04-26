<?php
/**
 * Main class woocommerce support theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

if ( ! class_exists( 'WPCotesTheme_Woocommerce') ) {
	/**
	 * The wpcotestheme WooCommerce Integration class
	 */
	class WPCotesTheme_Woocommerce {
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'woocommerce_setup' ) );
			add_action( 'widgets_init', array( $this, 'register_sidebar_woocommerce' ) );
			add_filter( 'is_active_sidebar', array( $this, 'deactivate_wpcotestheme_sidebar' ), 10, 2 );
			add_filter( 'is_active_sidebar', array( $this, 'deactivate_woocommerce_sidebar' ), 10, 2 );
			add_action( 'woocommerce_sidebar', array( $this, 'woocommerce_sidebar' ) );
			add_filter( 'body_class', array( $this, 'woocommerce_body_class' ) );
		}
		
		/**
		 * Add setup and supports woocommerce
		 * 
		 */
		public function woocommerce_setup() {
			add_theme_support(
				'woocommerce',
				apply_filters(
					'wpcotestheme_woocommerce_args',
					array(
						'single_image_width'    => 416,
						'thumbnail_image_width' => 324,
						'product_grid'          => array(
							'default_columns' => 4,
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
		 * Deactivate sidebar wpcotestheme
		 */
		public function deactivate_wpcotestheme_sidebar( $is_active_sidebar, $index ) {
			if ( is_woocommerce() && 'sidebar' === $index || is_cart() && 'sidebar' === $index || is_checkout() && 'sidebar' === $index  ) {
				return false;
			}

			return $is_active_sidebar;
		}

		/**
		 * Register new sidebar woocommerce
		 */
		function register_sidebar_woocommerce() {
			register_sidebar(
				array(
					'name' 					=> __( 'Woocommerce Sidebar', 'brandketings' ),
					'id'						=> 'woocommerce-sidebar',
					'description' 	=> __( 'Add widgets in woocommerce pages.' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<span class="gamma widget-title">',
					'after_title'   => '</span>',
				)
			);
		}

		/**
		 * Deactivate sidebar woocommerce in pages
		 */
		public function deactivate_woocommerce_sidebar( $is_active_sidebar, $index ) {
			if ( is_product() && 'woocommerce-sidebar' === $index ) {
				return false;
			}

			return $is_active_sidebar;
		}

		/**
		 * Add sidebar template in woocommerce pages
		 */
		public function woocommerce_sidebar() {
			if ( ! is_active_sidebar( 'woocommerce-sidebar' ) ) {
				return;
			}
				?>
				<div id="secondary" class="woocommerce-widget-area" role="complementary">

					<?php dynamic_sidebar( 'woocommerce-sidebar' ); ?>

				</div><!-- #secondary -->
				<?php
		}

		/**
		 * Add body class woocommerce support
		 */
		public function woocommerce_body_class( $classes ) {
			$classes = (array) $classes;
			$classes[] = 'woocommerce-active';
			if ( is_woocommerce() && is_active_sidebar( 'woocommerce-sidebar' ) ) {
				$classes[] = 'woocommerce-sidebar';
				// Remove `wpcotestheme-full-width-content` body class.
				$key = array_search( 'wpcotestheme-full-width-content', $classes, true );
				if ( false !== $key ) {
					unset( $classes[ $key ] );
				}
			}
			return $classes;
		}
	}
}

return new WPCotesTheme_Woocommerce();
