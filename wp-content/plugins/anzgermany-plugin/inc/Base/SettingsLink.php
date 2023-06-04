<?php

namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLink extends BaseController
{

    public function register()
    {
        add_filter("plugin_action_links_$this->plugin_basename", array($this, 'settings_link'));
    }

    public function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=anzgermany_plugin">Setting</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
