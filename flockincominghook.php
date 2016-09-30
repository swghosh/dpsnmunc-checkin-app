<?php
function flock_group_post($string) {
  $url = 'https://api.flock.co/hooks/sendMessage/67ecab90-6b4d-46fa-b58e-b60ff9c4ff48';
  $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => "{\"text\": \"".$string."\"}",
        )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
}
