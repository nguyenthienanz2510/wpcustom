<?php
/**
 * Typography
 *
 * @package Copenhagen
 */

?>
<style id='mbf-theme-typography'>
	:root {
		/* Base Font */
		--mbf-font-base-family: <?php mbf_typography( 'font_base', 'font-family', 'satoshi' ); ?>;
		--mbf-font-base-size: <?php mbf_typography( 'font_base', 'font-size', '1rem' ); ?>;
		--mbf-font-base-weight: <?php mbf_typography( 'font_base', 'font-weight', '500' ); ?>;
		--mbf-font-base-style: <?php mbf_typography( 'font_base', 'font-style', 'normal' ); ?>;
		--mbf-font-base-letter-spacing: <?php mbf_typography( 'font_base', 'letter-spacing', 'normal' ); ?>;
		--mbf-font-base-line-height: <?php mbf_typography( 'font_base', 'line-height', '1.5' ); ?>;

		/* Primary Font */
		--mbf-font-primary-family: <?php mbf_typography( 'font_primary', 'font-family', 'satoshi' ); ?>;
		--mbf-font-primary-size: <?php mbf_typography( 'font_primary', 'font-size', '0.8125rem' ); ?>;
		--mbf-font-primary-weight: <?php mbf_typography( 'font_primary', 'font-weight', '700' ); ?>;
		--mbf-font-primary-style: <?php mbf_typography( 'font_primary', 'font-style', 'normal' ); ?>;
		--mbf-font-primary-letter-spacing: <?php mbf_typography( 'font_primary', 'letter-spacing', 'normal' ); ?>;
		--mbf-font-primary-text-transform: <?php mbf_typography( 'font_primary', 'text-transform', 'none' ); ?>;

		/* Secondary Font */
		--mbf-font-secondary-family: <?php mbf_typography( 'font_secondary', 'font-family', 'satoshi' ); ?>;
		--mbf-font-secondary-size: <?php mbf_typography( 'font_secondary', 'font-size', '0.6875rem' ); ?>;
		--mbf-font-secondary-weight: <?php mbf_typography( 'font_secondary', 'font-weight', '900' ); ?>;
		--mbf-font-secondary-style: <?php mbf_typography( 'font_secondary', 'font-style', 'normal' ); ?>;
		--mbf-font-secondary-letter-spacing: <?php mbf_typography( 'font_secondary', 'letter-spacing', '0.1em' ); ?>;
		--mbf-font-secondary-text-transform: <?php mbf_typography( 'font_secondary', 'text-transform', 'uppercase' ); ?>;

		/* Category Font */
		--mbf-font-category-family: <?php mbf_typography( 'font_category', 'font-family', 'satoshi' ); ?>;
		--mbf-font-category-size: <?php mbf_typography( 'font_category', 'font-size', '0.75rem' ); ?>;
		--mbf-font-category-weight: <?php mbf_typography( 'font_category', 'font-weight', '700' ); ?>;
		--mbf-font-category-style: <?php mbf_typography( 'font_category', 'font-style', 'normal' ); ?>;
		--mbf-font-category-letter-spacing: <?php mbf_typography( 'font_category', 'letter-spacing', 'normal' ); ?>;
		--mbf-font-category-text-transform: <?php mbf_typography( 'font_category', 'text-transform', 'none' ); ?>;

		/* Post Meta Font */
		--mbf-font-post-meta-family: <?php mbf_typography( 'font_post_meta', 'font-family', 'satoshi' ); ?>;
		--mbf-font-post-meta-size: <?php mbf_typography( 'font_post_meta', 'font-size', '0.8125rem' ); ?>;
		--mbf-font-post-meta-weight: <?php mbf_typography( 'font_post_meta', 'font-weight', '700' ); ?>;
		--mbf-font-post-meta-style: <?php mbf_typography( 'font_post_meta', 'font-style', 'normal' ); ?>;
		--mbf-font-post-meta-letter-spacing: <?php mbf_typography( 'font_post_meta', 'letter-spacing', 'normal' ); ?>;
		--mbf-font-post-meta-text-transform: <?php mbf_typography( 'font_post_meta', 'text-transform', 'none' ); ?>;

		/* Input Font */
		--mbf-font-input-family: <?php mbf_typography( 'font_input', 'font-family', 'satoshi' ); ?>;
		--mbf-font-input-size: <?php mbf_typography( 'font_input', 'font-size', '0.8125rem' ); ?>;
		--mbf-font-input-weight: <?php mbf_typography( 'font_input', 'font-weight', '700' ); ?>;
		--mbf-font-input-style: <?php mbf_typography( 'font_input', 'font-style', 'normal' ); ?>;
		--mbf-font-input-line-height: <?php mbf_typography( 'font_input', 'line-height', '1.625rem' ); ?>;
		--mbf-font-input-letter-spacing: <?php mbf_typography( 'font_input', 'letter-spacing', 'normal' ); ?>;
		--mbf-font-input-text-transform: <?php mbf_typography( 'font_input', 'text-transform', 'none' ); ?>;

		/* Post Subbtitle */
		--mbf-font-post-subtitle-family: <?php mbf_typography( 'font_post_subtitle', 'font-family', 'inherit' ); ?>;
		--mbf-font-post-subtitle-size: <?php mbf_typography( 'font_post_subtitle', 'font-size', '1.625rem' ); ?>;
		--mbf-font-post-subtitle-letter-spacing: <?php mbf_typography( 'font_post_subtitle', 'letter-spacing', '-0.05em' ); ?>;

		/* Post Content */
		--mbf-font-post-content-family: <?php mbf_typography( 'font_post_content', 'font-family', 'satoshi' ); ?>;
		--mbf-font-post-content-size: <?php mbf_typography( 'font_post_content', 'font-size', '1.125rem' ); ?>;
		--mbf-font-post-content-letter-spacing: <?php mbf_typography( 'font_post_content', 'letter-spacing', 'normal' ); ?>;
		--mbf-font-post-content-line-height: <?php mbf_typography( 'font_post_content', 'line-height', '1.55' ); ?>;

		/* Entry Excerpt */
		--mbf-font-entry-excerpt-family: <?php mbf_typography( 'font_excerpt', 'font-family', 'satoshi' ); ?>;
		--mbf-font-entry-excerpt-size: <?php mbf_typography( 'font_excerpt', 'font-size', '1rem' ); ?>;
		--mbf-font-entry-excerpt-letter-spacing: <?php mbf_typography( 'font_excerpt', 'letter-spacing', 'normal' ); ?>;
		--mbf-font-entry-excerpt-line-height: <?php mbf_typography( 'font_excerpt', 'line-height', '1.5' ); ?>;

		/* Logos --------------- */

		/* Main Logo */
		--mbf-font-main-logo-family: <?php mbf_typography( 'font_main_logo', 'font-family', 'Manrope' ); ?>;
		--mbf-font-main-logo-size: <?php mbf_typography( 'font_main_logo', 'font-size', '1.375rem' ); ?>;
		--mbf-font-main-logo-weight: <?php mbf_typography( 'font_main_logo', 'font-weight', '600' ); ?>;
		--mbf-font-main-logo-style: <?php mbf_typography( 'font_main_logo', 'font-style', 'normal' ); ?>;
		--mbf-font-main-logo-letter-spacing: <?php mbf_typography( 'font_main_logo', 'letter-spacing', '-0.04em' ); ?>;
		--mbf-font-main-logo-text-transform: <?php mbf_typography( 'font_main_logo', 'text-transform', 'none' ); ?>;

		/* Footer Logo */
		--mbf-font-footer-logo-family: <?php mbf_typography( 'font_footer_logo', 'font-family', 'Manrope' ); ?>;
		--mbf-font-footer-logo-size: <?php mbf_typography( 'font_footer_logo', 'font-size', '1rem' ); ?>;
		--mbf-font-footer-logo-weight: <?php mbf_typography( 'font_footer_logo', 'font-weight', '600' ); ?>;
		--mbf-font-footer-logo-style: <?php mbf_typography( 'font_footer_logo', 'font-style', 'normal' ); ?>;
		--mbf-font-footer-logo-letter-spacing: <?php mbf_typography( 'font_footer_logo', 'letter-spacing', '-0.04em' ); ?>;
		--mbf-font-footer-logo-text-transform: <?php mbf_typography( 'font_footer_logo', 'text-transform', 'none' ); ?>;

		/* Headings --------------- */

		/* Headings */
		--mbf-font-headings-family: <?php mbf_typography( 'font_headings', 'font-family', 'DM Sans' ); ?>;
		--mbf-font-headings-weight: <?php mbf_typography( 'font_headings', 'font-weight', '400' ); ?>;
		--mbf-font-headings-style: <?php mbf_typography( 'font_headings', 'font-style', 'normal' ); ?>;
		--mbf-font-headings-line-height: <?php mbf_typography( 'font_headings', 'line-height', '1.25' ); ?>;
		--mbf-font-headings-letter-spacing: <?php mbf_typography( 'font_headings', 'letter-spacing', '-0.05em' ); ?>;
		--mbf-font-headings-text-transform: <?php mbf_typography( 'font_headings', 'text-transform', 'none' ); ?>;

		/* Menu Font --------------- */

		/* Menu */
		/* Used for main top level menu elements. */
		--mbf-font-menu-family: <?php mbf_typography( 'font_menu', 'font-family', 'satoshi' ); ?>;
		--mbf-font-menu-size: <?php mbf_typography( 'font_menu', 'font-size', '0.8215rem' ); ?>;
		--mbf-font-menu-weight: <?php mbf_typography( 'font_menu', 'font-weight', '700' ); ?>;
		--mbf-font-menu-style: <?php mbf_typography( 'font_menu', 'font-style', 'normal' ); ?>;
		--mbf-font-menu-letter-spacing: <?php mbf_typography( 'font_menu', 'letter-spacing', 'normal' ); ?>;
		--mbf-font-menu-text-transform: <?php mbf_typography( 'font_menu', 'text-transform', 'none' ); ?>;

		/* Submenu Font */
		/* Used for submenu elements. */
		--mbf-font-submenu-family: <?php mbf_typography( 'font_submenu', 'font-family', 'satoshi' ); ?>;
		--mbf-font-submenu-size: <?php mbf_typography( 'font_submenu', 'font-size', '0.8215rem' ); ?>;
		--mbf-font-submenu-weight: <?php mbf_typography( 'font_submenu', 'font-weight', '500' ); ?>;
		--mbf-font-submenu-style: <?php mbf_typography( 'font_submenu', 'font-style', 'normal' ); ?>;
		--mbf-font-submenu-letter-spacing: <?php mbf_typography( 'font_submenu', 'letter-spacing', 'normal' ); ?>;
		--mbf-font-submenu-text-transform: <?php mbf_typography( 'font_submenu', 'text-transform', 'none' ); ?>;
	}
</style>
