<div align="center">
	<h1>WPCotesFramework</h1>
	<p>WPCotesFramework ofrece una estructura base para proyectos basados en WordPress que los programadores pueden usar, complementar o modificar según sus objetivos.
Este framework nos proporciona un "esqueleto" sobre el cual trabajar y permite, principalmente, agilizar el proceso de desarrollo y facilitar el mantenimiento de nuestro sitio web, utilizando las configuraciones, herramientas y módulos incorporados, en nuestros desarrollos.</p>
	<br/>
</div>

## Características de WPCotes Framework

* Configuraciones separadas por entorno.
* Variables de entorno.
* Composer para administrar dependencias, plugins y el core de WordPress.
* Plugins de inicio pre-instalados.
* Núcleo de WordPress separado del contenido.
* Tema de inicio "WPCotesTheme" pre-instalado y activado por defecto.
* Configuración para trabajar con WP-CLI y gestionar los diferentes entornos.
* Configuración para hacer deploy al servidor de producción a través de GitHub Actions mediante SSH.

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

Esta instalación contiene una clase de configuración personalizada, el cual, maneja las definiciones de las constantes del wp-config.php de WordPress a través de variables de entornos utilizando dotenv como dependencia, incluyendo el archivo específico según el entorno en el que estemos.

## WP CLI

Para utilizar correctamente la herramienta WP-CLI sobre este proyecto, se debe de crear el archivo de configuración "wp-cli.yml" de la siguiente manera:

    apache_modules:
      - mod_rewrite

    path: wordpress/

    @staging:
      ssh: user@host/path/to/WordPress
      path: wordpress/

    @production:
      ssh: u989690031@156.67.72.1:65002~/domains/brandketings.com/public_html/

1.  La opción "apache_modules" se configura para hacer posible la regeneración del archivo *.htaccess* del núcleo de WordPress con WP-CLI a través del comando `wp rewrite flush --hard`.
2.  Indicamos la ruta la instalación de WordPress, en este caso es "wordpress/".
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

Luego ejecutamos los comandos de esta manera:

    $ wp @production plugin activate --all

    $ wp @development plugin activate --all

**Para el entorno *local* no es necesario que le agreguemos un alias, ya que los comandos por defecto apuntará a éste entorno.**

## Activando certificado SSL en local.

Utilizamos la herramienta "Local by flywheel" y creamos un nuevo site llamado "localhost" para que se cree un certificado que apunte a localhost y luego agrego las rutas de estos certificados a las opciones del proxy de "browsersync" o cualquier herramienta que utilicemos para ejecutar un host local con hot reload:

    https: {
      key: 'C:/Users/Usuario/AppData/Roaming/Local/run/router/nginx/certs/localhost.key',
      cert: 'C:/Users/Usuario/AppData/Roaming/Local/run/router/nginx/certs/localhost.crt'
    }

Un paso adicional sería la opción en Chrome para permitir certificados no válidos para los recursos cargados desde localhost.

Para habilitar esto, pegue en su barra de direcciones lo siguiente: "chrome://flags/#allow-insecure-localhost" y habilite la primera opción.

## Actualización de WordPress.

Por medio de composer

## Trabajando con git flows

Las siguientes ramas al crearlas se deben nombran con el numero de versión a implementar de la siguiente manera:

- Rama de lanzamiento: release-2.0.0
- Rama de corrección de errores rápidos: hotfix-2.1.0
- Rama de corrección de errores: bugfix-2.1.2

La rama de actualización de dependencia se nombra update-name_dep y se utiliza para actualizar el core de wordpress, actualización de temas y plugins, entre otros...

La rama de funciones se nombra feature-name_feature.

En todas las ramas anteriores se realiza el merge con la rama principal y la rama de desarrollo, la única excepción a la regla aquí es que, cuando existe una rama de versión o lanzamiento(release), los cambios de revisión(butfix y hotfix) deben fusionarse en esa rama de versión, en lugar de develop. Volver a fusionar la corrección de errores en la rama de lanzamiento eventualmente resultará en la fusión de la corrección de errores develop también, cuando la rama de lanzamiento finalice. (Si el trabajo develop requiere esta corrección de error de inmediato y no puede esperar a que finalice la rama de lanzamiento, también puede fusionar la corrección de error con develop ahora).

inmediatamente después de hacer el merge de una rama de version con la rama principal se debe etiquetar la rama principal con dicha version con el comando git tag -a version-number o con git tag -m para agregar un mensaje como con git commit.

Si usamos git-flow (herramienta CLI) y publicamos un release, debemos publicar los tags en el repositorio remoto con git push --tags ya que los comandos de git-flow ya nos crea la etiqueta automáticamente.

La ramas feature se hace merge solo con la rama develop, asi si hay una rama release abierta, la funcionalidad debe esperar a su debido proceso para el proximo release, ya que antes de crear el release se analizo que ya era el momento de crearse ese lanzamiento con las funciones que ya estaban listas.

### Recursos:

