<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://essentialscentsabilities.com
 * @since      1.0.0
 *
 * @package    Random_Name_Selector
 * @subpackage Random_Name_Selector/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Random_Name_Selector
 * @subpackage Random_Name_Selector/includes
 * @author     Ryan Prather <ryan@essentialscentsabilities.com>
 */
class Random_Name_Selector_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'random-name-selector',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
