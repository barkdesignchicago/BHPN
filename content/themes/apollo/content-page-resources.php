<!-- start resources content -->
<?php
/*    $types_args = array(
        'hide_empty' => 1,
        'orderby' => 'name'
    );
    
    $types = get_terms('resource_types', $types_args);
    $type_list = "";
    if ( !empty( $types ) && !is_wp_error( $types ) ) {
        $count = count($types);
        $i=0;
        foreach ($types as $type) {
            $i++;
            $type_list .= '<a href="/?post_type=resources&resource_types=' .  $type->slug . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $type->name) . '">' . $type->name . '</a>';
            if ($count != $i) {
                $type_list .= '&nbsp;&nbsp; |&nbsp;&nbsp; ';
            }
            else {
                $type_list .= '';//'</p>';
            }
        }
    }*/

    $count_posts = wp_count_posts('resources');
    $total_resources = $count_posts->publish;
    

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
                        <h6>Explore Resources by Theme:</h6>
                        <p class="filter-links"><a href="#section-healthy-communities">What Makes a Healthy Community</a>&nbsp;&nbsp; |&nbsp;&nbsp;<a href="#section-measurement">Measurement</a>&nbsp;&nbsp; |&nbsp;&nbsp;<a href="#section-investment">Investment</a>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="#section-policy">Policy</a></p>
                    </aside>
                    
                    <a class="orange-box" href="/resources">Explore Full Database (<?php echo $total_resources ?>)</a><?php // REQUIRED TYPEFORM CODE ?>
<script>(function(){var qs,js,q,s,d=document,gi=d.getElementById,ce=d.createElement,gt=d.getElementsByTagName,id='typef_orm',b='https://s3-eu-west-1.amazonaws.com/share.typeform.com/';if(!gi.call(d,id)){js=ce.call(d,'script');js.id=id;js.src=b+'share.js';q=gt.call(d,'script')[0];q.parentNode.insertBefore(js,q)}})()</script><?php // END TYPEFORM CODE ?>

                </div>
            </div>
        </div>
    </div>
</section>



<a id="section-healthy-communities"></a>
<section class="container white">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <h2><?php echo get_field('category_title_healthy_communities') ?></h2>
                    <?php echo get_field('description_healthy_communities') ?><br/>
                    <h3><?php echo get_field('category_subtitle_healthy_communities') ?></h3>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1 items-holder">
<?php
        // HEALTHY COMMUNITIES QUERY
        $args1 = array(
            'post_type' => 'resources',
            'category__in' => 31,
            'posts_per_page' => 4,
            'orderby' => 'modified',
            'tax_query' => array(
                array(
                    'taxonomy' => 'bhpn_theme',
                    'field' => 'id',
                    'terms' => '36'
                )
            )
        );
        $query1 = new wp_query($args1);
        
        $mini_args = array(
            'post_type' => 'resources',
            'tax_query' => array(
                array(
                    'taxonomy' => 'bhpn_theme',
                    'field' => 'id',
                    'terms' => '36'
                )
            )
        );
        $mini_q = new wp_query($mini_args);

        if (!$query1->have_posts()) get_template_part("content", "no-content");
        
        while ($query1->have_posts()) : $query1->the_post();
            get_template_part("content", "item-small");
        endwhile;?>
                </div>
                <?php if ($query1->have_posts()) {?><div class="col-xs-12 col-sm-10 col-sm-push-1"><a href="/resources/?bhpn_theme=healthy-community" class="orange-box">View All Resources (<?php echo $mini_q->found_posts ?>)</a></div><?php } ?>
<?php
        wp_reset_postdata();
?>
            </div>
        </div>
    </div>
</section>




<a id="section-measurement"></a>
<section class="container grey">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <h2><?php echo get_field('category_title_measurement') ?></h2>
                    <?php echo get_field('description_measurement') ?><br/>
                    <h3><?php echo get_field('category_subtitle_measurement') ?></h3>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1 items-holder">
<?php                    
        // MEASUREMENT QUERY
        $args2 = array(
            'post_type' => 'resources',
            'category__in' => 31,
            'posts_per_page' => 4,
            'orderby' => 'modified',
            'tax_query' => array(
                array(
                    'taxonomy' => 'bhpn_theme',
                    'field' => 'id',
                    'terms' => '17'
                )
            )
        );
        $query2 = new wp_query($args2);

        $mini_args = array(
            'post_type' => 'resources',
            'tax_query' => array(
                array(
                    'taxonomy' => 'bhpn_theme',
                    'field' => 'id',
                    'terms' => '17'
                )
            )
        );
        $mini_q = new wp_query($mini_args);
        
        
        if (!$query2->have_posts()) get_template_part("content", "no-content");
        
        while ($query2->have_posts()) : $query2->the_post();
            get_template_part("content", "item-small");
        endwhile;?>
                </div>
                <?php if ($query2->have_posts()) {?><div class="col-xs-12 col-sm-10 col-sm-push-1"><a href="/resources/?bhpn_theme=measurement" class="orange-box">View All Resources (<?php echo $mini_q->found_posts ?>)</a></div><?php } ?>
