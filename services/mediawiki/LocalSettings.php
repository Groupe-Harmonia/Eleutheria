<?php

/**
 *  _____ _         _   _           _
 * |   __| |___ _ _| |_| |_ ___ ___|_|___
 * |   __| | -_| | |  _|   | -_|  _| | .'|
 * |_____|_|___|___|_| |_|_|___|_| |_|__,|
 *
 * LocalSettings definition
 *
 * @see https://www.mediawiki.org/wiki/Manual:LocalSettings.php Documentation
 * @link https://wiki.t4t.one/ Offical site
 * @link https://discord.gg/hfuJygskN2 Contact us
 */

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

// LSS is standing for Local Settings Snippets
$LSS = $IP . '/ls_snippets';

$wgShowExceptionDetails = true;

require_once "$LSS/Site.php";
require_once "$LSS/Logos.php";
require_once "$LSS/Email.php";
require_once "$LSS/Database.php";
// require_once $LSS . '/Site.php';
// require_once $LSS . '/Logos.php';
// require_once $LSS . '/Email.php';
// require_once $LSS . '/Database.php';

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = [];

require_once "$LSS/Site.php";


## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

$wgDiff3 = "/usr/bin/diff3";

require_once "$LSS/Extensions.php";
