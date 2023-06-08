<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingApi;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{
    public $settings;

    public $pages;

    public $subpages;

    public $callbacks;

    public $callbacks_manager;

    public function register()
    {
        $this->settings = new SettingApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_manager = new ManagerCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

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
                'callback'      => array($this->callbacks, 'adminDashboard'),
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

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'anzgermany_plugin_settings',
                'option_name' => 'anzgermany_plugin',
                'callback' => array($this->callbacks_manager, 'checkboxSanitize')
            )
        );

        $this->settings->addSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'anzgermany_admin_index',
                'title' => 'Setting Manager',
                'callback' => array($this->callbacks_manager, 'adminSectionManager'),
                'page' => 'anzgermany_plugin'
            ),
        );

        $this->settings->addSections($args);
    }

    public function setFields()
    {
        $args = array();

        foreach ($this->managers as $key => $value) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array($this->callbacks_manager, 'checkboxField'),
                'page' => 'anzgermany_plugin',
                'section' => 'anzgermany_admin_index',
                'args' => array(
                    'option_name' => 'anzgermany_plugin',
                    'label_for' => $key,
                    'class'   => 'anz-toggle',
                )
            );
        }

        $this->settings->addFields($args);
    }
}
