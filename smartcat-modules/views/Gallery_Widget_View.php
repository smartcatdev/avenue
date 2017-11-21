<?php 

$args = array (
    'numberposts'   => ( !empty( $instance['scmod_gallery_limit'] ) ? (int)$instance['scmod_gallery_limit'] : -1 ),
    'post_status'   => 'publish',
    'post_type'     => 'gallery'
);

if( !empty( $instance['scmod_gallery_group'] ) && $instance['scmod_gallery_group'] != 'all' ) :
        
    $args['tax_query'] = array(
        array(
            'taxonomy'  =>  'gallery_group',
            'field'     => 'slug',
            'terms'     => array( $instance['scmod_gallery_group'] ),
        )
    );

endif;

$gallery = wp_get_recent_posts( $args );
$gallery_style = empty( $instance['scmod_gallery_shuffle'] ) || $instance['scmod_gallery_shuffle'] == 'normal' ? 'normal' : 'shuffle';

?>

<script type="text/javascript">

    jQuery(document).ready(function($){
        
        var galleries = $("#avenue-gallery");

        galleries.each( function( index ) {
            if ( ! $(this).hasClass( 'ug-gallery-wrapper') ) {
                $(this).unitegallery({
                    <?php if ( !empty( $instance['scmod_gallery_tile_style'] ) && $instance['scmod_gallery_tile_style'] != 'columns' ) : ?>
                        tiles_type: '<?php echo $instance['scmod_gallery_tile_style'] == 'justified' ? 'justified' : 'nested'; ?>',
                    <?php endif; ?>
                    tiles_col_width: 300,
                    lightbox_type: 'compact',
                    tile_enable_icons: false,
                    theme_appearance_order: '<?php echo $gallery_style; ?>',
                });
            }
        });
        
    });

</script>

<div class="avenue-gallery <?php echo isset( $instance['scmod_gallery_widget_width'] ) ? 'col-sm-' . $instance['scmod_gallery_widget_width'] : 'col-sm-12'; ?>">

    <div class="widget">

        <div class="inner">
    
            <h2 class="widget-title">
                <?php echo !empty( $instance['scmod_gallery_title'] ) ? esc_html( $instance['scmod_gallery_title'] ) : ''; ?>
            </h2>

            <div class="row">

                <div class="col-sm-12">

                    <?php if ( !empty( $gallery ) ) : ?>

                        <div id="avenue-gallery" style="display:none;">

                            <?php foreach( $gallery as $item ) : ?>

                                <?php if ( has_post_thumbnail( $item['ID'] ) ) : ?>
                            
                                    <?php $feat_image = get_the_post_thumbnail_url( $item['ID'] ); ?>

                                    <a href="#">
                                        <img alt="<?php echo esc_attr( $item['post_title'] ); ?>"
                                             src="<?php echo esc_url( $feat_image ); ?>"
                                             data-image="<?php echo esc_url( $feat_image ); ?>"
                                             data-description="<?php echo esc_attr( $item['post_title'] ); ?>">
                                    </a>
                            
                                <?php endif; ?>

                            <?php endforeach; ?>

                            <?php wp_reset_postdata(); ?>

                        </div>

                    <?php else : ?>

                        <h4 class="none-to-display"><?php _e( 'There are currently no photos to display in the Gallery, please check again at a later time.', 'avenue' ); ?></h4>

                    <?php endif; ?>

                </div>

            </div>
            
        </div>
        
    </div>

</div>
