<?php
/**
 * wpcotestheme hooks
 *
 * @package wpcotestheme
 */

/**
 * General
 *
 * @see  wpcotestheme_header_widget_region()
 */
add_action( 'wpcotestheme_before_content', 'wpcotestheme_primary_navigation', 10 );
add_action( 'wpcotestheme_before_content', 'wpcotestheme_header_widget_region', 20 );

/**
 * Header
 */
add_action( 'wpcotestheme_header', 'wpcotestheme_skip_links', 10 );
add_action( 'wpcotestheme_header', 'wpcotestheme_site_title_or_logo', 20 );

/**
 * Footer
 *
 * @see  wpcotestheme_footer_widgets()
 * @see  wpcotestheme_credit()
 */
add_action( 'wpcotestheme_footer', 'wpcotestheme_footer_widgets', 10 );
add_action( 'wpcotestheme_footer', 'wpcotestheme_credit', 20 );

/**
 * Posts default
 * 
 * @source /index.php
 * @source /template-parts/content/content.php
 * 
 * @see wpcotestheme_post_header
 * @see wpcotestheme_post_content
 */

// add_action( 'wpcotestheme_main_top', 'wpcotestheme_homepage_header', 10 );
// add_action( 'wpcotestheme_homepage_header_bottom', 'wpcotestheme_homepage_description', 10 );
add_action( 'wpcotestheme_main_top', 'wpcotestheme_breadcrumb', 10 );
add_action( 'wpcotestheme_main_top', 'wpcotestheme_homepage_header_hero', 20 );
add_action( 'wpcotestheme_homepage_header_hero_bottom', 'wpcotestheme_homepage_description', 10 );
add_action( 'wpcotestheme_main_top', 'wpcotestheme_archive_header', 20 );

add_action( 'wpcotestheme_content', 'wpcotestheme_post_header', 10 );
add_action( 'wpcotestheme_content', 'wpcotestheme_post_content', 10 );
add_action( 'wpcotestheme_content', 'wpcotestheme_post_nav', 10 );

add_action( 'wpcotestheme_loop_after', 'wpcotestheme_paging_nav', 10 );

/**
 * Homepage blog
 * 
 * Homepage blog page used post format
 *
 * @source /home.php
 *
 * @see  wpcotestheme_homepage_header()
 * @see  wpcotestheme_homepage_header_hero()
 * @see wpcotestheme_homepage_description()
 * @see  wpcotestheme_paging_nav()
 */

add_action( 'wpcotestheme_homepage_main_top', 'wpcotestheme_breadcrumb', 10 );
// add_action( 'wpcotestheme_main_top', 'wpcotestheme_homepage_header', 10 );
add_action( 'wpcotestheme_homepage_main_top', 'wpcotestheme_homepage_header_hero', 20 );
add_action( 'wpcotestheme_homepage_header_hero_bottom', 'wpcotestheme_homepage_description', 10 );

add_action( 'wpcotestheme_homepage_loop_after', 'wpcotestheme_paging_nav', 10 );

/**
 * Archive pages
 * 
 * @source /archive.php
 */
add_action( 'wpcotestheme_archive_main_top', 'wpcotestheme_breadcrumb', 10 );
add_action( 'wpcotestheme_archive_main_top', 'wpcotestheme_archive_header', 20 );
add_action( 'wpcotestheme_archive_loop_after', 'wpcotestheme_paging_nav', 10 );

/**
 * Post excerpt is default post format standard.
 * 
 * This excerpt template is includes in the home, archive and search pages.
 *
 * @source /template-parts/excerpt/excerpt.php
 */
add_action( 'wpcotestheme_post_excerpt', 'wpcotestheme_post_excerpt_header', 10 );
add_action( 'wpcotestheme_post_excerpt', 'wpcotestheme_post_excerpt_content', 10 );

add_action( 'wpcotestheme_post_excerpt_header_top', 'wpcotestheme_post_thumbnail', 10 );
add_action( 'wpcotestheme_post_excerpt_header_bottom', 'wpcotestheme_post_taxonomy', 10 );

/**
 * Search page
 * 
 * @source /search.php
 */
add_action( 'wpcotestheme_search_loop_after', 'wpcotestheme_paging_nav', 10 );

/**
 * Single post
 * 
 * @source /single.php
 * 
 * @see  wpcotestheme_display_comments()
 */
add_action( 'wpcotestheme_single_post_loop_before', 'wpcotestheme_breadcrumb', 10 );
add_action( 'wpcotestheme_single_post', 'wpcotestheme_single_post_header', 10 );
add_action( 'wpcotestheme_single_post', 'wpcotestheme_single_post_content', 20 );
add_action( 'wpcotestheme_single_post', 'wpcotestheme_edit_post_link', 30 );
add_action( 'wpcotestheme_single_post', 'wpcotestheme_post_nav', 40 );
add_action( 'wpcotestheme_single_post', 'wpcotestheme_display_comments', 50 );

add_action( 'wpcotestheme_single_post_header_bottom', 'wpcotestheme_post_taxonomy', 10 );
add_action( 'wpcotestheme_single_post_header_bottom', 'wpcotestheme_post_thumbnail', 10 );
add_action( 'wpcotestheme_single_post_header_bottom', 'wpcotestheme_the_excerpt', 10 );
add_action( 'wpcotestheme_single_post_header_bottom', 'wpcotestheme_post_meta', 10 );

/**
 * Pages
 *
 * @see  wpcotestheme_page_header()
 * @see  wpcotestheme_page_content()
 * @see  wpcotestheme_display_comments()
 */
add_action( 'wpcotestheme_page_loop_before', 'wpcotestheme_breadcrumb', 10 );
add_action( 'wpcotestheme_page', 'wpcotestheme_page_header', 10 );
add_action( 'wpcotestheme_page', 'wpcotestheme_page_content', 20 );
add_action( 'wpcotestheme_page', 'wpcotestheme_edit_post_link', 30 );
add_action( 'wpcotestheme_page', 'wpcotestheme_display_comments', 40 );

/**
 * Frontpage
 * 
 * @see wpcotestheme_frontpage_header()
 * @see wpcotestheme_frontpage_content()
 */
add_action('wpcotestheme_content_frontpage', 'wpcotestheme_frontpage_header', 10);
add_action('wpcotestheme_content_frontpage', 'wpcotestheme_frontpage_content', 20);

add_action( 'wpcotestheme_frontpage_header_bottom', 'wpcotestheme_the_excerpt', 10 );
