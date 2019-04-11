<?php
/**
 * @Packge     : Education Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */


/**
 * Custom Post type "Courses" Post Query function With ajax.
 * ===============================================================================
 */
add_action('wp_ajax_loadmore', 'education_course_ajax'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'education_course_ajax'); // wp_ajax_nopriv_{action}

function education_course_ajax(){
    $pCourse = new WP_Query( array(
        'post_type' => 'course',
        'posts_per_page' => $_POST['postnumber'],
        'paged' => $_POST['page'] + 1
    ) );

    if( $pCourse->have_posts() ){
        while( $pCourse->have_posts() ){
            $pCourse->the_post(); 
                
                ?>
                <div class="single-popular-carusel col-lg-3 col-md-6">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>	
                            <?php the_post_thumbnail( 'popularCourse_thum', array( 'class' => 'img-fluid' ) )?>
                            
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <?php 
                            $pCoursePrice = get_post_meta( get_the_ID(), 'course_fee', true );
                            ?>
                            <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span><?php echo get_comments_number( absint( get_the_ID() ) ) ?></p>
                            <h4><?php echo esc_html( $pCoursePrice ) ?></h4>
                        </div>									
                    </div>
                    <div class="details">
                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                        <?php echo wp_kses_post( wp_trim_words( get_the_content(), 18, '' ) ); ?>
                    </div>
                </div>
            <?php
            
        } 
        
    }
    wp_reset_postdata();
die();
}


// Course Post Query
function education_course( $postnumber, $style ){
    $pCourse = new WP_Query( array(
        'post_type' => 'course',
        'posts_per_page' => absint($postnumber)
    ) );
    
	wp_enqueue_script( 'my_loadmore', get_stylesheet_directory_uri() . '/assets/js/loadmore.js', array('jquery') );

	wp_localize_script( 'my_loadmore', 'education_loadmore_params', array(
		'ajaxurl'    => admin_url( 'admin-ajax.php' ), 
		'posts'      => json_encode( $pCourse->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page'   => $pCourse->max_num_pages,
        'postnumber' => absint( $postnumber )

	) );
 
    if( $pCourse->have_posts() ){
        while( $pCourse->have_posts() ){
            $pCourse->the_post(); ?>
            <div class="single-popular-carusel <?php if( $style=='style2' ){ echo 'col-lg-3 col-md-6'; } ?>">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>	
                        <?php the_post_thumbnail( 'popularCourse_thum', array( 'class' => 'img-fluid' ) )?>
                        
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <?php 
                        $pCoursePrice = get_post_meta( get_the_ID(), 'course_fee', true );
                        ?>
                        <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span><?php echo get_comments_number( absint( get_the_ID() ) ) ?></p>
                        <h4><?php echo esc_html( $pCoursePrice ) ?></h4>
                    </div>									
                </div>
                <div class="details">
                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                    <?php echo wp_kses_post( wp_trim_words( get_the_content(), 18, '' ) ); ?>
                </div>
            </div>
            <?php
        } 
        
    }
    wp_reset_postdata();
    if( $style == 'style2' ){
        echo '<button class="loadmore_btn primary-btn text-uppercase mx-auto">More posts</button>';
    }
}


/**
 * Custom Post type "Events" Post Query function With ajax.
 * ===============================================================================
 */
add_action('wp_ajax_eventloadmore', 'event_loadmore_ajax'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_eventloadmore', 'event_loadmore_ajax'); // wp_ajax_nopriv_{action}
// Event LoadMore ajax functoin
function event_loadmore_ajax(){
    $events = new WP_Query( array(
        'post_type' => 'event',
        'posts_per_page' => $_POST['postnumber'],
        'paged' => $_POST['page'] + 1,
        'style' => $_POST['style2']
    ) );

    if( $events->have_posts() ){
        while( $events->have_posts() ){
            $events->the_post(); 
                if( $_POST['style'] == 'style2' ){
                    echo '<div class="col-lg-6 pb-30">';
                }
                ?>
                <div class="single-carusel row align-items-center">
                    <div class="col-12 col-md-6 thumb">
                        <?php the_post_thumbnail( 'events_265x220', array( 'class' => 'img-fluid' ) )?>
                    </div>
                    <div class="detials col-12 col-md-6">
                        <p><?php echo get_the_date( get_option( 'date_format' ) ) ?></p>
                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                        <?php echo wpautop( wp_trim_words( get_the_content(), 23, '' ) ) ?>
                    </div>
                </div> 
            <?php
            if( $_POST['style'] == 'style2' ){
                echo '</div>';
            }
        }
    }
    wp_reset_postdata();
    die();
}


// Event Post Query
function education_events( $postnumber, $style ){

    $events = new WP_Query( array(
        'post_type' => 'event',
        'posts_per_page' => $postnumber,
    ) );
    wp_enqueue_script( 'event_loadmore', get_stylesheet_directory_uri() . '/assets/js/event-loadmore.js', array('jquery') );
    wp_localize_script( 'event_loadmore', 'event_loadmore_params', array(
		'event_ajaxurl'  => admin_url( 'admin-ajax.php' ), 
		'posts'      => json_encode( $events->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page'   => $events->max_num_pages,
        'postnumber' => absint( $postnumber ),
        'style'      => 'style2'

	) );
    
    if( $events->have_posts() ){
        while( $events->have_posts() ){
            $events->the_post(); 
                if( $style == 'style2' ){
                    echo '<div class="col-lg-6 pb-30">';
                }
                ?>
                <div class="single-carusel row align-items-center">
                    <div class="col-12 col-md-6 thumb">
                        <?php the_post_thumbnail( 'events_265x220', array( 'class' => 'img-fluid' ) )?>
                    </div>
                    <div class="detials col-12 col-md-6">
                        <p><?php echo get_the_date( get_option( 'date_format' ) ) ?></p>
                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                        <?php echo wpautop( wp_trim_words( get_the_content(), 23, '' ) ) ?>
                    </div>
                </div> 
            <?php
            if( $style == 'style2' ){
                echo '</div>';
            }
        }
    }
    if( $style == 'style2' && $events->max_num_pages > 1  ){
        echo '<button class="event_loadmore primary-btn text-uppercase mx-auto">More posts</button>';
    }
    


}
