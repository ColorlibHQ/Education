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

 $currentUser = wp_get_current_user();
 $currentUserId = $currentUser->data->ID;

// Call Header
get_header();
    if( function_exists( 'education_set_post_views' ) ){
        education_set_post_views( get_the_ID() );
    }
    
    if( have_posts() ){ ?>

        <section class="course-details-area pt-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 left-contents">
                        <?php
                        if( has_post_thumbnail() ){ ?>
                            <div class="main-image">
                                <?php the_post_thumbnail( 'course_single_img', array( 'class' => 'img-fluid' ) )?>
                            </div>
                            <?php                            
                        }
                        ?>
                       
                        <div class="jq-tab-wrapper" id="horizontalTab">
                            <div class="jq-tab-menu">
                                <div class="jq-tab-title active" data-tab="1">Objectives</div>
                                <div class="jq-tab-title" data-tab="2">Eligibility</div>
                                <div class="jq-tab-title" data-tab="3">Course Outline</div>
                                <div class="jq-tab-title" data-tab="4">Comments</div>
                                <div class="jq-tab-title" data-tab="5">Reviews</div>
                            </div>
                            <div class="jq-tab-content-wrapper">
                                <div class="jq-tab-content active" data-tab="1">
                                    <?php while( have_posts() ){
                                        the_post();
                                        the_content();
                                        
                                        //
                                        $args = array(
                                            'post_id' => get_the_ID(),   // Use post_id, not post_ID
                                        );
                                        $reviews = get_comments( $args );
                                        $reviewCount = is_array( $reviews ) ?  count( $reviews ) : '';
                                    } ?>                                    
                                </div>
                                <?php
                                    $eligibility = get_post_meta( get_the_ID(), 'course_eligibility', true );
                                    if( !empty( $eligibility ) ){ ?>
                                        <div class="jq-tab-content" data-tab="2">
                                            <?php
                                            echo wp_kses_post( $eligibility ); ?>
                                        </div>
                                        <?php
                                    }
                                ?>                              
                                
                                <div class="jq-tab-content" data-tab="3">
                                    <ul class="course-list">
                                        <?php
                                        $outlines = get_post_meta( get_the_ID(), 'course_outlines', true );
                                        if( ! empty( $outlines ) ){
                                            foreach( $outlines as $outline ){
                                                echo '<li class="justify-content-between d-flex">';
                                                echo '<p>'. $outline['lesson_title'] .'</p>';
                                                echo '<a class="primary-btn text-uppercase" href="'. esc_url( $outline['outline_btn_url'] ) .'">View Details</a>';
                                                echo '</li>';
                                               
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="jq-tab-content comment-wrap" data-tab="4">
                                    <?php 
                                        // comment template.
                                        if ( comments_open() || get_comments_number() ) {
                                            comments_template();
                                        }
                                    ?>    						                
                                </div>
                                <div class="jq-tab-content" data-tab="5">	
                                    <div class="review-top row pt-40">
                                        <div class="col-lg-3">
                                            <div class="avg-review">
                                                <?php echo esc_html( 'Average', 'education' ) ?> <br>
                                                <span><?php 
                                                $t = get_post_meta( absint( get_the_ID() ), 'education_course_avgreview', true ); 
                                                if( $reviewCount ) {
                                                    $average = $t / $reviewCount;
                                                    echo number_format( $average, 1, ".", "." );
                                                }


                                                ?></span> <br>
                                                <?php echo '( '. $reviewCount . ' Ratings )'; ?>

                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <h4 class="mb-20"><?php echo esc_html__( 'Provide Your Rating', 'education' ); ?></h4>
                                            <div class="d-flex flex-row reviews">
                                                <span><?php echo esc_html__( 'Quality', 'education' ); ?></span>
                                                <div class='rating-stars text-center'>
                                                    <ul id='stars'>
                                                    <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    </ul>
                                                </div>
                                                <div class='success-box'>
                                                    <div class='text-message'></div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    
                                    <div class="feedeback">
                                        <h4 class="pb-20"><?php echo esc_html__( 'Your Feedback', 'education' ); ?></h4>
                                        <form action="#" method="post" id="reviw_submit" >
                                            <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                                            <input type="hidden" name="ratingvalue" id="ratingvalue" >
                                            <input type="hidden" id="reviewajax" value="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ) ?>" >
                                            <input type="hidden" name="userid" id="userid" value="<?php echo absint( $currentUserId ) ?>" >
                                            <input type="hidden" name="postid" id="postid" value="<?php echo absint( get_the_ID() ); ?>" >
                                            <button type="submit" name="subpost" class="mt-20 primary-btn text-right text-uppercase">Submit</button>
                                        </form>

                                        
                                    </div>
                                    <div class="comments-area mb-30">
                                        <?php 
                                        if( $reviewCount > 0 ){
                                            foreach( $reviews as $review ){ 
                                                $starReview = get_comment_meta( $review->comment_ID, 'education_course_review', true );
                                              
                                                ?>
                                                <div class="comment-list">
                                                    <div class="single-comment single-reviews justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb">
                                                                <?php echo get_avatar( $review->user_id , 60 ); ?>
                                                            </div>
                                                            <div class="desc">
                                                                <h5><a href="#"><?php echo $review->comment_author;  ?></a>
                                                                <?php
                                                                // Star Review ==================
                                                                if (!empty( $starReview )) {
                                                                    echo '<div class="star">';
                                                                    $i = 1;
                                                                    for ($i = 1; $i <= 5; $i++) {

                                                                        if ($starReview >= $i) {
                                                                            echo '<span class="fa fa-star checked"></span>';
                                                                        } else {
                                                                            echo '<span class="fa fa-star"></span>';
                                                                        }
                                                                    }
                                                                    echo '</div>';
                                                                } ?>
                                                                </h5>
                                                                <p class="comment"> <?php echo $review->comment_content; ?> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                            }
                                        }
                                        // $starReview = get_comment_meta( $review->comment_ID, 'education_course_review', false );
                                        // echo '<pre>';
                                        // print_r( $starReview );
                                        // echo '</pre>';
                                        
                                        ?>
                                        
                                    </div>	                                	
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 right-contents">
                        <ul>
                            <?php
                            $trainer = get_post_meta( get_the_ID(), 'course_trainer', true );
                            $courseFee = get_post_meta( get_the_ID(), 'course_fee', true );
                            $courseSeat = get_post_meta( get_the_ID(), 'course_seat', true );
                            $courseSchedule = get_post_meta( get_the_ID(), 'course_schedule', true );

                            if( ! empty( $trainer ) ){ ?>
                                <li>
                                    <span class="justify-content-between d-flex" >
                                        <p><?php echo esc_html__('Trainer’s Name', 'education') ?></p> 
                                        <span class="or"><?php echo esc_html( $trainer ) ?></span>
                                    </span>
                                </li>
                                <?php
                            }
                            if( ! empty( $courseFee ) ){ ?>
                                 <li>
                                    <span class="justify-content-between d-flex" >
                                        <p><?php echo esc_html__('Course Fee', 'education') ?> </p>
                                        <span><?php echo esc_html( $courseFee ) ?></span>
                                    </span>
                                </li>
                            <?php
                            }
                            if( ! empty( $courseSeat ) ){ ?>
                                <li>
                                    <span class="justify-content-between d-flex" >
                                        <p><?php echo esc_html__('Available Seats', 'education') ?> </p>
                                        <span><?php echo esc_html( $courseSeat ) ?></span>
                                    </span>
                                </li>
                            <?php
                            }
                            if( ! empty( $courseSchedule ) ){ ?>
                                <li>
                                    <span class="justify-content-between d-flex" >
                                        <p><?php echo esc_html__('Schedule', 'education') ?></p>
                                        <span><?php echo esc_html( $courseSchedule ) ?></span>
                                    </span>
                                </li>
                            <?php
                            } ?>                            
                        </ul>
                        <?php
                        $course_enroll = get_post_meta( get_the_ID(), 'course_enroll', true );
                        ?>
                        <a href="<?php echo esc_url( $course_enroll ) ?>" class="primary-btn text-uppercase"><?php echo esc_html__( 'Enroll the course', 'education' ) ?></a>
                    </div>
                </div>
            </div>	
        </section>
        
        <?php
            $postNumber = education_opt( 'popular_course_post_number' );
            $popularCourse = new WP_Query( array(
                'post_type' => 'course',
                'posts_per_page' => absint( $postNumber ),
                'meta_key'  => 'education_post_views_count'

            ) );

            if( $popularCourse->have_posts() ){
                ?>
                <section class="popular-courses-area section-gap courses-page">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="menu-content pb-70 col-lg-8">
                                <div class="title text-center">
                                    <h1 class="mb-10">Popular Courses we offer</h1>
                                    <p>There is a moment in the life of any aspiring.</p>
                                </div>
                            </div>
                        </div>						
                        <div class="row">
                            <?php
                            while( $popularCourse->have_posts() ){
                                $popularCourse->the_post();
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
                            } ?>
                            													
                        </div>
                    </div>	
                </section>
                <?php
            } 
            
            $cta_switcher = education_opt('course_cta_switch', false );
            if( $cta_switcher ){ ?>
                <section class="cta-two-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 cta-left">
                                <?php
                                $ctaTitle = education_opt( 'course_page_cta_title', esc_html__( 'Not Yet Satisfied with our Trend?', 'education' )); 
                                $catUrl = education_opt( 'course_page_cta_url' );
                                ?>
                                <h1><?php echo esc_html( $ctaTitle ); ?></h1>
                            </div>
                            <div class="col-lg-4 cta-right">
                                <a class="primary-btn wh" href="<?php echo esc_url( $catUrl ); ?>"><?php echo esc_html( 'view our blog', 'education' ) ?></a>
                            </div>
                        </div>
                    </div>	
                </section>
                <?php
            }

    }


// Call Footer
get_footer();
