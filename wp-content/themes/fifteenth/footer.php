<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package  Fifteenth
 * @since Fifteenth 1.0
 */
?>

	</div><!-- .site-content -->
<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				/**
				 * Fires before the Fifteenth footer text for footer customization.
				 *
				 * @since Fifteenth 1.0
				 */
				do_action( 'fifteenth_credits' );
			?>			
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->	

</div><!-- .site -->


<?php wp_footer(); ?>

</body>
</html>
