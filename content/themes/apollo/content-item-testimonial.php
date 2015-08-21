<div class="item large">
	<div class="item-thumb"><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_post_thumbnail() ?></a></div>
	<div class="item-text">
		<h4><a href="<?php echo get_the_permalink()?>"><?php echo get_the_title() ?></a></h4>
		<?php the_content() ?>
	</div>
</div>