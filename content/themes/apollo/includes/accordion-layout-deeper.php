<?php if( have_rows('accordions') ): ?>

    <div class="panel-group" id="accordion">
	<?php $i = 1; ?>
	<?php while( have_rows('accordions') ): the_row(); 
		
		// vars
		$title = get_sub_field('title');
		$visible_text = get_sub_field('visible_text');
		$hidden_text = get_sub_field('hidden_text');

		?>
	    <div class="panel panel-default">
		        <div class="panel-heading deeper">
		            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>" class="collapsed"><?php echo $title; ?></a></h4>
			        <div class="visible-text">
				        <?php if( !empty($visible_text) ): ?>
					            <?php echo $visible_text; ?>
				        <?php endif; ?>
			        </div>
		        </div><!--/.panel-heading -->
		        <div id="collapse<?php echo $i;?>" class="panel-collapse collapse" data-toggle="false">
		            <div class="panel-body">
		                <?php echo $hidden_text; ?>
		            </div><!--/.panel-body -->
		        </div><!--/.panel-collapse -->
		    </div><!-- /.panel -->

	   <?php $i++; ?>
	<?php endwhile; ?>
	</div>
<?php else: ?>
	
	

<?php endif; ?>