<?php
        wp_reset_postdata();
?>
            </div>
        </div>
    </div>
</section>





<a id="section-investment"></a>
<section class="container white">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <h2><?php echo get_field('category_title_investment') ?></h2>
                    <?php echo get_field('description_investment') ?><br/>
                    <h3><?php echo get_field('category_subtitle_investment') ?></h3>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1 items-holder">
<?php                
        // INVESTMENT QUERY
        $args4 = array(
            'post_type' => 'resources',
            'category__in' => 31,
            'posts_per_page' => 4,
            'orderby' => 'modified',
            'tax_query' => array(
                array(
                    'taxonomy' => 'bhpn_theme',
                    'field' => 'id',
                    'terms' => '6'
                )
            )
        );
        $query4 = new wp_query($args4);

        $mini_args = array(
            'post_type' => 'resources',
            'tax_query' => array(
                array(
                    'taxonomy' => 'bhpn_theme',
                    'field' => 'id',
                    'terms' => '6'
                )
            )
        );
        $mini_q = new wp_query($mini_args);

        if (!$query4->have_posts()) get_template_part("content", "no-content");
        
        while ($query4->have_posts()) : $query4->the_post();
            get_template_part("content", "item-small");
        endwhile;?>
                </div>
                <?php if ($query4->have_posts()) {?><div class="col-xs-12 col-sm-10 col-sm-push-1"><a href="/resources/?bhpn_theme=investment" class="orange-box">View All Resources (<?php echo $mini_q->found_posts ?>)</a></div><?php } ?>
<?php
        wp_reset_postdata();
?>
            </div>
        </div>
    </div>
</section>



<a id="section-policy"></a>
<section class="container grey">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <h2><?php echo get_field('category_title_policy') ?></h2>
                    <?php echo get_field('description_policy') ?><br/>
                    <h3><?php echo get_field('category_subtitle_policy') ?></h3>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-push-1 items-holder">
<?php
        // POLICY QUERY
        $args3 = array(
            'post_type' => 'resources',
            'category__in' => 31,
            'posts_per_page' => 4,
            'orderby' => 'modified',
            'tax_query' => array(
                array(
                    'taxonomy' => 'bhpn_theme',
                    'field' => 'id',
                    'terms' => '5'
                )
            )
        );
        $query3 = new wp_query($args3);

        $mini_args = array(
            'post_type' => 'resources',
            'tax_query' => array(
                array(
                    'taxonomy' => 'bhpn_theme',
                    'field' => 'id',
                    'terms' => '5'
                )
            )
        );
        $mini_q = new wp_query($mini_args);
        
        if (!$query3->have_posts()) get_template_part("content", "no-content");
        
        while ($query3->have_posts()) : $query3->the_post();
            get_template_part("content", "item-small");
        endwhile;?>
                </div>
                <?php if ($query3->have_posts()) {?><div class="col-xs-12 col-sm-10 col-sm-push-1"><a href="/resources/?bhpn_theme=policy" class="orange-box">View All Resources (<?php echo $mini_q->found_posts ?>)</a></div><?php } ?>
<?php
        wp_reset_postdata();
?>
            </div>
        </div>
    </div>
</section>

<?php 
    $uncat_args = array(
        'post_type' => 'resources',
        'orderby' => 'name',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'bhpn_theme',
                'field' => 'id',
                'terms' => array('5', '6', '17', '36'),
                'operator' => 'NOT IN'
            )
        )
    );
    $uncat_query = new WP_Query($uncat_args);
  while ($uncat_query->have_posts()) : $uncat_query->the_post();
      echo "\n<!-- Eric, this resource isn't categorized: ".get_the_title()."-->";
  endwhile;
    wp_reset_postdata();
?>


<script>
    // MENU-BASED PAGE SLIDING
    // / / / / / / / / / / / / / / / / / /
    jQuery('.bluebars').find('a[href*=#]').on('click', function(e) {
        e.preventDefault();
        jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top}, 500);
    });
</script>