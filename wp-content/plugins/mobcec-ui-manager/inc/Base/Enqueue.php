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
        wp_enqueue_style('mobcec-ui-manager-style', $this->plugin_url . 'assets/styles.css');
        wp_enqueue_script('mobcec-ui-manager-script', $this->plugin_url . 'assets/scripts.js');
    }
}
