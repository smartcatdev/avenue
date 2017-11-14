<?php $avenue_options = avenue_get_options(); ?>

<div id="site-toolbar">
    
    <div class="container">
    
        <div class="row">

            <div class="col-sm-12">
            
                <div class="contact-bar">

                    <?php if ( isset( $avenue_options['sc_phone_url'] ) && $avenue_options['sc_phone_url'] != '' ) : ?>

                        <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $avenue_options['sc_phone_url'] ) ); ?>" class="icon-phone">

                            <i class="fa fa-mobile"></i>

                            <span>
                                <?php echo esc_html( $avenue_options['sc_phone_url'] ); ?>
                            </span>

                        </a>

                    <?php endif; ?>

                    <?php if ( isset( $avenue_options['sc_address_url'] ) && $avenue_options['sc_address_url'] != '' ) : ?>

                        <a target="_BLANK" href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode( $avenue_options['sc_address_url'] ); ?>" class="icon-map">

                            <i class="fa fa-map-marker"></i>

                            <span>
                                <?php echo esc_html( $avenue_options['sc_address_url'] ); ?>
                            </span>

                        </a>

                    <?php endif; ?>

                </div>

                <div class="social-bar">

                    <?php if ( isset( $avenue_options['sc_pinterest_url'] ) && $avenue_options['sc_pinterest_url'] != '' ) : ?>
                        <a href="<?php echo esc_attr( $avenue_options['sc_pinterest_url'] ); ?>" target="_blank" class="icon-pinterest">
                            <i class="fa fa-pinterest"></i>                            
                        </a>
                    <?php endif; ?>

                    <?php if ( isset( $avenue_options['sc_youtube_url'] ) && $avenue_options['sc_youtube_url'] != '' ) : ?>
                        <a href="<?php echo esc_attr( $avenue_options['sc_youtube_url'] ); ?>" target="_blank" class="icon-youtube">
                            <i class="fa fa-youtube"></i>                            
                        </a>
                    <?php endif; ?>

                    <?php if ( isset( $avenue_options['sc_instagram_url'] ) && $avenue_options['sc_instagram_url'] != '' ) : ?>
                        <a href="<?php echo esc_attr( $avenue_options['sc_instagram_url'] ); ?>" target="_blank" class="icon-instagram">
                            <i class="fa fa-instagram"></i>                            
                        </a>
                    <?php endif; ?>

                    <?php if ( isset( $avenue_options['sc_gplus_url'] ) && $avenue_options['sc_gplus_url'] != '' ) : ?>
                        <a href="<?php echo esc_attr( $avenue_options['sc_gplus_url'] ); ?>" target="_blank" class="icon-gplus">
                            <i class="fa fa-google-plus"></i>                            
                        </a>
                    <?php endif; ?>

                    <?php if ( isset( $avenue_options['sc_linkedin_url'] ) && $avenue_options['sc_linkedin_url'] != '' ) : ?>
                        <a href="<?php echo esc_attr( $avenue_options['sc_linkedin_url'] ); ?>" target="_blank" class="icon-linkedin">
                            <i class="fa fa-linkedin"></i>                            
                        </a>
                    <?php endif; ?>

                    <?php if ( isset( $avenue_options['sc_twitter_url'] ) && $avenue_options['sc_twitter_url'] != '' ) : ?>
                        <a href="<?php echo esc_attr( $avenue_options['sc_twitter_url'] ); ?>" target="_blank" class="icon-twitter">
                            <i class="fa fa-twitter"></i>                            
                        </a>
                    <?php endif; ?>

                    <?php if ( isset( $avenue_options['sc_facebook_url'] ) && $avenue_options['sc_facebook_url'] != '' ) : ?>
                        <a href="<?php echo esc_attr( $avenue_options['sc_facebook_url'] ); ?>" target="_blank" class="icon-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    <?php endif; ?>

                </div>
                
            </div>

        </div>
        
    </div>
    
</div>
