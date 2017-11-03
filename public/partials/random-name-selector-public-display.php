<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://essentialscentsabilities.com
 * @since      1.0.0
 *
 * @package    Random_Name_Selector
 * @subpackage Random_Name_Selector/public/partials
 */
/**
 * API key access to random.org
 *
 * @var string $apiKey
 */
$apiKey = get_option('random-apiKey', null);

// need to verify that an API key is available otherwise process will fail
if (!$apiKey) {
  die("This site is not ready to select random names");
}
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<ol>
  <li>Copy the name and entry count into the big text box (name,entry count).  One name/line</li>
  <li>Then click "Get Name".  It take a second, so just wait for the popup to show you the total count, randomly drawn number, and the winner!</li>
  <li>NO DATA IS STORED, COLLECTED, OR LOGGED from what you enter here!</li>
</ol>

<textarea id="name_list"></textarea><br />

<input type="button" value="Get Name" name="action" id="action" />