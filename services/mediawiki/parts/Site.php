<?php
const DOMAIN = 'wiki.t4t.one';

// Secrets

$wgSecretKey = file_get_contents('/run/secrets/app-secret-key');
$wgUpgradeKey = file_get_contents('/run/secrets/app-upgrade-key');

// General

$wgSitename = "Eleutheria";
// $wgServer = "https://" . DOMAIN;
// $wgServer = "http://127.0.0.1:55555";

$wgServer = $_ENV['ELEUTHERIA_APP_URL'];

$wgLanguageCode = "fr";
$wgLocaltimezone = "Europe/Paris";

$wgArticlePath = '/$1';
$wgScriptPath = '';
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

$wgFragmentMode = [ 'html5' ];
$wgParserEnableLegacyHeadingDOM = false;
$wgEnableProtectionIndicators = true;
$wgSortedCategories = true;
$wgAllowSiteCSSOnRestrictedPages = true;
$wgEnableCanonicalServerLink = true;
$wgNativeImageLazyLoading = true;

$wgGitRepositoryViewers['https://github.com/(.*?)(.git)?'] = 'https://github.com/$1/commit/%H';

// // Use Extension:ShortDescription for search suggestion description
// $wgCitizenSearchDescriptionSource = 'wikidata';
// // Default to dark theme
// $wgCitizenThemeDefault = 'dark';
// $wgCitizenThemeColor = '#0d1012';
// $wgCitizenManifestOptions = [
// 	'background_color' => '#0d1012',
// 	'description' => 'Unofficial wiki dedicated to Star Citizen and Squadron 42',
// 	'short_name' => 'SC Wiki',
// 	'theme_color' => "#0d1012",
// 	'icons' => [
// 		[
// 			'src' => "$wgResourceBasePath/resources/assets/sitelogo.svg",
// 			'sizes' => 'any',
// 			'type' => 'image/svg+xml'
// 		],
// 		[
// 			'src' => "$wgResourceBasePath/resources/assets/maskable_icon_x192.png",
// 			'sizes' => '192x192',
// 			'type' => 'image/png',
// 			'purpose' => 'maskable'
// 		],
// 		[
// 			'src' => "$wgResourceBasePath/resources/assets/maskable_icon_x512.png",
// 			'sizes' => '512x512',
// 			'type' => 'image/png',
// 			'purpose' => 'maskable'
// 		],
// 	],
// ];
