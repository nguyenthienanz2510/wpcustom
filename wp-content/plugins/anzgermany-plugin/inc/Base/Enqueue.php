<?php

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        wp_enqueue_style('anzgermany-style', $this->plugin_url . 'assets/styles/styles.css');
        wp_enqueue_script('anzgermany-script', $this->plugin_url . 'assets/js/script.js');
    }
}
