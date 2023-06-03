<?php

/**
 *
 * @package           AnzGermanyPlugin
 * @author            AnzGermany
 * @copyright         2023 AnzGermany
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       AnzGermany Plugin
 * Plugin URI:        https://example.com/anzgermany-plugin
 * Description:       AnzGermany Plugin is amazing plugin for you.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            AnzGermany
 * Author URI:        https://nguyenthienanz.vercel.app
 * Text Domain:       anzgermany-plugin
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/anzgermany-plugin
 */

defined('ABSPATH') or die('Hey boy, what are you doing here? You silly boy!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPage;

if (!class_exists('AnzGermanyPlugin')) {

    class AnzGermanyPlugin
    {

        public $plugin;

        function __construct()
        {
            $this->plugin = plugin_basename(__FILE__);

            add_action('init', array($this, 'custom_post_type'));
            // die('hahaha');

        }

        function register()
        {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));

            add_action('admin_menu', array($this, 'add_admin_pages'));

            add_filter('plugin_action_links_' . $this->plugin, array($this, 'settings_link'));
        }

        public function settings_link($links)
        {
            $settings_link = '<a href="admin.php?page=anzgermany_plugin">Setting</a>';
            array_push($links, $settings_link);
            return $links;
        }

        public function add_admin_pages()
        {
            add_menu_page('AnzGermany Plugin', 'AnzGermany', 'manage_options', 'anzgermany_plugin', array($this, 'admin_index'), 'dashicons-coffee', 10);
        }

        public function admin_index()
        {
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        protected function create_post_type()
        {
            add_action('init', array($this, 'custom_post_type'));
        }

        function custom_post_type()
        {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

        function enqueue()
        {
            wp_enqueue_style('anzgermany-style', plugins_url('/assets/styles/styles.css', __FILE__));
            wp_enqueue_style('anzgermany-script', plugins_url('/assets/js/script.js', __FILE__));
        }

        function activate()
        {
            // require_once plugin_dir_path(__FILE__) . 'inc/anzgermany-plugin-activate.php';
            Activate::activate();
        }

        function deactivate()
        {
            // require_once plugin_dir_path(__FILE__) . 'inc/anzgermany-plugin-deactivate.php';
            Deactivate::deactivate();
        }
    }

    $anzGermanyPlugin = new AnzGermanyPlugin();
    $anzGermanyPlugin->register();

    register_activation_hook(__FILE__, array($anzGermanyPlugin, 'activate'));
    register_deactivation_hook(__FILE__, array($anzGermanyPlugin, 'deactivate'));
}
