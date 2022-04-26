<?php 
/**
 * Plugin Name: Cluster services
 * Description: Cluster de Servicios
 */

 //add register scripts services

add_action('wp_enqueue_scripts', 'register_scripts_cluster_services');

if ( !function_exists('register_scripts_cluster_services') ) {
    function register_scripts_cluster_services() {
        if ( ! class_exists( 'WooCommerce' ) ) {return;}
        if ( is_front_page() ) {
            wp_enqueue_style( 'cluster-services-css', plugins_url() . '/cluster-services/assets/css/cluster-services.css', array(), '1.1', 'all' );
            wp_enqueue_script( 'cluster-services-js', plugins_url() . '/cluster-services/assets/js/cluster-services.js', array('tfo-library-js'), '1.1', true );
            wp_localize_script( 'cluster-services-js', 'cluster_services_object', array(
                'nonce' => wp_create_nonce('cluster_services_action_nonce'),
                'url' => admin_url('admin-ajax.php'),
                'action' => 'services_action_ajax',
            ) );
        }
    }
}

add_action('wpcotestheme_loop_before', 'cluster_services_front_page', 25);

if ( !function_exists('cluster_services_front_page')) {
    function cluster_services_front_page() {
        if ( ! class_exists( 'WooCommerce' )) {return;}
        if ( is_front_page() ) {
            ?>
                <div class="cluster-services__container">
                    <div class="header-content">
                        <h2 class="main-title">¿Quieres un Servicio Personalizado? </h2>
                        <p class="main-description">Elaboramos artículos personalizados acordes al tema que desees, para que nada te detenga, así como también te ofrecemos decoraciones con globos, arreglos, bouquet y mucho mas...</p>
                    </div>
                    <span class="subtitle" style="">Nuestros servicios destacados</span>
                    <ul class="cluster-services">
                        <!-- ajax data -->
                    </ul>
                </div>
            <?php
        }
    }
}

add_action('wp_ajax_nopriv_services_action_ajax', 'cluster_services_ajax');
add_action('wp_ajax_services_action_ajax', 'cluster_services_ajax');

if ( !function_exists('cluster_services_ajax') ) {
    function cluster_services_ajax() {
            if ( !isset( $_POST['nonce']) && !wp_verify_nonce( $_POST['nonce'],'cluster_services_action_nonce' ) ) {
                return;
            }        
            $cache_key = 'cluster-services';
            $array = wp_cache_get( $cache_key, 'product' );

            if ( ! $array ) {//si cache no existe
                if ( get_transient( $cache_key ) ) {//si existe transient
                    $array = get_transient( $cache_key );
                    wp_cache_set( $cache_key, $array, 'product' );
                }
                else { //si no existe transient
                }
            }   
            $array = [];
            $args = array(
                'post_type' => 'product',
                'parent' => 0,
                'hierarchical' => 1,
                'limit' => -1,
                'taxonomy' => 'servicios',
                'hide_empty' => false,
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
            wp_send_json($array);
            exit();
    }
}