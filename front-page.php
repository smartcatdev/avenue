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

        $("#sc-slider #sc-thumb .set img").click(function() {
            var newimage = $(this).attr("src");
            //$("#sc-slider #sc-main img").css({"visibility":"hidden"});//fadeOut(500)
            //$("#sc-slider #sc-main img").css({"visibility":"hidden"}).attr("src",newimage).css({"visibility":"visible"});

            // var theContainer = $(this).parent().parent().parent();
            // alert($(this).closest('#sc-main').html());
            // alert($(this).parent().parent().parent().html());
            var newId = $(this).parent().parent().parent().attr('id');

            $('#' + newId + ' #sc-main img').animate({"visibility": "hidden"}, 300, function() {
                $(this).attr("src", newimage).css({"display": "none", "visibility": "visible"}).fadeIn(500);
            });

        });

    });
</script>
<div id="main-slider"> <!-- #slider -->
    <div class="col-md-12">

        <div class="the-survey">
            
            <div class="survey-slide" id="slide1" style="display: none;">
                <h1>Know Your Next Steps?</h1>
                <p>How does crowdfunding relate to your business or investing goals? How can you quickly and easily get up to speed on crowdfunding for your situation?</p>
                <p>Take this 2-minute quiz to receive an instant, personalized reading list &amp; action plan that will guide you to crowdfunding success.</p>
                <p class="action">
                    <a class="button-primary" id="begin-survey">Start Now</a>
                </p>
                <div class="navigation">
                    <div class="left"><i class="fa fa-chevron-left" style="display: none;"></i></div>
                    <div class="right"><i class="fa fa-chevron-right" style="display: none;"></i></div>
                </div>
            </div>

            <div class="survey-slide quest" id="slide2" style="display: none;">
                <h1>What kind of organization are you?</h1> <br><br>

                <div class="navigation">
                    <div class="left"><i class="fa fa-chevron-left" style="display: none;"></i></div>
                    <div class="right"><i class="fa fa-chevron-right" style="display: none;"></i></div>
                </div>
                
            </div>

            <div class="survey-slide quest" id="slide3" style="display: block;">
                <h1>How much do you know about Crowdfunding ?</h1><br><br>

                <div class="navigation">
                    <div class="left"><i class="fa fa-chevron-left" style="display: none;"></i></div>
                    <div class="right"><i class="fa fa-chevron-right" style="display: none;"></i></div>
                </div>

            </div>

            <div class="survey-slide quest" id="slide4" style="display: none;">
                <h1>What are you interested in learning more about ?</h1> <br><br>

                    <div class="navigation">
                        <div class="left"><i class="fa fa-chevron-left" style="display: none;"></i></div>
                        <div class="right"><i class="fa fa-chevron-right" style="display: none;"></i></div>
                    </div>

            </div>

            <div class="survey-slide quest" id="slide5" style="display: none;">
                <h1>What is your timing for a Crowdfunding project ?</h1> <br><br>

                <div class="navigation">
                    <div class="left"><i class="fa fa-chevron-left" style="display: none;"></i></div>
                    <div class="right"><i class="fa fa-chevron-right" style="display: none;"></i></div>
                </div>

                <div class="err-message"></div>
            </div>

            <div class="survey-slide" id="slide6" style="display: none;">
                <h1>Thank you!</h1>
 
                <div class="err-message"></div>
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