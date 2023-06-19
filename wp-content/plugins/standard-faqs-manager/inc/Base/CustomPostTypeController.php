<?php

/**
 * @package Standard FAQs Manager
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class CustomPostTypeController extends BaseController
{

    public $custom_post_types = array();

    public $custom_taxonomies = array();

    public function register()
    {
        $this->storeCustomPostType();
        $this->storeCustomTaxonomies();

        if ($this->custom_post_types) {
            add_action('init', array($this, 'registerCustomPostTypes'));
        }

        if ($this->custom_taxonomies) {
            add_action('init', array($this, 'registerTaxonomy'));
        }
    }

    public function storeCustomPostType()
    {
        $this->custom_post_types = array(
            array(
                'post_type'     => 'faq',
                'args' => array(
                    'labels'        => array(
                        'name'          => __('FAQs', 'standard-faqs-manager'),
                        'singular_name' => __('FAQ', 'standard-faqs-manager'),
                    ),
                    'public'        => true,
                    'has_archive'   => true,
                    'rewrite'       => array('slug' => 'faq'),
                    'supports'      => array('title', 'editor', 'thumbnail', 'excerpt'),
                    'menu_icon'     => 'dashicons-format-chat'
                ),

            )
        );
    }

    public function registerCustomPostTypes()
    {
        foreach ($this->custom_post_types as $post_type) {
            register_post_type($post_type['post_type'], $post_type['args']);
        }
    }

    public function storeCustomTaxonomies()
    {
        $this->custom_taxonomies   = array(
            array(
                'taxonomy_name' => 'faqs_types',
                'object_type'   => 'faq',
                'args'          => array(
                    'hierarchical'      => false,
                    'labels'            => array(
                        'name'              => _x('FAQs Types', 'taxonomy general name'),
                        'singular_name'     => _x('FAQs Type', 'taxonomy singular name'),
                        'search_items'      => __('Search FAQs Types', 'standard-faqs-manager'),
                        'all_items'         => __('All FAQs Types', 'standard-faqs-manager'),
                        'edit_item'         => __('Edit FAQs Type', 'standard-faqs-manager'),
                        'update_item'       => __('Update FAQs Type', 'standard-faqs-manager'),
                        'add_new_item'      => __('Add New FAQs Type', 'standard-faqs-manager'),
                        'new_item_name'     => __('New FAQs Type Name', 'standard-faqs-manager'),
                        'menu_name'         => __('FAQs Types', 'standard-faqs-manager'),
                    ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
                    'rewrite'           => ['slug' => 'faqs-type'],
                )
            )
        );
    }

    public function registerTaxonomy()
    {
        foreach ($this->custom_taxonomies as $taxonomy) {
            register_taxonomy($taxonomy['taxonomy_name'], $taxonomy['object_type'], $taxonomy['args']);
        }
    }
}
