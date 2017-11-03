<?php

/**
 * Fired during plugin activation
 *
 * @link       http://essentialscentsabilities.com
 * @since      1.0.0
 *
 * @package    Random_Name_Selector
 * @subpackage Random_Name_Selector/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Random_Name_Selector
 * @subpackage Random_Name_Selector/includes
 * @author     Ryan Prather <ryan@essentialscentsabilities.com>
 */
class Random_Name_Selector_Activator {

  /**
   * Short Description. (use period)
   *
   * Long Description.
   *
   * @since    1.0.0
   */
  public static function activate() {
    update_option('random-requests', 0);
    update_option('random-bits', 0);
    update_option('random-apiKey', '');
  }

}
