<?php 
/**
 * Plugin Name: Cluster Information
 * Description: Cluster de Informaciones
 */

 //add register scripts information

add_action('wp_enqueue_scripts', 'register_scripts_cluster_information');

if ( !function_exists('register_scripts_cluster_information') ) {
    function register_scripts_cluster_information() {
        if ( ! class_exists( 'WooCommerce' ) ) {return;}
        if ( is_front_page() ) {
            wp_enqueue_style( 'cluster-information-css', plugins_url() . '/cluster-information/assets/css/cluster-information.css', array(), '1.1', 'all' );
            wp_enqueue_script( 'cluster-information-js', plugins_url() . '/cluster-information/assets/js/cluster-information.js', array('tfo-library-js'), '1.1', true );
            wp_localize_script( 'cluster-information-js', 'cluster_information_object', array(
                'nonce' => wp_create_nonce('cluster_information_action_nonce'),
                'url' => admin_url('admin-ajax.php'),
                'action' => 'information_action_ajax',
            ) );
        }
    }
}

add_action('wpcotestheme_loop_before', 'cluster_information_front_page', 25);

if ( !function_exists('cluster_information_front_page')) {
    function cluster_information_front_page() {
        if ( ! class_exists( 'WooCommerce' )) {return;}
        if ( is_front_page() ) {
            ?>
                <div class="cluster-information__container">
                    <span class="subtitle" style="">Somos tu mejor opción porque te ofrecemos:</span>
                    <ul class="cluster-information">
                        <!-- ajax data -->
                    </ul>
                </div>
            <?php
        }
    }
}

add_action('wp_ajax_nopriv_information_action_ajax', 'cluster_information_ajax');
add_action('wp_ajax_information_action_ajax', 'cluster_information_ajax');

if ( !function_exists('cluster_information_ajax') ) {
    function cluster_information_ajax() {
            if ( !isset( $_POST['nonce']) && !wp_verify_nonce( $_POST['nonce'],'cluster_information_action_nonce' ) ) {
                return;
            }           
            $array = [];
            $args = array(
                'post_type' => 'informacion',
                'numberposts' => -1,
            );
            $posts = get_posts($args);
            foreach ($posts as $post) {
                $array[] = array(
                    'post_title' => wp_strip_all_tags($post->post_title),
                    'post_excerpt' => wp_strip_all_tags($post->post_excerpt),
                    'url' => esc_url(get_permalink( $post->ID ) ),
                    'src' => esc_url( get_the_post_thumbnail_url($post) )
                );
            }
            wp_send_json($array);
            exit();
    }
}