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

// Call Header
get_header();
    if( have_posts() ){ ?>

        <section class="event-details-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 event-details-left">
                        <?php
                        if( has_post_thumbnail() ) { ?>
                            <div class="main-img">
                                <?php the_post_thumbnail( 'event_single_750x300', array( 'class' => 'img-fluid' ) ); ?>
                            </div>
                            <?php 
                        } ?>
                        <div class="details-content">
                        <?php while( have_posts() ){
                            the_post(); ?>
                            <h4><?php the_title() ?></h4>
                            
                            <?php the_content(); 
                            } ?>
                        </div>
                        <div class="social-nav row no-gutters">
                            <div class="col-lg-6 col-md-6 ">
                                <?php
                                $socialShare = education_opt( 'event_share_switch' );
                                if( $socialShare ){
                                    echo education_social_sharing_buttons( 'focials' );
                                } ?>
                            </div>
                            <div class="col-lg-6 col-md-6 navs">
                                <?php
                                if( function_exists( 'event_sinlge_page_navigation' ) ){
                                    event_sinlge_page_navigation();
                                } ?>									
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-4 event-details-right">
                        <div class="single-event-details">
                            <?php 
                            $eventStart = get_post_meta($post->ID, 'event_start_input_meta', true);
                            $eventEnd = get_post_meta($post->ID, 'event_end_input_meta', true);
                            $eventPrice = get_post_meta($post->ID, 'event_price_meta', true);
                            ?>

                            <h4><?php echo esc_html( 'Details', 'education' ) ?></h4>
                            <ul class="mt-10">
                                <li class="justify-content-between d-flex">
                                    <span><?php echo esc_html__('Start date', 'education') ?></span>
                                    <span><?php echo esc_html($eventStart); ?></span>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <span><?php echo esc_html__('End date', 'education') ?></span>
                                    <span><?php echo esc_html($eventEnd); ?></span>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <span><?php echo esc_html__('Ticket Price', 'education') ?></span>
                                    <span><?php echo esc_html($eventPrice); ?></span>
                                </li>														
                            </ul>
                        </div>
                        <div class="single-event-details">
                        <?php
                            $eventPlace = get_post_meta($post->ID, 'event_place_meta', true);
                            $eventStreet = get_post_meta($post->ID, 'event_street_meta', true);
                            $eventCity = get_post_meta($post->ID, 'event_city_meta', true); ?>
                            <h4><?php echo esc_html( 'Venue', 'education' ) ?></h4>
                            <ul class="mt-10">
                                <li class="justify-content-between d-flex">
                                    <span><?php echo esc_html__('Place', 'education') ?></span>
                                    <span><?php echo esc_html( $eventPlace ); ?></span>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <span><?php echo esc_html__('Street', 'education') ?></span>
                                    <span><?php echo esc_html( $eventStreet ); ?></span>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <span><?php echo esc_html__('City', 'education') ?></span>
                                    <span><?php echo esc_html( $eventCity ); ?></span>
                                </li>														
                            </ul>
                        </div>
                        <div class="single-event-details">
                        <?php
                            $orgCom = get_post_meta($post->ID, 'organiser_com_meta', true);
                            $orgStreet = get_post_meta($post->ID, 'org_street_meta', true);
                            $orgCity = get_post_meta($post->ID, 'org_city_meta', true); ?>
                            <h4><?php echo esc_html( 'Organiser', 'education' ) ?></h4>
                            <ul class="mt-10">
                                <li class="justify-content-between d-flex">
                                    <span><?php echo esc_html__('Company', 'education') ?></span>
                                    <span><?php echo esc_html( $orgCom ); ?></span>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <span><?php echo esc_html__('Street', 'education') ?></span>
                                    <span><?php echo esc_html( $orgStreet ); ?></span>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <span><?php echo esc_html__('City', 'education') ?></span>
                                    <span><?php echo esc_html( $orgCity ); ?></span>
                                </li>														
                            </ul>
                        </div>														
                    </div>
                </div>
            </div>	
        </section>
        <?php
        $cta_switcher = education_opt('event_cta_switch', false );
        if( $cta_switcher ){ ?>
            <section class="cta-two-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 cta-left">
                            <?php
                            $ctaTitle = education_opt( 'event_page_cta_title', esc_html__( 'Not Yet Satisfied with our Trend?', 'education' )); 
                            $catUrl = education_opt( 'event_page_cta_url' );
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
