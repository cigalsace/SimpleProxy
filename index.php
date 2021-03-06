<?php
//Variables de connexion
// $username = 'user01';
// $password = 'user01';

$url = '';
if (isset($_GET['url'])) {
    $url = $_GET['url'];
}
$xml = file_get_contents('php://input');

// Create a stream
$opts = array(
    'http'=>array(
        'method'=>"POST",
        // 'header' => "Authorization: Basic " . base64_encode("$username:$password"),
        'header' => "Content-Type: text/xml; charset=utf-8",
        'content'=> $xml
    ),
    'ssl' => array(
        'verify_peer'       => false,
        'verify_peer_name'  => false,
        'allow_self_signed' => true
    )
);
// Create context options
$context = stream_context_create($opts);

if ($url) {
    // echo file_get_contents($url);
    echo file_get_contents($url, false, $context);
} else {
    echo false;
}
?>
