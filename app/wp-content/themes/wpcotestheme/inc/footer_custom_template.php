<?php 
/*
*Plugin Name: Footer Custom template
*Description: diseño y estructura del footer personalizado responsive
*
*/


    //register style and scripts

add_action('wp_enqueue_scripts', 'register_scripts_footer_custom_template');

if ( !function_exists( 'register_scripts_footer_custom_template' )) {

    function register_scripts_footer_custom_template() {
        wp_enqueue_style( 'footer-template-css', plugins_url() . '/footer-custom-template/assets/css/footer.css', array(), '1.1', 'all');
    }
}



//remove hook of footer 

// * Functions hooked in to wpcotestheme_footer action
//              *
//              * @hooked wpcotestheme_footer_widgets - 10
//              * @hooked wpcotestheme_credit         - 20

add_action('wp_head', 'remove_footer_custom_template_hook');

if ( !function_exists('remove_footer_custom_template_hook')) {
    function remove_footer_custom_template_hook() {
        remove_action('wpcotestheme_footer', 'wpcotestheme_credit', 20);
        remove_action('wpcotestheme_footer', 'wpcotestheme_handheld_footer_bar', 999 );
    }
}


//agregando nueva funcion al footer por hook 

add_action('wpcotestheme_footer', 'footer_custom_tempate');

