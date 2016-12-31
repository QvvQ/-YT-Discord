<?php

/// ~ Change these values! ~ ///

// YouTube channel ID
const CHANNELID = "tolocat";

// Public callback URL
const CALLBACKURL = "REPLACE_WITH_CALLBACK_URL";

// Secret - must match ytnotify_subscribe script; should be reasonably hard to guess
const SECRET = "5487";

///   ///   ///  ///   ///   ///



$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://pubsubhubbub.appspot.com/subscribe",
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array(
        'hub.mode' => 'subscribe',
        'hub.topic' => 'https://www.youtube.com/xml/feeds/videos.xml?channel_id=' . CHANNELID,
        'hub.callback' => CALLBACKURL,
        'hub.secret' => SECRET,
        'hub.verify' => 'sync'
    ),
    CURLOPT_RETURNTRANSFER => TRUE
));
$response = curl_exec($curl);
curl_close($curl);

echo $response;

?>
