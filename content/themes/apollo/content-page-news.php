<!-- debug: content-page-news.php -->
<?php
    
    $themes_args = array(
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
    }
    
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
                    
                    <aside class="filter-links">
                        <p class="filter-links"><a href="#section-events">Events</a>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="#section-news">News</a>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="#section-blog">Blog</a></p>
                    </aside>
                    
                    <a class="typeform-share orange-box" href="https://buildhealthyplaces.typeform.com/to/MyQTxE?" data-mode="1" target="_blank">Share Your News</a><?php // REQUIRED? TYPEFORM CODE ?>
<script>(function(){var qs,js,q,s,d=document,gi=d.getElementById,ce=d.createElement,gt=d.getElementsByTagName,id='typef_orm',b='https://s3-eu-west-1.amazonaws.com/share.typeform.com/';if(!gi.call(d,id)){js=ce.call(d,'script');js.id=id;js.src=b+'share.js';q=gt.call(d,'script')[0];q.parentNode.insertBefore(js,q)}})()</script><?php // END TYPEFORM CODE ?>

                </div>
            </div>
        </div>
    </div>
</section>









<a id="section-events"></a>
<section class="container white">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <h2>Events</h2>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1 items-holder">
<?php                    
        // MEASUREMENT QUERY
        $today = date('Ymd');
        $args1 = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'orderby' => 'meta_value',
            'order' => 'asc',
            'meta_key' => 'event_date',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'value' => $today,
                    'compare' => '>=',
                )
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'p_type',
                    'field' => 'slug',
                    'terms' => 'event'
                )
            )
        );
        $query1 = new wp_query($args1);
        if (!$query1->have_posts()) echo "There are no news items to display at this time.";
        
        while ($query1->have_posts()) : $query1->the_post();
            get_template_part("content", "item-event");
        endwhile;?>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1"><a href="/p_type/event/" class="orange-box">View All Events</a></div>
<?php
        wp_reset_postdata();
?>
            </div>
        </div>
    </div>
</section>
    







<a id="section-news"></a>
<section class="container grey">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <h2>News</h2>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1 items-holder">
<?php                    
        // MEASUREMENT QUERY
        $args2 = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
//            'orderby' => 'modified',
            'tax_query' => array(
                array(
                    'taxonomy' => 'p_type',
                    'field' => 'slug',
                    'terms' => 'news'
                )
            )
        );
        $query2 = new wp_query($args2);
        if (!$query2->have_posts()) echo "There are no news items to display at this time.";
        
        while ($query2->have_posts()) : $query2->the_post();
            get_template_part("content", "item-large-news");
        endwhile;?>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1"><a href="/p_type/news/" class="orange-box">View All News</a></div>
<?php
        wp_reset_postdata();
?>
            </div>
        </div>
    </div>
</section>











<a id="section-blog"></a>
<section class="container white">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <h2>Blog</h2>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1 items-holder">
<?php                    
        // MEASUREMENT QUERY
        $args3 = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
//            'orderby' => 'modified',
            'tax_query' => array(
                array(
                    'taxonomy' => 'p_type',
                    'field' => 'slug',
                    'terms' => 'blog'
                )
            )
        );
        $query3 = new wp_query($args3);
        if (!$query3->have_posts()) echo "There are no news items to display at this time.";
        
        while ($query3->have_posts()) : $query3->the_post();
            get_template_part("content", "item-large-news");
        endwhile;?>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1"><a href="/p_type/blog/" class="orange-box">View All Blog Posts</a></div>
<?php
        wp_reset_postdata();
?>
            </div>
        </div>
    </div>
</section>


















<script>
    jQuery('.bluebars').find('a[href*=#]').on('click', function(e) {
        e.preventDefault();
        jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top}, 500);
    });
</script>