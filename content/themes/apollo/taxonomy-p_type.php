<?php 
/**
 * Displaying archive page (category, tag, archives post, author's post)
 * 
 * @package bootstrap-basic
 */
?>

<?php
    get_header();

/**
 * determine main column size from actived sidebar
 */
//$main_column_size = bootstrapBasicGetMainColumnSize();
?>
<section class="bluebars emptyheader"></section>
<?php //get_sidebar('left'); ?>
<section class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <article class="col-xs-12 col-sm-10 col-sm-push-1 page-content bg-fff">
                    <header>
                        <h1><?php
                                if (has_term('blog', 'p_type')) echo "Blog Posts";
                                else if (has_term('news', 'p_type')) echo "News Items";
                                else if (has_term('event', 'p_type')) echo "Events";
/* <?php
								if (is_category()) :
									single_cat_title();

								elseif (is_tag()) :
									single_tag_title();

								elseif (is_author()) :
									/* Queue the first post, that way we know
									 * what author we're dealing with (if that is the case).
									 * /
									the_post();
									printf(__('Author: %s', 'bootstrap-basic'), '<span class="vcard">' . get_the_author() . '</span>');
									/* Since we called the_post() above, we need to
									 * rewind the loop back to the beginning that way
									 * we can run the loop properly, in full.
									 * /
									rewind_posts();

								elseif (is_day()) :
									printf(__('Day: %s', 'bootstrap-basic'), '<span>' . get_the_date() . '</span>');

								elseif (is_month()) :
									printf(__('Month: %s', 'bootstrap-basic'), '<span>' . get_the_date('F Y') . '</span>');

								elseif (is_year()) :
									printf(__('Year: %s', 'bootstrap-basic'), '<span>' . get_the_date('Y') . '</span>');

								elseif (is_tax('post_format', 'post-format-aside')) :
									_e('Asides', 'bootstrap-basic');

								elseif (is_tax('post_format', 'post-format-image')) :
									_e('Images', 'bootstrap-basic');

								elseif (is_tax('post_format', 'post-format-video')) :
									_e('Videos', 'bootstrap-basic');

								elseif (is_tax('post_format', 'post-format-quote')) :
									_e('Quotes', 'bootstrap-basic');

								elseif (is_tax('post_format', 'post-format-link')) :
									_e('Links', 'bootstrap-basic');

								else :
									_e('Archives', 'bootstrap-basic');

								endif;
                                */ ?></h1>
                    </header><!-- .entry-header -->
                    
                    <?php //if (get_post_meta(get_the_ID(), "related-resource-shortlink")) { ? ><a href="<?php echo get_post_meta(get_the_ID(), "related-resource-shortlink", true) ? >" class="orange-box resource-link">View Resource</a><?php } ?>
                    <div class="items-holder results-holder"><?php
    the_content();
    // IF IT'S AN event, DO A TOTALLY DIFFERENT QUERY
    if (has_term('event', 'p_type')) {
        $today = date('Ymd');
        $events_args = array(
            'post_type' => 'post',
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
        $wp_query = new wp_query($events_args);
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            get_template_part("content", "item-event");
        }
//        wp_reset_postdata();
    } else if (have_posts()) {
            while (have_posts()) {
                the_post();

                /* Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part("content", "item-large");
            }
    } else {
        echo "Unfortunately, no posts were found.";
    }
?></div><?php get_template_part('content', 'pagination-older'); ?>
                </article>
            </div>
        </div>
    </div>
</section>


<?php /*
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<?php if (have_posts()) { ?> 

						<header class="page-header">
							<h1 class="page-title">
								 
							</h1>
							
							<?php
							// Show an optional term description.
							$term_description = term_description();
							if (!empty($term_description)) {
								printf('<div class="taxonomy-description">%s</div>', $term_description);
							} //endif;
							?>
						</header><!-- .page-header -->
						
						<?php 
						/* Start the Loop * /
						while (have_posts()) {
							the_post();

							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 * /
							get_template_part('content', "item-large");//get_post_format());
						} //endwhile; 
						?> 

						<?php bootstrapBasicPagination(); ?> 

						<?php } else { ?> 

						<?php get_template_part('no-results', 'archive'); ?> 

						<?php } //endif; ?> 
					</main>
				</div>*/ ?>
<?php //get_sidebar('right'); ?> 
<?php get_footer(); ?> 