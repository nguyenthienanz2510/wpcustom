<?php

/**
 * @package AnzGermanyPlugin
 */

namespace Inc\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        if( get_option('mobcec_ui_manager') ) {
            return;
        }

        $default = array();

        update_option('mobcec_ui_manager', $default);
    }
}
