<?php
/**
 * Class to register blocks
 */

namespace PostkitBlocksPro\Helper;

class BlocksRegister {
    /**
     * Register block
     *
     * @return void
     */
    public function register_block( $name, $args = [] ) {
        register_block_type(
            POSTKIT_BLOCKS_PRO_DIR . './build/blocks/' . $name,
            $args
        );
    }

}