<?php
    $themes_args = array(
        'hide_empty' => 1,
        exclude => array('15'),
        'orderby' => 'name'
    );
    
    $themes = get_the_terms(get_the_ID(), 'story_categories');
    $theme_list = "";
    if ( !empty( $themes ) && !is_wp_error( $themes ) ) {
        $count = count($themes);
        $i=0;
        foreach ($themes as $theme) {
            $i++;
            if ($theme->term_id != 15) { // EXCLUDE THE Featured TERM.
                $theme_list .= '<a href="' . get_term_link( $theme ) . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $theme->name) . '">' . $theme->name . '</a>';
                if ($count != $i) {
                    $theme_list .= ' | ';
                }
                else {
                    $theme_list .= '';//'</p>';
                }
            }
        }
    }

?>                    <div class="item large">
                        <div class="item-thumb"><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_post_thumbnail() ?></a></div>
                        <div class="item-text">
                            <h4><a href="<?php echo get_the_permalink()?>"><?php echo get_the_title() ?></a></h4>
                            <?php get_template_part("content", "meta-date-cats") ?>
                            <!--<p class="metadata"><?php //echo get_the_date("m/d/Y") ?>, <a href="/stories">Stories</a> / <?php //echo $theme_list ?></p>-->
                            <?php the_excerpt() ?>
                            <p class="read-more"><a href="<?php echo get_the_permalink()?>">Read More</a></p>
                        </div>
                    </div>