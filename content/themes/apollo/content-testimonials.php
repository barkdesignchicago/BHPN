<?php /*
 <div class="container wireframebox">
        <section class="row">
            <div class="col-xs-12">
                       <!-- Testimonials -->
                       <h3>What Field Leaders Are Saying</h3>
        

                        <?php 
                            $args = array(
                                'post_type' => 'testimonial'
                              );
                        // the query
                        $find_testimonials = new WP_Query( $args ); 
                        if ( $find_testimonials->have_posts() ) : ?>

                            <ul class="nav nav-tabs" role="tablist">
                            <?php
                            $count = 1;
                                while ( $find_testimonials->have_posts() ) : $find_testimonials->the_post(); 
                                 ?>
                                <li<?php if ( $count == 1 ) {
                                      echo ' class="active"';
                                    }?>>
                                    <a href="#tab<?php echo $count ?>" data-toggle="tab"><?php the_title(); ?></a>
                                </li>
                             <?php
                                $count++;
                                endwhile;
                             ?>
                            </ul>
                            <div class="tab-content">
                            <?php
                                $count = 1;
                                while ( $find_testimonials->have_posts() ) : $find_testimonials->the_post(); 
 
                            ?>
                             <div class="tab-pane<?php if ( $count == 1 ) {
                                      echo ' active';
                                    }?>" id="tab<?php echo $count ?>">
                                 <div class="col-xs-3"><div class="quote-md-photo"><?php echo get_the_post_thumbnail( $page->ID ); ?></div></div><div class="col-xs-1"></div><div class="col-xs-8"><?php the_content(); ?><br/>&mdash; <?php the_title(); ?></div></div>

                            <?php
                                $count++;
                                endwhile; ?>
                            </div>
                            <?php wp_reset_postdata(); ?>          

                            <!-- pagination here -->
                        <?php endif; ?>
                       <!-- end Testimonials -->
         </div>
    </section>
</div>        
*/ ?>