<?php
/**
 * Filters
 *
 * Filtering native WordPress and third-party plugins' functions.
 *
 * @package Copenhagen
 */

if ( ! function_exists( 'mbf_body_class' ) ) {
	/**
	 * Adds classes to <body> tag
	 *
	 * @param array $classes is an array of all body classes.
	 */
	function mbf_body_class( $classes ) {

		// Page Layout.
		$classes[] = 'mbf-page-layout-' . mbf_get_page_sidebar();

		// Sticky Navbar.
		if ( get_theme_mod( 'navbar_sticky', true ) ) {
			$classes['navbar_sticky'] = 'mbf-navbar-sticky-enabled';

			// Smart Navbar.
			if ( get_theme_mod( 'navbar_smart_sticky', true ) ) {
				$classes['navbar_sticky'] = 'mbf-navbar-smart-enabled';
			}
		}

		// Sticky Sidebar.
		if ( get_theme_mod( 'misc_sticky_sidebar', true ) ) {
			$classes[] = 'mbf-sticky-sidebar-enabled';

			$classes[] = get_theme_mod( 'misc_sticky_sidebar_method', 'mbf-stick-to-top' );
		} else {
			$classes[] = 'mbf-sticky-sidebar-disabled';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'mbf_body_class' );

if ( ! function_exists( 'mbf_kses_allowed_html' ) ) {
	/**
	 * Filters the HTML that is allowed for a given context.
	 *
	 * @param array  $tags    Tags by.
	 * @param string $context Context name.
	 */
	function mbf_kses_allowed_html( $tags, $context ) {

		if ( 'content' === $context ) {
			$tags = array(
				'a'      => array(
					'class'  => true,
					'href'   => true,
					'title'  => true,
					'target' => true,
					'rel'    => true,
				),
				'div'    => array(
					'class' => true,
					'id'    => true,
					'style' => true,
				),
				'span'   => array(
					'class' => true,
					'id'    => true,
					'style' => true,
				),
				'img'    => array(
					'class'  => true,
					'id'     => true,
					'src'    => true,
					'rel'    => true,
					'srcset' => true,
					'size'   => true,
				),
				'br'     => array(),
				'b'      => array(),
				'strong' => array(
					'class' => true,
					'id'    => true,
					'style' => true,
				),
				'i'      => array(
					'class' => true,
					'id'    => true,
					'style' => true,
				),
				'p'      => array(
					'class' => true,
					'id'    => true,
					'style' => true,
				),
				'h1'     => array(
					'class' => true,
					'id'    => true,
					'style' => true,
				),
				'h2'     => array(
					'class' => true,
					'id'    => true,
					'style' => true,
				),
				'h3'     => array(
					'class' => true,
					'id'    => true,
					'style' => true,
				),
				'h4'     => array(
					'class' => true,
					'id'    => true,
					'style' => true,
				),
				'h5'     => array(
					'class' => true,
					'id'    => true,
					'style' => true,
				),
				'h6'     => array(
					'class' => true,
					'id'    => true,
					'style' => true,
				),
			);
		}

		if ( 'common' === $context ) {
			$tags = wp_kses_allowed_html( 'post' );
		}

		return $tags;
	}
	add_filter( 'wp_kses_allowed_html', 'mbf_kses_allowed_html', 10, 2 );
}

if ( ! function_exists( 'mbf_sitecontent_class' ) ) {
	/**
	 * Adds the classes for the site-content element.
	 *
	 * @param array $classes Classes to add to the class list.
	 */
	function mbf_sitecontent_class( $classes ) {

		// Page Sidebar.
		if ( 'disabled' !== mbf_get_page_sidebar() ) {
			$classes[] = 'mbf-sidebar-enabled mbf-sidebar-' . mbf_get_page_sidebar();
		} else {
			$classes[] = 'mbf-sidebar-disabled';
		}

		return $classes;
	}
}
add_filter( 'mbf_site_content_class', 'mbf_sitecontent_class' );

if ( ! function_exists( 'mbf_add_entry_class' ) ) {
	/**
	 * Add entry class to post_class
	 *
	 * @param array $classes One or more classes to add to the class list.
	 */
	function mbf_add_entry_class( $classes ) {
		array_push( $classes, 'mbf-entry' );

		return $classes;
	}
}
add_filter( 'post_class', 'mbf_add_entry_class' );

if ( ! function_exists( 'mbf_remove_hentry_class' ) ) {
	/**
	 * Remove hentry from post_class
	 *
	 * @param array $classes One or more classes to add to the class list.
	 */
	function mbf_remove_hentry_class( $classes ) {
		return array_diff( $classes, array( 'hentry' ) );
	}
}
add_filter( 'post_class', 'mbf_remove_hentry_class' );

if ( ! function_exists( 'mbf_theme_typography' ) ) {
	/**
	 * Output theme typography
	 */
	function mbf_theme_typography() {
		require get_template_directory() . '/inc/typography.php';
	}
}
add_filter( 'admin_head', 'mbf_theme_typography' );
add_filter( 'wp_head', 'mbf_theme_typography' );

if ( ! function_exists( 'mbf_max_srcset_image_width' ) ) {
	/**
	 * Changes max image width in srcset attribute
	 *
	 * @param int   $max_width  The maximum image width to be included in the 'srcset'. Default '1600'.
	 * @param array $size_array Array of width and height values in pixels (in that order).
	 */
	function mbf_max_srcset_image_width( $max_width, $size_array ) {
		return 3840;
	}
}
add_filter( 'max_srcset_image_width', 'mbf_max_srcset_image_width', 10, 2 );

if ( ! function_exists( 'mbf_get_the_archive_title' ) ) {
	/**
	 * Archive Title
	 *
	 * Removes default prefixes, like "Category:" from archive titles.
	 *
	 * @param string $title Archive title.
	 */
	function mbf_get_the_archive_title( $title ) {
		if ( is_category() ) {

			$title = single_cat_title( '', false );

		} elseif ( is_tag() ) {

			$title = single_tag_title( '', false );

		} elseif ( is_author() ) {

			$title = get_the_author( '', false );

		}

		return $title;
	}
}
add_filter( 'get_the_archive_title', 'mbf_get_the_archive_title' );

if ( ! function_exists( 'mbf_excerpt_length' ) ) {
	/**
	 * Excerpt Length
	 *
	 * @param string $length of the excerpt.
	 */
	function mbf_excerpt_length( $length ) {
		return 18;
	}
}
add_filter( 'excerpt_length', 'mbf_excerpt_length' );

if ( ! function_exists( 'mbf_strip_shortcode_from_excerpt' ) ) {
	/**
	 * Strip shortcodes from excerpt
	 *
	 * @param string $content Excerpt.
	 */
	function mbf_strip_shortcode_from_excerpt( $content ) {
		$content = strip_shortcodes( $content );
		return $content;
	}
}
add_filter( 'the_excerpt', 'mbf_strip_shortcode_from_excerpt' );

if ( ! function_exists( 'mbf_strip_tags_from_excerpt' ) ) {
	/**
	 * Strip HTML from excerpt
	 *
	 * @param string $content Excerpt.
	 */
	function mbf_strip_tags_from_excerpt( $content ) {
		$content = wp_strip_all_tags( $content );
		return $content;
	}
}
add_filter( 'the_excerpt', 'mbf_strip_tags_from_excerpt' );

if ( ! function_exists( 'mbf_excerpt_more' ) ) {
	/**
	 * Excerpt Suffix
	 *
	 * @param string $more suffix for the excerpt.
	 */
	function mbf_excerpt_more( $more ) {
		return '&hellip;';
	}
}
add_filter( 'excerpt_more', 'mbf_excerpt_more' );

if ( ! function_exists( 'mbf_search_only_posts' ) ) {
	/**
	 * Search only posts.
	 *
	 * @param object $query The WP_Query instance (passed by reference).
	 */
	function mbf_search_only_posts( $query ) {
		if ( ! is_admin() && $query->is_main_query() && $query->is_search ) {
			$query->set( 'post_type', 'post' );
		}
	}
	add_action( 'pre_get_posts', 'mbf_search_only_posts' );
}

if ( ! function_exists( 'mbf_comment_form_defaults' ) ) {
	/**
	 * Pre processing post meta choices
	 *
	 * @param array $defaults The default comment form arguments.
	 */
	function mbf_comment_form_defaults( $defaults ) {

		$defaults['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" placeholder="' . esc_attr__( 'Your Comment', 'copenhagen' ) . '" required="required"></textarea></p>';

		return $defaults;
	}
}
add_filter( 'comment_form_defaults', 'mbf_comment_form_defaults' );

if ( ! function_exists( 'mbf_comment_form_default_fields' ) ) {
	/**
	 * Pre processing post meta choices
	 *
	 * @param string[] $fields Array of the default comment fields.
	 */
	function mbf_comment_form_default_fields( $fields ) {
		$commenter = wp_get_current_commenter();
		$user      = wp_get_current_user();
		$req       = get_option( 'require_name_email' );
		$html_req  = ( $req ? " required='required'" : '' );

		$fields['author'] = '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_attr__( 'Your Name', 'copenhagen' ) . ( $req ? ' *' : '' ) . '" size="30" maxlength="245" ' . wp_kses( $html_req, 'csco' ) . '></p>';
		$fields['email']  = '<p class="comment-form-email"><input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_attr__( 'Email Address', 'copenhagen' ) . ( $req ? ' *' : '' ) . '" size="30" maxlength="100" ' . wp_kses( $html_req, 'csco' ) . '></p>';
		$fields['url']    = '<p class="comment-form-url"><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( 'Website', 'copenhagen' ) . '" size="30" maxlength="200"></p>';
		return $fields;
	}
}
add_filter( 'comment_form_default_fields', 'mbf_comment_form_default_fields' );

/**
 * -------------------------------------------------------------------------
 * Render Blocks
 * -------------------------------------------------------------------------
 */

if ( ! function_exists( 'mbf_custom_render_block_post_author' ) ) {
	/**
	 * Block Render post Author
	 *
	 * @param string $block_content The content.
	 * @param array  $block         The block.
	 */
	function mbf_custom_render_block_post_author( $block_content, $block ) {

		if ( 'core/post-author' === $block['blockName'] ) {
			$block_content = preg_replace_callback( '|(<p class="wp-block-post-author__name">)(.*?)(<\/p>)|', function ( $matches ) {
				$author_posts_url = get_author_posts_url( get_the_author_meta( 'ID' ) );

				return $matches[1] . '<a class="wp-block-post-author__link" href="' . esc_url( $author_posts_url ) . '">' . $matches[2] . '</a>' . $matches[3];
			}, $block_content );
		}

		return $block_content;
	}
}
add_filter( 'render_block', 'mbf_custom_render_block_post_author', 10, 2 );
