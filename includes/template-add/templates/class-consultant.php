<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Cosmoswp_Template_Library_Consultant' ) ) {

    /**
     * Functions related to About Block
     * @package CosmosWP
     * @since 1.0.0
     *
     */

    class Cosmoswp_Template_Library_Consultant extends Cosmoswp_Template_Library_Base{
        
        /**
         * Gets an instance of this object.
         * Prevents duplicate instances which avoid artefacts and improves performance.
         *
         * @static
         * @access public
         * @since 1.0.0
         * @return object
         */
        public static function get_instance() {

            // Store the instance locally to avoid private static replication
            static $instance = null;

            // Only run these methods if they haven't been ran previously
            if ( null === $instance ) {
                $instance = new self();
            }

            // Always return the instance
            return $instance;

        }

        /**
         * Load block library
         * Used for blog template loading
         *
         * @since      1.0.0
         * @package    CosmosWP
         * @author     CosmosWP <info@cosmoswp.com>
         *
         * @param $templates_list array
         * @return array
         */
        public function add_demo_template_library( $templates_list ){

            $demo_list = array(
                3 => array(
                    'title' => __( 'Consultant 1', 'cosmoswp' ),/*Title*/
                    'is_pro' => false,/*Premium*/
                    'type' => 'gutentor',/*Optional eg gutentor, elementor or other page builders*/
                    'author' => __( 'CosmosWP', 'cosmoswp' ),/*Author Name*/
                    'keywords' => array( 'main', 'demo' ),/*Search keyword*/
                    'categories' => array( 'consultant','multipurpose' ),/*Categories*/
                    'template_url' => array(
                        'content' => COSMOSWP_TEMPLATE_LIBRARY_URL.'includes/template-data/consultant/consultant-1/content.json',
                        'options' => COSMOSWP_TEMPLATE_LIBRARY_URL.'includes/template-data/consultant/consultant-1/options.json',
                        'widgets' => COSMOSWP_TEMPLATE_LIBRARY_URL.'includes/template-data/consultant/consultant-1/widgets.json'
                    ),
                    'screenshot_url' => COSMOSWP_TEMPLATE_LIBRARY_URL.'includes/template-data/consultant/consultant-1/screenshot.jpg',/*Screenshot of block*/

                    'demo_url' => 'https://www.demo.cosmoswp.com/demo-3/',/*Demo Url*/
                    'plugins' => array(
                        array(
                            'name'      => 'Gutentor',
                            'slug'      => 'gutentor',
                        ),
                        array(
                            'name'      => 'Contact Form 7',
                            'slug'      => 'contact-form-7',
                            'main_file' => 'wp-contact-form-7.php',
                        ),
                    )
                ),
            );

            return array_merge( $templates_list, $demo_list );
        }
    }
}
Cosmoswp_Template_Library_Consultant::get_instance()->run();