<?php
    $url  = isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http';
    $url .= '://' . $_SERVER['SERVER_NAME'];
    $url .= in_array( $_SERVER['SERVER_PORT'], array('80', '443') ) ? '' : ':' . $_SERVER['SERVER_PORT'];
    $url .= $_SERVER['REQUEST_URI'];
//    return $url;
    
    $urlStringForThisPage = urlencode( $url );

    $emailSubject = rawurlencode ( "Build Healthy Places Network - ".the_title("","",false));
    $emailBody = rawurlencode ( "\n\nBuild Healthy Places Network - ".the_title("","",false).": \n");
    $emailBody .= $urlStringForThisPage;
    
	$requiredTweetContent = " ".get_post_meta(get_the_ID(), "bitly_url", true)." via @BHPNetwork";
	$optionalTweetContent = substr(get_the_title(), 0, 140 - strlen($requiredTweetContent));
	if (strlen(get_the_title()) > strlen($optionalTweetContent)) $optionalTweetContent = substr($optionalTweetContent, 0, -2)."…";
    $tweetMessage = rawurlencode("\n".$optionalTweetContent.$requiredTweetContent);
    //bit.ly SHOULD GET THE PERMALINK, NOT THE SHORTCODE
    
    
    


    $thePostType = $thePostTypeName = get_post_type();
    $thePostTypeURL = "/";
    if ($thePostType == "story") {
        $thePostTypeName = "Stories";
        $thePostTypeURL .= strtolower($thePostTypeName);
        
        $themes = get_the_terms(get_the_ID(), 'story_categories');
        $theme_list = "";
        if ( !empty( $themes ) && !is_wp_error( $themes ) ) {
            $count = count($themes);
            $i=0;
            foreach ($themes as $theme) {
                $i++;
                if ($theme->term_id != 15) { // EXCLUDE THE Featured TERM AND THE Uncategorized TERM
                    $theme_list .= '<a href="' . get_term_link( $theme ) . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $theme->name) . '">' . $theme->name . '</a>';
                    if ($count != $i) {
                        $theme_list .= ' | ';
                    }
                    else {
                        $theme_list .= '';//'</p>';
                    }
                }
            }
        }

    } else if ($thePostType == "resources") {
        $thePostTypeName = "Resources";
        $thePostTypeURL .= strtolower($thePostTypeName);
        
        $themes = get_the_terms(get_the_ID(), 'resource_categories');
        $theme_list = "";
        if ( !empty( $themes ) && !is_wp_error( $themes ) ) {
            $count = count($themes);
            $i=0;
            foreach ($themes as $theme) {
                $i++;
                if ($theme->term_id != 19) { // EXCLUDE THE Featured TERM AND THE Uncategorized TERM
                    $theme_list .= '<a href="' . get_term_link( $theme ) . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $theme->name) . '">' . $theme->name . '</a>';
                    if ($count != $i) {
                        $theme_list .= ' | ';
                    }
                    else {
                        $theme_list .= '';//'</p>';
                    }
                }
            }
        }
        
        
    } else if ($thePostType == "post") {
        $thePostTypeName = "";
        $p_types = get_the_terms(get_the_ID(), "p_type");
        
        foreach ($p_types as $the_type) {
            $thePostTypeName = $the_type->name;
            $thePostTypeURL .= "p_type/".strtolower($thePostTypeName);
        }
        
        $themes = get_the_terms(get_the_ID(), 'category');
        $theme_list = "";
        if ( !empty( $themes ) && !is_wp_error( $themes ) ) {
            $count = count($themes);
            $i=0;
            foreach ($themes as $theme) {
                $i++;
                if ($theme->term_id != 18 && $theme->term_id != 1) { // EXCLUDE THE Featured TERM AND THE Uncategorized TERM
                    $theme_list .= '<a href="' . get_term_link( $theme ) . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $theme->name) . '">' . $theme->name . '</a>';
                    if ($count != $i) {
                        $theme_list .= ' | ';
                    }
                    else {
                        $theme_list .= '';//'</p>';
                    }
                }
            }
        }
    }
    

    





?>
<section class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <article class="col-xs-12 col-sm-10 col-sm-push-1 page-content bg-fff">
                    <header>
                        <h1><?php the_title(); ?></h1>
                        <div class="social-share">
                        	<a href="http://twitter.com/home?status=<?php echo $tweetMessage ?>" target="_blank"><img src="/content/themes/apollo/images/icon-share-t-gold.png"></a>
                        	<a href="mailto:?subject=<?php echo $emailSubject ?>&body=<?php echo $emailBody ?>"><img src="/content/themes/apollo/images/icon-share-e-gold.png"></a>
                        	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $urlStringForThisPage; ?>" target="_blank"><img src="/content/themes/apollo/images/icon-share-f-gold.png"></a>
<?php /*                        	<a class="typeform-share" href="https://buildhealthyplaces.typeform.com/to/lXmFlC" data-mode="1" target="_blank">Submit a Resource</a>&nbsp;&nbsp; |&nbsp;&nbsp; <a class="typeform-share" href="https://buildhealthyplaces.typeform.com/to/fUKQTX?" data-mode="1" target="_blank">Share Your Story</a>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="/connect">Give Us Feedback</a></div> */ ?>
                        </div>
<script>(function(){var qs,js,q,s,d=document,gi=d.getElementById,ce=d.createElement,gt=d.getElementsByTagName,id='typef_orm',b='https://s3-eu-west-1.amazonaws.com/share.typeform.com/';if(!gi.call(d,id)){js=ce.call(d,'script');js.id=id;js.src=b+'share.js';q=gt.call(d,'script')[0];q.parentNode.insertBefore(js,q)}})()</script>

                        <?php get_template_part("content", "meta-date-cats-author")?>
                    </header><!-- .entry-header -->
                    
                    <?php if (get_field('resource_link')) { ?><a href="<?php echo get_field('resource_link') ?>" class="orange-box resource-link" target="_blank">View Resource</a><?php } ?>
                    <div class=""><?php the_content(); ?></div>
                    <div class="comments-holder"><?php
    
    
    if (comments_open() || '0' != get_comments_number()) comments_template();
    
    
    
    
                        ?></div>
                </article>
            </div>
        </div>
    </div>
</section>
<!-- debug: / content-single.php -->