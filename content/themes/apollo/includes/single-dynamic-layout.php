	<?php
	if( have_rows('single_post_layout') ):
	    while ( have_rows('single_post_layout') ) : the_row();
		    if( get_row_layout() == 'full_width_column_block' ):
				?>
				<div class="row">
                    <div class="col-sm-12 col-md-12">
						<?php 
							the_sub_field('text');
						?>
                    </div>
				</div>
				<?php
		    elseif( get_row_layout() == 'two_column_content_block' ):
				?>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<?php 
								$col1_callout = get_sub_field('column_1_callout'); 
								if ($col1_callout == TRUE):
									$callout1="callout";
								endif;
							?>
							<div class="col-sm-6 col-md-6 row-no-padding <?php echo $callout1; ?>">
								<?php
								the_sub_field('column_1');
								?>
							</div>
							<?php 
								$col2_callout = get_sub_field('column_2_callout'); 
								if ($col2_callout == TRUE):
									$callout2="callout";
								endif;
							?>
							<div class="col-sm-6 col-md-6  <?php echo $callout2; ?>">
								<?php
								the_sub_field('column_2');
								?>
							</div>
						</div>
					</div>
				</div>
				<?php
		    elseif( get_row_layout() == 'three_column_content_block' ):
				?>
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-md-4 row-no-padding">
								<?php
								the_sub_field('column_1');
								?>
							</div>
							<div class="col-md-4">
								<?php
								the_sub_field('column_2');
								?>
							</div>
							<div class="col-md-4">
								<?php
								the_sub_field('column_3');
								?>
							</div>
						</div>
					</div>
				</div>
				<?php
		    elseif( get_row_layout() == 'project_details_block' ):
				?>
				<div class="row project-details">
	                <div class="col-sm-12">
						<h2><?php the_sub_field('title');?></h2>
						<div class="contain">
							<?php the_sub_field('text'); ?>
						</div>
                    </div>
				</div>
				<?php
		    elseif( get_row_layout() == 'social_determinants_block' ):
				?>
				<div class="row social-determinants">
                   <div class="col-sm-12">
						<h2><?php the_sub_field('title');?></h2>
						<div class="contain">
							<?php the_sub_field('text'); ?>
						</div>
					</div>
				</div>
				<?php
	        endif;
	
	    endwhile;
	else :
	    // no layouts found
	endif;
			
	?>
