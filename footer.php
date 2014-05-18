<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package avenue
 */
?>

<!--            </div> #content 
        </div> #content row -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <?php printf( __( 'Theme: %1$s by %2$s.', 'avenue' ), 'avenue', '<a href="http://smartcatdesign.net/" rel="designer">SmartCat</a>' ); ?>
                        </div>
                        <div class="col-md-6 text-right">
                            <i class="scroll-top fa fa-chevron-circle-up"></i>
                        </div>
                                                
                    </div>
			
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
