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
 * Education elementor few words section widget.
 *
 * @since 1.0
 */
class Education_Cta extends Widget_Base {

	public function get_name() {
		return 'education-cta';
	}

	public function get_title() {
		return __( 'Call to Action', 'education' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'education-elements' ];
	}

	protected function _register_controls() {


        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'sh_content',
            [
                'label' => __( 'Select Call to Action Style', 'education' ),
            ]
        );
        $this->add_control(
            'select_cta',
            [
                'label'       => esc_html__( 'Select Call to Action Style', 'education' ),
                'label_block' => true,
                'type'        => Controls_Manager::SELECT,
                'options'      => [
                    'style_1'   => esc_html__('Style One', 'education'),
                    'style_2'   => esc_html__('Style Two', 'education')
                ],
                'default'     => 'style_1'
            ]
        );
        $this->end_controls_section(); // End few words content

        // Single Column Call to Action Settings
        $this->start_controls_section(
            'single_cta_sec',
            [
                'label' => __( 'Call to Action', 'education' ),
            ]
        );
        $this->add_control(
            'cta_title',
            [
                'label'       => esc_html__( 'Title', 'education' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( "It's never late to start, join us today!", "education" )
            ]
        );
        $this->add_control(
            'cta_description',
            [
                'label'       => esc_html__( 'Description', 'education' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Thinking about overseas adventure travel? Have you put any thought into the best places to go when it comes to overseas adventure travel? Nepal is one of the most popular places of all.', 'education' ),
                'condition'   => [
                    'select_cta' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'cta_btn_label',
            [
                'label'       => esc_html__( 'Button Label', 'education' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Become a Member', 'education' )
            ]
        );
        $this->add_control(
            'cta_btn_url',
            [
                'label'       => esc_html__( 'Button URL', 'education' ),
                'label_block' => true,
                'type'        => Controls_Manager::URL,
                
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'education' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .cta-one-area',
                'condition'   => [
                    'select_cta' => 'style_1'
                ]
            ]
        );
        $this->end_controls_section();
        //End  Single Column Call to Action Settings


        //------------------------------ Style CTA Dual Column Settings ------------------------------
        $this->start_controls_section(
            'style_cta_2', [
                'label' => __( 'Style CTA Dual Column', 'education' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                
            ]
        );
        $this->add_control(
            'color_cta_cl', [
                'label'     => __( 'Title Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wrap h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'cta_title_typo_cl',
                'selector'  => '{{WRAPPER}} .wrap h1',
            ]
        );

        $this->add_control(
            'color_cta_subt_cl', [
                'label'     => __( 'Sub-title Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wrap p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'cta_subt_typo_cl',
                'selector'  => '{{WRAPPER}} .wrap p',
            ]
        );
        $this->add_control(
            'color_cta_btn_cl', [
                'label'     => __( 'Button Label Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn.wh' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_hover_cl', [
                'label'     => __( 'Button Hover Label Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn.wh:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_bg_cl', [
                'label'     => __( 'Button Background Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn.wh' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_hbg_cl', [
                'label'     => __( 'Button Hover Background Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn.wh:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();




	}

	protected function render() {

        $settings = $this->get_settings();


        if( $settings['select_cta'] == 'style_1' ){
            ?>

            <section class="cta-one-area relative section-gap">
                <div class="container">
                    <div class="overlay overlay-bg"></div>
                    <div class="row justify-content-center">
                        <div class="wrap">
                            <?php
                            // Title
                            if( !empty( $settings['cta_title'] ) ){
                                echo education_heading_tag(
                                    array(
                                        'tag'   => 'h1',
                                        'text'  => esc_html( $settings['cta_title'] ),
                                    )
                                );
                            }
                            // Sub Title
                            if( !empty( $settings['cta_description'] ) ){
                                echo education_paragraph_tag(
                                    array(
                                        'text'  => esc_html( $settings['cta_description'] ),
                                    )
                                );
                            }

                            if( ! empty( $settings['cta_btn_label'] ) ){ ?>
                                <a href="<?php echo esc_url( $settings['cta_btn_url']['url'] ) ?>" class="primary-btn wh"><?php echo esc_html( $settings['cta_btn_label'] ) ?></a>
                                <?php
                            }
                            ?>
                        </div>					
                    </div>
                </div>	
            </section>
            <?php 
        } 
        elseif( $settings['select_cta'] == 'style_2' ){ ?>
            <section class="cta-two-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 cta-left">
                            <?php
                            // Title
                            if( !empty( $settings['cta_title'] ) ){
                                echo education_heading_tag(
                                    array(
                                        'tag'   => 'h1',
                                        'text'  => esc_html( $settings['cta_title'] ),
                                    )
                                );
                            } ?>
						</div>
						<div class="col-lg-4 cta-right">
                            <?php
                            if( ! empty( $settings['cta_btn_label'] ) ){ ?>
                                <a href="<?php echo esc_url( $settings['cta_btn_url']['url'] ) ?>" class="primary-btn wh"><?php echo esc_html( $settings['cta_btn_label'] ) ?></a>
                                <?php
                            }
                            ?>
						</div>
					</div>
				</div>	
			</section>
            <?php
        } 

    }
	
}
