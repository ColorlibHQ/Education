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
class Education_Gallery extends Widget_Base {

	public function get_name() {
		return 'education-gallery';
	}

	public function get_title() {
		return __( 'Gallery', 'education' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'education-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        
		// ----------------------------------------   Gallery content ------------------------------
		$this->start_controls_section(
			'gallery_block',
			[
				'label' => __( 'Gallery', 'education' ),
			]
		);
		$this->add_control(
            'img_gallery', [
                'label'     => __( 'Gallery Images', 'education' ),
                'type'      => Controls_Manager::GALLERY,
                'default'   => []
            ]
        );

		$this->end_controls_section(); // End Gallery content


	}

	protected function render() {

    $settings = $this->get_settings();
    $image_gallery = ! empty( $settings['img_gallery'] ) ? $settings['img_gallery'] : '';
    ?>

    <section class="gallery-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <?php 
                    
                    $count = count( $image_gallery );
                    $i = 0;
                    
                    foreach( $image_gallery as $image ):
                        $i++; 
                        echo '<a href="'.$image['url'].'" class="img-gal"><div class="single-imgs relative"><div class="overlay overlay-bg"></div><div class="relative"><img class="img-fluid" src="'.$image['url'].'" alt=""></div></div></a>';
                        
                        if( $i % 2 == 0 && $count >$i ) {
                            echo '</div><div class="col-lg-4">';
                        }
                    endforeach;
                   
                    ?>
                </div>
            </div>
        </div>	
    </section>

    <?php

    }

}
