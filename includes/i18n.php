<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.cosmoswp.com/
 * @since      1.0.0
 *
 * @package     CosmosWP
 * @subpackage  CosmosWP Template Library
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package     CosmosWP
 * @subpackage  CosmosWP Template Library
 * @author     CosmosWP <info@cosmoswp.com>
 */
class Cosmoswp_Template_Library_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cosmoswp-template-library',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
}