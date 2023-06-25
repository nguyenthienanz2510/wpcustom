<?php

/**
 * @package Standard FAQs Manager
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class AdminSettingsController extends BaseController
{

    public function register()
    {
        add_action('admin_menu', array($this, 'add_faq_submenu'));
        add_action('admin_init', array($this, 'standard_faqs_manager_settings_init'));
    }

    public function add_faq_submenu()
    {
        add_submenu_page(
            'edit.php?post_type=faq',
            'FAQ Settings',
            'Settings',
            'manage_options',
            'faq-settings',
            array($this, 'faq_settings_page'),
        );
    }

    public function faq_settings_page()
    {
        // include_once $this->plugin_path . 'templates/standard-faqs-manager-settings-page-html.php';

        if (!current_user_can('manage_options')) {
            return;
        }

        if (isset($_GET['settings-updated'])) {
            add_settings_error('wporg_messages', 'wporg_message', __('Settings Saved', 'wporg'), 'updated');
        }

        settings_errors('wporg_messages');
?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields('standard_faqs_manager_settings_page');
                do_settings_sections('standard_faqs_manager_settings_page');
                submit_button('Save Settings');
                ?>
            </form>
        </div>
        <?php
    }

    public function standard_faqs_manager_settings_init()
    {
        register_setting('standard_faqs_manager_settings_page', 'standard_faqs_manager_options');

        add_settings_section(
            'standard_faqs_manager_section_general',
            __('Standard Faqs Manager general options', 'standard-faqs-manager'),
            array($this, 'standard_faqs_manager_section_general_callback'),
            'standard_faqs_manager_settings_page'
        );

        add_settings_field(
            'standard_faqs_manager_field_quantity_faqs_display_per_section_faqs_type',
            __('Quantity Faqs display per Section Faqs Type', 'standard-faqs-manager'),
            array($this, 'standard_faqs_manager_field_render'),
            'standard_faqs_manager_settings_page',
            'standard_faqs_manager_section_general',
            array(
                'label_for'         => 'standard_faqs_manager_field_quantity_faqs_display_per_section_faqs_type',
                'type'              => 'number',
                'class'             => 'form-control regular-text',
            )
        );

        add_settings_field(
            'standard_faqs_manager_field_quantity_faqs_display_per_faqs_type_page',
            __('Quantity Faqs display per Faqs Type Page', 'standard-faqs-manager'),
            array($this, 'standard_faqs_manager_field_render'),
            'standard_faqs_manager_settings_page',
            'standard_faqs_manager_section_general',
            array(
                'label_for'         => 'standard_faqs_manager_field_quantity_faqs_display_per_faqs_type_page',
                'type'              => 'number',
                'class'             => 'form-control regular-text',
            )
        );

        add_settings_field(
            'standard_faqs_manager_field_quantity_related_faqs_display',
            __('Quantity Related Faqs display', 'standard-faqs-manager'),
            array($this, 'standard_faqs_manager_field_render'),
            'standard_faqs_manager_settings_page',
            'standard_faqs_manager_section_general',
            array(
                'label_for'         => 'standard_faqs_manager_field_quantity_related_faqs_display',
                'type'              => 'number',
                'class'             => 'form-control regular-text',
            )
        );

        add_settings_section(
            'standard_faqs_manager_section_typography',
            __('Standard Faqs Manager Typography options', 'standard-faqs-manager'),
            array($this, 'standard_faqs_manager_section_typography_callback'),
            'standard_faqs_manager_settings_page'
        );

        add_settings_field(
            'standard_faqs_manager_field_heading_color',
            __('Heading color', 'standard-faqs-manager'),
            array($this, 'standard_faqs_manager_field_render'),
            'standard_faqs_manager_settings_page',
            'standard_faqs_manager_section_typography',
            array(
                'label_for'         => 'standard_faqs_manager_field_heading_color',
                'type'              => 'text',
                'class'             => 'form-control regular-text',
            )
        );

        add_settings_field(
            'standard_faqs_manager_field_text_color',
            __('Text color', 'standard-faqs-manager'),
            array($this, 'standard_faqs_manager_field_render'),
            'standard_faqs_manager_settings_page',
            'standard_faqs_manager_section_typography',
            array(
                'label_for'         => 'standard_faqs_manager_field_text_color',
                'type'              => 'text',
                'class'             => 'form-control regular-text',
            )
        );
    }

    public function standard_faqs_manager_section_general_callback()
    {
        echo '<p>Standard Faqs Manager General options</p>';
    }

    public function standard_faqs_manager_section_typography_callback()
    {
        echo '<p>Standard Faqs Manager Typography options</p>';
    }

    public function standard_faqs_manager_field_render($args)
    {
        $type = isset($args['type']) ? $args['type'] : 'text';
        $options = get_option('standard_faqs_manager_options');

        switch ($type) {
            case 'text':
        ?>
                <input type="text" name="standard_faqs_manager_options[<?= $args['label_for'] ?>]" value="<?= $options[$args['label_for']]?>" class="<?= $args['class'] ?>" />
            <?php
                break;
            case 'number':
            ?>
                <input type="number" name="standard_faqs_manager_options[<?= $args['label_for'] ?>]" value="<?= $options[$args['label_for']]?>" class="<?= $args['class'] ?>" />
            <?php
                break;
            case 'password':
            ?>
                <input type="password" name="standard_faqs_manager_options[<?= $args['label_for'] ?>" value="<?= $options[$args['label_for']]?>" class="<?= $args['class'] ?>]" />
<?php
                break;
        }
    }
}
