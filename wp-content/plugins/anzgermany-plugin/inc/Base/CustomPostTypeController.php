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

    public $custom_post_types = array();

    public function register()
    {

        if (!$this->activated('cpt_manager')) return;

        $this->settings = new SettingApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages($this->subpages)->register();

        $this->storeCustomPostType();

        if ($this->custom_post_types) {
            add_action('init', array($this, 'registerCustomPostTypes'));
        }
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

    public function storeCustomPostType()
    {
        $this->custom_post_types = array(
            array(
                'post_type' => 'anz_post',
                'name' => 'Anz posts',
                'singular_name' => 'Anz post',
                'public' => true,
                'has_archive' => true
            ),
            array(
                'post_type' => 'anz_book',
                'name' => 'Anz books',
                'singular_name' => 'Anz book',
                'public' => true,
                'has_archive' => true
            )
        );
    }

    public function registerCustomPostTypes()
    {
        foreach ($this->custom_post_types as $post_type) {
            register_post_type($post_type['post_type'], array(
                'labels' => array(
                    'name' => $post_type['name'],
                    'singular_name' => $post_type['singular_name'],
                ),
                'public' => $post_type['public'],
                'has_archive' => $post_type['has_archive']
            ));
        }
    }
}
