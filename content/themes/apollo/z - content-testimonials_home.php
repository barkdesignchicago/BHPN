<?php /*            <!-- Testimonials -->
            <section class="row" id="quotes">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-11 col-sm-push-1 nopad"><h1>What Field Leaders are Saying</h1></div>
                        <div class="col-xs-12 col-sm-10 col-sm-push-1 nopad" id="activeQuote">
                            <?php 
                                $args = array(
                                    'post_type' => 'testimonial'
                                );
                                // the query
                                $find_testimonials = new WP_Query( $args );
                                if ( $find_testimonials->have_posts() ) : ?>

                            <div class="tab-content">
                                 <?php
                                    $count = 1;
                                    while ( $find_testimonials->have_posts() ) : $find_testimonials->the_post(); 

                                ?>
                                 <div class="tab-pane<?php if ( $count == 1 ) {
                                          echo ' active';
                                        }?>" id="tab<?php echo $count ?>">
                                        <div class="col-xs-1 col-sm-2 nopad">
                                            <div class="quote-md-photo wireframebox"><?php 
                                                if (has_post_thumbnail( $post->ID )) $imagePaths = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                                                if ($imagePaths) { ?><img class="" src="<?php echo $imagePaths[0]; ?>"><?php } ?></div>
                                        </div>
                                        <div class="col-xs-1"></div>
                                        <div class="col-xs-8">
                                            <h3><?php the_title(); ?></h3>
                                            <?php if( get_field( "testimonials_organization" ) ): ?>
                                            <h4><?php the_field( "testimonials_organization" ); ?></h4>
                                            <?php endif; ?><?php the_content(); ?>
                                        </div>
                                    </div>

                                        <?php
                                            $count++;
                                            endwhile; ?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-4"></div>
                            <div class="nav nav-tabs col-xs-8">
                                <?php
                                    $count = 1;
                                    while ( $find_testimonials->have_posts() ) : $find_testimonials->the_post(); 
                                     ?>
                                        <div class="<?php if ( $count == 1 ) {
                                          echo ' active ';
                                        }?>col-xs-3 quote-sm wireframebox">
                                            <div class="quote-sm-photo wireframebox"><?php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?></div>
                                            <div class="quote-sm-name"><a href="#tab<?php echo $count ?>" role="tab" data-toggle="tab"><?php the_title(); ?></a>
                                            </div>
                                        </div>

                                 <?php
                                    $count++;
                                    endwhile;
                                 ?>
                                <?php wp_reset_postdata(); ?>          
                            </div>
                            <!-- pagination here -->
                        <?php endif; ?>
                       <!-- end Testimonials -->
                        </div>
                    </div>
                </div>
            </section>*/?>
            
            <section class="row" id="quotes">
                <div class="container">
                    <div class="row ">
                        <div class="col-xs-12 col-sm-11 col-sm-push-1 nopad"><h1>What Field Leaders are Saying</h1></div>
                    </div>
                    <div class=" row activeQuotes"><!-- tab-content? -->
                        <div class=" "><!-- tab-pane? -->
                            <div class="col-xs-3 col-sm-2 col-sm-push-1 nopad">
                                <div class="quote-lg-photo wireframebox"><img class="img-responsive" src="/prototype/images/wf-img.gif"></div>
                            </div>
                            <div class="col-xs-9 col-sm-8 col-sm-push-1 wireframebox">
                                <div class="wireframebox quoteBox">
                                    <h3>&ldquo;Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&rdquo;</h3>
                                    <h4>Name, Organization</h4>
                                </div>
                                <p>&ldquo;Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident&rdquo;</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="nav nav-tabs quote-tabs">
                            <div class="active col-xs-3 col-sm-2 col-sm-push-3 quote-sm wireframebox">
                                <div class="quote-sm-photo "><img class="wireframebox" src="/prototype/images/wf-img.gif"></div>
                                <div class="quote-sm-name"><a href="#tab" role="tab" data-toggle="tab">Nancy Andrews</a></div>
                            </div>
                            <div class="active col-xs-3 col-sm-2 col-sm-push-3 quote-sm wireframebox">
                                <div class="quote-sm-photo "><img class="wireframebox" src="/prototype/images/wf-img.gif"></div>
                                <div class="quote-sm-name"><a href="#tab" role="tab" data-toggle="tab">David Erickson</a></div>
                            </div>
                            <div class="active col-xs-3 col-sm-2 col-sm-push-3 quote-sm wireframebox">
                                <div class="quote-sm-photo "><img class="wireframebox" src="/prototype/images/wf-img.gif"></div>
                                <div class="quote-sm-name"><a href="#tab" role="tab" data-toggle="tab">John Doe</a></div>
                            </div>
                            <div class="active col-xs-3 col-sm-2 col-sm-push-3 quote-sm wireframebox">
                                <div class="quote-sm-photo "><img class="wireframebox" src="/prototype/images/wf-img.gif"></div>
                                <div class="quote-sm-name"><a href="#tab" role="tab" data-toggle="tab">John Doe</a></div>
                            </div>
                        </div>
                    </div><!-- /row -->
                </div>
            </section>