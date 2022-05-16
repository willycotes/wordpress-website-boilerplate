<?php
/**
 * API register and config custom post type
 */

if ( ! defined( 'ABSPATH') ) {
  exit;
}

if ( ! class_exists( 'WPCotesTheme_Post_Type' ) ) {

  /**
   * Custom post type class 
   */
  class WPCotesTheme_Post_Type {

    /**
     * @var WP_Post_Type[] $post_types Array post types registered.
     */
    private static $post_types = array();

    /**
     * Register custom post type 
     * 
     * @example Fancypartys_Post_Type::register_post_type('news', 'news', array( 'menu_icon', 'dashicons-admin-site-alt3' ) );
     * 
     * @param string $post_type Post type name. Singular name.
     * 
     * @param string $label_post_type Name of the post type shown in the menu. Usually plural. Default is value of $labels['name']. First character uppercase
     */
    public static function register_post_type( string $post_type, string $label_post_type, array $args = array() ) {

      // formated
      $post_type = strtolower( $post_type );
      $label_post_type = ucfirst( $label_post_type );
  
      $labels = array(
        'name'                  => sprintf( __( '%s', 'fancypartys' ), $label_post_type ),
        'singular_name'         => sprintf( __( '%s', 'fancypartys' ), ucfirst( $post_type ) ),
        'menu_name'             => sprintf( __( '%s', 'fancypartys' ), $label_post_type ),
        'name_admin_bar'        => sprintf( __( '%s', 'fancypartys' ), $label_post_type ),
        'archives'              => __( 'Archives', 'fancypartys' ),
        'attributes'            => __( 'Attributes', 'fancypartys' ),
        'parent_item_colon'     => sprintf( __( 'Parent %s', 'fancypartys' ), $post_type ),
        'all_items'             => sprintf( __( 'All %s', 'fancypartys' ), $label_post_type ),
        'add_new_item'          => sprintf( __( 'Add new %s', 'fancypartys' ), $post_type ),
        'add_new'               => __( 'Add new', 'fancypartys' ),
        'new_item'              => sprintf( __( 'New %s', 'fancypartys' ), $post_type ),
        'edit_item'             => sprintf( __( 'Edit %s', 'fancypartys' ), $post_type ),
        'update_item'           => sprintf( __( 'Update %s', 'fancypartys' ), $post_type ),
        'view_item'             => sprintf( __( 'View %s', 'fancypartys' ), $post_type) ,
        'view_items'            => sprintf( __( 'View %s', 'fancypartys' ), $label_post_type ),
        'search_items'          => sprintf( __( 'Search %s', 'fancypartys' ), $label_post_type ),
        'not_found'             => __( 'Not found', 'fancypartys' ),
        'not_found_in_trash'    => __( 'Not Found in trash', 'fancypartys' ),
        'featured_image'        => __( 'Featured image', 'fancypartys' ),
        'set_featured_image'    => __( 'Set featured image', 'fancypartys' ),
        'remove_featured_image' => __( 'Remove featured image', 'fancypartys' ),
        'use_featured_image'    => __( 'Use featured image', 'fancypartys' ),
        'insert_into_item'      => sprintf( __( 'Insert into %s', 'fancypartys' ), $post_type ),
        'uploaded_to_this_item' => sprintf( __( 'Uploaded to this %s', 'fancypartys' ), $post_type ),
        'items_list'            => sprintf( __( '%s list', 'fancypartys' ), $label_post_type ),
        'items_list_navigation' => sprintf( __( '%s list navigation', 'fancypartys' ), $label_post_type ),
        'filter_items_list'     => sprintf( __( 'Filter %s list', 'fancypartys' ), $label_post_type ),
      );
      $rewrite = array(
        'slug'                  => sprintf( __( '%s', 'fancypartys' ), strtolower( $post_type ) ),
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
      );
      $default = array(
        'label'                 => sprintf( __( '%s', 'fancypartys' ), $label_post_type ),
        'description'           => sprintf( __( 'Custom post type %s', 'fancypartys' ), $post_type ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-post',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
      );

      $args = apply_filters( 'fancypartys_args_post_type', wp_parse_args( $args, $default ) );

      if ( register_post_type( $post_type, $args ) instanceof WP_Post_Type ) {
        self::$post_types[] = register_post_type( $post_type, $args );
        flush_rewrite_rules();
      }
    }

    /**
     * Get array of objects custom post types registered into theme
     * 
     * @return WP_Post_Type[]
     */
    public static function get_post_types() {
      return self::$post_types;
    }

    /**
     * Get array custom post types name
     */
    public static function get_post_types_name() {
      $post_types_name = array();

      if ( empty( self::$post_types ) ) {
        return;
      }

      foreach( self::$post_types as $post_type ) {
        $post_types_name[] = $post_type->name;
      }
      return $post_types_name;
    }
  }
}
