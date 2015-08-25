<?php if( have_rows('featured') ): ?>

	<?php while( have_rows('featured') ): the_row(); 
		?>
		<div class="col-md-4">
			<?php		
			// vars
			$image = get_sub_field('image');
			$title = get_sub_field('title');
			$text = get_sub_field('text');
			$link = get_sub_field('link_number');
			?>
			
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $link;?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="img-responsive" /></a>
			<h5><a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $link;?>"><?php echo $title; ?></a></h5>
			<?php echo $text; ?>
			<?php
				if(!empty($link)): 
				?>
				<p>
					<a data-toggle="collapse" data-parent="#accordion" class="featured-read-more" href="#collapse<?php echo $link;?>">Read More</a>
				</p>
				<?php
				endif;	
				?>
		</div>


	<?php endwhile; ?>
<?php else: ?>
	
	

<?php endif; ?>
