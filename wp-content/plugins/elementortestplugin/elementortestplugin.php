<?php

/*
Plugin Name : Elementor Test Plugin
Plugin URI :
Description :
Version :
Author : MFASETU
Author URI : https://mfasetu.com
License : GPLV2 or later
Text Domain : elementortestplugin
Domain Path : /languages/
 */

use Elementor\Plugin as Plugin;

if (!defined('ABSPATH')) {
    die(__("Direct Access is not allowed", 'elementortestplugin'));
}

final class ElementorTestExtension
{
    const VERSION = "1.0.0";
    const MINIMUM_ELEMENTOR_VERSION = "3.2.0";
    const MINIMUM_PHP_VERSION = "7.0";

    private static $instance = null;
    public static function instance()
    {
    }

    public function __construct()
    {
        add_action('plugins_loaded', [$this, 'init']);
    }

    public function init()
    {
        load_plugin_textdomain('elementortestplugin');

        // Check if Elementor is installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return false;
        }

        function admin_notice_missing_main_plugin()
        {

            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }

            $message = sprintf(
                /* translators: 1: Plugin name 2: Elementor */
                esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'elementor-test-addon'),
                '<strong>' . esc_html__('Elementor Test Addon', 'elementortestplugin') . '</strong>',
                '<strong>' . esc_html__('Elementor', 'elementortestplugin') . '</strong>'
            );

            printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return false;
        }

        function admin_notice_minimum_elementor_version()
        {

            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }

            $message = sprintf(
                /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
                esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementortestplugin'),
                '<strong>' . esc_html__('Elementor Test Addon', 'elementortestplugin') . '</strong>',
                '<strong>' . esc_html__('Elementor', 'elementortestplugin') . '</strong>',
                //  self::MINIMUM_ELEMENTOR_VERSION
            );

            printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return false;
        }

        function admin_notice_minimum_php_version()
        {

            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }

            $message = sprintf(
                /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
                esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementortestplugin'),
                '<strong>' . esc_html__('Elementor Test Addon', 'elementortestplugin') . '</strong>',
                '<strong>' . esc_html__('PHP', 'elementortestplugin') . '</strong>',
                //  self::MINIMUM_PHP_VERSION
            );

            printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

        }
        // Widget Registration
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        // Control Registration
        add_action('elementor/controls/register', [$this, 'register_controls']);

    }

    public function init_widgets()
    {
        require_once __DIR__ . '/includes/widgets/widget-1.php';

        Plugin::instance()->$widgets_manager->register(new \Widget_1());

    }

    public function init_controls()
    {
        require_once __DIR__ . '/includes/Controls/control-1.php';

        Plugin::instance()->$controls_manager->register(new \Control_1());

    }

    public function includes()
    {
    }
}

ElementorTestExtension::instance();
