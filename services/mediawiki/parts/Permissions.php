<?php

/**
 * For more information, see the following page:
 * https://www.mediawiki.org/wiki/Manual:User_rights
 */

// Anonymous
$wgGroupPermissions['*']['edit'] = false;  # TODO: Revert after the afterwork :)
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['*']['createtalk'] = false;
$wgGroupPermissions['*']['createaccount'] = false;

// User (Any created account)
$wgGroupPermissions['user']['oathauth-enable'] = true;
