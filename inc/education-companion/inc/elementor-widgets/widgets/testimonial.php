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
class Education_Testimonial extends Widget_Base {

	public function get_name() {
		return 'education-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'education' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'education-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'education' ),
			]
		);
		
		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'education' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'education' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
	                [
		                'name' => 'reviewstar',
		                'label' => __('Star Review', 'education'),
		                'type' => Controls_Manager::CHOOSE,
		                'options' => [
			                '1' => [
				                'title' => __('1', 'education'),
				                'icon' => 'fa fa-star',
			                ],
			                '2' => [
				                'title' => __('2', 'education'),
				                'icon' => 'fa fa-star',
			                ],
			                '3' => [
				                'title' => __('3', 'education'),
				                'icon' => 'fa fa-star',
			                ],
			                '4' => [
				                'title' => __('4', 'education'),
				                'icon' => 'fa fa-star',
			                ],
			                '5' => [
				                'title' => __('5', 'education'),
				                'icon' => 'fa fa-star',
			                ],
		                ],
	                ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'education' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Accessories Here you can find the best computeraccessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory', 'education')
                    ]
                    
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
		//------------------------------ Style Section ------------------------------
		$this->start_controls_section(
			'style_section', [
				'label' => __( 'Style Review Item', 'education' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_title', [
				'label'     => __( 'Review Title Color', 'education' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222',
				'selectors' => [
					'{{WRAPPER}} .review-area h4' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_reviewtitle',
                'selector'  => '{{WRAPPER}} .review-area h4',
            ]
        );
		$this->add_control(
			'color_description', [
				'label'     => __( 'Review Description Color', 'education' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#777',
				'selectors' => [
					'{{WRAPPER}} .review-area p' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_reviedesc',
                'selector'  => '{{WRAPPER}} .review-area p',
            ]
        );

		$this->end_controls_section();

        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'education' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
                'selector' => '{{WRAPPER}} .review-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
    ?>

    <section class="review-area section-gap relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">				
            <div class="row">
                <div class="active-review-carusel">
                    <?php
                    if ( is_array( $settings['review_slider'] ) && count( $settings['review_slider'] ) > 0 ):
                        foreach ( $settings['review_slider'] as $review ): ?>
                            <div class="single-review item">
                                <div class="title justify-content-start d-flex">
                                    <?php
                                    // Name =======
                                    if ( ! empty( $review['label'] ) ) {
                                        echo education_heading_tag(
                                            array(
                                                'tag'  => 'h4',
                                                'text' => esc_html( $review['label'] ),
                                            )
                                        );
                                    }

                                    // Star Review ==================
                                    $star = $review['reviewstar'];
                                    if (!empty( $star )) {
                                        echo '<div class="star">';
                                        for ($i = 1; $i <= 5; $i++) {

                                            if ($star >= $i) {
                                                echo '<span class="fa fa-star checked"></span>';
                                            } else {
                                                echo '<span class="fa fa-star"></span>';
                                            }
                                        }
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                                <?php 
                                // Description
                                if ( ! empty( $review['desc'] ) ) {
                                    echo education_get_textareahtml_output( $review['desc'] );
                                }
                                ?>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
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

            $('.active-review-carusel').owlCarousel({
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
                    768: {
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
