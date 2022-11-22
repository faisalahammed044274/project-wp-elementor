<?php

class Elementor_Test_Widget extends \Elementor\Widget_Base

{

    public function get_name()
    {
        return "TestWidget";
    }

    public function get_title()
    {
        return __("TestWidget", 'elementortestwidget');

    }

    public function get_icon()
    {
        return 'fa fa-image';
    }

    public function get_custom_help_url()
    {}

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {}

    public function get_script_depends()
    {}

    public function get_style_depends()
    {}

    protected function register_controls()
    {

        $this->start_control_section(
            'content_section',
            [
                'label' => __('Content', 'elementortestplugin'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'elementortestwidget'),
                'placeholder' => esc_html__('Enter your title', 'elementortestwidget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'size',
            [
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label' => esc_html__('Size', 'elementortestwidget'),
                'placeholder' => '0',
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
            ]
        );

        $this->add_control(
            'alignment',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Alignment', 'elementortestwidget'),
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'elementortestwidget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'elementortestwidget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'elementortestwidget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        ?>
	<h3 class="<?php echo esc_attr($settings['class']); ?>">
		<?php echo $settings['title']; ?>
	</h3>
	<?php
}

}
