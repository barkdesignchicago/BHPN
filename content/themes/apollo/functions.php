<?php
/**
 * Apollo theme
 * 
 * @package apollo
 */


/**
 * Required WordPress variable.
 * /
if (!isset($content_width)) {
//	$content_width = 1170;
}


/**
 * Setup theme and register support wp features.
 * /
function apollo_setup() 
{
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * 
	 * copy from underscores theme
	 * /
	load_theme_textdomain('apollo', get_template_directory() . '/languages');
	
	// add theme support post and comment automatic feed links
	add_theme_support('automatic-feed-links');
	
	// enable support for post thumbnail or feature image on posts and pages
	add_theme_support('post-thumbnails');
	
	// add support menu
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'apollo'),
	));
	
	// add post formats support
	add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
	
	// add support custom background
	add_theme_support(
		'custom-background', 
		apply_filters(
			'apollo_custom_background_args', 
			array(
				'default-color' => 'ffffff', 
				'default-image' => ''
			)
		)
	);
}//     /apollo_setup
//add_action('after_setup_theme', 'apollo_setup');


/**
 * Register widget areas
 */
function apollo_init_widgets() {
	register_sidebar(array(
		'name'          => __('Header Filter - Resources', 'apollo'),
		'id'            => 'header-filter-resources',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
    register_sidebar(array(
		'name'          => __('Header Filter - Stories', 'apollo'),
		'id'            => 'header-filter-story',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));

}//     /apollo_init_widgets
add_action('widgets_init', 'apollo_init_widgets');
























function apollo_add_custom_post_resources() {	
	register_post_type('resources', array(
		'labels' => array(
			'name' => _x('Resources', 'post type general name'),
			'singular_name' => _x('Resource', 'post type singular name'),
			'add_new' => _x('Add New', 'Resource'),
			'add_new_item' => __('Add New Resource'),
			'edit_item' => __('Edit Resource'),
			'new_item' => __('New Resource'),
			'all_items' => __('All Resources'),
			'view_item' => __('View Resource'),
			'search_items' => __('Search Resource'),
			'not_found' =>  __('No Resource found'),
			'not_found_in_trash' => __('No Resources found in Trash'), 
			'parent_item_colon' => '',
			'menu_name' => 'Resources'
		),
		'exclude_from_search' => false,
        'menu_icon' => 'dashicons-media-document',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => true,
		'menu_position' => 5,
		'supports' => array( 'title', 'editor', 'author','thumbnail', 'revisions', 'excerpt' ),
        'taxonomies' => array('category','bhpn_theme','bhpn_topic')
    ));
	
    
    $restypes_labels = array(
        'name' => _x( 'Resource Types', 'taxonomy general name' ),
        'singular_name' => _x( 'Resource Type', 'taxonomy singular name' ),
        'search_items' => __( 'Search Resource Types' ),
        'all_items' => __( 'All Resource Types' ),
        'edit_item' => __( 'Edit Resource Type' ),
        'update_item' => __( 'Update Resource Type' ),
        'add_new_item' => __( 'Add New Resource Type' ),
        'new_item_name' => __( 'New Resource Type Name' ),
        'menu_name' => _( 'Resource Types' )
    );
    $restypes_args = array(
        'hierarchical' => true,
        'labels' => $restypes_labels
    );
    register_taxonomy('resource_types', array('resources'), $restypes_args);
}
add_action( 'init', 'apollo_add_custom_post_resources', 0 );




function apollo_add_custom_post_staff() {	
	register_post_type('staff', array(
		'labels' => array(
			'name' => _x('Staff Members', 'post type general name'),
			'singular_name' => _x('Staff Member', 'post type singular name'),
			'add_new' => _x('Add New', 'Staff Member'),
			'add_new_item' => __('Add New Staff Member'),
			'edit_item' => __('Edit Staff Member'),
			'new_item' => __('New Staff Member'),
			'all_items' => __('All Staff Members'),
			'view_item' => __('View Staff Member'),
			'search_items' => __('Search Staff Members'),
			'not_found' =>  __('No Staff Members found'),
			'not_found_in_trash' => __('No Staff Members found in Trash'), 
			'parent_item_colon' => '',
			'menu_name' => 'Staff Members'
		),
		'exclude_from_search' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => true,
		'menu_position' => 6,
        'menu_icon' => 'dashicons-id',
		'supports' => array( 'title', 'editor', 'author','thumbnail', 'revisions' ),
        'taxonomies' => array('post_tag')
    ));
	
}
add_action('init', 'apollo_add_custom_post_staff');




function apollo_add_custom_post_story() {	
	register_post_type('story', array(
		'labels' => array(
			'name' => _x('Stories', 'post type general name'),
			'singular_name' => _x('Story', 'post type singular name'),
			'add_new' => _x('Add New', 'Story'),
			'add_new_item' => __('Add New Story'),
			'edit_item' => __('Edit Story'),
			'new_item' => __('New Story'),
			'all_items' => __('All Stories'),
			'view_item' => __('View Story'),
			'search_items' => __('Search Stories'),
			'not_found' =>  __('No Stories found'),
			'not_found_in_trash' => __('No Stories found in Trash'), 
			'parent_item_colon' => '',
			'menu_name' => 'Stories'
		),
		'exclude_from_search' => false,
        'menu_icon' => 'dashicons-media-document',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => true,
		'menu_position' => 8,
		'supports' => array( 'title', 'editor', 'excerpt', 'author','thumbnail', 'revisions', 'comments' ),
        'taxonomies' => array('post_tag','category','bhpn_theme','bhpn_topic')
    ));
	
}
add_action('init', 'apollo_add_custom_post_story');




function apollo_add_custom_post_testimonial() {	
	register_post_type('testimonial', array(
		'labels' => array(
			'name' => _x('Testimonials', 'post type general name'),
			'singular_name' => _x('Testimonial', 'post type singular name'),
			'add_new' => _x('Add New', 'Testimonial'),
			'add_new_item' => __('Add New Testimonial'),
			'edit_item' => __('Edit Testimonial'),
			'new_item' => __('New Testimonial'),
			'all_items' => __('All Testimonials'),
			'view_item' => __('View Testimonial'),
			'search_items' => __('Search Testimonials'),
			'not_found' =>  __('No Testimonials found'),
			'not_found_in_trash' => __('No Testimonials found in Trash'), 
			'parent_item_colon' => '',
			'menu_name' => 'Testimonials'
		),
		'exclude_from_search' => false,
        'menu_icon' => 'dashicons-id',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => true,
		'menu_position' => 7,
		'supports' => array( 'title', 'editor','thumbnail', 'revisions' ),
        'taxonomies' => array('post_tag')
    ));
	
}
add_action('init', 'apollo_add_custom_post_testimonial');







// ADD THE POST TYPE TO POSTS
function edit_posts_to_include_post_type() {
    register_taxonomy('p_type', 'post', array(
        'hierarchical' => true, 
        'labels' => array('name' => 'Post Type')
    ));
}
add_action('init', 'edit_posts_to_include_post_type');





// ADD THE BLOG TYPE TO POSTS
function edit_posts_to_include_blog_type() {
    register_taxonomy('blog_type', 'post', array(
        'hierarchical' => true, 
        'labels' => array('name' => 'Blog Type')
    ));
}
add_action('init', 'edit_posts_to_include_blog_type');




function add_themes_and_types() {
    $theme_labels = array(
        'name' => _x( 'Themes', 'taxonomy general name' ),
        'singular_name' => _x( 'Theme', 'taxonomy singular name' ),
        'search_items' => __( 'Search Themes' ),
        'all_items' => __( 'All Themes' ),
        'edit_item' => __( 'Edit Theme' ),
        'update_item' => __( 'Update Theme' ),
        'add_new_item' => __( 'Add New Theme' ),
        'new_item_name' => __( 'New Theme Name' ),
        'menu_name' => _( 'Theme' )
    );
    $theme_args = array(
        'hierarchical' => true,
        'labels' => $theme_labels
    );
    register_taxonomy('bhpn_theme', array('post','resources','story'), $theme_args);
    
    
    $topic_labels = array(
        'name' => _x( 'Topics', 'taxonomy general name' ),
        'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
        'search_items' => __( 'Search Topics' ),
        'all_items' => __( 'All Topics' ),
        'edit_item' => __( 'Edit Topic' ),
        'update_item' => __( 'Update Topic' ),
        'add_new_item' => __( 'Add New Topic' ),
        'new_item_name' => __( 'New Topic Name' ),
        'menu_name' => _( 'Topic' )
    );
    $topic_args = array(
        'hierarchical' => true,
        'labels' => $topic_labels
    );
    register_taxonomy('bhpn_topic', array('post','resources','story'), $topic_args);
    
}
add_action('init', 'add_themes_and_types');





function apollo_enqueue_scripts() {  
    
    wp_enqueue_style("bootstrap-min", get_stylesheet_directory_uri() . "/bootstrap-3.2.0-dist/css/bootstrap.min.css");
        
    wp_enqueue_style('style', get_stylesheet_uri());
    
    
    // TYPEKIT - MOVED TO footer.php TO RESOLVE ISSUES
//    wp_enqueue_script( 'theme_typekit', '//use.typekit.net/lop6rjo.js', "", false,true);
    
    // JQUERY, IN THE FOOTER
    wp_enqueue_script( "jquery", get_stylesheet_directory_uri() . "/scripts/jquery-1.11.1.min.js", "", false, true);
    
    // BOOTSTRAP JAVASCRIPT, IN THE FOOTER
    wp_enqueue_script( "bootstrap", get_stylesheet_directory_uri() . "/bootstrap-3.2.0-dist/js/bootstrap.min.js", "", false, true);
    
    // GOOGLE ANALYTICS, PREFERABLY IN THE FOOTER

}
add_action('wp_enqueue_scripts', 'apollo_enqueue_scripts');



function handleshortcode_figure($atts, $content, $tag) {
	// LOOK FOR THE wp-image-### BIT THAT WORDPRESS ADDS TO IMAGE TAGS. THE PART AFTER IT IS THE IMAGE ID
	$picIDPos = strpos($content, 'wp-image-') + 9; // ADDING 9 BECAUSE I WANT THE END OF wp-image- INSTEAD OF THE BEGINNING
	$picID = substr($content, $picIDPos, strpos($content, ' ', $picIDPos) - $picIDPos);// GRAB THE VALUE BETWEEN wp-image- AND THE NEXT SPACE

	if ($picID) {
		$thisPic = get_post($picID);
		$picCaption = $thisPic->post_excerpt;
		if ($picCaption) {

			$imgTagWidthString = '';
			$imgTagWidthStartingPoint = strpos($content, 'width="') + 7;

//			if ($imgTagWidthPos > 0) {
				$imgTagWidthEndingPoint = strpos($content, '"', $imgTagWidthStartingPoint);
				$imgTagWidthString = substr($content, $imgTagWidthStartingPoint, $imgTagWidthEndingPoint - $imgTagWidthStartingPoint);
//			}

			$imgClassToInclude = "";
			if (strpos($content, "alignright") > 0) $imgClassToInclude = "alignright";
			else if (strpos($content, "aligncenter") > 0) $imgClassToInclude = "aligncenter";
			else $imgClassToInclude = "alignleft";


			if ($imgTagWidthString == "") $toReturn = '<figure class="'.$imgClassToInclude.'">';
			else $toReturn = '<figure style="width:'.$imgTagWidthString.'px" class="'.$imgClassToInclude.'">';
			$toReturn .= $content;
			$toReturn .= '<figcaption>'.$picCaption.'</figcaption>';
			$toReturn .= '</figure>';

			return $toReturn;
		} else return $content;
	} else {
		return $content;
	}
}
add_shortcode('figure', 'handleshortcode_figure');


add_filter('the_content', 'do_shortcode');

// Make uploaded images SCALE responsive
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

//add class to image
function add_image_class($class){
	$class .= ' img-responsive';
	return $class;
}
add_filter('get_image_tag_class','add_image_class');





?>