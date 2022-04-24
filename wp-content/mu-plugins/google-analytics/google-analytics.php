<?php 
/*
*Plugin Name: Google Analytics TodoFiestaOnline.com
*Description: Codigo de seguimiento de Google Analytics.
*
*/

//add code Google Analytics 

add_action('wp_head', 'add_code_google_analytics', 0);

if ( !function_exists('add_code_google_analytics')) { 
	function add_code_google_analytics() { 
    ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135464051-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135464051-1');
</script>

<?php	} 
}
?>