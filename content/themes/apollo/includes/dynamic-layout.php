	<?php
	if( have_rows('dynamic_content_layouts') ):
	    while ( have_rows('dynamic_content_layouts') ) : the_row();
		    if( get_row_layout() == 'full_width_content_block' ):
				?>
				<div class="row">

                    <div class="col-sm-10 col-md-10 col-sm-push-1">
						<?php 
							if( get_sub_field('is_intro')==true ):
								?>
								<div class="intro-copy"><?php the_sub_field('text');?></div>
								<?
							else:
								the_sub_field('text');
							endif;
						?>
                    </div>
				</div>
				<?php
		    elseif( get_row_layout() == 'two_column_content_block' ):
				?>
				<div class="row">
					<div class="col-md-10 col-sm-push-1">
						<div class="row">
							<div class="col-sm-5 col-md-6 row-no-padding">
								<?php
								the_sub_field('column_1');
								?>
							</div>
							<div class="col-sm-5 col-md-6">
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
					<div class="col-sm-10 col-sm-push-1">
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
	        endif;
	
	    endwhile;
	else :
	    // no layouts found
	endif;
			
	?>
