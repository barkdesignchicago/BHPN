<?php
    $_posts_per_page = get_option('posts_per_page');
    $_page_number = (get_query_var('paged') && get_query_var('paged') > 1) ? get_query_var('paged') : 1;
    $_total_posts = $wp_query->found_posts;
    
    $firstPostNumber = $_page_number == 1 ? 1 : (($_page_number * $_posts_per_page) - $_posts_per_page) + 1;
    $lastPostNumber = min($firstPostNumber + $_posts_per_page - 1, $_total_posts);
    $countMessage = $_total_posts == 0 ? "" : $firstPostNumber."-".$lastPostNumber." of ".$_total_posts?>
<div class="pagination-footer">
    <div class="previous"><?php previous_posts_link('Previous Results'); ?></div>
    <div class="next"><?php next_posts_link('Next Results'); ?></div>
    <div class="enumeration"><?php echo $countMessage ?></div>
</div>