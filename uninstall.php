<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

function mediawiki_delete_plugin() {
	delete_option('cms2cms-mediawiki-login');
	delete_option('cms2cms-mediawiki-key');
	delete_option('cms2cms-mediawiki-depth');
	removeBridge();
}

function removeBridge()
{
	global $wp_filesystem;
	$bridgeFolder = ABSPATH . 'cms2cms';
	if ($wp_filesystem->is_dir($bridgeFolder)) {
		$wp_filesystem->delete($bridgeFolder, true);
	} else {
		return new WP_Error('writing_error', 'Cannot Remove bridge folder');
	}
}

mediawiki_delete_plugin();