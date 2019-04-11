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
 * Education elementor Team Member section widget.
 *
 * @since 1.0
 */
class Education_Features extends Widget_Base {

	public function get_name() {
		return 'education-features';
	}

	public function get_title() {
		return __( 'Features', 'education' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'education-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();
        
		// ----------------------------------------   Features content ------------------------------
		$this->start_controls_section(
			'features_block',
			[
				'label' => __( 'Features', 'education' ),
			]
		);
		$this->add_control(
            'features_content', [
                'label' => __( 'Create Features', 'education' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'education' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __('Learn Online Courses', 'education')
                    ],
	                [
		                'name'  => 'desc',
		                'label' => __( 'Description', 'education' ),
		                'type'  => Controls_Manager::TEXTAREA
	                ],
                    [
                        'name'  => 'btn_label',
                        'label' => __( 'Button label', 'education' ),
                        'type'  => Controls_Manager::TEXT,
                    ],
                    [
                        'name'  => 'btn_url',
                        'label' => __( 'Button URL', 'education' ),
                        'type'  => Controls_Manager::URL,
                    ],
                ],
            ]
		);

		$this->end_controls_section(); // End features content


        //------------------------------ Style Features ------------------------------
        $this->start_controls_section(
            'style_features', [
                'label' => __( 'Style Features', 'education' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'features_title_heading',
            [
                'label'     => __( 'Style Feature Title ', 'education' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label' => __( 'Title Color', 'education' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-feature .title h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_hover_title', [
                'label' => __( 'Feature Hover Title Color', 'education' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-feature:hover .title h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_featuretitle_bg', [
                'label' => __( 'Title Background Color', 'education' ),
                'type'  => Controls_Manager::COLOR,
                'default' => 'rgba(255,255,255,0.15)',
                'selectors' => [
                    '{{WRAPPER}} .single-feature .title' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'title_hover_bg', [
                'label' => __( 'Title Hover Background Color', 'education' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#f7631b',
                'selectors' => [
                    '{{WRAPPER}} .single-feature:hover .title' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_hover_btn_color', [
                'label' => __( 'Feature Hover Button Color', 'education' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#f7631b',
                'selectors' => [
                    '{{WRAPPER}} .single-feature:hover .desc-wrap a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
        

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="feature-area">
        <div class="container">
            <div class="row">
            <?php
                if( is_array( $settings['features_content'] ) && count( $settings['features_content'] ) > 0 ):
                    foreach( $settings['features_content'] as $feature ):
                    ?>
                        <div class="col-lg-4">
                            <div class="single-feature">
                                <div class="title">
                                    <?php
                                        // Title
                                        if( ! empty( $feature['label'] ) ){
                                            echo '<h4>'. esc_html( $feature['label'] ) .'</h4>';
                                        }
                                    ?>
                                </div>
                                <div class="desc-wrap">
                                    <?php
                                    // Description 
                                    if( !empty( $feature['desc'] ) ){
                                        echo '<p>'. esc_html( $feature['desc'] ) .'</p>';
                                    }
                                
                                    //Button 
                                    if( !empty( $feature['btn_url']['url'] ) ){
                                        echo '<a href="'. esc_url( $feature['btn_url']['url'] ) .'"> '. esc_html( $feature['btn_label'] ) .' </a>';
                                    }
                                    ?>
                                    								
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>												
            </div>
        </div>	
    </section>

    <?php

    }

	
}
