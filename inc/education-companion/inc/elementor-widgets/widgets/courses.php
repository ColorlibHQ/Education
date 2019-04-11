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
class Education_Course extends Widget_Base {

	public function get_name() {
		return 'education-course';
	}

	public function get_title() {
		return __( 'Course', 'education' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'education-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Course Section Heading ------------------------------
        $this->start_controls_section(
            'course_heading',
            [
                'label' => esc_html__( 'Course Section Heading', 'education' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => esc_html__( 'Section Title', 'education' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => esc_html__( 'Section Sub-title', 'education' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End Course section Heading
        
		// ----------------------------------------   Course content ------------------------------
		$this->start_controls_section(
			'course_block',
			[
				'label' => esc_html__( 'Course', 'education' ),
			]
        );
        $this->add_control(
            'select_style', [
                'label' => esc_html__( 'Select Course Style', 'education' ),
                'type'  => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'style1' => __('Carousel Style', 'education'),
                    'style2' => __('Grid Style', 'education')
                ],
                'default'   => 'style1'

            ]
        );
        $this->add_control(
            'post_number', [
                'label' => esc_html__( 'Course Post Number', 'education' ),
                'type'  => Controls_Manager::NUMBER,
                'label_block' => true,
                'min'   => 1,
				'max'   => 100,
				'step'  => 1,
				'default' => 4,

            ]
        );

		$this->end_controls_section(); // End Course content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => esc_html__( 'Style Section Heading', 'education' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => esc_html__( 'Section Title Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_secttitle',
                'selector'  => '{{WRAPPER}} .title h1',
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => esc_html__( 'Section Sub Title Color', 'education' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_desc',
                'selector'  => '{{WRAPPER}} .title p',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style course Box ------------------------------
        $this->start_controls_section(
            'style_trainingbox', [
                'label' => esc_html__( 'Style Course Carousel Content', 'education' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]

        );
        $this->add_control(
            'color_coursetitle', [
                'label' => esc_html__( 'Title Color', 'education' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-popular-carusel .details h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_coursetitleHover', [
                'label' => esc_html__( 'Title Hover Color', 'education' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-popular-carusel .details h4:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_coursePrice', [
                'label' => esc_html__( 'Price Text Color', 'education' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-popular-carusel .meta h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_description',
                'selector'  => '{{WRAPPER}} .single-popular-carusel .details p',
            ]
        );

        $this->end_controls_section();
    

	}

	protected function render() {

    $settings = $this->get_settings();
    $this->load_widget_script();
    $postNumber = !empty( $settings['post_number'] ) ? $settings['post_number'] : '4';
    $style = $settings['select_style'];

        ?>
        <section class="popular-course-area section-gap <?php if( $settings['select_style']=='style2' ){ echo 'courses-page'; } ?>">
            <div class="container">
                <?php echo education_section_heading( $settings['sect_title'], $settings['sect_subtitle'] ); ?>						
                <div class="row">
                    <?php
                    if( $style == 'style1' ){
                        echo '<div class="active-popular-carusel">';
                    }
                    ?>
                    
                    <?php 
                        education_course( $postNumber, $style );

                        if( $style == 'style1' ){
                            echo ' </div>';
                        }
                       
                        
                        ?>
                </div>
            </div>	
        </section>

        <?php
    

    }
    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.active-popular-carusel').owlCarousel({
                items:4,
                margin: 30,
                loop:true,
                dots: true,
                autoplayHoverPause: true,
                smartSpeed:650,         
                autoplay:true,      
                    responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items:4
                    }
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }

}
