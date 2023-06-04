<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingApi;

class Admin extends BaseController
{
    public $settings;
    public $pages;

    public $subpages;

    public function __construct()
    {
        $this->settings = new SettingApi();

        $this->pages = [
            [
                'page_title'    => 'AnzGermany Plugin',
                'menu_title'    => 'AnzGermany',
                'capability'    => 'manage_options',
                'menu_slug'     => 'anzgermany_plugin',
                'callback'      => function () {
                    echo '<h1>AnzGermany Plugin</h1>';
                },
                'icon_url'      => 'dashicons-coffee',
                'position'      => 10
            ]
        ];

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

    public function register()
    {
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }
}
