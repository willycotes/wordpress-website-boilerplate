<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wpcotestheme
 */

?>

	</div><!-- #content -->

	<?php do_action( 'wpcotestheme_before_footer' ); ?>

	<footer id="footer" class="site-footer" role="contentinfo">

			<?php
			/**
			 * Functions hooked in to wpcotestheme_footer action
			 *
			 * @hooked wpcotestheme_footer_widgets - 10
			 * @hooked wpcotestheme_credit         - 20
			 */
			do_action( 'wpcotestheme_footer' );
			?>

	</footer>

	<?php do_action( 'wpcotestheme_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
