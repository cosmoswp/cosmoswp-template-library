<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

/**
 *
 * @link              https://www.cosmoswp.com/
 * @since             1.0.0
 * @package           CosmosWP
 * @subpackage        CosmosWP Template Library
 *
 * @wordpress-plugin
 * Plugin Name:       CosmosWP Template Library : Professional Free Template Library for CosmosWP Theme
 * Description:       Explore dozens of beautifully designed free website elements, blocks and full templates. Create your masterpiece website in few clicks.
 * Version:           1.0.0
 * Author:            CosmosWP
 * Author URI:        https://www.cosmoswp.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cosmoswp-template-library
 * Domain Path:       /languages
 */

/*Define Constants for this plugin*/
define( 'COSMOSWP_TEMPLATE_LIBRARY_VERSION', '1.0.0' );
define( 'COSMOSWP_TEMPLATE_LIBRARY_PLUGIN_NAME', 'cosmoswp-template-library' );
define( 'COSMOSWP_TEMPLATE_LIBRARY_PATH', plugin_dir_path( __FILE__ ) );
define( 'COSMOSWP_TEMPLATE_LIBRARY_URL', 'https://raw.githubusercontent.com/cosmoswp/cosmoswp-template-library/master/' );
define( 'COSMOSWP_TEMPLATE_LIBRARY_SCRIPT_PREFIX', ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cosmoswp-activator.php
 */
function activate_cosmoswp_template_library() {
    require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/activator.php';
    Cosmoswp_Template_Library_Activator::activate();
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/init.php';

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cosmoswp-deactivator.php
 */
function deactivate_cosmoswp_template_library() {
    require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/deactivator.php';
    Cosmoswp_Template_Library_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cosmoswp_template_library' );
register_deactivation_hook( __FILE__, 'deactivate_cosmoswp_template_library' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
if( !function_exists( 'run_cosmoswp_template_library')){

    function run_cosmoswp_template_library() {

        return Cosmoswp_Template_Library::instance();
    }
    run_cosmoswp_template_library()->run();
}