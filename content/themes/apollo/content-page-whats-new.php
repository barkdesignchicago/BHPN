<!-- debug: content-measureup.php -->
<section class="container bluebars">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1 ">
                    <header>
                        <h1><?php the_title(); ?></h1>
                    </header>
                    <?php the_content(); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="container white" id="whats-new">
    <div class="row">
        <div class="container">
			<?php
			// Load dynamic content layouts
			require('includes/dynamic-layout.php');
			?>
        </div>
    </div>

	<div class="row news-events">
		<div class="container">
          	<div class="row featured-news">
		  		<div class="col-xs-12 col-sm-10 col-sm-push-1 ">
					<h3>Featured</h3>
					<?php
					$featured_args = array(
						'post_type' => 'any',
						'category__in' => 18,
						'orderby' => 'date',
						'posts_per_page' => 1
					);
					$featured_query = new WP_Query($featured_args);
					
					if ($featured_query->have_posts()):
						while ($featured_query->have_posts()): $featured_query->the_post();
							$theImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
							?>
							<div class="col-md-7 featured-image">
								<a href="<?php echo get_the_permalink();?>"><img src="<?php echo $theImage[0];?>" class="img-responsive"></a>
							</div>
							<div class="col-md-5">
								<h3><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a></h3>
								<?php the_excerpt();?>
							</div>
							<?php
						endwhile;
					endif;
					?>
				</div>
            </div>
            <div class="row regular-news row-no-padding">
				<div class="col-sm-10 col-sm-push-1 rule">
					&nbsp;
				</div>
            </div>
            <div class="row ">            
				<div class="col-sm-10 col-sm-push-1 regular-news">
		            <div class="col-md-8">

					<?php
					$recent_news_args = array(
						'post_type' => 'post',
						'orderby' => 'date',
						'posts_per_page' => 6
					);
					$recent_news_query = new WP_Query($recent_news_args);
					
					if ($recent_news_query->have_posts()):
						$i=1;
						?>
						<div class="row">
						<?php

						while ($recent_news_query->have_posts()): $recent_news_query->the_post();
							?>
								<div class="col-md-6">
									<div class="article">
										<?php the_title();?>
									</div>
								</div>
							<?php
							if ( $i % 2 == 0 ) :
								?>
								</div><div class="row">
								<?php
							endif;						
						$i++;
						endwhile;
					?>
								</div>
							<?php
					endif;
					?>

		            </div>
		            <div class="col-md-4">
			            SIDEBAR
		            </div>
				</div>
            </div>
		</div>
	</div>
	
</section>



<script>
    //CANVAS ANIMATION CODE
    // / / / / / / / / / / / / / / / / / /
    // FIND THE DEFAULT IMAGE AND REPLACE IT WITH THE CANVAS ELEMENT
    jQuery('.canvas-default-content').parent("p").replaceWith('<canvas id="canvas" width="214" height="332" ></canvas>');
