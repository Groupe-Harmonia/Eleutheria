<?php

$wgDBtype = "mysql";
$wgDBserver = "db";
$wgDBname = "eleutheria";
$wgDBuser = "app";
$wgDBpassword = file_get_contents('/run/secrets/db-password');

$wgDBprefix = "";
$wgDBssl = false;
$wgDBTableOptions = 'ENGINE=InnoDB, DEFAULT CHARSET=utf8';
