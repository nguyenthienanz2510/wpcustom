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

function activate_anzgermany_plugin()
{
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_anzgermany_plugin');

function deactivate_anzgermany_plugin()
{
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_anzgermany_plugin');

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
