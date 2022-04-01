# wpcotestheme.com web site

## Templates files

- index.php

      body.body_class()
        do_action('body_open')
        do_action('wpcotestheme_before_site')
        div#page.site
          div.message-bar
          do_action('wpcotestheme_before_header')
          header#masthead.site-header
            button.menu-toggle[hidden]
            div.site-branding
            div.search-form[role="search"]
            div.header-links
            do_action('wpcotestheme_header')
          nav#primary-navigation.site-navigation[role="navigation"]
          div#navigation-panel.navigation-panel
          do_action('wpcotestheme_before_content')
          div#content.site-content
            div#primary.content-area
              main#main.site-main[role="main"]
                if have posts
                do_action('wpcotestheme_before_loop')
                // loop
                article#post-${ the_ID() }.post_class()
                  do_action('wpcotestheme_loop_top')
                  header.entry-header
                  div.entry-content
                  footer.entry-footer
                  do_action('wpcotestheme_loop')
                  do_action(wpcotestheme_loop_bottom')
                do_action('wpcotestheme_after_loop')
            div#secondary.widget-area
              aside#sidebar.site-sidebar[role="complementary"]
          do_action('wpcotestheme_before_footer')
          footer#footer.site-footer[role="contentinfo"]
            do_action('wpcotestheme_footer')
          do_action('wpcotestheme_after_footer')

- single.php

      body.body_class()
        do_action('body_open')
        do_action('wpcotestheme_before_site')
        div#page.site
          div.message-bar
          do_action('wpcotestheme_before_header')
          header#masthead.site-header
            button.menu-toggle[hidden]
            div.site-branding
            div.search-form[role="search"]
            div.header-links
            do_action('wpcotestheme_header')
          nav#primary-navigation.site-navigation[role="navigation"]
          div#navigation-panel.navigation-panel
          do_action('wpcotestheme_before_content')
          div#content.site-content
            div#primary.content-area
              main#main.site-main[role="main"]
                if have posts
                do_action('wpcotestheme_before_loop')
                // loop
                article#post-${ the_ID() }.post_class()
                  do_action('wpcotestheme_single_loop_top')
                  header.entry-header
                  div.entry-content
                  footer.entry-footer
                  do_action('wpcotestheme_single_loop')
                  do_action('wpcotestheme_single_loop_bottom')
                do_action('wpcotestheme_after_loop')
            div#secondary.widget-area
              aside#sidebar.site-sidebar[role="complementary"]
          do_action('wpcotestheme_before_footer')
          footer#footer.site-footer[role="contentinfo"]
            do_action('wpcotestheme_footer')
          do_action('wpcotestheme_after_footer')

- page.php

      body.body_class()
        do_action('body_open')
        do_action('wpcotestheme_before_site')
        div#page.site
          div.message-bar
          do_action('wpcotestheme_before_header')
          header#masthead.site-header
            button.menu-toggle[hidden]
            div.site-branding
            div.search-form[role="search"]
            div.header-links
            do_action('wpcotestheme_header')
          nav#primary-navigation.site-navigation[role="navigation"]
          div#navigation-panel.navigation-panel
          do_action('wpcotestheme_before_content')
          div#content.site-content
            div#primary.content-area
              main#main.site-main[role="main"]
                if have posts
                do_action('wpcotestheme_before_loop')
                // loop
                article#page-${ the_ID() }.post_class()
                  do_action('wpcotestheme_page_loop_top')
                  header.entry-header
                  div.entry-content
                  footer.entry-footer
                  do_action('wpcotestheme_page_loop')
                  do_action('wpcotestheme_page_loop_bottom')
                do_action('wpcotestheme_after_loop')
            div#secondary.widget-area
              aside#sidebar.site-sidebar[role="complementary"]
          do_action('wpcotestheme_before_footer')
          footer#footer.site-footer[role="contentinfo"]
            do_action('wpcotestheme_footer')
          do_action('wpcotestheme_after_footer')

- frontpage.php

      body.body_class()
        do_action('body_open')
        do_action('wpcotestheme_before_site')
        div#page.site
          div.message-bar
          do_action('wpcotestheme_before_header')
          header#masthead.site-header
            button.menu-toggle[hidden]
            div.site-branding
            div.search-form[role="search"]
            div.header-links
            do_action('wpcotestheme_header')
          nav#primary-navigation.site-navigation[role="navigation"]
          div#navigation-panel.navigation-panel
          do_action('wpcotestheme_before_content')
          div#content.site-content
            div#primary.content-area
              main#main.site-main[role="main"]
                if have posts
                do_action('wpcotestheme_before_loop')
                // loop
                div#page-${ the_ID() }.post_class()
                  do_action('wpcotestheme_frontpage_loop_top')
                  header.entry-header
                  article.entry-content
                  footer.entry-footer
                  do_action('wpcotestheme_frontpage_loop')
                  do_action('wpcotestheme_frontpage_loop_bottom')
                do_action('wpcotestheme_after_loop)
            div#secondary.widget-area
              aside#sidebar.site-sidebar[role="complementary"]
          do_action('wpcotestheme_before_footer')
          footer#footer.site-footer[role="contentinfo"]
            do_action('wpcotestheme_footer')
          do_action('wpcotestheme_after_footer')

- homepage.php

      body.body_class()
        do_action('body_open')
        do_action('wpcotestheme_before_site')
        div#page.site
          div.message-bar
          do_action('wpcotestheme_before_header')
          header#masthead.site-header
            button.menu-toggle[hidden]
            div.site-branding
            div.search-form[role="search"]
            div.header-links
            do_action('wpcotestheme_header')
          nav#primary-navigation.site-navigation[role="navigation"]
          div#navigation-panel.navigation-panel
          do_action('wpcotestheme_before_content')
          div#content.site-content
            div#primary.content-area
              main#main.site-main[role="main"]
                if have posts
                header.homepage-header
                do_action('wpcotestheme_homepage_before_loop')
                // loop require excerpt standard default
                article#post-${ the_ID() }.post_class()
                  do_action('wpcotestheme_post_loop_top')
                  header.entry-header
                  div.entry-content
                  footer.entry-footer
                  do_action('wpcotestheme_post_loop')
                  do_action('wpcotestheme_post_loop_bottom')
                do_action('wpcotestheme_homepage_after_loop')
            div#secondary.widget-area
              aside#sidebar.site-sidebar[role="complementary"]
          do_action('wpcotestheme_before_footer')
          footer#footer.site-footer[role="contentinfo"]
            do_action('wpcotestheme_footer')
          do_action('wpcotestheme_after_footer')

- archive.php

      body.body_class()
        do_action('body_open')
        do_action('wpcotestheme_before_site')
        div#page.site
          div.message-bar
          do_action('wpcotestheme_before_header')
          header#masthead.site-header
            button.menu-toggle[hidden]
            div.site-branding
            div.search-form[role="search"]
            div.header-links
            do_action('wpcotestheme_header')
          nav#primary-navigation.site-navigation[role="navigation"]
          div#navigation-panel.navigation-panel
          do_action('wpcotestheme_before_content')
          div#content.site-content
            div#primary.content-area
              main#main.site-main[role="main"]
                if have posts
                do_action('wpcotestheme_archive_header_before')
                header.archive-header
                do_action('wpcotestheme_before_loop')
                // loop
                article#page-${ the_ID() }.post_class()
                  do_action('wpcotestheme_homepage_loop_top')
                  header.entry-header
                  div.entry-content
                  footer.entry-footer
                  do_action('wpcotestheme_homepage_loop')
                  do_action('wpcotestheme_homepage_loop_bottom')
                do_action('wpcotestheme_after_loop')
            div#secondary.widget-area
              aside#sidebar.site-sidebar[role="complementary"]
          do_action('wpcotestheme_before_footer')
          footer#footer.site-footer[role="contentinfo"]
            do_action('wpcotestheme_footer')
          do_action('wpcotestheme_after_footer')

Debemos configurar el .env file con los valores correspondientes para nuestro entorno y generar el .htaccess file de la raiz con un comando de composer que ejecuta una clase PHP que es la encargada de crearlo, este archivo estara en el .gitignore ya que es independiente de cada sitio. Una vez creado, no se puede volver a generar para no reemplazar cambios que le hagamos a este, para volver a generarlo debemos eliminarlo primero.

wp-cli configuration environment

Se define la constante WP_ENVIRONMENT_TYPE dentro de la clase de configuracion.

Using 'defined()' function do why Local, Flywheel, and WP Engine is pre-pending the WP_ENVIRONMENT_TYPE constant and setting it to local

Para apuntar a entornos especificos con wp-cli, lo manejamos creando un alias en la configuracion de wp-cli.yml de esta forma:

// wp-cli.yml
@alias:
ssh: user@host/path/to/WordPress

De esta forma creamos un alias para nuestro entornos. Ejemplo:
// wp-cli.yml

    @production:
      ssh: user@host/path/to/WordPress

    @development:
      ssh: vagrant@example.test/srv/www/example.com/current

Luego ejecutamos los comandos de esta forma:

    $ wp @production plugin activate woocommerce

    $ wp @development plugin activate woocommerce

Para el entorno local no es necesario que le agreguemos un alias, ya que por defecto apuntará a éste.

Activando certificado SSL
Crear con Local by flywheel un nuevo site llamado "localhost" para que se cree un certificado que apunte a localhost y luego agrego las rutas a la configuracion de browsersync:
https: {
key: 'C:/Users/Usuario/AppData/Roaming/Local/run/router/nginx/certs/localhost.key',
cert: 'C:/Users/Usuario/AppData/Roaming/Local/run/router/nginx/certs/localhost.crt'
}

Un paso adicional sería la opción en Chrome para Permitir certificados no válidos para los recursos cargados desde localhost.
Para habilitar esto, péguelo en su barra de direcciones: chrome://flags/#allow-insecure-localhost y habilite la primera opción.

actualiza el core de wordpress mediante git
git fetch --tags
git checkout 3.5.1

Hacer push deploy ignorando el wp-config.php

Al clonar el repositorio debemos ejecutar la bandera --recursive para que se descargue el core de wordpress que esta instalado como submodule.
Luego generar el htaccess de la raiz con el comando:
composer run-script generate:htaccess
o
npm run generate:htaccess
Para finalizar, nos faltaria crear el htaccess del core de wordpress, el cual, lo generamos a travez de la linea de comandos de wordpress
wp rewrite flush --hard
listo!
configurar git
git config --global core.autocrlf true

### enlaces sobre git flows

- [git flow](https://nvie.com/posts/a-successful-git-branching-model/)
-

Las siguientes ramas al crearlas se deben nombran con el numero de versión a implementar de la siguiente manera:

- Rama de lanzamiento: release-2.0.0
- Rama de corrección de errores rápidos: hotfix-2.1.0
- Rama de corrección de errores: bugfix-2.1.2

La rama de actualización de dependencia se nombra update-name_dep y se utiliza para actualizar el core de wordpress, actualización de temas y plugins, entre otros...

La rama de funciones se nombra feature-name_feature.

En todas las ramas anteriores se realiza el merge con la rama principal y la rama de desarrollo, la única excepción a la regla aquí es que, cuando existe una rama de versión o lanzamiento(release), los cambios de revisión(butfix y hotfix) deben fusionarse en esa rama de versión, en lugar de develop. Volver a fusionar la corrección de errores en la rama de lanzamiento eventualmente resultará en la fusión de la corrección de errores develop también, cuando la rama de lanzamiento finalice. (Si el trabajo develop requiere esta corrección de error de inmediato y no puede esperar a que finalice la rama de lanzamiento, también puede fusionar la corrección de error con develop ahora).

inmediatamente después de hacer el merge de una rama de version con la rama principal se debe etiquetar la rama principal con dicha version con el comando git tag -a version-number o con git tag -m para agregar un mensaje como con git commit.

Si usamos git-flow y publicamos un release, debemos publicar los tags en el repositorio remoto con git push --tags ya que los comandos de git-flow ya nos crea la etiqueta automáticamente.

La ramas feature se hace merge solo con la rama develop, asi si hay una rama release abierta, la funcionalidad debe esperar a su debido proceso para el proximo release, ya que antes de crear el release se analizo que ya era el momento de crearse ese lanzamiento con las funciones que ya estaban listas.

Deploy with github actions with ssh connection using [appleboy/ssh-action@master](https://github.com/appleboy/ssh-action) package.
See [video tutorial](https://www.youtube.com/watch?v=gW1TDirJ5E4) for more information.
Using github secrets for save information confidential server connection and use in configuration file actions workflow with yamel sintaxis.

### Secuencia de fin de línea

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

Otra forma es establecer la endOfLine opción lfen el .prettierrc archivo de configuración y colocar una secuencia de comandos en su package.json gusto, así:

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

Instalamos las siguientes dependencias:

- squizlabs/php_codesniffer: phpcs
- wp-coding-standards/wpcs: wordpress phpcs standard
- dealerdirect/phpcodesniffer-composer-installer: plugins que conecta todos los "phpcs code standard" instalados en la configuración de phpcs local automáticamente.

### Configuracion de phpcs

Para que phpcs pueda funcionar bien en el proyecto, agregamos la siguiente configuración local en vscode.

    	{
    		"phpcs.enable": true,
    		"phpcs.standard": "WordPress",
    		"phpcs.executablePath": "vendor/squizlabs/php_codesniffer/bin/phpcs"
    	}

--------------

Para crear un nuevo sitio web en wordpress, clonamos de manera recursiva el repositorio [wordpress-website-boilerplate](https://github.com/willycotes/wordpress-website-boilerplate.git) dentro de la carpeta vacia de nuestro proyecto, luego cambiamos la url remota origin por la url del nuevo repositorio de git de nuestro proyecto web que vayamos a desarrollar, a partir de allí, terminamos las configuraciones y empezamos a desarrollar.