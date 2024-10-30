<?php
// If uninstall was not called from WordPress, exit!
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit;

// Cleaning up
unlink(WP_CONTENT_DIR . '/bp-template-overloads/' );

