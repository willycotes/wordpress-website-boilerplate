<?php 
/**
 * Plugin Name: Cluster Categories
 * Description: Cluster de Categorias principales
 */

 //add register scripts categories

add_action('wp_enqueue_scripts', 'register_scripts_cluster_categories');

if ( !function_exists('register_scripts_cluster_categories') ) {
    function register_scripts_cluster_categories() {
        if ( ! class_exists( 'WooCommerce' ) ) {return;}
        if ( is_front_page() ) {
            wp_enqueue_style( 'cluster-categories-css', plugins_url() . '/cluster-categories/assets/css/cluster-categories.css', array(), '1.1', 'all' );
            wp_enqueue_script( 'cluster-categories-js', plugins_url() . '/cluster-categories/assets/js/cluster-categories.js', array('tfo-library-js'), '1.1', true );
            wp_localize_script( 'cluster-categories-js', 'cluster_categories_object', array(
                'nonce' => wp_create_nonce('cluster_categories_action_nonce'),
                'url' => admin_url('admin-ajax.php'),
                'action' => 'categories_action_ajax',
            ) );
        }
    }
}

add_action('wpcotestheme_loop_before', 'cluster_categories_front_page', 20);

if ( !function_exists('cluster_categories_front_page')) {
    function cluster_categories_front_page() {
        if ( ! class_exists( 'WooCommerce' )) {return;}
        if ( is_front_page() ) {
            ob_start();
            ?>
            <div class="cluster-categories__container">
                <div class="header-content">
                    <h1 class="main-title">Tienda Online de Artículos para Fiesta en Panamá</h1>
                    <p class="main-description">"Bienvenidos a tu <span class="mark">Tienda de Fiesta Online</span> donde podrás conseguir todo lo que necesitas, rápido y fácil desde la comodidad de tu hogar".</p>
                </div>
            <span class="subtitle" style="">¿Que tenemos para ti?</span>
                <ul class="cluster-categories">
                   <!-- datos ajax -->
                </ul>
            </div>
            <?php
            $output = ob_get_clean();
            echo $output;
            // woocommerce_output_product_categories( $args );
        }
        
    }
}
add_action('wp_ajax_nopriv_categories_action_ajax', 'cluster_categories_ajax');
add_action('wp_ajax_categories_action_ajax', 'cluster_categories_ajax');

if ( !function_exists('cluster_categories_ajax') ) {
    function cluster_categories_ajax() {
            if ( !isset( $_POST['nonce']) && !wp_verify_nonce( $_POST['nonce'],'cluster_categories_action_nonce' ) ) {
                return;
            }    
            $cache_key = 'cluster-categories';
            $array = wp_cache_get( $cache_key, 'product' );

            if ( ! $array ) {//si cache no existe
                if ( get_transient( $cache_key ) ) {//si existe transient
                    $array = get_transient( $cache_key );
                    wp_cache_set( $cache_key, $array, 'product' );
                }
                else { //si no existe transient
                    $array = [];
                    $args = array(
                        'post_type' => 'product',
                        'parent' => 0,
                        'hierarchical' => 1,
                        'limit' => -1,
                        'taxonomy' => 'product_cat',
                        'exclude' => array( 15 ) //exclude: uncategory
                        // 'hide_empty' => false,
                    );
                    $terms = get_terms($args);
                    foreach ($terms as $term) {
                        $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true );
                        $image_src = wp_get_attachment_image_url($thumbnail_id, array(416, 416));
                        $array[] = array(
                            'name' => wp_strip_all_tags($term->name),
                            'description' => wp_strip_all_tags($term->description),
                            'url' => esc_url(get_category_link($term)),
                            'src' => esc_url($image_src)
                        );
                    }
                    if ( $cache_key ) {
                        wp_cache_set( $cache_key, $array, 'product' );
                        set_transient( $cache_key, $array );
                    }
                }
            }
        wp_send_json($array);
        exit();
    }
}
?>