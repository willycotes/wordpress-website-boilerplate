<?php
/**
 * Plugin Name: Información Custom Post Type 
 * Description: Post personalizado para la pagina de Información.
 * 
 * 
 */
// Register Custom Post Type
add_action( 'init', 'informacion_custom_post_type', 0 );

if ( !function_exists('informacion_custom_post_type') ) {
	function informacion_custom_post_type() {

		$labels = array(
			'name'                  => 'Información',
			'singular_name'         => 'Información',
			'menu_name'             => 'Informaciones',
			'name_admin_bar'        => 'Informaciones',
			'archives'              => 'Archivos',
			'attributes'            => 'Atributos',
			'parent_item_colon'     => 'Información padre',
			'all_items'             => 'Todas las Informaciones',
			'add_new_item'          => 'Agregar nuevo',
			'add_new'               => 'Agregar nuevo',
			'new_item'              => 'Nuevo',
			'edit_item'             => 'Editar',
			'update_item'           => 'Actualizar',
			'view_item'             => 'Ver Información',
			'view_items'            => 'Ver Informaciones',
			'search_items'          => 'Buscar Información',
			'not_found'             => 'No encontrado',
			'not_found_in_trash'    => 'No encontrado en la papelera',
			'featured_image'        => 'Imagen destacada',
			'set_featured_image'    => 'Asignar imagen destacada',
			'remove_featured_image' => 'Eliminar imagen destacada',
			'use_featured_image'    => 'Usar como imagen destacada',
			'insert_into_item'      => 'Insertar en Información',
			'uploaded_to_this_item' => 'Subir a Informaciones',
			'items_list'            => 'Lista de Informaciones',
			'items_list_navigation' => 'Lista de navegacion',
			'filter_items_list'     => 'Filtro de Informaciones',
		);
		$rewrite = array(
			'slug'                  => 'Informacion',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => 'Información',
			'description'           => 'Contenido Informacional',
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-info-outline',
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
		register_post_type( 'informacion', $args );

	}
}
?>