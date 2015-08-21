<?php
/**
 * Template for displaying search form in the apollo theme
 * 
 * @package bootstrap-basic
 * /
?>
<form role="search" method="get" class="search-form form" action="<?php echo esc_url(home_url('/')); ?>">
	<label for="form-search-input" class="sr-only"><?php _ex('Search for', 'label', 'bootstrap-basic'); ?></label>
	<div class="input-group">
		<input type="search" id="form-search-input" class="form-control" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'bootstrap-basic'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label', 'bootstrap-basic'); ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default"><?php esc_html_e('Search', 'bootstrap-basic'); ?></button>
		</span>
	</div>
</form>

*/?>
<form role="search" method="get" class="search-form form" action="<?php echo esc_url(home_url('/')); ?>">
    <a data-toggle="collapse" data-target="#header-search-field"><img src="/content/themes/apollo/images/hdr-btn-search.png" title="Toggle search field"></a>
    <div id="header-search-field"<?php if (is_search()) echo "class=\"pin-open\""?>><input type="search" id="form-search-input" name="s" value="<?php echo esc_attr(get_search_query()); ?>"><button type="submit">Search</button></div>
</form>