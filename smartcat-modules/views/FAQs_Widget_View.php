<?php

$args = array (
    'post_type' => array ( 'faq' ),
    'post_status' => array ( 'publish' ),
    'order' => 'DESC',
    'orderby' => 'date',
    'posts_per_page' => ( !empty( $instance['scmod_faqs_limit'] ) ? (int)$instance['scmod_faqs_limit'] : -1 ),
);

// The Query
$faqs = new WP_Query( $args );

// The Loop
if ( $faqs->have_posts() ) : ?>

    <div class="avenue-faq <?php echo isset( $instance['scmod_faqs_widget_width'] ) ? 'col-sm-' . $instance['scmod_faqs_widget_width'] : 'col-sm-12'; ?>">

        <div class="widget">
    
            <div class="inner">
        
                <h2 class="widget-title">
                    <?php echo !empty( $instance['scmod_faqs_title'] ) ? esc_html( $instance['scmod_faqs_title'] ) : ''; ?>
                </h2>

                <div class="row">

                    <?php while ( $faqs->have_posts() ) : $faqs->the_post(); ?>

                        <div class="faq-item col-sm-12">

                          <div class="faq-content">

                            <?php echo get_the_title(); ?>

                            <div class="faq-answer">
                                <?php echo strip_tags( get_the_content() ); ?>
                            </div>

                          </div>

                        </div>

                    <?php endwhile; ?>

                </div>
                
            </div>
            
        </div>

    </div>

<?php else : ?>

    <h4 class="none-to-display"><?php _e( 'There are currently no FAQs, please check again at a later time.', 'avenue' ); ?></h4>

<?php endif; ?>
    
<?php wp_reset_postdata(); ?>