//    jQuery('<div class="clearfix visible-xs"></div>').insertAfter("#canvas");

    
    // CODE FROM ADOBE
    var canvas, stage, exportRoot;
    
    function init() {
        canvas = document.getElementById("canvas");
        exportRoot = new lib.canvasaboutsectors();

        stage = new createjs.Stage(canvas);
        stage.addChild(exportRoot);
        stage.update();

        createjs.Ticker.setFPS(lib.properties.fps);
        createjs.Ticker.addEventListener("tick", stage);
    }
    
    jQuery(document).ready(function() {
        init();
    });
    // /CODE FROM ADOBE
    
    //WHICH PANE ARE WE GOING TO WATCH?
    anchorTagHrefString = "#";
    anchorTagHrefString += jQuery("#canvas").closest(".tab-pane").attr("id");
    // START WATCHING IT THE PANE'S TAB
    jQuery('[href="' + anchorTagHrefString + '"]').on('shown.bs.tab', function(e) {
        replayAnimation();
    });
    
    function replayAnimation() {
        exportRoot.gotoAndPlay(1);
    }
    
    
    
    
    
    
    
    // MENU-BASED PAGE SLIDING
    // / / / / / / / / / / / / / / / / / /
    jQuery('.bluebars').find('a[href*=#]').on('click', function(e) {
        e.preventDefault();
        jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top}, 500);
    }).delay(100);
    
    
    // SLIDER CODE
    // / / / / / / / / / / / / / / / / / /
    
    //ADD THE ARROWS, MASK, ETC.
    jQuery(".tiledslider").addClass("interactive");
    jQuery(".tiledslider").prepend('<li class="innerArrowPrompt"><img src="/content/themes/apollo/images/carousel-arrow-left-grey.png"></li>');
    jQuery(".tiledslider").append('<li class="innerArrowPrompt"><img src="/content/themes/apollo/images/carousel-arrow-right-grey.png"></li>');
    jQuery(".tiledslider").wrap('<div class="tiledslider-holder"></div>');
    jQuery(".tiledslider").wrap('<div class="tiledslider-mask"></div>');
    jQuery('<div class="tiledslider-nav outerArrowNav left"><img src="/content/themes/apollo/images/carousel-arrow-left.png"></div>').insertBefore(".tiledslider");
    jQuery('<div class="tiledslider-nav outerArrowNav right"><img src="/content/themes/apollo/images/carousel-arrow-right.png"></div>').insertAfter(".tiledslider");
    
    
    slideDirection = 0;
    jQuery('.tiledslider-nav').click(function(e) {
        e.preventDefault();
        stopSliding();
    });
    jQuery('.tiledslider-nav').mousedown(function(e) {
        e.preventDefault();
        if (jQuery(this).hasClass("left")) slideDirection = -1;
        else if (jQuery(this).hasClass("right")) slideDirection = 1;
        
        stopAutomaticSlide();
        startListeningForMouseUp(jQuery(this));
        startSliding();
    });
    
    
    function startListeningForMouseUp(theObj) {
        jQuery(theObj).mouseup(function() {
            stopSliding();
        });
        jQuery(theObj).mouseout(function() {
            stopSliding();
        });
    }
    function stopListeningForMouseUp(theObj) {
        jQuery(theObj).unbind("mouseup");
        jQuery(theObj).unbind("mouseout");
    }
    
    
    
    var slideTimer = 0;
    var slideSpeed = 1;
    
    function startSliding() {
        slideSpeed = 1;
        slideTimer = setInterval(function() {doSlide() }, 25);
    }
    function stopSliding() {
        clearInterval(slideTimer);
    }
    
    function doSlide() {
        slideSpeed = Math.min(slideSpeed * 1.3, 15);
        
        var theStep = slideSpeed * slideDirection;
        
        var currentLeft = jQuery(".tiledslider-mask").scrollLeft();
        var newLeft = currentLeft + theStep;
        
        jQuery(".tiledslider-mask").scrollLeft(newLeft);
    }
    
    
    
    
    
    
    function adjustSliderSize() {
        var parentWidth = jQuery(".tiledslider-mask").parent().width();
        var windowWidth = jQuery(window).width();
        
        if (windowWidth >= 768) {
            jQuery(".tiledslider-mask").width(parentWidth - 130);
            jQuery(".innerArrowPrompt").hide();
            jQuery(".outerArrowNav").show();
        } else {
            stopSliding();
            jQuery(".tiledslider-mask").width(parentWidth);
            jQuery(".innerArrowPrompt").show();
            jQuery(".outerArrowNav").hide();
        }
        
        var marginBetweenImages = 0;
        liXpos = 0;
        largestHeight = 0;
        jQuery('.tiledslider li').each(function(passedCounter, passedValue) {
            jQuery(this).css({top: 2, left: liXpos, position: "absolute"});
            
            if ((windowWidth >= 768 && !jQuery(this).is(".innerArrowPrompt")) || windowWidth < 768) {
                liXpos += jQuery(this).width() + marginBetweenImages;
            }
            
            largestHeight = Math.max(largestHeight, jQuery(this).find("img").height());
        });
        jQuery(".tiledslider").height(largestHeight + 20);
        
    }
    
    function startBuild() {
        adjustSliderSize();
        jQuery(".tiledslider-holder").slideDown("slow", "swing");
        adjustSliderSize();
    }
    
    jQuery(window).resize(function() {
        adjustSliderSize();
    });
    
    jQuery(".tiledslider-holder").slideUp(0);
    setTimeout(startBuild, 1000);
    
    
    // DO THE INTIAL LOGO SLIDE
    
    setTimeout(startAutomaticSlide, 3000);
    
    function startAutomaticSlide() {
//        var sw = 
//        console.log("scrollwidth: " + jQuery(".tiledslider")[0].scrollWidth);// - jQuery(".tiledslider-mask").clientWidth;
//        console.log("client width: " + jQuery(".tiledslider-mask")[0].clientWidth);
        var maxScrollLeft = jQuery(".tiledslider")[0].scrollWidth - jQuery(".tiledslider-mask")[0].clientWidth;
        jQuery(".tiledslider-mask").animate({scrollLeft: maxScrollLeft}, 8000);
        jQuery(".tiledslider-mask").animate({scrollLeft: 0}, 2000).delay(11000);
    }
    function stopAutomaticSlide() {
        
        console.log("stopAutomaticSlide()");
    }
    
    
    
    
    
    /* */
    
    
</script>
<script src="http://code.createjs.com/easeljs-0.7.1.min.js"></script>
<script src="http://code.createjs.com/tweenjs-0.5.1.min.js"></script>
<script src="http://code.createjs.com/movieclip-0.7.1.min.js"></script>
<script src="/content/themes/apollo/images/canvas-about-sectors.js"></script>

                        <!-- end about content -->
