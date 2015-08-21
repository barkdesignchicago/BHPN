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

<div class="col-md-6 col-md-offset-6">
This is a text.
</div>

<?php get_footer(); ?> 