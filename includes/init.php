<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used to
 * add/remove/edit the functionality of the Cosmoswp_Template_Library Plugin
 *
 * @link       https://www.cosmoswp.com/
 * @since      1.0.0
 *
 * @package     CosmosWP
 * @subpackage  CosmosWP Template Library
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * functionality of the plugin
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package     CosmosWP
 * @subpackage  CosmosWP Template Library
 * @author     Cosmoswp_Template_Library <info@cosmoswp.com>
 */
class Cosmoswp_Template_Library {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Cosmoswp_Template_Library    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * Full Name of plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_full_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_full_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Main Instance
	 *
	 * Insures that only one instance of Cosmoswp_Template_Library exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 *
	 * @since    1.0.0
	 * @access   public
	 *
	 * @return object
	 */
	public static function instance() {

		// Store the instance locally to avoid private static replication
		static $instance = null;

		// Only run these methods if they haven't been ran previously
		if ( null === $instance ) {
			$instance = new Cosmoswp_Template_Library;

			do_action( 'COSMOSWP_TEMPLATE_LIBRARY_LOADED' );
		}

		// Always return the instance
		return $instance;
	}

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		if ( defined( 'COSMOSWP_TEMPLATE_LIBRARY_VERSION' ) ) {
			$this->version = COSMOSWP_TEMPLATE_LIBRARY_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = COSMOSWP_TEMPLATE_LIBRARY_PLUGIN_NAME;
		$this->plugin_full_name = esc_html__('CosmosWP Template Library','cosmoswp-template-library');

        if ( get_option( 'template' ) === 'cosmoswp') {
            $this->load_dependencies();
            $this->set_locale();
        }
        else {
            add_action( 'admin_notices', array( $this, 'cosmoswp_missing_notice' ) );
        }
	}

    /**
     * Since the plugin is created specially for CosmosWP
     * Show notice if CosmosWP theme is not installed/activated
     *
     * @since    1.0.0
     */
    public function cosmoswp_missing_notice() {

        $search_url = in_array( 'cosmoswp', array_keys( wp_get_themes()), true ) ? admin_url( 'themes.php?search=cosmoswp' ) : admin_url( 'theme-install.php?search=cosmoswp' );

        echo '<div class="error notice is-dismissible"><p><strong>' . $this->plugin_full_name . '</strong> &#8211; ' . sprintf( esc_html__( 'This plugin requires %s Theme to be activated to work.', 'cosmoswp' ), '<a href="'.esc_url( $search_url ).'">' . esc_html__('CosmosWP','cosmoswp-advance-banner'). '</a>' ) . '</p></div>';
    }


	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/i18n.php';

		/*API*/
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/api.php';

        /*Template Library Base*/
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/class-template-library-base.php';

        /*Template Library*/
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-business.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-agency.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-consultant.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-woocommerce.php';

        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-medical.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-education.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-blog.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-photography.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-construction.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-travel.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-fitness.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-restaurant.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-lawyer.php';
        require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-charity.php';
		require_once COSMOSWP_TEMPLATE_LIBRARY_PATH . 'includes/template-add/templates/class-portfolio.php';

        

		$this->loader = new Cosmoswp_Template_Library_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Cosmoswp_Template_Library_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Cosmoswp_Template_Library_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Cosmoswp_Template_Library    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}