<?php
/**
 * Template for displaying pages
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>
<section class="container hero<?php echo rand(0,2) ?>" id="heroArea">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<!--<h1><span class="minor smaller">Working at the Intersection of</span><span class="major">Community Development</span><span><span class="minor inline">and </span><span class="major inline">Health</span></span></h1>-->
					<h1><span class="minor smaller">Working at the Intersection of</span><span class="major">Community Development</span><span class="major">and Health</span><div class="clearfix"></div></h1>
					<?php if (get_field('overlay-video-id', 2)) {?><a class="orange-box video" data-toggle="modal" data-target="#video-modal">Watch Our Video</a><?php } ?>
					<a class="orange-box" href="<?php echo get_permalink(7); ?>">Learn About the Network</a>
				</div>
			</div>
		</div>
	</div>
</section>




<?php 
	$featured_args = array(
		'post_type' => 'any',
		'category__in' => 18,
		'orderby' => 'date',
		'posts_per_page' => 3
	);
	$featured_query = new WP_Query($featured_args);
	
	if ($featured_query->have_posts()) { ?>
<section class="container white nav" id="featured-items-hp">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12"><a href="/whats-new/"><h2>What's New</h2></a></div>
				<?php while ($featured_query->have_posts()) {
					$featured_query->the_post();
					$theImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
					echo '<div class="col-xs-12 col-sm-4"><div class="hp-featured-item"><a href="'.get_the_permalink().'"><img src="'.$theImage[0].'"></a><h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3></div></div>';
				}?>
<!--				<div class="col-xs-12 view-all-posts"><a href="/whats-new/" class="orange-box">View All</a></div>-->
			</div>

<?php /*				<div class="col-xs-1"><a class="carousel-control left" href="#featuredCarousel" data-slide="prev"><img src="/wp-content/themes/apollo/images/carousel-arrow-left.png"></a></div>
				
				<div class="carousel slide col-xs-10" id="featuredCarousel" data-interval="5000">
					<ol class="carousel-indicators"><?php
		$i = 0;
		while ($i < $featured_query->post_count) :
			echo '<li data-target="#featuredCarousel" data-slide-to="'.$i.'" ';
			if ($i == 0) echo 'class="active"';
			echo '></li>';
			$i++;
		endwhile;
						?>
						
					</ol>
					<!-- Carousel items -->
					<div class="carousel-inner">
						<?php
		while ($featured_query->have_posts()) :
			$featured_query->the_post(); ?>
						<div class="item<?php if ($featured_query->current_post == 0) echo ' active' ?>">
							<div class="carousel-image"><a href="<?php echo get_the_permalink()?>"><?php 
												if (has_post_thumbnail( $post->ID )) $imagePaths = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
												if ($imagePaths) { ?><img src="<?php echo $imagePaths[0]; ?>" class="featuredCarouselImg"><?php } ?></a></div>
							<div class="carousel-text">
								<h2><a href="<?php echo get_the_permalink()?>"><?php echo get_the_title()?></a></h2>
								<?php
				get_template_part("content", "meta-date-cats");
				the_excerpt(); ?>
								<p class="read-more"><a href="<?php echo get_the_permalink()?>">Read More</a></p>
							</div>
						</div>
						<?php
		endwhile;
						?>
					</div>
					<!-- Carousel nav -->
				  
				</div>
				<div class="col-xs-1"><a class="carousel-control right" href="#featuredCarousel" data-slide="next"><img src="/wp-content/themes/apollo/images/carousel-arrow-right.png"></a></div>
				<?php */ ?>
		</div>
	</div>
</section>
<script type="text/javascript">
	// RESIZE THE FEATURED ITEMS' H3 HEIGHTS SO THEY'RE THE SAME AS THE TALLEST ITEM
/*	function handleResize() {
		jQuery(".hp-featured-item h3").height("auto");

		if (jQuery(document).width() >= 768 ) {
			var maxHeight = Math.max.apply(null, jQuery(".hp-featured-item h4").map(function () {
				return jQuery(this).height();
			}).get());
			jQuery(".hp-featured-item h4").height(maxHeight);
		}
	}
	jQuery(document).ready(function() {
		handleResize();
	});
	jQuery(window).load(function() {
		handleResize();
	});
	jQuery(window).resize(function() {
		handleResize();
	});*/


</script>
<?php /*
 // AUTO START THE CAROUSEL ?><script>
	jQuery(document).ready(function() {
		jQuery("#featuredCarousel").carousel(0);
		
		
		startWatchingScroll();
	});

	function stopWatchingScroll() {
		jQuery(window).off("scroll", checkScroll);
	}
	function startWatchingScroll() {
		jQuery(window).on("scroll", checkScroll);
	}
	
	carouselIsPaused = false;
	function checkScroll() {
		if (jQuery(window).scrollTop() <= jQuery("#featured-items-hp").offset().top + jQuery("#featured-items-hp").height()) {
			// IT'S ON SCREEN
			if (carouselIsPaused == true) {
				carouselIsPaused = false;
				jQuery("#featuredCarousel").carousel('cycle');
				
			}
		} else {
			// IT'S NOT ON SCREEN
			if (carouselIsPaused == false) {
				jQuery("#featuredCarousel").carousel('pause');
				carouselIsPaused = true;
			}
//            stopWatchingScroll();
		}
		
	}
	
	
</script>
<?php
	*/ }
	wp_reset_postdata();
