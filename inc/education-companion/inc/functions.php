<?php 
/**
 * @Packge     : Education Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Add Image Size
add_image_size( 'education_260x180', 260, 180, true );
add_image_size( 'events_265x220', 265, 220, true );
add_image_size( 'popularCourse_thum', 265, 200, true );
add_image_size( 'event_single_750x300', 750, 300, true );
add_image_size( 'course_single_img', 750, 350, true );


// Instagram object Instance
function education_instagram_instance() {
    
    $api = Wpzoom_Instagram_Widget_API::getInstance();

    return $api;
}

// Blog Section
function education_blog_section( $postnumber ) {
    
    ?>
    <div class="row">
        <?php   
        $date_format = get_option( 'date_format' );

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => esc_html( $postnumber ),
        );
        
        $query = new WP_Query( $args );
        
        if( $query->have_posts() ):
            while( $query->have_posts() ):
                $query->the_post();
                ?>
                <div class="col-lg-3 col-md-6 single-blog">
                    <?php
                    if( has_post_thumbnail() ) {
                        echo '<div class="thumb">';
                            the_post_thumbnail( 'education_260x180', array( 'class' => 'img-fluid' ) );
                        echo '</div>';
                    }
                    ?>
                    <p class="meta">
                        <?php echo esc_html( get_the_date( esc_html( $date_format ) ) ); ?> <?php echo esc_html__('|  By ', 'education'); ?>
                        <a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><?php echo esc_html( get_the_author() ) ?></a>
                    </p>
                    <a href="<?php the_permalink() ?>"><h5><?php the_title(); ?></h5></a>
                    <p><?php echo wp_trim_words( get_the_content(), 20, '' ) ?></p>

                    <a href="<?php the_permalink() ?>" class="details-btn d-flex justify-content-center align-items-center"><span class="details"><?php echo esc_html__('Details', 'education'); ?></span><span class="lnr lnr-arrow-right"></span></a>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <?php
}

// 
function education_section_heading( $title = '', $subtitle = '' ) {
    if( $title || $subtitle ):
    ?>
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                <?php 
                    // Title
                    if( $title ){
                        echo education_heading_tag(
                            array(
                                'tag'    => 'h1',
                                'class'  => 'mb-10',
                                'text'   => esc_html( $title ),
                            )
                        );
                    }
                    // Sub Title
                    if( $subtitle ){
                        echo education_paragraph_tag(
                            array(
                                'text'  => esc_html( $subtitle ),
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    endif;
}

// Set contact form 7 default form template
function education_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-lg-6 form-group">[text* your-name class:common-input class:mb-20 class:form-control placeholder "Enter Your Name"][email* your-email class:common-input class:mb-20 class:form-control placeholder "Enter Email Address"][text* your-subject class:common-input class:mb-20 class:form-control placeholder "Enter Subject"]</div><div class="col-lg-6 form-group">[textarea* your-message class:common-textarea class:form-control rows:9 placeholder "Message"]</div><div class="col-lg-12"><div class="alert-msg" style="text-align: left;"></div>[submit class:genric-btn class:primary "Send Message"]</div></div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'education_contact7_form_content', 10, 2 );


/**
 * Register a custom post type called "event".
 */
function education_event_post_type() {
    $labels = array(
        'name'                  => _x( 'Events', 'Post type general name', 'education' ),
        'singular_name'         => _x( 'Event', 'Post type singular name', 'education' ),
        'menu_name'             => _x( 'Events', 'Admin Menu text', 'education' ),
        'name_admin_bar'        => _x( 'Event', 'Add New on Toolbar', 'education' ),
        'add_new'               => __( 'Add New', 'education' ),
        'add_new_item'          => __( 'Add New Event', 'education' ),
        'new_item'              => __( 'New Event', 'education' ),
        'edit_item'             => __( 'Edit Event', 'education' ),
        'view_item'             => __( 'View Event', 'education' ),
        'all_items'             => __( 'All Events', 'education' ),
        'search_items'          => __( 'Search Events', 'education' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'event' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'comments' ),
    );
    register_post_type( 'event', $args );
}
add_action( 'init', 'education_event_post_type' );
//End Custom Post 'Event'

/**
 * Custom Post Register 'Courses'
 */
function education_course_post_type() {
    $labels = array(
        'name'                  => _x( 'Courses', 'Post type general name', 'education' ),
        'singular_name'         => _x( 'Course', 'Post type singular name', 'education' ),
        'menu_name'             => _x( 'Courses', 'Admin Menu text', 'education' ),
        'name_admin_bar'        => _x( 'Course', 'Add New on Toolbar', 'education' ),
        'add_new'               => __( 'Add New', 'education' ),
        'add_new_item'          => __( 'Add New Course', 'education' ),
        'new_item'              => __( 'New Course', 'education' ),
        'edit_item'             => __( 'Edit Course', 'education' ),
        'view_item'             => __( 'View Course', 'education' ),
        'all_items'             => __( 'All Courses', 'education' ),
        'search_items'          => __( 'Search Courses', 'education' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'course' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'comments' ),
    );
    register_post_type( 'course', $args );
}
add_action( 'init', 'education_course_post_type' );
// End Custom Post Register "Courses"



// Meta For YouTube Video link============================
function education_event_meta() {
	add_meta_box("education_event_date", esc_html__( "Details", 'education' ), "event_date_metabox_markup", "event", "side", "high", null);
	add_meta_box("event_venue", esc_html__( "Venue", 'education' ), "event_vanue_metabox_markup", "event", "side", "high", null);
	add_meta_box("event_organiser", esc_html__( "Organiser", 'education' ), "event_organiser_metabox_markup", "event", "side", "high", null);
}
add_action('add_meta_boxes', 'education_event_meta');

