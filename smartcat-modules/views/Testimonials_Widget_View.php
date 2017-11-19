<?php

$args = array (
    'posts_per_page'    => ( !empty( $instance['scmod_testimonials_limit'] ) ? (int)$instance['scmod_testimonials_limit'] : -1 ),
    'post_status'       => 'publish',
    'post_type'         => 'testimonial'
);

$testimonials = wp_get_recent_posts($args); ?>
    
<script type="text/javascript">

    jQuery(document).ready( function( $ ) {
        $("#testimonials").owlCarousel({

            slideSpeed : 1000,
            paginationSpeed : 1000,
            singleItem: true,
            autoPlay : 10000,
            navigation: true,
            pagination: false,
            navigationText: ['<span class="fa fa-chevron-left"></span><span class="fa fa-chevron-left"></span>','<span class="fa fa-chevron-right"></span><span class="fa fa-chevron-right"></span>']

        });    
        $('.parallax #testimonials').css('max-width', $(window).width() - 60 + 'px' );
        $(window).resize(function(){
            $('.parallax #testimonials').css('max-width', $(window).width() - 60 + 'px' );
        });
    });

</script>

<div class="avenue-testimonials <?php echo isset( $instance['scmod_testimonials_widget_width'] ) ? 'col-sm-' . $instance['scmod_testimonials_widget_width'] : 'col-sm-12'; ?>">

    <div class="widget">
    
        <div class="inner">
        
            <h2 class="widget-title">
                <?php echo !empty( $instance['scmod_testimonials_title'] ) ? esc_html( $instance['scmod_testimonials_title'] ) : ''; ?>
            </h2>

            <div class="row">

                <div class="col-sm-12">

                    <ul id="testimonials" class="owl-carousel owl-theme">

                        <?php foreach( $testimonials as $testimonial ) : ?>

                            <li class="flxbx">

                                <div class="left-cta">

                                    <div class="table-wrap">

                                        <div class="inner">

                                            <?php if ( has_post_thumbnail( $testimonial ) ) : ?>

                                                <img src="<?php echo esc_url( get_the_post_thumbnail_url( $testimonial, 'medium' ) ); ?>" alt="<?php echo $testimonial['post_title']; ?>">

                                            <?php endif; ?>

                                            <?php if ( isset( $testimonial['post_title'] ) ) : ?>

                                                <h4 class="testimonial-author center">
                                                    <?php echo esc_html( $testimonial['post_title'] ); ?>
                                                </h4>

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                </div>

                                <div class="right-cta">

                                    <div class="table-wrap">

                                        <div class="inner">

                                            <?php if ( isset( $testimonial['post_content'] ) ) : ?>
                                                <div class="testimonial-content">

                                                    &ldquo; 

                                                        <?php echo esc_html( $testimonial['post_content'] ); ?>

                                                    &rdquo;

                                                </div>
                                            <?php endif; ?>

                                        </div>

                                    </div>

                                </div>

                            </li>

                        <?php endforeach; ?>

                        <?php wp_reset_postdata(); ?>

                    </ul>

                </div>

            </div>
    
        </div>
        
    </div>
    
</div>
