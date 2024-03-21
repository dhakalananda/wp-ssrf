<?php

require_once('../../../wp-load.php');

$url = $_GET['url'];
$response = wp_safe_remote_get( $url );
$response = wp_remote_retrieve_body( $response );

echo $response;
?>
