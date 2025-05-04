<?php

if ( getenv('ELEUTHERIA_APP_SMTP_HOST') ) {
  $wgEnableEmail = true;

  $wgSMTP = [
    'host' => $_ENV['ELEUTHERIA_APP_SMTP_HOST'],
    'IDHost' => $_ENV['ELEUTHERIA_APP_SMTP_DOMAIN'],
    'port' => $_ENV['ELEUTHERIA_APP_SMTP_PORT'],
    'auth' => true,
    'username' => $_ENV['ELEUTHERIA_APP_SMTP_USERNAME'],
    'password' => $_ENV['ELEUTHERIA_APP_SMTP_PASSWORD'],
  ];
} else {
  $wgEnableEmail = false;
};

$wgEnableUserEmail = true; # UPO

$wgEmergencyContact  = $_ENV['ELEUTHERIA_APP_SMTP_USERNAME'];
$wgPasswordSender = $_ENV['ELEUTHERIA_APP_SMTP_USERNAME'];

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;
