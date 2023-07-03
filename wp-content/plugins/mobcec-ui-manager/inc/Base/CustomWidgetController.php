<?php

namespace Inc\Base;

use \Inc\Api\SettingApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class CustomWidgetController extends BaseController
{
    public $settings;
    public $callbacks;
    public $subpages = array();

    public function register()
    {

        if (!$this->activated('widget_manager')) return;

        $this->settings = new SettingApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages($this->subpages)->register();
    }

    protected function setSubPages()
    {
        $this->subpages = [
            [
                'parent_slug'   => 'mobcec_ui_manager',
                'page_title'    => 'Custom Widgets',
                'menu_title'    => 'Widgets',
                'capability'    => 'manage_options',
                'menu_slug'     => 'mobcec_ui_manager_widgets',
                'callback'      => function () {
                    echo '<h1>Custom Widgets Manager</h1>';
                },
            ],
        ];
    }
}