if ( !function_exists('footer_custom_tempate')) {
    function footer_custom_tempate() { 
        ob_start();
    ?>
        <div class="footer-content" id="footer-content">
            <div class="social-bar">
                <ul class="social-bar__list social-bar__list--footer">
                    <li class="social-bar__item social-bar__item">
                        <a target="_blank" class="social-bar__link" href="https://www.facebook.com/wpcotestheme/">
                        <svg class="icon icon--facebook" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M8.46 18h2.93v-7.3h2.45l.37-2.84h-2.82V6.04c0-.82.23-1.38 1.41-1.38h1.51V2.11c-.26-.03-1.15-.11-2.19-.11c-2.18 0-3.66 1.33-3.66 3.76v2.1H6v2.84h2.46V18z" fill="#fff"/></svg>                        
                    </a>
                    </li>
                    <li class="social-bar__item social-bar__item">
                        <a target="_blank" class="social-bar__link" href="https://www.pinterest.com/wycreaciones/">
                        <svg class="icon icon--pinterest" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M10.2 2C5.8 2 3.5 4.8 3.5 7.9c0 1.5.8 3 2.1 3.8c.4.2.3 0 .6-1.2c0-.1 0-.2-.1-.3C4.3 8 5.8 3.7 10 3.7c6.1 0 4.9 8.4 1.1 8.4c-.8.1-1.5-.5-1.5-1.3v-.4c.4-1.1.7-2.1.8-3.2c0-2.1-3.1-1.8-3.1 1c0 .5.1 1 .3 1.4c0 0-1 4.1-1.2 4.8c-.2 1.2-.1 2.4.1 3.5c-.1.1 0 .1 0 .1h.1c.7-1 1.3-2 1.7-3.1c.1-.5.6-2.3.6-2.3c.5.7 1.4 1.1 2.3 1.1c3.1 0 5.3-2.7 5.3-6S13.7 2 10.2 2z" fill="#fff"/></svg>                        
                    </a>
                    </li>
                    <li class="social-bar__item social-bar__item">
                        <a target="_blank" class="social-bar__link" href="https://www.instagram.com/wpcotestheme/">
                        <svg class="icon icon--instagram" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M12.7 10c0-1.5-1.2-2.7-2.7-2.7S7.3 8.5 7.3 10s1.2 2.7 2.7 2.7c1.5 0 2.7-1.2 2.7-2.7zm1.4 0c0 2.3-1.8 4.1-4.1 4.1S5.9 12.3 5.9 10S7.7 5.9 10 5.9s4.1 1.8 4.1 4.1zm1.1-4.3c0 .6-.4 1-1 1s-1-.4-1-1s.4-1 1-1s1 .5 1 1zM10 3.4c-1.2 0-3.7-.1-4.7.3c-.7.3-1.3.9-1.5 1.6c-.4 1-.3 3.5-.3 4.7s-.1 3.7.3 4.7c.2.7.8 1.3 1.5 1.5c1 .4 3.6.3 4.7.3s3.7.1 4.7-.3c.7-.3 1.2-.8 1.5-1.5c.4-1.1.3-3.6.3-4.7s.1-3.7-.3-4.7c-.2-.7-.8-1.3-1.5-1.5c-1-.5-3.5-.4-4.7-.4zm8 6.6v3.3c0 1.2-.4 2.4-1.3 3.4c-.9.9-2.1 1.3-3.4 1.3H6.7c-1.2 0-2.4-.4-3.4-1.3c-.8-.9-1.3-2.1-1.3-3.4V10V6.7c0-1.3.5-2.5 1.3-3.4C4.3 2.5 5.5 2 6.7 2h6.6c1.2 0 2.4.4 3.4 1.3c.8.9 1.3 2.1 1.3 3.4V10z" fill="#fff"/></svg>                        
                    </a>
                    </li>
                    <li class="social-bar__item social-bar__item">
                        <a target="_blank" class="social-bar__link" href="mailto:ventas@todofiestaonline.com">
                        <svg class="icon icon--gmail" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M19 14.5v-9c0-.83-.67-1.5-1.5-1.5H3.49c-.83 0-1.5.67-1.5 1.5v9c0 .83.67 1.5 1.5 1.5H17.5c.83 0 1.5-.67 1.5-1.5zm-1.31-9.11c.33.33.15.67-.03.84L13.6 9.95l3.9 4.06c.12.14.2.36.06.51c-.13.16-.43.15-.56.05l-4.37-3.73l-2.14 1.95l-2.13-1.95l-4.37 3.73c-.13.1-.43.11-.56-.05c-.14-.15-.06-.37.06-.51l3.9-4.06l-4.06-3.72c-.18-.17-.36-.51-.03-.84s.67-.17.95.07l6.24 5.04l6.25-5.04c.28-.24.62-.4.95-.07z" fill="#fff"/></svg>                        
                    </a>
                    </li>
                    <li class="social-bar__item social-bar__item">
                        <a class="social-bar__link" href="#">
                        <svg class="icon icon--youtube" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="vertical-align: -0.125em;-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M17.7 5.3c-.2-.7-.7-1.2-1.4-1.4c-2.1-.2-4.2-.4-6.3-.3c-2.1 0-4.2.1-6.3.3c-.6.2-1.2.8-1.4 1.4a37.08 37.08 0 0 0 0 9.4c.2.7.7 1.2 1.4 1.4c2.1.2 4.2.4 6.3.3c2.1 0 4.2-.1 6.3-.3c.7-.2 1.2-.7 1.4-1.4a37.08 37.08 0 0 0 0-9.4zM8 13V7l5.2 3L8 13z" fill="#fff"/></svg>                        
                    </a>
                    </li>
                </ul>
            </div>
            <nav class="footer-navigation">
                <div class="footer__column-row">
                    <h2 class="footer-nav__titles">ATENCIÓN AL CLIENTE</h2>
                    <ul class="footer-nav__list">
                        <li class="footer-nav__items">
                            <a href="#" class="footer-nav__link">Guía de Compra</a>
                        </li>
                        <li class="footer-nav__items">
                            <a href="#" class="footer-nav__link">Preguntas Frecuentes</a>
                        </li>
                        <li class="footer-nav__items">
                            <a href="#" class="footer-nav__link">Aviso Legal</a>
                        </li>
                        <li class="footer-nav__items">
                            <a href="#" class="footer-nav__link">Política de Privacidad</a>
                        </li>
                        <li class="footer-nav__items">
                            <a href="#" class="footer-nav__link">Devoluciones</a>
                        </li>
                        <li class="footer-nav__items">
                            <a href="#" class="footer-nav__link">Política de Cookies</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__column-row">
                    <h2 class="footer-nav__titles">TODOFIESTAONLINE</h2>
                    <ul class="footer-nav__list">
                        <li class="footer-nav__items">
                            <a href="#" class="footer-nav__link">Quiénes Somos</a>
                        </li>
                        <li class="footer-nav__items">
                            <a href="#" class="footer-nav__link">Afiliados</a>
                        </li>
                        <li class="footer-nav__items">
                            <a href="#" class="footer-nav__link">Tiendas</a>
                        </li>
                        <li class="footer-nav__items">
                            <a href="#" class="footer-nav__link">Contactanos</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__column-row footer__column-row--text">
                    <h2 class="footer-nav__titles">PRINCIPAL</h2>
                    <ul class="footer-nav__list">
                        <li class="footer-nav__items">
                            <span class="icon-location"></span>
                            TodoFiestaOnline, Panamá Oeste, Valle de San Bernandino Calle 2da, n° 48.</li>
                        <li class="footer-nav__items">
                            <span class="icon-phone"></span>
                            Llamanos ahora: (507) 62723327 - 60575295</li>
                        <li class="footer-nav__items">
                            <span class="icon-mail3"></span>
                            Email:web@todofiestaonline.com</li>
                    </ul>
                </div>
            </nav>
            <span id="footerClose"><svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M14.95 6.46L11.41 10l3.54 3.54l-1.41 1.41L10 11.42l-3.53 3.53l-1.42-1.42L8.58 10L5.05 6.47l1.42-1.42L10 8.58l3.54-3.53z" fill="#626262"/></svg></span>
            <!--icon-cerrar-->
            <div class="footer-bar">
                <p class="footer-bar__texto">Copyright 2020 TodoFiestaOnlineOnline&#169;. Todos los Derechos Reservados.</p>
            </div>
        </div>
    <?php 
    $output = ob_get_clean();
    echo $output;
    } 
}