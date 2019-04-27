<?php
/**
 * blog_design_lite_Recommendation Class
 * 
 * Handles the recommended plugin functionality.
 * 
 * @package Blog Design Lite
 * @since 1.0
 */

// Plugin recomendation class
require_once( BLOG_DESIGN_LITE_DIR . '/includes/plugins/class-tgm-plugin-activation.php' );

class blog_design_lite_Recommendation {

	function __construct() {
		
		// Action to add recomended plugins
		add_action( 'tgmpa_register', array($this, 'blog_design_lite_recommend_plugin') );
	}

	/**
	 * Recommend Plugins
	 * 
	 * @package Blog Design Lite
	 * @since 1.0
	 */
	function blog_design_lite_recommend_plugin() {
	    $plugins = array(	       
	        array(
	            'name'               => __('Instagram Slider and Carousel Plus Widget', 'blog-design-lite'),
	            'slug'               => 'slider-and-carousel-plus-widget-for-instagram',
	            'required'           => false,
	        )
	    );
	    tgmpa( $plugins);
	}
}

$blog_design_lite_recommendation = new blog_design_lite_Recommendation();