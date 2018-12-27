<?php
require_once( '../src/config.php' );
$session = new Session();
$session->startSession();
echo gettype($session->startSession());
echo 'Logged in successfully';