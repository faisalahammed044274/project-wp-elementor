<?php

/*****
 
Plugin Name : Elementor Test Addons
plugin URI : https://mfasetu.com
Descriotion :
Version : 1.0
Author : mfasetu
Author URI : https://mfasetu.com
License :  GPLv2 or Later
Text Domain :
Domain Path : /languages/

 *****/

if (!defined('ABSPATH')) {
	die(__("Direct Access is not allowed", 'elementortestplugin'));
}

final class Elementor_Test_Plugin
{
	const VERSION = "1.0.0";
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
	const MINIMUM_PHP_VERSION = '7.0';

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
		add_action('elementor/init', [$this, 'init']);
	}
	public function is_compatible()
	{
	}
	public function init()
	{

		// Check if Elementor is installed and activated
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

		/**
		 * Initialize
		 *
		 * Load the addons functionality only after Elementor is initialized.
		 *
		 * Fired by `elementor/init` action hook.
		 *
		 * @since 1.0.0
		 * @access public
		 */
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 **/

	public function admin_notice_missing_main_plugin()
	{

		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'elementortestplugin'),
			'<strong>' . esc_html__('Elementor Test Addon', 'elementortestplugin') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'elementortestplugin') . '</strong>'
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version()
	{

		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementortestplugin'),
			'<strong>' . esc_html__('Elementor Test Addon', 'elementortestplugin') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'elementortestplugin') . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version()
	{

		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementortestplugin'),
			'<strong>' . esc_html__('Elementor Test Addon', 'elementortestplugin') . '</strong>',
			'<strong>' . esc_html__('PHP', 'elementortestplugin') . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}


	public function init_widgets($widgets_manager)
	{
		require_once(__DIR__ . '/includes/widgets/test-widget.php');

		$widgets_manager->register(new test_widget());
	}
}
