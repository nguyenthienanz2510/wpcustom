<?php
/**
 * Customizer Theme Fonts Google
 *
 * @package Copenhagen
 */

if ( ! class_exists( 'MBF_Customizer_Fonts_Theme' ) ) {
	/**
	 * Customizer Fonts Theme Class.
	 */
	final class MBF_Customizer_Fonts_Theme {
		/**
		 * The theme fonts.
		 *
		 * @var array
		 */
		public $fonts_output = array();

		/**
		 * The theme all variants.
		 *
		 * @var array
		 */
		public $variants_output = array();

		/**
		 * The class constructor
		 */
		public function __construct() {
			/**
			 * The mbf_theme_fonts hook.
			 *
			 * @since 1.0.0
			 */
			$this->fonts_output = apply_filters( 'mbf_theme_fonts', array() );

			/** Initialize actions */
			add_action( 'wp', array( $this, 'process_fonts' ) );
			add_filter( 'admin_init', array( $this, 'set_variants_output' ) );
			add_filter( 'template_redirect', array( $this, 'set_variants_output' ) );
			add_filter( 'mbf_customizer_dynamic_css', array( $this, 'dynamic_css_fonts_stack' ) );
			add_filter( 'mbf_customizer_fonts_choices', array( $this, 'customizer_fonts_choices' ), 999 );

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_theme_fonts' ), 999 );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_theme_fonts' ), 999 );
		}

		/**
		 * Get stack the variants that are used in the theme.
		 */
		public function set_variants_output() {
			$fields = MBF_Customizer::$fields;

			$extra_variants = array();

			if ( is_array( $fields ) && $fields ) {
				foreach ( $fields as $field ) {
					if ( ! isset( $field['type'] ) || false === strpos( $field['type'], 'typography' ) ) {
						continue;
					}

					// Check active callback.
					if ( ! MBF_Customizer_Helper::active_callback( $field ) ) {
						continue;
					}

					$field_value = MBF_Customizer_Helper::get_value( $field['settings'] );

					if ( ! isset( $field_value['font-family'] ) || ! $field_value['font-family'] ) {
						continue;
					}

					// Set font-family.
					$font_family = $field_value['font-family'];

					// Set font-weight.
					$font_weight = ( isset( $field_value['font-weight'] ) && $field_value['font-weight'] ) ? $field_value['font-weight'] : 400;

					$font_weight = ( 'regular' === $font_weight ) ? 400 : absint( $font_weight );

					// Set font-style.
					$font_style = ( isset( $field_value['font-style'] ) && $field_value['font-style'] ) ? $field_value['font-style'] : 'normal';

					// Add hash.
					array_push( $extra_variants, $font_family . $font_weight . $font_style );

					if ( ! isset( $field['choices']['variant'] ) || ! $field['choices']['variant'] ) {
						continue;
					}

					// Add all possible variations from choices.
					foreach ( $field['choices']['variant'] as $variant ) {
						// Get font-weight from variant.
						$font_weight = $this->get_font_weight( $variant );

						// Get font-style from variant.
						$font_style = $this->get_font_style( $variant );

						// Add hash of choices.
						array_push( $extra_variants, $font_family . $font_weight . $font_style );
					}
				}
			}

			$this->variants_output = $extra_variants;
		}

		/**
		 * Process fonts
		 */
		public function process_fonts() {
			foreach ( $this->fonts_output as $key => $font ) {
				if ( ! isset( $font['name'] ) || ! isset( $font['variants'] ) ) {
					unset( $this->fonts_output[ $key ] );
				}
			}
		}

		/**
		 * Add new fonts for choices
		 *
		 * @param array $fonts List fonts.
		 */
		public function customizer_fonts_choices( $fonts ) {

			if ( is_customize_preview() ) {

				// Add new section.
				if ( $this->fonts_output ) {
					$fonts['fonts']['families']['theme'] = array(
						'text'     => esc_html__( 'Theme Fonts', 'copenhagen' ),
						'children' => array(),
					);
				}

				// Add new font.
				foreach ( $this->fonts_output as $slug => $font ) {
					$fonts['fonts']['families']['theme']['children'][] = array(
						'text' => $font['name'],
						'id'   => $slug,
					);

					$fonts['fonts']['variants'][ $slug ] = $font['variants'];
				}
			}

			return $fonts;
		}

		/**
		 * Extend font stack for dynamic styles
		 *
		 * @param string $style The dynamic css.
		 */
		public function dynamic_css_fonts_stack( $style ) {

			foreach ( $this->fonts_output as $slug => $font ) {
				$style = str_replace( sprintf( 'font-family:%s;', $slug ), sprintf( 'font-family:%s,-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";', $slug ), $style );
			}

			return $style;
		}

		/**
		 * Get font-weight from variant.
		 *
		 * @param string $variant The variant of font.
		 */
		public function get_font_weight( $variant = 'regular' ) {
			$font_weight = filter_var( $variant, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );

			return ( 'regular' === $variant || 'italic' === $variant ) ? 400 : absint( $font_weight );
		}

		/**
		 * Get font-style from variant.
		 *
		 * @param string $variant The variant of font.
		 */
		public function get_font_style( $variant = 'regular' ) {
			return ( false === strpos( $variant, 'italic' ) ) ? 'normal' : 'italic';
		}

		/**
		 * Gets all our styles and returns them as a string.
		 *
		 * @param string $method Webfonts Load Method.
		 */
		public function get_styles_theme_fonts( $method = null ) {
			ob_start();
			foreach ( $this->fonts_output as $slug => $font ) {

				foreach ( $font['variants'] as $variant ) {
					$font_family = $slug;

					// Get font-weight from variant.
					$font_weight = $this->get_font_weight( $variant );

					// Get font-style from variant.
					$font_style = $this->get_font_style( $variant );

					// Get font path.
					$font_path = get_theme_file_uri( sprintf( 'assets/static/fonts/%s-%s', $slug, $variant ) );

					// Get hash from font.
					$hash = $font_family . $font_weight . $font_style;

					// Check whether the font is used in the theme.
					if ( ! in_array( $hash, $this->variants_output, true ) ) {
						continue;
					}
					?>
					@font-face {
						font-family: <?php echo esc_html( $slug ); ?>;
						src: url('<?php echo esc_html( $font_path ); ?>.woff2') format('woff2'),
							url('<?php echo esc_html( $font_path ); ?>.woff') format('woff');
						font-weight: <?php echo esc_html( $font_weight ); ?>;
						font-style: <?php echo esc_html( $font_style ); ?>;
						font-display: swap;
					}
					<?php
				}
			}

			$styles = ob_get_clean();

			// Remove extra characters.
			$styles = str_replace( array( "\t", "\r", "\n" ), '', $styles );

			return $styles;
		}

		/**
		 * Enqueue theme fonts.
		 *
		 * @param string $page Current page.
		 */
		public function enqueue_theme_fonts( $page ) {
			if ( 'admin_enqueue_scripts' === current_filter() ) {
				if ( 'post.php' !== $page && 'post-new.php' !== $page ) {
					return;
				}
				if ( is_customize_preview() ) {
					return;
				}
			}

			wp_register_style( 'mbf-theme-fonts', false, array(), mbf_get_theme_data( 'Version' ) );

			wp_enqueue_style( 'mbf-theme-fonts' );

			wp_add_inline_style( 'mbf-theme-fonts', $this->get_styles_theme_fonts() );
		}
	}

	new MBF_Customizer_Fonts_Theme();
}
