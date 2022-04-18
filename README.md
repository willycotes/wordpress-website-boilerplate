<div align="center">
	<h1>WPCotes Framework</h1>
	<p>WPCotes Framework ofrece una estructura base para proyectos basados en WordPress que los programadores pueden usar, complementar o modificar según sus objetivos.
Este framework nos proporciona un "esqueleto" sobre el cual trabajar y permite, principalmente, agilizar el proceso de desarrollo y facilitar el mantenimiento de nuestro sitio web, utilizando las configuraciones, herramientas y módulos incorporados en este framework en nuestros desarrollos.</p>
	<br/>
</div>

## Beneficios que aporta WPCotes Framework

* Configuraciones separadas por entorno.
* Variables de entorno.
* Núcleo de WordPress separado del contenido y gestionado a traves de git submodule.
* Composer para administrar dependencias y plugins importantes recomendados para un buen proyecto web con WordPress.
* Tema de inicio "WPCotesTheme" configurado por defecto.
* Configuración para trabajar con WP-CLI y gestionar los diferentes entornos. Incorporación de nuevos comandos como "wp-cli dotenv" y "wp-cli htaccess(en desarrollo)".
* Configuración para hacer deploy al servidor de producción a traves de GitHub Actions mediante SSH.

## Pasos para iniciar el proyecto:

1. Clonar el repositorio y submódulos con "git clone --recurse-submodules https://github.com/willycotes/wpcotesframework.git"
2. Editar el archivo ".env.sample", establecer los valores correctos de las variables de entorno y renombrar el archivo a ".env".
1. Generar el .htaccess archivo en la raíz del proyecto ejecutando el archivo generate-htaccess.php.
1. Ejecutar npm install y composer install para instalar todas las dependencias.
1. Generar el .htaccess de la instalación de WordPress en WordPress-core/ con la herramienta WP_CLI ejecutando el comando "wp rewrite flush --hard". **Más detalles abajo.**

## Archivo de configuración de wordpress.

Esta instalación contiene una clase de configuracion personalizada, el cual, maneja las definiciones de las constantes del wp-config.php de wordpress a traves de variables de entornos utilizando dotenv como dependencia, incluyendo el archivo específico según el entorno en el que estemos.

## WP CLI

Para utilizar correctamente la herramienta WP-CLI sobre este proyecto, se debe de crear el archivo de configuración "wp-cli.yml" de la siguiente manera:

    apache_modules:
      - mod_rewrite

    path: wordpress-core/

    @staging:
      ssh: user@host/path/to/WordPress
      path: wordpress-core/

    @production:
      ssh: u989690031@156.67.72.1:65002~/domains/brandketings.com/public_html/

1.  La opción "apache_modules" se configura para hacer posible la regeneración del archivo .htaccess de wordpress-core con WP-CLI a traves del comando "wp rewrite reflush --hard".
2.  Indicamos la ruta la instalación de wordpress, en este caso es "wordpress-core/".
3.  Luego configuramos varios alias que corresponden a cada entorno que queremos que apunten nuestros comandos de WP_CLI.

**Sintaxis:**

    // wp-cli.yml
    @alias:
    ssh: user@host/path/to/WordPress

**Ejemplo:**

    // wp-cli.yml
    @production:
      ssh: user@host/path/to/WordPress

    @development:
      ssh: vagrant@example.test/srv/www/example.com/current

Luego ejecutamos los comandos de esta forma:

    $ wp @production plugin activate woocommerce

    $ wp @development plugin activate woocommerce

**Para el entorno _local_ no es necesario que le agreguemos un alias, ya que por defecto apuntará a éste.**

## Activando certificado SSL en local.

Utilizamos la herramienta "Local by flywheel" y creamos un nuevo site llamado "localhost" para que se cree un certificado que apunte a localhost y luego agrego las rutas de estos certificados a las opciones del proxy de "browsersync" o cualquier herramienta que utilicemos para ejecutar un host local con hot reload:

    https: {
      key: 'C:/Users/Usuario/AppData/Roaming/Local/run/router/nginx/certs/localhost.key',
      cert: 'C:/Users/Usuario/AppData/Roaming/Local/run/router/nginx/certs/localhost.crt'
    }

Un paso adicional sería la opción en Chrome para permitir certificados no válidos para los recursos cargados desde localhost.

Para habilitar esto, péguelo en su barra de direcciones: chrome://flags/#allow-insecure-localhost y habilite la primera opción.

## Actualización de Wordpress.

En este proyecto se trabaja la instalación de wordpress como **submódulo**, por ende para actualizarlo utilizamos comandos de git:

    	cd wordpress-core
    git fetch --tags
    git checkout 3.5.1

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
