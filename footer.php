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

/**
 * Footer Area
 *
 * @Footer
 * @Back To Top Button
 *
 * @Hook education_footer
 *
 * @Hooked  education_footer_area 10
 * @Hooked  education_back_to_top 20
 *
 */

do_action( 'education_footer' );

wp_footer(); 
?>
</body>
</html>