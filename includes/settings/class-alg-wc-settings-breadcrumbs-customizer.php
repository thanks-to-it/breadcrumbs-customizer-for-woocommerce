<?php
/**
 * Breadcrumbs Customizer for WooCommerce - Settings
 *
 * @version 2.0.0
 * @since   1.0.0
 *
 * @author  Algoritmika Ltd.
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Alg_WC_Settings_Breadcrumbs_Customizer' ) ) :

class Alg_WC_Settings_Breadcrumbs_Customizer extends WC_Settings_Page {

	/**
	 * Constructor.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function __construct() {

		$this->id    = 'alg_wc_breadcrumbs_customizer';
		$this->label = __( 'Breadcrumbs Customizer', 'breadcrumbs-customizer-for-woocommerce' );
		parent::__construct();

		// Sanitize option
		add_filter(
			'woocommerce_admin_settings_sanitize_option',
			array( $this, 'alg_wc_brcs_sanitize' ),
			PHP_INT_MAX,
			3
		);

		// Sections
		require_once plugin_dir_path( __FILE__ ) . 'class-alg-wc-breadcrumbs-customizer-settings-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'class-alg-wc-breadcrumbs-customizer-settings-general.php';

	}

	/**
	 * alg_wc_brcs_sanitize.
	 *
	 * @version 2.0.0
	 * @since   1.1.0
	 */
	function alg_wc_brcs_sanitize( $value, $option, $raw_value ) {
		if ( ! empty( $option['alg_wc_brcs_sanitize'] ) ) {
			switch ( $option['alg_wc_brcs_sanitize'] ) {

				case 'textarea':
					return wp_kses_post( trim( $raw_value ) );

				default:
					$func = $option['alg_wc_brcs_sanitize'];
					return ( function_exists( $func ) ? $func( $raw_value ) : $value );

			}
		}
		return $value;
	}

	/**
	 * get_settings.
	 *
	 * @version 1.1.0
	 * @since   1.0.0
	 */
	function get_settings() {
		global $current_section;
		return apply_filters( 'alg_wc_breadcrumbs_customizer_settings', array_merge(
			apply_filters( 'woocommerce_get_settings_' . $this->id . '_' . $current_section, array() ),
			array(
				array(
					'title'     => __( 'Reset Settings', 'breadcrumbs-customizer-for-woocommerce' ),
					'type'      => 'title',
					'id'        => $this->id . '_' . $current_section . '_reset_options',
				),
				array(
					'title'     => __( 'Reset section settings', 'breadcrumbs-customizer-for-woocommerce' ),
					'desc'      => '<strong>' . __( 'Reset', 'breadcrumbs-customizer-for-woocommerce' ) . '</strong>',
					'desc_tip'  => __( 'Check the box and save changes to reset.', 'breadcrumbs-customizer-for-woocommerce' ),
					'id'        => $this->id . '_' . $current_section . '_reset',
					'default'   => 'no',
					'type'      => 'checkbox',
				),
				array(
					'type'      => 'sectionend',
					'id'        => $this->id . '_' . $current_section . '_reset_options',
				),
			)
		), $current_section );
	}

	/**
	 * maybe_reset_settings.
	 *
	 * @version 1.1.0
	 * @since   1.0.0
	 */
	function maybe_reset_settings() {
		global $current_section;
		if ( 'yes' === get_option( $this->id . '_' . $current_section . '_reset', 'no' ) ) {
			foreach ( $this->get_settings() as $value ) {
				if ( isset( $value['id'] ) ) {
					$id = explode( '[', $value['id'] );
					delete_option( $id[0] );
				}
			}
			add_action( 'admin_notices', array( $this, 'admin_notice_settings_reset' ) );
		}
	}

	/**
	 * admin_notice_settings_reset.
	 *
	 * @version 2.0.0
	 * @since   1.1.0
	 */
	function admin_notice_settings_reset() {
		echo '<div class="notice notice-warning is-dismissible"><p><strong>' .
			esc_html__( 'Your settings have been reset.', 'breadcrumbs-customizer-for-woocommerce' ) .
		'</strong></p></div>';
	}

	/**
	 * Save settings.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function save() {
		parent::save();
		$this->maybe_reset_settings();
	}

}

endif;

return new Alg_WC_Settings_Breadcrumbs_Customizer();
