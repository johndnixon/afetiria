<?php
/**
 * @package     AFP
 * @link      	https://github.com/jawittdesigns/
 * @copyright   Copyright (c) 2019, John Nixon
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      John Nixon <johndnixonwebdev@gmail.com>
 *
 * @wordpress-plugin
 * Plugin Name:       Afetiria Functionaliy
 * Plugin URI:        https://github.com/jawittdesigns/
 * Description:       Key functionality plugin for website
 * Version:           1.0.0
 * Author:            John Nixon
 * Author URI:        https://johndnixon.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}
if( !class_exists( 'AFP' ) ) {
	class AFP {

		/**
		 * Instance of the class
		 *
		 * @since 1.0.0
		 * @var Instance of AFP class
		 */
		private static $instance;

		/**
		 * Instance of the plugin
		 *
		 * @since 1.0.0
		 * @static
		 * @staticvar array $instance
		 * @return Instance
		 */
		public static function instance() {
			if ( !isset( self::$instance ) && ! ( self::$instance instanceof AFP ) ) {
				self::$instance = new AFP;
				self::$instance->define_constants();
				add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
				self::$instance->includes();
				self::$instance->init = new AFP_Init();
			}
		return self::$instance;
		}

		/**
		 * Define the plugin constants
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function define_constants() {
			// Plugin Version
			if ( ! defined( 'AFP_VERSION' ) ) {
				define( 'AFP_VERSION', '1.0.0' );
			}
			// Prefix
			if ( ! defined( 'AFP_PREFIX' ) ) {
				define( 'AFP_PREFIX', 'AFP_' );
			}
			// Textdomain
			if ( ! defined( 'AFP_TEXTDOMAIN' ) ) {
				define( 'AFP_TEXTDOMAIN', 'AFP' );
			}
			// Plugin Options
			if ( ! defined( 'AFP_OPTIONS' ) ) {
				define( 'AFP_OPTIONS', 'AFP-options' );
			}
			// Plugin Directory
			if ( ! defined( 'AFP_PLUGIN_DIR' ) ) {
				define( 'AFP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}
			// Plugin URL
			if ( ! defined( 'AFP_PLUGIN_URL' ) ) {
				define( 'AFP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}
			// Plugin Root File
			if ( ! defined( 'AFP_PLUGIN_FILE' ) ) {
				define( 'AFP_PLUGIN_FILE', __FILE__ );
			}
		}

		/**
		 * Load the required files
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function includes() {
			$includes_path = plugin_dir_path( __FILE__ ) . 'includes/';
			require_once AFP_PLUGIN_DIR . 'includes/class-afp-register-post-types.php';
			require_once AFP_PLUGIN_DIR . 'includes/class-afp-register-taxonomies.php';
			require_once AFP_PLUGIN_DIR . 'includes/class-afp-clean-up-head.php';
			require_once AFP_PLUGIN_DIR . 'includes/class-afp-add-mime-types.php';

			require_once AFP_PLUGIN_DIR . 'includes/carbon-fields.php';
			require_once AFP_PLUGIN_DIR . 'includes/template-functions.php';
			require_once AFP_PLUGIN_DIR . 'includes/class-afp-init.php';
		}

		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since  1.0.0
		 * @access public
		 */
		public function load_textdomain() {
			$AFP_lang_dir = dirname( plugin_basename( AFP_PLUGIN_FILE ) ) . '/languages/';
			$AFP_lang_dir = apply_filters( 'AFP_lang_dir', $AFP_lang_dir );

			$locale = apply_filters( 'plugin_locale',  get_locale(), AFP_TEXTDOMAIN );
			$mofile = sprintf( '%1$s-%2$s.mo', AFP_TEXTDOMAIN, $locale );

			$mofile_local  = $AFP_lang_dir . $mofile;
			$mofile_global = WP_LANG_DIR . '/edd/' . $mofile;

			if ( file_exists( $mofile_local ) ) {
				load_textdomain( AFP_TEXTDOMAIN, $mofile_local );
			} else {
				load_plugin_textdomain( AFP_TEXTDOMAIN, false, $AFP_lang_dir );
			}
		}

		/**
		 * Throw error on object clone
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', AFP_TEXTDOMAIN ), '1.6' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', AFP_TEXTDOMAIN ), '1.6' );
		}

	}
}
/**
 * Return the instance
 *
 * @since 1.0.0
 * @return object The Safety Links instance
 */
function AFP_Run() {
	return AFP::instance();
}
AFP_Run();
