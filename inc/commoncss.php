<?php
/**
 * @Packge     : Animalshelter
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// enqueue css
function education_common_custom_css() {

	wp_enqueue_style( 'education-common', get_template_directory_uri().'/assets/css/common.css' );

	$headerBg          =  ! empty( get_header_image() ) ? 'url(' . esc_url( get_header_image() ) . ')' : '';
	$headerTextColor   = esc_attr( education_opt( 'education_headertextcolor', '#fff' ) );
	$headerbgcolor     = esc_attr( education_opt( 'education_headerbgcolor' ) );
	$headerOverlay     = esc_attr( education_opt( 'education_headeroverlaycolor', 'rgba(4,9,30,0.8)' ) );
	$navbarbg 		   = esc_attr( education_opt( 'education_header_navbar_bgColor' ) );
	$stickynavbarbg    = esc_attr( education_opt( 'education_header_navbarsticky_bgColor' ) );
	$navmenuColor 			= esc_attr( education_opt( 'education_header_navbar_menuColor' ) );
	$navmenuHovColor 		= esc_attr( education_opt( 'education_header_navbar_menuHovColor', '#f7631b' ) ); 
	$stickynavmenuColor 	= esc_attr( education_opt( 'education_header_sticky_navbar_menuColor' ) );
	$stickynavmenuHovColor 	= esc_attr( education_opt( 'education_header_sticky_navbar_menuHovColor' ) );
	$foftext1     	   = esc_attr( education_opt( 'education_fof_textonecolor_settings' ) );
	$foftext2     	   = esc_attr( education_opt( 'education_fof_texttwocolor_settings' ) );
	$fofbgcolor        = esc_attr( education_opt( 'education_fof_bgcolor_settings' ) );
	$footerbgImg       = education_opt( 'education_footer_bgimg_settings' );

	$footerbgImg = json_decode( $footerbgImg );

	$footerbgImgAttr = '';

	if( ! empty( $footerbgImg->url ) ) {
		$footerbgImgAttr = 'background-image:url( ' .esc_url( $footerbgImg->url ). ' );';
	}

	$footerbgColor     = esc_attr( education_opt( 'education_footer_widget_bgColor_settings' ) );
	$footerTextColor   = esc_attr( education_opt( 'education_footer_widget_color_settings' ) );
	$anchorcolor 	   = esc_attr( education_opt( 'education_footer_widget_anchorcolor_settings' ) );
	$anchorhovcolor    = esc_attr( education_opt( 'education_footer_widget_anchorhovcolor_settings' ) );
	$widgettitlecolor  = esc_attr( education_opt( 'education_footer_widgettitlecolor_settings' ) );
	$themecolor  	   = esc_attr( education_opt( 'education_themecolor' ) );

	$footerbtombg  	   			= esc_attr( education_opt( 'education_footer_bottom_bgcolor_settings' ) );
	$footerbtomtextcolor 		= esc_attr( education_opt( 'education_footer_bottom_textcolor_settings' ) );
	$footerbtomanchorcolor 		= esc_attr( education_opt( 'education_footer_bottom_anchorcolor_settings' ) );
	$footerbtomanchorhovercolor = esc_attr( education_opt( 'education_footer_bottom_anchorhovercolor_settings' ) );


	$customcss ="
			.genric-btn.primary,
			.genric-btn.primary-border:hover,
			.default-switch input + label,
			.primary-switch input:checked + label:before,
			.top-head-btn,
			.primary-btn,
			.image-carusel-area .owl-dot.active,
			.testomial-area .owl-dot.active,
			.generic-banner,
			.blog-posts-area .single-blog-post .primary-btn:hover,
			.blog-pagination .page-item.active .page-link,
			.blog-pagination .page-link:hover,
			.search-widget form.search-form input[type=text],
			.search-widget form.search-form button,
			.single-sidebar-widget .popular-post-widget .popular-title,
			.single-sidebar-widget .category-title,
			.widget-wrap .newsletter-widget .newsletter-title,
			.widget-wrap .newsletter-widget .bbtns,
			.widget-wrap .tag-cloud-widget .tagcloud-title,
			.widget-wrap .tag-cloud-widget ul li:hover,
			.comments-area .btn-reply:hover,
			.pagination a.active-pagination,
			.pagination a:hover,
			.blog-detail-txt [type='submit'],
			.page-links a span:hover,
			.content--area .page-links a span:hover,
			.tagcloud a:hover, 
			.tags-widget ul li:hover,
			.global-banner {
				background-color: {$themecolor};
			}

			b, 
			sup, 
			sub, 
			u,
			del,
			.genric-btn.primary:hover,
			.genric-btn.primary-border,
			.ordered-list li,
			.ordered-list-alpha li,
			.ordered-list-roman li,
			.default-select .nice-select .list .option.selected,
			.default-select .nice-select .list .option:hover,
			.form-select .nice-select .list .option.selected,
			.form-select .nice-select .list .option:hover,
			.header-top .header-top-left a:hover i,
			.nav-menu ul li:hover > a,
			#mobile-nav ul .menu-has-children i.fa-chevron-up,
			#mobile-nav ul .menu-item-active,
			.primary-btn:hover,
			.primary-btn.white:hover,
			.primary-btn.white:hover span,
			.about-video-left h6,
			.feature-area .single-feature:hover h4, .feature-area .single-feature:hover .fa,
			.process-area .single-process:hover .fa,
			.single-testimonial:hover h4,
			.footer-area .single-footer-widget .footer-nav li a:hover,
			.footer-area .copyright-text a,
			.footer-area .copyright-text .footer-social a:hover,
			.contact-page-area .form-area .primary-btn:hover,
			.contact-page-area .single-contact-address .fa,
			.blog-posts-area .single-blog-post .meta-details .tags li a:hover,
			.blog-posts-area .single-blog-post .user-name a:hover, 
			.blog-posts-area .single-blog-post .date a:hover, 
			.blog-posts-area .single-blog-post .view a:hover, 
			.blog-posts-area .single-blog-post .comments a:hover,
			.protfolio-widget .social-links li a:hover,
			.single-widget ul li:hover p,
			.single-blog-post .social-links li a:hover,
			.single-blog-post .tags li:first-child:after,
			.single-blog-post .tags li:hover a,
			.single-blog-post .tags li:hover a,
			.single-footer-widget ul li a:hover {
				color: {$themecolor};
			}
			.genric-btn.primary:hover,
			.genric-btn.primary-border,
			blockquote,
			.generic-blockquote,
			.unordered-list li:before,
			.single-input-primary:focus,
			#header #logo h1 a, #header #logo h1 a:hover,
			.primary-btn:hover,
			.contact-page-area .form-area .primary-btn:hover,
			.single-widget ul li:hover,
			.pagination a,
			.blog-post-list  .single-blog-post.sticky,
			.blog-detail-txt [type='submit'],
			.page-links a span,
			.page-links span:not(:first-child), 
			.content--area .page-links a span, 
			.content--area .page-links span:not(:first-child) {
				border-color: {$themecolor};
			}
			.global-banner {
				background-image: {$headerBg};
			}
			.global-banner .overlay-bg {
				background-color: {$headerOverlay}
			}
			.about-content h1, 
			.about-content a,
			.bread-crumb.link-nav {
				color: {$headerTextColor};
			}
			.global-banner {
				background-color: {$headerbgcolor}
			}

			#f0f{
				background-color: {$fofbgcolor}
			}
			.inner-child-fof .h1 {
				color: {$foftext1}
			}
			.inner-child-fof a,
			.inner-child-fof p {
				color: {$foftext2}
			}
			.footer-area{
				{$footerbgImgAttr}
				background-color: {$footerbgColor};
				color: {$footerTextColor};
			}
			caption,
			footer-widget p,
			.single-footer-widget,
			footer {
				color: {$footerTextColor};
			}
			.footer-widget ul li a,
			.single-footer-widget ul li a,
			.single-footer-widget a,
			.footer-widget a {
				color: {$anchorcolor};
			}
			.single-footer-widget a:hover,
			.single-footer-widget ul li a:hover,
			.footer-bottom a:hover{
				color: {$anchorhovcolor};
			}
			.footer-area .single-footer-widget h6{
				color: {$widgettitlecolor};
			}
			.footer-area .copyright-text {
				background-color: {$footerbtombg};
				color: {$footerbtomtextcolor};
			}
			.footer-area .copyright-text .footer-social a,
			.footer-area .copyright-text a {
				color: {$footerbtomanchorcolor};
			}
			.footer-area .copyright-text .footer-social a:hover,
			.footer-area .copyright-text a:hover {
				color: {$footerbtomanchorhovercolor};
			}
			#header {
				background-color: {$navbarbg};
			}
			#header.header-scrolled {
				background: {$stickynavbarbg};
			}
			.nav-menu a {
				color: {$navmenuColor};
			}
			.nav-menu li:hover > a, 
			.nav-menu > .current-menu-item > a,
			.header-scrolled .nav-menu > .current-menu-item > a,
			.nav-menu a:hover {
				color: {$navmenuHovColor};
			}
			.header-scrolled .nav-menu a {
				color: {$stickynavmenuColor};
			}
			.header-scrolled .nav-menu a:hover {
				color: {$stickynavmenuHovColor} !important;
			}


        ";

	wp_add_inline_style( 'education-common', $customcss );

}
add_action( 'wp_enqueue_scripts', 'education_common_custom_css', 50 );