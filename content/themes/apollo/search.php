<!-- debug: search.php -->
<?php
/**
 * The template for displaying search results.
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
//$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<section class="bluebars emptyheader"></section>

<section class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1 page-content bg-fff">
                    <header>
                        <h1>Search Results For &ldquo;<?php echo get_search_query(); ?>&rdquo;</h1>
                        <p><?php echo $wp_query->found_posts ?> results</p>
                    </header>
                    
<!--                    <a href="" class="orange-box resource-link">View Resource</a>-->
                    <div class="items-holder results-holder"><?php
                        if (have_posts()) {
                            while(have_posts()) {
                                the_post();
                                if (has_term('event', 'p_type')) get_template_part("content", "item-event");
                                else get_template_part("content", "item-large");

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





<?php /*get_sidebar('left'); ?> 
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<?php if (have_posts()) { ?> 
						<header class="page-header">
							<h1 class="page-title"><?php printf(__('Search Results for: %s', 'bootstrap-basic'), '<span>' . get_search_query() . '</span>'); ?></h1>
						</header><!-- .page-header -->
						<?php 
						// start the loop
						while (have_posts()) {
							the_post();
							
							/* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							* /
							get_template_part('content', 'search');
						}// end while
						
						bootstrapBasicPagination();
						?> 
						<?php } else { ?> 
						<?php get_template_part('no-results', 'search'); ?>
						<?php } // endif; ?> 
					</main>
				</div>*/?>
<?php get_sidebar('right'); ?> 
<?php get_footer(); ?> 