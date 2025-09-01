<?php

/**
 * For more information, see the following page:
 * https://www.mediawiki.org/wiki/Manual:User_rights
 */

// Anonymous
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['*']['createtalk'] = false;
$wgGroupPermissions['*']['createaccount'] = true;

// User (Any created account)
$wgGroupPermissions['user']['oathauth-enable'] = true;

// Administrators
$wgGroupPermissions['sysop']['interwiki'] = true;
