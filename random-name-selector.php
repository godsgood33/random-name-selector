<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://essentialscentsabilities.com
 * @since             1.0.0
 * @package           Random_Name_Selector
 *
 * @wordpress-plugin
 * Plugin Name:       Random Name Selector
 * Plugin URI:        https://github.com/godsgood33/random-name-selector
 * Description:       This plugin takes a list of people and entry counts in a comma delimited format and allows the user to randomly select one of those names
 * Version:           1.0.0
 * Author:            Ryan Prather
 * Author URI:        http://essentialscentsabilities.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       random-name-selector
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

define('PLUGIN_NAME_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-random-name-selector-activator.php
 */
function activate_random_name_selector() {
  require_once plugin_dir_path(__FILE__) . 'includes/class-random-name-selector-activator.php';
  Random_Name_Selector_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-random-name-selector-deactivator.php
 */
function deactivate_random_name_selector() {
  require_once plugin_dir_path(__FILE__) . 'includes/class-random-name-selector-deactivator.php';
  Random_Name_Selector_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_random_name_selector');
register_deactivation_hook(__FILE__, 'deactivate_random_name_selector');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-random-name-selector.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_random_name_selector() {
  $plugin = new Random_Name_Selector();
  $plugin->run();
}

run_random_name_selector();
