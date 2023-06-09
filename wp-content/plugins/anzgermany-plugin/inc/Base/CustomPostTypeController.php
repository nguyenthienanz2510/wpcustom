<?php

namespace Inc\Base;

use \Inc\Api\SettingApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class CustomPostTypeController extends BaseController
{
    public $settings;
    public $callbacks;
    public $subpages = array();

    public function register () {
        
        if (! $this->activated('cpt_manager')) return;

        $this->settings = new SettingApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages($this->subpages)->register();

        add_action('init', array($this, 'activate'));
    }

    protected function setSubPages()
    {
        $this->subpages = [
            [
                'parent_slug'   => 'anzgermany_plugin',
                'page_title'    => 'Custom Post Types',
                'menu_title'    => 'CPT Manager',
                'capability'    => 'manage_options',
                'menu_slug'     => 'anzgermany_cpt',
                'callback'      => function () {
                    echo '<h1>Custom Post Types Manager</h1>';
                },
            ],
        ];
    }

    public function activate () {
        register_post_type('anz_post', array(
            'labels' => array(
                'name' => 'Anz posts',
                'singular_name' => 'Anz post',
            ),
            'public' => true,
            'has_archive' => true
        ));
    }
}