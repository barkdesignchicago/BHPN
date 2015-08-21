<?php 
    $theDate = get_the_date('m/d/Y');
    
    $thePostTypeObj = get_post_type_object(get_post_type());
    $thePostType = $thePostTypeObj->name;
    $thePostName = $thePostTypeObj->labels->name;
    $theTypeURL = "/".$thePostType;
    
    if ($thePostType == "post") {
        $termsObjs = wp_get_object_terms(get_the_ID(), "p_type");
        if (has_term('blog', 'p_type')) {
            $thePostType = "blog";
            $thePostName = "Blog";
        } else if (has_term('event', 'p_type')) {
            $thePostType = "event";
            $thePostName = "Events";
        } else if (has_term('news', 'p_type')) {
            $thePostType = "news";
            $thePostName = "News";
        }
        $theTypeURL = "/p_type/".$thePostType;

    } else if ($thePostType == "staff") {
        $theTypeURL = "/about-the-network/#section-team";
    }

    
    
    
    $theThemeString = "";
    $addSeparator = false;
    $theSeparator = "&nbsp; |&nbsp; ";
    
    // EMPTY LINK STRINGS:
    /*      "<a href=\"/?post_type=".$thePostType."&theme=".$theme->slug."\">".$theme->name."</a>";
            "<a href=\"/p_type/".$thePostType."/?bhpn_theme=".$theme->slug."\">".$theme->name."</a>"; */
    // I WANT THESE TO LOOP BUT I CAN'T SEEM TO USE AN EMBEDDED FUNCTION INSIDE THIS FILE. (IT'S BEING CALLED WITH get_template_part())
    if ($thePostType == 'resources' || $thePostType == 'story') {
        $addSeparator = false;
        
        if (has_term(36, 'bhpn_theme')) {// HEALTHY COMMUNITIES
            $theThemeString .= "<a href=\"/?post_type=".$thePostType."&bhpn_theme=".get_term(36, 'bhpn_theme')->slug."\">".get_term(36, 'bhpn_theme')->name."</a>";
            $addSeparator = true;
        }
        if (has_term(17, 'bhpn_theme')) {// MEASUREMENT
            if ($addSeparator) $theThemeString .= $theSeparator;
            $theThemeString .= "<a href=\"/?post_type=".$thePostType."&bhpn_theme=".get_term(17, 'bhpn_theme')->slug."\">".get_term(17, 'bhpn_theme')->name."</a>";
            $addSeparator = true;
        }
        if (has_term(6, 'bhpn_theme')) {// INVESTMENT
            if ($addSeparator) $theThemeString .= $theSeparator;
            $theThemeString .= "<a href=\"/?post_type=".$thePostType."&bhpn_theme=".get_term(6, 'bhpn_theme')->slug."\">".get_term(6, 'bhpn_theme')->name."</a>";
            $addSeparator = true;
        }
        if (has_term(5, 'bhpn_theme')) {// POLICY
            if ($addSeparator) $theThemeString .= $theSeparator;
            $theThemeString .= "<a href=\"/?post_type=".$thePostType."&bhpn_theme=".get_term(5, 'bhpn_theme')->slug."\">".get_term(5, 'bhpn_theme')->name."</a>";
            $addSeparator = true;
        }
    } else if ($thePostType == 'blog' || $thePostType == 'event' || $thePostType == 'news') {
        $addSeparator = false;
        
        if ($thePostType == 'blog' && has_term(71, 'blog_type')) {// ADD THE Quick Facts BLOG TYPE
            $theThemeString .= "<a href=\"/p_type/".$thePostType."/?blog_type=".get_term(71, 'blog_type')->slug."\">".get_term(71, 'blog_type')->name."</a>";
            $addSeparator = true;
        }
        
        if (has_term(36, 'bhpn_theme')) {// HEALTHY COMMUNITIES
            if ($addSeparator) $theThemeString .= $theSeparator;
            $theThemeString .= "<a href=\"/p_type/".$thePostType."/?bhpn_theme=".get_term(36, 'bhpn_theme')->slug."\">".get_term(36, 'bhpn_theme')->name."</a>";
            $addSeparator = true;
        }
        if (has_term(17, 'bhpn_theme')) {// MEASUREMENT
            if ($addSeparator) $theThemeString .= $theSeparator;
            $theThemeString .= "<a href=\"/p_type/".$thePostType."/?bhpn_theme=".get_term(17, 'bhpn_theme')->slug."\">".get_term(17, 'bhpn_theme')->name."</a>";
            $addSeparator = true;
        }
        if (has_term(6, 'bhpn_theme')) {// INVESTMENT
            if ($addSeparator) $theThemeString .= $theSeparator;
            $theThemeString .= "<a href=\"/p_type/".$thePostType."/?bhpn_theme=".get_term(6, 'bhpn_theme')->slug."\">".get_term(6, 'bhpn_theme')->name."</a>";
            $addSeparator = true;
        }
        if (has_term(5, 'bhpn_theme')) {// POLICY
            if ($addSeparator) $theThemeString .= $theSeparator;
            $theThemeString .= "<a href=\"/p_type/".$thePostType."/?bhpn_theme=".get_term(5, 'bhpn_theme')->slug."\">".get_term(5, 'bhpn_theme')->name."</a>";
            $addSeparator = true;
        }
    } 
    
    // ONLY ADD THE / SLASH SEPARATOR IF THERE'S GOING TO BE SOMETHING AFTER IT.
    if ($theThemeString != "") $theThemeString = " / ".$theThemeString;

	// IF WE'RE SHOWING A TESTIMONIAL, DON'T ADD METADATA AT ALL
	if ($thePostType == "testimonial") {

	} else {
?><p class="metadata"><?php echo $theDate ?>, <a href="<?php echo $theTypeURL ?>"><?php echo $thePostName ?></a><?php echo $theThemeString 
?></p><?php } ?>