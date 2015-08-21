<?php
/**
 * Template for displaying default pages
 * Template Name: Default Page Template
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
?>
<section class="bluebars emptyheader"></section>
						<?php 
						while (have_posts()) {
							the_post(); 
                            
                            get_template_part('content', 'single');

							//echo "\n\n";
							
							// If comments are open or we have at least one comment, load up the comment template
							//if (comments_open() || '0' != get_comments_number()) {
							//	comments_template();
							//}

							//echo "\n\n";

						} //endwhile;
						?> 
                           <!-- pagination here -->


<?php get_footer(); ?>