<?php

$designatedItems = get_field('testimonials') ? get_field('testimonials') : array();


while (count($designatedItems) < 4) {
	$temp_args = array(
		'orderby' => 'rand',
		'post_type' => 'testimonial',
		'post__not_in' => $designatedItems,
		'post_count' => (4 - count($designatedItems))
	);
	$wp_query = new WP_Query($temp_args);
	while ($wp_query->have_posts()) {
		$wp_query->the_post();
		array_push($designatedItems, get_the_ID());
	}
}
wp_reset_postdata();



$args = array(
	'post__in' => $designatedItems,
	'post_type' => 'testimonial',
	'orderby' => 'rand'//post__in'
);


    // the query
    $find_testimonials = new WP_Query( $args );
    if ( $find_testimonials->have_posts() ) : ?>
<section class="container white">
    <div class="row" id="quotes">
        <div class="container">
            <div class="row">
                <div class="col-xs-12"><h2>What Field Leaders are Saying</h2></div>
            </div>
            <div class="row tab-content activeQuotes"><!-- tab-content? -->
<?php 
        $count = 1;
        while ( $find_testimonials->have_posts() ) : $find_testimonials->the_post();
?>
                <div class="col-xs-12 tab-pane activeQuote<?php echo $count == 1 ? " active" : "" ?>" id="tab<?php echo $count ?>">
                    <div class="quote-photo"><?php 
                                                if (has_post_thumbnail( $post->ID )) $imagePaths = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                                                if ($imagePaths) { ?><img class="" src="<?php echo $imagePaths[0]; ?>"><?php } ?></div>
                    <div class="quote-box">
                        <div class="quote-box-inset bg-f27422">
                            <p class="quote-large">&ldquo;<?php echo get_field("quote_large") ?>&rdquo;</p>
                        </div>
                        <p class="quote-name"><?php
                                                        echo the_title("","",false);
                                                        echo get_field( "testimonials_organization" ) ? "<span class=\"quote-title\">, ".get_field("testimonials_organization")."</span>" : "" ?></p>
                    </div>
                </div>
<?php
        $count++;
        endwhile;
?>
            </div>
            <div class="row">
                <div class="nav nav-tabs quote-tabs">
<?php 
        $count = 1;
        while ( $find_testimonials->have_posts() ) : $find_testimonials->the_post();
?>
                    
                    
                    <div class="col-xs-3 col-sm-2 col-sm-push-2">
                        <div class="quote-tab<?php echo $count == 1 ? ' active ' : "" ?>">
                            <a href="#tab<?php echo $count ?>" role="tab" data-toggle="tab">
                                <div class="quote-photo"><?php 
                                                if (has_post_thumbnail( $post->ID )) $imagePaths = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                                                if ($imagePaths) { ?><img class="img-responsive" src="<?php echo $imagePaths[0]; ?>"><?php } ?></div>
                                <div class="quote-name"><?php echo get_the_title() ?></div>
                            </a>
                        </div>
                    </div>
					<?php if ($find_testimonials->current_post == 3) { ?>
                    <div class="col-xs-12 col-sm-2 col-sm-push-2 view-all-testimonials"><a href="/testimonials/" class="orange-box">View All</a></div>
                    <?php } ?>
<?php
        $count++;
        endwhile;
?>
			
		</div>
    </div>
</section>
<?php wp_reset_postdata();
    endif; //END FIRST if(have_posts) */ ?>
        
        
<script>
    jQuery(document).ready(function() {
        jQuery('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            jQuery('.quote-tab').removeClass("active");
            
            jQuery(e.target).parent().addClass("active");
    //        e.target // activated tab
    //        e.relatedTarget // previous tab
        })
    });
</script>