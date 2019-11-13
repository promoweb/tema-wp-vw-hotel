<?php
/**
 * VW Hotel Theme Customizer
 *
 * @package VW Hotel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_hotel_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_hotel_custom_controls' );

function vw_hotel_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_hotel_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-hotel' ),
	    'description' => __( 'Description of what this panel does.', 'vw-hotel' ),
	) );

	$wp_customize->add_section( 'vw_hotel_left_right', array(
    	'title'      => __( 'General Settings', 'vw-hotel' ),
		'priority'   => 30,
		'panel' => 'vw_hotel_panel_id'
	) );

	$wp_customize->add_setting('vw_hotel_width_option',array(
        'default' => __('Full Width','vw-hotel'),
        'sanitize_callback' => 'vw_hotel_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Hotel_Image_Radio_Control($wp_customize, 'vw_hotel_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-hotel'),
        'description' => __('Here you can change the width layout of Website.','vw-hotel'),
        'section' => 'vw_hotel_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_hotel_theme_options',array(
        'default' => __('Right Sidebar','vw-hotel'),
        'sanitize_callback' => 'vw_hotel_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_hotel_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-hotel'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-hotel'),
        'section' => 'vw_hotel_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-hotel'),
            'Right Sidebar' => __('Right Sidebar','vw-hotel'),
            'One Column' => __('One Column','vw-hotel'),
            'Three Columns' => __('Three Columns','vw-hotel'),
            'Four Columns' => __('Four Columns','vw-hotel'),
            'Grid Layout' => __('Grid Layout','vw-hotel')
        ),
	));

	$wp_customize->add_setting('vw_hotel_page_layout',array(
        'default' => __('One Column','vw-hotel'),
        'sanitize_callback' => 'vw_hotel_sanitize_choices'
	));
	$wp_customize->add_control('vw_hotel_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-hotel'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-hotel'),
        'section' => 'vw_hotel_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-hotel'),
            'Right Sidebar' => __('Right Sidebar','vw-hotel'),
            'One Column' => __('One Column','vw-hotel')
        ),
	) );

	$wp_customize->add_setting( 'vw_hotel_search_hide_show', array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hotel_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Hotel_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hotel_search_hide_show',
       array(
		'label' => esc_html__( 'Show / Hide Search','vw-hotel' ),
		'section' => 'vw_hotel_left_right'
    )));

	//Sticky Header
	$wp_customize->add_setting( 'vw_hotel_sticky_header',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_hotel_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Hotel_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hotel_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-hotel' ),
        'section' => 'vw_hotel_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_hotel_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_hotel_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Hotel_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hotel_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-hotel' ),
        'section' => 'vw_hotel_left_right'
    )));

	$wp_customize->add_setting('vw_hotel_loader_icon',array(
        'default' => __('Two Way','vw-hotel'),
        'sanitize_callback' => 'vw_hotel_sanitize_choices'
	));
	$wp_customize->add_control('vw_hotel_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-hotel'),
        'section' => 'vw_hotel_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-hotel'),
            'Dots' => __('Dots','vw-hotel'),
            'Rotate' => __('Rotate','vw-hotel')
        ),
	) );    
    
	//Slider
	$wp_customize->add_section( 'vw_hotel_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-hotel' ),
		'priority'   => null,
		'panel' => 'vw_hotel_panel_id'
	) );

	$wp_customize->add_setting( 'vw_hotel_slider_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_hotel_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Hotel_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hotel_slider_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Slider','vw-hotel' ),
          'section' => 'vw_hotel_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_hotel_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_hotel_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_hotel_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-hotel' ),
			'description' => __('Slider image size (1500 x 665)','vw-hotel'),
			'section'  => 'vw_hotel_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('vw_hotel_slider_content_option',array(
        'default' => __('Center','vw-hotel'),
        'sanitize_callback' => 'vw_hotel_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Hotel_Image_Radio_Control($wp_customize, 'vw_hotel_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-hotel'),
        'section' => 'vw_hotel_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_hotel_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_hotel_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-hotel' ),
		'section'     => 'vw_hotel_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_hotel_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_hotel_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_hotel_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_hotel_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-hotel' ),
	'section'     => 'vw_hotel_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_hotel_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-hotel'),
      '0.1' =>  esc_attr('0.1','vw-hotel'),
      '0.2' =>  esc_attr('0.2','vw-hotel'),
      '0.3' =>  esc_attr('0.3','vw-hotel'),
      '0.4' =>  esc_attr('0.4','vw-hotel'),
      '0.5' =>  esc_attr('0.5','vw-hotel'),
      '0.6' =>  esc_attr('0.6','vw-hotel'),
      '0.7' =>  esc_attr('0.7','vw-hotel'),
      '0.8' =>  esc_attr('0.8','vw-hotel'),
      '0.9' =>  esc_attr('0.9','vw-hotel')
	),
	));

	// About
	$wp_customize->add_section('vw_hotel_aboutus_section',array(
		'title'	=> __('About Section','vw-hotel'),
		'description'	=> __('Add About sections below.','vw-hotel'),
		'panel' => 'vw_hotel_panel_id',
	));

	$wp_customize->add_setting('vw_hotel_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_hotel_section_title',array(
		'label'	=> __('Section Title','vw-hotel'),
		'section'=> 'vw_hotel_aboutus_section',
		'setting'=> 'vw_hotel_section_title',
		'type'=> 'text'
	));

	for ( $count = 1; $count <= 1; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_hotel_about_section' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_hotel_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_hotel_about_section' . $count, array(
			'label'    => __( 'Select Page', 'vw-hotel' ),
			'section'  => 'vw_hotel_aboutus_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst[]='Select'; 
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}
	$wp_customize->add_setting('vw_hotel_offer_image',array(
		'sanitize_callback' => 'vw_hotel_sanitize_choices',
	));
	$wp_customize->add_control('vw_hotel_offer_image',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','vw-hotel'),		
		'description' => __('Image size (350 x 400)','vw-hotel'),
		'section' => 'vw_hotel_aboutus_section',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_hotel_service_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_hotel_sanitize_choices',
	));
	$wp_customize->add_control('vw_hotel_service_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Services','vw-hotel'),
		'description' => __('Image size (60 x 60)','vw-hotel'),
		'section' => 'vw_hotel_aboutus_section',
	));

	//About excerpt
	$wp_customize->add_setting( 'vw_hotel_about_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_hotel_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','vw-hotel' ),
		'section'     => 'vw_hotel_aboutus_section',
		'type'        => 'range',
		'settings'    => 'vw_hotel_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_section('vw_hotel_blog_post',array(
		'title'	=> __('Blog Post Settings','vw-hotel'),
		'panel' => 'vw_hotel_panel_id',
	));	

	$wp_customize->add_setting( 'vw_hotel_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_hotel_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Hotel_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hotel_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-hotel' ),
        'section' => 'vw_hotel_blog_post'
    )));

    $wp_customize->add_setting( 'vw_hotel_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hotel_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Hotel_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hotel_toggle_author',array(
		'label' => esc_html__( 'Author','vw-hotel' ),
		'section' => 'vw_hotel_blog_post'
    )));

    $wp_customize->add_setting( 'vw_hotel_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hotel_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Hotel_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hotel_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-hotel' ),
		'section' => 'vw_hotel_blog_post'
    )));

    $wp_customize->add_setting( 'vw_hotel_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_hotel_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-hotel' ),
		'section'     => 'vw_hotel_blog_post',
		'type'        => 'range',
		'settings'    => 'vw_hotel_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_hotel_blog_layout_option',array(
        'default' => __('Default','vw-hotel'),
        'sanitize_callback' => 'vw_hotel_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Hotel_Image_Radio_Control($wp_customize, 'vw_hotel_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-hotel'),
        'section' => 'vw_hotel_blog_post',
        'choices' => array(
            'Default' => get_template_directory_uri().'/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/images/blog-layout3.png',
    ))));

	//Content Creation
	$wp_customize->add_section( 'vw_hotel_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'vw-hotel' ),
		'priority' => null,
		'panel' => 'vw_hotel_panel_id'
	) );

	$wp_customize->add_setting('vw_hotel_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Hotel_Content_Creation( $wp_customize, 'vw_hotel_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-hotel' ),
		),
		'section' => 'vw_hotel_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-hotel' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_hotel_footer',array(
		'title'	=> __('Footer','vw-hotel'),
		'description'=> __('This section will appear in the footer','vw-hotel'),
		'panel' => 'vw_hotel_panel_id',
	));	
	
	$wp_customize->add_setting('vw_hotel_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_hotel_footer_text',array(
		'label'	=> __('Copyright Text','vw-hotel'),
		'section'=> 'vw_hotel_footer',
		'setting'=> 'vw_hotel_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'vw_hotel_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_hotel_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Hotel_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hotel_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-hotel' ),
      	'section' => 'vw_hotel_footer'
    )));

	$wp_customize->add_setting('vw_hotel_scroll_top_alignment',array(
        'default' => __('Right','vw-hotel'),
        'sanitize_callback' => 'vw_hotel_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Hotel_Image_Radio_Control($wp_customize, 'vw_hotel_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-hotel'),
        'section' => 'vw_hotel_footer',
        'settings' => 'vw_hotel_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/layout1.png',
            'Center' => get_template_directory_uri().'/images/layout2.png',
            'Right' => get_template_directory_uri().'/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'vw_hotel_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Hotel_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Hotel_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Hotel_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Hotel Pro Theme', 'vw-hotel' ),
			'pro_text' => esc_html__( 'Upgrade Pro', 'vw-hotel' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-hotel-theme/'),
		)));

		$manager->add_section(new VW_Hotel_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-hotel' ),
			'pro_text' => esc_html__( 'Docs', 'vw-hotel' ),
			'pro_url'  => admin_url('themes.php?page=vw_hotel_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-hotel-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-hotel-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Hotel_Customize::get_instance();