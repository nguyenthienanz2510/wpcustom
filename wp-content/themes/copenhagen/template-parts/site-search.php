<?php
/**
 * The template part for displaying site section.
 *
 * @package Copenhagen
 */

?>

<div class="mbf-search">
	<form method="get" class="mbf-search__nav-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="mbf-search__group">
			<?php if ( class_exists( 'WooCommerce' ) ) { ?>
				<input required class="mbf-search__input" type="search" value="<?php the_search_query(); ?>" name="s" placeholder="<?php echo esc_attr( esc_html__( 'Search Products...', 'copenhagen' ) ); ?>">
			<?php } else { ?>
				<input required class="mbf-search__input" type="search" value="<?php the_search_query(); ?>" name="s" placeholder="<?php echo esc_attr( esc_html__( 'Search on Site...', 'copenhagen' ) ); ?>">
			<?php } ?>

			<button class="mbf-search__submit">
				<i class="mbf-icon mbf-icon-search"></i>
			</button>
		</div>
	</form>
</div>
