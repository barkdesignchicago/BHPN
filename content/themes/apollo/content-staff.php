 <!-- debug: content-staff.php -->
 <div class="container wireframebox fullwidth">
        <section class="row">
            <div class="container">
<!--                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-push-1">-->
                        <!-- Staff -->
                               <div class="col-xs-12 col-sm-10 col-sm-push-1 nopad"><h2>The Team</h2></div>


                                <?php
                                    global $more;
                                    $more = 1;
                                    $args = array(
                                        'post_type' => 'staff',
                                        'order' => 'asc'
                                      );
                                // the query
                                $find_staff = new WP_Query( $args ); 
                                if ( $find_staff->have_posts() ) : 
                                while ( $find_staff->have_posts() ) : $find_staff->the_post(); /*

                                    ?>
                                        <div class="col-md-3 content-area" id="main-column"><? php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?><br/>
                                            <ul class="social-links list-inline">
                                                <li><a href="mailto:<?php the_field('staff_email'); ?>"><img src="/prototype/images/email.png"></a></li>
                                                <li><a href="<?php the_field('staff_linkedin'); ?>"><img src="/prototype/images/linkedin.png"></a></li>
                                                <li><a href="<?php the_field('staff_twitter'); ?>"><img src="/prototype/images/twitter.png"></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9 content-area" id="main-column"><h4><?php the_title(); ?></h4><?php the_content(); ?></div>
        <div class="clearfix"></div> */ ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-10 col-sm-push-1 wireframebox team-member-item"><?php
                                $thumbStringArray = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'full');
                                $thumbString = $thumbStringArray[0];
                                echo "\t\t<img class=\"team-member-photo\" src=\"".$thumbString."\">"; ?>
                            <div class="team-member-header"><div class="team-member-name"><?php echo the_title() ?><span class="team-member-title">, <?php the_field('staff_title') ?></span></div> <div class="team-member-social">e t l</div></div>
                            <div class="team-member-bio"><?php the_excerpt() ?><p class="cta"><strong>Read More</strong></p><?php //the_content() ?></div>
                        </div>
                    </div>
                                    <?php
                                        endwhile; ?>
                                    <?php wp_reset_postdata(); ?>          

                                    <!-- pagination here -->
                                <?php endif; ?>
                               <!-- end Staff -->
<!--                 </div>
            </div>-->
        </div>
    </section>
</div>



<style>
    .team-member-item {
        margin-bottom: 1rem;
        padding: 0;
    }
    .team-member-photo {
        float: left;
        width: 20%;
        
        opacity: 0.25;
        
        -webkit-filter: grayscale(100%);
        -moz-filter: grayscale(100%);
        filter: grayscale(100%);
    }
    .team-member-header {
        background-color: #ccc;
        float: right;
        padding: 0;
        width: 80%;
    }
    .team-member-name {
        display: inline-block;
        float: left;
        font-weight: bold;
        padding-top: 10px;
        padding-left: 10px;
    }
    .team-member-title {
        font-weight: normal;
    }
    .team-member-bio {
        float: right;
        padding: 10px;
        width: 80%;
    }
    .team-member-social {
        background-color: #ddd;
        float: right;
        padding: 10px 10px 10px 10px;
    }
    
    @media (min-width: 768px) {
        .team-member-name {
            padding-top: 15px;
            padding-left: 30px;
        }
        .team-member-social {
            padding: 15px 20px 15px 15px;
        }
        .team-member-bio {
            padding: 15px 15px 15px 30px;
            width: 80%;
        }
    }




</style>