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
 * General Section Fields
 ***********************************/


// Theme Main Color Picker
Epsilon_Customizer::add_field(
    'education_themecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Main Color.', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_general_options_section',
        'default'     => '#f7631b',
    )
);
// Google map api key field
$url = 'https://developers.google.com/maps/documentation/geocoding/get-api-key';

Epsilon_Customizer::add_field(
    'education_map_apikey',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Google map api key', 'education' ),
        'description'       => sprintf( __( 'Set google map api key. To get api key %s click here %s.', 'education' ), '<a target="_blank" href="'.esc_url( $url  ).'">', '</a>' ),
        'section'           => 'education_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);

// Instagram api key field
$url = 'https://www.instagram.com/developer/authentication/';

Epsilon_Customizer::add_field(
	'education_igaccess_token',
	array(
		'type' => 'text',
		'label' => esc_html__( 'Instagram Access Token', 'education' ),
		'description' => sprintf( __( 'Set instagram access token. To get access token %s click here %s.', 'education' ), '<a target="_blank" href="'.esc_url( $url ).'">', '</a>' ),
		'section' => 'education_general_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '',

	)
);

/***********************************
 * Header Section Fields
 ***********************************/

// Show/Hide Header Top bar
Epsilon_Customizer::add_field(
	'education-header-top-bar-toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Header Top-bar Show/Hide', 'education' ),
		'section'     => 'education_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

// Header top Phone number
Epsilon_Customizer::add_field(
	'education-header-top-phone',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Phone Number', 'education' ),
		'section'     => 'education_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '+953 012 3654 896',
	)
);
// Header top email
Epsilon_Customizer::add_field(
	'education-header-top-email',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Email Address', 'education' ),
		'section'     => 'education_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => 'support@colorlib.com',
	)
);

// Header Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'education_header_navbar_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Background Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_headertop_options_section',
        'default'     => '',
    )
);
// Header Sticky  Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'education_header_navbarsticky_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Sticky Nav Bar Background Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_headertop_options_section',
        'default'     => 'rgba(4,9,30,0.9)',
    )
);
// Header Nav Bar Menu Color Picker
Epsilon_Customizer::add_field(
    'education_header_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header Nav Bar Menu Hover Color Picker
Epsilon_Customizer::add_field(
    'education_header_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Hover Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_headertop_options_section',
        'default'     => '#f7631b',
    )
);
// Header sticky nav bar menu color picker
Epsilon_Customizer::add_field(
    'education_header_sticky_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header sticky nav bar menu hover color picker
Epsilon_Customizer::add_field(
    'education_header_sticky_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Hover Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_headertop_options_section',
        'default'     => '#f7631b',
    )
);
// Page Header Background Color Picker
Epsilon_Customizer::add_field(
    'education_headerbgcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#f7631b',
    )
);
// Page Header text Color Picker
Epsilon_Customizer::add_field(
    'education_headertextcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Text Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);
// Header overlay switch field
Epsilon_Customizer::add_field(
    'education-headeroverlay-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle header overlay', 'education' ),
        'section'     => 'colors',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
// Header overlay color
Epsilon_Customizer::add_field(
    'education_headeroverlaycolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Overlay Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => 'rgba(4,9,30,0.8)',
    )
);

/***********************************
 * Blog Section Fields
 ***********************************/
// Featured Post
Epsilon_Customizer::add_field(
	'education-featured-post-toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Featured post Show/Hide', 'education' ),
		'section'     => 'education_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
Epsilon_Customizer::add_field(
	'education_featured_post',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Featured Post ID', 'education' ),
		'section'     => 'education_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '',
	)
);


