<?php
/**
 * Theme Demos
 *
 * @package Copenhagen
 */

/**
 * Register Demos of Theme
 */
function mbf_demos_list() {

	$plugins = array(
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'path'     => 'woocommerce/woocommerce.php',
			'required' => true,
			'desc'     => esc_html__( 'An eCommerce toolkit that helps you sell anything. Beautifully.', 'copenhagen' ),
		),
	);

	$demos = array(
		'copenhagen' => array(
			'name'      => esc_html__( 'Copenhagen', 'copenhagen' ),
			'preview'   => 'https://copenhagen.merchantsbestfriends.com/',
			'thumbnail' => get_template_directory_uri() . '/screenshot.png',
			'plugins'   => $plugins,
			'import'    => array(
				'customizer' => 'https://cloud.merchantsbestfriends.com/demo-content/copenhagen/copenhagen-customizer.dat',
				'widgets'    => 'https://cloud.merchantsbestfriends.com/demo-content/copenhagen/widgets.wie',
				'content'    => array(
					array(
						'label' => esc_html__( 'Demo Content', 'copenhagen' ),
						'url'   => 'https://cloud.merchantsbestfriends.com/demo-content/copenhagen/content.xml',
						'desc'  => esc_html__( 'Enabling this option will import demo posts, categories, and secondary pages. It\'s recommended to disable this option for existing', 'copenhagen' ),
					),
					array(
						'label' => esc_html__( 'Homepage', 'copenhagen' ),
						'url'   => 'https://cloud.merchantsbestfriends.com/demo-content/copenhagen/copenhagen-homepage.xml',
						'type'  => 'homepage',
					),
				),
			),
		),
	);

	return $demos;
}
add_filter( 'mbf_register_demos_list', 'mbf_demos_list' );

/**
 * Import Homepage
 *
 * @param int   $post_id New post ID.
 * @param array $data    Raw data imported for the post.
 */
function mbf_hook_import_homepage( $post_id, $data ) {
	if ( isset( $data['post_title'] ) && 'Homepage' === $data['post_title'] ) {
		// Set show_on_front.
		update_option( 'show_on_front', 'page' );

		// Set page_on_front.
		update_option( 'page_on_front', (int) $post_id );
	}
}
add_action( 'wxr_importer.db.post', 'mbf_hook_import_homepage', 10, 2 );

/**
 * Import Latest Posts
 *
 * @param int   $post_id New post ID.
 * @param array $data    Raw data imported for the post.
 */
function mbf_hook_import_latest_posts( $post_id, $data ) {
	if ( isset( $data['post_title'] ) && 'Latest Posts' === $data['post_title'] ) {
		// Set show_on_front.
		update_option( 'show_on_front', 'page' );

		// Set page_for_posts.
		update_option( 'page_for_posts', (int) $post_id );

		wp_update_post( wp_slash( array(
			'ID'           => $post_id,
			'post_content' => $post_content,
		) ) );
	}
}
add_action( 'wxr_importer.db.post', 'mbf_hook_import_latest_posts', 10, 2 );

/**
 * Finish Import
 */
