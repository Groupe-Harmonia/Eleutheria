<?php
const DOMAIN = 'wiki.t4t.one';

// Secrets

$wgSecretKey = getenv('ELEUTHERIA_APP_SECRET_KEY');
$wgUpgradeKey = $_ENV['ELEUTHERIA_APP_UPGRADE_KEY'];

// General

$wgSitename = "Eleutheria";
// $wgServer = "https://" . DOMAIN;
$wgServer = "http://127.0.0.1:55555";

$wgLanguageCode = "fr";
$wgLocaltimezone = "Europe/Paris";

$wgScriptPath = "";
$wgResourceBasePath = $wgScriptPath;

$wgPingback = false;

// Pages

$wgMainPageIsDomainRoot = true;

// Uploads & images

$wgEnableUploads = true;
$wgUseInstantCommons = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

// Rights

$wgRightsPage = ''; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = 'https://creativecommons.org/licenses/by-sa/4.0/';
$wgRightsText = 'Creative Commons Attribution-ShareAlike';
$wgRightsIcon = "$wgResourceBasePath/resources/assets/licenses/cc-by-sa.png";


// Caching

$wgCacheEpoch = 20250405201103;
