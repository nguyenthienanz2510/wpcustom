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
        add_action('faqs_types_add_form_fields', array($this, 'customAddFormFields'));
        add_action('faqs_types_edit_form_fields', array($this, 'customEditFormFields'), 10, 1);
        add_action('create_faqs_types', array($this, 'createFaqTypes'), 10, 1);
        add_action('edit_faqs_types', array($this, 'editFaqTypes'), 10, 1);
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
        include_once $this->plugin_path . 'templates/standard-faqs-manager-custom-meta-box-faq-html.php';
    }

    public function savePostData(int $post_id)
    {

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

    public function customAddFormFields()
    {
        include_once $this->plugin_path . 'templates/standard-faqs-manager-custom-add-form-fields-html.php';
    }

    public function customEditFormFields($term)
    {
        include_once $this->plugin_path . 'templates/standard-faqs-manager-custom-edit-form-fields-html.php';
    }

    public function createFaqTypes($term_id)
    {

        if ($_POST['taxonomy'] !== 'faqs_types') return;

        if (array_key_exists('image', $_POST)) {
            update_term_meta(
                $term_id,
                'image',
                $_POST['image']
            );
        }

        if (array_key_exists('order', $_POST)) {
            update_term_meta(
                $term_id,
                'order',
                $_POST['order']
            );
        }
    }

    public function editFaqTypes($term_id)
    {

        if ($_POST['taxonomy'] !== 'faqs_types') return;

        if (array_key_exists('image', $_POST)) {
            update_term_meta(
                $term_id,
                'image',
                $_POST['image']
            );
        }

        if (array_key_exists('order', $_POST)) {
            update_term_meta(
                $term_id,
                'order',
                $_POST['order']
            );
        }
    }
}
