<?php $avenue_options = avenue_get_options(); ?>

<div id="site-cta-wrap">

    <div class="container">

        <div id="site-cta" class="row"><!-- #CTA boxes -->

            <div class="col-md-12">

                <div class="col-md-4 site-cta">

                    <div class="col-md-1">

                        <i class="fa <?php echo esc_attr( $avenue_options['sc_cta1_icon'] ); ?>"></i>

                    </div>

                    <div class="col-md-10">

                        <div>

                            <div class="title-wrap">
                                <h3><?php echo esc_html( $avenue_options['sc_cta1_title'] ); ?></h3>
                            </div>
                            
                            <p>
                                <?php echo esc_html( $avenue_options['sc_cta1_text'] ); ?>
                            </p>

                            <p class="">
                                <a href="<?php echo esc_url( $avenue_options['sc_cta1_url'] ); ?>" class="btn btn-default btn-primary avenue-button">
                                    <?php echo esc_html( $avenue_options['sc_cta1_button_text'] );  ?>
                                </a>
                            </p>
                            
                        </div>      

                    </div>

                </div>

                <div class="col-md-4 site-cta">

                    <div class="col-md-1">

                        <i class="fa <?php echo esc_attr( $avenue_options['sc_cta2_icon'] ); ?>"></i>

                    </div>

                    <div class="col-md-10">

                        <div>

                            <div class="title-wrap">
                                <h3><?php echo esc_html( $avenue_options['sc_cta2_title'] ); ?></h3>
                            </div>
                            
                            <p>
                                <?php echo esc_html( $avenue_options['sc_cta2_text'] ); ?>
                            </p>

                            <p class="">
                                <a href="<?php echo esc_url( $avenue_options['sc_cta2_url'] ); ?>" class="btn btn-default btn-primary avenue-button">
                                    <?php echo esc_html( $avenue_options['sc_cta2_button_text'] );  ?>
                                </a>
                            </p>        

                        </div>      

                    </div>

                </div>

                <div class="col-md-4 site-cta">

                    <div class="col-md-1">

                        <i class="fa <?php echo esc_attr( $avenue_options['sc_cta3_icon'] ); ?>"></i>

                    </div>

                    <div class="col-md-10">

                        <div>
                            
                            <div class="title-wrap">
                                <h3><?php echo esc_html( $avenue_options['sc_cta3_title'] ); ?></h3>
                            </div>
                            
                            <p>
                                <?php echo esc_html( $avenue_options['sc_cta3_text'] ); ?>
                            </p>

                            <p class="">
                                <a href="<?php echo esc_url( $avenue_options['sc_cta3_url'] ); ?>" class="btn btn-default btn-primary avenue-button">
                                    <?php echo esc_html( $avenue_options['sc_cta3_button_text'] );  ?>
                                </a>
                            </p>        

                        </div>      

                    </div>

                </div>

            </div>

        </div><!-- #CTA boxes -->

        <div class="clear"></div>
        
    </div>
    
</div>