function mbf_hook_finish_import() {

	/* Set menu locations. */
	$nav_menu_locations = array();

	$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
	if ( $main_menu ) {
		$nav_menu_locations['primary'] = $main_menu->term_id;
		$nav_menu_locations['mobile']  = $main_menu->term_id;
	}

	$secondary_menu = get_term_by( 'name', 'Secondary', 'nav_menu' );
	if ( $secondary_menu ) {
		$nav_menu_locations['secondary'] = $secondary_menu->term_id;
	}

	$footer_menu = get_term_by( 'name', 'Footer', 'nav_menu' );
	if ( $footer_menu ) {
		$nav_menu_locations['footer'] = $footer_menu->term_id;
	}

	if ( $nav_menu_locations ) {
		set_theme_mod( 'nav_menu_locations', $nav_menu_locations );
	}

	/* Add items to main menu */
	$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );

	if ( $main_menu && ! get_option( 'once_finished_import' ) ) {

		if ( function_exists( 'wc_get_page_id' ) && wc_get_page_id( 'shop' ) ) {
			wp_update_nav_menu_item( $main_menu->term_id, 0, array(
				'menu-item-title'     => esc_html__( 'All', 'copenhagen' ),
				'menu-item-classes'   => '',
				'menu-item-url'       => get_permalink( wc_get_page_id( 'shop' ) ),
				'menu-item-type'      => 'post_type',
				'menu-item-status'    => 'publish',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => wc_get_page_id( 'shop' ),
			) );

			$categories = array(
				'furniture',
				'tableware',
				'lighting',
				'decor',
			);

			foreach ( $categories as $term_slug ) {

				$term = get_term_by( 'slug', $term_slug, 'product_cat' );

				if ( $term ) {
					wp_update_nav_menu_item( $main_menu->term_id, 0, array(
						'menu-item-title'     => $term->name,
						'menu-item-classes'   => '',
						'menu-item-type'      => 'taxonomy',
						'menu-item-status'    => 'publish',
						'menu-item-object'    => 'product_cat',
						'menu-item-object-id' => $term->term_id,
					) );
				}
			}
		}
	}

	/* Adaptive content */
	$search_pages = array(
		'Homepage',
		'Blog',
	);

	foreach ( $search_pages as $search_title ) {

		$query = new WP_Query();

		$pages = $query->query( array(
			'post_type' => 'page',
			'title'     => $search_title,
		) );

		foreach ( $pages as $find_page ) {
			$post_content = $find_page->post_content;

			if ( 'Homepage' === $find_page->post_title ) {
				if ( function_exists( 'wc_get_page_id' ) && wc_get_page_id( 'shop' ) ) {
					$post_content = str_replace( 'https://copenhagen.merchantsbestfriends.com/shop/', get_permalink( wc_get_page_id( 'shop' ) ), $post_content );
				}
				if ( mbf_get_page_id_by_title( 'Blog' ) ) {
					$post_content = str_replace( 'https://copenhagen.merchantsbestfriends.com/blog/', get_permalink( mbf_get_page_id_by_title( 'Blog' ) ), $post_content );
				}
				if ( mbf_get_page_id_by_title( 'About Us' ) ) {
					$post_content = str_replace( 'https://copenhagen.merchantsbestfriends.com/about-us/', get_permalink( mbf_get_page_id_by_title( 'About Us' ) ), $post_content );
				}

				$categories_homepage = array(
					'44' => 'furniture',
					'47' => 'tableware',
					'46' => 'lighting',
					'45' => 'living-room',
					'49' => 'decor',
				);

				foreach ( $categories_homepage as $id_replace => $term_slug ) {

					$term = get_term_by( 'slug', $term_slug, 'product_cat' );

					if ( $term ) {
						$post_content = str_replace( sprintf( '"categoryId":%s', $id_replace ), sprintf( '"categoryId":%s', $term->term_id ), $post_content );

						$post_content = str_replace( sprintf( 'https://copenhagen.merchantsbestfriends.com/product-category/%s/', $term_slug ), get_term_link( $term->term_id ), $post_content );
					}
				}
			}

			if ( 'Blog' === $find_page->post_title ) {
				if ( get_option( 'page_for_posts' ) && get_permalink( get_option( 'page_for_posts' ) ) ) {
					$post_content = str_replace( 'https://copenhagen.merchantsbestfriends.com/latest-posts/', get_permalink( get_option( 'page_for_posts' ) ), $post_content );
				}
			}

			wp_update_post( wp_slash( array(
				'ID'           => $find_page->ID,
				'post_content' => $post_content,
			) ) );
		}
	}

	/* Add items to main menu */
	update_option( 'once_finished_import', true );
}
add_action( 'mbf_finish_import', 'mbf_hook_finish_import' );
