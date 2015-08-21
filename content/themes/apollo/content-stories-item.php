<!-- debug: start content-stories-item.php -->
            <div class="row item">
                <div class="col-xs-2 col-sm-3 col-sm-push-1"><?php
            if (has_post_thumbnail()) {
                $thumbStringArray = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
                $thumbString = $thumbStringArray[0];
                echo "<img src=\"".$thumbString."\" class=\"item-thumb\">";
            } ?></div>
                <div class="col-xs-10 col-sm-7 col-sm-push-1">
                    <h4><?php the_title() ?></h4>
                    <p><?php echo get_the_excerpt() ?></p>
                </div>
            </div>
<!-- debug: end content-stories-item.php -->