<?php if( is_active_sidebar( 'sidebar-banner' ) ) : ?>
            
    <div id="homepage-area-a" class="full-banner homepage-widget-area">

        <div class="inner">
        
            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div class="top-banner-text">
                            <?php dynamic_sidebar( 'sidebar-banner' ); ?>
                        </div>

                    </div>

                </div>

            </div>
            
        </div>

    </div>

    <div class="clear"></div>

<?php endif;

if( is_active_sidebar( 'sidebar-bannerb' ) ) :?>

    <div id="homepage-area-b" class="homepage-widget-area">

        <div class="inner">
        
            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div class="top-banner-text">
                            <?php dynamic_sidebar( 'sidebar-bannerb' ); ?>
                        </div>            

                    </div>

                </div>

            </div>
            
        </div>

    </div>

<?php endif;

if( is_active_sidebar( 'sidebar-bannerc' ) ) :?>

    <div id="homepage-area-c" class="homepage-widget-area">

        <div class="inner">
            
            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div class="top-banner-text">
                            <?php dynamic_sidebar( 'sidebar-bannerc' ); ?>
                        </div>            

                    </div>

                </div>

            </div>
            
        </div>

    </div>

<?php endif;
