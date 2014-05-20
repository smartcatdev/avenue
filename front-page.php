<?php
/*
 * Short description
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
get_header();
?>
<script>
    jQuery(document).ready(function($) {



    });
</script>
<div id="main-slider"> <!-- #slider -->
    <div class="col-md-12">

        <div class="the-survey">

            <div class="survey-slide" id="slide1" style="display: none;">
                <h1><span>Know Your Next Steps?</span></h1>
                <div class="navigation">
                    <div class="left"><i class="fa fa-chevron-left" style="display: none;"></i></div>
                    <div class="right"><i class="fa fa-chevron-right" style="display: none;"></i></div>
                </div>
            </div>

            <div class="survey-slide quest" id="slide2" style="display: none;">
                <h1><span>What kind of organization are you?</span></h1>
                <div class="navigation">
                    <div class="left"><i class="fa fa-chevron-left" style="display: none;"></i></div>
                    <div class="right"><i class="fa fa-chevron-right" style="display: none;"></i></div>
                </div>                
            </div>

            <div class="survey-slide quest" id="slide3" style="display: block;">
                <h1><span>How much do you know about Crowdfunding ?</span></h1>
                <div class="navigation">
                    <div class="left"><i class="fa fa-chevron-left" style="display: none;"></i></div>
                    <div class="right"><i class="fa fa-chevron-right" style="display: none;"></i></div>
                </div>                
            </div>

            <div class="survey-slide quest" id="slide4" style="display: none;">
                <h1><span>What are you interested in learning more about ?</span></h1>
                <div class="navigation">
                    <div class="left"><i class="fa fa-chevron-left" style="display: none;"></i></div>
                    <div class="right"><i class="fa fa-chevron-right" style="display: none;"></i></div>
                </div>                
            </div>

            <div class="survey-slide quest" id="slide5" style="display: none;">
                <h1><span>What is your timing for a Crowdfunding project ?</span></h1>
                <div class="navigation">
                    <div class="left"><i class="fa fa-chevron-left" style="display: none;"></i></div>
                    <div class="right"><i class="fa fa-chevron-right" style="display: none;"></i></div>
                </div>                
            </div>

            


        </div>

    </div>
</div><!-- #slider -->

<div id="site-cta" class="row"><!-- #CTA boxes -->
    <div class="col-md-12">
        <div class="col-md-4 site-cta">
            <div class="col-md-2">
                <i class="fa fa-map-marker"></i>
            </div>
            <div class="col-md-10">
                <div>
                    <h3>CTA Box Title</h3>
                    <p>
                        Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repella.
                    </p>
                    <p class="text-right">
                        <a href="#" class="btn btn-default btn-primary">Click Here</a>
                    </p>                                
                </div>                            
            </div>
        </div>
        <div class="col-md-4 site-cta">
            <div class="col-md-2">
                <i class="fa fa-map-marker"></i>
            </div>
            <div class="col-md-10">
                <div>
                    <h3>CTA Box Title</h3>
                    <p>
                        Itaque earum rerum hic tenetur  Itaque earum rerum hic tenetur  Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repella.
                    </p>
                    <p class="text-right">
                        <a href="#" class="btn btn-default btn-primary">Click Here</a>
                    </p>                                
                </div>                            
            </div>
        </div>
        <div class="col-md-4 site-cta">
            <div class="col-md-2">
                <i class="fa fa-map-marker"></i>
            </div>
            <div class="col-md-10">
                <div>
                    <h3>CTA Box Title</h3>
                    <p>
                        Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repella.
                    </p>
                    <p class="text-right">
                        <a href="#" class="btn btn-default btn-primary">Click Here</a>
                    </p>
                </div>                            
            </div>
        </div>
    </div>
</div><!-- #CTA boxes -->
<div id="top-banner" class="full-banner col-md-12">
    <div class="row">
        <div class="col-md-12 center">
            <p class="top-banner-text">
                <span class="primary-color">Avenue</span> is a responsive and easily customizable theme<br>
                designed to help you set up your site in minutes

            </p>
            <p>
                <a href="#" class="btn btn-default btn-primary">Learn More</a>
            </p>
        </div>
    </div>
</div>


<div id="content" class="site-content row">
    <div class="col-md-12">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'page'); ?>
            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if (comments_open() || '0' != get_comments_number()) :
                comments_template();
            endif;
            ?>
        <?php endwhile; // end of the loop.  ?>
    </div>
</div>


<?php get_footer(); ?>