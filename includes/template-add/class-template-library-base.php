<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Cosmoswp_Template_Library_Base' ) ) {

    /**
     * Base Class For CosmosWP for common functions
     * @package CosmosWP
     * @subpackage CosmosWP Template Library
     * @since 1.0.0
     *
     */
    class Cosmoswp_Template_Library_Base{

        /**
         * Run Block
         *
         * @access public
         * @since 1.0.0
         * @return void
         */
        public function run(){

            if( method_exists( $this, 'add_demo_template_library' ) ){
                add_filter( 'cosmoswp_advanced_import_cosmoswp_template_library', array( $this, 'add_demo_template_library' ) );
                add_filter( 'advanced_import_demo_lists', array( $this, 'add_demo_template_library' ) );
            }
        }
    }
}