function event_date_metabox_markup($post) {
    $eventStart = get_post_meta($post->ID, 'event_start_input_meta', true);
    $eventEnd = get_post_meta($post->ID, 'event_end_input_meta', true);
    $eventPrice = get_post_meta($post->ID, 'event_price_meta', true);
    ?>
	<label for="event_start"><?php echo esc_html__( 'Event Start Date', 'education' ) ?></label>
	<input class="widefat" id="event_start" type="date" name="event_start" value="<?php echo $eventStart ?>">
    
	<label for="event_end"><?php echo esc_html__( 'Event End Date', 'education' ) ?></label>
	<input class="widefat" id="event_end" type="date" name="event_end" value="<?php echo $eventEnd ?>">
    
	<label for="event_price"><?php echo esc_html__( 'Event Price', 'education' ) ?></label>
	<input class="widefat" id="event_price" type="text" name="event_price" value="<?php echo $eventPrice ?>">
    
    <?php
}
function event_vanue_metabox_markup($post) {
    $eventPlace = get_post_meta($post->ID, 'event_place_meta', true);
    $eventStreet = get_post_meta($post->ID, 'event_street_meta', true);
    $eventCity = get_post_meta($post->ID, 'event_city_meta', true);
    ?>
	<label for="event_place"><?php echo esc_html__( 'Event Place:', 'education' ) ?></label>
    <input class="widefat" id="event_place" type="text" name="event_place" value="<?php echo $eventPlace ?>">
    
    <label for="event_street"><?php echo esc_html__( 'Street:', 'education' ) ?></label>
    <input class="widefat" id="event_street" type="text" name="event_street" value="<?php echo $eventStreet ?>">
    
    <label for="event_city"><?php echo esc_html__( 'City:', 'education' ) ?></label>
	<input class="widefat" id="event_city" type="text" name="event_city" value="<?php echo $eventCity ?>">
    
    <?php
}
function event_organiser_metabox_markup($post) {
    $orgCom = get_post_meta($post->ID, 'organiser_com_meta', true);
    $orgStreet = get_post_meta($post->ID, 'org_street_meta', true);
    $orgCity = get_post_meta($post->ID, 'org_city_meta', true);
    ?>
	<label for="organiser_com"><?php echo esc_html__( 'Organiser Company:', 'education' ) ?></label>
    <input class="widefat" id="organiser_com" type="text" name="organiser_com" value="<?php echo $orgCom ?>">
    
    <label for="org_street"><?php echo esc_html__( 'Street:', 'education' ) ?></label>
    <input class="widefat" id="org_street" type="text" name="org_street" value="<?php echo $orgStreet ?>">
    
    <label for="org_city"><?php echo esc_html__( 'City:', 'education' ) ?></label>
	<input class="widefat" id="org_city" type="text" name="org_city" value="<?php echo $orgCity ?>">
    
    <?php
}


function event_date_save_postdata( $post_id ){
    $event_start  = !empty( $_POST['event_start'] ) ? $_POST['event_start'] : '';
    $event_end  = !empty( $_POST['event_end'] ) ? $_POST['event_end'] : '';
    $event_price  = !empty( $_POST['event_price'] ) ? $_POST['event_price'] : '';
    update_post_meta( $post_id, 'event_start_input_meta', $event_start );
    update_post_meta( $post_id, 'event_end_input_meta', $event_end );
    update_post_meta( $post_id, 'event_price_meta', $event_price );
    

    $event_place  = !empty( $_POST['event_place'] ) ? $_POST['event_place'] : '';
    $event_street = !empty( $_POST['event_street'] ) ? $_POST['event_street'] : '';
    $event_city   = !empty( $_POST['event_city'] ) ? $_POST['event_city'] : '';
	update_post_meta( $post_id, 'event_place_meta', $event_place );
	update_post_meta( $post_id, 'event_street_meta', $event_street );
    update_post_meta( $post_id, 'event_city_meta', $event_city );
    

    $organiser_com = !empty( $_POST['organiser_com'] ) ? $_POST['organiser_com'] : '';
    $org_street = !empty( $_POST['org_street'] ) ? $_POST['org_street'] : '';
    $orgCity = !empty( $_POST['org_city'] ) ? $_POST['org_city'] : '';

    update_post_meta( $post_id, 'organiser_com_meta', $organiser_com );
    update_post_meta( $post_id, 'org_street_meta', $org_street );
	update_post_meta( $post_id, 'org_city_meta', $orgCity );
}
add_action('save_post', 'event_date_save_postdata');
// End Meta For YouTube Video link =======================



// Custom Post Event navigation
function event_sinlge_page_navigation(){
    // Start nav Area
    if( get_next_post_link() || get_previous_post_link()   ){
        
        if( get_next_post_link() ) {
            $nextPost = get_next_post(); ?>
            <a href="<?php the_permalink( absint( $nextPost->ID ) ) ?>" class="nav-prev"><span class="lnr lnr-arrow-left"></span><?php echo esc_html('Prev Event', 'education'); ?></a>
            <?php
        }
        if( get_previous_post_link() ){
            $prevPost = get_previous_post(); ?>
            <a href="<?php the_permalink( absint( $prevPost->ID ) ) ?>" class="nav-next"><?php echo esc_html('Next Event', 'education'); ?><span class="lnr lnr-arrow-right"></span></a>
            <?php
        }
    } 
            
}

// Post View set
function education_set_post_views($postID) {
	$count_key = 'education_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}


add_action( 'wp_ajax_course_review_submit', 'course_review_submit' );
add_action( 'wp_ajax_nopriv_course_review_submit', 'course_review_submit');
function course_review_submit(){
    
	if( isset( $_POST['formdata'] ) ){
        echo  $_POST['formdata'];
    }

 die();
	
}
