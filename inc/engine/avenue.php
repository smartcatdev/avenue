<?php
/* 
 * Avenue Go
 */

function avenue_scripts() {
    wp_enqueue_style('avenue-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css', array(), SC_AVENUE_VERSION);
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), SC_AVENUE_VERSION);
    wp_enqueue_style('avenue-animations', get_template_directory_uri() . '/inc/css/animate.css', array(), SC_AVENUE_VERSION);    
    wp_enqueue_style('avenue-main-style', get_template_directory_uri() . '/inc/css/style.css', array(), SC_AVENUE_VERSION);
    if('Source Sans Pro, sans-serif' == of_get_option('sc_font_family', 'Source Sans Pro, sans-serif') ) 
        wp_enqueue_style('avenue-font-sans', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600', array(), SC_AVENUE_VERSION);
    if('Lato, sans-serif' == of_get_option('sc_font_family')) 
        wp_enqueue_style('avenue-font-lato', 'http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic', array(), SC_AVENUE_VERSION);
    
    wp_enqueue_style('avenue-template', get_template_directory_uri() . '/inc/css/temps/' . of_get_option('sc_theme_color', 'orange') . '.css', array(), SC_AVENUE_VERSION);
    wp_enqueue_style('avenue-slider-style', get_template_directory_uri() . '/inc/css/camera.css', array(), SC_AVENUE_VERSION);


    wp_enqueue_script('avenue-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), SC_AVENUE_VERSION, true);
    wp_enqueue_script('avenue-sticky', get_template_directory_uri() . '/inc/js/jquery.sticky.js', array('jquery'), SC_AVENUE_VERSION, true);
    wp_enqueue_script('avenue-bootstrapjs', get_template_directory_uri() . '/inc/js/bootstrap.js', array('jquery'), SC_AVENUE_VERSION, true);
    wp_enqueue_script('avenue-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), SC_AVENUE_VERSION, true);

    wp_enqueue_script('avenue-easing', get_template_directory_uri() . '/inc/js/jquery.easing.1.3.js', array('jquery'), SC_AVENUE_VERSION, true);
    wp_enqueue_script('avenue-cameraslider', get_template_directory_uri() . '/inc/js/camera.js', array('jquery'), SC_AVENUE_VERSION, true);
    wp_enqueue_script('avenue-wow', get_template_directory_uri() . '/inc/js/wow.min.js', array('jquery'), SC_AVENUE_VERSION, true);
    wp_enqueue_script('avenue-script', get_template_directory_uri() . '/inc/js/script.js', array('jquery', 'jquery-ui-core'), SC_AVENUE_VERSION);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'avenue_scripts');


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function avenue_widgets_init() {

    register_sidebar(array(
        'name' => __('Homepage Top Widget A', 'avenue'),
        'id' => 'sidebar-banner',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s animated avenue-animate fadeIn">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Homepage Top Widget B', 'avenue'),
        'id' => 'sidebar-bannerb',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s animated avenue-animate fadeIn">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Homepage Top Widget C', 'avenue'),
        'id' => 'sidebar-bannerc',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s animated avenue-animate fadeIn">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Sidebar', 'avenue'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer', 'avenue'),
        'id' => 'sidebar-footer',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="' . esc_attr( of_get_option('sc_footer_columns', 'col-md-4') ) . ' widget %2$s animated avenue-animate fadeIn">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'avenue_widgets_init');


add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            jQuery('#example_showhidden').click(function() {
                jQuery('#section-example_text_hidden').fadeToggle(400);
            });

            if (jQuery('#example_showhidden:checked').val() !== undefined) {
                jQuery('#section-example_text_hidden').show();
            }

        });
    </script>
    <?php
}


function sc_smartcat_add_favicon(){
    if( of_get_option( 'sc_favicon' ) ) :
        echo '<link rel="shortcut icon" type="image/png" href="'. esc_attr( of_get_option( 'sc_favicon' ) ) . '"/>';
    endif;
}
add_action('wp_head', 'sc_smartcat_add_favicon');

function sc_smartcat_add_custom_code(){
    if( of_get_option( 'sc_custom_code' ) ) :
        echo '<script>' . esc_js( of_get_option( 'sc_custom_code' ) ) . '</script>';
    endif;
}
add_action('wp_head', 'sc_smartcat_add_custom_code');


add_action('wp_head', 'sc_avenue_css');
function sc_avenue_css() {
    ?>
    <style type="text/css">
        body{
            font-size: <?php echo esc_attr( of_get_option('sc_font_size') ); ?>;
            font-family: <?php echo esc_attr( of_get_option('sc_font_family') ); ?>;
        }
    </style>
    <?php
}

class sc_recent_posts_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'sc_recent_posts_widget', __('Avenue Recent Articles', 'sc_recent_posts_widget_domain'), array('description' => __('Use this widget to display the Avenue Recent Posts.', 'sc_recent_posts_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
//        include 'inc/widget.php';
        avenue_recent_posts();

    }

    // Widget Backend
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Recent Articles', 'sc_recent_posts_widget_domain');
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />             
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

}

// Class sc_recent_posts_widget ends here
// Register and load the widget
function sc_avenue_load_widget() {
    register_widget('sc_recent_posts_widget');
}

add_action('widgets_init', 'sc_avenue_load_widget');

function avenue_recent_posts() {
    $args = array(
        'numberposts' => '4',
        'post_status' => 'publish'
    );
    ?>
    <div id="sc_avenue_recent_posts">
        <?php $recent_posts = wp_get_recent_posts($args);
        foreach ($recent_posts as $post) { ?>
            <div class="col-sm-3">
                <div>
                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post['ID'])); ?>
                    <img src="<?php echo $url; ?> " title="<?php echo $post['post_title']; ?>"/>
                    <div class="overlay">
                        <a href="<?php echo get_permalink($post['ID']) ?>" class="title">
                            <?php echo $post['post_title']; ?>
                        </a>
                        <?php // $date = new DateTime($post['post_date']); ?>
                        <div class="date">
                            <i class="fa fa-calendar"></i>
                            <?php echo date('M d', strtotime($post['post_date'])); ?>
                        </div>
                        <div class="author">
                            <i class="fa fa-pencil"></i>
                            <?php echo get_userdata($post['post_author'])->user_login; ?>
                        </div>
                        
                    </div>
                </div>
            </div>
    <?php } ?>
    </div>
