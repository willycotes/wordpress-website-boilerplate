<div align="center">
	<h1>WPCotesFramework</h1>
	<p>WPCotesFramework ofrece una estructura base para proyectos basados en WordPress que los programadores pueden usar, complementar o modificar según sus objetivos.
Este framework nos proporciona un "esqueleto" sobre el cual trabajar y permite, principalmente, agilizar el proceso de desarrollo y facilitar el mantenimiento de nuestro sitio web, utilizando las configuraciones, herramientas y módulos incorporados, en nuestros desarrollos.</p>
</div>

---------------------------------------

## Características de WPCotesFramework

* Configuraciones separadas por entorno.
* Variables de entorno.
* Composer para administrar dependencias, plugins y el core de WordPress.
* Plugins de inicio pre-instalados.
* Núcleo de WordPress separado del contenido.
* Tema de inicio "WPCotesTheme" pre-instalado y activado por defecto.
* Configuración para trabajar con WP-CLI y gestionar los diferentes entornos.
* Configuración para hacer deploy al servidor de producción a través de GitHub Actions mediante SSH.

# Requerimientos

- [PHP 7.4.29](https://www.php.net/downloads.php).
- [Composer](https://getcomposer.org/).
- [WP-CLI](https://wp-cli.org/).
- [WP-CLI Dotenv Command](https://aaemnnost.tv/wp-cli-commands/dotenv/).
- [Git](https://git-scm.com/).

Este framework usa composer para administrar sus dependencias, complementos necesarios y el tema de inicio instalado y definido por defecto(WPCotesTheme).
Varias de las dependencias son clases personalizadas que amplían alguna de las funcionalidades de WordPress.

Dependencias personalizadas

- **WPCotesFramework_config**, API que permite añadir los archivos de configuración de WordPress utilizando variables de entornos(Usa "dotenv" como dependencia).
- ****

## Pasos para iniciar el proyecto:

1. Clonar el repositorio `git clone https://github.com/willycotes/wpcotesframework.git`.
2. Instalar todas las dependencias del proyecto ejecutando el comando `composer install`.
3. Editar el archivo *.env.sample* estableciendo los valores correctos de las variables de entorno y renombrar a *.env*.
4. Definir en el servidor el "DocumentRoot" apuntando a */path/to/site/app* y generar el archivo *.htaccess* de WordPress a través de WP_CLI ejecutando el comando `wp rewrite flush --hard`.
	* **Nota:** En caso de que no podamos definir el DocumentRoot en nuestro servidor, podemos renombrar y editar los archivos *.htaccess.sample* ya incluidos, estableciendo las reglas de reescritura correctamente según la estructura del proyecto que tengamos o podemos adaptar ésta a la carpeta pública que tengamos, en este caso, tomaremos este directorio como si fuera nuestro subdirectorio *wpcotesframework/app/* y definimos esto en las configuraciones correspondientes. [ver más](https://github.com/willycotes/wpcotesframework/wiki#enlace-1).
5. Revisar y activar plugins incluidos en la configuración con `wp plugin activate <plugin_ID>` o `wp plugin activate --all`
6. Verificar que toda la configuración este correcta y el sitio esté funcionando. Podemos seguir las siguientes sugerencias:
	- Ejecutar el comando `wp config list`, para verificar que el archivo *wp-config.php* esté correctamente.
	- Ejecutar el comando `wp dotenv list`, para verificar que el archivo *.env* esté cargado y las variables de entornos estén establecidas correctamente para su entorno. 
	- Ejecutar el comando `wp plugin list`, para verificar la lista de plugin instalados y activos.

## Archivo de configuración de WordPress.

Esta instalación contiene una clase de configuración personalizada, el cual, maneja las definiciones de las constantes del wp-config.php de WordPress a través de variables de entornos utilizando dotenv como dependencia y archivos específicos según el entorno en el que estemos.

## WP CLI

Para utilizar correctamente la herramienta WP-CLI sobre este proyecto, definimos un archivo de configuración cn el nombre de *wp-cli.yml* de la siguiente manera:

    apache_modules:
      - mod_rewrite

    path: wordpress/

    @staging:
      ssh: user@host/path/to/WordPress
      path: wordpress/

    @production:
      ssh: u989690031@156.67.72.1:65002~/domains/brandketings.com/public_html/

### ¿Que dice este archivo de configuración?

1.  La opción "apache_modules" se configura para hacer posible la generación del archivo *.htaccess* por medio de `wp rewrite flush --hard`.
2.  Indicamos la ruta la instalación de WordPress.
3.  Luego configuramos varios alias que corresponden a cada entorno que queremos que apunten nuestros comandos de WP_CLI.

**Sintaxis:**

    // wp-cli.yml
    @alias:
    ssh: user@host/path/to/wordpress

**Ejemplo:**

    // wp-cli.yml

    @production:
      ssh: user@host/path/to/WordPress

    @development:
      ssh: vagrant@example.test/srv/www/example.com/current

Luego podemos ejecutar los comandos de esta manera:

    $ wp @production plugin activate --all

    $ wp @development plugin activate --all

**Para el entorno *local* no es necesario que le agreguemos un alias, ya que los comandos por defecto apuntará a éste entorno.**

## Actualización de WordPress.

Por medio de composer

### Recursos:

- [git flow](https://nvie.com/posts/a-successful-git-branching-model/)

## Deploy with github actions.

Deploy with github actions usando una conexion ssh con el paquete [appleboy/ssh-action@master](https://github.com/appleboy/ssh-action) package.

**See [video tutorial](https://www.youtube.com/watch?v=gW1TDirJ5E4) for more information.**

### Plugins WordPress preconfigurados por defecto a través de *composer.json*.

- autoptimize
- query-monitor
- wordpress-seo
- mailchimp-for-wp
- ultimate-addons-for-gutenberg
- wdvp-whatsapp-button 
- google-analytics-and-pixel-facebook

### Plugins WordPress para Woocommerce.

- woocommerce 
- woocommerce-pdf-invoices-packing-slips 
- nextend-facebook-connect 
- facebook-for-woocommerce 
- woo-product-feed-pro 
- woo-variation-swatches 
- woo-variation-gallery 
- woocommerce-paypal-payments 
- mailchimp-for-woocommerce 
- ajax-search-for-woocommerce

### Plugins premiun de WordPress para Woocommerce

- show-single-variations-premium 
- woo-variation-swatches-pro
- wdvp-panama-shipping-zone 
- wdvp-enable-gutenberg-woocommerce
- plugin-yappi

--------------------------

## Configuración de WPCotesFramework.

WP_HOME - URL completa de la página de inicio de WordPress (https://example.com/).
WP_SITEURL - URL completa de la instalación de WordPress (https://example.com/wordpress/).

NOTA: WordPress esta configurado para crear el archivo *.htaccess* en la raiz del sitio y usa el valor de la constante WP_HOME para formar reglas de reescritura, por lo tanto, si definimos en el servidor el "DocumentRoot" apuntando a */path/to/site/app*, WordPress creará el archivo *.htaccess* en esa ubicación, con las reglas de reescritura correctas y la instalación funcionará correctamente.

En cambio, si el DocumentRoot no apunta a */path/to/site/app*, tendremos que crear archivos *.htaccess* manualmente y definir las reglas de reescrituras que apunten al subdirectorio */app/* y que manejen las url correctamente de nuestro sitio. Esta configuración debe de tenerse especial cuidado de que WordPress no cree el archivo *.htaccess* en la raiz o agregue nuevas líneas a uno que ya esté creado, esto porque tendrán reglas de reescrituras incorrectas porque hemos cambiado la estructura y wordpress no es consciente de ello.

Para evitar esto podemos cambiarle los permisos a nuestro *.htaccess* a solo lectura para nuestro servidor, y así WordPress no pueda modificarlo. Lo malo de esto es que ni WordPress, ni los plugin puneden agregar nuevas reglas, esto lo tendremos que hacer nosotros.
Este tipo de estructuras personalizadas de instalaciones de WordPress normalmente se usan en hosting compartidos donde no tenemos accesos a las configuraciones del servidor, tambien a instalaciones muy personalizadas como por ejemplo: 

- Un dominio con varios subdirectorios con instalaciones de WordPress diferentes.
- Una Instalacion de WordPress en un subdirectorio de un proyecto que no esta hecho con WordPress, esto se usa comunmente cuando tenemos un proyecto y queremos habilitar un blog o una tienda especialmente hecho con WordPres.
- Para procesos de desarrollos local o de staging, en el que queremos tener varias instalaciones de WordPress en un mismo dominio.

Se incluyen achivos *.htaccess.sample* en el directorio raiz y en el subdirectorio *app/* para tener una muestra de como configurar correctamente y adaptarlas al proyecto.
