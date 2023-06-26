<?php

/**
 * Trigger this file when Plugin uninstall
 * 
 * @package Standard FAQs Manager
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('sfm_options');

global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'faq'");
$wpdb->query("DELETE FROM wp_postsmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
