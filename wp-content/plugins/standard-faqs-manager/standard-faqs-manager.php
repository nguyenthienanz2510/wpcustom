<?php

/**
 *
 * @package           Standard FAQs Manager
 * @author            Andree Nguyen
 * @copyright         2023 Andree Nguyen
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Standard FAQs Manager
 * Plugin URI:        https://example.com/standard-faqs-manager
 * Description:       Standard FAQs Manager is amazing plugin for you.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Andree Nguyen
 * Author URI:        https://nguyenthienanz.vercel.app/portfolio
 * Text Domain:       standard-faqs-manager
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/standard-faqs-manager
 */

defined('ABSPATH') or die('Hey boy, what are you doing here? You silly boy!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

function activate_standard_faqs_manager()
{
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_standard_faqs_manager');

function deactivate_standard_faqs_manager()
{
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_standard_faqs_manager');

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
