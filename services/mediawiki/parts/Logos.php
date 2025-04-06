<?php

/**
 * Settings related to logo & icons
 */

$wgLogos = [
  'src' => "$wgResourceBasePath/resources/assets/logo.svg",
  'wordmark' => [
    'src' => "$wgResourceBasePath/resources/assets/wordmark.svg",
    'width' => 150,
    'height' => 28
  ]
];

$wgFavicon = '/favicon.svg';

$wgFooterIcons = [
	'poweredby' => [
		'mediawiki' => [
			'src' => "$wgResourceBasePath/resources/assets/badge-mediawiki.svg",
			'url' => 'https://www.mediawiki.org',
			'alt' => 'Powered by MediaWiki',
			'height' => '42',
			'width' => '127',
		],
		'semanticmediawiki' => [
			'src' => "$wgResourceBasePath/resources/assets/badge-semanticmediawiki.svg",
			'url' => 'https://www.semantic-mediawiki.org/wiki/Semantic_MediaWiki',
			'alt' => 'Powered by Semantic MediaWiki',
			'height' => '42',
			'width' => '131',
		],
	],
	'copyright' => [
		'copyright' => [
			'src' => "$wgResourceBasePath/resources/assets/badge-ccbysa.svg",
			'url' => $wgRightsUrl,
			'alt' => $wgRightsText,
			'height' => '50',
			'width' => '110',
		],
	],
];
