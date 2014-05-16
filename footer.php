<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package avenue
 */
?>

            </div><!-- #content -->
        </div><!-- #content row -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<!--<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'avenue' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'avenue' ), 'WordPress' ); ?></a>-->
			<!--<span class="sep"> | </span>-->
			<?php printf( __( 'Theme: %1$s by %2$s.', 'avenue' ), 'avenue', '<a href="http://smartcatdesign.net/" rel="designer">SmartCat</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
