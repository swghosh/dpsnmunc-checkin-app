<?php
function flock_group_post($string) {
    $data = array('text' => $string);
    $url = 'https://api.flock.co/hooks/sendMessage/67ecab90-6b4d-46fa-b58e-b60ff9c4ff48';
    $options = array(
        'http' => array(
        'method'  => 'POST',
        'content' => json_encode( $data ),
        'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
        ),
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        )
    );
    
    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode( $result );
}
