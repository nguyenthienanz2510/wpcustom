<?php

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once $this->plugin_path . '/templates/admin.php';
    }

    public function anzgermanyOptionsGroup($input)
    {
        return $input;
    }

    public function anzgermanyAdminSection()
    {
        echo 'anzgermanyAdminSection Callback';
    }

    public function anzgermanyAdminField()
    {
        $value = esc_attr(get_option('anzgermany_options_name'));

        echo '<input type="text" class="regular-text" name="anzgermany_options_name" value="' . $value . '" placeholder="Write something here" />';
    }
}
