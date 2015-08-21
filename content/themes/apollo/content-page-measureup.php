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





<a id="section-measureUp"></a>
<section class="container grey" id="measureUp">
    <div class="row">
        <div class="container">
			<?php
			// Load dynamic content layouts
			require('includes/dynamic-layout.php');
			?>
        </div>
    </div>

	<div class="row mu-large-subnav">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-sm-push-1 ">
					<div class="row">
						<div class="col-md-12 row-no-padding">
							<h2><?php the_field('menu_title'); ?></h2>
						</div>

						<?php 
						if( have_rows('blocks') ): 
						?>
					
					
							<?php 
							while( have_rows('blocks') ): the_row(); 
					
							// vars
							$image = get_sub_field('image');
							$title = get_sub_field('title');
							$text = get_sub_field('text');
							$link = get_sub_field('link');
					
							?>
					
							<div class="col-sm-2 col-md-5ths">
					
								<?php if( $link ): ?>
									<a href="<?php echo $link; ?>">
								<?php endif; ?>
					
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="img-responsive" />
					
								<?php if( $link ): ?>
									</a>
								<?php endif; ?>
								<a href="<?php echo $link; ?>"><?php echo $title; ?></a>
							    <?php echo wpautop($text); ?>
					
							</div>
					
							<?php endwhile; ?>
					
					
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row mu-data-explainer-link">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-push-1 ">
					<a class="blue-box button">
						<h2>What We Talk About When We Talk About Measurement</h2>
						<p>Everything you&rsquo;d want to know about measuring the health value of community development and neighborhood impact on health.</p>
					</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row mu-featured-resources">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-sm-push-1 featured">
					<div class="row mu-rule ">
						<h3>Featured Resources</h3>
						<?php
				        $args = array(
				            'post_type' => 'resources',
				            'category__in' => 31,
				            'posts_per_page' => 3,
				            'orderby' => 'modified'
				        );
				        $featured_query = new wp_query($args);
				        while ($featured_query->have_posts()) : $featured_query->the_post();
							?>
								<div class="col-md-4 ">
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
										<?php the_title(); ?>
										</a>
										<?php the_excerpt(); ?>
										<p>
											<a class="orange-box" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Learn More</a>
										</p>
																					
									<?php endif; ?>
								</div>
							<?php
				        endwhile;
        ?>

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
