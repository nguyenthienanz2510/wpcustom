<?php
/**
 * The template for displaying the footer layout
 *
 * @package Copenhagen
 */

?>

<?php mbf_component( 'footer_topbar' ); ?>

<footer class="mbf-footer">
	<div class="mbf-container">
		<?php if ( has_nav_menu( 'footer' ) ) { ?>
			<div class="mbf-footer__item mbf-footer__item-top-bar">
				<div class="mbf-footer__item-inner">
					<?php mbf_component( 'footer_nav_menu' ); ?>
				</div>
			</div>
		<?php } ?>

		<div class="mbf-footer__item mbf-footer__item-bottom-bar">
			<div class="mbf-footer__item-inner">
				<div class="mbf-footer__col mbf-col-left">
					<div class="mbf-footer__col-inner">
						<?php mbf_component( 'footer_logo' ); ?>

						<div class="mbf-footer__info">
							<?php mbf_component( 'footer_description' ); ?>
							<?php mbf_component( 'footer_promo_image' ); ?>
						</div>

						<?php mbf_component( 'footer_copyright' ); ?>
					</div>
				</div>

				<div class="mbf-footer__col mbf-col-right">
					<?php mbf_component( 'footer_subscribe' ); ?>
				</div>
			</div>
		</div>
	</div>
</footer>
