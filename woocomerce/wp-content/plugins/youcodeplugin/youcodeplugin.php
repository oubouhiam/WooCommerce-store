<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              mednoor.blogspot.com
 * @since             1.0.0
 * @package           Youcodeplugin
 *
 * @wordpress-plugin
 * Plugin Name:       YouCodeP
 * Plugin URI:        https://www.YouCodeP.com
 * Description:       This is the first plugin I ever created. enjoy with it.
 * Version:           1.0.0
 * Author:            Mohamed Oubouhia
 * Author URI:        https://www.mednoor.blogspot.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       youcodeplugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
function addPluginAdminMenu(){
	//menu
	add_action('admin_menu', array( $this, 'addPluginAdminMenu' ), 9);  
}
  
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'YOUCODEPLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-youcodeplugin-activator.php
 */
function activate_youcodeplugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-youcodeplugin-activator.php';
	Youcodeplugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-youcodeplugin-deactivator.php
 */
function deactivate_youcodeplugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-youcodeplugin-deactivator.php';
	Youcodeplugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_youcodeplugin' );
register_deactivation_hook( __FILE__, 'deactivate_youcodeplugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-youcodeplugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_youcodeplugin() {

	$plugin = new Youcodeplugin();
	$plugin->run();

}
run_youcodeplugin();
