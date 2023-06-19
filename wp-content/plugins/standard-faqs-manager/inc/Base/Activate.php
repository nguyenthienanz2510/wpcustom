<?php

/**
 * @package Standard FAQs Manager
 */

namespace Inc\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();
    }
}
