<?php 
/**
 * @Packge     : Education
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'education_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'education' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'education_general_options_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'education' ),
            'panel'    => 'education_options_panel',
            'priority' => 1,
        ),
    ),
    /**
     * Header Section
     */
    array(
        'id'   => 'education_headertop_options_section',
        'args' => array(
            'title'    => esc_html__( 'Header Top', 'education' ),
            'panel'    => 'education_options_panel',
            'priority' => 2,
        ),
    ),
    /**
     * Blog Section
     */
    array(
        'id'   => 'education_blog_options_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'education' ),
            'panel'    => 'education_options_panel',
            'priority' => 3,
        ),
    ),

	/**
	 * Page Section
	 */
	array(
		'id'   => 'education_page_options_section',
		'args' => array(
			'title'    => esc_html__( 'page', 'education' ),
			'panel'    => 'education_options_panel',
			'priority' => 4,
		),
    ),
    
	/**
	 * Event Section
	 */
	array(
		'id'   => 'education_event_options_section',
		'args' => array(
			'title'    => esc_html__( 'Event Single Page', 'education' ),
			'panel'    => 'education_options_panel',
			'priority' => 5,
		),
	),
    
	/**
	 * Course Section
	 */
	array(
		'id'   => 'education_course_options_section',
		'args' => array(
			'title'    => esc_html__( 'Course Single Page', 'education' ),
			'panel'    => 'education_options_panel',
			'priority' => 6,
		),
	),


	/**
     * 404 Page Section
     */
    array(
        'id'   => 'education_fof_options_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'education' ),
            'panel'    => 'education_options_panel',
            'priority' => 7,
        ),
    ),
    /**
     * Footer Section
     */
    array(
        'id'   => 'education_footer_options_section',
        'args' => array(
            'title'    => esc_html__( 'Footer', 'education' ),
            'panel'    => 'education_options_panel',
            'priority' => 8,
        ),
    ),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );
