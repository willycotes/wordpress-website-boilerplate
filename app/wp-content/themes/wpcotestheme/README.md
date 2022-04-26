## Testing custom theme

Para probar el tema se agregó una carpeta de contenido de muestra que luego se deberá importar a la base de datos de wordpress para generar todo el contenido que estaremos probando. Este procedimiento es el recomendado por wordpress en el [codex](https://codex.wordpress.org/Theme_Unit_Test), el cual, también indica pasos a seguir para configurar nuestra instalación y poder realizar las pruebas de nuestro theme correctamente.

### Importando el contenido con WP-CLI

1. Primero instalar el plugin de importación de wordpress.

   wp plugin install wordpress-importer --activate

- Contenido para blog y páginas.

  wp import ./sample-data/themeunittestdata.wordpress.xml --authors=create

- Contenido para Woocommerce.

  wp import ../../plugins/woocommerce/sample-data/sample_products.xml --authors=create

## Hooks and filters

Esta sección brindará información sobre ganchos y filtros específicos del tema y como agregar y eliminar aquellas funcionalidades más destacadas y comunes que se podrían presentar al momento de adaptar el tema al diseño y funcionalidades requeridas con aquellas opciones permitidas sin la necesidad de agregar un plugin extra.

### Desactivando el sidebar en una página en específico.

    	/**
    	* Deactivate sidebar in single page
    	*/
    	function deactivate_sidebar_in_single_pages( $index ) {
    		if ( is_single() && 'sidebar' === $index ) {
    			return false;
    		}
    	}

    	add_filter( 'is_active_sidebar', 'deactivate_sidebar_in_single_pages', 10, 1 );

Esta función permitirá que cuando la función "is_active_sidebar" se ejecute en la single page, esta retorne un false, por lo tanto, se le agregará la clase "wpcotestheme-full-width-content" en el body automáticamente. La inclusion de estas clases css se definen en el tema padre "wpcotestheme" en su clase principal.
