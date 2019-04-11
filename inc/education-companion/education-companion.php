<?php
/**
 * @Packge     : Education Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'EDUCATION_COMPANION_VERSION' ) ) {
    define( 'EDUCATION_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'EDUCATION_COMPANION_DIR_PATH' ) ) {
    define( 'EDUCATION_COMPANION_DIR_PATH', get_parent_theme_file_path().'/inc/education-companion/' );
}

// Define inc dir path constant
if( ! defined( 'EDUCATION_COMPANION_INC_DIR_PATH' ) ) {
    define( 'EDUCATION_COMPANION_INC_DIR_PATH', EDUCATION_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'EDUCATION_COMPANION_SW_DIR_PATH' ) ) {
    define( 'EDUCATION_COMPANION_SW_DIR_PATH', EDUCATION_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'EDUCATION_COMPANION_EW_DIR_PATH' ) ) {
    define( 'EDUCATION_COMPANION_EW_DIR_PATH', EDUCATION_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define CMB2 dir path constant
if( ! defined( 'EDUCATION_COMPANION_CMB2_DIR_PATH' ) ) {
    define( 'EDUCATION_COMPANION_CMB2_DIR_PATH', EDUCATION_COMPANION_INC_DIR_PATH . 'CMB2/' );
}

// Define demo data dir path constant
if( ! defined( 'EDUCATION_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'EDUCATION_COMPANION_DEMO_DIR_PATH', EDUCATION_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define plugin dir url constant
if( ! defined( 'EDUCATION_THEME_DIR_URL' ) ) {
    define( 'EDUCATION_THEME_DIR_URL', get_template_directory_uri() );
}

// Define inc dir url constant
if( ! defined( 'EDUCATION_COMPANION_DIR_URL' ) ) {
    define( 'EDUCATION_COMPANION_DIR_URL', EDUCATION_THEME_DIR_URL . '/inc/education-companion/' );
}

// Define inc dir url constant
if( ! defined( 'EDUCATION_COMPANION_INC_DIR_URL' ) ) {
    define( 'EDUCATION_COMPANION_INC_DIR_URL', EDUCATION_COMPANION_DIR_URL . '/inc/' );
}

// Define education-meta dir url constant
if( ! defined( 'EDUCATION_COMPANION_META_DIR_URL' ) ) {
    define( 'EDUCATION_COMPANION_META_DIR_URL', EDUCATION_COMPANION_INC_DIR_URL . 'education-meta/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'EDUCATION_COMPANION_EW_DIR_URL' ) ) {
    define( 'EDUCATION_COMPANION_EW_DIR_URL', EDUCATION_COMPANION_INC_DIR_URL . 'elementor-widgets/' );
}

// Define Demo data dir url constant
if( ! defined( 'EDUCATION_COMPANION_DEMO_DIR_URL' ) ) {
    define( 'EDUCATION_COMPANION_DEMO_DIR_URL', EDUCATION_COMPANION_INC_DIR_URL . 'demo-data/' );
}



$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();

if( ( 'Education' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Education' == $is_parent->get( 'Name' ) ) ) {
    require_once EDUCATION_COMPANION_DIR_PATH . 'education-init.php';
} else {

    add_action( 'admin_notices', 'education_companion_admin_notice', 99 );
    function education_companion_admin_notice() {
        $url = 'https://wordpress.org/themes/education/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Education Companion</strong> plugin you have to also install the %1$sEducation Theme%2$s', 'education' ), '<a href="' . esc_url( $url ) . '" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}
