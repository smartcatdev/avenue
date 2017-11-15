<?php $avenue_options = avenue_get_options(); ?>

<footer id="colophon" class="site-footer <?php echo $avenue_options['sc_frontpage_content_bool'] == 'no' ? 'no-top-margin' : ''; ?>" role="contentinfo">
        
    <?php if( isset( $avenue_options['avenue_footer_cta'] ) && $avenue_options['avenue_footer_cta'] == 'on' ) : ?>

        <div id="footer-callout">

            <div class="container">

                <div class="row">

                    <div class="col-sm-8 text-left">
                        <h3 class="smartcat-animate fadeInUp"><?php echo $avenue_options['avenue_footer_cta_text']; ?></h3>
                    </div>

                    <div class="col-sm-4 text-right">
                        <a class="avenue-button button-cta smartcat-animate fadeInUp" href="<?php echo $avenue_options['avenue_footer_button_url']; ?>">
                            <?php echo $avenue_options['avenue_footer_button_text']; ?>
                        </a>
                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>

    <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>

        <div class="footer-boxes container">

            <div class="row ">

                <div class="col-md-12">

                    <div id="secondary" class="widget-area" role="complementary">

                        <?php dynamic_sidebar( 'sidebar-footer' ); ?>

                        <div class="clear"></div>

                    </div>

                </div>            

            </div>        

        </div>

    <?php endif; ?>

    <div class="site-info">
        
        <div class="container">
        
            <div class="row">

                <div class="col-xs-3 text-left">

                    <i class="scroll-top fa fa-chevron-up"></i>

                </div>

                <div class="col-xs-9 text-right">

                    <span class="avenue-copyright">
                        <?php echo esc_html( $avenue_options['sc_footer_text'] ); ?>
                    </span>

                    <?php do_action( 'avenue_designer' ); ?>

                </div>

            </div>
            
        </div>
        
    </div>
    
</footer><!-- #colophon -->