// Category show
Epsilon_Customizer::add_field(
	'education-category-show',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Featured Category Show/Hide', 'education' ),
		'section'     => 'education_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
// Category Number
Epsilon_Customizer::add_field(
	'education_cat_number',
	array(
		'type'        => 'epsilon-slider',
		'label'       => esc_html__( 'Featured Category Number', 'education' ),
		'description' => esc_html__( 'Set how many featured categories you want to show in blog page top.', 'education' ),
		'section'     => 'education_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '3',
	)
);

// Post excerpt length field
Epsilon_Customizer::add_field(
    'education_post_excerpt',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Post Excerpt', 'education' ),
        'description' => esc_html__( 'Set post excerpt length.', 'education' ),
        'section'     => 'education_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'education-blog-sidebar-settings',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'education' ),
        'section'  => 'education_blog_options_section',
        'description' => esc_html__( 'Select the option to set blog page sidebar position.', 'education' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 1,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);
if( defined( 'EDUCATION_COMPANION_VERSION' ) ) {
// Header social switch field
Epsilon_Customizer::add_field(
    'education-blog-social-share-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Social Share Show/Hide', 'education' ),
        'section'     => 'education_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

// Header social switch field
Epsilon_Customizer::add_field(
    'education-blog-like-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Like Button Show/Hide', 'education' ),
        'section'     => 'education_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
}



/***********************************
 * Page Section Fields
 ***********************************/

// Blog sidebar layout field
Epsilon_Customizer::add_field(
	'education-page-sidebar-settings',
	array(
		'type'     => 'epsilon-layouts',
		'label'    => esc_html__( 'page Layout', 'education' ),
		'section'  => 'education_page_options_section',
		'description' => esc_html__( 'Select the option to set page sidebar position.', 'education' ),
		'layouts'  => array(
			'1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			'2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg'
		),
		'default'  => array(
			'columnsCount' => 1,
			'columns'      => array(
				1 => array(
					'index' => 1,
				),
				2 => array(
					'index' => 2,
				)
			),
		),
		'min_span' => 4,
		'fixed'    => true
	)
);


/***********************************
 * Event Section Fields
 ***********************************/

Epsilon_Customizer::add_field(
	'event_share_switch',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Social Shareing Show/Hide', 'education' ),
		'section'     => 'education_event_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
Epsilon_Customizer::add_field(
	'event_cta_switch',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Call To Action Show/Hide', 'education' ),
		'section'     => 'education_event_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
Epsilon_Customizer::add_field(
	'event_page_cta_title',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Event Page Call To Action Title', 'education' ),
		'section'     => 'education_event_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => esc_html__('Not Yet Satisfied with our Trend?', 'education')
	)
);
Epsilon_Customizer::add_field(
	'event_page_cta_url',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Event Page Call To Action URL', 'education' ),
		'section'     => 'education_event_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);


/***********************************
 * Course Section Fields
 ***********************************/
Epsilon_Customizer::add_field(
	'popular_course_section_title',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Popular Course Section Title', 'education' ),
		'section'     => 'education_course_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => esc_html__('Popular Courses we offer', 'education')
	)
);
Epsilon_Customizer::add_field(
	'popular_course_section_subtitle',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Popular Course Section Sub-title', 'education' ),
		'section'     => 'education_course_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => esc_html__('There is a moment in the life of any aspiring.', 'education')
	)
);
Epsilon_Customizer::add_field(
	'popular_course_post_number',
	array(
		'type'        => 'number',
		'label'       => esc_html__( 'Popular Course show number', 'education' ),
		'section'     => 'education_course_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => absint('4')
	)
);

Epsilon_Customizer::add_field(
	'course_cta_switch',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Call To Action Show/Hide', 'education' ),
		'section'     => 'education_course_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
Epsilon_Customizer::add_field(
	'course_page_cta_title',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Call To Action Title', 'education' ),
		'section'     => 'education_course_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => esc_html__('Not Yet Satisfied with our Trend?', 'education')
	)
);
Epsilon_Customizer::add_field(
	'course_page_cta_url',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Call To Action URL', 'education' ),
		'section'     => 'education_course_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'education_fof_text_one',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'education' ),
        'section'           => 'education_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Ooops 404 Error !'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'education_fof_text_two',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'education' ),
        'section'           => 'education_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Either something went wrong or the page dosen\'t exist anymore.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'education_fof_textonecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_fof_options_section',
        'default'     => '#404551', 
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'education_fof_texttwocolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_fof_options_section',
        'default'     => '#abadbe',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'education_fof_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_fof_options_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'education-widget-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'education' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'education' ),
        'section'     => 'education_footer_options_section',
        'default'     => false,
    )
);

// Footer copy right text add settings

// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'education' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

Epsilon_Customizer::add_field(
    'education-copyright-text-settings',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'education' ),
        'section'     => 'education_footer_options_section',
        'default'     => wp_kses_post( $copyText ),
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'education_footer_bgimg_settings',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Footer Widget Background Image', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_footer_options_section',
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'education_footer_widget_bgColor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Background Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_footer_options_section',
        'default'     => '#04091e',
    )
);
// Footer widget text color field
Epsilon_Customizer::add_field(
    'education_footer_widget_color_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Text Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_footer_options_section',
        'default'     => '#777777',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'education_footer_widgettitlecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widgets Title Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_footer_options_section',
        'default'     => '#fff',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'education_footer_widget_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget anchor hover Color
Epsilon_Customizer::add_field(
    'education_footer_widget_anchorhovcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Hover Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_footer_options_section',
        'default'     => '#f7631b',
    )
);

// Footer bottom bg Color
Epsilon_Customizer::add_field(
    'education_footer_bottom_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Background Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_footer_options_section',
        'default'     => '#04091e',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'education_footer_bottom_textcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Text Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_footer_options_section',
        'default'     => '#777',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'education_footer_bottom_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_footer_options_section',
        'default'     => '#f7631b',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'education_footer_bottom_anchorhovercolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Hover Color', 'education' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'education_footer_options_section',
        'default'     => '#f7631b',
    )
);
