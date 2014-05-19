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

	$("#sc-slider #sc-thumb .set img").click(function(){
		var newimage = $(this).attr("src");
		//$("#sc-slider #sc-main img").css({"visibility":"hidden"});//fadeOut(500)
		//$("#sc-slider #sc-main img").css({"visibility":"hidden"}).attr("src",newimage).css({"visibility":"visible"});

		// var theContainer = $(this).parent().parent().parent();
		// alert($(this).closest('#sc-main').html());
		// alert($(this).parent().parent().parent().html());
		var newId = $(this).parent().parent().parent().attr('id');
		
		$('#' + newId + ' #sc-main img').animate({"visibility":"hidden"},300,function(){
			$(this).attr("src",newimage).css({"display":"none","visibility":"visible"}).fadeIn(500);
		});
	
	});

    });
</script>
<div id="main-slider"> <!-- #slider -->
    <div class="col-md-12">

        <div id="sc-slider">
            <div id="sc-main">
                <img src="http://winter-construction.com/wp-content/uploads/ATL_Airport_118.jpg" title="/wp-content/uploads/ATL_Airport_118.jpg" style="visibility: visible;">
            </div>
            <div id="sc-thumb">
                <div class="set">
                    <img src="http://winter-construction.com/wp-content/uploads/ATL_Airport_118.jpg">
                    <img src="http://winter-construction.com/wp-content/uploads/ATL_Airport_119.jpg">
                    <img src="http://winter-construction.com/wp-content/uploads/ATL_Airport_139.jpg">                        
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