?>


<section class="container grey" id="whatWeOffer">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12"><h2>What We Offer</h2></div>
				<div class="col-xs-12 col-sm-6"><a href="<?php echo the_field('offer-box-1-url') ?>"><div class="offering bg-09a0b8"><h2><?php echo the_field('offer-box-1-head') ?></h2><p><?php echo the_field('offer-box-1-body') ?></p></div></a></div>
				<div class="col-xs-12 col-sm-6"><a href="<?php echo the_field('offer-box-2-url') ?>"><div class="offering bg-76cbd9"><h2><?php echo the_field('offer-box-2-head') ?></h2><p><?php echo the_field('offer-box-2-body') ?></p></div></a></div>
				<div class="col-xs-12 col-sm-6"><a href="<?php echo the_field('offer-box-3-url') ?>"><div class="offering bg-f27422"><h2><?php echo the_field('offer-box-3-head') ?></h2><p><?php echo the_field('offer-box-3-body') ?></p></div></a></div>
				<div class="col-xs-12 col-sm-6"><a href="<?php echo the_field('offer-box-4-url') ?>"><div class="offering bg-f7ac2b"><h2><?php echo the_field('offer-box-4-head') ?></h2><p><?php echo the_field('offer-box-4-body') ?></p></div></a></div>
			</div>
		</div>
	</div>
</section>



<?php // ADD THE TESTIMONIALS
	get_template_part('content', 'home-testimonials');
?>

<section class="container grey">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="bg-09a0b8" id="connectWithTheNetwork">
						<h2>Keep in touch, sign up for our newsletter.</h2>
						<form action="//buildhealthyplaces.us9.list-manage.com/subscribe/post?u=ad88370db508e87870ea1d0b0&amp;id=c39fafc581&group[1][5]=true" method="post" target="_blank">
							<label for="mce-NAME">Name:</label>
							<input type="text" name="NAME" placeholder="Name" id="mce-NAME" required>
							<label for="mce-EMAIL">Email:</label>
							<input type="email" name="EMAIL" autocomplete="off" placeholder="Email Address" id="mce-EMAIL" required>
							<input type="submit" class="orange-box" value="Submit">
						</form>
					</div>
				</div><?php // REMOVE THE label ELEMENTS IF THE BROWSER SUPPORTS placeholder INPUT PARAMETERS ?>
				<script>
					jQuery.support.placeholder = (function() {
						var i = document.createElement('input');
						return 'placeholder' in i;
					})();
					if (jQuery.support.placeholder) jQuery("#connectWithTheNetwork label").remove();
				</script>


				<div class="col-xs-12 col-sm-6" id="tweetSectionHolder">
					<div class="tweet-header bg-09a0b8"><a href="https://twitter.com/BHPNetwork" class="twitter-follow-button" data-align="right" data-show-count="false" data-lang="en" data-show-screen-name="True" >Follow @BHPNetwork</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
					<div class="" id="tweetBox"><a class="twitter-timeline" href="https://twitter.com/BHPNetwork" data-widget-id="496658584604659713" width="100%" height="300" data-chrome="nofooter noheader noborders">&nbsp;</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<?php
	wp_reset_postdata();
	if (get_field('overlay-video-id', 2)) {?>
<div class="modal fade" id="video-modal">
	<div class="container fullwidth" id="vid-fullscreenplayer">
		<div class="vidholder">
			<iframe id="vid-iframe" src="" frameborder="0" allowfullscreen></iframe>
			<span class="close glyphicon glyphicon-remove stopVideoButton" data-dismiss="modal"></span>
		</div>
	</div>        
</div>
<?php // THIS ADDS LISTENERS SO THAT THE VIDEO DOESN'T LOAD UNTIL REQUESTED AND STOPS PLAYING (UNLOADS) WHEN THE MODAL IS CLOSED ?>
<script>
	jQuery(document).ready(function() {
		jQuery("#video-modal").on("show.bs.modal", function() {
			jQuery("#vid-iframe").attr('src', "//www.youtube.com/embed/<?php echo get_field('overlay-video-id', 2) ?>?autoplay=1");
		});
		jQuery(".stopVideoButton").click(function(e) {
			jQuery('#vid-iframe').html("");
			jQuery('#vid-iframe').attr('src', "");
		});
	});
</script>
<?php } ?>
						   <!-- pagination here -->



<?php get_footer(); ?> 
