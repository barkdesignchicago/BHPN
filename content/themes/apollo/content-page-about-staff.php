<!-- debug: content-staff.php -->
<section class="container grey" id="section-team">
        <div class="row">
            <div class="container">
                <div class="row">
<!--                    <div class="col-xs-12 col-sm-10 col-sm-push-1">-->
                        <!-- Staff -->
                               <div class="col-xs-12 col-sm-10 col-sm-push-1"><h2>The Team</h2></div>


                                <?php
                                    global $more;
                                    $args = array(
                                        'post_type' => 'staff',
                                        'order' => 'asc'
                                      );
                                // the query
                                $find_staff = new WP_Query( $args ); 
                                if ( $find_staff->have_posts() ) : 
                                $i = 0;
                                while ( $find_staff->have_posts() ) : $find_staff->the_post();
                                    $staffNameAsSlug = get_the_title();
                                    $staffNameAsSlug = strtolower($staffNameAsSlug);
                                    $staffNameAsSlug = str_replace(" ", "-", $staffNameAsSlug);
                                ?>

                        <div class="col-xs-12 col-sm-10 col-sm-push-1" id="<?php echo $staffNameAsSlug ?>">
                            <div class="team-member-item"><?php
                                $thumbStringArray = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'full');
                                $thumbString = $thumbStringArray[0];
                                echo "\t\t<img class=\"team-member-photo\" src=\"".$thumbString."\">"; ?>
                                <div class="team-member-header"><div class="team-member-name"><?php echo the_title() ?><span class="team-member-title">, <?php the_field('staff_title') ?></span></div><?php 
                                    if (get_field("staff_email") || get_field("staff_linkedin") || get_field("staff_twitter")) { ?>
                                    <div class="team-member-social"><?php
                                        echo get_field("staff_email") ? "<a href=\"mailto:".get_field("staff_email")."\"><img src=\"/content/themes/apollo/images/icon-share-e-white.png\"></a>" : "";
                                        echo get_field("staff_twitter") ? "<a href=\"".get_field("staff_twitter")."\" target=\"_blank\"><img src=\"/content/themes/apollo/images/icon-share-t-white.png\"></a>" : "";
                                        echo get_field("staff_linkedin") ? "<a href=\"".get_field("staff_linkedin")."\" target=\"_blank\"><img src=\"/content/themes/apollo/images/icon-share-l-white.png\"></a>" : ""; ?>
                                    </div><?php } ?>
                                </div>
                                <div class="team-member-bio"><?php $more = 0; the_content("") ?><div class="team-member-bio-ext collapse" id="team-ext-<?php echo $i ?>"><?php $more = 1; the_content("", true) ?></div><p class="read-more-toggle collapsed" data-toggle="collapse" data-target="#team-ext-<?php echo $i ?>"><span class="prompt-open">Read More</span><span class="prompt-close">Show Less</span></p></div>
                            </div>
                        </div>
                                    <?php
                                        $i++;
                                        endwhile; ?>
                                    <?php wp_reset_postdata(); ?>          

                                    <!-- pagination here -->
                                <?php endif; ?>
                               <!-- end Staff -->
<!--                 </div>-->
            </div>
        </div>
    </div>
</section>
