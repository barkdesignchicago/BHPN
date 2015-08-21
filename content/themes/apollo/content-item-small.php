                    <div class="item small">
                        <div class="item-thumb"><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_post_thumbnail() ?></a></div>
                        <div class="item-text">
                            <h4><a href="<?php echo get_the_permalink()?>"><?php echo get_the_title() ?></a></h4>
                            <p class="metadata"><?php echo get_the_date("m/d/Y") ?></p>
                            <?php the_excerpt() ?>
                        </div>
                    </div>