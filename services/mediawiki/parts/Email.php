<?php

// $wgSMTP = [
// 	'host' => '',
// 	'IDHost' => '',
// 	'port' => 2525,
// 	'auth' => true,
// 	'username' => 'no-reply@wiki.t4t.one',
// 	'password' => $_ENV['ELEUTHERIA_APP_SMTP_PASSWORD'],
// ];

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "";
$wgPasswordSender = "";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;
