<!-- 404.php -->
<?php
    
    get_header();
    
    $link =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $escaped_link = htmlspecialchars($link, ENT_QUOTES, 'UTF-8');
    
    $request_post_type = $_GET['post_type'];
    $request_theme = $_GET['bhpn_theme'];
    $request_type = $_GET['resource_types'];
    $request_post_topic = $_GET['bhpn_topic'];

    $is_failed_filter = false;
    if ($request_post_type == "resources" && ($request_theme != "" || $request_type != "" || $request_post_topic != "")) $is_failed_filter = true;
    
    
//    echo '<a href="'.$escaped_link.'">'.$escaped_link.'</a>';

?>
<section class="bluebars emptyheader"></section>
<section class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <article class="col-xs-12 col-sm-10 col-sm-push-1 page-content bg-fff">
                    <header>
                        <h1><?php echo $is_failed_filter ? "No Results Found" : "404, Page Not Found" ?></h1>
                    </header><!-- .entry-header -->
                    
<!--                    <a href="" class="orange-box resource-link">View Resource</a>-->
                    <div class=""><p><?php echo $is_failed_filter ? "No results were found to match all of the requested search criteria. <a href=\"javascript:history.go(-1)\">Consider broadening the search parameters.</a>" : "Unfortunately, the requested page could not be found.";
                        the_content(); ?></p><p><?php
/*    // GRAB THE REQUEST
    $theURL = $_SERVER['REQUEST_URI'];
    // DROP THE FIRST CHARACTER, THE LEADING SLASH
    $theURL = substr($theURL, 1);
    // GET READY TO EXPLODE THE STRING
    $theExplodePattern = '/[\/\s,+&]/';
    // BLOW IT APART
    $keywords = preg_split($theExplodePattern, $theURL);
    // MAKE THE SEARCH TERM
    $theSearchURL = "/s=".implode("+", $keywords);*/
    
?><br><br><br><br><br></p></div>
                    <div class="items-holder results-holder"><h2>Most Recent Site Updates</h2><?php 
    $args = array(
        'post_type' => array('post','resources','story'),
        'posts_per_page' => 5
    );
    $query = new wp_query($args);
    if ($query->have_posts()) {
        while($query->have_posts()) : $query->the_post();
            if (has_term('event', 'p_type')) get_template_part("content", "item-event");
            else get_template_part("content", "item-large");
        endwhile;
    };
                        ?></div>
                </article>
            </div>
        </div>
    </div>
</section><?php /*





				<div class="col-md-12 content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'bootstrap-basic'); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bootstrap-basic'); ?></p>

								<!--search form-->
								<form class="form-horizontal" method="get" action="<?php echo esc_url(home_url('/')); ?>" role="form">
									<div class="form-group">
										<div class="col-xs-10">
											<input type="text" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'bootstrap-basic'); ?>" title="<?php echo esc_attr_x('Search &hellip;', 'label', 'bootstrap-basic'); ?>" class="form-control" />
										</div>
										<div class="col-xs-2">
											<button type="submit" class="btn btn-default"><?php _e('Search', 'bootstrap-basic'); ?></button>
										</div>
									</div>
								</form>

								<div class="row">
									<div class=" col-sm-6 col-md-3">
										<?php the_widget('WP_Widget_Recent_Posts'); ?> 
									</div>
									<div class=" col-sm-6 col-md-3">
										<div class="widget widget_categories">
											<h2 class="widgettitle"><?php _e('Most Used Categories', 'bootstrap-basic'); ?></h2>
											<ul>
												<?php
												wp_list_categories(array(
													'orderby' => 'count',
													'order' => 'DESC',
													'show_count' => 1,
													'title_li' => '',
													'number' => 10,
												));
												?> 
											</ul>
										</div><!-- .widget -->
									</div>
									<div class=" col-sm-6 col-md-3">
										<?php
										/* translators: %1$s: smiley * /
										$archive_content = '<p>' . sprintf(__('Try looking in the monthly archives. %1$s', 'bootstrap-basic'), convert_smilies(':)')) . '</p>';
										the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content");
										?> 
									</div>
									<div class=" col-sm-6 col-md-3">
										<?php the_widget('WP_Widget_Tag_Cloud'); ?> 
									</div>
								</div>
							</div><!-- .page-content -->
						</section><!-- .error-404 -->
					</main>
				</div>
*/ ?>
<?php get_footer(); ?>