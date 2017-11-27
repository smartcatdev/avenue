<?php $avenue_options = avenue_get_options(); ?>

<?php if ( $avenue_options['sc_slide1_image'] || $avenue_options['sc_slide2_image'] || $avenue_options['sc_slide3_image'] ) : ?>

    <div id="parent-slider-wrap" class="sc-slider-wrapper">

        <div class="fluid_container">

            <div class="camera_wrap" id="avenue_slider_wrap">

                <?php for ( $ctr = 1; $ctr < apply_filters( 'avenue_capacity', 1 ); $ctr++ ) : ?>

                    <?php if ( $avenue_options['sc_slide' . $ctr . '_image'] ) : ?>

                        <div data-thumb="<?php echo esc_attr( $avenue_options['sc_slide' . $ctr . '_image'] ); ?>" data-src="<?php echo esc_attr( $avenue_options['sc_slide' . $ctr . '_image'] ); ?>">

                            <div class="camera_caption fadeFromBottom">

                                <?php if ( isset( $avenue_options['sc_slide' . $ctr . '_text'] ) && $avenue_options['sc_slide' . $ctr . '_text'] != '' ) : ?>

                                    <div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <span class="primary-caption animated fadeInLeft">
                                                        <?php echo esc_html( $avenue_options['sc_slide' . $ctr . '_text'] ); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php endif; ?>
                                
                                <?php if ( isset( $avenue_options['sc_slide' . $ctr . '_text2'] ) && $avenue_options['sc_slide' . $ctr . '_text2'] != '' ) : ?>

                                    <div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <span class="secondary-caption fadeInUp animated">
                                                        <?php echo esc_html( $avenue_options['sc_slide' . $ctr . '_text2'] ); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endif; ?>

                <?php endfor; ?>

            </div><!-- #camera_wrap_1 -->

        </div>

    </div>

<?php endif;
