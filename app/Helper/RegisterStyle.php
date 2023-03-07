<?php
/**
 * @package PostKit Blocks
 * All blocks callbacks
 */

namespace PostkitBlocksPro\Helper;

class RegisterStyle {
    /**
     * Register Inline Style
     */
    public function register_inline_style( $name, $style ) {
        wp_register_style(
            $name,
            false,
            [],
            POSTKIT_BLOCKS_PRO_VERSION
        );
        wp_enqueue_style( $name );
        wp_add_inline_style( $name, $style );
    }
}