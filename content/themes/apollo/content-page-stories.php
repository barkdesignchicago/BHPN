<!-- debug: start content-stories.php -->
<?php
    
/*    $themes_args = array(
        'hide_empty' => 1,
        exclude => array('15'),
        'orderby' => 'name'
    );
    
    $themes = get_terms('story_categories', $themes_args);
    $theme_list = "";
    if ( !empty( $themes ) && !is_wp_error( $themes ) ) {
        $count = count($themes);
        $i=0;
        foreach ($themes as $theme) {
            $i++;
            $theme_list .= '<a href="' . get_term_link( $theme ) . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $theme->name) . '">' . $theme->name . '</a>';
            if ($count != $i) {
                $theme_list .= '&nbsp;&nbsp; |&nbsp;&nbsp; ';
            }
            else {
                $theme_list .= '';//'</p>';
            }
        }
    }*/
    
    $count_posts = wp_count_posts('story');
    $total_stories = $count_posts->publish;

?>
<section class="container bluebars">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <header>
                        <h1><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->        
                    <?php the_content(); ?>
                    
<!--                    <aside class="filter-links">
                        <h6>Explore Stories by Theme:</h6>
                        <p class="filter-links"><?php //echo $theme_list ?></p>
                    </aside>-->
                    
                    <a class="orange-box" href="/story/">Explore All Stories (<?php echo $total_stories ?>)</a><?php // REQUIRED TYPEFORM CODE ?>
<script>(function(){var qs,js,q,s,d=document,gi=d.getElementById,ce=d.createElement,gt=d.getElementsByTagName,id='typef_orm',b='https://s3-eu-west-1.amazonaws.com/share.typeform.com/';if(!gi.call(d,id)){js=ce.call(d,'script');js.id=id;js.src=b+'share.js';q=gt.call(d,'script')[0];q.parentNode.insertBefore(js,q)}})()</script><?php // END TYPEFORM CODE ?>

                </div>
            </div>
        </div>
    </div>
</section>




<?php /*
<section class="container white">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-1                col-sm-1                featured-item-nav"><span class="glyphicon glyphicon-chevron-left "></span></div>
                <div class="col-xs-1                col-sm-1                pull-right featured-item-nav"><span class="glyphicon glyphicon-chevron-right "></span></div>
                <div class="col-xs-10               col-sm-5                col-md-6"><img class="featured-item-img" src="/prototype/images/wf-vid.gif"></div>
                <div class="col-xs-10 col-xs-push-1 col-sm-5 col-sm-push-0  col-md-4">
                    <h2>Featured Story Item (not yet functional)</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
<p class="cta">Read More</p>
                </div>
                
                
                
            </div>
        </div>
    </div>
</section>*/ ?>
<?php 
    $featured_args = array(
        'post_type' => 'story',
            'posts_per_page' => 4,
            'orderby' => 'date',
            'category__in' => 15
/*            'tax_query' => array(
                array(
                    'taxonomy' => 'story_categories',
                    'field' => 'id',
                    'terms' => '15'
                )
            )*/
    );
    $featured_query = new WP_Query($featured_args);
    
    if ($featured_query->have_posts()) { ?>
<section class="container white" id="featured-items-hp">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-1"><a class="carousel-control left" href="#featuredCarousel" data-slide="prev"><img src="/content/themes/apollo/images/carousel-arrow-left.png"></a></div>
                
                <div class="carousel slide col-xs-10" id="featuredCarousel" data-interval="5000">
                    <ol class="carousel-indicators"><?php
        $i = 0;
        while ($i < $featured_query->post_count) :
            echo '<li data-target="#featuredCarousel" data-slide-to="'.$i.'" ';
            if ($i == 0) echo 'class="active"';
            echo '></li>';
            $i++;
        endwhile;
                        ?>
                        
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <?php
        while ($featured_query->have_posts()) :
            $featured_query->the_post(); ?>
                        <div class="item<?php if ($featured_query->current_post == 0) echo ' active' ?>">
                            <div class="carousel-image"><a href="<?php echo get_the_permalink()?>"><?php 
                                                if (has_post_thumbnail( $post->ID )) $imagePaths = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                                                if ($imagePaths) { ?><img src="<?php echo $imagePaths[0]; ?>" class="featuredCarouselImg"><?php } ?></a></div>
                            <div class="carousel-text">
                                <h2><a href="<?php echo get_the_permalink()?>"><?php echo get_the_title()?></a></h2>
                                <?php
                get_template_part("content", "meta-date-cats");
                the_excerpt(); ?>
                                <p class="read-more"><a href="<?php echo get_the_permalink()?>">Read More</a></p>
                            </div>
                        </div>
                        <?php
        endwhile;
                        ?>
                    </div>
                    <!-- Carousel nav -->
                  
                </div>
                <div class="col-xs-1"><a class="carousel-control right" href="#featuredCarousel" data-slide="next"><img src="/content/themes/apollo/images/carousel-arrow-right.png"></a></div>
            </div>
        </div>
    </div>
</section>
<?php // AUTO START THE CAROUSEL ?><script>
    jQuery(document).ready(function() {
        jQuery("#featuredCarousel").carousel(0);
        
        
        startWatchingScroll();
    });

    function stopWatchingScroll() {
        jQuery(window).off("scroll", checkScroll);
    }
    function startWatchingScroll() {
        jQuery(window).on("scroll", checkScroll);
    }
    
    carouselIsPaused = false;
    function checkScroll() {
        if (jQuery(window).scrollTop() <= jQuery("#featured-items-hp").offset().top + jQuery("#featured-items-hp").height()) {
            // IT'S ON SCREEN
            if (carouselIsPaused == true) {
                carouselIsPaused = false;
                jQuery("#featuredCarousel").carousel('cycle');
                
            }
        } else {
            // IT'S NOT ON SCREEN
            if (carouselIsPaused == false) {
                jQuery("#featuredCarousel").carousel('pause');
                carouselIsPaused = true;
            }
//            stopWatchingScroll();
        }
        
    }
</script>
<?php 
    }
    wp_reset_postdata();
?>




<section class="container grey">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <h2>Most Recent Stories</h2>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1 items-holder">
<?php                    
        // MEASUREMENT QUERY
        $args2 = array(
            'post_type' => 'story',
            'posts_per_page' => 5,
            'orderby' => 'modified'
        );
        $query2 = new wp_query($args2);
        if (!$query2->have_posts()) echo "There are no resources to display at this time.";
        
        while ($query2->have_posts()) : $query2->the_post();
            get_template_part("content", "item-large-stories");
        endwhile;?>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1"><a class="orange-box" href="/story/">Explore All Stories (<?php echo $total_stories ?>)</a></div>
                <?php 
//                <div class="col-xs-12 col-sm-10 col-sm-push-1"><a href="" class="orange-box">View All Resources (<?php echo $query2->post_count ? >)</a></div>

        wp_reset_postdata();
?>
            </div>
        </div>
    </div>
</section>

                
                
                
                
                
                
           
<!-- debug: end content-stories.php -->