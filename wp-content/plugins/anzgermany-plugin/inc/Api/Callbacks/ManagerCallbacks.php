<?php

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)
    {
        $output = array();

        foreach ($this->managers as $key => $value) {
            $output[$key] = ( isset( $input[$key] ) && $input[$key] == 1 ) ? true : false;
        }

        return $output;
    }

    public function adminSectionManager()
    {
        echo 'Manage sections and features of Anz Germany';
    }

    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $class = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option($option_name);
        $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

        echo '<div class="' . $class . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" ' . ($checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    }
}
