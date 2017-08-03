<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.webswing.nl
 * @since      1.0.0
 *
 * @package    Webcamconsult
 * @subpackage Webcamconsult/admin/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h2>Webcamconsult widgets</h2>
    <iframe id="webcamconsult-admin-iframe" src="https://app.webcamconsult.com/extwidgets" scrolling="yes"></iframe>
</div>
<script>
    var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

    // Listen to message from child window
    eventer(messageEvent, function (e) {
        if (e.data.client_id !== undefined) {
            var set_data = {
                'action': 'set_client_id',
                'client_id': e.data.client_id
            };
            jQuery.post(ajaxurl, set_data, function (response) {
                // new client id is set
            });
        }
    }, false);
</script>