<?php
/**
* Plugin Name: Nucleo Webfonts
* Plugin URI: https://github.com/FreshySitesSupport/nucleo-webfonts
* Description: Adds Nucleo Webfonts
* Version: 2.9.0.2
* Author: FreshySites
* Author URI: https://freshysites.com/
* License: GNU v3.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/* Nucleo Webfonts Start */
//______________________________________________________________________________


/**
 * The version number and path for this release of the plugin.
 * This will later be used for upgrades and enqueuing files
 *
 * The NUCLEO_VERSION should be set to the plugin 'Version' value,
 * as defined above in the plugin header
 *
 * The NUCLEO_VERSION_FOLDER should be set to the main version folder where
 * all the current font assetts reside
 */
define( 'NUCLEO_VERSION', '2.9.0.2' );
define( 'NUCLEO_VERSION_FOLDER', 'nucleo-webfonts-2-9');
define( 'EXTERNAL_CDN_PATH', 'https://cdn.freshysites.com/wp-content/global/nucleo-webfonts');
define( 'NUCLEO_GLYPH_PATH', '/glyph/css/nucleo-glyph.css');
define( 'NUCLEO_MINI_PATH', '/mini/css/nucleo-mini.css');
define( 'NUCLEO_OUTLINE_PATH', '/outline/css/nucleo-outline.css');
define( 'NUCLEO_GLYPH_DEMO_PATH', '/glyph/demo.html');
define( 'NUCLEO_MINI_DEMO_PATH', '/mini/demo.html');
define( 'NUCLEO_OUTLINE_DEMO_PATH', '/outline/demo.html');

// Load CSS files based on if CDN file is available and/or the user checked the Local fileset box in settings
add_action( 'wp_enqueue_scripts', 'fs_nucleo_assets' );
function fs_nucleo_assets() {

		wp_enqueue_style( 'nucleo-glyph', plugins_url( NUCLEO_VERSION_FOLDER . NUCLEO_GLYPH_PATH, __FILE__ ), false, NUCLEO_VERSION );
		wp_enqueue_style( 'nucleo-mini', plugins_url( NUCLEO_VERSION_FOLDER . NUCLEO_MINI_PATH, __FILE__ ), false, NUCLEO_VERSION  );
		wp_enqueue_style( 'nucleo-outline', plugins_url( NUCLEO_VERSION_FOLDER . NUCLEO_OUTLINE_PATH, __FILE__ ), false, NUCLEO_VERSION  );
}

/* add links to plugin page meta area */
add_filter( 'plugin_row_meta', 'fs_nucleo_demo_links', 10, 2 );
function fs_nucleo_demo_links( $links, $file ) {
	if ( strpos( $file, 'nucleo-webfonts.php' ) !== false ) {
			$new_links = array(
				'glyph-demo' => '<a href="'. plugins_url( NUCLEO_VERSION_FOLDER . NUCLEO_GLYPH_DEMO_PATH, __FILE__ ) .'" target="_blank" title="View all glyph icons">Glyph Demo</a>',
				'mini-demo' => '<a href="'. plugins_url( NUCLEO_VERSION_FOLDER . NUCLEO_MINI_DEMO_PATH, __FILE__ ) .'" target="_blank" title="View all mini icons">Mini Demo</a>',
				'outline-demo' => '<a href="'. plugins_url( NUCLEO_VERSION_FOLDER . NUCLEO_OUTLINE_DEMO_PATH, __FILE__ ) . '" target="_blank" title="View all outline icons">Outline Demo</a>',
				'nucleo-app' => '<a href="https://nucleoapp.com/app/" target="_blank" title="Go to the Nucleo site app">Nucleo App</a>'
			);
			$links = array_merge( $links, $new_links );
	}
	return $links;
}



//______________________________________________________________________________
// All About Updates

//  Begin Version Control | Auto Update Checker
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
// ***IMPORTANT*** Update this path to New Github Repository Master Branch Path
	'https://github.com/FreshySitesSupport/nucleo-webfonts',
	__FILE__,
// ***IMPORTANT*** Update this to New Repository Master Branch Path
	'nucleo-webfonts'
);
//Enable Releases
$myUpdateChecker->getVcsApi()->enableReleaseAssets();
//Optional: If you're using a private repository, specify the access token like this:
//
//
//Future Update Note: Comment in these sections and add token and branch information once private git established
//
//
//$myUpdateChecker->setAuthentication('your-token-here');
//Optional: Set the branch that contains the stable release.
//$myUpdateChecker->setBranch('stable-branch-name');

//______________________________________________________________________________
/* Nucleo Webfonts End */
?>
