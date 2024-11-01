<?php
global $wpdb;

if (
	!defined( 'WP_UNINSTALL_PLUGIN' )
||
	!WP_UNINSTALL_PLUGIN
||
	dirname( WP_UNINSTALL_PLUGIN ) != dirname( plugin_basename( __FILE__ ) )
) {
	status_header( 404 );
	exit;
}

//option remove
delete_option('weluka_options');
