<?php
$body = file_get_contents('php://input');

$body = trim($body);

$obj  = json_decode($body,true);
?>