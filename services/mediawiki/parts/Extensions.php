<?php

// Skins

$wgDefaultSkin = "citizen";

wfLoadSkin( 'Citizen' );
wfLoadSkin( 'MinervaNeue' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Timeless' );
wfLoadSkin( 'Vector' );

// Extensions

wfLoadExtension( 'SemanticMediaWiki' );
enableSemantics( 'http://localhost' );
