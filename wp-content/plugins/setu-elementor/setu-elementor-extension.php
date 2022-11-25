<?php

/**
 * Plugin Name: FaisalTestAddon
 * Description: Custom Elementor addon.
 * Plugin URI:  https://github.com/faisalahammed044274
 * Version:     1.0.0
 * Author:      FaisalAhammed
 * Author URI:  https://github.com/faisalahammed044274
 * Text Domain: SetuTestAddon
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class SetuTestPlugin
{

    const VERSION = '1.0.0';

    const MINIMUM_ELEMENTOR_VERSION = '3.2.0';

    const MINIMUM_PHP_VERSION = '7.3';

    private static $_instance = null;

    public static function instance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    public function __construct()
    {

        if ($this->is_compatible()) {
            add_action('elementor/init', [$this, 'init']);
        }

    }

    public function is_compatible()
    {

        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return false;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return false;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return false;
        }

        return true;

    }

    public function admin_notice_missing_main_plugin()
    {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'SetuTestAddon'),
            '<strong>' . esc_html__('Elementor Test Addon', 'SetuTestAddon') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'SetuTestAddon') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }

    public function admin_notice_minimum_elementor_version()
    {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'SetuTestAddon'),
            '<strong>' . esc_html__('Elementor Test Addon', 'SetuTestAddon') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'SetuTestAddon') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }

    public function admin_notice_minimum_php_version()
    {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'SetuTestAddon'),
            '<strong>' . esc_html__('Elementor Test Addon', 'SetuTestAddon') . '</strong>',
            '<strong>' . esc_html__('PHP', 'SetuTestAddon') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }

    public function init()
    {

        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        add_action('elementor/controls/register', [$this, 'register_controls']);

    }

    public function register_widgets($widgets_manager)
    {

        require_once __DIR__ . '/includes/widgets/widget-1.php';
        require_once __DIR__ . '/includes/widgets/widget-2.php';

        $widgets_manager->register(new Widget_1());
        $widgets_manager->register(new Widget_2());

    }

    public function register_controls($controls_manager)
    {

        require_once __DIR__ . '/includes/controls/control-1.php';
        require_once __DIR__ . '/includes/controls/control-2.php';

        $controls_manager->register(new Control_1());
        $controls_manager->register(new Control_2());

		add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );
    }



}
