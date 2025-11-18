<?php
/**
 * ZILI Breadcrumbs Customizer for WooCommerce - General Section Settings
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
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function __construct() {
		$this->id   = '';
		$this->desc = __( 'General', 'zili-breadcrumbs-customizer-for-woocommerce' );
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
				'title'                => __( 'Options', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'type'                 => 'title',
				'id'                   => 'alg_wc_breadcrumbs_customizer_options',
			),
			array(
				'title'                => __( 'Change breadcrumbs defaults', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'desc'                 => __( 'Enable', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_change_defaults_enabled',
				'default'              => 'no',
				'type'                 => 'checkbox',
			),
			array(
				'desc'                 => __( 'Delimiter', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[delimiter]',
				'default'              => '&nbsp;&#47;&nbsp;',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'desc'                 => __( 'Wrap before', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[wrap_before]',
				'default'              => '<nav class="woocommerce-breadcrumb">',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'desc'                 => __( 'Wrap after', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[wrap_after]',
				'default'              => '</nav>',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'desc'                 => __( 'Before', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[before]',
				'default'              => '',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'desc'                 => __( 'After', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[after]',
				'default'              => '',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'desc'                 => __( 'Home title', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_defaults[home]',
				'default'              => _x( 'Home', 'breadcrumb', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'type'                 => 'text',
				'css'                  => 'width:100%;',
				'alg_wc_brcs_sanitize' => 'textarea',
			),
			array(
				'title'                => __( 'Change breadcrumbs home URL', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'desc'                 => __( 'Enable', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'id'                   => 'alg_wc_breadcrumbs_customizer_change_home_url_enabled',
				'default'              => 'no',
				'type'                 => 'checkbox',
			),
			array(
				'desc'                 => sprintf(
					/* Translators: %s: URL. */
					__( 'Home URL. Leave empty to remove link. Your home URL: %s.', 'zili-breadcrumbs-customizer-for-woocommerce' ),
					'<code>' . home_url() . '</code>'
				),
				'id'                   => 'alg_wc_breadcrumbs_customizer_home_url',
				'default'              => '',
				'type'                 => 'text',
				'css'                  => 'width:100%;',
			),
			array(
				'title'                => __( 'Hide breadcrumbs', 'zili-breadcrumbs-customizer-for-woocommerce' ),
				'desc'                 => __( 'Hide', 'zili-breadcrumbs-customizer-for-woocommerce' ),
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
