<?php
/**
 * Theme customizer File
 *
 * @package Blog Design Lite
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register theme settings through customizer
 *
 * @package Blog Design Lite
 * @since 1.0
 */
function blog_design_lite_register_customizer_settings( $wp_customize ) {
	
	$default_settings = blog_design_lite_default_settings();	

	/***** Latest Post Settings *****/
	$wp_customize->add_section( 'wpostheme_general_lastestpost_section', array(
		'title' => __( 'Latest Post Slider Settings', 'blog-design-lite' ),
	));	

	// Disable Latest Post Slider
	$wp_customize->add_setting( 'dispable_slider', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['dispable_slider'],
									));

	$wp_customize->add_control( 'dispable_slider', array(
										'label'    		  => __( 'Disable Latest Post slider from Header', 'blog-design-lite' ),
										'section' 		  => 'wpostheme_general_lastestpost_section',
										'type'            => 'checkbox',
									));

	// number_of_lastestpost
	$wp_customize->add_setting( 'number_of_lastestpost', array(
										'sanitize_callback' => 'absint',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['number_of_lastestpost'],
									));

	$wp_customize->add_control( 'number_of_lastestpost', array(
										'label'    => __( 'No of posts to display', 'blog-design-lite' ),
										'section'  => 'wpostheme_general_lastestpost_section',
										'type'     => 'number'
									));
	// Setting - drop down category for slider.
	$wp_customize->add_setting( 'select_category_for_slider', array(
										'sanitize_callback' => 'sanitize_text_field',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['select_category_for_slider'],
									));

	$wp_customize->add_control( 'select_category_for_slider', array(
										'label'           => esc_html__('Category for slider', 'blog-design-lite'),
										'description'     => esc_html__('Add category ID with comma sepraeted ie 2,3,8 etc ', 'blog-design-lite'),
										'section'  		  => 'wpostheme_general_lastestpost_section',
										'type'     		  => 'text'
									));	
	
	/***** Website Color Seeings *****/

	$wp_customize->add_panel( 'website_colors_panel', array(
	        'title' => __( 'Website Colors', 'blog-design-lite' ),
	));

	$wp_customize->add_section( 'nav_section' , array(
			'title' =>  __('Navigation Color', 'blog-design-lite'),
			'panel' => 'website_colors_panel',			
	));

	$wp_customize->add_section( 'heading_section' , array(
			'title' =>  __('Heading Color', 'blog-design-lite'),
			'panel' => 'website_colors_panel',			
	));

	$wp_customize->add_section( 'link_section' , array(
			'title' =>  __('Link Color', 'blog-design-lite'),
			'panel' => 'website_colors_panel',			
	));

	// Navigation background color
	$txtcolors[] = array(
		'slug'			=>'menu_bar_bg_clr',
		'default' 		=> $default_settings['menu_bar_bg_clr'],
		'label' 		=> __('Navigation Bar - Background Color', 'blog-design-lite'),
		'section'   	=> 'nav_section',
		'section_title' => __('Navigation Color', 'blog-design-lite'),
	);
	
	// Navigation link color
	$txtcolors[] = array(
		'slug' 			=> 'menu_bar_link_clr',
		'default' 		=> $default_settings['menu_bar_link_clr'],
		'label' 		=> __('Navigation Bar - Link Color', 'blog-design-lite'),
		'section'   	=> 'nav_section',
		'section_title' => __('Navigation Color', 'blog-design-lite'),
	);
	
	// Navigation link hover color
	$txtcolors[] = array(

		'slug' 			=>'menu_bar_linkh_clr', 
		'default' 		=> $default_settings['menu_bar_linkh_clr'],
		'label' 		=> __('Navigation Bar - Link Hover Color', 'blog-design-lite'),
		'section'   	=> 'nav_section',
		'section_title' => __('Navigation Color', 'blog-design-lite'),

	);
	
	// Site heading color
	$txtcolors[] = array(
		'slug' 			=> 'h1_clr',
		'default' 		=> $default_settings['h1_clr'],
		'label' 		=> __('H1 Color', 'blog-design-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'blog-design-lite'),

	);

	// H2 color
	$txtcolors[] = array(
		'slug' 			=> 'h2_clr',
		'default' 		=> $default_settings['h2_clr'],
		'label' 		=> __('H2 Color', 'blog-design-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'blog-design-lite'),

	);

	// H3 color
	$txtcolors[] = array(
		'slug' 			=> 'h3_clr',
		'default' 		=> $default_settings['h3_clr'],
		'label' 		=> __('H3 Color', 'blog-design-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'blog-design-lite'),

	);

	// H4 color
	$txtcolors[] = array(
		'slug' 			=> 'h4_clr',
		'default' 		=> $default_settings['h4_clr'],
		'label' 		=> __('H4 Color', 'blog-design-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'blog-design-lite'),

	);

	// H5 color
	$txtcolors[] = array(
		'slug' 			=> 'h5_clr',
		'default' 		=> $default_settings['h5_clr'],
		'label' 		=> __('H5 Color', 'blog-design-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'blog-design-lite'),

	);

	// H6 color
	$txtcolors[] = array(
		'slug' 			=> 'h6_clr',
		'default' 		=> $default_settings['h6_clr'],
		'label' 		=> __('H6 Color', 'blog-design-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'blog-design-lite'),

	);

	// Site link color
	$txtcolors[] = array(
		'slug' 			=> 'link_clr', 
		'default' 		=> $default_settings['link_clr'],
		'label' 		=> __('Link Color', 'blog-design-lite'),
		'section'   	=> 'link_section',
		'section_title' => __('Link Color', 'blog-design-lite'),
	);

	// Site link hover color
	$txtcolors[] = array(
		'slug' 		=> 'hover_link_clr', 
		'default' 	=> $default_settings['hover_link_clr'],
		'label' 	=> __('Link Hover Color', 'blog-design-lite'),
		'section'   	=> 'link_section',
		'section_title' => __('Link Color', 'blog-design-lite'),
	);

	// Read continue.
	$txtcolors[] = array(
		'slug' 			=>'continue_read_clr', 
		'default' 		=> $default_settings['continue_read_clr'],
		'label' 		=> __('Continue Reading Button Color', 'blog-design-lite'),
		'section'   	=> 'link_section',
		'section_title' => __('Link Color', 'blog-design-lite'),
	);

	$txtcolors[] = array(
		'slug' 			=> 'continue_read_hvr_clr', 
		'default' 		=> $default_settings['continue_read_hvr_clr'],
		'label' 		=> __('Continue Reading Button hover Color', 'blog-design-lite'),
		'section'   	=> 'link_section',
		'section_title' => __('Link Color', 'blog-design-lite'),
	);

	// Website color settings
	foreach( $txtcolors as $txtcolor ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$txtcolor['slug'], array(
				'default' 				=> $txtcolor['default'],
				'sanitize_callback'     => 'sanitize_hex_color',
				'capability' 			=> 'edit_theme_options'
		));

		// CONTROLS
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $txtcolor['slug'],
				array(
					'label' 	=> $txtcolor['label'], 
					'section' 	=> $txtcolor['section'],
					'settings' 	=> $txtcolor['slug']
				))
		);
	} // End of foreach

	// Header Search Start
	$wp_customize->add_section( 'wpostheme_general_header_search_section', array(
		'title' => __( 'Header Search', 'blog-design-lite' ),
	));	

	// Search Icons on Header
	$wp_customize->add_setting( 'show_search', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['show_search'],
									));

	$wp_customize->add_control( 'show_search', array(
										'label'    		  => __( 'Enable Search Icon on Header', 'blog-design-lite' ),
										'section' 		  => 'wpostheme_general_header_search_section',
										'type'                    => 'checkbox',
									));
	// Header Search End

	/* Post Settings panel*/
    $wp_customize->add_panel('post_panel', array(
	        'title' => __( 'Post Settings', 'blog-design-lite' ),

	));     
    
	/* Blog Page Settings */
	$wp_customize->add_section( 'blog-sett' , array(
		'title' =>  __( 'Blog Page', 'blog-design-lite' ),
		'panel' => 'post_panel',
	));
	
 	// Add blog layout grid settings
	$wp_customize->add_setting( 'blog_layout_grid', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_select',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_layout_grid'],
							));
	
	$wp_customize->add_control( 'blog_layout_grid', array(		
		'label'    	=> __( 'Blog Grid', 'blog-design-lite' ),
		'section'    => 'blog-sett',
		'settings'   => 'blog_layout_grid',
		'type'       => 'select',
		'choices'    => array(
							'12' => __('Grid 1', 'blog-design-lite'),
							'6'  => __('Grid 2', 'blog-design-lite'),
							'4'  => __('Grid 3', 'blog-design-lite'),
							'3'  => __('Grid 4', 'blog-design-lite'),
						),
		'description'	=> __('Choose blog grid.', 'blog-design-lite')
	));
	
	// Add blog layout  excerpt length
	$wp_customize->add_setting( 'blog_excerpt_length', array(
									'sanitize_callback' => 'absint',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_excerpt_length'],
							));

	$wp_customize->add_control( 'blog_excerpt_length', array(		
		'label'    	=> __( 'Excerpt Length', 'blog-design-lite' ),
		'section'    => 'blog-sett',
		'settings'   => 'blog_excerpt_length',
		'type'       => 'number',		
		'description'	=> __('Enter excerpt length eg 40', 'blog-design-lite')
	));
	
	
	// Show/hide Content
	$wp_customize->add_setting( 'blog_show_content', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_content'],
							));

	$wp_customize->add_control( 'blog_show_content', array(
		'label'    		=> __( 'Show Post Content', 'blog-design-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_content',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post content.', 'blog-design-lite')
	));

	// Show/hide date
	$wp_customize->add_setting( 'blog_show_date', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_date'],
							));

	$wp_customize->add_control( 'blog_show_date', array(
		'label'    		=> __( 'Show Post Date', 'blog-design-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_date',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post date.', 'blog-design-lite')
	));

	// Show/hide author
	$wp_customize->add_setting( 'blog_show_author', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_author'],
							));

	$wp_customize->add_control( 'blog_show_author', array(		
		'label'    		=> __( 'Show Post Author', 'blog-design-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_author',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post author.', 'blog-design-lite')
	));
	
	// Show/hide Category
	$wp_customize->add_setting( 'blog_show_cat', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_cat'],
							));

	$wp_customize->add_control( 'blog_show_cat', array(
		'label'    	=> __( 'Show Post Category', 'blog-design-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_cat',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post category.', 'blog-design-lite')
	));
	
	// Show/hide Tags
	$wp_customize->add_setting( 'blog_show_tags', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_tags'],
							));

	$wp_customize->add_control( 'blog_show_tags', array(		
		'label'    		=> __( 'Show Post Tags', 'blog-design-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_tags',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post tags.', 'blog-design-lite')
	));
	
	// Show/hide Comments
	$wp_customize->add_setting( 'blog_show_comment', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_comment'],
							));

	$wp_customize->add_control( 'blog_show_comment', array(		
		'label'    		=> __( 'Show Post Comment', 'blog-design-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_comment',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post comment.', 'blog-design-lite')
	));


	// Show/hide read more button
	$wp_customize->add_setting( 'blog_show_readmore', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_readmore'],
							));

	$wp_customize->add_control( 'blog_show_readmore', array(		
		'label'    		=> __( 'Show Continue Reading Button', 'blog-design-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_readmore',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show Continue Reading Button.', 'blog-design-lite')
	));


	/***** Category Page Settings *****/
	$wp_customize->add_section( 'cat-sett' , array(
		'title' =>  __( 'Category Page', 'blog-design-lite' ),
		'panel' => 'post_panel',
	));	

	// Add blog layout grid settings
	$wp_customize->add_setting( 'cat_layout_grid', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_select',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_layout_grid'],
							));
	
	$wp_customize->add_control( 'cat_layout_grid', array(		
		'label'    	=> __( 'Cat Grid', 'blog-design-lite' ),
		'section'    => 'cat-sett',
		'settings'   => 'cat_layout_grid',
		'type'       => 'select',
		'choices'    => array(
							'12' => __('Grid 1', 'blog-design-lite'),
							'6'  => __('Grid 2', 'blog-design-lite'),
							'4'  => __('Grid 3', 'blog-design-lite'),
							'3'  => __('Grid 4', 'blog-design-lite'),
						),
		'description'	=> __('Choose blog grid.', 'blog-design-lite')
	));

	// Add Category layout  excerpt length
	$wp_customize->add_setting( 'cat_excerpt_length', array(
									'sanitize_callback' => 'absint',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_excerpt_length'],
							));

	$wp_customize->add_control( 'cat_excerpt_length', array(		
		'label'    	=> __( 'Excerpt Length', 'blog-design-lite' ),
		'section'    => 'cat-sett',
		'settings'   => 'cat_excerpt_length',
		'type'       => 'number',		
		'description'	=> __('Enter excerpt length eg 40', 'blog-design-lite')
	));	

	// Show/hide content
	$wp_customize->add_setting( 'cat_show_content', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_content'],
							));

	$wp_customize->add_control( 'cat_show_content', array(		
		'label'    		=> __( 'Show Post Content', 'blog-design-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_content',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post content.', 'blog-design-lite')
	));

	// Show/hide date
	$wp_customize->add_setting( 'cat_show_date', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_date'],
							));

	$wp_customize->add_control( 'cat_show_date', array(		
		'label'    		=> __( 'Show Post Date', 'blog-design-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_date',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post date.', 'blog-design-lite')
	));

	// Show/hide author
	$wp_customize->add_setting( 'cat_show_author', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_author'],
							));

	$wp_customize->add_control( 'cat_show_author', array(		
		'label'    		=> __( 'Show Post Author', 'blog-design-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_author',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post author.', 'blog-design-lite')
	));

	// Show/hide Category
	$wp_customize->add_setting( 'cat_show_cat', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_cat'],
							));

	$wp_customize->add_control( 'cat_show_cat', array(		
		'label'    		=> __( 'Show Post Category', 'blog-design-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_cat',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post category.', 'blog-design-lite')
	));
	
	// Show/hide Tags
	$wp_customize->add_setting( 'cat_show_tags', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_tags'],
							));

	$wp_customize->add_control( 'cat_show_tags', array(		
		'label'    		=> __( 'Show Post Tags', 'blog-design-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_tags',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post tags.', 'blog-design-lite')
	));
	
	// Show/hide Comments
	$wp_customize->add_setting( 'cat_show_comment', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_comment'],
							));

	$wp_customize->add_control( 'cat_show_comment', array(		
		'label'    		=> __( 'Show Post Comment', 'blog-design-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_comment',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post comment.', 'blog-design-lite')
	));


	
	// Show/hide read more button
	$wp_customize->add_setting( 'cat_show_readmore', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_readmore'],
							));

	$wp_customize->add_control( 'cat_show_readmore', array(		
		'label'    		=> __( 'Show Continue Reading Button', 'blog-design-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_readmore',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show Continue Reading Button.', 'blog-design-lite')
	));

	
	/***** Single Post Settings *****/
	$wp_customize->add_section( 'single-post-sett' , array(
		'title' =>  __( 'Single Post', 'blog-design-lite' ),
		'panel' => 'post_panel',
	));
	

	// Add blog template settings
	$wp_customize->add_setting( 'single_post_fet_img', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['single_post_fet_img'],
							));

	$wp_customize->add_control( 'single_post_fet_img', array(		
		'label'    		=> __( 'Show Featured Image.', 'blog-design-lite' ),
		'section'    	=> 'single-post-sett',
		'settings'  	=> 'single_post_fet_img',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show featured image from single post.', 'blog-design-lite')
	));


	// related
	$wp_customize->add_setting( 'related_post_show', array(
									'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['related_post_show'],
							));

	$wp_customize->add_control( 'related_post_show', array(		
		'label'    		=> __( 'Related Post.', 'blog-design-lite' ),
		'section'    	=> 'single-post-sett',
		'settings'  	=> 'related_post_show',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show Related post.', 'blog-design-lite')
	));


	$wp_customize->add_setting( 'related_post_title', array(
									'sanitize_callback' => 'sanitize_text_field',
									'transport'         => 'refresh',
									'default'           => $default_settings['related_post_title'],
							   ));

	$wp_customize->add_control( 'related_post_title', array(		
		'label'    		=> __( 'Related Post Title.', 'blog-design-lite' ),
		'section'    	=> 'single-post-sett',
		'settings'  	=> 'related_post_title',
		'type'       	=> 'text',
		'description' 	=> __('Enter related post title.', 'blog-design-lite')
	));

	
	
	/***** Social Icons Settings *****/
	$wp_customize->add_section( 'wpostheme_general_socials_section', array(
		'title' => __( 'Social Profile', 'blog-design-lite' ),
	));	

	// Socials Icons on Header
	$wp_customize->add_setting( 'header_social', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['header_social'],
									));

	$wp_customize->add_control( 'header_social', array(
										'label'    		  => __( 'Enable Socials Icons on Header', 'blog-design-lite' ),
										'section' 		  => 'wpostheme_general_socials_section',
										'type'                    => 'checkbox',
									));

	// Socials Icons on Footer
	$wp_customize->add_setting( 'footer_social', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_checkbox',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['footer_social'],
									));

	$wp_customize->add_control( 'footer_social', array(
										'label'    		  => __( 'Enable Socials Icons on Footer', 'blog-design-lite' ),
										'section' 		  => 'wpostheme_general_socials_section',
										'type'                    => 'checkbox',
									));

	// Facebook
	$wp_customize->add_setting( 'facebook', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['facebook'],
									));

	$wp_customize->add_control( 'facebook', array(
										'label'    => __( 'Facebook', 'blog-design-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Twitter
	$wp_customize->add_setting( 'twitter', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['twitter'],
									));

	$wp_customize->add_control( 'twitter', array(
										'label'    => __( 'Twitter', 'blog-design-lite' ),
										'section'  => 'wpostheme_general_socials_section',			
									));

	// Linkedin
	$wp_customize->add_setting( 'linkedin', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['linkedin'],
									));

	$wp_customize->add_control( 'linkedin', array(
										'label'    => __( 'Linkedin', 'blog-design-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Instagram
	$wp_customize->add_setting( 'instagram', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['instagram'],
									));

	$wp_customize->add_control( 'instagram', array(
										'label'    => __( 'Instagram', 'blog-design-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// YouTube
	$wp_customize->add_setting( 'youtube', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['youtube'],
									));

	$wp_customize->add_control( 'youtube', array(
										'label'    => __( 'YouTube', 'blog-design-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Behance
	$wp_customize->add_setting( 'behance', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['behance'],
									));

	$wp_customize->add_control( 'behance', array(
										'label'    => __( 'Behance', 'blog-design-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Dribbble
	$wp_customize->add_setting( 'dribbble', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['dribbble'],
									));

	$wp_customize->add_control( 'dribbble', array(
										'label'    => __( 'Dribbble', 'blog-design-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Pinterest
	$wp_customize->add_setting( 'pinterest', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['pinterest'],
									));

	$wp_customize->add_control( 'pinterest', array(
										'label'    => __( 'Pinterest', 'blog-design-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));
	





	/***** Footer Settings *****/
	$wp_customize->add_section( 'wpostheme_general_footer_section', array(
		'title' => __( 'Footer Content', 'blog-design-lite' ),			
	));

	// Footer Copyright
	$wp_customize->add_setting( 'copyright', array(
										'sanitize_callback' => 'blog_design_lite_sanitize_clean',
										'default'           => $default_settings['copyright'],
										'transport'         => 'refresh',	
									));

	$wp_customize->add_control( 'copyright', array(
										'label'    => __( 'Footer Copyright', 'blog-design-lite' ),
										'description'	=> __('If you want to add the copyrights please use the following text - &copy {year} YOUR BRAND NAME', 'blog-design-lite'),
										'section'  => 'wpostheme_general_footer_section',
									));	
										
	
	
	
}
add_action( 'customize_register', 'blog_design_lite_register_customizer_settings' );
