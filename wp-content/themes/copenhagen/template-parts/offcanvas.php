<?php
/**
 * The template part for displaying off-canvas area.
 *
 * @package Copenhagen
 */

if ( mbf_offcanvas_exists() ) {
	?>

	<div class="mbf-site-overlay"></div>

	<div class="mbf-offcanvas">
		<div class="mbf-offcanvas__header">
			<?php
			/**
			 * The mbf_offcanvas_header_start hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'mbf_offcanvas_header_start' );
			?>

			<nav class="mbf-offcanvas__nav">
				<span class="mbf-offcanvas__toggle" role="button"><i class="mbf-icon mbf-icon-x"></i></span>
			</nav>

			<?php
			/**
			 * The mbf_offcanvas_header_end hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'mbf_offcanvas_header_end' );
			?>
		</div>
		<aside class="mbf-offcanvas__sidebar">
			<div class="mbf-offcanvas__inner mbf-offcanvas__area mbf-widget-area">
				<?php
				$locations = get_nav_menu_locations();

				// Get menu by location.
				if ( isset( $locations['primary'] ) || isset( $locations['mobile'] ) ) {

					if ( isset( $locations['primary'] ) ) {
						$location = $locations['primary'];
					}
					if ( isset( $locations['mobile'] ) ) {
						$location = $locations['mobile'];
					}

					the_widget( 'WP_Nav_Menu_Widget', array( 'nav_menu' => $location ), array(
						'before_widget' => '<div class="widget %s">',
						'after_widget'  => '</div>',
					) );
				}

				// Get secondary menu by location.
				if ( isset( $locations['secondary'] ) ) {
					the_widget( 'WP_Nav_Menu_Widget', array( 'nav_menu' => $locations['secondary'] ), array(
						'before_widget' => '<div class="widget %s">',
						'after_widget'  => '</div>',
					) );
				}
				?>

				<?php dynamic_sidebar( 'sidebar-offcanvas' ); ?>

				<div class="mbf-offcanvas__bottombar">
					<?php
						mbf_component( 'off_canvas_my_account' );
						mbf_component( 'off_canvas_scheme_toggle' );
					?>
				</div>
			</div>
		</aside>
	</div>
	<?php
}
