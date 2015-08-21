<!-- debug: start content-stories.php -->
<div class="row">
    <div class="container wireframebox fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1 ">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->        
                    <?php the_content(); ?>
                    <div>Explore Stories by Theme:</div>
                    <ul class="header-filter">
                        <li>What Makes a Healthy Community<span class="header-filter-spacer">  &nbsp;|&nbsp;  </span></li>
                        <li>Impact Hub<span class="header-filter-spacer">  &nbsp;|&nbsp;  </span></li>
                        <li>Effective Policies<span class="header-filter-spacer">  &nbsp;|&nbsp;  </span></li>
                        <li>Financing/Investment Strategy</li>
                    </ul>
                    
                    <input type="button" value="Explore Full Database (85)">

                </div>
            </div>
        </div>
    </div>
</div>


<style>
    #content {
        margin: 0;
    }
    
    ul.header-filter {
        /*list-style-type: none;
        margin-left: 0;
        padding-left: 0;*/
        margin-left: .5rem;
        padding-left: .5rem;
    }
    .header-filter-spacer {
        display: none;
    }
    
    .featured-item-img {
        border: #ccc 1px solid;
        width: 100%;
    }
    .featured-item-nav {
        padding-top: 75px;
    }
    
    .cta {
        font-size: .8rem;
        font-weight: bold;
    }
    
    .item {
        margin-bottom: 2rem;
    }
    .item-thumb {
        border: #ccc 1px solid;
        width: 100%;
    }
    
    
    
    @media (min-width: 768px) {
        h1 {
            text-align: left;
        }
        ul.header-filter {
            list-style-type: none;
            margin-left: 0;
            padding-left: 0;
        }
        ul.header-filter li {
            display: inline-block;
        }
        .header-filter-spacer {
            display: inline;
            color: #ccc;
        }
        
        
        .featured-item-img {
            height: auto;
        }
        .featured-item-nav {
            padding-top: 100px;
        }
        
        
        
    }
</style>


<div class="row">
    <div class="container wireframebox fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-xs-1                col-sm-1                featured-item-nav"><span class="glyphicon glyphicon-chevron-left "></span></div>
                <div class="col-xs-1                col-sm-1                pull-right featured-item-nav"><span class="glyphicon glyphicon-chevron-right "></span></div>
                <div class="col-xs-10               col-sm-5                col-md-6"><img class="featured-item-img" src="/prototype/images/wf-vid.gif"></div>
                <div class="col-xs-10 col-xs-push-1 col-sm-5 col-sm-push-0  col-md-4">
                    <h2>Featured Story Item</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
<p class="cta">Read More</p>
                </div>
                
                
                
            </div>
        </div>
    </div>
</div>





<section class="row">
    <div class="container wireframebox fullwidth">
        <div class="container">
            <?php 
                $storyItemArgs = array(
                    'post_type' => 'story'
                );
                $itemsQuery = new WP_Query($storyItemArgs);
                if ($itemsQuery->have_posts()) {
                   while ($itemsQuery->have_posts()) :
                        $itemsQuery->the_post();
                        get_template_part("content", "stories-item");
                    endwhile;
                } else {
                    echo "There are no stories available at this time.";
                }

                wp_reset_query();
?>
        </div>
    </div>
</section>

                
                
                
                
                
                
                
                
                
                

<?php /*
<div class="container wireframebox">
    <section class="row pos-relative">
        <div class="col-xs-12 wireframebox pre-loop">
            <?php 
                $storyItemArgs = array(
                    'post_type' => 'story'
                );
                $itemsQuery = new WP_Query($storyItemArgs);
                if ($itemsQuery->have_posts()) {
                   while ($itemsQuery->have_posts()) :
                        $itemsQuery->the_post();
                        get_template_part("content", "stories-item");
                    endwhile;
                } else {
                    echo "There are no stories available at this time.";
                }

                wp_reset_query();
?>
        </div>
        <div class="col-sm-3 pull-right hidden-xs search-column wireframebox" id="search-column"><h2>Search Stories</h2>
        <form>
            <h3>Keyword</h3>
            <input name="keywordfield" type="text" id="keywordfield" placeholder="search" />
            <h3>Topic</h3>
            <span class="holder"><input type="checkbox" name="topic_0" id="topic_0"><label for="topic_0">What Makes a Healthy Community?</label></span>
            <span class="holder"><input type="checkbox" name="topic_1" id="topic_1"><label for="topic_1">Impact Hub</label></span>
            <span class="holder"><input type="checkbox" name="topic_2" id="topic_2"><label for="topic_2">Effective Policies</label></span>
            <span class="holder"><input type="checkbox" name="topic_3" id="topic_3"><label for="topic_3">Financing Investment Strategy</label></span>
            <h3>Geography</h3>
            <span class="holder"><input type="checkbox" name="topic_0" id="geo_0"><label for="geo_0">Midwest</label></span>
            <span class="holder"><input type="checkbox" name="topic_1" id="geo_1"><label for="geo_1">Mid Atlantic</label></span>
            <span class="holder"><input type="checkbox" name="topic_2" id="geo_2"><label for="geo_2">Southwest</label></span>
            <span class="holder"><input type="checkbox" name="topic_3" id="geo_3"><label for="geo_3">Northeast</label></span>
            <span class="holder"><input type="checkbox" name="topic_0" id="geo_4"><label for="geo_4">South</label></span>
            <span class="holder"><input type="checkbox" name="topic_1" id="geo_5"><label for="geo_5">Great Plains</label></span>
            <span class="holder"><input type="checkbox" name="topic_2" id="geo_6"><label for="geo_6">Pacific Northwest</label></span>
            <input type="button" name="submit" id="submit" value="Search">
        </form>
        </div>
        
    </section>
</div>*? ?>
<!-- debug: end content-stories.php -->