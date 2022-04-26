<?php
/**
 * wpcotestheme Class
 *
 * @package  wpcotestheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPCotesTheme' ) ) :

	/**
	 * The main wpcotestheme class
	 */
	class WPCotesTheme {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			// add_filter( 'is_active_sidebar', array( $this, 'deactivate_sidebar_wpcotestheme'), 10, 2 );
			add_action( 'init', array( $this, 'register_post_types' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 10 );
			add_action( 'wp_enqueue_scripts', array( $this, 'child_scripts' ), 30 ); // After WooCommerce.
			add_action( 'enqueue_block_assets', array( $this, 'block_assets' ) );
			add_filter( 'body_class', array( $this, 'body_classes' ) );
			add_filter( 'wp_page_menu_args', array( $this, 'page_menu_args' ) );
			add_filter( 'navigation_markup_template', array( $this, 'navigation_markup_template' ) );
			add_action( 'enqueue_embed_scripts', array( $this, 'print_embed_styles' ) );
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function setup() {
			/*
			 * Load Localization files.
			 *
			 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
			 */

			// Loads wp-content/languages/themes/wpcotestheme-it_IT.mo.
			load_theme_textdomain( 'wpcotestheme', trailingslashit( WP_LANG_DIR ) . 'themes' );

			// Loads wp-content/themes/child-theme-name/languages/it_IT.mo.
			load_theme_textdomain( 'wpcotestheme', get_stylesheet_directory() . '/languages' );

			// Loads wp-content/themes/wpcotestheme/languages/it_IT.mo.
			load_theme_textdomain( 'wpcotestheme', get_template_directory() . '/languages' );

			/**
			 * Add default posts and comments RSS feed links to head.
			 */
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );

			/**
			 * Enable support post formats
			 */
			add_theme_support( 
				'post-formats', 
				array(
					'aside',
					'image',
					'gallery',
					'video',
					'chat'
					) 
				);

			/**
			 * Enable support for site logo.
			 */
			add_theme_support(
				'custom-logo',
				apply_filters(
					'wpcotestheme_custom_logo_args',
					array(
						'height'      => 110,
						'width'       => 470,
						'flex-width'  => true,
						'flex-height' => true,
						'unlink-homepage-logo' => false
					)
				)
			);

			/**
			 * Enable excerpt page and post
			 */
			add_post_type_support( 'page', array( 'excerpt' ) );
			add_post_type_support( 'post', array( 'excerpt', 'post-formats' ) );
			/**
			 * Register menu locations.
			 */
			register_nav_menus(
				apply_filters(
					'wpcotestheme_register_nav_menus',
					array(
						'primary'   => __( 'Primary Menu', 'wpcotestheme' ),
						'secondary' => __( 'Secondary Menu', 'wpcotestheme' ),
						'handheld'  => __( 'Handheld Menu', 'wpcotestheme' ),
					)
				)
			);

			/*
			 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
			 * to output valid HTML5.
			 */
			add_theme_support(
				'html5',
				apply_filters(
					'wpcotestheme_html5_args',
					array(
						'search-form',
						'comment-form',
						'comment-list',
						'gallery',
						'caption',
						'widgets',
						'style',
						'script',
					)
				)
			);

			/**
			 * Declare support for title theme feature.
			 */
			add_theme_support( 'title-tag' );

			/**
			 * Declare support for selective refreshing of widgets.
			 */
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for Block Styles.
			 */
			add_theme_support( 'wp-block-styles' );

			/**
			 * Add support for full and wide align images.
			 */
			add_theme_support( 'align-wide' );

			/**
			 * Add support for editor styles.
			 */
			add_theme_support( 'editor-styles' );

			/**
			 * Add support for editor font sizes.
			 */
			add_theme_support(
				'editor-font-sizes',
				array(
					array(
						'name' => __( 'Small', 'wpcotestheme' ),
						'size' => 14,
						'slug' => 'small',
					),
					array(
						'name' => __( 'Normal', 'wpcotestheme' ),
						'size' => 16,
						'slug' => 'normal',
					),
					array(
						'name' => __( 'Medium', 'wpcotestheme' ),
						'size' => 23,
						'slug' => 'medium',
					),
					array(
						'name' => __( 'Large', 'wpcotestheme' ),
						'size' => 26,
						'slug' => 'large',
					),
					array(
						'name' => __( 'Huge', 'wpcotestheme' ),
						'size' => 37,
						'slug' => 'huge',
					),
				)
			);

			/**
			 * Enqueue editor styles.
			 */
			add_editor_style( 'assets/css/base/gutenberg-editor.css' );

			/**
			 * Add support for responsive embedded content.
			 */
			add_theme_support( 'responsive-embeds' );
		}

		/**
		 * Register widget area.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function widgets_init() {
			$sidebar_args['sidebar'] = array(
				'name'        => __( 'Sidebar', 'wpcotestheme' ),
				'id'          => 'sidebar',
				'description' => '',
			);

			$sidebar_args['header'] = array(
				'name'        => __( 'Below Header', 'wpcotestheme' ),
				'id'          => 'header-1',
				'description' => __( 'Widgets added to this region will appear beneath the header and above the main content.', 'wpcotestheme' ),
			);

			$rows    = intval( apply_filters( 'wpcotestheme_footer_widget_rows', 1 ) );
			$regions = intval( apply_filters( 'wpcotestheme_footer_widget_columns', 4 ) );

			for ( $row = 1; $row <= $rows; $row++ ) {
				for ( $region = 1; $region <= $regions; $region++ ) {
					$footer_n = $region + $regions * ( $row - 1 ); // Defines footer sidebar ID.
					$footer   = sprintf( 'footer_%d', $footer_n );

					if ( 1 === $rows ) {
						/* translators: 1: column number */
						$footer_region_name = sprintf( __( 'Footer Column %1$d', 'wpcotestheme' ), $region );

						/* translators: 1: column number */
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of the footer.', 'wpcotestheme' ), $region );
					} else {
						/* translators: 1: row number, 2: column number */
						$footer_region_name = sprintf( __( 'Footer Row %1$d - Column %2$d', 'wpcotestheme' ), $row, $region );

						/* translators: 1: column number, 2: row number */
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of footer row %2$d.', 'wpcotestheme' ), $region, $row );
					}

					$sidebar_args[ $footer ] = array(
						'name'        => $footer_region_name,
						'id'          => sprintf( 'footer-%d', $footer_n ),
						'description' => $footer_region_description,
					);
				}
			}

			$sidebar_args = apply_filters( 'wpcotestheme_sidebar_args', $sidebar_args );

			foreach ( $sidebar_args as $sidebar => $args ) {
				$widget_tags = array(
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<span class="gamma widget-title">',
					'after_title'   => '</span>',
				);

				/**
				 * Dynamically generated filter hooks. Allow changing widget wrapper and title tags. See the list below.
				 *
				 * 'wpcotestheme_header_widget_tags'
				 * 'wpcotestheme_sidebar_widget_tags'
				 *
				 * 'wpcotestheme_footer_1_widget_tags'
				 * 'wpcotestheme_footer_2_widget_tags'
				 * 'wpcotestheme_footer_3_widget_tags'
				 * 'wpcotestheme_footer_4_widget_tags'
				 */
				$filter_hook = sprintf( 'wpcotestheme_%s_widget_tags', $sidebar );
				$widget_tags = apply_filters( $filter_hook, $widget_tags );

				if ( is_array( $widget_tags ) ) {
					register_sidebar( $args + $widget_tags );
				}
			}
		}

		/**
		 * Deactivate sidebar in pages
		 */
		// public function deactivate_sidebar_wpcotestheme( $is_active_sidebar, $index ) {
		// 	if ( is_page() && 'sidebar' === $index ) {
		// 		return false;
		// 	}

		// 	return $is_active_sidebar;
		// }

		/**
		 * Register Custom Post Type
		 */
		public function register_post_types() {
			WPCotesTheme_Post_Type::register_post_type( 'new', 'news', array( 'menu_icon' => 'dashicons-admin-site-alt3' ) );
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @since  1.0.0
		 */
		public function scripts() {
			global $wpcotestheme_version;

			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			/**
			 * Styles
			 */
			wp_enqueue_style( 'wpcotestheme-style', get_template_directory_uri() . '/style' . $suffix . '.css', array(), $wpcotestheme_version );

			wp_enqueue_style( 'wpcotestheme-icons', get_template_directory_uri() . '/assets/css/base/icons' . $suffix . '.css', array(), $wpcotestheme_version );

			/**
			 * Scripts
			 */
			wp_enqueue_script( 'wpcotestheme-navigation', get_template_directory_uri() . '/assets/js/navigation' . $suffix . '.js', array(), $wpcotestheme_version, true );

			if ( has_nav_menu( 'handheld' ) ) {
				$wpcotestheme_l10n = array(
					'expand'   => __( 'Expand child menu', 'wpcotestheme' ),
					'collapse' => __( 'Collapse child menu', 'wpcotestheme' ),
				);

				wp_localize_script( 'wpcotestheme-navigation', 'wpcotesthemeScreenReaderText', $wpcotestheme_l10n );
			}

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Enqueue block assets.
		 *
		 * @since 2.5.0
		 */
		public function block_assets() {
			global $wpcotestheme_version;

			// Styles.
			wp_enqueue_style( 'wpcotestheme-gutenberg-blocks', get_template_directory_uri() . '/assets/css/base/gutenberg-blocks.css', array(), $wpcotestheme_version );
		}

		/**
		 * Enqueue child theme stylesheet.
		 * A separate function is required as the child theme css needs to be enqueued _after_ the parent theme
		 * primary css and the separate WooCommerce css.
		 *
		 * @since  1.5.3
		 */
		public function child_scripts() {
			if ( is_child_theme() ) {
				$child_theme = wp_get_theme( get_stylesheet() );
				wp_enqueue_style( 'wpcotestheme-child-style', get_stylesheet_uri(), array(), $child_theme->get( 'Version' ) );
			}
		}

		/**
		 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
		 *
		 * @param array $args Configuration arguments.
		 * @return array
		 */
		public function page_menu_args( $args ) {
			$args['show_home'] = true;
			return $args;
		}

		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 * @return array
		 */
		public function body_classes( $classes ) {
			// add class sidebar activate
			if ( is_active_sidebar( 'sidebar' ) ) {
				$classes[] = 'wpcotestheme-sidebar';
			}

			// If our main sidebar doesn't contain widgets, adjust the layout to be full-width.
			if ( ! is_active_sidebar( 'sidebar' ) ) {
				$classes[] = 'wpcotestheme-full-width-content';
			}

			// Remove sidebar body class in templates full width.
			if ( is_page_template( 'layouts/fullwidth.php' ) || is_page_template( 'layouts/clean-fullwidth.php' ) ) {
				// Remove `wpcotestheme-sidebar` body class.
				$key = array_search( 'wpcotestheme-sidebar', $classes, true );
				if ( false !== $key ) {
					unset( $classes[ $key ] );
				}
			}

			// Adds a class to blogs with more than 1 published author.
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			// Add class when Secondary Navigation is in use.
			if ( has_nav_menu( 'secondary' ) ) {
				$classes[] = 'wpcotestheme-secondary-navigation';
			}

			// Add class if align-wide is supported.
			if ( current_theme_supports( 'align-wide' ) ) {
				$classes[] = 'wpcotestheme-align-wide';
			}

			return $classes;
		}

		/**
		 * Custom navigation markup template hooked into `navigation_markup_template` filter hook.
		 * 
		 * Se le agergó un id a la etiqueta nav, y el aria-label se agrego uno personalizado.
		 */
		public function navigation_markup_template() {
			$template  = '<nav id="post-navigation" class="navigation %1$s" role="navigation" aria-label="' . esc_html__( 'Post Navigation', 'wpcotestheme' ) . '">';
			$template .= '<h2 class="screen-reader-text">%2$s</h2>';
			$template .= '<div class="nav-links">%3$s</div>';
			$template .= '</nav>';

			return apply_filters( 'wpcotestheme_navigation_markup_template', $template );
		}
	
		/**
		 * Add styles for embeds
		 */
		public function print_embed_styles() {
			global $wpcotestheme_version;

			wp_enqueue_style( 'source-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,700,900', array(), $wpcotestheme_version );
			$accent_color     = get_theme_mod( 'wpcotestheme_accent_color' );
			$background_color = wpcotestheme_get_content_background_color();
			?>
			<style type="text/css">
				.wp-embed {
					padding: 2.618em !important;
					border: 0 !important;
					border-radius: 3px !important;
					font-family: "Source Sans Pro", "Open Sans", sans-serif !important;
					background-color: <?php echo esc_html( wpcotestheme_adjust_color_brightness( $background_color, -7 ) ); ?> !important;
				}

				.wp-embed .wp-embed-featured-image {
					margin-bottom: 2.618em;
				}

				.wp-embed .wp-embed-featured-image img,
				.wp-embed .wp-embed-featured-image.square {
					min-width: 100%;
					margin-bottom: .618em;
				}

				a.wc-embed-button {
					padding: .857em 1.387em !important;
					font-weight: 600;
					background-color: <?php echo esc_attr( $accent_color ); ?>;
					color: #fff !important;
					border: 0 !important;
					line-height: 1;
					border-radius: 0 !important;
					box-shadow:
						inset 0 -1px 0 rgba(#000,.3);
				}

				a.wc-embed-button + a.wc-embed-button {
					background-color: #60646c;
				}
			</style>
			<?php
		}
	}
endif;

return new WPCotesTheme();