<?php
}

function sc_footer() {
    echo of_get_option('sc_footer_text', '2015 - Your Company Name');?>
    <br>
    <!-- Before you delete the link, please make a donation! Links & donations are the only way i get credit for the days it took to make this theme -->
    <a href="http://smartcatdesign.net/" rel="designer">
        <img src="<?php echo get_template_directory_uri() . '/inc/images/cat_logo.png'; ?>" width="20px"/>
        <?php _e('Design by SmartCat','avenue'); ?>
    </a>
<?php }

function sc_slider() { ?>
<script>
    jQuery(document).ready(function($){
        jQuery('#camera_wrap_1').camera({
            height: '30%',
            loader: 'pie',
            pagination: false,
            thumbnails: false,
            fx: 'simpleFade',
            time: 4000,
            overlayer: true,
            playPause : false
        });            
    });

</script>
    <div class="sc-slider-wrapper">
	<div class="fluid_container">
        <div class="camera_wrap" id="camera_wrap_1">

                <?php if ('' != of_get_option('sc_slide1_image', get_template_directory_uri() . '/images/avenue-background.jpg')) { ?>
                    <div data-thumb="<?php echo esc_attr( of_get_option('sc_slide1_image', get_template_directory_uri() . '/images/avenue-background.jpg' ) )  ?>" data-src="<?php echo esc_attr( of_get_option('sc_slide1_image', get_template_directory_uri() . '/images/avenue-background.jpg' ) ) ?>">
                        <div class="camera_caption fadeFromBottom">
                            <div class="row">
                                
                                <div>
                                    <span class="primary-caption fadeInLeft animated"><?php echo ( of_get_option('sc_slide1_text','Welcome to Avenue') );?></span>
                                </div>
                                <div>
                                    <span class="secondary-caption fadeInUp animated"><?php echo ( of_get_option('sc_slide1_text2','WordPress Responsive Multi Purpose Theme') );?></span>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>            
            
                <?php if ('' != of_get_option('sc_slide2_image', get_template_directory_uri() . '/images/avenue-background.jpg')) { ?>
                      <div data-thumb="<?php echo esc_attr( of_get_option('sc_slide2_image', get_template_directory_uri() . '/images/avenue-background.jpg' ) ) ?>" data-src="<?php echo esc_attr( of_get_option('sc_slide2_image', get_template_directory_uri()  . '/images/avenue-background.jpg' ) ); ?>">
                        <div class="camera_caption fadeFromBottom">
                            <div class="row">
                                
                                <div>
                                    <span class="primary-caption fadeInLeft animated"><?php echo of_get_option('sc_slide2_text','Attract Your Clients');?></span>
                                </div>
                                <div>
                                    <span class="secondary-caption fadeInUp animated"><?php echo of_get_option('sc_slide2_text2','With Avenue Unique Call Outs');?></span>
                                </div>                                
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>   
            
                <?php if ('' != of_get_option('sc_slide3_image', get_template_directory_uri() . '/images/avenue-background.jpg')) { ?>     
                    <div data-thumb="<?php echo esc_attr( of_get_option('sc_slide3_image', get_template_directory_uri() . '/images/avenue-background.jpg') ) ?>" data-src="<?php echo esc_attr( of_get_option('sc_slide3_image', get_template_directory_uri() . '/images/avenue-background.jpg' ) ) ?>">
                        <div class="camera_caption fadeFromBottom">
                            <div class="row">
                                
                                <div>
                                    <span class="primary-caption fadeInLeft animated"><?php echo of_get_option('sc_slide3_text','Designed with Care');?></span>
                                </div>
                                <div>
                                    <span class="secondary-caption fadeInUp animated"><?php echo of_get_option('sc_slide3_text2','Easy to Use');?></span>
                                </div>                                    
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>      
        </div><!-- #camera_wrap_1 -->
        </div>
    </div>
    <?php
}

function sc_ctas() {
    ?>
    <div id="site-cta" class="row"><!-- #CTA boxes -->
        <div class="col-md-12">
            <div class="col-md-4 site-cta">
                <div class="col-md-2">
                    <i class="<?php echo esc_attr( of_get_option('sc_cta1_icon', 'fa fa-star') ); ?>"></i>
                </div>
                <div class="col-md-10">
                    <div>
                        <h3><?php echo of_get_option('sc_cta1_title', 'Unique Design') ?></h3>
                        <p>
                            <?php echo of_get_option('sc_cta1_text', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus earum atque sit minus labore quaerat.'); ?>
                        </p>
                        <p class="text-right">
                            <a href="<?php echo esc_attr( of_get_option('sc_cta1_url') ); ?>" class="btn btn-default btn-primary"><?php echo of_get_option('sc_cta1_button_text', 'Click Here');  ?></a>
                        </p>                                
                    </div>                            
                </div>
            </div>
            <div class="col-md-4 site-cta">
                <div class="col-md-2">
                    <i class="<?php echo esc_attr( of_get_option('sc_cta2_icon', 'fa fa-mobile') ); ?>"></i>
                </div>
                <div class="col-md-10">
                    <div>
                        <h3><?php echo of_get_option('sc_cta2_title', 'Responsive') ?></h3>
                        <p>
                            <?php echo of_get_option('sc_cta2_text', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus earum atque sit minus labore quaerat.'); ?>
                        </p>
                        <p class="text-right">
                            <a href="<?php echo esc_attr( of_get_option('sc_cta2_url') );?>" class="btn btn-default btn-primary"><?php echo of_get_option('sc_cta2_button_text', 'Click Here');  ?></a>
                        </p>                                
                    </div>                            
                </div>
            </div>
            <div class="col-md-4 site-cta">
                <div class="col-md-2">
                    <i class="<?php echo esc_attr( of_get_option('sc_cta3_icon', 'fa fa-gears') ); ?>"></i>
                </div>
                <div class="col-md-10">
                    <div>
                        <h3><?php echo of_get_option('sc_cta3_title', 'Easy to Use') ?></h3>
                        <p>
                            <?php echo of_get_option('sc_cta3_text', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus earum atque sit minus labore quaerat.') ?>
                        </p>
                        <p class="text-right">
                            <a href="<?php echo esc_attr( of_get_option('sc_cta3_url') );?>" class="btn btn-default btn-primary"><?php echo of_get_option('sc_cta3_button_text', 'Click Here');  ?></a>
                        </p>
                    </div>                            
                </div>
            </div>
        </div>
    </div><!-- #CTA boxes -->
    <div class="clear"></div>
    <?php
}

function sc_banner() {
    ?>
    <div id="top-banner" class="full-banner col-md-12">
        <div class="row">
            <div class="center">
                <div class="top-banner-text">
                    <?php get_sidebar('banner'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <?php
}

function sc_bannerb() {
    ?>
    <div id="mid-banner" class="full-banner col-md-12">
        <div class="row">
            <div class="center">
                <div class="top-banner-text animated avenue-animate fadeIn">
                    <?php get_sidebar('bannerb'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <?php
}
function sc_bannerc() {
    ?>
    <div id="bottom-banner" class="full-banner col-md-12">
        <div class="row">
            <div class="center">
                <div class="top-banner-text animated avenue-animate fadeIn">
                    <?php get_sidebar('bannerc'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <?php
}

function sc_toolbar() {
    if ('yes' == of_get_option('sc_headerbar_bool', 'yes')) {
        ?>
        <div id="site-toolbar">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-xs-6 contact-bar">
                        <?php if ('' != of_get_option('sc_phone_url', '#')) { ?>
                            <a href="tel:+<?php echo esc_attr( of_get_option('sc_phone_url', '6131231322') ); ?>" class="icon-phone">
                                <i class="fa fa-mobile"></i>
                                <span><?php echo of_get_option('sc_phone_url', '6131231322'); ?></span>
                            </a>
                        <?php } ?>

                        <?php if ('' != of_get_option('sc_address_url', '123 main street, Kingston, Ontario')) { ?>
                            <a href="#" class="icon-map">
                                <i class="fa fa-map-marker"></i>
                                <span><?php echo of_get_option('sc_address_url', '123 main street, Kingston, Ontario') ?></span>
                            </a>
                        <?php } ?>


                    </div>

                    <div class="col-xs-6 social-bar">

                        <?php if ('' != of_get_option('sc_facebook_url', '#')) { ?>
                            <a href="<?php echo esc_attr( of_get_option('sc_facebook_url') ); ?>" target="_blank" class="icon-facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        <?php } ?>

                        <?php if ('' != of_get_option('sc_twitter_url', '#')) { ?>
                            <a href="<?php echo esc_attr( of_get_option('sc_twitter_url') ); ?>" target="_blank" class="icon-twitter">
                                <i class="fa fa-twitter"></i>                            
                            </a>
                        <?php } ?>


                        <?php if ('' != of_get_option('sc_linkedin_url', '#')) { ?>
                            <a href="<?php echo esc_attr( of_get_option('sc_linkedin_url') ); ?>" target="_blank" class="icon-linkedin">
                                <i class="fa fa-linkedin"></i>                            
                            </a>
                        <?php } ?>


                        <?php if ('' != of_get_option('sc_gplus_url', '#')) { ?>
                            <a href="<?php echo esc_attr( of_get_option('sc_gplus_url') ); ?>" target="_blank" class="icon-gplus">
                                <i class="fa fa-google-plus"></i>                            
                            </a>
                        <?php } ?>

                        <?php if ('' != of_get_option('sc_youtube_url', '#')) { ?>
                            <a href="<?php echo esc_attr( of_get_option('sc_youtube_url') ); ?>" target="_blank" class="icon-gplus">
                                <i class="fa fa-youtube"></i>                            
                            </a>
                        <?php } ?>

                        <?php if ('' != of_get_option('sc_pinterest_url', '#')) { ?>
                            <a href="<?php echo esc_attr( of_get_option('sc_pinterest_url') ); ?>" target="_blank" class="icon-gplus">
                                <i class="fa fa-pinterest"></i>                            
                            </a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

function avenue_close(){ ?>
    
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="footer-boxes">
            <div class="row">
                <div class="col-md-12">
                    <?php get_sidebar('footer'); ?>

                </div>            
            </div>        
        </div>
        <div class="site-info">
            <div class="row">

                <div class="col-xs-6 text-left">
                    <i class="scroll-top fa fa-chevron-circle-up"></i>
                </div>
                <div class="col-xs-6 text-right">
                    <?php echo sc_footer(); ?>
                </div>

            </div>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->    
    
<?php }