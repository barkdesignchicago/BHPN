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
		        <div class="panel-heading">
		            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>" <?php if ($i!=1): echo 'class="collapsed"' ;endif;?>><?php echo $title; ?></a></h4>
		        </div><!--/.panel-heading -->

		        <?php if( !empty($visible_text) ): ?>
			        <div class="panel-teaser panel-body">
			            <?php echo $visible_text; ?>
			        </div>
		        <?php endif; ?>

		        <div id="collapse<?php echo $i;?>" class="panel-collapse collapse <?php if ($i==1): echo 'in' ;endif;?>" data-toggle="false">
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
