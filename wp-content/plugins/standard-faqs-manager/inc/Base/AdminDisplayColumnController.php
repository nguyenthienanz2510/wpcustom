<?php

/**
 * @package Standard FAQs Manager
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class AdminDisplayColumnController extends BaseController
{

    public function register()
    {
        add_filter("manage_faq_posts_columns", array($this, 'manageFaqPostsColumns'), 10, 1);
        add_action("manage_faq_posts_custom_column", array($this, 'manageFaqPostsCustomColumn'), 10, 2);
        add_filter("manage_edit-faqs_types_columns", array($this, 'manageFaqsTypesColumns'), 10, 1);
        add_action("manage_faqs_types_custom_column", array($this, 'manageFaqsTypesCustomColumn'), 10, 3);
    }

    public function manageFaqPostsColumns($post_columns)
    {
        $post_columns['order'] = 'Order';

        return $post_columns;
    }

    public function manageFaqPostsCustomColumn($column_name, $post_id)
    {
        switch ($column_name) {
            case 'order':
                $order = get_post_meta($post_id, 'order', true);
                echo $order;
                break;
        }
    }

    public function manageFaqsTypesColumns($columns)
    {
        $columns['order'] = 'Order';

        return $columns;
    }

    public function manageFaqsTypesCustomColumn($string, $column_name, $term_id)
    {
        switch ($column_name) {
            case 'order':
                $order = get_term_meta($term_id, 'order', true);
                echo $order;
                break;
        }
    }
}
