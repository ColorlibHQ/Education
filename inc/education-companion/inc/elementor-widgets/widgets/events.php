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
class Education_Events extends Widget_Base {

	public function get_name() {
		return 'education-events';
	}

	public function get_title() {
		return __( 'Events', 'education' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'education-elements' ];
	}

	protected function _register_controls() {

        $repeater = new \Elementor\Repeater();
        
        // Event Section Heading
        $this->start_controls_section(
            'event_heading',
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

        $this->end_controls_section(); //End Event Section Heading


		// ----------------------------------------   Events content ------------------------------
		$this->start_controls_section(
			'events_block',
			[
				'label' => __( 'Events', 'education' ),
			]
        );
        $this->add_control(
            'select_style', [
                'label' => esc_html__( 'Select Event Style', 'education' ),
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
            'events_post_number', [
                'label' => __( 'Event Post Number', 'education' ),
                'type'  => Controls_Manager::NUMBER,
                'min'   => 1,
				'max'   => 100,
				'step'  => 1,
				'default' => 4,
                
            ]
		);

		$this->end_controls_section(); // End events content


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
        $this->end_controls_section(); // End Section Heading


        //------------------------------ Style Events ------------------------------
        $this->start_controls_section(
            'style_events', [
                'label' => __( 'Style Events', 'education' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'events_title_heading',
            [
                'label'     => __( 'Style Event Title ', 'education' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_eventtitle', [
                'label' => __( 'Title Color', 'education' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#222',
                'selectors' => [
                    '{{WRAPPER}} .single-carusel h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'event_hover_title', [
                'label' => __( 'Title Hover Color', 'education' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#f7631b',
                'selectors' => [
                    '{{WRAPPER}} .single-carusel h4:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_event_title',
                'selector'  => '{{WRAPPER}} .single-carusel h4',
            ]
        );
        
        $this->add_control(
            'item_hover_btn_color', [
                'label' => __( 'Event Description Color', 'education' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#777',
                'selectors' => [
                    '{{WRAPPER}} .single-carusel .detials p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_event_desc',
                'selector'  => '{{WRAPPER}} .single-carusel .detials p',
            ]
        );


        $this->end_controls_section();
        

	}

	protected function render() {
        $this->load_widget_script();
        $settings = $this->get_settings();
        $postNumber = !empty( $settings['events_post_number'] ) ? $settings['events_post_number'] : '';
        $style = $settings['select_style'];
        
        
        if( $style == 'style1' ){ ?>
            <section class="upcoming-event-area section-gap">
                <div class="container">
                    <?php echo education_section_heading( $settings['sect_title'], $settings['sect_subtitle'] ); ?>									
                    <div class="row">
                        <div class="active-upcoming-event-carusel">
                            <?php
                                education_events( $postNumber, $style );
                            ?>		
                        </div>
                    </div>
                </div>	
            </section>
            <?php
        } else { ?>
            <section class="events-list-area section-gap event-page-lists">
                <div class="container">
                    <div class="row align-items-center">
                        <?php
                            education_events( $postNumber, $style );
                        ?>	
                    </div>
                </div>	
            </section>
            <?php
        }


    }
    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $('.active-upcoming-event-carusel').owlCarousel({
                items:2,
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
                    992: {
                        items: 2,
                    }
                }
            });
            

        })(jQuery);
        </script>
        <?php 
        }
    }


	
}
