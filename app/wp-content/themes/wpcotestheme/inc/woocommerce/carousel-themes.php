<?php 
/*
*Plugin Name: Carousel Tematicas
*Description: Carrusel de tematicas 
*
*/

//register scripts of carousel tematicas

add_action('wp_enqueue_scripts', 'register_scripts_carousel_tematicas');

if ( !function_exists('register_scripts_carousel_tematicas')) {
	function register_scripts_carousel_tematicas() {
        if ( class_exists( 'WooCommerce' ) ) {
            if ( !is_woocommerce() || !is_woocommerce() && is_page('tematicas') || is_tax('tematicas') || is_product() || is_front_page() || is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url( ) ) {
                return;
            }
            wp_enqueue_style('carousel-tematicas-css', plugins_url() . '/carousel-tematicas/assets/css/carousel-tematicas.css', array(), '1.1', 'all');
            wp_enqueue_script('carousel-tematicas-js', plugins_url() . '/carousel-tematicas/assets/js/carousel-tematicas.js', array('jquery'), '1.1', true);
        }
	}
}

//add action hook of carousel thematic in wpcotestheme_before_content
//get terms and add hook slide tematicas

add_action('wpcotestheme_before_content', 'carousel_tematicas', 2);

if ( !function_exists('carousel_tematicas')) {
    function carousel_tematicas() {
        if ( class_exists( 'WooCommerce' ) ) {
            if (  !is_woocommerce() || !is_woocommerce() && is_page('tematicas') || is_tax('tematicas') || is_product() || is_front_page() || is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url( ) ) {
                return;
            }
                $args = array(
                    'taxonomy' => 'tematicas',
                    'hide_empty' => false,
                    'count' => true,
                    'exclude' => array( 473, 474, 475), //excluidas las categorias padre: tematicas para niña y para niño
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'number' => 20,
                );
                $customs_terms = get_terms( $args );

                ob_start();

                echo '<div class="slider-tematicas-container">';
                echo '<ul class="slider-tematicas-content" id="slider-tematicas-content">';
                foreach ( $customs_terms as $term ) { 
                    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true);
                    $tag_meta = get_term_meta( $term->term_id, 'tag-meta', true); 
                    if ( $thumbnail_id ) {
                        $img = wp_get_attachment_thumb_url($thumbnail_id);
                    }
                    else {
                        $img = wc_placeholder_img_src( );
                    }

                ?>
                    <li class="slide-tematicas__items">
                        <a class="slide-tematicas__link" href="<?php echo esc_url(get_term_link( $term, $term->taxonomy ));?>">
                            <figure class="slide-tematicas__figure">
                                <picture>
                                    <?php 
                                        ?>
                                        <img src="<?php echo esc_url($img);?>"  alt="imagen de <?php echo esc_attr($term->name);?>">
                                        <?php   
                                    ?>
                                </picture>
                            </figure>
                            <figcaption>
                                <?php 
                                    if ( empty( $tag_meta ) ) {
                                        echo esc_html($term->name);
                                    } 
                                    else {
                                        echo esc_html( get_term_meta( $term->term_id, 'tag-meta', true) );
                                        // printf( '<span class="count">%d</span>', esc_html($term->count) );
                                    }
                                ?>
                            </figcaption>
                        </a>
                    </li>
                <?php
                }
                echo '</ul>
                    <span id="btn-tematicas__prev" class="btn-icon  btn-icon--left">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M14 5l-5 5l5 5l-1 2l-7-7l7-7z" fill="#3e3e3e"/></svg>                </span>
                    <span id="btn-tematicas__next" class="btn-icon btn-icon--right">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 15l5-5l-5-5l1-2l7 7l-7 7z" fill="#3e3e3e"/></svg>
                    </span>                   
                </div>';
                $output = ob_get_clean();
                echo $output;
              
            
        }
    }
}

// add_action('wc_ajax_carousel', 'carousel');

// if ( !function_exists('carousel')) {
//     function carousel() {
//     }
// }

//add menu admin superior

// add_action('admin_menu', 'admin_menu_config_tematicas');

// if ( !function_exists('admin_menu_config_tematicas')) {
//     function admin_menu_config_tematicas() {
//         add_menu_page(
//             'Configuration Thematic', // $page_title,
//             'Carrusel de Tematicas', // $menu_title,
//             'manage_options', // $capability,
//             // 'config-thematic', // $menu_slug,
//             plugin_dir_path(__FILE__) . 'admin/config-thematic.php', // $menu_slug,
//             // config_thematic_html_page, // $function,
//             null, // $function = '',
//             'dashicons-image-flip-horizontal', // $icon_url,
//             20 // $position,
//         );
//     }
// }

//add submenu admin 

// add_action('admin_menu', 'add_submenu_admin_conf_thematic');

// if ( !function_exists('add_submenu_admin_conf_thematic')) {
//     function add_submenu_admin_conf_thematic() {
//         add_submenu_page( 
//             'config-thematic.php', // $parent_slug,
//             'submenu-conf-thematic', // $page_title,
//             'submenu', // $menu_title,
//             'manage_options', // $capability,
//             plugin_dir_path(__FILE__) . 'admin/conf-thematic-submenu.php', // $menu_slug,
//             null // $function,
//         )
//     }

// }

// add_action('wc_ajax_myaction','myaction');
// function myaction(){
//     exit("Hello. some_var=".$_POST['some_var']);
// }
?>