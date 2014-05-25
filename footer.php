<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package avenue
 */
?>
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <div class="row">
            <div class="col-md-12">
                <div class="col-xs-6 text-left">
                    <?php echo sc_footer(); ?>
                </div>
                <div class="col-xs-6 text-right">
                    <i class="scroll-top fa fa-chevron-circle-up"></i>
                </div>
            </div>                        
        </div>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
