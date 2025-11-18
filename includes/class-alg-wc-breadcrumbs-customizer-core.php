<?php
/**
 * ZILI Breadcrumbs Customizer for WooCommerce - Core Class
 *
 * @version 2.0.0
 * @since   1.0.0
 *
 * @author  Algoritmika Ltd.
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Alg_WC_Breadcrumbs_Customizer_Core' ) ) :

class Alg_WC_Breadcrumbs_Customizer_Core {

	/**
	 * Constructor.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 *
	 * @todo    (dev) \woocommerce\templates\global\breadcrumb.php
	 * @todo    (dev) \woocommerce\includes\wc-template-functions.php
	 * @todo    (dev) \woocommerce\includes\class-wc-structured-data.php
	 * @todo    (dev) \woocommerce\includes\class-wc-breadcrumb.php
	 * @todo    (dev) storefront
	 * @todo    (dev) recheck filter: `woocommerce_breadcrumb_product_terms_args` and `woocommerce_breadcrumb_main_term`
	 * @todo    (dev) recheck filter: `woocommerce_get_breadcrumb`
	 * @todo    (dev) recheck filter: `woocommerce_structured_data_breadcrumblist`; action: `woocommerce_breadcrumb`;
	 * @todo    (dev) add checkbox options to a) hide with CSS, b) hide by removing breadcrumbs action, c) with woocommerce_get_breadcrumb filter?
	 */
	function __construct() {

		// Breadcrumb defaults
		if ( 'yes' === get_option( 'alg_wc_breadcrumbs_customizer_change_defaults_enabled', 'no' ) ) {
			add_filter( 'woocommerce_breadcrumb_defaults', array( $this, 'breadcrumb_defaults' ), PHP_INT_MAX );
		}

		// Home URL
		if ( 'yes' === get_option( 'alg_wc_breadcrumbs_customizer_change_home_url_enabled', 'no' ) ) {
			add_filter( 'woocommerce_breadcrumb_home_url', array( $this, 'change_home_url' ), PHP_INT_MAX );
		}

		// Hide Breadcrumbs
		if ( 'yes' === get_option( 'alg_wc_breadcrumbs_customizer_hide', 'no' ) ) {
			add_filter( 'woocommerce_get_breadcrumb', '__return_false', PHP_INT_MAX );
			add_action( 'wp_enqueue_scripts', array( $this, 'hide_breadcrumbs_with_css' ) );
			add_action( 'wp_loaded', array( $this, 'hide_breadcrumbs_by_removing_action' ), PHP_INT_MAX );
		}

		// Core loaded
		do_action( 'alg_wc_breadcrumbs_customizer_core_loaded', $this );

	}

	/**
	 * hide_breadcrumbs_with_css.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 *
	 * @todo    (dev) add option to add custom identifiers?
	 * @todo    (dev) add more identifiers?
	 */
	function hide_breadcrumbs_with_css() {
		$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.min' : '' );
		$url = '/includes/css/alg-wc-breadcrumbs-customizer' . $min . '.css';
		wp_enqueue_style(
			'alg-wc-breadcrumbs-customizer',
			alg_wc_breadcrumbs_customizer()->plugin_url() . $url,
			array(),
			alg_wc_breadcrumbs_customizer()->version
		);
	}

	/**
	 * hide_breadcrumbs_by_removing_action.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function hide_breadcrumbs_by_removing_action() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
		remove_action( 'storefront_content_top',          'woocommerce_breadcrumb', 10 );
	}

	/**
	 * breadcrumb_defaults.
	 *
	 * @version 1.1.0
	 * @since   1.1.0
	 */
	function breadcrumb_defaults( $defaults ) {
		$customized_defaults = get_option( 'alg_wc_breadcrumbs_customizer_defaults', array() );
		return array_merge( $defaults, $customized_defaults );
	}

	/**
	 * change_home_url.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function change_home_url( $url ) {
		return get_option( 'alg_wc_breadcrumbs_customizer_home_url', '' );
	}

}

endif;

return new Alg_WC_Breadcrumbs_Customizer_Core();
