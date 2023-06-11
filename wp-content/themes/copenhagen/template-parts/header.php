<?php
/**
 * The template for displaying the header layout
 *
 * @package Copenhagen
 */

?>

<div class="mbf-header-before"></div>

<header class="mbf-header mbf-header-stretch">
	<div class="mbf-container">
		<div class="mbf-header__inner mbf-header__inner-desktop">
			<div class="mbf-header__col mbf-col-left">
				<?php
					mbf_component( 'header_offcanvas_toggle' );
					mbf_component( 'header_logo' );
					mbf_component( 'header_nav_menu' );
					mbf_component( 'header_nav_secondary_menu' );
				?>
			</div>

			<div class="mbf-header__col mbf-col-center"></div>

			<div class="mbf-header__col mbf-col-right">
				<?php
					mbf_component( 'header_scheme_toggle' );
					mbf_component( 'header_search_toggle' );
					mbf_component( 'wc_header_my_account' );
					mbf_component( 'wc_header_cart' );
				?>
			</div>

			<?php mbf_site_search(); ?>
		</div>

		<?php mbf_site_nav_mobile(); ?>
	</div>
</header>
