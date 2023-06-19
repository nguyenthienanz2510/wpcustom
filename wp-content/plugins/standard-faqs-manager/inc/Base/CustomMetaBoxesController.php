<?php

/**
 * @package Standard FAQs Manager
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class CustomMetaBoxesController extends BaseController
{

    public function register()
    {
        add_action('add_meta_boxes', array($this, 'customMetaBox'));
        add_action('save_post', array($this, 'savePostData'));
    }

    public function customMetaBox()
    {
        $screens = ['faq'];
        foreach ($screens as $screen) {
            add_meta_box(
                'standard_faqs_manager_custom_meta_box',
                'FAQs options',
                array($this, 'customBoxHtml'),
                $screen
            );
        }
    }

    public function customBoxHtml()
    {
        include_once $this->plugin_path . 'templates/standard-faqs-manager-custom-box-html.php';
    }

    public function savePostData(int $post_id)
    {
        // echo '<pre>';
        // print_r($post_id);
        // die();

        if ($_POST['post_type'] !== 'faq') return;

        if (array_key_exists('order', $_POST)) {
            update_post_meta(
                $post_id,
                'order',
                $_POST['order']
            );
        }

        if (array_key_exists('banner_image', $_POST)) {
            update_post_meta(
                $post_id,
                'banner_image',
                $_POST['banner_image']
            );
        }

        if (array_key_exists('banner_image_xs', $_POST)) {
            update_post_meta(
                $post_id,
                'banner_image_xs',
                $_POST['banner_image_xs']
            );
        }
    }
}
