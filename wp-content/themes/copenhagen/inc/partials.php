<?php
/**
 * These functions are used to load template parts (partials) or actions when used within action hooks,
 * and they probably should never be updated or modified.
 *
 * @package Copenhagen
 */

if ( ! function_exists( 'mbf_singular_post_type_before' ) ) {
	/**
	 * Add Before Singular Hooks for specific post type.
	 */
	function mbf_singular_post_type_before() {
		if ( 'post' === get_post_type() ) {
			/**
			 * The mbf_post_content_before hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'mbf_post_content_before' );
		}
		if ( 'page' === get_post_type() ) {
			/**
			 * The mbf_page_content_before hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'mbf_page_content_before' );
		}
	}
}

if ( ! function_exists( 'mbf_singular_post_type_after' ) ) {
	/**
	 * Add After Singular Hooks for specific post type.
	 */
	function mbf_singular_post_type_after() {
		if ( 'post' === get_post_type() ) {
			/**
			 * The mbf_post_content_after hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'mbf_post_content_after' );
		}
		if ( 'page' === get_post_type() ) {
			/**
			 * The mbf_page_content_after hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'mbf_page_content_after' );
		}
	}
}

if ( ! function_exists( 'mbf_notification_bar' ) ) {
	/**
	 * Notification Bar
	 */
	function mbf_notification_bar() {
		get_template_part( 'template-parts/notification-bar' );
	}
}

if ( ! function_exists( 'mbf_offcanvas' ) ) {
	/**
	 * Off-canvas
	 */
	function mbf_offcanvas() {
		get_template_part( 'template-parts/offcanvas' );
	}
}

if ( ! function_exists( 'mbf_site_scheme' ) ) {
	/**
	 * Site Scheme
	 */
	function mbf_site_scheme() {
		$site_scheme = mbf_site_scheme_data();

		if ( ! $site_scheme ) {
			return;
		}

		call_user_func( 'printf', '%s', "data-scheme='{$site_scheme}'" );
	}
}

if ( ! function_exists( 'mbf_site_search' ) ) {
	/**
	 * Site Search
	 */
	function mbf_site_search() {
		if ( ! get_theme_mod( 'header_search_button', true ) ) {
			return;
		}
		get_template_part( 'template-parts/site-search' );
	}
}

if ( ! function_exists( 'mbf_site_nav_mobile' ) ) {
	/**
	 * Site Nav Mobile
	 */
	function mbf_site_nav_mobile() {
		get_template_part( 'template-parts/site-nav-mobile' );
	}
}

if ( ! function_exists( 'mbf_breadcrumbs' ) ) {
	/**
	 * SEO Breadcrumbs
	 */
	function mbf_breadcrumbs() {
		/**
		 * The mbf_breadcrumbs hook.
		 *
		 * @since 1.0.0
		 */
		if ( ! apply_filters( 'mbf_breadcrumbs', true ) ) {
			return;
		}

		if ( is_front_page() ) {
			return;
		}

		if ( mbf_doing_request() ) {
			return;
		}

		if ( ! function_exists( 'yoast_breadcrumb' ) ) {
			return;
		}

		ob_start();

		yoast_breadcrumb( '<div class="mbf-breadcrumbs" id="breadcrumbs">', '</div>' );

		return ob_end_flush();
	}
}

if ( ! function_exists( 'mbf_page_header' ) ) {
	/**
	 * Page Header
	 */
	function mbf_page_header() {
		if ( ! ( is_home() || is_archive() || is_search() || is_404() ) ) {
			return;
		}
		get_template_part( 'template-parts/page-header' );
	}
}

if ( ! function_exists( 'mbf_page_pagination' ) ) {
	/**
	 * Post Pagination
	 */
	function mbf_page_pagination() {
		if ( ! is_singular() ) {
			return;
		}

		/**
		 * The mbf_pagination_before hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'mbf_pagination_before' );

		wp_link_pages(
			array(
				'before'           => '<div class="navigation pagination posts-navigation"><div class="nav-links">',
				'after'            => '</div></div>',
				'link_before'      => '<span class="page-number">',
				'link_after'       => '</span>',
				'next_or_number'   => 'number',
				'separator'        => ' ',
				'nextpagelink'     => esc_html__( 'Next page', 'copenhagen' ),
				'previouspagelink' => esc_html__( 'Previous page', 'copenhagen' ),
			)
		);

		/**
		 * The mbf_pagination_after hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'mbf_pagination_after' );
	}
}

if ( ! function_exists( 'mbf_entry_breadcrumbs' ) ) {
	/**
	 * Entry Breadcrumbs
	 */
	function mbf_entry_breadcrumbs() {
		mbf_breadcrumbs();
	}
}

if ( ! function_exists( 'mbf_entry_header' ) ) {
	/**
	 * Entry Header Simple and Standard
	 */
	function mbf_entry_header() {
		if ( ! is_singular() ) {
			return;
		}

		if ( 'none' === mbf_get_page_header_type() ) {
			return;
		}

		if ( function_exists( 'is_cart' ) && is_cart() ) {
			return;
		}

		if ( is_page_template( 'template-without-header.php' ) ) {
			return;
		}

		if ( is_page_template( 'template-with-hero.php' ) ) {
			return;
		}

		get_template_part( 'template-parts/entry/entry-header' );
	}
}

if ( ! function_exists( 'mbf_entry_media' ) ) {
	/**
	 * Entry Media
	 */
	function mbf_entry_media() {
		if ( ! is_singular() ) {
			return;
		}

		if ( 'none' === mbf_get_page_header_type() ) {
			return;
		}

		if ( function_exists( 'is_cart' ) && is_cart() ) {
			return;
		}

		if ( is_page_template( 'template-without-header.php' ) ) {
			return;
		}

		if ( is_page_template( 'template-with-hero.php' ) ) {
			return;
		}

		get_template_part( 'template-parts/entry/entry-media' );
	}
}

if ( ! function_exists( 'mbf_entry_tags' ) ) {
	/**
	 * Entry Tags
	 */
	function mbf_entry_tags() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( false === get_theme_mod( 'post_tags', true ) ) {
			return;
		}

		the_tags( '<div class="mbf-entry__tags"><ul><li>', '</li><li>', '</li></ul></div>' );
	}
}

if ( ! function_exists( 'mbf_entry_footer' ) ) {
	/**
	 * Entry Footer
	 */
	function mbf_entry_footer() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( false === get_theme_mod( 'post_footer', true ) ) {
			return;
		}
		get_template_part( 'template-parts/entry/entry-footer' );
	}
}

if ( ! function_exists( 'mbf_entry_comments' ) ) {
	/**
	 * Entry Comments
	 */
	function mbf_entry_comments() {
		if ( post_password_required() ) {
			return;
		}

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
}

if ( ! function_exists( 'mbf_entry_prev_next' ) ) {
	/**
	 * Entry Prev Next
	 */
	function mbf_entry_prev_next() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( false === get_theme_mod( 'post_prev_next', true ) ) {
			return;
		}

		get_template_part( 'template-parts/entry/entry-prev-next' );
	}
}
