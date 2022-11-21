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
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'elementortestplugin'),
                'placeholder' => esc_html__('Enter your title', 'textdomain'),
            ]
        );

        $this->add_control(
            'size',
            [
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label' => esc_html__('Size', 'elementortestplugin'),
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
                'label' => esc_html__('Alignment', 'elementortestplugin'),
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'textdomain'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'textdomain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'textdomain'),
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
    }

    protected function _content_template()
    {
    }
}
