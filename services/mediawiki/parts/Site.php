<?php

// Secrets

$wgSecretKey = file_get_contents('/run/secrets/app-secret-key');
$wgUpgradeKey = file_get_contents('/run/secrets/app-upgrade-key');

// General

$wgSitename = "Eleutheria";

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

$wgCitizenSearchDescriptionSource = 'wikidata';
$wgCitizenThemeDefault = 'auto';
$wgCitizenThemeColor = '#94d39e';
$wgCitizenManifestOptions = [
	'background_color' => '#94d39e',
	'description' => 'Le wiki de la communauté queer en France ! 🏳️‍🌈',
	'short_name' => 'Eleutheria',
	'theme_color' => "#94d39e",
	'icons' => [
		[
			'src' => "$wgResourceBasePath/resources/assets/logo.svg",
			'sizes' => 'any',
			'type' => 'image/svg+xml'
		],
		[
			'src' => "$wgResourceBasePath/resources/assets/favicons/android-chrome-192x192.png",
			'sizes' => '192x192',
			'type' => 'image/png',
			'purpose' => 'maskable'
		],
		[
			'src' => "$wgResourceBasePath/resources/assets/favicons/android-chrome-512x512.png",
			'sizes' => '512x512',
			'type' => 'image/png',
			'purpose' => 'maskable'
		],
	],
];
