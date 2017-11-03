<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://essentialscentsabilities.com
 * @since      1.0.0
 *
 * @package    Random_Name_Selector
 * @subpackage Random_Name_Selector/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Random_Name_Selector
 * @subpackage Random_Name_Selector/public
 * @author     Ryan Prather <ryan@essentialscentsabilities.com>
 */
class Random_Name_Selector_Public {

  /**
   * The ID of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $plugin_name    The ID of this plugin.
   */
  private $plugin_name;

  /**
   * The version of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $version    The current version of this plugin.
   */
  private $version;

  /**
   * Initialize the class and set its properties.
   *
   * @since    1.0.0
   * @param      string    $plugin_name       The name of the plugin.
   * @param      string    $version    The version of this plugin.
   */
  public function __construct($plugin_name, $version) {

    $this->plugin_name = $plugin_name;
    $this->version = $version;

    add_shortcode('random-name-selector', array($this, 'display_random_name_selector_page'));
  }

  /**
   * Register the stylesheets for the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function enqueue_styles() {

    /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Random_Name_Selector_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Random_Name_Selector_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */
    wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/random-name-selector-public.css', array(), $this->version, 'all');
  }

  /**
   * Register the JavaScript for the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function enqueue_scripts() {

    /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Random_Name_Selector_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Random_Name_Selector_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */
    wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/random-name-selector-public.js', array('jquery'), $this->version, false);

    wp_localize_script($this->plugin_name, 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
  }

  /**
   * Display the main public page
   *
   * @since   1.0.0
   */
  public function display_random_name_selector_page() {
    include_once("partials/random-name-selector-public-display.php");
  }

}
