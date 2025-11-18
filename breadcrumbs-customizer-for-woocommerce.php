<?php
/*
Plugin Name: ZILI Breadcrumbs Customizer for WooCommerce
Plugin URI: https://wordpress.org/plugins/zili-breadcrumbs-customizer-for-woocommerce/
Description: Customize the WooCommerce breadcrumbs. Beautifully.
Version: 2.0.0
Author: Algoritmika Ltd
Author URI: https://algoritmika.com
Requires at least: 4.4
Text Domain: zili-breadcrumbs-customizer-for-woocommerce
Domain Path: /langs
WC tested up to: 10.3
Requires Plugins: woocommerce
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

defined( 'ABSPATH' ) || exit;

if ( 'breadcrumbs-customizer-for-woocommerce.php' === basename( __FILE__ ) ) {
	/**
	 * Check if Pro plugin version is activated.
	 *
	 * @version 2.0.0
	 * @since   1.2.0
	 */
	$plugin = 'breadcrumbs-customizer-for-woocommerce-pro/breadcrumbs-customizer-for-woocommerce-pro.php';
	if (
		in_array( $plugin, (array) get_option( 'active_plugins', array() ), true ) ||
		(
			is_multisite() &&
			array_key_exists( $plugin, (array) get_site_option( 'active_sitewide_plugins', array() ) )
		)
	) {
		defined( 'ALG_WC_BREADCRUMBS_CUSTOMIZER_FILE_FREE' ) || define( 'ALG_WC_BREADCRUMBS_CUSTOMIZER_FILE_FREE', __FILE__ );
		return;
	}
}

defined( 'ALG_WC_BREADCRUMBS_CUSTOMIZER_VERSION' ) || define( 'ALG_WC_BREADCRUMBS_CUSTOMIZER_VERSION', '2.0.0' );

defined( 'ALG_WC_BREADCRUMBS_CUSTOMIZER_FILE' ) || define( 'ALG_WC_BREADCRUMBS_CUSTOMIZER_FILE', __FILE__ );

require_once plugin_dir_path( __FILE__ ) . 'includes/class-alg-wc-breadcrumbs-customizer.php';

if ( ! function_exists( 'alg_wc_breadcrumbs_customizer' ) ) {
	/**
	 * Returns the main instance of Alg_WC_Breadcrumbs_Customizer to prevent the need to use globals.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function alg_wc_breadcrumbs_customizer() {
		return Alg_WC_Breadcrumbs_Customizer::instance();
	}
}

add_action( 'plugins_loaded', 'alg_wc_breadcrumbs_customizer' );
