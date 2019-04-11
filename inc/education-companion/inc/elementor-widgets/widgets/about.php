<?php
namespace Educationelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Education elementor section widget.
 *
 * @since 1.0
 */
class Education_About extends Widget_Base {

	public function get_name() {
		return 'education-about';
	}

	public function get_title() {
		return __( 'About', 'education' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'education-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Us', 'education' ),
			]
		);
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Content', 'education' ),
                'description'   => esc_html__('Use <br> tag for line break', 'education'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h1>We can fix all types<br> of computer & mobiles</h1> inappropriate behaviour is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace. That’s why it’s crucial that, as women.', 'education' )
            ]
        );
        $this->add_control(
            'about_features_content', [
                'label' => __( 'Create Features', 'education' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'education' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __('Expert Instructors', 'education')
                    ],
                    [
                        'name'  => 'title_url',
                        'label' => __( 'Title URL', 'education' ),
                        'type'  => Controls_Manager::URL,
                        'label_block' => true,
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'education' ),
                        'type'  => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name'  => 'icon',
                        'label' => __( 'Icon', 'education' ),
                        'type'  => Controls_Manager::ICON
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End about content

        // Start Contact Section
        $this->start_controls_section(
			'contact_section',
			[
				'label' => __( 'Contact Form', 'education' ),
			]
        );
        $this->add_control(
            'contact_form_title',
            [
                'label'         => esc_html__( 'Contact Form Title', 'education' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __('Search for Available Course', 'education')
            ]
        );
        $this->add_control(
            'contact_form7',
            [
                'label'         => esc_html__( 'Contact Form 7 ShortCode', 'education' ),
                'description'   => esc_html__('Copy Contact Form 7 ShortCode from Dashboard > Contact and paste here', 'education'),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $this->end_controls_section(); // Contact Section End

        //------------------------------ Style Content ------------------------------

        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Title & Description', 'education' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .search-course-area .search-course-left h1'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typo_title',
                'selector'  => '{{WRAPPER}} .search-course-area .search-course-left h1',
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'description Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .search-course-left p'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typo_desc',
                'selector'  => '{{WRAPPER}} .search-course-left p',
            ]
        );
        $this->end_controls_section();

        // Feature Style ==============================
        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Featuer', 'education' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );        
        $this->add_control(
            'color_featuretitle', [
                'label'     => __( 'Feature Title Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .details-content .single-detials h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_icon', [
                'label'     => __( 'Icon Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f7631b',
                'selectors' => [
                    '{{WRAPPER}} .search-course-area .details-content .single-detials span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Description Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .details-content .single-detials p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */

        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'education' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'education' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'education' ),
                'label_off' => __( 'Hide', 'education' ),
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'education' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'education' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .home-about-area .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'education' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'education' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .search-course-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
    $settings = $this->get_settings();

    ?>
    <section class="search-course-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-6 search-course-left">
                    <?php
                        if( !empty( $settings['content'] ) ){
                            echo wp_kses_post( $settings['content'] );
                        }
                    ?>
                    <div class="row details-content">
                        <?php
                        foreach( $settings['about_features_content'] as $val ): ?>
                            <div class="col single-detials">
                                <?php
                                    if( ! empty( $val['icon'] ) ) {
                                        echo '<span class="'. $val['icon'] .'"></span>';
                                    } ?>
                    
                                <?php
                                // Title
                                if( ! empty( $val['label'] ) ){
                                    echo '<a href=" '. esc_url( $val['title_url']['url'] ) .' "><h4> '. esc_html( $val['label'] ) .' </h4></a>';
                                }
                                
                                // Description
                                if( ! empty( $val['desc'] ) ) {
                                    echo education_get_textareahtml_output( $val['desc'] );
                                } ?>						
                            </div>
                            <?php
                        endforeach;
                        ?>    							
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 search-course-right section-gap">
                    <?php
                        //Form Title
                        if( ! empty($settings['contact_form_title'] ) ){
                            echo '<h4 class="text-white pb-10 text-center">Search for Available Course</h4>';
                        }
                        
                        // Contact Form 7 ShortCode
                        if( !empty( $settings['contact_form7'] ) ){
                            echo do_shortcode( $settings['contact_form7'] );
                        }
                    ?>
                </div>
            </div>
        </div>	
    </section>

    <?php

    }

}
