<?php

require_once WP_PLUGIN_DIR . '/random-name-selector/vendor/autoload.php';

use Datto\JsonRpc\Http\Client;

if (!defined('JSON'))
  define('JSON', 'content-type: application/json');

add_action('wp_ajax_get_names', 'get_name');
add_action('wp_ajax_save_options', 'save_options');

function get_name() {
  $names = [];
  $name_list = explode("\n", filter_input(INPUT_POST, 'name_list', FILTER_SANITIZE_STRING));
  $apiKey = get_option('random-apiKey', null);
  if (!$apiKey) {
    print json_encode(['error' => "You have not updated your API key in Settings -> Random Settings"]);
    wp_die();
  }

  if (!is_array($name_list) || !count($name_list)) {
    print json_encode(['error' => 'There are no names in the list']);
    wp_die();
  }

  $header = ['name' => 0, 'entry' => 1];

  if (is_array($name_list) && count($name_list)) {
    foreach ($name_list as $name) {
      $name = str_replace(['"', "&#34;"], '', $name);
      $csv = explode(",", $name);
      $entries = array_pop($csv);
      if (count($csv) >= 2) {
        $name = implode(",", $csv);
      }
      else {
        $name = $csv[0];
      }
      if ($entries) {
        $names = array_merge($names, array_fill(count($names), $entries, $name));
      }
    }
  }

  shuffle($names);

  $client = new Client('https://api.random.org/json-rpc/1/invoke');

  $client->query(1, 'generateIntegers', [
    "apiKey"      => $apiKey,
    "n"           => 1,
    "min"         => 0,
    "max"         => count($names) - 1,
    "replacement" => true
  ]);

  $reply = $client->send();

  if (!isset($reply['result'])) {
    print json_encode(['error' => $reply['error']['Parameter']]);
  }
  else {
    print json_encode(['winner' => $names[$reply['result']['random']['data'][0]], 'number' => $reply['result']['random']['data'][0], 'total' => count($names)]);
  }

  update_option('random-requests', $reply['result']['requestsLeft']);
  update_option('random-bits', $reply['result']['bitsLeft']);

  wp_die();
}

function save_options() {
  $apiKey = filter_input(INPUT_POST, 'apiKey', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);

  update_option('random-apiKey', $apiKey);

  print json_encode('success');

  wp_die();
}
