<?php

/**
 * For more information, see the following page:
 * https://www.mediawiki.org/wiki/Manual:User_rights
 */

// Anonymous
$wgGroupPermissions['*']['edit'] = true;  # TODO: Revert after the afterwork :)
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['*']['createtalk'] = false;
$wgGroupPermissions['*']['createaccount'] = false;

// User (Any created account)
$wgGroupPermissions['user']['oathauth-enable'] = true;
