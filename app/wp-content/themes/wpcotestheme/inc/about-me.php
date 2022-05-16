<?php
/**
 * Plugin Name: About Me
 * Description: Complemento para mostrar información sobre nosotros
 */

//register scripts
add_action('wp_enqueue_scripts', 'register_scripts_about_me');

if ( !function_exists('register_scripts_about_me') ) {
    function register_scripts_about_me() {
        if ( is_front_page() ) {
            wp_enqueue_style('about-me-css', plugins_url() . '/about-me/assets/css/about-me.css', array(), '1.1', 'all');
            // wp_enqueue_script('about-me-js', plugins_url() . '/about-me/assets/js/about-me.js', array(), '1.1', true);
        }
    }
}
//add hook container
add_action('wpcotestheme_loop_before', 'about_me', 26);

if ( !function_exists('about_me') ) {
    function about_me() {
        if ( ! is_front_page(  )) return;
        ?>
        <section class="about__container">
            <span class="about__title">Quienes Somos</span>
            <p class="description">Somos un equipo de trabajo que nos encanta lo que hacemos y queremos compartirlo contigo.</p>

            <p class="description">Nuestra Misión es ayudarte, ofrecerte diversas opciones para organizar tu evento, brindándote asesoría, que puedas realizar tus pedidos y consultas con la mayor comodidad posible y haciéndote la vida más fácil.</p>

            <p class="description">Tenemos todo para ti, desde <strong>Ventas de Artículos de Decoración para Fiestas Temáticas</strong> así como diferentes Servicios Especiales.</p>

            <div class="about__content">
                <div class="about__main">
                    <div class="about__profile">
                        <div class="about__image">
                            <figure>
                                <img class="about__img" src="<?php echo plugins_url(); ?>/about-me/assets/images/willy.jpg" alt="imagen de perfil">
                                <figcaption class="about__name">Willy Cotes</figcaption>
                            </figure>
                            <div class="about__social">
                                <a class="icon-link" target="_blank" href="https://www.facebook.com/willy.cotes/"><svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M2.89 2h14.23c.49 0 .88.39.88.88v14.24c0 .48-.39.88-.88.88h-4.08v-6.2h2.08l.31-2.41h-2.39V7.85c0-.7.2-1.18 1.2-1.18h1.28V4.51c-.22-.03-.98-.09-1.86-.09c-1.85 0-3.11 1.12-3.11 3.19v1.78H8.46v2.41h2.09V18H2.89a.89.89 0 0 1-.89-.88V2.88c0-.49.4-.88.89-.88z" fill="#3b5998"/></svg></a>
                                <a class="icon-link" target="_blank" href="https://www.instagram.com/willy_cotes/"><svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M12.7 10c0-1.5-1.2-2.7-2.7-2.7S7.3 8.5 7.3 10s1.2 2.7 2.7 2.7c1.5 0 2.7-1.2 2.7-2.7zm1.4 0c0 2.3-1.8 4.1-4.1 4.1S5.9 12.3 5.9 10S7.7 5.9 10 5.9s4.1 1.8 4.1 4.1zm1.1-4.3c0 .6-.4 1-1 1s-1-.4-1-1s.4-1 1-1s1 .5 1 1zM10 3.4c-1.2 0-3.7-.1-4.7.3c-.7.3-1.3.9-1.5 1.6c-.4 1-.3 3.5-.3 4.7s-.1 3.7.3 4.7c.2.7.8 1.3 1.5 1.5c1 .4 3.6.3 4.7.3s3.7.1 4.7-.3c.7-.3 1.2-.8 1.5-1.5c.4-1.1.3-3.6.3-4.7s.1-3.7-.3-4.7c-.2-.7-.8-1.3-1.5-1.5c-1-.5-3.5-.4-4.7-.4zm8 6.6v3.3c0 1.2-.4 2.4-1.3 3.4c-.9.9-2.1 1.3-3.4 1.3H6.7c-1.2 0-2.4-.4-3.4-1.3c-.8-.9-1.3-2.1-1.3-3.4V10V6.7c0-1.3.5-2.5 1.3-3.4C4.3 2.5 5.5 2 6.7 2h6.6c1.2 0 2.4.4 3.4 1.3c.8.9 1.3 2.1 1.3 3.4V10z" fill="#E1306C"/></svg></a>
                                <a class="icon-link" target="_blank" href="https://www.linkedin.com/in/willy-cotes/"><svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M2.5 18h3V6.9h-3V18zM4 2c-1 0-1.8.8-1.8 1.8S3 5.6 4 5.6s1.8-.8 1.8-1.8S5 2 4 2zm6.6 6.6V6.9h-3V18h3v-5.7c0-3.2 4.1-3.4 4.1 0V18h3v-6.8c0-5.4-5.7-5.2-7.1-2.6z" fill="#0e76a8"/></svg></a>
                            </div>
                        </div>
                        <p class="about__text">
                            "Que satisfacción es hacer lo que me gusta y al mismo tiempo hacer posible de manera fácil esos momentos especiales que tenemos para disfrutar y compartir en familia"
                            <span class="about__profession">Cofundador y CEO</span>
                        </p>
                        
                    </div>
                    <div class="about__profile">
                        <div class="about__image">
                            <figure>
                                <img class="about__img" src="<?php echo plugins_url(); ?>/about-me/assets/images/yune.jpg" alt="imagen de perfil">
                                <figcaption class="about__name">Yunneidys Romero</figcaption>
                            </figure>
                            <div class="about__social">
                                <a class="icon-link" target="_blank" href="https://www.facebook.com/yunee.romeroo"><svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M2.89 2h14.23c.49 0 .88.39.88.88v14.24c0 .48-.39.88-.88.88h-4.08v-6.2h2.08l.31-2.41h-2.39V7.85c0-.7.2-1.18 1.2-1.18h1.28V4.51c-.22-.03-.98-.09-1.86-.09c-1.85 0-3.11 1.12-3.11 3.19v1.78H8.46v2.41h2.09V18H2.89a.89.89 0 0 1-.89-.88V2.88c0-.49.4-.88.89-.88z" fill="#3b5998"/></svg></a>
                                <a class="icon-link" target="_blank" href="https://www.instagram.com/yuneeromero/"><svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M12.7 10c0-1.5-1.2-2.7-2.7-2.7S7.3 8.5 7.3 10s1.2 2.7 2.7 2.7c1.5 0 2.7-1.2 2.7-2.7zm1.4 0c0 2.3-1.8 4.1-4.1 4.1S5.9 12.3 5.9 10S7.7 5.9 10 5.9s4.1 1.8 4.1 4.1zm1.1-4.3c0 .6-.4 1-1 1s-1-.4-1-1s.4-1 1-1s1 .5 1 1zM10 3.4c-1.2 0-3.7-.1-4.7.3c-.7.3-1.3.9-1.5 1.6c-.4 1-.3 3.5-.3 4.7s-.1 3.7.3 4.7c.2.7.8 1.3 1.5 1.5c1 .4 3.6.3 4.7.3s3.7.1 4.7-.3c.7-.3 1.2-.8 1.5-1.5c.4-1.1.3-3.6.3-4.7s.1-3.7-.3-4.7c-.2-.7-.8-1.3-1.5-1.5c-1-.5-3.5-.4-4.7-.4zm8 6.6v3.3c0 1.2-.4 2.4-1.3 3.4c-.9.9-2.1 1.3-3.4 1.3H6.7c-1.2 0-2.4-.4-3.4-1.3c-.8-.9-1.3-2.1-1.3-3.4V10V6.7c0-1.3.5-2.5 1.3-3.4C4.3 2.5 5.5 2 6.7 2h6.6c1.2 0 2.4.4 3.4 1.3c.8.9 1.3 2.1 1.3 3.4V10z" fill="#E1306C"/></svg></a>
                                <a class="icon-link" target="_blank" href="https://linkedin.com/in/yuneidys-romero"><svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M2.5 18h3V6.9h-3V18zM4 2c-1 0-1.8.8-1.8 1.8S3 5.6 4 5.6s1.8-.8 1.8-1.8S5 2 4 2zm6.6 6.6V6.9h-3V18h3v-5.7c0-3.2 4.1-3.4 4.1 0V18h3v-6.8c0-5.4-5.7-5.2-7.1-2.6z" fill="#0e76a8"/></svg></a>
                            </div>
                        </div>
                        <p class="about__text">
                            "Desde niña siempre fui creativa y apasionada por el detalle y las cosas bonitas gracias a mi abuela, hoy en día he podido ver el fruto de mi trabajo creativo en la vida de los demás y es maravilloso formar parte de ello y que valoren lo que hago"
                            <span class="about__profession">Cofundadora y Directora Creativa</span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- <a class="btn__about" href="#">Conocer más<span class="icon
            icon-arrow-right2"></span></a> -->
        </section>
        <?php
    }
}
?>