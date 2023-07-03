<?php

/**
 *
 * @package           MobCEC Standard Banner
 * @author            Nguyen Thien An
 * @copyright         2023 MobCEC
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       MobCEC Standard Banner
 * Description:       MobCEC Standard Banner create field to add banner for post, category, product category.
 * Version:           1.0.0
 * Requires at least: 6.2.2
 * Requires PHP:      8.0
 * Author:            Nguyen Thien An
 * Author URI:        https://nguyenthienanz.vercel.app
 * Text Domain:       mobcec-ui-manager
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined('ABSPATH') or die('Hey boy, what are you doing here? You silly boy!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

function activate_mobcec_ui_manager()
{
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_mobcec_ui_manager');

function deactivate_mobcec_ui_manager()
{
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_mobcec_ui_manager');

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
