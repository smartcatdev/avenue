<?php

$args = array (
    'post_type' => array ( 'news' ),
    'post_status' => array ( 'publish' ),
    'posts_per_page' => ( !empty( $instance['scmod_news_limit'] ) ? (int)$instance['scmod_news_limit'] : -1 ),
);

// The Query
$news = new WP_Query( $args );

// The Loop
if ( $news->have_posts() ) : ?>

    <?php $ctr = 0; ?>

    <div class="avenue-news <?php echo isset( $instance['scmod_news_widget_width'] ) ? 'col-sm-' . $instance['scmod_news_widget_width'] : 'col-sm-12'; ?>">

        <div class="widget">
    
            <div class="inner">
        
                <h2 class="widget-title">
                    <?php echo !empty( $instance['scmod_news_title'] ) ? esc_html( $instance['scmod_news_title'] ) : ''; ?>
                </h2>

                <div class="row">

                    <?php while ( $news->have_posts() ) :

                        $ctr++;

                        $news->the_post();

                        ?>

                        <?php if ( has_post_thumbnail() ) : ?>

                            <div class="col-md-4">

                                <!-- Post-->
                                <div class="news-item">

                                    <!-- Thumbnail-->
                                    <div class="news-image">
                                        <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                            <div class="image" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>);">

                                            </div>
                                        </a>
                                    </div>

                                    <!-- Post Content-->
                                    <div class="post-content">
                                        <h3 class="title">
                                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <p class="description"><?php echo wp_trim_words( strip_shortcodes( strip_tags( get_the_content() ) ), 20 ); ?></p>
                                        <div class="post-meta">
                                            <span class="timestamp"><i class="fa fa-calendar-o"></i> <?php echo get_the_date( get_option( 'date_format' ) ); ?></span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        <?php else : ?>

                            <div class="col-md-4">

                                <!-- Post Content-->
                                <div class="post-content no-image">
                                    <h3 class="title">
                                        <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="description"><?php echo wp_trim_words( strip_shortcodes( strip_tags( get_the_content() ) ), 30 ); ?></p>
                                    <div class="post-meta">
                                        <span class="timestamp"><i class="fa fa-calendar-o"></i> <?php echo get_the_date( get_option( 'date_format' ) ); ?></span>
                                    </div>
                                </div>

                            </div>

                        <?php endif; ?>

                    <?php endwhile; ?>

                    <div class="clear"></div>

                </div>
                
            </div>
            
        </div>

    </div>

<?php else : ?>

    <h4 class="none-to-display"><?php _e( 'There are currently no News items to display, please check again at a later time.', 'avenue' ); ?></h4>

<?php endif; ?>
    
<?php wp_reset_postdata(); ?>

<div class="clear"></div>