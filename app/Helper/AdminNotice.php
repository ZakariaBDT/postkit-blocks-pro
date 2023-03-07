<?php

namespace PostkitBlocksPro\Helper;

class AdminNotice {

    /**
     * AdminNotice constructor.
     */
    public function __construct() {
        add_action( 'admin_notices', [ $this, 'admin_notice' ] );
    }

    /**
     * Admin notice
     */
    public function admin_notice() {

        /**
         * Load plugin.php file
         * to use is_plugin_active() function
         */
        if( ! function_exists( 'is_plugin_active' ) ) {
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }

        /**
         *  Check if Postkit Blocks plugin is active
         */

        if ( ! is_plugin_active( 'postkit-blocks/postkit-blocks.php' ) ) {
            ?>
            <div class="notice notice-error is-dismissible">
                <p><?php _e( 'Postkit Blocks Pro needs Postkit Blocks plugin to be installed and activated.', 'postkit-blocks-pro' ); ?></p>
            </div>
            <?php
        }
    }
}