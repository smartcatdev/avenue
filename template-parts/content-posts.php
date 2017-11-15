<?php
/*
 * Posts Template
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */

$avenue_options = avenue_get_options();

?>

<div class="col-sm-12">

    <div class="item-post <?php echo has_post_thumbnail() && $avenue_options['sc_blog_featured'] == 'on' ? '' : 'text-left'; ?>">

        <div class="inner">
        
            <div class="row">
            
                <?php if ( has_post_thumbnail() && $avenue_options['sc_blog_featured'] == 'on' ) : ?>

                    <div class="post-thumb col-md-4">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                        <div class="clear"></div>
                    </div>

                <?php endif; ?>

                <div class="col-md-<?php echo has_post_thumbnail() && $avenue_options['sc_blog_featured'] == 'on' ? '8' : '12'; ?>">
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div class="post-content">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-default btn-primary avenue-button" href="<?php the_permalink(); ?>">
                            <?php echo esc_html_e( 'Read More', 'avenue' ); ?>
                        </a>
                    </div>                        
                </div>

                <div class="clear"></div>
        
            </div>
                
        </div>
            
    </div>

</div>