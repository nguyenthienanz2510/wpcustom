<?php
/**
 * Template part entry header
 *
 * @package Copenhagen
 */

$header_type = mbf_get_page_header_type();

if ( 'title' === $header_type ) {
	?>

	<div class="mbf-entry__header mbf-entry__header-simple">
		<div class="mbf-entry__header-inner">
			<?php the_title( '<h1 class="mbf-entry__title"><span>', '</span></h1>' ); ?>
		</div>
	</div>

<?php } else { ?>

	<div class="mbf-entry__header mbf-entry__header-standard">
		<div class="mbf-entry__header-inner">
			<?php
			// Post Meta.
			if ( is_singular( 'post' ) ) {
				mbf_get_post_meta( array( 'category' ), true, 'post_meta' );
			}

			// Title.
			the_title( '<h1 class="mbf-entry__title"><span>', '</span></h1>' );

			// Post Meta.
			if ( is_singular( 'post' ) ) {

				global $post;

				setup_postdata( $post );

				mbf_get_post_meta( array( 'date', 'author', 'comments' ), true, 'post_meta' );

				wp_reset_postdata();
			}

			// Subtitle.
			mbf_post_subtitle();
			?>
		</div>
	</div>

	<?php
}
