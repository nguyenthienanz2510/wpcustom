<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingApi;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $pages;

    public $subpages;

    public $callbacks;

    public function register()
    {
        $this->settings = new SettingApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    protected function setPages()
    {
        $this->pages = [
            [
                'page_title'    => 'AnzGermany Plugin',
                'menu_title'    => 'AnzGermany',
                'capability'    => 'manage_options',
                'menu_slug'     => 'anzgermany_plugin',
                'callback'      => array( $this->callbacks, 'adminDashboard' ),
                'icon_url'      => 'dashicons-coffee',
                'position'      => 10
            ]
        ];
    }

    protected function setSubPages()
    {
        $this->subpages = [
            [
                'parent_slug'   => 'anzgermany_plugin',
                'page_title'    => 'Custom Post Types',
                'menu_title'    => 'CPT',
                'capability'    => 'manage_options',
                'menu_slug'     => 'anzgermany_cpt',
                'callback'      => function () {
                    echo '<h1>Custom Post Types Manager</h1>';
                },
            ],
            [
                'parent_slug'   => 'anzgermany_plugin',
                'page_title'    => 'Custom Taxonomies',
                'menu_title'    => 'Taxonomies',
                'capability'    => 'manage_options',
                'menu_slug'     => 'anzgermany_taxonomies',
                'callback'      => function () {
                    echo '<h1>Custom Taxonomies Manager</h1>';
                },
            ],
            [
                'parent_slug'   => 'anzgermany_plugin',
                'page_title'    => 'Custom Widgets',
                'menu_title'    => 'Widgets',
                'capability'    => 'manage_options',
                'menu_slug'     => 'anzgermany_widgets',
                'callback'      => function () {
                    echo '<h1>Custom Widgets Manager</h1>';
                },
            ]
        ];
    }
}
