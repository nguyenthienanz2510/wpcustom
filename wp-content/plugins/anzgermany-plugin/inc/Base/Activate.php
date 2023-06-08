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

        if( get_option('anzgermany_plugin') ) {
            return;
        }

        $default = array();

        update_option('anzgermany_plugin', $default);
    }
}
