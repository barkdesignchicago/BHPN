<?php

/**
 * add_bootstraptabs_button
 * 
 * @package WP Bootstrap Tabs
 * @title TinyMCE V3 Button Integration (for WP2.5 and higher)
 * @author Virtus Designs
 * @access public
 */
class add_bootstraptabs_button {
	
	var $pluginname = 'BOOTSTRAPTABS';
	var $path = '';
	var $internalVersion = 100;
	
	/**
	 * add_bootstraptabs_button::add_bootstraptabs_button()
	 * the constructor
	 * 
	 * @return void
	 */
	function add_bootstraptabs_button()  {
		
		// Set path to editor_plugin.js
		$this->path = bootstraptabs_url( $path = 'tinymce/' ) ;		
		
		// Modify the version when tinyMCE plugins are changed.
		add_filter('tiny_mce_version', array (&$this, 'change_tinymce_version') );

		// init process for button control
		add_action('init', array (&$this, 'addbuttons') );
	}

	/**
	 * add_bootstraptabs_button::addbuttons()
	 * 
	 * @return void
	 */
	function addbuttons() {
	
		// Don't bother doing this stuff if the current user lacks permissions
		if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) 
			return;

		// Add only in Rich Editor mode
		if ( get_user_option('rich_editing') == 'true') {
		 
			// add the button for wp2.5 in a new way
			add_filter("mce_external_plugins", array (&$this, 'add_tinymce_plugin' ), 5);
			add_filter('mce_buttons', array (&$this, 'register_button' ), 5);
		}
	}
	
	/**
	 * add_bootstraptabs_button::register_button()
	 * used to insert button in wordpress 2.5x editor
	 * 
	 * @return $buttons
	 */
	function register_button($buttons) {
	
		array_push($buttons, 'separator', $this->pluginname );
	
		return $buttons;
	}
	
	/**
	 * add_bootstraptabs_button::add_tinymce_plugin()
	 * Load the TinyMCE plugin : editor_plugin.js
	 * 
	 * @return $plugin_array
	 */
	function add_tinymce_plugin($plugin_array) {    
	
		$plugin_array[$this->pluginname] =  $this->path . 'tinymce.js';
		
		return $plugin_array;
	}
	
	/**
	 * add_bootstraptabs_button::change_tinymce_version()
	 * A different version will rebuild the cache
	 * 
	 * @return $versio
	 */
	function change_tinymce_version($version) {
			$version = $version + $this->internalVersion;
		return $version;
	}
	
}

// Call it now
$tinymce_button = new add_bootstraptabs_button ();
?>