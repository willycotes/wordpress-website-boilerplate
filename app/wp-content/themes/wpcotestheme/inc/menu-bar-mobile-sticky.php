<?php 
/*
*Plugin Name: Menu Bar Mobile Sticky
*Description: Barra de menu dinamica para dispositivos mobiles con funcionalidad sticky.
*/

//register styles and scripts 

add_action('wp_enqueue_scripts', 'register_scripts_menu_bar_mobile_sticky');

if ( !function_exists('register_scripts_menu_bar_mobile_sticky')) {
    function register_scripts_menu_bar_mobile_sticky() {
        if ( class_exists( 'WooCommerce' ) ) {
            if ( is_product() ) { 
                return;
            }
        }
        wp_enqueue_style('menu-bar-mobile-sticky-css', plugins_url() . "/menu-bar-mobile-sticky/assets/css/menu-bar.css", array(), '1.1', 'all');
        wp_enqueue_script('menu-bar-mobile-sticky-js', plugins_url() . "/menu-bar-mobile-sticky/assets/js/menu-bar.js", array(), '1.1', true);
    }
}

//add menu bar in hook 

add_action('wpcotestheme_after_footer', 'menu_bar_mobile_sticky');

if ( !function_exists('menu_bar_mobile_sticky')) {
    function menu_bar_mobile_sticky() { 
        if ( class_exists( 'WooCommerce' ) ) {
            if ( is_product() ) { 
                return;
            }
        
            ob_start();
        ?>
        <!-----------barra de menu version mobile--------------->
        <div class="menu-bar menu-bar--mobile">    
        <ul class="menuBar-list">
            <li class="menuBar-list__items">
                <a class="menuBar-list__link" href="<?php echo esc_url( get_home_url() ) ;?>" style="<?php echo ( is_front_page() ) ? 'background-color: #e90aaa;border-bottom: 2px solid #fff;border-radius: 4px;' : '' ;?>">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M16 8.5l1.53 1.53l-1.06 1.06L10 4.62l-6.47 6.47l-1.06-1.06L10 2.5l4 4v-2h2v4zm-6-2.46l6 5.99V18H4v-5.97zM12 17v-5H8v5h4z" fill="#fff"/></svg>                
                    Inicio
                </a>
            </li>
            <li class="menuBar-list__items">
                <a class="menuBar-list__link menuBar-list__link--tienda" href="<?php echo esc_url( get_home_url( ) ) . '/tienda/';?>" style="<?php echo ( is_shop() || is_product() || is_product_category() || is_product_tag() || is_checkout() || is_account_page() || is_wc_endpoint_url() ) ? 'background-color: #e90aaa;border-bottom: 2px solid #fff;border-radius: 4px;' : '' ;?>">
                    <svg class="icon" data-categoria="tienda" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M11 2h7v7L8 19l-7-7zm3 6c1.1 0 2-.9 2-2s-.9-2-2-2s-2 .9-2 2s.9 2 2 2z"/></svg>
                    Tienda
                </a>
            </li>
            <li class="menuBar-list__items menuBar-list__items--cart">
                <a class="menuBar-list__link" title="View your shopping cart" href="<?php echo esc_url( wc_get_cart_url() ) ;?>" rel="nofollow" style="<?php echo ( is_cart() ) ? 'background-color: #e90aaa;border-bottom: 2px solid #fff;border-radius: 4px;' : '' ;?>">
                    <svg class="icon icon--cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 13h9c.55 0 1 .45 1 1s-.45 1-1 1H5c-.55 0-1-.45-1-1V4H2c-.55 0-1-.45-1-1s.45-1 1-1h3c.55 0 1 .45 1 1v2h13l-4 7H6v1zm-.5 3c.83 0 1.5.67 1.5 1.5S6.33 19 5.5 19S4 18.33 4 17.5S4.67 16 5.5 16zm9 0c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5z" fill="#fff"/></svg>                        
                    <span class="number-of-items">
                        <span class="cart-contents-count-mobile">
                        <?php echo esc_html( intval( WC()->cart->get_cart_contents_count() ) ); ?>
			            </span>
                    </span>
                    Carrito
                </a>
            </li>
            <li class="menuBar-list__items">
                <a class="menuBar-list__link menuBar-list__link--favoritos" href="<?php echo esc_url(get_permalink()) . 'lista-de-deseos' ;?>" rel="nofollow" style="<?php echo ( is_page('lista-de-deseos') ) ? 'background-color: #e90aaa;border-bottom: 2px solid #fff;border-radius: 4px;' : '' ;?>">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M10 17.12c3.33-1.4 5.74-3.79 7.04-6.21c1.28-2.41 1.46-4.81.32-6.25c-1.03-1.29-2.37-1.78-3.73-1.74s-2.68.63-3.63 1.46c-.95-.83-2.27-1.42-3.63-1.46s-2.7.45-3.73 1.74c-1.14 1.44-.96 3.84.34 6.25c1.28 2.42 3.69 4.81 7.02 6.21z" fill="#fff"/></svg>                        
                    Favoritos
                </a>
            </li>
            <li class="menuBar-list__items">
                <a class="menuBar-list__link menuBar-list__link--blog" href="<?php echo esc_url( get_home_url() ) . '/blog/' ;?>" style="<?php echo ( is_home() || !is_woocommerce() &&  is_single() || !is_woocommerce() &&  is_post_type_archive() || !is_woocommerce() &&  is_archive () ) ? 'background-color: #e90aaa;border-bottom: 2px solid #fff;border-radius: 4px;' : '' ;?>">
                    <svg class="icon" data-categoria="blog" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 30v452h512V30H0zM181 390H60v-30h121V390zM241 330H60v-30h181V330zM60 250v-30h121v30H60zM241 190H60v-30h181V190zM452 412H301V160h151V412zM482 90H30V60h452V90z"/></svg>
                    blog
                </a>
            </li>
            <li class="menuBar-list__items">
                <a id="footerShow" class="menuBar-list__link" href="#" rel="nofollow">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M17 7v3h-5v5H9v-5H4V7h5V2h3v5h5z" fill="#fff"/></svg>                       
                    Más
                </a>
            </li>
        </ul>
        </div>    
        <?php
        $output = ob_get_clean();  
        echo $output;  
    }
    }
} 
// Show cart content count Ajax mobile

add_filter( 'woocommerce_add_to_cart_fragments', 'cart_contents_count_template_mobile_ajax' );

if ( !function_exists('cart_contents_count_template_mobile_ajax')) {

	function cart_contents_count_template_mobile_ajax( $fragments ) {
        if ( !is_front_page() || !is_home() ) {
            ob_start();
            ?>
            <span class="cart-contents-count-mobile">
                <?php echo esc_html( intval( WC()->cart->get_cart_contents_count() ) ); ?>
            </span>
            <?php
            $fragments['span.cart-contents-count-mobile'] = ob_get_clean();
            return $fragments;
        }
	}
}
?>