<?php
/**
 * Plugin Name:     Mail Editor
 * Plugin URI:      https://juvo-design.de
 * Description:     JUVO Mail Editor helps to configure the standard mail notification system of WordPress
 * Author:          JUVO Webdesign - Justin Vogt
 * Author URI:      https://juvo-design.de
 * Text Domain:     juvo-mail-editor
 * Domain Path:     /languages
 * Version:         
 */

use JUVO_MailEditor\Activator;
use JUVO_MailEditor\Deactivator;
use JUVO_MailEditor\Mail_Editor;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'JUVO_MAIL_EDITOR_VERSION', '1.0.0' );


/**
 * Plugin absolute path
 */
define( 'JUVO_MAIL_EDITOR_PATH', plugin_dir_path( __FILE__ ) );
define( 'JUVO_MAIL_EDITOR_URL', plugin_dir_url( __FILE__ ) );

/**
 * Use Composer PSR-4 Autoloading
 */
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_juvo_mail_editor() {
	Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_juvo_mail_editor() {
	Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_juvo_mail_editor' );
register_deactivation_hook( __FILE__, 'deactivate_juvo_mail_editor' );


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_juvo_mail_editor() {

	$plugin = new Mail_Editor();
	$plugin->run();

}

run_juvo_mail_editor();

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://plugins.juvo-design.de/juvo-mail-editor/details.json',
	__FILE__,
	'juvo-mail-editor'
);