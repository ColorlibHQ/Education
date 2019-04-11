<?php 
/**
 * @Packge 	   : Education
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 *
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'education_preloader', 'education_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'education_header', 'education_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'education_footer', 'education_footer_area', 10 );
add_action( 'education_footer', 'education_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'education_wrp_start', 'education_wrp_start_cb', 10 );
add_action( 'education_wrp_end', 'education_wrp_end_cb', 10 );

/**
 * Hook for Page wrapper.
 */
add_action( 'education_page_wrp_start', 'education_page_wrp_start_cb', 10 );
add_action( 'education_page_wrp_end', 'education_page_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'education_blog_col_start', 'education_blog_col_start_cb', 10 );
add_action( 'education_blog_col_end', 'education_blog_col_end_cb', 10 );

/**
 * Hook for Page column.
 */
add_action( 'education_page_col_start', 'education_page_col_start_cb', 10 );
add_action( 'education_page_col_end', 'education_page_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'education_blog_posts_thumb', 'education_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'education_blog_posts_title', 'education_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'education_blog_posts_meta', 'education_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'education_blog_posts_bottom_meta', 'education_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'education_blog_posts_excerpt', 'education_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'education_blog_posts_content', 'education_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'education_blog_sidebar', 'education_blog_sidebar_cb', 10 );

/**
 * Hook for page sidebar.
 */
add_action( 'education_page_sidebar', 'education_page_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'education_blog_posts_share', 'education_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'education_blog_single_meta', 'education_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'education_blog_single_footer_nav', 'education_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'education_page_content', 'education_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'education_fof', 'education_fof_cb', 10 );
