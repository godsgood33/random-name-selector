<div id='plugin-settings'>
  <ol>
    <li>Goto <a href="https://api.random.org/json-rpc/1/" target="_blank">https://api.random.org/json-rpc/1/</a></li>
    <li>Click "Get a Beta Key" in the top right corner of the page</li>
    <li>Enter your email address in the box and click "Send Beta Key"</li>
    <li>Open the email that was sent to you by Random.org and copy the long random looking string to the box below and click "Save"</li>
  </ol>
  <label for="random-apiKey">API Key:</label>
  <input type="text" id="random-apiKey" placeholder="Random.org API Key" value="<?php print get_option('random-apiKey', null); ?>" /><br />

  <input type="button" id="action" value="Save" />
</div>

<div id="loading"></div>
<div id='waiting'></div>
