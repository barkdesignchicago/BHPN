<?php 
//	$theDate = get_the_date('m/d/Y');
	$theDate = get_the_date('F j, Y');
	
/*	$thePostTypeObj = get_post_type_object(get_post_type());
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
			"<a href=\"/p_type/".$thePostType."/?bhpn_theme=".$theme->slug."\">".$theme->name."</a>"; * /
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
?><div class="metadata author-block"><?php echo $theDate ?>, <a href="<?php echo $theTypeURL ?>"><?php echo $thePostName ?></a><?php echo $theThemeString;
if (get_field('blog_author')) echo '<span class="post-author">'.get_field('blog_author').'</span>';
?></div><?php } 



*/

//if (get_field('blog_author')) echo '<div class="metadata author-block"><span class="post-author">'.get_field('blog_author').'</span></div>';

echo '<div class="metadata author-block"><span class="post-author">';
echo $theDate;
if (get_field('blog_author')) echo ' | '.get_field('blog_author');
echo '</span></div>';



//<div class="metadata date-block"><?php echo $theDate ? ></div>
?>
<div class="metadata tax-block">

	
<?php 
	$catArgs = array('cat' => -1);
	$theCatsList = wp_get_post_categories(get_the_ID(), $catArgs);
	// CLEAN UP THE CATEGORIES, REMOVING CATEGORY IDS 1, 15, 18, AND 31, WHICH ARE THE uncategorized AND featured CATEGORIES
	for ($i = 0; $i < count($theCatsList); $i++) {
		$theID = $theCatsList[$i];
		if ($theID == 1 || $theID == 15 || $theID == 18 || $theID == 31) {
			array_splice($theCatsList, $i, 1);
			$i--;
		}
	}

	if ($theCatsList) {
		echo '<div class="meta-tax-holder"><h6 class="meta-tax-head">Categories:</h6><ul class="meta-tax-list">';
		foreach($theCatsList as $aCatID) {
			$cat = get_category($aCatID);
			echo '<li><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a></li>';
		}
		echo '</ul></div>';
	}

	$theThemesList = wp_get_post_terms(get_the_ID(), 'bhpn_theme');
	if ($theThemesList) {
		echo '<div class="meta-tax-holder"><h6 class="meta-tax-head">Themes:</h6><ul class="meta-tax-list">';
		foreach($theThemesList as $aThemeItem) {
			echo '<li><a href="'.get_term_link($aThemeItem).'/">'.$aThemeItem->name.'</a></li>';
		}
		echo '</ul></div>';
	}

	$theTopicsList = wp_get_post_terms(get_the_ID(), 'bhpn_topic');
	if ($theTopicsList) {
		echo '<div class="meta-tax-holder"><h6 class="meta-tax-head">Topics:</h6><ul class="meta-tax-list">';
		foreach($theTopicsList as $aTopicItem) {
			echo '<li><a href="'.get_term_link($aTopicItem).'/">'.$aTopicItem->name.'</a></li>';
		}
		echo '</ul></div>';
	}

	$theTagsList = wp_get_post_tags(get_the_ID());
	if ($theTagsList) {
		echo '<div class="meta-tax-holder"><h6 class="meta-tax-head">Tags:</h6><ul class="meta-tax-list">';
		foreach($theTagsList as $aTagItem) {
			echo '<li><a href="'.get_tag_link($aTagItem->term_id).'">'.$aTagItem->name.'</a></li>';
		}
		echo '</ul></div>';
	}
?>



</div>




