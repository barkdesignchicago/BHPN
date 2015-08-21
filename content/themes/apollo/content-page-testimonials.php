<!-- debug: start content-stories.php -->
<?php
    
/*    $themes_args = array(
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
    }*/
    
    $count_posts = wp_count_posts('testimonial');
    $total_testimonials = $count_posts->publish;

?>
<?php
    get_header();

/**
 * determine main column size from actived sidebar
 */
//$main_column_size = bootstrapBasicGetMainColumnSize();
?>
<section class="container bluebars">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <header>
                        <h1><?php echo get_the_title() ?></h1>
                    </header><!-- .entry-header -->
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
	$args = array(
		'post_type' => 'testimonial',
		'meta_key' => 'last_name',
		'orderby' => 'meta_value title',
		'order' => 'ASC',
    );
    $wp_query = new WP_Query($args);
?>

<section class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1 page-content bg-fff">
                    <div class="items-holder results-holder"><?php
                        if ($wp_query->have_posts()) {
                            while($wp_query->have_posts()) {
                                $wp_query->the_post();
                                get_template_part("content", "item-testimonial");

                            }
                        } else {
                            echo "No results were found.";
                        }
                        

 ?>                 </div>
                    <?php get_template_part("content", "pagination-results"); wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
	.item-text img {
		display: none !important;
	}
</style>



<?php
	wp_reset_postdata();
?>

                
                
                
                
                
                
           
<!-- debug: end content-stories.php -->