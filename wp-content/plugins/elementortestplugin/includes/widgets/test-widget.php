<?php

class test_widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return "TestWidget";
    }

    public function get_title()
    {
        return __("TestWidget", "elementortestplugin");
    }

    public function get_icon()
    {
        return 'fa fa-image';
    }

    public function get_custom_help_url()
    {
        return 'https://go.elementor.com/widget-name';
    }


    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['keyword', 'keyword'];
    }

    public function get_script_depends()
    {
    }

    public function get_style_depends()
    {
    }


    protected  function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementortestplugin'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'mytitle',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => esc_html__('Hello From First Widget', 'elementortestplugin'),
                'placeholder' => esc_html__('Enter your title', 'textdomain'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $supertitle = $settings['mytitle'];

        echo '<h2>' . esc_html($supertitle) . '</h2>';
    }

    protected function _content_template()
    {
    }
}
