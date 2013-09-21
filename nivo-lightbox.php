<?php
/**
 * Nivo Lightbox for WordPress
 *
 * Use Nivo Lightbox on all WordPress images
 *
 * @package   NL_WordPress
 * @author    Cliff Seal <cliff@logos-creative.com>
 * @link      http://logoscreative.co
 * @copyright 2013 Logos Creative
 *
 * @wordpress-plugin
 * Plugin Name: Nivo Lightbox for WordPress
 * Plugin URI:  https://github.com/logoscreative/Nivo-Lightbox
 * Description: Use Nivo Lightbox on all WordPress images
 * Version:     1.0.0
 * Author:      Cliff Seal <cliff@logos-creative.com>
 * Author URI:  http://logoscreative.co
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Plugin class.
 *
 * @package NL_WordPress
 * @author  Cliff Seal <cliff@logos-creative.com>
 */
class NL_WordPress {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @const   string
	 */
	const VERSION = '1.0.0';

	/**
	 * Unique identifier for your plugin.
	 *
	 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
	 * match the Text Domain file header in the main plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'nivo-lightbox';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'nl_enqueue_scripts' ) );
		add_action( 'wp_footer', array( $this, 'nl_init_nl' ) );

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Enqueue scripts
	 *
	 * @since    1.0.0
	 */
	public function nl_enqueue_scripts() {
		wp_register_style( 'nivo-lightbox', plugin_dir_url( __FILE__ ) . 'nivo-lightbox.min.css' );
		wp_enqueue_style( 'nivo-lightbox' );

		wp_register_style( 'nivo-lightbox-theme', plugin_dir_url( __FILE__ ) . 'themes/default/default.css' );
		wp_enqueue_style( 'nivo-lightbox-theme' );

		wp_register_script( 'nivo-lightbox', plugin_dir_url( __FILE__ ) . 'nivo-lightbox.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'nivo-lightbox' );

		wp_register_script( 'nivo-lightbox-init', plugin_dir_url( __FILE__ ) . 'nivo-lightbox-init.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'nivo-lightbox-init' );

	}

}

NL_WordPress::get_instance();
