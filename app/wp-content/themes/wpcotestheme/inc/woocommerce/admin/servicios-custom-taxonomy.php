<?php 
/**
 * Plugin Name: Servicios Custom Taxonomy 
 * Description: Taxonomia personalizada para las Servicios
 */

//register scripts
// add_action('wp_enqueue_scripts', 'register_scripts_custom_taxonomy_gallery_cluster');

if ( !function_exists('register_scripts_custom_taxonomy_gallery_cluster')) {
    function register_scripts_custom_taxonomy_gallery_cluster() {
        wp_enqueue_style('taxonomy-gallery-cluster-css', plugins_url() . '/servicios-custom-taxonomy/assets/css/servicios-custom-taxonomy.css', array(), '1.1', 'all');
        wp_enqueue_script('taxonomy-gallery-cluster-js', plugins_url() . '/servicios-custom-taxonomy/assets/js/servicios-custom-taxonomy.js', array(), '1.1', true);
    }
}

// Register Custom Taxonomy
add_action( 'init', 'servicios_custom_taxonomy' );

if ( !function_exists( 'servicios_custom_taxonomy' ) ) {

    function servicios_custom_taxonomy() {
    
        $labels = array(
            'name'                       => 'Servicios',
            'singular_name'              => 'servicio',
            'menu_name'                  => 'Servicios',
            'all_items'                  => 'Todas las Servicios',
            'parent_item'                => 'Servicio Padre',
            'parent_item_colon'          => 'Servicio Padre:',
            'new_item_name'              => 'Nueva servicio',
            'add_new_item'               => 'Agregar nueva servicio',
            'edit_item'                  => 'Editar',
            'update_item'                => 'Actualizar',
            'view_item'                  => 'Ver Servicio',
            'separate_items_with_commas' => 'Separa con comas',
            'add_or_remove_items'        => 'Eliminar servicio',
            'choose_from_most_used'      => 'servicio mas usada',
            'popular_items'              => 'Popular',
            'search_items'               => 'Buscar servicio',
            'not_found'                  => 'No encontrada',
            'no_terms'                   => 'No items',
            'items_list'                 => 'Lista de Servicios',
            'items_list_navigation'      => 'Lista de navegacion',
        );
        $rewrite = array(
            'slug' => 'servicios',
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
        register_taxonomy( 'servicios', array( 'product' ), $args );
    }  
}
//add custon field taxonomy servicio 

//add custom field in admin add new taxonomy for Servicios

add_action('servicios_add_form_fields', 'add_servicios_custom_field_taxonomy');

if ( !function_exists('add_servicios_custom_field_taxonomy') ) {
    function add_servicios_custom_field_taxonomy() {

        //add nonce protection field
        wp_nonce_field( 'tfo_servicios_custom_field_taxonomy_action', 'tfo_servicios_custom_field_taxonomy_nonce' );

        //add html custom field
        ?> 
        <div class="form-field term-display-type-wrap">
			<label for="display_type"><?php esc_html_e( 'Display type', 'woocommerce' ); ?></label>
			<select id="display_type" name="display_type" class="postform">
				<option value=""><?php esc_html_e( 'Default', 'woocommerce' ); ?></option>
				<option value="products"><?php esc_html_e( 'Products', 'woocommerce' ); ?></option>
				<option value="servicios"><?php esc_html_e( 'servicios', 'woocommerce' ); ?></option>
				<option value="both"><?php esc_html_e( 'Both', 'woocommerce' ); ?></option>
			</select>
        </div>
        <div class="form-field term-thumbnail-wrap">
			<label><?php esc_html_e( 'Thumbnail', 'woocommerce' ); ?></label>
            <div id="thumbnail" style="float: left; margin-right: 10px;">
                <img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" width="60px" height="60px" />
            </div>
			<div style="line-height: 60px;">
				<input type="hidden" id="thumbnail_id" name="thumbnail_id" />
				<button type="button" class="upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'woocommerce' ); ?></button>
				<button type="button" class="remove_image_button button"><?php esc_html_e( 'Remove image', 'woocommerce' ); ?></button>
            </div>
		    <script type="text/javascript">
			    // Only show the "remove image" button when needed
			    if ( ! jQuery( '#thumbnail_id' ).val() ) {
				    jQuery( '.remove_image_button' ).hide();
			    }
			    // Uploading files
			    var file_frame;
			    jQuery( document ).on( 'click', '.upload_image_button', function( event ) {
				    event.preventDefault();
				    // If the media frame already exists, reopen it.
				    if ( file_frame ) {
					    file_frame.open();
					    return;
				    }
				    // Create the media frame.
				    file_frame = wp.media.frames.downloadable_file = wp.media({
					    title: '<?php esc_html_e( 'Choose an image', 'woocommerce' ); ?>',
					    button: {
						    text: '<?php esc_html_e( 'Use image', 'woocommerce' ); ?>'
					    },
					    multiple: false
				    });
				    // When an image is selected, run a callback.
				    file_frame.on( 'select', function() {
					    var attachment           = file_frame.state().get( 'selection' ).first().toJSON();
					    var attachment_thumbnail = attachment.sizes.thumbnail || attachment.sizes.full;
					    jQuery( '#thumbnail_id' ).val( attachment.id );
					    jQuery( '#thumbnail' ).find( 'img' ).attr( 'src', attachment_thumbnail.url );
					    jQuery( '.remove_image_button' ).show();
				    });
				    // Finally, open the modal.
				    file_frame.open();
			    });
			    jQuery( document ).on( 'click', '.remove_image_button', function() {
				    jQuery( '#thumbnail' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
				    jQuery( '#thumbnail_id' ).val( '' );
				    jQuery( '.remove_image_button' ).hide();
				    return false;
			    });
			    jQuery( document ).ajaxComplete( function( event, request, options ) {
				    if ( request && 4 === request.readyState && 200 === request.status
					    && options.data && 0 <= options.data.indexOf( 'action=add-tag' ) ) {
					    var res = wpAjax.parseAjaxResponse( request.responseXML, 'ajax-response' );
					    if ( ! res || res.errors ) {
						    return;
					    }
					    // Clear Thumbnail fields on submit
					    jQuery( '#thumbnail' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
					    jQuery( '#thumbnail_id' ).val( '' );
					    jQuery( '.remove_image_button' ).hide();
					    // Clear Display type field on submit
					    jQuery( '#display_type' ).val( '' );
					    return;
				    }
			    } );
		    </script>
		    <div class="clear"></div>
        </div>
        <div class="form-field tag-meta-wrap">
            <label for="tag-meta">Etiqueta para Carrusel</label>
            <input type="text" id="tag-meta" name="tag-meta" value="">
        </div>
        <?php
    }
}

//add custom field in admin edit taxonomy

add_action('servicios_edit_form_fields', 'edit_servicios_custom_field_taxonomy');

if ( !function_exists('edit_servicios_custom_field_taxonomy') ) {
    function edit_servicios_custom_field_taxonomy( $term ) {
        $display_type = get_term_meta( $term->term_id, 'display_type', true );
        $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true);
        $tag_meta = get_term_meta( $term->term_id, 'tag-meta', true);
        if ( $thumbnail_id ) {
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		} else {
			$image = wc_placeholder_img_src();
		}
        //add nonce protection field 
        wp_nonce_field( 'tfo_servicios_custom_field_taxonomy_action', 'tfo_servicios_custom_field_taxonomy_nonce' );
    
        //add html custom field
        ob_start();
        ?>
        <tr class="form-field term-display-type-wrap">
			<th scope="row" valign="top"><label><?php esc_html_e( 'Display type', 'woocommerce' ); ?></label></th>
			<td>
				<select id="display_type" name="display_type" class="postform">
					<option value="" <?php selected( '', $display_type ); ?>><?php esc_html_e( 'Default', 'woocommerce' ); ?></option>
					<option value="products" <?php selected( 'products', $display_type ); ?>><?php esc_html_e( 'Products', 'woocommerce' ); ?></option>
					<option value="servicios" <?php selected( 'servicios', $display_type ); ?>><?php esc_html_e( 'servicios', 'woocommerce' ); ?></option>
					<option value="both" <?php selected( 'both', $display_type ); ?>><?php esc_html_e( 'Both', 'woocommerce' ); ?></option>
				</select>
			</td>
		</tr>
        <tr class="form-field term-thumbnail-wrap">
			<th scope="row" valign="top"><label><?php esc_html_e( 'Thumbnail', 'woocommerce' ); ?></label></th>
			<td>
				<div id="thumbnail" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" /></div>
				<div style="line-height: 60px;">
					<input type="hidden" id="thumbnail_id" name="thumbnail_id" value="<?php echo esc_attr( $thumbnail_id ); ?>" />
					<button type="button" class="upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'woocommerce' ); ?></button>
					<button type="button" class="remove_image_button button"><?php esc_html_e( 'Remove image', 'woocommerce' ); ?></button>
				</div>
				<script type="text/javascript">

					// Only show the "remove image" button when needed
					if ( '0' === jQuery( '#thumbnail_id' ).val() ) {
						jQuery( '.remove_image_button' ).hide();
					}

					// Uploading files
					var file_frame;

					jQuery( document ).on( 'click', '.upload_image_button', function( event ) {

						event.preventDefault();

						// If the media frame already exists, reopen it.
						if ( file_frame ) {
							file_frame.open();
							return;
						}

						// Create the media frame.
						file_frame = wp.media.frames.downloadable_file = wp.media({
							title: '<?php esc_html_e( 'Choose an image', 'woocommerce' ); ?>',
							button: {
								text: '<?php esc_html_e( 'Use image', 'woocommerce' ); ?>'
							},
							multiple: false
						});

						// When an image is selected, run a callback.
						file_frame.on( 'select', function() {
							var attachment           = file_frame.state().get( 'selection' ).first().toJSON();
							var attachment_thumbnail = attachment.sizes.thumbnail || attachment.sizes.full;

							jQuery( '#thumbnail_id' ).val( attachment.id );
							jQuery( '#thumbnail' ).find( 'img' ).attr( 'src', attachment_thumbnail.url );
							jQuery( '.remove_image_button' ).show();
						});

						// Finally, open the modal.
						file_frame.open();
					});

					jQuery( document ).on( 'click', '.remove_image_button', function() {
						jQuery( '#thumbnail' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
						jQuery( '#thumbnail_id' ).val( '' );
						jQuery( '.remove_image_button' ).hide();
						return false;
					});

				</script>
				<div class="clear"></div>
			</td>
		</tr>
        <tr class="form-field tag-meta-wrap">
            <th scope="row">
                <label for="tag-meta">Etiqueta para Carrusel</label>
            </th>            
            <td>
                <input type="text" id="tag-meta" name="tag-meta" value="<?php echo sanitize_text_field( $tag_meta );?>">
            </td>
        </tr>
    <?php
    $output = ob_get_clean();
    echo $output;
    }
}

//save data taxonomy hooks create_{$taxonomy} and edit_{$taxonomy}.

add_action('create_servicios', 'servicios_fields_save_data');
add_action('edit_servicios', 'servicios_fields_save_data');

if ( !function_exists('servicios_fields_save_data')) {
    function servicios_fields_save_data( $term_id ) {
        //comprobation nonce define
        if ( !isset( $_POST['tfo_servicios_custom_field_taxonomy_nonce'] )) {
            return $term_id;
        }
        $nonce = $_POST['tfo_servicios_custom_field_taxonomy_nonce'];

        //verification nonce
        if ( !wp_verify_nonce( $nonce, 'tfo_servicios_custom_field_taxonomy_action' ) ) {
            return $term_id;
        }
    //recovering data fields
    if ( isset( $_POST['display_type'] ) ) { // WPCS: CSRF ok, input var ok.
        update_term_meta( $term_id, 'display_type', esc_attr( $_POST['display_type'] ) ); // WPCS: CSRF ok, sanitization ok, input var ok.
    }

    $old_thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true );
    $old_tag_meta = get_term_meta( $term_id, 'tag-meta', true );

    //sanitize data fields
    $thumbnail_id = sanitize_text_field( $_POST['thumbnail_id'] );
    $tag_meta = sanitize_text_field( $_POST['tag-meta'] );

    //update data fields
    update_term_meta( $term_id, 'thumbnail_id', $thumbnail_id, $old_thumbnail_id );
    update_term_meta( $term_id, 'tag-meta', $tag_meta, $old_tag_meta );
    }
}
  
//add row admin taxonomy setting (hooks manage_edit-{taxonomy}_columns)

add_filter( 'manage_edit-servicios_columns', 'servicios_custom_field_taxonomy_columns_thumbnail');

if ( !function_exists('servicios_custom_field_taxonomy_columns_thumbnail') ) {
    function servicios_custom_field_taxonomy_columns_thumbnail( $columns ) {
        $columns['featured_image'] = "<b>imagen</b>";
        return $columns;
    }
}
add_filter( 'manage_edit-servicios_columns', 'servicios_custom_field_taxonomy_columns_tag');

if ( !function_exists('servicios_custom_field_taxonomy_columns_tag') ) {
    function servicios_custom_field_taxonomy_columns_tag( $columns ) {
        $columns['tag_slide'] = "<b>Termino del slide</b>";
        return $columns;
    }
}
//add content data row admin taxonomy setting (hooks manage_{taxonomy}_custom_column)

add_filter('manage_servicios_custom_column', 'servicios_content_custom_field_taxonomy_columns_thumbnail',10 , 3 );

if ( !function_exists('servicios_content_custom_field_taxonomy_columns_thumbnail') ) {
    function servicios_content_custom_field_taxonomy_columns_thumbnail( $content, $column_name, $term_id ) {
        if ( $column_name == 'featured_image' ) {
            $thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true);
            if ( !empty( $thumbnail_id ) ) {
                $media_item_src = wp_get_attachment_image_src( $thumbnail_id, "thumbnail" );
                $content = sprintf( '<img src="%s" width="64">', $media_item_src[0] );
            }
        }
        return $content;
    }
}

add_filter('manage_servicios_custom_column', 'servicios_content_custom_field_taxonomy_columns_tag',10 , 3 );

if ( !function_exists('servicios_content_custom_field_taxonomy_columns_tag') ) {
    function servicios_content_custom_field_taxonomy_columns_tag( $content, $column_name, $term_id ) {
        if ( $column_name == 'tag_slide' ) {
            $tag_meta = get_term_meta( $term_id, 'tag-meta', true);
            if ( !empty( $tag_meta ) ) {
                $content = $tag_meta;
                
            }
        }
        return $content;
    }
}
//parent taxonomy gallery cluster
// add_action( 'woocommerce_before_shop_loop', 'parent_taxonomy_gallery_cluster', 5 );

if ( !function_exists('parent_taxonomy_gallery_cluster')) {
    function parent_taxonomy_gallery_cluster() {
        if ( is_page('servicios')) {
            $args = array(
                'parent' => 0,
                'taxonomy' => 'servicios',
            );
            $terms = get_terms($args);
            if ($terms) {
                ob_start();
                ?> 
                <div class="cluster-taxonomy__container">
                    <ul class="cluster-taxonomy__list">
                    <?php foreach( $terms as $term ) { 
                        $image_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                        $post_thumbnail_img = wp_get_attachment_image_src( $image_id, 'thumbnail' );
                        ?>
                        <li class="taxonomy__item">
                            <a href="<?php echo esc_url( get_term_link( $term ) ) ;?>" class="taxonomy-link__image">
                                <img class="thumbnail" src="<?php echo $post_thumbnail_img[0] ;?>" alt="<?php echo $term->name ;?>">
                            </a>
                            <a href="<?php echo esc_url( get_term_link( $term ) ) ;?>" class="taxonomy-link__name">
                                <h2 class="taxonomy__name"><?php echo $term->name ;?></h2>
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
                <?php
                $output = ob_get_clean();
                print $output;
            }
        }
        
        
    }
}
// remove breadcrumb and add new breadcrumb
add_action('wp_head', 'remove_breadcrumb_woocommerce_servicios');

if ( !function_exists('remove_breadcrumb_woocommerc_servicios') ) {
    function remove_breadcrumb_woocommerce_servicios() {
        if ( is_tax('servicios') ) {
            remove_action('wpcotestheme_before_content', 'woocommerce_breadcrumb', 10);
        }
    }
}
//add custom breadcrumb

add_action('wpcotestheme_before_content', 'custom_breadcrumb_servicios',15); 

if ( !function_exists('custom_breadcrumb_servicios') ) {
    function custom_breadcrumb_servicios() {
        if ( is_tax('servicios') ) { 
            $servicio = get_term(get_queried_object_id( ), 'servicios');
            $parent_id = $servicio->parent;
            
            ?>
            <div class="nav-scroll__container">
            <nav class="woocommerce-breadcrumb">
            <a href="<?php echo esc_url( get_home_url() ) ;?>">Inicio</a>
            <span class="breadcrumb-separator"> / </span>
            <a href="<?php echo esc_url( get_home_url() ) . '/servicios' ;?>">servicios</a>
            <span class="breadcrumb-separator"> / </span>
                <?php 
                    if ($parent_id === 0) {
                        echo '<span>' . esc_html($servicio->name) . '</span>' ;
                    }
                    else {
                        ?> 
                        <a href="<?php echo esc_url( get_term_link($parent_id, 'servicios') );?>"><?php echo esc_html(get_term($parent_id)->name) ;?></a>
                        <span class="breadcrumb-separator"> / </span>
                        <span><?php echo esc_html($servicio->name) ;?></span>
                        <?php
                    }
                ?>
            </div>
            <?php 
        }
    }
}
// breadcrumb back
// add_action('wpcotestheme_before_content', 'custom_breadcrumb_back'); 

if ( !function_exists('custom_breadcrumb_back') ) {
    function custom_breadcrumb_back() {
        if ( is_tax('servicios') ) { 
            ?>
            <div class="breadcrumb-back__container">
                <nav class="breadcrumb-back__content">
                    <ul class="breadcrumb-back__list">
                        <li class="breadcrumb-back__item">
                            <a class="breadcrumb-back__link" href="javascript:history.back()">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="25px" height="25px" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M14 5l-5 5l5 5l-1 2l-7-7l7-7z" fill="#6d6d6d"/></svg>
                                Volver atrás
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <?php 
        }
    }
}
//show custom thumbnail Servicios
// add_action('wp_head', 'remove_thumbnail_default' );
