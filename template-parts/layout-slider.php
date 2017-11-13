<?php $avenue_options = avenue_get_options(); ?>

<?php if ( $avenue_options['sc_slide1_image'] || $avenue_options['sc_slide2_image'] || $avenue_options['sc_slide3_image'] ) : ?>

    <div class="sc-slider-wrapper">

        <div class="fluid_container">

            <div class="camera_wrap" id="avenue_slider_wrap">

                <?php for ( $ctr = 1; $ctr < apply_filters( 'avenue_capacity', 1 ); $ctr++ ) : ?>

                    <?php if ( $avenue_options['sc_slide' . $ctr . '_image'] ) : ?>

                        <div data-thumb="<?php echo esc_attr( $avenue_options['sc_slide' . $ctr . '_image'] ); ?>" data-src="<?php echo esc_attr( $avenue_options['sc_slide' . $ctr . '_image'] ); ?>">

                            <div class="camera_caption fadeFromBottom">

                                <?php if ( isset( $avenue_options['sc_slide' . $ctr . '_text'] ) ) : ?>

                                    <span class="smartcat-animate fadeInUp">
                                        <?php echo esc_attr( $avenue_options['sc_slide' . $ctr . '_text'] ); ?>
                                    </span>

                                <?php endif; ?>
                                
                                <?php if ( isset( $avenue_options['sc_slide' . $ctr . '_text2'] ) ) : ?>

                                    <span class="smartcat-animate fadeInUp">
                                        <?php echo esc_attr( $avenue_options['sc_slide' . $ctr . '_text2'] ); ?>
                                    </span>

                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endif; ?>

                <?php endfor; ?>

            </div><!-- #camera_wrap_1 -->

        </div>

    </div>

<?php endif;
