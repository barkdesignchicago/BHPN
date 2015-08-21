<?php
/**
 * The theme header
 * 
 * @package bootstrap-basic
 */
?>
<!doctype html>
<html>
<?php /*
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
*/ ?>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width">
    
<script src="//use.typekit.net/yfx7vrt.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<!--    <link rel="stylesheet" type="text/css" href="/content/themes/apollo/fonts/Macha-Bold.css">-->
    
    <meta charset="<?php bloginfo('charset'); ?>">
    
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    
<?php /*if (post_custom("social--title") || post_custom("social--description") || post_custom("social--image-url")) { ?>
    <meta property="og:title" content="<?php echo post_custom('social--title') ?>" />
    <meta property="og:description" content="<?php echo post_custom('social--description') ?>" />
    <meta property="og:type" content="image" />
    <meta property="og:url" content="<?php echo the_permalink() ?>" />
    <meta property="og:image" content="<?php echo post_custom('social--image-url') ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('name') ?>" />
<?php } */ ?>
    
<!--	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="< ?php bloginfo('pingback_url'); ? >">-->
    <!--wordpress head-->
    <?php wp_head(); ?>
    <!--[if lt IE 9]>
    <script src="/content/themes/apollo/dist/html5shiv.js"></script>
    <![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/main.css" />
   
    <?php
    
    
    // FAVICONS
    //////////////////////////////////////// ?>
    <link rel="shortcut icon" href="/content/themes/apollo/images/favicons/16x16.ico">
    <link rel="icon" type="image/png" href="/content/themes/apollo/images/favicons/16x16.png" />
    
    <!-- Opera Speed Dial Favicon -->
    <link rel="icon" type="image/png" href="/content/themes/apollo/images/favicons/160x160.png" />

    <!-- non-retina iPhone pre iOS 7 -->
    <link rel="apple-touch-icon" sizes="57x57" href="/content/themes/apollo/images/favicons/57x57.png">
    <!-- non-retina iPad pre iOS 7 -->
    <link rel="apple-touch-icon" sizes="72x72" href="/content/themes/apollo/images/favicons/72x72.png">
    <!-- non-retina iPad iOS 7 -->
    <link rel="apple-touch-icon" sizes="76x76" href="/content/themes/apollo/images/favicons/76x76.png">
    <!-- retina iPhone pre iOS 7 -->
    <link rel="apple-touch-icon" sizes="114x114" href="/content/themes/apollo/images/favicons/114x114.png">
    <!-- retina iPhone iOS 7 -->
    <link rel="apple-touch-icon" sizes="120x120" href="/content/themes/apollo/images/favicons/120x120.png">
    <!-- retina iPad pre iOS 7 -->
    <link rel="apple-touch-icon" sizes="144x144" href="/content/themes/apollo/images/favicons/144x144.png">
    <!-- retina iPad iOS 7 -->
    <link rel="apple-touch-icon" sizes="152x152" href="/content/themes/apollo/images/favicons/152x152.png">
    
    <!-- Win8 tile -->
    <meta name="msapplication-TileImage" content="/content/themes/apollo/images/favicons/144x144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF"/>
    <meta name="application-name" content="Build Healthy Places Network" />

    <link rel="icon" type="image/png" sizes="196x196" href="/content/themes/apollo/images/favicons/196x196.png" />
    <link rel="icon" type="image/png" sizes="160x160" href="/content/themes/apollo/images/favicons/160x160.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/content/themes/apollo/images/favicons/32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/content/themes/apollo/images/favicons/16x16.png" />
    
    
    
    <!-- IE11 tiles -->
    <meta name="msapplication-square70x70logo" content="/content/themes/apollo/images/favicons/70x70.png"/>
    <meta name="msapplication-square150x150logo" content="/content/themes/apollo/images/favicons/150x150.png"/>
    <meta name="msapplication-wide310x150logo" content="/content/themes/apollo/images/favicons/310x150.png"/>
    <meta name="msapplication-square310x310logo" content="/content/themes/apollo/images/favicons/310x310.png"/>
    
    
</head>
<body <?php body_class(); ?>>
		<!--[if lt IE 8]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
		
        
        
        
        
        
        
        
        <?php do_action('before'); ?>
        
        
    
        
        
        <!-- Fixed navbar -->
        <header class="navbar navbar-default" id="header-nav" role="navigation">
            <div class="container">
                <nav class="row">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="/content/themes/apollo/images/hdr-logo.png" alt="<?php bloginfo('name'); ?>"></a><?php get_template_part("searchform", "small") ?>
                    </div><!-- /navbar-header -->
                    <div class="collapse navbar-collapse navbar-primary-collapse">
                        <?php 
                            $listItemStringSearch = "<li class=\"menu-item menu-item-util hidden-xs\">".get_search_form(false)."</li>";

                            $listItemStringTwitter = "<li class=\"menu-item menu-item-util\"><a href=\"//twitter.com/BHPNetwork\" target=\"_blank\"><span class=\"visible-xs\">Follow @BHPN</span><span class=\"hidden-xs\"><img src=\"/content/themes/apollo/images/hdr-btn-twitter.png\" alt=\"Follow @BHPN\" title=\"Follow @BHPN\"></span></a></li>";



                            wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new BootstrapBasicMyWalkerNavMenu(), 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'.$listItemStringSearch.$listItemStringTwitter.'</ul>'));


        //                    dynamic_sidebar('navbar-right'); ?>
                    </div><!--.navbar-collapse-->
                </nav>
            </div>
        </header>
<!-- debug: / header.php -->