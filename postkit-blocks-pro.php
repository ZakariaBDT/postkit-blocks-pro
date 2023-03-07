<?php
//  stop direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @package PostKit Blocks Pro
 * @version 1.0.0
 * @author  PostsKit
 * 
 * Plugin Name: Postkit Blocks Pro
 * Plugin URI: https://postkit-blocks.com
 * Description: Postkit Blocks Pro provides extra blocks for Postkit Blocks Plugin.
 * Version: 1.0.0
 * Author: BDThemes
 * Author URI: https://bdthemes.com
 * License: GPL2
 * Text Domain: postkit-blocks-pro
 * Domain Path: /languages
 */

 // require_once autoload.php
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

if( ! function_exists( 'is_plugin_active' ) ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

use PostkitBlocksPro\App;
use PostkitBlocksPro\Helper\AdminNotice;
use PostkitBlocksPro\Traits\Singleton;
use PostkitBlocksPro\Helper\BlocksCategory;

/**
 * Final class PostkitBlocks
 */
 final class PostkitBlocksPro {
    use Singleton;

    /**
     * Construct method
     */
    private function __construct() {
        // admin notice
        new AdminNotice();
        // init constants
        $this->constants();
        // App class
        new App();
        // blocks category
        new BlocksCategory();
        // load textdomain
        add_action( 'plugins_loaded', [ $this, 'load_textdomain' ] );
        // enqueue scripts for editor and frontend
        add_action( 'enqueue_block_assets', [ $this, 'enqueue_scripts' ] );
    }

    /**
     * Constants
     */
    public function constants(){
        if( ! defined( 'POSTKIT_BLOCKS_PRO_VERSION' ) ) {
            define( 'POSTKIT_BLOCKS_PRO_VERSION', '1.0.0' );
        }
        
        if( ! defined( 'POSTKIT_BLOCKS_PRO_FILE' ) ) {
            define( 'POSTKIT_BLOCKS_PRO_FILE', __FILE__ );
        }
        
        
        if( ! defined( 'POSTKIT_BLOCKS_PRO_DIR' ) ) {
            define( 'POSTKIT_BLOCKS_PRO_DIR', __DIR__ );
        }
        
        if( ! defined( 'POSTKIT_BLOCKS_PRO_PATH' ) ) {
            define( 'POSTKIT_BLOCKS_PRO_PATH', plugin_dir_path( POSTKIT_BLOCKS_PRO_FILE ) );
        }
        
        if( ! defined( 'POSTKIT_BLOCKS_PRO_URL' ) ) {
            define( 'POSTKIT_BLOCKS_PRO_URL', plugins_url( '/', POSTKIT_BLOCKS_PRO_FILE ) );
        }
        
        if( ! defined( 'POSTKIT_BLOCKS_PRO_ASSETS' ) ) {
            define( 'POSTKIT_BLOCKS_PRO_ASSETS', POSTKIT_BLOCKS_PRO_URL . 'assets/' );
        }
    }

    /**
     * Load textdomain
     *
     * @return void
     */
    public function load_textdomain() {
        load_plugin_textdomain( 'postkit-blocks-pro', false, POSTKIT_BLOCKS_PRO_PATH . '/languages' );
    }

    /**
     * Enqueue scripts
     */
    public function enqueue_scripts(){
        // code goes here....
    }
 }

// init PostkitBlocks
function postkit_blocks_pro() {
    return PostkitBlocksPro::get_instance();
}
// kick-off the plugin
postkit_blocks_pro();