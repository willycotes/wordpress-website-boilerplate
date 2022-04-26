<?php 
/**
 * Plugin Name: Super Menu
 * Description: Menu personalizado interactivo con imagenes integradas
 */
// hook 

	/**
	 * Functions hooked in to wpcotestheme_before_content
	 *
	 * @hooked wpcotestheme_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
    
// register style and scripts of super menu

add_action('wp_enqueue_scripts', 'register_scripts_super_menu');

if ( !function_exists('register_scripts_super_menu')) {
    function register_scripts_super_menu() {
        wp_enqueue_style('super-menu-css', plugins_url() . '/super-menu/assets/css/super-menu.css', array(), '1.1', 'all');
        wp_enqueue_script('super-menu-js', plugins_url() . '/super-menu/assets/js/super-menu.js', array(), '1.0', 'all');
    }
}

// register style and scripts of menu bar desktop

add_action('wp_enqueue_scripts', 'register_scripts_super_menu_bar');

if ( !function_exists('register_scripts_super_menu_bar')) {
    function register_scripts_super_menu_bar() {
        if ( !is_front_page() || !is_home() || !is_cart() ) {
			wp_enqueue_script('items-cart-ajax-js', plugins_url() . '/super-menu/assets/js/items-cart-ajax.js', array('jquery'), '1.1', true);
		}
        wp_enqueue_style('menu-bar-css', plugins_url() . '/super-menu/assets/css/menu-bar.css', array(), '1.1', 'all');
    }
}

//add hook action super menu bar        

add_action('wpcotestheme_header', 'super_menu_bar_template', 15);

if ( !function_exists('super_menu_bar_template')) {
function super_menu_bar_template() { 
    ob_start();
    ?>

<!-------------barra de menu de escritorio----------------->

<nav class="menu-bar menu-bar--desktop">
    <ul class="menuBar-list">
        <li class="menuBar-list__items">
            <a class="menuBar-list__link" href="<?php echo esc_url( get_home_url() ) ;?>" style="<?php echo ( is_front_page() ) ? 'background-color: #1F8386;border-radius: 4px;' : '' ;?>">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M16 8.5l1.53 1.53l-1.06 1.06L10 4.62l-6.47 6.47l-1.06-1.06L10 2.5l4 4v-2h2v4zm-6-2.46l6 5.99V18H4v-5.97zM12 17v-5H8v5h4z" fill="#fff"/></svg>                
                Inicio
            </a> 
        </li>
        <li class="menuBar-list__items">
            <a class="menuBar-list__link menuBar-list__link--tienda" href="<?php echo esc_url( get_permalink(wc_get_page_id( 'shop' )) ) ;?>" style="<?php echo ( is_shop() || is_woocommerce() && is_product() || !is_product_category('servicios') && is_product_category() || is_product_tag() || is_checkout() || is_account_page() || is_wc_endpoint_url() ) ? 'background-color: #1F8386;border-radius: 4px;' : '' ;?>">
                <svg class="icon" data-categoria="tienda" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M11 2h7v7L8 19l-7-7zm3 6c1.1 0 2-.9 2-2s-.9-2-2-2s-2 .9-2 2s.9 2 2 2z"/></svg>
                Tienda
            </a>
            <svg class="icon" data-categoria="tienda" data-active="active" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M5 6l5 5l5-5l2 1l-7 7l-7-7z" fill="#fff"/></svg>        </li>
        <li class="menuBar-list__items">
            <a class="menuBar-list__link menuBar-list__link--servicios" href="<?php echo esc_url( get_home_url() ) . '/servicios/' ;?>" style="<?php echo ( is_product_category('servicios') ) ? 'background-color: #1F8386;border-radius: 4px;' : '' ;?>">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M9 0a9 9 0 1 0 0 18A9 9 0 0 0 9 0zm7.5 6.48a3.38 3.38 0 0 1-1.75 2.05a5.64 5.64 0 0 0-3.27-3.75a2 2 0 0 1 .79-1.09c-.43-.28-1-.42-1.34.07c-.53.69 0 1.61.21 2v.14A3.07 3.07 0 0 1 9.9 4.46a5.2 5.2 0 0 0-2.76.69a3.44 3.44 0 0 1 .16-1.68a2.21 2.21 0 0 0 1.92-.8c.46-.52-.13-1.18-.59-1.58h.36a7.86 7.86 0 0 1 3.89 1a5.61 5.61 0 0 1 2.27 4.26c.24 0 .7-.55.91-.92c.172.339.319.69.44 1.05zM9 16.84c-2.05-2.08.25-3.75-1-5.24c-.92-.85-2.29-.26-3.11-1.23a4.08 4.08 0 0 1 1.43-3.93c.52-.44 4-1 5.42.22a5.22 5.22 0 0 1 1.67 2.74a2.35 2.35 0 0 0 1.32-.29c.41 2.98-3.15 6.74-5.73 7.73zM5.15 2.09a1.84 1.84 0 0 1 2.16.66c-.42.38-.94.63-1.5.72A3 3 0 0 1 6 2.61l-.85-.52z"/></svg>
                Servicios
            </a>
            <svg class="icon"  data-categoria="servicios" data-active="active" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M5 6l5 5l5-5l2 1l-7 7l-7-7z" fill="#fff"/></svg>        </li>
        <li class="menuBar-list__items">
            <a class="menuBar-list__link menuBar-list__link--blog" href="<?php echo esc_url( get_home_url() ) . '/blog/' ;?>"  style="<?php echo ( is_home() || !is_woocommerce() && is_single() || !is_woocommerce() &&  is_post_type_archive() || !is_woocommerce() &&  is_archive () ) ? 'background-color: #1F8386;border-radius: 4px;' : '' ;?>">
                <svg class="icon" data-categoria="blog" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 30v452h512V30H0zM181 390H60v-30h121V390zM241 330H60v-30h181V330zM60 250v-30h121v30H60zM241 190H60v-30h181V190zM452 412H301V160h151V412zM482 90H30V60h452V90z"/></svg>
                Blog
            </a>
            <svg class="icon" data-categoria="blog" data-active="active" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M5 6l5 5l5-5l2 1l-7 7l-7-7z" fill="#fff"/></svg>        </li>
        <li class="menuBar-list__items"> 
            <a class="menuBar-list__link menuBar-list__link--contactanos" href="<?php echo esc_url( get_home_url() ) . '/contactanos/' ;?> " rel="nofollow" style="<?php echo ( is_page('contactanos') ) ? 'background-color: #1F8386;border-radius: 4px;' : '' ;?>">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 0 512 512" width="25"><path d="m91 422c-24.8 0-45 20.2-45 45s20.2 45 45 45h300c8.3 0 15-6.7 15-15v-60c0-8.3-6.7-15-15-15z"/><path d="m436 151h30v60h-30z"/><path d="m466 45c0-8.4-6.6-15-15-15h-15v91h30z"/><path d="m436 241h30v60h-30z"/><path d="m161.3 238.5 63.6 63.6c24.7 24.7 65.9 28.5 94.4 9.6l-41.4-41.4-10.6 10.6c-5.9 5.9-15.4 5.9-21.2 0l-63.6-63.6c-5.9-5.9-5.9-15.4 0-21.2l10.6-10.6-41.4-41.4c-19.3 29.1-16.1 68.8 9.5 94.4z"/><path d="m46 75v332.4c12.6-9.5 28.1-15.4 45-15.4h300c5.3 0 10.3 1.1 15 2.8v-379.8c0-8.3-6.7-15-15-15h-270c-41.4 0-75 33.6-75 75zm115.3 36.2 63.6 63.6c5.9 5.9 5.9 15.4 0 21.2l-10.6 10.6 42.4 42.4 10.6-10.6c5.9-5.9 15.4-5.9 21.2 0l63.6 63.6c5.9 5.9 5.9 15.4 0 21.2-19.8 19.8-46.2 30.8-74.3 30.8s-54.4-10.9-74.2-30.8l-63.6-63.6c-40.9-40.9-40.9-107.5 0-148.5 5.9-5.9 15.4-5.9 21.2 0z"/><path d="m436 422h15c8.4 0 15-6.6 15-15v-76h-30z"/></svg>
                Contactanos
           </a>
        </li>
        <!-- items cart icon ajax in menu bar-->
        <li class="menuBar-list__items items-cart">
            <?php 
                if ( class_exists( 'WooCommerce' ) ) {
			        if ( is_cart() ) {
				        $class = 'current-menu-item';
			        } else {
				        $class = '';
			        }
			        ?>
			        <ul id="site-header-cart" class="site-header-cart menu">
				        <li class="<?php echo esc_attr( $class ); ?>">
				            <a class="cart-contents-template-fiesta" href="<?php echo wc_get_cart_url(); ?>" title="Ver Carrito">
			                    <?php echo '<svg class="icon icon--cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 13h9c.55 0 1 .45 1 1s-.45 1-1 1H5c-.55 0-1-.45-1-1V4H2c-.55 0-1-.45-1-1s.45-1 1-1h3c.55 0 1 .45 1 1v2h13l-4 7H6v1zm-.5 3c.83 0 1.5.67 1.5 1.5S6.33 19 5.5 19S4 18.33 4 17.5S4.67 16 5.5 16zm9 0c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5z" fill="#fff"/></svg>'; ?> 
			                    <span class="items-count"> <?php echo WC()->cart->get_cart_contents_count(); ?> </span>
			                    <?php echo WC()->cart->get_cart_total(); ?>
			                </a>
				        </li>
                        <?php 
                            if ( !is_front_page() || !is_home() || !is_cart() ) {
                                echo '<li>';
                                the_widget( 'WC_Widget_Cart', 'title=' ); 
                                echo '</li>';
                            }
                        ?>
			        </ul>
                    <?php 
                } 
            ?>
        </li>
    </ul>
</nav>
    
<?php  
$output = ob_get_clean();
echo $output;
} 


}

// add hook of super menu 

add_action('wpcotestheme_header', 'super_menu_template', 15);

if ( !function_exists('super_menu_template')) {
function super_menu_template() { 
    ob_start();
    ?>

<!---     contenedor del super menu --->

<div class="grid-container__overlay"> <!-- overlay -->
    <div class="btn-nav__close" id="btn-nav__close">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M12.12 10l3.53 3.53l-2.12 2.12L10 12.12l-3.54 3.54l-2.12-2.12L7.88 10L4.34 6.46l2.12-2.12L10 7.88l3.54-3.53l2.12 2.12z" fill="#ffffff"/></svg>
    </div>
    <div class="grid-container">
        <div class="grid" id="grid">
            <div class="category-container"> <!------------catecorias-------------------->
                <div class="category-header__mobile"><!--encabezado del panel de navegacion para version mobile-->
                    <div class="btn-back">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M464.3 207.4l0.8 0.2H135.9l103.5-103.7c5.1-5.1 7.8-11.9 7.8-19.1 0-7.2-2.8-14-7.8-19.1L223.3 49.5c-5.1-5.1-11.8-7.9-19-7.9 -7.2 0-14 2.8-19 7.8L7.8 226.9C2.8 232 0 238.8 0 246c0 7.2 2.8 14 7.8 19.1l177.4 177.4c5.1 5.1 11.8 7.8 19 7.8 7.2 0 13.9-2.8 19-7.8l16.1-16.1c5.1-5.1 7.8-11.8 7.8-19 0-7.2-2.8-13.6-7.8-18.7L134.7 284.4h330c14.8 0 27.3-12.8 27.3-27.6v-22.8C492 219.2 479.2 207.4 464.3 207.4z"/></svg>                       
                    </div>
                    <?php 
                        if ( is_user_logged_in() ) { 
                            // error fatal,  fixe to important!!!!!
                            // $first_custom_name =  get_current_custom_name();
                            // $user_name_custom = get_current_custom_user_name();
                            $first_custom_name =  '';
                            $user_name_custom = '';
                            if  ( empty( $first_custom_name ) ) {
                                echo '<span class="welcome">¡Hola, ' . $user_name_custom . '!</span>';
                                ?> 
                                    <div class="user-profile">
                                        <div class="user-profile__content">
                                            <span class="first-custom-name">
                                                <?php echo substr( $user_name_custom, 0, 1 );?>
                                            </span>
                                        </div>
                                    </div>
                                <?php
                            }
                            else { 
                                echo '<span class="welcome">¡Hola, ' . $first_custom_name . '!</span>';
                                ?>
                                    <div class="user-profile">
                                        <div class="user-profile__content">
                                            <span class="first-custom-name">
                                                <?php echo substr( $first_custom_name, 0, 1 );?>
                                            </span>
                                        </div>
                                    </div>
                                <?php 
                            }
                        } 
                        else { 
                            ?>
                                <span class="welcome">Hola, Identifícate!</span>  
                                <div class="user-profile">
                                    <div class="user-profile__content">
                                        <svg class="icon" viewBox="-42 0 512 512.002" xmlns="http://www.w3.org/2000/svg"><path d="m210.351562 246.632812c33.882813 0 63.222657-12.152343 87.195313-36.128906 23.972656-23.972656 36.125-53.304687 36.125-87.191406 0-33.875-12.152344-63.210938-36.128906-87.191406-23.976563-23.96875-53.3125-36.121094-87.191407-36.121094-33.886718 0-63.21875 12.152344-87.191406 36.125s-36.128906 53.308594-36.128906 87.1875c0 33.886719 12.15625 63.222656 36.132812 87.195312 23.976563 23.96875 53.3125 36.125 87.1875 36.125zm0 0"/><path d="m426.128906 393.703125c-.691406-9.976563-2.089844-20.859375-4.148437-32.351563-2.078125-11.578124-4.753907-22.523437-7.957031-32.527343-3.308594-10.339844-7.808594-20.550781-13.371094-30.335938-5.773438-10.15625-12.554688-19-20.164063-26.277343-7.957031-7.613282-17.699219-13.734376-28.964843-18.199219-11.226563-4.441407-23.667969-6.691407-36.976563-6.691407-5.226563 0-10.28125 2.144532-20.042969 8.5-6.007812 3.917969-13.035156 8.449219-20.878906 13.460938-6.707031 4.273438-15.792969 8.277344-27.015625 11.902344-10.949219 3.542968-22.066406 5.339844-33.039063 5.339844-10.972656 0-22.085937-1.796876-33.046874-5.339844-11.210938-3.621094-20.296876-7.625-26.996094-11.898438-7.769532-4.964844-14.800782-9.496094-20.898438-13.46875-9.75-6.355468-14.808594-8.5-20.035156-8.5-13.3125 0-25.75 2.253906-36.972656 6.699219-11.257813 4.457031-21.003906 10.578125-28.96875 18.199219-7.605469 7.28125-14.390625 16.121094-20.15625 26.273437-5.558594 9.785157-10.058594 19.992188-13.371094 30.339844-3.199219 10.003906-5.875 20.945313-7.953125 32.523437-2.058594 11.476563-3.457031 22.363282-4.148437 32.363282-.679688 9.796875-1.023438 19.964844-1.023438 30.234375 0 26.726562 8.496094 48.363281 25.25 64.320312 16.546875 15.746094 38.441406 23.734375 65.066406 23.734375h246.53125c26.625 0 48.511719-7.984375 65.0625-23.734375 16.757813-15.945312 25.253906-37.585937 25.253906-64.324219-.003906-10.316406-.351562-20.492187-1.035156-30.242187zm0 0"/></svg>
                                    </div> 
                                </div>
                            <?php 
                        } ?>
                </div><!--finalizacion del encabezado de la navegacion mobile-->
                
                <?php //caja de botones de inicio de sesion 
                    if ( !is_user_logged_in() ) { 
                        ?>
                            <div class="btn-login-container">
                                <div class="btn-login">
                                    <a class="btn-login__link" href="<?php echo esc_url( wp_login_url( get_permalink() ) ) ;?>">Iniciar Sesión</a>
                                </div>
                                <div class="btn-register">
                                    <a class="btn-register__link" href="<?php echo esc_url( wp_registration_url() ) ; ?>">Registrarme</a>
                                </div>
                            </div> 
                        <?php 
                    } 
                ?>   

                <h3 class="supermenu-item__mobile" data-categoria="tienda"> <!--tienda-->
                    <span class="item-name" data-categoria="tienda">
                        <svg class="icon" data-categoria="tienda" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M11 2h7v7L8 19l-7-7zm3 6c1.1 0 2-.9 2-2s-.9-2-2-2s-2 .9-2 2s.9 2 2 2z" fill="#6d6d6d"/></svg>
                        Todas las categorias
                    </span>
                    <svg class="icon-plus" data-categoria="tienda" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M17 7v3h-5v5H9v-5H4V7h5V2h3v5h5z" fill="#6d6d6d"/></svg>                
                </h3>                  
                            <!---------------enlaces de categoria-tienda----------------------->
                <ul class="supermenu-item__list" data-categoria="tienda">
                    <li class="list-item__category" data-categoria="temas" data-items="tienda">
                        <span class="item__element">Temas para Cumpleaños</span>
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 15l5-5l-5-5l1-2l7 7l-7 7z" fill="#6d6d6d"/></svg>                    </li>
                    <li class="list-item__category" data-categoria="articulos-mesa" data-items="tienda">
                        <span class="item__element">Artículos para la Mesa</span>
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 15l5-5l-5-5l1-2l7 7l-7 7z" fill="#6d6d6d"/></svg>                    </li>
                    </li>
                    <li class="list-item__category" data-categoria="articulos-decoracion" data-items="tienda">
                        <span class="item__element">Artículos de Decoración</span>
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 15l5-5l-5-5l1-2l7 7l-7 7z" fill="#6d6d6d"/></svg>                    </li>
                    </li>
                    <li class="list-item__category" data-categoria="pinateria" data-items="tienda">
                        <span class="item__element">Piñatería</span>
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 15l5-5l-5-5l1-2l7 7l-7 7z" fill="#6d6d6d"/></svg>                    </li>
                    </li>
                    <li class="list-item__category" data-categoria="candy-bar" data-items="tienda">
                        <span class="item__element">Candy Bar</span>
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 15l5-5l-5-5l1-2l7 7l-7 7z" fill="#6d6d6d"/></svg>                    </li>
                    </li>
                    <li class="list-item__category" data-categoria="globos" data-items="tienda">
                        <span class="item__element">Globos</span>
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 15l5-5l-5-5l1-2l7 7l-7 7z" fill="#6d6d6d"/></svg>                    </li>
                    </li>
                    <li class="list-item__category" data-categoria="golosinas" data-items="tienda">
                        <span class="item__element">Golosinas</span>
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 15l5-5l-5-5l1-2l7 7l-7 7z" fill="#6d6d6d"/></svg>                    </li>
                    </li>
                    <li class="list-item__category" data-items="tienda">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/kit-para-fiestas/' ;?>">Kit para Fiestas</a>
                    </li>
                </ul>
                        <!--servicios-->
                <h3 class="supermenu-item__mobile" data-categoria="servicios">
                    <span class="item-name" data-categoria="servicios">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M9 0a9 9 0 1 0 0 18A9 9 0 0 0 9 0zm7.5 6.48a3.38 3.38 0 0 1-1.75 2.05a5.64 5.64 0 0 0-3.27-3.75a2 2 0 0 1 .79-1.09c-.43-.28-1-.42-1.34.07c-.53.69 0 1.61.21 2v.14A3.07 3.07 0 0 1 9.9 4.46a5.2 5.2 0 0 0-2.76.69a3.44 3.44 0 0 1 .16-1.68a2.21 2.21 0 0 0 1.92-.8c.46-.52-.13-1.18-.59-1.58h.36a7.86 7.86 0 0 1 3.89 1a5.61 5.61 0 0 1 2.27 4.26c.24 0 .7-.55.91-.92c.172.339.319.69.44 1.05zM9 16.84c-2.05-2.08.25-3.75-1-5.24c-.92-.85-2.29-.26-3.11-1.23a4.08 4.08 0 0 1 1.43-3.93c.52-.44 4-1 5.42.22a5.22 5.22 0 0 1 1.67 2.74a2.35 2.35 0 0 0 1.32-.29c.41 2.98-3.15 6.74-5.73 7.73zM5.15 2.09a1.84 1.84 0 0 1 2.16.66c-.42.38-.94.63-1.5.72A3 3 0 0 1 6 2.61l-.85-.52z" fill="#626262"/></svg>
                        Servicios
                    </span>
                    <svg class="icon-plus" data-categoria="servicios" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M17 7v3h-5v5H9v-5H4V7h5V2h3v5h5z" fill="#6d6d6d"/></svg>                
                </h3>
                        <!---------------enlaces de categorias--servicios--------------------->
                <ul class="supermenu-item__list" data-categoria="servicios">
                    <li class="list-item__category" data-items="servicios">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/servicios/' ;?>">Servicios de Decoración</a>
                    </li>
                    <li class="list-item__category" data-items="servicios">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/servicios/' ;?>">Servicios de Pintacaritas</a>
                    </li>
                    <li class="list-item__category" data-items="servicios">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/servicios/' ;?>">Servicios de Animación</a>
                    </li>
                    <li class="list-item__category" data-items="servicios">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/servicios/' ;?>">Alquiler de Máquinas</a>
                    </li>
                    <li class="list-item__category" data-items="servicios">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/servicios/' ;?>">Alquiler Inflables</a>
                    </li>
                </ul>
                        <!--blog-->
                <h3 class="supermenu-item__mobile" data-categoria="blog">
                    <span class="item-name" data-categoria="blog">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 30v452h512V30H0zM181 390H60v-30h121V390zM241 330H60v-30h181V330zM60 250v-30h121v30H60zM241 190H60v-30h181V190zM452 412H301V160h151V412zM482 90H30V60h452V90z"/></svg>
                        Blog
                    </span>
                    <svg class="icon-plus" data-categoria="blog" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M17 7v3h-5v5H9v-5H4V7h5V2h3v5h5z" fill="#6d6d6d"/></svg>               
                </h3>

                        <!---------------enlaces de categorias---blog-------------------->
                <ul class="supermenu-item__list" data-categoria="blog">
                    <li class="list-item__category" data-items="blog">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/blog/' ;?>">Decoración de Cumpleaños</a>
                    </li>
                    <li class="list-item__category" data-items="blog">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/blog/' ;?>">Decoración para Baby Shower</a>
                    </li>
                    <li class="list-item__category" data-items="blog">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/blog/' ;?>">Artículos sobre Familia y Hogar</a>
                    </li>
                    <li class="list-item__category" data-items="blog">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/blog/' ;?>">Artículos sobre Belleza y Salud</a>
                    </li>
                </ul>
                <!--enlaces personalizados agregados desde el admin menu-->
                <ul class="supermenu-item__list supermenu-item__list--admin-menu">
                    <li class="list-item__category">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/contactanos/' ;?>">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 0 512 512" width="25"><path d="m91 422c-24.8 0-45 20.2-45 45s20.2 45 45 45h300c8.3 0 15-6.7 15-15v-60c0-8.3-6.7-15-15-15z"/><path d="m436 151h30v60h-30z"/><path d="m466 45c0-8.4-6.6-15-15-15h-15v91h30z"/><path d="m436 241h30v60h-30z"/><path d="m161.3 238.5 63.6 63.6c24.7 24.7 65.9 28.5 94.4 9.6l-41.4-41.4-10.6 10.6c-5.9 5.9-15.4 5.9-21.2 0l-63.6-63.6c-5.9-5.9-5.9-15.4 0-21.2l10.6-10.6-41.4-41.4c-19.3 29.1-16.1 68.8 9.5 94.4z"/><path d="m46 75v332.4c12.6-9.5 28.1-15.4 45-15.4h300c5.3 0 10.3 1.1 15 2.8v-379.8c0-8.3-6.7-15-15-15h-270c-41.4 0-75 33.6-75 75zm115.3 36.2 63.6 63.6c5.9 5.9 5.9 15.4 0 21.2l-10.6 10.6 42.4 42.4 10.6-10.6c5.9-5.9 15.4-5.9 21.2 0l63.6 63.6c5.9 5.9 5.9 15.4 0 21.2-19.8 19.8-46.2 30.8-74.3 30.8s-54.4-10.9-74.2-30.8l-63.6-63.6c-40.9-40.9-40.9-107.5 0-148.5 5.9-5.9 15.4-5.9 21.2 0z"/><path d="m436 422h15c8.4 0 15-6.6 15-15v-76h-30z"/></svg>
                            Contáctanos
                        </a>
                    </li>
                </ul>                
                   <!------------enlaces de mi cuenta---------------------->
                <ul class="supermenu-item__list supermenu-item__list--myaccount" data-categoria="cuenta">
                    <li class="list-item__category">
                        <a class="item__link" href="<?php echo esc_url( wc_get_account_endpoint_url( 'dashboard') ); ?>" rel="nofollow" data-items="cuenta">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M10 9.25c-2.27 0-2.73-3.44-2.73-3.44C7 4.02 7.82 2 9.97 2c2.16 0 2.98 2.02 2.71 3.81c0 0-.41 3.44-2.68 3.44zm0 2.57L12.72 10c2.39 0 4.52 2.33 4.52 4.53v2.49s-3.65 1.13-7.24 1.13c-3.65 0-7.24-1.13-7.24-1.13v-2.49c0-2.25 1.94-4.48 4.47-4.48z" fill="#6d6d6d"/></svg>
                            Ver mi cuenta
                        </a>
                    <li>
                    <li class="list-item__category">
                        <a class="item__link" href="<?php echo esc_url(wc_get_cart_url()); ?>" rel="nofollow" data-items="cuenta">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 13h9c.55 0 1 .45 1 1s-.45 1-1 1H5c-.55 0-1-.45-1-1V4H2c-.55 0-1-.45-1-1s.45-1 1-1h3c.55 0 1 .45 1 1v2h13l-4 7H6v1zm-.5 3c.83 0 1.5.67 1.5 1.5S6.33 19 5.5 19S4 18.33 4 17.5S4.67 16 5.5 16zm9 0c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5z" fill="#626262"/></svg>                           
                         Mi carrito
                        </a>
                    </li>
                    <li class="list-item__category">
                        <a class="item__link" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', '', get_permalink( get_option('woocommerce_myaccount_page_id') ) ) ) ;?>" rel="nofollow" data-items="cuenta">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M458.7 422.2l-22.9-288.1c-1.4-18.6-17.1-33.1-35.7-33.1h-45.2v66.9c0 8.3-6.7 15-15 15 -8.3 0-15-6.7-15-15v-66.9H187v66.9c0 8.3-6.7 15-15 15 -8.3 0-15-6.7-15-15v-66.9h-45.2c-18.6 0-34.3 14.5-35.7 33.1L53.3 422.3c-1.8 23.1 6.2 46.1 22 63C91 502.3 113.2 512 136.4 512h239.2c23.1 0 45.4-9.7 61.2-26.7C452.5 468.3 460.5 445.3 458.7 422.2zM323.6 275.5l-77.6 77.6c-2.9 2.9-6.8 4.4-10.6 4.4 -3.8 0-7.7-1.5-10.6-4.4l-36.3-36.3c-5.9-5.9-5.9-15.3 0-21.2 5.9-5.9 15.4-5.9 21.2 0l25.8 25.7 67-67c5.8-5.8 15.3-5.8 21.2 0C329.4 260.1 329.4 269.6 323.6 275.5z"/><path d="M256 0c-54.6 0-99 44.4-99 99v2h30v-2c0-38 30.9-69 69-69s69 30.9 69 69v2h30v-2C355 44.4 310.6 0 256 0z"/></svg>
                            Pedidos
                        </a>
                    </li>
                    <li class="list-item__category">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/lista-de-deseos/manage/';?>" rel="nofollow" data-items="cuenta">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M10 17.12c3.33-1.4 5.74-3.79 7.04-6.21c1.28-2.41 1.46-4.81.32-6.25c-1.03-1.29-2.37-1.78-3.73-1.74s-2.68.63-3.63 1.46c-.95-.83-2.27-1.42-3.63-1.46s-2.7.45-3.73 1.74c-1.14 1.44-.96 3.84.34 6.25c1.28 2.42 3.69 4.81 7.02 6.21z" fill="#6d6d6d"/></svg>
                            Lista de deseos
                        </a>
                    </li>
                    <li class="list-item__category">
                        <a class="item__link" href="<?php echo esc_url( get_home_url() ) . '/publicaciones-guardadas/';?>" rel="nofollow" data-items="cuenta">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 296 296"><path d="M224.3 0H71.7c-11 0-20 9-20 20v256c0 8 4.7 15.2 12 18.4 7.3 3.2 15.8 1.7 21.6-3.8l62.6-58.7 62.6 58.7c3.8 3.5 8.7 5.4 13.7 5.4 2.7 0 5.4-0.5 7.9-1.6 7.3-3.2 12-10.4 12-18.4V20C244.3 9 235.4 0 224.3 0z"/></svg>                            
                            Publicaciones Guardadas
                        </a>
                    </li>
                    <li class="list-item__category">
                        <a class="item__link" href="<?php echo esc_url( wc_get_endpoint_url( 'downloads', '', get_permalink( get_option('woocommerce_myaccount_page_id') ) ) ) ;?>" rel="nofollow" data-items="cuenta">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M14.01 4v6h2V2H4v8h2.01V4h8zm-2 2v6h3l-5 6l-5-6h3V6h4z" fill="#6d6d6d"/></svg>
                            Mis Descargas
                        </a>
                    </li>
                    <li class="list-item__category">
                        <a class="item__link" href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', '', get_permalink( get_option('woocommerce_myaccount_page_id') ) ) ) ;?>" rel="nofollow" data-items="cuenta">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M13 13.14l1.17-5.94c.79-.43 1.33-1.25 1.33-2.2a2.5 2.5 0 0 0-5 0c0 .95.54 1.77 1.33 2.2zm0-9.64c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5zm1.72 4.8L18 6.97v9L13.12 18L7 15.97l-5 2v-9l5-2l4.27 1.41l1.73 7.3z" fill="#6d6d6d"/></svg>
                            Mis Direcciones
                        </a>
                    </li>
                    <li class="list-item__category">
                        <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) ) ;?>" rel="nofollow" class="item__link" data-items="cuenta">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M18 12h-2.18c-.17.7-.44 1.35-.81 1.93l1.54 1.54l-2.1 2.1l-1.54-1.54c-.58.36-1.23.63-1.91.79V19H8v-2.18c-.68-.16-1.33-.43-1.91-.79l-1.54 1.54l-2.12-2.12l1.54-1.54c-.36-.58-.63-1.23-.79-1.91H1V9.03h2.17c.16-.7.44-1.35.8-1.94L2.43 5.55l2.1-2.1l1.54 1.54c.58-.37 1.24-.64 1.93-.81V2h3v2.18c.68.16 1.33.43 1.91.79l1.54-1.54l2.12 2.12l-1.54 1.54c.36.59.64 1.24.8 1.94H18V12zm-8.5 1.5c1.66 0 3-1.34 3-3s-1.34-3-3-3s-3 1.34-3 3s1.34 3 3 3z" fill="#6d6d6d"/></svg>
                            Configuración de la cuenta
                        </a>
                    </li>
                    <?php
                        if ( is_user_logged_in() ) {
                            ?>
                                <li class="list-item__category">
                                    <a class="item__link" href="<?php echo esc_url( wc_logout_url() )?>" rel="nofollow" data-items="cuenta">Cerrar Sesión</a>
                                </li>
                            <?php
                        }
                    ?>
                    
                </ul>
            </div> <!--/category-container--> 

               <!-----------contenedor-subcatecorias-------------------------------------------------------->

            <div class="subcategory-container" id="subcategory-container">
                    <!-------------banner principales------------->
                <div class="supermenu-banner" data-categoria="tienda">
                    <img class="supermenu-banner__img" src="<?php echo plugins_url();?>/super-menu/assets/images/menu-tienda.jpg">
                </div>
                <div class="supermenu-banner" data-categoria="blog"> 
                    <img class="supermenu-banner__img" src="<?php echo plugins_url();?>/super-menu/assets/images/blog.jpg">
                </div>
                <div class="supermenu-banner" data-categoria="servicios">
                    <img class="supermenu-banner__img" src="<?php echo plugins_url();?>/super-menu/assets/images/servicios.jpg">
                </div>
                    <!------------------------subcategorias----------------------------->
            <div class="subcategory-content" data-categoria="temas">
                <ul class="subcategory-list">
                    <li class="subcategory-item subcategory-item--btn-regresar">
                        <div class="btn-regresar">
                            <a class="btn-regresar__link" href="#" >
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M464.3 207.4l0.8 0.2H135.9l103.5-103.7c5.1-5.1 7.8-11.9 7.8-19.1 0-7.2-2.8-14-7.8-19.1L223.3 49.5c-5.1-5.1-11.8-7.9-19-7.9 -7.2 0-14 2.8-19 7.8L7.8 226.9C2.8 232 0 238.8 0 246c0 7.2 2.8 14 7.8 19.1l177.4 177.4c5.1 5.1 11.8 7.8 19 7.8 7.2 0 13.9-2.8 19-7.8l16.1-16.1c5.1-5.1 7.8-11.8 7.8-19 0-7.2-2.8-13.6-7.8-18.7L134.7 284.4h330c14.8 0 27.3-12.8 27.3-27.6v-22.8C492 219.2 479.2 207.4 464.3 207.4z"/></svg>                       
                               Todas las categorias
                            </a>
                        </div>
                    </li>
                    <li class="subcategory-item subcategory-item--subcategory-name">
                        <h3 class="subcategory-name">Temas para Cumpleaños</h3>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/temas-para-cumpleanos/temas-para-cumpleanos-de-nino/' ;?>">Temas para Cumpleaños de Niño</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/temas-para-cumpleanos/temas-para-cumpleanos-de-nina/' ;?>">Temas para Cumpleaños de Niña</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/temas-para-cumpleanos/temas-para-cumpleanos-de-adulto/' ;?>">Temas para Cumpleaños de Adulto</a>
                    </li>
                </ul>
                <div class="banner-subcategory">
                    <a class="banner-link" href="#">
                        <img class="banner-img" src="<?php echo plugins_url(); ?>/super-menu/assets/images/banner-categorias/temas.jpg" alt="temas de cumpleaños">
                    </a>
                </div>
            </div>
            <div class="subcategory-content" data-categoria="especiales">
                <ul class="subcategory-list">
                    <li class="subcategory-item subcategory-item--btn-regresar">
                        <div class="btn-regresar">
                            <a class="btn-regresar__link" href="#">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M464.3 207.4l0.8 0.2H135.9l103.5-103.7c5.1-5.1 7.8-11.9 7.8-19.1 0-7.2-2.8-14-7.8-19.1L223.3 49.5c-5.1-5.1-11.8-7.9-19-7.9 -7.2 0-14 2.8-19 7.8L7.8 226.9C2.8 232 0 238.8 0 246c0 7.2 2.8 14 7.8 19.1l177.4 177.4c5.1 5.1 11.8 7.8 19 7.8 7.2 0 13.9-2.8 19-7.8l16.1-16.1c5.1-5.1 7.8-11.8 7.8-19 0-7.2-2.8-13.6-7.8-18.7L134.7 284.4h330c14.8 0 27.3-12.8 27.3-27.6v-22.8C492 219.2 479.2 207.4 464.3 207.4z"/></svg>                       
                               Todas las categorias
                            </a>
                        </div>
                    </li>
                    <li class="subcategory-item subcategory-item--subcategory-name">
                        <h3 class="subcategory-name">Ocaciones Especiales</h3>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Revelacion de Sexo</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Artículos para Baby Shower de niña</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Artículos para Baby Shower de niño</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Bautizo</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Primera Comunión</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Bodas</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Despedida de Solteros</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Fechas Patrias</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Halloween</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Navidad y Año Nuevo</a>
                    </li>
                </ul>
                <div class="banner-subcategory">
                    <a class="banner-link" href="#">
                        <img class="banner-img" src="<?php echo plugins_url(); ?>/super-menu/assets/images/banner-categorias/especiales.jpg" alt="ocasiones especiales">
                    </a>
                </div>
            </div>
            <div class="subcategory-content" data-categoria="articulos-mesa"> 
                <ul class="subcategory-list">
                    <li class="subcategory-item subcategory-item--btn-regresar">
                        <div class="btn-regresar">
                            <a class="btn-regresar__link" href="#">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M464.3 207.4l0.8 0.2H135.9l103.5-103.7c5.1-5.1 7.8-11.9 7.8-19.1 0-7.2-2.8-14-7.8-19.1L223.3 49.5c-5.1-5.1-11.8-7.9-19-7.9 -7.2 0-14 2.8-19 7.8L7.8 226.9C2.8 232 0 238.8 0 246c0 7.2 2.8 14 7.8 19.1l177.4 177.4c5.1 5.1 11.8 7.8 19 7.8 7.2 0 13.9-2.8 19-7.8l16.1-16.1c5.1-5.1 7.8-11.8 7.8-19 0-7.2-2.8-13.6-7.8-18.7L134.7 284.4h330c14.8 0 27.3-12.8 27.3-27.6v-22.8C492 219.2 479.2 207.4 464.3 207.4z"/></svg>                       
                               Todas las categorias
                            </a>
                        </div>
                    </li>
                    <li class="subcategory-item subcategory-item--subcategory-name">
                        <h3 class="subcategory-name">Artículos para la Mesa</h3>
                    </li>
                    <li class="subcategory-item">                
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/articulos-para-mesa/manteles-para-fiesta/' ;?>">Manteles</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/articulos-para-mesa/platos-para-fiestas/' ;?>">Platos</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/articulos-mesa/vasos/' ;?>">Vasos</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/articulos-mesa/servilletas/' ;?>">Servilletas</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/articulos-mesa/pajillas/' ;?>">Pajillas</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/articulos-mesa/cubiertos/' ;?>">Cubiertos</a>
                    </li>           
                </ul>
                <div class="banner-subcategory">
                    <a class="banner-link" href="<?php echo esc_url( get_home_url() ) . '/articulos-mesa/' ;?>">
                        <img class="banner-img" src="<?php echo plugins_url(); ?>/super-menu/assets/images/banner-categorias/articulos-mesa.jpg" alt="articulos de fiesta para la mesa">
                    </a>
                </div>
            </div>
            <div class="subcategory-content" data-categoria="articulos-decoracion">
                
                
                <ul class="subcategory-list">
                    <li class="subcategory-item subcategory-item--btn-regresar">
                        <div class="btn-regresar">
                            <a class="btn-regresar__link" href="#">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M464.3 207.4l0.8 0.2H135.9l103.5-103.7c5.1-5.1 7.8-11.9 7.8-19.1 0-7.2-2.8-14-7.8-19.1L223.3 49.5c-5.1-5.1-11.8-7.9-19-7.9 -7.2 0-14 2.8-19 7.8L7.8 226.9C2.8 232 0 238.8 0 246c0 7.2 2.8 14 7.8 19.1l177.4 177.4c5.1 5.1 11.8 7.8 19 7.8 7.2 0 13.9-2.8 19-7.8l16.1-16.1c5.1-5.1 7.8-11.8 7.8-19 0-7.2-2.8-13.6-7.8-18.7L134.7 284.4h330c14.8 0 27.3-12.8 27.3-27.6v-22.8C492 219.2 479.2 207.4 464.3 207.4z"/></svg>                       
                               Todas las categorias
                            </a>
                        </div>
                    </li>
                    <li class="subcategory-item subcategory-item--subcategory-name">
                        <h3 class="subcategory-name">Artículos de Decoración</h3>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/articulos-decoracion/cortinas-decorativas/' ;?>">Guirnaldas</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Pompones</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Banderines</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Móviles</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Envases</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/articulos-decorativos/velas-y-vengalas/' ;?>">Velas y Vengalas</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Bases Decorativas</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Otros</a>
                    </li>
                </ul>
                <div class="banner-subcategory">
                    <a class="banner-link" href="<?php echo esc_url( get_home_url() ) . '/articulos-decoracion/' ;?>">
                        <img class="banner-img" src="<?php echo plugins_url(); ?>/super-menu/assets/images/banner-categorias/articulos-decorativos.jpg" alt="articulos decorativos para fiestas">
                    </a>
                </div>
            </div>
            <div class="subcategory-content" data-categoria="pinateria">
                <ul class="subcategory-list">
                    <li class="subcategory-item subcategory-item--btn-regresar">
                        <div class="btn-regresar">
                            <a class="btn-regresar__link" href="#">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M464.3 207.4l0.8 0.2H135.9l103.5-103.7c5.1-5.1 7.8-11.9 7.8-19.1 0-7.2-2.8-14-7.8-19.1L223.3 49.5c-5.1-5.1-11.8-7.9-19-7.9 -7.2 0-14 2.8-19 7.8L7.8 226.9C2.8 232 0 238.8 0 246c0 7.2 2.8 14 7.8 19.1l177.4 177.4c5.1 5.1 11.8 7.8 19 7.8 7.2 0 13.9-2.8 19-7.8l16.1-16.1c5.1-5.1 7.8-11.8 7.8-19 0-7.2-2.8-13.6-7.8-18.7L134.7 284.4h330c14.8 0 27.3-12.8 27.3-27.6v-22.8C492 219.2 479.2 207.4 464.3 207.4z"/></svg>                       
                               Todas las categorias
                            </a>
                        </div>
                    </li>
                    <li class="subcategory-item subcategory-item--subcategory-name">
                        <h3 class="subcategory-name">Piñatería</h3>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/pinatas/pinatas-para-nino/' ;?>">Piñatas para Niño</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/pinatas/pinatas-para-nina/' ;?>">Piñatas para Niña</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/pinatas/pinata-para-adulto/' ;?>">Piñatas para Adulto</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Marcos para Fotos</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Imágenes Decorativas</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Buzones</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Centros de Mesa</a>
                    </li>
                </ul>
                <div class="banner-subcategory">
                    <a class="banner-link" href="<?php echo esc_url( get_home_url() ) . '/pinatas/' ;?>">
                        <img class="banner-img" src="<?php echo plugins_url(); ?>/super-menu/assets/images/banner-categorias/pinateria.jpg" alt="articulos de piñateria">
                    </a>
                </div>
            </div>
            <div class="subcategory-content" data-categoria="candy-bar">
                <ul class="subcategory-list">
                    <li class="subcategory-item subcategory-item--btn-regresar">
                        <div class="btn-regresar">
                            <a class="btn-regresar__link" href="#">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M464.3 207.4l0.8 0.2H135.9l103.5-103.7c5.1-5.1 7.8-11.9 7.8-19.1 0-7.2-2.8-14-7.8-19.1L223.3 49.5c-5.1-5.1-11.8-7.9-19-7.9 -7.2 0-14 2.8-19 7.8L7.8 226.9C2.8 232 0 238.8 0 246c0 7.2 2.8 14 7.8 19.1l177.4 177.4c5.1 5.1 11.8 7.8 19 7.8 7.2 0 13.9-2.8 19-7.8l16.1-16.1c5.1-5.1 7.8-11.8 7.8-19 0-7.2-2.8-13.6-7.8-18.7L134.7 284.4h330c14.8 0 27.3-12.8 27.3-27.6v-22.8C492 219.2 479.2 207.4 464.3 207.4z"/></svg>                       
                               Todas las categorias
                            </a>
                        </div>
                    </li>
                    <li class="subcategory-item subcategory-item--subcategory-name">
                        <h3 class="subcategory-name">Candy Bar</h3>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Toppers</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Etiquetas Personalizadas</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Promociones</a>
                    </li>       
                </ul>
                <div class="banner-subcategory">
                    <a class="banner-link" href="<?php echo esc_url( get_home_url() ) . '/candy-bar/' ;?>">
                        <img class="banner-img" src="<?php echo plugins_url(); ?>/super-menu/assets/images/banner-categorias/candy.jpg" alt="candy bar personalizado">
                    </a>
                </div>
            </div>
            <div class="subcategory-content" data-categoria="globos">
                <ul class="subcategory-list">
                    <li class="subcategory-item subcategory-item--btn-regresar">
                        <div class="btn-regresar">
                            <a class="btn-regresar__link" href="#">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M464.3 207.4l0.8 0.2H135.9l103.5-103.7c5.1-5.1 7.8-11.9 7.8-19.1 0-7.2-2.8-14-7.8-19.1L223.3 49.5c-5.1-5.1-11.8-7.9-19-7.9 -7.2 0-14 2.8-19 7.8L7.8 226.9C2.8 232 0 238.8 0 246c0 7.2 2.8 14 7.8 19.1l177.4 177.4c5.1 5.1 11.8 7.8 19 7.8 7.2 0 13.9-2.8 19-7.8l16.1-16.1c5.1-5.1 7.8-11.8 7.8-19 0-7.2-2.8-13.6-7.8-18.7L134.7 284.4h330c14.8 0 27.3-12.8 27.3-27.6v-22.8C492 219.2 479.2 207.4 464.3 207.4z"/></svg>                       
                               Todas las categorias
                            </a>
                        </div>
                    </li>
                    <li class="subcategory-item subcategory-item--subcategory-name">
                        <h3 class="subcategory-name">Globos</h3>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/globos/globos-de-latex/' ;?>">Globos de Latex</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/globos/globos-cromados/' ;?>">Globos Cromados</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Globos de Números y Letras</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/globos/globos-personajes/' ;?>">Globos de Personajes</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Globos con Mensajes</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Globos Confeti</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/globos/globos-gigantes/' ;?>">Globos Gigantes</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Globos Personalizado</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="<?php echo esc_url( get_home_url() ) . '/globos/accesorios-para-globos/' ;?>">Accesorios para globos</a>
                    </li>
                </ul>
                <div class="banner-subcategory">
                    <a class="banner-link" href="<?php echo esc_url( get_home_url() ) . '/globos/' ;?>">
                        <img class="banner-img" src="<?php echo plugins_url(); ?>/super-menu/assets/images/banner-categorias/globos.jpg" alt="globos">
                    </a>
                </div>
            </div>
            <div class="subcategory-content" data-categoria="golosinas">
                <ul class="subcategory-list">
                    <li class="subcategory-item subcategory-item--btn-regresar">
                        <div class="btn-regresar">
                            <a class="btn-regresar__link" href="#">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M464.3 207.4l0.8 0.2H135.9l103.5-103.7c5.1-5.1 7.8-11.9 7.8-19.1 0-7.2-2.8-14-7.8-19.1L223.3 49.5c-5.1-5.1-11.8-7.9-19-7.9 -7.2 0-14 2.8-19 7.8L7.8 226.9C2.8 232 0 238.8 0 246c0 7.2 2.8 14 7.8 19.1l177.4 177.4c5.1 5.1 11.8 7.8 19 7.8 7.2 0 13.9-2.8 19-7.8l16.1-16.1c5.1-5.1 7.8-11.8 7.8-19 0-7.2-2.8-13.6-7.8-18.7L134.7 284.4h330c14.8 0 27.3-12.8 27.3-27.6v-22.8C492 219.2 479.2 207.4 464.3 207.4z"/></svg>                       
                               Todas las Categorías
                            </a>
                        </div>
                    </li>
                    <li class="subcategory-item subcategory-item--subcategory-name">
                        <h3 class="subcategory-name">Golosinas</h3>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Relleno para Piñata</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Caramelos y Paletas</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Galletas</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Snacks</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Chocolates</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Malvaviscos y Gomitas</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Bebidas</a>
                    </li>
                </ul>
                <div class="banner-subcategory">
                    <a class="banner-link" href="#">
                        <img class="banner-img" src="<?php echo plugins_url(); ?>/super-menu/assets/images/banner-categorias/globos.jpg" alt="globos">
                    </a>
                </div>
            </div>
            <div class="subcategory-content" data-categoria="disfraces">
                <ul class="subcategory-list">
                    <li class="subcategory-item subcategory-item--btn-regresar">
                        <div class="btn-regresar">
                            <a class="btn-regresar__link" href="#">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M464.3 207.4l0.8 0.2H135.9l103.5-103.7c5.1-5.1 7.8-11.9 7.8-19.1 0-7.2-2.8-14-7.8-19.1L223.3 49.5c-5.1-5.1-11.8-7.9-19-7.9 -7.2 0-14 2.8-19 7.8L7.8 226.9C2.8 232 0 238.8 0 246c0 7.2 2.8 14 7.8 19.1l177.4 177.4c5.1 5.1 11.8 7.8 19 7.8 7.2 0 13.9-2.8 19-7.8l16.1-16.1c5.1-5.1 7.8-11.8 7.8-19 0-7.2-2.8-13.6-7.8-18.7L134.7 284.4h330c14.8 0 27.3-12.8 27.3-27.6v-22.8C492 219.2 479.2 207.4 464.3 207.4z"/></svg>                       
                               Todas las categorias
                            </a>
                        </div>
                    </li>
                    <li class="subcategory-item subcategory-item--subcategory-name">
                        <h3 class="subcategory-name">Disfraces</h3>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Disfraz para Niño</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Disfraz para Niña</a>
                    </li>
                    <li class="subcategory-item">
                        <a class="subcategory-link" href="#">Disfraz para Bebés</a>
                    </li>    
                </ul>
                <div class="banner-subcategory">
                    <a class="banner-link" href="#">
                        <img class="banner-img" src="<?php echo plugins_url(); ?>/super-menu/assets/images/banner-categorias/disfraz.jpg" alt="disfaces">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- contenedor grid fondo -->

<?php 
$salida = ob_get_clean();
echo $salida;
}

}
// function ajax 
add_filter( 'woocommerce_add_to_cart_fragments', 'cart_contents_count_template_ajax' );

if ( !function_exists('cart_contents_count_template_ajax')) {
	function cart_contents_count_template_ajax( $fragments ) {
            ob_start();
	?>
		<a class="cart-contents-template-fiesta" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="Ver Carrito">
            <?php echo '<svg class="icon icon--cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M6 13h9c.55 0 1 .45 1 1s-.45 1-1 1H5c-.55 0-1-.45-1-1V4H2c-.55 0-1-.45-1-1s.45-1 1-1h3c.55 0 1 .45 1 1v2h13l-4 7H6v1zm-.5 3c.83 0 1.5.67 1.5 1.5S6.33 19 5.5 19S4 18.33 4 17.5S4.67 16 5.5 16zm9 0c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5z" fill="#fff"/></svg>'; ?> 
			<span class="items-count"> <?php echo WC()->cart->get_cart_contents_count(); ?> </span>
			<?php echo WC()->cart->get_cart_total(); ?>
		</a>	
	<?php
	$fragments['a.cart-contents-template-fiesta'] = ob_get_clean();
		return $fragments;
        
	
	}
}
?>