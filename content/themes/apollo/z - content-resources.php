<div class="col-md-3 content-area" id="main-column">
                    <a href="<?php the_field('resource_link'); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?></a>
                    <h4><?php the_title(); ?></h4>
                    <?php the_content(); ?> 
                    <a href="<?php the_field('resource_link'); ?>" target="_blank">Learn more</a>
</div>

