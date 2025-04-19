<?php

// Skins

$wgDefaultSkin = "citizen";

wfLoadSkin( 'Citizen' );
wfLoadSkin( 'MinervaNeue' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Timeless' );
wfLoadSkin( 'Vector' );

// Extensions

/**
 * Next:
  *
 */

wfLoadExtensions([
  'Cite',
  'CodeEditor',
  'CodeMirror',
  'Echo',
  'SemanticMediaWiki',
  'SemanticScribunto',
  'Scribunto',
  'SyntaxHighlight_GeSHi',
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
 * VisualEditor
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
$wgDefaultUserOptions['visualeditor-tabs'] = 'visualeditor';  // or "multi-tab"

