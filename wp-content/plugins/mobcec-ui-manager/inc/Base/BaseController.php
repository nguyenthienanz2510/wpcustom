<?php

namespace Inc\Base;

class BaseController
{
    public $plugin_path;
    public $plugin_url;
    public $plugin_basename;
    public $managers = array();

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin_basename = plugin_basename(dirname(__FILE__, 3) . '/mobcec-ui-manager.php');

        $this->managers = array(
            'cpt_manager' => "CPT Manager",
            'taxonomy_manager' => "Taxonomy Manager",
            'widget_manager' => "Widget Manager",
        );
    }

    protected function activated(string $key)
    {
        $option = get_option('mobcec_ui_manager');
        return isset($option[$key]) ? $option[$key] : false;
    }
}
