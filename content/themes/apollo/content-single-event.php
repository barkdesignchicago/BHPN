<!-- debug: content-single-event.php -->
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
    
    $tweetMessage = rawurlencode("\n".get_post_meta(get_the_ID(), "bitly_url", true)." via @BHPNetwork");
    //bit.ly SHOULD GET THE PERMALINK, NOT THE SHORTCODE
    
    
    


   

    

    





?>
<section class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <article class="col-xs-12 col-sm-10 col-sm-push-1 page-content bg-fff">
                    <header>
                        <h1><?php the_title(); ?></h1>
                        <div class="social-share"><a href="http://twitter.com/home?status=<?php echo $tweetMessage ?>" target="_blank"><img src="/content/themes/apollo/images/icon-share-t-gold.png"></a><a href="mailto:?subject=<?php echo $emailSubject ?>&body=<?php echo $emailBody ?>"><img src="/content/themes/apollo/images/icon-share-e-gold.png"></a><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $urlStringForThisPage; ?>" target="_blank"><img src="/content/themes/apollo/images/icon-share-f-gold.png"></a><a href="">Submit a Resource</a>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="">Share Your Story</a>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="">Give Us Feedback</a></div>
                        

<!--                        <div class="metadata"><?php //the_date('m/d/Y')?>, <a href="<?php //echo $thePostTypeURL ?>"><?php //echo $thePostTypeName ?></a> / <?php //echo $theme_list ?></div>-->
                        <?php
    $date = DateTime::createFromFormat('Ymd', get_field("event_date")); ?>
                        
                    </header><!-- .entry-header -->
                    <div class="item-event-badge">
                        <div class="item event">
                            <div class="item-date-icon"><span class="date-icon-month"><?php echo strtoupper($date->format('M'))?></span> <span class="date-icon-date"><?php echo $date->format('d') ?></span></div>
                        </div>
                    </div>
                    <div class=""><?php echo $date->format('m/d/Y') ?></div>
                    
                    <?php if (get_post_meta(get_the_ID(), "related-resource-shortlink")) { ?><a href="<?php echo get_post_meta(get_the_ID(), "related-resource-shortlink", true) ?>" class="orange-box resource-link">View Resource</a><?php } ?>
                    <div class=""><?php the_content(); ?></div>
                </article>
            </div>
        </div>
    </div>
</section>
<!-- debug: / content-single.php -->