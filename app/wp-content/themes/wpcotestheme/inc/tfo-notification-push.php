<?php
/*
*Plugin Name: TFO Notification Push
*Description: Crea y gestiona avisos y notificaciones web push
*/

//add register scripts 

add_action('wp_enqueue_scripts', 'register_scripts_tfo_notification_push');

if ( !function_exists('register_scripts_tfo_notification_push')) {
    function register_scripts_tfo_notification_push() {
        wp_enqueue_style('tfo-notification-push-css', plugins_url() . '/tfo-notification-push/assets/css/style.css', array(), '1.1', 'all');
        wp_enqueue_script('tfo-notification-push-js', plugins_url() . '/tfo-notification-push/assets/js/tfo-notification-push.js', array(), '1.1', true);
        wp_localize_script('tfo-notification-push-js', 'ajax_notification_object', array(
            'url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('notification_push_nonce_action'),
            'action' => 'ajax_notification_action'
        ));
    }
}
    //function modal 
    add_action('wpcotestheme_page_before', 'tfo_notification_push');

    if ( !function_exists('tfo_notification_push')) {
        function tfo_notification_push() {
            ?> 
            <div class="notification-container" id="notification-container">
                <div class="notification-header">
                    <h3 class="notification-header__title">Notificaciones</h3>
                </div>
                <ul class="notification-list">
                    <!-- datos fetch ajax -->
                </ul>
                <div class="notification-footer">
                    <a href="<?php echo esc_url( get_home_url() ) . '/blog/' ;?>" class="notification-footer__link">
                        Ver Todo en Página Principal
                    </a>
                </div>
                <!-- icon de close -->
                <svg id="notification-close" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M12.12 10l3.53 3.53l-2.12 2.12L10 12.12l-3.54 3.54l-2.12-2.12L7.88 10L4.34 6.46l2.12-2.12L10 7.88l3.54-3.53l2.12 2.12z" fill="#6d6d6d"/></svg>
            </div>           
            <?php
            
        }
    }
    //aax conextion fetch api
add_action('wp_ajax_ajax_notification_action', 'custom_notification_post_ajax');
add_action('wp_ajax_nopriv_ajax_notification_action', 'custom_notification_post_ajax');

if ( !function_exists('custom_notification_post_ajax')) {
    function custom_notification_post_ajax() {
        $nonce = $_POST['nonce'];
        if ( ! isset( $nonce ) || ! wp_verify_nonce( $nonce, 'notification_push_nonce_action' )) {
            return;
        }
        global $post;
        ob_start();
        $args = array(
            'numberposts' => 8,
            'post_status' => 'publish',
            'post_type'   => array('post', 'promociones', 'noticias'),
            'orderby'     => 'date',
        ); 
        $latest_posts = get_posts( $args );
            // if ( !wp_is_mobile() ) { 
                foreach ( $latest_posts as $post ) {	
                    setup_postdata($post);	
                    ?>   
                    <li class="notification-items">
                        <a class="notification-link" href="<?php echo esc_url(get_the_permalink($post->ID));?>">
                            <div class="thumbnail-container-notification-push"><?php echo get_the_post_thumbnail($post->ID, 'thumbnail');?></div>
                            <div class="body-container-notification-push">
                                <h3 class="title-notification-push"><?php echo esc_html(get_the_title($post->ID));?></h3>
                                <p class="excerpt-notification-push">
                                    <?php 
                                    echo wp_trim_words( get_the_content($post->ID), 15, '<b>...Ver Más</b>' );
                                    ?>
                                </p>                           
                                <span class="meta-date-time-notification-push">Publicado el <?php echo get_the_modified_date('', $post->ID); ?></span>
                            </div>
                        </a>
                    </li>	
                    <?php 
                }
                wp_reset_postdata();
            // }
        $output = ob_get_clean();
        echo $output;
        exit();
    }
}
?>
