<?php
/**
 * Template part entry media
 *
 * @package Copenhagen
 */

$thumbnail_size = 'mbf-large';

if ( 'uncropped' === mbf_get_page_preview() ) {
	$thumbnail_size = sprintf( '%s-uncropped', $thumbnail_size );
}

if ( has_post_thumbnail() ) {
	?>
		<div class="mbf-entry__media">
			<div class="mbf-entry__media-inner">
				<figure>
					<?php the_post_thumbnail( $thumbnail_size ); ?>
				</figure>
			</div>
		</div>
	<?php
}
