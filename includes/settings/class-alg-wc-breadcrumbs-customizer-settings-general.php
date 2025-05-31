<?php
/**
 * Breadcrumbs Customizer for WooCommerce - General Section Settings
 *
 * @version 2.0.0
 * @since   1.0.0
 *
 * @author  Algoritmika Ltd.
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Alg_WC_Breadcrumbs_Customizer_Settings_General' ) ) :

class Alg_WC_Breadcrumbs_Customizer_Settings_General extends Alg_WC_Breadcrumbs_Customizer_Settings_Section {

	/**
	 * Constructor.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function __construct() {
		$this->id   = '';
		$this->desc = __( 'General', 'breadcrumbs-customizer-for-woocommerce' );
		parent::__construct();
	}

	/**
	 * get_settings.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 *
	 * @todo    (dev) restyle
	 * @todo    (dev) default for `alg_wc_breadcrumbs_customizer_defaults_delimiter`
	 */
	function get_settings() {
		return array(
			array(
				'title'                => __( 'Options', 'breadcrumbs-customizer-for-woocommerce' ),
				'type'                 => 'title',
				'id'                   => 'alg_wc_breadcrumbs_customizer_options',
			),
			array(
				'title'                => __( 'Change breadcrumbs defaults', 'breadcrumbs-customizer-for-woocommerce' ),
				'desc'                 => __( 'Enable', 'breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_change_defaults_enabled',
				'default'              => 'no',
				'type'                 => 'checkbox',
			),
			array(
				'desc'                 => __( 'Delimiter', 'breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[delimiter]',
				'default'              => '&nbsp;&#47;&nbsp;',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'desc'                 => __( 'Wrap before', 'breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[wrap_before]',
				'default'              => '<nav class="woocommerce-breadcrumb">',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'desc'                 => __( 'Wrap after', 'breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[wrap_after]',
				'default'              => '</nav>',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'desc'                 => __( 'Before', 'breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[before]',
				'default'              => '',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'desc'                 => __( 'After', 'breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[after]',
				'default'              => '',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'desc'                 => __( 'Home title', 'breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[home]',
				'default'              => _x( 'Home', 'breadcrumb', 'breadcrumbs-customizer-for-woocommerce' ),
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'title'                => __( 'Change breadcrumbs home URL', 'breadcrumbs-customizer-for-woocommerce' ),
				'desc'                 => __( 'Enable', 'breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_change_home_url_enabled',
				'default'              => 'no',
				'type'                 => 'checkbox',
			),
			array(
				'desc'                 => sprintf(
					/* Translators: %s: URL. */
					__( 'Home URL. Leave empty to remove link. Your home URL: %s.', 'breadcrumbs-customizer-for-woocommerce' ),
					'<code>' . home_url() . '</code>'
				),
				'id'                   => 'alg_wc_breadcrumbs_customizer_home_url',
				'default'              => '',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
			),
			array(
				'title'                => __( 'Hide breadcrumbs', 'breadcrumbs-customizer-for-woocommerce' ),
				'desc'                 => __( 'Hide', 'breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_hide',
				'default'              => 'no',
				'type'                 => 'checkbox',
			),
			array(
				'type'                 => 'sectionend',
				'id'                   => 'alg_wc_breadcrumbs_customizer_options',
			),
		);
	}

}

endif;

return new Alg_WC_Breadcrumbs_Customizer_Settings_General();
