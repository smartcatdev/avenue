<div class="avenue-pricing-table <?php echo isset( $instance['scmod_pricing_table_width'] ) ? 'col-sm-' . $instance['scmod_pricing_table_width'] : 'col-sm-4'; ?>">
    
    <div class="widget">
        
        <div class="inner <?php echo !empty( $instance['scmod_pricing_table_is_special'] ) ? 'special': ''; ?>">

            <?php if ( !empty( $instance['scmod_pricing_table_is_special'] ) ) : ?>
                <span class="special"><span class="fa fa-star"></span></span>
            <?php endif; ?>

            <div class="pricing-table-header">

                <h2 class="widget-title">
                    <?php echo !empty( $instance['scmod_pricing_table_title'] ) ? esc_html( $instance['scmod_pricing_table_title'] ) : ''; ?>
                </h2>

            </div>

            <div class="price">
                <?php echo !empty( $instance['scmod_pricing_table_price'] ) ? esc_html( $instance['scmod_pricing_table_price'] ) : ''; ?>
            </div>
                
            <div class="subtitle">
                <?php echo !empty( $instance['scmod_pricing_table_detail'] ) ? esc_html( $instance['scmod_pricing_table_detail'] ) : ''; ?>
            </div>

            <div class="pricing-table-footer">
                
                <div class="description">
                    <?php echo !empty( $instance['scmod_pricing_table_description'] ) ? esc_html( $instance['scmod_pricing_table_description'] ) : ''; ?>
                </div>

            </div>
                
            <?php if ( !empty( $instance['scmod_pricing_table_url'] ) && !empty( $instance['scmod_pricing_table_button_label'] ) ) : ?>
                <a class="avenue-button button-primary" href="<?php echo esc_url( $instance['scmod_pricing_table_url'] ); ?>">
                    <?php echo esc_html( $instance['scmod_pricing_table_button_label'] ); ?>
                </a>
            <?php endif;?>
                
        </div>
        
    </div>

</div>