<!-- debug: content-about.php -->
<section class="container bluebars">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1 ">
                    <header>
                        <h1><?php the_title(); ?></h1>
                    </header>
                    <?php the_content(); ?>
                    
                    <aside class="filter-links">
                        <h6>Learn more about the Network:</h6>
                        <p class="filter-links"><a href="#section-who-we-are">Who We Are</a>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="#section-intersection">The Intersection of Community Development &amp; Health</a>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="#section-team">Meet the Team</a></p>
                    </aside>
</div>
                    

                </div>
            </div>
        </div>
    </div>
</section>





<a id="section-who-we-are"></a>
<section class="container grey" id="about_who">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-push-1">

                        <?php if( get_field( "about_section_title" ) ): ?>
                    <h2><?php the_field( "about_section_title" ); ?></h2>
                <?php endif; ?>

                <?php if( have_rows('about_page_tabs') ): ?>

                <ul class="nav nav-tabs tabbedContent" role="tablist">
                    <?php
                    $count = 1;
                    while( have_rows('about_page_tabs') ): the_row();

                        // vars
                            $about_title = get_sub_field('about_tab_title');
                            $about_link = get_sub_field('about_tab_link_id');
                         ?>
                        <li href="#<?php echo $about_link ?>" data-toggle="tab" <?php if ( $count == 1 ) {
                              echo ' class="active"';
                            }?>>
                            <?php echo $about_title ?>
                        </li>
                     <?php
                        $count++;
                        endwhile;
                     ?>
                </ul><div class="clearfix"></div>
                <div class="tab-content bg-fff">
                <?php
                    $count = 1;
                    while( have_rows('about_page_tabs') ): the_row(); 

                        // vars
                        $about_content = get_sub_field('about_tab_content');
                        $about_link = get_sub_field('about_tab_link_id');
                    ?>
                     <div class="tab-pane<?php if ( $count == 1 ) {
                              echo ' active';
                            }?> bg-fff" id="<?php echo $about_link ?>"><?php echo $about_content ?><div class="clearfix"></div></div>

                <?php
                    $count++;
                    endwhile; ?>
                </div>

                <?php endif; ?>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1" id="debug">
                    
                    </div>
            </div>
        </div>
    </div>
</section>


        <!-- Sectors -->
<a id="section-intersection"></a>
<section class="container white" id="about_intersection">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">

            <?php if( get_field( "intersection_section_title" ) ): ?>
                <h2><?php the_field( "intersection_section_title" ); ?></h2>
            <?php endif; ?>

            <?php if( have_rows('intersection_page_tabs') ): ?>

            <ul class="nav nav-tabs tabbedContent" role="tablist">
                <?php
                $count = 1;
                while( have_rows('intersection_page_tabs') ): the_row(); 

                    // vars
                        $intersection_title = get_sub_field('intersection_tab_title');
                        $intersection_link = get_sub_field('intersection_tab_link_id');
                    ?>
                    <li href="#<?php echo $intersection_link ?>" data-toggle="tab" <?php if ( $count == 1 ) {
                          echo ' class="active"';
                        }?>>
                        <?php echo $intersection_title ?>
                    </li>
                 <?php
                    $count++;
                    endwhile;
                 ?>
            </ul>
            <div class="tab-content">
            <?php
                $count = 1;
                while( have_rows('intersection_page_tabs') ): the_row(); 

                    // vars
                    $intersection_content = get_sub_field('intersection_tab_content');
                    $intersection_link = get_sub_field('intersection_tab_link_id');
                ?>
                 <div class="tab-pane<?php if ( $count == 1 ) {
                          echo ' active';
                        }?> bg-ebebeb" id="<?php echo $intersection_link ?>"><?php echo $intersection_content ?><div class="clearfix"></div></div>

            <?php
                $count++;
                endwhile; ?>
            </div>

            <?php endif; ?>

            <?php if( get_field( "intersection_fact_sheets_section_title" ) ): ?>
                <h3><?php the_field( "intersection_fact_sheets_section_title" ); ?></h3>
            <?php endif; ?>

            <?php if( have_rows('intersection_fact_sheet') ): ?>

                <div class="row-container">

                <?php while( have_rows('intersection_fact_sheet') ): the_row(); 

                    $fact_sheet_title = get_sub_field('intersection_fact_sheet_title');
                    $fact_sheet_content = get_sub_field('intersection_fact_sheet_description');
                    $fact_sheet_link = get_sub_field('intersection_fact_sheet_link');
                    ?>

                    <div class="col-md-3 content-area wireframebox" id="main-column">
                        <h4><?php echo $fact_sheet_title ?></h4>
                        <?php echo $fact_sheet_content ?>
                        <a href="<?php echo $fact_sheet_link ?>">Download fact sheet</a>

                    </div>

                <?php endwhile; ?>

                </div>
            <?php endif; ?>
            <!-- end Sectors -->

            </div>
        </div>
        </div>
    </div>
</section>
<?php // ADD A LISTENER TO THE FIRST TAB'S IMAGE SO CLICKING IT WILL SWAP TO THE SECOND TAB. ?>
<script>
<!--
    jQuery("#problem img").click(function(e) {
        jQuery("li[href=\"#solution\"]").click();
    });
    jQuery("#problem img").css("cursor", "pointer");
    
//-->
</script>




<style>
canvas {
    margin-right: 15px;
    margin-bottom: 15px;
    float: left;
    width: 214px;
    height: 332px;
}
@media (max-width: 767px) {
  canvas {
    display: block;
    float: none;
    margin-left: auto;
    margin-right: auto;
  }
}
</style>
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
