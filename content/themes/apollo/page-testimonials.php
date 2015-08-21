<?php
/**
 * Template for displaying the testimonials page
 * Template Name: Testimonials Page Template
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
?> 


						<?php 
//                    if (have_posts()) {
//						while (have_posts()) {
//							the_post();
                            
                            get_template_part('content', 'page-testimonials');

							//echo "\n\n";
							
							// If comments are open or we have at least one comment, load up the comment template
							//if (comments_open() || '0' != get_comments_number()) {
							//	comments_template();
							//}

							//echo "\n\n";

//						} //endwhile;
//                    } else {
//                            echo "No stories found.";
//                    }
						?> 
                           <!-- pagination here -->


<?php get_footer(); ?> 