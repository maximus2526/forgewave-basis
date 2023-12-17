<?php
namespace fwb;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Elementor_Test_Widget extends Widget_Base {

    public function get_name() {
        return 'fwb-test-widget';
    }

    public function get_title() {
        return esc_html__( 'Test Widget', 'fwb' );
    }

    public function get_icon() {
        return 'eicon-archive'; // Змініть значок за потребою
    }

    public function get_categories() {
        return [ 'general' ]; // Визначте категорії віджетів Elementor, до якої слід додати ваш віджет
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'fwb' ),
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'fwb' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Hello, World!', 'fwb' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        echo '<div class="fwb-test-widget">';
        echo '<p>' . esc_html( $settings['text'] ) . '</p>';
        echo '</div>';
    }

    protected function _content_template() {
        ?>
        <div class="fwb-test-widget">
            <p>{{{ settings.text }}}</p>
        </div>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Test_Widget() );
