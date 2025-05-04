<?php

// Skins

$wgDefaultSkin = "citizen";

wfLoadSkin( 'Citizen' );
// wfLoadSkin( 'MinervaNeue' );
// wfLoadSkin( 'MonoBook' );
// wfLoadSkin( 'Timeless' );
// wfLoadSkin( 'Vector' );

// Extensions

wfLoadExtensions([
  'Cite',
  'CodeEditor',
  'CodeMirror',
  'DiscussionTools',
  'Echo',
  'Interwiki',
  'Linter',
  'LoginNotify',
  'OATHAuth',
  'SecureLinkFixer',
  'SemanticMediaWiki',
  'SemanticScribunto',
  'Scribunto',
  'SyntaxHighlight_GeSHi',
  'Math',
  'Nuke',
  'TemplateData',
  'TemplateStyles',
  'TemplateStylesExtender',
  'Thanks',
  'VisualEditor',
  'WikiEditor',
]);

/**
 * Extension: CodeMirror
 */
$wgCodeMirrorV6 = true;
$wgDefaultUserOptions['usecodemirror'] = 1;

/*
NOTE: CodeMirrorV6 is completely broken in 2017 Wikitext Editor without line numbering
that's handy to know :)

$wgCodeMirrorLineNumberingNamespaces = [
	NS_TEMPLATE,
	NS_MODULE
];
*/

/**
 * Extension: ConfirmEdit
 */
$wgCaptchaTriggers['edit'] = true;
$wgCaptchaTriggers['create'] = true;
$wgCaptchaTriggers['sendemail'] = true;
$wgCaptchaTriggers['addurl'] = false;
$wgCaptchaTriggers['createaccount'] = true;
$wgCaptchaTriggers['badlogin'] = true;
$wgCaptchaTriggers['badloginperuser'] = true;

if ( getenv("ELEUTHERIA_APP_TURNSTILE_SITE_KEY") && getenv("ELEUTHERIA_APP_TURNSTILE_SECRET_KEY") ) {
  // Turnstile
  wfLoadExtensions([
    'ConfirmEdit',
    'ConfirmEdit/Turnstile',
  ]);

  $wgTurnstileSiteKey= $_ENV["ELEUTHERIA_APP_TURNSTILE_SITE_KEY"];
  $wgTurnstileSecretKey= $_ENV["ELEUTHERIA_APP_TURNSTILE_SECRET_KEY"];
} else {
  // QuestyCaptcha
  wfLoadExtensions([
    'ConfirmEdit',
    'ConfirmEdit/QuestyCaptcha'
  ]);

  $wgCaptchaQuestions = [
    'Quel est le nom de ce site ?' => [ 'eleutheria' ],
    'Quel est la capitale de la France ?' => [ 'paris' ],
    "Quand s'est déroulé la Pride 2024 à Strasbourg ?" => [ '15 juin', '15/06', '15 06', '06/15', '06 15', 'juin', 'juin 15' ],
    "Quel est le nom du jouet, souvent associé à la communauté LGBTQIA+, à forme de requin ?" => [ 'blåhaj', 'blahaj' ],
  ];
};


/**
 * Extension: DiscussionTools
 */
$wgDiscussionTools_replytool = 'available';
$wgDiscussionTools_newtopictool = 'available';
$wgDiscussionTools_sourcemodetoolbar = 'available';
$wgDiscussionTools_topicsubscription = 'available';
$wgDiscussionTools_autotopicsub = 'available';
$wgDiscussionTools_visualenhancements = 'available';
$wgDiscussionTools_visualenhancements_namespaces = true;
$wgDiscussionTools_visualenhancements_pageframe = 'available';
$wgDiscussionTools_visualenhancements_reply = 'available';
// $wgDiscussionToolsEnable2017Wikitext = true;

/**
 * Extension: OATHAuth
 */
$wgOATHAuthWindowRadius = 2;

/**
 * Extension: Semantic MediaWiki
 */
enableSemantics($_ENV['ELEUTHERIA_APP_URL']);

/**
 * Extension: Scribunto
 */
$wgScribuntoDefaultEngine = 'luasandbox';
$wgScribuntoEngineConf['luasandbox']['memoryLimit'] = 50 * 1024 * 1024; // 50 MB
$wgScribuntoEngineConf['luasandbox']['cpuLimit'] = 10; // Seconds
$wgScribuntoGatherFunctionStats = true;

/**
 * Extension: SyntaxHighlight
 */
$wgSyntaxHighlightMaxLines = 250;

/**
 * Extension: Parsoid
 * Require explicit loading for Linter
 */
wfLoadExtension( 'Parsoid', "$IP/vendor/wikimedia/parsoid/extension.json" );
$wgParsoidSettings = [
	'useSelser' => true,
	'linting'   => true
];

/**
 * Extension: Math
 */
$wgMathValidModes = [ 'mathml' ];
$wgDefaultUserOptions['math'] = 'mathml';
$wgMathUseInternalRestbasePath = false;
$wgMathFullRestbaseURL = 'https://wikimedia.org/api/rest_';
$wgMathMathMLUrl = 'https://mathoid-beta.wmflabs.org';

/**
 * Extension: TemplateStyles
 */
$wgTemplateStylesAllowedUrls = [
	'audio' => [
    "<^https://upload\\.wikimedia\\.org/wikipedia/commons/>",
	],
	'image' => [
    "<^https://upload\\.wikimedia\\.org/wikipedia/commons/>",
	],
	'svg' => [
    "<^https://upload\\.wikimedia\\.org/wikipedia/commons/[^?#]*\\.svg(?:[?#]|$)>",
		'<^https://wiki\\.t4t\\.one/[^?#]*\\.svg(?:[?#]|$)>',
	],
	'font' => [
		'<^https://wiki\\.t4t\\.one/>',
	],
	'namespace' => [
		'<.>',
	],
	'css' => [],
];
$wgTemplateStylesNamespaces = [
	NS_TEMPLATE => true,
	// NS_MODULE => true,  // ?
];


/**
 * Extension: VisualEditor
 */

// Enable Visual Editor by default
$wgDefaultUserOptions['visualeditor-enable'] = 1;
$wgPrefs[] = 'visualeditor-enable';

// Edit checking. See https://www.mediawiki.org/wiki/Edit_check
$wgVisualEditorEditCheck = false;  // could come in handy later.
// Allow the 2017 wiki text mode. See https://www.mediawiki.org/wiki/Edit_check
$wgVisualEditorEnableWikitext = true;
$wgDefaultUserOptions['visualeditor-newwikitext'] = 1;

$wgVisualEditorUseSingleEditTab = true;
$wgDefaultUserOptions['visualeditor-editor'] = 'visualeditor';