- [git flow](https://nvie.com/posts/a-successful-git-branching-model/)

## Deploy with github actions.

Deploy with github actions with ssh connection using [appleboy/ssh-action@master](https://github.com/appleboy/ssh-action) package.
**See [video tutorial](https://www.youtube.com/watch?v=gW1TDirJ5E4) for more information.**

Using github secrets for save information confidential server connection and use in configuration file actions workflow with yamel sintaxis.

## Configuración de secuencia de fin de línea.

Los sistemas Unix como Linux y macOS usan LF, el carácter de avance de línea, para los saltos de línea de forma predeterminada. Windows, por otro lado, es especial y usa CR/LF, de forma predeterminada, el carácter de retorno de carro Y avance de línea.
Para evitar problemas se debe cambiar todo su código al valor predeterminado de Unix de LF.

Configuración de VSCode de manera global para LF

    {
      "files.eol": "\n",
    }

Para convertir todos los archivos de crlf a lf ejecutar:

    git config core.autocrlf false
    git rm --cached -r .
    git reset --hard

Si tiene un entorno de desarrollo Node.js e prettier instalado, una forma de reemplazar todo CRLF por LF es ejecutarlo prettier --end-of-line lf --write en la línea de comando.

Otra forma es establecer la endOfLine opción lf en el .prettierrc archivo de configuración y colocar una secuencia de comandos en su package.json gusto, así:

    "scripts": {
      "format": "prettier --end-of-line lf --write"
    }

Cuando estaba lidiando con un proyecto complejo con algunos submódulos, los submódulos siempre se ensucian después de configurarlos de forma independiente. Esto es muy común pero causa que todo el git esté sucio y feo.
Para resolver este problema edite el submodulo especifico en el .gitsubmodules file y agregue la linea "ignore = dirty".

Configurar indentacion en vscode a solo tabs de 2 espacios.
"editor.detectIndentation": false,
"editor.tabSize": 2,
"editor.insertSpaces": false,

- "editor.detectIndentation": false, permite que la configuración del ancho de un tabs ("editor.tabSize": 2) tenga efecto.
- "editor.insertSpaces": false, desactiva el uso de espacios para la indentación. De esta manera sólo queda configurado el uso de tabs, evitando así muchos errores en los linter configurados por tabulación, el cual marcarian error si detecta que se tabulo con espacio. Ejemplo phpcs wordpress standard.

## Configuracion de phpcs

Instalamos las siguientes dependencias:

- squizlabs/php_codesniffer: phpcs
- wp-coding-standards/wpcs: wordpress phpcs standard
- dealerdirect/phpcodesniffer-composer-installer: plugins que conecta todos los "phpcs code standard" instalados en la configuración de phpcs local automáticamente.

Para que phpcs pueda funcionar bien en el proyecto, agregamos la siguiente configuración local en vscode.

    {
      "phpcs.enable": true,
      "phpcs.standard": "WordPress",
      "phpcs.executablePath": "vendor/squizlabs/php_codesniffer/bin/phpcs"
    }

### Plugins install page standard

wp plugin install autoptimize query-monitor wordpress-seo mailchimp-for-wp ultimate-addons-for-gutenberg --activate

- Custom Plugins: wdvp-whatsapp-button google-analytics-and-pixel-facebook

#### Plugins install page woocommerce

wp plugin install woocommerce woocommerce-pdf-invoices-packing-slips nextend-facebook-connect facebook-for-woocommerce woo-product-feed-pro woo-variation-swatches woo-variation-gallery woocommerce-paypal-payments mailchimp-for-woocommerce ajax-search-for-woocommerce --activate

#### Plugins premiun install page woocommerce

wp plugin install show-single-variations-premium woo-variation-swatches-pro --activate

- Custom Plugins: wdvp-panama-shipping-zone wdvp-enable-gutenberg-woocommerce
- Plugin outside: plugin-yappi

--------------------------
Para crear un nuevo sitio web en wordpress, clonamos de manera recursiva el repositorio [wordpress-website-boilerplate](https://github.com/willycotes/wordpress-website-boilerplate.git) dentro de la carpeta vacia de nuestro proyecto, luego cambiamos la url remota origin por la url del nuevo repositorio de git de nuestro proyecto web que vayamos a desarrollar, a partir de allí, terminamos las configuraciones y empezamos a desarrollar.

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

* Configurar la

WP_HOME- URL completa de la página de inicio de WordPress (https://example.com/)
WP_SITEURL- URL completa de la instalación de WordPress (https://example.com/wordpress/)

NOTA: WordPress esta configurado para crear el archivo *.htaccess* en la raiz del sitio y usa el valor de la constante WP_HOME para formar reglas de reescritura, por lo tanto, si definimos en el servidor el "DocumentRoot" apuntando a */path/to/site/app*, WordPress creará el archivo *.htaccess* en esa ubicación, con las reglas de reescritura correctas y la instalación funcionará correctamente.

En cambio, si el DocumentRoot no apunta a */path/to/site/app*, tendremos que crear archivos *.htaccess* manualmente y definir las reglas de reescrituras que apunten al subdirectorio */app/* y que manejen las url correctamente de nuestro sitio. Esta configuración debe de tenerse especial cuidado de que WordPress no cree el archivo *.htaccess* en la raiz o agregue nuevas líneas a uno que ya esté creado, esto porque tendrán reglas de reescrituras incorrectas porque hemos cambiado la estructura y wordpress no es consciente de ello.

Para evitar esto podemos cambiarle los permisos a nuestro *.htaccess* a solo lectura para nuestro servidor, y así WordPress no pueda modificarlo. Lo malo de esto es que ni WordPress, ni los plugin puneden agregar nuevas reglas, esto lo tendremos que hacer nosotros.
Este tipo de estructuras personalizadas de instalaciones de WordPress normalmente se usan en hosting compartidos donde no tenemos accesos a las configuraciones del servidor, tambien a instalaciones muy personalizadas como por ejemplo: 

- Un dominio con varios subdirectorios con instalaciones de WordPress diferentes.
- Una Instalacion de WordPress en un subdirectorio de un proyecto que no esta hecho con WordPress, esto se usa comunmente cuando tenemos un proyecto y queremos habilitar un blog o una tienda especialmente hecho con WordPres.
- Para procesos de desarrollos local o de staging, en el que queremos tener varias instalaciones de WordPress en un mismo dominio.

Se incluyen achivos *.htaccess.sample* en el directorio raiz y en el subdirectorio *app/* para tener una muestra de como configurar correctamente y adaptarlas al proyecto.
