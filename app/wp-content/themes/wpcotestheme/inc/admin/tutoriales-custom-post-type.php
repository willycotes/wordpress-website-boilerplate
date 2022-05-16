<?php
/**
 * Plugin Name:Tutoriales Custom Post Type
 * Description: Post personalizado para la pagina de Tutoriales
 * 
 * 
 */
// Register Custom Post Type
if ( !function_exists('tutoriales_custom_post_type') ) {

	// Register Custom Post Type
	function tutoriales_custom_post_type() {

		$labels = array(
			'name'                  => 'Tutoriales',
			'singular_name'         => 'Tutorial',
			'menu_name'             => 'Tutoriales',
			'name_admin_bar'        => 'Tutoriales',
			'archives'              => 'Archivos',
			'attributes'            => 'Atributos',
			'parent_item_colon'     => 'Tutorial padre',
			'all_items'             => 'Todas las Tutoriales',
			'add_new_item'          => 'Agregar nuevo',
			'add_new'               => 'Agregar nuevo',
			'new_item'              => 'Nuevo',
			'edit_item'             => 'Editar',
			'update_item'           => 'Actualizar',
			'view_item'             => 'Ver Tutorial',
			'view_items'            => 'Ver Tutoriales',
			'search_items'          => 'Buscar Tutorial',
			'not_found'             => 'No encontrado',
			'not_found_in_trash'    => 'No encontrado en la papelera',
			'featured_image'        => 'Imagen destacada',
			'set_featured_image'    => 'Asignar imagen destacada',
			'remove_featured_image' => 'Eliminar imagen destacada',
			'use_featured_image'    => 'Usar como imagen destacada',
			'insert_into_item'      => 'Insertar en Tutorial',
			'uploaded_to_this_item' => 'Subir a Tutoriales',
			'items_list'            => 'Lista de Tutoriales',
			'items_list_navigation' => 'Lista de navegacion',
			'filter_items_list'     => 'Filtro de Tutoriales',
		);
		$rewrite = array(
			'slug'                  => 'tutoriales',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => 'Tutoriales',
			'description'           => 'Contenido de Tutoriales',
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-art',
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
		register_post_type( 'tutoriales', $args );

	}
}

add_action( 'init', 'tutoriales_custom_post_type', 0 );

 ?>