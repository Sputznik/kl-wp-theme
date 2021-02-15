<?php

	$inc_files = array(
		'settings/class-kl-customize.php',
		'settings/general.php',
		'settings/topbar.php',
		'settings/logo.php',
		'settings/fonts.php',
		'settings/social_icons.php'
	);

	foreach( $inc_files as $inc_file ){
		require_once( $inc_file );
	}
