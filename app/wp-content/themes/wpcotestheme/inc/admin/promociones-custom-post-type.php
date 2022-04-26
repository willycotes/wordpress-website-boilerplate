<?php
/**
 * Plugin Name: Promociones Custom Post Type 
 * Description: Post personalizado tipo landing page para la pagina de Promociones
 * 
 * 
 */
// Register Custom Post Type
if ( !function_exists('promociones_custom_post_type') ) {

	// Register Custom Post Type
	function promociones_custom_post_type() {

		$labels = array(
			'name'                  => 'promociones',
			'singular_name'         => 'Promocion',
			'menu_name'             => 'Promociones',
			'name_admin_bar'        => 'Promociones',
			'archives'              => 'Archivos',
			'attributes'            => 'Atributos',
			'parent_item_colon'     => 'Promocion padre',
			'all_items'             => 'Todas las Promociones',
			'add_new_item'          => 'Agregar nuevo',
			'add_new'               => 'Agregar nuevo',
			'new_item'              => 'Nuevo',
			'edit_item'             => 'Editar',
			'update_item'           => 'Actualizar',
			'view_item'             => 'Ver Promocion',
			'view_items'            => 'Ver Promociones',
			'search_items'          => 'Buscar Promocion',
			'not_found'             => 'No encontrado',
			'not_found_in_trash'    => 'No encontrado en la papelera',
			'featured_image'        => 'Imagen destacada',
			'set_featured_image'    => 'Asignar imagen destacada',
			'remove_featured_image' => 'Eliminar imagen destacada',
			'use_featured_image'    => 'Usar como imagen destacada',
			'insert_into_item'      => 'Insertar en Promocion',
			'uploaded_to_this_item' => 'Subir a Promociones',
			'items_list'            => 'Lista de Promociones',
			'items_list_navigation' => 'Lista de navegacion',
			'filter_items_list'     => 'Filtro de Promociones',
		);
		$rewrite = array(
			'slug'                  => 'promociones',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => 'Promociones',
			'description'           => 'Contenido de Promociones',
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-megaphone',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
		);
		register_post_type( 'promociones', $args );

	}
}

add_action( 'init', 'promociones_custom_post_type', 0 );

 ?>