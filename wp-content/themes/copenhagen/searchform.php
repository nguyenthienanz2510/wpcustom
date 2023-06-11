<?php
/**
 * The template for displaying search form.
 *
 * @package Copenhagen
 */

?>

<form role="search" method="get" class="mbf-search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="mbf-search__group">
		<input required class="mbf-search__input" type="search" value="<?php the_search_query(); ?>" name="s" placeholder="<?php esc_attr_e( 'Search...', 'copenhagen' ); ?>" role="search">

		<button class="mbf-search__submit">
			<i class="mbf-icon mbf-icon-search"></i>
		</button>
	</div>
</form>
