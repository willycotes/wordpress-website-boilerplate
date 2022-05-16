<?php 
/**
 * Plugin Name: Ofertas Custom Taxonomy 
 * Description: Taxonomia personalizada para las Ofertas
 */
// Register Custom Taxonomy

add_action( 'init', 'ofertas_custom_taxonomy', 0 );

if ( !function_exists( 'ofertas_custom_taxonomy' ) ) {

    function ofertas_custom_taxonomy() {
    
        $labels = array(
            'name'                       => 'Ofertas',
            'singular_name'              => 'Oferta',
            'menu_name'                  => 'Ofertas',
            'all_items'                  => 'Todas las Ofertas',
            'parent_item'                => 'Oferta Padre',
            'parent_item_colon'          => 'Oferta Padre:',
            'new_item_name'              => 'Nueva Oferta',
            'add_new_item'               => 'Agregar nueva Oferta',
            'edit_item'                  => 'Editar',
            'update_item'                => 'Actualizar',
            'view_item'                  => 'Ver',
            'separate_items_with_commas' => 'Separa con comas',
            'add_or_remove_items'        => 'Eliminar Oferta',
            'choose_from_most_used'      => 'Oferta mas usada',
            'popular_items'              => 'Popular',
            'search_items'               => 'Buscar Oferta',
            'not_found'                  => 'No encontrada',
            'no_terms'                   => 'No items',
            'items_list'                 => 'Lista de Ofertas',
            'items_list_navigation'      => 'Lista de navegacion',
        );
        $rewrite = array(
            'slug' => 'ofertas',
            'with_front' => true,
            'hierarchical' => true,
            );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite
        );
        register_taxonomy( 'ofertas', 'product', $args );
        register_taxonomy_for_object_type( 'ofertas', 'product' );
    }   
}


?>