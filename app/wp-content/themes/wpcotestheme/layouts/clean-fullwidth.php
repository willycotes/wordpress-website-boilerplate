<?php
/**
 * Plantilla limpia sin ganchos para un lienzo en blanco para editar con gutenberg.
 * 
 * Template Name: Clean full width
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<?php

	if ( have_posts() ) :

		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;

	else :

		get_template_part( dirname( __DIR__ ) . 'template-parts/content/content', 'none' );

	endif;

	?>
	</main><!-- #main -->
</div><!-- #primary -->    
<?php
get_footer();
