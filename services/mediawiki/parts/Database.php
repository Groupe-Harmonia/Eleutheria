<?php

$wgDBtype = "mysql";
$wgDBserver = "mariadb";
$wgDBname = "eleutheria";
$wgDBuser = "eleutheria";
$wgDBpassword = file_get_contents('/run/secrets/db-password');

$wgDBprefix = "";
$wgDBssl = false;
$wgDBTableOptions = 'ENGINE=InnoDB, DEFAULT CHARSET=utf8';
